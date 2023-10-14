<?php

require 'modal.php';


?>
<div class="container my-5 ">
    <h2 class="text-center title text-success">THÔNG TIN DANH MỤC</h2>

    <div class=" mt-5 text-end">

        <a href="index.php?action=add_cate" type="button" class="btn btn-outline-success ">+THÊM MỚI</a>
    </div>
    <table class="table table-hover text-center mt-3 table-bordered table-striped" border="1" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><input type="checkbox" class="check_all"></th>
                <th scope="col-1" width=5%>STT</th>
                <th scope="col-1">Mã Danh Mục</th>
                <th scope="col-2">Tên Danh Mục</th>
                <th scope="col-1">Thao Tác</th>
                <th scope="col-1">Thao Tác</th>

            </tr>
        </thead>
        <tbody class="tbody__detail ">
            <?php $result = select_type_all(false) ?>

            <?php foreach ($result as $key => $value) : ?>
                <tr>
                    <td><input type="checkbox" id="checkInput" name="delete_check" value="<?= $value['ma_loai'] ?>"></td>
                    <td><?php echo $key + 1 ?></td>

                    <td><?= $value['ma_loai'] ?></td>
                    <td>
                        <a href="index.php?ma_loai=&action=detail_list&detail_cate=<?= urlencode($value['ten_loai']) ?>" class="text-decoration-none" style="color: #858796" name="detail_cate" data-value="<?= $value['ten_loai'] ?>">
                            <?= $value['ten_loai'] ?>
                        </a>
                    </td>
                    <td><a href="index.php?ma_loai=<?php echo $value['ma_loai']; ?>&action=edit_cate" class="btn btn-outline-warning" name="update">Sửa</a></td>
                    <td>
                        <a onclick="return del('<?php echo $value['ten_loai']; ?>')" href="delete.php?ma_loai=<?php echo $value['ma_loai']; ?>" class="btn btn-outline-danger" name="delete">Xóa</a>
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