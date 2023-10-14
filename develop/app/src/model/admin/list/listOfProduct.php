<?php

require 'modal.php';
include '../../../controller/dao/product.php';
if (isset($_GET['action']) && $_GET['action'] === 'detail_list' && isset($_GET['detail_cate'])) {
    $titleList = $_GET['detail_cate'];
    $result = products_select_by_type_name($titleList);
}

?>
<div class="container my-5 ">
    <h2 class="text-center title text-success">DANH MỤC CHI TIẾT</h2>

    <div class=" mt-5 text-end">

    </div>
    <table class="table table-hover mt-3 table-bordered table-striped" border="1" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><input type="checkbox" class="check_all"></th>
                <th scope="col-1" width=5%>STT</th>
                <th scope="col-1">Mã Sản Phẩm</th>
                <th scope="col-1">Tên Sản Phẩm</th>
                <th scope="col-2">Giá Sản Phẩm</th>
                <th scope="col-1">Giảm Giá</th>
                <th scope="col-1">Ảnh Sản Phẩm</th>
                <th scope="col-1">Ngày Nhập</th>
                <th scope="col-1">Mô Tả</th>
                <th scope="col-1">Đặc Biệt</th>
                <th scope="col-1">Lượt Xem</th>
                <th scope="col-1">Tên Danh Mục</th>
                <th scope="col-1">Thao Tác</th>
                <th scope="col-1">Thao Tác</th>

            </tr>
        </thead>
        <tbody class="tbody__detail">
            <?php $result = products_select_by_type_name($titleList); ?>

            <?php foreach ($result as $key => $value) : ?>
                <?php $category = get_info_type($value['ma_loai']); ?>
                <tr>
                    <td><input type="checkbox" id="checkInput" name="delete_check" value="<?= $value['product_id'] ?>"></td>
                    <td><?php echo $key + 1 ?></td>
                    <td><?= $value['product_id'] ?></td>
                    <td><?= $value['product_name'] ?></td>
                    <td><?= $value['price'] ?></td>
                    <td><?= $value['promotion'] ?></td>
                    <td><img src="../../../share/uploads/<?= $value['img'] ?>" alt="img" class="w-100"></td>
                    <td><?= $value['date'] ?></td>
                    <td><?= $value['description'] ?></td>
                    <td><?= $value['special'] ?></td>
                    <td><?= $value['viewer'] ?></td>
                    <td><?= $category['ten_loai'] ?></td>
                    <td><a href="../dashboard/index.php?product_id=<?= $value['product_id']; ?>&act=product_list_edit" class="btn btn-outline-warning" name="edit">Sửa</a></td>
                    <td><a onclick="return del('<?= $value['product_name']; ?>')" href="../dashboard/index.php?product_id=<?= $value['product_id']; ?>&act=product_list_delete" class="btn btn-outline-danger" name="delete">Xóa</a></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <form action="" method="post">
        <div class="text-start mt-4 delete_all_category">
            <button type="submit" class="btn btn-outline-danger " name="dele_cate">XÓA DANH MỤC</button>
        </div>
    </form>

</div>
<script>
    function del(name) {

        return confirm('Do you want to delete ? ')

    }
</script>