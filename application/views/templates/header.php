<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width" />
        <title><?php echo $title; ?> - MPXD</title>
        <script src="<?php echo $this->config->base_url(); ?>assets/jquery-1.11.1.min.js"></script>
        <!--jsImageslider-->
        <link media="screen, print" rel="stylesheet" href="<?php echo $this->config->base_url(); ?>assets/js/plugins/jsImageSlider/js-image-slider.css" />
		<!--[if lt IE 9]>
		  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->


        <meta http-equiv=Content-Type content="text/html; charset=utf-8" />
        <!--<link rel=icon type=image/ico href="<?php echo $this->config->base_url(); ?>assets/favicon.html"/>-->
        <link media="screen, print" href=<?php echo $this->config->base_url(); ?>assets/css/stylesheets.css rel=stylesheet type=text/css />
        <link media="screen, print" href=<?php echo $this->config->base_url(); ?>assets/css/simple-sidebar.css rel=stylesheet type=text/css />
        <link media="screen, print" rel="stylesheet" href="<?php echo $this->config->base_url(); ?>assets/css/slippry.css">
        <link media="screen, print" rel="stylesheet" href="<?php echo $this->config->base_url(); ?>assets/css/jquery.gridster.css">
        <link media="screen, print" rel="stylesheet" href="<?php echo $this->config->base_url(); ?>assets/css/custom.css">
        <link media="screen, print" rel="stylesheet" href="<?php echo $this->config->base_url(); ?>assets/css/menuzord.css">
        <!--<link rel="stylesheet" href="<?php echo $this->config->base_url(); ?>assets/css/sidebar-style5.css">-->
        <link media="screen, print" rel="stylesheet" href="<?php echo $this->config->base_url(); ?>assets/custom-scrollbar/jquery.mCustomScrollbar.css">
		<link media="screen, print" rel="stylesheet" href="<?php echo $this->config->base_url(); ?>assets/css/leaflet.css" />
		<link media="screen, print" rel="stylesheet" href="<?php echo $this->config->base_url(); ?>assets/css/leaflet.awesome-markers.css" />
		<link media="screen, print" rel="stylesheet" href="https://code.jquery.com/ui/1.11.2/themes/flick/jquery-ui.css" />
		<link media="screen, print" rel="stylesheet" href="<?php echo $this->config->base_url(); ?>assets/plugin/wb-popover/jquery.webui-popover.css" />
        <link media="screen, print" rel="stylesheet" href="<?php echo $this->config->base_url(); ?>assets/css/font-awesome-animation.min.css" rel="stylesheet" type="text/css" />
        <!--<link rel="stylesheet" href="<?php echo $this->config->base_url(); ?>assets/MultiLevelPushMenu/css/pushmenu.css">-->
		<script>
                        var permission = <?php echo json_encode($permission); ?>;
			var pages = <?php echo json_encode($menu); ?>;
			
			var pagess = [
				{"id": 1, "name": "Home", "url": "#", "outurl": "front/", "parent": 0},
				{"id": 2, "name": "Programme", "url": "#", "parent": 0},
				{"id": 24, "name": "Summary", "url": "#", "outurl": "front/", "parent": 2},
				{"id": 3, "name": "Elevated", "url": "#", "parent": 2},
				{"id": 4, "name": "North", "url": "north/index", "parent": 3 },
				{"id": 5, "name": "V1", "url": "v1/index", "parent": 4},
				{"id": 6, "name": "V2", "url": "v2/index", "parent": 4},
				{"id": 7, "name": "V3", "url": "v3/index", "parent": 4},
				{"id": 8, "name": "V4", "url": "v4/index", "parent": 4},
				{"id": 9, "name": "DPT1", "url": "dpt1/index", "parent": 4},
				//{"id": 10, "name": "SBG (N)", "url": "#", "parent": 4},
				{"id": 11, "name": "South", "url": "south/index", "parent": 3},
				{"id": 12, "name": "V5", "url": "v5/index", "parent": 11},
				{"id": 13, "name": "V6", "url": "v6/index", "parent": 11},
				{"id": 14, "name": "V7", "url": "v7/index", "parent": 11},
				{"id": 15, "name": "V8", "url": "v8/index", "parent": 11},
				//{"id": 111, "name": "V9", "url": "v9/index", "parent": 11}, //TEST
				{"id": 16, "name": "DPT2", "url": "dpt2/index", "parent": 11},
				//{"id": 17, "name": "SBG (S)", "url": "#", "parent": 11},
				{"id": 19, "name": "Underground", "url": "ug/index", "parent": 2},
				{"id": 39, "name": "Underground", "url": "ug/index", "parent": 19},
				{"id": 40, "name": "Tunnel", "url": "ug/tunnel", "parent": 39},
				{"id": 38, "name": "System", "url": "systems/index", "parent": 2},
				{"id": 20, "name": "Procurement", "url": "procurement/summary", "parent": 0},
				{"id": 21, "name": "HSSE", "url": "#", "parent": 0, "hidden": true},
				//{"id": 22, "name": "Commercial", "url": "#", "parent": 0},
				{"id": 23, "name": "Risk Management", "url": "#", "parent": 21},
				{"id": 25, "name": "S-Curves", "url": "programme/scurve", "parent": 24},
				/*{"id": 26, "name": "Summary", "url": "", "outurl": "front/", "parent": 24},*/
				{"id": 28, "name": "Summary", "url": "procurement/summary", "parent": 20},
				{"id": 29, "name": "Awarded", "url": "procurement/awarded", "parent": 28},
				{"id": 73, "name": "Called & In Progress", "url": "procurement/called", "parent": 28},
				{"id": 72, "name": "Yet To Be Tendered", "url": "procurement/yetcalled", "parent": 28},
				//Hidden Menu
				{"id": 27, "name": "Kota Damansara", "url": "kota-damansara/index", "hidden": true, "parent": 6},
				{"id": 41, "name": "Sungai Buloh", "url": "sungai-buloh/index", "hidden": true, "parent": 5},
				{"id": 42, "name": "Kampung Selamat", "url": "kampung-selamat/index", "hidden": true, "parent": 5},
				{"id": 43, "name": "Kwasa Damansara", "url": "kwasa-damansara/index", "hidden": true, "parent": 5},
				{"id": 44, "name": "Kwasa Sentral", "url": "kwasa-sentral/index", "hidden": true, "parent": 6},
				{"id": 46, "name": "Surian", "url": "surian/index", "hidden": true, "parent": 6},
				{"id": 47, "name": "Bandar Utama", "url": "bandar-utama/index", "hidden": true, "parent": 7},
				{"id": 48, "name": "TTDI", "url": "ttdi/index", "hidden": true, "parent": 7},
				{"id": 49, "name": "Mutiara Damansara", "url": "mutiara-damansara/index", "hidden": true, "parent": 7},
				{"id": 50, "name": "Phileo Damansara", "url": "phileo-damansara/index", "hidden": true, "parent": 8},
				{"id": 51, "name": "Pusat Bandar Damansara", "url": "pusat-bandar-damansara/index", "hidden": true, "parent": 8},
				{"id": 52, "name": "Semantan", "url": "semantan/index", "hidden": true, "parent": 8},
				{"id": 53, "name": "Taman Mutiara", "url": "taman-mutiara/index", "hidden": true, "parent": 12},
				{"id": 54, "name": "Taman Connaught", "url": "taman-connaught/index", "hidden": true, "parent": 12},
				{"id": 55, "name": "Taman Pertama", "url": "taman-pertama/index", "hidden": true, "parent": 12},
				{"id": 56, "name": "Taman Midah", "url": "taman-midah/index", "hidden": true, "parent": 12},
				{"id": 57, "name": "Bandar Tun Hussein Onn", "url": "bandar-tun-hussein-onn/index", "hidden": true, "parent": 13},
				{"id": 58, "name": "Sri Raya", "url": "sri-raya/index", "hidden": true, "parent": 13},
				{"id": 59, "name": "Taman Suntex", "url": "taman-suntex/index", "hidden": true, "parent": 13},
				{"id": 60, "name": "Taman Koperasi Cuepacs", "url": "taman-koperasi-cuepacs/index", "hidden": true, "parent": 14},
				{"id": 61, "name": "Bukit Dukung", "url": "bukit-dukung/index", "hidden": true, "parent": 14},
				{"id": 74, "name": "Sungai Kantan", "url": "sungai-kantan/index", "hidden": true, "parent": 15},
				{"id": 75, "name": "Bandar Kajang", "url": "bandar-kajang/index", "hidden": true, "parent": 15},
				{"id": 76, "name": "Kajang", "url": "kajang/index", "hidden": true, "parent": 15},
				{"id": 30, "name": "V1 Gallery", "url": "v1/gallery", "hidden": true, "parent": 5},
				{"id": 31, "name": "V2 Gallery", "url": "v2/gallery", "hidden": true, "parent": 6},
				{"id": 32, "name": "V3 Gallery", "url": "v3/gallery", "hidden": true, "parent": 7},
				{"id": 33, "name": "V4 Gallery", "url": "v4/gallery", "hidden": true, "parent": 8},
				{"id": 34, "name": "V5 Gallery", "url": "v5/gallery", "hidden": true, "parent": 12},
				{"id": 35, "name": "V6 Gallery", "url": "v6/gallery", "hidden": true, "parent": 13},
				{"id": 36, "name": "V7 Gallery", "url": "v7/gallery", "hidden": true, "parent": 14},
				{"id": 37, "name": "V8 Gallery", "url": "v8/gallery", "hidden": true, "parent": 15},
				{"id": 62, "name": "Depot 1 Gallery", "url": "dpt1/gallery", "hidden": true, "parent": 9},
				{"id": 63, "name": "Depot 2 Gallery", "url": "dpt2/gallery", "hidden": true, "parent": 16},
				{"id": 71, "name": "Station", "url": "#", "hidden": false, "parent": 39},
				{"id": 64, "name": "Muzium Negara", "url": "muzium-negara/index", "hidden": false, "parent": 71},
				{"id": 65, "name": "Pasar Seni", "url": "pasar-seni/index", "hidden": false, "parent": 71},
				{"id": 66, "name": "Merdeka", "url": "merdeka/index", "hidden": false, "parent": 71},
				{"id": 67, "name": "Bukit Bintang", "url": "bukit-bintang/index", "hidden": false, "parent": 71},
				{"id": 68, "name": "Tun Razak Exchange", "url": "tun-razak-exchange/index", "hidden": false, "parent": 71},
				{"id": 69, "name": "Cochrane", "url": "cochrane/index", "hidden": false, "parent": 71},
				{"id": 70, "name": "Maluri", "url": "maluri/index", "hidden": false, "parent": 71},
				{"id": 77, "name": "V1 Piers", "url": "v1/piers", "hidden": false, "parent": 5},
				{"id": 78, "name": "V1 Single Pier", "url": "v1/singlepiers", "hidden": true, "parent": 77},
				{"id": 79, "name": "V1 Single Pier", "url": "v1/doublepiers", "hidden": true, "parent": 77},
				{"id": 72, "name": "SBK-S-02", "url": "sbk-s-02/index", "hidden": false, "parent": 38}
				//CURRENT ID : 76
			];
		</script>
        <script type=text/javascript src=<?php echo $this->config->base_url(); ?>assets/js/plugins/jquery/jquery.min.js></script>
        <script type=text/javascript src=<?php echo $this->config->base_url(); ?>assets/js/plugins/jquery/jquery-ui.min.js></script>
        <script type=text/javascript src=<?php echo $this->config->base_url(); ?>assets/js/plugins/jquery/jquery-migrate.min.js></script>
        <script type=text/javascript src=<?php echo $this->config->base_url(); ?>assets/js/plugins/jquery/globalize.js></script>
        <script type=text/javascript src=<?php echo $this->config->base_url(); ?>assets/js/plugins/bootstrap/bootstrap.min.js></script>
        <!--<script type=text/javascript src=<?php echo $this->config->base_url(); ?>assets/js/plugins/mcustomscrollbar/jquery.mousewheel.min.js></script>-->
        <!--<script type=text/javascript src=<?php echo $this->config->base_url(); ?>assets/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js></script>-->
