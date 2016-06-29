<?php

/* w7G506tgBv */

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('dashboard_model');
    }

    public function index($slug = FALSE) {
        //print_r($this->session->all_userdata());
        if ($this->session->userdata('loggedin')) { // Redirects logged in user
            return redirect('front');
        }
        //$this->load->view('templates/header', $data);

        $data['items'] = $this->dashboard_model->get_items();
        $data['title'] = 'HOME';
        $this->load->view('dashboard/index', $data);
        //$this->load->view('templates/footer');
    }

    public function login() {
        $username = strtolower($this->input->post("username"));
        $password = $this->input->post("password");
        //$hpassword = hash('sha256',$password);

        $result = $this->dashboard_model->login($username, $password);

        if ($result) { //Successfully logged in
            
            $this->session->set_userdata(array(
                "loggedin" => true,
                "uid" => $result["id"],
                "username" => $result["username"],
                "fullname" => $result["fullname"],
                "lastlogin" => $result["lastlogin"],
                "usergroup" => $result["user_group"],
                "allowed_page" => json_encode($this->dashboard_model->menuPermissionBySlugAndPage($result["user_group"]))
            ));
            $success = 1;
            //logging to be done later. sleepy
        } else {
            $success = 0;
        }
        //$this->output->enable_profiler(TRUE);
        //print_r($this->session->all_userdata());
        echo $success;
    }


    public function toexcel() {
        $post = $this->input->post();
        if ((!$post) || (!isset($post['jsondata'])))
            die();
        $this->load->view('dashboard/toexcel', array("post" => $post['jsondata']));
    }
	
    public function topdf() {
        $post = $this->input->post();
        if ((!$post) || (!isset($post['id'])))
            die();
			
		$print = (isset($post['print']) && ($post['print'] == 1));
		$id = $post["id"];
		$fullslug = $this->dashboard_model->getSlugFromPageId($id);
		
		$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
		$port = $_SERVER['SERVER_PORT'];
		$tempfile = tempnam(sys_get_temp_dir(), "pdftemp");
		$phantomdir = getcwd()."\\application\\binary\\";
		$phantomexec = $phantomdir."phantomjs.exe";
		$phantomscript = $phantomdir."topdf.js";
		
		$cmd = $phantomexec . " " . $phantomscript . " " .  $protocol . "localhost:" . $port . "/mpxd/" . $fullslug . ($print ? "?print=1" : "") . " " . $tempfile;
		//echo $cmd;
		shell_exec($cmd);
		if (file_exists($tempfile)) {
		/* CURRENT WILL NOT UNLINK THE TEMP FILE, PLEASE DO SO IN THE FUTURE */
			$this->load->view('dashboard/topdf', array("file" => $tempfile));
		} else {
		die();
		}
        //
    }

    public function logout() {
        $this->session->sess_destroy();
        return redirect('/');
    }

    public function debug() {
        var_dump($this->session->all_userdata());
    }

    public function test() {
        $data['title'] = 'test';

        $this->load->view('templates/header', $data);
        $this->load->view('dashboard/view', $data);
        $this->load->view('templates/footer');
    }

    public function front() {
        
        if (!$this->session->userdata('loggedin'))
            return redirect('/');
        //header('Content-Type: application/json');
        /* if (isset($_POST['data1'])) {

          file_put_contents('datatunnel.txt', ($_POST['data1']));
          file_put_contents('datatunnel2.txt', ($_POST['data2']));
          die();
          } */
        $data = $this->dashboard_model->get_source_archivable(5);
        $data = json_decode($data[0]['value'], true);
        $data = $data['programme']['overall_elevated_underground'];

		$comdate = $this->dashboard_model->get_date_list('commercial_front')[0]['date'];
		
		$comdata = $this->dashboard_model->get_source_archivable(78);
		$comdata = json_decode($comdata[0]['value'],true);
		
		//var_dump($comdata);die();
		$date = $this->dashboard_model->get_date_list('programme')[0]['date'];
        
		

        //var_dump($date);die();

        $data_packages = $this->dashboard_model->get_source_archivable(7); //North
        $data_packages2 = $this->dashboard_model->get_source_archivable(20); //South
        $data_packages3 = $this->dashboard_model->get_source_archivable(29); //South
        $data_packages = json_decode($data_packages[0]['value'], true);
        $data_packages2 = json_decode($data_packages2[0]['value'], true);
        $data_packages3 = json_decode($data_packages3[0]['value'], true);
        $data_packages_north = $data_packages['north']['scorecard'];
        $data_packages_south = $data_packages2['south']['scorecard'];//var_dump($data_packages3);die();
        $data_packages_system = $data_packages3['systems']['syspackage'];


        $early = round(explode("%", $data['currentEarly'])[0]);
        $late = round(explode("%", $data['currentLate'])[0]);
        $actual = round(explode("%", $data['currentActual'])[0]);
        $var_early = round(explode("w", $data['varLate'])[0]);
        $var_early = ($var_early > 0 ? "+" . $var_early : $var_early);

        $packages_data = array_merge(
                (array_map(function($i) {
                    return array($i['item'] => $i['varianceLate']);
                }, $data_packages_north)), (array_map(function($i) {
                    return array($i['item'] => $i['varianceLate']);
                }, $data_packages_south)), (array_map(function($i) {
                    return array($i['item'] => $i['varianceLate']);
                }, $data_packages_system)));//var_dump($packages_data);die();


        //print_r(array_keys(json_encode($data[0]['value'])));die();
        $data = Array('data' => Array(
                'overall_actual' => $actual,
                'overall_early' => $early,
                'overall_late' => $late,
                'overall_variance' => $var_early,
                // 'project_spend_to_date' => 9.3, //Bil
                // 'awarded_packages' => "21.0", //Bil
                // 'pdp_reimbursables' => 972.5, //Mil
                // 'wpcs_payment' => 7.5, //Bil
                // 'retention_sum' => 316.6, //Mil
                // 'variation_orders' => 198.4, //Mil
                // 'contingency_sum' => 241.2, //Bil
                // 'vo_number' => 747,
                // 'contingency_total' => 3.2, //Bil
                'progress_date' => $date,
				'comdate' => $comdate

            /*
              'project_value' => 36.6,
              'vo_value' => 2.5,
              'claims' => 39.1,
              'claims_paid' => 13.4,
              'claims_paid_percent' => 38,
              'vo_value_percent' => 6.8 */
        ));
		//$data = array_merge($data,$comdata);
		//
		//var_dump($comdata);die();
		
		foreach($comdata as $k => $v)
			$data['data'][$k] = $v;
		
        foreach ($packages_data as $k => $d) {
            foreach ($d as $kk => $dd)
                $data['data'][$kk] = $dd;
        }
		return redirect('../mpxd/frontl2/view/');
        $this->load->view('dashboard/front', $data);
    }

    public function view($item = FALSE, $query_type = FALSE, $query_key = FALSE) {
        //print_r($this->session->userdata('allowed_page'));
        if (!$this->session->userdata('loggedin')) {
            if (in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', "::1"))) {
                $this->session->set_userdata(array(
                    "loggedin" => true,
                    "uid" => '',
                    "username" => '',
                    "fullname" => 'Hummingsoft Robot',
                    "lastlogin" => '',
                    "usergroup" => 1,
                    "allowed_page" => json_encode($this->dashboard_model->menuPermissionBySlugAndPage(1))
                ));
            } else
                return redirect('/');
        }

        $date = $this->input->get("date");
        //if($_SERVER['REQUEST_URI'] != "/mpxd/assets/js/backbone-min.map" && $_SERVER['REQUEST_URI'] != "/mpxd/assets/js/underscore-min.map") // Why these scripts call view?
        //$this->session->set_userdata(array("selected_date" => $date));
        //$this->session->set_userdata(array($_SERVER['REQUEST_URI'] => $date));

        $data['menu'] = $this->dashboard_model->getMenu();
        $data['permission'] = $this->dashboard_model->menuPermission();
        $data['title'] = 'View Page';
        $data['userdata'] = $this->session->all_userdata(); 

        $this->load->view('templates/header', $data);
        $this->load->view('dashboard/view', $data);
        $this->load->view('templates/footer');
    }

    public function portlet($slug = FALSE, $page = FALSE) {
        if (!$slug)
            return show_404();
        else {
            $page = ($page == false ? 1 : $page);
            $result = $this->dashboard_model->getPortlet($slug, $page);
        }
        $data['title'] = 'portlet configuration';
        $data['item'] = $result;

        //var_dump($data);
        $this->load->view('dashboard/api', $data);
        //$this->output->enable_profiler(TRUE);
    }

    public function api() {
        //$result = array();
        if ($this->input->get()) {
            $gets = $this->input->get(); 
			//Unset unneeded array
			unset($gets['item_id']);
			unset($gets['date']);
			unset($gets['_']);
			
            $query = array_keys($gets);
            $itemID = $this->input->get('item_id');

            //Data archive date list
            if ($this->input->get("date_list")) {
                $slug = $this->input->get("date_list");
                $data['item'] = $this->dashboard_model->get_date_list($slug);
            }else if($this->input->get("comments")){
                $result = $this->dashboard_model->getComment();
                if($result){
                    $data['status']="success";
                    $data['comment']= $result;
                }else{
                    $data['status']="fail";
                    $data['comment']= $result;
                }
              echo json_encode($data);
            }
            //Default api get portlet content and data.
            else {
                $date = $this->input->get("date");
                if ($itemID) //Use item ID to retrieve items meta
                    $item_meta = $this->dashboard_model->get_meta($query, $itemID);
                else
                    $item_meta = $this->dashboard_model->get_meta($query);

                $data_source = $this->dashboard_model->get_source_archivable($item_meta[0]['item_id'], $date);
				$data_source_static = $this->dashboard_model->get_static_source($itemID);
//                print_r($data_source);
                //var_dump($this->session->all_userdata());
                $data['title'] = 'api';
                //Added By Sebin
                //Usage: Slug based value fetching (for single Routing)
                //Created : 20/06/2016
                //Starts Here....
                $slug_name= $this->dashboard_model->get_slug($itemID);
                switch($slug_name[0]['slug']){
                    case "r1":
                        $pdata=$this->dashboard_model->get_psds_test_comm(substr($slug_name[0]['slug'],1), $date);
                        $tdata=$this->dashboard_model->get_psds_trip_status(substr($slug_name[0]['slug'],1), $date);
                        array_push($data_source,$pdata,$tdata);
                        $data['item'] = array('item' => $item_meta, 'data' => $data_source, 'static_data' => $data_source_static);
                    case "r2":
                        $pdata=$this->dashboard_model->get_psds_test_comm(substr($slug_name[0]['slug'],1), $date);
                        $tdata=$this->dashboard_model->get_psds_trip_status(substr($slug_name[0]['slug'],1), $date);
                        array_push($data_source,$pdata,$tdata);
                        $data['item'] = array('item' => $item_meta, 'data' => $data_source, 'static_data' => $data_source_static);
                    case "r3":
                        $pdata=$this->dashboard_model->get_psds_test_comm(substr($slug_name[0]['slug'],1), $date);
                        $tdata=$this->dashboard_model->get_psds_trip_status(substr($slug_name[0]['slug'],1), $date);
                        array_push($data_source,$pdata,$tdata);
                        $data['item'] = array('item' => $item_meta, 'data' => $data_source, 'static_data' => $data_source_static);
                    case "r4":
                        $pdata=$this->dashboard_model->get_psds_test_comm(substr($slug_name[0]['slug'],1), $date);
                        $tdata=$this->dashboard_model->get_psds_trip_status(substr($slug_name[0]['slug'],1), $date);
                        array_push($data_source,$pdata,$tdata);
                        $data['item'] = array('item' => $item_meta, 'data' => $data_source, 'static_data' => $data_source_static);
                    case "r5":
                        $pdata=$this->dashboard_model->get_psds_test_comm(substr($slug_name[0]['slug'],1), $date);
                        $tdata=$this->dashboard_model->get_psds_trip_status(substr($slug_name[0]['slug'],1), $date);
                        array_push($data_source,$pdata,$tdata);
                        $data['item'] = array('item' => $item_meta, 'data' => $data_source, 'static_data' => $data_source_static);
                    case "r6":
                        $pdata=$this->dashboard_model->get_psds_test_comm(substr($slug_name[0]['slug'],1), $date);
                        $tdata=$this->dashboard_model->get_psds_trip_status(substr($slug_name[0]['slug'],1),$date);
                        array_push($data_source,$pdata,$tdata);
                        $data['item'] = array('item' => $item_meta, 'data' => $data_source, 'static_data' => $data_source_static);
                    case "r7":
                        $pdata=$this->dashboard_model->get_psds_test_comm(substr($slug_name[0]['slug'],1), $date);
                        $tdata=$this->dashboard_model->get_psds_trip_status(substr($slug_name[0]['slug'],1), $date);
                        array_push($data_source,$pdata,$tdata);
                        $data['item'] = array('item' => $item_meta, 'data' => $data_source, 'static_data' => $data_source_static);
                    default:
                        $data['item'] = array('item' => $item_meta, 'data' => $data_source, 'static_data' => $data_source_static);
                }
                //Ends Here....
                //var_dump($data);
                //$this->output->enable_profiler(TRUE);
            }
        } else {
            return show_404();
        }
		//$data = array_merge($data[, array(0));
        $this->load->view('dashboard/api', $data);
    }

    public function setapi() {
        $result = array();
        if ($this->input->post()) {
            $gets = $this->input->post();
            foreach ($gets as $k => $get) {
                $query = null;
                $object = new stdClass();
                $keys = explode(":", $get);
                if (sizeof($keys) == 4) {

                    $query['item'] = $keys[0];
                    $query['type'] = $keys[1];
                    $query['meta_key'] = $keys[2];
                    $query['meta_value'] = base64_decode($keys[3]);

                    $log = $this->dashboard_model->set_item_by_allkey($query['item'], $query['type'], $query['meta_key'], $query['meta_value']);
                    //array_push($result[$k], array('id' => $k));
                    $result[$k] = Array();
                    $result[$k]['id'] = $k;
                    $result[$k]['log'] = $log;
                } else {
                    $result[$k] = 'Parameters passed are not correct' . implode(",", $gets);
                }
            }
            //var_dump($result);die();
        } else {
            return show_404();
        }

        //var_dump($result);
        $data['title'] = 'api';
        $data['item'] = $result;
        //$this->output->enable_profiler(TRUE);
        $this->load->view('dashboard/api', $data);
    }

    public function draw() {
        $items = $this->dashboard_model->get_items();
        //var_dump($items);die();
        $pages = Array();
        foreach ($items as $idx => $i) {
            $items[$idx]['temp_pages'] = $this->dashboard_model->getPortletBySlug($i['slug']);

            //$pages[$i['id']] = $this->dashboard_model->getPortletBySlug($i['slug']);
        }
        //$pages = $this->dashboard_model->getPortletBySlug('programme');
        $this->load->view('dashboard/draw', Array('data' => Array(
                'items' => $items
        )));
    }

    public function save() {

        //header('Content-type: application/json');

        $input_data = $this->input->post(); //'[{"id":"2","key":"overall_elevated","slug":"programme","type":"scurve","col":1,"row":1,"size_x":6,"size_y":1},{"id":"7","key":"underground","slug":"programme","type":"scurve","col":7,"row":1,"size_x":6,"size_y":1},{"id":"8","key":"elevated_north","slug":"programme","type":"scurve","col":1,"row":2,"size_x":6,"size_y":1},{"id":"9","key":"elevated_south_underground","slug":"programme","type":"scurve","col":7,"row":2,"size_x":6,"size_y":1},{"id":"10","key":"overall_elevated_underground","slug":"programme","type":"scurve","col":1,"row":3,"size_x":6,"size_y":1},{"id":"11","key":"elevated_south","slug":"programme","type":"scurve","col":7,"row":3,"size_x":6,"size_y":1}]';
        if ($input_data) {
            $portlets = $input_data['portlets'];
            //$page = 0;//$input_data['page'];
            $portlet_array = json_decode($portlets, true);

            $log = $this->dashboard_model->updatePortlet($portlet_array);
            //$a = $this->dashboard_model->updatePortlet(json_decode('[{"id":"2","key":"overall_elevated","slug":"programme","type":"scurve","col":1,"row":1,"size_x":6,"size_y":1},{"id":"7","key":"underground","slug":"programme","type":"scurve","col":7,"row":1,"size_x":6,"size_y":1},{"id":"8","key":"elevated_north","slug":"programme","type":"scurve","col":1,"row":2,"size_x":6,"size_y":1},{"id":"9","key":"elevated_south_underground","slug":"programme","type":"scurve","col":7,"row":2,"size_x":6,"size_y":1},{"id":"10","key":"overall_elevated_underground","slug":"programme","type":"scurve","col":1,"row":3,"size_x":6,"size_y":1},{"id":"11","key":"elevated_south","slug":"programme","type":"scurve","col":7,"row":3,"size_x":6,"size_y":1}]', true), "1");
            printf($log);
        } else {
            return show_404();
        }
    }

    public function apiapi($item = FALSE, $query_type = FALSE, $query_key = FALSE) {

        if ($item && !$query_type) {
            $data['item'] = $this->dashboard_model->get_items($item);
        } else if ($query_type && $query_key) {
            $allowed_type = array('type', 'meta_key');

            if (in_array($query_type, $allowed_type)) {
                $data['item'] = $this->dashboard_model->get_items_by_type($item, $query_type, $query_key);
            }
        } else {
            return show_404();
        }


        if (empty($data['item'])) {
            show_404();
        }

        //var_dump($data);
        $data['title'] = 'api';
        //$this->output->enable_profiler(TRUE);
        $this->load->view('dashboard/api', $data);
    }

    /*
     *
     * TEST TEST BELOW
     *
     */

    public function create($test1 = 'test1', $test2 = 'test2') {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');

        $newdata = array(
            'username' => 'johndoe',
            'email' => 'johndoe@some-site.com',
            'logged_in' => TRUE
        );

        $this->session->set_userdata($newdata);

        var_dump($this->session->all_userdata());
        var_dump($test2);

        $data['title'] = 'Create a news item';

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('text', 'text', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('news/create');
            $this->load->view('templates/footer');
        } else {
            $this->news_model->set_news();
            $this->load->view('news/success');
        }
    }

    public function buildTree($ar, $pid = null) {
        $op = array();
        foreach ($ar as $item) {
            if ($item['parentId'] == $pid) {
                $op[$item['id']] = array(
                    'name' => $item['name'],
                    'parentId' => $item['parentId']
                );
                // using recursion
                $children = $this->buildTree($ar, $item['id']);
                if ($children) {
                    $op[$item['id']]['children'] = $children;
                }
            }
        }
        return $op;
    }

