<?php
require_once('../vendor/autoload.php');
require_once('../php/json.php');
require_once('../config/config.php');

$v = new Valitron\Validator($_POST);

// バリデーションルールの設定
$v->rule('required', ['name', 'url', 'tag'])->message('{field}は必須です。');

if($v->validate()) {

  $url     = Config::$config['url']['data_url'];
  $json    = get_json($url);
  $success = '';
  $error   = '';

  if(is_array($json)){

    // インデックスの取得
    $index = count($json);

    // 登録データの生成
    $add_data =  [
      $index => [
      'name' => $_POST['name'],
      'url'  => $_POST['url'],
      'tag'  => $_POST['tag']
      ]
    ];

    foreach($json as $j) {
      if($j['url'] === $add_data[$index]['url']) {
        $error = 'このURLは既に登録されています。';
        // 新規追加画面へ遷移
        header('location:'.'../add.php'.'?error='.$error);
        return;
      }
    }

    // 登録データを追加
    $json = array_merge($json, $add_data);

    $json = json_encode($json, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    file_put_contents($url, $json);

    $success = 'お気に入り追加が完了しました。';

  } else {

    // 登録データの生成
    $add_data =  [
      '0' => [
      'name' => $_POST['name'],
      'url'  => $_POST['url'],
      'tag'  => $_POST['tag']
      ]
    ];

    $add_data = json_encode($add_data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    file_put_contents($url, $add_data);

    $success = 'お気に入り追加が完了しました。';
  }

  // 新規追加画面へ遷移
  header('location:'.'../add.php'.'?success='.$success);

} else {
  foreach($v->errors() as $error) {
    foreach($error as $e) {
      echo $e;
    }
  }
}