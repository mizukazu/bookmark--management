$(document).ready(() => {
  navActive();
});

/**
 * 現在いるページのナビをアクティブ化する関数
 */
function navActive() {
  // 現在のページを取得
  const page = location.pathname.split('/')[3];
  const searchId = page.split('.')[0];
  
  // activeクラスを付与
  $('#' + searchId).addClass('active');
}