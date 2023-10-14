<?php
include "../../../controller/dao/pdo.php";
include "../../../controller/dao/category.php";
function addCategory()
{
    ob_start();
    $errors = array();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_cate'])) {
        if (empty($_POST['ten_loai']) && !empty(trim($_POST['ten_loai']))) {
            $errors['ten_loai'] = "Không để trống tên danh mục";
        }
        $ten_loai = $_POST['ten_loai'];
        insert_type($ten_loai);
        echo '<meta http-equiv="refresh" content="0;URL=\'index.php\'" />';
        ob_end_flush();
    }
}
function editCategory()
{
    $errors = array();
    if (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['edit_cate'])) {
        if (empty($_POST['ten_loai']) && !empty(trim($_POST['ten_loai']))) {
            $errors['ten_loai'] = "Không để trông tên danh mục";
        }
        $ma_loai = $_POST['ma_loai'];
        $ten_loai = $_POST['ten_loai'];
        update_type($ten_loai, $ma_loai);
        echo '<script>window.location.href = "index.php";</script>';
    }
}
function deleteAllCate()
{
    if (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['dele_cate'])) {
        $dele_cate = $_POST['dele_cate'];
        $array = explode(' ', $dele_cate);
        $array_lenght = count($array);
        for ($i = 0; $i < $array_lenght; $i++) {
            $ma_loai = $array[$i];
            delete_type($ma_loai);
        }
        echo '<script>window.location.href = "index.php";</script>';
    }
}
