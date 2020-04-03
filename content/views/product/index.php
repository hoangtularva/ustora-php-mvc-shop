<?php require('content/views/shared/header.php'); ?>

<!-- Chi tiết sp -->
<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <?php require('content/views/shared/sidebar.php'); ?>
            </div>

            <div class="col-md-8">
                <div class="product-content-right">
                    <div class="product-breadcroumb">
                        <a href="<?php echo PATH_URL; ?>home">Trang chủ</a>
                        <a
                            href="category/<?php echo $subcategories['id'] . '-' . $subcategories['slug']; ?>"><?php echo $breadCrumb ?></a>
                        <a
                            href="product/<?php echo $product['id']; ?>-<?php echo $product['slug']; ?>"><?php echo $product['product_name']; ?></a>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="product-images">
                                <div class="product-main-img">
                                    <img alt="" class="img-responsive img-rounded"
                                        src="public/upload/products/<?php echo $product['img1'] ?>">
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="product-gallery">
                                            <img alt="" class="img-responsive img-rounded"
                                                src="public/upload/products/<?php echo $product['img2'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="product-gallery">
                                            <img alt="" class="img-responsive img-rounded"
                                                src="public/upload/products/<?php echo $product['img3'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="product-gallery">
                                            <img alt="" class="img-responsive img-rounded"
                                                src="public/upload/products/<?php echo $product['img4'] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="product-inner">
                                <h2 class="product-name"><?php echo $product['product_name'] ?></h2>
                                <div class="product-inner-price">
                                    <?php if ($product['saleoff'] != 0) { ?>
                                    <del><span
                                            class="amount"><?php echo number_format($product['product_price'], 0, ',', '.');  ?></span></del>
                                    <ins><span
                                            class="amount"><?php echo number_format(($product['product_price']) - (($product['product_price'] * $product['percentoff']) / 100), 0, ',', '.'); ?>
                                            VNĐ</span></ins>
                                    <?php } else { ?>
                                    <ins><span
                                            class="amount"><?php echo number_format($product['product_price'], 0, ',', '.');  ?>
                                            VNĐ</span></ins>
                                    <?php } ?>
                                </div>

                                <form enctype="multipart/form-data" method="post" class="cart"
                                    action="cart/add/<?php echo $product['id']; ?>">
                                    
                                    <button class="btn btn-primary btn-icon" role="button" type="submit">Add to cart
                                        </button>
                                </form>
                                        
                                <div class="product-inner-category">
                                    <p>Danh mục: <a
                                            href="category/<?php echo $subcategories['id'] . '-' . $subcategories['slug']; ?>"><?php echo $breadCrumb ?></a>
                                        <p>Mã sản phẩm: <?php echo $product['product_code'] ?></p>
                                        <p>Thương hiệu: <?php echo $product['product_trademark'] ?></p>
                                        <p>Màu sắc: <?php echo $product['product_color'] ?></p>
                                       
                                </div>

                                <div role="tabpanel">
                                    <ul class="product-tab" role="tablist">
                                        <li role="presentation" class="active"><a href="#home" aria-controls="home"
                                                role="tab" data-toggle="tab">Chi tiết</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="home">
                                            <h2>Thông tin sản phẩm</h2>
                                            <p><?php echo $product['product_description'] ?></p>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <h2>Đánh giá</h2>
                    <div class="submit-review">
                        <p><label for="name">Tên</label> <input name="name" type="text"></p>
                        <p><label for="email">Email</label> <input name="email" type="email"></p>
                        <!-- <div class="rating-chooser">
                            <p>Your rating</p>

                            <div class="rating-wrap-post">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div> -->
                        <p><label for="review">Nhận xét</label> <textarea name="review" id="" cols="30"
                                rows="10"></textarea></p>
                        <p><input type="submit" value="Submit"></p>
                    </div>
            </div>
        </div>
    </div>
</div>
<?php
require('content/views/shared/footer.php');