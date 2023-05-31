<?php

include('function.php');
include('config.php');

//DB接続後のdb_connをもらう
$pdo = db_conn($database_name, $host, $user_id, $database_password);

//データ取得SQL
$sql = "SELECT * FROM $table_name";
$stmt = $pdo->prepare($sql); //pdoの中のprepareメソッドでsqlを使える形に変換
$status = $stmt->execute(); //executeで実行すると、stmtの中身は実行結果になる

//データ取れたか確認
$values = "";
if ($status == false) {
    sql_error($stmt);
}

//全データ取得
$values =  $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]
// $json = json_encode($values, JSON_UNESCAPED_UNICODE);

// echo $json;
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>データ一覧</title>
    <style>
        body {
            background-color: #fdf7ee;
          
        }

        .box {
            display: inline-block;
            border-radius: 5px;
            width: 300px;
            height: 80px;
            margin-bottom: 10px;
            background-color: #9f1446;
            padding: 10px;
        }

        h2 {
           margin: 0;
        }

        a {
            text-decoration: none;
            color: white;
            display: inline-block;
            width: 300px;
        }

        .wrapper {
            display: flex;
            flex-direction: column;
        }
        .atg a{
            color: #9f1446;
            text-decoration: none;
        }
    </style>
</head>

<body>
<div class="atg"><a href="index.php">TOP</a></div>
    <div class="wrapper">
        <table>
            <?php foreach ($values as $v) { ?>
                <tr>
                <!-- <h2><?=h($v["id"])?></h2> -->
                <a href="select.php?id=<?= $v["id"]?>">
                <div class="box">
                    <div class="title">お店：<?= h($v["salon"]) ?></div>
                    <div class="size">担当：<?= h($v["stylist"]) ?>さん</div>
                    <div class="date">★：<?= h($v["star"]) ?></div>
                </div>
                </tr>
                </a>
            <?php } ?>
        </table>
    </div>
</body>

</html>