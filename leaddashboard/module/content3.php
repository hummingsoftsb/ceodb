<!-- -- -->
<div class="wrapper">
	<header>
		<div class="left top_container">
			<ul class="header">
				<li><img src="lib/img/mrtlogo.png"></li>
				<li><h1>Lead Dashboard - Station (26 May 2015)</h1></li>
				<li></li>
			</ul>
		</div>
		<!-- <div class="right top_container">
			<a href="#">Logout</a>
		</div> -->
		<span class="clear"></span>
	</header>
	<script type="text/javascript">
		var classHighlight = 'highlight';
		var $thumbs = $('.thumbnail').click(function(e) {
		    e.preventDefault();
		    $thumbs.removeClass(classHighlight);
		    $(this).addClass(classHighlight);
		});
		
		function submit(){
			$.post("module/submit.php",{slug:"Station",prognosis:$("textarea").val()});
			alert("Prognosis Submitted");
		}
	</script>	
	<div class="content">
		<div id="main_content">
			<div class="full">
				<iframe id="vaframe" src="http://eagle.office.hummingsoft.com.my/SASVisualAnalyticsViewer/guest.jsp?appSwitcherDisabled=false&reportViewOnly=true&reportPath=/User+Folders/sasdemo(1)/My+Folder/Gautam/Test/MRT&reportName=LD+Station+Muzium+Negara" scrolling="yes">
					<p>Your browser does not support iframes.</p>
				</iframe>
			</div>
		</div>
	</div>
	<footer>
		<div class="form">
			<ul class="footer">
				<li><p>Prognosis</p></li>
				<li><textarea id="prognosis" name="prognosis" rows="2" cols="75"></textarea></li>
				<li class="btn"><a class="submit" href="#" onclick="submit()">submit</a></li>
			</ul>
		</div>