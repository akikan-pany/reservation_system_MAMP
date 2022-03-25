<?php
//セッションのスタート
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>ログイン成功</title>
		
	</head>
	<body>
		<?php
		//ログイン確認
		if((isset($_SESSION['login'])&&($_SESSION['login']=='OK'))){
			//ログイン成功
			echo'■ログイン中です.';
		}else{
			//ログイン失敗
			echo'■ログインしていません.';
		}
		?>
		<br><br>
		接続ユーザ: <?php echo $_POST['name']; ?>
		
		
	</body>
</html>
