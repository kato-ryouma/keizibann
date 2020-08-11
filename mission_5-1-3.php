<html>    
<button type=“button” onclick="location.href='https://tb-220179.tech-base.net/mission_5-1.php'">掲示板に戻る</button>
<br>
<br>
</html>

<?php

$edit=$_POST["edit"];
$editpass=$_POST["editpass"];
$editpass2="";

$dsn = 'mysql:dbname=tb220179db;host=localhost';
$user = 'tb-220179';
$password = 'fBQw2v9FXz';
$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

if(isset($edit))
{   
    $edit=$_POST["edit"];
    $editpass=$_POST["editpass"];
    $editpass2="";
    $id = $edit ; // idがこの値のデータだけを抽出したい、とする
    $sql = 'SELECT * FROM keiziban WHERE id=:id ';
    $stmt = $pdo->prepare($sql);                  // ←差し替えるパラメータを含めて記述したSQLを準備し、
    $stmt->bindParam(':id', $id, PDO::PARAM_INT); // ←その差し替えるパラメータの値を指定してから、
    $stmt->execute();                             // ←SQLを実行する。
    $results = $stmt->fetchAll(); 
    foreach ($results as $row)
    {
      $editname=$row['name'];
      $editcomment=$row['comment'];  
      $editpass2=$row['password'];
    }
}

if($editpass!=$editpass2 || $editpass2=="")
{
  echo "パスワードが違うか登録されていないため編集できません";
  exit() ;
}
   
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>入力フォーム</title>
</head>
<body>
<form method="POST" action="mission_5-1-4.php">
<p>名前：<br>
<input type="text" name="name" value=<?php echo $editname;?> > </p>   
<p>コメント：<br>
<input type="text" name="comment" value=<?php echo $editcomment;?>></p>
<p>パスワード：<br>
<input type="text" name="password" value=<?php echo $editpass2;?>></p>
<input type="hidden" name="edit" value=<?php echo $edit;?>>
<input type="submit" value="編集" >
</form>