<?php
session_start();

global $pass_user_register;
function login()
{
    if (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['sign_in'])) {
        $email_login = $_POST['email'];
        $password = $_POST['password'];
        var_dump($email_login);
        $email_account = select_user_by_email($email_login);
        if ($email_account && password_verify($password, $email_account['pass'])) {
            $_SESSION['email'] = $email_login;
            $_SESSION['password'] = $password;

            $cookieExpiration = time() + 3600;
            setcookie('email', $email_login, $cookieExpiration, '/');
            setcookie('password', $password, $cookieExpiration, '/');
            header('Location: ../../../view/index.php');
            exit();
        } else {
            echo 'Sai tài khoản hoặc mật khẩu';
        }
    }
}

function signup()
{
    $pass_user_register = [];
    $errors_signup = [];
    if (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['signup'])) {
        //lấy dl từ người dùng
        $user = $_POST['user'];
        if (!preg_match('/^[a-zA-Z0-9_\s]{5,}$/', $user)) {
            $errors_signup['user'] = 'Nhập đúng định dạng';
        }

        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors_signup['email'] = "Nhập đúng định dạng email";
        }
        $pass = $_POST['pass'];
        $_SESSION['pass'] = $pass;
        if (strlen(trim($pass)) < 6) {
            $errors_signup['pass'] = "Mật khẩu quá ngắn";
        }
        $re_pass = $_POST['re_pass'];
        var_dump($re_pass);
        if ($re_pass !== $pass) {
            $errors_signup['re_pass'] = "Yêu cầu mật khẩu phải trùng khớp";
        }
        $pass = $pass_user_register;
        // $errors_signup = $_SESSION['errors_signup'];
        if (count($errors_signup) === 0) {
            $user = $_POST['user'];
            $email = $_POST['email'];
            $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
            $role = $_POST['role'];
            var_dump($_SESSION['email']);
            insert_account($email, $user, $pass, $role);
            header('Location: login.php');
            exit();
        } else echo 'Đăng ký thất bại!!';
    }
}
function forgotPassword()
{
    $pass_user_register = [];
    $error_forgot_passwords = [];

    if (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['forgot_password'])) {
        $email = $_POST['email'];
        $pass = $_POST['password'];
        var_dump($email);

        $email_account = select_user_by_email($email);
        if ($email_account && password_verify($pass, $email_account['pass'])) {
            if ($email !== $email_account['email']) {
                $error_forgot_passwords['email'] = " Vui lòng nhập đúng email";
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error_forgot_passwords['email'] = "Nhập đúng định dạng email";
            }
        }

        if (strlen(trim($pass)) < 6) {
            $error_forgot_passwords['password'] = "Mật khẩu quá ngắn";
        }
        $re_pass = $_POST['re_pass'];
        if ($re_pass !== $pass) {
            $error_forgot_passwords['re_pass'] = "Yêu cầu mật khẩu phải trùng khớp";
        }
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $pass;

        $_SESSION['error_forgot_passwords'] = $error_forgot_passwords;

        if (count($error_forgot_passwords) === 0) {
            $email = $_POST['email'];
            $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
            update_account($email, $pass);
            header('Location: login.php');
            die();
        }
    } else {
        echo "Vui lòng kiểm tra lại";
    }
}
function confirm()
{
    $errors_confirm = [];
    if (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['confirm'])) {
        $email_confirm = $_POST['email_confirm'];
        if (!filter_var($email_confirm, FILTER_VALIDATE_EMAIL)) {
            $errors_confirm['email_confirm'] = "Nhập đúng định dạng email";
        }
        $result = select_user_all();
        foreach ($result as $item) {
            if (isset($item['email']) && $item['email'] === $email_confirm) {
                $errors_confirm['email_confirm'] = 'Nhập lại email!!';
            }
        }
        $_SESSION['errors_confirm'] = $errors_confirm;

        if (count($errors_confirm) === 0) {
            header('Location: forgot-password.php');
            exit();
        }
    }
    var_dump($errors_confirm['email_confirm']);
}
