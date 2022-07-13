<?php
require './vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

// S3インスタンス作成時の引数
$s3 = new S3Client([
    'region'  => 'ap-eastnorth-1',
    'version' => 'latest'
]);

# バケット一覧の表示
try {
    $result = $s3->listObjects();

    foreach ($result['Buckets'] as $bucket) {
        echo $bucket['Name'] . "\n";
    }
} catch (S3Exception $e) {
    echo $e->getMessage() . "\n";
}
