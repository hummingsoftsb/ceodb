<?php

class Dashboard_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function login($username, $password)
    {
        $hpassword = hash('sha256', $password);
        $this->db->select('id,username,password,fullname,lastlogin,user_group');
        $this->db->from('users');
        $this->db->where(array('username' => $username));
        $query = $this->db->get();
        $user = $query->row_array();
        //var_dump($user);
        if (count($user) != 0) {
            if ($user['password'] == $hpassword) {
                /* Password available in DB, login through DB */
                $this->update_login_lastlog($user);
                $this->log_login_attempt(array('data' => 'Successfull login for user ' . $username . ' using custom user in DB', 'ip_address' => $_SERVER['REMOTE_ADDR']));
                return $user;
            } else if ($user['password'] === "") {
                $ldap = $this->login_ad($username, $password);
                /* Empty password in DB, login through AD instead */
                if ($ldap) {
                    $this->update_login_lastlog($user);
                    $this->log_login_attempt(array('data' => 'Successfull login ' . $username . ' from AD, username exists in DB', 'ip_address' => $_SERVER['REMOTE_ADDR']));
                    return $user;
                } else {
                    /* Wrong username/password in AD */
                    $this->log_login_attempt(array('data' => 'Wrong username/password for ' . $username, 'ip_address' => $_SERVER['REMOTE_ADDR']));
                    return false;
                }
            } else {
                /* Wrong password in DB */

                /* Login through AD */
                if ($ldap) {
                    $ldap = $this->login_ad($username, $password);
                    /* Login through AD */
                    $this->log_login_attempt(array('data' => 'Successfull login ' . $username . ' from AD', 'ip_address' => $_SERVER['REMOTE_ADDR']));
                    return $user;
                } else {
                    /* Nope. */
                    $this->log_login_attempt(array('data' => 'Wrong password for user ' . $username, 'ip_address' => $_SERVER['REMOTE_ADDR']));
                    return false;
                }
                return false;
            }

            // if ($user['password'] == $hpassword) {
            //     /* Password available in DB, login through DB */
            //     $this->update_login_lastlog($user);
            //     $this->log_login_attempt(array('data' => 'Successfull login for user ' . $username . ' using custom user in DB', 'ip_address' => $_SERVER['REMOTE_ADDR']));
            //     return $user;
            // } else if ($user['password'] === "") {
            //     /* Empty password in DB, login through AD instead */
            //     $ldap = $this->login_ad($username, $password);
            //     if ($ldap) {
            //         $this->update_login_lastlog($user);
            //         $this->log_login_attempt(array('data' => 'Successfull login ' . $username . ' from AD, username exists in DB', 'ip_address' => $_SERVER['REMOTE_ADDR']));
            //         return $user;
            //     } else {
            //         /* Wrong username/password in AD */
            //         $this->log_login_attempt(array('data' => 'Wrong username/password for ' . $username, 'ip_address' => $_SERVER['REMOTE_ADDR']));
            //         return false;
            //     }
            // } else {
            //     /* Wrong password in DB */

            //     /* Login through AD */
            //     $ldap = $this->login_ad($username, $password);
            //     if ($ldap) {
            //         /* Login through AD */
            //         $this->log_login_attempt(array('data' => 'Successfull login ' . $username . ' from AD', 'ip_address' => $_SERVER['REMOTE_ADDR']));
            //         return $user;
            //     } else {
            //         /* Nope. */
            //         $this->log_login_attempt(array('data' => 'Wrong password for user ' . $username, 'ip_address' => $_SERVER['REMOTE_ADDR']));
            //         return false;
            //     }
            //     return false;
            // }
        }/* Enable to allow login if the username does not exist in DB *
          else {
          $ldap = $this->login_ad($username, $password);
          if ($ldap) {
          /* User does not exist in DB, but exists in AD! *
          $user = Array(
          'id'=>'',
          'username'=>$username,
          'fullname'=>$username,
          'lastlogin'=>'');
          $this->log_login_attempt(array('data'=>'Successfull login '.$username.' from AD, username does not exist in DB','ip_address'=>$_SERVER['REMOTE_ADDR']));
          return $user;
          } else {
          /* Nope. *
          $this->log_login_attempt(array('data'=>'Unexistant username '.$username,'ip_address'=>$_SERVER['REMOTE_ADDR']));
          return false;
          }
          } */
    }

    public function login_ad($username, $password)
    {
        $backslash = strpos($username, "\\");
        $domainuser = "MYMRT\\" . (($backslash === FALSE) ? $username : substr($username, $backslash + 1));
        //$ldap = ldap_connect("eagle.office.hummingsoft.com.my"); //172.16.2.10
        $ldap = ldap_connect("172.16.2.10"); //172.16.2.10
        return ldap_bind($ldap, $domainuser, $password);

        // $ldap = ldap_connect("172.16.2.10"); //172.16.2.10
        // return ldap_bind($ldap, $domainuser, $password);
    }

    public function update_login_lastlog($user)
    {
        $this->db->where('id', $user['id']);
        $this->db->set('lastlogin', 'NOW()', FALSE);
        return $this->db->update('users');
    }

    public function log_login_attempt($data)
    {
        return $this->db->insert('users_log', $data);
    }

    public function getSlugFromPageId($id)
    {
        /* Function to return full slug including item and the page slug */
        if (!is_numeric($id)) {
            die();
        }
        $this->db->select('items.slug,pages.page');
        $this->db->from('pages');
        $this->db->join('items', 'items.id = pages.item_id');
        $this->db->where('pages.id', $id);
        $page_query = $this->db->get();
        $page_result = $page_query->result_array();
        if (sizeOf($page_result) < 1) {
            die();
        }
        $page = $page_result[0]["page"];
        $slug = $page_result[0]["slug"];
        if (($page == "") || ($slug == "")) {
            die("No full page");
        }
        $fullslug = $slug . "/" . $page;
        return $fullslug;
    }

    public function menuPermission()
    {
        //Get permission list by page.
        $this->db->select('page_id');
        $this->db->from('group_permissions');
        $this->db->where('group_id', $this->session->userdata('usergroup'));
        $query_perm = $this->db->get();

        $results_perm = $query_perm->result_array();
        foreach ($results_perm as $k => $result) {
            $permission[$k] = $result['page_id'];
        }
        //end get permission
        return $permission;
    }


    public function menuPermissionBySlugAndPage($usergroup)
    {
        $this->db->select('items.slug,pages.page');
        $this->db->from('group_permissions');
        $this->db->join('pages', 'pages.id = group_permissions.page_id');
        $this->db->join('items', 'items.id = pages.item_id');
        $this->db->where('group_id', $usergroup);
        $query = $this->db->get();

        $result = $query->result_array();

        return $result;
    }

    public function getMenu()
    {
        $this->db->select('pages.id,items.name,items.slug,pages.page,pages.page_name,pages.parent,pages.external_url, pages.hidden');
        $this->db->from('pages');
        $this->db->join('items', 'items.id = pages.item_id');
        $this->db->order_by('pages.order');
        $query = $this->db->get();

        //$query = $this->db->get_where('items', array('slug' => $item));
        $results = $query->result_array();

        $permission = $this->menuPermission();
        $permissionTree = $this->findParentMenu($results, $permission); //Menu tree to build menu list based on parent child relation.


        $menu = array();

        $count = 0;
        foreach ($results as $k => $result) {
            if (in_array($result['id'], $permissionTree)) {
                $url = $result['external_url'] == 0 ? $result['slug'] . '/' . $result['page'] : '#';
                $url = $result['slug'] == '#' ? $result['slug'] : $url;
                $urlout = $result['external_url'] == 1 ? $result['slug'] . '/' . $result['page'] : '#';
                $allow = false;
                if (in_array($result['id'], $permission))
                    $allow = true;

                if ($result['external_url'] == 1) {
                    $menu[$count] = array(
                        'id' => $result['id'],
                        'name' => $result['page_name'],
                        'url' => $url,
                        'outurl' => $urlout,
                        'parent' => (int)$result['parent'],
                        'allow' => $allow,
                        'hidden' => (bool)$result['hidden']
                    );
                } else {
                    $menu[$count] = array(
                        'id' => $result['id'],
                        'name' => $result['page_name'],
                        'url' => $url,
                        'parent' => (int)$result['parent'],
                        'allow' => $allow,
                        'hidden' => (bool)$result['hidden']
                    );
                }
                $count++;
            }
        }
        //print_r($menu);

        return $menu;
    }

    function findParentMenu($menu, $item)
    {
        $menu = array_reverse($menu);
        foreach ($menu as $m) {
            if (in_array($m['id'], $item)) {
                if ($m['parent'] != 0) {
                    if (!in_array($m['parent'], $item))
                        array_push($item, $m['parent']);
                }
            }
        }
        return $item;
    }

    function array_push_assoc($array, $key, $value)
    {
        $array[$key] = $value;
        return $array;
    }

    public function get_items($item = FALSE)
    {
        if ($item === FALSE) {
            $query = $this->db->get('items');
            if ($query) return $query->result_array();
        }

        //
        $this->db->select('type_name,meta_key,slug,title,meta_value');
        $this->db->from('items_meta');
        $this->db->join('types', 'types.id = items_meta.type_id');
        $this->db->join('items', 'items.id = items_meta.item_id');
        $this->db->where('items.slug', $item);
        $query = $this->db->get();

        //$query = $this->db->get_where('items', array('slug' => $item));
        if ($query) return $query->result_array();
    }

    public function get_items_by_types($item, $query_type = FALSE, $query_key = FALSE)
    {
        if ($query_type === FALSE || $query_key === FALSE) {
            die('No type/key given.');
        }
        if ($query_type == 'type') {
            $this->db->select('*');
            $this->db->from('items_meta');
            $this->db->join('types', 'types.id = items_meta.type_id');
            $this->db->join('items', 'items.id = items_meta.item_id');
            $this->db->where(array('types.type_name' => $query_key, 'items.slug' => $item));
        } else if ($query_type == 'meta_key') {
            $this->db->select('*');
            $this->db->from('items_meta');
            $this->db->join('types', 'types.id = items_meta.type_id');
            $this->db->join('items', 'items.id = items_meta.item_id');
            $this->db->where(array('items_meta.meta_key' => $query_key, 'items.slug' => $item));
        }

        $query = $this->db->get();

        //$query = $this->db->get_where('items', array('slug' => $item));
        return $query->row_array();
    }

    public function get_meta($arr, $itemID = FALSE)
    {
        $this->db->select('items_meta.id, title, type as type_name, items_meta.meta_group_id as meta_group_id, meta_key, pages.item_id as item_id');
        $this->db->from('meta_group');
        $this->db->join('items_meta', 'meta_group.id = items_meta.meta_group_id');
        $this->db->join('pages', 'meta_group.id = pages.meta_group_id');
        $this->db->where_in('items_meta.id', $arr);
        if ($itemID)
            $this->db->where('pages.item_id', $itemID);


        $query = $this->db->get();
//        echo "here1111";
//        /*print_r($query->result_array());*/
//        echo "here2222";
        //$query = $this->db->get_where('items', array('slug' => $item));
        if ($query) return $query->result_array();
    }

    /*
        public function get_source($id) {

            $this->db->select('name,value');
            $this->db->from('data_sources');
            $this->db->join('meta_sources', 'data_sources.id = meta_sources.source_id');
            $this->db->where_in('meta_sources.meta_group_id', $id);

            $query = $this->db->get();

            //$query = $this->db->get_where('items', array('slug' => $item));

            if ($query) return $query->result_array();
        }

    */
    public function get_date_list($slug)
    {

        $this->db->select("to_char(data_sources.date, 'DD-Mon-YY') as date", FALSE); //Postgres
        //$this->db->select("DATE_FORMAT(data_sources.date, '%d-%b-%y') as date", FALSE); //MYSQL
        $this->db->from('data_sources');
        $this->db->join('items', 'items.id = data_sources.item_id');
        $this->db->where('items.slug', $slug);
        $this->db->order_by('data_sources.date', "desc");

        $query = $this->db->get();
        //var_dump($query);
        //$query = $this->db->get_where('items', array('slug' => $item));

        if ($query) return $query->result_array();
    }

    public function get_static_source($id)
    { // Static data
        $this->db->from('data_sources_static');
        $this->db->where('data_sources_static.item_id', $id);
        $this->db->select('name,value');

        $query = $this->db->get();

        if ($query) return $query->result_array();
    }


    public function get_source_archivable($id, $date = FALSE)
    { //Archive
        $this->db->from('data_sources');
        //$this->db->join('meta_sources', 'data_sources.id = meta_sources.source_id');
        $this->db->where('data_sources.item_id', $id);

        if ($date) { //If date is selected
            $this->db->select('name,value');
            $timestamp = date('Y-m-d', strtotime($date));
            $this->db->where('DATE(data_sources.date)', $timestamp);
        } else { //Get latest record if no date is selected
            $this->db->select('name,value');
            $this->db->order_by("date", "desc");
            $this->db->limit(1);
        }

        //$this->db->limit(1); //Return the latest result only.
        $query = $this->db->get();

        //$query = $this->db->get_where('items', array('slug' => $item));

        if ($query) return $query->result_array();
    }

    public function get_item_meta($id)
    {

        $this->db->select('type_name,meta_key,title,meta_value');
        $this->db->from('items_meta');
        $this->db->join('types', 'types.id = items_meta.type_id');
        $this->db->join('items', 'items.id = items_meta.item_id');
        $this->db->where(array('items_meta.meta_key' => $meta_key, 'items.slug' => $item, 'types.type_name' => $type));

        $query = $this->db->get();

        //$query = $this->db->get_where('items', array('slug' => $item));
        return $query->row_array();
    }

    public function set_item_by_allkey($item, $type, $meta_key, $meta_value)
    {
        $log = "";
        $this->db->select('items_meta.id, items_meta.type_id, items_meta.item_id, items_meta.meta_key');
        $this->db->from('items_meta');
        $this->db->join('types', 'types.id = items_meta.type_id');
        $this->db->join('items', 'items.id = items_meta.item_id');
        $this->db->where(array('items_meta.meta_key' => $meta_key, 'items.slug' => $item, 'types.type_name' => $type));

        $query = $this->db->get();


        $get = $query->row_array();
        if (sizeOf($get) < 1) {
            /* Meta does not exist, insert. */

            /* Check item first */
            $qitem_arr = $this->db->select('id')->from('items')->where('slug', $item)->get()->row_array();
            if (sizeOf($qitem_arr) < 1) {
                /* Item does not exist, create new (should have a different function for this) */
                $newitem = Array(
                    'name' => $item,
                    'slug' => $item,
                    'parent' => 0
                );
                $this->db->insert('items', $newitem);
                $qitem = $this->db->insert_id();
                $log .= "Created item " . $qitem . "\n";
            } else {
                $qitem = $qitem_arr['id'];
            }


            /* Check types */
            $qtypes_arr = $this->db->select('id')->from('types')->where('type_name', $type)->get()->row_array();
            if (sizeOf($qtypes_arr) < 1) {
                /* Type does not exist, create new (should have a different function for this) */
                $newtype = Array(
                    'type_name' => $type
                );
                $this->db->insert('types', $newtype);
                $qtype = $this->db->insert_id();
                $log .= "Created type " . $qtype . "\n";
            } else {
                $qtype = $qtypes_arr['id'];
            }


            $newmeta = Array(
                'type_id' => $qtype,
                'item_id' => $qitem,
                'title' => 'New portlet',
                'meta_key' => $meta_key,
                'meta_value' => $meta_value
            );

            $this->db->insert('items_meta', $newmeta);
            $qmeta = $this->db->insert_id();
            $log .= "Created item_meta " . $qmeta . "\n";
        } else {
            /* Meta exists. Update */
            $newmeta = $get;
            $newmeta['meta_value'] = $meta_value;

            $this->db->where('id', $newmeta['id']);
            $this->db->update('items_meta', $newmeta);
            $log .= "Updated item_meta";
        }
        return $log;
    }

    public function getPortlet($slug, $page)
    {

        //$this->db->select('*');
        $this->db->select('items_meta.id as id,slug,pages.id as page,type,meta_key,portlet_configuration.value as value, items_meta.meta_group_id, items_meta.portlet_id, items.id as item_id, items_meta.pdf_order as order');
        $this->db->from('items');
        $this->db->join('pages', 'pages.item_id = items.id');
        $this->db->join('meta_group', 'meta_group.id = pages.meta_group_id');
        $this->db->join('items_meta', 'meta_group.id = items_meta.meta_group_id');
        $this->db->join('portlet_configuration', 'portlet_configuration.id = items_meta.portlet_id');
        $this->db->where(array('items.slug' => $slug, 'pages.page' => $page));

        $query = $this->db->get();

        //$query = $this->db->get_where('items', array('slug' => $item));
        $results = $query->result_array();

        $return = array();

        foreach ($results as $k => $result) {
            $portlet_value = json_decode($result['value']);
            //add new value to the portlet
            $portlet_value->slug = $result['slug'];
            $portlet_value->type = $result['type'];
            $portlet_value->key = $result['meta_key'];

            $return[$k]['value'] = json_encode($portlet_value);
            $return[$k]['id'] = $result['id'];
            $return[$k]['slug'] = $result['slug'];
            $return[$k]['meta_group_id'] = $result['meta_group_id'];
            $return[$k]['portlet_id'] = $result['portlet_id'];
            $return[$k]['item_id'] = $result['item_id'];
            $return[$k]['order'] = $result['order'];
        }

        //var_dump($return);
        return $return;
    }

    public function getPortletOld($slug, $page)
    {

        $this->db->select('portlet_configuration.id as id,slug,value, portlet_configuration.page_id as page');
        $this->db->from('items');
        $this->db->join('pages', 'pages.item_id = items.id');
        $this->db->join('portlet_configuration', 'portlet_configuration.page_id = pages.id');
        $this->db->where(array('items.slug' => $slug, 'pages.page' => $page));

        $query = $this->db->get();

        //$query = $this->db->get_where('items', array('slug' => $item));
        if ($query) return $query->result_array();
    }

    public function getPortletBySlug($slug)
    {

        $this->db->select('portlet_configuration.id as id,slug,value, portlet_configuration.page_id as page');
        $this->db->from('items');
        $this->db->join('pages', 'pages.item_id = items.id');
        $this->db->join('portlet_configuration', 'portlet_configuration.page_id = pages.id');
        $this->db->where(array('items.slug' => $slug));


        $query = $this->db->get();

        //$query = $this->db->get_where('items', array('slug' => $item));
        if ($query) return $query->result_array();
    }

    public function updatePortletold($portlets)
    {
        /* Because of cross-database non-interoperability of "ON DUPLICATE UPDATE", had to first determine what to update and what to insert. */
        $log = "";
        $getids = function ($a) {
            if (isset($a['id']))
                return $a['id'];
            else
                return "";
        };

        $ids = array_map($getids, $portlets);
        $this->db->select('id, portlet_id');
        $this->db->from('items_meta');
        $this->db->where_in('id', $ids);
        $query = $this->db->get();
        $result_ids = $query->result_array();
        $existing_ids = array_map(function ($a) {
            return $a['id'];
        }, $result_ids);

        $to_update = Array();
        $to_insert = Array();
        //$portlets['asd'] = Array('id'=>'21');
        foreach ($portlets as $p) {

            //{"id":"2","key":"overall_elevated","slug":"programme","type":"scurve","col":1,"row":1,"size_x":6,"size_y":1}
            $newp = Array(
                'col' => $p['col'],
                'row' => $p['row'],
                'size_x' => $p['size_x'],
                'size_y' => $p['size_y']
            );

            /* If no id specified, go to insert */
            if (isset($p['id']) && $p['id'] != "") {
                $newp['id'] = $p['id'];
            } else {
                $newp['id'] = "";
            }

            $newps = json_encode($newp);

            $pobject = Array(
                'id' => $newp['id'],
                'value' => $newps,
                'page_id' => $p['page']
            );

            if (($newp['id'] != "") && (in_array($newp['id'], $existing_ids))) {
                array_push($to_update, $pobject);
            } else {
                array_push($to_insert, $pobject);
            }
        }
        $this->db->trans_start();
        if (sizeOf($to_update) > 0) {
            $this->db->update_batch('portlet_configuration', $to_update, 'id');
        }
        if (sizeOf($to_insert) > 0) {
            $this->db->insert_batch('portlet_configuration', $to_insert);
        }
        $this->db->trans_complete();


        if ($this->db->trans_status() === TRUE) {
            $log .= sprintf('Updated %1$d records and inserted %2$d records', sizeOf($to_update), sizeOf($to_insert));
        } else {
            $log .= "Error!";
        }

        return $log;
        //print_r($to_update);
        //die();
    }

    public function updatePortlet($portlets)
    {
        /* Because of cross-database non-interoperability of "ON DUPLICATE UPDATE", had to first determine what to update and what to insert. */
        $log = "";
        $getids = function ($a) {
            if (isset($a['id']))
                return $a['id'];
            else
                return "";
        };


        /* First, query for existing items_meta */
        $ids = array_map($getids, $portlets);
        $this->db->select('id, portlet_id');
        $this->db->from('items_meta');
        $this->db->where_in('id', $ids);
        $query = $this->db->get();
        $result_ids = $query->result_array();
        $existing_ids = array_map(function ($a) {
            return $a['id'];
        }, $result_ids);
        //$existing_items = array_map(function($a){return Array($a['id'] => $a['portlet_id']);},$result_ids);
        $existing_items = Array();
        foreach ($result_ids as $r) {
            $existing_items[$r['id']] = $r['portlet_id'];
        }

        $to_update_items = Array();
        $to_update_portlets = Array();
        $to_insert_items = Array();
        $to_insert_portlets = Array();
        //$portlets['asd'] = Array('id'=>'21');


        $this->db->trans_start();

        foreach ($portlets as $p) {
            if (!isset($p['id']))
                $p['id'] = "";
            //{"id":"2","key":"overall_elevated","slug":"programme","type":"scurve","col":1,"row":1,"size_x":6,"size_y":1}
            $newp = Array(
                'col' => $p['col'],
                'row' => $p['row'],
                'size_x' => $p['size_x'],
                'size_y' => $p['size_y']
            );

            if (isset($p['screenTablet'])) {
                $newp['screenTablet'] = json_encode($p['screenTablet']);
            }

            if (isset($p['screen1024'])) {
                $newp['screen1024'] = json_encode($p['screen1024']);
            }

            /* If no id specified, go to insert */
            //if (isset($p['id']) && $p['id'] != "") { $newp['id'] = $p['id']; }
            //else { $newp['id'] = ""; }
            $pobject = Array(
                'value' => json_encode($newp)
            );
            if (isset($existing_items[$p['id']])) {
                /* Push existing portlet for update */
                //print_r($existing_items[$p['id']]);
                //die();
                $pobject['id'] = $existing_items[$p['id']];
                array_push($to_update_portlets, $pobject);
            } else {
                /* Insert a new portlet. Cannot batch it because we need the returning ID */

                $this->db->insert("portlet_configuration", $pobject);
                $pobject['id'] = $this->db->insert_id();
            }


            $iobject = Array(
                'portlet_id' => $pobject['id'],
                //'title' => $p['title'],
                'meta_group_id' => $p['meta_group_id'],
                'type' => $p['type'],
                'meta_key' => $p['key']
            );

            if (isset($p['id']))
                $iobject['id'] = $p['id'];
            if (isset($p['title']))
                $iobject['title'] = $p['title'];

            //$newps = json_encode($newp);
            //var_dump($newps);
            /*
              $pobject = Array(
              'id' => $newp['id'],
              'value' => $newps,
              'page_id' => $p['page']
              );
             */
            if (isset($p['id']) && ($p['id'] != "") && (in_array($p['id'], $existing_ids))) {
                array_push($to_update_items, $iobject);
            } else {
                array_push($to_insert_items, $iobject);
            }
        }

        if (sizeOf($to_update_portlets > 0)) {
            //var_dump($to_update_portlets);
            $this->db->update_batch('portlet_configuration', $to_update_portlets, 'id');
        }
        if (sizeOf($to_update_items) > 0) {
            $this->db->update_batch('items_meta', $to_update_items, 'id');
        }
        if (sizeOf($to_insert_items) > 0) {
            $this->db->insert_batch('items_meta', $to_insert_items);
        }
        //var_dump($this->db->queries);
        $this->db->trans_complete();


        if ($this->db->trans_status() === TRUE) {
            $log .= sprintf('Updated %1$d records and inserted %2$d records', sizeOf($to_update_items), sizeOf($to_insert_items));
        } else {
            $log .= "Error!";
        }

        return $log;
        //print_r($to_update);
        //die();
    }

    //reference functions
    public function get_news1($slug = FALSE)
    {
        if ($slug === FALSE) {
            $query = $this->db->get('news');
            if ($query) return $query->result_array();
        }

        $query = $this->db->get_where('news', array('slug' => $slug));
        return $query->row_array();
    }

    public function set_news2()
    {
        $this->load->helper('url');

        $slug = url_title($this->input->post('title'), 'dash', TRUE);

        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'text' => $this->input->post('text')
        );

        return $this->db->insert('news', $data);
    }
