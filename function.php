<?php

//接続用
function db_conn($database_name,$host,$user_id,$database_password){
try {
    return  new PDO("mysql:dbname={$database_name};charset=utf8;host={$host}", $user_id, $database_password); //$pdoにデータが入ってくる
  } catch (PDOException $e) {
      exit('DBConnectError:' . $e->getMessage());
  }
}

// function db_conn(){
//     try {
//         $db_name = "gs_db3";    //データベース名
//         $db_id   = "root";      //アカウント名
//         $db_pw   = "root";          //パスワード
//         $db_host = "localhost"; //DBホスト
//         return new PDO('mysql:dbname='.$db_name.';charset=utf8;host='.$db_host, $db_id, $db_pw);
//     } catch (PDOException $e) {
//         exit('DB Connection Error:'.$e->getMessage());
//     }
//     }


//SQLエラー関数：sql_error($stmt)
function sql_error($stmt){  //$stmtもらってこないと空っぽ
    $error = $stmt->errorInfo();
    exit("SQLError:".$error[2]);
    }



//リダイレクト関数: redirect($file_name)
function redirect($page){
    header("Location:".$page);
    exit();
}

//XSS
function h($val){
    return  htmlspecialchars($val,ENT_QUOTES);
    }
