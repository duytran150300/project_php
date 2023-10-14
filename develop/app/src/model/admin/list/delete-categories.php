<?php
include "../../../controller/dao/pdo.php";
include "../../../controller/dao/category.php";


if (isset($_POST['dele_cate'])) {
    $dele_cate = $_POST['dele_cate'];
    $array = explode(' ', $dele_cate);
    $array_lenght = count($array);
    for ($i = 0; $i < $array_lenght; $i++) {
        $ma_loai = $array[$i];
        delete_type($ma_loai);
        echo '<script>window.location.href = "index.php";</script>';
    }
}