//    Author: Sebin
//    Usage : Fetch Comments
//    Created: 28/04/2016
    public function fetchComment(){
//        if ($this->input->get()) {
//            echo "Sebin1";
                $result = $this->dashboard_model->getComment();
                if ($result) {
                    $data['status'] = "success";
                    $data['item'] = $result;
                } else {
                    $data['status'] = "fail";
                    $data['item'] = $result;
                }
//        } else {
//            return show_404();
//        }
        $this->load->view('dashboard/api', $data);
    }
    public function revComment(){
        if ($this->input->get()) {
            $id_comment=$this->input->get("skj");
            $result = $this->dashboard_model->removeComment($id_comment);
            if ($result) {
                $data['status'] = "success";
                $data['item'] = $result;
            } else {
                $data['status'] = "fail";
                $data['item'] = $result;
            }
        } else {
            return show_404();
        }
        $this->load->view('dashboard/api', $data);
    }
//    Author: Sebin
//    Usage : Add Comments
//    Created: 28/04/2016
    public function addComment(){
        if ($this->input->get()) {
            $data = array(
                'train_no' => $this->input->get('train_no'),
                'comments' => $this->input->get('comments'),
                'timestamp' =>date('Y-m-d h:i:s')
            );
            $result = $this->dashboard_model->setComment($data);
            if($result>0){
                $data['item'] = 1;
            }else{
                $data['item'] = 0;
            }
        } else {
            return show_404();
        }
        $this->load->view('dashboard/api', $data);
    }
