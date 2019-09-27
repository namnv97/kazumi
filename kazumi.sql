-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 27, 2019 lúc 04:21 AM
-- Phiên bản máy phục vụ: 10.1.30-MariaDB
-- Phiên bản PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `kazumi`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `article_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `articles`
--

INSERT INTO `articles` (`id`, `title`, `slug`, `thumbnail`, `description`, `article_content`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Quy Định Truy Cập Website', 'quy-dinh-truy-cap-website', '/assets/uploads/images/posts/article_1558425391_628.jpg', 'Website www.longmikazumi.com thuộc quyền sở hữu của GREENFOR CO. LTD', '<p>Website www.longmikazumi.com thuộc quyền sở hữu của GREENFOR CO. LTD</p>', 1, '2019-09-05 22:00:53', '2019-09-05 22:00:53'),
(2, 'Vận Chuyển - Giao Nhận', 'van-chuyen-giao-nhan', '/assets/uploads/images/posts/chi-phi-van-chuyen-hang-hoa.jpg', 'Lông mi KAZUMI – DANG QUANG liên kết với các hãng chuyển phát, vận tải, bưu điện phục vụ dịch vụ giao nhận trên toàn quốc với chi phí rẻ nhất', '<p style=\"text-align:justify\"><span style=\"font-size:13px\"><span style=\"font-family:Roboto,Arial,Helvetica,sans-serif\"><span style=\"font-size:12pt\"><span style=\"font-family:Arial,sans-serif\">L&ocirc;ng mi KAZUMI – DANG QUANG li&ecirc;n kết với c&aacute;c h&atilde;ng chuyển ph&aacute;t, vận tải, bưu điện phục vụ dịch vụ giao nhận tr&ecirc;n to&agrave;n quốc với gi&aacute; ưu đ&atilde;i v&agrave; thời gian nhanh nhất. Sau khi đặt h&agrave;ng, qu&yacute; kh&aacute;ch sẽ được th&ocirc;ng b&aacute;o mức cước ph&iacute; vận chuyển (tiền ship) tương ứng với dịch vụ m&agrave; qu&yacute; kh&aacute;ch đ&atilde; lựa chọn.</span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:13px\"><span style=\"font-family:Roboto,Arial,Helvetica,sans-serif\"><span style=\"font-size:12pt\"><span style=\"font-family:Arial,sans-serif\"><strong>L&ocirc;ng mi KAZUMI – DANG QUANG c&oacute; ch&iacute;nh s&aacute;ch vận chuyển đặc biệt ưu đ&atilde;i d&agrave;nh cho qu&yacute; kh&aacute;ch h&agrave;ng sau đ&acirc;y:</strong>   </span></span></span></span></p>\r\n\r\n<ol>\r\n	<li style=\"text-align:justify\"><em><span style=\"font-family:Arial,sans-serif\">a. <span style=\"font-size:16px\"><span style=\"font-family:Arial,sans-serif\">Miễn ph&iacute; giao h&agrave;ng tr&ecirc;n to&agrave;n quốc cho đơn h&agrave;ng đặt online c&oacute; gi&aacute; trị từ 1 triệu đồng trở l&ecirc;n.</span></span></span></em></li>\r\n	<li style=\"text-align:justify\"><em><span style=\"font-size:16px\"><span style=\"font-family:Arial,sans-serif\">b. Hỗ trợ 50% cước ph&iacute; dịch vụ chuyển ph&aacute;t nhanh hoặc bằng đường h&agrave;ng kh&ocirc;ng cho đơn h&agrave;ng KAZUMI c&oacute; gi&aacute; trị từ 30 triệu đồng trở l&ecirc;n.</span></span></em></li>\r\n	<li style=\"text-align:justify\"><em><span style=\"font-size:16px\"><span style=\"font-family:Arial,sans-serif\">c. Hỗ trợ 100% cước ph&iacute; dịch vụ tiết kiệm hoặc bằng đường bộ tr&ecirc;n to&agrave;n quốc cho tất cả c&aacute;c đơn h&agrave;ng.</span></span></em></li>\r\n	<li style=\"text-align:justify\"><em><span style=\"font-size:16px\"><span style=\"font-family:Arial,sans-serif\">d. Hỗ trợ 100% cước vận chuyển nhanh tới c&aacute;c bến xe hoặc địa chỉ thuộc nội th&agrave;nh H&agrave; nội &aacute;p dụng cho c&aacute;c đơn h&agrave;ng c&oacute; gi&aacute; trị từ 30 triệu đồng trở l&ecirc;n.</span></span></em></li>\r\n	<li style=\"text-align:justify\"><em><span style=\"font-size:16px\"><span style=\"font-family:Arial,sans-serif\">e. Mục (a) – &aacute;p dụng cho c&aacute;c đơn h&agrave;ng Ship COD, mục (b), (c), (d) chỉ &aacute;p dụng cho c&aacute;c đơn h&agrave;ng thanh to&aacute;n trước bằng chuyển khoản.</span></span></em></li>\r\n</ol>', 1, '2019-09-05 22:01:54', '2019-09-05 22:01:54'),
(3, 'Phương Thức Thanh Toán và Giao Hàng', 'phuong-thuc-thanh-toan-va-giao-hang', '/assets/uploads/images/posts/article_1558425239_463.jpg', 'CHUYỂN HÀNG THU TIỀN TẬN NHÀ – SHIP COD thông qua các đơn vị vận chuyển như Viettel Post, VN post, 247 Express, Giao hàng Nhanh, Giao hàng tiết kiệm.', '<p style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"font-family:Roboto,Arial,Helvetica,sans-serif\"><strong><span style=\"font-size:12pt\"><span style=\"font-family:Arial,sans-serif\">Qu&yacute; Kh&aacute;ch h&agrave;ng c&oacute; thể lựa chon c&aacute;c phương thức mua h&agrave;ng v&agrave; thanh to&aacute;n sau:</span></span></strong></span></span></p>\r\n\r\n<p style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"font-family:Roboto,Arial,Helvetica,sans-serif\"><span style=\"font-size:12pt\"><span style=\"font-family:Arial,sans-serif\"> </span></span></span></span></p>\r\n\r\n<p style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"font-family:Roboto,Arial,Helvetica,sans-serif\"><span style=\"font-size:12pt\"><span style=\"font-family:Arial,sans-serif\">1./ CHUYỂN H&Agrave;NG THU TIỀN TẬN NH&Agrave; – SHIP COD  th&ocirc;ng qua c&aacute;c đơn vị vận chuyển như Viettel Post, VN post, 247 Express, Giao h&agrave;ng Nhanh, Giao h&agrave;ng tiết kiệm.</span></span></span></span></p>\r\n\r\n<p style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"font-family:Roboto,Arial,Helvetica,sans-serif\"><span style=\"font-size:12pt\"><span style=\"font-family:Arial,sans-serif\"> </span></span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:Arial,sans-serif\">Qu&yacute; kh&aacute;ch h&agrave;ng c&oacute; thể đặt h&agrave;ng trực tiếp qua website của ch&uacute;ng t&ocirc;i: <a href=\"#\">www.longmikazumi.com</a></span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:Arial,sans-serif\">Hoặc, li&ecirc;n hệ trực tiếp,tin nhắn, zalo, viber qua số hotline: 094-101-6622, hoặc email: longmikazumi@gmail.com</span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:Arial,sans-serif\">Hoặc, Qu&yacute; kh&aacute;ch h&agrave;ng c&oacute; thể truy cập v&agrave;o trang fanpage: https://www.facebook.com/longmikazumi, để được hỗ trợ chi tiết.</span></span></li>\r\n</ul>\r\n\r\n<p style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"font-family:Roboto,Arial,Helvetica,sans-serif\"><span style=\"font-size:12pt\"><span style=\"font-family:Arial,sans-serif\"> </span></span></span></span></p>\r\n\r\n<p style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"font-family:Roboto,Arial,Helvetica,sans-serif\"><span style=\"font-size:12pt\"><span style=\"font-family:Arial,sans-serif\"> </span></span></span></span></p>\r\n\r\n<p style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"font-family:Roboto,Arial,Helvetica,sans-serif\"><span style=\"font-size:12pt\"><span style=\"font-family:Arial,sans-serif\">2./  THANH TO&Aacute;N TIỀN H&Agrave;NG TRƯỚC bằng  chuyển khoản, internet Bangking, hoặc trực tiếp qua c&aacute;c hệ thống ng&acirc;n h&agrave;ng.</span></span></span></span></p>\r\n\r\n<p style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"font-family:Roboto,Arial,Helvetica,sans-serif\"><span style=\"font-size:12pt\"><span style=\"font-family:Arial,sans-serif\"> </span></span></span></span></p>\r\n\r\n<p style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"font-family:Roboto,Arial,Helvetica,sans-serif\"><span style=\"font-size:12pt\"><span style=\"font-family:Arial,sans-serif\"> Th&ocirc;ng tin chuyển khoản:</span></span></span></span></p>\r\n\r\n<p style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"font-family:Roboto,Arial,Helvetica,sans-serif\"><span style=\"font-size:12pt\"><span style=\"font-family:Arial,sans-serif\">                      Số t&agrave;i khoản:  0011000552815</span></span></span></span></p>\r\n\r\n<p style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"font-family:Roboto,Arial,Helvetica,sans-serif\"><span style=\"font-size:12pt\"><span style=\"font-family:Arial,sans-serif\">                      T&ecirc;n chủ t&agrave;i khoản:  TRAN CONG THANG</span></span></span></span></p>\r\n\r\n<p style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"font-family:Roboto,Arial,Helvetica,sans-serif\"><span style=\"font-size:12pt\"><span style=\"font-family:Arial,sans-serif\">                      Ng&acirc;n h&agrave;ng: TMCP Ngoại Thương Việt Nam (Vietcombank), Hội sở ch&iacute;nh.</span></span></span></span></p>\r\n\r\n<p style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"font-family:Roboto,Arial,Helvetica,sans-serif\"><span style=\"font-size:12pt\"><span style=\"font-family:Arial,sans-serif\"> </span></span></span></span></p>\r\n\r\n<p style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"font-family:Roboto,Arial,Helvetica,sans-serif\"><span style=\"font-size:12pt\"><span style=\"font-family:Arial,sans-serif\">Khi chuyển khoản th&agrave;nh c&ocirc;ng  qu&yacute; kh&aacute;ch vui l&ograve;ng th&ocirc;ng b&aacute;o cho ch&uacute;ng t&ocirc;i qua email (longmikazumi@gmail.com ), điện thoại hoặc SMS, Zalo (094-101-6622), với nội  dung: THANH TO&Aacute;N ĐƠN H&Agrave;NG SỐ RX-1234 sđt: 090 404 xxxx </span></span></span></span></p>\r\n\r\n<p style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"font-family:Roboto,Arial,Helvetica,sans-serif\"><span style=\"font-size:12pt\"><span style=\"font-family:Arial,sans-serif\">Sau khi nhận được chuyển khoản ch&uacute;ng t&ocirc;i sẽ chuyển h&agrave;ng đến tới qu&yacute; kh&aacute;ch c&ugrave;ng với số vận đơn của h&atilde;ng vận chuyển, Qu&yacute; kh&aacute;ch c&oacute; thể theo d&otilde;i t&igrave;nh trạng đơn h&agrave;ng th&ocirc;ng qua c&aacute;c trang web do nh&agrave; cung cấp dịch vụ vận tải cung cấp.</span></span></span></span></p>\r\n\r\n<p style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"font-family:Roboto,Arial,Helvetica,sans-serif\"><span style=\"font-size:12pt\"><span style=\"font-family:Arial,sans-serif\"> </span></span></span></span></p>\r\n\r\n<p style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"font-family:Roboto,Arial,Helvetica,sans-serif\"><span style=\"font-size:12pt\"><span style=\"font-family:Arial,sans-serif\">3./ THANH TO&Aacute;N BẰNG TIỀN MẶT TẠI SHOP</span></span></span></span></p>\r\n\r\n<p style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"font-family:Roboto,Arial,Helvetica,sans-serif\"><span style=\"font-size:12pt\"><span style=\"font-family:Arial,sans-serif\"> </span></span></span></span></p>\r\n\r\n<p style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"font-family:Roboto,Arial,Helvetica,sans-serif\"><span style=\"font-size:12pt\"><span style=\"font-family:Arial,sans-serif\">Qu&yacute; kh&aacute;ch h&agrave;ng tới mua h&agrave;ng tại shop thanh to&aacute;n bằng tiền mặt trước khi nhận h&agrave;ng.</span></span></span></span></p>', 1, '2019-09-05 22:03:29', '2019-09-05 22:03:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paypal_order_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` enum('online','atm','cod') COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0: Chưa thanh toán, 1: Đã thanh toán',
  `discount_id` bigint(20) UNSIGNED DEFAULT NULL,
  `voucher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `phone` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` double(12,2) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1: Chờ giao hàng, 2: Đang giao hàng, 3: Giao hàng thành công, 4: Đơn hàng bị hủy',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `first_name`, `last_name`, `company`, `address1`, `address2`, `city`, `paypal_order_id`, `payment_method`, `payment_status`, `discount_id`, `voucher_id`, `phone`, `total`, `status`, `created_at`, `updated_at`) VALUES