<!--        <script type=text/javascript src=<?php echo $this->config->base_url(); ?>assets/js/plugins/uniform/jquery.uniform.min.js></script>
        <script type=text/javascript src=<?php echo $this->config->base_url(); ?>assets/js/plugins/knob/jquery.knob.js></script>
        <script type=text/javascript src=<?php echo $this->config->base_url(); ?>assets/js/plugins/sparkline/jquery.sparkline.min.js></script>-->
<!--        <script type=text/javascript src=<?php echo $this->config->base_url(); ?>assets/js/plugins/flot/jquery.flot.js></script>
        <script type=text/javascript src=<?php echo $this->config->base_url(); ?>assets/js/plugins/flot/jquery.flot.resize.js></script>-->
        <script type=text/javascript src=<?php echo $this->config->base_url(); ?>assets/js/js.js></script>
        <?php /* <script type=text/javascript src=<?php echo $this->config->base_url(); ?>assets/js/require.js data-main="<?php echo $this->config->base_url(); ?>assets/js/requiremain.js"></script>
          <script type=text/javascript src=<?php echo $this->config->base_url(); ?>assets/js/text.js></script> */ ?>
        <script type=text/javascript src=<?php echo $this->config->base_url(); ?>assets/js/settings.js></script>
        <script type=text/javascript src=<?php echo $this->config->base_url(); ?>assets/js/plugins/knob/jquery.knob.js></script>
        <!--script type=text/javascript src=<?php echo $this->config->base_url(); ?>assets/js/jquery.min.js></script-->
        <!--script src="<?php echo $this->config->base_url(); ?>assets/js/slippry.min.js"></script-->
        <!--<script type="text/javascript" src="<?php echo $this->config->base_url(); ?>assets/js/d3.v3.min.js"></script>-->
        <!--<script type="text/javascript" src="<?php echo $this->config->base_url(); ?>assets/js/svg-injector.js"></script>-->
       <!-- <script type="text/javascript" src="<?php echo $this->config->base_url(); ?>assets/js/cabin-source-sans-pro2.js"></script> -->
       <!-- <script src="//use.edgefonts.net/cabin;source-sans-pro:n2,i2,n3,n4,n6,n7,n9.js"></script> -->
        <!--script>
            var $i = jQuery.noConflict();
        </script--> 
        <script type=text/javascript src=<?php echo $this->config->base_url(); ?>assets/highcharts/js/highcharts.js></script>
        <!--<script type=text/javascript src=highcharts/js/modules/exporting.js></script>-->
        <script type=text/javascript src=<?php echo $this->config->base_url(); ?>assets/highcharts/js/dark-highcharts.js></script>
        <script type=text/javascript src=<?php echo $this->config->base_url(); ?>assets/highcharts/js/modules/no-data-to-display.js></script>
        <!--<script type=text/javascript src=<?php echo $this->config->base_url(); ?>assets/js/kpi.js></script>-->
        <script type=text/javascript src=<?php echo $this->config->base_url(); ?>assets/js/jquery.gridster.js></script>
        <script type=text/javascript src=<?php echo $this->config->base_url(); ?>assets/js/history.min.js></script>
        <script type=text/javascript src=<?php echo $this->config->base_url(); ?>assets/js/underscore-min.js></script>
        <script type=text/javascript src=<?php echo $this->config->base_url(); ?>assets/js/backbone-min.js></script> 
       <!--<script type=text/javascript src=<?php echo $this->config->base_url(); ?>assets/js/packery.pkgd.min.js></script> -->
        <script type=text/javascript src=<?php echo $this->config->base_url(); ?>assets/js/menuzord.js></script>
        <script type=text/javascript src=<?php echo $this->config->base_url(); ?>assets/js/gridster-bootstrap.js></script>
        <script type=text/javascript src=<?php echo $this->config->base_url(); ?>assets/plugin/wb-popover/jquery.webui-popover.min.js></script>
        <script type=text/javascript src=<?php echo $this->config->base_url(); ?>assets/js/mpxd.js></script>
       
        <!--<script type=text/javascript src=<?php echo $this->config->base_url(); ?>assets/js/tunnel.js></script>-->
        <script type=text/javascript src=<?php echo $this->config->base_url(); ?>assets/js/ilyas.js></script>
        <script type=text/javascript src=<?php echo $this->config->base_url(); ?>assets/js/zul.js></script>
        <script type=text/javascript src=<?php echo $this->config->base_url(); ?>assets/js/_sn.js></script>
        <script type=text/javascript src=<?php echo $this->config->base_url(); ?>assets/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js></script>
        <script type=text/javascript src=<?php echo $this->config->base_url(); ?>assets/js/tinybox.js></script>
        <script type=text/javascript src=<?php echo $this->config->base_url(); ?>assets/js/d3.js></script>
        

		<script src="<?php echo $this->config->base_url(); ?>assets/js/leaflet-src.js"></script>
		<script src="<?php echo $this->config->base_url(); ?>assets/js/leaflet.awesome-markers.js"></script>
		<script src="<?php echo $this->config->base_url(); ?>assets/js/leaflet-knn.js"></script>
		<script src="<?php echo $this->config->base_url(); ?>assets/js/jquery.panzoom.min.js"></script>
		<script src="<?php echo $this->config->base_url(); ?>assets/js/js.cookie-2.1.0.min.js"></script>
        <!-- slim scroll -->
        <script src="<?php echo $this->config->base_url(); ?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		<!-- Moment js for dates-->
