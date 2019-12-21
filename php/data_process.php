<?php require_once(__DIR__ . '/functions.php'); ?>
<?php require_once('../config/config.php'); ?>

<?php
$tmp = $_FILES['file']['tmp_name'];
$src = '../config/data/'.$_FILES['file']['name'];

// データのダウンロード処理
if(isset($_POST['data']) && $_POST['data'] === 'export') {
  export(Config::$config['url']['data_url']);
} elseif(isset($_POST['data']) && $_POST['data'] === 'import') {
  import($tmp, $src);
} else {
  header('location: ../index.php');
}