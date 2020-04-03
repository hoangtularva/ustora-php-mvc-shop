<?php
// Sản phẩm nổi bật
$options_hotproduct = array(
    'where' => 'product_typeid = 1',
    'limit' => '4',
    'offset' => '0', //vị trí đầu tiên
    'order_by' => 'createDate DESC'
);
$hot_products = get_all('products',$options_hotproduct);

// Sản phẩm mới nhất
$options_newproduct = array(
    'where' => 'product_typeid = 2',
    'limit' => '4',
    'offset' => '0',
    'order_by' => 'createDate DESC'
);
$new_products = get_all('products',$options_newproduct);

// Sản phẩm giảm giá
$options_saleproduct = array(
    'where' => 'product_typeid = 3',
    'limit' => '4',
    'offset' => '0',
    'order_by' => 'createDate DESC'
);
$saleoff_products = get_all('products',$options_saleproduct);

// Tất cả sản phẩm
$options_allproduct = array(
    'order_by' => 'id DESC' //id giảm dần để biết sp mới. DESC là giảm dần, ASC là tăng dần
);
$all_products = get_all('products',$options_allproduct);


$title = 'Cửa hàng Ustora';
require('content/views/home/index.php');