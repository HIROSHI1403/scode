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
<?php mainBreadcrumb('テンポラリー発行'); ?>

<div class="row-fluid">

	<div class="page-header text-center">
		<h1><span class="icon-credit-card fw"></span>&nbsp;テンポラリーカード関連</h1>
	</div>

</div>

<div class="row-fluid">

	<div class="box span12">
		<div class="box-header">
			<h2><i class="icon-credit-card fw"></i><span class="break"></span>テンポラリー管理</h2>
			<div class="box-icon">
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
			</div>
		</div>
		<div class="box-content">
			<div class="row-fluid">
				<table class="table table-striped table-bordered bootstrap-datatable datatable dataTable">
					<thead>
						<tr>
							<th>入館証#</th>
							<th>貸与者Sコード</th>
							<th>貸与者名</th>
							<th>ステータス</th>
							<th>アクション</th>
						</tr>
					</thead>
					<tbody>
<?php
$tmp_result = mysqlConSql("SELECT * FROM tmp_card_manage;");
while ($tmp_row = $tmp_result->fetch_assoc()) {
	$status_str = "";

	if ($_SESSION['auth'] === '0') {
	switch ($tmp_row['status']) {
		case 0:
			echo <<<EOT
						<tr>
							<td><strong>{$tmp_row['admin_card_no']}</strong></td>
							<td>{$tmp_row['s_code']}</td>
							<td>{$tmp_row['s_name']}</td>
							<td>
								no use
							</td>
							<td>
								<form action="./temporary_func.php" method="GET" class="marginB-none">
									<input type="hidden" name="scode" value="{$tmp_row['s_code']}">
									<input type="hidden" name="sname" value="{$tmp_row['s_name']}">
									<input type="hidden" name="status" value="{$tmp_row['status']}">
									<button type="submit" name="borrow" value="{$tmp_row['admin_card_no']}" class="btn btn-success"><i class="icon-signin fw"></i>&nbsp;発行申請</button>
									<button type="submit" name="change" value="{$tmp_row['admin_card_no']}" class="btn btn-info"><i class="icon-retweet fw"></i>&nbsp;変更</button>
								</form>
							</td>
						</tr>
EOT;
			break;
		case 1:
			echo <<<EOT
						<tr>
							<td><strong>{$tmp_row['admin_card_no']}</strong></td>
							<td>{$tmp_row['s_code']}</td>
							<td>{$tmp_row['s_name']}</td>
							<td><span class="label label-warning">利用承認待ち</span></td>
							<td>
								<form action="./func_contents.php" method="POST" class="marginB-none">
									<button class="btn" type="submit" name="borrow_ok" value="{$tmp_row['admin_card_no']}" >利用承認</button>
									<button type="submit" name="change" value="{$tmp_row['admin_card_no']}" class="btn btn-info"><i class="icon-retweet fw"></i>&nbsp;変更</button>
								</form>
							</td>
						</tr>
EOT;
			break;
		case 2:
			echo <<<EOT
						<tr>
							<td><strong>{$tmp_row['admin_card_no']}</strong></td>
							<td>{$tmp_row['s_code']}</td>
							<td>{$tmp_row['s_name']}</td>
							<td>
								<span class="label label-info">使用中</span>
							</td>
							<td>
								<form action="./temporary_func.php" method="GET" class="marginB-none">
									<input type="hidden" name="scode" value="{$tmp_row['s_code']}">
									<input type="hidden" name="sname" value="{$tmp_row['s_name']}">
									<input type="hidden" name="status" value="{$tmp_row['status']}">
									<button type="submit" name="return" value="{$tmp_row['admin_card_no']}" class="btn btn-warning"><i class="icon-signout fw"></i>&nbsp;返却申請</button>
									<button type="submit" name="change" value="{$tmp_row['admin_card_no']}" class="btn btn-info"><i class="icon-retweet fw"></i>&nbsp;変更</button>
								</form>
							</td>
						</tr>
EOT;
			break;
		case 3:
			echo <<<EOT
						<tr>
							<td><strong>{$tmp_row['admin_card_no']}</strong></td>
							<td>{$tmp_row['s_code']}</td>
							<td>{$tmp_row['s_name']}</td>
							<td>
								<span class="label">返却確認待ち</span>
							</td>
							<td>
								<form action="./func_contents.php" method="POST" class="marginB-none">
									<button class="btn btn-danger" type="submit" name="return_ok" value="{$tmp_row['admin_card_no']}" >返却確認</button>
									<button type="submit" name="change" value="{$tmp_row['admin_card_no']}" class="btn btn-info"><i class="icon-retweet fw"></i>&nbsp;変更</button>
								</form>
							</td>
						</tr>
EOT;
			break;
		case 4:
			echo <<<EOT
						<tr>
							<td><strong>{$tmp_row['admin_card_no']}</strong></td>
							<td>{$tmp_row['s_code']}</td>
							<td>{$tmp_row['s_name']}</td>
							<td>
								<span class="label label-important">禁止</span>
							</td>
							<td>
								<form action="./temporary_func.php" method="GET" class="marginB-none">
									<button type="submit" name="change" value="{$tmp_row['admin_card_no']}" class="btn btn-info"><i class="icon-retweet fw"></i>&nbsp;変更</button>
								</form>
							</td>
						</tr>
EOT;
			break;
		default:
			echo <<<EOT
						<tr>
							<td><strong>{$tmp_row['admin_card_no']}</strong></td>
							<td>{$tmp_row['s_code']}</td>
							<td>{$tmp_row['s_name']}</td>
							<td>{$tmp_row['status']}</td>
							<td>
								<form action="./temporary_func.php" method="GET" class="marginB-none">
									<button type="submit" name="change" value="{$tmp_row['admin_card_no']}" class="btn btn-info"><i class="icon-retweet fw"></i>&nbsp;変更</button>
								</form>
							</td>
						</tr>
EOT;
			break;
	}
	}else{
	switch ($tmp_row['status']) {
		case 0:
			echo <<<EOT
						<tr>
							<td><strong>{$tmp_row['admin_card_no']}</strong></td>
							<td>{$tmp_row['s_code']}</td>
							<td>{$tmp_row['s_name']}</td>
							<td>
								no use
							</td>
							<td>
								<form action="./temporary_func.php" method="GET" class="marginB-none">
									<input type="hidden" name="scode" value="{$tmp_row['s_code']}">
									<input type="hidden" name="sname" value="{$tmp_row['s_name']}">
									<input type="hidden" name="status" value="{$tmp_row['status']}">
									<button type="submit" name="borrow" value="{$tmp_row['admin_card_no']}" class="btn btn-success"><i class="icon-signin fw"></i>&nbsp;発行申請</button>
								</form>
							</td>
						</tr>
EOT;
			break;
		case 1:
			echo <<<EOT
						<tr>
							<td><strong>{$tmp_row['admin_card_no']}</strong></td>
							<td>{$tmp_row['s_code']}</td>
							<td>{$tmp_row['s_name']}</td>
							<td><span class="label label-warning">利用承認待ち</span></td>
							<td>
								Please wait for a little while...
							</td>
						</tr>
EOT;
			break;
		case 2:
			echo <<<EOT
						<tr>
							<td><strong>{$tmp_row['admin_card_no']}</strong></td>
							<td>{$tmp_row['s_code']}</td>
							<td>{$tmp_row['s_name']}</td>
							<td>
								<span class="label label-info">使用中</span>
							</td>
							<td>
								<form action="./temporary_func.php" method="GET" class="marginB-none">
									<input type="hidden" name="scode" value="{$tmp_row['s_code']}">
									<input type="hidden" name="sname" value="{$tmp_row['s_name']}">
									<input type="hidden" name="status" value="{$tmp_row['status']}">
									<button type="submit" name="return" value="{$tmp_row['admin_card_no']}" class="btn btn-warning"><i class="icon-signout fw"></i>&nbsp;返却申請</button>
								</form>
							</td>
						</tr>
EOT;
			break;
		case 3:
			echo <<<EOT
						<tr>
							<td><strong>{$tmp_row['admin_card_no']}</strong></td>
							<td>{$tmp_row['s_code']}</td>
							<td>{$tmp_row['s_name']}</td>
							<td>
								<span class="label">返却確認待ち</span>
							</td>
							<td>
								Please wait for a little while...
							</td>
						</tr>
EOT;
			break;
		case 4:
			echo <<<EOT
						<tr>
							<td><strong>{$tmp_row['admin_card_no']}</strong></td>
							<td>{$tmp_row['s_code']}</td>
							<td>{$tmp_row['s_name']}</td>
							<td>
								<span class="label label-important">禁止</span>
							</td>
							<td>
								Other action is not allowed.
							</td>
						</tr>
EOT;
			break;
		default:
			echo <<<EOT
						<tr>
							<td><strong>{$tmp_row['admin_card_no']}</strong></td>
							<td>{$tmp_row['s_code']}</td>
							<td>{$tmp_row['s_name']}</td>
							<td>{$tmp_row['status']}</td>
							<td>
								Other action is not allowed.
							</td>
						</tr>
EOT;
			break;
	}
	}
}
?>
					</tbody>
				</table>

			</div>

			<div class="row-fluid">


			</div>
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
