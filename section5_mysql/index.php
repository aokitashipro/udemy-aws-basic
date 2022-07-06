<?php
const DB_HOST = 'mysql:dbname=udemy_aws;host=127.0.0.1;charset=utf8';
const DB_USER = 'aws_user';
const DB_PASSWORD = 'password123';

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
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com/3.1.4"></script>
  <title>Document</title>
</head>
<body>
<h1 class="text-center text-xl my-20">Sample Blog</h1>

<section>
  <?php foreach($posts as $post) : ?>
    <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl mb-8">
  <div class="md:flex">
    <div class="md:shrink-0">
      <img class="h-48 w-full object-cover md:h-full md:w-48" 
        src="<?php echo $post["image"]; ?>"
      >
    </div>
    <div class="p-8">
      <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">
      <?php echo $post["category"]; ?>
      </div>
      <span href="#" class="block mt-1 text-lg leading-tight  font-medium text-black hover:underline">
        <?php echo $post["title"]; ?>
      </span>
      <p class="mt-2 text-slate-500">
      <?php echo $post["description"]; ?>
      </p>
    </div>
  </div>
</div>
  <?php endforeach; ?>
</section>

</body>
</html>