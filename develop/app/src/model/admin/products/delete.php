<?php
require '../../../controller/dao/pdo.php';
require '../../../controller/dao/product.php';
if ($_GET['product_id']) {
    products_delete($_GET['product_id']);
    echo '<meta http-equiv="refresh" content="0;URL=\'index.php?act=product\'" />';
}
