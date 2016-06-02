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
<?php mainBreadcrumb('テンポラリー管理'); ?>

<div class="row-fluid">

	<div class="page-header text-center">
		<h1><span class="icon-credit-card fw"></span>&nbsp;テンポラリーカード管理</h1>
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
				<form action="func_contents.php" name="F_tempo" method="POST" class="form-horizontal">
<?php
	if (isset($_GET['borrow'])) {
			echo <<<EOT
					<div class="alert alert-success">
						この申請は<strong>発行申請</strong>です。
					</div>
					<div class="control-group">
						<label class="control-label">入館証番号 ※入館証番号は必ずご確認ください。</label>
						<div class="controls">
							<p class="">
								<span class="label label-success">
									貸出申請：カード番号
								</span>
								<strong><span class="label label-success">
								{$_GET['borrow']}
								</span></strong>
							</p>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">貸与者Sコード入力</label>
						<div class="controls">
							<input class="input-xlarge focused" id="F_scode" name="F_scode" type="text" pattern="^[0-9A-Za-z]+$" required>
							<span class="help-inline"><small>半角英数のみ</small></span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">氏名入力</label>
						<div class="controls">
							<input class="input-xlarge" id="F_sname" name="F_sname" type="text" required>
							<span class="help-inline"><small>（例：竜巧社花子　※苗字名前は空白無しで全角日本語漢字入力でお願いします。）</small></span>
						</div>
					</div>
					<div class="form-actions">
						<input type="hidden" name="submitborrow" value="{$_GET['borrow']}">
						<button type="submit" name="submit_borrow" value="{$_GET['borrow']}" class="btn btn-primary" onclick="return confirm('よろしいですか？');">申請する</button>
						<span class="help-inline"><small>テンポラリーの管理申請は管理者承認が必要です</small></span>
						<a href="./temporary.php" class="btn btn-danger">キャンセル（戻る）</a>
					</div>
EOT;
	}elseif (isset($_GET['return'])) {
			echo <<<EOT
					<div class="alert alert-block">
						この申請は<strong>返却申請</strong>です。
					</div>
					<div class="control-group">
						<label class="control-label">入館証番号 ※入館証番号は必ずご確認ください。</label>
						<div class="controls">
							<p class="">
								<span class="label label-warning">
									貸出申請：カード番号
								</span>
								<strong><span class="label label-warning">
								{$_GET['return']}
								</span></strong>
							</p>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">貸与者Sコード確認</label>
						<div class="controls">
							<input class="input-xlarge disabled" readonly id="F_scode" name="F_scode" type="text" value="{$_GET['scode']}" pattern="^[0-9A-Za-z]+$" required>
							<span class="help-inline"><small>半角英数のみ</small></span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">氏名確認</label>
						<div class="controls">
							<input class="input-xlarge disabled" readonly id="F_sname" name="F_sname" type="text" value="{$_GET['sname']}" required>
						</div>
					</div>
					<div class="form-actions">
						<input type="hidden" name="submitreturn" value="{$_GET['return']}">
						<button type="submit" name="submit_return" value="{$_GET['return']}" class="btn btn-primary" onclick="return confirm('よろしいですか？');">申請する</button>
						<span class="help-inline"><small>テンポラリーの管理申請は管理者承認が必要です</small></span>
						<a href="./temporary.php" class="btn btn-danger">キャンセル（戻る）</a>
					</div>
EOT;
	}elseif (isset($_GET['change'])) {
			echo <<<EOT
					<div class="alert alert-info">
						この操作は<strong>編集</strong>です。
					</div>
					<div class="control-group">
						<label class="control-label">入館証番号 ※入館証番号は必ずご確認ください。</label>
						<div class="controls">
							<p class="">
								<span class="label label-info">
									貸出申請：カード番号
								</span>
								<strong><span class="label label-info">
								{$_GET['change']}
								</span></strong>
							</p>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">貸与者Sコード編集</label>
						<div class="controls">
							<input class="input-xlarge focused" id="F_scode" name="F_scode" type="text" value="{$_GET['scode']}" pattern="^[0-9A-Za-z]+$" required>
							<span class="help-inline"><small>半角英数のみ</small></span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">氏名編集</label>
						<div class="controls">
							<input class="input-xlarge" id="F_sname" name="F_sname" type="text" value="{$_GET['sname']}" required>
							<span class="help-inline"><small>（例：竜巧社花子　※苗字名前は空白無しで全角日本語漢字入力でお願いします。）</small></span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">ステータス変更</label>
						<div class="controls">
							<select id="F_status" name="F_status" data-rel="chosen" rel="chosen">
								</OPTGROUP>
								<OPTGROUP label="利用">
									<option value="1">利用承認待ち</option>
									<option value="2">使用中</option>
								</OPTGROUP>
								<OPTGROUP label="返却">
									<option value="3">返却申請待ち</option>
								</OPTGROUP>
								<OPTGROUP label="禁止">
									<option value="4">利用禁止</option>
								</OPTGROUP>
							</select>
						</div>
					</div>
					<div class="form-actions">
						<input type="hidden" name="submitchange" value="{$_GET['change']}">
						<button type="submit" name="submit_change" value="{$_GET['change']}" class="btn btn-primary" onclick="return confirm('よろしいですか？');">編集する</button>
						<a href="./temporary.php" class="btn btn-danger">キャンセル（戻る）</a>
						<span class="help-inline"><small>no userにする場合は返却申請待ち状態にし、その後返却確認を実行してください。</small></span>
					</div>
EOT;
	}else{
		header("Location:contents/temporary.php?id=none");
	}
?>
				</form>
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

<script>
	document.getElementById('F_tmpcardno').focus();
</script>



<!-- ↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑ -->
<!-- custum -->
<?php mainContentEnd(); ?>


<?php mainEnd(); ?>



<?php mainFooter(); ?>

<?php mainHtmlFooter(); ?>
