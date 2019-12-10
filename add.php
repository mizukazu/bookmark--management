    <!-- Header -->
    <?php require_once('./parts/header.php'); ?>
    <!-- sidebar -->
    <?php require_once('./parts/sidebar.php'); ?>
    <!-- Topbar -->
    <?php require_once('./parts/topbar.php'); ?>

    <!-- Contents -->
    <!-- Begin Page Content -->
    <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">新規追加画面</h1>

    <form class="user" action="./php/register.php" method="POST">
      <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
          <input type="text" class="form-control" id="name" name="name" placeholder="サイト名" required>
        </div>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="url" name="url" placeholder="URL" required>
        </div>
      </div>
      <div class="form-group">
        <input type="text" class="col-sm-2 form-control form-control-user" id="tag" name="tag" placeholder="分類タグ" required>
      </div>

      <input type="submit" class="col-sm-2 btn btn-primary btn-user btn-block" value="追加">

    </form>

    <?php
      // エラーメッセージの出力 
      if(isset($_GET['error'])) {
        echo '<p class="mt-2 text-danger" style="font-weight: bold;">';
        echo $_GET['error'];
        echo '</p>';
      // 新規追加完了時のメッセージ出力
      } elseif(isset($_GET['success'])) {
        echo '<p class="mt-2" style="font-weight: bold;">';
        echo $_GET['success'];
        echo '</p>';
      }
      
    ?>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <?php require_once('./parts/footer.php') ?>