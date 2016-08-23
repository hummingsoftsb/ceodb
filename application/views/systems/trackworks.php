
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content ="width=device-width,initial-scale=0.8,user-scalable=yes"/>
		<meta charset="utf-8">
		<meta name="mobile-web-app-capable" content="yes">
		<title>SBK-S-06 - MPXD</title>
         <link href="<?php echo $this->config->base_url(); ?>assets/plugin/drop-popup/main.css" rel="stylesheet" type="text/css" />
		 <link href="<?php echo $this->config->base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link media="screen, print" rel="stylesheet" href="<?php echo $this->config->base_url(); ?>assets/custom-scrollbar/jquery.mCustomScrollbar.css">
        <link href="<?php echo $this->config->base_url(); ?>assets/plugin/basicmodal/css/basic.css" rel="stylesheet" type="text/css" />


		<script type="text/javascript" src="<?php echo $this->config->base_url(); ?>assets/js/d3.v3.min.js"></script>
		<script type="text/javascript" src="<?php echo $this->config->base_url(); ?>assets/js/plugins/jquery/jquery.min.js"></script>
        <script type=text/javascript src="<?php echo $this->config->base_url(); ?>assets/plugin/drop-popup/main.js"></script>

		<script type="text/javascript" src="<?php echo $this->config->base_url(); ?>assets/plugin/zoomooz/jquery.zoomooz.min.js"></script>
        <script type=text/javascript src="<?php echo $this->config->base_url(); ?>assets/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
        <script type=text/javascript src="<?php echo $this->config->base_url(); ?>assets/plugin/basicmodal/js/jquery.simplemodal.js"></script>
        <script type=text/javascript src="<?php echo $this->config->base_url(); ?>assets/plugin/progressbar/circle-progress.js"></script>

		<style type="text/css">
			/* No style rules here yet */	

			.sizecorrection {
				-webkit-transform: translate(0px, 110.611726px) rotate(0rad) skewX(0rad) scale(1.430914, 1.430914);
				-webkit-transform-origin: 960px 477.5px;
				transform: translate(0px, 110.611726px) rotate(0rad) skewX(0rad) scale(1.430914, 1.430914);
			}

			html, body {
				margin: 0;
				padding: 0;
			}
			body {	
				background: #131724;;
				overflow:hidden;
			}
			
			#container {
				width: 1280px;
				height: 800px;
				overflow: hidden;
			}
			
			
			svg .smallcircle {
				fill: #cccccc;
			}
			
			svg .bigcircle {
				fill: hsl(0, 3%, 30%);
			}
			
			svg .bigparking {
				fill: hsl(0, 3%, 30%);
			}
			
			svg .smallparking {
				fill: #cccccc;
			}
			
			svg .glow-red.on {
				fill: hsl(0, 100%, 43%);
			}
			
			svg .glow-green.on {
				fill: hsl(134, 82%, 30%);
			}
			
			svg .glow-yellow.on {
				fill: rgb(255, 170, 66);
			}
			
			svg .glow-grey.on {
				fill: #fff;
			}
            svg .glow-darkgray.on {
                fill: #837b7b;
            }
            svg .glow-kavi.on {
                fill: #d44c01;
            }
			svg .parkingletter {
				fill: #000;
				font-family: "Century Gothic";
				font-size: 10px;
				font-weight: bold;
			}
			
			svg .blurred {
				opacity: 0.2;
			}
			
			.glow-red-blinking.on {
				-webkit-animation-name: glow-red;
				-webkit-animation-duration: 1s;
				-webkit-animation-iteration-count: infinite;
				-webkit-animation-timing-function: ease-in-out;
				-webkit-animation-direction: alternate;
				-webkit-filter: drop-shadow(12px 12px 7px rgba(0,0,0,0.5))
			
				animation-name: glow-red;
				animation-duration: 1s;
				animation-iteration-count: infinite;
				animation-timing-function: ease-in-out;
				animation-direction: alternate;
				filter: url(#drop-shadow);
			}
			
			@-webkit-keyframes glow-red {
			  0% { fill: hsl(0, 100%, 10%); }
			  100% { fill: hsl(0, 100%, 63%); }
			}

			@keyframes glow-red {
			  0% { fill: hsl(0, 100%, 10%); }
			  100% { fill: hsl(0, 100%, 63%); }
			}
			
			.glow-yellow {
			  /*-webkit-animation-name: glow-yellow;
			  -webkit-animation-duration: 1s;
			  -webkit-animation-iteration-count: infinite;
			  -webkit-animation-timing-function: ease-in-out;
			  -webkit-animation-direction: alternate;
			  
			  animation-name: glow-yellow;
			  animation-duration: 1s;
			  animation-iteration-count: infinite;
			  animation-timing-function: ease-in-out;
			  animation-direction: alternate;*/
			}
			
			@-webkit-keyframes glow-yellow {
			  0% { fill: hsl(59, 100%, 23%); }
			  100% { fill: hsl(59, 100%, 43%); }
			}

			@keyframes glow-yellow {
			  0% { fill: hsl(59, 100%, 23%); }
			  100% { fill: hsl(59, 100%, 43%); }
			}
			
			
			
			.navbaricon {
				width: 80px;
			}
			
			/*@-webkit-keyframes glow-blue {
			  0% { fill: hsl(204, 80%, 23%); }
			  100% { fill: hsl(204, 80%, 63%); }
			}

			@keyframes glow-blue {
			  0% { fill: hsl(204, 80%, 23%); }
			  100% { fill: hsl(204, 80%, 63%); }
			}*/
			
			
			
			
			
			#navbar {
				text-align: center;
				position: absolute;
				top: -52px;
				left: 760px;
			}
            #navbar-left {
                text-align: center;
                position: absolute;
                top: -52px;
                left: 110px;
            }
			
			#navbar a, figure, #navbar-left a {
				display: inline-block;
				margin: 0;
				padding: 0;
				margin-right: -2px;
			}
			
			#navbar figcaption, #navbar-left figcaption  {
				font-size: 11px;
				margin: 0;
				font-family: Arial;
				font-weight: bold;
				color: #fff;
			}
			
			#navbar figure, #navbar-left figure {
				padding: 5px;
				width: 90px;
			}
			
			#navbar figure:hover img, #navbar-left figure:hover img {
				transform: scale(1.1);
				-ms-transform: scale(1.1);
				-webkit-transform: scale(1.1);
				-moz-transform: scale(1.1);
				-o-transform: scale(1.1);
			}
			#navbar img, #navbar-left img {
				width: 80px;
				transition: transform 0.2s;
				-webkit-transition: -webkit-transform 0.2s;
				-moz-transition: -moz-transform 0.2s;
				-o-transition: -o-transform 0.2s;
			}

			#navbar a.nopointer, #navbar-left a.nopointer {
				cursor: default;
			}
			
			
			
			
			
			
			
			
			
			.nav {
			  list-style: none;
			  text-align: center;
			  position: absolute;
			top: -30px;
			left: 48px;
			}

			.nav li {
			  position: relative;
			  display: inline-block;
			  margin-right: -4px; /* See: http://css-tricks.com/fighting-the-space-between-inline-block-elements/ */
			}
