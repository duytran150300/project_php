<?php
include '../../../controller/dao/pdo.php';
include '../../../controller/dao/product.php';
include '../../../controller/dao/category.php';
include '../../../controller/dao/comment.php';
include '../../../controller/dao/customer.php';



function addCustomer()
{

    $errors_addCustomer = [];
    if (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['add_customer'])) {
        $customer_name = $_POST['customer_name'];

        if ((trim($customer_name)) && empty($customer_name)) {
            $errors_addCustomer['name'] = 'Vui lòng nhập tên khách hàng';
            // Thêm dòng gỡ lỗi để in ra giá trị của $customer_name
            echo "Giá trị của product_name: " . $customer_name;
        }
        $user = $_POST['user'];
        if (empty($user) || empty(trim($user))) {
            $errors_addCustomer['user'] = 'Vui lòng nhập tên tài khoản';
        }
        if (strlen($user) <= 5) {
            $errors_addCustomer['user'] = 'Vui lòng nhập tên tài khoản lớn hơn 5 ký tự';
        }
        $password = $_POST['password'];
        if (strlen(trim($password)) < 6) {
            $errors_addCustomer['password'] = "Mật khẩu quá ngắn";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
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
                $errors_addCustomer['image'] = 'Lỗi trong quá trình tải file ';
            } elseif ($file['size'] > 5000000) {
                $errors_addCustomer['image'] = 'Kích thước file quá lớn';
            } elseif (!in_array($file_extention, $file_type)) {
                $errors_addCustomer['image'] = 'Định dạng file không hợp lệ';
            } else {
                move_uploaded_file($file['tmp_name'], $target_dir . $file_name);
            }
        }

        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors_addCustomer['email'] = "Nhập đúng email";
        }
        $address = $_POST['address'];
        if (empty($address) || empty(trim($address))) {
            $errors_addCustomer['address'] = 'Vui lòng nhập tên tài khoản';
        }
        $phone = $_POST['phone'];
        if ((!preg_match('/^0\d{9}$/', $phone)) || trim($phone) !== preg_replace('/\s+/', '', $phone)) {
            $errors_addCustomer['phone'] = 'Số điện thoại không hợp lệ';
        }


        $_SESSION['errors_addCustomer'] = $errors_addCustomer;



        $role = $_POST['role'];
        if (count($errors_addCustomer) === 0) {
            insert_customer($customer_name, $user, $hashedPassword, $file_name, $email, $address, $phone, $role);
            echo '<meta http-equiv="refresh" content="0;URL=\'index.php?act=customer\'" />';


            exit();
        } else {
            echo "Vui lòng kiểm tra lại";
        }
    }
}
function editCustomer()
{
    $errors_editCustomer = [];
    if (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['edit_customer'])) {
        $customer_name = $_POST['customer_name'];

        if ((trim($customer_name)) && empty($customer_name)) {
            $errors_editCustomer['name'] = 'Vui lòng nhập tên khách hàng';
            // Thêm dòng gỡ lỗi để in ra giá trị của $customer_name
            echo "Giá trị của product_name: " . $customer_name;
        }

        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors_editCustomer['email'] = "Nhập đúng email";
        }
        $address = $_POST['address'];
        if (empty($address) || empty(trim($address))) {
            $errors_editCustomer['address'] = 'Vui lòng nhập tên tài khoản';
        }
        $phone = $_POST['phone'];
        if ((!preg_match('/^0\d{9}$/', $phone)) || trim($phone) !== preg_replace('/\s+/', '', $phone)) {
            $errors_editCustomer['phone'] = 'Số điện thoại không hợp lệ';
        }

        $_SESSION['errors_editCustomer'] = $errors_editCustomer;

        $ma_kh = $_POST['ma_kh'];
        $password = $_POST['password'];
        $user = $_POST['user'];
        $oldImage = $_POST['old_image'];
        $role = $_POST['role'];


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
                $errors_editCustomer['image'] = 'Lỗi trong quá trình tải file';
            } elseif ($file['size'] > 5000000) {
                $errors_editCustomer['image'] = 'Kích thước file quá lớn';
            } elseif (!in_array($file_extension, $file_type)) {
                $errors_editCustomer['image'] = 'Định dạng file không hợp lệ';
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
        if (count($errors_editCustomer) === 0) {
            update_customer($customer_name, $user, $password, $file_name, $email, $address, $phone, $role, $ma_kh);
            echo '<meta http-equiv="refresh" content="0;URL=\'index.php?act=customer\'" />';
            exit();
        } else {
            echo "Đã có lỗi xảy ra";
        }
    }
}
