$(document).ready(() => {
  navActive();

  $('.import-modal').modaal({
    content_source: '#import-modal',
    width: 500
  });

  $('.export-modal').modaal({
    content_source: '#export-modal',
    width: 500
  });

  $('.cancel').on('click', () => {
    $('.import-modal').modaal('close');
    $('.export-modal').modaal('close');
  })
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