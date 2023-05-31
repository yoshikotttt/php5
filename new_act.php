<?php

include('function.php');
include('config.php');


//POSTでデータ取得
$u_name = $_POST["u_name"];
$u_id = $_POST["u_id"];
$u_pw = $_POST["u_pw"];
$life_flg = 1;


//DB接続後のdb_connをもらう
//$pdo は新しい設計図を依頼して得たデータベース接続の枠組みであり、
//$stmt はその枠組みを使って準備されたSQL文を実行するためのステートメント。
$pdo = db_conn($database_name,$host,$user_id,$database_password);
$stmt = $pdo->prepare("INSERT INTO kadai_user_table(u_name,u_id,u_pw,life_flg,indate)VALUES(:u_name,:u_id,:u_pw,:life_flg,sysdate())");
$stmt->bindValue(':u_name', $u_name,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':u_id',$u_id,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':u_pw', $u_pw,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':life_flg',$life_flg, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)

$status = $stmt->execute(); //実行

//４．データ登録処理後
if($status==false){
    sql_error($stmt); //関数sql_errorを実行
}else{
    redirect("login.php");
}
?>