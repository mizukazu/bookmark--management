    <?php require_once(__DIR__ . '/php/json.php'); ?>
    <?php require_once(__DIR__ . '/php/functions.php'); ?>
    <?php require_once(__DIR__ . '/config/config.php'); ?>

    <!-- Header -->
    <?php require_once(__DIR__ . '/parts/header.php'); ?>
    <!-- sidebar -->
    <?php require_once(__DIR__ . '/parts/sidebar.php'); ?>
    <!-- Topbar -->
    <?php require_once(__DIR__ . '/parts/topbar.php'); ?>

    <?php $json = get_json(Config::getFirstDataUrl()); ?>


    <!-- Contents -->
    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800">管理画面<i class="fas fa-question-circle ml-1 d-none d-lg-inline" style="font-size:0.6em;" data-toggle="tooltip" data-placement="right" title="管理画面ではツールのデータの確認や各種設定を行う事が出来ます。"></i></h1>
      <div class="row">

        <div class="col-lg-3">
          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-12 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-0">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="h5 pt-2 mb-0 font-weight-bold text-gray-800">総件数 <?php echo count($json); ?>件</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-9">

          <!-- Basic Card Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">現在登録されている分類タグ一覧</h6>
            </div>
            <div class="card-body">

              <div class="row">
                <?php show_card($json); ?>
              </div>
              <!-- /.row -->
            </div>
          </div>
        </div>
      </div>
      <!-- <hr>
      <h2 class="h3 mb-4 text-gray-800">設定</h2>
      <div class="row">
      </div> -->
      <hr>
      <h2 class="h3 mb-4 text-gray-800">データの設定<i class="fas fa-question-circle ml-1 d-none d-lg-inline" style="font-size:0.6em;" data-toggle="tooltip" data-placement="right" title="データの確認や設定を行う事が出来ます。"></i></h2>
      <div class="row">
      <div class="col-lg-5">
          <h3 class="h5 mb-4 text-gray-800">現在インポートされているデータ</h3>
          <select class="col-lg-5">
            <?php
            // foreach(Config::$config['url']['data_url'] as $data) {
            //   echo '<option>'.basename($data).'</option>';
            // }
            ?>
          </select>
        </div>
        <form class="col-lg-2 offset-5 d-none d-lg-flex" action="php/data_process.php" method="POST" style="display:flex; flex-direction:column;">
          <div class="row">
            <label>データの取り込み</label>
            <button id="import-btn" class="btn btn-primary col-lg-12 mb-2 import-modal" name="data" value="import" disabled>インポート</button>
            <label>データの出力</label>
            <button id="export-btn" class="btn btn-primary col-lg-12 export-modal" name="data" value="export" disabled>エクスポート</button>
          </div>
        </form>
      </div>
      <?php
      if(isset($_GET['success'])) {
      echo '<p class="mt-3">'.$_GET['success'].'</>';
      }
      if(isset($_GET['error'])) {
      echo '<h2 class="mt-3">エラー</h2>';
      echo '<p class="text-danger" style="font-weight: 700;">';
      echo '※'.$_GET['error'];
      echo '</p>';
      }
      ?>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->


    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <?php require_once('./parts/footer.php') ?>

    <!-- インポート用のモーダル -->
    <div id="import-modal" style="display:none;">
      <p style="text-align:center;">
        データのインポートを行います。<br>
        指定のJSON形式のファイルを選択してください。
      </p>
      <hr>
      <form action="php/data_process.php" method="POST" style="display:flex; flex-direction:column;" enctype="multipart/form-data">
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="customFile" name='file' required>
          <label class="custom-file-label" for="customFile">ファイルを選択</label>
        </div>
        <div class="mt-3" style="display:flex; justify-content:center;">
          <button type="submit" class="btn btn-primary mr-1" name="data" value="import">インポート</button>
          <button type="button" class="btn btn-default ml-1 cancel">キャンセル</button>
        </div>
      </form>
    </div>

    <!-- エクスポート用のモーダル -->
    <div class="export-modal" id="export-modal" style="display:none;">
      <p style="text-align:center;">
        データのエクスポートを行います。<br>
        よろしいですか？
      </p>
      <hr>
      <form action="php/data_process.php" method="POST" style="display:flex; justify-content:center;">
        <button type="submit" class="btn btn-primary mr-1" name="data" value="export">エクスポート</button>
        <button type="button" class="btn btn-default ml-1 cancel">キャンセル</button>
      </form>
    </div>