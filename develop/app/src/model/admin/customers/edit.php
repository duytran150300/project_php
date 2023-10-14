<?php
include 'handlerCustomer.php';
editCustomer();

$errors_editCustomer = $_SESSION['errors_editCustomer'];
$_SESSION['errors_editCustomer'] = [];
if (isset($_GET['ma_kh']) && isset($_GET['act'])) {
    $result = select_customer_by_id($_GET['ma_kh']);
}
?>
<div class="container my-5 ">
    <div class="row mt-5">
        <h2 class="text-center text-success fw-bold">THÊM KHÁCH HÀNG MỚI</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="ma_kh" value="<?= $result['ma_kh'] ?>">
            <div class="form-group">
                <label for="">TÊN KHÁCH HÀNG</label>
                <input type="text" name="customer_name" class="form-control" value="<?= $result['customer_name']; ?>">
            </div>
            <?php if (isset($errors_editCustomer['customer_name'])) { ?>
                <div style="color: red">
                    <?php echo $errors_editCustomer['customer_name']; ?>
                </div>
            <?php } ?>
            <div class="form-group">
                <label for="">TÊN TÀI KHOẢN</label>
                <input type="text" name="user" class="form-control" value="<?= $result['user']; ?>" readonly>

            </div>

            <div class="form-group">
                <label for="">MẬT KHẨU</label>
                <input type="password" name="password" class="form-control" value="<?= $result['password']; ?>" readonly>
            </div>

            <div class="form-group">
                <label for="image">Hình ảnh</label>
                <input type="file" name="image" id="image" class="form-control" value=""><br>
                <input type="hidden" name="old_image" value="<?= $result['image'] ?>">
                Ảnh cũ: <br>
                <img src="../../../share/uploads/<?= $result['image'] ?>" height="200" alt="Old image" width="200">
            </div>
            <?php if (isset($errors_editCustomer['image'])) { ?>
                <div style="color: red">
                    <?php echo $errors_editCustomer['image']; ?>
                </div>
            <?php } ?>
            <div class="form-group">
                <label for="">EMAIL</label>
                <input type="email" name="email" class="form-control" value="<?= $result['email']; ?>">
            </div>
            <?php if (isset($errors_editCustomer['email'])) { ?>
                <div style="color: red">
                    <?php echo $errors_editCustomer['email']; ?>
                </div>
            <?php } ?>
            <div class="form-group">
                <label for="">Địa Chỉ</label>
                <input type="text" name="address" class="form-control" value="<?= $result['address']; ?>">

            </div>
            <?php if (isset($errors_editCustomer['address'])) { ?>
                <div style="color: red">
                    <?php echo $errors_editCustomer['address']; ?>
                </div>
            <?php } ?>
            <div class="form-group">
                <label for="">Điện Thoại</label>
                <input type="text" name="phone" class="form-control" value="0<?= $result['phone_number']; ?>">
            </div>
            <?php if (isset($errors_editCustomer['phone'])) { ?>
                <div style="color: red">
                    <?php echo $errors_editCustomer['phone']; ?>
                </div>
            <?php } ?>
            <div class="form-group">
                <label for="">VAI TRÒ</label>
                <input type="text" name="role" class="form-control" value="<?= $result['role']; ?>" readonly>
            </div>


            <div class="d-flex align-item-center justify-content-center mt-4">

                <input type="submit" name="edit_customer" class="d-block mx-auto mt-4 p-2  btn btn-outline-success rounded-2 submit" value="Sửa thông tin">
                <input type="reset" class="d-block mx-auto mt-4 p-2  btn btn-outline-warning rounded-2 submit" value="Nhập lại thông tin">
                <!-- <a href="" class="text-decoration-none"> <input type="button" class="d-block mx-auto mt-4 p-2 btn btn-primary rounded-2 submit" value="Danh sách danh mục"></a> -->
            </div>
        </form>
    </div>
</div>