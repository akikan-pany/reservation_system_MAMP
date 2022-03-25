<?php
    
    require_once (__DIR__.'/functions.php');
    
    //セッションスタート
    session_start();
    //ログインの確認
    if(!((isset($_SESSION['login']) && $_SESSION['login'] == 'OK'))){
        //ログインフォームへ
        header('Location: login.html');
        //終了
        exit();
    }

    if(isset($_SESSION['delete'])){
        //DBへの接続
        $dbh = connectDB();
        if($dbh){
            $sth = $dbh->query($_SESSION['delete']); //SQLの実行
            //初期化
            unset($_SESSION['delete']);
        }
    }
    header('Location: show_message.php');
?>
