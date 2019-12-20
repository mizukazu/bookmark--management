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

  $('.icon').on('click', (ele) => {
    const className = ele.target.className.split(' ')[1].split('-')[1];
    document.form.tag.value = classNameConverter(className);
  });
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

/**
 * クラス名を変換する関数
 */
function classNameConverter(className) {
  switch(className) {
    case 'html5':
      return 'HTML'
    case 'css3':
      return 'CSS'
    case 'js':
      return 'JavaScript';
    case 'php':
      return 'PHP';
    case 'blog':
      return 'Blog';
    case 'circle':
      return 'その他';
    case 'git':
      return 'Git';
    case 'github':
      return 'Github';
    case 'laravel':
      return 'Laravel';
    case 'wordpress':
      return 'WordPress';
    default:
      break;
  }
}