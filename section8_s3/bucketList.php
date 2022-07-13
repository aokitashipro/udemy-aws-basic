<?php
ini_set('display_errors', "On");
ini_set('error_reporting', E_ALL);
require './vendor/autoload.php';
use Aws\S3\S3Client;

// S3インスタンス作成時の引数
$config = [
    'version' => 'latest',
    'region'  => 'ap-northeast-1',
];

$s3Client = new S3Client($config);

# バケット一覧の表示
$result = $s3Client->listBuckets();
foreach ($result['Buckets'] as $bucket) {
    echo $bucket['Name'] . "\n";
}
