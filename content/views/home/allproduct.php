<div class="maincontent-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="latest-product">
                <div class="single-sidebar">
                    <h2 class="sidebar-title">Search Products</h2>
                    <form action="<?php echo PATH_URL;?>search/" method="get">
                        <input class="form-control" placeholder="Search..." name="keyword" id="s" type="text">
                        <input type="submit" value="Search">
                    </form>
                </div>
                    <h2 class="section-title">Latest Products</h2>
                    
                    <div class="product-carousel">
                        <?php if (empty($all_products)) : ?>
                        <h3 class="col-sm-12">Không có sản phẩm nào trong danh mục này.</h3>
                        <?php endif; ?>
                        <?php foreach ($all_products as $all_product) : ?>
                        <div class="single-product">
                            <a href="product/<?php echo $all_product['id']; ?>-<?php echo $all_product['slug']; ?>"
                            class="view-details-link"><img src="public/upload/products/<?php echo $all_product['img1']; ?>" alt=""></a>
                            
                            <div class="product-option-shop">
                                <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70"
                                rel="nofollow" href="cart/add/<?php echo $all_product['id']; ?>">Add to cart</a>
                            </div>
                            
                            <h2><a
                                    href="product/<?php echo $all_product['id']; ?>-<?php echo $all_product['slug']; ?>"><?php echo $all_product['product_name']; ?></a>
                            </h2>

                            <div class="product-carousel-price">
                                <?php if ($all_product['saleoff'] != 0) { ?>
                                <del><span
                                        class="amount"><?php echo number_format($all_product['product_price'], 0, ',', '.');  ?></span></del>
                                <ins><span
                                        class="amount"><?php echo number_format(($all_product['product_price']) - (($all_product['product_price'] * $all_product['percentoff']) / 100), 0, ',', '.'); ?>
                                        VNĐ</span></ins>
                                <?php } else { ?>
                                <ins><span
                                        class="amount"><?php echo number_format($all_product['product_price'], 0, ',', '.');  ?>
                                        VNĐ</span></ins>
                                <?php } ?>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End main content area -->

<div class="brands-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="brand-wrapper">
                    <div class="brand-list">
                        <img src="public/img/brand1.png" alt="">
                        <img src="public/img/brand2.png" alt="">
                        <img src="public/img/brand3.png" alt="">
                        <img src="public/img/brand4.png" alt="">
                        <img src="public/img/brand5.png" alt="">
                        <img src="public/img/brand6.png" alt="">
                        <img src="public/img/brand1.png" alt="">
                        <img src="public/img/brand2.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End brands area -->