(14, 3, 'Lê', 'Loan', 'Pveser', 'Triều Khúc', 'Tân Triều', 'Hà Nội', NULL, 'atm', '0', NULL, NULL, '0356982147', 345000.00, 2, '2019-09-12 02:27:02', '2019-09-15 11:25:46'),
(15, 3, 'Nguyễn', 'Nam', 'Pveser', 'Số 225A Nguyễn Ngọc Vũ', 'Cầu Giấy', 'Hà Nội', NULL, 'cod', '0', 3, NULL, '0365289417', 742500.00, 1, '2019-09-12 02:31:45', '2019-09-12 13:50:50'),
(16, 1, 'Lê', 'Loan', 'Pveser', 'Triều Khúc', 'Tân Triều', 'Hà Nội', '7D352759EG771994M', 'online', '1', 2, NULL, '0356982147', 1715000.00, 1, '2019-09-12 15:01:10', '2019-09-12 15:01:10'),
(17, 2, 'Nguyễn', 'Nam', 'Pveser', 'Số 225A Nguyễn Ngọc Vũ', 'Trung Kính, Cầu Giấy', 'Hà Nội', '83553060D0300991J', 'online', '1', 1, NULL, '0263598417', 1528000.00, 1, '2019-09-16 17:11:20', '2019-09-16 17:11:20'),
(18, 2, 'Nguyễn', 'Nam', 'Pveser', 'Số 225A Nguyễn Ngọc Vũ', 'Trung Kính, Cầu Giấy', 'Hà Nội', NULL, 'cod', '0', 2, NULL, '0263598417', 1990000.00, 1, '2019-09-16 17:16:45', '2019-09-16 17:16:45'),
(19, 1, 'Nguyễn', 'Nam', 'Pveser', 'Số 225A Nguyễn Ngọc Vũ', 'Trung Kính, Cầu Giấy', 'Hà Nội', NULL, 'cod', '0', 1, NULL, '0263598417', 1904000.00, 0, '2019-09-19 23:32:21', '2019-09-19 23:34:30'),
(20, 1, 'Nguyễn', 'Nam', 'Pveser', 'Số 225A Nguyễn Ngọc Vũ', 'Trung Kính, Cầu Giấy', 'Hà Nội', '12H678287N008084G', 'online', '1', NULL, NULL, '0263598417', 2565000.00, 1, '2019-09-19 23:42:11', '2019-09-19 23:42:11'),
(21, 1, 'Nguyễn', 'Nam', 'Pveser', 'Số 225A Nguyễn Ngọc Vũ', 'Trung Kính, Cầu Giấy', 'Hà Nội', '15R38383PJ3863921', 'online', '1', NULL, NULL, '0263598417', 110000.00, 1, '2019-09-20 00:49:31', '2019-09-20 00:49:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_items`
--

CREATE TABLE `cart_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` bigint(20) UNSIGNED NOT NULL,
  `pack_id` bigint(20) UNSIGNED DEFAULT NULL,
  `color_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` double(12,2) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart_items`
--

INSERT INTO `cart_items` (`id`, `cart_id`, `pack_id`, `color_id`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(21, 14, 6, 2, 105000.00, 3, '2019-09-12 02:27:02', '2019-09-12 02:27:02'),
(22, 15, 6, 1, 105000.00, 2, '2019-09-12 02:31:45', '2019-09-12 02:31:45'),
(23, 15, 5, 3, 55000.00, 3, '2019-09-12 02:31:46', '2019-09-12 02:31:46'),
(24, 15, 11, NULL, 105000.00, 4, '2019-09-12 02:31:46', '2019-09-12 02:31:46'),
(25, 16, 6, 2, 105000.00, 10, '2019-09-12 15:01:11', '2019-09-12 15:01:11'),
(26, 16, 6, 1, 105000.00, 7, '2019-09-12 15:01:11', '2019-09-12 15:01:11'),
(27, 17, 6, 2, 105000.00, 8, '2019-09-16 17:11:20', '2019-09-16 17:11:20'),
(28, 17, 3, 5, 80000.00, 5, '2019-09-16 17:11:20', '2019-09-16 17:11:20'),
(29, 17, 3, 4, 80000.00, 3, '2019-09-16 17:11:20', '2019-09-16 17:11:20'),
(30, 17, 3, 2, 80000.00, 5, '2019-09-16 17:11:20', '2019-09-16 17:11:20'),
(31, 18, 6, 1, 105000.00, 4, '2019-09-16 17:16:45', '2019-09-16 17:16:45'),
(32, 18, 6, 2, 105000.00, 3, '2019-09-16 17:16:46', '2019-09-16 17:16:46'),
(33, 18, 6, 4, 105000.00, 5, '2019-09-16 17:16:46', '2019-09-16 17:16:46'),
(34, 18, 4, 5, 60000.00, 6, '2019-09-16 17:16:46', '2019-09-16 17:16:46'),
(35, 18, 1, NULL, 55000.00, 8, '2019-09-16 17:16:46', '2019-09-16 17:16:46'),
(36, 19, 4, 5, 60000.00, 10, '2019-09-19 23:32:21', '2019-09-19 23:32:21'),
(37, 19, 1, NULL, 55000.00, 10, '2019-09-19 23:32:21', '2019-09-19 23:32:21'),
(38, 19, 3, NULL, 80000.00, 15, '2019-09-19 23:32:21', '2019-09-19 23:32:21'),
(39, 20, 6, 2, 105000.00, 10, '2019-09-19 23:42:11', '2019-09-19 23:42:11'),
(40, 20, 6, 1, 105000.00, 5, '2019-09-19 23:42:11', '2019-09-19 23:42:11'),
(41, 20, 6, 4, 105000.00, 8, '2019-09-19 23:42:11', '2019-09-19 23:42:11'),
(42, 20, 4, 5, 60000.00, 2, '2019-09-19 23:42:11', '2019-09-19 23:42:11'),
(43, 21, 3, 5, 80000.00, 1, '2019-09-20 00:49:31', '2019-09-20 00:49:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cities`
--

INSERT INTO `cities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'An Giang', '2019-09-21 09:30:42', NULL),
(2, 'Bà Rịa- Vũng Tàu', '2019-09-21 09:30:42', NULL),
(3, 'Bắc Kạn', '2019-09-21 09:30:42', NULL),
(4, 'Bạc Liêu', '2019-09-21 09:30:42', NULL),
(5, 'Bắc Ninh', '2019-09-21 09:30:42', NULL),
(6, 'Bắc Giang', '2019-09-21 09:30:42', NULL),
(7, 'Bến Tre', '2019-09-21 09:30:42', NULL),
(8, 'Bình Định', '2019-09-21 09:30:42', NULL),
(9, 'Bình Dương', '2019-09-21 09:30:42', NULL),
(10, 'Bình Phước', '2019-09-21 09:30:42', NULL),
(11, 'Bình Thuận', '2019-09-21 09:30:42', NULL),
(12, 'Cà Mau', '2019-09-21 09:30:42', NULL),
(13, 'Cần Thơ', '2019-09-21 09:30:42', NULL),
(14, 'Cao Bằng', '2019-09-21 09:30:42', NULL),
(15, 'Đà Nẵng', '2019-09-21 09:30:42', NULL),
(16, 'Đắk Lắk', '2019-09-21 09:30:42', NULL),
(17, 'Đắk Nông', '2019-09-21 09:30:42', NULL),
(18, 'Điện Biên', '2019-09-21 09:30:42', NULL),
(19, 'Đồng Nai', '2019-09-21 09:30:42', NULL),
(20, 'Đồng Tháp', '2019-09-21 09:30:42', NULL),
(21, 'Gia Lai', '2019-09-21 09:30:42', NULL),
(22, 'Hà Giang', '2019-09-21 09:30:42', NULL),
(23, 'Hà Nội', '2019-09-21 09:30:42', NULL),
(24, 'Hà Tĩnh', '2019-09-21 09:30:42', NULL),
(25, 'Hải Dương', '2019-09-21 09:30:42', NULL),
(26, 'Hải Phòng', '2019-09-21 09:30:42', NULL),
(27, 'Hậu Giang', '2019-09-21 09:30:42', NULL),
(28, 'Hồ Chí Minh', '2019-09-21 09:30:42', NULL),
(29, 'Hòa Bình', '2019-09-21 09:30:42', NULL),
(30, 'Hưng Yên', '2019-09-21 09:30:42', NULL),
(31, 'Khánh Hòa', '2019-09-21 09:30:42', NULL),
(32, 'Kiên Giang', '2019-09-21 09:30:42', NULL),
(33, 'Kon Tum', '2019-09-21 09:30:42', NULL),
(34, 'Lai Châu', '2019-09-21 09:30:42', NULL),
(35, 'Lâm Đồng', '2019-09-21 09:30:42', NULL),
(36, 'Lạng Sơn', '2019-09-21 09:30:42', NULL),
(37, 'Lào Cai', '2019-09-21 09:30:42', NULL),
(38, 'Long An', '2019-09-21 09:30:42', NULL),
(39, 'Nam Định', '2019-09-21 09:30:42', NULL),
(40, 'Nghệ An', '2019-09-21 09:30:42', NULL),
(41, 'Ninh Bình', '2019-09-21 09:30:42', NULL),
(42, 'Ninh Thuận', '2019-09-21 09:30:42', NULL),
(43, 'Phú Thọ', '2019-09-21 09:30:42', NULL),
(44, 'Phú Yên', '2019-09-21 09:30:42', NULL),
(45, 'Quảng Bình', '2019-09-21 09:30:42', NULL),
(46, 'Quảng Nam', '2019-09-21 09:30:42', NULL),
(47, 'Quảng Ngãi', '2019-09-21 09:30:42', NULL),
(48, 'Quảng Ninh', '2019-09-21 09:30:42', NULL),
(49, 'Quảng Trị', '2019-09-21 09:30:42', NULL),
(50, 'Sóc Trăng', '2019-09-21 09:30:42', NULL),
(51, 'Sơn La', '2019-09-21 09:30:42', NULL),
(52, 'Tây Ninh', '2019-09-21 09:30:42', NULL),
(53, 'Thái Bình', '2019-09-21 09:30:42', NULL),
(54, 'Thái Nguyên', '2019-09-21 09:30:42', NULL),
(55, 'Thanh Hóa', '2019-09-21 09:30:42', NULL),
(56, 'Thừa Thiên Huế', '2019-09-21 09:30:42', NULL),
(57, 'Tiền Gianng', '2019-09-21 09:30:42', NULL),
(58, 'Trà Vinh', '2019-09-21 09:30:42', NULL),
(59, 'Tuyên Quang', '2019-09-21 09:30:42', NULL),
(60, 'Vĩnh Long', '2019-09-21 09:30:42', NULL),
(61, 'Vĩnh Phúc', '2019-09-21 09:30:42', NULL),
(62, 'Yên Bái', '2019-09-21 09:30:42', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `collections`
--

CREATE TABLE `collections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `banner` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `collections`
--

INSERT INTO `collections` (`id`, `name`, `slug`, `description`, `banner`, `parent`, `created_at`, `updated_at`) VALUES
(1, 'Lông mi 3D gân lụa', 'long-mi-3d-gan-lua', 'Lông mi 3D gân lụa', '/assets/uploads/images/pages/banner-program.jpg', NULL, NULL, '2019-09-06 20:48:56'),
(2, 'Lông mi gân lụa siêu nhẹ', 'long-mi-gan-lua-sieu-nhe', 'Lông mi gân lụa siêu nhẹ', '/assets/uploads/images/pages/banner-retailer.jpg', 1, NULL, '2019-09-06 20:53:22'),
(3, 'Keo gắn mi', 'keo-gan-mi', 'Keo gắn mi thế hệ mới', '/assets/uploads/images/pages/banner-program.jpg', NULL, '2019-09-04 01:11:44', '2019-09-06 20:48:35'),
(4, 'Bán chạy', 'ban-chay', 'Sản phẩm bán chạy', '/assets/uploads/images/pages/banner-program.jpg', NULL, '2019-09-06 20:08:12', '2019-09-06 20:48:12'),
(5, 'Nổi bật', 'noi-bat', 'Sản phẩm nổi bật', '/assets/uploads/images/pages/banner-retailer.jpg', NULL, '2019-09-06 20:37:15', '2019-09-06 20:47:29'),
(6, 'Lông mi thông thường', 'long-mi-thong-thuong', NULL, '/assets/uploads/images/pages/banner-retailer.jpg', NULL, '2019-09-07 19:06:04', '2019-09-07 19:06:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `colors`
--

INSERT INTO `colors` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Đen', '/assets/uploads/images/colors/black.jpg', '2019-08-25 03:01:37', '2019-08-25 03:01:37'),
(2, 'Đỏ', '/assets/uploads/images/colors/red.png', '2019-08-25 03:01:50', '2019-08-25 03:01:50'),
(3, 'Xanh', '/assets/uploads/images/colors/blue.jpg', '2019-08-25 03:02:03', '2019-08-25 03:02:03'),
(4, 'Nâu', '/assets/uploads/images/colors/brown.jpg', '2019-08-25 03:02:15', '2019-08-25 03:02:15'),
(5, 'Đen - Nâu', '/assets/uploads/images/colors/black-brown.jpg', '2019-08-25 03:02:31', '2019-08-25 03:02:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `discounts`
--

CREATE TABLE `discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('percent','total') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'total',
  `discount_value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_end` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `discounts`
--

INSERT INTO `discounts` (`id`, `code`, `description`, `type`, `discount_value`, `date_end`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Kazumit9', 'Giảm giá 20% cho tất cả đơn hàng', 'percent', '20', '2019-09-30 16:59:59', 1, NULL, NULL),
(2, 'Kazumit9z', 'Giảm 100.000 VNĐ cho tổng đơn hàng', 'total', '100000', '2019-09-29 17:00:00', 1, NULL, '2019-09-18 02:38:37'),
(3, 'Kazumit9c', 'Giảm 10% toàn bộ đơn hàng', 'percent', '10', '2019-09-27 16:59:59', 1, NULL, '2019-09-18 02:44:46'),
(4, 'Kazumit9k', 'Giảm 90.000 VNĐ cho tổng đơn hàng', 'percent', '10', '2019-10-14 17:00:00', 1, '2019-09-18 01:08:16', '2019-09-18 01:08:16'),
(5, 'Kazumit9v', 'Giảm 10% tổng đơn hàng', 'percent', '10', '2019-09-24 17:00:00', 1, '2019-09-18 01:48:09', '2019-09-18 01:48:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `earn_points`
--

CREATE TABLE `earn_points` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `point` int(11) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `unit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `earn_points`
--

INSERT INTO `earn_points` (`id`, `key_code`, `title`, `image`, `point`, `status`, `unit`, `created_at`, `updated_at`) VALUES
(1, 'purchase', 'Nhận điểm khi mua hàng', '/assets/uploads/images/esq-rewards-program-icons-shopping-bag.svg', 10, 0, 'mỗi 20.000VNĐ', '2019-09-17 00:32:40', '2019-09-17 00:32:40'),
(2, 'referral', 'Giới thiệu bạn bè', '/assets/uploads/images/esq-rewards-program-icons-refer-friend.svg', 3000, 1, '1 lần', '2019-09-08 21:43:41', '2019-09-17 00:30:18'),
(3, 'birthday', 'Sinh nhật', '/assets/uploads/images/esq-rewards-program-icons-birthday.svg', 500, 1, '1 lần', '2019-09-09 20:05:07', '2019-09-17 00:30:07'),
(4, 'signup', 'Đăng ký Email', '/assets/uploads/images/esq-rewards-program-icons-newsletter.svg', 700, 1, '1 lần', '2019-09-17 00:34:04', '2019-09-17 00:34:04'),
(5, 'instagram', 'Theo dõi trên Instagram', '/assets/uploads/images/esq-rewards-program-icons-instagram.svg', 200, 1, '1 lần', '2019-09-17 00:35:35', '2019-09-17 00:35:35'),
(6, 'facebook', 'Like trang Facebook', '/assets/uploads/images/esq-rewards-program-icons-facebook.svg', 200, 1, '1 lần', '2019-09-17 00:36:34', '2019-09-17 00:36:34'),
(7, 'review', 'Viết đánh giá', '/assets/uploads/images/write_review.svg', 100, 1, 'mỗi đánh giá', '2019-09-17 00:40:04', '2019-09-20 18:45:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `essentials`
--

CREATE TABLE `essentials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `essential_product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `essentials`
--

INSERT INTO `essentials` (`id`, `product_id`, `essential_product_id`, `created_at`, `updated_at`) VALUES
(15, 3, 1, '2019-09-19 23:28:54', '2019-09-19 23:28:54'),
(16, 3, 2, '2019-09-19 23:28:55', '2019-09-19 23:28:55'),
(17, 3, 4, '2019-09-19 23:28:55', '2019-09-19 23:28:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `forms_data`
--

CREATE TABLE `forms_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `form_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `forms_data`
--

INSERT INTO `forms_data` (`id`, `form_name`, `form_value`, `ip`, `created_at`, `updated_at`) VALUES
(1, 'contact', '{\"name\":\"Nam Nguyen\",\"email\":\"nguyenbinh@gmail.com\",\"phone\":\"123658974\",\"message\":\"ttt\",\"ip\":\"127.0.0.1\"}', '127.0.0.1', '2019-09-06 02:16:33', '2019-09-06 02:16:33'),
(2, 'contact', '{\"name\":\"Nam Nguyen\",\"email\":\"nguyenbinh@gmail.com\",\"phone\":\"0365214897\",\"message\":\"L\\u1eddi nh\\u1eafn\",\"ip\":\"127.0.0.1\"}', '127.0.0.1', '2019-09-06 03:09:21', '2019-09-06 03:09:21'),
(3, 'contact', '{\"name\":\"Nam Nguyen\",\"email\":\"nguyenbinh@gmail.com\",\"phone\":\"0365214897\",\"message\":\"L\\u1eddi nh\\u1eafn\",\"ip\":\"127.0.0.1\"}', '127.0.0.1', '2019-09-06 03:14:22', '2019-09-06 03:14:22'),
(4, 'contact', '{\"name\":\"Nam Nguyen\",\"email\":\"nguyenbinh@gmail.com\",\"phone\":\"0365214897\",\"message\":\"L\\u1eddi nh\\u1eafn\",\"ip\":\"127.0.0.1\"}', '127.0.0.1', '2019-09-06 03:14:24', '2019-09-06 03:14:24'),
(5, 'contact', '{\"name\":\"Nam Nguyen\",\"email\":\"nguyenbinh@gmail.com\",\"phone\":\"0365214897\",\"message\":\"L\\u1eddi nh\\u1eafn\",\"ip\":\"127.0.0.1\"}', '127.0.0.1', '2019-09-06 03:14:24', '2019-09-06 03:14:24'),
(6, 'contact', '{\"name\":\"Nam Nguyen\",\"email\":\"nguyenbinh@gmail.com\",\"phone\":\"0365214897\",\"message\":\"L\\u1eddi nh\\u1eafn\",\"ip\":\"127.0.0.1\"}', '127.0.0.1', '2019-09-06 03:14:25', '2019-09-06 03:14:25'),
(7, 'contact', '{\"name\":\"Nam Nguyen\",\"email\":\"nguyenbinh@gmail.com\",\"phone\":\"0365214897\",\"message\":\"L\\u1eddi nh\\u1eafn\",\"ip\":\"127.0.0.1\"}', '127.0.0.1', '2019-09-06 03:14:26', '2019-09-06 03:14:26'),
(8, 'contact', '{\"name\":\"Nam Nguyen\",\"email\":\"nguyenbinh@gmail.com\",\"phone\":\"0365214897\",\"message\":\"L\\u1eddi nh\\u1eafn\",\"ip\":\"127.0.0.1\"}', '127.0.0.1', '2019-09-06 03:14:27', '2019-09-06 03:14:27'),
(9, 'contact', '{\"name\":\"B\\u00ecnh Nguy\\u1ec5n\",\"email\":\"nguyenbinh@gmail.com\",\"phone\":\"0365214897\",\"message\":\"ajh\",\"ip\":\"127.0.0.1\"}', '127.0.0.1', '2019-09-06 03:14:59', '2019-09-06 03:14:59'),
(10, 'contact', '{\"name\":\"B\\u00ecnh Nguy\\u1ec5n\",\"email\":\"nguyenbinh@gmail.com\",\"phone\":\"0365214897\",\"message\":\"ajh\",\"ip\":\"127.0.0.1\"}', '127.0.0.1', '2019-09-06 03:14:59', '2019-09-06 03:14:59'),
(11, 'contact', '{\"name\":\"B\\u00ecnh Nguy\\u1ec5n\",\"email\":\"nguyenbinh@gmail.com\",\"phone\":\"0365214897\",\"message\":\"ajh\",\"ip\":\"127.0.0.1\"}', '127.0.0.1', '2019-09-06 03:15:00', '2019-09-06 03:15:00'),
(15, 'contact', '{\"name\":\"Nam Nguyen\",\"email\":\"nguyenbinh@gmail.com\",\"phone\":\"123658974\",\"message\":\"Nh\\u1eafn g\\u00ec\",\"ip\":\"127.0.0.1\"}', '', '2019-09-12 21:46:27', '2019-09-12 21:46:27'),
(16, 'contact', '{\"name\":\"Pveser\",\"email\":\"pveser@gmail,com\",\"phone\":\"351616156516\",\"message\":\"slrgna fiakre vaetw\",\"ip\":\"127.0.0.1\"}', '127.0.0.1', '2019-09-12 21:47:36', '2019-09-12 21:47:36'),
(17, 'program', '{\"fullname\":\"Nguy\\u1ec5n V\\u0103n Nam\",\"email\":\"namnguyen@gmail.com\",\"website\":\"namnguyen.com\",\"address1\":\"Ho\\u00e0ng C\\u1ea7u\",\"address2\":\"\\u0110\\u1ed1ng \\u0110a\",\"city\":\"H\\u00e0 N\\u1ed9i\",\"experience\":\"1-3 n\\u0103m\",\"certificate\":\"\\/assets\\/client\\/img\\/certificate\\/BaigiangMIS_TrackChanges_Nam_1569049900.pdf\"}', '127.0.0.1', '2019-09-21 00:11:40', '2019-09-21 00:11:40'),
(18, 'retail', '{\"fullname\":\"Nguy\\u1ec5n V\\u0103n Nam\",\"email\":\"namnguyen@gmail.com\",\"phone\":\"0356289417\",\"website\":\"namnguyen.com\",\"year\":\"2\",\"address1\":\"Nguy\\u1ec5n Ng\\u1ecdc V\\u0169\",\"address2\":\"C\\u1ea7u Gi\\u1ea5y\",\"city\":\"H\\u00e0 N\\u1ed9i\"}', '127.0.0.1', '2019-09-21 01:04:06', '2019-09-21 01:04:06'),
(19, 'retail', '{\"fullname\":\"Ho\\u00e0ng H\\u00e0\",\"email\":\"hoangha@gmail.com\",\"phone\":\"0236598741\",\"website\":\"hoangha.com\",\"year\":\"2\",\"address1\":\"Ho\\u00e0ng C\\u1ea7u\",\"address2\":\"\\u0110\\u1ed1ng \\u0110a\",\"city\":\"H\\u00e0 N\\u1ed9i\"}', '127.0.0.1', '2019-09-21 01:07:38', '2019-09-21 01:07:38'),
(20, 'retail', '{\"fullname\":\"B\\u00f9i Ph\\u01b0\\u01a1ng Nam\",\"email\":\"buiphuongnam@gmail.com\",\"phone\":\"0152669874\",\"website\":\"bpn.kazumi.com\",\"year\":\"1\",\"address1\":\"S\\u1ed1 10\\/15 \\u0111\\u01b0\\u1eddng CMT8\",\"address2\":\"Qu\\u1eadn 10\",\"city\":\"H\\u1ed3 Ch\\u00ed Minh\"}', '127.0.0.1', '2019-09-25 21:39:45', '2019-09-25 21:39:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('image','video') COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `galleries`
--

INSERT INTO `galleries` (`id`, `product_id`, `type`, `url`, `created_at`, `updated_at`) VALUES
(31, 2, 'image', '/assets/uploads/images/products/longmi1.jpg', '2019-09-04 01:09:01', '2019-09-04 01:09:01'),
(32, 2, 'image', '/assets/uploads/images/products/longmi3.jpg', '2019-09-04 01:09:01', '2019-09-04 01:09:01'),
(33, 2, 'image', '/assets/uploads/images/products/longmi4.jpg', '2019-09-04 01:09:01', '2019-09-04 01:09:01'),
(34, 2, 'image', '/assets/uploads/images/products/longmi5.jpg', '2019-09-04 01:09:01', '2019-09-04 01:09:01'),
(35, 2, 'image', '/assets/uploads/images/products/longmi2.jpg', '2019-09-04 01:09:01', '2019-09-04 01:09:01'),
(58, 1, 'image', '/assets/uploads/images/products/longmi1.jpg', '2019-09-04 02:10:50', '2019-09-04 02:10:50'),
(59, 1, 'image', '/assets/uploads/images/products/longmi5.jpg', '2019-09-04 02:10:50', '2019-09-04 02:10:50'),
(60, 1, 'image', '/assets/uploads/images/products/longmi4.jpg', '2019-09-04 02:10:50', '2019-09-04 02:10:50'),
(61, 1, 'image', '/assets/uploads/images/products/longmi2.jpg', '2019-09-04 02:10:50', '2019-09-04 02:10:50'),
(62, 1, 'image', '/assets/uploads/images/products/longmi3.jpg', '2019-09-04 02:10:50', '2019-09-04 02:10:50'),
(67, 4, 'image', '/assets/uploads/images/products/keo-dan-tao-mat-2-mi-848x900.jpg', '2019-09-04 03:01:52', '2019-09-04 03:01:52'),
(68, 4, 'image', '/assets/uploads/images/products/keo-gan-mi.jpg', '2019-09-04 03:01:52', '2019-09-04 03:01:52'),
(89, 9, 'image', '/assets/uploads/images/products/longmi1.jpg', '2019-09-07 18:38:29', '2019-09-07 18:38:29'),
(90, 9, 'image', '/assets/uploads/images/products/longmi3.jpg', '2019-09-07 18:38:29', '2019-09-07 18:38:29'),
(91, 9, 'image', '/assets/uploads/images/products/longmi5.jpg', '2019-09-07 18:38:29', '2019-09-07 18:38:29'),
(92, 10, 'image', '/assets/uploads/images/products/longmi3.jpg', '2019-09-07 18:46:54', '2019-09-07 18:46:54'),
(93, 10, 'image', '/assets/uploads/images/products/longmi4.jpg', '2019-09-07 18:46:55', '2019-09-07 18:46:55'),
(94, 10, 'image', '/assets/uploads/images/products/longmi5.jpg', '2019-09-07 18:46:55', '2019-09-07 18:46:55'),
(95, 10, 'image', '/assets/uploads/images/products/longmi1.jpg', '2019-09-07 18:46:55', '2019-09-07 18:46:55'),
(96, 10, 'image', '/assets/uploads/images/products/longmi2.jpg', '2019-09-07 18:46:55', '2019-09-07 18:46:55'),
(103, 13, 'image', '/assets/uploads/images/products/longmi3.jpg', '2019-09-07 19:08:43', '2019-09-07 19:08:43'),
(104, 13, 'image', '/assets/uploads/images/products/longmi4.jpg', '2019-09-07 19:08:43', '2019-09-07 19:08:43'),
(105, 13, 'image', '/assets/uploads/images/products/longmi5.jpg', '2019-09-07 19:08:43', '2019-09-07 19:08:43'),
(106, 3, 'image', '/assets/uploads/images/products/longmi1.jpg', '2019-09-19 23:28:54', '2019-09-19 23:28:54'),
(107, 3, 'image', '/assets/uploads/images/products/longmi3.jpg', '2019-09-19 23:28:54', '2019-09-19 23:28:54'),
(108, 3, 'image', '/assets/uploads/images/products/longmi4.jpg', '2019-09-19 23:28:54', '2019-09-19 23:28:54'),
(109, 3, 'image', '/assets/uploads/images/products/longmi5.jpg', '2019-09-19 23:28:54', '2019-09-19 23:28:54'),
(110, 3, 'image', '/assets/uploads/images/products/longmi5.jpg', '2019-09-19 23:28:54', '2019-09-19 23:28:54'),
(111, 3, 'image', '/assets/uploads/images/products/longmi4.jpg', '2019-09-19 23:28:54', '2019-09-19 23:28:54'),
(112, 3, 'image', '/assets/uploads/images/products/longmi3.jpg', '2019-09-19 23:28:54', '2019-09-19 23:28:54'),
(113, 3, 'image', '/assets/uploads/images/products/longmi2.jpg', '2019-09-19 23:28:54', '2019-09-19 23:28:54'),
(114, 3, 'image', '/assets/uploads/images/products/longmi1.jpg', '2019-09-19 23:28:54', '2019-09-19 23:28:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `get_reward`
--

CREATE TABLE `get_reward` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `point` int(11) NOT NULL,
  `discount_value` bigint(20) NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `get_reward`
--

INSERT INTO `get_reward` (`id`, `name`, `point`, `discount_value`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Voucher giảm giá 100.000 VNĐ', 500, 100000, '/assets/uploads/images/5dolla.svg', 1, '2019-09-18 00:01:13', '2019-09-20 21:00:47'),
(2, 'Voucher giảm giá 150.000 VNĐ', 750, 150000, '/assets/uploads/images/8dolla.svg', 1, '2019-09-18 00:15:14', '2019-09-20 21:00:34'),
(3, 'Voucher giảm giá 200.000 VNĐ', 1000, 200000, '/assets/uploads/images/25dolla.svg', 1, '2019-09-18 00:15:37', '2019-09-20 21:00:19'),
(4, 'Voucher giảm giá 50.000 VNĐ', 250, 50000, '/assets/uploads/images/8dolla.svg', 1, '2019-09-18 01:35:32', '2019-09-20 20:59:51'),
(5, 'Voucher giảm giá 5$', 500, 100000, '/assets/uploads/images/5dolla.svg', 1, '2019-09-20 20:55:21', '2019-09-20 20:55:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history_reward`
--

CREATE TABLE `history_reward` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `point` int(11) NOT NULL,
  `action` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('approved','waiting') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'waiting',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `history_reward`
--

INSERT INTO `history_reward` (`id`, `user_id`, `point`, `action`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 100, 'Tạo mới tài khoản', 'approved', '2019-09-04 01:10:29', NULL),
(2, 2, 100, 'Tạo mới tài khoản', 'approved', '2019-09-05 02:14:00', NULL),
(3, 3, 100, 'Tạo mới tài khoản', 'approved', '2019-09-07 03:00:00', NULL),
(4, 4, 100, 'Tạo mới tài khoản', 'approved', '2019-08-25 03:04:35', '2019-08-25 03:04:35'),
(5, 5, 100, 'Đăng ký mới tài khoản', 'approved', '2019-09-06 23:40:27', NULL),
(11, 3, 170, 'Hoàn tất đơn hàng #14', 'approved', '2019-09-12 09:27:02', '2019-09-12 09:27:02'),
(12, 3, 370, 'Hoàn tất đơn hàng #15', 'approved', '2019-09-12 09:31:45', '2019-09-12 09:31:45'),
(13, 1, 855, 'Hoàn tất đơn hàng #16', 'approved', '2019-09-12 22:01:11', '2019-09-12 22:01:11'),
(14, 2, 760, 'Hoàn tất đơn hàng #17', 'approved', '2019-09-17 00:11:20', '2019-09-17 00:11:20'),
(15, 2, 995, 'Hoàn tất đơn hàng #18', 'approved', '2019-09-17 00:16:45', '2019-09-17 00:16:45'),
(16, 2, 700, 'Đăng ký Email', 'approved', '2019-09-17 02:55:42', '2019-09-17 02:55:42'),
(17, 1, 700, 'Đăng ký Email', 'approved', '2019-09-17 03:06:30', '2019-09-17 03:06:30'),
(18, 1, 200, 'Like trang Facebook', 'approved', '2019-09-17 03:24:48', '2019-09-17 03:24:48'),
(19, 1, -250, 'Đổi Voucher giảm giá 50.000 VNĐ', 'approved', '2019-09-18 21:31:04', '2019-09-18 21:31:04'),
(20, 1, -1000, 'Đổi Voucher giảm giá 200.000 VNĐ', 'approved', '2019-09-18 21:34:10', '2019-09-18 21:34:10'),
(21, 1, -500, 'Đổi Voucher giảm giá 100.000 VNĐ', 'approved', '2019-09-18 23:33:41', '2019-09-18 23:33:41'),
(22, 1, 190, 'Hoàn tất đơn hàng #19', 'approved', '2019-09-19 23:32:21', '2019-09-19 23:32:21'),
(23, 1, 256, 'Hoàn tất đơn hàng #20', 'approved', '2019-09-19 23:42:11', '2019-09-19 23:42:11'),
(24, 1, 40, 'Hoàn tất đơn hàng #21', 'approved', '2019-09-20 00:49:31', '2019-09-20 00:49:31'),
(25, 1, -500, 'Đổi Voucher giảm giá 5$', 'approved', '2019-09-20 21:02:56', '2019-09-20 21:02:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lash_guide_result`
--

CREATE TABLE `lash_guide_result` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `result_value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lash_guide_result`
--

INSERT INTO `lash_guide_result` (`id`, `result_value`, `created_at`, `updated_at`) VALUES
(4, '{\"event\":\"15\",\"experience\":\"12\",\"eye-type\":\"1\",\"length\":\"7\",\"placements\":\"4\",\"size\":\"6\",\"style\":\"10\"}', '2019-09-24 19:06:26', '2019-09-24 19:31:21'),
(5, '{\"event\":\"13\",\"experience\":\"11\",\"eye-type\":\"1\",\"length\":\"8\",\"placements\":\"4\",\"size\":\"5\",\"style\":\"9\"}', '2019-09-24 19:41:09', '2019-09-24 19:41:09'),
(6, '{\"event\":\"14\",\"experience\":\"11\",\"eye-type\":\"2\",\"length\":\"8\",\"placements\":\"4\",\"size\":\"5\",\"style\":\"9\"}', '2019-09-24 23:33:35', '2019-09-24 23:33:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `layouts`
--

CREATE TABLE `layouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `template` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `layouts`
--

INSERT INTO `layouts` (`id`, `name`, `image`, `template`, `created_at`, `updated_at`) VALUES
(1, 'Page Mặc định', '/assets/client/img/layouts/default_layout.png', 'default', '2019-09-26 08:29:22', NULL),
(2, 'Apply Care', '/assets/client/img/layouts/apply_care.png', 'apply_care', '2019-08-26 03:23:09', NULL),
(3, 'Reward', '/assets/client/img/layouts/layout_reward.png', 'reward', '2019-08-26 00:29:18', NULL),
(4, 'Press', '/assets/client/img/layouts/press.png', 'press', '2019-08-27 03:14:20', NULL),
(5, 'Program', '/assets/client/img/layouts/layout_program.png', 'program', '2019-08-27 02:21:11', NULL),
(6, 'Retailer', '/assets/client/img/layouts/layout_retailer.png', 'retailer', '2019-08-29 03:20:46', NULL),
(7, 'FAQ', '/assets/client/img/layouts/layout_faq.png', 'faq', '2019-08-29 02:14:51', NULL),
(8, 'Lash Guide', '/assets/client/img/layouts/layout_lashguide.png', 'lashguide', '2019-09-23 05:25:34', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_20_165529_create_products_table', 1),
(4, '2019_08_20_171031_create_packs_table', 1),
(5, '2019_08_20_171244_create_colors_table', 1),
(6, '2019_08_20_171304_create_essentials_table', 1),
(7, '2019_08_20_171331_create_galleries_table', 1),
(8, '2019_08_20_171428_create_rating_table', 1),
(9, '2019_08_20_171533_create_collections_table', 1),
(11, '2019_08_21_020233_create_packs_colors_table', 1),
(12, '2019_08_21_023825_create_product_collection_table', 1),
(13, '2019_08_21_024445_create_users_meta_field_table', 1),
(14, '2019_08_21_024518_create_users_meta_table', 1),
(15, '2019_08_21_031818_create_page_layouts_table', 1),
(16, '2019_08_21_032508_create_pages_table', 1),
(17, '2019_08_21_032727_create_page_custom_field_table', 1),
(18, '2019_08_21_033256_create_options_table', 1),
(22, '2019_08_21_035316_create_regions_table', 1),
(23, '2019_08_21_041944_create_shipping_address_user_table', 1),
(24, '2019_08_21_043852_create_tiers_table', 1),
(25, '2019_08_21_044022_create_user_tier_table', 1),
(26, '2019_08_21_050306_create_earn_points_table', 1),
(27, '2019_08_21_064836_create_social_user_follow_table', 1),
(28, '2019_08_21_070028_create_history_reward_table', 1),
(29, '2019_08_21_071227_create_forms_data_table', 1),
(30, '2019_08_21_073227_create_lash_guides_table', 1),
(31, '2019_08_21_073359_create_lash_guide_result_table', 1),
(32, '2019_08_21_093922_create_roles_table', 1),
(33, '2019_08_21_093935_create_role_user_table', 1),
(34, '2019_08_26_071523_create_layouts_table', 2),
(35, '2019_09_04_044247_alter_add_column_status_rating_table', 3),
(36, '2019_09_04_075909_alter_add_column_product_content_products_table', 4),
(37, '2019_09_05_080400_alter_add_column_banner_collections_table', 5),
(38, '2019_08_20_171549_create_articles_table', 6),
(39, '2019_09_08_000533_alter_add_column_ip_forms_data_table', 7),
(40, '2019_09_08_001415_create_register_mail_table', 8),
(41, '2019_09_08_015652_create_jobs_table', 9),
(42, '2019_09_09_034424_create_get_reward_talbe', 10),
(45, '2019_08_21_033640_create_discounts_table', 11),
(46, '2019_09_12_033721_create_user_discount_table', 12),
(49, '2019_09_12_081606_alter_add_paypal_order_id_and_shipping_method_carts_table', 13),
(51, '2019_09_18_044420_create_user_voucher_table', 14),
(52, '2019_09_18_101633_create_vouchers_table', 15),
(53, '2019_08_21_033510_create_carts_table', 16),
(54, '2019_08_21_033539_create_cart_items_table', 17),
(55, '2019_09_21_085748_create_cities_table', 18),
(56, '2019_09_21_084913_create_retailers_table', 19),
(60, '2019_09_23_094121_create_step_lash_table', 20),
(61, '2019_09_23_094538_create_lash_guide_result_table', 21),
(62, '2019_09_23_100216_create_step_item_table', 22),
(63, '2019_09_24_024429_create_result_product_table', 23);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `options`
--

CREATE TABLE `options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `options`
--

INSERT INTO `options` (`id`, `name`, `meta_key`, `meta_value`, `created_at`, `updated_at`) VALUES
(10, 'Logo', 'logo', '/assets/uploads/images/logo.jpg', '2019-08-25 20:44:53', '2019-09-08 19:16:14'),
(34, 'Mega Menu', 'mega_menu', '{\"title\":\"SHOP\",\"link\":\"#\",\"content\":\"<ul>\\r\\n\\t<li><a href=\\\"#\\\">Menu 1<\\/a><\\/li>\\r\\n\\t<li><a href=\\\"#\\\">Menu 2<\\/a><\\/li>\\r\\n<\\/ul>\"}', '2019-09-03 03:12:52', '2019-09-03 03:12:52'),
(35, 'Mega Menu', 'mega_menu', '{\"title\":\"EYELASHER\",\"link\":\"#\",\"content\":\"<ul>\\r\\n\\t<li><a href=\\\"#\\\">Menu 3<\\/a><\\/li>\\r\\n\\t<li><a href=\\\"#\\\">Menu 4<\\/a><\\/li>\\r\\n\\t<li><a href=\\\"#\\\">Menu 5<\\/a><\\/li>\\r\\n<\\/ul>\"}', '2019-09-03 03:12:52', '2019-09-03 03:12:52'),
(36, 'Mega Menu', 'mega_menu', '{\"title\":\"ACCESSORIES\",\"link\":\"#\",\"content\":\"<ul>\\r\\n\\t<li><a href=\\\"#\\\">Menu 6<\\/a><\\/li>\\r\\n\\t<li><a href=\\\"#\\\">Menu 7<\\/a><\\/li>\\r\\n<\\/ul>\"}', '2019-09-03 03:12:52', '2019-09-03 03:12:52'),
(37, 'Sản phẩm', 'mega_product', '{\"id\":\"1\",\"title\":\"L\\u00f4ng mi g\\u00e2n l\\u1ee5a D1\",\"note\":\"S\\u1ea3n ph\\u1ea9m b\\u00e1n ch\\u1ea1y nh\\u1ea5t\"}', '2019-09-03 03:12:52', '2019-09-03 03:12:52'),
(38, 'Sản phẩm', 'mega_product', '{\"id\":\"2\",\"title\":\"L\\u00f4ng mi g\\u00e2n l\\u1ee5a E2\",\"note\":\"S\\u1ea3n ph\\u1ea9m n\\u1ed5i b\\u1eadt\"}', '2019-09-03 03:12:52', '2019-09-03 03:12:52'),
(39, 'Giao hàng vào hoàn lại', 'product_shipping', '<p>Đơn đặt h&agrave;ng sau 12 giờ tối EST sẽ giao h&agrave;ng v&agrave;o ng&agrave;y l&agrave;m việc tiếp theo.</p>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>Region</strong></td>\r\n			<td><strong>Transit Time</strong></td>\r\n			<td><strong>Cost</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>USA</td>\r\n			<td>3-5 business days</td>\r\n			<td>$3.95 or <strong>FREE</strong> on orders $35+*</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Canada</td>\r\n			<td>3-5 business days</td>\r\n			<td>$4.95 or <strong>FREE</strong> on orders $50+*</td>\r\n		</tr>\r\n		<tr>\r\n			<td>UK</td>\r\n			<td>3-5 business days</td>\r\n			<td>$4.95 or <strong>FREE</strong> on orders $35+*</td>\r\n		</tr>\r\n		<tr>\r\n			<td>International</td>\r\n			<td>6-14 business days</td>\r\n			<td>$5.95 or <strong>FREE</strong> on orders $50+*</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>* Sau khi giảm gi&aacute;.</p>\r\n\r\n<p>Trả lại v&agrave; trao đổi<br />\r\nCh&uacute;ng t&ocirc;i muốn đảm bảo rằng bạn ho&agrave;n to&agrave;n th&iacute;ch giao dịch mua h&agrave;ng của m&igrave;nh, đ&oacute; l&agrave; l&yacute; do tại sao ch&uacute;ng t&ocirc;i cung cấp bảo h&agrave;nh 60 ng&agrave;y h&agrave;o ph&oacute;ng. Chỉ cần li&ecirc;n hệ với ch&uacute;ng t&ocirc;i nếu bạn muốn thay đổi đơn đặt h&agrave;ng hoặc nếu bạn muốn trả lại hoặc trao đổi một mặt h&agrave;ng.</p>\r\n\r\n<p>Xem ch&iacute;nh s&aacute;ch ho&agrave;n trả đầy đủ của ch&uacute;ng t&ocirc;i ở <a href=\"#\">đ&acirc;y</a>.</p>', '2019-09-04 05:13:00', '2019-09-04 01:42:22'),
(200, 'Link xem sản phẩm bán chạy', 'view_best_seller', 'http://localhost:8000/collection/ban-chay', '2019-09-06 20:12:37', '2019-09-06 20:12:37'),
(201, 'slide', 'slide', '/assets/uploads/images/pages/banner-press.jpg', '2019-09-06 20:12:37', '2019-09-06 20:12:37'),
(202, 'slide', 'slide', '/assets/uploads/images/pages/banner-retailer.jpg', '2019-09-06 20:12:37', '2019-09-06 20:12:37'),
(203, 'sản phẩm bán chạy', 'product', '1', '2019-09-06 20:12:37', '2019-09-06 20:12:37'),
(204, 'sản phẩm bán chạy', 'product', '2', '2019-09-06 20:12:37', '2019-09-06 20:12:37'),
(205, 'sản phẩm bán chạy', 'product', '3', '2019-09-06 20:12:37', '2019-09-06 20:12:37'),
(206, 'sản phẩm bán chạy', 'product', '4', '2019-09-06 20:12:37', '2019-09-06 20:12:37'),
(207, 'giơi thiệu tiêu đề 1', 'about_title1', 'LOOK & FEEL', '2019-09-06 20:12:37', '2019-09-06 20:12:37'),
(208, 'giơi thiệu tiêu đề 2', 'about_title2', 'NATURAL & LIGHTWEIGHT', '2019-09-06 20:12:37', '2019-09-06 20:12:37'),
(209, 'nội dung giới thiệu', 'about_content', 'Our mink eyelashes are incredibly natural looking, ultra soft and comfortable. Compared to eyelash extensions, our false eyelashes are safer, more beautiful, and more convenient. Put any pair on in the morning and take them off at night.', '2019-09-06 20:12:37', '2019-09-06 20:12:37'),
(210, 'ảnh giới thiệu', 'about_gallery', '/assets/uploads/images/products/longmi1.jpg', '2019-09-06 20:12:37', '2019-09-06 20:12:37'),
(211, 'giơi thiệu tiêu đề 1', 'about_title1', 'EASY TO WEAR', '2019-09-06 20:12:37', '2019-09-06 20:12:37'),
(212, 'giơi thiệu tiêu đề 2', 'about_title2', 'APPLIES EFFORTLESSLY', '2019-09-06 20:12:37', '2019-09-06 20:12:37'),
(213, 'nội dung giới thiệu', 'about_content', 'Handcrafted with a soft cotton band, Our lashes are super flexible and easy apply, even for beginners. Pair with our best selling lash glue for all day wear. All of our fake eyelashes are reusable and can be worn multiple times!', '2019-09-06 20:12:37', '2019-09-06 20:12:37'),
(214, 'ảnh giới thiệu', 'about_gallery', '/assets/uploads/images/products/longmi3.jpg', '2019-09-06 20:12:37', '2019-09-06 20:12:37'),
(215, 'video', 'video', 'https://www.youtube.com/watch?v=kxYBGK1ptH8', '2019-09-06 20:12:37', '2019-09-06 20:12:37'),
(216, 'video', 'video_title1', 'NEW TO FALSIES?', '2019-09-06 20:12:38', '2019-09-06 20:12:38'),
(217, 'video', 'video_title2', 'LEARN TO APPLY LIKE A PRO IN MINUTES', '2019-09-06 20:12:38', '2019-09-06 20:12:38'),
(218, 'ảnh đại diện video', 'video_gallery', '/assets/uploads/images/banner-video.jpg', '2019-09-06 20:12:38', '2019-09-06 20:12:38'),
(219, 'sản phẩm hot', 'product_look_product', '1', '2019-09-06 20:12:38', '2019-09-06 20:12:38'),
(220, 'ảnh sản phẩm hot', 'product_look_gallery', '/assets/uploads/images/products/longmi4.jpg', '2019-09-06 20:12:38', '2019-09-06 20:12:38'),
(221, 'sản phẩm hot', 'product_look_product', '2', '2019-09-06 20:12:38', '2019-09-06 20:12:38'),
(222, 'ảnh sản phẩm hot', 'product_look_gallery', '/assets/uploads/images/products/longmi3.jpg', '2019-09-06 20:12:38', '2019-09-06 20:12:38'),
(223, 'sản phẩm hot', 'product_look_product', '3', '2019-09-06 20:12:38', '2019-09-06 20:12:38'),
(224, 'ảnh sản phẩm hot', 'product_look_gallery', '/assets/uploads/images/products/longmi2.jpg', '2019-09-06 20:12:38', '2019-09-06 20:12:38'),
(225, 'sản phẩm hot', 'product_look_product', '4', '2019-09-06 20:12:38', '2019-09-06 20:12:38'),
(226, 'ảnh sản phẩm hot', 'product_look_gallery', '/assets/uploads/images/products/keo-gan-mi.jpg', '2019-09-06 20:12:38', '2019-09-06 20:12:38'),
(227, 'bộ sưu tập', 'collection', '1', '2019-09-06 20:12:38', '2019-09-06 20:12:38'),
(228, 'ảnh bộ sưu tập', 'collection_gallery', '/assets/uploads/images/pages/care1.jpg', '2019-09-06 20:12:38', '2019-09-06 20:12:38'),
(229, 'tiêu đề bộ sưu tập', 'collection_title', 'Lông mi 3D gân lụa', '2019-09-06 20:12:38', '2019-09-06 20:12:38'),
(230, 'bộ sưu tập', 'collection', '2', '2019-09-06 20:12:38', '2019-09-06 20:12:38'),
(231, 'ảnh bộ sưu tập', 'collection_gallery', '/assets/uploads/images/pages/care2.jpg', '2019-09-06 20:12:38', '2019-09-06 20:12:38'),
(232, 'tiêu đề bộ sưu tập', 'collection_title', 'Lông mi gân lụa siêu nhẹ', '2019-09-06 20:12:38', '2019-09-06 20:12:38'),
(233, 'bộ sưu tập', 'collection', '3', '2019-09-06 20:12:38', '2019-09-06 20:12:38'),
(234, 'ảnh bộ sưu tập', 'collection_gallery', '/assets/uploads/images/pages/care3.jpg', '2019-09-06 20:12:38', '2019-09-06 20:12:38'),
(235, 'tiêu đề bộ sưu tập', 'collection_title', 'Keo gắn mi mới', '2019-09-06 20:12:39', '2019-09-06 20:12:39'),
(236, 'tiêu đề sản phảm hot1', 'look_title1', 'DISCOVER', '2019-09-06 20:12:39', '2019-09-06 20:12:39'),
(237, 'tiêu đề sản phảm hot2', 'look_title2', 'INSPIRING LOOKS', '2019-09-06 20:12:39', '2019-09-06 20:12:39'),
(238, '', 'banner_collection', '/assets/uploads/images/banner-video.jpg', '2019-09-06 21:23:39', '2019-09-06 21:23:39'),
(239, '', 'suggest_collection', '<p style=\"text-align:center\"><strong><span style=\"font-size:18px\">BẠN KH&Ocirc;NG THỂ ĐƯA RA QUYẾT ĐỊNH</span></strong></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:14px\">H&atilde;y thử <a href=\"#\">lựa chọn</a> theo đ&aacute;nh gi&aacute; kh&aacute;ch quan từ ch&uacute;ng t&ocirc;i</span></p>', '2019-09-06 21:23:39', '2019-09-08 19:14:54'),
(240, '', 'reward_help', '<p><strong>HOW DOES THIS WORK?</strong></p>\r\n\r\n<p>We&#39;ve created the ESQIDO Rewards as a token of our appreciation for our customers. You’ll earn points for activities on our site, like referrals and purchases. You can use them to earn discounts off purchases, so the more you collect the more you save.</p>\r\n\r\n<p><strong>WHO CAN JOIN?</strong></p>\r\n\r\n<p>Anyone with an account is automatically enrolled.</p>\r\n\r\n<p><strong>HOW DO I EARN POINTS?</strong></p>\r\n\r\n<p>You can earn points for all sorts of activities, including referring friends, liking and following us on Facebook and Instagram, and making purchases. To see all the ways you can earn points click the <em>Earn Points</em> tab in the menu.</p>', '2019-09-08 19:16:14', '2019-09-08 19:16:14'),
(243, 'Menu', 'menus', '[{\"url\":\"#\",\"text\":\"SHOP\"},{\"url\":\"#\",\"text\":\"LEARN\",\"children\":[{\"url\":\"http:\\/\\/localhost:8000\\/page\\/lash-guide\",\"text\":\"Lash Guide\"},{\"url\":\"http:\\/\\/localhost:8000\\/page\\/ap-dung-va-cham-soc\",\"text\":\"\\u00c1p d\\u1ee5ng v\\u00e0 ch\\u0103m s\\u00f3c\"}]},{\"url\":\"http:\\/\\/localhost:8000\\/page\\/diem-thuong\",\"text\":\"\\u0110i\\u1ec3m th\\u01b0\\u1edfng\"},{\"url\":\"http:\\/\\/localhost:8000\\/page\\/press\",\"text\":\"Press\"},{\"url\":\"#\",\"text\":\"MORE\",\"children\":[{\"url\":\"http:\\/\\/localhost:8000\\/page\\/kazumi-program\",\"text\":\"Kazumi Program\"},{\"url\":\"http:\\/\\/localhost:8000\\/page\\/retailer-page\",\"text\":\"Retailer Page\"},{\"url\":\"http:\\/\\/localhost:8000\\/news\",\"text\":\"TIN T\\u1ee8C\"},{\"url\":\"http:\\/\\/localhost:8000\\/page\\/faq\",\"text\":\"FAQ\"},{\"url\":\"http:\\/\\/localhost:8000\\/lien-he\",\"text\":\"LI\\u00caN H\\u1ec6\"}]}]', '2019-09-24 20:46:38', '2019-09-24 20:46:38'),
(244, '', 'code_percent', '10', '2019-09-25 02:45:36', '2019-09-25 02:53:09'),
(245, '', 'lash_title', 'All esqido lashes are:', '2019-09-25 02:45:36', '2019-09-25 02:53:09'),
(246, '', 'lash_title_video', 'See our lashes in action', '2019-09-25 02:45:36', '2019-09-25 02:53:09'),
(247, '', 'lash_youtube', 'https://www.youtube.com/watch?v=2Bwu4WMu0t4', '2019-09-25 02:45:36', '2019-09-25 03:14:10'),
(248, '', 'lash_result_title', 'We recommend these lash styles for you.', '2019-09-25 02:45:36', '2019-09-25 02:53:09'),
(283, 'Menu Footer', 'menuft', '<a href=\"http://localhost:8000/\">© ESQIDO</a>\r\n<span class=\"Footer__Divider\"> | </span>\r\n<a href=\"http://localhost:8000/page/privacy-policy\">Privacy Policy</a>\r\n<span class=\"Footer__Divider\"> | </span>\r\n<a href=\"http://localhost:8000/page/terms-va-conditions\">Terms  Conditions</a>', '2019-09-25 21:33:37', '2019-09-26 03:21:29'),
(295, '', 'afshipping', 'Free shipping for orders <b>over 50 USD</b> to Ho Chi Minh City, Viet Nam', '2019-09-26 02:28:18', '2019-09-26 02:49:39'),
(296, '', 'af_content', 'The Esqido Companion Eyelash Glue is the #1 best selling lash glue! Specially formulated to be latex-free, it\'s a gentle mixture that offers a strong all-day hold, without harming your own natural lashes. With a fine tip wand, you\'ll be able to apply the right amount of glue to your false lashes, every time. Dries clear.', '2019-09-26 02:28:18', '2019-09-26 02:28:18'),
(323, '', 'lash_attr', '{\"image\":\"\\/assets\\/uploads\\/images\\/icon\\/curler-icon.svg\",\"title\":\"Easy to Apply\"}', '2019-09-26 02:49:38', '2019-09-26 02:49:38'),
(324, '', 'lash_attr', '{\"image\":\"\\/assets\\/uploads\\/images\\/icon\\/eyelash-icon.svg\",\"title\":\"Ultra-natural looking\"}', '2019-09-26 02:49:39', '2019-09-26 02:49:39'),
(325, '', 'lash_attr', '{\"image\":\"\\/assets\\/uploads\\/images\\/icon\\/feather-icon.svg\",\"title\":\"Lightweight & Comfortable\"}', '2019-09-26 02:49:39', '2019-09-26 02:49:39'),
(326, '', 'lash_attr', '{\"image\":\"\\/assets\\/uploads\\/images\\/icon\\/time-icon.svg\",\"title\":\"Multiple Wears\"}', '2019-09-26 02:49:39', '2019-09-26 02:49:39'),
(327, '', 'result_default', '[\"1\",\"2\",\"9\"]', '2019-09-26 02:49:39', '2019-09-26 02:49:39'),
(328, '', 'af_attr', '{\"image\":\"\\/assets\\/uploads\\/images\\/icon\\/time-icon.svg\",\"title\":\"Strong All-Day Hold\"}', '2019-09-26 02:49:39', '2019-09-26 02:49:39'),
(329, '', 'af_attr', '{\"image\":\"\\/assets\\/uploads\\/images\\/icon\\/water-icon.svg\",\"title\":\"Water Resistant\"}', '2019-09-26 02:49:39', '2019-09-26 02:49:39'),
(330, '', 'af_attr', '{\"image\":\"\\/assets\\/uploads\\/images\\/icon\\/mortar-icon.svg\",\"title\":\"5-free, formaldehyde free, latex-free.\"}', '2019-09-26 02:49:39', '2019-09-26 02:49:39'),
(331, '', 'af_attr', '{\"image\":\"\\/assets\\/uploads\\/images\\/icon\\/animal-icon.svg\",\"title\":\"No Animal Testing\"}', '2019-09-26 02:49:39', '2019-09-26 02:49:39'),
(332, 'Menu', 'menumobile', '[{\"url\":\"#\",\"text\":\"SHOP\",\"children\":[{\"url\":\"ban-chay\",\"text\":\"B\\u00e1n ch\\u1ea1y\"},{\"url\":\"noi-bat\",\"text\":\"N\\u1ed5i b\\u1eadt\"},{\"url\":\"long-mi-3d-gan-lua\",\"text\":\"L\\u00f4ng mi 3D g\\u00e2n l\\u1ee5a\"},{\"url\":\"long-mi-gan-lua-sieu-nhe\",\"text\":\"L\\u00f4ng mi g\\u00e2n l\\u1ee5a si\\u00eau nh\\u1eb9\"},{\"url\":\"keo-gan-mi\",\"text\":\"Keo g\\u1eafn mi\"},{\"url\":\"long-mi-thong-thuong\",\"text\":\"L\\u00f4ng mi th\\u00f4ng th\\u01b0\\u1eddng\"}]},{\"url\":\"#\",\"text\":\"LEARN\",\"children\":[{\"url\":\"http:\\/\\/localhost:8000\\/page\\/lash-guide\",\"text\":\"Lash Guide\"},{\"url\":\"http:\\/\\/localhost:8000\\/page\\/ap-dung-va-cham-soc\",\"text\":\"\\u00c1p d\\u1ee5ng v\\u00e0 ch\\u0103m s\\u00f3c\"}]},{\"url\":\"http:\\/\\/localhost:8000\\/page\\/diem-thuong\",\"text\":\"\\u0110i\\u1ec3m th\\u01b0\\u1edfng\"},{\"url\":\"http:\\/\\/localhost:8000\\/page\\/press\",\"text\":\"Press\"},{\"url\":\"#\",\"text\":\"MORE\",\"children\":[{\"url\":\"http:\\/\\/localhost:8000\\/page\\/kazumi-program\",\"text\":\"Kazumi Program\"},{\"url\":\"http:\\/\\/localhost:8000\\/page\\/retailer-page\",\"text\":\"Retailer Page\"},{\"url\":\"http:\\/\\/localhost:8000\\/news\",\"text\":\"TIN T\\u1ee8C\"},{\"url\":\"http:\\/\\/localhost:8000\\/page\\/faq\",\"text\":\"FAQ\"},{\"url\":\"http:\\/\\/localhost:8000\\/lien-he\",\"text\":\"Li\\u00ean h\\u1ec7\"}]}]', '2019-09-26 03:02:22', '2019-09-26 03:02:22'),
(339, 'Nội dung Footer', 'footer', '{\"title\":\"ABOUT ESQIDO\",\"content\":\"<p>Esqido is the world&#39;s leading brand of mink and false eyelashes, adorne by celebrities and pro artists around the world. Discover the ultimate lash experience with Esqido.<\\/p>\\r\\n\\r\\n<p>\\u00a0<\\/p>\\r\\n\\r\\n<p><strong>Questions?\\u00a0<\\/strong><a href=\\\"#\\\">support@esqido.com<\\/a><\\/p>\\r\\n\\r\\n<p>185 Bridgeland Ave, Suite 102, Toronto, ON, M6A 1Y7<\\/p>\"}', '2019-09-26 03:21:29', '2019-09-26 03:21:29'),
(340, 'Nội dung Footer', 'footer', '{\"title\":\"SHOP\",\"content\":\"<ul>\\r\\n\\t<li><a href=\\\"https:\\/\\/esqido.com\\/pages\\/find-the-perfect-false-lashes\\\">Lash Guide<\\/a><\\/li>\\r\\n\\t<li><a href=\\\"https:\\/\\/esqido.com\\/collections\\/mink-false-eyelashes\\\">Mink Lashes<\\/a><\\/li>\\r\\n\\t<li><a href=\\\"https:\\/\\/esqido.com\\/collections\\/unisyn-false-eyelashes\\\">Unisyn\\u2122 Lashes<\\/a><\\/li>\\r\\n\\t<li><a href=\\\"https:\\/\\/esqido.com\\/products\\/companion-lash-glue\\\">Eyelash Glue<\\/a><\\/li>\\r\\n\\t<li><a href=\\\"https:\\/\\/esqido.com\\/products\\/gel-liner-pencil\\\">Eyeliners<\\/a><\\/li>\\r\\n<\\/ul>\"}', '2019-09-26 03:21:29', '2019-09-26 03:21:29'),
(341, 'Nội dung Footer', 'footer', '{\"title\":\"INFORMATION\",\"content\":\"<ul>\\r\\n\\t<li><a href=\\\"https:\\/\\/esqido.com\\/pages\\/apply-and-care\\\">Apply & Care<\\/a><\\/li>\\r\\n\\t<li><a href=\\\"https:\\/\\/esqido.com\\/pages\\/faq\\\">Shipping & Returns<\\/a><\\/li>\\r\\n\\t<li><a href=\\\"https:\\/\\/esqido.com\\/pages\\/faq\\\">FAQ<\\/a><\\/li>\\r\\n\\t<li><a href=\\\"https:\\/\\/esqido.com\\/pages\\/contact-us\\\">Contact us<\\/a><\\/li>\\r\\n\\t<li><a href=\\\"#\\\">Test<\\/a><\\/li>\\r\\n<\\/ul>\"}', '2019-09-26 03:21:29', '2019-09-26 03:21:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `packs`
--

CREATE TABLE `packs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('single','multi') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'single',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(10,2) NOT NULL,
  `sale` double(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `packs`
--

INSERT INTO `packs` (`id`, `product_id`, `type`, `name`, `price`, `sale`, `created_at`, `updated_at`) VALUES
(1, 1, 'single', '1 sản phẩm', 60000.00, 55000.00, '2019-08-25 03:03:21', '2019-08-25 03:03:21'),
(2, 1, 'multi', '2 sản phẩm', 120000.00, 105000.00, '2019-08-25 03:03:52', '2019-08-25 03:03:52'),
(3, 2, 'single', '1 sản phẩm', 80000.00, NULL, '2019-08-27 03:14:03', '2019-08-27 03:14:03'),
(4, 3, 'single', '1 sản phẩm', 60000.00, NULL, '2019-09-03 03:36:18', '2019-09-03 03:36:18'),
(5, 4, 'single', '1 sản phẩm', 60000.00, 55000.00, '2019-09-04 01:17:34', '2019-09-04 01:17:34'),
(6, 4, 'multi', '2 sản phẩm', 120000.00, 105000.00, '2019-09-04 01:17:34', '2019-09-04 01:17:34'),
(11, 9, 'single', '1 sản phẩm', 105000.00, NULL, '2019-09-07 18:38:29', '2019-09-07 18:38:29'),
(12, 10, 'single', '1 sản phẩm', 120000.00, 110000.00, '2019-09-07 18:46:54', '2019-09-07 18:46:54'),
(15, 13, 'single', '1 sản  phẩm', 35000.00, NULL, '2019-09-07 19:08:43', '2019-09-07 19:08:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `packs_colors`
--

CREATE TABLE `packs_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pack_id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `packs_colors`
--

INSERT INTO `packs_colors` (`id`, `pack_id`, `color_id`, `created_at`, `updated_at`) VALUES
(7, 3, 5, '2019-08-27 03:14:03', '2019-08-27 03:14:03'),
(8, 3, 4, '2019-08-27 03:14:03', '2019-08-27 03:14:03'),
(9, 3, 2, '2019-08-27 03:14:03', '2019-08-27 03:14:03'),
(39, 5, 3, '2019-09-04 03:01:52', '2019-09-04 03:01:52'),
(40, 5, 2, '2019-09-04 03:01:52', '2019-09-04 03:01:52'),
(41, 6, 4, '2019-09-04 03:01:52', '2019-09-04 03:01:52'),
(42, 6, 2, '2019-09-04 03:01:52', '2019-09-04 03:01:52'),
(43, 6, 1, '2019-09-04 03:01:52', '2019-09-04 03:01:52'),
(46, 4, 5, '2019-09-19 23:28:53', '2019-09-19 23:28:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `template` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `pages`
--

INSERT INTO `pages` (`id`, `name`, `slug`, `template`, `created_at`, `updated_at`) VALUES
(2, 'Áp dụng và chăm sóc', 'ap-dung-va-cham-soc', 'apply_care', '2019-08-26 01:55:31', '2019-08-26 01:55:31'),
(4, 'Điểm thưởng', 'diem-thuong', 'reward', '2019-08-26 19:54:00', '2019-08-26 19:54:00'),
(5, 'Tích lũy điểm thưởng', 'tich-luy-diem-thuong', 'reward', '2019-08-26 20:07:27', '2019-08-26 20:07:27'),
(7, 'Page Apply Care', 'page-apply-care', 'apply_care', '2019-08-28 02:56:25', '2019-08-28 02:56:25'),
(8, 'Reward Test', 'reward-test-1', 'reward', '2019-08-28 09:42:12', '2019-08-28 09:58:38'),
(9, 'Kazumi Program', 'kazumi-program', 'program', '2019-08-28 10:23:50', '2019-08-28 10:23:50'),
(10, 'Press', 'press', 'press', '2019-08-28 20:44:00', '2019-08-28 20:44:00'),
(11, 'Retailer Page', 'retailer-page', 'retailer', '2019-08-28 22:03:23', '2019-08-28 22:03:23'),
(12, 'FAQ', 'faq', 'faq', '2019-08-29 01:33:17', '2019-08-29 01:33:17'),
(15, 'Lash Guide', 'lash-guide', 'lashguide', '2019-09-23 02:03:47', '2019-09-23 02:27:25'),
(16, 'Privacy Policy', 'privacy-policy', 'default', '2019-09-25 20:37:46', '2019-09-25 21:03:03'),
(17, 'Terms & Conditions', 'terms-va-conditions', 'default', '2019-09-25 21:06:55', '2019-09-25 21:06:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `page_custom_field`
--

CREATE TABLE `page_custom_field` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_id` bigint(20) UNSIGNED NOT NULL,
  `meta_field` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `page_custom_field`
--

INSERT INTO `page_custom_field` (`id`, `page_id`, `meta_field`, `meta_value`, `created_at`, `updated_at`) VALUES
(1, 2, 'banner', '/assets/uploads/images/pages/banner-apply.jpg', NULL, NULL),
(2, 2, 'page_title', 'Áp dụng và chăm sóc', NULL, NULL),
(3, 2, 'description', 'Thực hiện theo các bước dưới đây để áp dụng và chăm sóc lông mi giả như một chuyên gia.', NULL, NULL),
(4, 2, 'apply_video', 'https://www.youtube.com/watch?v=YzoPmyelSzw', NULL, NULL),
(17, 4, 'banner', '/assets/uploads/images/Pages/banner-reward.jpg', '2019-08-26 19:54:00', '2019-08-27 02:37:52'),
(18, 4, 'banner_title', '/assets/uploads/images/pages/banner-title.svg', '2019-08-26 19:54:00', '2019-08-26 19:54:00'),
(19, 4, 'earn_title', 'Mua hàng và tích điểm', '2019-08-26 19:54:00', '2019-08-26 19:54:00'),
(20, 4, 'earn_description', 'Kiếm 10 điểm mỗi 1$ khi mua hàng', '2019-08-26 19:54:00', '2019-08-27 02:37:26'),
(21, 4, 'earn_img', '/assets/uploads/images/pages/earn_point.svg', '2019-08-26 19:54:00', '2019-08-26 19:54:00'),
(22, 5, 'banner', '/assets/uploads/images/pages/banner-reward.jpg', '2019-08-26 20:07:27', '2019-08-26 20:07:27'),
(23, 5, 'banner_title', '/assets/uploads/images/pages/banner-title.svg', '2019-08-26 20:07:27', '2019-08-26 20:07:27'),
(24, 5, 'earn_title', 'Tích lũy điểm thưởng', '2019-08-26 20:07:27', '2019-08-26 20:07:27'),
(25, 5, 'earn_description', 'Cập nhật điểm thưởng', '2019-08-26 20:07:27', '2019-08-27 02:38:26'),
(26, 5, 'earn_img', '/assets/uploads/images/pages/earn_point.svg', '2019-08-26 20:07:27', '2019-08-26 20:07:27'),
(46, 2, 'apply', '{\"image\":\"\\/assets\\/uploads\\/images\\/pages\\/apply1.svg\",\"content\":\"<p>N\\u1ed9i dung 1 update<\\/p>\"}', '2019-08-27 02:11:20', '2019-08-27 02:11:20'),
(47, 2, 'apply', '{\"image\":\"\\/assets\\/uploads\\/images\\/pages\\/apply2.svg\",\"content\":\"<p>N\\u1ed9i dung 2 upadte<\\/p>\"}', '2019-08-27 02:11:20', '2019-08-27 02:11:20'),
(48, 2, 'remove', '{\"image\":\"\\/assets\\/uploads\\/images\\/pages\\/remove1.jpg\",\"content\":\"<p>X&oacute;a 1<\\/p>\"}', '2019-08-27 02:11:20', '2019-08-27 02:11:20'),
(49, 2, 'remove', '{\"image\":\"\\/assets\\/uploads\\/images\\/pages\\/remove2.jpg\",\"content\":\"<p>X&oacute;a 2<\\/p>\"}', '2019-08-27 02:11:20', '2019-08-27 02:11:20'),
(50, 2, 'remove', '{\"image\":\"\\/assets\\/uploads\\/images\\/pages\\/remove3.jpg\",\"content\":\"<p>X&oacute;a 3<\\/p>\"}', '2019-08-27 02:11:20', '2019-08-27 02:11:20'),
(51, 2, 'care', '{\"image\":\"\\/assets\\/uploads\\/images\\/pages\\/care1.jpg\",\"content\":\"<p>Care 1<\\/p>\"}', '2019-08-27 02:11:20', '2019-08-27 02:11:20'),
(52, 2, 'care', '{\"image\":\"\\/assets\\/uploads\\/images\\/pages\\/care3.jpg\",\"content\":\"<p>Care 3<\\/p>\"}', '2019-08-27 02:11:20', '2019-08-27 02:11:20'),
(53, 2, 'care', '{\"image\":\"\\/assets\\/uploads\\/images\\/Pages\\/care2.jpg\",\"content\":\"<p>Care 3<\\/p>\"}', '2019-08-27 02:11:20', '2019-08-27 02:11:20'),
(54, 7, 'banner', '/assets/uploads/images/pages/banner-reward.jpg', '2019-08-28 02:56:25', '2019-08-28 02:56:25'),
(55, 7, 'page_title', 'Apply Care abc', '2019-08-28 02:56:25', '2019-08-28 08:37:47'),
(56, 7, 'description', 'mô tả Apply care s', '2019-08-28 02:56:25', '2019-08-28 08:37:47'),
(57, 7, 'apply_video', 'https://www.youtube.com/watch?v=waM3C5zsuIM', '2019-08-28 02:56:25', '2019-08-28 02:56:25'),
(61, 7, 'apply', '{\"image\":\"\\/assets\\/uploads\\/images\\/pages\\/apply1.svg\",\"content\":\"<p>Ch\\u0103m s&oacute;c b\\u01b0\\u1edbc 1<\\/p>\"}', '2019-08-28 08:47:45', '2019-08-28 08:47:45'),
(62, 7, 'remove', '{\"image\":\"\\/assets\\/uploads\\/images\\/pages\\/remove1.jpg\",\"content\":\"<p>B\\u01b0\\u1edbc 1.<\\/p>\\r\\n\\r\\n<p>X&oacute;a mi<\\/p>\"}', '2019-08-28 08:47:45', '2019-08-28 08:47:45'),
(63, 7, 'care', '{\"image\":\"\\/assets\\/uploads\\/images\\/pages\\/care1.jpg\",\"content\":\"<p>Ch\\u0103m s&oacute;c mi<\\/p>\"}', '2019-08-28 08:47:45', '2019-08-28 08:47:45'),
(64, 7, 'care', '{\"image\":\"\\/assets\\/uploads\\/images\\/pages\\/care2.jpg\",\"content\":\"<p>B\\u01b0\\u1edbc hai.<\\/p>\\r\\n\\r\\n<p>X&oacute;a v\\u1ebft<\\/p>\"}', '2019-08-28 08:47:45', '2019-08-28 08:47:45'),
(65, 8, 'banner', '/assets/uploads/images/pages/banner-reward.jpg', '2019-08-28 09:42:12', '2019-08-28 09:58:38'),
(66, 8, 'banner_title', '/assets/uploads/images/pages/banner-title.svg', '2019-08-28 09:42:12', '2019-08-28 09:58:38'),
(67, 8, 'earn_title', 'Tích điểm', '2019-08-28 09:42:12', '2019-08-28 09:58:38'),
(68, 8, 'earn_description', 'Kiếm điểm tích lũy khi mua hàng', '2019-08-28 09:42:12', '2019-08-28 09:58:38'),
(69, 8, 'earn_img', '/assets/uploads/images/pages/earn_point.svg', '2019-08-28 09:42:12', '2019-08-28 09:58:38'),
(70, 9, 'banner', '/assets/uploads/images/pages/banner-program.jpg', '2019-08-28 10:23:51', '2019-08-28 10:43:43'),
(71, 9, 'page_title', 'Kazumi program', '2019-08-28 10:23:51', '2019-08-28 10:43:43'),
(72, 9, 'page_description', 'Lorem Ipsum is simply dummy text o', '2019-08-28 10:23:51', '2019-08-28 10:43:43'),
(73, 9, 'pro_title', 'Lorem input', '2019-08-28 10:23:51', '2019-08-28 10:43:43'),
(74, 9, 'pro_description', 'Lorem Ipsum is simply dummy text of the printin', '2019-08-28 10:23:51', '2019-08-28 10:43:43'),
(78, 9, 'program', '{\"image\":\"\\/assets\\/uploads\\/images\\/pages\\/bnf1.png\",\"name\":\"Qu\\u00e0 t\\u1eb7ng 1\"}', '2019-08-28 10:43:43', '2019-08-28 10:43:43'),
(79, 9, 'program', '{\"image\":\"\\/assets\\/uploads\\/images\\/pages\\/bnf2.png\",\"name\":\"\\u0110\\u00e0o t\\u1ea1o 2\"}', '2019-08-28 10:43:44', '2019-08-28 10:43:44'),
(80, 9, 'program', '{\"image\":\"\\/assets\\/uploads\\/images\\/pages\\/bnf3.png\",\"name\":\"\\u0110\\u1eb7c bi\\u1ec7t 3\"}', '2019-08-28 10:43:44', '2019-08-28 10:43:44'),
(81, 10, 'banner', '/assets/uploads/images/pages/banner-press.jpg', '2019-08-28 20:44:00', '2019-08-29 21:40:54'),
(82, 10, 'page_title', 'Press Page', '2019-08-28 20:44:00', '2019-08-29 21:40:54'),
(83, 10, 'page_description', 'The critics agree. ESQIDO’s mink lashes are the best false eyelashes they’ve ever worn. \r\nDiscover the world’s best brand of false eyelashes used by A-list celebs and pro artists.', '2019-08-28 20:44:00', '2019-08-29 21:40:54'),
(84, 10, 'as_title', 'AS SEEN ON', '2019-08-28 20:44:00', '2019-08-29 21:40:55'),
(104, 11, 'banner', '/assets/uploads/images/pages/banner-retailer.jpg', '2019-08-28 22:03:23', '2019-08-30 00:22:30'),
(105, 11, 'page_title', 'Retailer', '2019-08-28 22:03:23', '2019-08-30 00:22:30'),
(106, 11, 'page_description', 'sfbsr erdtg ed', '2019-08-28 22:03:23', '2019-08-30 00:22:30'),
(107, 11, 'become_title', 'Tiêu đề', '2019-08-28 22:03:23', '2019-08-30 00:22:30'),
(108, 11, 'become_description', 'Nội dung mô tả', '2019-08-28 22:03:23', '2019-08-30 00:22:30'),
(114, 12, 'shipping_title', 'Shipping', '2019-08-29 01:33:17', '2019-08-29 01:53:21'),
(115, 12, 'returnex_title', 'Return & Exchanges', '2019-08-29 01:33:18', '2019-08-29 01:53:21'),
(116, 12, 'product_title', 'Product', '2019-08-29 01:33:18', '2019-08-29 01:53:21'),
(117, 12, 'payment_title', 'Payment', '2019-08-29 01:33:18', '2019-08-29 01:53:21'),
(118, 12, 'contact_title', 'Contact Us', '2019-08-29 01:33:18', '2019-08-29 01:53:21'),
(133, 12, 'shipping', '{\"question\":\"Shipping Rates & Options\",\"anws\":\"<p>Please allow up to 24 business hours for orders to\\u00a0ship once paid.<\\/p>\\r\\n\\r\\n<p><strong>United States<\\/strong><br \\/>\\r\\nTransit time: 3-5 business days once shipped.<br \\/>\\r\\nCouriers: USPS & UPS<br \\/>\\r\\nCost: $3.95 flat rate, or FREE for orders over $35*.<\\/p>\\r\\n\\r\\n<p>\\u00a0<\\/p>\\r\\n\\r\\n<p><strong>Canada<\\/strong><br \\/>\\r\\nTransit time: 3-5 business days once shipped.<br \\/>\\r\\nCouriers: Canada Post or Purolator.<br \\/>\\r\\nCost: $4.95 flat rate or FREE for orders over $50*.<\\/p>\\r\\n\\r\\n<p>\\u00a0<\\/p>\\r\\n\\r\\n<p><strong>UK<\\/strong><br \\/>\\r\\nTransit time: 3-5 business days once shipped.<br \\/>\\r\\nCouriers: Royal Mail<br \\/>\\r\\nCost: $4.95 flat rate or FREE for orders over $35*.<\\/p>\\r\\n\\r\\n<p>\\u00a0<\\/p>\\r\\n\\r\\n<p><strong>International<\\/strong><br \\/>\\r\\nTransit time: 6-14 business days once shipped.<br \\/>\\r\\nCourier:\\u00a0E-Packet<br \\/>\\r\\nCost: $5.95 flat rate or FREE for orders over $50*.<\\/p>\\r\\n\\r\\n<p>\\u00a0<\\/p>\\r\\n\\r\\n<p>*Calculated on subtotal after discounts.<\\/p>\"}', '2019-08-29 01:53:21', '2019-08-29 01:53:21'),
(134, 12, 'shipping', '{\"question\":\"Do you ship internationally?\",\"anws\":\"<p>Yes we do. International shipments are shipped from our US\\u00a0warehouse, and take 6-14 business days. Please\\u00a0see Shipping Rates & Options for details.<\\/p>\"}', '2019-08-29 01:53:21', '2019-08-29 01:53:21'),
(135, 12, 'returnex', '{\"question\":\"What is your return policy?\",\"anws\":\"<p>The best way we can earn your loyalty to ensure your satisfaction with every purchase. At Esqido, we give you a full\\u00a0<strong>60 days<\\/strong>\\u00a0to fall in love with your purchase. Should you have any questions, simply\\u00a0<a href=\\\"#\\\">contact us<\\/a>\\u00a0and we will be happy to assist you.<\\/p>\\r\\n\\r\\n<p><strong>Return Policy and Warranties:<\\/strong><br \\/>\\r\\n1.\\u00a0All\\u00a0unused items in original condition\\u00a0are eligible for a full refund within 60 day of purchase. The refund will be credited back to your original method of payment, or your choice of a digital store gift card.<br \\/>\\r\\n2. Items returned which are not in new and resellable condition will not be granted a refund.<br \\/>\\r\\n3.\\u00a0Opened and used items are eligible for a complimentary, one-time exchange only.<br \\/>\\r\\n4.\\u00a0We offer a 1 year warranty on all products purchased, if you suspect there was a defect, a photo proof will be required to receive a replacement.<br \\/>\\r\\n5.\\u00a0If you suspect your package was lost or damaged during transit, please\\u00a0<a href=\\\"#\\\">contact us<\\/a>\\u00a0and we&#39;ll be happy to help.<\\/p>\\r\\n\\r\\n<p>Esqido Ltd reserves the right to refuse any returns or exchanges if we deem there is repeat abuse of our policies.<\\/p>\"}', '2019-08-29 01:53:21', '2019-08-29 01:53:21'),
(136, 12, 'returnex', '{\"question\":\"How do I return or exchange items?\",\"anws\":\"<p>We want you to love your\\u00a0Esqido products. But if you\\u2019re having second thoughts, we want to make returns as simple as possible.<\\/p>\\r\\n\\r\\n<p><strong>How to return or exchange<\\/strong><br \\/>\\r\\nSimply\\u00a0<a href=\\\"#\\\">contact us<\\/a>\\u00a0within the 60 days period, and we\\u2019ll send you a Return Authorization Number (RMA)\\u00a0along with return or exchange instructions.<\\/p>\\r\\n\\r\\n<p><strong>Eligibility<\\/strong><br \\/>\\r\\nFor hygienic reasons, only new and unused items are accepted for returns. A one-time courtesy exchange is accepted for any used items per order.<\\/p>\\r\\n\\r\\n<p><strong>Return shipping<\\/strong><br \\/>\\r\\nReturn shipping costs\\u00a0are paid at the buyer&#39;s expense. Esqido offers free shipping on exchanges.<\\/p>\"}', '2019-08-29 01:53:22', '2019-08-29 01:53:22'),
(137, 12, 'product', '{\"question\":\"What makes your lashes different?\",\"anws\":\"<p>Esqido lashes are easy to apply, incredibly natural looking, and can be worn multiple times.<\\/p>\\r\\n\\r\\n<p>They are hypoallergenic and made free from any kind of dyes, leaving a natural black-brown finish. Each individual strand is ultra-soft, lightweight and stay beautifully curled. The result - the most naturally alluring and luxurious lashes you will ever experience.<\\/p>\"}', '2019-08-29 01:53:22', '2019-08-29 01:53:22'),
(138, 12, 'payment', '{\"question\":\"What payment methods are accepted?\",\"anws\":\"<p>We accept all major credit cards and PayPal.<\\/p>\"}', '2019-08-29 01:53:22', '2019-08-29 01:53:22'),
(139, 12, 'contact', '{\"question\":\"How do I reach your support?\",\"anws\":\"<p>The quickest way is through our live chat on the bottom right of the screen. You can also\\u00a0email us through our\\u00a0<a href=\\\"#\\\">contact page<\\/a>.\\u00a0We look forward to hearing from you!<\\/p>\"}', '2019-08-29 01:53:22', '2019-08-29 01:53:22'),
(140, 10, 'partner', '/assets/uploads/images/pages/partner1.jpg', '2019-08-29 21:40:55', '2019-08-29 21:40:55'),
(141, 10, 'partner', '/assets/uploads/images/pages/partner2.jpg', '2019-08-29 21:40:55', '2019-08-29 21:40:55'),
(142, 10, 'partner', '/assets/uploads/images/pages/partner3.jpg', '2019-08-29 21:40:55', '2019-08-29 21:40:55'),
(143, 10, 'partner', '/assets/uploads/images/pages/partner4.jpg', '2019-08-29 21:40:55', '2019-08-29 21:40:55'),
(144, 10, 'partner', '/assets/uploads/images/pages/partner5.jpg', '2019-08-29 21:40:55', '2019-08-29 21:40:55'),
(145, 10, 'partner', '/assets/uploads/images/pages/partner6.jpg', '2019-08-29 21:40:55', '2019-08-29 21:40:55'),
(146, 10, 'as_user', '{\"image\":\"\\/assets\\/uploads\\/images\\/pages\\/candiceswanepoel.jpg\",\"text\":\"<h3 style=\\\"text-align:center\\\">Candace Swanepoel<\\/h3>\\r\\n\\r\\n<p style=\\\"text-align:center\\\">Wearing\\u00a0<a href=\\\"#\\\" target=\\\"_self\\\">BFF<\\/a><\\/p>\"}', '2019-08-29 21:40:55', '2019-08-29 21:40:55'),
(147, 10, 'as_user', '{\"image\":\"\\/assets\\/uploads\\/images\\/pages\\/rihanna.jpg\",\"text\":\"<h3 style=\\\"text-align:center\\\">Rihanna<\\/h3>\\r\\n\\r\\n<p style=\\\"text-align:center\\\">Wearing\\u00a0<a href=\\\"#\\\" target=\\\"_self\\\">Lashmopolitan<\\/a><\\/p>\"}', '2019-08-29 21:40:55', '2019-08-29 21:40:55'),
(148, 10, 'as_user', '{\"image\":\"\\/assets\\/uploads\\/images\\/pages\\/alexandraambrossio.jpeg\",\"text\":\"<h3 style=\\\"text-align:center\\\">Alessandra Ambrosio<\\/h3>\\r\\n\\r\\n<p style=\\\"text-align:center\\\">Wearing\\u00a0<a href=\\\"#\\\" target=\\\"_self\\\">Unforgettable<\\/a><\\/p>\"}', '2019-08-29 21:40:56', '2019-08-29 21:40:56'),
(149, 11, 'retailer', '/assets/uploads/images/pages/ret1.jpg', '2019-08-30 00:22:30', '2019-08-30 00:22:30'),
(150, 11, 'retailer', '/assets/uploads/images/pages/ret2.jpg', '2019-08-30 00:22:30', '2019-08-30 00:22:30'),
(151, 11, 'retailer', '/assets/uploads/images/pages/partner4.jpg', '2019-08-30 00:22:30', '2019-08-30 00:22:30'),
(153, 15, 'sub_title', 'Tìm cặp lông mi giả hoàn hảo cho đôi mắt của bạn.', '2019-09-23 02:03:47', '2019-09-23 02:27:25'),
(154, 15, 'description', 'Không chắc chắn làm thế nào để chọn đúng cặp lông mi giả? Chúng tôi đã thực hiện một hướng dẫn chính xác cao để giúp bạn chọn đúng kiểu lông mi giả.', '2019-09-23 02:03:47', '2019-09-23 02:27:25'),
(155, 15, 'background', '/assets/uploads/images/pages/banner-lash-guide.webp', '2019-09-23 02:03:47', '2019-09-23 02:03:47'),
(156, 16, 'page_content', '<p>SECTION 1 - WHAT DO WE DO WITH YOUR INFORMATION?</p>\r\n\r\n<p>When you purchase something from our store, as part of the buying and selling process, we collect the personal information you give us such as your name, address and email address.</p>\r\n\r\n<p>When you browse our store, we also automatically receive your computer’s internet protocol (IP) address in order to provide us with information that helps us learn about your browser and operating system.</p>\r\n\r\n<p>Email marketing (if applicable): With your permission, we may send you emails about our store, new products and other updates.</p>\r\n\r\n<p>SECTION 2 - CONSENT</p>\r\n\r\n<p>How do you get my consent?<br />\r\nWhen you provide us with personal information to complete a transaction, verify your credit card, place an order, arrange for a delivery or return a purchase, we imply that you consent to our collecting it and using it for that specific reason only.<br />\r\nIf we ask for your personal information for a secondary reason, like marketing, we will either ask you directly for your expressed consent, or provide you with an opportunity to say no.</p>\r\n\r\n<p>How do I withdraw my consent?<br />\r\nIf after you opt-in, you change your mind, you may withdraw your consent for us to contact you, for the continued collection, use or disclosure of your information, at anytime, by contacting us at support@esqido.com.</p>\r\n\r\n<p>SECTION 3 - DISCLOSURE</p>\r\n\r\n<p>We may disclose your personal information if we are required by law to do so or if you violate our Terms of Service.</p>\r\n\r\n<p>SECTION 4 - SHOPIFY</p>\r\n\r\n<p>Our store is hosted on Shopify Inc. They provide us with the online e-commerce platform that allows us to sell our products and services to you.<br />\r\nYour data is stored through Shopify’s data storage, databases and the general Shopify application. They store your data on a secure server behind a firewall.</p>\r\n\r\n<p>Payment:<br />\r\nIf you choose a direct payment gateway to complete your purchase, then Shopify stores your credit card data. It is encrypted through the Payment Card Industry Data Security Standard (PCI-DSS). Your purchase transaction data is stored only as long as is necessary to complete your purchase transaction. After that is complete, your purchase transaction information is deleted.</p>\r\n\r\n<p>All direct payment gateways adhere to the standards set by PCI-DSS as managed by the PCI Security Standards Council, which is a joint effort of brands like Visa, MasterCard, American Express and Discover.</p>\r\n\r\n<p>PCI-DSS requirements help ensure the secure handling of credit card information by our store and its service providers.</p>\r\n\r\n<p>For more insight, you may also want to read Shopify’s <a href=\"https://www.shopify.com/legal/terms\">Terms of Service</a> or <a href=\"https://www.shopify.com/legal/privacy\">Privacy Statement</a>.</p>\r\n\r\n<p>SECTION 5 - THIRD-PARTY SERVICES</p>\r\n\r\n<p>In general, the third-party providers used by us will only collect, use and disclose your information to the extent necessary to allow them to perform the services they provide to us.<br />\r\nHowever, certain third-party service providers, such as payment gateways and other payment transaction processors, have their own privacy policies in respect to the information we are required to provide to them for your purchase-related transactions.<br />\r\nFor these providers, we recommend that you read their privacy policies so you can understand the manner in which your personal information will be handled by these providers.</p>\r\n\r\n<p>In particular, remember that certain providers may be located in or have facilities that are located a different jurisdiction than either you or us. So if you elect to proceed with a transaction that involves the services of a third-party service provider, then your information may become subject to the laws of the jurisdiction(s) in which that service provider or its facilities are located.</p>\r\n\r\n<p>As an example, if you are located in Canada and your transaction is processed by a payment gateway located in the United States, then your personal information used in completing that transaction may be subject to disclosure under United States legislation, including the Patriot Act.</p>\r\n\r\n<p>Once you leave our store’s website or are redirected to a third-party website or application, you are no longer governed by this Privacy Policy or our website’s Terms of Service.</p>\r\n\r\n<p>Links<br />\r\nWhen you click on certain links on our store, they may direct you away from our site. We are not responsible for the privacy practices of other sites and encourage you to read their privacy statements.<br />\r\n<br />\r\nGoogle analytics:<br />\r\nOur store uses Google Analytics to help us learn about who visits our site and what pages are being looked at.</p>\r\n\r\n<p>SECTION 6 - SECURITY</p>\r\n\r\n<p>To protect your personal information, we take reasonable precautions and follow industry best practices to make sure it is not inappropriately lost, misused, accessed, disclosed, altered or destroyed.</p>\r\n\r\n<p>If you provide us with your credit card information, the information is encrypted using secure socket layer technology (SSL) and stored with a AES-256 encryption. Although no method of transmission over the Internet or electronic storage is 100% secure, we follow all PCI-DSS requirements and implement additional generally accepted industry standards.</p>\r\n\r\n<p>SECTION 7 - COOKIES</p>\r\n\r\n<p>Here is a list of cookies that we use. We’ve listed them here so you that you can choose if you want to opt-out of cookies or not.<br />\r\n_session_id, unique token, sessional, Allows Shopify to store information about your session (referrer, landing page, etc).<br />\r\n_shopify_visit, no data held, Persistent for 60 minutes from the last visit, Used by our website provider’s internal stats tracker to record the number of visits<br />\r\n_shopify_uniq, no data held, expires midnight (relative to the visitor) of the next day, Counts the number of visits to a store by a single customer.<br />\r\ncart, unique token, persistent for 2 weeks, Stores information about the contents of your cart.<br />\r\n_secure_session_id, unique token, sessional<br />\r\nstorefront_digest, unique token, indefinite If the shop has a password, this is used to determine if the current visitor has access.<br />\r\nPREF, persistent for a very short period, Set by Google and tracks who visits the store and from wherein.<br />\r\nvisited, A cookie set to keep track of returning visitors, persistent for three days from the first visit.</p>\r\n\r\n<p> </p>\r\n\r\n<p>SECTION 8 - AGE OF CONSENT</p>\r\n\r\n<p>By using this site, you represent that you are at least the age of majority in your state or province of residence, or that you are the age of majority in your state or province of residence and you have given us your consent to allow any of your minor dependents to use this site.</p>\r\n\r\n<p>SECTION 9 - CHANGES TO THIS PRIVACY POLICY</p>\r\n\r\n<p>We reserve the right to modify this privacy policy at any time, so please review it frequently. Changes and clarifications will take effect immediately upon their posting on the website. If we make material changes to this policy, we will notify you here that it has been updated, so that you are aware of what information we collect, how we use it, and under what circumstances, if any, we use and/or disclose it.</p>\r\n\r\n<p>If our store is acquired or merged with another company, your information may be transferred to the new owners so that we may continue to sell products to you.</p>\r\n\r\n<p>QUESTIONS AND CONTACT INFORMATION</p>\r\n\r\n<p>If you would like to: access, correct, amend or delete any personal information we have about you, register a complaint, or simply want more information contact us at support@esqido.com.<br />\r\n----</p>', '2019-09-25 20:37:46', '2019-09-25 21:03:03'),
(157, 17, 'page_content', '<p>OVERVIEW</p>\r\n\r\n<p>This website is operated by ESQIDO. Throughout the site, the terms “we”, “us” and “our” refer to ESQIDO. ESQIDO offers this website, including all information, tools and services available from this site to you, the user, conditioned upon your acceptance of all terms, conditions, policies and notices stated here.</p>\r\n\r\n<p>By visiting our site and/ or purchasing something from us, you engage in our “Service” and agree to be bound by the following terms and conditions (“Terms of Service”, “Terms”), including those additional terms and conditions and policies referenced herein and/or available by hyperlink. These Terms of Service apply to all users of the site, including without limitation users who are browsers, vendors, customers, merchants, and/ or contributors of content.</p>\r\n\r\n<p>Please read these Terms of Service carefully before accessing or using our website. By accessing or using any part of the site, you agree to be bound by these Terms of Service. If you do not agree to all the terms and conditions of this agreement, then you may not access the website or use any services. If these Terms of Service are considered an offer, acceptance is expressly limited to these Terms of Service.</p>\r\n\r\n<p>Any new features or tools which are added to the current store shall also be subject to the Terms of Service. You can review the most current version of the Terms of Service at any time on this page. We reserve the right to update, change or replace any part of these Terms of Service by posting updates and/or changes to our website. It is your responsibility to check this page periodically for changes. Your continued use of or access to the website following the posting of any changes constitutes acceptance of those changes.</p>\r\n\r\n<p>Our store is hosted on Shopify Inc. They provide us with the online e-commerce platform that allows us to sell our products and services to you.</p>\r\n\r\n<p>SECTION 1 - ONLINE STORE TERMS</p>\r\n\r\n<p>By agreeing to these Terms of Service, you represent that you are at least the age of majority in your state or province of residence, or that you are the age of majority in your state or province of residence and you have given us your consent to allow any of your minor dependents to use this site.<br />\r\nYou may not use our products for any illegal or unauthorized purpose nor may you, in the use of the Service, violate any laws in your jurisdiction (including but not limited to copyright laws).<br />\r\nYou must not transmit any worms or viruses or any code of a destructive nature.<br />\r\nA breach or violation of any of the Terms will result in an immediate termination of your Services.</p>\r\n\r\n<p>SECTION 2 - GENERAL CONDITIONS</p>\r\n\r\n<p>We reserve the right to refuse service to anyone for any reason at any time.<br />\r\nYou understand that your content (not including credit card information), may be transferred unencrypted and involve (a) transmissions over various networks; and (b) changes to conform and adapt to technical requirements of connecting networks or devices. Credit card information is always encrypted during transfer over networks.<br />\r\nYou agree not to reproduce, duplicate, copy, sell, resell or exploit any portion of the Service, use of the Service, or access to the Service or any contact on the website through which the service is provided, without express written permission by us.<br />\r\nThe headings used in this agreement are included for convenience only and will not limit or otherwise affect these Terms.</p>\r\n\r\n<p>SECTION 3 - ACCURACY, COMPLETENESS AND TIMELINESS OF INFORMATION</p>\r\n\r\n<p>We are not responsible if information made available on this site is not accurate, complete or current. The material on this site is provided for general information only and should not be relied upon or used as the sole basis for making decisions without consulting primary, more accurate, more complete or more timely sources of information. Any reliance on the material on this site is at your own risk.<br />\r\nThis site may contain certain historical information. Historical information, necessarily, is not current and is provided for your reference only. We reserve the right to modify the contents of this site at any time, but we have no obligation to update any information on our site. You agree that it is your responsibility to monitor changes to our site.</p>\r\n\r\n<p>SECTION 4 - MODIFICATIONS TO THE SERVICE AND PRICES</p>\r\n\r\n<p>Prices for our products are subject to change without notice.<br />\r\nWe reserve the right at any time to modify or discontinue the Service (or any part or content thereof) without notice at any time.<br />\r\nWe shall not be liable to you or to any third-party for any modification, price change, suspension or discontinuance of the Service.</p>\r\n\r\n<p>SECTION 5 - PRODUCTS OR SERVICES (if applicable)</p>\r\n\r\n<p>Certain products or services may be available exclusively online through the website. These products or services may have limited quantities and are subject to return or exchange only according to our Return Policy.<br />\r\nWe have made every effort to display as accurately as possible the colors and images of our products that appear at the store. We cannot guarantee that your computer monitor&#39;s display of any color will be accurate.<br />\r\nWe reserve the right, but are not obligated, to limit the sales of our products or Services to any person, geographic region or jurisdiction. We may exercise this right on a case-by-case basis. We reserve the right to limit the quantities of any products or services that we offer. All descriptions of products or product pricing are subject to change at anytime without notice, at the sole discretion of us. We reserve the right to discontinue any product at any time. Any offer for any product or service made on this site is void where prohibited.<br />\r\nWe do not warrant that the quality of any products, services, information, or other material purchased or obtained by you will meet your expectations, or that any errors in the Service will be corrected.</p>\r\n\r\n<p>SECTION 6 - ACCURACY OF BILLING AND ACCOUNT INFORMATION</p>\r\n\r\n<p>We reserve the right to refuse any order you place with us. We may, in our sole discretion, limit or cancel quantities purchased per person, per household or per order. These restrictions may include orders placed by or under the same customer account, the same credit card, and/or orders that use the same billing and/or shipping address. In the event that we make a change to or cancel an order, we may attempt to notify you by contacting the e-mail and/or billing address/phone number provided at the time the order was made. We reserve the right to limit or prohibit orders that, in our sole judgment, appear to be placed by dealers, resellers or distributors.</p>\r\n\r\n<p>You agree to provide current, complete and accurate purchase and account information for all purchases made at our store. You agree to promptly update your account and other information, including your email address and credit card numbers and expiration dates, so that we can complete your transactions and contact you as needed.</p>\r\n\r\n<p>For more detail, please review our Returns Policy.</p>\r\n\r\n<p>SECTION 7 - OPTIONAL TOOLS</p>\r\n\r\n<p>We may provide you with access to third-party tools over which we neither monitor nor have any control nor input.<br />\r\nYou acknowledge and agree that we provide access to such tools ”as is” and “as available” without any warranties, representations or conditions of any kind and without any endorsement. We shall have no liability whatsoever arising from or relating to your use of optional third-party tools.<br />\r\nAny use by you of optional tools offered through the site is entirely at your own risk and discretion and you should ensure that you are familiar with and approve of the terms on which tools are provided by the relevant third-party provider(s).<br />\r\nWe may also, in the future, offer new services and/or features through the website (including, the release of new tools and resources). Such new features and/or services shall also be subject to these Terms of Service.</p>\r\n\r\n<p>SECTION 8 - THIRD-PARTY LINKS</p>\r\n\r\n<p>Certain content, products and services available via our Service may include materials from third-parties.<br />\r\nThird-party links on this site may direct you to third-party websites that are not affiliated with us. We are not responsible for examining or evaluating the content or accuracy and we do not warrant and will not have any liability or responsibility for any third-party materials or websites, or for any other materials, products, or services of third-parties.<br />\r\nWe are not liable for any harm or damages related to the purchase or use of goods, services, resources, content, or any other transactions made in connection with any third-party websites. Please review carefully the third-party&#39;s policies and practices and make sure you understand them before you engage in any transaction. Complaints, claims, concerns, or questions regarding third-party products should be directed to the third-party.</p>\r\n\r\n<p>SECTION 9 - USER COMMENTS, FEEDBACK AND OTHER SUBMISSIONS</p>\r\n\r\n<p>If, at our request, you send certain specific submissions (for example contest entries) or without a request from us you send creative ideas, suggestions, proposals, plans, or other materials, whether online, by email, by postal mail, or otherwise (collectively, &#39;comments&#39;), you agree that we may, at any time, without restriction, edit, copy, publish, distribute, translate and otherwise use in any medium any comments that you forward to us. We are and shall be under no obligation (1) to maintain any comments in confidence; (2) to pay compensation for any comments; or (3) to respond to any comments.<br />\r\nWe may, but have no obligation to, monitor, edit or remove content that we determine in our sole discretion are unlawful, offensive, threatening, libelous, defamatory, pornographic, obscene or otherwise objectionable or violates any party’s intellectual property or these Terms of Service.<br />\r\nYou agree that your comments will not violate any right of any third-party, including copyright, trademark, privacy, personality or other personal or proprietary right. You further agree that your comments will not contain libelous or otherwise unlawful, abusive or obscene material, or contain any computer virus or other malware that could in any way affect the operation of the Service or any related website. You may not use a false e-mail address, pretend to be someone other than yourself, or otherwise mislead us or third-parties as to the origin of any comments. You are solely responsible for any comments you make and their accuracy. We take no responsibility and assume no liability for any comments posted by you or any third-party.</p>\r\n\r\n<p>SECTION 10 - PERSONAL INFORMATION</p>\r\n\r\n<p>Your submission of personal information through the store is governed by our Privacy Policy. To view our Privacy Policy.</p>\r\n\r\n<p>SECTION 11 - ERRORS, INACCURACIES AND OMISSIONS</p>\r\n\r\n<p>Occasionally there may be information on our site or in the Service that contains typographical errors, inaccuracies or omissions that may relate to product descriptions, pricing, promotions, offers, product shipping charges, transit times and availability. We reserve the right to correct any errors, inaccuracies or omissions, and to change or update information or cancel orders if any information in the Service or on any related website is inaccurate at any time without prior notice (including after you have submitted your order).<br />\r\nWe undertake no obligation to update, amend or clarify information in the Service or on any related website, including without limitation, pricing information, except as required by law. No specified update or refresh date applied in the Service or on any related website, should be taken to indicate that all information in the Service or on any related website has been modified or updated.</p>\r\n\r\n<p>SECTION 12 - PROHIBITED USES</p>\r\n\r\n<p>In addition to other prohibitions as set forth in the Terms of Service, you are prohibited from using the site or its content: (a) for any unlawful purpose; (b) to solicit others to perform or participate in any unlawful acts; (c) to violate any international, federal, provincial or state regulations, rules, laws, or local ordinances; (d) to infringe upon or violate our intellectual property rights or the intellectual property rights of others; (e) to harass, abuse, insult, harm, defame, slander, disparage, intimidate, or discriminate based on gender, sexual orientation, religion, ethnicity, race, age, national origin, or disability; (f) to submit false or misleading information; (g) to upload or transmit viruses or any other type of malicious code that will or may be used in any way that will affect the functionality or operation of the Service or of any related website, other websites, or the Internet; (h) to collect or track the personal information of others; (i) to spam, phish, pharm, pretext, spider, crawl, or scrape; (j) for any obscene or immoral purpose; or (k) to interfere with or circumvent the security features of the Service or any related website, other websites, or the Internet. We reserve the right to terminate your use of the Service or any related website for violating any of the prohibited uses.</p>\r\n\r\n<p>SECTION 13 - DISCLAIMER OF WARRANTIES; LIMITATION OF LIABILITY</p>\r\n\r\n<p>We do not guarantee, represent or warrant that your use of our service will be uninterrupted, timely, secure or error-free.<br />\r\nWe do not warrant that the results that may be obtained from the use of the service will be accurate or reliable.<br />\r\nYou agree that from time to time we may remove the service for indefinite periods of time or cancel the service at any time, without notice to you.<br />\r\nYou expressly agree that your use of, or inability to use, the service is at your sole risk. The service and all products and services delivered to you through the service are (except as expressly stated by us) provided &#39;as is&#39; and &#39;as available&#39; for your use, without any representation, warranties or conditions of any kind, either express or implied, including all implied warranties or conditions of merchantability, merchantable quality, fitness for a particular purpose, durability, title, and non-infringement.<br />\r\nIn no case shall ESQIDO Lashes, our directors, officers, employees, affiliates, agents, contractors, interns, suppliers, service providers or licensors be liable for any injury, loss, claim, or any direct, indirect, incidental, punitive, special, or consequential damages of any kind, including, without limitation lost profits, lost revenue, lost savings, loss of data, replacement costs, or any similar damages, whether based in contract, tort (including negligence), strict liability or otherwise, arising from your use of any of the service or any products procured using the service, or for any other claim related in any way to your use of the service or any product, including, but not limited to, any errors or omissions in any content, or any loss or damage of any kind incurred as a result of the use of the service or any content (or product) posted, transmitted, or otherwise made available via the service, even if advised of their possibility. Because some states or jurisdictions do not allow the exclusion or the limitation of liability for consequential or incidental damages, in such states or jurisdictions, our liability shall be limited to the maximum extent permitted by law.</p>\r\n\r\n<p>SECTION 14 - INDEMNIFICATION</p>\r\n\r\n<p>You agree to indemnify, defend and hold harmless ESQIDO Lashes and our parent, subsidiaries, affiliates, partners, officers, directors, agents, contractors, licensors, service providers, subcontractors, suppliers, interns and employees, harmless from any claim or demand, including reasonable attorneys’ fees, made by any third-party due to or arising out of your breach of these Terms of Service or the documents they incorporate by reference, or your violation of any law or the rights of a third-party.</p>\r\n\r\n<p>SECTION 15 - SEVERABILITY</p>\r\n\r\n<p>In the event that any provision of these Terms of Service is determined to be unlawful, void or unenforceable, such provision shall nonetheless be enforceable to the fullest extent permitted by applicable law, and the unenforceable portion shall be deemed to be severed from these Terms of Service, such determination shall not affect the validity and enforceability of any other remaining provisions.</p>\r\n\r\n<p>SECTION 16 - TERMINATION</p>\r\n\r\n<p>The obligations and liabilities of the parties incurred prior to the termination date shall survive the termination of this agreement for all purposes.<br />\r\nThese Terms of Service are effective unless and until terminated by either you or us. You may terminate these Terms of Service at any time by notifying us that you no longer wish to use our Services, or when you cease using our site.<br />\r\nIf in our sole judgment you fail, or we suspect that you have failed, to comply with any term or provision of these Terms of Service, we also may terminate this agreement at any time without notice and you will remain liable for all amounts due up to and including the date of termination; and/or accordingly may deny you access to our Services (or any part thereof).</p>\r\n\r\n<p>SECTION 17 - ENTIRE AGREEMENT</p>\r\n\r\n<p>The failure of us to exercise or enforce any right or provision of these Terms of Service shall not constitute a waiver of such right or provision.<br />\r\nThese Terms of Service and any policies or operating rules posted by us on this site or in respect to The Service constitutes the entire agreement and understanding between you and us and govern your use of the Service, superseding any prior or contemporaneous agreements, communications and proposals, whether oral or written, between you and us (including, but not limited to, any prior versions of the Terms of Service).<br />\r\nAny ambiguities in the interpretation of these Terms of Service shall not be construed against the drafting party.</p>\r\n\r\n<p>SECTION 18 - GOVERNING LAW</p>\r\n\r\n<p>These Terms of Service and any separate agreements whereby we provide you Services shall be governed by and construed in accordance with the laws of 2711 Centerville Road, Suite 400 Wilmington US 19808.</p>\r\n\r\n<p>SECTION 19 - CHANGES TO TERMS OF SERVICE</p>\r\n\r\n<p>You can review the most current version of the Terms of Service at any time at this page.<br />\r\nWe reserve the right, at our sole discretion, to update, change or replace any part of these Terms of Service by posting updates and changes to our website. It is your responsibility to check our website periodically for changes. Your continued use of or access to our website or the Service following the posting of any changes to these Terms of Service constitutes acceptance of those changes.</p>\r\n\r\n<p>SECTION 20 - CONTACT INFORMATION</p>\r\n\r\n<p>Questions about the Terms of Service should be sent to us at support@esqido.com.</p>\r\n\r\n<p><br />\r\n--------------------------------------</p>', '2019-09-25 21:06:55', '2019-09-25 21:06:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('n4m.nv.1997@gmail.com', '$2y$10$zp3DpFMmzlUYvcbjJk7D5OITASHWIb/Uv6JFl3Tp8eIVDXPbL/7VC', '2019-08-26 20:55:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_content` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `description`, `product_content`, `created_at`, `updated_at`) VALUES
(1, 'HỘP 3 ĐÔI LÔNG MI GÂN LỤA SIÊU NHẸ D1', 'hop-3-doi-long-mi-gan-lua-sieu-nhe-d1', 'Lông Mi gân lụa siêu nhẹ KAZUMI là dòng mi cao cấp thế hệ mới với những đặc tính vượt trội như siêu nhẹ, chân mềm và dễ sử dụng mang lại cảm giác nhẹ nhàng tự nhiên cho người sử dụng.', '<p>L&ocirc;ng Mi g&acirc;n lụa si&ecirc;u nhẹ KAZUMI l&agrave; d&ograve;ng mi cao cấp thế hệ mới với những đặc t&iacute;nh vượt trội như si&ecirc;u nhẹ, ch&acirc;n mềm v&agrave; dễ sử dụng mang lại cảm gi&aacute;c nhẹ nh&agrave;ng tự nhi&ecirc;n cho người sử dụng. Ngọn mi mềm tự nhi&ecirc;n, kiểu d&aacute;ng ph&ugrave; hợp d&ugrave;ng cho trang điểm h&agrave;ng ng&agrave;y nơi c&ocirc;ng sở, c&aacute;c c&ocirc; n&agrave;ng sang chảnh đi shopping, hẹn h&ograve;, tiệc t&ugrave;ng, kỷ yếu.</p>\r\n\r\n<p>L&ocirc;ng Mi g&acirc;n lụa si&ecirc;u nhẹ KAZUMI l&agrave; d&ograve;ng mi cao cấp thế hệ mới với những đặc t&iacute;nh vượt trội như si&ecirc;u nhẹ, ch&acirc;n mềm v&agrave; dễ sử dụng mang lại cảm gi&aacute;c nhẹ nh&agrave;ng tự nhi&ecirc;n cho người sử dụng. Ngọn mi mềm tự nhi&ecirc;n, kiểu d&aacute;ng ph&ugrave; hợp d&ugrave;ng cho trang điểm h&agrave;ng ng&agrave;y nơi c&ocirc;ng sở, c&aacute;c c&ocirc; n&agrave;ng sang chảnh đi shopping, hẹn h&ograve;, tiệc t&ugrave;ng, kỷ yếu.</p>', '2019-08-25 03:03:21', '2019-09-04 01:09:58'),
(2, 'HỘP 3 ĐÔI LÔNG MI 3D GÂN LỤA E2', 'hop-3-doi-long-mi-3d-gan-lua-e2', 'Lông Mi 3D gân lụa KAZUMI là dòng mi cao cấp thế hệ mới với những đặc tính vượt trội như siêu nhẹ, chân mềm và dễ sử dụng. Chân mi mềm, đô cong hữu cơ được thiết kế để ôm bờ mi không gây công kích và mỏi ...', '<p>L&ocirc;ng Mi 3D g&acirc;n lụa KAZUMI l&agrave; d&ograve;ng mi cao cấp thế hệ mới với những đặc t&iacute;nh vượt trội như si&ecirc;u nhẹ, ch&acirc;n mềm v&agrave; dễ sử dụng. Ch&acirc;n mi mềm, đ&ocirc; cong hữu cơ được thiết kế để &ocirc;m bờ mi kh&ocirc;ng g&acirc;y c&ocirc;ng k&iacute;ch v&agrave; mỏi mắt, đem lại cảm gi&aacute;c thật nhẹ nh&agrave;ng tự nhi&ecirc;n cho người sử dụng. Ngọn mi mềm tự nhi&ecirc;n, với hiệu ứng 3D kh&ocirc;ng gian 3 chiều mang lại cho đ&ocirc;i mắt vẻ đẹp s&acirc;u thẳm v&agrave; ấn tượng. Kiểu d&aacute;ng ph&ugrave; hợp d&ugrave;ng cho trang điểm chuy&ecirc;n nghiệp, c&aacute;c sự kiện lớn, s&acirc;n khấu, mẫu ảnh c&aacute;c shows tr&igrave;nh diễn thời trang, ca nhạc, dạ tiệc.</p>\r\n\r\n<p>L&ocirc;ng Mi 3D g&acirc;n lụa KAZUMI l&agrave; d&ograve;ng mi cao cấp thế hệ mới với những đặc t&iacute;nh vượt trội như si&ecirc;u nhẹ, ch&acirc;n mềm v&agrave; dễ sử dụng. Ch&acirc;n mi mềm, đ&ocirc; cong hữu cơ được thiết kế để &ocirc;m bờ mi kh&ocirc;ng g&acirc;y c&ocirc;ng k&iacute;ch v&agrave; mỏi mắt, đem lại cảm gi&aacute;c thật nhẹ nh&agrave;ng tự nhi&ecirc;n cho người sử dụng. Ngọn mi mềm tự nhi&ecirc;n, với hiệu ứng 3D kh&ocirc;ng gian 3 chiều mang lại cho đ&ocirc;i mắt vẻ đẹp s&acirc;u thẳm v&agrave; ấn tượng. Kiểu d&aacute;ng ph&ugrave; hợp d&ugrave;ng cho trang điểm chuy&ecirc;n nghiệp, c&aacute;c sự kiện lớn, s&acirc;n khấu, mẫu ảnh c&aacute;c shows tr&igrave;nh diễn thời trang, ca nhạc, dạ tiệc.</p>', '2019-08-27 03:14:03', '2019-09-04 01:09:00'),
(3, 'HỘP 3 ĐÔI LÔNG MI GÂN LỤA SIÊU NHẸ D18', 'hop-3-doi-long-mi-gan-lua-sieu-nhe-d18', 'Lông Mi gân lụa siêu nhẹ KAZUMI là dòng mi cao cấp thế hệ mới với những đặc tính vượt trội như siêu nhẹ, chân mềm và dễ sử dụng mang lại cảm giác nhẹ nhàng tự nhiên cho người sử dụng. Ngọn mi mềm tự nhiên', '<p>L&ocirc;ng Mi g&acirc;n lụa si&ecirc;u nhẹ KAZUMI l&agrave; d&ograve;ng mi cao cấp thế hệ mới với những đặc t&iacute;nh vượt trội như si&ecirc;u nhẹ, ch&acirc;n mềm v&agrave; dễ sử dụng mang lại cảm gi&aacute;c nhẹ nh&agrave;ng tự nhi&ecirc;n cho người sử dụng. Ngọn mi mềm tự nhi&ecirc;n, kiểu d&aacute;ng ph&ugrave; hợp d&ugrave;ng cho trang điểm h&agrave;ng ng&agrave;y nơi c&ocirc;ng sở, c&aacute;c c&ocirc; n&agrave;ng sang chảnh đi shopping, hẹn h&ograve;, tiệc t&ugrave;ng, kỷ yếu.</p>\r\n\r\n<p>L&ocirc;ng Mi g&acirc;n lụa si&ecirc;u nhẹ KAZUMI l&agrave; d&ograve;ng mi cao cấp thế hệ mới với những đặc t&iacute;nh vượt trội như si&ecirc;u nhẹ, ch&acirc;n mềm v&agrave; dễ sử dụng mang lại cảm gi&aacute;c nhẹ nh&agrave;ng tự nhi&ecirc;n cho người sử dụng. Ngọn mi mềm tự nhi&ecirc;n, kiểu d&aacute;ng ph&ugrave; hợp d&ugrave;ng cho trang điểm h&agrave;ng ng&agrave;y nơi c&ocirc;ng sở, c&aacute;c c&ocirc; n&agrave;ng sang chảnh đi shopping, hẹn h&ograve;, tiệc t&ugrave;ng, kỷ yếu.</p>', '2019-09-03 03:36:18', '2019-09-04 01:09:38'),
(4, 'KEO GẮN MI 5 GRAM', 'keo-gan-mi-5-gram', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>Volume</strong></td>\r\n			<td>Medium</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Length</strong></td>\r\n			<td>8 - 12 mm</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Material</strong></td>\r\n			<td>Premium Mink Hair</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Band</strong></td>\r\n			<td>Handcrafted cotton band</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Wear Period</strong></td>\r\n			<td>Multi-use</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '2019-09-04 01:17:33', '2019-09-04 01:20:04'),
(9, 'KHAY 10 ĐÔI LÔNG MI 3D GÂN LỤA E5', 'khay-10-doi-long-mi-3d-gan-lua-e5', 'KHAY 10 ĐÔI LÔNG MI 3D GÂN LỤA E5', '<h1>KHAY 10 Đ&Ocirc;I L&Ocirc;NG MI 3D G&Acirc;N LỤA E5</h1>', '2019-09-07 18:38:29', '2019-09-07 18:38:29'),
(10, 'LÔNG MI DANG QUANG E5', 'long-mi-dang-quang-e5', 'LÔNG MI KAZUMI E5: LÀ DÒNG MI CAO CẤP, DÀY HƠN, CHÂN MI MỀM ĐỘ CONG HỮU CƠ ĐƯỢC THIẾT KẾ ĐỂ ÔM BỜ MI, KHÔNG GÂY CÔNG KÍCH VÀ MỎI MẮT, ...', '<p style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"font-family:Roboto,Arial,Helvetica,sans-serif\"><span style=\"font-size:12pt\"><span style=\"font-family:Calibri\">L&Ocirc;NG MI KAZUMI E5: L&Agrave; D&Ograve;NG MI CAO CẤP, D&Agrave;Y HƠN, CH&Acirc;N MI MỀM ĐỘ CONG HỮU CƠ ĐƯỢC THIẾT KẾ ĐỂ &Ocirc;M BỜ MI, KH&Ocirc;NG G&Acirc;Y C&Ocirc;NG K&Iacute;CH V&Agrave; MỎI MẮT, ĐEM LẠI CHO NGƯỜI D&Ugrave;NG CẢM GI&Aacute;C THẬT KHI SỬ DỤNG. NGỌN MI MỀM TỰ NHI&Ecirc;N, VỚI HIỆU ỨNG 3D ĐEM LẠI CHO Đ&Ocirc;I MẮT VẺ ĐẸP S&Acirc;U THẲM V&Agrave; ẤN TƯỢNG. PH&Ugrave; HỢP CHO C&Aacute;C SỰ KIỆN LỚN, TRANG ĐIỂM CHUY&Ecirc;N NGHIỆP, S&Acirc;N KHẤU, MẪU ẢNH, C&Aacute;C SHOW TR&Igrave;NH DIỄN THỜI TRANG, CA NHẠC</span></span></span></span></p>\r\n\r\n<p style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"font-family:Roboto,Arial,Helvetica,sans-serif\"><span style=\"font-family:Calibri\"><span style=\"font-size:medium\">L&ocirc;ng Mi Đăng Quang E5 được l&agrave;m từ sợi giả l&ocirc;ng chồn, thiết kế với hiệu ứng 3D đem lại cho đ&ocirc;i mắt vẻ đẹp tự nhi&ecirc;n s&acirc;u thẳm v&agrave; ấn tượng, ngọn mi bung tự nhi&ecirc;n theo nhiều tầng lớp, ph&ugrave; hợp trang điểm đậm, dạ hội, dạ tiệc, s&acirc;n khấu.</span></span></span></span></p>', '2019-09-07 18:46:54', '2019-09-07 18:46:54'),
(13, 'HỘP 3 ĐÔI LÔNG MI M33', 'hop-3-doi-long-mi-m33', 'Lông Mi KAZUMI được sản xuất theo dây chuyền công nghệ Nhật Bản, sợi lông mi được làm từ nguyên liệu tóc nhân tạo tích hợp công nghệ NANO, ứng dụng này đã làm giảm trọng lượng sợi mi ...', '<p>L&ocirc;ng Mi KAZUMI được sản xuất theo d&acirc;y chuyền c&ocirc;ng nghệ Nhật Bản, sợi l&ocirc;ng mi được l&agrave;m từ nguy&ecirc;n liệu t&oacute;c nh&acirc;n tạo t&iacute;ch hợp c&ocirc;ng nghệ NANO, ứng dụng n&agrave;y đ&atilde; l&agrave;m giảm trọng lượng sợi mi nhẹ bằng 1/2 sợi t&oacute;c th&ocirc;ng thường. Nhờ đặc t&iacute;nh vượt trội SI&Ecirc;U NHẸ- SI&Ecirc;U MỀM - L&ocirc;ng mi KAUMI mang lại cho người sử dụng cảm gi&aacute;c nhẹ nh&agrave;ng, tự nhi&ecirc;n, th&acirc;n thiện với da mắt, kh&ocirc;ng g&acirc;y cộm, nhức như c&aacute;c d&ograve;ng mi kh&aacute;c.</p>\r\n\r\n<p>L&ocirc;ng Mi KAZUMI được sản xuất theo d&acirc;y chuyền c&ocirc;ng nghệ Nhật Bản, sợi l&ocirc;ng mi được l&agrave;m từ nguy&ecirc;n liệu t&oacute;c nh&acirc;n tạo t&iacute;ch hợp c&ocirc;ng nghệ NANO, ứng dụng n&agrave;y đ&atilde; l&agrave;m giảm trọng lượng sợi mi nhẹ bằng 1/2 sợi t&oacute;c th&ocirc;ng thường. Nhờ đặc t&iacute;nh vượt trội SI&Ecirc;U NHẸ- SI&Ecirc;U MỀM - L&ocirc;ng mi KAUMI mang lại cho người sử dụng cảm gi&aacute;c nhẹ nh&agrave;ng, tự nhi&ecirc;n, th&acirc;n thiện với da mắt, kh&ocirc;ng g&acirc;y cộm, nhức như c&aacute;c d&ograve;ng mi kh&aacute;c.</p>', '2019-09-07 19:08:43', '2019-09-07 19:08:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_collection`
--

CREATE TABLE `product_collection` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `collection_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_collection`
--

INSERT INTO `product_collection` (`id`, `product_id`, `collection_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2019-08-25 03:03:22', '2019-08-25 03:03:22'),
(2, 2, 1, '2019-08-27 03:14:04', '2019-08-27 03:14:04'),
(3, 3, 1, '2019-09-03 03:36:18', '2019-09-03 03:36:18'),
(4, 3, 2, '2019-09-03 03:36:19', '2019-09-03 03:36:19'),
(5, 4, 3, '2019-09-04 01:17:34', '2019-09-04 01:17:34'),
(10, 9, 2, '2019-09-07 18:38:29', '2019-09-07 18:38:29'),
(11, 10, 2, '2019-09-07 18:46:54', '2019-09-07 18:46:54'),
(14, 13, 6, '2019-09-07 19:08:43', '2019-09-07 19:08:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rating`
--

CREATE TABLE `rating` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `rate_star` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','publish') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rating`
--

INSERT INTO `rating` (`id`, `product_id`, `user_id`, `rate_star`, `title`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 4, 'Sản phẩm tốt', 'Sản phẩm dùng rất tốt cho ...', 'publish', '2019-09-02 03:12:50', NULL),
(2, 3, 4, 5, 'Đánh giá', 'Sản phẩm tốt', 'publish', '2019-09-04 04:35:00', NULL),
(3, 3, 2, 3, 'Tốt', 'Tốt', 'publish', '2019-09-04 07:38:29', NULL),
(4, 3, 3, 5, 'Pveser', 'Sản phẩm dung rất tốt', 'pending', '2019-09-04 08:34:14', NULL),
(10, 3, 5, 5, 'Tốt', 'Sản phẩm dùng rất tốt', 'pending', '2019-09-23 00:27:34', '2019-09-23 00:27:34'),
(18, 4, 5, 5, 'Tốt', 'Sản phẩm tốt', 'pending', '2019-09-23 00:53:41', '2019-09-23 00:53:41'),
(19, 4, 1, 4, 'Sản phẩm tốt', 'Sử dụng tốt', 'pending', '2019-09-23 00:54:16', '2019-09-23 00:54:16'),
(20, 1, 1, 5, 'Good', 'Sản phẩm dùng rất tôi. Tôi đã giới thiệu cho 1 số bạn bè dùng thử', 'pending', '2019-09-23 19:30:18', '2019-09-23 19:30:18'),
(21, 2, 1, 5, 'Sản phẩm tốt', 'Tôi đã sử dụng sản phẩm và cảm thấy rất tốt. Tỗi cũng đã giới thiệu cho bạn bè dùng thử....', 'pending', '2019-09-26 02:11:19', '2019-09-26 02:11:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `regions`
--

CREATE TABLE `regions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `regions`
--

INSERT INTO `regions` (`id`, `country_code`, `country_name`, `created_at`, `updated_at`) VALUES
(1, 'AF', 'Afghanistan', NULL, NULL),
(2, 'AL', 'Albania', NULL, NULL),
(3, 'DZ', 'Algeria', NULL, NULL),
(4, 'AS', 'American Samoa', NULL, NULL),
(5, 'AD', 'Andorra', NULL, NULL),
(6, 'AO', 'Angola', NULL, NULL),
(7, 'AI', 'Anguilla', NULL, NULL),
(8, 'AQ', 'Antarctica', NULL, NULL),
(9, 'AG', 'Antigua and Barbuda', NULL, NULL),
(10, 'AR', 'Argentina', NULL, NULL),
(11, 'AM', 'Armenia', NULL, NULL),
(12, 'AW', 'Aruba', NULL, NULL),
(13, 'AU', 'Australia', NULL, NULL),
(14, 'AT', 'Austria', NULL, NULL),
(15, 'AZ', 'Azerbaijan', NULL, NULL),
(16, 'BS', 'Bahamas', NULL, NULL),
(17, 'BH', 'Bahrain', NULL, NULL),
(18, 'BD', 'Bangladesh', NULL, NULL),
(19, 'BB', 'Barbados', NULL, NULL),
(20, 'BY', 'Belarus', NULL, NULL),
(21, 'BE', 'Belgium', NULL, NULL),
(22, 'BZ', 'Belize', NULL, NULL),
(23, 'BJ', 'Benin', NULL, NULL),
(24, 'BM', 'Bermuda', NULL, NULL),
(25, 'BT', 'Bhutan', NULL, NULL),
(26, 'BO', 'Bolivia', NULL, NULL),
(27, 'BQ', 'Bonaire', NULL, NULL),
(28, 'BA', 'Bosnia and Herzegovina', NULL, NULL),
(29, 'BW', 'Botswana', NULL, NULL),
(30, 'BV', 'Bouvet Island', NULL, NULL),
(31, 'BR', 'Brazil', NULL, NULL),
(32, 'IO', 'British Indian Ocean Territory', NULL, NULL),
(33, 'BN', 'Brunei Darussalam', NULL, NULL),
(34, 'BG', 'Bulgaria', NULL, NULL),
(35, 'BF', 'Burkina Faso', NULL, NULL),
(36, 'BI', 'Burundi', NULL, NULL),
(37, 'KH', 'Cambodia', NULL, NULL),
(38, 'CM', 'Cameroon', NULL, NULL),
(39, 'CA', 'Canada', NULL, NULL),
(40, 'CV', 'Cape Verde', NULL, NULL),
(41, 'KY', 'Cayman Islands', NULL, NULL),
(42, 'CF', 'Central African Republic', NULL, NULL),
(43, 'TD', 'Chad', NULL, NULL),
(44, 'CL', 'Chile', NULL, NULL),
(45, 'CN', 'China', NULL, NULL),
(46, 'CX', 'Christmas Island', NULL, NULL),
(47, 'CC', 'Cocos (Keeling) Islands', NULL, NULL),
(48, 'CO', 'Colombia', NULL, NULL),
(49, 'KM', 'Comoros', NULL, NULL),
(50, 'CG', 'Congo', NULL, NULL),
(51, 'CD', 'Democratic Republic of the Congo', NULL, NULL),
(52, 'CK', 'Cook Islands', NULL, NULL),
(53, 'CR', 'Costa Rica', NULL, NULL),
(54, 'HR', 'Croatia', NULL, NULL),
(55, 'CU', 'Cuba', NULL, NULL),
(56, 'CW', 'Curacao', NULL, NULL),
(57, 'CY', 'Cyprus', NULL, NULL),
(58, 'CZ', 'Czech Republic', NULL, NULL),
(59, 'CI', 'Cote d\'Ivoire', NULL, NULL),
(60, 'DK', 'Denmark', NULL, NULL),
(61, 'DJ', 'Djibouti', NULL, NULL),
(62, 'DM', 'Dominica', NULL, NULL),
(63, 'DO', 'Dominican Republic', NULL, NULL),
(64, 'EC', 'Ecuador', NULL, NULL),
(65, 'EG', 'Egypt', NULL, NULL),
(66, 'SV', 'El Salvador', NULL, NULL),
(67, 'GQ', 'Equatorial Guinea', NULL, NULL),
(68, 'ER', 'Eritrea', NULL, NULL),
(69, 'EE', 'Estonia', NULL, NULL),
(70, 'ET', 'Ethiopia', NULL, NULL),
(71, 'FK', 'Falkland Islands (Malvinas)', NULL, NULL),
(72, 'FO', 'Faroe Islands', NULL, NULL),
(73, 'FJ', 'Fiji', NULL, NULL),
(74, 'FI', 'Finland', NULL, NULL),
(75, 'FR', 'France', NULL, NULL),
(76, 'GF', 'French Guiana', NULL, NULL),
(77, 'PF', 'French Polynesia', NULL, NULL),
(78, 'TF', 'French Southern Territories', NULL, NULL),
(79, 'GA', 'Gabon', NULL, NULL),
(80, 'GM', 'Gambia', NULL, NULL),
(81, 'GE', 'Georgia', NULL, NULL),
(82, 'DE', 'Germany', NULL, NULL),
(83, 'GH', 'Ghana', NULL, NULL),
(84, 'GI', 'Gibraltar', NULL, NULL),
(85, 'GR', 'Greece', NULL, NULL),
(86, 'GL', 'Greenland', NULL, NULL),
(87, 'GD', 'Grenada', NULL, NULL),
(88, 'GP', 'Guadeloupe', NULL, NULL),
(89, 'GU', 'Guam', NULL, NULL),
(90, 'GT', 'Guatemala', NULL, NULL),
(91, 'GG', 'Guernsey', NULL, NULL),
(92, 'GN', 'Guinea', NULL, NULL),
(93, 'GW', 'Guinea-Bissau', NULL, NULL),
(94, 'GY', 'Guyana', NULL, NULL),
(95, 'HT', 'Haiti', NULL, NULL),
(96, 'HM', 'Heard Island and McDonald Islands', NULL, NULL),
(97, 'VA', 'Holy See (Vatican City State)', NULL, NULL),
(98, 'HN', 'Honduras', NULL, NULL),
(99, 'HK', 'Hong Kong', NULL, NULL),
(100, 'HU', 'Hungary', NULL, NULL),
(101, 'IS', 'Iceland', NULL, NULL),
(102, 'IN', 'India', NULL, NULL),
(103, 'ID', 'Indonesia', NULL, NULL),
(104, 'IR', 'Iran, Islamic Republic of', NULL, NULL),
(105, 'IQ', 'Iraq', NULL, NULL),
(106, 'IE', 'Ireland', NULL, NULL),
(107, 'IM', 'Isle of Man', NULL, NULL),
(108, 'IL', 'Israel', NULL, NULL),
(109, 'IT', 'Italy', NULL, NULL),
(110, 'JM', 'Jamaica', NULL, NULL),
(111, 'JP', 'Japan', NULL, NULL),
(112, 'JE', 'Jersey', NULL, NULL),
(113, 'JO', 'Jordan', NULL, NULL),
(114, 'KZ', 'Kazakhstan', NULL, NULL),
(115, 'KE', 'Kenya', NULL, NULL),
(116, 'KI', 'Kiribati', NULL, NULL),
(117, 'KP', 'Korea, Democratic People\'s Republic of', NULL, NULL),
(118, 'KR', 'Korea, Republic of', NULL, NULL),
(119, 'KW', 'Kuwait', NULL, NULL),
(120, 'KG', 'Kyrgyzstan', NULL, NULL),
(121, 'LA', 'Lao People\'s Democratic Republic', NULL, NULL),
(122, 'LV', 'Latvia', NULL, NULL),
(123, 'LB', 'Lebanon', NULL, NULL),
(124, 'LS', 'Lesotho', NULL, NULL),
(125, 'LR', 'Liberia', NULL, NULL),
(126, 'LY', 'Libya', NULL, NULL),
(127, 'LI', 'Liechtenstein', NULL, NULL),
(128, 'LT', 'Lithuania', NULL, NULL),
(129, 'LU', 'Luxembourg', NULL, NULL),
(130, 'MO', 'Macao', NULL, NULL),
(131, 'MK', 'Macedonia, the Former Yugoslav Republic of', NULL, NULL),
(132, 'MG', 'Madagascar', NULL, NULL),
(133, 'MW', 'Malawi', NULL, NULL),
(134, 'MY', 'Malaysia', NULL, NULL),
(135, 'MV', 'Maldives', NULL, NULL),
(136, 'ML', 'Mali', NULL, NULL),
(137, 'MT', 'Malta', NULL, NULL),
(138, 'MH', 'Marshall Islands', NULL, NULL),
(139, 'MQ', 'Martinique', NULL, NULL),
(140, 'MR', 'Mauritania', NULL, NULL),
(141, 'MU', 'Mauritius', NULL, NULL),
(142, 'YT', 'Mayotte', NULL, NULL),
(143, 'MX', 'Mexico', NULL, NULL),
(144, 'FM', 'Micronesia, Federated States of', NULL, NULL),
(145, 'MD', 'Moldova, Republic of', NULL, NULL),
(146, 'MC', 'Monaco', NULL, NULL),
(147, 'MN', 'Mongolia', NULL, NULL),
(148, 'ME', 'Montenegro', NULL, NULL),
(149, 'MS', 'Montserrat', NULL, NULL),
(150, 'MA', 'Morocco', NULL, NULL),
(151, 'MZ', 'Mozambique', NULL, NULL),
(152, 'MM', 'Myanmar', NULL, NULL),
(153, 'NA', 'Namibia', NULL, NULL),
(154, 'NR', 'Nauru', NULL, NULL),
(155, 'NP', 'Nepal', NULL, NULL),
(156, 'NL', 'Netherlands', NULL, NULL),
(157, 'NC', 'New Caledonia', NULL, NULL),
(158, 'NZ', 'New Zealand', NULL, NULL),
(159, 'NI', 'Nicaragua', NULL, NULL),
(160, 'NE', 'Niger', NULL, NULL),
(161, 'NG', 'Nigeria', NULL, NULL),
(162, 'NU', 'Niue', NULL, NULL),
(163, 'NF', 'Norfolk Island', NULL, NULL),
(164, 'MP', 'Northern Mariana Islands', NULL, NULL),
(165, 'NO', 'Norway', NULL, NULL),
(166, 'OM', 'Oman', NULL, NULL),
(167, 'PK', 'Pakistan', NULL, NULL),
(168, 'PW', 'Palau', NULL, NULL),
(169, 'PS', 'Palestine, State of', NULL, NULL),
(170, 'PA', 'Panama', NULL, NULL),
(171, 'PG', 'Papua New Guinea', NULL, NULL),
(172, 'PY', 'Paraguay', NULL, NULL),
(173, 'PE', 'Peru', NULL, NULL),
(174, 'PH', 'Philippines', NULL, NULL),
(175, 'PN', 'Pitcairn', NULL, NULL),
(176, 'PL', 'Poland', NULL, NULL),
(177, 'PT', 'Portugal', NULL, NULL),
(178, 'PR', 'Puerto Rico', NULL, NULL),
(179, 'QA', 'Qatar', NULL, NULL),
(180, 'RO', 'Romania', NULL, NULL),
(181, 'RU', 'Russian Federation', NULL, NULL),
(182, 'RW', 'Rwanda', NULL, NULL),
(183, 'RE', 'Reunion', NULL, NULL),
(184, 'BL', 'Saint Barthelemy', NULL, NULL),
(185, 'SH', 'Saint Helena', NULL, NULL),
(186, 'KN', 'Saint Kitts and Nevis', NULL, NULL),
(187, 'LC', 'Saint Lucia', NULL, NULL),
(188, 'MF', 'Saint Martin (French part)', NULL, NULL),
(189, 'PM', 'Saint Pierre and Miquelon', NULL, NULL),
(190, 'VC', 'Saint Vincent and the Grenadines', NULL, NULL),
(191, 'WS', 'Samoa', NULL, NULL),
(192, 'SM', 'San Marino', NULL, NULL),
(193, 'ST', 'Sao Tome and Principe', NULL, NULL),
(194, 'SA', 'Saudi Arabia', NULL, NULL),
(195, 'SN', 'Senegal', NULL, NULL),
(196, 'RS', 'Serbia', NULL, NULL),
(197, 'SC', 'Seychelles', NULL, NULL),
(198, 'SL', 'Sierra Leone', NULL, NULL),
(199, 'SG', 'Singapore', NULL, NULL),
(200, 'SX', 'Sint Maarten (Dutch part)', NULL, NULL),
(201, 'SK', 'Slovakia', NULL, NULL),
(202, 'SI', 'Slovenia', NULL, NULL),
(203, 'SB', 'Solomon Islands', NULL, NULL),
(204, 'SO', 'Somalia', NULL, NULL),
(205, 'ZA', 'South Africa', NULL, NULL),
(206, 'GS', 'South Georgia and the South Sandwich Islands', NULL, NULL),
(207, 'SS', 'South Sudan', NULL, NULL),
(208, 'ES', 'Spain', NULL, NULL),
(209, 'LK', 'Sri Lanka', NULL, NULL),
(210, 'SD', 'Sudan', NULL, NULL),
(211, 'SR', 'Suriname', NULL, NULL),
(212, 'SJ', 'Svalbard and Jan Mayen', NULL, NULL),
(213, 'SZ', 'Swaziland', NULL, NULL),
(214, 'SE', 'Sweden', NULL, NULL),
(215, 'CH', 'Switzerland', NULL, NULL),
(216, 'SY', 'Syrian Arab Republic', NULL, NULL),
(217, 'TW', 'Taiwan', NULL, NULL),
(218, 'TJ', 'Tajikistan', NULL, NULL),
(219, 'TZ', 'United Republic of Tanzania', NULL, NULL),
(220, 'TH', 'Thailand', NULL, NULL),
(221, 'TL', 'Timor-Leste', NULL, NULL),
(222, 'TG', 'Togo', NULL, NULL),
(223, 'TK', 'Tokelau', NULL, NULL),
(224, 'TO', 'Tonga', NULL, NULL),
(225, 'TT', 'Trinidad and Tobago', NULL, NULL),
(226, 'TN', 'Tunisia', NULL, NULL),
(227, 'TR', 'Turkey', NULL, NULL),
(228, 'TM', 'Turkmenistan', NULL, NULL),
(229, 'TC', 'Turks and Caicos Islands', NULL, NULL),
(230, 'TV', 'Tuvalu', NULL, NULL),
(231, 'UG', 'Uganda', NULL, NULL),
(232, 'UA', 'Ukraine', NULL, NULL),
(233, 'AE', 'United Arab Emirates', NULL, NULL),
(234, 'GB', 'United Kingdom', NULL, NULL),
(235, 'US', 'United States', NULL, NULL),
(236, 'UM', 'United States Minor Outlying Islands', NULL, NULL),
(237, 'UY', 'Uruguay', NULL, NULL),
(238, 'UZ', 'Uzbekistan', NULL, NULL),
(239, 'VU', 'Vanuatu', NULL, NULL),
(240, 'VE', 'Venezuela', NULL, NULL),
(241, 'VN', 'Viet Nam', NULL, NULL),
(242, 'VG', 'British Virgin Islands', NULL, NULL),
(243, 'VI', 'US Virgin Islands', NULL, NULL),
(244, 'WF', 'Wallis and Futuna', NULL, NULL),
(245, 'EH', 'Western Sahara', NULL, NULL),
(246, 'YE', 'Yemen', NULL, NULL),
(247, 'ZM', 'Zambia', NULL, NULL),
(248, 'ZW', 'Zimbabwe', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `register_mail`
--

CREATE TABLE `register_mail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `register_mail`
--

INSERT INTO `register_mail` (`id`, `email`, `ip`, `created_at`, `updated_at`) VALUES
(1, 'n4m.nv.1997@gmail.com', '127.0.0.1', '2019-09-07 17:29:09', '2019-09-07 17:29:09'),
(2, 'namnguyen.pveser@gmail.com', '127.0.0.1', '2019-09-07 17:39:38', '2019-09-07 17:39:38'),
(3, 'pencilbluee@gmail.com', '127.0.0.1', '2019-09-07 17:45:08', '2019-09-07 17:45:08'),
(4, 'nguyenbinh@gmail.com', '127.0.0.1', '2019-09-08 18:22:22', '2019-09-08 18:22:22'),
(5, 'nguyenbinher@gmail.com', '127.0.0.1', '2019-09-12 21:47:54', '2019-09-12 21:47:54'),
(6, 'admin@127.0.0.1', '127.0.0.1', '2019-09-17 03:06:30', '2019-09-17 03:06:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `result_product`
--

CREATE TABLE `result_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `result_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `result_product`
--

INSERT INTO `result_product` (`id`, `result_id`, `product_id`, `created_at`, `updated_at`) VALUES
(19, 4, 1, '2019-09-24 19:31:21', '2019-09-24 19:31:21'),
(20, 4, 3, '2019-09-24 19:31:21', '2019-09-24 19:31:21'),
(21, 4, 13, '2019-09-24 19:31:21', '2019-09-24 19:31:21'),
(22, 5, 2, '2019-09-24 19:41:09', '2019-09-24 19:41:09'),
(23, 5, 9, '2019-09-24 19:41:09', '2019-09-24 19:41:09'),
(24, 5, 10, '2019-09-24 19:41:09', '2019-09-24 19:41:09'),
(25, 6, 1, '2019-09-24 23:33:36', '2019-09-24 23:33:36'),
(26, 6, 2, '2019-09-24 23:33:36', '2019-09-24 23:33:36'),
(27, 6, 3, '2019-09-24 23:33:36', '2019-09-24 23:33:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `retailers`
--

CREATE TABLE `retailers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bussiness_year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `retailers`
--

INSERT INTO `retailers` (`id`, `email`, `fullname`, `phone`, `website`, `bussiness_year`, `address`, `name`, `city_id`, `created_at`, `updated_at`) VALUES
(1, 'hoangngocphach@gmail.com', 'Nguyễn Văn Nam', '01256939847', 'hoangngocphach.com', '2', 'Số 1 ngõ 1, phố Hoàng Ngọc Phách, Láng Hạ, Đống Đa, Hà Nội', 'Đại lý Hoàng Ngọc Phách', 23, '2019-09-21 20:39:12', '2019-09-21 20:39:12'),
(2, 'thaohoang@gmail.com', 'Hoàng Thị Thảo', '0123265984', 'hoangcau.com', '1', 'Số 12 Hoàng Cầu, Đống Đa, Hà Nội', 'Đại lý Hoang Cầu', 23, '2019-09-21 20:43:47', '2019-09-21 20:43:47'),
(3, 'buiphuonghoa@gmail.com', 'Bùi Phương Hoa', '025318947', 'dvh.kazumi.com', '1', 'Số 1 Dịch Vọng Hậu, Cầu Giấy, Hà Nội', 'Đại lý Dịch Vọng Hậu', 23, '2019-09-21 20:47:00', '2019-09-21 20:52:56'),
(4, 'ntthuy@gmail.com', 'Nguyễn Thị Thúy', '0145266897', 'tt.kazumni.com', '1', 'Số 10, đường Minh Khai, Thuận Thành, Bắc Ninh', 'Đại lý Thuận Thành', 5, '2019-09-21 21:02:53', '2019-09-21 21:02:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', 'superadmin', 'SuperAdmin Role', NULL, NULL),
(2, 'Admin', 'admin', 'Admin Role', NULL, NULL),
(3, 'User', 'user', 'User Role', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 2, NULL, NULL),
(3, 3, 3, NULL, NULL),
(4, 4, 3, '2019-08-25 03:04:35', '2019-08-25 03:04:35'),
(5, 5, 3, '2019-09-06 23:42:58', '2019-09-06 23:42:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shipping_address_user`
--

CREATE TABLE `shipping_address_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `social_user_follow`
--

CREATE TABLE `social_user_follow` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('facebook','instagram','mail') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `step_item`
--

CREATE TABLE `step_item` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `step_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `step_item`
--

INSERT INTO `step_item` (`id`, `step_id`, `image`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, '/assets/uploads/images/pages/eye_item.png', 'Almond Eyes', 'Almond eyes are best paired with fuller lashes that help increase depth and intensity.', '2019-09-24 00:26:09', '2019-09-24 21:44:24'),
(2, 1, '/assets/uploads/images/pages/eye_item.png', 'Rounded Eyes', 'Round eyes pairs well with lashes that help you maximize the width of your eyes.', '2019-09-24 00:40:14', '2019-09-24 00:40:14'),
(3, 2, '/assets/uploads/images/pages/place_item.png', 'Close Set', 'My left and right eyes are less than a single eye\'s width apart.', '2019-09-24 00:41:36', '2019-09-24 00:41:36'),
(4, 2, '/assets/uploads/images/pages/esq-eye-placement-medium.png', 'Medium', 'My left and right eyes are about a single eye\'s width apart.', '2019-09-24 00:42:29', '2019-09-24 00:42:29'),
(5, 3, '/assets/uploads/images/pages/size_item.png', 'Petite', 'My eyes are slightly more petite than average.', '2019-09-24 00:43:45', '2019-09-24 00:43:45'),
(6, 3, '/assets/uploads/images/pages/size_item_1.png', 'Medium', 'My eyes are average size.', '2019-09-24 00:44:15', '2019-09-24 00:44:15'),
(7, 4, '/assets/uploads/images/pages/length_item.png', 'Sparse', 'I have a small amount of natural lashes.', '2019-09-24 00:44:56', '2019-09-24 00:44:56'),
(8, 4, '/assets/uploads/images/pages/length_item_1.png', 'Medium', 'I have a good amount of natural lashes.', '2019-09-24 00:45:32', '2019-09-24 00:45:32'),
(9, 5, '/assets/uploads/images/pages/style_item.png', 'Subtle/Natural', 'I like to stick to the basics, I believe in natural beauty.', '2019-09-24 00:46:26', '2019-09-24 00:46:26'),
(10, 5, '/assets/uploads/images/pages/style_item_1.png', 'Classic/Elegant', 'Tasteful and sophisticated, never over the top.', '2019-09-24 00:46:55', '2019-09-24 00:46:55'),
(11, 6, '/assets/uploads/images/pages/experience_item_1.png', 'Experienced', 'I\'m comfortable with applying false lashes, I wear them occasionally.', '2019-09-24 00:48:05', '2019-09-24 00:48:05'),
(12, 6, '/assets/uploads/images/pages/experience_item.png', 'Expect', 'I love false lashes and I\'ve mastered the art of applying them.', '2019-09-24 00:48:22', '2019-09-24 00:48:22'),
(13, 7, '/assets/uploads/images/pages/event_item.png', 'Daily Use', 'Lashes that are great for everyday and look naturally yours', '2019-09-24 00:50:00', '2019-09-24 00:50:00'),
(14, 7, '/assets/uploads/images/pages/event_item_1.png', 'Night Out', 'Put your best lash forward with these versatile styles appropriate for any setting.', '2019-09-24 00:50:18', '2019-09-24 00:50:18'),
(15, 7, '/assets/uploads/images/pages/event_item_2.png', 'Wedding', 'Classy and timeless styles that enhance the elegant side of you ,,,.,', '2019-09-24 00:50:35', '2019-09-24 01:29:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `step_lash`
--

CREATE TABLE `step_lash` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `step_lash`
--

INSERT INTO `step_lash` (`id`, `name`, `slug`, `image`, `title`, `description`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Eye Type', 'eye-type', '/assets/uploads/images/pages/eye_type.webp', 'Kiểu mắt của bạn như thế nào?', 'Every set of eyes has distinguishing features, define yours and we\'ll match it with a fitting pair.', 1, '2019-09-23 20:35:15', '2019-09-23 23:43:23'),
(2, 'Placements', 'placements', '/assets/uploads/images/pages/placements.webp', 'Placement of your eyes?', 'This helps us determine the appropriate length and design lashes that will pair well.', 2, '2019-09-23 20:36:56', '2019-09-23 23:32:52'),
(3, 'Size', 'size', '/assets/uploads/images/pages/size.png', 'What size are your eyes?', 'Understanding the size of your eyes can help us determine a proportional fit.', 4, '2019-09-23 20:39:35', '2019-09-23 23:50:25'),
(4, 'Length', 'length', '/assets/uploads/images/pages/length.png', 'What size are your eyes?', 'Defining your own lashes will help us determine a suitable volume for your eyes.', 3, '2019-09-23 20:40:27', '2019-09-23 23:50:25'),
(5, 'Style', 'style', '/assets/uploads/images/pages/style.png', 'What\'s the look that best describes you?', 'Different lash styles can help you achieve different looks, pick one that suits you best.', 5, '2019-09-23 20:41:29', '2019-09-23 20:41:29'),
(6, 'Experience', 'experience', '/assets/uploads/images/pages/experience.png', 'How experienced are you with applying false lashes?', 'Depending on your comfort level with lashes, certain styles may pair better.', 6, '2019-09-23 20:42:38', '2019-09-23 20:42:38'),
(7, 'Event', 'event', '/assets/uploads/images/pages/event.png', 'How will you wear your lashes?', 'We\'ll help you find the appropriate pair of lashes, whatever the occasion.', 7, '2019-09-23 20:43:04', '2019-09-23 20:43:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tiers`
--

CREATE TABLE `tiers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tier_content` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tiers`
--

INSERT INTO `tiers` (`id`, `name`, `title`, `tier_content`, `created_at`, `updated_at`) VALUES
(1, 'Silver', 'Spend 300.000đ more to reach this tier', 'abc', '2019-09-09 09:32:11', NULL),
(2, 'Gold', 'Kiếm 500.000đ từ đơn hàng mới', 'abc', '2019-09-09 07:18:27', NULL),
(3, 'Platinum', 'Kiếm 800.000đ từ đơn hàng mới', 'abc', '2019-09-09 07:20:27', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date DEFAULT NULL,
  `point_reward` bigint(20) NOT NULL DEFAULT '0',
  `refferal_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_link` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `birthday`, `point_reward`, `refferal_code`, `short_link`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@127.0.0.1', '$2y$10$DGifwnNaVgKreqm5HrZ/9upKgBQavpDSgi/zYKmk3GGTAe4l/md.6', '1997-05-14', 1685, 'ebJRM68boy', 'http://bit.ly/2AwSg1f', '/assets/client/img/avatar_1569037408.jpg', 'u77u0A68elD59EIW9iGe7Gl9SZqIPwR8mZjaQ3JfQaSf2ptuwfy0ecRSRA5k', NULL, '2019-09-20 20:43:28'),
(2, 'Nam Nguyễn', 'n4m.nv.1997@gmail.com', '$2y$10$4Ed3MIg9m.3UrtodUfKIX.q4WgNmYbWSJ.lDkGPUFoMEsqBe1hC6C', '1997-05-14', 1151, 'JrIzOBMxV5', '', '/assets/client/img/col_1569036529.jpg', 'iPpbVbJrDGZD2Fgn37Tv4QiaDzgcfpxJlztXCA731UKU2naENTdDmqz0mAUe', NULL, '2019-09-20 20:28:49'),
(3, 'Lê Loan', 'info@pveser.com', '$2y$10$WR9XOCmsafG9HtwSat3hoObDgC/H72GAA5y0W9dssjvitz.moFi1C', '1995-06-20', 208, 'ADFLO52LO8', '', NULL, '6LYJ0RD19pQaO98gMbs6RfRChzFCNpFTeavOYgCAoRBdMGhfOMH1DMkSQMki', NULL, '2019-09-12 09:31:45'),
(4, 'Hải Long', 'hailongnguyen@gmail.com', '$2y$10$V9ozsolTpVLnzjYkJiALROHZbLP2qIGPZYw16896QUkXtgYYGoJFe', '1998-09-27', 100, 'O8UU0X20PW', '', NULL, NULL, '2019-08-25 03:04:35', '2019-08-28 23:38:23'),
(5, 'Nam Nguyen', 'nguyenbinh@gmail.com', '$2y$10$DGifwnNaVgKreqm5HrZ/9upKgBQavpDSgi/zYKmk3GGTAe4l/md.6', '1998-09-27', 100, 'O8UU0X20PS', '', NULL, 'CWYtzfFRIpVBmnfBhU8qfoPDGN1DrryjP8iYqAdPSb92EAKPI0E0fJdsTmH7', '2019-09-06 23:42:58', '2019-09-07 00:23:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users_meta`
--

CREATE TABLE `users_meta` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `field_id` bigint(20) UNSIGNED NOT NULL,
  `meta_value` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users_meta_field`
--

CREATE TABLE `users_meta_field` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_discount`
--

CREATE TABLE `user_discount` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `discount_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_discount`
--

INSERT INTO `user_discount` (`id`, `user_id`, `discount_id`, `created_at`, `updated_at`) VALUES
(8, 3, 3, '2019-09-12 09:31:45', '2019-09-12 09:31:45'),
(9, 1, 2, '2019-09-12 22:01:10', '2019-09-12 22:01:10'),
(10, 2, 1, '2019-09-17 00:11:20', '2019-09-17 00:11:20'),
(11, 2, 2, '2019-09-17 00:16:45', '2019-09-17 00:16:45'),
(12, 1, 1, '2019-09-19 23:32:21', '2019-09-19 23:32:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_tier`
--

CREATE TABLE `user_tier` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tier_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_tier`
--

INSERT INTO `user_tier` (`id`, `user_id`, `tier_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2019-09-09 08:39:17', NULL),
(2, 2, 1, '2019-09-09 08:39:19', NULL),
(3, 3, 1, '2019-09-09 08:45:19', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vouchers`
--

CREATE TABLE `vouchers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'total',
  `discount_value` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vouchers`
--

INSERT INTO `vouchers` (`id`, `user_id`, `code`, `name`, `type`, `discount_value`, `status`, `created_at`, `updated_at`) VALUES
(3, 1, 'C8n6AP6s7m', 'Voucher giảm giá 50.000 VNĐ', 'total', 50000, 1, '2019-09-18 21:31:04', '2019-09-18 21:31:04'),
(4, 1, 'KjGDSCbn3S', 'Voucher giảm giá 200.000 VNĐ', 'total', 200000, 1, '2019-09-18 21:34:10', '2019-09-18 21:34:10'),
(5, 1, 'seZhdBTujK', 'Voucher giảm giá 100.000 VNĐ', 'total', 100000, 1, '2019-09-18 23:33:41', '2019-09-18 23:33:41'),
(6, 1, 'j5P9g8QR03', 'Voucher giảm giá 5$', 'total', 100000, 1, '2019-09-20 21:02:56', '2019-09-20 21:02:56');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `articles_slug_unique` (`slug`),
  ADD KEY `articles_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_discount_id_foreign` (`discount_id`),
  ADD KEY `carts_voucher_id_foreign` (`voucher_id`);

--
-- Chỉ mục cho bảng `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_items_cart_id_foreign` (`cart_id`),
  ADD KEY `cart_items_pack_id_foreign` (`pack_id`),
  ADD KEY `cart_items_color_id_foreign` (`color_id`);

--
-- Chỉ mục cho bảng `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `collections_slug_unique` (`slug`),
  ADD KEY `collections_parent_foreign` (`parent`);

--
-- Chỉ mục cho bảng `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `discounts_code_unique` (`code`);

--
-- Chỉ mục cho bảng `earn_points`
--
ALTER TABLE `earn_points`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `essentials`
--
ALTER TABLE `essentials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `essentials_product_id_foreign` (`product_id`),
  ADD KEY `essentials_essential_product_id_foreign` (`essential_product_id`);

--
-- Chỉ mục cho bảng `forms_data`
--
ALTER TABLE `forms_data`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galleries_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `get_reward`
--
ALTER TABLE `get_reward`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `history_reward`
--
ALTER TABLE `history_reward`
  ADD PRIMARY KEY (`id`),
  ADD KEY `history_reward_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Chỉ mục cho bảng `lash_guide_result`
--
ALTER TABLE `lash_guide_result`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `layouts`
--
ALTER TABLE `layouts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `packs`
--
ALTER TABLE `packs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `packs_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `packs_colors`
--
ALTER TABLE `packs_colors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `packs_colors_pack_id_foreign` (`pack_id`),
  ADD KEY `packs_colors_color_id_foreign` (`color_id`);

--
-- Chỉ mục cho bảng `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `page_custom_field`
--
ALTER TABLE `page_custom_field`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_custom_field_page_id_foreign` (`page_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `product_collection`
--
ALTER TABLE `product_collection`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_collection_product_id_foreign` (`product_id`),
  ADD KEY `product_collection_collection_id_foreign` (`collection_id`);

--
-- Chỉ mục cho bảng `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rating_product_id_foreign` (`product_id`),
  ADD KEY `rating_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `register_mail`
--
ALTER TABLE `register_mail`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `register_mail_email_unique` (`email`);

--
-- Chỉ mục cho bảng `result_product`
--
ALTER TABLE `result_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `result_product_result_id_foreign` (`result_id`),
  ADD KEY `result_product_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `retailers`
--
ALTER TABLE `retailers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `retailers_city_id_foreign` (`city_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Chỉ mục cho bảng `shipping_address_user`
--
ALTER TABLE `shipping_address_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shipping_address_user_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `social_user_follow`
--
ALTER TABLE `social_user_follow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `social_user_follow_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `step_item`
--
ALTER TABLE `step_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `step_item_step_id_foreign` (`step_id`);

--
-- Chỉ mục cho bảng `step_lash`
--
ALTER TABLE `step_lash`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `step_lash_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `tiers`
--
ALTER TABLE `tiers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `users_meta`
--
ALTER TABLE `users_meta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_meta_user_id_foreign` (`user_id`),
  ADD KEY `users_meta_field_id_foreign` (`field_id`);

--
-- Chỉ mục cho bảng `users_meta_field`
--
ALTER TABLE `users_meta_field`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user_discount`
--
ALTER TABLE `user_discount`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_discount_user_id_foreign` (`user_id`),
  ADD KEY `user_discount_discount_id_foreign` (`discount_id`);

--
-- Chỉ mục cho bảng `user_tier`
--
ALTER TABLE `user_tier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_tier_user_id_foreign` (`user_id`),
  ADD KEY `user_tier_tier_id_foreign` (`tier_id`);

--
-- Chỉ mục cho bảng `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vouchers_code_unique` (`code`),
  ADD KEY `vouchers_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT cho bảng `collections`
--
ALTER TABLE `collections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `earn_points`
--
ALTER TABLE `earn_points`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `essentials`
--
ALTER TABLE `essentials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `forms_data`
--
ALTER TABLE `forms_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT cho bảng `get_reward`
--
ALTER TABLE `get_reward`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `history_reward`
--
ALTER TABLE `history_reward`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `lash_guide_result`
--
ALTER TABLE `lash_guide_result`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `layouts`
--
ALTER TABLE `layouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT cho bảng `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=342;

--
-- AUTO_INCREMENT cho bảng `packs`
--
ALTER TABLE `packs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `packs_colors`
--
ALTER TABLE `packs_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `page_custom_field`
--
ALTER TABLE `page_custom_field`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `product_collection`
--
ALTER TABLE `product_collection`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `rating`
--
ALTER TABLE `rating`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=249;

--
-- AUTO_INCREMENT cho bảng `register_mail`
--
ALTER TABLE `register_mail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `result_product`
--
ALTER TABLE `result_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `retailers`
--
ALTER TABLE `retailers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `shipping_address_user`
--
ALTER TABLE `shipping_address_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `social_user_follow`
--
ALTER TABLE `social_user_follow`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `step_item`
--
ALTER TABLE `step_item`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `step_lash`
--
ALTER TABLE `step_lash`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tiers`
--
ALTER TABLE `tiers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users_meta`
--
ALTER TABLE `users_meta`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users_meta_field`
--
ALTER TABLE `users_meta_field`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `user_discount`
--
ALTER TABLE `user_discount`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `user_tier`
--
ALTER TABLE `user_tier`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_discount_id_foreign` FOREIGN KEY (`discount_id`) REFERENCES `discounts` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_voucher_id_foreign` FOREIGN KEY (`voucher_id`) REFERENCES `vouchers` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_items_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `cart_items_pack_id_foreign` FOREIGN KEY (`pack_id`) REFERENCES `packs` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `collections`
--
ALTER TABLE `collections`
  ADD CONSTRAINT `collections_parent_foreign` FOREIGN KEY (`parent`) REFERENCES `collections` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `essentials`
--
ALTER TABLE `essentials`
  ADD CONSTRAINT `essentials_essential_product_id_foreign` FOREIGN KEY (`essential_product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `essentials_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `galleries_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `history_reward`
--
ALTER TABLE `history_reward`
  ADD CONSTRAINT `history_reward_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `packs`
--
ALTER TABLE `packs`
  ADD CONSTRAINT `packs_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `packs_colors`
--
ALTER TABLE `packs_colors`
  ADD CONSTRAINT `packs_colors_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `packs_colors_pack_id_foreign` FOREIGN KEY (`pack_id`) REFERENCES `packs` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `page_custom_field`
--
ALTER TABLE `page_custom_field`
  ADD CONSTRAINT `page_custom_field_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product_collection`
--
ALTER TABLE `product_collection`
  ADD CONSTRAINT `product_collection_collection_id_foreign` FOREIGN KEY (`collection_id`) REFERENCES `collections` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `product_collection_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rating_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `result_product`
--
ALTER TABLE `result_product`
  ADD CONSTRAINT `result_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `result_product_result_id_foreign` FOREIGN KEY (`result_id`) REFERENCES `lash_guide_result` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `retailers`
--
ALTER TABLE `retailers`
  ADD CONSTRAINT `retailers_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `shipping_address_user`
--
ALTER TABLE `shipping_address_user`
  ADD CONSTRAINT `shipping_address_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `social_user_follow`
--
ALTER TABLE `social_user_follow`
  ADD CONSTRAINT `social_user_follow_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `step_item`
--
ALTER TABLE `step_item`
  ADD CONSTRAINT `step_item_step_id_foreign` FOREIGN KEY (`step_id`) REFERENCES `step_lash` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `users_meta`
--
ALTER TABLE `users_meta`
  ADD CONSTRAINT `users_meta_field_id_foreign` FOREIGN KEY (`field_id`) REFERENCES `users_meta_field` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_meta_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `user_discount`
--
ALTER TABLE `user_discount`
  ADD CONSTRAINT `user_discount_discount_id_foreign` FOREIGN KEY (`discount_id`) REFERENCES `discounts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_discount_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `user_tier`
--
ALTER TABLE `user_tier`
  ADD CONSTRAINT `user_tier_tier_id_foreign` FOREIGN KEY (`tier_id`) REFERENCES `tiers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_tier_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `vouchers`
--
ALTER TABLE `vouchers`
  ADD CONSTRAINT `vouchers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
