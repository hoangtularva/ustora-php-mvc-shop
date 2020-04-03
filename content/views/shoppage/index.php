<?php require('content/views/shared/header.php'); ?>
<!-- Nền -->
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Tất cả sản phẩm</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="single-product-area">
    <div class="container">
        <div class="row">
            <p>Hiển thị <?php if($total_rows>=12) echo '1–12 trong ';?><?php echo $total_rows;?> kết quả.</p>
            <?php foreach ($all_products as $all_products) : ?>
            <div class="col-md-3 col-sm-6">
                <div class="single-shop-product">
                    <div class="product-upper">
                        <a href="product/<?php echo $all_products['id']; ?>-<?php echo $all_products['slug']; ?>">
                            <img src="public/upload/products/<?php echo $all_products['img1']; ?>" alt="">
                        </a>
                    </div>
                    <h2>
                        <a href="product/<?php echo $all_products['id']; ?>-<?php echo $all_products['slug']; ?>">
                            <?php echo substr($all_products['product_name'], 0, 20) . "..."; ?>
                        </a>
                    </h2>

                    <div class="product-carousel-price">
                        <?php if ($all_products['saleoff'] != 0) { ?>
                        <del><span
                                class="amount"><?php echo number_format($all_products['product_price'], 0, ',', '.');  ?></span></del>
                        <ins><span
                                class="amount"><?php echo number_format(($all_products['product_price']) - (($all_products['product_price'] * $all_products['percentoff']) / 100), 0, ',', '.'); ?>
                                VNĐ</span></ins>
                        <?php } else { ?>
                        <ins><span
                                class="amount"><?php echo number_format($all_products['product_price'], 0, ',', '.');  ?>
                                VNĐ</span></ins>
                        <?php } ?>
                    </div>

                    <div class="product-option-shop">
                        <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70"
                            rel="nofollow" href="cart/add/<?php echo $all_products['id']; ?>">Add to cart</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Phân trang -->
        <div class="row">
            <div class="col-md-12">
                <div class="product-pagination text-center">
                    <nav>
                        <ul class="pagination">
                            <?php echo $pagination; ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require('content/views/shared/footer.php');