//    Author:Sebin Thomas
//    Usage : Get Comments
//    Created:
    public function getComment(){
        $this->db->select('*');
        $this->db->from('prognosis');
        $this->db->order_by('timestamp', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
    //    Author:Sebin Thomas
//    Usage : Get Comments
//    Created:
    public function removeComment($comment_id){
        $this->db->where('id', $comment_id);
        $ret = $this->db->delete('prognosis');
        return $ret;    }
//    Author:AncY Mathew
//    Usage : Baseline and forecast table data
//    Created: 29/04/2016
    public function getBaselineM($data_date){
        $manufacture=array();
        /*$this->db->select('*');
        $this->db->from('tbl_manf_baseline_forecast');
        $this->db->where_in('DATA_DATE',$data_date);
        $this->db->order_by('TRAIN_NO');
        $query = $this->db->get();
        return $query->result_array();*/
        $sql = "select a.\"TRAIN_NO\",a.\"BASE_DATE\",COALESCE(a.\"FORE_DATE\",'ROLLED_OUT') as fore_cast ,a.\"REV_INT\",b.\"DATA_DATE\",b.\"CAR1_NO\",b.\"CAR1_PERC\",b.\"CAR2_NO\",b.\"CAR2_PERC\",b.\"CAR3_NO\",b.\"CAR3_PERC\",b.\"CAR4_NO\",b.\"CAR4_PERC\",b.\"CAR1_ROLL_OUT\",b.\"CAR2_ROLL_OUT\",b.\"CAR3_ROLL_OUT\",b.\"CAR4_ROLL_OUT\" from \"tbl_manf_baseline_forecast\" a LEFT OUTER JOIN \"tbl_puzhen_manufacture\" b on a.\"TRAIN_NO\" = b.\"TRAIN_NO\" and a.\"DATA_DATE\" = b.\"DATA_DATE\"  where a.\"DATA_DATE\" = '$data_date' order by a.\"TRAIN_NO\"";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        $i=0;
        foreach($result as $key=> $val){
            $manufacture[$i]["TRAIN_NO"] =$val['TRAIN_NO'];
            $manufacture[$i]["BASE_DATE"] =$val['BASE_DATE'];
            $manufacture[$i]["FORE_DATE"] =$val['fore_cast'];
            $manufacture[$i]["REV_INT"] =$val['REV_INT'];
            $manufacture[$i]["CAR1_PERC"] =$val['CAR1_PERC'];
            $manufacture[$i]["CAR2_PERC"] =$val['CAR2_PERC'];
            $manufacture[$i]["CAR3_PERC"] =$val['CAR3_PERC'];
            $manufacture[$i]["CAR4_PERC"] =$val['CAR4_PERC'];
            $i++;
        }
        return $manufacture;
    }
//    Author: Ancy Mathew, Sebin Thomas
//    Usage : Get Train Data [manufacturing,assembly,subd,kjd].
//    Created: 04/05/2016
    public function getTrainData($data_date)
    {
        $rel = array(
            "manufacturing" => array(),
            "assembly" => array(),
            "subd" => array(),
            "kjd" => array(),
            "fore_date"=>array()

        );
       /* $this->db->select('TRAIN_NO,CAR1_NO,CAR1_PERC,CAR2_NO,CAR2_PERC,CAR3_NO,CAR3_PERC,CAR4_NO,CAR4_PERC,CAR1_ROLL_OUT,CAR2_ROLL_OUT,CAR3_ROLL_OUT,CAR4_ROLL_OUT');
        $this->db->from('tbl_puzhen_manufacture');
        $this->db->where_in('DATA_DATE',$data_date);
        $this->db->order_by('TRAIN_NO');*/
        $sql = "select a.\"TRAIN_NO\",a.\"CAR1_NO\",a.\"CAR1_PERC\",a.\"CAR2_NO\",a.\"CAR2_PERC\",a.\"CAR3_NO\",a.\"CAR3_PERC\",a.\"CAR4_NO\",a.\"CAR4_PERC\",a.\"CAR1_ROLL_OUT\",a.\"CAR2_ROLL_OUT\",a.\"CAR3_ROLL_OUT\",a.\"CAR4_ROLL_OUT\",COALESCE(b.\"FORE_DATE\",'ROLLED_OUT') as fore_cast from \"tbl_puzhen_manufacture\" a LEFT OUTER JOIN \"tbl_manf_baseline_forecast\" b on a.\"TRAIN_NO\" = b.\"TRAIN_NO\" and  a.\"DATA_DATE\" = b.\"DATA_DATE\" where a.\"DATA_DATE\" = '$data_date' order by a.\"TRAIN_NO\"";
        $query = $this->db->query($sql);
        $result = $query->result_array();
      /*  $query = $this->db->get();
        $result=$query->result_array();*/

        /*$this->db->select('TRAIN_NO,CAR1_NO,CAR1_PERC,CAR2_NO,CAR2_PERC,CAR3_NO,CAR3_PERC,CAR4_NO,CAR4_PERC,CAR1_ARRIVED,CAR2_ARRIVED,CAR3_ARRIVED,CAR4_ARRIVED');
        $this->db->from('tbl_SMH_Assmbly_Progress');
        $this->db->where_in("DATA_DATE",$data_date);
        $query = $this->db->get();*/
        $sql = "select a.\"TRAIN_NO\",a.\"CAR1_NO\",a.\"CAR1_PERC\",a.\"CAR2_NO\",a.\"CAR2_PERC\",a.\"CAR3_NO\",a.\"CAR3_PERC\",a.\"CAR4_NO\",a.\"CAR4_PERC\",a.\"CAR1_ARRIVED\",a.\"CAR2_ARRIVED\",a.\"CAR3_ARRIVED\",a.\"CAR4_ARRIVED\",COALESCE(b.\"FORE_DATE\",'ROLLED_OUT') as fore_cast from \"tbl_SMH_Assmbly_Progress\" a LEFT OUTER JOIN \"tbl_assembly_baseline_forecast\" b on a.\"TRAIN_NO\" = b.\"TRAIN_NO\" and a.\"DATA_DATE\" = b.\"DATA_DATE\"  where a.\"DATA_DATE\" = '$data_date' order by a.\"TRAIN_NO\"";
       // echo 'take';
        //echo $sql;
        $query = $this->db->query($sql);
       /* $result = $query->result_array();*/
        $result1=$query->result_array();
//        $this->db->select('TRAIN_FROM,TRAIN_TO,CAR1,CAR2,CAR3,CAR4,DATE_DELIVERED,COMMENTS,H_MANUFACTURED,H_ASSEMBLY');
//        $this->db->from('tbl_SUBD_DT_CS');
//        $this->db->where_in("DATA_DATE",$data_date);
//        $this->db->order_by('TRAIN_FROM');
//        $query = $this->db->get();
//        $subd=$query->result_array();

        $sql = "Select \"TRAIN_FROM\",\"TRAIN_TO\",COALESCE(\"CAR1\",'1000') AS CAR1,COALESCE(\"CAR2\",'1001') AS CAR2,COALESCE(\"CAR3\",'1002') AS CAR3,COALESCE(\"CAR4\",'1003') AS CAR4,\"DATE_DELIVERED\",\"COMMENTS\",\"H_MANUFACTURED\",\"H_ASSEMBLY\" from \"tbl_SUBD_DT_CS\" WHERE \"DATA_DATE\"='$data_date' order by \"TRAIN_FROM\"";
        //echo $sql;
        $query = $this->db->query($sql);
        $subd = $query->result_array();

        $this->db->select('TRAIN_FROM,TRAIN_TO,CAR1,CAR2,CAR3,CAR4,DATE_DELIVERED,COMMENTS,H_MANUFACTURED,H_ASSEMBLY');
        $this->db->from('tbl_KJD_DT_CS');
        $this->db->where_in("DATA_DATE",$data_date);
        //$this->db->order_by('KJD_MASTER_ID');
        $query = $this->db->get();
        $kjd=$query->result_array();
        /*$sql = "select \"TRAIN_NO\",\"FORE_DATE\" from tbl_assembly_baseline_forecast where \"DATA_DATE\"='$data_date' order by \"TRAIN_NO\"";
        $query = $this->db->query($sql);
        $final = $query->result_array();
        $i=0;
        foreach($final as $key=> $val1){
            $rel[$i]["fore_date"] =array("FOR_TRAIN"=>$val1['TRAIN_NO'],"FORE_DATE"=>$val1['FORE_DATE']);
            $i++;
        }*/
        foreach($result as $key=> $val){
                $rel["manufacturing"]["Train ".$val['TRAIN_NO']]=array(
                    "cars"=>array(
                        $val['CAR1_NO']=>array(
                            "progress"=>($val['CAR1_PERC']==null)?0:$val['CAR1_PERC'],
                            "rollout"=>($val['CAR1_ROLL_OUT']==null)?'':$val['CAR1_ROLL_OUT'],
                            "foreDate"=>($val['fore_cast']==null)?'':$val['fore_cast']
                        ),
                        $val['CAR2_NO']=>array(
                            "progress"=>($val['CAR2_PERC']==null)?0:$val['CAR2_PERC'],
                            "rollout"=>($val['CAR2_ROLL_OUT']==null)?'':$val['CAR2_ROLL_OUT'],
                            "foreDate"=>($val['fore_cast']==null)?'':$val['fore_cast']
                        ),
                        $val['CAR3_NO']=>array(
                            "progress"=>($val['CAR3_PERC']==null)?0:$val['CAR3_PERC'],
                            "rollout"=>($val['CAR3_ROLL_OUT']==null)?'':$val['CAR3_ROLL_OUT'],
                            "foreDate"=>($val['fore_cast']==null)?'':$val['fore_cast']
                        ),
                        $val['CAR4_NO']=>array(
                            "progress"=>($val['CAR4_PERC']==null)?0:$val['CAR4_PERC'],
                            "rollout"=>($val['CAR4_ROLL_OUT']==null)?'':$val['CAR4_ROLL_OUT'],
                            "foreDate"=>($val['fore_cast']==null)?'':$val['fore_cast']
                        )
                )
            );
        }
        foreach ($result1 as $key => $val1) {
            $rel["assembly"]["Train " . $val1['TRAIN_NO']] = array(
                "delivery"=>"",
                "cars" => array(
                    $val1['CAR1_NO'] => array(
                        "progress" =>($val1['CAR1_PERC']==null)?0:$val1['CAR1_PERC'],
                        "rollout" => "",
                        "arrived" => ($val1['CAR1_ARRIVED']==null)?'':$val1['CAR1_ARRIVED'],
                        "foreDateA"=>($val1['fore_cast']==null)?'':$val1['fore_cast']
                    ),
                    $val1['CAR2_NO'] => array(
                        "progress" =>($val1['CAR2_PERC']==null)?0:$val1['CAR2_PERC'],
                        "rollout" => "",
                        "arrived" => ($val1['CAR2_ARRIVED']==null)?'':$val1['CAR2_ARRIVED'],
                        "foreDateA"=>($val1['fore_cast']==null)?'':$val1['fore_cast']
                    ),
                    $val1['CAR3_NO'] => array(
                        "progress" =>($val1['CAR3_PERC']==null)?0:$val1['CAR3_PERC'],
                        "rollout" => "",
                        "arrived" => ($val1['CAR3_ARRIVED']==null)?'':$val1['CAR3_ARRIVED'],
                        "foreDateA"=>($val1['fore_cast']==null)?'':$val1['fore_cast']
                    ),
                    $val1['CAR4_NO'] => array(
                        "progress" =>($val1['CAR4_PERC']==null)?0:$val1['CAR4_PERC'],
                        "rollout" => "",
                        "arrived" => ($val1['CAR4_ARRIVED']==null)?'':$val1['CAR4_ARRIVED'],
                        "foreDateA"=>($val1['fore_cast']==null)?'':$val1['fore_cast']
                    )

                )
            );
        }

        foreach($subd as $key=> $subd_val){
            if($subd_val["TRAIN_FROM"]!='' && $subd_val["TRAIN_TO"]!=''){
                $rel["subd"]["Train " . $subd_val['TRAIN_FROM']." - Train ". $subd_val['TRAIN_TO']] = array(
                    "delivery"=>$subd_val["DATE_DELIVERED"],
                    "testingcompleted"=>$subd_val['COMMENTS'],
                    "cars" => array(
                        " ".$subd_val['car1'] => array(
                            "progress" => "",
                            "rollout" => "",
                            "arrived" => "",
                            "history" => array(
                                "manufacturing"=>"",
                                "assembly"=>"",
                            )
                        ),
                        " ".$subd_val['car2'] => array(
                            "progress" => "",
                            "rollout" => "",
                            "arrived" => "",
                            "history" => array(
                                "manufacturing"=>"",
                                "assembly"=>"",
                            )
                        ),
                        " ".$subd_val['car3'] => array(
                            "progress" => "",
                            "rollout" => "",
                            "arrived" => "",
                            "history" => array(
                                "manufacturing"=>"",
                                "assembly"=>"",
                            )
                        ),
                        " ".$subd_val['car4'] => array(
                            "progress" => "",
                            "rollout" => "",
                            "arrived" => "",
                            "history" => array(
                                "manufacturing"=>"",
                                "assembly"=>"",
                            )
                        )

                    )
                );
            }else {
                $rel["subd"]["Train " . $subd_val['TRAIN_FROM']] = array(
                    "delivery"=>$subd_val["DATE_DELIVERED"],
                    "testingcompleted"=>($subd_val['COMMENTS']==null)?'':$subd_val['COMMENTS'],
                    "cars" => array(
                        " ".$subd_val['car1'] => array(
                            "progress" => "",
                            "rollout" => "",
                            "arrived" => "",
                            "history" => array(
                                "manufacturing"=>"Train " . $subd_val['H_MANUFACTURED'],
                                "assembly"=>"Train " . $subd_val['H_ASSEMBLY'],
                                "car"=>$subd_val['car1']
                            )
                        ),
                        " ".$subd_val['car2'] => array(
                            "progress" => "",
                            "rollout" => "",
                            "arrived" => "",
                            "history" => array(
                                "manufacturing"=>"Train " . $subd_val['H_MANUFACTURED'],
                                "assembly"=>"Train " . $subd_val['H_ASSEMBLY'],
                                "car"=>$subd_val['car2']
                            )
                        ),
                        " ".$subd_val['car3'] => array(
                            "progress" => "",
                            "rollout" => "",
                            "arrived" => "",
                            "history" => array(
                                "manufacturing"=>"Train " . $subd_val['H_MANUFACTURED'],
                                "assembly"=>"Train " . $subd_val['H_ASSEMBLY'],
                                "car"=>$subd_val['car3']
                            )
                        ),
                        " ".$subd_val['car4'] => array(
                            "progress" => "",
                            "rollout" => "",
                            "arrived" => "",
                            "history" => array(
                                "manufacturing"=>"Train " . $subd_val['H_MANUFACTURED'],
                                "assembly"=>"Train " . $subd_val['H_ASSEMBLY'],
                                "car"=>$subd_val['car4']
                            )
                        )

                    )
                );
            }
        }
        foreach($kjd as $key=> $kjd_val){
        if($kjd_val["TRAIN_FROM"]!='' && $kjd_val["TRAIN_TO"]!=''){
            $rel["kjd"]["Train " . $kjd_val['TRAIN_FROM']." - Train ". $kjd_val['TRAIN_TO']] = array(
                "delivery"=>$kjd_val["DATE_DELIVERED"],
                "testingcompleted"=>$kjd_val['COMMENTS'],
                "cars" => array(
                    " ".$kjd_val['CAR1'] => array(
                        "progress" => "",
                        "rollout" => "",
                        "arrived" => ""
                    ),
                    " ".$kjd_val['CAR2'] => array(
                        "progress" => "",
                        "rollout" => "",
                        "arrived" => ""
                    ),
                    " ".$kjd_val['CAR3'] => array(
                        "progress" => "",
                        "rollout" => "",
                        "arrived" => ""
                    ),
                    " ".$kjd_val['CAR4'] => array(
                        "progress" => "",
                        "rollout" => "",
                        "arrived" => ""
                    )

                )
            );
        }else {
            $rel["kjd"]["Train " . $kjd_val['TRAIN_FROM']] = array(
                "delivery"=>$kjd_val["DATE_DELIVERED"],
                "testingcompleted"=>$kjd_val['COMMENTS'],
                "cars" => array(
                    " ".$kjd_val['CAR1'] => array(
                        "progress" => "",
                        "rollout" => "",
                        "arrived" => ""
                    ),
                    " ".$kjd_val['CAR2'] => array(
                        "progress" => "",
                        "rollout" => "",
                        "arrived" => ""
                    ),
                    " ".$kjd_val['CAR3'] => array(
                        "progress" => "",
                        "rollout" => "",
                        "arrived" => ""
                    ),
                    " ".$kjd_val['CAR4'] => array(
                        "progress" => "",
                        "rollout" => "",
                        "arrived" => ""
                    )

                )
            );
        }
    }
        return $rel;
    }
public function getOverallProgress($data_date){
        $overall = array();
        $this->db->select('TRAIN_NO,OPEN_JOBS,CLOSED_JOBS');
        $this->db->from('tbl_overall_progress');
        $this->db->where_in("DATA_DATE",$data_date);
        $this->db->order_by('TRAIN_NO');
        $query = $this->db->get();
        $result=$query->result_array();
        $i=0;
        foreach($result as $key=> $val){
            $overall[$i]["OPEN_JOBS"] =$val['OPEN_JOBS'];
            $overall[$i]["CLOSED_JOBS"] =$val['CLOSED_JOBS'];
            $overall[$i]["TRAIN_NO"] =$val['TRAIN_NO'];
            $i++;
        }
        return $overall;
//        return
    }

    public function getOutStandingProgress($data_date){
        $outstand = array();
        $sql="select \"OUT_DATE\",\"JOBS_DONE\",\"TARGET\" FROM tbl_outstanding_item_progress WHERE \"DATA_DATE\"='$data_date' ORDER BY TO_DATE(\"OUT_DATE\", 'DD-Mon-YYYY')";
/*        $this->db->select('OUT_DATE,JOBS_DONE,TARGET');
        $this->db->from('tbl_outstanding_item_progress');
        $this->db->where_in("DATA_DATE",$data_date);
        $this->db->order_by((to_date("OUT_DATE", 'DD-Mon-YYYY')));
        $query = $this->db->get();*/
        $query = $this->db->query($sql);
        $result=$query->result_array();
        $i=0;
        foreach($result as $key=> $val){
            $outstand[$i]["JOBS_DONE"] =$val['JOBS_DONE'];
            $outstand[$i]["TARGET"] =$val['TARGET'];
            $outstand[$i]["OUT_DATE"] =$val['OUT_DATE'];
            $i++;
        }
        return $outstand;
//        return
    }
//    Author:Sebin Thomas
//    Usage : Store Comments
//    Created:
    public function setComment($data)
    {
        $this->db->insert('prognosis', $data);
        return $this->db->affected_rows();

    }
//    Author:AncY Mathew
//    Usage : Baseline and forecast table data for assembly progress
//    Created: 29/04/2016
    public function getBaselineAssembly($data_date)
    {
        $manufacture=array();
        $sql = "select a.\"TRAIN_NO\",a.\"BASE_DATE\",COALESCE(a.\"FORE_DATE\",'ROLLED_OUT') as fore_cast ,a.\"REV_INT\",b.\"DATA_DATE\",b.\"CAR1_NO\",b.\"CAR2_NO\",b.\"CAR3_NO\",b.\"CAR4_NO\",b.\"CAR4_PERC\" , b.\"CAR3_PERC\" ,b.\"CAR2_PERC\" , b.\"CAR1_PERC\" from \"tbl_assembly_baseline_forecast\" a LEFT OUTER JOIN \"tbl_SMH_Assmbly_Progress\" b on a.\"TRAIN_NO\" = b.\"TRAIN_NO\" and a.\"DATA_DATE\" = b.\"DATA_DATE\"  where a.\"DATA_DATE\" = '$data_date' order by a.\"TRAIN_NO\"";
        //echo $sql;
        $query = $this->db->query($sql);
        $result = $query->result_array();
        $i=0;
        foreach($result as $key=> $val){
            $manufacture[$i]["TRAIN_NO"] =$val['TRAIN_NO'];
            $manufacture[$i]["BASE_DATE"] =$val['BASE_DATE'];
            $manufacture[$i]["FORE_DATE"] =$val['fore_cast'];
            $manufacture[$i]["REV_INT"] =$val['REV_INT'];
            $manufacture[$i]["CAR1_PERC"] =$val['CAR1_PERC'];
            $manufacture[$i]["CAR2_PERC"] =$val['CAR2_PERC'];
            $manufacture[$i]["CAR3_PERC"] =$val['CAR3_PERC'];
            $manufacture[$i]["CAR4_PERC"] =$val['CAR4_PERC'];
            $i++;
        }
        return $manufacture;
       /* $this->db->select('*');
        $this->db->from('tbl_assembly_baseline_forecast');
        $this->db->where_in("DATA_DATE",$data_date);
        $this->db->order_by('TRAIN_NO');
        $query = $this->db->get();
        return $query->result_array();*/
    }

//    Author:Agaile Victor
//    Usage : Testing reports of 58 trains
//    Created: 09/05/2016
    public function GetTestingData($data_date)
    {
        //$sql = "Select \"TRAIN_NO\",\"Static_Total\",\"Static_Pass\",\"Static_Incomplete\",\"Static_Fail\",\"Dynamic_Total\",\"Dynamic_Pass\",\"Dynamic_Incomplete\",\"Dynamic_Fail\",\"SAT_Total\",\"SAT_Incomplete\",\"SAT_Fail\",\"IT_Incomplete\",\"IT_Total\",\"SAT_Pass\",\"IT_Fail\",\"SIT_Pass\",\"SIT_Total\",\"SIT_Incomplete\",\"SIT_Fail\",\"IT_Pass\" from \"tbl_testing_completion\" WHERE \"DATA_DATE\"='$data_date' order by to_number(split_part(\"TRAIN_NO\", ' ', 2), '99G999D9S')";
        $sql = "Select 'Train ' ||\"TRAIN_NO\" as TRAIN_NO,\"Static_Total\",\"Static_Pass\",\"Static_Incomplete\",\"Static_Fail\",\"Dynamic_Total\",\"Dynamic_Pass\",\"Dynamic_Incomplete\",\"Dynamic_Fail\",\"SAT_Total\",\"SAT_Pass\",\"SAT_Incomplete\",\"SAT_Fail\",\"IT_Total\",\"IT_Pass\",\"IT_Incomplete\",\"IT_Fail\",\"SIT_Total\",\"SIT_Pass\",\"SIT_Incomplete\",\"SIT_Fail\" from \"tbl_testing_completion\" WHERE \"DATA_DATE\"='$data_date' order by \"TRAIN_NO\"";
        //echo $sql;
        $query = $this->db->query($sql);
        $final = $query->result_array();
        return $final;
    }

    public function getFullyCompletedTrain($data_date)
    {
        $outFully=array();
        //$sql = "select \"TRAIN_NO\"from tbl_testing_completion where \"Static_Total\"=\"Static_Pass\" and \"Dynamic_Total\"=\"Dynamic_Pass\" and \"SAT_Total\"=\"SAT_Pass\" and \"SIT_Total\" = \"SIT_Pass\" and \"IT_Total\"=\"IT_Pass\" and \"TRAIN_NO\" in(select \"TRAIN_NO\" from tbl_overall_progress  where \"DATA_DATE\" = '$data_date' and \"OPEN_JOBS\" =0 and \"CLOSED_JOBS\" !=0 order by \"TRAIN_NO\")and \"DATA_DATE\" = '$data_date'";
        $sql = "select \"TRAIN_NO\" from tbl_testing_completion where \"Static_Total\"=\"Static_Pass\" and COALESCE(\"Static_Incomplete\",'0')='0' and COALESCE(\"Static_Fail\",'0') = '0' and \"Dynamic_Total\"=\"Dynamic_Pass\" and COALESCE(\"Dynamic_Incomplete\",'0')='0' and COALESCE(\"Dynamic_Fail\",'0')='0' and \"SAT_Total\"=\"SAT_Pass\" and COALESCE(\"SAT_Incomplete\",'0')='0' and COALESCE(\"SAT_Fail\",'0')='0' and \"SIT_Total\" = \"SIT_Pass\" and COALESCE(\"SIT_Incomplete\",'0')='0' and COALESCE(\"SIT_Fail\",'0')='0'  and \"IT_Total\"=\"IT_Pass\" and COALESCE(\"IT_Incomplete\",'0')='0' and COALESCE(\"IT_Fail\",'0')='0' and \"TRAIN_NO\" in(select \"TRAIN_NO\" from tbl_overall_progress  where \"DATA_DATE\" = '$data_date' and \"CLOSED_JOBS\" !=0 and \"OPEN_JOBS\" =0 order by \"TRAIN_NO\")and \"DATA_DATE\" = '$data_date' order by \"TRAIN_NO\"";
        $query = $this->db->query($sql);
        $final = $query->result_array();
        $i=0;
        foreach($final as $key=> $val){
            $outFully[$i]["TRAIN_NO"] =$val['TRAIN_NO'];
            $i++;
        }
        $trainData = "select \"TRAIN_NO\",\"OPEN_JOBS\",\"CLOSED_JOBS\" from tbl_overall_progress  where \"DATA_DATE\" = '$data_date' and \"CLOSED_JOBS\" !=0 and \"OPEN_JOBS\" =0 order by \"TRAIN_NO\"";
        $query = $this->db->query($trainData);
        $finalData = $query->result_array();
        $j=0;
        foreach($finalData as $key=> $val){
            $outFully[$j]["TRAIN_NUMBER"] =$val['TRAIN_NO'];
            $outFully[$j]["OPEN_JOBS"] =$val['OPEN_JOBS'];
            $outFully[$j]["CLOSED_JOBS"] =$val['CLOSED_JOBS'];
            $j++;
        }
        return $outFully;
    }

}
