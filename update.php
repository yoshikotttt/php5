<?php

include('function.php');
include('config.php');

//POSTでデータ取得
$salon = $_POST["salon"];
$stylist = $_POST["stylist"];
$star = $_POST["star"];
$comment = $_POST["comment"];
$id = $_POST["id"];

//DB接続後のdb_connをもらう
$pdo = db_conn($database_name,$host,$user_id,$database_password);
$sql = "UPDATE $table_name SET salon=:salon,stylist=:stylist,star=:star,comment=:comment WHERE id=:id;";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':salon',  $salon,    PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':stylist',$stylist,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':star',   $star,     PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':comment',$comment,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id',     $id,       PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)

$status = $stmt->execute(); //実行

//４．データ登録処理後
if($status==false){
    sql_error($stmt); //関数sql_errorを実行
}else{
    redirect("log.php");
}


