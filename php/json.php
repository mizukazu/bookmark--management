<?php

/**
 * JSONデータを読み込む関数
 */
function get_json($url) {
  $realPath = realpath($url);

  if($json = file_get_contents($realPath)) {

    $json = mb_convert_encoding(file_get_contents($realPath), 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');

    $array = json_decode($json, true);

    return $array;
  } else {
    //エラー処理
    if(count($http_response_header) > 0){
      //「$http_response_header[0]」にはステータスコードがセットされているのでそれを取得
      $status_code = explode(' ', $http_response_header[0]);  //「$status_code[1]」にステータスコードの数字のみが入る

      //エラーの判別
      switch($status_code[1]){
        //404エラーの場合
        case 404:
            echo "指定したページが見つかりませんでした";
            break;

        //500エラーの場合
        case 500:
            echo "指定したページがあるサーバーにエラーがあります";
            break;

        //その他のエラーの場合
        default:
            echo "何らかのエラーによって指定したページのデータを取得できませんでした";
      }
    } else {
      //タイムアウトの場合 or 存在しないドメインだった場合
      echo "タイムエラー or URLが間違っています";
    }
  }
}

/**
 * JSONデータを書き込む関数
 */
function write_json($data) {
  
}