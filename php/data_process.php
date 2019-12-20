<?php
if(isset($_POST)) {
  $data_att = $_POST['data'];
}
switch($data_att) {
  case 'import':
    import();
  break;
  case 'export':
    export();
  break;
  default:
  return;
}

function import() {
  echo 'import!';
}
function export() {
  echo 'export!';
}

