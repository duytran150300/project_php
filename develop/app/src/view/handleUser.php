<?php
require '../controller/dao/pdo.php';
require '../controller/dao/account.php';
require  '../model/admin/account/handlerAccount.php';
login();
if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
    $accountList = select_user_by_email($email);
}
