<?php

function comment_insert($content, $img, $product_id, $ma_kh, $time_comment)
{
    $sql = "INSERT INTO comment(content,img,product_id ,ma_kh,time_comment) VALUES(?,?,?,?,?)";
    pdo_execute($sql, $content, $img, $product_id, $ma_kh, $time_comment);
}

function comment_update($content, $ma_bl)
{
    $sql = "UPDATE comment SET content = ? WHERE ma_bl = ?";
    pdo_execute($sql, $content, $ma_bl);
}

function comment_delete($ma_bl)
{
    $sql = "DELETE FROM comment WHERE ma_bl = ?";
    pdo_execute($sql, $ma_bl);
}
function comment_customer_delete($ma_kh)
{
    $sql = "DELETE FROM comment WHERE ma_kh = ?";
    pdo_execute($sql, $ma_kh);
}
function comment_select_all()
{
    $sql = "SELECT * FROM comment";
    return pdo_query($sql);
}

function comment_select_by_id($ma_bl)
{
    $sql = "SELECT * FROM comment 
    WHERE ma_bl = ?";
    return pdo_query_one($sql, $ma_bl);
}

function comment_exist($ma_loai)
{
    $sql = "SELECT COUNT(*) FROM comment
    WHERE ma_bl= ?";
    return pdo_query_value($sql, $ma_loai);
}

function comment_select_by_product($product_id)
{
    $sql = "SELECT comment.* FROM comment 
    RIGHT JOIN hang_hoa ON comment.product_id = hang_hoa.product_id 
    WHERE hang_hoa.product_id = ? 
    ORDER BY time_comment DESC";
    return pdo_query($sql, $product_id);
}
