    <?php require_once(__DIR__ . '/php/json.php'); ?>
    <?php require_once(__DIR__ . '/php/functions.php'); ?>
    <?php require_once(__DIR__ . '/config/config.php'); ?>

    <!-- Header -->
    <?php require_once(__DIR__ . '/parts/header.php'); ?>
    <!-- sidebar -->
    <?php require_once(__DIR__ . '/parts/sidebar.php'); ?>
    <!-- Topbar -->
    <?php require_once(__DIR__ . '/parts/topbar.php'); ?>

    <?php $json = get_json(Config::$config['url']['data_url']); ?>

    <!-- Contents -->
    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800">管理画面</h1>

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
      <hr>
      <div class="row">
        <form class="col-lg-6 d-none d-lg-flex" action="php/data_process.php" method="POST" style="display:flex; flex-direction:column;">
          <button id="import-btn" class="btn btn-primary col-lg-4 mb-2 import-modal" name="data" value="import">インポート</button>
          <button id='export-btn' class="btn btn-primary col-lg-4 export-modal" name="data" value="export">エクスポート</button>
        </form>
      </div>
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
      <form action="php/data_process.php" method="POST" style="display:flex; flex-direction:column;">
        <input type="file">
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