<!--		<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.3/moment.min.js"></script>-->
        <script type="text/javascript" src="<?php echo $this->config->base_url(); ?>assets/plugin/moment/moment.min.js"></script>
		
		 <!-- Gallery src-->
		<link media="screen, print" href="<?php echo $this->config->base_url(); ?>assets/plugin/nano-gallery2/css/nanogallery.min.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="<?php echo $this->config->base_url(); ?>assets/plugin/nano-gallery2/jquery.nanogallery.min.js"></script>

        <script type="text/javascript" src="<?php echo $this->config->base_url(); ?>assets/plugin/tablePagination/paging.js"></script>

        <!--Picasa slider-->
		<link media="screen, print" href="<?php echo $this->config->base_url(); ?>assets/plugin/picasa-slider/jquery.googleslides.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="<?php echo $this->config->base_url(); ?>assets/plugin/picasa-slider/jquery.googleslides.js"></script>

        <!--jsImage slider-->
        <script src="<?php echo $this->config->base_url(); ?>assets/js/plugins/jsImageSlider/js-image-slider.js"></script>




        <script>
            
			//var Base64={_keyStr:"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",encode:function(e){var t="";var n,r,i,s,o,u,a;var f=0;e=Base64._utf8_encode(e);while(f<e.length){n=e.charCodeAt(f++);r=e.charCodeAt(f++);i=e.charCodeAt(f++);s=n>>2;o=(n&3)<<4|r>>4;u=(r&15)<<2|i>>6;a=i&63;if(isNaN(r)){u=a=64}else if(isNaN(i)){a=64}t=t+this._keyStr.charAt(s)+this._keyStr.charAt(o)+this._keyStr.charAt(u)+this._keyStr.charAt(a)}return t},decode:function(e){var t="";var n,r,i;var s,o,u,a;var f=0;e=e.replace(/[^A-Za-z0-9\+\/\=]/g,"");while(f<e.length){s=this._keyStr.indexOf(e.charAt(f++));o=this._keyStr.indexOf(e.charAt(f++));u=this._keyStr.indexOf(e.charAt(f++));a=this._keyStr.indexOf(e.charAt(f++));n=s<<2|o>>4;r=(o&15)<<4|u>>2;i=(u&3)<<6|a;t=t+String.fromCharCode(n);if(u!=64){t=t+String.fromCharCode(r)}if(a!=64){t=t+String.fromCharCode(i)}}t=Base64._utf8_decode(t);return t},_utf8_encode:function(e){e=e.replace(/\r\n/g,"\n");var t="";for(var n=0;n<e.length;n++){var r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r)}else if(r>127&&r<2048){t+=String.fromCharCode(r>>6|192);t+=String.fromCharCode(r&63|128)}else{t+=String.fromCharCode(r>>12|224);t+=String.fromCharCode(r>>6&63|128);t+=String.fromCharCode(r&63|128)}}return t},_utf8_decode:function(e){var t="";var n=0;var r=c1=c2=0;while(n<e.length){r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r);n++}else if(r>191&&r<224){c2=e.charCodeAt(n+1);t+=String.fromCharCode((r&31)<<6|c2&63);n+=2}else{c2=e.charCodeAt(n+1);c3=e.charCodeAt(n+2);t+=String.fromCharCode((r&15)<<12|(c2&63)<<6|c3&63);n+=3}}return t}}
            Highcharts.theme = {
                colors: ["#2b908f", "#90ee7e", "#f45b5b", "#7798BF", "#aaeeee", "#ff0066", "#eeaaee",
                    "#55BF3B", "#DF5353", "#7798BF", "#aaeeee"],
                chart: {
                    /*backgroundColor: {
                     linearGradient: { x1: 0, y1: 0, x2: 1, y2: 1 },
                     stops: [
                     [0, '#2a2a2b'],
                     [1, '#3e3e40']
                     ]
                     },*/
                    style: {
                        fontFamily: "'Unica One', sans-serif"
                    },
                    plotBorderColor: '#606063'
                },
                title: {
                    style: {
                        color: '#E0E0E3',
                        textTransform: 'uppercase',
                        fontSize: '20px'
                    }
                },
                subtitle: {
                    style: {
                        color: '#E0E0E3',
                        textTransform: 'uppercase'
                    }
                },
                xAxis: {
                    gridLineColor: '#707073',
                    labels: {
                        style: {
                            color: '#E0E0E3'
                        }
                    },
                    lineColor: '#707073',
                    minorGridLineColor: '#505053',
                    tickColor: '#707073',
                    title: {
                        style: {
                            color: '#A0A0A3'

                        }
                    }
                },
                yAxis: {
                    gridLineColor: '#707073',
                    labels: {
                        style: {
                            color: '#E0E0E3'
                        }
                    },
                    lineColor: '#707073',
                    minorGridLineColor: '#505053',
                    tickColor: '#707073',
                    tickWidth: 1,
                    title: {
                        style: {
                            color: '#A0A0A3'
                        }
                    }
                },
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.85)',
                    style: {
                        color: '#F0F0F0'
                    }
                },
                plotOptions: {
                    series: {
                        dataLabels: {
                            color: '#B0B0B3'
                        },
                        marker: {
                            lineColor: '#333'
                        }
                    },
                    boxplot: {
                        fillColor: '#505053'
                    },
                    candlestick: {
                        lineColor: 'white'
                    },
                    errorbar: {
                        color: 'white'
                    }
                },
                legend: {
                    itemStyle: {
                        color: '#E0E0E3'
                    },
                    itemHoverStyle: {
                        color: '#FFF'
                    },
                    itemHiddenStyle: {
                        color: '#606063'
                    }
                },
                credits: {
                    style: {
                        color: '#666'
                    }
                },
                labels: {
                    style: {
                        color: '#707073'
                    }
                },
                drilldown: {
                    activeAxisLabelStyle: {
                        color: '#F0F0F3'
                    },
                    activeDataLabelStyle: {
                        color: '#F0F0F3'
                    }
                },
                navigation: {
                    buttonOptions: {
                        symbolStroke: '#DDDDDD',
                        theme: {
                            fill: '#505053'
                        }
                    }
                },
                // scroll charts
                rangeSelector: {
                    buttonTheme: {
                        fill: '#505053',
                        stroke: '#000000',
                        style: {
                            color: '#CCC'
                        },
                        states: {
                            hover: {
                                fill: '#707073',
                                stroke: '#000000',
                                style: {
                                    color: 'white'
                                }
                            },
                            select: {
                                fill: '#000003',
                                stroke: '#000000',
                                style: {
                                    color: 'white'
                                }
                            }
                        }
                    },
                    inputBoxBorderColor: '#505053',
                    inputStyle: {
                        backgroundColor: '#333',
                        color: 'silver'
                    },
                    labelStyle: {
                        color: 'silver'
                    }
                },
                navigator: {
                    handles: {
                        backgroundColor: '#666',
                        borderColor: '#AAA'
                    },
                    outlineColor: '#CCC',
                    maskFill: 'rgba(255,255,255,0.1)',
                    series: {
                        color: '#7798BF',
                        lineColor: '#A6C7ED'
                    },
                    xAxis: {
                        gridLineColor: '#505053'
                    }
                },
                scrollbar: {
                    barBackgroundColor: '#808083',
                    barBorderColor: '#808083',
                    buttonArrowColor: '#CCC',
                    buttonBackgroundColor: '#606063',
                    buttonBorderColor: '#606063',
                    rifleColor: '#FFF',
                    trackBackgroundColor: '#404043',
                    trackBorderColor: '#404043'
                },
                // special colors for some of the
                legendBackgroundColor: 'rgba(0, 0, 0, 0.5)',
                background2: '#505053',
                dataLabelsColor: '#B0B0B3',
                textColor: '#C0C0C0',
                contrastTextColor: '#F0F0F3',
                maskColor: 'rgba(255,255,255,0.3)'
            };