/*
			.nav li:before {
			  content: "";
			  display: block;
			  border-top: 1px solid #ddd;
			  border-bottom: 1px solid #fff;
			  width: 100%;
			  height: 1px;
			  position: absolute;
			  top: 50%;
			  z-index: -1;
			}*/

			.nav a {
			  display: block;
			  background-color: #313f60;
			  background-image: -webkit-gradient(linear, left top, left bottom, from(#313f60), to(#414F70));
			  background-image: -webkit-linear-gradient(top, #313f60, #414F70); 
			  background-image: -moz-linear-gradient(top, #313f60, #414F70); 
			  background-image: -ms-linear-gradient(top, #313f60, #414F70); 
			  background-image: -o-linear-gradient(top, #313f60, #414F70); 
			  color: #ccc;
			  margin-right: 22px;
			  width: 90px;
			  height: 90px;
			  line-height: 105px;
			  position: relative;
			  text-align: center;
			  border-radius: 50%;
			  box-shadow: inset 0px 2px 3px #212f50;
			  text-decoration:none;
			}

			.nav a:before {
			  content: "";
			  display: block;
			  /*background: #111;
			  border-top: 2px solid #111;*/
			  position: absolute;
			  top: -18px;
			  left: -18px;
			  bottom: -18px;
			  right: -18px;
			  z-index: -1;
			  border-radius: 50%;
			  /*box-shadow: inset 0px 8px 48px #111;*/
			}

			.nav a:hover {
			  text-decoration: none;
			  color: #fff;
			  background: #515F80;
			}
			
			.nav i {
				font-size:44px;
				
			}
			
			.togglebutton {
				position:absolute; 
				width: 100px; 
				height:20px;
				z-index: 5;
			}
			
			.togglebutton:hover, #reset:hover, #reset2:hover, #reset3:hover {
				cursor: pointer;
			}
			
			.header-left {
				font-family: Trebuchet MS;  float:left;
				color: #f3b308;
			}
			
			.subheader-left {
				font-family: Trebuchet MS;
				float: left;
				padding-top: 29px;
				padding-left: 8px;
				font-size: 35px;
				color: rgb(255, 170, 66);
			}
			
			.pkg_title{
				font-family: "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
                font-size: 17px;
                font-weight: 600;
				text-decoration: none;
				color: #FFF;
			}
			.pkg_title2{
				font-family: "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
				font-size: 40px;
				font-weight: 500;
				text-decoration: none;
				color: #a6c3ff;
			}
            .nav-img-container i {
                display: block;
                position: absolute;
                bottom: 0;
                margin-left: 44px;
                margin-bottom: 20px;
            }
        #nav_drop{
            font-size: 16px;
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            font-family: ‘Impact, Charcoal, sans-serif !important;
            font-size: 13px;
        }
            #nav_drop th {
                padding-top: 11px;
                padding-bottom: 11px;
                background-color: #192f46;
                border-bottom: 1px solid #fff;
                color: white;
            }
            #nav_drop td, #nav_drop th {
                /*border: 1px solid #ddd;*/
                color: white;
                text-align: left;
                padding: 8px;
            }
            #nav_drop tr:first-child,#nav_drop tr:last-child{
                background-color: #0b8baf;
            }
            #nav_drop tr:nth-child(2),#nav_drop tr:nth-child(4),#nav_drop tr:nth-child(5){
                background-color: #5fa6af;
            }
            #nav_drop tr:nth-child(3){
                background-color: #0b8baf;
            }
            .table thead > tr > th, .table thead > tr > th, .table tbody > tr > th, .table tfoot > tr > th, .table thead > tr > td, .table tbody > tr > td, .table tfoot > tr > td, .table-bordered, .table-bordered > thead > tr > th, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td {
                border-color: rgba(0,0,0,0.2);
                border-color: rgba(21, 166, 233, 0.2);
                line-height: 20px;
                padding-left: 12px;
                padding-right: 12px;
            }
            .table {
                margin-bottom: 0;
            }
            .table-bordered {
                border: 1px solid #dddddd;
            }
            .table {
                width: 100%;
            }
            table {
                max-width: 100%;
                background-color: transparent;
            }
            table {
                border-collapse: collapse;
                border-spacing: 0;
            }
            .table-bordered > thead > tr > th, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td {
                border: 1px solid #dddddd;
            }
            .table thead > tr > th, .table tbody > tr > th, .table tfoot > tr > th, .table thead > tr > td, .table tbody > tr > td, .table tfoot > tr > td {
                padding: 8px;
                line-height: 1.428571429;
                vertical-align: top;
                border-top: 1px solid #dddddd;
                font-family: ‘Impact, Charcoal, sans-serif !important;
                color: #FFF;
                font-size: 13px;
            }
            .table tbody > tr > td{
                color: #000e17;
                word-break: break-all;
            }
            #project_progress_container strong {
                position: absolute;
                top: 54px;
                left: 0;
                width: 100%;
                text-align: center;
                line-height: 40px;
                font-size: 30px;
                color: rgb(243, 179, 8);
            }
            #project_progress_container strong i {
                font-size: 17px;
            }
            .fim-dropdown > .inner {
                width:440px;
            }
		</style>
		<script>
			//alert(window.orientation);
			var cwidth = 1280; //content width
			var swidth = window.screen.width;
			var sheight = window.screen.height;

			updateOrientation();

			window.addEventListener('orientationchange', updateOrientation, false);

			function updateOrientation() {

			  var viewport = document.querySelector("meta[name=viewport]");

			  switch (window.orientation) {
				case 0: case 180: //portrait
					var scale = swidth / cwidth;
					viewport.setAttribute('content', 'width=device-width, initial-scale='+ scale +', maximum-scale=1.0, user-scalable=yes;')
				  break;
				case 90: case -90: //landscape
					var scale = sheight / cwidth;
					viewport.setAttribute('content', 'width=device-width, initial-scale='+ scale +', maximum-scale=1.0, user-scalable=yes;')
				  break;
				default:
					var scale = swidth / cwidth;
					viewport.setAttribute('content', 'width=device-width, initial-scale='+ scale +', maximum-scale=1.0, user-scalable=yes;')
				  break;
			  }
				//alert(swidth + ' lead to an initial width of ' + vpwidth + ' and a rotate width of ' + vlwidth);
			}
		</script>
		<script type="text/javascript">
			// main visibility API function 
			// use visibility API to check if current tab is active or not
			var vis = (function(){
			    var stateKey, 
			        eventKey, 
			        keys = {
			                hidden: "visibilitychange",
			                webkitHidden: "webkitvisibilitychange",
			                mozHidden: "mozvisibilitychange",
			                msHidden: "msvisibilitychange"
			    };
			    for (stateKey in keys) {
			        if (stateKey in document) {
			            eventKey = keys[stateKey];
			            break;
			        }
			    }
			    return function(c) {
			        if (c) document.addEventListener(eventKey, c);
			        return !document[stateKey];
			    }
			})();
			// ##################
			// check if current tab is active or not

			vis(function(){
								
			    if(vis()){
					setTimeout(function(){
		            	console.log("tab is visible - has focus");
		            	refreshme();
			        },300);									
			    } else {
		        	console.log("tab is invisible - has blur");
			    }
			});

			// check if browser window has focus		
			var notIE = (document.documentMode === undefined),
			    isChromium = window.chrome;
			      
			if (notIE && !isChromium) {

			    // checks for Firefox and other  NON IE Chrome versions
			    $(window).on("focusin", function () { 
			        setTimeout(function(){
			            console.log("focus");
			        },300);

			    }).on("focusout", function () {
			        console.log("blur");
			    });

			} else {
			    
			    // checks for IE and Chromium versions
			    if (window.addEventListener) {
			        window.addEventListener("focus", function (event) {
			            setTimeout(function(){
			                console.log("focus");
			            },300);

			        }, false);
			        window.addEventListener("blur", function (event) {
			             console.log("blur");
			        }, false);

			    } else {
			        window.attachEvent("focus", function (event) {
			            setTimeout(function(){
			                 console.log("focus");
			            },300);

			        });
			        window.attachEvent("blur", function (event) {
			            console.log("blur");
			        });
			    }
			}

			// #####################################################
			$( document ).ready(function() {
				$( window ).load(function() {
					$(function() {
						if($(window).width() > 1900){
							$("body").css("visibility", "hidden");
							$("#container").zoomTo({
								targetsize:1.2,duration:150,animationendcallback : function(){
									$("#container").animate({
										top: +60
									},100)
									$("body").css("visibility", "visible");
								}
							});
						} else if($(window).width() > 1700){
							$("body").css("visibility", "hidden");
							$("#container").zoomTo({
								targetsize:1.15,duration:150,animationendcallback : function(){
									$("#container").animate({
										top: +50
									},100)
									$("body").css("visibility", "visible");
								}
							});
						} else if($(window).width() > 1500){
							$("body").css("visibility", "hidden");
							$("#container").zoomTo({
								targetsize:1.1,duration:150,animationendcallback : function(){
									$("#container").animate({
										top: +30
									},100)
									$("body").css("visibility", "visible");
								}
							});
						} else if($(window).width() > 1300){
							$("body").css("visibility", "hidden");
							$("#container").zoomTo({
								targetsize:1,duration:150,animationendcallback : function(){
									$("#container").animate({
									},100)
									$("body").css("visibility", "visible");
								}
							});
						}
						var allowedPage = allowedPageToString();
						$('a').on('click', function(e){
							clickedLinkCheck($(this).attr("href"),allowedPage);
							e.preventDefault();
							return false;
						})
					});
					function allowedPageToString(){
						var pages = {};
						var pageObj = <?php echo $this->session->userdata('allowed_page'); ?>;
						for(var k in pageObj){
							pages[k] = pageObj[k].slug +'/'+ pageObj[k].page;
						}
						return pages;
					}
					function clickedLinkCheck(href,pages){
						for(var k in pages){
							if(href.indexOf(pages[k]) > -1)
							location.href=href;
						}
					}
//                    $('#simplemodal-container').mCustomScrollbar({
//                        theme:"rounded-dark"
//                    });
					console.log( "done" );
				});
			});
			// lunch
			function refreshme (){
				location.reload();
				$( document ).ready(function() {
					$( window ).load(function() {
						$(function() {
							if($(window).width() > 1900){
								$("body").css("visibility", "hidden");
								$("#container").zoomTo({
									targetsize:1.2,duration:150,animationendcallback : function(){
										$("#container").animate({
											top: +60
										},100)
										$("body").css("visibility", "visible");
									}
								});
							} else if($(window).width() > 1700){
								$("body").css("visibility", "hidden");
								$("#container").zoomTo({
									targetsize:1.15,duration:150,animationendcallback : function(){
										$("#container").animate({
											top: +50
										},100)
										$("body").css("visibility", "visible");
									}
								});
							} else if($(window).width() > 1500){
								$("body").css("visibility", "hidden");
								$("#container").zoomTo({
									targetsize:1.1,duration:150,animationendcallback : function(){
										$("#container").animate({
											top: +30
										},100)
										$("body").css("visibility", "visible");
									}
								});
							} else if($(window).width() > 1300){
								$("body").css("visibility", "hidden");
								$("#container").zoomTo({
									targetsize:1,duration:150,animationendcallback : function(){
										$("#container").animate({
										},100)
										$("body").css("visibility", "visible");
									}
								});
							}
							var allowedPage = allowedPageToString();
							$('a').on('click', function(e){
								clickedLinkCheck($(this).attr("href"),allowedPage);
								e.preventDefault();
								return false;
							})
						});
						function allowedPageToString(){
							var pages = {};
							var pageObj = <?php echo $this->session->userdata('allowed_page'); ?>;
							for(var k in pageObj){
								pages[k] = pageObj[k].slug +'/'+ pageObj[k].page;
							}
							return pages;
						}
						function clickedLinkCheck(href,pages){
							for(var k in pages){
								if(href.indexOf(pages[k]) > -1)
								location.href=href;
							}
						}
						console.log( "done" );
					});
				});
			}
		</script>
		<script>
			// $(function() {
			// 	if($(window).width() > 1900){
					
			// 		//$("#container").animate({top: +70},1)
			// 		$("#container").zoomTo({targetsize:1.25, duration:100, 
			// 			animationendcallback : function(){
			// 				//$(this).animate({top: +70})
			// 				$("#container").animate({top: +70},100)
			// 			},
			// 		});
			// 	}
                                
   //                              var allowedPage = allowedPageToString();
   //                              $('a').on('click', function(e){
   //                                  //console.log($(this).attr("href"));
   //                                  clickedLinkCheck($(this).attr("href"),allowedPage);
   //                                  e.preventDefault();
   //                                  return false;
   //                              })
			// });
                        
   //                      function allowedPageToString(){
   //                          var pages = {};
   //                          var pageObj = <?php echo $this->session->userdata('allowed_page'); ?>;
   //                          for(var k in pageObj){
   //                              pages[k] = pageObj[k].slug +'/'+ pageObj[k].page;
   //                          }
   //                          return pages;
   //                      }
                        
   //                      function clickedLinkCheck(href,pages){
   //                          for(var k in pages){
   //                              if(href.indexOf(pages[k]) > -1)
   //                                  location.href=href;
   //                          }
   //                      }
		</script>
	</head>
	<body>
	<nav>
			
		</nav>
	<div id="container" style="position:relative; margin:auto;">	
	<div id="navbarcontainer" style="position:absolute; top:65px; z-index:98; width:1280px;">
		<div style="position:relative">
			<div id="navbar-left">
                <a href="#"><img src="<?php echo $this->config->base_url(); ?>assets/img/home.png" onclick="location.href='/mpxd/front'"/></a>
                <a href="#"><img src="<?php echo $this->config->base_url(); ?>assets/img/logout_de.png" onclick="location.href='/mpxd/logout'"/></a>
			</div>
			 <div id="navbar">
                 <div class="fim-dropdown">
				    <a class="nav-img-container" href="#"><img src="<?php echo $this->config->base_url(); ?>assets/img/nav_design.png" /><i class="fa fa-arrow-up" style="color: rgb(13, 139, 43)"></i><br><span class="pull-left" id="design_p" style="color: #f3b308; font-size: 13px; font-weight:600;"></span></a>
                     <div class="inner">
                         <table id="nav_drop">
                             <thead>
                             <tr>
                                 <th>Activities</th>
                                 <th colspan="2">Percentage</th>
                             </tr>
                             </thead>
                             <tbody id="status_container">
                                <tr>
                                    <td>Preliminary</td>
                                    <td>100%</td>
                                </tr>
                                <tr>
                                    <td>Conceptual</td>
                                    <td>100%</td>
                                </tr>
                                <tr>
                                    <td>Final design</td>
                                    <td>100%</td>
                                </tr>
                             </tbody>
                         </table>
                     </div>
                 </div>
                 <div class="fim-dropdown">
				    <a class="nav-img-container nopointer" href="#"><img src="<?php echo $this->config->base_url(); ?>assets/img/procurement.png" /><i class="fa fa-arrow-up" style="color: rgb(13, 139, 43)"></i><br><span class="pull-left" id="proc_p" style="color: #f3b308; font-size: 13px; font-weight:600;"></span></a>
                 </div>
				<a class="nav-img-container" href="<?php echo $this->config->base_url(); ?>sbk-s-06/index"><img src="<?php echo $this->config->base_url(); ?>assets/img/nav_intallation.png" /><i class="fa fa-arrow-down" style="color: rgb(243, 179, 8)"></i><br><span class="pull-left" id="install_p" style="color: #f3b308; font-size: 13px; font-weight:600;"></span></a>
			</div> 
			
		</div>
		<img src="<?php echo $this->config->base_url(); ?>assets/img/systems/tw/tw_home_tp.png" style="position: absolute;top: -77px;width: 1280px; z-index: -1;" />
		
		
	</div>
	<img src="<?php echo $this->config->base_url(); ?>assets/img/systems/tw/guideways-tw.jpg" alt="" id="mapimg" style="width: 1280px; height:800px; position:absolute;"/>
	<div style="position: absolute; z-index: 99;top: -7px;left: -8px;">
		
		<!-- text href -->
		<a title="Sungai Buloh" href="<?php echo $this->config->base_url(); ?>sungai-buloh/index" style="position: absolute; top: 394px; left: 87px; height: 15px; width: 72px;"></a>
		<a title="Kg Selamat" href="<?php echo $this->config->base_url(); ?>kampung-selamat/index" style="position: absolute; top: 424px; left: 93px; height: 15px; width: 72px;"></a>
		<a title="Kwasa Damansara" href="<?php echo $this->config->base_url(); ?>kwasa-damansara/index" style="position: absolute; top: 512px; left: 140px; height: 23px; width: 72px;"></a>
		<a title="Kwasa Sentral" href="<?php echo $this->config->base_url(); ?>kwasa-sentral/index" style="position: absolute; top: 553px; left: 121px; height: 15px; width: 72px;"></a>
		<a title="Kota Damansara" href="<?php echo $this->config->base_url(); ?>kota-damansara/index" style="position: absolute; top: 584px; left: 219px; height: 15px; width: 72px;"></a>
		<a title="Surian" href="<?php echo $this->config->base_url(); ?>surian/index" style="position: absolute; top: 523px; left: 215px; height: 15px; width: 46px;"></a>
		<a title="Mutiara Damansara" href="<?php echo $this->config->base_url(); ?>mutiara-damansara/index" style="position: absolute; top: 463px; left: 217px; height: 15px; width: 72px;"></a>
		<a title="Bandar Utama" href="<?php echo $this->config->base_url(); ?>bandar-utama/index" style="position: absolute; top: 452px; left: 296px; height: 15px; width: 72px;"></a>
		<a title="TTDI" href="<?php echo $this->config->base_url(); ?>ttdi/index" style="position: absolute; top: 452px; left: 367px; height: 15px; width: 32px;"></a>
		<a title="Phileo Damansara" href="<?php echo $this->config->base_url(); ?>phileo-damansara/index" style="position: absolute; top: 429px; left: 373px; height: 15px; width: 72px;"></a>
		<a title="Pusat Bandar Damansara" href="<?php echo $this->config->base_url(); ?>pusat-bandar-damansara/index" style="position: absolute; top: 374px; left: 365px; height: 15px; width: 72px;"></a>
		<a title="Semantan" href="<?php echo $this->config->base_url(); ?>semantan/index" style="position: absolute; top: 327px; left: 362px; height: 15px; width: 72px;"></a>
		<a title="Muzium Negara" href="<?php echo $this->config->base_url(); ?>muzium-negara/index" style="position: absolute; top: 289px; left: 437px; height: 15px; width: 90px;"></a>
		<a title="Pasar Seni" href="<?php echo $this->config->base_url(); ?>pasar-seni/index" style="position: absolute; top: 260px; left: 458px; height: 15px; width: 61px;"></a>
		<a title="Merdeka" href="<?php echo $this->config->base_url(); ?>merdeka/index" style="position: absolute; top: 231px; left: 497px; height: 15px; width: 60px;"></a>
		<a title="Bukit Bintang" href="<?php echo $this->config->base_url(); ?>bukit-bintang/index" style="position: absolute; top: 198px; left: 514px; height: 15px; width: 60px;"></a>
		<a title="Tun Razak Exchange" href="<?php echo $this->config->base_url(); ?>tun-razak-exchange/index" style="position: absolute; top: 183px; left: 611px; height: 15px; width: 60px;"></a>
		<a title="Cochrane" href="<?php echo $this->config->base_url(); ?>cochrane/index" style="position: absolute; top: 206px; left: 646px; height: 15px; width: 60px;"></a>
		<a title="Maluri" href="<?php echo $this->config->base_url(); ?>maluri/index" style="position: absolute; top: 240px; left: 609px; height: 15px; width: 47px;"></a>
		<a title="Taman Pertama" href="<?php echo $this->config->base_url(); ?>taman-pertama/index" style="position: absolute; top: 235px; left: 668px; height: 15px; width: 60px;"></a>
		<a title="Taman Midah" href="<?php echo $this->config->base_url(); ?>taman-midah/index" style="position: absolute; top: 257px; left: 716px; height: 15px; width: 60px;"></a>
		<a title="Taman Mutiara" href="<?php echo $this->config->base_url(); ?>taman-mutiara/index" style="position: absolute; top: 271px; left: 786px; height: 15px; width: 60px;"></a>
		<a title="Taman Connaught" href="<?php echo $this->config->base_url(); ?>taman-connaught/index" style="position: absolute; top: 334px; left: 767px; height: 15px; width: 60px;"></a>
		<a title="Taman Suntex" href="<?php echo $this->config->base_url(); ?>taman-suntex/index" style="position: absolute; top: 268px; left: 845px; height: 15px; width: 48px;"></a>
		<a title="Sri Raya" href="<?php echo $this->config->base_url(); ?>sri-raya/index" style="position: absolute; top: 267px; left: 919px; height: 15px; width: 60px;"></a>
		<a title="Bandar Tun Hussein Onn" href="<?php echo $this->config->base_url(); ?>bandar-tun-hussein-onn/index" style="position: absolute; top: 308px; left: 998px; height: 15px; width: 71px;"></a>
		<a title="Bukit Dukung" href="<?php echo $this->config->base_url(); ?>bukit-dukung/index" style="position: absolute; top: 350px; left: 1017px; height: 15px; width: 55px;"></a>
		<a title="Taman Koperasi Cuepacs " href="<?php echo $this->config->base_url(); ?>taman-koperasi-cuepacs/index" style="position: absolute; top: 385px; left: 1053px; height: 15px; width: 85px;"></a>
		<a title="Sungai Kantan" href="<?php echo $this->config->base_url(); ?>sungai-kantan/index" style="position: absolute; top: 416px; left: 1119px; height: 15px; width: 50px;"></a>
		<a title="Bandar Kajang" href="<?php echo $this->config->base_url(); ?>bandar-kajang/index" style="position: absolute; top: 441px; left: 1176px; height: 15px; width: 50px;"></a>
		<a title="Kajang" href="<?php echo $this->config->base_url(); ?>kajang/index" style="position: absolute; top: 466px; left: 1220px; height: 15px; width: 50px;"></a>
		<a title="Sungai Buloh Depot" href="<?php echo $this->config->base_url(); ?>sbk-s-06/dpt1" style="position: absolute; top: 490px; left: 15px; height: 35px; width: 95px;"></a>
		<a title="Kajang Depot" href="<?php echo $this->config->base_url(); ?>sbk-s-06/dpt2" style="position: absolute; top: 475px; left: 1128px; height: 30px; width: 45px;"></a>
		
		<!-- icon href -->
		<a title="Sungai Buloh" href="<?php echo $this->config->base_url(); ?>sungai-buloh/index" style="position: absolute; top: 400px; left: 63px; height: 15px; width: 15px;"></a>
		<a title="Kg Selamat" href="<?php echo $this->config->base_url(); ?>kampung-selamat/index" style="position: absolute; top: 430px; left: 74px; height: 15px; width: 15px;"></a>
		<a title="Kwasa Damansara" href="<?php echo $this->config->base_url(); ?>kwasa-damansara/index" style="position: absolute; top: 518px; left: 120px; height: 15px; width: 15px;"></a>
		<a title="Kwasa Sentral" href="<?php echo $this->config->base_url(); ?>kwasa-sentral/index" style="position: absolute; top: 553px; left: 112px; height: 15px; width: 15px;"></a>
		<a title="Kota Damansara" href="<?php echo $this->config->base_url(); ?>kota-damansara/index" style="position: absolute; top: 576px; left: 205px; height: 15px; width: 15px;"></a>
		<a title="Surian" href="<?php echo $this->config->base_url(); ?>surian/index" style="position: absolute; top: 523px; left: 258px; height: 15px; width: 15px;"></a>
		<a title="Mutiara Damansara" href="<?php echo $this->config->base_url(); ?>mutiara-damansara/index" style="position: absolute; top: 466px; left: 278px; height: 15px; width: 15px;"></a>
		<a title="Bandar Utama" href="<?php echo $this->config->base_url(); ?>bandar-utama/index" style="position: absolute; top: 474px; left: 338px; height: 15px; width: 15px;"></a>
		<a title="TTDI" href="<?php echo $this->config->base_url(); ?>ttdi/index" style="position: absolute; top: 470px; left: 386px; height: 15px; width: 15px;"></a>
		<a title="Phileo Damansara" href="<?php echo $this->config->base_url(); ?>phileo-damansara/index" style="position: absolute; top: 452px; left: 423px; height: 15px; width: 15px;"></a>
		<a title="Pusat Bandar Damansara" href="<?php echo $this->config->base_url(); ?>pusat-bandar-damansara/index" style="position: absolute; top: 376px; left: 437px; height: 15px; width: 15px;"></a>
		<a title="Semantan" href="<?php echo $this->config->base_url(); ?>semantan/index" style="position: absolute; top: 328px; left: 426px; height: 15px; width: 15px;"></a>
		<a title="Muzium Negara" href="<?php echo $this->config->base_url(); ?>muzium-negara/index" style="position: absolute; top: 290px; left: 524px; height: 15px; width: 15px;"></a>
		<a title="Pasar Seni" href="<?php echo $this->config->base_url(); ?>pasar-seni/index" style="position: absolute; top: 256px; left: 520px; height: 15px; width: 15px;"></a>
		<a title="Merdeka" href="<?php echo $this->config->base_url(); ?>merdeka/index" style="position: absolute; top: 233px; left: 549px; height: 15px; width: 15px;"></a>
		<a title="Bukit Bintang" href="<?php echo $this->config->base_url(); ?>bukit-bintang/index" style="position: absolute; top: 199px; left: 559px; height: 15px; width: 15px;"></a>
		<a title="Tun Razak Exchange" href="<?php echo $this->config->base_url(); ?>tun-razak-exchange/index" style="position: absolute; top: 203px; left: 600px; height: 15px; width: 15px;"></a>
		<a title="Cochrane" href="<?php echo $this->config->base_url(); ?>cochrane/index" style="position: absolute; top: 217px; left: 628px; height: 15px; width: 15px;"></a>
		<a title="Maluri" href="<?php echo $this->config->base_url(); ?>maluri/index" style="position: absolute; top: 230px; left: 650px; height: 15px; width: 15px;"></a>
		<a title="Taman Pertama" href="<?php echo $this->config->base_url(); ?>taman-pertama/index" style="position: absolute; top: 258px; left: 688px; height: 15px; width: 15px;"></a>
		<a title="Taman Midah" href="<?php echo $this->config->base_url(); ?>taman-midah/index" style="position: absolute; top: 277px; left: 730px; height: 15px; width: 15px;"></a>
		<a title="Taman Mutiara" href="<?php echo $this->config->base_url(); ?>taman-mutiara/index" style="position: absolute; top: 283px; left: 773px; height: 15px; width: 15px;"></a>
		<a title="Taman Connaught" href="<?php echo $this->config->base_url(); ?>taman-connaught/index" style="position: absolute; top: 313px; left: 818px; height: 15px; width: 15px;"></a>
		<a title="Taman Suntex" href="<?php echo $this->config->base_url(); ?>taman-suntex/index" style="position: absolute; top: 280px; left: 895px; height: 15px; width: 15px;"></a>
		<a title="Sri Raya" href="<?php echo $this->config->base_url(); ?>sri-raya/index" style="position: absolute; top: 284px; left: 925px; height: 15px; width: 15px;"></a>
		<a title="Bandar Tun Hussein Onn" href="<?php echo $this->config->base_url(); ?>bandar-tun-hussein-onn/index" style="position: absolute; top: 311px; left: 978px; height: 15px; width: 15px;"></a>
		<a title="Bukit Dukung" href="<?php echo $this->config->base_url(); ?>bukit-dukung/index" style="position: absolute; top: 353px; left: 999px; height: 15px; width: 15px;"></a>
		<a title="Taman Koperasi Cuepacs " href="<?php echo $this->config->base_url(); ?>taman-koperasi-cuepacs/index" style="position: absolute; top: 391px; left: 1028px; height: 15px; width: 15px;"></a>
		<a title="Sungai Kantan" href="<?php echo $this->config->base_url(); ?>sungai-kantan/index" style="position: absolute; top: 434px; left: 1127px; height: 15px; width: 15px;"></a>
		<a title="Bandar Kajang" href="<?php echo $this->config->base_url(); ?>bandar-kajang/index" style="position: absolute; top: 450px; left: 1160px; height: 15px; width: 15px;"></a>
		<a title="Kajang" href="<?php echo $this->config->base_url(); ?>kajang/index" style="position: absolute; top: 478px; left: 1203px; height: 15px; width: 15px;"></a>
		<a title="Kajang Depot" href="<?php echo $this->config->base_url(); ?>sbk-s-06/dpt2" style="position: absolute; top: 455px; left: 1137px; height: 19px; width: 20px;"></a>
		
