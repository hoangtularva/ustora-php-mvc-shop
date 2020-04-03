<?php
$title = 'Đơn hàng - Cửa hàng Ustora';
$cart = cart_list();
if (empty($cart)) {
	header('location:.');
}
//load view
require('content/views/cart/order.php');