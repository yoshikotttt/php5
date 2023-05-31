<?php

// エラーを出力する 
ini_set( 'display_errors', 1 );

//関数とパスワードの取得
include('function.php');
include('config.php');


//POSTでデータ取得
$salon = $_POST["salon"];
$stylist = $_POST["stylist"];
$star = $_POST["star"];
$comment = $_POST["comment"];

//DB接続後のdb_connをもらう
//$pdo は新しい設計図を依頼して得たデータベース接続の枠組みであり、
//$stmt はその枠組みを使って準備されたSQL文を実行するためのステートメントとなります。
$pdo = db_conn($database_name,$host,$user_id,$database_password);
$stmt = $pdo->prepare("INSERT INTO $table_name(salon,stylist,star,comment,indate)VALUES(:salon,:stylist,:star,:comment,sysdate())");
$stmt->bindValue(':salon', $salon,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':stylist',$stylist,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':star', $star,  PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':comment',$comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行

//４．データ登録処理後
if($status==false){
    sql_error($stmt); //関数sql_errorを実行
}else{
    redirect("index.php");
}
?>