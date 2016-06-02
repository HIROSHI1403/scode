<?php
ini_set('display_errors','Off');
session_start();
include_once dirname(__FILE__)."/constant.php";

//login mailadd add in cookies
//3days email timef

// session start check
// SESSION START CHECK
// if (preg_match("/login.php/", $_SERVER["REQUEST_URI"])){
// 	//none
// }elseif (preg_match("/chk.php/", $_SERVER["REQUEST_URI"])) {
// 	//none
// }elseif (preg_match("/logout.php/", $_SERVER["REQUEST_URI"])) {
// 	//none
// }else{
// 	if (empty($_SESSION)) {
// 		header("Location:{$rps}login.php?session=no");
// 	}
// }

//=========================
//functions
//=========================

function h($str){
	return htmlspecialchars($str,ENT_QUOTES,'UTF-8');
}

//MySQL connnections

function mysqlConSql($sqlstr){
	$link = new mysqli('localhost','root','','ryukoshanw_DB');
	if(!$link){
		die('接続できませんでした。'.mysql_error());
	}

	$result = $link->query($sqlstr);
	if (!$result) {
		die('クエリが失敗しました。');
	}

	return $result;
}


function mysqlDiscon(){
	$dislink = new mysqli('localhost','root','','ryukoshanw_DB');
	mysql_close($dislink);
}

function browserChk(){
	$ua = getenv('HTTP_USER_AGENT');
	return "{$ua}";
}

function dateNow(){
	$months     = date("m");
    $days       = date("d");
    $week		= date("(D)");
	return $months."/".$days.$week;
}

function adminChk(){
	if ($_SESSION['auth']==1) {
		echo<<<EOT
			<p class="red">このページは管理者のみ利用出来ます。直リンクは避けてください。</p>
EOT;
		mainContentEnd();
		mainEnd();
		mainFooter();
		mainHtmlFooter('');
		die();
	}elseif ($_SESSION['auth']==0) {
		//none
	}
}







