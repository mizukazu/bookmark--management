<?php
class pagination {
  /** 1ページに表示するデータの数量 */
  private $per_page = 10;
  /** データの総数 */
  private $count;
  /** 最大ページ */
  private $total_page;

  function __construct($data) {
    $this->count = count($data);
    $this->total_page = ceil($this->count / $this->per_page);
  }

  public function paging() {
    
    for($i=1; $i<=$this->total_page; $i++) {
      echo '<li class="page-item"><a class="page-link" href="contents.php?page='.$i.'">'.$i.'</a></li>';
    }
  }

  /**
   * 1ページに表示するデータの数量を設定するメソッド
   */
  public function set_perpage($value) {
    $this->per_page = $value;
  }

  public function show() {
    echo $this->count . '<br>';
    echo $this->per_page . '<br>';
    echo $this->total_page . '<br>';
  }
}