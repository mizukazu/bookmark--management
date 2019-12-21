<?php require_once(__DIR__ . '/functions.php'); ?>
<?php require_once('../config/config.php'); ?>

<?php
// データのダウンロード処理
if(isset($_POST['data']) && $_POST['data'] === 'export') {
  download(Config::$config['url']['data_url']);
} elseif(isset($_POST['data']) && $_POST['data'] === 'import') {
  import();
} else {
  header('location: ../index.php');
}