<?php

require 'handlerProduct.php';

?>
<div class="container my-5 ">
    <h2 class="text-center title text-success">THÔNG TIN SẢN PHẨM</h2>

    <div class=" mt-5 text-end">

        <a href="../dashboard/index.php?act=add_new_product" type="button" class="btn btn-outline-success ">+THÊM MỚI</a>
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
            <?php $result = products_select_all(false) ?>

            <?php foreach ($result as $key => $value) : ?>
                <?php $category = get_info_type($value['ma_loai']); ?>
                <tr>
                    <td><input type="checkbox" id="checkInput" name="delete_check" value="<?= $value['product_id'] ?>"></td>
                    <td><?php echo $key + 1 ?></td>

                    <th scope="col-1"><?= $value['product_id'] ?></th>
                    <th scope="col-1"><?= $value['product_name'] ?></th>
                    <th scope="col-2"><?= $value['price'] ?></th>
                    <th scope="col-1"><?= $value['promotion'] ?></th>
                    <th scope="col-1"><img src="../../../share/uploads/<?= $value['img'] ?>" alt="img" class="w-100"></th>
                    <th scope="col-1"><?= $value['date'] ?></th>
                    <th scope="col-1"><?= $value['description'] ?></th>
                    <th scope="col-1"><?= $value['special'] ?></th>
                    <th scope="col-1"><?= $value['viewer'] ?></th>
                    <th scope="col-1"><?= $category['ten_loai'] ?></th>
                    <td><a href="index.php?product_id=<?php echo $value['product_id']; ?>&act=product_edit" class="btn btn-outline-warning" name="edit">Sửa</a></td>
                    <td>
                        <a onclick="return del('<?php echo $value['product_name']; ?>')" href="index.php?product_id=<?php echo $value['product_id']; ?>?>&act=product_delete" class="btn btn-outline-danger" name="delete">Xóa</href=>
                    </td>
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