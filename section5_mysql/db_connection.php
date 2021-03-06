<?php

const DB_HOST = 'mysql:dbname=udemy_aws_blog;host=127.0.0.1;charset=utf8';
const DB_USER = 'root';
const DB_PASSWORD = 'Udemy-aws-basic-123@';

try{
  $pdo = new PDO(DB_HOST, DB_USER, DB_PASSWORD, [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //連想配列
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //例外
    PDO::ATTR_EMULATE_PREPARES => false, //SQLインジェクション対策
  ]);

  if($pdo == null){
    echo '接続に失敗';
  } else {
    $stmt = $pdo->prepare("select * from posts");
    $stmt->execute();
    $posts = $stmt->fetchAll();
  }
} catch(PDOException $e){
  echo '接続失敗' . $e->getMessage() . "\n";
  exit();
}

?>