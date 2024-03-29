<?php
require_once(__DIR__ . '/json.php');

/**
 * 管理画面に表示するカードを作成する関数
 */
function show_card($data) {
  $tag = create_tag_array($data);

  foreach($tag as $t) {;
    echo '<!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-0">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="h5 pt-2 mb-0 font-weight-bold text-gray-800">'.$t.'</div>
                    </div>
                    <div class="col-auto">'.show_icon($t).'</div>
                  </div>
                </div>
              </div>
            </div>';
  }
}

/**
 * 引数のタグからアイコンを検索する関数
 */
function show_icon($tag) {
  // $icon_json = get_json('../config/icon/icon.json');
  $icon_json = get_json(Config::$icon_url);


  $icon = [];
  foreach($icon_json as $i) {
    if($tag === $i['tag']) {
      return $i['src'];
    }
  }
}

/**
 * 重複無しの分類タグ配列を作成する関数
 */
function create_tag_array($data) {
  $tag = [];
  foreach($data as $d) {
    array_push($tag, $d['tag']);
  }
  $tag = array_unique($tag);
  return $tag;
}

/**
 * ファイルのインポートを行う関数
 */
function import($tmp, $src) {
  $path_info = pathinfo($src);
  // JSONファイル以外のファイルが送信されたときにはリダイレクト
  if($path_info['extension'] != 'json') {
    $error = 'JSON形式のファイルのみ送信することが出来ます。';
    header('location: ../index.php?error='.$error);
    return;
  }

  $split = explode('.', $path_info['basename']);
  // ファイル名にタイムスタンプを付ける
  $src = $path_info['dirname'] . '/' . $split[0] . '_' . time() . '.' . $split[1];

  if(is_uploaded_file($tmp)) {
    if(move_uploaded_file($tmp, $src)) {
      $success =  'インポートが完了しました。';
      header('location: ../index.php?success='.$success);
    } else {
      $error = 'ファイルのインポートに失敗しました。';
      header('location: ../index.php?error='.$error);
    }
  } else {
      $error = '不正な操作です。';
      header('location: ../index.php?error='.$error);
  }
}

/**
 * ファイルのダウンロードを行う関数
 */
function export($path, $mime_type = null) {
  // ファイルが読めなかったら処理を終了させる
  if(!is_readable($path)) { die($path . 'を読み込めませんでした。'); }

  if(isset($mime_type)) {
    $mime = $mime_type;
  } else {
    $mime = (new finfo(FILEINFO_MIME_TYPE))->file($path);
  }

  if(!preg_match('/\A\S+?\/\S+/', $mime)) {
    $mime = 'application/octet-stream';
  }

  header('Conten-Type:' . $mime);
  header('X-Content-Type-Options: nosniff');
  header('Content-Disposition: attachment; filename="'.basename($path).'"');
  header('Cnnection: close');

  while(ob_get_level()) { ob_end_clean(); }

  // ファイルのダウンロード後にファイルを削除する
  if(readfile($path) > 0) {
    return 'エクスポートが完了しました。';
  }
  exit;
}
