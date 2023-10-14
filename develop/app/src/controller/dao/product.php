<?php

function products_insert($product_name, $price, $promotion, $img, $date, $description, $special, $ma_loai)
{
    $sql = "INSERT INTO products(product_name,price,
    promotion,img,date,description,special,ma_loai) 
    VALUES(?,?,?,?,?,?,?,?)";
    pdo_execute(
        $sql,
        $product_name,
        $price,
        $promotion,
        $img,
        $date,
        $description,
        $special,
        $ma_loai
    );
}

function update_products($product_name, $price, $promotion, $img, $date, $description, $special, $ma_loai, $product_id)
{
    $sql = "UPDATE products SET product_name = ?,price = ?,promotion = ?,
    img = ?,date = ?,description = ?
    ,special = ?,ma_loai = ? WHERE product_id = ?";
    pdo_execute($sql, $product_name, $price, $promotion, $img, $date, $description, $special, $ma_loai, $product_id);
}

function products_delete($product_id)
{
    $sql = "DELETE FROM products WHERE product_id = ?";
    pdo_execute($sql, $product_id);
}

function products_select_all($sortDescending)
{
    $sql = "SELECT * FROM products ORDER BY product_id " . ($sortDescending ? "DESC" : "ASC");
    return pdo_query($sql);
}
function products_select_all_by_type($ma_loai)
{
    $sql = "SELECT * FROM products WHERE ma_loai = ?";
    return pdo_query($sql, $ma_loai);
}

function products_select_by_id($product_id)
{
    $sql = "SELECT * FROM products WHERE product_id = ?";
    return pdo_query_one($sql, $product_id);
}

function products_exist($product_name)
{
    $sql = "SELECT COUNT(*) FROM products WHERE product_name = ?";
    $search_result = pdo_query_one($sql, $product_name);
    return $search_result;
}

function products_view_increased($product_id)
{
    // $incView = products_select_by_id($product_id);
    // $incView = ($incView['viewer'] + 1);
    $sql = "UPDATE products SET viewer =  viewer + 1
    WHERE product_id = ?";
    pdo_execute($sql, $product_id);
}
function products_viewer($product_id)
{
    // $incView = products_select_by_id($product_id);
    // $incView = ($incView['viewer'] + 1);
    $sql = "SELECT viewer FROM products WHERE product_id = ?";
    return pdo_query_value($sql, $product_id);
}

function products_select_top_10()
{
    $sql = "SELECT * FROM products 
    ORDER BY viewer DESC 
    LIMIT 10";
    return pdo_query($sql);
}

function products_select_special()
{
    $products_special = 1;
    $sql = "SELECT * FROM products WHERE special = ?";

    return pdo_query($sql, $products_special);
}

function products_select_by_type($ma_loai)
{
    $sql = "SELECT * FROM products 
    RIGHT JOIN category 
    ON products.ma_loai = category.ma_loai 
    WHERE category.ma_loai = ?";
    return pdo_query($sql, $ma_loai);
}
function products_select_by_type_name($ten_loai)
{
    $sql = "SELECT * FROM products 
    RIGHT JOIN category 
    ON products.ma_loai = category.ma_loai 
    WHERE category.ten_loai = ?";
    return pdo_query($sql, $ten_loai);
}

function products_select_keyword($keyword)
{
    $sql = "SELECT * FROM products WHERE product_name like ?  ";
    return pdo_query($sql, '%' . $keyword . '%');
}
function products_select_all_home()
{
    $sql = "SELECT * FROM products ORDER BY product_id DESC LIMIT 0,12";
    return pdo_query($sql);
}
