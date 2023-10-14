<?php
include '../../../controller/dao/pdo.php';
include '../../../controller/dao/product.php';
include '../../../controller/dao/category.php';
include '../../../controller/dao/comment.php';
include '../../../controller/dao/customer.php';



function addComment()
{
    $errors_editComment = [];
    if (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['add_product'])) {
        if (empty($_POST['product_name'])) {
            $errors_editComment['product_name'] = "Trường này không để trống";
        }
        if (empty($_POST['price'])) {
            $errors_editComment['price'] = " Trường này không để trống";
        }

        if (!is_numeric($_POST['price'])) {
            $errors_editComment['price'] = "Trường này phải là số";
        }
        if (intval($_POST['price']) <= 0) {
            $errors_editComment['price'] = "Trường này phải là số dương";
        }
        $file_name = '';
        if (isset($_FILES['image'])) {
            $target_dir = '../../../share/uploads/';
            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0777, true);
            }
            $file = $_FILES['image'];
            $file_name = $file['name'];
            $file_type = ['jpg', 'png', 'gif', 'jpeg'];
            $file_extention = pathinfo($file_name, PATHINFO_EXTENSION);
            if ($file['error'] !== UPLOAD_ERR_OK) {
                $errors_editComment['image'] = 'Lỗi trong quá trình tải file ';
            } elseif ($file['size'] > 5000000) {
                $errors_editComment['image'] = 'Kích thước file quá lớn';
            } elseif (!in_array($file_extention, $file_type)) {
                $errors_editComment['image'] = 'Định dạng file không hợp lệ';
            } else {
                move_uploaded_file($file['tmp_name'], $target_dir . $file_name);
            }
        }

        if (empty($_POST['desc'])) {
            $errors_editComment['desc'] = "Nhập mô tả sản phẩm";
        }
        if (empty($_POST['date'])) {
            $errors_editComment['date'] = "Vui lòng chọn ngày nhập";
        }
        $_SESSION['errors_editComment'] = $errors_editComment;

        $product_name = $_POST['product_name'];
        $price = $_POST['price'];
        $promotion = $_POST['promotion'];
        $date = ($_POST['date']);
        $desc = $_POST['desc'];
        $special = ($_POST['special']);
        $ten_loai = ($_POST['ten_loai']);
        if (count($errors_editComment) === 0) {
            comment_insert($product_name, $price, $promotion, $file_name, $date, $desc, $special, $ten_loai);
            echo '<meta http-equiv="refresh" content="0;URL=\'index.php?act=product\'" />';
            exit();
        } else {
            echo "Vui lòng kiểm tra lại";
        }
    }
}
function editProduct()
{
    $errors_editComment = [];
    if (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['edit_product'])) {
        if (empty($_POST['product_name'])) {
            $errors_editComment['product_name'] = "Trường này không để trống";
        }
        if (empty($_POST['price'])) {
            $errors_editComment['price'] = " Trường này không để trống";
        }

        if (!is_numeric($_POST['price'])) {
            $errors_editComment['price'] = "Trường này phải là số";
        }
        if (intval($_POST['price']) <= 0) {
            $errors_editComment['price'] = "Trường này phải là số dương";
        }

        // $file_name = '';
        // if (isset($_FILES['image'])) {
        //     $target_dir = '../../../share/uploads/';
        //     if (!file_exists($target_dir)) {
        //         mkdir($target_dir, 0777, true);
        //     }
        //     $file = $_FILES['image'];
        //     $file_name = $file['name'];
        //     $file_type = ['jpg', 'png', 'gif', 'jpeg'];
        //     $file_extention = pathinfo($file_name, PATHINFO_EXTENSION);
        //     if ($file['error'] !== UPLOAD_ERR_OK) {
        //         $errors_editComment['image'] = 'Lỗi trong quá trình tải file ';
        //     } elseif ($file['size'] > 5000000) {
        //         $errors_editComment['image'] = 'Kích thước file quá lớn';
        //     } elseif (!in_array($file_extention, $file_type)) {
        //         $errors_editComment['image'] = 'Định dạng file không hợp lệ';
        //     } else {
        //         move_uploaded_file($file['tmp_name'], $target_dir . $file_name);
        //     }
        // }


        if (empty($_POST['desc'])) {
            $errors_editComment['desc'] = "Nhập mô tả sản phẩm";
        }
        if (empty($_POST['date'])) {
            $errors_editComment['date'] = "Vui lòng chọn ngày nhập";
        }
        $_SESSION['errors_editComment'] = $errors_editComment;

        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $price = $_POST['price'];
        $promotion = $_POST['promotion'];
        $date = ($_POST['date']);
        $oldImage = $_POST['old_image'];
        $desc = $_POST['desc'];
        $special = ($_POST['special']);
        $ten_loai = ($_POST['ten_loai']);

        $file_name = '';

        if ($_FILES['image']['error'] === 4) {
            $file_name = $oldImage; // Gán giá trị của $oldImage cho $file_name
        } else {
            $target_dir = '../../../share/uploads/';
            $file = $_FILES['image'];
            $file_name = $file['name'];
            $file_type = ['jpg', 'png', 'gif', 'jpeg'];
            $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);

            // Kiểm tra các điều kiện về tệp tin mới được tải lên
            if ($file['error'] !== UPLOAD_ERR_OK) {
                $errors_editComment['image'] = 'Lỗi trong quá trình tải file';
            } elseif ($file['size'] > 5000000) {
                $errors_editComment['image'] = 'Kích thước file quá lớn';
            } elseif (!in_array($file_extension, $file_type)) {
                $errors_editComment['image'] = 'Định dạng file không hợp lệ';
            } else {
                $new_file_path = $target_dir . $file_name;

                // Xóa tệp tin ảnh cũ
                if (!empty($oldImage)) {
                    $old_file_path = $target_dir . $oldImage;
                    if (file_exists($old_file_path)) {
                        unlink($old_file_path);
                    }
                }

                move_uploaded_file($file['tmp_name'], $new_file_path);
            }
        }
        if (count($errors_editComment) === 0) {
            update_products($product_name, $price, $promotion, $file_name, $date, $desc, $special, $ten_loai, $product_id);
            echo '<meta http-equiv="refresh" content="0;URL=\'index.php?act=product\'" />';
            exit();
        } else {
            var_dump($errors_editComment);
        }
    }
}
