<?php

require 'handlerCustomer.php';

?>
<div class="container my-5 ">
    <h2 class="text-center title text-success">DANH SÁCH KHÁCH HÀNG</h2>

    <div class=" mt-5 text-end">

        <a href="../dashboard/index.php?act=add_new_customer" type="button" class="btn btn-outline-success ">+THÊM MỚI</a>
    </div>

    <table class="table table-hover mt-3 table-bordered table-striped" border="1" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><input type="checkbox" class="check_all"></th>
                <th class="col-1" width=5%>STT</th>
                <th class="col-1">
                    Tên KH
                </th>
                <th class="col-1">
                    Mã KH
                </th>
                <th class="col-1">
                    Tên TK
                </th>
                <th class="col-1">
                    Mật khẩu
                </th>

                <th class="col-1">
                    Hình Ảnh
                </th>
                <th class="col-1">
                    Email
                </th>
                <th class="col-1">
                    Địa chỉ
                </th>
                <th class="co-1">
                    Điện thoại
                </th>

                <th class="col-1">
                    Vai trò
                </th>
                <th class="col-1">
                    Sửa
                </th>
                <th class="col-1">
                    Xóa
                </th>
            </tr>
        </thead>
        <tbody class="overflow-y-auto">
            <?php $result = select_customer__all();
            ?>

            <?php foreach ($result as  $key => $value) : ?>
                <tr>
                    <td> <input type="checkbox" id="checkInput" name="delete_check" value="<?= $value['ma_kh'] ?>"></td>
                    <td><?php echo $key + 1 ?></td>
                    <td><?= $value['ma_kh'] ?></td>
                    <td><?= $value['customer_name'] ?></td>
                    <td><?= $value['user'] ?></td>
                    <td><?= substr($value['password'], 0, 5) . '...' ?></td>
                    <td><img src="../../../share/uploads/<?= $value['image'] ?>" alt="" class="w-100"></td>
                    <td><?= $value['email'] ?></td>
                    <td><?= $value['address'] ?></td>
                    <td><?= $value['phone_number'] ?></td>
                    <td><?= $value['role'] ?></td>
                    <td><a href="./index.php?ma_kh=<?= $value['ma_kh'] ?>&act=update_customer" class="btn btn-outline-warning">Sửa</a> </td>
                    <td><a onclick="return del()" href="index.php?ma_kh=<?php echo $value['ma_kh']; ?>?>&act=customer_delete" class="btn btn-outline-danger" name="delete">Xóa</a></td>

                </tr>
            <?php endforeach ?>
            <!-- <button class="btn btn-primary mx-2" type="button" id="checkAllCheckbox">Chọn tất cả</button>
            <button class="btn btn-primary mx-2" type="reset" id="unSelectAll">Bỏ chọn tất cả</button>
            <form action="./khach_hang/delete_all_check.php" method="post">
                <input type="hidden" class="valueChecked" id="setChecked" name="delete_check" value="">
                <button class="btn btn-danger mx-2">Xóa mục đã chọn</button>
            </form> -->
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