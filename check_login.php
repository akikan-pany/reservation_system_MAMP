<?php
//接続用関数の呼び出し
require_once(__DIR__.'/functions.php');

//セッションの生成
session_start();
if(!(isset($_POST['user'])&&isset($_POST['pass']))){
		header('Location:login.html');
}

//ユーザ名/パスワード
$user = htmlspecialchars($_POST['user'],ENT_QUOTES);
$pass = htmlspecialchars($_POST['pass'],ENT_QUOTES);

//DBへの接続
$dbh = connectDB();

if($dbh){
	//データベースへの問い合わせSQL(文字列)
	$sql = 'SELECT `user_name`, `admin_flag` FROM `user_tb` WHERE `login_name`="' . $user . '" AND `login_password`="' . $pass . '"';
	
	$sth = $dbh->query($sql);
	//データ取得
	$result = $sth->fetchAll(PDO::FETCH_ASSOC);
	//echo "<pre>";
	//print_r($result); //デバッグ
	//echo "</pre>";
	//exit;
}

//認証
//if(($user=='x19036')&&($pass=='webphp')){
if(count($result)==1){ //配列数が唯一の場合
	//ログイン成功
	$login = 'OK';
	//表示用のユーザー名をセッション変数に保存
	$_SESSION['name'] = $result[0]['user_name'];
	$_SESSION['admin'] = $result[0]['admin_flag'];
}else{
	//ログイン失敗
	$login = 'Error';
}
$sth = null; //データの消去
$dbh = null; //DB閉じる

$_SESSION['login'] = $login;
//移動
if($login=='OK'){
	//ログイン成功
	if($_SESSION['admin']==2){
		header('Location: menu_message.php');
	}else if($_SESSION['admin']==1){
		header('Location: menu_message.php');
	}else if($_SESSION['admin']==0){
		header('Location: menu_message2.php');
	}
}else{
	//ログイン失敗: ログインフォーム画面へ
	header('Location: login.html');
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>check_login.php</title>
		<link rel="stylesheet" href="last.css">
		
	</head>
	<body>
		
		
		
	</body>
</html>
