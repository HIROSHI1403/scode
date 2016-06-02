<?php
include_once dirname(__FILE__)."/../functions.php";

function mainHeader(){
	echo <<<EOT
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="index.php"><span>RNW SCODE SYS</span></a>
				<div class="nav-no-collapse header-nav">

				</div>

			</div>
		</div>
	</div>
EOT;

}

function mainNav(){
	echo<<<EOT
		<div id="sidebar-left" class="span2">
			<div class="nav-collapse sidebar-nav">
				<ul class="nav nav-tabs nav-stacked main-menu">
					<li><a href="./index.php"><i class="icon-home fw"></i><span class="hidden-tablet"> トップ</span></a></li>
					<li><a href="./temporary.php"><i class="icon-credit-card fw"></i><span class="hidden-tablet"> テンポラリー発行</span></a></li>
					<li><a href="#"><i class="icon-book fw"></i><span class="hidden-tablet"> 書籍</span></a></li>
					<li><a href="./waiting.php"><i class="icon-user fw"></i><span class="hidden-tablet"> 待機関連</span></a></li>
				</ul>
			</div>
		</div>
EOT;
}

function mainFooter(){
	echo<<<EOT
		<footer>

			<p>
				<span style="text-align:left;float:left"><a href="http://ryukoshanw.co.jp/">RYUKOSHA NETWARE </a>Inc.</span>
			</p>

		</footer>
EOT;
}

function mainNoJS(){
	echo<<<EOT
		<noscript>
			<div class="alert alert-block span10">
				<h4 class="alert-heading">Warning!</h4>
				<p>JavascriptがOFFになっているため表示エラーが発生しています。 <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> お使いのページのJavascriptを利用できるように設定してください。</p>
			</div>
		</noscript>
EOT;
}

function mainStart(){
	echo<<<EOT
		<div class="container-fluid-full">
			<div class="row-fluid">
EOT;
}

function mainEnd(){
	echo<<<EOT
			</div>
		</div>
EOT;
}

function mainContentStart(){
	echo<<<EOT
		<div id="content" class="span10">
EOT;
}

function mainContentEnd(){
	echo<<<EOT
		</div>
EOT;
}

function mainContent(){
	echo<<<EOT
		
EOT;
}

function mainBreadcrumb($str){
	if (empty($str)) {
		$str = '#none page name';
	}
	if ($_SESSION['auth']==='0') {
		echo<<<EOT
		<ul class="breadcrumb">
			<li>
				<i class="icon-home"></i>
				<a href="index.php">Home</a>
				<i class="icon-angle-right"></i>
			</li>
			<li><a href="#">{$str}</a></li>
			<li class="red" style="text-shadow:none"><i class="icon-angle-right"></i><strong>管理者でログイン中</strong></li>
		</ul>
EOT;
	}else{
		echo<<<EOT
		<ul class="breadcrumb">
			<li>
				<i class="icon-home"></i>
				<a href="index.php">Home</a>
				<i class="icon-angle-right"></i>
			</li>
			<li><a href="#">{$str}</a></li>
		</ul>
EOT;
	}
}
