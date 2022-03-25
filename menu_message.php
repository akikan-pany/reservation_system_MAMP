<?php
//セッションの生成
session_start();

//ログイン確認
if(!((isset($_SESSION['login'])&&$_SESSION['login'] == 'OK'))){
	//ログイン失敗. ログインフォームに移動
	header('Location: login.html');
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>メニュー</title>
		<link rel="stylesheet" href="last.css">
		
	</head>
	<body>
		Login: <b>
		<?php echo $_SESSION['name'];?>
		</b>
		<hr>
		<a href="logout.php"> 【ログアウト】</a>
		<hr>
		■会議室メニュー
		<ul>
			<li><a href="write_message.php">予約登録</a>
			<li><a href="show_message.php">予約確認、取り消し</a>
			<li><a href="show_care.php">カレンダー</a>
		</ul>
		
	</body>
</html>
