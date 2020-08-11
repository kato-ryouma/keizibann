<html>    
<button type=“button” onclick="location.href='https://tb-220179.tech-base.net/mission_5-1.php'">掲示板に戻る</button>
<br>
<br>
</html>

<?php

$dsn = 'mysql:dbname=tb220179db;host=localhost';
  $user = 'tb-220179';
  $password = 'fBQw2v9FXz';
  $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

if(isset($_POST["delete"]))
{
  $delete=$_POST["delete"];
  $deletepass=$_POST["deletepass"];
  $deletepass2="";

  $id = $delete ; // idがこの値のデータだけを抽出したい、とする
  $sql = 'SELECT * FROM keiziban WHERE id=:id ';
  $stmt = $pdo->prepare($sql);                  // ←差し替えるパラメータを含めて記述したSQLを準備し、
  $stmt->bindParam(':id', $id, PDO::PARAM_INT); // ←その差し替えるパラメータの値を指定してから、
  $stmt->execute();                             // ←SQLを実行する。
  $results = $stmt->fetchAll(); 
  foreach ($results as $row)
  {
    $deletepass2=$row['password'];
  }

  if($deletepass!=$deletepass2 || $deletepass2=="" )
  {
    echo "パスワードが違うか登録されていないため削除できません";
    exit() ;
  
  }elseif($deletepass==$deletepass2)
  {  
    
     $id = $delete;
	   $sql = 'delete from keiziban where id=:id';
	   $stmt = $pdo->prepare($sql);
	   $stmt->bindParam(':id', $id, PDO::PARAM_INT);
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
     
     echo "削除しました";

     
  }

}
?>