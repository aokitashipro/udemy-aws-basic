
<?php
  $posts = [
    [
      "title" => "タイトル1",
      "category" => "カテゴリー1",
      "description" => "詳細その1",
      "image" => "images/image1.jpg",
    ],
    [
      "title" => "タイトル2",
      "category" => "カテゴリー2",
      "description" => "詳細その2",
      "image" => "images/image2.jpg",
    ]
  ];
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