<!--		<a title="Electric Trains" href="--><?php //echo $this->config->base_url(); ?><!--sbk-s-01/index" style="position: absolute; top: 492px; left: 555px; height: 52px; width: 45px;"></a>-->
<!--		<a title="Depot Equipment &amp; Maintenance Vehicle" href="--><?php //echo $this->config->base_url(); ?><!--sbk-s-02/index" style="position: absolute; top: 492px; left: 606px; height: 52px; width: 45px;"></a>-->
<!--		<a title="Signalling &amp; Train Control System" href="--><?php //echo $this->config->base_url(); ?><!--sbk-s-03/index" style="position: absolute; top: 492px; left: 657px; height: 52px; width: 45px;"></a>-->
<!--		<a title="Platform Screen Door" href="--><?php //echo $this->config->base_url(); ?><!--sbk-s-04/index" style="position: absolute; top: 492px; left: 708px; height: 52px; width: 45px;"></a>-->
<!--		<a title="Power Supply and Distribution System" href="--><?php //echo $this->config->base_url(); ?><!--sbk-s-05/index" style="position: absolute; top: 492px; left: 759px; height: 52px; width: 45px;"></a>-->
<!--		<a title="Trackworks" href="--><?php //echo $this->config->base_url(); ?><!--sbk-s-06/index" style="position: absolute; top: 492px; left: 810px; height: 52px; width: 45px;"></a>-->
<!--		<a title="Telecommunication System" href="--><?php //echo $this->config->base_url(); ?><!--sbk-s-07/index" style="position: absolute; top: 556px; left: 504px; height: 55px; width: 45px;"></a>-->
<!--		<a title="Facility SCADA" href="--><?php //echo $this->config->base_url(); ?><!--sbk-s-08/index" style="position: absolute; top: 556px; left: 555px; height: 55px; width: 45px;"></a>-->
<!--		<a title="Automatic Fare Collection System" href="--><?php //echo $this->config->base_url(); ?><!--sbk-s-09/index" style="position: absolute; top: 556px; left: 606px; height: 55px; width: 45px;"></a>-->
<!--		<a title="Electronic Access Control System" href="--><?php //echo $this->config->base_url(); ?><!--sbk-s-10/index" style="position: absolute; top: 556px; left: 657px; height: 55px; width: 45px;"></a>-->
<!--		<a title="Building Management System" href="--><?php //echo $this->config->base_url(); ?><!--sbk-s-11/index" style="position: absolute; top: 556px; left: 708px; height: 55px; width: 45px;"></a>-->
<!--		<a title="Government Integrated Radio Network" href="--><?php //echo $this->config->base_url(); ?><!--sbk-s-12/index" style="position: absolute; top: 556px; left: 759px; height: 55px; width: 45px;"></a>-->
<!--		<a title="Information Technology System" href="--><?php //echo $this->config->base_url(); ?><!--sbk-s-13/index" style="position: absolute; top: 556px; left: 810px; height: 55px; width: 45px;"></a>-->
<!--		<a title="Commercial Mobile Telecommunication System" href="--><?php //echo $this->config->base_url(); ?><!--sbk-s-14/index" style="position: absolute; top: 556px; left: 861px; height: 55px; width: 45px;"></a>-->
<!--		-->
		<a title="MSPR1" href="<?php echo $this->config->base_url(); ?>mspr1/index" style="position: absolute; top: 400px; left: 20px; height: 40px; width: 40px;"></a>
		<a title="MSPR4" href="<?php echo $this->config->base_url(); ?>mspr4/index" style="position: absolute; top: 475px; left: 425px; height: 40px; width: 60px;"></a>
		<a title="MSPR6" href="<?php echo $this->config->base_url(); ?>mspr6/index" style="position: absolute; top: 300px; left: 710px; height: 30px; width: 40px;"></a>
		<a title="MSPR8" href="<?php echo $this->config->base_url(); ?>mspr8/index" style="position: absolute; top: 300px; left: 880px; height: 40px; width: 45px;"></a>
		<a title="MSPR9" href="<?php echo $this->config->base_url(); ?>mspr9/index" style="position: absolute; top: 497px; left: 1193px; height: 40px; width: 40px;"></a>
		<a title="MSPR11" href="<?php echo $this->config->base_url(); ?>mspr11/index" style="position: absolute; top: 455px; left: 1060px; height: 18px; width: 70px;"></a>
		
	</div>
	
<!--	<div style="position:absolute; top: 258px;left: 129px;"><img src="--><?php //echo $this->config->base_url(); ?><!--assets/img/arrow2.png" style="width:20px;"/></div>-->
	
<!--	<div id="project_progress_container" style="position:absolute; z-index:2; top: 119px;left: 30px;">-->
<!--		<span id="overall_actual" class="header-left" style="font-size:90px;"></span>-->
		<!-- <span class="subheader-left" style="">%</span> -->
<!--	</div>-->
    <div id="project_progress_container" style="position:absolute; z-index:2; top: 130px;left: 70px;">
        <strong></strong>
<!--        <span id="overall_actual" class="header-left" style="font-size:90px;"></span>-->
        <!-- <span class="subheader-left" style="">%</span> -->
    </div>
	
	
	<div style="position:absolute; z-index:2; top: 125px;left: 179px;">
<!--		<span class="header-left" style="font-size:72px;" id="overall_early"></span>-->
		<!-- <span class="subheader-left" style="">%</span> -->
	</div>

	<div style="position:absolute; z-index:2; top: 209px; right: 1029px;">
<!--		<span class="header-left" style="font-size:37px;" id="overall_variance"></span>-->
		<!-- <span class="subheader-left" style="">%</span> -->
	</div>
	
	<div style="position:absolute; z-index:2; top: 95px; left: 134px;">
		<span class="header-left"><i class="fa fa-calendar" style="color:#77DD77; margin-right:7px;"></i></span><span class="header-left" style="font-size:12px; color:#77DD77; line-height:20px" id="overall_date">As of <span style="color: #f3b308" id="progress_date"></span></span>
	</div>
<!---->
<!--	<div style="position:absolute; z-index:2; top: 88px;left: 807px;">-->
<!--		<span class="header-left"><i class="fa fa-calendar" style="color:#77DD77; margin-right:7px;"></i></span><span class="header-left" style="font-size:12px; color:#77DD77; line-height:20px">As of <span id="financial_date" style="color: #f3b308">30 September 2014</span></span>-->
<!--	</div>-->
<!--	-->
<!--	<div style="position:absolute; z-index:2; top: 112px;left: 639px;">-->
<!--		<span class="header-left" style="font-size:24px;" id="project_spend_to_date">--><?php //echo number_format($data['project_spend_to_date'], 2, '.', ','); ?><!-- Bil</span>-->
<!--	</div>-->
<!---->
<!--	<div style="position:absolute; z-index:2; top: 162px;left: 830px;">-->
<!--		<span class="header-left" style="font-size:24px;" id="pdp_reimbursables">--><?php //echo number_format($data['pdp_reimbursables'], 2, '.', ',');?><!-- Mil</span>-->
<!--	</div>-->
<!---->
<!--	<div style="position:absolute; z-index:2; top: 112px;left: 830px;">-->
<!--		<span class="header-left" style="font-size:24px;" id="awarded_packages">--><?php //echo number_format($data['awarded_packages'], 2, '.', ','); ?><!-- Bil</span>-->
<!--	</div>-->
<!---->
<!---->
<!--	<div style="position:absolute; z-index:2;top: 162px;left: 988px;">-->
<!--		<span class="header-left" style="font-size:24px;" title="" id="retention_sum">--><?php //echo number_format($data['retention_sum'], 2, '.', ','); ?><!-- Mil</span>-->
<!--	</div>-->
<!---->
<!---->
<!--	<div style="position:absolute; z-index:2;top: 112px;left: 988px;">-->
<!--		<span class="header-left" style="font-size:24px;" title="" id="wpcs_payment">--><?php //echo number_format($data['wpcs_payment'], 2, '.', ','); ?><!-- Bil</span>-->
<!--	</div>-->
<!---->
<!---->
<!--	<div style="position:absolute; z-index:2;top: 162px;left: 1132px;">-->
<!--		<span class="header-left" style="font-size:24px;" id="contingency_sum">--><?php //echo number_format($data['contingency_sum'], 2, '.', ','); ?><!-- Mil</span>-->
<!--	</div>-->
<!---->
<!--	<div style="position:absolute; z-index:2; top: 112px;left: 1132px;">-->
<!--		<span class="header-left" style="font-size:24px;" id="variation_orders">--><?php //echo number_format($data['variation_orders'], 2, '.', ','); ?><!-- Mil</span>-->
<!--	</div>-->
	
	<div style="position:absolute; z-index:2; top: 452px; left: 10px;">
<!--		<a href="--><?php //echo $this->config->base_url(); ?><!--r1/index" class="pkg_title">KD8</a>-->
        <a href="<?php echo $this->config->base_url(); ?>sbk-s-06/kd8" class="pkg_title">KD8</a>
	</div>	
	<div style="position:absolute; z-index:2; top: 520px;left: 29px;">
		<a href="<?php echo $this->config->base_url(); ?>sbk-s-06/kd9a" class="pkg_title">KD9A</a>
	</div>
	<div style="position:absolute; z-index:2; top: 610px;left: 85px;">
		<a href="<?php echo $this->config->base_url(); ?>sbk-s-06/kd9" class="pkg_title">KD9</a>
	</div>
	<div style="position: absolute; z-index: 2; top: 610px; left: 230px;">
		<a href="<?php echo $this->config->base_url(); ?>sbk-s-06/kd10" class="pkg_title">KD10</a>
	</div>	
	<div style="position: absolute; z-index: 2; top: 520px; left: 435px;">
		<a href="<?php echo $this->config->base_url(); ?>sbk-s-06/kd11" class="pkg_title">KD11</a>
	</div>
	<div style="position: absolute; z-index: 2; top: 400px; left: 530px;">
		<a href="<?php echo $this->config->base_url(); ?>sbk-s-06/kd11a" class="pkg_title">KD11A</a>
	</div>
	<div style="position: absolute; z-index: 2; top: 306px; left: 605px;">
		<a href="<?php echo $this->config->base_url(); ?>sbk-s-06/kd12n" class="pkg_title">KD12</a>
	</div>
    <div style="position: absolute; z-index: 2; top: 364px; left: 735px;">
        <a href="<?php echo $this->config->base_url(); ?>sbk-s-06/kd13" class="pkg_title">KD13</a>
    </div>
    <div style="position: absolute; z-index: 2; top: 420px; left: 884px;">
        <a href="<?php echo $this->config->base_url(); ?>sbk-s-06/kd14" class="pkg_title">KD14</a>
    </div>
    <div style="position: absolute; z-index: 2; top: 522px; left: 1054px;">
        <a href="<?php echo $this->config->base_url(); ?>sbk-s-06/kd15" class="pkg_title">KD15</a>
    </div>
    <div style="position: absolute; z-index: 2; top: 585px; left: 1202px;">
        <a href="<?php echo $this->config->base_url(); ?>sbk-s-06/kd16" class="pkg_title">KD16</a>
    </div>
	<!-- <div style="position:absolute; z-index:2; top: 608px;left: 503px;">
		<a href="<?php echo $this->config->base_url(); ?>systems/summary" class="pkg_title">SBK-S</a>
	</div> -->
	<!-- V1 -->
<!--	<div style="position:absolute; z-index:2; top: 437px;left: 635px;">-->
<!--		<a href="--><?php //echo $this->config->base_url(); ?><!--systems/summary" class="pkg_title">SBK-S</a>-->
<!--	</div>-->
	<div style="position:absolute; z-index:2; top: 350px;left: 200px;">
		<a href="<?php echo $this->config->base_url(); ?>north/index" class="pkg_title2">North</a>
	</div>
	<div style="position:absolute; z-index:2; top: 290px;left: 1110px;">
		<a href="<?php echo $this->config->base_url(); ?>south/index" class="pkg_title2">South</a>
	</div>
	<!-- 
	
