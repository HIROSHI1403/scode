<?php
	include_once dirname(__FILE__)."/../include/functions.php";
	include_once dirname(__FILE__)."/../include/templates/meta.php";
	include_once dirname(__FILE__)."/../include/templates/mainTemp.php";
?>
<?php mainHtmlHead(); ?>

<?php mainHeader(); ?>



<?php mainStart(); ?>

<?php mainNav(); ?>
<?php mainNoJS(); ?>


<?php mainContentStart(); ?>
<!-- custum -->
<!-- ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ -->
<?php mainBreadcrumb('トップ'); ?>

<div class="row-fluid">

	<div class="page-header text-center">
		<img src="../img/R-logo.png" class="img-responsive" style="height: 100px;">
		<h1><span class="icon-barcode"></span>&nbsp;RNW SCODE SYS&nbsp;<span class="icon-barcode"></span></h1>
		<p><small>竜巧社ネットウエア</small></p>
	</div>

</div>

<div class="row-fluid">

	<div class="box span12">
		<div class="box-header">
			<h2><i class="icon-barcode fw"></i><span class="break"></span>メインメニュー</h2>
			<div class="box-icon">
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
			</div>
		</div>
		<div class="box-content">
			<div class="row-fluid">

				<a class="quick-button metro yellow span4" href="./temporary.php">
					<i class="icon-credit-card fw"></i>
					<p><strong>テンポラリー発行</strong></p>
					<span class="badge">
<?php
$result_top = mysqlConSql("SELECT * FROM tmp_card_manage WHERE status = 1 or status = 2;");
$num_top = $result_top->num_rows;
if ($num_top > 0 ) {
}else{
	$num_top = 0;
}
echo $num_top.'人利用中';
?>
					</span>
				</a>

				<a class="quick-button metro yellow span4" href="#">
					<i class="icon-book fw"></i>
					<p><strong>書籍</strong></p>
					<!-- <span class="badge">ポータルトップ</span> -->
				</a>

				<a class="quick-button metro yellow span4" href="#">
					<i class="icon-user fw"></i>
					<p><strong>待機関連</strong></p>
					<!-- <span class="badge">ポータルトップ</span> -->
				</a>

			</div>

			<div class="row-fluid">

				<!-- <a class="quick-button metro blue span4" href="http://know-who.iij-group.jp/" target="_blank">
					<i class="icon-sitemap"></i>
					<p><strong>座席表</strong></p>
				</a>

				<a class="quick-button metro blue span4" href="https://cf.iij-group.jp/" target="_blank">
					<i class="icon-globe"></i>
					<p><strong>CF</strong></p>
				</a>

				<a class="quick-button metro blue span4" href="https://iijtube.iij-group.jp/" target="_blank">
					<i class="icon-facetime-video"></i>
					<p><strong>IIJ TUBE</strong></p>
				</a> -->

			</div>
		</div>
	</div>

</div>

<div class="row-fluid">

	<div class="box span12">
		<div class="box-header">
			<h2><i class="icon-link fw"></i><span class="break"></span>IIJ LINKS</h2>
			<div class="box-icon">
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
			</div>
		</div>
		<div class="box-content">
			<div class="row-fluid">

				<a class="quick-button metro green span2" href="https://gportal.iij-group.jp/" target="_blank">
					<i class="icon-dashboard"></i>
					<p><strong>ポータルトップ</strong></p>
					<!-- <span class="badge">ポータルトップ</span> -->
				</a>

				<a class="quick-button metro green span2" href="https://ohana.iij-group.jp/scheduler/" target="_blank">
					<i class="icon-calendar"></i>
					<p><strong>スケジュール</strong></p>
					<!-- <span class="badge">ポータルトップ</span> -->
				</a>

				<a class="quick-button metro green span2" href="https://ohana.iij-group.jp/reception/" target="_blank">
					<i class="icon-user"></i>
					<p><strong>来訪予約</strong></p>
					<!-- <span class="badge">ポータルトップ</span> -->
				</a>

				<a class="quick-button metro green span2" href="http://know-who.iij-group.jp/" target="_blank">
					<i class="icon-sitemap"></i>
					<p><strong>座席表</strong></p>
					<!-- <span class="badge">ポータルトップ</span> -->
				</a>

				<a class="quick-button metro green span2" href="https://cf.iij-group.jp/" target="_blank">
					<i class="icon-globe"></i>
					<p><strong>CF</strong></p>
					<!-- <span class="badge">ポータルトップ</span> -->
				</a>

				<a class="quick-button metro green span2" href="https://iijtube.iij-group.jp/" target="_blank">
					<i class="icon-facetime-video"></i>
					<p><strong>IIJ TUBE</strong></p>
					<!-- <span class="badge">ポータルトップ</span> -->
				</a>

			</div>
		</div>
	</div>

</div>

<div class="row-fluid">

<?php
	$result = mysqlConSql("SELECT * FROM tmp_card_manage WHERE status = 1 or status =3;");
	$num = $result->num_rows;
	if ($num > 0 ) {
	}else{
		$num = 0;
	}

	$ip = $_SERVER["REMOTE_ADDR"];

	if ($_SESSION['auth'] === '0') {
		echo <<<EOT
	<div class="box red span12">
		<div class="box-header">
			<h2><i class="icon-lock fw"></i><span class="break"></span>FOR ADMIN</h2>
			<div class="box-icon">
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
			</div>
		</div>
		<div class="box-content">
			<div class="row-fluid">

				<form action="func_contents.php" method="POST" name="F_logout" id="F_logout" class="form-horizontal">
					<div class="form-actions">
						<button type="submit" name="submit_loout" value="{$ip}" class="btn btn-danger">ログアウト</button>
						<span class="help-inline"><small>{$num}人の申請者が居ます。</small></span>
					</div>
				</form>

			</div>
		</div>
	</div>

EOT;
	}
	if(empty($_SESSION) or $_SESSION['auth'] === '1'){
		echo <<<EOT
	<div class="box span12">
		<div class="box-header">
			<h2><i class="icon-lock fw"></i><span class="break"></span>FOR ADMIN</h2>
			<div class="box-icon">
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
			</div>
		</div>
		<div class="box-content">
			<div class="row-fluid">

				<form action="func_contents.php" method="POST" name="F_login" id="F_login" class="form-horizontal">
					<div class="control-group">
						<label class="control-label">ADMIN EMAIL</label>
						<div class="controls">
							<input class="input-xlarge focused" id="F_email" name="F_email" type="email" required placeholder="yourmail@mail.com">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">PASS WORD</label>
						<div class="controls">
							<input class="input-xlarge" id="F_pass" name="F_pass" type="password" required placeholder="your password">
						</div>
					</div>
					<div class="form-actions">
						<button type="submit" name="submit_login" value="{$ip}" class="btn btn-primary">ログイン</button>
						<span class="help-inline"><small>{$num}人の申請者が居ます。</small></span>
					</div>
				</form>

			</div>
		</div>
	</div>

EOT;
	}
?>


</div>





<!-- ↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑ -->
<!-- custum -->
<?php mainContentEnd(); ?>


<?php mainEnd(); ?>



<?php mainFooter(); ?>

<?php mainHtmlFooter(); ?>
