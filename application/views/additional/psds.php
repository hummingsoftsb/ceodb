<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content ="width=device-width,initial-scale=0.8,user-scalable=yes"/>
		<meta charset="utf-8">
		<meta name="mobile-web-app-capable" content="yes">
		<title>SBK-S-05 - MPXD</title>
         <link href="<?php echo $this->config->base_url(); ?>assets/plugin/drop-popup/main.css" rel="stylesheet" type="text/css" />
		 <link href="<?php echo $this->config->base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link media="screen, print" rel="stylesheet" href="<?php echo $this->config->base_url(); ?>assets/custom-scrollbar/jquery.mCustomScrollbar.css">
        <link media="screen, print" rel="stylesheet" href="<?php echo $this->config->base_url(); ?>assets/plugin/tooltip/tooltip.css">
        <link href="<?php echo $this->config->base_url(); ?>assets/plugin/basicmodal/css/basic.css" rel="stylesheet" type="text/css" />


		<script type="text/javascript" src="<?php echo $this->config->base_url(); ?>assets/js/d3.v3.min.js"></script>
		<script type="text/javascript" src="<?php echo $this->config->base_url(); ?>assets/js/plugins/jquery/jquery.min.js"></script>
        <script type=text/javascript src="<?php echo $this->config->base_url(); ?>assets/plugin/drop-popup/main.js"></script>

		<script type="text/javascript" src="<?php echo $this->config->base_url(); ?>assets/plugin/zoomooz/jquery.zoomooz.min.js"></script>
        <script type=text/javascript src="<?php echo $this->config->base_url(); ?>assets/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
        <script type=text/javascript src="<?php echo $this->config->base_url(); ?>assets/plugin/basicmodal/js/jquery.simplemodal.js"></script>

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
				/*fill: #fff;*/
                fill: rgb(131, 123, 123);
			}
            svg .glow-darkgray.on {
                fill: #837b7b;
            }
            svg .glow-kavi.on {
                fill: rgb(212, 76, 1);
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
			
			.glow-yellow-blinking.on {
			  -webkit-animation-name: glow-yellow;
			  -webkit-animation-duration: 1s;
			  -webkit-animation-iteration-count: infinite;
			  -webkit-animation-timing-function: ease-in-out;
			  -webkit-animation-direction: alternate;

			  animation-name: glow-yellow;
			  animation-duration: 1s;
			  animation-iteration-count: infinite;
			  animation-timing-function: ease-in-out;
			  animation-direction: alternate;
			}
			
			@-webkit-keyframes glow-yellow {
			  0% { fill: hsl(33, 100%, 30%); }
			  100% { fill: hsl(33, 100%, 63%); }
			}

			@keyframes glow-yellow {
			  0% { fill: hsl(33, 100%, 30%); }
			  100% { fill: hsl(33, 100%, 63%); }
			}
            .glow-gray-blinking.on {
                -webkit-animation-name: glow-gray;
                -webkit-animation-duration: 1s;
                -webkit-animation-iteration-count: infinite;
                -webkit-animation-timing-function: ease-in-out;
                -webkit-animation-direction: alternate;

                animation-name: glow-gray;
                animation-duration: 1s;
                animation-iteration-count: infinite;
                animation-timing-function: ease-in-out;
                animation-direction: alternate;
            }

            @-webkit-keyframes glow-gray {
                0% { fill: hsl(0, 3%, 30%); }
                100% { fill: hsl(0, 3%, 63%); }
            }

            @keyframes glow-gray {
                0% { fill: hsl(0, 3%, 30%); }
                100% { fill: hsl(0, 3%, 63%); }
            }
            .glow-kavi-blinking.on {
                -webkit-animation-name: glow-kavi;
                -webkit-animation-duration: 1s;
                -webkit-animation-iteration-count: infinite;
                -webkit-animation-timing-function: ease-in-out;
                -webkit-animation-direction: alternate;

                animation-name: glow-kavi;
                animation-duration: 1s;
                animation-iteration-count: infinite;
                animation-timing-function: ease-in-out;
                animation-direction: alternate;
            }

            @-webkit-keyframes glow-kavi {
                0% { fill: hsl(21, 99%, 30%); }
                100% { fill: hsl(21, 99%, 63%); }
            }

            @keyframes glow-kavi {
                0% { fill: hsl(21, 99%, 30%); }
                100% { fill: hsl(21, 99%, 63%); }
            }
            .glow-green-blinking.on {
                -webkit-animation-name: glow-green;
                -webkit-animation-duration: 1s;
                -webkit-animation-iteration-count: infinite;
                -webkit-animation-timing-function: ease-in-out;
                -webkit-animation-direction: alternate;

                animation-name: glow-green;
                animation-duration: 1s;
                animation-iteration-count: infinite;
                animation-timing-function: ease-in-out;
                animation-direction: alternate;
            }

            @-webkit-keyframes glow-green {
                0% { fill: hsl(134, 82%, 20%); }
                100% { fill: hsl134, 82%, 53%); }
            }

            @keyframes glow-green {
                0% { fill: hsl(134, 82%, 20%); }
                100% { fill: hsl(134, 82%, 53%); }
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
				left: 680px;
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
				font-size: 30px;
				font-weight: 500;
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
   //                          var pageObj = <?php /*echo $this->session->userdata('allowed_page');*/ ?>;
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
			<!-- <ul class="nav">
				<li><a href="#" class=""><i class="icon-wrench"></i></a></li>
				<li><a href="#" class=""><i class="icon-exchange"></i></a></li>
				<li><a href="#" class=""><i class="icon-money"></i></a></li>
				<li><a href="#" class=""><i class="icon-h-sign"></i></a></li>
			</ul> -->
			<div id="navbar-left">
                <a href="#"><img src="<?php echo $this->config->base_url(); ?>assets/img/home.png" onclick="location.href='/mpxd/front'"/></a>
                <a href="#"><img src="<?php echo $this->config->base_url(); ?>assets/img/logout_de.png" onclick="location.href='/mpxd/logout'"/></a>
			</div>
			 <div id="navbar">
				<!--<a href="./graph_din.html"><img src="<?php echo $this->config->base_url(); ?>assets/img/construction.png" /></a>-->
                 <a class="nav-img-container nopointer" href="#"><img src="<?php echo $this->config->base_url(); ?>assets/img/nav_design.png" /><i id="design_trending" class="fa" style="color: rgb(13, 139, 43)"></i><br><span id="design_progress" class="pull-left" style="color: #f3b308; font-size: 13px; font-weight:600;"></span></a>
				<!--<a href="#"><img src="<?php //echo $this->config->base_url(); ?>assets/img/commercial2.png" /></a>-->
                 <div class="fim-dropdown">
				    <a class="nav-img-container" href="#"><img src="<?php echo $this->config->base_url(); ?>assets/img/nav_intallation.png" /><i id="installation_trending" class="fa" style="color: rgb(13, 139, 43)"></i><br><span id="installation_progress" class="pull-left" style="color: #f3b308; font-size: 13px; font-weight:600;"></span></a>
                     <div class="inner">
                         <!--                         <i class="fa fa-bell fa-5x fim-gray"></i><br />-->
                         <!--                         <small class="fim-gray">There are no unread notifications for you.</small> -->
                         <!--                         <img style="width: 100%;" src="--><?php //echo $this->config->base_url(); ?><!--assets/img/demo.png" />-->
                         <table id="nav_drop">
                             <thead>
                             <tr>
                                 <th>Activities</th>
                                 <th colspan="2">Percentage</th>
                             </tr>
                             </thead>
                             <tbody id="status_container">
<!--                             <tr>-->
<!--                                 <td>Overall Installation PS&DS</td>-->
<!--                                 <td colspan="2">79.50%</td>-->
<!--                             </tr>-->
<!--                             <tr>-->
<!--                                 <td rowspan="2">Installation & Termination for TRIP cable Northern</td>-->
<!--                                 <td style="background-color: #f79b3b"><b>33KV AC</b></td>-->
<!--                                 <td style="background-color: #f79b3b"><b>750V DC</b></td>-->
<!--                             </tr>-->
<!--                             <tr>-->
<!--                                 <td>100%</td>-->
<!--                                 <td>96.40%</td>-->
<!--                             </tr>-->
<!--                             <tr>-->
<!--                                 <td rowspan="2">Installation & Termination for TRIP cable Southern</td>-->
<!--                                 <td style="background-color: #f79b3b"><b>33KV AC</b></td>-->
<!--                                 <td style="background-color: #f79b3b"><b>750V DC</b></td>-->
<!--                             </tr>-->
<!--                             <tr>-->
<!--                                 <td>95.02%</td>-->
<!--                                 <td>23.13%</td>-->
<!--                             </tr>-->
<!--                             <tr>-->
<!--                                 <td>Overall T&C for PS&DS</td>-->
<!--                                 <td colspan="2">42.44%</td>-->
<!--                             </tr>-->
                             </tbody>
                         </table>
                     </div>
                 </div>
                 <div class="fim-dropdown">
				    <a class="nav-img-container" href="#"><img src="<?php echo $this->config->base_url(); ?>assets/img/nav_T_and_C.png" /><i id="test_trending" class="fa" style="color: rgb(229, 0, 0)"></i><br><span id="test_progress" class="pull-left" style="color: #f3b308; font-size: 13px; font-weight:600;"></span></a>
                     <div class="inner">
                         <table id="table-comment" class="table table-bordered table-condensed table-hover" style="text-align: center">
                             <thead>
                             <tr style="background-color: #192f46;">
                                 <th colspan="3" style="text-align: center;">Activities/Progress</th>
                             </tr>
                             <tr style="background-color: #0b8baf;">
                                 <th style="text-align: center;">Ring</th>
                                 <th style="text-align: center;">Comment</th>
                                 <th style="text-align: center;">Date</th>
                             </tr>
                             </thead>
                             <tbody style="background-color: #fff;" id="comment_container">
                                 <tr><td colspan="3"  style="padding: 0px; padding-right: 10px !important; padding-bottom: 4px;">
                                         <a id="comment_more" href="javascript:;" class="pull-right" style="text-decoration: none;"><i class="fa fa-plus"></i> more..</a>
                                         <!-- modal content -->
                                         <div id="basic-modal-content">
                                             <table id="table-comment" class="table table-bordered table-condensed table-hover" style="text-align: center">
                                                 <thead>
                                                 <tr style="background-color: #192f46;">
                                                     <th colspan="3" style="text-align: center;">Activities/Progress</th>
                                                 </tr>
                                                 <tr style="background-color: #0b8baf;">
                                                     <th style="text-align: center;">Ring</th>
                                                     <th style="text-align: center;">Comment</th>
                                                     <th style="text-align: center;">Date</th>
                                                 </tr>
                                                 </thead>
                                                 <tbody style="background-color: #fff;" id="comment_full_container">
                                                 </tbody>
                                             </table>
                                         </div>

                                         <!-- preload the images -->
                                         <div style='display:none'>
                                             <img src='img/basic/x.png' alt='' />
                                         </div>
                                  </td></tr>
<!--                             <tr style="background-color: #fff;"><td style="padding: 0px; padding-right: 10px !important; padding-bottom: 4px;"><button id="abc" class="btn btn-primary">More</button></td></tr>-->
                             </tbody>
                         </table>

                     </div>
                 </div>
				<a class="nav-img-container nopointer" href="#"><img src="<?php echo $this->config->base_url(); ?>assets/img/nav_handover.png" /><i id="handover_trending" class="fa" style="color: rgb(13, 139, 43)"></i><br><span id="handover_progress" class="pull-left" style="color: #f3b308; font-size: 13px; font-weight:600;"></span></a>
			</div> 
			
		</div>
		<img src="<?php echo $this->config->base_url(); ?>assets/img/psds_home_top_de.png" style="position: absolute;top: -77px;width: 1280px; z-index: -1;" />
		
		
	</div>
	<img src="<?php echo $this->config->base_url(); ?>assets/img/psds_guideways_d.jpg" alt="" id="mapimg" style="width: 1280px; height:800px; position:absolute;"/>
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
		<a title="Sungai Buloh Depot" href="<?php echo $this->config->base_url(); ?>dpt1/index" style="position: absolute; top: 490px; left: 15px; height: 35px; width: 95px;"></a>
		<a title="Kajang Depot" href="<?php echo $this->config->base_url(); ?>dpt2/index" style="position: absolute; top: 475px; left: 1128px; height: 30px; width: 45px;"></a>
		
		<!-- icon href -->
		<a class="tooltip stn1" href="<?php echo $this->config->base_url(); ?>sungai-buloh/index" style="position: absolute; top: 400px; left: 63px; height: 15px; width: 15px;"></a>
		<a class="tooltip stn2" href="<?php echo $this->config->base_url(); ?>kampung-selamat/index" style="position: absolute; top: 430px; left: 74px; height: 15px; width: 15px;"></a>
		<a class="tooltip stn4" href="<?php echo $this->config->base_url(); ?>kwasa-damansara/index" style="position: absolute; top: 518px; left: 120px; height: 15px; width: 15px;"></a>
		<a class="tooltip stn5" href="<?php echo $this->config->base_url(); ?>kwasa-sentral/index" style="position: absolute; top: 553px; left: 112px; height: 15px; width: 15px;"></a>
		<a class="tooltip stn6" href="<?php echo $this->config->base_url(); ?>kota-damansara/index" style="position: absolute; top: 576px; left: 205px; height: 15px; width: 15px;"></a>
		<a class="tooltip stn7" href="<?php echo $this->config->base_url(); ?>surian/index" style="position: absolute; top: 523px; left: 258px; height: 15px; width: 15px;"></a>
		<a class="tooltip stn8" href="<?php echo $this->config->base_url(); ?>mutiara-damansara/index" style="position: absolute; top: 466px; left: 278px; height: 15px; width: 15px;"></a>
		<a class="tooltip stn9" href="<?php echo $this->config->base_url(); ?>bandar-utama/index" style="position: absolute; top: 474px; left: 338px; height: 15px; width: 15px;"></a>
		<a class="tooltip stn10" href="<?php echo $this->config->base_url(); ?>ttdi/index" style="position: absolute; top: 470px; left: 386px; height: 15px; width: 15px;"></a>
		<a class="tooltip stn12" href="<?php echo $this->config->base_url(); ?>phileo-damansara/index" style="position: absolute; top: 452px; left: 423px; height: 15px; width: 15px;"></a>
		<a class="tooltip stn13" href="<?php echo $this->config->base_url(); ?>pusat-bandar-damansara/index" style="position: absolute; top: 376px; left: 437px; height: 15px; width: 15px;"></a>
		<a class="tooltip stn14" href="<?php echo $this->config->base_url(); ?>semantan/index" style="position: absolute; top: 328px; left: 426px; height: 15px; width: 15px;"></a>
		<a class="tooltip stn15" href="<?php echo $this->config->base_url(); ?>muzium-negara/index" style="position: absolute; top: 290px; left: 524px; height: 15px; width: 15px;"></a>
		<a class="tooltip stn16" href="<?php echo $this->config->base_url(); ?>pasar-seni/index" style="position: absolute; top: 256px; left: 520px; height: 15px; width: 15px;"></a>
		<a class="tooltip stn17" href="<?php echo $this->config->base_url(); ?>merdeka/index" style="position: absolute; top: 233px; left: 549px; height: 15px; width: 15px;"></a>
		<a class="tooltip stn18" href="<?php echo $this->config->base_url(); ?>bukit-bintang/index" style="position: absolute; top: 199px; left: 559px; height: 15px; width: 15px;"></a>
		<a class="tooltip stn20" href="<?php echo $this->config->base_url(); ?>tun-razak-exchange/index" style="position: absolute; top: 203px; left: 600px; height: 15px; width: 15px;"></a>
		<a class="tooltip stn21" href="<?php echo $this->config->base_url(); ?>cochrane/index" style="position: absolute; top: 217px; left: 628px; height: 15px; width: 15px;"></a>
		<a class="tooltip stn22" href="<?php echo $this->config->base_url(); ?>maluri/index" style="position: absolute; top: 230px; left: 650px; height: 15px; width: 15px;"></a>
		<a class="tooltip stn23" href="<?php echo $this->config->base_url(); ?>taman-pertama/index" style="position: absolute; top: 258px; left: 688px; height: 15px; width: 15px;"></a>
		<a class="tooltip stn24" href="<?php echo $this->config->base_url(); ?>taman-midah/index" style="position: absolute; top: 277px; left: 730px; height: 15px; width: 15px;"></a>
		<a class="tooltip stn25" href="<?php echo $this->config->base_url(); ?>taman-mutiara/index" style="position: absolute; top: 283px; left: 773px; height: 15px; width: 15px;"></a>
		<a class="tooltip stn26" href="<?php echo $this->config->base_url(); ?>taman-connaught/index" style="position: absolute; top: 313px; left: 818px; height: 15px; width: 15px;"></a>
		<a class="tooltip stn27" href="<?php echo $this->config->base_url(); ?>taman-suntex/index" style="position: absolute; top: 280px; left: 895px; height: 15px; width: 15px;"></a>
		<a class="tooltip stn28" href="<?php echo $this->config->base_url(); ?>sri-raya/index" style="position: absolute; top: 284px; left: 925px; height: 15px; width: 15px;"></a>
		<a class="tooltip stn29" href="<?php echo $this->config->base_url(); ?>bandar-tun-hussein-onn/index" style="position: absolute; top: 311px; left: 978px; height: 15px; width: 15px;"></a>
		<a class="tooltip stn30" href="<?php echo $this->config->base_url(); ?>bukit-dukung/index" style="position: absolute; top: 353px; left: 999px; height: 15px; width: 15px;"></a>
		<a class="tooltip stn31" href="<?php echo $this->config->base_url(); ?>taman-koperasi-cuepacs/index" style="position: absolute; top: 391px; left: 1028px; height: 15px; width: 15px;"></a>
		<a class="tooltip stn33" href="<?php echo $this->config->base_url(); ?>sungai-kantan/index" style="position: absolute; top: 434px; left: 1127px; height: 15px; width: 15px;"></a>
		<a class="tooltip stn34" href="<?php echo $this->config->base_url(); ?>bandar-kajang/index" style="position: absolute; top: 450px; left: 1160px; height: 15px; width: 15px;"></a>
		<a class="tooltip stn35" href="<?php echo $this->config->base_url(); ?>kajang/index" style="position: absolute; top: 478px; left: 1203px; height: 15px; width: 15px;"></a>
		<a class="tooltip" title="Kajang Depot" href="<?php echo $this->config->base_url(); ?>dpt2/index" style="position: absolute; top: 455px; left: 1137px; height: 19px; width: 20px;"></a>
		
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

        <a title="Work Not Yet Started" class="legend-stat" data-value="s_1" href="javascript:void(0);" style="position: absolute; top: 557px; left: 509px; height: 18px; width: 132px;"></a>
        <a title="Work In Progress" class="legend-stat" data-value="s_2" href="javascript:void(0);" style="position: absolute; top: 557px; left: 656px; height: 18px; width: 117px;"></a>
        <a title="Testing Completed" class="legend-stat" data-value="s_3" href="javascript:void(0);" style="position: absolute; top: 557px; left: 788px; height: 18px; width: 117px;"></a>
        <a title="AC Energized" class="legend-stat" data-value="s_4" href="javascript:void(0);" style="position: absolute; top: 581px; left: 600px; height: 18px; width: 94px;"></a>
        <a title="AC & DC Energized" class="legend-stat" data-value="s_5" href="javascript:void(0);" style="position: absolute; top: 581px; left: 720px; height: 18px; width: 112px;"></a>
	</div>
	
	<div style="position:absolute; top: 258px;left: 129px;"><img src="<?php echo $this->config->base_url(); ?>assets/img/arrow2.png" style="width:20px;"/></div>
	
	<div id="project_progress_container" style="position:absolute; z-index:2; top: 119px;left: 30px;">
		<span id="overall_actual" class="header-left" style="font-size:90px;"></span>
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
	
	<div style="position:absolute; z-index:2; top: 441px;left: 21px;">
		<a href="<?php echo $this->config->base_url(); ?>r1/index" class="pkg_title">R1</a>
	</div>	
	<div style="position:absolute; z-index:2; top: 608px;left: 161px;">
		<a href="<?php echo $this->config->base_url(); ?>r2/index" class="pkg_title">R2</a>
	</div>
	<div style="position:absolute; z-index:2; top: 497px;left: 443px;">
		<a href="<?php echo $this->config->base_url(); ?>r3/index" class="pkg_title">R3</a>
	</div>
	<div style="position: absolute; z-index: 2; top: 364px; left: 555px;">
		<a href="<?php echo $this->config->base_url(); ?>r4/index" class="pkg_title">R4</a>
	</div>	
	<div style="position: absolute; z-index: 2; top: 315px; left: 647px;">
		<a href="<?php echo $this->config->base_url(); ?>r5/index" class="pkg_title">R5</a>
	</div>
	<div style="position: absolute; z-index: 2; top: 385px; left: 835px;">
		<a href="<?php echo $this->config->base_url(); ?>r6/index" class="pkg_title">R6</a>
	</div>
	<div style="position: absolute; z-index: 2; top: 527px; left: 1087px;">
		<a href="<?php echo $this->config->base_url(); ?>r7/index" class="pkg_title">R7</a>
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
        function tooltip(s,n,f){
            var d="";
            if(!f){
                d+="<span class=\"custom-margin\"> <strong>";
            }else {
                d += "<span> <strong>";
            }
            d+=n;
            d+="</strong> <br /> PSCADA : ";
            d+=typeof s=='undefined'?'-':s[0];
            d+="</span>";
            return d;
        }
			
		window.scrollTo(0,1);
		$(window).load(function(){
			data = <?php echo json_encode($data); ?>;
            if((Object.keys(data.i_pscada).length)>0) {
                $(".stn1").append(tooltip(data.i_pscada['STN 01'],'SUNGAI BULOH',true));
                $(".stn2").append(tooltip(data.i_pscada['STN 02'],'KG SELAMAT',true));
                $(".stn4").append(tooltip(data.i_pscada['STN 04'],'KWASA DAMANSARA',true));
                $(".stn5").append(tooltip(data.i_pscada['STN 05'],'KWASA SENTRAL',true));
                $(".stn6").append(tooltip(data.i_pscada['STN 06'],'KOTA DAMANSARA',true));
                $(".stn7").append(tooltip(data.i_pscada['STN 07'],'SURIAN',true));
                $(".stn8").append(tooltip(data.i_pscada['STN 08'],'MUTIARA DAMANSARA',true));
                $(".stn9").append(tooltip(data.i_pscada['STN 09'],'BANDAR UTAMA',true));
                $(".stn10").append(tooltip(data.i_pscada['STN 10'],'TTDI',true));
                $(".stn12").append(tooltip(data.i_pscada['STN 12'],'PHILEO DAMANSARA',true));
                $(".stn13").append(tooltip(data.i_pscada['STN 13'],'PUSAT BANDAR DAMANSARA',true));
                $(".stn14").append(tooltip(data.i_pscada['STN 14'],'SEMANTAN',true));
                $(".stn15").append(tooltip(data.i_pscada['STN 15'],'MUZIUM NEGARA',true));
                $(".stn16").append(tooltip(data.i_pscada['STN 16'],'PASAR SENI',true));
                $(".stn17").append(tooltip(data.i_pscada['STN 17'],'MERDEKA',true));
                $(".stn18").append(tooltip(data.i_pscada['STN 18'],'BUKIT BINTANG',true));
                $(".stn20").append(tooltip(data.i_pscada['STN 20'],'TUN RAZAK EXCHANGE',true));
                $(".stn21").append(tooltip(data.i_pscada['STN 21'],'COCHRANE',true));
                $(".stn22").append(tooltip(data.i_pscada['STN 22'],'MALURI',true));
                $(".stn23").append(tooltip(data.i_pscada['STN 23'],'TAMAN PERTAMA',true));
                $(".stn24").append(tooltip(data.i_pscada['STN 24'],'TAMAN MIDAH',true));
                $(".stn25").append(tooltip(data.i_pscada['STN 25'],'TAMAN MUTIARA',true));
                $(".stn26").append(tooltip(data.i_pscada['STN 26'],'TAMAN CONNAUGHT',true));
                $(".stn27").append(tooltip(data.i_pscada['STN 27'],'TAMAN SUNTEX',true));
                $(".stn28").append(tooltip(data.i_pscada['STN 28'],'SRI RAYA',true));
                $(".stn29").append(tooltip(data.i_pscada['STN 29'],'BANDAR TUN HUSSEIN ONN',true));
                $(".stn30").append(tooltip(data.i_pscada['STN 30'],'BUKIT DUKUNG',true));
                $(".stn31").append(tooltip(data.i_pscada['STN 31'],'TAMAN KOPERASI CUEPACS',true));
                $(".stn33").append(tooltip(data.i_pscada['STN 33'],'SUNGAI KANTAN',false));
                $(".stn34").append(tooltip(data.i_pscada['STN 34'],'BANDAR KAJANG',false));
                $(".stn35").append(tooltip(data.i_pscada['STN 35'],'KAJANG',false));
            }
            for (var k in data['trend']['progress']) {
                $('#'+k).text(data['trend']['progress'][k]+'%');
            }
            for (var k in data['trend']['trending']) {
                if(data['trend']['trending'][k]==1) {
                    $('#' + k).addClass('fa-arrow-up')
                }else if(data['trend']['trending'][k]==2){
                    $('#' + k).addClass('fa-arrow-right')
                }else if(data['trend']['trending'][k]==3){
                    $('#' + k).addClass('fa-arrow-down')
                }
            }
			if (data['overall_actual'] > 99) $('#overall_actual').css({ "fontSize" : "59px", "marginTop" : "31px"});
			if (data['overall_variance'] > 99) $('#overall_variance').css({ "fontSize" : "59px", "marginTop" : "10px", "marginLeft" : "-8px"});
			if (data['overall_early'] > 99) $('#overall_early').css({ "fontSize" : "59px", "marginTop" : "6px", "marginLeft" : "-8px"});
            //Modified By Ancy mathew
            //Usage : Append cooments
            //Starts here
            var g='',gd='';
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
            $("#status_container").append(st);
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
			[5.066666666666666,50.162962962962965,93, "STN01"],
			[5.916666666666667,54.04444444444444,95, "STN02"],
			[9.466666666666667,64.88888888888889,95, "STN04"],
			[8.883333333333333,69.3037037037037,99, "STN05"],
			[16.166666666666664,72.23703703703703,90, "STN06"],
			[20.233333333333334,65.62962962962963,90, "STN07"],
			[21.883333333333333,58.42962962962963,78, "STN08"],
			[26.55,59.58518518518518,90, "STN09"],
			[30.283333333333335,58.84444444444444,90, "STN10"],
			[33.18333333333333,56.62222222222222,90, "STN12"],
			[34.25,47.17037037037037,90, "STN13"],
			[33.38333333333333,41.15555555555556,96, "STN14"],
			[41.05,36.50370370370371,74, "STN15"],
			[40.71666666666667,32.148148148148145,47, "STN16"],
			[42.983333333333334,29.333333333333332,99, "STN17"],
			[43.78333333333334,25.125925925925923,39, "STN18"],
			[47.099999999999994,25.6,72, "STN20"],
			[49.166666666666664,27.348148148148148,75, "STN21"],
			[50.949999999999996,29.037037037037038,82, "STN22"],
			[53.88333333333334,32.41481481481481,47, "STN23"],
			[57.15,34.785185185185185,84, "STN24"],
			[60.45,35.644444444444446,94, "STN25"],
			[63.96666666666667,39.2,77, "STN26"],
			[70.05,35.288888888888884,78, "STN27"],
			[72.33333333333334,35.7037037037037,90, "STN28"],
			[76.48333333333333,39.08148148148148,90, "STN29"],
			[78.18333333333334,44.32592592592592,90, "STN30"],
			[80.48333333333333,49.03703703703704,90, "STN31"],
			[88.16666666666667,54.48888888888889,71, "STN33"],
			[90.71666666666667,56.38518518518518,90, "STN34"],
			[94.1,59.88148148148148,90, "STN35"],
			/* Legend */             [40,69.9, 9, 1],[51.4,69.9, 19, 1],[61.6,69.9, 39, 1],[47,72.8, 59, 1],[56.3,72.8, 100, 1],
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
/*			paths = [
			["M112.55,658.879c-0.843-0.005-1.686-0.011-2.529-0.017     c-0.706-2.075,0.736-3.454,1.64-4.995c3.193-5.437,6.676-10.679,9.419-16.407c5.158-10.769,2.337-20.279-3.837-29.428     c-1.758-2.604-4.034-2.747-6.299-0.631c-3.284,3.065-6.432,6.275-9.737,9.316c-0.852,0.783-1.691,2.711-3.178,1.441     c-1.853-1.58,0.232-2.735,1.104-3.586c4.478-4.372,8.177-9.723,14.403-11.98c0.654-0.237,1.178-0.351,1.208-1.201     c0.1-2.799-5.705-10.712-8.772-11.135c-3.587-0.495-5.109-2.278-5.823-5.663c-0.667-3.166-2.614-5.542-5.636-7.189     c-4.559-2.485-8.169-5.974-11.198-10.362c-6.704-9.713-13.936-19.061-20.854-28.628c-2.084-2.882-3.558-6.103-2.403-9.803     c0.245-0.785,0.565-2.164,1.818-1.883c1.072,0.24,1.558,1.385,1.141,2.392c-1.492,3.603,0.909,6.101,2.555,8.622     c6.916,10.59,15.601,19.893,22.393,30.592c1.825,2.876,4.894,4.549,7.786,6.131c3.776,2.066,6.187,5.116,7.178,9.105     c0.591,2.381,1.69,3.325,3.989,3.573c3.473,0.375,5.553,2.518,6.977,5.647c3.779,8.31,8.045,16.416,11.468,24.866     c2.513,6.205,1.456,12.79-0.705,18.979C121.848,644.682,116.066,651.178,112.55,658.879z",80,false,"v1"],
			["M261.055,618.955c0.852,0.835,1.704,1.668,2.554,2.5     c0.461,1.761,0.844,3.551,1.399,5.285c3.083,9.637,1.203,17.264-6.606,24.617c-17.919,16.875-35.038,34.603-52.39,52.075     c-4.702,4.734-9.671,7.208-16.457,4.611c-4.329-1.656-9.269-1.97-13.3-4.093c-7.254-3.819-14.717-3.301-22.339-2.786     c-9.002,0.607-17.943-0.125-26.875-1.214c-5.06-0.616-8.533-3.673-9.913-8.049c-3.394-10.759-6.002-21.756-7.106-33.04     c0.848-0.678,1.691-0.78,2.529,0.017c1.917,9.088,3.709,18.204,5.785,27.256c1.839,8.021,4.336,10.209,12.431,11.17     c9.603,1.139,19.268,1.357,28.877,0.428c5.472-0.53,10.493,0.179,15.459,2.379c5.64,2.5,11.616,3.855,17.62,5.253     c3.976,0.925,6.855-0.056,9.456-2.645c19.555-19.462,39.086-38.947,58.582-58.469c2.94-2.943,3.353-6.643,2.744-10.636     C262.758,628.715,260.538,624.062,261.055,618.955z",80,false,"v2"],
			["M411.223,583.677c-3.313,2.814-7.998,5.854-11.956,5.711c-11.073-0.396-21.756,5.479-32.94,1.662     c-2.487-0.849-5.306-0.689-7.844-1.433c-2.808-0.822-4.624,0.197-6.699,1.952c-6.422,5.429-14.246,6.256-21.869,4.375     c-11.931-2.946-23.614-6.905-35.385-10.491c-5.555-1.692-10.001-0.396-13.784,4.139c-5.756,6.902-11.671,13.681-17.732,20.315     c-2.546,2.787-3.385,5.579-1.958,9.048c0.964,0.717,0.437,2.956,2.548,2.501c-1.505-5.899,1.642-9.835,5.404-13.79     c4.816-5.063,9.363-10.396,13.802-15.795c2.76-3.354,5.831-4.451,10.092-3.393c12.44,3.089,24.451,7.747,36.893,10.614     c7.738,1.785,16.076,1.545,22.898-4.176c1.553-1.304,2.975-2.6,5.293-2.002c10.735,2.766,21.483,2.624,32.402,0.764     c5.684-0.968,11.189-1.293,16.596-4.181c3.207-1.713,6.267-3.759,9.418-5.633c-0.705-0.801-1.356-1.648-1.97-2.526     C413.329,582.027,412.257,582.799,411.223,583.677z",70,false,"v3"],
			//["M1205.751,603.867c-5.438-6.076-10.651-12.367-16.335-18.203c-4.552-4.677-8.542-4.839-14.48-1.631     c-6.539,3.534-9.185,3.1-11.357-4.108c-2.601-8.618-8.694-11.609-16.423-13.037c-5.756-1.063-10.995-3.118-16.319-5.704     c-8.02-3.892-16.024-8.895-25.888-6.812c-3.188,0.674-6.658-0.288-9.767-1.587c-10.738-4.487-21.212-9.531-31.479-15.023     c-7.365-3.938-13.378-9.921-20.672-13.823c-11.312-6.056-21.715-13.573-32.956-19.708c-1.48-0.808-2.661-1.603-3.224-3.478     c-4.107-13.664-8.439-27.262-12.576-40.917c-3.982-13.14-12.279-27.976-28.844-30.315c-1.104-0.156-2.115-1.521-3.016-2.467     c-4.711-4.941-9.93-9.525-13.909-15.005c-5.041-6.941-11.089-7.399-18.376-5.171c-4.181,1.28-8.439,2.379-11.754-2.063     c-0.502-0.674-1.756-1.139-2.644-1.113c-6.282,0.184-12.575-1.581-18.864,0.446c-3.847,1.238-7.924,0.939-11.906,0.456     c-7.125-0.867-13.894,0.282-20.501,3.024c-4.601,1.91-9.387,3.368-14,5.249c-5.803,2.367-12.685,3.281-16.648,8.518     c-4.833,6.386-11.962,9.446-17.923,14.156c-2.777,2.193-5.72,2.051-8.518-0.62c-3.364-3.211-7.125-6.009-10.487-9.224     c-7.411-7.084-15.665-12.97-25.038-17.057c-7.107-3.101-13.914-7.311-21.96-7.721c-9.65-0.489-19.307-0.902-28.965-1.14     c-2.808-0.069-5.181-0.824-7.432-2.371c-5.212-3.581-10.777-6.731-15.607-10.766c-7.587-6.335-15.224-9.724-24.474-3.625     c-0.132,0.087-0.319,0.09-0.479,0.137c-4.145,1.211-7.503-0.354-8.306-4.521c-0.846-4.387-1.492-8.927-1.326-13.365     c0.288-7.685,0.579-7.669-6.941-10.304c-18.483-6.478-35.991-14.652-50.875-27.811c-7.302-6.454-15.951-10.824-25.297-13.619     c-9.844-2.943-17.305-0.234-22.035,8.642c-5.331,10.003-10.098,20.329-8.067,32.25c0.541,3.176-0.728,5.398-3.836,5.925     c-8.956,1.516-14.946,7.271-20.857,13.533c-7.051,7.47-7.104,7.204-1.786,16.31c2.295,3.928,5.571,7.851,4.86,12.74     c-2.107,14.504-9.888,25.486-22.898,31.892c-8.669,4.27-18.044,5.312-25.771-2.815c-4.108-4.32-8.906-5.693-14.785-5.241     c-5.046,0.388-10.118,0.555-15.104-1.806c-3.441-1.629-6.787-0.25-8.398,3.811c-1.53,3.857-3.346,7.599-4.846,11.465     c-0.969,2.496-1.901,4.358-5.245,3.982c-2.249-0.253-3.302,1.883-4.042,3.817c-2.398,6.271,0.114,13.296,5.994,16.776     c8.667,5.133,9.225,7.017,6.209,16.371c-2.509,7.784-2.753,15.642,0.387,23.455c1.737,4.323,3.368,8.896,0.98,13.468     c-6.057,11.593-7.726,23.843-6.44,36.749c0.509,5.104,0.444,10.299-0.257,15.459c-0.365,2.686-1.513,3.936-4.131,4.795     c-5.358,1.76-10.815,3.174-15.685,6.216c0.613,0.878,1.265,1.726,1.97,2.526c4.238-2.52,8.644-4.729,13.803-5.386     c5.092-0.649,6.928-4.272,7.041-9.28c0.106-4.661,0.394-9.298,0.042-13.973c-0.855-11.39-0.501-22.742,5.09-33.026     c2.997-5.512,3.356-10.996,1.121-16.313c-3.792-9.021-3.413-17.684-0.216-26.696c2.477-6.981,0.978-10.442-4.93-14.781     c-2.782-2.041-6.075-3.486-7.853-6.779c-2.086-3.862-1.156-10.206,1.894-10.249c4.306-0.062,5.627-2.372,6.833-5.794     c1.318-3.743,3.391-7.219,4.757-10.948c1.061-2.897,3.309-3.913,5.417-2.636c5.958,3.613,12.336,1.852,18.516,2.043     c3.384,0.104,5.994,0.939,8.511,3.195c2.807,2.516,5.345,5.761,9.104,6.711c6.576,1.661,13.267,1.629,19.569-1.291     c13.013-6.031,21.238-16.27,25.197-29.895c1.087-3.741,2.263-7.748,0.195-11.677c-2.315-4.398-4.098-9.097-7.306-12.99     c-0.872-1.06-1.808-1.996-0.296-3.324c7.222-6.349,12.27-15.432,23.25-16.962c4.645-0.648,7.771-4.058,6.828-9.371     c-1.928-10.882,2.446-20.246,7.034-29.487c4.063-8.179,9.511-10.54,18.55-8.381c9.225,2.203,17.405,6.669,24.597,12.735     c13.758,11.606,28.898,20.657,46.083,26.208c3.158,1.021,6.163,2.514,9.294,3.636c1.886,0.676,2.503,1.693,2.168,3.721     c-0.884,5.344,0.184,10.634,0.98,15.878c0.972,6.377,5.897,9.29,11.971,7.414c2.54-0.785,5.173-1.414,7.545-2.563     c3.102-1.507,5.553-0.838,8.218,1.029c7.224,5.06,14.711,9.751,21.813,14.972c3.441,2.528,6.925,3.335,11.079,3.417     c10.314,0.205,21.036-0.775,30.829,1.72c13.98,3.563,27.07,10.176,38.129,20.004c5.224,4.641,10.538,9.179,15.758,13.825     c2.236,1.992,4.847,2.803,7.334,1.235c6.718-4.235,14.19-7.548,19.341-13.857c2.189-2.683,4.542-4.949,7.713-6.062     c16.169-5.672,31.469-14.917,49.754-12.019c3.633,0.577,7.291-1.219,10.876-1.104c6.198,0.199,13.003-2.009,18.219,3.621     c1.178,1.273,2.879,1.444,4.654,0.936c2.717-0.778,5.479-1.397,8.229-2.058c4.629-1.113,8.494-0.745,11.918,3.48     c4.81,5.939,10.346,11.288,15.538,16.919c1.263,1.368,2.751,3.352,4.397,2.947c4.721-1.16,7.009,2.543,10.408,4.167     c8.52,4.069,12.295,12.241,14.771,19.795c4.175,12.74,9.062,25.352,11.933,38.495c1.564,7.165,5.3,11.381,11.696,15.236     c13.348,8.042,27.181,15.328,39.752,24.73c10.816,8.09,23.548,12.971,35.69,18.789c4.749,2.274,9.95,4.523,14.827,3.579     c7.659-1.486,10.517,3.228,13.896,8.013c0.479,0.677,0.937,1.373,1.352,2.091c3.184,5.507,7.192,10.372,11.514,15.008     c0.694,0.744,1.28,1.874,2.339,1.152c1.147-0.783,0.919-2.064,0.071-3.063c-1.4-1.651-2.842-3.271-4.329-4.842     c-4.387-4.635-7.02-10.403-10.494-15.762c4.275,0.878,8.206,2.122,11.768,4.276c4.31,2.604,8.775,4.835,13.839,5.359     c8.334,0.864,14.509,3.708,17.512,12.719c2.735,8.203,7.335,9.171,14.631,4.555c3.973-2.514,7.324-2.439,10.847,0.697     c3.251,2.894,6.076,6.148,8.871,9.454c3.244,3.838,6.527,7.642,10.196,11.931     C1206.713,606.525,1206.897,605.146,1205.751,603.867z",80],
			["M442.508,305.785c-1.53,3.857-3.347,7.6-4.847,11.465c-0.969,2.496-1.9,4.358-5.244,3.982		c-2.249-0.253-3.303,1.883-4.042,3.816c-2.398,6.271,0.113,13.297,5.993,16.776c8.667,5.133,9.226,7.018,6.209,16.371		c-2.509,7.784-2.753,15.642,0.388,23.455c1.736,4.323,3.368,8.896,0.979,13.468c-6.057,11.593-7.726,23.843-6.439,36.749		c0.509,5.104,0.443,10.3-0.257,15.459c-0.365,2.687-1.514,3.937-4.132,4.795c-5.357,1.761-10.814,3.175-15.685,6.217		c0.613,0.878,1.265,1.726,1.97,2.525c4.238-2.52,8.645-4.729,13.803-5.386c5.093-0.649,6.929-4.271,7.041-9.28		c0.106-4.661,0.395-9.298,0.042-13.973c-0.854-11.391-0.501-22.742,5.091-33.026c2.997-5.512,3.355-10.996,1.12-16.313		c-3.791-9.021-3.412-17.685-0.216-26.696c2.478-6.981,0.979-10.442-4.93-14.781c-2.782-2.041-6.075-3.486-7.853-6.779		c-2.087-3.861-1.156-10.206,1.894-10.249c4.306-0.062,5.627-2.372,6.833-5.794c1.318-3.742,3.391-7.219,4.757-10.947		c0.043-0.118,0.1-0.214,0.147-0.326c-0.76-0.917-1.388-1.875-2.016-2.786C442.894,304.914,442.688,305.33,442.508,305.785z",70,true,"v4"],
			["M659.367,232.692c-0.604-0.221-1.258-0.454-2.011-0.717		c-18.482-6.479-35.991-14.652-50.875-27.812c-7.302-6.454-15.951-10.823-25.297-13.619c-9.844-2.942-17.305-0.233-22.035,8.643		c-5.331,10.003-10.098,20.329-8.066,32.25c0.541,3.176-0.729,5.397-3.837,5.925c-8.955,1.516-14.945,7.271-20.856,13.533		c-7.051,7.47-7.104,7.204-1.786,16.31c2.295,3.929,5.571,7.852,4.86,12.74c-2.107,14.504-9.889,25.486-22.898,31.892		c-8.669,4.271-18.044,5.313-25.771-2.814c-4.108-4.32-8.906-5.693-14.785-5.241c-5.046,0.388-10.118,0.555-15.104-1.806		c-3.055-1.446-6.033-0.516-7.79,2.553c0.628,0.911,1.255,1.869,2.016,2.786c1.109-2.631,3.248-3.535,5.27-2.311		c5.958,3.613,12.336,1.853,18.517,2.043c3.384,0.104,5.993,0.939,8.511,3.195c2.807,2.516,5.345,5.761,9.104,6.711		c6.576,1.661,13.268,1.629,19.569-1.291c13.013-6.031,21.238-16.27,25.197-29.895c1.087-3.741,2.263-7.748,0.194-11.678		c-2.314-4.397-4.098-9.097-7.306-12.989c-0.872-1.061-1.808-1.996-0.296-3.324c7.222-6.349,12.27-15.432,23.25-16.962		c4.645-0.648,7.771-4.059,6.828-9.371c-1.928-10.882,2.445-20.246,7.034-29.487c4.063-8.179,9.511-10.54,18.55-8.381		c9.225,2.203,17.404,6.669,24.597,12.735c13.758,11.605,28.898,20.657,46.083,26.208c3.116,1.007,6.084,2.471,9.17,3.588		C659.289,235.024,659.148,233.821,659.367,232.692z",70,true,"ug"],
			["M816.89,312.552c-2.777,2.192-5.72,2.051-8.519-0.62c-3.363-3.211-7.125-6.01-10.486-9.225		c-7.411-7.084-15.665-12.97-25.038-17.057c-7.107-3.101-13.914-7.311-21.96-7.721c-9.65-0.489-19.308-0.902-28.965-1.141		c-2.809-0.068-5.182-0.823-7.433-2.371c-5.212-3.581-10.776-6.73-15.606-10.766c-7.587-6.335-15.225-9.724-24.475-3.625		c-0.132,0.087-0.318,0.09-0.479,0.137c-4.146,1.211-7.503-0.354-8.307-4.521c-0.846-4.387-1.491-8.927-1.325-13.365		c0.259-6.916,0.501-7.6-4.931-9.586c-0.22,1.129-0.078,2.332,0.035,3.414c0.042,0.015,0.082,0.033,0.124,0.048		c1.886,0.676,2.503,1.693,2.168,3.721c-0.884,5.345,0.185,10.635,0.98,15.878c0.972,6.377,5.896,9.29,11.971,7.414		c2.54-0.785,5.173-1.414,7.545-2.563c3.103-1.507,5.553-0.838,8.218,1.028c7.225,5.061,14.711,9.752,21.813,14.973		c3.44,2.527,6.925,3.335,11.079,3.417c10.313,0.205,21.036-0.775,30.829,1.72c13.979,3.563,27.069,10.176,38.129,20.004		c5.224,4.642,10.538,9.179,15.758,13.825c2.236,1.992,4.847,2.803,7.334,1.235c3.659-2.307,7.54-4.343,11.149-6.736		c0-1.375,0-2.75,0-4.125C823.3,308.158,819.943,310.139,816.89,312.552z",70,true,"v5"],
			["M966.431,306.521c-1.104-0.156-2.115-1.521-3.017-2.467		c-4.711-4.941-9.93-9.525-13.908-15.005c-5.041-6.941-11.089-7.399-18.376-5.172c-4.182,1.28-8.439,2.38-11.754-2.063		c-0.503-0.674-1.757-1.139-2.645-1.113c-6.282,0.185-12.575-1.581-18.864,0.446c-3.847,1.238-7.924,0.938-11.905,0.456		c-7.125-0.867-13.895,0.282-20.501,3.023c-4.602,1.91-9.388,3.368-14,5.249c-5.804,2.367-12.686,3.281-16.648,8.519		c-2.358,3.116-5.264,5.438-8.313,7.548c0,1.375,0,2.75,0,4.125c3.018-2,5.846-4.249,8.191-7.121		c2.189-2.683,4.542-4.949,7.713-6.062c16.169-5.673,31.469-14.917,49.754-12.02c3.633,0.577,7.291-1.219,10.876-1.104		c6.198,0.198,13.003-2.01,18.22,3.62c1.178,1.273,2.879,1.444,4.653,0.937c2.717-0.778,5.479-1.397,8.229-2.058		c4.629-1.113,8.494-0.745,11.918,3.479c4.81,5.939,10.346,11.288,15.538,16.919c1.263,1.368,2.751,3.353,4.396,2.947		c4.722-1.16,7.009,2.543,10.408,4.167c8.521,4.068,12.295,12.241,14.771,19.795c0.794,2.423,1.616,4.842,2.443,7.26		c0.103-2.321,0.307-4.614,0.692-6.964C990.003,321.548,981.757,308.685,966.431,306.521z",70,true,"v6"],
			["M1107.292,431.145c-0.445,0.066-0.891,0.132-1.344,0.228		c-3.188,0.674-6.657-0.288-9.767-1.588c-10.738-4.486-21.212-9.531-31.479-15.022c-7.364-3.938-13.378-9.921-20.672-13.823		c-11.312-6.056-21.715-13.573-32.956-19.708c-1.479-0.809-2.661-1.604-3.224-3.479c-4.107-13.664-8.439-27.262-12.576-40.917		c-0.298-0.982-0.622-1.974-0.97-2.969c-0.386,2.35-0.59,4.643-0.692,6.964c3.52,10.297,7.164,20.591,9.489,31.235		c1.564,7.165,5.3,11.381,11.696,15.235c13.348,8.042,27.181,15.328,39.752,24.73c10.815,8.09,23.548,12.971,35.689,18.789		c4.749,2.274,9.95,4.523,14.827,3.579c0.815-0.158,1.565-0.232,2.278-0.258C1107.226,433.152,1107.238,432.138,1107.292,431.145z",70,true,"v7"],			
			["M1206.75,480.867c-5.438-6.076-10.65-12.367-16.334-18.203		c-4.553-4.677-8.543-4.839-14.48-1.631c-6.539,3.534-9.186,3.101-11.357-4.107c-2.601-8.618-8.693-11.609-16.423-13.037		c-5.756-1.063-10.995-3.118-16.318-5.704c-7.652-3.713-15.293-8.423-24.545-7.039c-0.055,0.993-0.066,2.007,0.053,2.996		c5.984-0.211,8.598,3.994,11.618,8.271c0.479,0.678,0.937,1.373,1.352,2.092c3.184,5.507,7.192,10.371,11.514,15.008		c0.694,0.744,1.28,1.874,2.34,1.151c1.146-0.782,0.918-2.063,0.07-3.063c-1.399-1.651-2.842-3.271-4.329-4.842		c-4.387-4.636-7.02-10.403-10.493-15.763c4.274,0.878,8.205,2.122,11.768,4.276c4.31,2.604,8.775,4.835,13.839,5.359		c8.334,0.863,14.509,3.708,17.512,12.719c2.735,8.203,7.335,9.171,14.631,4.555c3.974-2.514,7.324-2.438,10.848,0.697		c3.251,2.894,6.076,6.147,8.871,9.454c3.243,3.838,6.526,7.642,10.195,11.931C1207.713,483.525,1207.897,482.146,1206.75,480.867z",70,true,"v8"]			
			];*/
            paths = [
                ["m 67.332931,422.69134 c -4.518327,-6.6048 -7.858515,-14.48015 -5.304392,-16.20095 1.294609,-0.87221 6.592337,-2.83349 4.91789,0.5917 -1.66031,3.39627 2.67555,8.33221 4.285394,10.74559 4.05397,6.07746 6.669809,10.06341 4.895096,11.36111 -2.703786,1.97706 -5.587249,-1.8099 -8.793988,-6.49745 z",80,false,"CSTN01"],
                ["m 123.00317,514.6746 c -1.39592,-0.81298 0.45818,-5.43539 0.95937,-8.56968 0.73644,-4.60545 -2.28355,-13.7674 -6.09658,-18.49557 l -2.39012,-2.96377 -5.07156,3.86111 c -3.88031,2.95418 -5.69351,5.46774 -8.04013,6.68127 -1.18147,0.61099 -2.718534,-2.16464 -2.718534,-4.25611 0,-2.44101 1.911464,-2.73169 7.594684,-7.48536 l 6.90025,-5.77164 -1.86682,-3.65928 c -1.42663,-2.79642 -2.87062,-3.97887 -6.12381,-5.01463 -3.84936,-1.22558 -4.38134,-1.79805 -5.55574,-5.9786 -1.097184,-3.90564 -2.140424,-5.18207 -6.721228,-8.22355 -3.4063,-2.26166 -6.97191,-5.88199 -9.58974,-9.73691 -4.166951,-6.13611 -8.333798,-9.609 -6.334448,-11.60834 1.999341,-1.99934 6.166508,1.47317 10.296868,7.06423 2.27189,3.07534 6.54181,7.37271 9.488714,9.54972 3.834494,2.8327 5.890824,5.25372 7.231854,8.51439 1.0437,2.53772 2.53838,4.5602 3.37385,4.56522 4.50234,0.027 7.13401,3.57453 13.9966,18.86736 8.10139,18.05342 8.46788,19.40088 6.93383,25.49312 -1.24584,4.94771 -3.55216,8.74833 -6.26731,7.16702 z",80,false,"CSTN02"],
                ["m 112.38387,549.55166 c -1.50904,-2.44168 -2.35007,-15.3532 -0.87297,-18.20959 0.76366,-1.47675 3.78255,-7.3232 5.36295,-8.88203 3.29747,-3.25248 5.60197,-1.67137 5.05121,0.19704 l -1.60873,5.45752 -2.14133,3.62929 c -1.65675,2.80798 -2.06619,4.88543 -1.8093,9.18013 0.3097,5.17731 1.75032,8.11221 -0.37125,8.22189 -1.25105,0.0647 -3.30793,0.89544 -3.61058,0.40575 z",80,false,"CSTN04"],
                ["m 182.18321,582.8973 -11.5,-3.84638 c -6.00145,-1.12981 -12.17937,-0.28855 -18.37501,-0.0535 -21.55709,0.81766 -28.02425,-1.33007 -31.60243,-4.84398 -3.23855,-3.18038 -4.60974,-10.82772 -5.24045,-14.17625 -0.44812,-2.37917 4.13957,-3.09038 4.66677,-1.13816 0.41895,1.55138 1.28964,4.30312 1.79411,5.75036 2.78881,8.00051 7.35623,10.53585 33.98184,8.61916 17.15383,-1.23485 19.47202,0.98152 25.46537,3.52544 4.13774,1.49711 14.42514,5.63212 18.36864,4.12683 3.55225,-1.35423 5.73675,2.8042 3.55418,4.04685 -4.78843,2.72631 -9.85989,2.27148 -21.11302,-2.01028 z",80,false,"CSTN05"],
                ["m 213.03672,576.49273 c -0.66,-0.66 -3.55703,-3.24807 -3.55703,-3.83073 0,-0.58265 13.40513,-15.02593 24.26763,-25.85442 l 19.75,-19.68816 2.40583,1.98401 2.40582,1.98402 -19.48006,19.27606 c -2.49255,2.79292 -22.99347,23.18513 -25.79219,26.12922 z",80,false,"CSTN06"],
                ["m 262.89301,521.71681 c -0.34319,-0.41313 -1.61428,-1.48859 -1.03951,-2.66804 2.06615,-4.23979 1.9377,-8.13097 1.23808,-11.02272 -1.22728,-5.07268 -2.40158,-10.5228 -2.43038,-14.18161 -0.0419,-5.32823 0.1479,-5.71862 6.07875,-12.5 2.87336,-3.28542 8.29192,-9.21525 9.60525,-10.38781 2.05946,-1.83873 3.70622,-0.83381 3.62704,1.24513 l 0.56673,2.51961 -6.14662,6.37381 c -2.04272,2.11821 -6.59118,6.17984 -7.95685,9.77693 -1.19445,3.14611 -0.58429,7.5016 1.66439,15.73476 1.97689,7.23805 -0.73681,12.94305 -2.31043,15.72755 -0.27493,0.48648 -2.10856,0.33085 -2.89645,-0.61761 z",80,false,"CSTN07"],
                ["m 313.65418,472.13367 c -8.93121,-2.57802 -24.23703,-10.40586 -27.87589,-3.7502 -0.89926,-1.68029 -0.55318,-5.75625 -0.0926,-6.32571 0.25793,-0.31892 2.92798,-1.67145 3.73182,-1.73338 0.92097,-0.071 2.24941,-0.14314 3.98668,0.1792 4.87501,0.90453 25.88763,7.9561 36.67485,10.59765 3.5345,0.86552 5.85203,1.36819 6.30405,1.80874 1.42366,1.38752 -0.30748,5.43373 -1.97073,5.27378 -8.10053,-2.30506 -13.2279,-3.89858 -20.75818,-6.05008 z",80,false,"CSTN08"],
                ["m 348.02431,473.40671 c -0.33429,-1.33189 -2.2514,-1.1928 -1.43413,-2.2645 0.43472,-0.57007 3.0478,-2.27843 3.9732,-2.9855 5.02637,-3.84051 5.819,-3.793 14.89748,-2.10499 4.25769,0.79166 10.67292,1.79995 14.98645,1.4998 2.4964,-0.1737 1.63659,-0.8927 1.63659,0.63308 0,1.33206 0.64785,4.54137 0.30514,4.93393 -0.61539,0.70489 -4.38228,0.30306 -5.16567,0.26229 -6.67247,-0.38782 -13.72927,-2.4536 -19.2605,-2.69837 -1.19412,0.34079 -2.33244,1.54081 -3.90741,2.61399 -2.6048,1.77491 -5.93827,3.63075 -6.72752,3.49798 -0.66529,-0.11192 1.06014,-1.93836 0.69637,-3.38771 z",80,false,"CSTN09"],
                ["m 392.02489,469.162 c 0.33545,-2.03455 -2.83331,-2.89272 4.9738,-3.7964 8.30157,-1.41174 12.03981,-3.55815 17.58254,-8.20425 3.61785,-3.03261 7.12358,-4.51075 8.75933,-2.90097 0.26271,2.20732 0.47798,3.61527 -2.36967,5.51499 -4.40499,2.93867 -9.15427,6.64645 -13.95272,8.71662 -5.05545,2.18105 -12.43409,3.23134 -13.70371,2.97184 -1.30615,-0.26697 -0.96735,-1.50556 -1.28957,-2.30183 z",80,false,"CSTN10"],
                ["m 434.98344,437.56379 c -2.16364,-17.50926 -0.58966,-28.40735 3.32086,-36.90787 1.38453,-3.00963 4.03508,-9.37475 4.03508,-11.42305 0,-2.08072 -2.09173,-6.53555 -1.31048,-7.75765 0.80473,-1.25885 3.94118,-1.32357 4.90049,-0.36426 0.78189,0.78189 1.93914,6.61476 1.65791,9.60476 -0.37759,4.01466 -2.56798,9.71951 -4.31057,13.70523 -6.43744,13.83063 -2.26621,21.02175 -2.82452,38.79311 -0.40986,6.93753 -2.01757,11.38625 -9.28049,13.51943 -0.76201,0 -1.37195,0.51958 -1.37416,-5.96569 -4.4e-4,-1.3051 2.81609,-0.58688 4.03632,-2.56418 1.52843,-2.47673 1.50225,-7.78569 1.14956,-10.63983 z",80,false,"CSTN12"],
                ["m 440.03197,371.96172 c -0.74563,-0.30087 -2.21721,-2.44226 -2.26378,-4.38071 -0.0586,-2.44079 1.41131,-7.76967 2.42639,-11.1158 2.23888,-7.38029 1.99151,-8.15689 -4.01082,-12.59107 -2.49825,-1.84556 -6.81259,-5.43477 -7.55931,-6.49652 -1.0136,-1.44122 0.16704,-2.48566 1.87687,-3.55345 1.59338,-0.99508 4.78988,1.80516 9.50245,5.26466 7.50907,5.51241 8.53037,8.19387 6.35467,16.68441 -1.80786,4.1933 -2.94363,8.6279 -2.92416,13.19194 0.21359,3.07238 -1.29187,3.84813 -3.40231,2.99654 z",80,false,"CSTN13"],
//                ["m 430.75538,325.1811 c -2.99358,-2.45045 -0.35412,-6.01319 3.21349,-6.01319 1.83098,0 3.70436,-2.5548 6.35537,-9.7632 3.43639,-9.34392 4.42537,-11.02249 11.8321,-8.98709 0.90072,0.24752 3.5945,1.91307 6.6925,2.15705 11.43086,-0.69218 14.83728,-1.60151 21.93226,4.09999 6.91004,5.69509 10.10451,7.61649 16.05219,6.93524 11.64912,-2.17722 17.17415,-7.4127 24.87977,-15.32325 2.07841,-1.39488 0.39718,0.81394 2.12532,0.76395 4.76814,-0.13793 4.75765,0.0488 -4.57591,8.78454 -7.46689,6.98863 -14.89241,10.36682 -23.40468,10.3678 -7.60809,8.8e-4 -9.63031,-0.41447 -16.37783,-6.00242 -4.80616,-3.98021 -8.0959,-5.62131 -14.49967,-4.70283 -4.46511,0.55474 -10.06266,0.98551 -13.11356,-0.85479 -7.45281,-8.05452 -6.62089,15.67324 -14.87491,17.70338 -0.87725,-0.0198 -4.70994,2.08437 -6.23644,0.83482 z",80,false,"STN14"],
                ["m 431.01309,324.8891 c -2.99358,-2.45045 -0.35412,-6.01319 3.21349,-6.01319 1.83098,0 3.70436,-2.5548 6.35537,-9.7632 1.92844,-5.24364 3.08613,-8.07327 5.03981,-9.18721 0.77756,-0.44335 1.43476,2.58393 1.43476,2.58393 l 0.8729,2.81388 c -3.38596,3.16907 -4.41943,17.19116 -10.67989,18.73097 -0.87725,-0.0198 -4.70994,2.08437 -6.23644,0.83482 z",80,false,"CSTN14P1"],
                ["m 446.84811,299.77489 c 1.274,-0.11532 2.86436,0.16308 4.97669,0.74356 0.90072,0.24752 3.5945,1.91307 6.6925,2.15705 11.43086,-0.69218 14.83728,-1.60151 21.93226,4.09999 6.91004,5.69509 10.10451,7.61649 16.05219,6.93524 11.64912,-2.17722 17.17415,-7.4127 24.87977,-15.32325 2.07841,-1.39488 0.39718,0.81394 2.12532,0.76395 4.76814,-0.13793 4.75765,0.0488 -4.57591,8.78454 -7.46689,6.98863 -14.89241,10.36682 -23.40468,10.3678 -7.60809,8.8e-4 -9.63031,-0.41447 -16.37783,-6.00242 -4.80616,-3.98021 -8.0959,-5.62131 -14.49967,-4.70283 -4.46511,0.55474 -10.06266,0.98551 -13.11356,-0.85479 -1.28544,-1.38922 -2.32442,-1.83297 -3.20608,-1.60565 z",80,false,"CSTN14P2"],
                ["m 528.14961,286.86496 c -0.30769,-3.00493 -0.77414,-1.99723 -0.2015,-3.44221 2.25469,-5.68948 1.3582,-7.48869 -1.00953,-12.21897 -1.26297,-1.96552 -3.05382,-4.65359 -3.8555,-6.20936 -0.73366,-1.4238 -0.51391,-1.59774 0.32417,-2.21056 1.38896,-1.01562 1.92883,-2.30193 3.46321,-0.50326 1.48579,1.74172 3.79542,5.89154 4.88065,7.92612 1.69773,3.18289 2.65157,6.0442 2.09821,9.6156 -0.42741,2.75849 -1.94808,6.45338 -2.14622,7.45579 -0.27021,1.367 -1.80949,0.60082 -3.55349,-0.41315 z",70,true,"CSTN15"],
                ["m 525.69888,253.85572 c -0.92596,-1.02319 -1.57057,-2.62918 -1.26691,-3.12357 0.33924,-0.55233 9.31134,-9.70184 13.35809,-11.6444 1.15257,-0.55327 5.96,-2.17112 6.55494,-2.32714 1.20155,-0.3151 4.75812,0.29778 3.52003,1.93375 l 0.29104,2.05573 -6.27177,2.92568 c -1.73444,0.80909 -5.27111,3.33236 -7.78264,5.78159 -1.68484,1.64304 -4.70201,4.68496 -5.47525,5.22767 -1.24849,0.87627 -1.92455,0.27896 -2.92753,-0.82931 z",70,true,"CSTN16"],
                ["m 550.39107,227.59249 c -1.58987,-2.46971 1.06305,-16.43579 3.88752,-20.24705 0.4425,-0.59709 3.37067,-3.15631 3.75602,-3.15631 2.16956,0 2.40973,0.29378 1.27331,4.09508 -0.40508,1.35497 -1.70588,4.88319 -2.39044,7.05663 -0.74604,2.36861 -1.57759,9.5157 -1.5117,11.65892 0.0722,2.34794 -0.37252,3.70238 -2.48227,3.70238 -1.39227,0 -2.04191,-2.34766 -2.53244,-3.10965 z",70,true,"CSTN17"],
                ["m 589.3152,197.87992 c -7.43928,-3.78353 -12.89711,-4.93638 -17.7216,-3.75366 -2.56901,0.62979 -4.94133,2.19863 -5.54685,2.19776 -0.96304,-10e-4 -4.47069,1.86644 -4.57096,0.88578 l -0.38751,-3.78994 5.85431,-3.68211 c 3.79928,-2.38958 14.35899,-2.10852 22.04494,1.12813 3.34327,1.40789 7.05039,3.42573 8.3342,4.2649 0.44965,0.29391 2.82364,2.06256 3.09841,2.27485 1.08861,0.8411 1.87952,2.62264 0.55216,4.08935 -1.38072,1.52567 -0.92259,1.41998 -2.92393,0.74868 -1.05193,-0.35285 -6.69329,-3.32628 -8.73317,-4.36374 z",70,true,"CSTN18"],
                ["m 616.72891,216.11396 c -3.61898,-2.19274 -6.95407,-5.12119 -8.32046,-6.17731 -0.87062,-0.67292 -3.75116,-4.40951 -3.21554,-5.26718 0.79537,-1.2736 4.7362,1.12306 5.79367,1.28749 3.22108,3.39596 10.12427,7.31579 12.0012,9.24989 0.19124,0.4482 1.65985,3.09293 1.65985,3.51982 0,2.09968 -3.33078,-1.58699 -3.57623,-0.29287 -0.08,0.42204 -2.28938,-1.07583 -4.34249,-2.31981 z",70,true,"CSTN20"],
                ["m 634.03431,222.96788 c 0.89802,-0.65276 0.19546,-1.48614 1.32959,-1.40965 3.03824,1.78794 14.96247,5.03769 13.1594,8.62586 -0.68067,1.27183 -1.48013,1.55419 -3.70713,0.95523 -2.54615,-1.69582 -9.83331,-4.15342 -12.21299,-5.83257 -1.44476,-1.01945 -0.10707,-1.15619 1.43113,-2.33887 z",70,true,"CSTN21"],
                ["m 665.58677,262.23646 c -2.81386,-2.81501 -3.37925,-3.13948 -4.35852,-10.10063 -0.4293,-3.0517 -0.41152,-6.78791 -0.28938,-10.05115 0.0259,-0.69107 0.29826,-3.52011 0.021,-4.34922 -0.4998,-1.49478 -2.87267,-1.22937 -2.7535,-2.16959 0.23228,-1.83262 -0.42827,-3.8964 -0.0604,-4.26427 0.28508,-0.28508 5.08535,1.24295 6.0398,1.8006 2.91057,1.70053 1.84836,3.02903 1.92426,11.28901 0.11614,12.63904 2.03667,16.11237 7.73845,14.22753 2.4828,-0.82074 5.35114,-2.3501 6.49767,-2.54239 0.36101,-0.0605 3.33145,-0.93241 3.74706,-0.94024 1.93947,-0.0365 1.35016,1.22081 1.35016,3.40678 0,2.5785 -2.71362,2.49356 -6.24247,3.64441 -6.62863,1.11234 -10.06562,3.39821 -13.61413,0.0492 z",70,true,"CSTN22"],
                ["m 714.24311,278.26538 c -1.33061,-0.50827 -17.79441,-11.99002 -19.35742,-13.34485 -0.35138,-0.30458 -2.99592,-3.90256 -1.36831,-3.98775 l 2.82617,-1.60188 13.16506,9.56725 c 4.30761,3.13041 9.35028,7.74853 16.02617,6.22345 1.07865,-0.24641 0.70834,1.35807 0.70834,2.86814 0,1.34029 -0.32117,1.92392 -1.03986,2.20563 -0.41488,0.16262 -3.43907,0.27093 -4.27959,0.2468 -1.5125,-0.0434 -5.85609,-1.86186 -6.68056,-2.17679 z",70,true,"CSTN23"],
                ["m 758.45487,283.2123 c -2.49281,-0.72932 -4.99737,-1.20478 -9.04477,-1.90561 -2.33507,-0.40432 -9.72385,-0.33791 -11.89887,-0.25929 -3.0545,0.11041 -2.27041,-0.97088 -2.27041,-2.41964 0,-1.37512 1.4293,-2.01016 2.53084,-2.35997 0.72959,-0.2317 8.1088,-0.009 9.9053,0.0392 1.12677,0.0303 5.19795,0.2537 9.16263,1.21268 5.0991,1.23338 10.31111,3.39443 11.90969,4.87307 1.36256,1.26032 0.61614,4.41573 -1.11729,4.2656 -0.17857,-0.0155 -4.11366,-1.68141 -4.51045,-1.82699 -0.99837,-0.3663 -2.40452,-0.95717 -4.66667,-1.61901 z",70,true,"CSTN24"],
                ["m 813.58474,318.37339 c -0.4544,-0.1438 -3.28458,-0.38143 -5.19364,-1.75692 -2.55244,-1.83905 -7.24207,-6.7064 -8.84802,-8.234 -3.57501,-3.40058 -9.29631,-8.39486 -13.72988,-11.3888 l -9.86877,-6.66425 2.86787,-3.35518 c 1.50722,-1.76331 0.61069,-0.19705 1.83532,0.45835 3.34219,1.78869 10.80819,6.51877 17.85781,13.0692 1.59874,1.48553 9.09478,8.49716 10.06086,9.47469 1.60646,1.62551 3.68876,1.09866 4.08132,2.10344 0.33661,0.86156 1.11379,2.02212 1.0146,3.09588 -0.22928,2.48205 1.01932,3.54469 -0.0775,3.19759 z",70,true,"CSTN25"],
                ["m 822.5082,311.33193 c -0.43867,-0.78386 -1.52046,-2.36407 -0.23755,-4.03012 2.06848,-1.73998 6.42007,-4.02021 8.40223,-5.98956 2.43145,-2.41574 4.5496,-5.4945 7.0572,-7.37796 3.27603,-2.43414 5.60987,-2.83975 15.36552,-6.44101 21.0463,-7.76917 25.69391,-8.25689 31.65073,-7.91573 2.66594,0.15268 6.95469,0.5755 7.67209,1.05769 0.62068,0.41718 0.57704,0.80472 0.71423,1.997 0.18588,1.61547 -0.49827,2.28402 -1.48935,2.55936 -0.62052,0.17239 -6.14846,-0.2022 -7.74781,-0.2022 -5.24032,0 -10.02937,1.12104 -28.04897,7.51977 -8.11355,2.88111 -12.26641,4.29725 -15.1384,6.28378 -2.93949,2.15501 -4.56754,5.30866 -7.10991,7.61509 -5.04324,3.77226 -8.68874,6.05877 -8.23124,5.54555 0.26636,-0.2988 -2.33491,0.31441 -2.85877,-0.62166 z",70,true,"CSTN26"],
                ["m 902.05554,283.82865 c -0.19775,-0.41656 -0.39431,-2.04283 -0.35811,-3.14283 0.0605,-1.71234 3.00274,-1.67089 7.96699,-1.76387 2.78523,-0.0522 7.21831,0.43618 9.03079,0.72774 3.20842,0.51611 3.03578,2.15258 2.09736,4.21211 -0.58599,1.28623 -1.4355,2.06454 -2.3833,1.26292 -0.77801,-0.65801 -5.509,-1.50886 -7.89071,-1.47906 -6.28482,0.0787 -8.26782,0.59418 -8.46302,0.18299 z",70,true,"CSTN27"],
                ["m 954.37001,299.08427 c -10.26758,-11.5112 -11.42897,-12.88139 -15.49454,-12.83419 -1.17057,0.0136 -4.38244,0.92308 -6.02762,1.0497 -3.25919,0.25084 -4.13851,-0.39005 -4.42444,-1.88581 -0.39035,-2.04196 0.70997,-2.27125 2.71241,-2.80555 1.49536,-0.39899 4.41449,-1.05772 6.91988,-1.21727 1.88788,-0.12022 3.51083,0.19305 4.28097,0.27297 4.08144,0.42352 6.57356,3.64364 14.28535,12.9193 5.16118,6.20781 8.42322,9.38042 10.6617,10.36521 0.88536,0.38951 3.05807,0.59312 3.64704,0.59312 3.58653,0 5.59769,2.41436 3.83314,5.10739 -0.87065,1.32878 -0.69344,0.7675 -1.59722,1.24247 -0.70392,0.36993 -2.68726,-1.82052 -4.61446,-2.07352 -1.68247,-0.22088 -3.56001,0.75922 -5.52971,-1.23529 -2.03303,-2.05864 -4.52722,-4.87359 -8.6525,-9.49853 z",70,true,"CSTN28"],
                ["m 996.10389,350.11387 c -2.03845,-7.72711 -7.97917,-26.41098 -13.4294,-30.9597 -2.41708,-1.6976 -1.95648,-3.34705 -1.0161,-4.28743 0.8422,-0.84215 4.68719,0.66344 6.63873,3.34575 1.69595,2.23458 5.14112,8.00862 8.59505,18.67093 0.94808,2.92673 2.78249,9.1135 3.10701,10.37266 0.51982,2.01701 0.0151,2.71469 -1.00513,3.46067 -2.3393,1.71057 -1.81246,1.48431 -2.89016,-0.60288 z",70,true,"CSTN29"],
                ["m 1012.3771,386.08765 c -6.7808,-4.63733 -7.2027,-5.65514 -9.3648,-12.05358 -0.9867,-5.06018 -2.9866,-12.00886 -3.55396,-13.8257 -1.00273,-3.21091 0.26755,-4.43753 1.89106,-4.86207 2.1529,-0.56301 1.9819,1.00178 3.5251,6.18988 0.6495,2.18331 1.5033,5.07068 2.2206,7.70976 2.0009,7.36087 3.8315,9.88976 8.0665,12.38443 3.6483,2.14899 9.5051,5.05332 10.6044,6.11036 1.2777,1.22866 -0.01,2.47732 -0.7214,3.80844 -0.6425,1.20065 1.563,3.20892 -0.7297,1.79016 -1.9807,-1.22567 -8.1017,-4.8837 -11.9378,-7.25168 z",70,true,"CSTN30"],
                ["m 1125.9201,453.36446 c -2.1246,-2.8875 -4.435,-6.64509 -7.0546,-10.39077 -5.1856,-7.4146 -7.2782,-9.0854 -12.6788,-8.209 -2.1268,0.34513 -5.6507,0.20653 -8.8202,-0.83427 -5.3162,-1.74575 -36.4335,-15.44774 -43.5768,-21.52237 -3.1216,-2.65458 -8.4119,-6.2106 -11.8398,-8.28309 -2.6122,-1.57932 -8.8415,-5.54442 -9.6012,-6.26319 -1.0395,-0.98359 -0.3694,-2.57131 0.5469,-3.96972 0.8786,-1.341 1.1936,-1.30664 3.8143,0.31167 7.8412,4.84205 12.4706,7.84896 20.9816,13.98382 5.1831,3.73605 15.5096,9.32728 25.0546,13.75434 7.2432,3.37524 12.9415,7.1935 18.8051,8.05597 1.8914,0.27821 2.2162,-0.54306 4.6859,-0.75076 3.9366,-0.33106 9.4262,0.42805 11.8293,1.16239 3.687,1.12677 4.9284,0.47336 5.4531,4.37573 0.4155,3.0909 -0.5939,5.8311 2.1042,8.55816 2.5513,2.57867 4.1791,5.825 5.8407,7.91918 2.0121,2.53578 4.2843,5.14146 5.0386,6.61175 0.6854,1.3359 -1.0712,3.39181 -3.4666,3.39181 -0.8948,0 -1.5616,-1.28532 -2.347,-2.25358 -0.8118,-1.00072 -3.3216,-3.68051 -4.7693,-5.64807 z",70,true,"CSTN31"],
                ["m 1145.9424,446.82586 c -4.8956,0.20352 -14.3146,-4.24449 -14.3889,-5.67477 -0.022,-0.42893 -1.9983,-1.56208 -1.3002,-2.51682 0.707,-0.96685 0.9827,-2.57775 3.5431,-1.68392 1.7884,0.62432 8.1398,4.54365 12.0035,4.86127 3.7396,0.30742 5.9288,0.80009 8.1003,1.46704 4.1712,1.28112 5.656,2.39624 4.6423,4.01949 -0.5904,0.31867 -2.7879,1.86053 -3.2603,2.02038 -1.2116,0.40994 -5.6206,-2.64729 -9.3398,-2.49267 z",70,true,"CSTN33"],
                ["m 1185.9023,463.41233 c -4.2328,-2.03502 -4.3115,-1.14586 -9.2856,1.67478 -4.5289,2.56824 -10.0797,2.75051 -12.7934,-2.33116 l -3.1216,-5.84554 0.9661,-3.32426 c 1.3316,-0.52218 3.4893,1.60501 4.2287,2.19629 0.2834,0.22662 1.7389,4.47338 2.038,4.89119 1.7509,2.446 4.5087,1.04858 9.4226,-1.45833 2.1562,-1.1 5.3326,-1.60716 6.8187,-1.60716 3.9523,0 8.7166,4.45257 12.2564,9.26599 1.3722,1.86592 5.8947,6.8609 6.1301,7.64873 0.2603,0.87118 -0.2945,1.49967 -1.1028,2.39287 -0.9045,0.99947 -1.8724,0.39316 -2.2709,0.39316 -4.5599,-4.60256 -7.378,-10.68752 -13.2863,-13.89656 z",70,true,"CSTN34"]
            ];
			depot = [
			[-23,155,20,"dpt1"],
			[249,140,70,"dpt2"]
			]
            legend_arrows = [
                ["M1675 971q0 51-37 90l-75 75q-38 38-91 38-54 0-90-38l-294-293v704q0 52-37.5 84.5t-90.5 32.5h-128q-53 0-90.5-32.5t-37.5-84.5v-704l-294 293q-36 38-90 38t-90-38l-75-75q-38-38-38-90 0-53 38-91l651-651q35-37 90-37 54 0 91 37l651 651q37 39 37 91z","#0c8233","translate(465,613) scale(.01)"],
                ["M1675 971q0 51-37 90l-75 75q-38 38-91 38-54 0-90-38l-294-293v704q0 52-37.5 84.5t-90.5 32.5h-128q-53 0-90.5-32.5t-37.5-84.5v-704l-294 293q-36 38-90 38t-90-38l-75-75q-38-38-38-90 0-53 38-91l651-651q35-37 90-37 54 0 91 37l651 651q37 39 37 91z","#0c8233","translate(749,614) scale(.01) rotate(90, 0, 0)"],
                ["M1675 971q0 51-37 90l-75 75q-38 38-91 38-54 0-90-38l-294-293v704q0 52-37.5 84.5t-90.5 32.5h-128q-53 0-90.5-32.5t-37.5-84.5v-704l-294 293q-36 38-90 38t-90-38l-75-75q-38-38-38-90 0-53 38-91l651-651q35-37 90-37 54 0 91 37l651 651q37 39 37 91z","hsl(0, 100%, 43%)","translate(622,660) scale(.01) rotate(180, 0, 0)"]
            ];
			
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

            try {
                var arrows = svg.selectAll(".arrow")
                    .data(legend_arrows)
                    .enter()
                    .append("path")
                    .attr("d", function (d, i) {
                        return d[0];
                    })
                    .attr('id', function (d, i) {
                        return "legend_arrow_" + i;
                    })
                    .attr("fill", function (d, i) {
                        return d[1];
                    })
                    .attr("transform", function (d, i) {
                        return d[2];
                    });
            }catch(e){console.log("arrow exe."+ e)};

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
			console.log(data);
			for (var i = 1; i < 36; i++){
                var d,e;
                if(i<10){
                    d = parseFloat(data['station_status']['STN0' + i]);
                    processVariance('STN0'+i, d);
                    e = parseFloat(data['line_status']['STN0' + i]);
                    processVariance('CSTN0'+i, e);
                }else {
                    d = parseFloat(data['station_status']['STN' + i]);
                    processVariance('STN'+i, d);
                    e = parseFloat(data['line_status']['STN' + i]);
                    processVariance('CSTN'+i, e);
                }
			}
            for (var i = 1; i < 3; i++){
                d = parseFloat(data['station_status']['STN14P' + i]);
                processVariance('STN14P'+i, d);
                d = parseFloat(data['line_status']['STN14P' + i]);
                processVariance('CSTN14P'+i, d);
            }
			processVariance('dpt1', parseFloat(data['station_status']['SUBD']));
			processVariance('dpt2', parseFloat(data['station_status']['KAJD']));
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
	groupRemoveClass(g, 'glow-grey glow-green glow-yellow glow-red glow-red-blinking glow-yellow-blinking glow-green-blinking glow-kavi-blinking glow-gray-blinking on');
	groupAddClass(g, 's_1 glow-grey on');
}

function groupGoGreen(g) {
	groupRemoveClass(g, 'glow-grey glow-green glow-yellow glow-red glow-red-blinking glow-yellow-blinking glow-green-blinking glow-kavi-blinking glow-gray-blinking on');
	groupAddClass(g, 's_5 glow-green on');
}

function groupGoYellow(g) {
	groupRemoveClass(g, 'glow-grey glow-green glow-yellow glow-red glow-red-blinking glow-yellow-blinking glow-green-blinking glow-kavi-blinking glow-gray-blinking on');
	groupAddClass(g, 's_2 glow-yellow on');
}

function groupGoRed(g) {
	groupRemoveClass(g, 'glow-grey glow-green glow-yellow glow-red glow-red-blinking glow-yellow-blinking glow-green-blinking glow-kavi-blinking glow-gray-blinking on');
	groupAddClass(g, 's_3 glow-red on');
}
function groupGoKavi(g) {
    groupRemoveClass(g, 'glow-grey glow-green glow-yellow glow-kavi glow-red glow-red-blinking glow-yellow-blinking glow-green-blinking glow-kavi-blinking glow-gray-blinking on');
    groupAddClass(g, 's_4 glow-kavi on');
}

function groupGoRedBlink(g) {
	groupRemoveClass(g, 'glow-grey glow-green glow-yellow glow-red glow-red-blinking glow-yellow-blinking glow-green-blinking glow-kavi-blinking glow-gray-blinking on');
	groupAddClass(g, 'glow-red-blinking on');
	if (detectIE()) repeatBlink();
}
        function groupGoYellowBlink(g) {
            groupRemoveClass(g, 'glow-grey glow-green glow-yellow glow-red glow-red-blinking glow-yellow-blinking glow-green-blinking glow-kavi-blinking glow-gray-blinking on');
            groupAddClass(g, 'glow-yellow-blinking on');
            if (detectIE()) repeatYBlink();
        }
        function groupGoGreenBlink(g) {
            groupRemoveClass(g, 'glow-grey glow-green glow-yellow glow-red glow-red-blinking glow-yellow-blinking glow-green-blinking glow-kavi-blinking glow-gray-blinking on');
            groupAddClass(g, 'glow-green-blinking on');
            if (detectIE()) repeatGnBlink();
        }
        function groupGoGrayBlink(g) {
            groupRemoveClass(g, 'glow-grey glow-green glow-yellow glow-red glow-red-blinking glow-yellow-blinking glow-green-blinking glow-kavi-blinking glow-gray-blinking on');
            groupAddClass(g, 'glow-gray-blinking on');
            if (detectIE()) repeatGBlink();
        }
        function groupGoKaviBlink(g) {
            groupRemoveClass(g, 'glow-grey glow-green glow-yellow glow-red glow-red-blinking glow-yellow-blinking glow-green-blinking glow-kavi-blinking glow-gray-blinking on');
            groupAddClass(g, 'glow-kavi-blinking on');
            if (detectIE()) repeatKBlink();
        }

function repeatBlink() {
	d3.selectAll(".glow-red-blinking.on").transition().duration(1000).ease("ease-in-out").style("fill", "hsl(0, 100%, 10%)").transition().duration(1000).ease("ease-in-out").style("fill", "hsl(0, 100%, 63%)").each("end",repeatBlink);
}

function stopBlink() {
	d3.selectAll(".glow-red-blinking").transition().duration(0).style('fill', 'hsl(0, 3%, 30%)');
    d3.selectAll(".glow-yellow-blinking").transition().duration(0).style('fill', 'hsl(0, 3%, 30%)');
    d3.selectAll(".glow-gray-blinking").transition().duration(0).style('fill', 'hsl(0, 3%, 30%)');
    d3.selectAll(".glow-green-blinking").transition().duration(0).style('fill', 'hsl(0, 3%, 30%)');
    d3.selectAll(".glow-kavi-blinking").transition().duration(0).style('fill', 'hsl(0, 3%, 30%)');
}
function repeatYBlink() {
    d3.selectAll(".glow-yellow-blinking.on").transition().duration(1000).ease("ease-in-out").style("fill", "hsl(33, 100%, 30%)").transition().duration(1000).ease("ease-in-out").style("fill", "hsl(33, 100%, 63%)").each("end",repeatYBlink);
}
function repeatGBlink() {
    d3.selectAll(".glow-gray-blinking.on").transition().duration(1000).ease("ease-in-out").style("fill", "hsl(0, 3%, 30%)").transition().duration(1000).ease("ease-in-out").style("fill", "hsl(0, 3%, 63%)").each("end",repeatGBlink);
}
function repeatGnBlink() {
    d3.selectAll(".glow-green-blinking.on").transition().duration(1000).ease("ease-in-out").style("fill", "hsl(134, 82%, 20%)").transition().duration(1000).ease("ease-in-out").style("fill", "hsl(134, 82%, 53%)").each("end",repeatGnBlink);
}
function repeatKBlink() {
    d3.selectAll(".glow-kavi-blinking.on").transition().duration(1000).ease("ease-in-out").style("fill", "hsl(21, 99%, 30%)").transition().duration(1000).ease("ease-in-out").style("fill", "hsl(21, 99%, 63%)").each("end",repeatKBlink);
}
function processVariance(g, v) {
	if (v == 1) groupGoGrey(g);
	else if (v == 2) groupGoYellow(g);
	else if (v == 3) groupGoRed(g);
    else if (v == 4) groupGoKavi(g);
	else if (v == 5) groupGoGreen(g);
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
$.fn.svgRemover = function(className) {
    $(this).each(function () {
        $(this).attr('class', function (index, classNames) {
            return classNames.replace(className, '');
        });
    });
};

$(".legend-stat").click(function(){
   var d=$(this).attr("data-value");
    switch(d){
        case 's_1':
            $("." + d + "").each(function () {
                var v = $(this).attr('class').split(' ')[1];
                groupGoGrayBlink(v.split('-')[1]);
            });
            $('.s_2').svgRemover('glow-yellow-blinking on');
            $('.s_3').svgRemover('glow-red-blinking on');
            $('.s_4').svgRemover('glow-kavi-blinking on');
            $('.s_5').svgRemover('glow-green-blinking on');

        break;
        case 's_2':
            $("." + d + "").each(function () {
                var v = $(this).attr('class').split(' ')[1];
                groupGoYellowBlink(v.split('-')[1]);
            });
            $('.s_1').svgRemover('glow-gray-blinking on');
            $('.s_3').svgRemover('glow-red-blinking on');
            $('.s_4').svgRemover('glow-kavi-blinking on');
            $('.s_5').svgRemover('glow-green-blinking on');
        break;
        case 's_3':
            $("." + d + "").each(function () {
                var v = $(this).attr('class').split(' ')[1];
                    groupGoRedBlink(v.split('-')[1]);
            });
            $('.s_1').svgRemover('glow-gray-blinking on');
            $('.s_2').svgRemover('glow-yellow-blinking on');
            $('.s_4').svgRemover('glow-kavi-blinking on');
            $('.s_5').svgRemover('glow-green-blinking on');
        break;
        case 's_4':
            $("." + d + "").each(function () {
                var v = $(this).attr('class').split(' ')[1];
                groupGoKaviBlink(v.split('-')[1]);
            });
            $('.s_1').svgRemover('glow-gray-blinking on');
            $('.s_2').svgRemover('glow-yellow-blinking on');
            $('.s_3').svgRemover('glow-red-blinking on');
            $('.s_5').svgRemover('glow-green-blinking on');
        break;
        case 's_5':
            $("." + d + "").each(function () {
                var v = $(this).attr('class').split(' ')[1];
                groupGoGreenBlink(v.split('-')[1]);
            });
            $('.s_1').svgRemover('glow-gray-blinking on');
            $('.s_2').svgRemover('glow-yellow-blinking on');
            $('.s_3').svgRemover('glow-red-blinking on');
            $('.s_4').svgRemover('glow-kavi-blinking on');
        break;

    }
});


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