<area  alt="" title="" href="http://www.image-maps.com/" shape="rect" coords="554,639,671,674" style="outline:none;" target="_self"     />
<area  alt="" title="" href="http://www.image-maps.com/" shape="rect" coords="679,639,782,674" style="outline:none;" target="_self"     />
<area  alt="" title="" href="http://www.image-maps.com/" shape="rect" coords="786,639,885,674" style="outline:none;" target="_self"     />
 -->
	<div id="reset" style="display:none; position: absolute; top: 579px; left: 710px;z-index: 5;"><img src="<?php echo $this->config->base_url(); ?>assets/img/reset.png" style="width: 43px;"/></div>
<!--	<div id="onschedule" class="togglebutton" style="top:558px; left:580px;"  ></div>-->
<!--	<div id="critical" class="togglebutton" style=" top:558px; left:679px;"  ></div>-->
<!--	<div id="delayed" class="togglebutton" style="top:558px; left:780px;"  ></div>-->
	<!--<map name="imgmap" id="ImageMapsCom-image-maps-2014-06-21-092652">
	<area  alt="" title="" href="http://www.image-maps.com/" shape="rect" coords="1097,193,1205,228" style="outline:none;" target="_self"    onclick="alert('asd');" />
	<area  alt="" title="" href="http://www.image-maps.com/" shape="rect" coords="1096,282,1205,315" style="outline:none;" target="_self"     />
	<area  alt="" title="" href="http://www.image-maps.com/" shape="rect" coords="1094,240,1208,273" style="outline:none;" target="_self"     />
	</map>
	<div id="awarded" style="min-width: 300px; height: 400px; position:absolute; top: 410px; left: 522px;"></div>-->
	</div>
	
	<!--<script type=text/javascript src=<?php echo $this->config->base_url(); ?>assets/js/highcharts.js></script> -->
		<script type="text/javascript">
		
		//var polyfilter_scriptpath = '/ceo/lib/';
		
		function prettyDate(d) {
                var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                var date = (typeof d == "undefined") ? new Date() : new Date(d);
                return date.getDate() + " " + monthNames[date.getMonth()] + " " + date.getFullYear();
            }
			
		window.scrollTo(0,1);
		$(window).load(function(){
			data = <?php echo json_encode($data); ?>;
            $("#design_p").text((typeof data['design_percentage']=='undefined')?'0.0%':data['design_percentage']+'%');
            $("#proc_p").text((typeof data['proc_percentage']=='undefined')?'0.0%':data['proc_percentage']+'%');
            $("#install_p").text((typeof data['install_percentage']=='undefined')?'0.0%':data['install_percentage']+'%');
            $overall=(parseFloat((typeof data['design_percentage']=='undefined')?0:data['design_percentage'])+parseFloat((typeof data['proc_percentage']=='undefined')?0:data['proc_percentage'])+parseFloat((typeof data['install_percentage']=='undefined')?0:data['install_percentage']))/3;
            $('#project_progress_container').circleProgress({
                value: ($overall/100),
                fill: { gradient: ['#07c6c1','#0681c4'] },
                size: 150,
                emptyFill: 'rgb(199, 69, 58)',//'rgb(244, 67, 54)',
                thickness: 20,
                startAngle: -1.5
            }).on('circle-animation-progress', function(event, progress) {
                $(this).find('strong').html(($overall * progress).toFixed(2) + '<i>%</i>');
            });
        if (data['overall_actual'] > 99) $('#overall_actual').css({ "fontSize" : "59px", "marginTop" : "31px"});
			if (data['overall_variance'] > 99) $('#overall_variance').css({ "fontSize" : "59px", "marginTop" : "10px", "marginLeft" : "-8px"});
			if (data['overall_early'] > 99) $('#overall_early').css({ "fontSize" : "59px", "marginTop" : "6px", "marginLeft" : "-8px"});
            //Modified By Ancy mathew
            //Usage : Append cooments
            //Starts here
/*            var g='',gd='';
            if(data['comments'].length>5) {
                for (var i = 0; i < 5; i++) {gd += ' <tr><td>R'+data['comments'][i]['ring']+'</td><td style="width: 70%;">' + data['comments'][i]['message'] + '</td><td>'+data['comments'][i]['timestamp']+'</td><tr>';}
                for(comment in data['comments']){g+=' <tr><td>R'+data['comments'][comment]['ring']+'</td><td style="width: 70%;">' + data['comments'][comment]['message'] + '</td><td>'+data['comments'][comment]['timestamp']+'</td><tr>';}
                $("#comment_container").prepend(gd);
                $("#comment_full_container").append(g);
            }else{
                for(comment in data['comments']){g+=' <tr><td>R'+data['comments'][comment]['ring']+'</td><td style="width: 70%;">' + data['comments'][comment]['message'] + '</td><td>'+data['comments'][comment]['timestamp']+'</td><tr>';}
                $("#comment_container").append(g);
                $("#comment_more").css("visibility", "hidden");
            }
            var st='';
            for(stat in data['summary']){
                if(data['summary'][stat]['ac_progress_completion']==null ){
                    st+='<tr> <td>'+data['summary'][stat]['summary']+'</td><td colspan="2">'+data['summary'][stat]['progress_completion']+'%</td></tr>';
                }
                else{
                    st+='<tr> <td rowspan="2">'+data['summary'][stat]['summary']+'</td><td style="background-color: #f79b3b"><b>33KV AC</b></td><td style="background-color: #f79b3b"><b>750V DC</b></td></tr><tr><td>'+data['summary'][stat]['ac_progress_completion']+'%</td><td>'+data['summary'][stat]['dc_progress_completion']+'%</td></tr>';
                }
            }
            $("#status_container").append(st);*/
            //Ends here
			$('#overall_actual').text(data['overall_actual']);
			//$('#overall_variance').text(data['overall_variance'].toFixed(0));
			$('#overall_variance').text(data['overall_variance']);
			$('#overall_early').text(data['overall_late']);
			$('#progress_date').text(prettyDate(data['progress_date']));
			$('#financial_date').text(prettyDate(data['comdate']));
		
			$i = $('#mapimg');
			//Width and height
			var w = $i.width();
			var h = $i.height();
			var station_circle_size = 9;
			var parking_box_size = 15;
			//var parking_box_height = 10;
			//[[44.21666666666667,81.65925925925926],[55.31666666666667,81.6],[63.93333333333333,81.62962962962963]]
			//Data

			stations = [
			[5.066666666666666,50.162962962962965,93, "kd8"],
			[5.916666666666667,54.04444444444444,95, "kd8"],
			[9.466666666666667,64.88888888888889,95, "kd9"],
			[8.883333333333333,69.3037037037037,99, "kd9"],
			[16.166666666666664,72.23703703703703,90, "kd10"],
			[20.233333333333334,65.62962962962963,90, "kd10"],
			[21.883333333333333,58.42962962962963,78, "kd11"],
			[26.55,59.58518518518518,90, "kd11"],
			[30.283333333333335,58.84444444444444,90, "kd11"],
			[33.18333333333333,56.62222222222222,90, "kd11"],
			[34.25,47.17037037037037,90, "kd11"],
			[33.38333333333333,41.15555555555556,96, "kd11"],
			[41.05,36.50370370370371,74, "kd12"],
			[40.71666666666667,32.148148148148145,47, "kd12"],
			[42.983333333333334,29.333333333333332,99, "kd12"],
			[43.78333333333334,25.125925925925923,39, "kd12"],
			[47.099999999999994,25.6,72, "kd12"],
			[49.166666666666664,27.348148148148148,75, "kd12"],
			[50.949999999999996,29.037037037037038,82, "kd12"],
			[53.88333333333334,32.41481481481481,47, "kd12"],
			[57.15,34.785185185185185,84, "kd13"],
			[60.45,35.644444444444446,94, "kd13"],
			[63.96666666666667,39.2,77, "kd13"],
			[70.05,35.288888888888884,78, "kd14"],
			[72.33333333333334,35.7037037037037,90, "kd14"],
			[76.48333333333333,39.08148148148148,90, "kd14"],
			[78.18333333333334,44.32592592592592,90, "kd15"],
			[80.48333333333333,49.03703703703704,90, "kd15"],
			[88.16666666666667,54.48888888888889,71, "kd15"],
			[90.71666666666667,56.38518518518518,90, "kd15"],
			[94.1,59.88148148148148,90, "kd16"],
			/* Legend */             [51.4,77.1, 19, 1],[59.6,77.1, 39, 1],[43,77.1, 100, 1],
			// /* Legend */             [33.4,81.8, 10, 1],[26.2,81.8, 50, 1],[18.5,81.8, 100, 1], V2
			/* System */
			// [46.57000,79.95, 100, "sbk-s-01"],
			// [48.60500,79.95, 100, "sbk-s-02"],
			// [50.64000,79.95, 100, "sbk-s-03"],
			// [52.67500,79.95, 100, "sbk-s-04"],
			// [54.71000,79.95, 100, "sbk-s-05"],
			// [56.74500,79.95, 100, "sbk-s-06"],
			// [58.78000,79.95, 100, "sbk-s-07"],
			// [60.81500,79.95, 100, "sbk-s-08"],
			// [62.85000,79.95, 100, "sbk-s-09"],
			// [64.88500,79.95, 100, "sbk-s-10"],
			// [66.92000,79.95, 100, "sbk-s-11"],
			// [68.95500,79.95, 100, "sbk-s-12"],
			// [70.99000,79.95, 100, "sbk-s-13"],
			// [73.02500,79.95, 100, "sbk-s-14"]
			// V1
//			[44.65,64.2, 100, "sbk-s-01"],
//			[48.65,64.2, 100, "sbk-s-02"],
//			[52.65,64.2, 100, "sbk-s-03"],
//			[56.65,64.2, 100, "sbk-s-04"],
//			[60.65,64.2, 100, "sbk-s-05"],
//			[64.65,64.2, 100, "sbk-s-06"],//aaa
//			[40.65,72.4, 100, "sbk-s-07"],
//			[44.65,72.4, 100, "sbk-s-08"],
//			[48.65,72.4, 100, "sbk-s-09"],
//			[52.65,72.4, 100, "sbk-s-10"],
//			[56.65,72.4, 100, "sbk-s-11"],
//			[60.65,72.4, 100, "sbk-s-12"],
//			[64.65,72.4, 100, "sbk-s-13"],
//			[68.65,72.4, 100, "sbk-s-14"]
			 ];
			parkings = [
			[2.7000000000000003,49.36296296296297,68],
			//[6.800000000000001,68.5925925925926,82],
			//[10.05,65.8074074074074,86],
			[26.166666666666664,61.392592592592585,67, true],
			[29.916666666666668,60.91851851851852,78, true],
			[32.95,58.72592592592593,99],
			[35.4,46.400000000000006,75, true],
			//[50.38333333333333,30.992592592592594,86],
			[56.53333333333334,36.82962962962963,74],
			[64.8,40.41481481481482,73, true],
			[69.68333333333334,37.007407407407406,91],
			//[72.08333333333333,37.6,100],
			//[75.78333333333333,40.474074074074075,62],
			[86.6,56.15,20],
			//[88.86666666666667,51.55555555555556,61],
			//[93.60000000000001,61.86666666666667,73]
			[93.60000000000001,61.86666666666667,73]
			];
            paths = [
                ["m 97.862302,457.04186 c -0.300753,-0.15048 -0.826735,-0.5271 -1.277686,-0.82831 -0.375782,-0.30131 -0.901904,-0.52706 -1.052211,-0.52706 -0.225476,0 -0.601293,-0.30132 -0.901833,-0.60241 -0.375782,-0.30132 -0.977039,-0.67769 -1.352857,-0.90359 -1.503162,-0.82827 -5.185951,-4.14141 -6.087856,-5.49677 -0.526087,-0.753 -0.977039,-1.43069 -0.977039,-1.58128 0,-0.0754 -0.225476,-0.45179 -0.450953,-0.753 -0.300753,-0.30131 -0.901904,-1.20479 -1.352856,-1.88248 -0.450953,-0.75296 -0.977076,-1.50597 -1.127381,-1.73186 -0.225477,-0.15048 -0.526122,-0.6777 -0.751599,-1.05417 -0.751599,-1.12947 -1.503056,-2.18367 -2.179485,-3.01195 -0.375817,-0.45179 -1.503197,-1.88249 -2.555407,-3.16256 -0.977076,-1.35536 -2.254762,-3.08722 -2.856019,-3.84022 -0.67643,-0.753 -1.428028,-1.80716 -1.728675,-2.25897 -0.300752,-0.45179 -1.277686,-1.65657 -2.10442,-2.71074 -0.901904,-1.05416 -1.653469,-2.10838 -1.728638,-2.33426 -0.1502,-0.22591 -0.526088,-0.75297 -0.90187,-1.20477 -0.300753,-0.52711 -0.826768,-1.20479 -1.052245,-1.58128 -0.225476,-0.3765 -0.826735,-1.20477 -1.352823,-1.80715 -1.12738,-1.58128 -2.780884,-4.29204 -3.457276,-5.79802 -1.578333,-3.46372 -1.954115,-5.57209 -1.277686,-7.68047 0.450916,-1.35537 0.601258,-1.58127 1.728638,-2.86134 0.601258,-0.753 1.503127,-0.753 2.02925,-0.15048 0.375782,0.52711 0.450952,0.4518 1.803809,-0.90358 0.751565,-0.82828 1.503162,-1.43069 1.728639,-1.43069 0.225476,0 0.97704,-0.22588 1.653468,-0.52706 2.329897,-0.90358 3.908229,-0.45179 3.908229,1.12947 0,1.50597 -1.277686,2.78604 -3.306971,3.31314 -0.375782,0.0754 -1.05221,0.60238 -1.503162,1.12948 -1.427993,1.58127 -2.405032,2.40954 -3.382107,2.63543 l -0.977076,0.30132 0.300753,0.82831 c 1.127381,2.86134 2.254762,4.96971 4.058536,7.45456 0.676428,0.82828 1.653503,2.18366 2.17959,2.93666 1.352858,1.80717 7.515848,10.01469 10.522102,13.85492 2.254762,2.86137 4.659829,6.24982 5.411427,7.45457 2.705714,4.36734 3.457313,5.34624 5.261123,6.8522 1.803809,1.43068 4.359075,3.31312 4.659721,3.31312 0.225476,0 4.133954,3.03458 4.133954,3.18517 0,0.22589 -2.54355,3.07573 -2.693855,3.07573 0,0 -0.763671,-0.68867 -0.989147,-0.8395 z",80,false,"kd8"],
                ["m 123.89561,498.16077 c -0.1502,-0.4518 -0.67643,-1.50597 -1.05225,-2.48485 -0.37578,-0.9036 -0.82673,-1.80717 -0.97704,-2.03307 -0.15019,-0.15049 -0.37571,-0.60238 -0.45088,-0.90359 -0.0753,-0.37648 -0.45095,-1.12948 -0.82673,-1.73186 -0.37578,-0.52711 -0.82674,-1.50596 -1.12737,-2.10837 -0.52613,-1.35538 -2.1796,-3.46371 -3.00637,-3.84024 -0.37578,-0.15047 -0.90191,-0.22588 -1.20251,-0.15047 -0.45096,0.15047 -3.00636,1.95779 -3.75796,2.71075 -0.15021,0.15049 -1.50317,1.4307 -3.00633,2.86136 -1.42792,1.43067 -3.53238,3.46373 -4.58459,4.66853 -2.48023,2.63543 -3.08153,3.01195 -4.208912,2.56015 -1.127378,-0.45179 -1.728636,-1.2801 -1.503159,-2.33427 0.150198,-1.20479 0.526123,-1.95776 1.428027,-2.78605 3.607624,-3.76492 5.486564,-5.64741 6.388464,-6.47568 0.30076,-0.22589 1.05225,-0.97889 1.65351,-1.50597 3.38203,-3.16254 5.78713,-4.81912 7.06482,-4.81912 0.37578,0 0.67643,-0.0754 0.67643,-0.0754 0,-0.15049 -2.93118,-6.55098 -3.60761,-7.90637 -0.67643,-1.2801 -1.05221,-1.65658 -2.10446,-2.10837 -0.97704,-0.4518 -4.81006,-1.35537 -5.6368,-1.35537 -0.67643,0 -2.10446,-1.73186 -2.10446,-2.48486 0,-0.30132 -0.15019,-0.90359 -0.30075,-1.20479 -0.1502,-0.37648 -0.22547,-0.82828 -0.1502,-0.97886 0,-0.15048 0,-0.37652 -0.15019,-0.4518 -0.15021,-0.15047 -0.22548,-0.37651 -0.22548,-0.60241 0,-0.52706 -0.63004,-2.2125 -1.38164,-3.34198 -0.370322,-0.56117 -0.904889,-1.37708 -0.896397,-1.43615 0.07527,-0.15048 0.525869,-0.69525 1.277467,-1.44822 l 1.3933,-1.64488 1.41107,1.92266 c 0.97708,1.65655 1.80381,3.61434 2.40511,5.87329 l 0.37578,1.43066 1.20255,0.30131 c 2.32982,0.52711 4.35911,1.20479 5.6368,1.88248 1.35286,0.753 2.40507,1.73186 2.40507,2.25897 0,0.30131 3.68278,8.50872 4.58469,10.31588 1.19427,2.95355 2.32574,5.22241 3.53234,8.057 0.0753,0.30131 0.37582,0.97886 0.67643,1.43065 0.90191,1.43069 4.28404,8.73468 4.13374,8.88524 -0.0753,0.15049 -3.38214,1.80718 -3.53244,1.80718 0,0 -0.22548,-0.30131 -0.45096,-0.75301 z",80,false,"kd9a"],
                ["m 183.68083,583.49271 c -0.52608,-0.15048 -1.05221,-0.37648 -1.20251,-0.45179 -5.40553,-2.16896 -11.33942,-4.70556 -16.90502,-4.03775 -3.0815,0 -7.44039,0.15048 -9.69515,0.30131 -6.31334,0.37651 -22.84805,-0.2259 -25.25312,-0.90359 -0.82676,-0.30131 -2.5554,-0.67768 -3.90826,-0.90358 -1.47639,-0.2139 -2.1088,-0.58986 -3.31271,-1.12443 -0.82673,-0.60237 -2.06433,-1.22816 -4.01848,-3.93892 -0.37578,-0.4518 -0.9019,-1.88248 -1.27769,-3.16254 -0.37578,-1.35537 -0.7516,-2.78607 -0.9019,-3.23785 -0.15021,-0.4518 -0.37578,-1.4307 -0.52613,-2.25896 -0.15019,-0.75301 -0.52608,-2.18366 -0.75156,-3.16255 -0.30075,-0.9789 -0.52612,-1.95776 -0.52612,-2.18366 0,-0.15047 -0.1502,-0.97889 -0.45096,-1.65658 -0.22547,-0.753 -0.45095,-1.95775 -0.60125,-2.63543 -0.0753,-0.753 -1.27297,-2.2414 -1.42318,-2.9944 -0.22547,-0.753 0.0352,-2.38616 -0.11517,-3.13912 -0.15021,-0.8283 -0.37578,-2.10837 -0.60126,-2.86137 -0.1502,-0.82827 -0.37578,-2.03303 -0.45095,-2.78603 -0.0753,-0.67769 -0.30076,-1.65658 -0.45096,-2.10836 -0.1502,-0.52707 -0.30076,-1.95776 -0.30076,-3.84024 l 0,-3.01192 1.05221,-1.506 c 3.38215,-5.26989 3.30702,-5.11931 6.2382,-10.08901 0.82674,-1.28007 1.42799,-2.40955 1.42799,-2.48487 0,0 0.37582,-0.75296 0.82678,-1.58126 0.45095,-0.82828 0.9019,-1.88244 1.12727,-2.40954 0.1502,-0.4518 0.67643,-1.50597 1.05221,-2.33428 0.97708,-1.80718 2.17477,-3.18011 2.40025,-9.20399 l -0.71202,-4.89905 1.88467,-0.95001 1.47372,-1.01949 1.41231,5.88967 c -0.0753,2.63546 -1.27298,5.74026 -1.42317,7.24622 -0.30076,2.56017 -0.37579,2.86138 -1.87895,5.94862 -2.10446,4.51791 -2.70572,5.79798 -3.53248,7.07808 -0.37579,0.60237 -0.75157,1.12947 -0.75157,1.28006 0,0.15048 -0.37571,0.82827 -0.82666,1.50596 -2.02928,3.16155 -2.85602,4.51692 -3.75792,6.02289 -0.52613,0.8283 -1.27773,2.03306 -1.65351,2.56016 l -0.67643,1.05417 0.30076,1.58128 c 0.0753,0.90358 0.30075,2.25896 0.45095,3.01196 0.0753,0.82826 0.30075,1.95775 0.37578,2.48485 0.1502,0.60238 0.52612,2.63544 0.90191,4.4426 1.12737,6.17451 2.36508,10.19964 3.41729,14.03988 0.30075,1.12947 0.6013,2.25895 0.6013,2.48485 0,0.30131 0.0753,0.60238 0.15019,0.753 0.15021,0.0755 0.45096,1.12948 0.67643,2.18365 0.67632,2.71075 2.59616,4.08449 4.47514,5.51519 0.97708,0.82827 3.60761,1.80716 4.58469,1.80716 0.37578,0 0.90191,0.0755 1.27769,0.22591 1.72864,0.60237 19.24043,1.43063 21.57036,0.97885 0.82673,-0.15049 4.735,-0.37648 8.79325,-0.52708 8.04197,-0.22588 9.76492,-0.63106 11.64389,0.4233 3.43419,1.578 7.52252,2.79871 10.59738,4.06615 l 0.90191,0.52709 -0.1502,1.43069 c -0.0753,0.82826 -0.0753,1.73185 -0.0753,2.10833 0,0.75301 -0.0753,0.75301 -1.50319,0.4518 z",70,false,"kd9"],
                ["m 196.46984,586.83393 c -0.67643,-0.0754 -1.80382,-0.30132 -2.55541,-0.37651 -0.75157,-0.15048 -2.10442,-0.4518 -2.85602,-0.6777 -2.37326,-1.1379 -4.09549,-1.20661 -5.99769,-2.23419 l 0.14731,-1.86775 c 0.1717,-2.17691 0.0753,-2.40957 0.37581,-2.25895 0.22548,0.0755 1.71664,0.93968 2.69368,1.09015 0.90191,0.2259 2.25476,0.52707 3.00637,0.75297 0.67643,0.15047 1.95411,0.45178 2.85602,0.60241 0.90189,0.15047 2.02928,0.37649 2.48023,0.52706 0.7516,0.2259 1.12738,0.15049 2.17963,-0.15049 1.8038,-0.67768 1.72863,-1.05415 2.70571,-1.95772 0.97704,-0.82832 1.20251,-0.82832 2.78085,-2.10839 0.6013,-0.5271 1.27773,-0.97889 2.4051,-2.25896 0.75157,-0.90359 1.65347,-1.80717 1.95412,-1.95775 0.67642,-0.37651 2.40506,-2.03307 4.73499,-4.51792 12.91648,-13.18486 26.1937,-24.90649 38.48126,-38.7788 2.61319,-2.43474 5.25291,-5.01457 7.21523,-7.15237 0.67642,-0.67768 1.20255,-1.20479 1.35286,-1.20479 0.0753,0 0.67642,0.753 1.35286,1.65658 l 1.20256,1.65655 -0.97709,1.2038 c -14.87597,14.88289 -30.72687,30.96546 -44.4188,44.57678 -0.75156,0.75299 -1.80381,1.80717 -2.32989,2.33427 -0.52613,0.60238 -1.6535,1.73186 -2.55541,2.48485 -0.82673,0.82827 -2.02929,1.95776 -2.63054,2.63545 -1.57834,1.65658 -3.45731,3.16254 -5.03565,4.44261 -2.32994,2.25896 -5.56174,4.06613 -8.56809,3.53906 z",70,true,"kd10"],
                ["m 261.97415,523.89729 c -0.67642,-0.90356 -1.20255,-1.73188 -1.20255,-1.80715 0,-0.0755 0.45095,-0.60242 0.9019,-1.12949 0.82678,-0.90357 1.05225,-1.35538 1.57735,-3.08726 0.82676,-3.16255 0.9019,-3.61433 0.75159,-4.59319 -0.15019,-0.52711 -0.30075,-1.80718 -0.45095,-2.78608 -0.15019,-0.97888 -0.52513,-2.48485 -0.75061,-3.38842 -0.30075,-0.82829 -0.67643,-2.71077 -0.9019,-4.14145 -0.22548,-1.43065 -0.52608,-3.16254 -0.60125,-3.76492 -0.1502,-0.52711 -0.22549,-2.03307 -0.30076,-3.16255 -0.0753,-5.34619 -0.0753,-5.72271 0.30076,-6.32508 0.45095,-0.67768 2.85502,-3.46375 11.87407,-13.77967 3.68278,-4.21671 6.91461,-7.98165 7.1401,-8.35814 0.22547,-0.37648 0.67642,-0.90357 0.97703,-1.12948 0.30076,-0.30131 0.9019,-0.90359 1.35286,-1.43069 1.95415,-2.40955 5.41142,-3.91549 8.49296,-3.6896 2.48024,0.15048 7.21524,1.12948 9.77061,1.95774 0.60129,0.15049 2.25476,0.67769 3.75795,1.12949 1.428,0.5271 2.78086,0.90358 3.00633,0.90358 0.1502,0 0.9019,0.22589 1.57834,0.45179 0.67642,0.30132 1.57833,0.60239 2.10445,0.67769 0.7516,0.22591 7.36554,2.10839 10.37191,3.01195 0.60125,0.2259 1.87898,0.60238 2.78088,0.90359 0.82673,0.37648 2.48023,0.90359 3.60761,1.28006 1.1274,0.30132 3.00633,0.9789 4.28406,1.4307 4.64306,1.43929 9.11278,-0.61572 13.52857,-1.05421 3.5422,-0.0419 4.87376,-1.97012 7.36554,-4.2166 1.80381,-1.80717 3.15667,-2.25897 5.26112,-1.80717 0.67643,0.15047 2.25475,0.45179 3.45727,0.60241 1.27773,0.22589 2.78089,0.45179 3.45732,0.60238 0.60126,0.15048 2.17959,0.37648 3.53245,0.60238 1.27772,0.22589 2.85605,0.45179 3.45731,0.60241 5.78722,1.05416 5.6369,1.05416 6.76428,0.60238 5.90694,-2.38811 12.35177,-2.45695 18.63936,-2.48486 l 2.62954,0 1.5032,-0.9789 c 1.50316,-0.90358 4.96047,-2.63544 7.14007,-3.61433 2.70571,-1.20476 4.28404,-2.25896 5.6369,-3.76492 0.7516,-0.82828 1.65351,-1.35538 2.5554,-1.88249 0.30075,-0.22589 1.42799,-0.75296 2.55538,-1.20474 4.40577,-2.001 8.87278,-2.56227 13.37826,-4.36734 0.82673,-0.45179 0.90191,-0.5271 1.35286,-2.33426 2.11739,-16.28037 -2.98959,-36.36824 6.68911,-53.08557 0.1502,-0.2259 0.30075,-0.45179 0.30075,-0.52707 0,-0.15047 0.22549,-0.60242 0.60127,-1.0542 0.52611,-0.82827 0.52611,-0.90359 0.37581,-3.38744 -0.0753,-3.16254 -0.37581,-5.1203 -0.82677,-5.8733 -0.1502,-0.30131 -0.37578,-0.82829 -0.45095,-1.12948 -0.0753,-0.37648 -0.30076,-1.05416 -0.52609,-1.58127 -0.22547,-0.52706 -0.52613,-1.50596 -0.82677,-2.10834 -0.97705,-2.63548 -1.20251,-4.21674 -1.12738,-10.16531 0,-5.19561 0.0753,-5.8733 0.60129,-8.73467 0.9047,-4.48591 4.63885,-10.61684 1.50327,-14.00556 -0.82673,-0.90358 -4.05857,-3.53903 -5.03564,-4.1414 -2.93649,-1.40327 -5.12028,-3.92971 -6.53881,-5.79802 -1.12738,-1.58127 -1.42799,-2.18365 -1.50316,-3.01192 -0.0753,-0.60241 -0.22548,-1.88248 -0.37579,-2.86138 -0.15019,-1.43066 -0.0753,-2.40954 0.15021,-4.06612 0.7516,-5.49679 2.32993,-7.37927 6.08785,-7.37927 2.48023,0 2.70572,-0.0754 2.85602,-1.12947 1.84525,-4.65206 3.61117,-9.00829 6.08786,-13.40318 0.0753,0 0.75159,0.753 1.50319,1.6566 l 1.27769,1.73185 c -1.31937,4.10849 -4.24908,8.07362 -5.11079,11.82189 -0.0753,1.05418 -1.12737,2.78607 -1.80381,2.93664 -0.37581,0.0754 -0.90189,0.2259 -1.12737,0.3765 -1.66414,0.42595 -3.04251,1.18708 -4.39429,1.81049 -0.75156,0.9789 -1.54326,1.35219 -1.54326,4.13822 0,2.48486 0.0753,2.78605 0.52612,3.38843 0.30075,0.45181 0.82674,1.2801 1.27769,1.88249 2.84706,3.32054 6.5597,4.9934 9.84578,8.05695 1.487,1.10239 2.59754,2.44848 2.78088,4.06612 0.40893,4.19607 0.089,8.54662 -1.95411,12.349 -0.82677,1.12948 -1.50321,11.67129 -0.97708,15.51152 0.22548,1.73186 0.45095,2.40954 1.12738,4.21671 0.30075,0.67769 0.60126,1.65658 0.7516,2.18369 0.1502,0.52707 0.37578,1.05417 0.45096,1.12948 0.0753,0.15048 0.37577,0.90358 0.60125,1.58127 0.37578,1.05416 0.52613,2.03306 0.60125,4.8944 0.1502,4.81812 0,5.94761 -0.97703,7.60416 -0.37582,0.67769 -0.9019,1.65658 -1.12739,2.18368 -0.22547,0.52706 -0.67642,1.35538 -0.9019,1.73186 -5.99955,13.84983 -4.30678,25.21526 -4.28404,39.15531 0,3.84023 -0.37582,9.26174 -0.7516,10.39122 -0.60126,2.10834 -1.12738,3.53903 -1.27769,3.76492 -0.37581,0.45179 -2.32993,1.43069 -3.83309,1.88248 -5.0046,2.03916 -8.86485,2.23904 -13.90439,4.81908 -1.72864,1.28011 -2.55537,2.33428 -3.75793,3.16255 -1.0522,0.67769 -2.25475,1.35538 -4.43434,2.40958 -0.22548,0.0754 -0.82677,0.37648 -1.20255,0.60239 -0.45095,0.22589 -0.9019,0.37647 -0.97708,0.37647 -0.0753,0 -1.65346,0.82831 -3.60762,1.88248 -3.38214,1.88247 -5.11078,2.56016 -5.86238,2.33426 -0.15019,-0.0754 -2.1786,0 -4.35819,0.15048 -4.61757,-0.31588 -8.88255,0.43941 -13.07761,1.58128 -0.0753,0.15049 -0.30075,0.22589 -0.60126,0.22589 -0.30076,0 -0.82677,0.22591 -1.12738,0.4518 -0.67642,0.4518 -3.45731,0.52707 -4.96047,0.0754 -0.90191,-0.30131 -2.78088,-0.60241 -4.81018,-0.82831 -0.45095,-0.0754 -1.8038,-0.30132 -3.00635,-0.52706 -1.12739,-0.2259 -2.78086,-0.45181 -3.60762,-0.60242 -2.25476,-0.30131 -6.68911,-1.05418 -6.83942,-1.20475 -0.0753,-0.0755 -1.42803,1.05416 -3.00637,2.48485 -2.59874,2.8674 -5.52,3.60129 -8.34261,3.76491 -4.87937,0.30005 -10.36264,2.3491 -13.90435,1.05417 -1.35286,-0.45179 -2.93119,-0.97885 -3.53249,-1.20473 -2.85602,-0.90359 -3.98339,-1.28011 -5.6369,-1.88248 -0.97704,-0.30132 -2.17959,-0.67769 -2.55537,-0.82829 -0.45095,-0.0754 -1.6535,-0.45178 -2.78088,-0.8283 -1.12738,-0.30131 -3.68279,-1.12949 -5.78722,-1.73187 -2.02929,-0.52709 -3.98343,-1.12948 -4.35921,-1.28006 -0.90191,-0.30131 -2.78088,-0.8283 -4.13374,-1.20478 -0.67643,-0.15049 -1.35286,-0.37648 -1.50317,-0.4518 -0.30075,-0.15048 -1.72862,-0.60237 -5.03564,-1.43069 -1.95412,-0.52707 -4.13371,-0.82827 -6.08785,-0.82827 -1.57834,0 -2.1796,0.0754 -2.85603,0.5271 -1.05221,0.60238 -3.45731,2.93665 -4.35921,4.21671 -0.30076,0.52711 -3.60762,4.36735 -7.21524,8.43346 -5.18595,5.87329 -10.74769,12.27367 -11.12347,12.80077 -0.0753,0.0754 0,1.65658 0.0753,3.53903 0.30076,4.29202 0.67643,7.45457 1.42799,9.78883 1.27773,4.21672 1.87899,10.61712 1.05226,12.34896 -0.15021,0.37652 -0.37583,1.12948 -0.45096,1.65659 -0.30075,1.65658 -1.35286,3.76493 -2.55541,5.04502 l -1.27769,1.28007 c -0.0743,0 -0.60029,-0.75301 -1.27672,-1.65658 z",70,true,"kd11"],
                ["m 486.46019,318.26742 c -3.80613,-1.45808 -5.56595,-3.57278 -9.01905,-6.47568 -0.15019,-0.15048 -3.45731,-2.93665 -3.83309,-3.23784 -6.99793,-0.47458 -12.23722,-0.39333 -19.76674,-0.45189 l -1.50319,-1.05421 c -2.76182,-1.82785 -5.49459,-1.70866 -6.93913,1.39136 -2.55541,-3.38843 -3.00186,-3.34753 -2.70121,-3.57343 0.22547,-0.15048 1.14741,-1.65817 1.74868,-2.10996 3.01192,-1.96187 6.74689,-1.76422 9.62034,0.2259 l 1.0522,0.75301 19.69159,0.30095 1.72864,1.43068 c 3.84227,2.5588 6.75838,6.74802 11.26853,8.32344 0.422,0.0995 0.93948,0.28955 1.10694,0.39867 0.33959,0.22127 -0.004,0.59609 -0.20504,2.61324 -0.0753,0.9036 0.0523,1.77811 -0.023,1.70282 -0.0753,0 -1.47503,-0.16221 -2.22663,-0.2373 z",70,true,"kd11a"],
                ["m 489.43245,318.79451 c -0.30075,-0.0754 -0.60126,-0.22589 -0.75158,-0.30132 -0.0753,-0.0754 -0.0753,-1.12947 0,-2.25895 l 0.15021,-2.10836 0.60126,0.15047 c 16.03354,2.09763 28.54441,-9.9177 35.32461,-21.30953 6.83017,-12.23716 3.92364,-20.38383 -3.15666,-30.57075 -1.57833,-2.10837 -1.80381,-2.56016 -1.80381,-3.91554 0,-1.43064 0.45095,-2.33423 1.95411,-3.84022 0.67643,-0.75296 1.50317,-1.65655 1.87899,-2.03307 5.73279,-6.08736 10.2348,-12.29086 18.93896,-14.60782 4.50953,-1.12948 6.83946,-2.33417 7.81653,-3.91544 0.60126,-0.90358 0.60126,-1.12947 0.0753,-8.05694 -0.68928,-6.40302 1.63079,-12.44848 3.9833,-18.37271 0.52608,-1.43064 1.20251,-3.08723 1.35285,-3.61434 0.22548,-0.52707 0.45095,-1.05416 0.52609,-1.12948 0.0753,-0.15048 0.6013,-1.20475 1.12737,-2.40954 1.35286,-2.78603 3.30702,-5.79795 4.65987,-7.2286 3.60772,-3.6143 6.46375,-4.66847 12.32613,-4.66847 3.23184,0 3.75792,0.0754 6.23816,0.75299 10.18663,2.97488 20.11587,9.31209 27.20748,15.21025 1.95411,1.65655 3.90823,3.23781 4.28404,3.61434 2.68966,2.1323 5.53931,4.02202 8.41775,5.87318 0.45095,0.37649 2.17963,1.35537 3.75797,2.25896 1.57832,0.97889 3.75791,2.25896 4.73499,2.93665 1.05221,0.67769 1.95412,1.20479 1.95412,1.20479 0.0753,0 0.60126,0.30131 1.20254,0.75296 5.14664,2.43142 9.89224,4.05249 15.40753,6.24971 1.50319,0.67769 3.90827,1.58127 5.26112,2.03305 1.35286,0.52711 3.23183,1.28007 4.20887,1.73186 1.57833,0.60241 1.95414,0.67769 2.70571,0.5271 1.5032,-0.37647 2.40511,0 3.53249,1.35538 0.9019,1.2048 1.42799,2.63544 1.27768,3.46365 -0.0753,0.15048 -0.1502,1.50596 -0.1502,3.01192 0.10947,5.67949 -1.06958,12.44304 1.57834,16.64091 0.45095,0.45181 0.97703,1.05418 1.27768,1.50598 7.16091,3.99545 11.12735,-2.58094 18.48805,-2.63545 1.50317,-0.0754 1.80381,0 2.93119,0.67769 0.60126,0.45178 1.35286,0.9789 1.6535,1.20479 0.22549,0.30131 0.67644,0.60237 1.05222,0.75297 l 0.60125,0.30131 0,2.63548 0,2.56002 -1.0522,-0.52697 c -0.52613,-0.2259 -1.80382,-1.12946 -2.85603,-1.88247 -1.05225,-0.75299 -2.10445,-1.43068 -2.40509,-1.43068 -5.3649,1.00749 -10.57602,4.54411 -15.78334,4.59312 -2.10442,0 -3.53145,-0.90349 -6.08687,-3.68953 -1.72863,-1.88245 -1.9541,-2.18366 -2.32988,-3.68963 -0.94372,-6.00993 -1.45928,-12.43229 -1.05238,-18.2975 0.15019,-2.03306 0.0753,-2.33414 -0.82674,-1.80716 -0.30076,0.15046 -0.9019,0.0754 -2.93119,-0.75287 -1.35286,-0.52708 -3.38214,-1.28009 -4.43436,-1.65658 -1.05224,-0.37648 -2.10445,-0.82826 -2.32993,-0.90358 -0.67643,-0.37648 -2.70571,-1.20478 -3.15667,-1.35538 -4.12859,-1.57475 -8.68707,-3.36936 -12.1757,-4.6685 -1.72864,-0.67768 -3.45732,-1.43069 -3.8331,-1.65657 -0.67643,-0.45181 -1.65351,-1.05418 -4.13374,-2.63549 -0.75157,-0.45169 -1.428,-0.90348 -1.50317,-0.97875 -0.0753,-0.0755 -1.42802,-0.8283 -3.00636,-1.80717 -3.91996,-2.42962 -8.06367,-4.66391 -11.57441,-7.68046 -0.1502,-0.15049 -0.67643,-0.60241 -1.27773,-1.0542 -0.60125,-0.45181 -2.40506,-1.95776 -4.05856,-3.31303 -1.65347,-1.43068 -3.2318,-2.71075 -3.53245,-2.86137 -0.22548,-0.15048 -0.60126,-0.4518 -0.67643,-0.52706 -0.45096,-0.37653 -1.87899,-1.4307 -1.95411,-1.4307 -0.0753,0 -0.45095,-0.22589 -0.82677,-0.60237 -0.37579,-0.30131 -0.75157,-0.60242 -0.82674,-0.60242 -0.0753,0 -0.52612,-0.30131 -1.05221,-0.67768 -5.22466,-3.13635 -10.59932,-5.90913 -16.45976,-7.6804 -1.72867,-0.52706 -2.4051,-0.60238 -5.78725,-0.52706 -3.83309,0 -3.83309,0 -5.48655,0.75297 -3.08153,1.43068 -5.4866,4.06608 -7.44072,8.13217 -3.50149,7.75568 -7.30711,16.92587 -6.76428,24.17071 0.67643,7.90634 0.22547,10.16519 -2.25476,12.27358 -1.87898,1.65655 -4.20892,2.71075 -7.81654,3.61434 -7.17709,1.2947 -10.9246,6.65336 -15.55682,11.29468 -2.48023,2.63544 -3.90825,4.06613 -4.43438,4.59324 l -0.52609,0.45179 0.82673,1.12947 c 0.45095,0.6777 1.27769,1.88245 1.87898,2.71075 0.52609,0.90359 1.05221,1.73176 1.20252,1.95765 5.07428,8.16959 5.98395,15.01002 3.68278,23.19191 -0.75159,2.63512 -2.25476,6.24946 -3.30696,7.83073 -0.22549,0.37651 -0.45095,0.8283 -0.45095,0.90357 0,0.0755 -0.75161,1.12948 -1.57834,2.4096 -0.82676,1.28006 -1.72867,2.56013 -1.95416,2.93665 -8.13822,11.00197 -20.66938,19.77473 -34.72331,17.31867 z",70,true,"kd12"],
                ["m 811.56375,317.66504 c -0.37579,-0.15049 -0.97708,-0.52712 -1.27769,-0.90359 -0.37582,-0.37651 -0.67644,-0.67769 -0.82677,-0.67769 -0.0753,0 -1.25482,0.29454 -2.3822,-0.60904 -25.85189,-26.41219 -48.06839,-36.12968 -68.26598,-34.63065 -3.08148,-0.0754 -6.31333,-0.2259 -7.21523,-0.37652 -0.9019,-0.15048 -3.30698,-0.22589 -5.33626,-0.22589 -4.50953,0 -8.26748,-0.30132 -8.71844,-0.82829 -3.25392,-0.72959 -5.96748,-3.14958 -9.16519,-5.58449 -3.01878,-2.29865 -6.47403,-4.48425 -9.90224,-6.5912 -0.30076,-0.15047 -1.12738,-0.75295 -1.80381,-1.28007 l -1.35285,-0.97889 0.27778,-3.33563 c 0.11873,-1.42572 0.0753,-2.63544 0.0753,-2.63544 0.0753,0 0.60129,0.37648 1.20254,0.82826 0.60127,0.45179 1.50317,1.2048 2.10446,1.58128 6.7856,4.42628 13.26374,9.09199 19.91704,13.62895 l 1.27772,0.753 5.56173,0.0754 c 3.0815,0 6.16303,0.0754 6.9146,0.2259 0.82676,0.15047 3.83308,0.30131 6.83945,0.30131 3.00636,0.0755 5.86237,0.0755 6.3885,0.15048 0.52609,0 3.30697,0.22589 6.08785,0.45169 17.39476,2.58561 35.69193,12.67058 48.17673,25.22475 2.48023,2.63545 4.58469,4.51793 7.43972,6.70157 0.60125,0.45179 1.05221,0.90359 1.12738,0.9789 0.0753,0.15047 0.1502,0.22589 0.30075,0.22589 0.1502,0 0.60129,0.37649 0.97708,0.75297 0.45095,0.45178 0.97707,0.97889 1.35284,1.12948 0.30076,0.22589 0.97709,0.67769 1.50318,1.0542 0.9019,0.60238 0.9019,0.60238 2.10446,0.30132 0.60125,-0.2259 1.50315,-0.60238 1.87897,-0.82828 0.45096,-0.22589 0.97704,-0.5271 1.27769,-0.60242 0.60126,-0.22589 2.02928,-1.28007 3.9834,-2.86133 0.67642,-0.60237 2.02928,-1.43068 2.85606,-1.95775 1.70601,-1.01178 2.71987,-2.03749 4.71638,-3.60368 l 0.15021,1.65655 c 0.0753,0.8283 0.1502,2.03307 0.0753,2.56016 0,0.20898 0.0649,0.17293 -0.0379,0.34098 -0.41571,0.67966 -1.68852,1.30441 -2.71294,1.90813 -0.75156,0.37647 -1.42799,0.82827 -1.42799,0.90358 -0.0753,0.0754 -0.23693,1.2041 -0.53754,1.42989 -0.30076,0.15047 -0.97708,0.67769 -1.5032,1.05417 -1.50315,1.28007 -3.60762,2.71074 -3.9834,2.71074 -0.15019,0 -0.52612,0.2259 -0.82674,0.4518 -0.22547,0.22589 -0.9019,0.60236 -1.42802,0.75299 -0.52613,0.15049 -1.20255,0.37649 -1.57833,0.52706 -0.9019,0.30132 -3.45732,0.22591 -4.28405,-0.15046 z",70,true,"kd13"],
                ["m 993.70737,341.15171 c -0.56213,-1.62615 -1.12804,-2.72207 -1.6535,-4.47881 -1.65302,-4.45312 -1.91904,-6.57837 -4.16878,-10.57443 -0.1502,-0.30132 -0.60129,-1.20476 -1.05224,-2.03308 -0.45095,-0.82827 -0.82673,-1.65654 -0.90191,-1.95775 -0.1502,-0.37648 -0.9019,-1.50595 -1.80381,-2.71074 -0.90189,-1.12948 -1.8038,-2.25898 -1.95411,-2.56018 -0.1502,-0.2259 -0.82674,-0.60238 -1.35286,-0.82827 -0.60125,-0.22589 -1.42802,-0.5271 -1.87898,-0.67768 -1.20251,-0.5271 -3.75792,-2.56016 -4.88531,-3.91555 l -1.0522,-1.20475 -3.23184,0 c -3.23184,0 -3.79802,0.39284 -4.85027,-0.28485 -5.07509,-4.89601 -9.8648,-10.12453 -14.73108,-15.58681 -1.27773,-1.35539 -3.38215,-3.68966 -4.735,-5.19532 l -2.55541,-2.63545 -2.40507,0 c -1.35186,0.0754 -2.62955,0.15047 -2.85502,0.30131 -0.22548,0.15047 -0.33572,-0.16695 -0.86181,-0.16695 -0.52613,0 -1.42802,0.15049 -2.02928,0.37648 -0.60129,0.15048 -1.12738,0.2259 -1.20256,0.2259 -0.0753,-0.0754 -0.30074,0 -0.60125,0.15048 -0.22548,0.15048 -0.67643,0.30131 -0.97707,0.37652 -0.37578,0 -1.05222,0.15047 -1.57835,0.30132 -0.52611,0.15047 -1.20254,0.37647 -1.57832,0.37647 -0.37578,0.0754 -1.20256,0.2259 -1.87898,0.37648 -2.02928,0.45151 -4.43435,-0.67768 -6.83942,-3.23782 l -1.27773,-1.2801 -3.30696,-0.0754 c -1.80382,0 -3.90828,-0.0754 -4.5847,-0.15047 -1.65346,-0.22589 -6.08785,-0.22589 -7.44071,0 -0.60126,0.0755 -1.65347,0.30132 -2.48024,0.52711 -3.15667,0.82827 -4.35919,0.90357 -9.39483,0.75299 -6.76429,-0.22589 -12.47636,-0.22589 -13.75405,-0.0754 -3.60761,0.45179 -7.74135,1.80717 -11.4241,3.68961 -0.52612,0.30095 -1.42803,0.60208 -1.95415,0.75271 -0.5261,0.15048 -1.12738,0.37647 -1.35286,0.52707 -0.30076,0.0754 -1.35286,0.52709 -2.40507,0.8283 -1.05221,0.37648 -3.0815,1.05417 -4.43435,1.58128 -4.60083,1.93507 -9.70724,2.74405 -14.05469,4.67518 -1.87898,1.05417 -3.60762,2.63544 -5.41144,5.1956 -1.12737,1.50597 -4.05856,4.14141 -5.26111,4.66851 -0.52609,0.30132 -1.12738,0.60237 -1.35286,0.75299 -0.1502,0.0754 -0.37578,0.2259 -0.45095,0.2259 -0.0753,0 -0.0753,-1.0542 -0.0753,-2.33426 l 0,-2.33429 1.50315,-1.28005 c 0.82674,-0.753 1.95412,-1.95775 2.55542,-2.78606 2.63054,-3.31313 3.83309,-4.51792 6.16298,-5.79798 3.82073,-1.09343 6.251,-2.28681 9.84583,-3.39512 0.67641,-0.15049 1.35284,-0.37648 1.65346,-0.60238 0.22547,-0.15049 0.82677,-0.37648 1.27772,-0.4518 0.45095,-0.0754 1.42799,-0.45149 2.17958,-0.75268 0.75161,-0.3013 2.25477,-0.82829 3.30699,-1.12947 3.00634,-0.97889 5.1108,-1.7319 7.51587,-2.93665 1.87899,-0.90358 5.86239,-2.33426 8.11715,-2.86136 3.68278,-0.9036 6.5388,-1.05418 18.03808,-0.67769 4.20889,0.0754 5.33626,0.0754 6.61398,-0.30132 5.03561,-1.20477 6.91459,-1.28006 16.08395,-0.90358 5.78724,0.30131 5.93755,0.30131 7.89166,2.25895 0.67642,0.67768 1.72867,1.58127 2.17963,1.95779 l 0.97703,0.75296 2.02928,-0.45179 c 1.1274,-0.2259 2.7809,-0.60239 3.68281,-0.82827 4.13374,-1.20479 6.87448,-1.26375 9.95498,-1.26375 3.23184,0 3.68279,0.15048 5.86238,2.56016 5.53736,6.5271 12.12845,12.84489 17.81261,19.27616 l 2.10446,2.33427 3.49741,-0.46824 c 2.85602,-0.0754 3.0815,-0.0754 4.05858,0.4518 0.60125,0.37648 1.57833,1.20479 2.17959,1.88247 1.72864,2.03306 3.45731,3.16256 6.16303,3.99082 0.90189,0.30131 1.35285,0.67769 2.02928,1.58127 3.15667,3.76492 3.9834,4.96971 4.73499,6.77688 3.54185,7.66755 6.42885,13.68789 8.70641,21.27013 -0.1502,0.22591 -3.50042,1.98723 -3.72588,1.98723 -0.0753,0 -0.29752,-0.86108 -0.37279,-0.93615 z",70,true,"kd14"],
                ["m 1165.7076,465.32455 c -0.9019,-0.5271 -4.5096,-7.45457 -4.5096,-8.65936 0,-0.90358 -1.2025,-3.23781 -2.0242,-3.84022 -1.8038,-1.35538 -1.5482,-2.20987 -4.4042,-3.03814 -0.4511,-0.15048 -1.5222,-1.27672 -2.9553,-1.72852 -4.8069,-1.31395 -13.0262,-1.40922 -20.8301,-5.85046 -0.2205,-0.15048 -1.7235,-0.82827 -3.3069,-1.43064 -1.6535,-0.60242 -3.307,-1.20479 -3.6778,-1.43069 -1.2827,-0.60239 -2.0343,-0.9036 -2.1044,-0.753 -0.081,0 0.3708,0.753 0.9019,1.58127 1.1223,1.50599 3.4573,5.19561 4.279,6.6263 0.7516,1.35537 3.0064,4.4426 3.6076,4.9697 0.2305,0.2259 0.451,0.52711 0.451,0.67769 0,0.2259 0.2304,0.5271 0.5311,0.753 1.0522,0.75297 4.3592,4.51792 4.8102,5.4215 0.6012,1.28007 0.5211,2.40955 -0.1502,3.31314 -0.451,0.60236 -0.6815,0.75298 -1.5834,0.75298 -1.1223,0 -1.5031,-0.3013 -2.1045,-1.43067 -0.2205,-0.37649 -0.972,-1.28007 -1.6535,-2.03306 -3.3771,-3.38845 -5.6317,-6.3251 -8.7183,-11.2948 -0.5211,-0.90359 -1.1224,-1.73186 -1.2026,-1.88248 -0.1502,-0.15049 -0.6714,-0.97886 -1.2727,-1.95776 -0.5311,-0.90358 -1.433,-2.18364 -2.0343,-2.86133 -1.5733,-1.88248 -2.5553,-3.23786 -3.1566,-4.36735 -6.0867,-4.6293 -9.1318,-1.81512 -13.6207,-2.02096 -0.3808,-0.15048 -3.0081,-0.86258 -3.6895,-1.01318 -1.6101,-0.61282 -2.2526,-0.59792 -4.0325,-1.40547 -15.3847,-6.98042 -33.9822,-14.53174 -44.0425,-23.87269 -12.4213,-7.57093 -24.6912,-14.99946 -36.978,-22.51329 -0.4509,-0.37649 -1.5032,-0.90359 -2.3299,-1.28007 -1.879,-0.82831 -3.8903,-2.54704 -4.266,-4.12831 -1.822,-5.26161 -2.9809,-10.98462 -5.71218,-19.57764 -0.075,-0.15049 0.50808,-0.46492 0.28258,-1.44382 -0.30075,-0.97889 -0.60125,-1.88248 -0.67643,-2.03306 -0.15019,-0.0754 -0.22546,-0.45179 -0.22546,-0.67769 0,-0.52709 -0.37578,-2.10837 -0.82674,-3.16254 -0.22547,-0.753 -0.60129,-1.80716 -0.7516,-2.63545 -0.0753,-0.37651 -0.22547,-0.75298 -0.30075,-0.8283 -0.30076,-0.2259 -1.98312,-3.85193 -2.35893,-5.13199 -0.11491,-0.4375 -0.4503,-1.4574 -0.4503,-1.4574 0.79615,-0.38536 0.82222,-0.50362 2.28314,-1.39224 1.27768,-0.82831 1.428,-0.82831 1.57833,-0.45178 0.60126,1.88242 1.65344,4.5179 2.25474,5.72266 0.451,0.753 0.7516,1.58128 0.7516,1.73189 0,0.2259 0.1502,0.82827 0.3758,1.35538 0.1502,0.52706 0.6764,2.40954 1.2025,4.21672 0.5261,1.80715 1.0523,3.61433 1.2777,3.91554 0.1502,0.30131 0.5261,1.50595 0.7516,2.56013 1.3072,5.6489 2.9288,12.1901 5.5619,18.82467 0.1503,0.0754 0.7515,0.37649 1.2778,0.60238 12.9083,7.6085 25.7735,15.34459 38.406,22.81464 13.4504,11.92172 31.0675,19.03918 46.9712,26.42982 1.433,0.60238 1.908,0.43545 5.0648,0.96254 6.6993,-1.95092 12.2265,-1.15668 17.6331,1.5976 0.451,0.37651 5.191,2.56017 5.7121,2.56017 0.1502,0 0.3808,0.15048 0.4509,0.2259 0.1503,0.15046 1.2828,0.60236 2.6356,1.12947 2.7758,0.97889 3.1567,1.2048 7.3655,3.68966 4.6908,2.21246 10.2945,2.66272 14.673,3.92535 5.2611,1.12947 8.7766,3.22801 11.0313,5.41164 1.423,1.2801 1.5033,1.50601 2.1044,2.86138 0.3008,0.60238 0.5212,1.28007 0.6716,1.50597 0.081,0.22589 0.2303,0.5271 0.2303,0.67769 0,0.30131 0.786,3.12781 1.9884,5.68798 0.478,3.13225 5.977,2.70286 8.08,1.26256 l 1.2024,-0.67769 0,2.56013 c 0,1.36985 0.085,0.86435 -0.01,1.19781 -3.618,2.02306 -7.806,3.27991 -10.441,0.73679 z",70,true,"kd15"],
                ["m 1206.1291,486.03931 c -0.2304,-0.15048 -0.8318,-0.82828 -1.3529,-1.50597 -0.5311,-0.60241 -1.5833,-1.9578 -2.405,-2.93665 -0.9019,-1.0542 -1.9541,-2.33427 -2.4051,-2.86136 -0.9018,-1.12949 -0.056,-0.23336 -2.6918,-3.32062 -0.902,-1.05417 -1.9542,-2.25896 -2.2549,-2.71075 -0.6012,-0.82827 -1.6075,-2.64091 -4.3933,-5.50224 -6.4129,-6.86137 -9.2727,-5.42646 -14.4716,-2.68965 0,0 -0.017,-0.64035 -0.02,-1.11899 l 0,-2.56016 1.6535,-0.90358 c 2.6356,-1.35538 3.5375,-1.57968 5.5617,-1.58126 9.5021,1.20119 14.4912,11.10178 18.6645,16.08764 2.9261,3.61433 4.4856,5.50429 5.3875,6.48313 1.5834,1.88248 1.6535,1.9578 1.6535,3.08728 0,1.20476 -0.5211,2.10834 -1.2026,2.10834 -0.2205,0 -0.6012,0.0754 -0.8217,0.0754 -0.2304,0.0755 -0.6814,0 -0.9019,-0.15048 z",70,true,"kd16"]

            ];
			depot = [
			[-23,155,20,"dpt1"],
			[249,140,70,"dpt2"]
			]
//            legend_arrows = [
//                ["M1675 971q0 51-37 90l-75 75q-38 38-91 38-54 0-90-38l-294-293v704q0 52-37.5 84.5t-90.5 32.5h-128q-53 0-90.5-32.5t-37.5-84.5v-704l-294 293q-36 38-90 38t-90-38l-75-75q-38-38-38-90 0-53 38-91l651-651q35-37 90-37 54 0 91 37l651 651q37 39 37 91z","#0c8233","translate(405,664) scale(.01)"],
//                ["M1675 971q0 51-37 90l-75 75q-38 38-91 38-54 0-90-38l-294-293v704q0 52-37.5 84.5t-90.5 32.5h-128q-53 0-90.5-32.5t-37.5-84.5v-704l-294 293q-36 38-90 38t-90-38l-75-75q-38-38-38-90 0-53 38-91l651-651q35-37 90-37 54 0 91 37l651 651q37 39 37 91z","#0c8233","translate(678,665) scale(.01) rotate(90, 0, 0)"],
//                ["M1675 971q0 51-37 90l-75 75q-38 38-91 38-54 0-90-38l-294-293v704q0 52-37.5 84.5t-90.5 32.5h-128q-53 0-90.5-32.5t-37.5-84.5v-704l-294 293q-36 38-90 38t-90-38l-75-75q-38-38-38-90 0-53 38-91l651-651q35-37 90-37 54 0 91 37l651 651q37 39 37 91z","hsl(0, 100%, 43%)","translate(940,684) scale(.01) rotate(180, 0, 0)"]
//            ];
			
			/*for (var i = 0; i < parkings.length; i++) {
				UpperRange = 100;
				LowerRange = 60;
				parkings[i].push(Math.floor(Math.random() * (UpperRange - LowerRange + 1)) + LowerRange);
				
			}*/
			
			//Create SVG element
			svg = d3.select("#container")
						.append("svg")
						.attr("width", w)
						.attr("height", h)
						.style("position","absolute")
						.style("top","0")
						.style("left","-1");

			var v1 = svg.selectAll("path")
			.data(paths)
			.enter()
			.append("path")
			.attr("fill-rule","evenodd")
			.attr("clip-rule","evenodd")
			.attr("fill","#555")
			.attr("class",function(d,i) { 
					var status = d[1];
					var c = "viaduct group-"+d[3]+" ";
					/*if (status < 40) { c += "glow-red"; } else
					if (status < 60) { c += "glow-yellow"; } else
					{ c += "glow-green"; }*/
					return c;
					})
//			.attr("transform",function(d,i){return ((!d[2]) ? "translate(1, -123)" : "")})
			.attr("d",function(d,i) {
				return d[0];
			})/*
			.style("filter", function(d,i) {
				
				var status = d[1];
				if (status < 40) { return "url(#drop-shadow)" } else //delayed
				if (status < 60) { /*return "url(#drop-shadow)"* } else //critical
				{ return ""; }
				
				
			})*/
			.attr('id',function(d,i) {
				return "path"+i;
			});

//            try {
//                var arrows = svg.selectAll(".arrow")
//                    .data(legend_arrows)
//                    .enter()
//                    .append("path")
//                    .attr("d", function (d, i) {
//                        return d[0];
//                    })
//                    .attr('id', function (d, i) {
//                        return "legend_arrow_" + i;
//                    })
//                    .attr("fill", function (d, i) {
//                        return d[1];
//                    })
//                    .attr("transform", function (d, i) {
//                        return d[2];
//                    });
//            }catch(e){console.log("arrow exe."+ e)};

			//Draw big circles
			var bigcircles = svg.selectAll(".bigcircle")
			    .data(stations)
			    .enter()
			    .append("circle")
				.attr("class",function(d,i) { 
					

					var status = d[2];
					var c = "bigcircle station group-"+d[3]+" ";

					//if (status < 40) { c += "glow-red"; } else
					//if (status < 60) { c += "glow-yellow"; } else
					//{ c += "glow-green"; }
					if ((typeof d[3] != "undefined") && (d[3] == 1)) {
					c += " legend ";
                    if (status < 10) { c += "glow-darkgray"; } else
                    if (status < 20) { c += "glow-yellow"; } else
					if (status < 40) { c += "glow-red"; } else
					if (status < 60) { c += "glow-kavi"; } else
					{ c += "glow-green"; }
					}
					return c;
					})/*
				.style("filter", function(d,i) {
				
				var status = d[2];
				if (status < 40) { return "url(#drop-shadow)" } else //delayed
				if (status < 60) { /*return "url(#drop-shadow)"* } else //critical
				{ return ""; }
				
				
				});*/

			bigcircles.attr("cx", function(d, i) {
						return d[0] + "%";
					})
				   .attr("cy", function(d, i) {
						return d[1] + "%";
				   })
				   .attr("r", function(d) {
						return station_circle_size;
				   });		
				   
			//Draw small circles
			var smallcircles = svg.selectAll(".smallcircle")
			    .data(stations)
			    .enter()
			    .append("circle")
				.attr("class","smallcircle");

			smallcircles.attr("cx", function(d, i) {
						return d[0] + "%";
					})
				   .attr("cy", function(d, i) {
						return d[1] + "%";
				   })
				   .attr("r", function(d) {
						return station_circle_size-3;
				   });
				   
				   
				   
				   
				   
				   
			var bigparking = svg.selectAll(".bigparking")
			    .data(parkings)
			    .enter()
			    .append("rect")       // attach a rectangle
				.attr("x", function(d, i) {
						return d[0] + "%";
					})         // position the left of the rectangle
				.attr("y", function(d, i) {
						return d[1] + "%";
				   })          // position the top of the rectangle
				.attr("height", parking_box_size)    // set the height
				.attr("width", parking_box_size)     // set the width
				.attr("rx", 3)         // set the x corner curve radius
				.attr("ry", 3)        // set the y corner curve radius
				.attr("class", function(d,i) { 
					var status = d[2];
					var blur = d[3];
					var c = "bigparking";
					if ((typeof blur != "undefined") && (blur)) c += " blurred"
					//if (status < 40) { c += "glow-red"; } else
					//if (status < 60) { c += "glow-yellow"; } else
					//{ c += "glow-green"; }
					return c;
				})
				
				
			var smallparking = svg.selectAll(".smallparking")
			    .data(parkings)
			    .enter()
			    .append("rect")       // attach a rectangle
				.attr("x", function(d, i) {
						return d[0]+0.17 + "%";
					})         // position the left of the rectangle
				.attr("y", function(d, i) {
						return d[1]+0.27 + "%";
				   })          // position the top of the rectangle
				.attr("height", parking_box_size-4)    // set the height
				.attr("width", parking_box_size-4)     // set the width
				.attr("rx", 2)         // set the x corner curve radius
				.attr("ry", 2)        // set the y corner curve radius
				.attr("class", function(d,i) {  
					var blur = d[3];
					var c = "smallparking";
					if ((typeof blur != "undefined") && (blur)) c += " blurred"
					return c;
				});
				
				
				
			var parkingletter = svg.selectAll(".parkingletter")
			.data(parkings)
			.enter()
			.append("text")         // append text
			//.style("fill", "black")   // fill the text with the colour black
			.attr("x", function(d, i) {
						return d[0]+0.17 + "%";
					})           // set x position of left side of text
			.attr("y", function(d, i) {
						return d[1]+0.27 + "%";
				   })           // set y position of bottom of text
			.attr("dx", "2.7px")           // set offset y position
			.attr("dy", "9px")           // set offset y position
			.attr("text-anchor", "start")  // set anchor y justification 
			.attr("class", function(d,i) {  
					var blur = d[3];
					var c = "parkingletter";
					if ((typeof blur != "undefined") && (blur)) c += " blurred"
					return c;
			})
			.text("P");          // define the text to display

			
			//var depotgroup1 = svg.append('g');
			//var depotgroup2 = svg.append('g');
				   
			for (i = 0; i < depot.length; i++) {
				
				var g = svg.append('g')
									.attr('transform', 'scale(0.3,0.3)');
				
				var depotgroup = g.append('svg')
									.attr('x', depot[i][0] + "%")
									.attr('y', depot[i][1] + "%")
									
				
				bigdepot = depotgroup.selectAll(".bigdepot")
			    .data([depot[i]])
			    .enter()
			    .append("path")
				.attr("class", function(d,i) { 
					var status = d[2];
					var c = "bigdepot group-"+d[3];
					//if (status < 40) { c += "glow-red"; } else
					//if (status < 60) { c += "glow-yellow"; } else
					//{ c += "glow-green"; }
					return c;
				})
				.attr("transform","matrix(0.738729,0,0,0.70030265,168.70049,76.349168)")
				.attr("d","m 602.84375,430.03125 c -1.27276,0.19714 -2.39161,0.94937 -3.03125,2.0625 l -35.625,61.71875 c -0.74472,1.29698 -0.7568,2.91268 0,4.21875 0.75709,1.30666 2.16467,2.12617 3.6875,2.125 l 71.25,0 c 1.52287,0.001 2.9304,-0.81842 3.6875,-2.125 0.75682,-1.30608 0.74471,-2.92178 0,-4.21875 l -35.625,-61.71875 c -0.87568,-1.52499 -2.61057,-2.33402 -4.34375,-2.0625 z")
				.attr("fill","#ccc")
				
				smalldepot = depotgroup.selectAll(".smalldepot")
			    .data([1])
			    .enter()
			    .append("path")
				.attr("transform","matrix(0.51302074,0,0,0.48223833,304.89738,179.69186)")
				.attr("d","m 602.84375,430.03125 c -1.27276,0.19714 -2.39161,0.94937 -3.03125,2.0625 l -35.625,61.71875 c -0.74472,1.29698 -0.7568,2.91268 0,4.21875 0.75709,1.30666 2.16467,2.12617 3.6875,2.125 l 71.25,0 c 1.52287,0.001 2.9304,-0.81842 3.6875,-2.125 0.75682,-1.30608 0.74471,-2.92178 0,-4.21875 l -35.625,-61.71875 c -0.87568,-1.52499 -2.61057,-2.33402 -4.34375,-2.0625 z")
				.attr("fill","#ccc")
				
				dletter = depotgroup.selectAll(".dletter")
				.data([1])
				.enter()
				.append('text')
				.attr("class","parkingletter")
				.attr("x","575.36194")
				.attr("y","439.01147")
				.attr("transform","scale(1.0510781,0.95140407)")
				.attr("style",'font-size:29.947042px;font-style:normal;font-weight:bold;line-height:125%;letter-spacing:0px;word-spacing:0px;fill:#000000;fill-opacity:1;stroke:none;font-family:Century Gothic')
				.text("D")
			}
			
			
				
				
			
			//Filter settings
			var defs = svg.append("defs");
			// create filter with id #drop-shadow
			// height=130% so that the shadow is not clipped
			var filter = defs.append("filter")
				.attr("id", "drop-shadow")
				.attr("height", "200%")
				.attr("width", "200%")
				.attr("y","-40%")
				.attr("x","-40%");
				
			// SourceAlpha refers to opacity of graphic that this filter will be applied to
			// convolve that with a Gaussian with standard deviation 3 and store result
			// in blur
			filter.append("feGaussianBlur")
				.attr("in", "SourceGraphic")
				.attr("stdDeviation", 5)
				.attr("result", "blur");

			// translate output of Gaussian blur to the right and downwards with 2px
			// store result in offsetBlur
			filter.append("feOffset")
				.attr("in", "blur")
				.attr("dx", 0)
				.attr("dy", 0)
				.attr("result", "offsetBlur");
			


			// overlay original SourceGraphic over translated blurred opacity by using
			// feMerge filter. Order of specifying inputs is important!
			var feMerge = filter.append("feMerge");

			feMerge.append("feMergeNode")
				.attr("in", "offsetBlur")
			feMerge.append("feMergeNode")
				.attr("in", "SourceGraphic");
				   
				   
				   
				   
			$('#onschedule').on('click', function(){
				focus(0);
			});	   
			$('#critical').on('click', function(){
				focus(1);
			});	   
			$('#delayed').on('click', function(){
				focus(2);
			});
			//Turn on everything
			turnonall();

			
			
			/*var v1 = parseFloat(data['V1']);
			var v2 = parseFloat(data['V2']);
			var v3 = parseFloat(data['V3']);
			var v4 = parseFloat(data['V4']);
			var v5 = parseFloat(data['V5']);
			var v6 = parseFloat(data['V6']);
			var v7 = parseFloat(data['V7']);
			var v8 = parseFloat(data['V8']);*/
			
			for (var i = 8; i < 17; i++){
				var d = parseFloat(data['KD'+i]);
				processVariance('kd'+i, d);
			}
            processVariance('kd9a', parseFloat(data['KD9a']));
            processVariance('kd11a', parseFloat(data['KD11a']));
			processVariance('dpt1', parseFloat(data['DPT1']));
			processVariance('dpt2', parseFloat(data['DPT2']));
			processVariance('sbk-s-01', parseFloat(data['SBK-S-01']));
			processVariance('sbk-s-02', parseFloat(data['SBK-S-02']));
			processVariance('sbk-s-03', parseFloat(data['SBK-S-03']));
			processVariance('sbk-s-04', parseFloat(data['SBK-S-04']));
			processVariance('sbk-s-05', parseFloat(data['SBK-S-05']));
			processVariance('sbk-s-06', parseFloat(data['SBK-S-06']));
			processVariance('sbk-s-07', parseFloat(data['SBK-S-07']));
			processVariance('sbk-s-08', parseFloat(data['SBK-S-08']));
			processVariance('sbk-s-09', parseFloat(data['SBK-S-09']));
			processVariance('sbk-s-10', parseFloat(data['SBK-S-10']));
			processVariance('sbk-s-11', parseFloat(data['SBK-S-11']));
			processVariance('sbk-s-12', parseFloat(data['SBK-S-12']));
			processVariance('sbk-s-13', parseFloat(data['SBK-S-13']));
			processVariance('sbk-s-14', parseFloat(data['SBK-S-14']));
			groupGoGreen('ug');
			
			
			
	/*		
			$("#awarded").highcharts({
                        chart: {
                            plotBackgroundColor: null,
                            plotBorderWidth: 0,
                            plotShadow: false,
                            type: 'column',
                            events: {
                                load: function(event) {
                                    $('.highcharts-legend-item').last().append('<br/><div style="width:100px;"><hr/><span style="float:left; color: rgb(117,165,27);">--------</span><span style="float:right; ">Ontime</span></div>\n\
                                        <br/><div style="width:100px;"><hr/><span style="float:left; color: rgb(246,145,41);">--------</span><span style="float:right; ">Middle</span></div>\n\
                                        <br/><div style="width:100px;"><hr/><span style="float:left; color: rgb(198,54,77);">--------</span><span style="float:right;">Alert</span></div>');
                                }
                            },
							backgroundColor:'rgba(255, 255, 255, 0.1)'
                        },
                        title: {
                            text: 'Awarded',
                            align: 'left',
                            style: {
                                color: '#DCF8FD'
                            }
                        },
                        xAxis: {
                            categories: ['Advanced Works', 'Underground', 'Elevated Guideways', 'Elevated Stations', 'Systems', 'Multi Storey Carparks', 'Depots', 'Others']
                        },
                        yAxis: {
                            min: 0,
                            max: 100,
                            allowDecimals: false,
                            title: {
                                text: ''
                            },
                            gridLineColor: 'rgba(0,0,0,.0)'
                        },
                        credits: {
                            enabled: false
                        },
                        legend: {
                            enabled: false
//                            layout: 'vertical',
//                            align: 'right',
//                            width: 170,
//                            verticalAlign: 'middle',
//                            floating: true,
//                            borderWidth: 1,
//                            useHTML: true,
//                            backgroundColor: '#133959',
//                            //fontColor: '#000',
//                            shadow: true,
//                            y: -30
                        },
                        title: {
                            pointFormat: 'Percentage: <b>{point.y:.0f}%</b>'
                        },
                        plotOptions: {
                            series: {
                                point: {
                                    events: {
                                        click: function() {
                                            /*var test = $('#report');
                                            var test1 = $('#report1');
                                            test.show();
                                            test1.hide();
                                        }
                                    }
                                },
                                stacking: 'normal',
                                dataLabels: {enabled: true, align: "top", format: '{y} %', style: {
                                        fontWeight: 'bold',
                                        color: 'white'
                                                //textShadow: '0px 1px 2px black'
                                    }}
                            },
                            bar: {
                                borderColor: false,
                                allowPointSelect: true,
                                cursor: 'pointer'
                            }
                        },
                        series: [{
                                //showInLegend: false,
                                name: 'Awarded',
                                data: [{y: 100, color: '#5C8C02'}, {y: 65, color: '#5C8C02'}, {y: 60, color: '#5C8C02'}, {y: 50, color: '#5C8C02'}, {y: 20, color: 'rgb(198, 54, 77)'}, {y: 40, color: '#F69129'}, {y: 40, color: '#F69129'}, {y: 10, color: 'rgb(198, 54, 77)'}]

                            }]
                    });*/
			
			
			//doPoll();
			
				   
});

