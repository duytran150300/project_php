<?php
include "../../../controller/dao/pdo.php";
include "../../../controller/dao/account.php";
include 'handlerAccount.php';
forgotPassword();
$_SESSION['error_forgot_passwords'] = [];

$error_forgot_passwords = $_SESSION['error_forgot_passwords'];
$_SESSION['error_forgot_passwords'] = [];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Brand</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="../../../share/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../dashboard/test/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../dashboard/test/assets/fonts/fontawesome-all.min.css">
</head>

<body class="flex-column">
    <div class="wrapper">
        <div class="form-wrapper sign-in">
            <form action="" method="post">
                <h2>Forgot Password</h2>
                <div class="input-group">
                    <input type="email" name="email" />
                    <label for="">Email</label>
                </div>
                <?php if (isset($error_forgot_passwords['email'])) { ?>
                    <div style="color: red">
                        <?php echo $error_forgot_passwords['email']; ?>
                    </div>
                <?php } ?>
                <div class="input-group">
                    <input type="password" name="password" />
                    <label for="">Nhập mật khẩu mới</label>
                </div>
                <?php if (isset($error_forgot_passwords['password'])) { ?>
                    <div style="color: red">
                        <?php echo $error_forgot_passwords['password']; ?>
                    </div>
                <?php } ?>
                <div class="input-group">
                    <input type="password" name="password" />
                    <label for="">Nhập lại mật khẩu mới</label>
                </div>
                <?php if (isset($error_forgot_passwords['password'])) { ?>
                    <div style="color: red">
                        <?php echo $error_forgot_passwords['password']; ?>
                    </div>
                <?php } ?>

                <button type="submit" name="forgot_password">Sign In</button>

            </form>
        </div>


    </div>

    <footer class="bg-white sticky-footer">

    </footer>

    <script src="../../../share/login.js"></script>

</body>

</html>