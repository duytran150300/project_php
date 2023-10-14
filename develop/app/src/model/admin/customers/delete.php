<?php
include '../../../controller/dao/pdo.php';
include '../../../controller/dao/product.php';
include '../../../controller/dao/category.php';
include '../../../controller/dao/comment.php';
include '../../../controller/dao/customer.php';

if (isset($_GET['ma_kh']) && $_GET['ma_kh'] !== "") {
    $ma_kh = $_GET['ma_kh'];
    delete_customer_id($ma_kh);
    comment_customer_delete($ma_kh);
    setcookie("message", "Xóa thành công", time() + 1, "/");
    echo '<meta http-equiv="refresh" content="0;URL=\'index.php?act=customer\'" />';
} else {
    setcookie("message", "Xóa thất bại", time() + 1, "/");
    echo '<meta http-equiv="refresh" content="0;URL=\'index.php?act=customer\'" />';
}
