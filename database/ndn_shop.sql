-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 13, 2019 lúc 07:55 AM
-- Phiên bản máy phục vụ: 10.1.37-MariaDB
-- Phiên bản PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ndn_shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `avatar`) VALUES
(1, 'Nguyễn Danh Ngọc', 'nguyendanhngocndn@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'https://images.vov.vn/w600/uploaded/frf8b6lqiprwhdtzaag/2018_03_19/messi_argentina_prpo.jpg'),
(2, 'Nguyễn Hưng Dương', 'duong99@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_link` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id`, `name`, `image`, `link`, `order_link`, `status`) VALUES
(19, 'Banner 1', '15287877655440346138810851.jpg', '', 2, 1),
(20, 'Banner 2', '1528789712banner.jpg', 'index.php', 1, 0),
(21, 'Ban 3', '1528789996NoiThatleMotifsBanner03.jpg', '', 1, 1),
(22, 'banner nội thất đẹp', '1531497542xx.jpg', '', 4, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent` int(11) DEFAULT '0',
  `status` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `parent`, `status`) VALUES
(1, 'Nội Thất Phòng Khách', 0, 1),
(2, 'Nội Thất Phòng Ngủ', 0, 1),
(3, 'Nội Thất Nhà Bếp', 0, 1),
(4, 'Nội Thất Phòng Trẻ Em', 0, 1),
(5, 'Nội Thất Phòng Làm Việc', 0, 1),
(6, 'SoFa', 0, 1),
(7, 'Bàn trà, Kệ tivi,Kệ trang trí', 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `phone`, `address`, `password`, `birthday`, `gender`, `status`) VALUES
(10, 'Nguyễn Danh Ngọc ', 'nguyendanhngocndn@gmail.com', '0985846554', 'Hát Môn-Phúc Thọ-Hà Nội', 'a754683ad5d9ca0845666196ec534fc5', '1999-11-14', 0, 1),
(11, 'Ngọc kkk', 'danhngoc19999.vn@gmail.com', '0985846554', 'Hát môn', 'fcea920f7412b5da7be0cf42b8c93759', '1998-02-12', 0, 1),
(12, 'Nguyễn Danh', 'nguyendanhngocnd7n@gmail.com', '0985846554', 'Hát môn', 'fcea920f7412b5da7be0cf42b8c93759', '1999-11-15', 1, 1),
(13, 'Nguyễn Danh Ngọc Hoàng', 'danhngoc19c998.vn@gmail.com', '01679809080', 'Thái Bình', 'fcea920f7412b5da7be0cf42b8c93759', '1999-08-19', 1, 1),
(16, 'Nguyễn Hưng Dương', 'huongml99@gmail.com', '0985846554', 'Hoài Đức B', 'ce41056f70889e432f0696501e7fb86a', '1999-11-15', 1, 1),
(21, 'xssxsxsxsxssxs', 'cgn@gmail.com', '`1234567', 'scdscdcd', '343b1c4a3ea721b2d640fc8700db0f36', '2018-07-10', 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `fullname` varchar(200) DEFAULT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone` varchar(100) NOT NULL,
  `object` varchar(100) NOT NULL,
  `resquest` varchar(500) NOT NULL,
  `createad` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `feedback`
--

INSERT INTO `feedback` (`id`, `fullname`, `Email`, `Phone`, `object`, `resquest`, `createad`) VALUES
(1, 'Nguy?n Danh Ng?c', 'danhngoc1999.vn@gmail.com', '0985846554', 'Thành Viên', 'lol', '2018-07-13 11:32:01'),
(2, 'Nguy?n Danh Ng?c', 'danhngoc99.vn@gmail.com', '0985846554', 'object', 'dddddddddddddd', '2018-07-13 11:32:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `payment_method` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `request` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `name`, `email`, `phone`, `address`, `created`, `payment_method`, `status`, `request`) VALUES
(42, 10, 'Nguyễn Danh Ngọc ', 'nguyendanhngocndn@gmail.com', 'Nguyễn Danh Ngọc ', '', '2018-07-09 16:24:22', 'Thanh Toán Khi Nhận Hàng', 1, ''),
(43, 11, 'Ngọc kkk', 'danhngoc19999.vn@gmail.com', 'Ngọc kkk', 'xx', '2018-07-09 16:25:23', 'Thanh Toán Khi Nhận Hàng', 2, 'x'),
(44, 11, 'Ngọc kkk', 'danhngoc19999.vn@gmail.com', 'Ngọc kkk', 'vv', '2018-07-09 16:26:11', 'Thanh Toán Khi Nhận Hàng', 0, 'vvv'),
(45, 16, 'Nguyễn Hưng Dương', 'huongml99@gmail.com', 'Nguyễn Hưng Dương', 'vvv', '2018-07-10 11:30:12', 'Thanh Toán Qua Thẻ', 2, 'vvvv'),
(46, 10, 'Nguyễn Danh Ngọc ', 'nguyendanhngocndn@gmail.com', 'Nguyễn Danh Ngọc ', '', '2018-07-11 15:22:44', 'Thanh Toán Khi Nhận Hàng', 0, ''),
(47, 10, 'Nguyễn Danh Ngọc ', 'nguyendanhngocndn@gmail.com', 'Nguyễn Danh Ngọc ', 'SAFSDFDSA', '2018-07-11 15:25:26', 'Thanh Toán Qua Thẻ', 1, ''),
(48, 21, 'xssxsxsxsxssxs', 'cgn@gmail.com', 'xssxsxsxsxssxs', '', '2018-07-13 14:42:28', 'Thanh Toán Khi Nhận Hàng', 0, ''),
(49, 21, 'xssxsxsxsxssxs', 'cgn@gmail.com', 'xssxsxsxsxssxs', '', '2018-07-13 14:42:42', 'Thanh Toán Khi Nhận Hàng', 0, 'ko có fid'),
(51, 10, 'Nguyễn Danh Ngọc ', 'nguyendanhngocndn@gmail.com', 'Nguyễn Danh Ngọc ', 'hà tây', '2018-07-13 15:25:43', 'Thanh Toán Khi Nhận Hàng', 0, 'ssssss'),
(52, 10, 'Nguyễn Danh Ngọc ', 'nguyendanhngocndn@gmail.com', 'Nguyễn Danh Ngọc ', 'Thanh Hóa', '2018-07-13 16:16:52', 'Thanh Toán Khi Nhận Hàng', 0, 'nhận hàng rồi trả tiền'),
(53, 10, 'Nguyễn Danh Ngọc ', 'nguyendanhngocndn@gmail.com', 'Nguyễn Danh Ngọc ', 'Thanh Hóa', '2018-07-13 16:17:12', 'Thanh Toán Khi Nhận Hàng', 0, 'nhận hàng rồi trả tiền'),
(54, 10, 'Nguyễn Danh Ngọc ', 'nguyendanhngocndn@gmail.com', 'Nguyễn Danh Ngọc ', '', '2018-07-13 16:21:37', 'Thanh Toán Khi Nhận Hàng', 0, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `quantity` int(11) DEFAULT '0',
  `id` int(11) NOT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`order_id`, `product_id`, `price`, `quantity`, `id`, `total`) VALUES
(42, 44, 876543, 2, 7, 1753086),
(42, 43, 22, 1, 8, 22),
(43, 40, 72999000, 1, 9, 72999000),
(43, 43, 22, 1, 10, 22),
(43, 44, 876543, 1, 11, 876543),
(44, 20, 5000000, 1, 12, 5000000),
(44, 19, 33433300, 1, 13, 33433300),
(44, 21, 5000000, 1, 14, 5000000),
(44, 27, 3222000, 1, 15, 3222000),
(44, 26, 4666000, 2, 16, 9332000),
(45, 27, 3222000, 2, 17, 6444000),
(45, 26, 4666000, 2, 18, 9332000),
(45, 22, 4500000, 2, 19, 9000000),
(45, 21, 5000000, 1, 20, 5000000),
(46, 44, 876543, 1, 21, 876543),
(47, 44, 876543, 2, 22, 1753086),
(48, 44, 876543, 1, 23, 876543),
(49, 44, 876543, 1, 24, 876543),
(51, 49, 5000000, 1, 28, 5000000),
(52, 49, 5000000, 1, 29, 5000000),
(52, 48, 4500000, 1, 30, 4500000),
(52, 47, 6500000, 1, 31, 6500000),
(54, 48, 4500000, 1, 32, 4500000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `price` float DEFAULT '0',
  `sale_price` float DEFAULT '0',
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `image`, `content`, `price`, `sale_price`, `created`, `status`) VALUES
(19, 3, 'Tủ Bếp Gỗ Acrylic', '1531451202phan-loai-tu-bep-theo-hinh-dang-va-cach-ung-dung-nhadepso-10.jpg', '', 5000000, 4500000, '2018-06-13 09:44:10', 1),
(20, 3, 'Tủ Bếp Latemin', '152925794235188967_205645753394195_3822381375722356736_n.jpg', 'Tủ Bếp Latemin cao cấp', 6000000, 5000000, '2018-06-14 10:57:15', 1),
(21, 3, 'Tủ Bếp Gỗ Acrylic', '152894890435195631_205645790060858_5617320011984011264_n.jpg', '', 5500000, 5000000, '2018-06-14 11:01:44', 1),
(22, 3, 'Tủ bếp gỗ xoan đào', '152894898035283640_205645823394188_1393158567573323776_n.jpg', '', 5000000, 4500000, '2018-06-14 11:03:00', 1),
(26, 4, 'Giường tầng gỗ óc chó', '152929208522688871_541604192840284_7173635481920422658_n.jpg', '<span style=\"color: #1d2129; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">Kết hợp các ngăn để đồ cực tiện lợi, thoải mái cho 2-3 trẻ nằm ngủ</span>\"&gt;\"&gt;', 4999000, 4666000, '2018-06-18 10:12:05', 1),
(27, 4, 'Giường tầng gỗ tự nhiên', '1529292153phongtreem1.jpg', '<span class=\"hasCaption\" style=\"font-family: inherit;\">Giường tầng gỗ tự nhiên, sơn màu trắng siêu đáng yêu, và rất tiện lợi nhé</span>\r\n<div id=\"fbPhotoSnowliftCTMButton\" style=\"font-family: Helvetica, Arial, sans-serif; color: #1d2129; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial; display: block; width: 311.389px; padding-top: 16.3889px;\"></div>\r\n\"&gt;', 3555000, 3222000, '2018-06-18 10:13:29', 1),
(28, 4, 'Giường tầng gỗ sồi ', '15292917612001.jpg', '<span class=\"fbPhotosPhotoCaption\" aria-live=\"polite\" data-ft=\"{&quot;tn&quot;:&quot;K&quot;}\" id=\"fbPhotoSnowliftCaption\" style=\"outline: none; display: inline; width: auto; font-size: 14px; line-height: 18px; font-family: Helvetica, Arial, sans-serif; color: #1d2129; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial;\" tabindex=\"0\"><span class=\"hasCaption\" style=\"font-family: inherit;\">Giường tầng gỗ tự nhiên - Thiết kế vừa thân thiện, chắc chắn - Giải pháp tiết kiệm chi phí, không gian và đặc biệt gắn kết tình cảm anh chị em các bé với nhau hơn</span></span>', 7445000, 6999000, '2018-06-18 10:16:01', 1),
(29, 4, 'Giường gỗ xoan đào', '152929191422770522_541605072840196_8949850664071174295_o.jpg', '<span style=\"color: #1d2129; font-family: Helvetica, Arial, sans-serif; font-size: 13px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #eff1f3; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">kích thước tổng, cao 1m7 - ngang 2m45. có 2 loại kích thước cho giường . loại 1: giường dưới sâu 1m4 dài 2m, giường trên sâu 1m2 dài 2m. loại 2: giường dưới sâu 1m2 dài 2m, giường trên sâu 1m dài 2m</span>', 4222000, 3888000, '2018-06-18 10:18:34', 1),
(30, 4, 'Giường tầng gỗ tổng hợp', '152929222222688720_541605122840191_2135694821278578826_n.jpg', 'Giường tầng gỗ tự nhiên màu trắng-hồng cực đáng yêu cho bé<br style=\"color: #1d2129; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial;\"><span style=\"color: #1d2129; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">Với chất liệu gỗ sồi cực kỳ chắn chắn, màu sắc kiểu dáng đáng yêu, tích hợp các ngăn để đồ siêu tiện ích, lại cả cầu trượt ở trong phòng.<span> </span></span><br style=\"color: #1d2129; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial;\"><span style=\"color: #1d2129; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">CÒN CHẦN CHỪ GÌ NỮA, CÁC MẸ HÃY RINH NGAY VỀ CHIẾC GIƯỜNG TẦNG ĐA NĂNG NÀY VỀ CHO GÁI YÊU NHÀ MÌNH NÀO</span>\"&gt;', 2555000, 2333000, '2018-06-18 10:19:31', 1),
(31, 4, 'Giường sinh đôi đáng yêu cho bé gái', '15292927011999.jpg', '<span style=\"color: #1d2129; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">Với chất liệu gỗ sồi cực kỳ chắn chắn, màu sắc kiểu dáng đáng yêu, tích hợp các ngăn để đồ siêu tiện ích,<span></span></span><br style=\"color: #1d2129; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial;\"><span style=\"color: #1d2129; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">CÒN CHẦN CHỪ GÌ NỮA, CÁC MẸ HÃY RINH NGAY VỀ CHIẾC GIƯỜNG TẦNG ĐA NĂNG NÀY VỀ CHO GÁI YÊU NHÀ MÌNH NÀO</span>\"&gt;\"&gt;', 10555000, 9555000, '2018-06-18 10:30:27', 1),
(32, 4, 'Phòng cho bé tinh nghịch', '15292929172-Noi-that-phong-be-gai-10-tuoi-su-dung-giuong-tang.jpg', '<span style=\"color: #000000; font-family: Arial, myrvetica, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">Không gì tuyệt vời hơn khi nhà có hai cô công chúa cá tính, với không gian này hai cô nhóc tinh nghịch có thể tha hồ chơi đồ hàng, sáng tạo với những món đồ xếp hình hoặc chơi đùa với thú nhồi bông ngộ nghĩnh.</span><br style=\"box-sizing: border-box; color: #000000; font-family: Arial, myrvetica, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial;\"><br style=\"box-sizing: border-box; color: #000000; font-family: Arial, myrvetica, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial;\"><span style=\"color: #000000; font-family: Arial, myrvetica, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">Trần nhà được làm thành hình ngôi sao năm cánh và giấy dán tường kẻ sọc màu hồng vô cùng cá tính, một chiếc tủ quần áo khá rộng để chứa những bộ váy, những bộ quần áo  đáng yêu của hai cô nàng.</span><br style=\"box-sizing: border-box; color: #000000; font-family: Arial, myrvetica, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial;\"><br style=\"box-sizing: border-box; color: #000000; font-family: Arial, myrvetica, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial;\"><span style=\"color: #000000; font-family: Arial, myrvetica, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">Các bố mẹ có thấy điểm gì khác biệt không? Chính là chiếc thảm handmade có gắn các chữ cái và số thứ tự dưới sàn nhà để các bé có thể vừa chơi vừa học.</span>', 12555000, 11333000, '2018-06-18 10:35:17', 1),
(33, 4, 'Phòng bé trai sử dụng giường tầng', '15292931511-Noi-that-phong-be-trai-su-dung-giuong-tang.jpg', 'Hai hoàng tử của các bố mẹ sẽ có một không gian thật sự phù hợp vừa chơi vừa học, màu sắc được phối giữa hau tông xanh ngọc và trắng, giá sách và bàn học kết hợp với những món đồ chơi mà chúng yêu thích như bóng rổ, phi tiêu...<br style=\"box-sizing: border-box; color: #000000; font-family: Arial, myrvetica, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial;\"><br style=\"box-sizing: border-box; color: #000000; font-family: Arial, myrvetica, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial;\"><span style=\"color: #000000; font-family: Arial, myrvetica, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">Các bố mẹ có thể kiểm tra chiều cao của các con bằng một mô hình thước đo cực kỳ đáng yêu được gắn trên tường, hoặc có thể cùng các con học chữ cái bằng bảng chữ cái mà các kiến trúc sư gắn lên trên thành giường.</span>\"&gt;', 14666000, 12999000, '2018-06-18 10:38:15', 1),
(34, 4, 'Phòng ngủ cho một hoặc hai bé trai  ', '15292932355-Phong-ngu-cho-1-hoac-2-be-trai.jpg', '<span style=\"color: #000000; font-family: Arial, myrvetica, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">Vì là phòng bé trai nên các món đồ chơi cũng như các hình trang trí trên tường sẽ phải phù hợp với phái mạnh, màu sắc phải phù hợp với độ tuổi của các bé, trẻ trai thường thích những gam màu sáng, tươi phù hợp với sự tinh nghịch của chúng.</span><br style=\"box-sizing: border-box; color: #000000; font-family: Arial, myrvetica, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial;\"><br style=\"box-sizing: border-box; color: #000000; font-family: Arial, myrvetica, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial;\"><span style=\"color: #000000; font-family: Arial, myrvetica, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">Trong mẫu thiết kế này chiếc giường ngủ được tích hợp thêm hai hộc ngăn kéo để cất những món đồ chơi yêu thích của các con, chiếc tủ áo được đặt âm tường tận dụng tối đa không  gian của căn phòng.</span>', 8777000, 8000000, '2018-06-18 10:40:35', 1),
(35, 4, 'Phòng ngủ cho một hoặc hai bé gái', '15292934507-Phong-ngu-cho-1-hoac-2-be-gai.jpg', '<span style=\"color: #000000; font-family: Arial, myrvetica, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">Mẫu thiết kế cực yêu với gam màu hồng kết hợp với màu trắng này luôn luôn được các cô công chúa đặc biệt ưa thích, có lẽ với các bé gái thì màu hồng có gì đó rất lôi cuốn chúng.</span><br style=\"box-sizing: border-box; color: #000000; font-family: Arial, myrvetica, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial;\"><br style=\"box-sizing: border-box; color: #000000; font-family: Arial, myrvetica, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial;\"><span style=\"color: #000000; font-family: Arial, myrvetica, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">Những hộc trang trí tổ ong được gắn lên tường như một hệ giá sách còn tô điểm thêm cho trí tưởng tượng của các con, giấy dán tường được trang trí với hình các con vật đáng yêu, và thú nhồi bông là người bạn không thể thiếu của các bé gái.</span><br style=\"box-sizing: border-box; color: #000000; font-family: Arial, myrvetica, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial;\"><br style=\"box-sizing: border-box; color: #000000; font-family: Arial, myrvetica, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial;\"><span style=\"color: #000000; font-family: Arial, myrvetica, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">Chiếc giường ngủ được tích hợp thêm các khoang ngăn kéo rất tiện dụng để đựng đồ chơi và các vật dụng của các bé.</span>', 15000000, 13555000, '2018-06-18 10:44:10', 1),
(36, 4, ' Phòng ngủ trẻ em với hai giường đơn', '15292936149-Mau-phong-ngu-tre-em-voi-2-giuong-don.jpg', 'Mẫu thiết kế này phù hợp với những trẻ đã lớn tuổi một chút, hai chiếc giường đơn tạo nên sự tự lập và thoải mái riêng tư của từng trẻ.<br style=\"box-sizing: border-box; color: #000000; font-family: Arial, myrvetica, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial;\"><br style=\"box-sizing: border-box; color: #000000; font-family: Arial, myrvetica, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial;\"><span style=\"color: #000000; font-family: Arial, myrvetica, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">Với mẫu thiết kế này tùy vào độ tuổi và giới tính mà các kiến trúc sư sẽ phối màu sắc sao cho phù hợp nhất, và một điều cần thiết nữa là không gian phải đủ rộng để tách thành hai chiếc giường đơn.</span>\"&gt;', 14222000, 13700000, '2018-06-18 10:45:44', 1),
(37, 4, 'Phòng ngủ màu hồng cho bé nhỏ', '15292938271-phong-ngu-tre-em-mau-hong-sang-trong.JPG', 'Màu hồng là gam màu được bố mẹ lựa chọn cho các bé gái, và cũng là gam màu mà các bé gái 8 tuổi yêu thích nhất.\"&gt;', 22444000, 20999000, '2018-06-18 10:49:46', 1),
(38, 1, 'Phòng khách sang trọng', '1529294460496917273872b2a94adaae1dae310a44.jpg', '<span style=\"color: #000000; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">Nội thất phòng khách sang trọng và đẹp mắt. Hãy chăm sóc cho bộ mặt của gia đình bằng cách sắp xếp và trang trí cho phòng khách của mình hoàn hảo để thể hiện sự tôn trọng của mình đối với khách và sự tiện dụng của phòng khách trong việc giải trí và nghỉ ngơi của gia đình bạn</span>', 105000000, 99550000, '2018-06-18 10:57:59', 1),
(40, 1, 'Phòng khách tự nhiên', '1529295413product_1383209227.jpg', '<div style=\"box-sizing: border-box; color: #333333; font-family: Roboto-Regular; font-size: 15px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #f7f7f7; text-decoration-style: initial; text-decoration-color: initial; margin: 0px; padding: 0px;\"> Màu xanh cốm là màu khá sặc sở vì vậy khi thiết kế phòng cách với màu nền này cần xen kẽ với màu trắng để làm dịu đi màu sắc chung. Màu xanh phù hợp với gia chủ thuộc mệnh mộc, hỏa và xung khắc với người mệnh thổ và kim.</div>', 80555000, 72999000, '2018-06-18 11:09:48', 1),
(43, 3, 'Sản phẩm đầy ảnh', '1531451712119.jpg', '', 345555, 22, '2018-07-02 23:44:27', 1),
(44, 6, 'Sản Phẩm Nhiều ẢNH 2', '153061136835144066_2059907267555379_4029366488350588928_n.jpg', 'VVVV', 9876540, 876543, '2018-07-03 16:49:28', 1),
(47, 7, 'Kệ Ti Vi 01', '1531451238ke-tivi-4.jpg', '<b>kệ tivi gỗ</b><span style=\"color: #333333; font-family: arial, helvetica, sans-serif; font-size: medium;\"><b> công nghiệp</b> hay <b>kệ tivi gỗ tự nhiên</b> kiểu dáng  phù hợp, sẽ làm bừng sáng không gian <b>nội thất phòng khách</b> nhà bạn.</span>\r\n<p><span style=\"color: #333333; font-family: arial, helvetica, sans-serif; font-size: medium;\">Đến với <b>Nội thất 5C</b> Quý khách sẽ được tư vấn một cách chi tiết nhất về những sản phẩm kệ tivi chất lượng cao, bền, đẹp với thời gian giúp bạn có những phút giây thoải mái nhất khi ở trong ngôi nhà của mình.</span></p>', 7000000, 6500000, '2018-07-13 10:01:53', 1),
(48, 7, 'Tủ Bếp Gỗ Sồi 01', '1531453348111.jpg', '', 5000000, 4500000, '2018-07-13 10:09:24', 1),
(49, 3, 'Tủ Bếp Gỗ Sồi 02', '1531468852118.jpg', '', 5500000, 5000000, '2018-07-13 15:00:52', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pro_img`
--

CREATE TABLE `pro_img` (
  `id` int(11) NOT NULL,
  `link` varchar(200) DEFAULT NULL,
  `pro_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `pro_img`
--

INSERT INTO `pro_img` (`id`, `link`, `pro_id`) VALUES
(12, '1531450913ccs.jpg', 47),
(13, '1531450913csa.jpg', 47),
(14, '1531450953ccs.jpg', 47),
(15, '1531451238csa.jpg', 47),
(16, '1531451364112.jpg', 48),
(17, '1531451364113.jpg', 48),
(20, '153145171235283640_205645823394188_1393158567573323776_n.jpg', 43),
(23, '1531468852118.jpg', 49),
(26, '1531468886119.jpg', 49);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_orders_customer` (`customer_id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_order_detail_orders` (`order_id`),
  ADD KEY `FK_order_detail_product` (`product_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_product_category` (`category_id`);

--
-- Chỉ mục cho bảng `pro_img`
--
ALTER TABLE `pro_img`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_pro_img_product` (`pro_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `pro_img`
--
ALTER TABLE `pro_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_orders_customer` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `FK_order_detail_orders` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `FK_order_detail_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_product_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Các ràng buộc cho bảng `pro_img`
--
ALTER TABLE `pro_img`
  ADD CONSTRAINT `FK_pro_img_product` FOREIGN KEY (`pro_id`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
