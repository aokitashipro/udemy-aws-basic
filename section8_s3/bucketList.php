<?php
require './vendor/autoload.php';

use Aws\S3\S3Client;

// IAMロールを使うため空設定
$accessKeyId = '';
$secretAccessKey = '';

// S3インスタンス作成時の引数
$config = [
    'version' => 'latest',
    'region'  => 'ap-northeast-1',
    'profile' => 'default'
];

// AccessKeyとSecretAccressKeyがない場合は、IAMロールを使用する
if (empty($accessKeyId) && empty($secretAccessKey)) {
    // IAMロール認証の場合はprofileをセットしない(unsetする)
    unset($config['profile']);
  }

$s3Client = new S3Client($config);

# バケット一覧の表示
$result = $s3Client->listBuckets();
foreach ($result['Buckets'] as $bucket) {
    echo $bucket['Name'] . "\n";
}
