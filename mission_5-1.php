<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>簡易掲示板</title>
</head>
<body>
    
<form method="POST" action="mission_5-1-1.php">
<p>名前：<br>
<input type="text" name="name" > </p>   
<p>コメント：<br>
<input type="text" name="comment" ></p>
<p>パスワード：<br>
<input type="text" name="password" ></p>
<input type="submit" value="送信" >
</form>

<br>

<form method="POST" action="mission_5-1-2.php">
<input type="number" name="delete" >
<input type="text" name="deletepass" value="パスワード">
<input type="submit" value="削除" >
</form>

<br>

<form method="POST" action="mission_5-1-3.php">
<input type="number" name="edit" >
<input type="text" name="editpass" value="パスワード">
<input type="submit" value="編集" >
</form>

<br>
</form>


<?php

$dsn = 'mysql:dbname=tb220179db;host=localhost';
$user = 'tb-220179';
$password = 'fBQw2v9FXz';
$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

$sql = "CREATE TABLE IF NOT EXISTS keiziban"
." ("
. "id INT AUTO_INCREMENT PRIMARY KEY,"
. "name char(32),"
. "comment TEXT,"
. "date TEXT,"
. "password TEXT"
.");";
$stmt = $pdo->query($sql);
    

$sql = 'SELECT * FROM keiziban';
$stmt = $pdo->query($sql);
$results = $stmt->fetchAll();
foreach ($results as $row){
    //$rowの中にはテーブルのカラム名が入る
    echo $row['id'].',';
    echo $row['name'].',';
    echo $row['comment'].',';
    echo $row['date'].',';
echo "<hr>";
}

?>