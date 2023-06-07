<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規登録</title>
</head>

<body>
    <form action="new_act.php" method="post">
        <div class="container">
            <h2>新規登録</h2>
            <div class="box">
                名前　　　　<input type="text" name="u_name">
            </div>
            <div class="box">
                ユーザーID　<input type="text" name="u_id">
            </div>
            <div class="box">
                パスワード　<input type="text" name="u_pw">
            </div>
            <div>
                <p>管理フラグ</p>
                    一般<input type="radio" name="kanri_flg" value="0">　
                    管理者<input type="radio" name="kanri_flg" value="1">
            </div>
            <div class="box">
                <input type="submit" value="登録">
            </div>

        </div>
    </form>
</body>

</html>