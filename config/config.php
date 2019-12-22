<?php
class Config {
  public static $config;

  /**
   * 初期化処理
   */
  public static function init() {
    self::getConfig();
  }

  public static function getFirstDataUrl() {
    return self::$config['url']['data_url'][0];
  }
  /**
   * 設定ファイルを読み込むメソッド
   */
  private function getConfig() {
    $json = mb_convert_encoding(file_get_contents(__DIR__ . '/config.json'), 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
    $config = json_decode($json, true);
    self::$config = $config;
  }
}
Config::init();