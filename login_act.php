<?php

session_start();

// エラーを出力する 
ini_set( 'display_errors', 1 );


//関数とパスワードの取得
include('function.php');
include('config.php');

$u_id = $_POST["u_id"];
$u_pw = $_POST["u_pw"];


//DB接続後のdb_connをもらう
$pdo = db_conn($database_name, $host, $user_id, $database_password);

//データ取得SQL作成
$sql = "SELECT * FROM gs_user_table WHERE u_id=:u_id AND life_log=0";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':u_id', $u_id, PDO::PARAM_STR);
// $stmt->bindValue(':u_pw', $u_pw, PDO::PARAM_STR);
$status = $stmt->execute();

//確認
if ($status == false) {
    sql_error($stmt);
}

//データの取得
$val = $stmt->fetch();

$pw = password_verify($lpw,$val["u_pw"]);
if($pw==true){
    $_SESSION["chk_ssid"]=session_id();
    $_SESSION["kanri_flg"]=$val['kanri_flg'];
    $_SESSION["name"]=$val['name'];

    redirect("select.php");
}else{
    redirect("login.php");
}

exit();
