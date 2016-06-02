<?php
include_once dirname(__FILE__)."/../include/functions.php";
//queris and more...

$todayNow = date("Y-m-d H:i:s");
$adminN = $_SESSION['staff_mail'];

$log_sql = "INSERT INTO card_logs(admin_card_no,action_user_name,card_actions,daytime,others) VALUES";

//FROM temporary_func.php
//↓↓↓↓↓↓↓↓↓↓↓↓↓

//００　NO-USE



//０１　利用承認待ち/承認
if (isset($_POST['submit_borrow'])) {
    $scode = $_POST['F_scode'];
    $sname = $_POST['F_sname'];
    $borrow_no = $_POST['submitborrow'];
    $sql_01 = <<<EOT
        UPDATE  tmp_card_manage
        SET     s_name = '{$sname}',
                s_code = '{$scode}',
                status = 1
        WHERE   admin_card_no = '{$borrow_no}';
EOT;

    $result = mysqlConSql($sql_01);
        mysqlConSql($log_sql."('{$borrow_no}','{$adminN}','{$scode}[{$sname}] has applied for a card lending','{$todayNow}','')");
    header("Location:./temporary.php?borrow=booking");
    exit();
}

if (isset($_POST['borrow_ok'])) {
    $borrow_no = $_POST['borrow_ok'];
    $sql_02 = <<<EOT
        UPDATE  tmp_card_manage
        SET     status = 2
        WHERE   admin_card_no = '{$borrow_no}';
EOT;

    $result = mysqlConSql($sql_02);
        mysqlConSql($log_sql."('{$borrow_no}','{$adminN}','It was lending permit','{$todayNow}','')");
    header("Location:./temporary.php?borrow=ok");
    exit();
}


//０２　使用中/変更

if (isset($_POST['submit_change'])) {
    $scode      = $_POST['F_scode'];
    $sname      = $_POST['F_sname'];
    $status     = $_REQUEST['F_status'];
    $change_no = $_POST['submitchange'];
    $sql_05 = <<<EOT
        UPDATE  tmp_card_manage
        SET     s_name = '{$sname}',
                s_code = '{$scode}',
                status = '{$status}'
        WHERE   admin_card_no = '{$change_no}';
EOT;

    $result = mysqlConSql($sql_05);
    mysqlConSql($log_sql."('{$change_no}','{$adminN}','Changing the status of the card to {$status} {$scode}[{$sname}] utilizing','{$todayNow}','')");
    header("Location:./temporary.php?change=ok");
    exit();
}


//０３　返却確認待ち/承認
if (isset($_POST['submit_return'])) {
    $scode = $_POST['F_scode'];
    $sname = $_POST['F_sname'];
    $return_no = $_POST['submitreturn'];
    $sql_03 = <<<EOT
        UPDATE  tmp_card_manage
        SET     status = 3
        WHERE   admin_card_no = '{$return_no}';
EOT;

    $result = mysqlConSql($sql_03);
    mysqlConSql($log_sql."('{$return_no}','{$adminN}','{$scode}[{$sname}] issued a return application of the card which you are using
','{$todayNow}','')");
    header("Location:./temporary.php?return=booking");
    exit();
}

if (isset($_POST['return_ok'])) {
    $return_no = $_POST['return_ok'];
    $sql_04 = <<<EOT
        UPDATE  tmp_card_manage
        SET     s_name = NULL,
                s_code = NULL,
                status = 0
        WHERE   admin_card_no = '{$return_no}';
EOT;

    $result = mysqlConSql($sql_04);
    mysqlConSql($log_sql."('{$return_no}','{$adminN}','Return was confirmed','{$todayNow}','')");
    header("Location:./temporary.php?return=ok");
    exit();
}

//０４　利用禁止


//０５　その他



//↑↑↑↑↑↑↑↑↑↑↑↑↑
//END temporary_func.php



//FROM index.php
//↓↓↓↓↓↓↓↓↓↓↓↓↓

//login

if (isset($_POST['submit_login'])) {
    $staff_mail = $_POST['F_email'];
    $staff_pass = $_POST['F_pass'];
    $result = mysqlConSql("SELECT * FROM emp WHERE auth = 0");
    while ($row =$result->fetch_assoc()) {
        if ($staff_mail == $row['Name'] && crypt($staff_pass,$row['pass']) == $row['pass']) {
            $_SESSION['staff_mail'] = $row['Name'];
            $_SESSION['staff_id'] = $row['No'];
            $_SESSION['auth'] = $row['auth'];
            $_SESSION['login'] = 'ok';

            header("Location:{$rpsc}index.php");
            exti();
        }
    }
    header("Location:{$rpsc}index.php?login=ng");
    exit();
}

//login
if (isset($_POST['submit_loout'])) {
    $_SESSION = array();
    if (isset($_COOKIE["PHPSESSID"])) {
        setcookie("PHPSESSID", '', time() - 1800, '/');
    }
    setcookie("visited", $count, time() - 1800);
    session_destroy();
    header("Location:{$rpsc}index.php?logout=ok");
}

//↑↑↑↑↑↑↑↑↑↑↑↑↑
//END index.php