/*
function doPoll(){
				$.post('./json.php?get&random='+ Math.random(), function(data) {
					//console.log(data);  //
					setTimeout(doPoll,5000);
					if (data.color == "0") colorit(0);
					else if (data.color == "1") colorit(1);
					else if (data.color == "2") colorit(2);
				});
			}
*/

function groupAddClass(g, c) {
	$('.group-'+g).addClassSVG(c);
}

function groupRemoveClass(g, c) {
	$('.group-'+g).removeClassSVG(c);
}

function groupGoGrey(g) {
	groupRemoveClass(g, 'glow-grey glow-green glow-yellow glow-red glow-red-blinking on');
	groupAddClass(g, 'glow-grey on');
}

function groupGoGreen(g) {
	groupRemoveClass(g, 'glow-grey glow-green glow-yellow glow-red glow-red-blinking on');
	groupAddClass(g, 'glow-green on');
}

function groupGoYellow(g) {
	groupRemoveClass(g, 'glow-grey glow-green glow-yellow glow-red glow-red-blinking on');
	groupAddClass(g, 'glow-yellow on');
}

function groupGoRed(g) {
	groupRemoveClass(g, 'glow-grey glow-green glow-yellow glow-red glow-red-blinking on');
	groupAddClass(g, 'glow-red on');
}

