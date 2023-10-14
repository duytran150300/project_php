<?php
include 'header.php';
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'login':
            include '../account/login.php';
            break;

        case 'product':
            include '../products/list.php';
            break;
        case 'add_new_product':
            include '../products/add.php';
            break;
        case 'product_delete':
            include '../products/delete.php';
            break;
        case 'product_list_delete':
            include '../products/delete.php';
            break;
        case 'comment_delete':
            include '../comment/comment_delete.php';
            break;
        case 'product_edit':
            include '../products/edit.php';
            break;
        case 'product_list_edit';
            include '../products/edit.php';
            break;
        case 'comment':
            include '../comments/list.php';
            break;
        case 'customer':
            include '../customers/list.php';
            break;
        case 'add_new_customer':
            include '../customers/add.php';
            break;
        case 'customer_delete':
            include '../customers/delete.php';
            break;
        case 'update_customer':
            include '../customers/edit.php';
            break;
        default:
            include 'index.php';
            break;
    }
} else {

    include 'body.php';
}
include 'footer.php';
