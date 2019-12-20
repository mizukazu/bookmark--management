<?php require_once('functions.php'); ?>
<?php $url = '../file/data.json'; ?>
<?php
// データのダウンロード処理
if(isset($_POST['data']) && $_POST['data'] === 'export') {
  download($url);
} elseif(isset($_POST['data']) && $_POST['data'] === 'import') {
  import();
} else {
  header('location: ../index.php');
}