function groupGoRedBlink(g) {
	groupRemoveClass(g, 'glow-grey glow-green glow-yellow glow-red glow-red-blinking on');
	groupAddClass(g, 'glow-red-blinking on');
	if (detectIE()) repeatBlink();
}

function repeatBlink() {
	d3.selectAll(".glow-red-blinking.on").transition().duration(1000).ease("ease-in-out").style("fill", "hsl(0, 100%, 10%)").transition().duration(1000).ease("ease-in-out").style("fill", "hsl(0, 100%, 63%)").each("end",repeatBlink);
}

function stopBlink() {
	d3.selectAll(".glow-red-blinking").transition().duration(0).style('fill', 'hsl(0, 3%, 30%)');
}

function processVariance(g, v) {
	if (v == 0)groupGoGreen(g);
	else if (v == 1) groupGoYellow(g);
	else if (v == -1) groupGoRedBlink(g);
	else if (v == 2 ) groupGoGrey(g);
	else groupGoGrey(g);
}

/*
 * .addClassSVG(className)
 * Adds the specified class(es) to each of the set of matched SVG elements.
 */
$.fn.addClassSVG = function(className){
    $(this).attr('class', function(index, existingClassNames) {
        return existingClassNames + ' ' + className;
    });
    return this;
};

/*
 * .removeClassSVG(className)
 * Removes the specified class to each of the set of matched SVG elements.
 */
