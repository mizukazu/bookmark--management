<?php
class Config {
  public static $config;

  /**
   * 初期化処理
   */
  public static function init() {
    self::getConfig();
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