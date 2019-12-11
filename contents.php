<?php require_once('./php/json.php'); ?>
<?php require_once('./php/class.pagination.php'); ?>
<?php require_once('./php/functions.php'); ?>
<?php require_once('./parts/header.php'); ?>
<?php require_once('./parts/sidebar.php'); ?> 
<?php require_once('./parts/topbar.php'); ?> 
<?php $url = './file/data.json'; ?>
<?php
// データの取得
$data = get_json($url);

// ページ番号の取得
if(!isset($_GET['page'])) {
  $now_page = 1;
} else {
  $now_page = $_GET['page'];
}

// パラメータにタグが付いてればタグを変数に格納
if(isset($_GET['tag'])) {

  // データをタグでソート
  $data = array_filter($data, function($d) {
    return $d['tag'] === $_GET['tag'];
  });

  // 配列のインデックスを振り直す
  $data = array_values($data);

}
?>  
<?php
/************************
 * ページネーションの設定
 ************************/

/** 1ページに表示するデータの数量 */
$per_page   = 10;
/** データの総数 */
$count      = count($data);
/** 最大ページ */
$total_page = ceil($count / $per_page);
/** 始点 */
$start = ($now_page - 1) * $per_page;
/** 終点 */
$end   = $now_page * $per_page;
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">WEB制作全般</h1>
          <!-- <p class="mb-4"></a></p> -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>サイト名</th>
                      <th>分類タグ</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <?php
                      // データが存在している時の処理
                      if(isset($data)) {
                        // ページ番号が1の場合
                        if($now_page === 1) {
                          // データが最大表示数より小さい場合
                          if($count < $per_page) {
                            for($i=0; $i<$count; $i++) {
                            echo '<tr>
                                    <td><a href="'. $data[$i]['url'] .'">'. $data[$i]['name'] .'</a></td>
                                    <td>'. $data[$i]['tag'] .'</td>
                                  </tr>';
                            }
                          } else {
                            for($i=0; $i<$per_page; $i++) {                     
                              echo '<tr>
                                      <td><a href="'. $data[$i]['url'] .'">'. $data[$i]['name'] .'</a></td>
                                      <td>'. $data[$i]['tag'] .'</td>
                                    </tr>';
                            }
                          }
                        // ページ番号が1以外の場合
                        } else {
                          for($i=$start; $i<=$end; $i++) {
                            // データが空でない場合
                            if(!empty($data[$i])) {                   
                              echo '<tr>
                                      <td><a href="'. $data[$i]['url'] .'">'. $data[$i]['name'] .'</a></td>
                                      <td>'. $data[$i]['tag'] .'</td>
                                    </tr>';
                            }
                          }
                        }
                      // データが無ければ何もしない
                      } else {
                        return;
                      }                 
                      ?>
                    </tr>                  
                  </tbody>
                </table>
                <?php
                  // ページネーション
                  echo  '<nav class="area-label">';
                  echo   '<ul class="pagination justify-content-end">';

                  // 現在のページ番号が1以外の場合
                  if($now_page != 1) {
                    if(isset($_GET['tag'])) {
                      echo '<li class="page-item">
                              <a class="page-link" href=contents.php?tag='.$_GET['tag'].'&page='.($now_page - 1).' aria-label="前">
                                <span aria-hidden="true">&laquo;</span>
                              </a>
                            </li>'; 
                    } else {
                      // 前矢印を表示する
                      echo '<li class="page-item">
                              <a class="page-link" href=contents.php?page='.($now_page - 1).' aria-label="前">
                                <span aria-hidden="true">&laquo;</span>
                              </a>
                            </li>'; 
                    }
                  }

                  // ページネーションの表示
                  // タグが存在する場合
                  if(isset($_GET['tag'])) {
                    for($i=1; $i<=$total_page; $i++) {
                      echo '<li class="page-item"><a class="page-link" href="contents.php?tag='.$_GET['tag'].'&page='.$i.'">'.$i.'</a></li>';
                    }
                  // タグが存在しない場合
                  } else {
                    for($i=1; $i<=$total_page; $i++) {
                      echo '<li class="page-item"><a class="page-link" href="contents.php?page='.$i.'">'.$i.'</a></li>';
                    }
                  }

                  // 現在のページが最大表示ページ以外で、データの数が1ページに表示する項目数より多い場合
                  if($now_page != $total_page && $count > $per_page) {
                    if(isset($_GET['tag'])) {
                      echo '<li class="page-item">
                              <a class="page-link" href=contents.php?tag='.$_GET['tag'].'&page='.($now_page + 1).' aria-label="次">
                                <span aria-hidden="true">&raquo;</span>
                              </a>
                            </li>';
                    } else {
                      // 後矢印を表示する
                      echo '<li class="page-item">
                            <a class="page-link" href=contents.php?page='.($now_page + 1).' aria-label="次">
                              <span aria-hidden="true">&raquo;</span>
                            </a>
                          </li>';
                    }
                  }
                  echo   '</ul>';
                  echo  '</nav>';
                ?>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php require_once('./parts/footer.php') ?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>