$.fn.removeClassSVG = function(className){
    $(this).attr('class', function(index, existingClassNames) {
        var re = new RegExp(className, 'g');
        return existingClassNames.replace(re, '');
    });
    return this;
};


$('#reset').on('click', function() {
	//$('#reset').slideToggle("up");
	$('#reset').slideUp();
	turnonall();
});

function turnoffall() {
	$('.bigcircle, .bigparking, .viaduct, .bigdepot').removeClassSVG('on');
	$('#reset').slideDown();
	if (detectIE()) stopBlink();
}

function turnonall() {
	$('.bigcircle, .bigparking, .viaduct, .bigdepot').removeClassSVG('on');
	//$('.bigcircle, .bigparking, .viaduct, .bigdepot').addClassSVG('on');
	$('.bigcircle, .bigparking, .viaduct, .bigdepot, .legend').addClassSVG('on');
	if (detectIE()) repeatBlink();
	//$('.togglebutton').addClass('on');
}

/*
function colorit(i){
	var $p = $("#path2");
	$p.removeClassSVG("glow-green");
	$p.removeClassSVG("glow-red");
	$p.removeClassSVG("glow-yellow");
	$p.attr('style','');
	if (i == 0) $p.addClassSVG("glow-green");
	if (i == 1) $p.addClassSVG("glow-yellow");
	if (i == 2) { $p.addClassSVG("glow-red"); $p.attr('style','filter: url(#drop-shadow)'); }
};
*/

