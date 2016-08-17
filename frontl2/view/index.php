<!-- to use scroller : class="col-md-12 scroll_set_1" -->
<?php include 'template/default_header.php' ?>
<title>CEODB L2</title>
<div id="wrapper" class="">
	<div id="wrapper_landing_page">
		<!-- -- -->
		
		
		<!-- -- -->
		<!-- header -->
		<div id="header">
			<div class="col-md-12">
				<div class="col-md-3">
					<div class="logo_holder col-md-12">
						<div class="logo"><img src="../assets/images/logo/ceodb-logo-bw-sm.png"></div>
						<div class="logo"><img src="../assets/images/logo/mpxd_md.png"></div>
					</div>
				</div>
				<div class="col-md-9">
					<div class="row">
						<div class="col-md-5">
							<div id="header_datetime">
								<span class="hd_label hd_label_today"><i class="fa fa-calendar-o" aria-hidden="true"></i> Today: <span id="current_date">22 JUN 2016</span></span>
								<span class="hd_label hd_label_data"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Data Date : 14 MAY 2016</span>
								<span class="hd_button">Change</span>
							</div>
						</div>
						<div id="header_menu" class="col-md-7">
							<span class="hm_button active"><i class="fa fa-home" aria-hidden="true"></i> Home</span>
							<span class="hm_button"><i class="fa fa-line-chart" aria-hidden="true"></i> S-Curve</span>
							<span class="hm_button"><i class="fa fa-cube" aria-hidden="true"></i> Procurement</span>
							<a style="text-decoration: none; color: #fff;" href="/mpxd2/logout"><span class="hm_button"><i class="fa fa-sign-in" aria-hidden="true"></i> Logout</span></a>
							<span class="hm_user_profile">
								<i class="fa fa-user" aria-hidden="true"></i> Profile 
								<i class="fa fa-caret-down" aria-hidden="true"></i>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- -- -->
		
		<!-- -- -->
		<!-- content -->
		<div id="content">
			<div id="dashboard" class="col-md-12">
				
				<div id="infographic" class="">
					<div class="ig_plate poipoi">
						<!-- -- -->
						
						<?php include 'module/gis_accessories.php' ?>
						
						<!-- -- -->
						<img src="../assets/images/base/MRT-L2-1080.jpg">
					</div>
					<div class="ig_plate">
						<img src="../assets/images/base/MRT-L2-1080.png">
					</div>
				</div>
			</div>
		</div>
		<!-- -- -->
			
				
		
		<!-- -- -->
	</div>
</div>
<?php include 'template/default_footer.php' ?>