//    Author:AncY Mathew
//    Usage : Baseline and forecast table data
//    Created: 29/04/2016
    public function baseline(){
        if ($this->input->get()) {
            $data_date=$this->input->get("date");
            $result = $this->dashboard_model->getBaselineM($data_date);
            if ($result) {
                $data['status'] = "success";
                $data['item'] = $result;
            } else {
                $data['status'] = "fail";
                $data['item'] = $result;
            }
        } else {
            return show_404();
        }
        $this->load->view('dashboard/api', $data);
    }
//    Author: Ancy Mathew
//    Usage : Get Train Data
//    Created: 04/05/2016
    public function trainDataGet(){
        if ($this->input->get()) {
            $data_date=$this->input->get("date");
            $result = $this->dashboard_model->getTrainData($data_date);
            if ($result) {
                $data['status'] = "success";
                $data['item'] = $result;
            } else {
                $data['status'] = "fail";
                $data['item'] = $result;
            }
        } else {
            return show_404();
        }
        $this->load->view('dashboard/api', $data);
    }

//    Author:AncY Mathew
//    Usage : Baseline and forecast table data for assembly progress
//    Created: 04/05/2016
    public function assemblybaseline(){
        if ($this->input->get()) {
            $data_date=$this->input->get("date");
            $result = $this->dashboard_model->getBaselineAssembly($data_date);
            if ($result) {
                $data['status'] = "success";
                $data['item'] = $result;
            } else {
                $data['status'] = "fail";
                $data['item'] = $result;
            }
        } else {
            return show_404();
        }
        $this->load->view('dashboard/api', $data);
    }
    public function OverallProgress(){
        if ($this->input->get()) {
            $data_date=$this->input->get("date");
            $result = $this->dashboard_model->getOverallProgress($data_date);
            if ($result) {
                $data['status'] = "success";
                $data['item'] = $result;
            } else {
                $data['status'] = "fail";
                $data['item'] = $result;
            }
        } else {
            return show_404();
        }
        $this->load->view('dashboard/api', $data);
    }

    public function outStandingProgress(){
        if ($this->input->get()) {
            $data_date=$this->input->get("date");
            $result = $this->dashboard_model->getOutStandingProgress($data_date);
            if ($result) {
                $data['status'] = "success";
                $data['item'] = $result;
            } else {
                $data['status'] = "fail";
                $data['item'] = $result;

            }
        } else {
            return show_404();
        }
        $this->load->view('dashboard/api', $data);
    }
