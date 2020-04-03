<?php require('content/views/shared/header.php'); ?>
<div role="main" class="main shop">
    <div class="container">
        <hr class="tall">
        <div class="row">
            <div class="col-md-12">
                <h2 class="shorter"><strong>Thủ tục thanh toán và đặt hàng</strong></h2>
                <p>Phản hồi của khách hàng? <a href="shop-login.html">Nhấn vào đây để đăng nhập.</a></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                    <strong>Xem Lại & Thanh Toán</strong>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="accordion-body collapse in">
                            <div class="panel-body">
                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">
                                                &nbsp;
                                            </th>
                                            <th class="product-name">
                                                Sản Phẩm
                                            </th>
                                            <th class="product-price">
                                                Giá
                                            </th>
                                            <th class="product-quantity">
                                                Số Lượng
                                            </th>
                                            <th class="product-subtotal">
                                                Tổng
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($cart as $product_id => $product) { ?>
                                            <tr class="cart_table_item">
                                                <td class="product-thumbnail">
                                                    <a href="product/<?php echo $product['id'] . '-' . slug($product['name']); ?>">
                                                        <img width="100" height="100" alt="" class="img-responsive" src="<?php echo 'public/upload/products/' . $product['image'] ?>">
                                                    </a>
                                                </td>
                                                <td class="product-name">
                                                    <a href="product/<?php echo $product['id'] . '-' . slug($product['name']); ?>"><?php echo $product['name'] ?></a>
                                                </td>
                                                <td class="product-price">
                                                    <?php if ($product["typeid"] == 3) : ?>
                                                        <span class="amount"><?php echo $product ? number_format(($product['price']) - ($product['price']) * ($product['percent_off']) / 100, 0, ',', '.') : 0; ?> VNĐ</span>
                                                    <?php else : ?>
                                                        <span class="amount"><?php echo number_format($product['price'], 0, ',', '.'); ?> VNĐ</span>
                                                    <?php endif ?>
                                                </td>
                                                <td class="product-quantity">
                                                    <?php echo $product['number']; ?>
                                                </td>
                                                <td class="product-subtotal">
                                                    <?php if ($product["typeid"] == 3) : ?>
                                                        <span class="amount"><?php echo number_format((($product['price']) - ($product['price']) * ($product['percent_off']) / 100) * $product['number'], 0, ',', '.') ?> VNĐ</span>
                                                    <?php else : ?>
                                                        <span class="amount"><?php echo number_format($product['price'] * $product['number'], 0, ',', '.') ?> VNĐ</span>
                                                    <?php endif ?>
                                                </td>
                                            </tr><?php } ?>
                                    </tbody>
                                </table>
                                <hr class="tall">
                                <h4>Thống kê tổng giỏ hàng</h4>
                                <table cellspacing="0" class="cart-totals">
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th>
                                                <strong>Tổng số sản phẩm</strong>
                                            </th>
                                            <td>
                                                <strong><span class="amount"><?php echo cart_number(); ?></span></strong>
                                            </td>
                                        </tr>
                                        <tr class="total">
                                            <th>
                                                <strong>Tổng giá trị giỏ hàng</strong>
                                            </th>
                                            <td>
                                                <strong><span class="amount"><?php echo number_format(cart_total(), 0, ',', '.'); ?> VNĐ</span></strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <hr class="tall">

                                <h3 style="text-align: center;"><strong>Lưu ý đặt hàng và thanh toán</strong></h3>
                                <p><strong>Cửa hàng Free Shipping trong phạm vi bán kính 10km.</strong></p>
                                <p><strong>Nhận hàng, kiểm tra hàng và sau đó thanh toán.</strong></p>
                                <p><strong>Mọi thắc mắc, khiếu nại xin liên hệ 0889991234.</strong></p>
                                
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                    <strong>Địa chỉ giao hàng: </strong>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="accordion-body collapse in">
                            <div class="panel-body">
                                <form action="index.php?controller=cart&amp;action=checkout" role="form" id="" method="post">
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>Họ & Tên: </label>
                                                <input type="text" name="name" class="form-control" required="required" placeholder="Nhập họ và tên thật ...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label>Lưu ý của khách hàng:</label>
                                                <input type="text" name="province" required="required" class="form-control" placeholder="Thời gian giao hàng ...">
                                            </div>
                                            <div class="col-md-6">
                                                <label>SĐT để liên lạc:</label>
                                                <input type="text" name="phone" required="required" class="form-control" placeholder="0xxx...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>Địa chỉ: </label>
                                                <input type="text" name="address" required="required" class="form-control" placeholder="Nhập chi tiết địa chỉ ...">
                                            </div>
                                        </div>
                                    </div>
                                    <input name="cart_total" type="hidden" value="<?php echo cart_total() ? cart_total() : '0'; ?>"/>
                                    <div class="form-group" style="text-align: center">
                                        <button type="submit" class="btn btn-primary"><i class="fa  fa-check-square-o"></i> Đặt hàng</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <h4>Cart Totals</h4>
                <table cellspacing="0" class="cart-totals">
                    <tbody>
                        <tr class="cart-subtotal">
                            <th>
                                <strong>Tổng số sản phẩm</strong>
                            </th>
                            <td>
                                <strong><span class="amount"><?php echo cart_number(); ?></span></strong>
                            </td>
                        </tr>
                        <tr class="total">
                            <th>
                                <strong>Tổng giá trị giỏ hàng</strong>
                            </th>
                            <td>
                                <strong><span class="amount"><?php echo number_format(cart_total(), 0, ',', '.'); ?> VNĐ</span></strong>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php require('content/views/shared/footer.php');
