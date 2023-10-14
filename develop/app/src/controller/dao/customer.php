<?php
function insert_customer($customer_name, $user, $password, $image, $email, $address, $phone_number,  $role)
{
    $sql = "INSERT INTO customer(customer_name, user, password, image,email,address, phone_number,role) 
    VALUES(?,?,?,?,?,?,?,?)";
    pdo_execute($sql, $customer_name, $user, $password, $image, $email, $address, $phone_number, $role);
}
function update_customer($customer_name, $user, $password, $image, $email, $address, $phone_number,  $role, $ma_kh)
{
    $sql = "UPDATE customer SET customer_name = ?, user = ?, password = ?, image = ?, email = ?,address = ?,phone_number = ?, role= ? 
    WHERE ma_kh = ?";
    pdo_execute($sql, $customer_name, $user, $password, $image, $email, $address, $phone_number,  $role, $ma_kh);
}

function delete_customer_id($ma_kh)
{
    $sql = "DELETE FROM customer WHERE ma_kh = ?";
    pdo_execute($sql, $ma_kh);
}

function select_customer__all()
{
    $sql = "SELECT * FROM customer";
    return pdo_query($sql);
}

function select_customer_by_id($ma_kh)
{
    $sql = "SELECT * FROM customer WHERE ma_kh = ?";
    return pdo_query_one($sql, $ma_kh);
}

function exist_customer($user_name)
{
    $sql = "SELECT COUNT(*) FROM customer WHERE user = ?";
    $exist_customer = pdo_query_value($sql, $user_name);
    return  $exist_customer;
}

function change_password_customer($password, $email)
{
    $sql = "UPDATE customer SET password = ? WHERE email = ?";
    pdo_execute($sql, $password, $email);
}
function select_customer_user_name($user_name)
{
    $sql = "SELECT * FROM customer WHERE user = ?";
    return pdo_query_one($sql, $user_name);
}
function create_acount_customer($user_name, $password)
{
    $sql = "INSERT INTO customer(user,password) VALUES(?,?)";
    pdo_execute($sql, $user_name, $password);
}
function update_customer_acount($email, $image_account, $address, $phone_number, $ma_kh)
{
    $sql = "UPDATE customer SET email = ?,image = ?,address = ?,phone_number = ? 
    WHERE ma_kh = ?";
    pdo_execute($sql, $email, $image_account, $address, $phone_number, $ma_kh);
}
