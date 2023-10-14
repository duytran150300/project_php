<?php
require '../../../controller/dao/pdo.php';
require '../../../controller/dao/comment.php';

if (isset($_POST['delete_check'])) {
    $delete_check = $_POST['delete_check'];
    $array = explode(' ', $delete_check);
    $array_lenght = count($array);
    for ($i = 0; $i < $array_lenght; $i++) {
        $ma_bl = $array[$i];
        comment_delete($ma_bl);
    }
}
echo '<meta http-equiv="refresh" content="0;URL=\'index.php?act=product\'" />';
