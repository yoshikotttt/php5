<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
</head>

<body>
    <form action="login_act.php" method="post">
        <div class="container">
            <h2>ログイン</h2>
            <div class="box">
                ユーザーID<input type="text" name="u_id">
            </div>
            <div class="box">
                パスワード<input type="text" name="u_pw">
            </div>
            <div class="box">
                <input type="submit" value="ログイン">
            </div>
            登録がまだの方は<a href="new.php">こちら</a>
        </div>
    </form>

 

</body>

</html>

