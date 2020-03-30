<?php
$get_id = array(
    'order_by' => 'id'
);
$sub_cate = get_all('subcategory', $get_id);
$shops = get_all('categories', $get_id);

// Sản phẩm mới nhất
$options_newproduct = array(
    'where' => 'product_typeid = 2',
    'limit' => '3',
    'offset' => '0',
    'order_by' => 'createDate DESC'
);
$new_products = get_all('products',$options_newproduct);

// Sản phẩm nổi bật
$options_hotproduct = array(
    'where' => 'product_typeid = 1',
    'limit' => '4',
    'offset' => '0', //vị trí đầu tiên
    'order_by' => 'createDate DESC'
);
$hot_products = get_all('products',$options_hotproduct);
?>

<div class="single-sidebar">
    <h2 class="sidebar-title">Search Products</h2>
    <form action="<?php echo PATH_URL;?>search/" method="get">
        <input class="form-control" placeholder="Search..." name="keyword" id="s" type="text">
        <input type="submit" value="Search">
    </form>
</div>

<div class="single-sidebar">
    <h2 class="sidebar-title">DANH MỤC SẢN PHẨM</h2>
    <ul>
        <?php foreach ($shops as $shop) { ?>
        <li>
            <a href="shop/<?php echo $shop['id'] . '-' . $shop['slug']; ?>"><?php echo $shop['category_name'] ?></a>
        </li>
        <?php } ?>
    </ul>
</div>

<div class="single-sidebar">
    <h2 class="sidebar-title"> <a href="type/2-san-pham-moi">Sản phẩm mới nhất </a></h2>

    <div class="thubmnail-recent">
        <?php if (empty($new_products)) : ?>
        <h3 class="col-sm-12">Không có sản phẩm nào trong danh mục này.</h3>
        <?php endif; ?>

        <?php foreach ($new_products as $new_product) : ?>
        <img src="public/upload/products/<?php echo $new_product['img1']; ?>" class="recent-thumb" alt="">
        <h2><a href="product/<?php echo $new_product['id']; ?>-<?php echo $new_product['slug']; ?>/">
                <?php echo substr($new_product['product_name'], 0, 20) . "..."; ?>
            </a></h2>
        <div class="product-sidebar-price">
            <?php if ($new_product['saleoff'] != 0) { ?>
            <del><span
                    class="amount"><?php echo number_format($new_product['product_price'], 0, ',', '.');  ?></span></del>
            <ins><span
                    class="amount"><?php echo number_format(($new_product['product_price']) - (($new_product['product_price'] * $new_product['percentoff']) / 100), 0, ',', '.'); ?>
                    VNĐ</span></ins>
            <?php } else { ?>
            <ins><span class="amount"><?php echo number_format($new_product['product_price'], 0, ',', '.');  ?>
                    VNĐ</span></ins>
            <?php } ?>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="single-sidebar">
    <h2 class="sidebar-title"> <a href="type/1-san-pham-noi-bat">Sản phẩm nổi bật </a></h2>

    <div class="thubmnail-recent">
        <?php if (empty($hot_products)) : ?>
        <h3 class="col-sm-12">Không có sản phẩm nào trong danh mục này.</h3>
        <?php endif; ?>

        <?php foreach ($hot_products as $hot_products) : ?>
        <img src="public/upload/products/<?php echo $hot_products['img1']; ?>" class="recent-thumb" alt="">
        <h2><a href="product/<?php echo $hot_products['id']; ?>-<?php echo $hot_products['slug']; ?>/">
                <?php echo substr($hot_products['product_name'], 0, 30) . "..."; ?>
            </a></h2>
        <div class="product-sidebar-price">
            <?php if ($hot_products['saleoff'] != 0) { ?>
            <del><span
                    class="amount"><?php echo number_format($hot_products['product_price'], 0, ',', '.');  ?></span></del>
            <ins><span
                    class="amount"><?php echo number_format(($hot_products['product_price']) - (($hot_products['product_price'] * $new_product['percentoff']) / 100), 0, ',', '.'); ?>
                    VNĐ</span></ins>
            <?php } else { ?>
            <ins><span class="amount"><?php echo number_format($hot_products['product_price'], 0, ',', '.');  ?>
                    VNĐ</span></ins>
            <?php } ?>
        </div>
        <?php endforeach; ?>
    </div>
</div>