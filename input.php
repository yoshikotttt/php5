<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>入力フォーム</title>
    <style>
        body {
            background-color:#fdf7ee;
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
        .atg a{
            color: #9f1446;
            text-decoration: none;
        }

    </style>
</head>
<body>
<div class="atg"><a href="index.php">TOP</a></div>
    <div class="wrapper">
        <form action="insert.php" method="post">
        <div class="box1">
                <h2>店名</h2>
                <input class="nice-textbox" type="text" name="salon">
            </div>
            <div class="box2">
                <h2>担当</h2>
                <input class="nice-textbox" type="text" name="stylist">さん
            </div>
            
                <h2>評価⭐️</h2>
             <input type="radio" name="star" id="1" value="1">1
             <input type="radio" name="star" id="2" value="2">2
             <input type="radio" name="star" id="3" value="3">3
             <input type="radio" name="star" id="4" value="4">4
             <input type="radio" name="star" id="5" value="5">5
           
            <div class="box4">
                <h2>コメント</h2>
                <textarea  name="comment" rows="10" cols="50"></textarea>
            </div>
            <div class="box2">
                <input type="submit" value="登録">
            </div>

        </form>
    </div>
    
</body>
</html>