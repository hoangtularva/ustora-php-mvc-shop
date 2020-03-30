-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th3 30, 2020 lúc 06:12 AM
-- Phiên bản máy phục vụ: 5.7.26
-- Phiên bản PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ustora`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supply_id` int(11) DEFAULT NULL,
  `category_position` int(4) DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_supply_id` (`supply_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `supply_id`, `category_position`, `slug`) VALUES
(1, 'Laptop', 1, 1, 'lap-top'),
(2, 'Điện thoại', 1, 2, 'dien-thoai'),
(3, 'Tivi', 1, 3, 'ti-vi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `menu_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orther` int(11) DEFAULT NULL,
  `isVisible` tinyint(1) DEFAULT NULL,
  `menu_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cart_total` double NOT NULL,
  `createtime` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

DROP TABLE IF EXISTS `order_detail`;
CREATE TABLE IF NOT EXISTS `order_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_typeid` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `supply_id` int(11) DEFAULT NULL,
  `product_description` longtext COLLATE utf8mb4_unicode_ci,
  `product_price` int(11) NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_trademark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_color` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_detail` longtext COLLATE utf8mb4_unicode_ci,
  `createBy` int(11) DEFAULT NULL,
  `createDate` date DEFAULT NULL,
  `editBy` int(11) DEFAULT NULL,
  `editDate` date DEFAULT NULL,
  `totalView` int(11) DEFAULT '0',
  `saleoff` tinyint(11) DEFAULT NULL,
  `percentoff` int(11) DEFAULT NULL,
  `img1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_category_id` (`category_id`),
  KEY `fk_supply_id` (`supply_id`),
  KEY `fk_type_id` (`product_typeid`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_typeid`, `category_id`, `sub_category_id`, `supply_id`, `product_description`, `product_price`, `product_code`, `product_trademark`, `product_color`, `product_detail`, `createBy`, `createDate`, `editBy`, `editDate`, `totalView`, `saleoff`, `percentoff`, `img1`, `img2`, `img3`, `img4`, `slug`) VALUES
(1, 'Laptop Dell Inspiron 3581 i3 7020U/4GB/1TB/Win10', 1, 1, 1, 1, 'Laptop Dell Inspiron 3581 sở hữu nét cổ điển về diện mạo - một nét đặc trưng của Dell. Sản phẩm này có thể xử lí mượt mà nhu cầu giải trí cơ bản nhờ bộ vi xử lý Intel Core i3 và RAM 4 GB.', 11990000, 'P75F005N81A', 'Dell Inspiron', 'Bạc', NULL, NULL, '2020-03-18', NULL, NULL, 69, NULL, NULL, 'pd1-1.jpg', 'pd1-2.jpg', 'pd1-3.jpg', 'pd1-4.jpg', 'laptop-dell-insprion-3581-i3'),
(2, 'Dell Inspiron N3580 i5 8265U/4GB/1TB/Win10', 2, 1, 1, 1, 'Laptop Dell Inspire N3580 i5 (P75F106N80I) là chiếc laptop học tâp - văn phòng có cấu hình ổn trong tầm giá, phục vụ tốt nhu cầu làm việc văn phòng và học tập với các tác vụ như báo cáo, thuyết trình, word, excel, đồ họa cơ bản. Máy được thiết kế chắc chắn, bền bỉ phù hợp với mọi đối tượng người dùng.', 14990000, 'P75F106N80I', 'Dell Inspiron', 'Đen', NULL, NULL, '2020-03-18', NULL, NULL, 21, NULL, NULL, 'pd2-1.jpg', 'pd2-2.jpg', 'pd2-3.jpg', 'pd2-4.jpg', 'laptop-dell-insprion-3580-i5'),
(3, 'Asus VivoBook X409FA i5 8265U/8GB/1TB/Win10', 1, 1, 2, 1, 'Laptop Asus Vivobook X409F (EK138T) là mẫu laptop mỏng nhẹ được thiết kế tinh tế và tiện lợi di chuyển. Đi cùng với đó là một cấu hình mạnh mẽ trong tầm giá.', 13690000, 'EK138T', 'Asus Vivobook', 'Trắng', NULL, NULL, '2020-03-18', NULL, NULL, 6, NULL, NULL, 'pd3-1.jpg', 'pd3-2.jpg', 'pd3-3.jpg', 'pd3-4.jpg', 'asus-vivobook-x409f-i5-8265u-8gb-1tb-win10-ek138t'),
(4, 'Asus VivoBook X509FJ i7 8565U/8GB/512GB/Win10', 2, 1, 2, 1, 'Laptop Asus Vivobook X509FJ (EJ133T) được cải tiến với thiết kế tinh tế, sang trọng và cấu hình mạnh mẽ mang lại những trải nghiệm tốt nhất cho người dùng.', 18990000, 'EJ133T', 'Asus VivoBook', 'Trắng', NULL, NULL, '2020-03-19', NULL, NULL, 94, NULL, NULL, 'pd4-1.jpg', 'pd4-2.jpg', 'pd4-3.jpg', 'pd4-4.jpg', 'asus-vivobook-x509f-i7-8565u-8gb-mx230-win10-ej13'),
(5, 'HP 348 G7 i5 10210U/8GB/512GB/Win10', 3, 1, 3, 1, 'Hiện nay, việc sở hữu một chiếc laptop mỏng nhẹ và đầy đủ tính năng để hỗ trợ cho công việc là điều không hề khó. Và laptop HP 348 G7 (9PH06PA) là một trong những sản phẩm đáp ứng tốt hầu hết các nhu cầu sử dụng làm việc cơ bản dành cho đối tượng sinh viên, nhân viên văn phòng.', 16290000, '9PH06PA', 'HP 348 G7', 'Bạc', NULL, NULL, '2020-03-19', NULL, NULL, 43, 1, 5, 'pd5-1.jpg', 'pd5-2.jpg', 'pd5-3.jpg', 'pd5-4.jpg', 'hp-348-g7-i5-9ph06pa'),
(6, 'HP 15s du0072TX i3 7020U/4GB/256GB/Win10', 3, 1, 3, 1, 'Laptop HP 15s du0072TX (8WP16PA) là mẫu laptop dành cho sinh viên, nhân viên văn phòng với cấu hình xử lí mượt mà các thao tác văn phòng thường ngày như soạn thảo văn bản, lướt web, ... và thiết kế sang trọng.', 12290000, '8WP16PA', 'HP 15S', 'Bạc', NULL, NULL, '2020-03-19', NULL, NULL, 17, 1, 10, 'pd6-1.jpg', 'pd6-2.jpg', 'pd6-3.jpg', 'pd6-4.jpg', 'hp-15s-du0072tx-i3-7020u-4gb-256gb-2gb-mx110-win10'),
(7, 'Acer Swift 003 i3 8130U/4GB/1TB/Win10', 2, 1, 4, 1, 'Laptop Acer Swift SF315 52 38YQ i3 (NX.GZBSV.003) là một lựa chọn tốt cho những ai đang tìm kiếm một chiếc máy cho nhu cầu học tập văn phòng có cấu hình ổn, thiết kế gọn nhẹ, sang trọng mà lại có mức giá vừa phải.', 13490000, 'NXGZBSV003', 'Acer Swift', 'Vàng kim', NULL, NULL, '2020-03-19', NULL, NULL, 8, NULL, NULL, 'pd7-1.jpg', 'pd7-2.jpg', 'pd7-3.jpg', 'pd7-4.jpg', 'acer-swift-sf315-52-38yq-i3-8130u-4gb-1tb-156f-win10'),
(8, 'Acer Aspire A315 54 52HT i5 10210U/4GB/256GB/Win10', 3, 1, 4, 1, 'Laptop Acer Aspire A315 i5 (NX.HM2SV.002) là mẫu laptop hướng đến giới học sinh sinh viên, nhân viên văn phòng. Máy có cấu hình mạnh khi được trang bị bộ vi xử lí Intel thế hệ 10 mới, ổ cứng SSD cực nhanh và thiết kế gọn nhẹ cơ động.', 12990000, 'NXHM2SV002', 'Acer Aspire', 'Đen', NULL, NULL, '2020-03-19', NULL, NULL, 4, 1, 5, 'pd8-1.jpg', 'pd8-2.jpg', 'pd8-3.jpg', 'pd8-4.jpg', 'acer-aspire-a315-54-52ht-i5-10210u-4gb-256gb-win-10'),
(9, 'Apple Macbook Air 2019 i5 1.6GHz/8GB/128GB', 1, 1, 5, 1, 'MacBook Air 2019 i5 1.6GHz/8GB/128GB là chiếc laptop học tập văn phòng mỏng hơn, nhẹ hơn với màn hình Retina sắc nét, thời lượng pin cả ngày và bàn phím thế hệ mới nhất mang đến những trải nghiệm tốt nhất cho bạn.', 28990000, 'MVFM2SA', 'MacBook Air', 'Vàng kim', NULL, NULL, '2020-03-19', NULL, NULL, 9, NULL, NULL, 'pd9-1.jpg', 'pd9-2.jpg', 'pd9-3.jpg', 'pd9-4.jpg', 'apple-macbook-air-2019-i5-16ghz-8gb-128gb-mvfm2sa'),
(10, 'Apple Macbook Pro Touch 2019 i5 1.4GHz/8GB/256GB', 2, 1, 5, 1, 'Laptop Apple Macbook Pro Touch 2019 có thiết kế sang trọng, đẳng cấp đi kèm với cấu hình hết sức mạnh mẽ và màn hình Retina tuyệt mỹ cùng bàn phím cánh bướm thế hệ mới, đảm bảo hoàn thành xuất sắc những tác vụ từ cơ bản đến cực kì chuyên nghiệp.', 39990000, 'MUHP2SA', 'MacBook Pro', 'Bạc', NULL, NULL, '2020-03-19', NULL, NULL, 1, NULL, NULL, 'pd10-1.jpg', 'pd10-2.jpg', 'pd10-3.jpg', 'pd10-4.jpg', 'apple-macbook-pro-touch-2019-i5-14ghz-8gb-256gb'),
(11, 'Điện thoại iPhone 11 Pro Max 512GB', 2, 2, 6, 1, 'Theo định nghĩa của Apple, iPhone 11 Pro Max 512GB là thế hệ mới, tương ứng với chiếc iPhone Xs Max năm ngoái, hội tụ tất cả những ưu điểm tốt nhất bao gồm camera cải tiến, màn hình lớn và thời lượng pin tốt nhất.', 43990000, 'IP001', 'iPhone 11 Pro Max', 'Xám', NULL, NULL, '2020-03-19', NULL, NULL, 2, NULL, NULL, 'pd11-1.jpg', 'pd11-2.jpg', 'pd11-3.jpg', 'pd11-4.jpg', 'iphone-11-pro-max-512gb'),
(12, 'Điện thoại iPhone 7 Plus 32GB', 1, 2, 6, 1, 'iPhone 7 Plus thể hiện sự đột phá của Apple về camera với bộ đôi camera kép có cùng độ phân giải 12 MP lần đầu tiên xuất hiện trên các chiếc iPhone. Theo đó thì iPhone 7 Plus sẽ có một camera chính góc rộng và một camera tele phụ giúp máy có thể zoom quang học lên 2 lần mà vẫn giữ nguyên chất lượng ảnh.', 12990000, 'IP002', 'iPhone 7 Plus', 'Hồng', NULL, NULL, '2020-03-19', NULL, NULL, 9, NULL, NULL, 'pd12-1.jpg', 'pd12-2.jpg', 'pd12-3.jpg', 'pd12-4.jpg', 'iphone-7-plus'),
(13, 'Điện thoại Samsung Galaxy Fold\r\n', 2, 2, 7, 1, 'Samsung Galaxy Fold, siêu phẩm đến từ tương lai với sự kết hợp giữa công nghệ cao cấp và thiết kế độc lạ, hoàn toàn khác biệt với phần còn lại trong làng smartphone hiện nay.', 50000000, 'SS001', 'Samsung Galaxy Fold', 'Đen', NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, 'pd13-1.jpg', 'pd13-2.jpg', 'pd13-3.jpg', 'pd13-4.jpg', 'samsung-galaxy-fold'),
(14, 'Điện thoại Samsung Galaxy Note 10+', 3, 2, 7, 1, 'Là phiên bản cao cấp sở hữu RAM khủng đến 12 GB, Samsung Galaxy Note 10+ còn ưu điểm hơn phiên bản Note 10 ở điểm camera hỗ trợ cảm biến chiều sâu 3D cùng một số tính năng khác.', 26990000, 'Vàng', 'Samsung Galaxy Note 10+', 'Đen', NULL, NULL, '2020-03-20', NULL, NULL, 185, 1, 20, 'pd14-1.jpg', 'pd14-2.jpg', 'pd14-3.jpg', 'pd14-4.jpg', 'samsung-galaxy-note-10-plus'),
(15, 'Điện thoại Xiaomi Mi 9 SE', 3, 2, 8, 1, 'Hiệu năng luôn là điểm được người dùng đánh giá rất cao trên những chiếc smartphone Xiaomi và với Xiaomi Mi 9 SE thì tất nhiên cũng không phải là ngoại lệ.', 8490000, 'XM001', 'Điện thoại Xiaomi Mi 9 SE', 'Xanh', NULL, NULL, '2020-03-20', NULL, NULL, 19, 1, 5, 'pd15-1.jpg', 'pd15-2.jpg', 'pd15-3.jpg', 'pd15-4.jpg', 'xiaomi-mi-9-se'),
(16, 'Điện thoại Xiaomi Mi Note 10 Pro', 2, 2, 8, 1, 'Chiếc điện thoại Xiaomi Mi Note 10 Pro gây ấn tượng mạnh cho người dùng với cụm 5 camera và có cảm biến chính với độ phân giải 108 MP lần đầu tiên xuất hiện trên smartphone.', 14990000, 'XM002', 'Điện thoại Xiaomi Mi 9 SE', 'Xanh lá', NULL, NULL, '2020-03-20', NULL, NULL, 19, NULL, NULL, 'pd16-1.jpg', 'pd16-2.jpg', 'pd16-3.jpg', 'pd16-4.jpg', 'xiaomi-mi-note-10-pro'),
(17, 'Điện thoại OPPO Reno 10x Zoom Edition', 1, 2, 9, 1, 'Nếu như trước đây người dùng chỉ đơn giản có một chiếc camera bình thường để chụp ảnh thì giờ đây việc zoom được xa hơn nhưng hình ảnh vẫn rõ nét đang trở thành một xu thế.', 20990000, 'OP001', 'Điện thoại OPPO Reno 10x Zoom Edition', 'Xanh lá', NULL, NULL, '2020-03-20', NULL, NULL, 20, NULL, NULL, 'pd17-1.jpg', 'pd17-2.jpg', 'pd17-3.jpg', 'pd17-4.jpg', 'oppo-reno-10x-zoom-edition'),
(18, 'Android Tivi Sony 4K 49 inch KD-49X8000G', 2, 3, 10, 1, 'Android Tivi Sony 4K 43 inch KD-49X8000G sở hữu thiết kế hiện đại, gọn gàng cùng tông màu tối cứng cáp, mang đến sự hài hoà, sang trọng cho căn phòng được bố trí.', 14750000, 'SN001', 'Sony', 'Xanh lá', NULL, NULL, '2020-03-20', NULL, NULL, 20, NULL, NULL, 'pd18-1.jpg', 'pd18-2.jpg', 'pd18-3.jpg', 'pd18-4.jpg', 'sony-kd-49x8000g');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_desc` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

DROP TABLE IF EXISTS `slide`;
CREATE TABLE IF NOT EXISTS `slide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slide_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slide_img1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slide_text1` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slide_img2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slide_text2` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slide_img3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slide_text3` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slide_img4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slide_text4` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slide_img5` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slide_text5` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subcategory`
--

DROP TABLE IF EXISTS `subcategory`;
CREATE TABLE IF NOT EXISTS `subcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subcategory_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supply_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_category_id` (`category_id`),
  KEY `fk_supply_id` (`supply_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `subcategory`
--

INSERT INTO `subcategory` (`id`, `subcategory_name`, `supply_id`, `category_id`, `slug`) VALUES
(1, 'Dell', 1, 1, 'dell'),
(2, 'ASUS', 1, 1, 'asus'),
(3, 'HP', 1, 1, 'hp'),
(4, 'Acer', 1, 1, 'acer'),
(5, 'MacBook', 1, 1, 'macbook'),
(6, 'Iphone', 1, 2, 'iphone'),
(7, 'Samsung', 1, 2, 'samsung'),
(8, 'Xiaomi', 1, 2, 'xiaomi'),
(9, 'OPPO', 1, 2, 'oppo'),
(10, 'Sony', 1, 3, 'sony'),
(11, 'Panasonic', 1, 3, 'panasonic'),
(12, 'Toshiba', 1, 3, 'toshiba');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `supplies`
--

DROP TABLE IF EXISTS `supplies`;
CREATE TABLE IF NOT EXISTS `supplies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supply_name` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `types`
--

DROP TABLE IF EXISTS `types`;
CREATE TABLE IF NOT EXISTS `types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `types`
--

INSERT INTO `types` (`id`, `type_name`, `type_description`, `slug`) VALUES
(1, 'SẢN PHẨM NỔI BẬT (HOT)', NULL, 'san-pham-noi-bat'),
(2, 'SẢN PHẨM MỚI', NULL, 'san-pham-moi'),
(3, 'SẢN PHẨM GIẢM GIÁ', NULL, 'san-pham-giam-gia');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `user_avartar` varchar(550) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_phone` int(20) DEFAULT NULL,
  `user_address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createDate` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
