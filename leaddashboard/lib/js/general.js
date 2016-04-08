$(document).ready(function(){

	$("#0200d").toggle();
	$("#0300d").toggle();
	$("#0400d").toggle();
	
	$("#0100").click(function(){go_0100()});
	
	$("#0200").click(function(){go_0200()});
	$("#0201").click(function(){go_0201()});
	$("#0202").click(function(){go_0202()});
	$("#0203").click(function(){go_0203()});
	
	$("#0300").click(function(){go_0300()});
	$("#0301").click(function(){go_0301()});
	$("#0302").click(function(){go_0302()});
	$("#0303").click(function(){go_0303()});
	$("#0304").click(function(){go_0304()});
	$("#0305").click(function(){go_0305()});
	$("#0306").click(function(){go_0306()});
	$("#0307").click(function(){go_0307()});
	
	$("#0400").click(function(){go_0400()});
	$("#0401").click(function(){go_0401()});
	$("#0402").click(function(){go_0402()});
	$("#0403").click(function(){go_0403()});
	$("#0404").click(function(){go_0404()});
	$("#0405").click(function(){go_0405()});
	$("#0406").click(function(){go_0406()});
	
	$('.go').on("click", function(e){
		var x = $(this).attr('href').substring(1)
		var y = 'pages/'+x+'.php'
		console.log(y);
		$('#main_content').load(y)
		e.preventDefault();
		return false;
	})

});	

function go_0100(){ $("#0100d").toggle(); $("#0100d").toggleClass("selected2"); $("#0100").toggleClass("selected"); }

function go_0200(){ $("#0200d").toggle(); $("#0200d").toggleClass("selected2"); $("#0200").toggleClass("selected"); }
function go_0201(){ $("#0200d").toggle(); $("#0200d").toggleClass("selected2"); $("#0201").toggleClass("selected"); }
function go_0202(){ $("#0200d").toggle(); $("#0200d").toggleClass("selected2"); $("#0202").toggleClass("selected"); }
function go_0203(){ $("#0200d").toggle(); $("#0200d").toggleClass("selected2"); $("#0203").toggleClass("selected"); }

function go_0300(){ $("#0300d").toggle(); $("#0300d").toggleClass("selected2"); $("#0300").toggleClass("selected"); }
function go_0301(){ $("#0300d").toggle(); $("#0300d").toggleClass("selected2"); $("#0301").toggleClass("selected"); }
function go_0302(){ $("#0300d").toggle(); $("#0300d").toggleClass("selected2"); $("#0302").toggleClass("selected"); }
function go_0303(){ $("#0300d").toggle(); $("#0300d").toggleClass("selected2"); $("#0303").toggleClass("selected"); }
function go_0304(){ $("#0300d").toggle(); $("#0300d").toggleClass("selected2"); $("#0304").toggleClass("selected"); }
function go_0305(){ $("#0300d").toggle(); $("#0300d").toggleClass("selected2"); $("#0305").toggleClass("selected"); }
function go_0306(){ $("#0300d").toggle(); $("#0300d").toggleClass("selected2"); $("#0306").toggleClass("selected"); }
function go_0307(){ $("#0300d").toggle(); $("#0300d").toggleClass("selected2"); $("#0307").toggleClass("selected"); }

function go_0400(){ $("#0400d").toggle(); $("#0400d").toggleClass("selected2"); $("#0400").toggleClass("selected"); }
function go_0401(){ $("#0400d").toggle(); $("#0400d").toggleClass("selected2"); $("#0401").toggleClass("selected"); }
function go_0402(){ $("#0400d").toggle(); $("#0400d").toggleClass("selected2"); $("#0402").toggleClass("selected"); }
function go_0403(){ $("#0400d").toggle(); $("#0400d").toggleClass("selected2"); $("#0403").toggleClass("selected"); }
function go_0404(){ $("#0400d").toggle(); $("#0400d").toggleClass("selected2"); $("#0404").toggleClass("selected"); }
function go_0405(){ $("#0400d").toggle(); $("#0400d").toggleClass("selected2"); $("#0405").toggleClass("selected"); }
function go_0406(){ $("#0400d").toggle(); $("#0400d").toggleClass("selected2"); $("#0406").toggleClass("selected"); }


