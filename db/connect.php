<?php
function dbconnect()
{
    $dsn = 'mysql:dbname=pokemon;host=localhost;charset=utf8';
    $user = 'root';
    $password = '';
    try {
        //例外が発生する可能性があるコード
        return new PDO($dsn, $user, $password);
        //echo '接続に成功しました。';
    } catch (PDOException $e) {
        //例外発生時の処理
        echo "接続エラー：{$e->getmessage()}";
    }
}