// Apply the theme
            Highcharts.setOptions(Highcharts.theme);

            baseURL = <?php echo json_encode($this->config->base_url()); ?>;
            /*
             
             var sidebarOpenWidth = 250;
             var sidebarCloseWidth = 50;
             
             
             function close_sidebar() {
             $('#wrapper').stop().animate({
             "padding-left" : sidebarCloseWidth+"px",
             "padding-right" : (0-sidebarCloseWidth)+"px"
             });
             
             $('#sidebar-wrapper').animate({
             "left" : sidebarCloseWidth+"px"
             });
             
             sidebar_state_open = false;
             }
             
             function open_sidebar() {
             $('#wrapper').stop().animate({
             "padding-left" : sidebarOpenWidth+"px",
             "padding-right" : (0-sidebarOpenWidth)+"px"
             });
             $('#sidebar-wrapper').animate({
             "left" : sidebarOpenWidth+"px"
             });
             sidebar_state_open = true;
             }
             
             var sidebar_state_open = true;
             function toggleSidebar() {
             
             setTimeout(function(){console.log($('.gridster ul').css('width','100%').css('display:none'));},100);
             //console.log($('.gridster ul').css('width'));
             if (sidebar_state_open) close_sidebar()
             else open_sidebar();
             }
             */
            function prettyDate(d) {
                var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                var date = (typeof d == "undefined") ? new Date() : new Date(d);
                str = "{0} {1} {2}";
                return str.format(date.getDate(), monthNames[date.getMonth()], date.getFullYear());
            }
            $(function() {

                /* 0 = widescreen, 1 = <1366 */

                screenWidth = $(document).width();
                screenType = 0;
                if (screenWidth <= 1500)
                    screenType = 1;
                if (screenWidth <= 1280)
                    screenType = 2;

                $('#sidebar-toggle').on('click', function() {
                    toggleSidebar();
                });
                setTimeout(function() {
                    $(window).trigger('resize');
                }, 5000);

                generateSideMenu(pages);
				//sideMenu();
                loadPage(getRoute(), true);
                //new mlPushMenu(document.getElementById('mp-menu'), document.getElementById('trigger'));


                $('#date_placeholder').html("Today: <b>" + prettyDate() + "</b>");
            });

            function resizeListener() {
                //var $g = $('.gridster ul');
                //$g.animate({'width':$g.parent('.gridster').width()})

            }

            $(window).resize(resizeListener);

        </script>
        <style type="text/css">
            .paging-nav {
                text-align: right;
                padding-top: 2px;
                margin-top: 10px !important;
            }

            .paging-nav a {
                margin: auto 1px;
                text-decoration: none;
                display: inline-block;
                padding: 1px 7px;
                background: RGBA(158, 221, 46, 0.53);
                color: rgb(255, 212, 97);
                border-radius: 3px;
            }

            .paging-nav .selected-page {
                background: RGB(77, 80, 70);
                font-weight: bold;
            }

            .paging-nav,
            #tableData {
                width: 400px;
                margin: 0 auto;
                font-family: Arial, sans-serif;
            }
            .megamenu-firstlevel {
        		font-size: 1.2em;
        		cursor: default;
        	}
            /*table.dataTable tbody tr {*/
                /*background-color: transparent;*/
            /*}*/
            /*#dataTab > tbody > tr > td:first-child,{*/
                /*border-right: 1px solid  rgba(21, 166, 233, 0.2);*/
            /*}*/
            /*#dataTab{*/
                /*border: 1px solid rgba(21, 166, 233, 0.2);*/
            /*}*/
            /*.dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate {*/
                /*color: #A0AA9F;*/
            /*}*/
            /*.dataTables_wrapper .dataTables_paginate .paginate_button {*/
                /*color: #A0AA9F !important;*/
            /*}*/
        </style>
    </head>
    <body style="overflow-x: hidden">
    
    
    <style type="text/css">
    	div.loading_pad span p{
    		font-size: 16px;
    		margin: 0 auto;
    		color: #fff;
    	}
    	div.loading_pad span img{
    		margin: 0 auto;
    	}
    	div.loading_pad{
    		position: absolute;
    		width: 100%;
    		height: 100%;
    		background: rgba(0,0,0,.5);
    		z-index: 99999999;
    	}
    	div.loading_pad span {
    		position: absolute;
    		display: block;
    		width: 100px;
    		top: 30%;
    		left: 48%;
    		margin-left: -50px;
    	}
    	.loading_pad_gohide{
    		display: none;
    	}
        .s_delete{
            display: none;
        }
        .s_comments:hover .s_delete{
            display:-moz-inline-box;
            display: inline-block;
            float: right;

        }
    </style>
    <div id="loading_pad" class="loading_pad loading_pad_gohide">
    	<span>
    		<p>Loading</p>
    		<img src="../assets/img/loading.gif">
    	</span>
    </div>

        <div id="menuzord" class="menuzord red removeonprint" style="float:none; height:75px">
            <!--<a href="javascript:void(0)" class="menuzord-brand">MPXD</a>-->
			<h1 style="color: #ffd461; padding:5px; border: 1px solid transparent; position:absolute;" id="page_title" class="top-title"></h1>
            <input type="hidden" name="et_data_date" id="et_data_date">
            <ul class="menuzord-menu ">
            </ul>
        </div>
		<div id="alternatetitle" class="showonprint" style="display:none;height:75px;width: 100%;background: #082B3A;padding: 0 30px;"></div>






