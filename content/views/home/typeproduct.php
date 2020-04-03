<div class="product-widget-area">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2>Sản phẩm giảm giá</h2>
                        <a href="type/3-san-pham-giam-gia" class="wid-view-more">View All</a>
                        <div class="single-wid-product">
							<?php if (empty($saleoff_products)) : ?>
								<h3 class="col-sm-12">Không có sản phẩm nào trong danh mục này.</h3>
							<?php endif; ?>
							<?php foreach ($saleoff_products as $saleoff_product) : ?>
                            <a href="product/<?php echo $saleoff_product['id']; ?>-<?php echo $saleoff_product['slug']; ?>"><img src="public/upload/products/<?php echo $saleoff_product['img1']; ?>" alt="" class="product-thumb"></a>
							<h2>
								<a href="product/<?php echo $saleoff_product['id']; ?>-<?php echo $saleoff_product['slug']; ?>/">
								
								<?php echo substr($saleoff_product['product_name'], 0, 25) .'...' ; ?>
								</a>	
								<?php if ($saleoff_product['saleoff'] != 0) : ?>
										<!-- Hiện số tiền giảm -->
										<span class="onsale">-<?php echo $saleoff_product['percentoff'];?>%</span>
								<?php endif; ?>
							</h2>
						   
							<div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
								<?php if ($saleoff_product['saleoff'] != 0) { ?>
									<del><span class="amount"><?php echo number_format($saleoff_product['product_price'], 0, ',', '.');  ?></span></del>
									<ins><span class="amount"><?php echo number_format(($saleoff_product['product_price']) - (($saleoff_product['product_price'] * $saleoff_product['percentoff']) / 100), 0, ',', '.'); ?> VNĐ</span></ins>
								<?php } else { ?>
									<ins><span class="amount"><?php echo number_format($saleoff_product['product_price'], 0, ',', '.');  ?> VNĐ</span></ins>
								<?php } ?>
							</div> 
							<?php endforeach; ?>                           
                        </div>
                    </div>
				</div>
				
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2>Sản phẩm nổi bật</h2>
                        <a href="type/1-san-pham-noi-bat" class="wid-view-more">View All</a>
                        <div class="single-wid-product">
						<?php if (empty($hot_products)) : ?>
							<h3 class="col-sm-12">Không có sản phẩm nào trong danh mục này.</h3>
						<?php endif; ?>
						<?php foreach ($hot_products as $hot_product) : ?>
                            <a href="product/<?php echo $hot_product['id']; ?>-<?php echo $hot_product['slug']; ?>"><img src="public/upload/products/<?php echo $hot_product['img1']; ?>" alt="" class="product-thumb"></a>
                            <h2>
								<a href="product/<?php echo $hot_product['id']; ?>-<?php echo $hot_product['slug']; ?>">
									<?php echo substr($hot_product['product_name'], 0, 25) . "..." ; ?>
								</a>
							</h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
								<?php if ($hot_product['saleoff'] != 0) { ?>
									<del><span class="amount"><?php echo number_format($hot_product['product_price'], 0, ',', '.');  ?></span></del>
									<ins><span class="amount"><?php echo number_format(($hot_product['product_price']) - (($hot_product['product_price'] * $hot_product['percentoff']) / 100), 0, ',', '.'); ?> VNĐ</span></ins>
									<?php } else { ?>
										<ins><span class="amount"><?php echo number_format($hot_product['product_price'], 0, ',', '.');  ?> VNĐ</span></ins>
									<?php } ?>
							</div> 
							<?php endforeach; ?>                           
                        </div>    
                    </div>
				</div>
				
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2>Sản phẩm mới nhất</h2>
                        <a href="type/2-san-pham-moi" class="wid-view-more">View All</a>
                        <div class="single-wid-product">
						<?php if (empty($new_products)) : ?>
							<h3 class="col-sm-12">Không có sản phẩm nào trong danh mục này.</h3>
						<?php endif; ?>
						<?php foreach ($new_products as $new_product) : ?>
                            <a href="product/<?php echo $new_product['id']; ?>-<?php echo $new_product['slug']; ?>"><img src="public/upload/products/<?php echo $new_product['img1']; ?>" alt="" class="product-thumb"></a>
                            <h2>
								<a href="product/<?php echo $new_product['id']; ?>-<?php echo $new_product['slug']; ?>">
									<?php  echo substr($new_product['product_name'], 0, 25) . '...' ;  ?>
								</a>
							</h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
								<?php if ($new_product['saleoff'] != 0) { ?>
									<del><span class="amount"><?php echo number_format($new_product['product_price'], 0, ',', '.');  ?></span></del>
									<ins><span class="amount"><?php echo number_format(($new_product['product_price']) - (($new_product['product_price'] * $new_product['percentoff']) / 100), 0, ',', '.'); ?> VNĐ</span></ins>
								<?php } else { ?>
									<ins><span class="amount"><?php echo number_format($new_product['product_price'], 0, ',', '.');  ?> VNĐ</span></ins>
								<?php } ?>
							</div>  
						<?php endforeach; ?>                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div> <!-- End product widget area -->
	

