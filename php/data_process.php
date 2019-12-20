<?php require_once('functions.php'); ?>
<?php $url = '../file/data.json'; ?>
<?php
// データのダウンロード処理
if(isset($_POST['data']) && $_POST['data'] === 'export') {
  download($url);
} else {
  header('location: ../index.php');
}