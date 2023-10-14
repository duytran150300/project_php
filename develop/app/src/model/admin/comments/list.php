<?php

require 'handlerComment.php';

?>
<div class="container my-5 ">
    <h2 class="text-center title text-success">DANH SÁCH BÌNH LUẬN</h2>

    <div class=" mt-5 text-end">

        <!-- <a href="../dashboard/index.php?act=add_new_product" type="button" class="btn btn-outline-success ">+THÊM MỚI</a> -->
    </div>

    <table class="table table-hover mt-3 table-bordered table-striped" border="1" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><input type="checkbox" class="check_all"></th>
                <th scope="col-1" width=5%>STT</th>
                <th scope="col">
                    Mã Bình Luận
                </th>
                <th scope="col">
                    Hình ảnh
                </th>
                <th scope="col">
                    Nội dung
                </th>
                <th scope="col">
                    Mã hàng
                </th>
                <th scope="col">
                    Mã tài khoản
                </th>
                <th scope="col">
                    Thời gian
                </th>
                <th scope="col">
                    Xóa
                </th>
            </tr>
        </thead>
        <tbody class="overflow-y-auto">
            <?php $result = comment_select_all();
            ?>
            <?php foreach ($result as $value) : ?>
                <tr>
                    <td> <input type="checkbox" id="checkInput" name="delete_check" value="<?= $value['ma_bl'] ?>"></td>
                    <td><?= $value['ma_bl'] ?></td>
                    <td><img src="..<?= $value['img'] ?>" alt="Ảnh mặc định" height="40"></td>
                    <td><textarea cols="30" rows="4" disabled><?= $value['content'] ?></textarea></td>
                    <td><?= $value['product_id'] ?></td>
                    <td><?= $value['ma_kh'] ?></td>
                    <td><?= $value['time_comment'] ?></td>

                    <td>
                        <a onclick="return del('<?php echo $value['product_name']; ?>')" href="index.php?ma_bl=<?php echo $value['ma_bl']; ?>?>&act=comment_delete" class="btn btn-outline-danger" name="delete">Xóa</href=>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <form action="delete_all.php " method="post">
        <div class="text-start mt-4 delete_all_category">
            <button type="submit" class="btn btn-outline-danger " name="dele_cate">XÓA BÌNH LUẬN</button>
        </div>
    </form>

</div>
<script>
    function del(name) {

        return confirm('Do you want to delete ? ')

    }
</script>