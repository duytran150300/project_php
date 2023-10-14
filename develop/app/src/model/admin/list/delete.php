<?php
require '../../../controller/dao/category.php';
require '../../../controller/dao/pdo.php';
if ($_GET['ma_loai']) {
    delete_type($_GET['ma_loai']);
    echo '<script>window.location.href = "index.php";</script>';
}
