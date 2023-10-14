<?php
// $sortDescending = true là sắp xếp theo giảm dần là false là ngược lại
function select_type_all($sortDescending)
{
    $sql = "SELECT * FROM category ORDER BY ma_loai " . ($sortDescending ? "DESC" : "ASC");;
    $result = pdo_query($sql);
    return $result;
}
function insert_type($ten_loai)
{
    $sql = "INSERT INTO category(ten_loai) VALUES(?)";
    pdo_execute($sql, $ten_loai);
}
function delete_type($ma_loai)
{
    $sql = "DELETE FROM category WHERE ma_loai = ?";
    pdo_execute($sql, $ma_loai);
}
function get_info_type($ma_loai)
{
    $sql = "SELECT * FROM category WHERE ma_loai = ?";
    return pdo_query_one($sql, $ma_loai);
}
function update_type($ten_loai, $ma_loai)
{
    $sql = "UPDATE category SET ten_loai = ? WHERE ma_loai = ?";
    return pdo_execute($sql, $ten_loai, $ma_loai);
}