function focus(light) {
	var glow = "";
	if (light == 0) {	
		//On schedule
		glow = "glow-green";
	} else if (light == 1) {
		//Critical
		glow = "glow-yellow";
	} else if (light == 2) {
		//Delayed
		glow = "glow-red, glow-red-blinking";
	}
	turnoffall();
	if (light == 2) { 
		$('.bigcircle.glow-red, .bigcircle.glow-red-blinking, .bigparking.glow-red, .bigparking.glow-red-blinking, .viaduct.glow-red, .viaduct.glow-red-blinking, .bigdepot.glow-red, .bigdepot.glow-red-blinking').addClassSVG('on');
		if (detectIE()) repeatBlink();
	}
	else $('.bigcircle.'+glow+', .bigparking.'+glow+', .viaduct.'+glow+', .bigdepot.'+glow+'').addClassSVG('on');
}

function detectIE() {
	if (typeof detectIE.isIE == "undefined") {
    var ua = window.navigator.userAgent;
    var msie = ua.indexOf('MSIE ');
    var trident = ua.indexOf('Trident/');

    if (msie > 0) {
        // IE 10 or older => return version number
		detectIE.isIE = parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
		return detectIE.isIE;
    }

    if (trident > 0) {
        // IE 11 (or newer) => return version number
        var rv = ua.indexOf('rv:');
        detectIE.isIE =  parseInt(ua.substring(rv + 3, ua.indexOf('.', rv)), 10);
		return detectIE.isIE;
    }

    // other browser
	detectIE.isIE = false;
    return false;
	} else {
		return detectIE.isIE;
	}


}
        jQuery(function ($) {
            // Load dialog on page load
            //$('#basic-modal-content').modal();
            // Load dialog on click
            $('#comment_more').click(function (e) {
                $(".fim-dropdown").removeClass('active');
                $('#basic-modal-content').modal();

                return false;
            });
        });
		</script>
		<!-- <script src="./lib/cssParser.js"></script>
		<script src="./lib/css-filters-polyfill.js"></script> -->
	</body>

</html>