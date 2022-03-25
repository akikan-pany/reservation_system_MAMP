<?php
    

    //セッションの生成
    session_start();
    if(!((isset($_SESSION['login']) && $_SESSION['login'] == 'OK'))){
        //ログインフォームへ
        header('Location: login.html');
        //終了
        exit();
    }

    //ユーザ名/パスワード
$month = htmlspecialchars($_POST['month'],ENT_QUOTES);
$day = htmlspecialchars($_POST['day'],ENT_QUOTES);

    //接続よう関数の呼び出し
    require_once(__DIR__.'/functions.php');

    echo "Login:".$_SESSION['name'];
    echo "<hr><a href=\"menu_message.php\">メニュー</a><br><a href=\"login.html\">ログアウト</a><hr>";
    
    $dbh = connectDB();
    
    $sql = 'SELECT meet_id,meet_month,meet_day,meet_time,user_name,entry_date FROM meet_tb ORDER BY meet_id';
    $sth = $dbh->query($sql);//SQLの実行
    
    echo "<form action=\"delete_message.php\" method=\"POST\">";
echo "<table border=1> <tr bgcolor=\"CCCCCC\"> <td>ID</td> <td>月</td> <td>日</td> <td>時間</td> <td>ユーザ</td> <td>登録日</td> </tr>";
    while($row = $sth->fetch()){
        if($month==$row['meet_month']||$day==$row['meet_day']){
        echo '<tr>';
        echo '<td>'.$row['meet_id'].'</td>';
        echo '<td>'.$row['meet_month'].'</td>';
        echo '<td>'.$row['meet_day'].'</td>';
        echo '<td>'.$row['meet_time'].'</td>';
        echo '<td>'.$row['user_name'].'</td>';
        echo '<td>'.$row['entry_date'].'</td>';
        echo '</tr>';
        $_SESSION['id_MaxNum'] = $row['meet_id'];
        }else{
    echo '<tr>';
    echo '</tr>';
    }
}
    echo "</table>";
    echo '</form>';
    
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>show_message4.php</title>
        <link rel="stylesheet" href="last.css">
        
    </head>
    <body>
        
        
        
    </body>
</html>

