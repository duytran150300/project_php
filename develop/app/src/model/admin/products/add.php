<?php
include 'handlerProduct.php';
addProduct();
$_SESSION['errors_addProduct'] = [];
$errors_addProduct = $_SESSION['errors_addProduct'];
$_SESSION['errors_addProduct'] = [];
?>
<div class="container my-5 ">
    <div class="row mt-5">
        <h2 class="text-center text-success fw-bold">THÊM SẢN PHẨM MỚI</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="ten_san_pham">Tên Sản Phẩm</label>
                <input type="text" name="product_name" id="ten_san_pham" class="form-control" value="">
            </div>
            <?php if (isset($errors_addProduct['product_name'])) { ?>
                <div style="color: red">
                    <?php echo $errors_addProduct['product_name']; ?>
                </div>
            <?php } ?>
            <div class="form-group">
                <label for="don_gia">Đơn Giá</label>
                <input type="number" name="price" id="don_gia" class="form-control" value="">

            </div>
            <?php if (isset($errors_addProduct['price'])) { ?>
                <div style="color: red">
                    <?php echo $errors_addProduct['price']; ?>
                </div>
            <?php } ?>
            <div class="form-group">
                <label for="giam_gia">Giảm Giá</label>
                <input type="number" name="promotion" id="giam_gia" class="form-control" value="">
            </div>
            <?php if (isset($errors_addProduct['promotion'])) { ?>
                <div style="color: red">
                    <?php echo $errors_addProduct['promotion']; ?>
                </div>
            <?php } ?>
            <div class="form-group">
                <label for="image">Hình ảnh</label>
                <input type="file" name="image" id="image" class="form-control" value="">
            </div>
            <?php if (isset($errors_addProduct['image'])) { ?>
                <div style="color: red">
                    <?php echo $errors_addProduct['image']; ?>
                </div>
            <?php } ?>
            <div class="form-group">
                <label for="ngay_nhap">Ngày Nhập</label>
                <input type="date" name="date" id="ngay_nhap" class="form-control" value="">
            </div>
            <?php if (isset($errors_addProduct['date'])) { ?>
                <div style="color: red">
                    <?php echo $errors_addProduct['date']; ?>
                </div>
            <?php } ?>
            <div class="form-group">
                <label for="mo_ta">Mô tả</label>
                <textarea type="text" rows="4" name="desc" id="mo_ta" class="form-control"></textarea>
            </div>
            <?php if (isset($errors_addProduct['desc'])) { ?>
                <div style="color: red">
                    <?php echo $errors_addProduct['desc']; ?>
                </div>
            <?php } ?>
            <div class="form-group">
                <label for="dac_biet">Đặc Biệt</label>
                <select name="special" id="dac_biet" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </div>

            <div class="form-group">
                <?php $category = select_type_all(false); ?>
                <label for="ten_loai">Tên Loại</label>
                <select name="ten_loai" id="ten_loai" class="form-control">
                    <option value="0">--Chọn tên danh mục--</option>
                    <?php foreach ($category as $value) : ?>
                        <? var_dump($value); ?>
                        <option value="<?= $value['ma_loai'] ?>"><?= $value['ten_loai'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="d-flex align-item-center justify-content-center mt-4">

                <input type="submit" name="add_product" class="d-block mx-auto mt-4 p-2  btn btn-outline-success rounded-2 submit" value="Thêm sản phẩm">
                <input type="reset" class="d-block mx-auto mt-4 p-2  btn btn-outline-warning rounded-2 submit" value="Nhập lại sản phẩm">
                <!-- <a href="" class="text-decoration-none"> <input type="button" class="d-block mx-auto mt-4 p-2 btn btn-primary rounded-2 submit" value="Danh sách danh mục"></a> -->
            </div>
        </form>
    </div>
</div>