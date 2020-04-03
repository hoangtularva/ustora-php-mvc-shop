<?php
if (!empty($_POST)) {
	$order = array(
		'id' => 0,
		'customer' => escape($_POST['name']),
		'province' => escape($_POST['province']),
		'address' => escape($_POST['address']),
		'phone' => escape($_POST['phone']),
		'cart_total' => $_POST['cart_total'],
		'createtime' => gmdate('Y-m-d H:i:s', time() + 7 * 3600) //
	);
	$order_id = save('orders', $order); //lưu vào database order

	$cart = cart_list();

	//lấy sản phẩm trong session cart
	foreach ($cart as $product) {
		$order_detail = array(
			'id' => 0,
			'order_id' => $order_id,
			'product_id' => $product['id'],
			'quantity' => $product['number'],
			'price' => $product['price']
		);
		save('order_detail', $order_detail);
	}
	cart_destroy(); //Hủy 
	
	$title = 'Đặt hàng thành công - Cửa hàng Ustora';
	header("refresh:10;url=" . PATH_URL . "home");
	echo '<div style="text-align: center;padding: 20px 10px;"><h1>Đã đặt hàng thành công</h1></div><div style="text-align: center;padding: 20px 10px;">Cảm ơn bạn đã đặt hàng. Cửa hàng sẽ liên lạc với bạn trong thời gian sớm nhất để xác nhận đơn hàng.<br>
                    Trình duyệt sẽ tự động chuyển về trang chủ sau 10s, hoặc bạn có thể click <a href="' . PATH_URL . 'home">vào đây</a>.</div>';
} else {
	header('location:.');
}
