<?php
function satistic_product()
{
    $sql = "SELECT category.ma_loai,category.ten_loai,
    COUNT(*) AS quantity,
    MIN(products.price) AS price_min,
    MAX(products.price) AS price_max,
    AVG(products.price) AS total_price
    FROM products 
    LEFT JOIN category ON category.ma_loai = products.ma_loai 
    GROUP BY category.ma_loai,category.ten_loai";
    return pdo_query($sql);
}
function satistic_comment()
{
    $sql = "SELECT products.product_id,products.product_name, 
    COUNT(*) AS quantity, 
    MIN(comment.time_comment) AS ngay_cu_nhat, 
    MAX(comment.time_comment) AS ngay_moi_nhat 
    FROM comment 
    LEFT JOIN products ON products.product_id = comment.product_id 
    GROUP BY products.product_id,products.product_name 
    HAVING quantity > 0";
    return pdo_query($sql);
}
