<?php

include_once dirname(__FILE__)."/../constant.php";

function mainHtmlHead(){
	echo<<<EOT
	<!DOCTYPE html>
	<html>
		<head>
			<!-- start: Meta -->
			<meta charset="utf-8">
			<title>{$GLOBALS['title']}</title>
			<meta name="description" content="well come rnw portal site">
			<meta name="author" content="hiroshi ishimaru tel:09082234756">
			<meta name="keyword" content="rnw portal site of secure">
			<!-- end: Meta -->
			<!-- start: Mobile Specific -->
			<meta name="viewport" content="width=device-width,user-scalable=no">
			<!-- end: Mobile Specific -->
			<!-- start: CSS -->
			<link id="bootstrap-style" href="../css/bootstrap.min.css" rel="stylesheet">
			<link href="../css/bootstrap-responsive.min.css" rel="stylesheet">
			<link id="base-style" href="../css/style.css" rel="stylesheet">
			<link id="base-style-responsive" href="../css/style-responsive.css" rel="stylesheet">
			<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
			<!-- end: CSS -->
			<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
			<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<link id="ie-style" href="../css/ie.css" rel="stylesheet">
			<![endif]-->
			<!--[if IE 9]>
				<link id="ie9style" href="../css/ie9.css" rel="stylesheet">
			<![endif]-->
			<link rel="shortcut icon" href="../img/favicon.ico">
		</head>
		<body>
EOT;
}

function mainHtmlFooter($tableid){
	echo <<<EOT
			<!-- start: JavaScript-->
			<script src="../js/jquery-1.9.1.min.js"></script>
			<script src="../js/jquery-migrate-1.0.0.min.js"></script>
			<script src="../js/jquery-ui-1.10.0.custom.min.js"></script>
			<script src="../js/jquery.ui.touch-punch.js"></script>
			<script src="../js/modernizr.js"></script>
			<script src="../js/bootstrap.min.js"></script>
			<script src="../js/jquery.cookie.js"></script>
			<script src='../js/fullcalendar.min.js'></script>
			<script src='../js/jquery.dataTables.min.js'></script>
			<script src="../js/excanvas.js"></script>
			<script src="../js/jquery.flot.js"></script>
			<script src="../js/jquery.flot.pie.js"></script>
			<script src="../js/jquery.flot.stack.js"></script>
			<script src="../js/jquery.flot.resize.min.js"></script>
			<script src="../js/jquery.chosen.min.js"></script>
			<script src="../js/jquery.uniform.min.js"></script>
			<script src="../js/jquery.cleditor.min.js"></script>
			<script src="../js/jquery.noty.js"></script>
			<script src="../js/jquery.elfinder.min.js"></script>
			<script src="../js/jquery.raty.min.js"></script>
			<script src="../js/jquery.iphone.toggle.js"></script>
			<script src="../js/jquery.uploadify-3.1.min.js"></script>
			<script src="../js/jquery.gritter.min.js"></script>
			<script src="../js/jquery.imagesloaded.js"></script>
			<script src="../js/jquery.masonry.min.js"></script>
			<script src="../js/jquery.knob.modified.js"></script>
			<script src="../js/jquery.sparkline.min.js"></script>
			<script src="../js/counter.js"></script>
			<script src="../js/retina.js"></script>
			<script src="../js/custom.js"></script>
			<script src="../js/custom2.js"></script>
			<!-- end: JavaScript-->
			<script>
				$(document).ready(function(){
					$('#{$tableid}').dataTable();
				});
				$(document).ready(function() {
					$('#inputPass,#inputPassRe').keyup(function(){
						if ($('#inputPass').val() == "" || $('#inputPassRe').val() == "") {
							$('#pass_help').text('passwordは必須です。');
							$('#passChk').removeClass('success');
							$('#passChk').addClass('error');
						}else{
							if ($('#inputPass').val() == $('#inputPassRe').val()) {
								$('#pass_help').text('一致しました。');
								$('#passChk').removeClass('error');
								$('#passChk').addClass('success');
							}else{
								$('#pass_help').text('一致していません。');
								$('#passChk').removeClass('success');
								$('#passChk').addClass('error');
							}
						}
					});
				});
			</script>
			<script>
				(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
				})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

				ga('create', 'UA-69411917-1', 'auto');
				ga('send', 'pageview');

			</script>
		</body>
	</html>
EOT;
}