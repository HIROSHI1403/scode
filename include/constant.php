<?php

//rnw_root_paas
// $rp 	= 'http://www.ryukoshanw.co.jp/';
$rp     = 'http://192.168.1.119/';
//rnw_portal_root_pass
// $rps	= $rp.'staff_only/';
$rps	= $rp.'scode/';
// $rpsc	= $rp.'staff_only/contents/';
$rpsc	= $rp.'scode/contents/';
// $rps	= $rp.'portal/';
//REFERER
$ref	= $_SERVER["HTTP_REFERER"];

$title 	= 'RNW SCODE SYS';

$t_stamp = date("Y-m-d H:i:s");
$t_stamp_ymd = date("Y-m-d");


//for card_logs

$card_log[] = 'NULL';
$card_log[] = '利用認証待ち申請';
$card_log[] = '利用承認';
$card_log[] = '返却確認待ち申請';
$card_log[] = '返却確認';
$card_log[] = '利用禁止';
$card_log[] = '利用禁止解除';
$card_log[] = '返却確認';

