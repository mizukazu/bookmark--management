<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
  <div class="sidebar-brand-icon rotate-n-15">
    <!-- <i class="fas fa-laugh-wink"></i> -->
  </div>
  <div class="sidebar-brand-text mx-1">お気に入り管理画面</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - ダッシュボード -->
<li id="index" class="nav-item">
  <a class="nav-link" href="index.php">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>ダッシュボード</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  お気に入りカテゴリー
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li id="web" class="nav-item">
  <a class="nav-link" href="contents.php" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
    <i class="fas fa-fw fa-folder"></i>
    <span>WEB制作</span>
  </a>
  <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item active" href="contents.php">WEB制作全般</a>
      <a class="collapse-item" href="contents.php?tag=HTML">HTML</a>
      <a class="collapse-item" href="contents.php?tag=CSS">CSS</a>
      <a class="collapse-item" href="contents.php?tag=JavaScript">JavaScript</a>
      <a class="collapse-item" href="contents.php?tag=PHP">PHP</a>
    </div>
  </div>
</li>

<!-- Nav Item - ブログ -->
<li id="blog" class="nav-item">
  <a class="nav-link" href="contents.php?tag=BLOG">
    <i class="fas fa-fw fa-folder"></i>
    <span>ブログ</span></a>
</li>

<!-- Nav Item - その他 -->
<li id="other" class="nav-item">
  <a class="nav-link" href="contents.php?tag=">
    <i class="fas fa-fw fa-folder"></i>
    <span>その他</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Nav Item - その他 -->
<li id="add" class="nav-item">
  <a class="nav-link" id="add" href="add.php">
    <i class="fas fa-fw fa-plus"></i>
    <span>新規追加</span></a>
</li>

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->