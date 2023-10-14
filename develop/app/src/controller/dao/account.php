<?php
function insert_account($email, $user, $pass, $role)
{
    $sql = "INSERT INTO user(email,user,pass,role) VALUES(?,?,?,?)";
    pdo_execute($sql, $email, $user, $pass, $role);
}
function select_user_all()
{
    $sql = "SELECT * FROM user";
    return pdo_query($sql);
}
function select_user_by_email($email)
{
    $sql = "SELECT * FROM user WHERE email = ?";
    return pdo_query_one($sql, $email);
}

function update_account($email, $pass,)
{
    $sql = "UPDATE user SET pass = ? WHERE email = ?";
    pdo_execute($sql, $email, $pass,);
}
