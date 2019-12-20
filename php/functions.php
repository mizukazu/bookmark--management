<?php
require_once('json.php');

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
  $icon_json = get_json('./file/icon.json');

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
   * ファイルのダウンロードを行う関数
   * @param $path
   * @param $mime_type
   */
  function download($path, $mime_type = null) {
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

  function export() {
    echo 'test!';
  }
