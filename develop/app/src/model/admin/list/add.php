<?php
include 'modal.php';
addCategory();

?>
<div class="container my-5 ">
    <div class="row mt-5">
        <h2 class="text-center text-success fw-bold">THÊM DANH MỤC SẢN PHẨM</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mt-4">
                <label for="">Mã danh mục: </label>
                <input class="form-control mt-2 " type="text" name="ma_loai" placeholder="Code..." disabled>
            </div>
            <div class="mt-4">
                <label for="">Tên danh muc:</label>
                <input class="form-control mt-2 " type="text" name="ten_loai" placeholder="Name...">
            </div>

            <div class="d-flex align-item-center justify-content-center mt-4">

                <input type="submit" name="add_cate" class="d-block mx-auto mt-4 p-2  btn btn-outline-success rounded-2 submit" value="Thêm danh mục">
                <input type="reset" class="d-block mx-auto mt-4 p-2  btn btn-outline-warning rounded-2 submit" value="Nhập lại danh mục">
                <!-- <a href="" class="text-decoration-none"> <input type="button" class="d-block mx-auto mt-4 p-2 btn btn-primary rounded-2 submit" value="Danh sách danh mục"></a> -->
            </div>
        </form>

    </div>


</div>