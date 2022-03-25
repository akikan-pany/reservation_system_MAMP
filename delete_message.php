<?php

    //セッションの生成
    session_start();
    if(!((isset($_SESSION['login']) && $_SESSION['login'] == 'OK'))){
        //ログインフォームへ
        header('Location: login.html');
        //終了
        exit();
    }
    
    if(!(isset($_POST['check'][0]))){
        header('Location: show_message.php');
        exit();
    }
    
    
    //接続よう関数の呼び出し
    require_once(__DIR__.'/functions.php');

    echo "Login:".$_SESSION['name'];
    echo "<hr><a href=\"menu_message.php\">メニュー</a><br><a href=\"login.html\">ログアウト</a><hr>";
    
    $dbh = connectDB();
    
    $sql = 'SELECT meet_id,meet_month,meet_day,meet_time,user_name,entry_date FROM meet_tb WHERE ';
    $sql_where = '';
    
    for($id=0;$id<$_SESSION['id_MaxNum'];$id++){
        //削除予定のIDのチェック
        if(isset($_POST['check'][$id])){
            if($id > 0){//二番め以降
                $sql_where .= ' OR ';//ORの挿入（スペースを忘れない）
            }
            //id付与
            $sql_where .= 'meet_id="'.$_POST['check'][$id].'"';
        }
    }
    $sql .= $sql_where;
    //データベース削除
    $sql_del = 'DELETE from `meet_tb` WHERE '. $sql_where;
    $_SESSION['delete'] = $sql_del;
    
    $sth = $dbh->query($sql);//SQLの実行
    
echo "<table border=1> <tr bgcolor=\"CCCCCC\"> <td> </td><td>ID</td> <td>月</td> <td>日</td> <td>時間</td> <td>ユーザ</td> <td>登録日</td></tr>";
    while($row = $sth->fetch()){
        echo '<tr>';
    echo '<td><input type="checkbox" name="check[]" value="'.$row['meet_id'].'"></td>';
        echo '<td>'.$row['meet_id'].'</td>';
        echo '<td>'.$row['meet_month'].'</td>';
        echo '<td>'.$row['meet_day'].'</td>';
        echo '<td>'.$row['meet_time'].'</td>';
        echo '<td>'.$row['user_name'].'</td>';
        echo '<td>'.$row['entry_date'].'</td>';
        echo '</tr>';
        $_SESSION['id_MaxNum'] = $row['meet_id'];
    }
    echo "</table>";
    
    
    
?>


<HEAD>
    <link rel="stylesheet" href="last.css">
    <script language="JavaScript">
    
   
    function delRecordAlert(){
        res = confirm("このレコードを削除しますか。 \n (この操作は取り消しできません。)");
        if(res == true){
            document.delform.submit();//ここで送信
        }else{
            return false;
        }
    }
    </script>
</HEAD>

<form action="delete_message2.php" method="POST" name="delform">
    <input type="submit" value="削除" onclick="return delRecordAlert()">
</form>

<?php
    $_SESSION['id_MaxNum'] = 0; //id最大値の初期化
?>
