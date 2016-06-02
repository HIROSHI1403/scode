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
<?php mainBreadcrumb('待機関連'); ?>

<div class="row-fluid">

	<div class="page-header text-center">
		<h1><span class="icon-credit-card fw"></span>&nbsp;待機関連</h1>
	</div>

</div>

<div class="row-fluid">

	<div class="box span12">
		<div class="box-header">
			<h2><i class="icon-group fw"></i><span class="break"></span>待機一覧</h2>
			<div class="box-icon">
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
			</div>
		</div>
		<div class="box-content">
			<table class="table table-bordered table-striped table-condensed datatable dataTable">
				<thead>
					<tr>
						<th>NAME＆OTHER</th>
						<th>OTHER</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							<div class="page-header">
								<h1 class="text-center">石丸弘志</h1>
							</div>
							<dl>
								<dt>入館証No.</dt>
								<dd>BI123456</dd>

								<dt>社員証No.</dt>
								<dd>s12345</dd>

								<dt>入（カード登録日）</dt>
								<dd>2016/06/01</dd>

								<dt>出（予定）</dt>
								<dd>
									<form action="" method="POST">
										<input type="date" name="" value="">
										<button type="submit" class="btn btn-mini btn-warning"><i class="icon-retweet"></i>&nbsp;&nbsp;&nbsp;更新</button>
									</form>
								</dd>
							</dl>
						</td>
						<td>
							<div class="row-fluid">
								<div class="span6">
									<dl class="dl-horizontal">
										<dt>メールアドレス関連</dt>
										<dd>
											<form action="" method="POST">
												<button type="submit" class="btn btn-mini btn-success"><i class="icon-ok"></i>&nbsp;&nbsp;&nbsp;完了</button>
											</form>
										</dd>

										<dt>MS研修</dt>
										<dd>
											<form action="" method="POST">
												<button type="submit" class="btn btn-mini btn-success"><i class="icon-ok"></i>&nbsp;&nbsp;&nbsp;完了</button>
											</form>
										</dd>

										<dt>トーマツ研修</dt>
										<dd>
											<form action="" method="POST">
												<button type="submit" class="btn btn-mini btn-success"><i class="icon-ok"></i>&nbsp;&nbsp;&nbsp;完了</button>
											</form>
										</dd>

										<dt>目標設定</dt>
										<dd>
											<form action="" method="POST">
												<button type="submit" class="btn btn-mini btn-success"><i class="icon-ok"></i>&nbsp;&nbsp;&nbsp;完了</button>
											</form>
										</dd>
									</dl>
								</div>
								<div class="span6">
									<dl class="dl-horizontal">
										<dt>課題１</dt>
										<dd>
											<form action="" method="POST">
												<button type="submit" class="btn btn-mini btn-danger"><i class="icon-sign-blank"></i>&nbsp;&nbsp;&nbsp;未完了</button>
											</form>
										</dd>

										<dt>課題２</dt>
										<dd>
											<form action="" method="POST">
												<button type="submit" class="btn btn-mini btn-danger"><i class="icon-sign-blank"></i>&nbsp;&nbsp;&nbsp;未完了</button>
											</form>
										</dd>

										<dt>課題３</dt>
										<dd>
											<form action="" method="POST">
												<button type="submit" class="btn btn-mini btn-danger"><i class="icon-sign-blank"></i>&nbsp;&nbsp;&nbsp;未完了</button>
											</form>
										</dd>
									</dl>
								</div>
								<div class="span12">
									<dl class="dl-horizontal">
										<dt>その他</dt>
										<dd>
											<form action="" method="POST">
												<div>
													<textarea class="wd90" name=""></textarea>
												</div>
												<div>
													<button type="submit" class="btn btn-mini btn-warning"><i class="icon-retweet"></i>&nbsp;&nbsp;&nbsp;更新</button>
												</div>
											</form>
										</dd>
									</dl>
								</div>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

</div>

<div class="row-fluid">

	<!-- <div class="box span12">
		<div class="box-header">
			<h2><i class="icon-link fw"></i><span class="break"></span>IIJ LINKS</h2>
			<div class="box-icon">
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
			</div>
		</div>
		<div class="box-content">
			<div class="row-fluid">


			</div>
		</div>
	</div> -->

</div>

<div class="row-fluid">

	

</div>





<!-- ↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑ -->
<!-- custum -->
<?php mainContentEnd(); ?>


<?php mainEnd(); ?>



<?php mainFooter(); ?>

<?php mainHtmlFooter(); ?>
