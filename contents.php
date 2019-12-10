<?php require_once('./php/json.php'); ?>
<?php require_once('./php/class.pagination.php'); ?>
<?php require_once('./php/functions.php'); ?>
<?php require_once('./parts/header.php'); ?>
<?php require_once('./parts/sidebar.php'); ?> 
<?php require_once('./parts/topbar.php'); ?> 
<?php $url = './file/data.json'; ?>
<?php $array = get_json($url); ?>  
<?php
/** 1ページに表示するデータの数量 */
$per_page   = 10;
/** データの総数 */
$count      = count($array);
/** 最大ページ */
$total_page = ceil($count / $per_page);

/** タグ */
$tag;

if(!isset($_GET['page'])) {
  $now_page = 1;
} else {
  $now_page = $_GET['page'];
}
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
                        // タグが存在する場合
                        if(isset($_GET['tag'])) {
                          $tag = $_GET['tag'];
                          if(is_array($array)) {
                            if($now_page === 1) {
                              for($i=0; $i<=$per_page; $i++) {
                                if($array[$i]['tag'] === $tag) {
                                  echo '<tr>
                                          <td><a href="'. $array[$i]['url'] .'">'. $array[$i]['name'] .'</a></td>
                                          <td>'. $array[$i]['tag'] .'</td>
                                        </tr>';
                                }
                              }
                            } else {
                              $start = ($now_page - 1) * $per_page;
                              $end   = $now_page * $per_page;

                              for($i=$start; $i<$end; $i++) {
                                if(isset($array[$i])) {
                                  if($array[$i]['tag'] === $tag) {
                                    echo '<tr>
                                            <td><a href="'. $array[$i]['url'] .'">'. $array[$i]['name'] .'</a></td>
                                            <td>'. $array[$i]['tag'] .'</td>
                                          </tr>';
                                  }
                                }
                              }
                            }
                          } else {
                            return;
                          }
                        // タグが無い場合の処理
                        } else {
                          if(is_array($array)) {
                            if($now_page === 1) {
                              for($i=0; $i<$per_page; $i++) {  
                                echo '<tr>
                                        <td><a href="'. $array[$i]['url'] .'">'. $array[$i]['name'] .'</a></td>
                                        <td>'. $array[$i]['tag'] .'</td>
                                      </tr>';
                              }
                            } else {
                              $start = ($now_page - 1) * $per_page;
                              $end   = $now_page * $per_page;

                              for($i=$start; $i<$end; $i++) {
                                if(isset($array[$i])) {
                                  echo '<tr>
                                          <td><a href="'. $array[$i]['url'] .'">'. $array[$i]['name'] .'</a></td>
                                          <td>'. $array[$i]['tag'] .'</td>
                                        </tr>';
                                }
                              }
                            }
                          } else {
                            return;
                          }
                        }                    
                      ?>
                    </tr>                  
                  </tbody>
                </table>
                <?php
                  // ページネーション
                  echo  '<nav class="area-label">';
                  echo   '<ul class="pagination justify-content-end">';
                  if(isset($now_page)) {
                    if($now_page != 1) {
                      // 前矢印を表示する
                      echo '<li class="page-item">
                              <a class="page-link" href=contents.php?page='.($now_page - 1).' aria-label="前">
                                <span aria-hidden="true">&laquo;</span>
                              </a>
                            </li>'; 
                    }
                  }
                  
                  // ページネーションの表示
                  // $pagination->paging();
                  // for($i=1; $i<=$total_page; $i++) {
                  //   echo '<li class="page-item"><a class="page-link" href="contents.php?tag='.$tag.'?page='.$i.'">'.$i.'</a></li>';
                  // }

                  if(isset($now_page)) {
                    if($now_page != $total_page) {
                      // 後矢印を表示する
                      echo '<li class="page-item">
                            <a class="page-link" href=contents.php?page='.($now_page + 1). ' aria-label="次">
                              <span aria-hidden="true">&raquo;</span>
                            </a>
                          </li>';
                    }
                  } else {
                    echo '<li class="page-item">
                            <a class="page-link" href=contents.php?page='.($now_page + 1). ' aria-label="次">
                              <span aria-hidden="true">&raquo;</span>
                            </a>
                          </li>';
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