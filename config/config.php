<?php
class Config {
  public static $config;
  public static $data_url = __DIR__ . '/data/data.json';
  public static $icon_url = __DIR__ . '/icon/icon.json';

  /**
   * 初期化処理
   */
  public static function init() {
    self::getConfig();
  }

  public static function getFirstDataUrl() {
    // return self::$config['url']['data_url'][0];
    return self::$data_url;
  }
  /**
   * 設定ファイルを読み込むメソッド
   */
  public static function getConfig() {
    $json = mb_convert_encoding(file_get_contents(__DIR__ . '/config.json'), 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
    $config = json_decode($json, true);
    self::$config = $config;
  }
}
Config::init();