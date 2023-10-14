<?php
include "../../../controller/dao/pdo.php";
include "../../../controller/dao/account.php";
include 'handlerAccount.php';
login();
$_SESSION['errors_login'] = [];
$errors_login = $_SESSION['errors_login'];
$_SESSION['errors_login'] = [];

// signup();
// // $_SESSION['errors_signup'] = [];
// $errors_signup = $_SESSION['errors_signup'];
// // $_SESSION['errors_signup'] = [];
// var_dump($errors_signup);
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
        <div class="form-wrapper sign-in flex-column">
            <form action="" method="post">
                <h2>Sign In</h2>
                <div class="input-group">
                    <input type="email" name="email" />
                    <label for="">Email</label>
                </div>
                <?php if (isset($errors_login['email'])) { ?>
                    <div style="color: red">
                        <?php echo $errors_login['email']; ?>
                    </div>
                <?php } ?>
                <div class="input-group">
                    <input type="password" name="password" />
                    <label for="">Mật khẩu</label>
                </div>
                <?php if (isset($errors_login['password'])) { ?>
                    <div style="color: red">
                        <?php echo $errors_login['password']; ?>
                    </div>
                <?php } ?>

                <!-- start modal confirm password -->
                <!-- Button trigger modal -->

                <div class="forgot-password my-3">
                    <a class="text-white cursor-pointer" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Quên mật khẩu
                    </a>
                    <!-- Modal -->

                    <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog ">
                            <div class="modal-content wrapper">
                                <?php
                                confirm();
                                $errors_confirm['errors_confirm'] = [];
                                $errors_confirm = $errors_confirm['errors_confirm'];
                                $errors_confirm['errors_confirm'] = [];
                                ?>
                                <div class="modal-header">
                                    <h5 class="modal-title text-dark" id="exampleModalLabel">Xác nhận email</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="" method="post">
                                    <div class="input-group text-dark">
                                        <input type="email" name="email_confirm" class="text-color ip-border" />
                                        <label class="text-color" for="">Email</label>
                                    </div>
                                    <?php if (isset($errors_confirm['email_confirm'])) { ?>
                                        <div style="color: red">
                                            <?php echo $errors_confirm['email_confirm']; ?>
                                        </div>
                                    <?php } ?>
                                </form>
                                <div class="modal-footer">
                                    <button type="submit" class="button forgot-password" name="confirm">Confirm</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- end modal confirm password -->
                <div class="remember d-flex w-100 flex-start">
                    <label><input type="checkbox" /> Remember me</label>
                </div>
                <button type="submit" name="sign_in">Sign In</button>
                <div class="signUp-link">
                    <p>Don't have an acount? <a href="#" class="SignUpBtn-link">Sign Up</a></p>
                </div>
                <div class="social-platform">
                    <p>Or sign in with</p>
                    <div class="social-icons">
                        <a href="#"><i class="fa-brands fa-google" style="color: #3866c2;"></i></a>
                        <a href="#"><i class="fa-brands fa-facebook" style="color: #113064;"></i></a>
                        <a href="#"><i class="fa-brands fa-twitter" style="color: #2ec2d6;"></i></a>
                    </div>
                </div>
            </form>
        </div>

        <div class="form-wrapper sign-up">

            <form action="" method="post">
                <h2>Sign Up</h2>
                <div class="input-group">
                    <input type="text" name="user" />
                    <label for="">Tên tài khoản</label>
                </div>
                <?php if (isset($errors_signup['user'])) { ?>
                    <div style="color: red">
                        <?php echo $errors_signup['user']; ?>
                    </div>
                <?php } ?>
                <div class="input-group">
                    <input type="text" name="email" />
                    <label for="">Email</label>
                </div>
                <?php if (isset($errors_signup['email'])) { ?>
                    <div style="color: red">
                        <?php echo  $errors_signup['email']; ?>
                    </div>
                <?php } ?>

                <div class="input-group">
                    <input type="password" name="pass" />
                    <label for="">Mật khẩu</label>
                </div>
                <?php if (isset($errors_signup['pass'])) { ?>
                    <div style="color: red">
                        <?php echo $errors_signup['pass']; ?>
                    </div>
                <?php } ?>
                <div class="input-group">
                    <input type="password" name="re_pass" />
                    <label for="">Nhập lại mật khẩu</label>
                </div>
                <?php if (isset($errors_signup['re_pass'])) { ?>
                    <div style="color: red">
                        <?php echo $$errors_signup['re_pass']; ?>
                    </div>
                <?php } ?>
                <input type="hidden" name="role" value="0" readonly />

                <div class="remember">
                    <label><input type="checkbox" /> I agree to the terms & conditions.</label>
                </div>
                <button type="submit" name="signup">Sign Up</button>
                <div class="signUp-link">
                    <p>Aldready have an acoount? <a href="#" class="SignInBtn-link">Sign In</a></p>
                </div>
            </form>
        </div>
    </div>

    <footer class="bg-white sticky-footer">

    </footer>
    <script src="../../../share/login.js"></script>
    <script src="../dashboard/test/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../dashboard/test/assets/js/chart.min.js"></script>
    <script src="../dashboard/test/assets/js/bs-init.js"></script>
    <script src="../dashboard/test/assets/js/theme.js"></script>
</body>

</html>