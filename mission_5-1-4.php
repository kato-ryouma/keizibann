<html>    
<button type=“button” onclick="location.href='https://tb-220179.tech-base.net/mission_5-1.php'">掲示板に戻る</button>
<br>
<br>
</html>

<?php

$name=$_POST["name"];
$comment=$_POST["comment"];
$password2=$_POST["password"];
$edit=$_POST["edit"];

$dsn = 'mysql:dbname=tb220179db;host=localhost';
$user = 'tb-220179';
$password = 'fBQw2v9FXz';
$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

$id = $edit; //変更する投稿番号
$sql = 'UPDATE keiziban SET name=:name,comment=:comment,password=:password WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':name', $name, PDO::PARAM_STR);
$stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->bindParam(':password', $password2, PDO::PARAM_STR);
$stmt->execute(); 

$sql = 'SELECT * FROM keiziban';
$stmt = $pdo->query($sql);
$results = $stmt->fetchAll();
foreach ($results as $row)
{
    //$rowの中にはテーブルのカラム名が入る
    echo $row['id'].',';
    echo $row['name'].',';
    echo $row['comment'].',';
    echo $row['date'].',';
    echo "<hr>";
}

echo "内容を編集しました";

?>