// Added by : Agaile Victor
// Date : 09/05/2016
// Desc: Fetch the testing report data from table
    public function GetTestingData(){
        if ($this->input->get()) {
            $data_date=$this->input->get("date");
            $TestingData = $this->dashboard_model->GetTestingData($data_date);
            if ($TestingData) {
                $data['status'] = "success";
                $data['item'] = $TestingData;
            } else {
                $data['status'] = "fail";
                $data['item'] = $TestingData;
            }
        }else {
                return show_404();
            }
            $this->load->view('dashboard/api', $data);
        }

    public function fullyCompletedTrain(){
        if ($this->input->get()) {
            $data_date=$this->input->get("date");
            $result = $this->dashboard_model->getFullyCompletedTrain($data_date);
            if ($result) {
                $data['status'] = "success";
                $data['item'] = $result;
            } else {
                $data['status'] = "fail";
                $data['item'] = $result;
            }
        }else {
            return show_404();
        }
        $this->load->view('dashboard/api', $data);
    }

    public function psdsFront() {
        if (!$this->session->userdata('loggedin'))
            return redirect('/');
        //header('Content-Type: application/json');
        /* if (isset($_POST['data1'])) {

          file_put_contents('datatunnel.txt', ($_POST['data1']));
          file_put_contents('datatunnel2.txt', ($_POST['data2']));
          die();
          } */
        $data = $this->dashboard_model->get_source_archivable(5);
        $data = json_decode($data[0]['value'], true);
        $data = $data['programme']['overall_elevated_underground'];

        $comdate = $this->dashboard_model->get_date_list('commercial_front')[0]['date'];

        $comdata = $this->dashboard_model->get_source_archivable(78);
        $comdata = json_decode($comdata[0]['value'],true);
        //coded by :ANCY MATHEW 22/06/2016
        //used to get comments in PS AND DS
        $comments = $this->dashboard_model->get_comments_ps();
        $psds_summary=$this->dashboard_model->get_status_ps();

        //var_dump($comdata);die();
        $date = $this->dashboard_model->get_date_list('programme')[0]['date'];



        //var_dump($date);die();
//        $data_packages = $this->dashboard_model->get_source_archivable(88); //North
//        $data_packages2 = $this->dashboard_model->get_source_archivable(89); //South
        $data_packages = $this->dashboard_model->get_source_archivable(7); //North
        $data_packages2 = $this->dashboard_model->get_source_archivable(20); //South
        $data_packages3 = $this->dashboard_model->get_source_archivable(29); //South
        $data_packages = json_decode($data_packages[0]['value'], true);
        $data_packages2 = json_decode($data_packages2[0]['value'], true);
        $data_packages3 = json_decode($data_packages3[0]['value'], true);
        $data_packages_north = $data_packages['north']['scorecard'];
        $data_packages_south = $data_packages2['south']['scorecard'];//var_dump($data_packages3);die();
        $data_packages_system = $data_packages3['systems']['syspackage'];

        $early = round(explode("%", $data['currentEarly'])[0]);
        $late = round(explode("%", $data['currentLate'])[0]);
        $actual = round(explode("%", $data['currentActual'])[0]);
        $var_early = round(explode("w", $data['varLate'])[0]);
        $var_early = ($var_early > 0 ? "+" . $var_early : $var_early);

        $packages_data = array_merge(
            (array_map(function($i) {
                return array($i['item'] => $i['varianceLate']);
            }, $data_packages_north)), (array_map(function($i) {
                return array($i['item'] => $i['varianceLate']);
            }, $data_packages_south)), (array_map(function($i) {
                return array($i['item'] => $i['varianceLate']);
            }, $data_packages_system)));//var_dump($packages_data);die();


        //print_r(array_keys(json_encode($data[0]['value'])));die();
        $data = Array('data' => Array(
            'overall_actual' => $actual,
            'overall_early' => $early,
            'overall_late' => $late,
            'overall_variance' => $var_early,
            // 'project_spend_to_date' => 9.3, //Bil
            // 'awarded_packages' => "21.0", //Bil
            // 'pdp_reimbursables' => 972.5, //Mil
            // 'wpcs_payment' => 7.5, //Bil
            // 'retention_sum' => 316.6, //Mil
            // 'variation_orders' => 198.4, //Mil
            // 'contingency_sum' => 241.2, //Bil
            // 'vo_number' => 747,
            // 'contingency_total' => 3.2, //Bil
            'progress_date' => $date,
            'comdate' => $comdate,
            //coded by :ANCY MATHEW 22/06/2016
            //used to get comments in PS AND DS
            'comments'=>$comments,
            'summary'=>$psds_summary

            /*
              'project_value' => 36.6,
              'vo_value' => 2.5,
              'claims' => 39.1,
              'claims_paid' => 13.4,
              'claims_paid_percent' => 38,
              'vo_value_percent' => 6.8 */
        ));
        //$data = array_merge($data,$comdata);
        //
        //var_dump($comdata);die();

        foreach($comdata as $k => $v)
            $data['data'][$k] = $v;

        foreach ($packages_data as $k => $d) {
            foreach ($d as $kk => $dd)
                $data['data'][$kk] = $dd;
        }
        $this->load->view('additional/psds', $data);
    }
    public function ringComment(){
        if ($this->input->get()) {
            $data = array(
                'MESSAGE' => $this->input->get('comments'),
                'RING_NUMBER' => $this->input->get('r'),
                'TIMESTAMP' =>date('Y-m-d h:i:s')
            );
            $result = $this->dashboard_model->set_psds_comments($data);
            if($result>0){
                $data['item'] = 1;
            }else{
                $data['item'] = 0;
            }
        } else {
            return show_404();
        }
        $this->load->view('dashboard/api', $data);
    }

}
