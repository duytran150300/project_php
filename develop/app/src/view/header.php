<?php
include './handleUser.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="../share/style.css">

    <style>
        .h-306 {
            height: 306px;
        }

        .old_price {
            color: #ccc;
            font-size: 16px;
        }

        .new_price {
            color: red;
            font-size: 18px;
        }

        .title {}

        .description {
            color: #b3878a;
        }

        .name_product {}

        .info {
            color: #ff9aa0;
            font-family: 'Great Vibes';
        }

        .name {
            color: #ff9aa0;

        }

        .addcart {
            color: #fff;
            background-color: #ff9aa0;
            border: #ff9aa0;
        }

        .addcart:hover {
            color: #ff9aa0;
            background-color: #ffff;
            border: #ff9aa0;
        }

        .cart {
            background-color: transparent;
            border: none;
            color: #926625;
            font-size: 18px;
        }

        .cart:hover {
            background-color: transparent;
            border: none;
            color: #5f441b;
        }

        #mainNav {
            border-bottom: 1px solid rgba(45, 45, 45, .1);
            transition: all .2s;
        }

        .navbar {
            background-color: #e599b6;
        }

        .navbar-nav {
            /* margin-left: -3rem !important; */
        }

        .logo {
            font-family: "Lobster", cursive;
        }

        #navcol-1 {
            margin-left: 12px;

        }

        .btn.show,
        .btn:first-child:active {
            color: none !important;
            border-color: none !important;
            background-color: none !important;
        }

        .border-none {
            border: none;
        }

        .dropdown-toggle::after {
            display: none;

        }

        .submenu {
            display: block;
            position: absolute;
            left: 0;
            top: 100%;
            height: 0;
            overflow: hidden;
            background: #ea9ebbb3;
            transition: .2s;
        }

        .nav-item .submenu li {
            display: block;
            position: relative;
            margin: 0;
            padding: 6px 20px;
            cursor: pointer;
            list-style: none;
        }

        .nav-item .submenu li:hover {
            background-color: #9f637ae0;
        }

        .nav-item:hover .submenu {
            display: block;
            transition: .2s;
            height: 114px;

        }

        .submenu li a {
            text-decoration: none;
            padding: 20px;
            color: #742623 !important;
            font-family: "Lobster", cursive;
        }

        .submenu li a:hover {
            color: #fff !important;
        }
    </style>
</head>

<body>
    <div class="app">
        <nav id="mainNav" class="navbar navbar-dark navbar-expand-md sticky-top py-3 shadow-lg">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="/"><span class="bs-icon-sm bs-icon-circle bs-icon-primary shadow d-flex justify-content-center align-items-center me-2 bs-icon"><svg class="bi bi-bezier" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M0 10.5A1.5 1.5 0 0 1 1.5 9h1A1.5 1.5 0 0 1 4 10.5v1A1.5 1.5 0 0 1 2.5 13h-1A1.5 1.5 0 0 1 0 11.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm10.5.5A1.5 1.5 0 0 1 13.5 9h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM6 4.5A1.5 1.5 0 0 1 7.5 3h1A1.5 1.5 0 0 1 10 4.5v1A1.5 1.5 0 0 1 8.5 7h-1A1.5 1.5 0 0 1 6 5.5v-1zM7.5 4a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z"></path>
                            <path d="M6 4.5H1.866a1 1 0 1 0 0 1h2.668A6.517 6.517 0 0 0 1.814 9H2.5c.123 0 .244.015.358.043a5.517 5.517 0 0 1 3.185-3.185A1.503 1.503 0 0 1 6 5.5v-1zm3.957 1.358A1.5 1.5 0 0 0 10 5.5v-1h4.134a1 1 0 1 1 0 1h-2.668a6.517 6.517 0 0 1 2.72 3.5H13.5c-.123 0-.243.015-.358.043a5.517 5.517 0 0 0-3.185-3.185z"></path>
                        </svg></span><span class=" logo">Elegant </span></a>
                <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>

                <div id="navcol-1" class="collapse navbar-collapse align-items-center justify-content-around">
                    <div class="">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item"><a class="nav-link active text-shadow" href="index.php">Trang chủ</a></li>
                            <li class="nav-item position-relative">
                                <a class="nav-link text-shadow" href="index.php?act=product">Sản Phẩm</a>
                                <ul class="submenu">
                                    <li><a href="link_submenu">Menu con 1</a></li>
                                    <li><a href="link_submenu">Menu con 2</a></li>
                                    <li><a href="link_submenu">Menu con 3</a></li>
                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link text-shadow" href="index.php?act=introduce">Giới Thiệu</a></li>
                            <li class="nav-item"><a class="nav-link text-shadow" href="index.php?act=news">Tin Tức</a></li>
                            <li class="nav-item"><a class="nav-link text-shadow" href="index.php?act=contact">Liên hệ</a></li>
                        </ul>
                    </div>

                    <div class="search col-lg-3 d-flex  align-items-center">
                        <input type="text" placeholder="Tìm kiếm..." class="input">
                        <button class="search-btn">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>

                    </div>
                    <div class="account d-flex align-items-center justify-content-around">
                        <div class="dropdown">
                            <button class="btn  dropdown-toggle cart" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-bell"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                        <button type="button" class="btn btn-primary cart" data-bs-toggle="modal" data-bs-target="#cartModal">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </button>
                        <div class="dropdown">
                            <?php if (isset($_SESSION['email'])) : ?>
                                <span>Hi, <?= $accountList['user'] ?></span>

                                <img src="../../../app/assets/img/avatar.jpg" alt="avatar" style="width: 40px; height: 40px; border-radius: 50%" class="btn btn-secondary dropdown-toggle bg-transparent border-none" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li><a class="dropdown-item" href="">Tài khoản</a></li>
                                    <li><a class="dropdown-item" href="../model/admin/account/login.php">Đăng xuất</a></li>
                                    <?php if (isset($accountList['user']) && $accountList['role'] === 1) : ?>
                                        <li><a class="dropdown-item" href="../model/admin/dashboard/index.php">Về Admin</a></li>

                                    <?php endif ?>
                                </ul>
                            <?php else : ?>
                                <button class="btn btn-secondary dropdown-toggle bg-transparent border-none" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" type="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-user"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li><a class="dropdown-item" href="../model/admin/account/login.php">Đăng nhập</a></li>
                                    <li><a class="dropdown-item" href="../model/admin/account/login.php">Đăng ký</a></li>
                                </ul>
                            <?php endif ?>
                        </div>

                        <!-- Modal giỏ hàng -->



                    </div>


                </div>
            </div>
        </nav>
        <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cartModalLabel">Giỏ hàng</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Nội dung giỏ hàng -->
                        <div id="cartItems">
                            <!-- Hiển thị thông tin sản phẩm trong giỏ hàng -->
                            <div class="product">
                                <img src="path_to_product_image" alt="Product Image">
                                <div class="product-details">
                                    <h6 class="product-name">Tên sản phẩm</h6>
                                    <p class="product-price">Giá sản phẩm</p>
                                </div>
                            </div>
                        </div>
                        <div id="cartTotal">
                            <div class="total">
                                <span class="total-label">Tổng tiền:</span>
                                <span class="total-amount">0</span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="button" class="btn btn-primary">Thanh toán</button>
                    </div>
                </div>
            </div>
        </div>