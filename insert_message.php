<?php
//セッションの生成
session_start();

//ログイン確認
if(!((isset($_SESSION['login'])&&$_SESSION['login'] == 'OK'))){
	//ログイン失敗. ログインフォームに移動
	header('Location: login.html');
}

//接続用関数の呼び出し
require_once(__DIR__ . '/functions.php');

//タイトルメッセージ
$month = htmlspecialchars($_POST['month'], ENT_QUOTES);
$day = htmlspecialchars($_POST['day'], ENT_QUOTES);
$time = htmlspecialchars($_POST['time'], ENT_QUOTES);


//DBへの接続
$dbh = connectDB();
if($dbh){
	//データベースへの問い合わせSQL文(文字列)
	$sql = 'INSERT INTO meet_tb(meet_month, meet_day, meet_time, user_name) VALUES("' . $month . '","' . $day . '","' . $time . '","' . $_SESSION['name'] . '")';
	
	$sth = $dbh->query($sql); //SQLの実行
	//値を取得する必要がないのでfetchは不要
	
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="last.css">
		<title>予約処理画面</title>
		
	</head>
	<body>
		Login: <b>
		<?php echo $_SESSION['name'];?>
		</b>
		<hr>
		<a href="menu_message.php">【メニュー】</a>
		<a href="logout.php"> 【ログアウト】</a>
		<hr>
		<?php
		if($sth==FALSE){
			echo "予約に失敗しています.<br>";
		}else{
			echo "■予約登録しました.<br>";
		}
		?>
		<br>
		<br>
		<a href="show_message.php">予約確認</a>
		
	</body>
</html>