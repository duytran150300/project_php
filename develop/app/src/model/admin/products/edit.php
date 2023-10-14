<?php
include 'handlerProduct.php';
editProduct();
$errors_editProduct = $_SESSION['errors_editProduct'];
$_SESSION['errors_editProduct'] = [];

if (isset($_GET['product_id']) && isset($_GET['act'])) :
    $result = products_select_by_id($_GET['product_id']);

?>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="product_id" value="<?= $result['product_id'] ?>">
        <div class="form-group">
            <label for="ten_san_pham">Tên Sản Phẩm</label>
            <input type="text" name="product_name" id="ten_san_pham" class="form-control" value="<?= $result['product_name'] ?>">
        </div>
        <div class="form-group">
            <label for="price">Đơn Giá</label>
            <input type="number" name="price" id="price" class="form-control" value="<?= $result['price'] ?>">
        </div>
        <div class="form-group">
            <label for="promotion">Giảm Giá</label>
            <input type="number" name="promotion" id="promotion" class="form-control" value="<?= $result['promotion'] ?>">
        </div>
        <div class="form-group">
            <label for="image">Hình ảnh</label>
            <input type="file" name="image" id="image" class="form-control" value=""><br>
            <input type="hidden" name="old_image" value="<?= $result['img'] ?>">
            Ảnh cũ: <br>
            <img src="../../../share/uploads/<?= $result['img'] ?>" height="200" alt="" class="">
        </div>
        <div class="form-group">
            <label for="date">Ngày Nhập</label>
            <?php
            $date = substr($result['date'], 0, 10);
            ?>
            <input type="date" name="date" id="date" class="form-control" value="<?= $date ?>">
        </div>
        <div class="form-group">
            <label for="desc">Mô tả</label>
            <textarea type="text" rows="4" name="desc" id="desc" class="form-control"><?= $result['description'] ?></textarea>
        </div>
        <div class="form-group">
            <label for="special">Đặc Biệt</label>
            <select name="special" id="special" class="form-control">
                <option value="1">1</option>
                <option value="2">2</option>
            </select>
        </div>
        <div class="form-group">
            <?php $result_category = select_type_all(false); ?>
            <?php if ($result_category) : ?>
                <label for="ten_loai">Tên Loại</label>
                <select name="ten_loai" id="ten_loai" class="form-control">
                    <option value="0">--Chọn tên danh mục--</option>
                    <?php foreach ($result_category as $item) : ?>
                        <option value="<?= $item['ma_loai'] ?>" <?php if ($item['ma_loai'] === $result['ma_loai']) {
                                                                    echo 'selected="selected"';
                                                                } ?>>
                            <?= $item['ten_loai'] ?>
                        </option>
                    <?php endforeach ?>
                </select>
            <?php else : ?>
                <p>Không có dữ liệu danh mục.</p>
            <?php endif; ?>

        </div>
        <div class="d-flex align-item-center justify-content-center mt-4">

            <input type="submit" name="edit_product" class="d-block mx-auto mt-4 p-2  btn btn-outline-success rounded-2 submit" value="Update sản phẩm">
            <input type="reset" class="d-block mx-auto mt-4 p-2  btn btn-outline-warning rounded-2 submit" value="Nhập lại danh mục">
            <!-- <a href="" class="text-decoration-none"> <input type="button" class="d-block mx-auto mt-4 p-2 btn btn-primary rounded-2 submit" value="Danh sách danh mục"></a> -->
        </div>
    </form>
<?php endif  ?>