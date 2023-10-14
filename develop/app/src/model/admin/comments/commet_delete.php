<?php
require '../../../controller/dao/pdo.php';
require '../../../controller/dao/comment.php';
if (isset($_GET['ma_bl']) && $_GET['ma_bl'] != "") {
    $ma_bl = $_GET['ma_bl'];
    comment_delete($ma_bl);
    setcookie("message", "Xóa thành công", time() + 1, "/");
    echo '<meta http-equiv="refresh" content="0;URL=\'index.php?act=product\'" />';
} else {
    setcookie("message", "Xóa thất bại", time() + 1, "/");
    echo '<meta http-equiv="refresh" content="0;URL=\'index.php?act=product\'" />';
}
