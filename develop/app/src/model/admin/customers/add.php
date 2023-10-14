<?php
include 'handlerCustomer.php';
addCustomer();

$errors_addCustomer = $_SESSION['errors_addCustomer'];
$_SESSION['errors_addCustomer'] = [];
?>
<div class="container my-5 ">
    <div class="row mt-5">
        <h2 class="text-center text-success fw-bold">THÊM KHÁCH HÀNG MỚI</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">TÊN KHÁCH HÀNG</label>
                <input type="text" name="customer_name" class="form-control" value="">
            </div>
            <?php if (isset($errors_addCustomer['customer_name'])) { ?>
                <div style="color: red">
                    <?php echo $errors_addCustomer['customer_name']; ?>
                </div>
            <?php } ?>
            <div class="form-group">
                <label for="">TÊN TÀI KHOẢN</label>
                <input type="text" name="user" class="form-control" value="">

            </div>
            <?php if (isset($errors_addCustomer['user'])) { ?>
                <div style="color: red">
                    <?php echo $errors_addCustomer['user']; ?>
                </div>
            <?php } ?>
            <div class="form-group">
                <label for="">MẬT KHẨU</label>
                <input type="password" name="password" class="form-control" value="">
            </div>
            <?php if (isset($errors_addCustomer['password'])) { ?>
                <div style="color: red">
                    <?php echo $errors_addCustomer['password']; ?>
                </div>
            <?php } ?>
            <div class="form-group">
                <label for="">Hình ảnh</label>
                <input type="file" name="image" class="form-control" value="">
            </div>
            <?php if (isset($errors_addCustomer['image'])) { ?>
                <div style="color: red">
                    <?php echo $errors_addCustomer['image']; ?>
                </div>
            <?php } ?>
            <div class="form-group">
                <label for="">EMAIL</label>
                <input type="email" name="email" class="form-control" value="">
            </div>
            <?php if (isset($errors_addCustomer['email'])) { ?>
                <div style="color: red">
                    <?php echo $errors_addCustomer['email']; ?>
                </div>
            <?php } ?>
            <div class="form-group">
                <label for="">Địa Chỉ</label>
                <input type="text" name="address" class="form-control" value="">

            </div>
            <?php if (isset($errors_addCustomer['address'])) { ?>
                <div style="color: red">
                    <?php echo $errors_addCustomer['address']; ?>
                </div>
            <?php } ?>
            <div class="form-group">
                <label for="">Điện Thoại</label>
                <input type="text" name="phone" class="form-control" value="">
            </div>
            <?php if (isset($errors_addCustomer['phone'])) { ?>
                <div style="color: red">
                    <?php echo $errors_addCustomer['phone']; ?>
                </div>
            <?php } ?>
            <div class="form-group">
                <label for="">VAI TRÒ</label>
                <input type="text" name="role" class="form-control" value="0" readonly>
            </div>


            <div class="d-flex align-item-center justify-content-center mt-4">

                <input type="submit" name="add_customer" class="d-block mx-auto mt-4 p-2  btn btn-outline-success rounded-2 submit" value="Thêm khách hàng">
                <input type="reset" class="d-block mx-auto mt-4 p-2  btn btn-outline-warning rounded-2 submit" value="Nhập lại thông tin">
                <!-- <a href="" class="text-decoration-none"> <input type="button" class="d-block mx-auto mt-4 p-2 btn btn-primary rounded-2 submit" value="Danh sách danh mục"></a> -->
            </div>
        </form>
    </div>
</div>