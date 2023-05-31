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
$json = json_encode($v, JSON_UNESCAPED_UNICODE);

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <title>各データ</title>
    <style>
        body {
            background-color: #fdf7ee;
        }

        .atg a {
            color: #9f1446;
            text-decoration: none;
        }

        .button-group {
            display: flex;
            padding-top: 50px;
        }

        .button-link {
            display: inline-block;
            padding: 6px 12px;
            text-align: center;
            text-decoration: none;
            background-color: #9f1446;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;

        }

        .button {
            margin-left: 20px;
            display: inline-block;
            padding: 6px 12px;
            text-align: center;
            text-decoration: none;
            background-color: #877971;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 17px;
        }

        .button-open {
            margin-left: 20px;
            display: inline-block;
            padding: 6px 12px;
            text-align: center;
            text-decoration: none;
            background-color: #877971;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 17px;
        }



        /* モーダルウィンドウ */
        .modal-window {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 300px;
            height: 150px;
            background-color: #dfdddd;
            border-radius: 5px;
            z-index: 11;
            padding: 2rem;
            /* display: flex;
            flex-direction: column; */
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.5);
            width: 100%;
            height: 100%;
            z-index: 10;
        }

        .container {
            display: flex;
            justify-content: center;
        }

        h3 {
            text-align: center;
        }

        .modal-window .button-link {
            height: 38px;
            display: block;
        }
    </style>
</head>

<body>
    <!-- オーバーレイ -->
    <div id="overlay" class="overlay"></div>
    <!-- モーダルウィンドウ -->
    <div class="modal-window">
        <h3>データを削除しますか？</h3>
        <div class="container">
            <div class="box1">
                <form action="delete.php" method="post">
                    <input type="hidden" name="id" value="<?= $v["id"] ?>" class="close">
                    <input type="submit" value="はい" class="close button-link" onclick="getId(<?= $v['id'] ?>)">
                </form>
            </div>
            <div class="box1">
                <input type="submit" class="close button-open" value=" キャンセル">
            </div>
        </div>
    </div>


    <!-- メイン -->
    <div class="atg">
        <a href="index.php">TOP</a>
        <a href="log.php">　　　一覧に戻る</a>
    </div>
    <div class="wrapper2">
        <div class="title"></div>店名：<?= h($v["salon"]); ?>
    </div>
    <div class="material">担当：<?= h($v["stylist"]); ?></div>
    <div class="amount">★：<?= h($v["star"]); ?></div>
    <div class="recipe">コメント：<?= h($v["comment"]); ?></div>
    <div class="button-group">
        <td> <a href="retype.php?id=<?= $v["id"] ?>" class="button-link">更新</a></td>
        <!--削除はモーダル呼び出しのボタンになる -->
        <button class="button-open" onclick=''>削除する</button>
    </div>




    </div>

    <script>
        const json = JSON.parse('<?= $json ?>');
        console.log(json);

        $(function() {
            $('.button-open').on("click", function() {
                $('#overlay,.modal-window').fadeIn();
            });
            $('.close').on('click', function() {
                $('#overlay, .modal-window').fadeOut();
            });


        });
    </script>
</body>

</html>