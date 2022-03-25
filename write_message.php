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
		<title>予約登録画面</title>
		<link rel="stylesheet" href="last.css">
		
	</head>
	<body>
		Login: <b>
		<?php echo $_SESSION['name'];?>
		</b>
		<hr>
		<a href="logout.php"> 【ログアウト】</a>
		<hr>
		■予約する時間を選択してください.<br>
		<form action="insert_message.php" method="POST">
			月:<br>
			<select name="month">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
			</select><br>
			日:<br>
			<select name="day">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
				<option value="13">13</option>
				<option value="14">14</option>
				<option value="15">15</option>
				<option value="16">16</option>
				<option value="17">17</option>
				<option value="18">18</option>
				<option value="19">19</option>
				<option value="20">20</option>
				<option value="21">21</option>
				<option value="22">22</option>
				<option value="23">23</option>
				<option value="24">24</option>
				<option value="25">25</option>
				<option value="26">26</option>
				<option value="27">27</option>
				<option value="28">28</option>
				<option value="29">29</option>
				<option value="30">30</option>
				<option value="31">31</option>
			</select><br>
			時間:<br>
			<select name="time">
			<option value="1000">10:00</option>
				<option value="1015">10:15</option>
				<option value="1030">10:30</option>
				<option value="1045">10:45</option>
				<option value="1100">11:00</option>
				<option value="1115">11:15</option>
				<option value="1130">11:30</option>
				<option value="1145">11:45</option>
				<option value="1200">12:00</option>
				<option value="1215">12:15</option>
				<option value="1230">12:30</option>
				<option value="1245">12:45</option>
				<option value="1300">13:00</option>
				<option value="1315">13:15</option>
				<option value="1330">13:30</option>
				<option value="1345">13:45</option>
				<option value="1400">14:00</option>
				<option value="1415">14:15</option>
				<option value="1430">14:30</option>
				<option value="1445">14:45</option>
				<option value="1500">15:00</option>
				<option value="1515">15:15</option>
				<option value="1530">15:30</option>
				<option value="1545">15:45</option>
				<option value="1600">16:00</option>
				<option value="1615">16:15</option>
				<option value="1630">16:30</option>
				<option value="1645">16:45</option>
				<option value="1700">17:00</option>
				<option value="1715">17:15</option>
				<option value="1730">17:30</option>
				<option value="1745">17:45</option>
				<option value="1800">18:00</option>
				<option value="1815">18:15</option>
				<option value="1830">18:30</option>
				<option value="1845">18:45</option>
			</select><br><br>
			
			<input type="submit" value="予約登録">
		</form>
		
	</body>
</html>

