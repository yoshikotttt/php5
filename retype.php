<?php

include('function.php');
include('config.php');

$target_id = $_GET["id"];

//DB接続後のdb_connをもらう
$pdo = db_conn($database_name, $host, $user_id, $database_password);

//データ取得SQL作成
$sql = "SELECT * FROM $table_name WHERE id=:target_id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':target_id', $target_id, PDO::PARAM_INT);
$status = $stmt->execute();

//確認
$values = "";
if ($status == false) {
    sql_error($stmt);
}

//データ取得 
$v = $stmt->fetch();
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>更新</title>
    <style>
        body {
            background-color: #fdf7ee;
        }

        .atg a {
            color: #9f1446;
            text-decoration: none;
        }

        body {
            background-color: #f6e5d7;
            color: #454552;

        }

        input {
            font-size: 22px;
        }

        .box1 input {
            width: 300px;

        }


        .box3 {
            display: flex;
            flex-direction: column;
        }

        .box3 input {
            width: 150px;
        }




        .box2 input {
            width: 150px;
        }

        .nice-textbox {
            border: none;
            border-radius: 5px;
            height: 40px;
            color: #a0a0a0;
            outline: none;
        }

        .box4 textarea {
            width: 350px;
            margin-bottom: 20px;
            outline: none;
            border: none;
            border-radius: 5px;
            color: #a0a0a0;
        }

        .atg a {
            color: #E85A70;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="atg"><a href="index.php">TOP</a></div>
    <div class="wrapper">
        <form action="update.php" method="post">
            <div class="box1">
                <h2>店名</h2>
                <input class="nice-textbox" type="text" name="salon" value="<?= $v["salon"] ?>">
            </div>
            <div class="box2">
                <h2>担当</h2>
                <input class="nice-textbox" type="text" name="stylist" value="<?= $v["stylist"] ?>">
            </div>
           
                <h2>評価⭐️</h2>
                <h3>（前回：★<?= $v["star"] ?>）</h3>
                <input type="radio" name="star" id="1" value="1"<?= ($v["star"] == 1) ? "checked" : "" ?>>1
                <input type="radio" name="star" id="2" value="2"<?= ($v["star"] == 2) ? "checked" : "" ?>>2
                <input type="radio" name="star" id="3" value="3"<?= ($v["star"] == 3) ? "checked" : "" ?>>3
                <input type="radio" name="star" id="4" value="4"<?= ($v["star"] == 4) ? "checked" : "" ?>>4
                <input type="radio" name="star" id="5" value="5"<?= ($v["star"] == 5) ? "checked" : "" ?>>5
           
            <div class="box4">
                <h2>コメント</h2>
                <textarea name="comment" rows="10" cols="50"><?= $v["comment"] ?></textarea>
            </div>
            <input type="hidden" name="id" value="<?= $v["id"] ?>">
            <div class="box2">
                <input type="submit" value="更新">
            </div>

        </form>
    </div>



</body>

</html>