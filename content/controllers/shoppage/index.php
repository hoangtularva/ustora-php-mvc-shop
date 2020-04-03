<?php
if (isset($_GET['page'])) $page = intval($_GET['page']);
else $page = 1;

$page = ($page > 0) ? $page : 1;
$limit = 12;
$offset = ($page - 1) * $limit;

$options_allproduct = array(
    'limit' => $limit,
    'offset' => $offset,
    'order_by' => 'id ASC'
);

$url = 'shoppage';
$total_rows = get_total('products', $options_allproduct);
$total = ceil($total_rows / $limit);

$all_products = get_all('products',$options_allproduct);

$pagination = pagination($url, $page, $total);

$title = 'Cửa hàng Ustora';
//load view
require('content/views/shoppage/index.php');
