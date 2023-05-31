<?php

include('function.php');
include('config.php');

//idをpostで取得
$id = $_POST["id"];

//DB接続して、
$pdo = db_conn($database_name,$host,$user_id,$database_password);
$sql = "DELETE FROM $table_name WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行

//４．データ登録処理後
if($status==false){
    sql_error($stmt);
  }else{
    // echo '<script>';
    // echo 'alert("削除しました");';
    // echo 'window.location.href = "log.php";';
    // echo '</script>';
    redirect("log.php");
  }
