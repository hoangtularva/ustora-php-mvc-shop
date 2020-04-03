<?php require('content/views/shared/header.php'); ?>

<!-- Nền -->
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Tìm kiếm</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="single-product-area">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <?php require('content/views/shared/sidebar.php'); ?>
            </div>
            
            <p>Hiển thị <?php if($total_rows>=9) echo '1–9 trong ';?><?php echo $total_rows;?> kết quả.</p>
            <?php if (empty($products)) { ?>
                <h6>Không tìm thấy kết quả phù hợp cho từ khoá trên.</h6>
            <?php } else { ?>
                <h6> <b>Có tổng cộng 
                    <?php echo $total_rows ?> kết quả phù hợp với từ khóa "<?php echo $keyword ?>".</b>
                </h6>
            <?php } ?>

            <?php foreach ($products as $products) : ?>
            <div class="col-md-3 col-sm-6">
                <div class="single-shop-product">
                    <div class="product-upper">
                        <a href="product/<?php echo $products['id']; ?>-<?php echo $products['slug']; ?>">
                            <img src="public/upload/products/<?php echo $products['img1']; ?>" alt="">
                        </a>
                    </div>
                    <h2>
                        <a href="product/<?php echo $products['id']; ?>-<?php echo $products['slug']; ?>">
                            <?php echo substr($products['product_name'], 0, 30); ?>
                        </a>
                    </h2>

                    <div class="product-carousel-price">
                        <?php if ($products['saleoff'] != 0) { ?>
                        <del><span
                                class="amount"><?php echo number_format($products['product_price'], 0, ',', '.');  ?></span></del>
                        <ins><span
                                class="amount"><?php echo number_format(($products['product_price']) - (($products['product_price'] * $products['percentoff']) / 100), 0, ',', '.'); ?>
                                VNĐ</span></ins>
                        <?php } else { ?>
                        <ins><span
                                class="amount"><?php echo number_format($products['product_price'], 0, ',', '.');  ?>
                                VNĐ</span></ins>
                        <?php } ?>
                    </div>

                    <div class="product-option-shop">
                        <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70"
                            rel="nofollow" href="cart/add/<?php echo $products['id']; ?>">Add to cart</a>
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
