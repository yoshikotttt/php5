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
            登録がまだの方は<a href="signin.php">こちら</a>
        </div>
    </form>

    <script>


const friendAddress = "友達の住所";
const success = true; // 手紙が投函できたかどうか（仮の値）


const getAddress = () => {
  return new Promise((resolve, reject) => {
     if (friendAddress) {
      resolve(friendAddress);
    } else {
      reject("住所が見つかりません");
    }
  });
};

const sendLetter = (address) => {
  return new Promise((resolve, reject) => {
    // 手紙をポストに投函する処理
    if (success) {
      resolve("手紙が送信されました");
    } else {
      reject("手紙の送信に失敗しました");
    }
  });
};

getAddress()
  .then((address) => sendLetter(address))
  .then((result) => {
    console.log(result); // "手紙が送信されました"
  })
  .catch((error) => {
    console.error(error); // エラーメッセージが表示されます
  });
    </script>
</body>

</html>

