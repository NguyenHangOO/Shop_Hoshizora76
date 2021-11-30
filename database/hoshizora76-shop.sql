-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th10 30, 2021 lúc 10:17 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `hoshizora76`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `fullname` varchar(300) NOT NULL,
  `quyen` tinyint(4) NOT NULL,
  `trangthai` tinyint(4) NOT NULL,
  `img` tinytext DEFAULT NULL,
  `email` varchar(300) NOT NULL,
  `_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `fullname`, `quyen`, `trangthai`, `img`, `email`, `_token`) VALUES
(1, 'admin', '$2y$10$5iPcHmMjSdGfzzjh.XfouO5ZPU/tI62VL7jbAVuV6RsKgnSVrEG4W', 'Nguyễn Thị Lệ Hằng', 1, 1, './public/images/account/Anh-avatar-dep-facebook-zalo-cho-nu.jpg', 'hoshizorah76@gmail.com', '9f4e3847f075d1e7'),
(2, 'nhanvien1', '$2y$10$ED00195YLsJWQlH/dTH3ROUHqSXjvwSynK3kOt/ZV.yW/PCpKFuMa', 'Nguyễn Văn A', 0, 1, './public/images/account/anh-avatar-supreme-dep-lam-dai-dien-facebook.jpg', 'nv1@gmail.com', NULL),
(4, 'nhanvien2', '$2y$10$KRnTZtBWeX2P9qRvYJksgue5jiCPHCdpmw2tL/rCdjLSJm98WTkL6', 'Lê Thị C', 2, 1, NULL, 'nv2@gmail.com', NULL),
(5, 'nhanvien3', '$2y$10$C/PTkUkm0/0CxEmNBNc5..kyaR/U87sv0HKyvJYhK2sNSR9FCizGi', 'Trần Văn An', 0, 1, NULL, 'nv3@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgia`
--

CREATE TABLE `danhgia` (
  `id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `diem` float NOT NULL,
  `binhluan` varchar(500) DEFAULT NULL,
  `ngaybl` datetime DEFAULT NULL,
  `donhang_id` int(18) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `danhgia`
--

INSERT INTO `danhgia` (`id`, `sanpham_id`, `member_id`, `diem`, `binhluan`, `ngaybl`, `donhang_id`) VALUES
(73, 53, NULL, 0, NULL, NULL, NULL),
(74, 54, NULL, 0, NULL, NULL, NULL),
(80, 55, NULL, 0, NULL, NULL, NULL),
(92, 56, NULL, 0, NULL, NULL, NULL),
(93, 57, NULL, 0, NULL, NULL, NULL),
(94, 58, NULL, 0, NULL, NULL, NULL),
(95, 59, NULL, 0, NULL, NULL, NULL),
(96, 60, NULL, 0, NULL, NULL, NULL),
(97, 61, NULL, 0, NULL, NULL, NULL),
(98, 62, NULL, 0, NULL, NULL, NULL),
(99, 63, NULL, 0, NULL, NULL, NULL),
(100, 64, NULL, 0, NULL, NULL, NULL),
(101, 65, NULL, 0, NULL, NULL, NULL),
(102, 66, NULL, 0, NULL, NULL, NULL),
(103, 67, NULL, 0, NULL, NULL, NULL),
(104, 68, NULL, 0, NULL, NULL, NULL),
(105, 69, NULL, 0, NULL, NULL, NULL),
(106, 70, NULL, 0, NULL, NULL, NULL),
(107, 71, NULL, 0, NULL, NULL, NULL),
(108, 72, NULL, 0, NULL, NULL, NULL),
(109, 73, NULL, 0, NULL, NULL, NULL),
(110, 74, NULL, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL,
  `tendm` varchar(100) NOT NULL,
  `icon` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `tendm`, `icon`) VALUES
(176520, 'Gấu bông', 'fas fa-paw'),
(276520, 'Trang trí', 'fas fa-holly-berry'),
(376520, 'Handmade', 'fab fa-canadian-maple-leaf'),
(476520, 'Gift Set', 'fas fa-gifts'),
(576520, 'Thiệp', 'fas fa-clipboard'),
(676520, 'Văn phòng/học tập', 'fas fa-laptop-house'),
(776520, 'Quả cầu tuyết', 'fas fa-circle'),
(876520, 'Khác', 'fas fa-fan');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diachi`
--

CREATE TABLE `diachi` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `hoten` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `macdinh` tinyint(4) NOT NULL DEFAULT 1,
  `sdt` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `xa` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `huyen` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tinh` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `chon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id` int(18) NOT NULL,
  `member_id` int(11) NOT NULL,
  `diachi_id` int(11) DEFAULT NULL,
  `ngay` datetime NOT NULL DEFAULT current_timestamp(),
  `tongtien` float NOT NULL DEFAULT 0,
  `tinhtrang` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhangct`
--

CREATE TABLE `donhangct` (
  `id` int(11) NOT NULL,
  `donhang_id` int(18) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `dongia` float NOT NULL DEFAULT 0,
  `soluong` int(11) NOT NULL DEFAULT 1,
  `thanhtien` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donnhap`
--

CREATE TABLE `donnhap` (
  `id` int(18) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `ngaynhap` datetime NOT NULL,
  `tongtien` float NOT NULL DEFAULT 0,
  `ghichu` varchar(500) DEFAULT NULL,
  `tinhtrang` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donnhapchitiet`
--

CREATE TABLE `donnhapchitiet` (
  `id` int(18) NOT NULL,
  `donnhap_id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `dongia` float NOT NULL,
  `soluong` int(11) NOT NULL,
  `thanhtien` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `soluong` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai1`
--

CREATE TABLE `loai1` (
  `id` int(11) NOT NULL,
  `tenloai` varchar(100) NOT NULL,
  `icon` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `loai1`
--

INSERT INTO `loai1` (`id`, `tenloai`, `icon`) VALUES
(1, 'Vòng tay', 'fas fa-circle-notch'),
(2, 'Origami 3D', 'fas fa-cube'),
(3, 'Móc khóa', 'fas fa-star-and-crescent'),
(4, 'Khác', 'fas fa-fan');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai3`
--

CREATE TABLE `loai3` (
  `id` int(11) NOT NULL,
  `tenloai` varchar(100) NOT NULL,
  `icon` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `loai3`
--

INSERT INTO `loai3` (`id`, `tenloai`, `icon`) VALUES
(1, 'Valentine', 'fas fa-heartbeat'),
(2, 'Halloween', 'fas fa-hat-wizard'),
(3, 'Noel', 'fas fa-snowman'),
(4, 'Brithday', 'fas fa-birthday-cake'),
(12, '8/03, 20/10', 'fab fa-fly');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(300) NOT NULL,
  `email` varchar(500) NOT NULL,
  `gioitinh` varchar(3) DEFAULT NULL,
  `ngaysinh` date DEFAULT NULL,
  `img` tinytext DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `trangthai` tinyint(4) NOT NULL,
  `_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `tensp` varchar(200) NOT NULL,
  `giagoc` float DEFAULT NULL,
  `giaban` float NOT NULL,
  `soluong` int(11) NOT NULL,
  `hinhanh` tinytext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `luotmua` int(11) DEFAULT NULL,
  `luotxem` int(11) DEFAULT NULL,
  `mota` varchar(2000) DEFAULT NULL,
  `danhmuc_id` int(11) NOT NULL,
  `loai1_id` int(11) DEFAULT NULL,
  `loai3_id` int(11) DEFAULT NULL,
  `ttban` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `tensp`, `giagoc`, `giaban`, `soluong`, `hinhanh`, `luotmua`, `luotxem`, `mota`, `danhmuc_id`, `loai1_id`, `loai3_id`, `ttban`) VALUES
(53, 'Gấu bông quả bơ', 76000, 82000, 21, './public/images/product/quabo.jpg', 5, 9, 'Gấu bông trái bơ nhỏ giá rẻ cho bé tròn xinh cute size 35cm\r\n\r\nGấu bông quả bơ đang là một trong những lựa chọn hàng đầu của các bạn trẻ bởi thiết kế đáng yêu, màu sắc tươi mới, an toàn cho trẻ nhỏ rất phù hợp để làm món quà những người thân yêu của bạn\r\n- Chất vải: quả bơ bông chất liệu cao cấp siêu mềm mịn\r\n- Có thể giặt sạch trong quá trình sử dụng\r\n\r\nKÍCH THƯỚC: size 25cm - 35cm - 50cm', 176520, NULL, NULL, 1),
(54, 'Gấu bông khủng long hồng', 88000, 95000, 28, './public/images/product/khunglonghong.jpg', 6, 1, 'ƯU ĐIỂM CỦA SẢN PHẨM: Gấu Bông Hình Thú khủng Long Mắt Lồi\r\nGấu Bông Gối Ôm Khủng Long Đuôi Tim là dòng sản phẩm cao cấp, vỏ nhung mềm mịn co dãn 4 chiều êm ái tạo cảm giác dễ chịu cho người dùng, bông nhồi bên trong 100% là bông gòn 3D trắng tinh khiết loại 1, độ đàn hồi tốt.  Không bị rụng lông trong quá trình sử dụng - có thể giặt sạch trong quá trình sử dụng. Sản phẩm cao cấp chính hãng bền đẹp, an toàn sức khỏe. ', 176520, NULL, NULL, 1),
(55, 'Combo 2 túi quà Halloween bí ngô', 56000, 76000, 20, './public/images/product/tuiqua.png', 4, 5, 'Cho kẹo hay là bị ghẹo.', 476520, NULL, 1, 1),
(56, 'Gấu bông sóc dễ thương', 56000, 75000, 25, './public/images/product/socbong.jpg', 0, 0, '', 176520, NULL, NULL, 1),
(57, 'Gấu bông cây mầm', 75000, 89000, 20, './public/images/product/caaymam.jpg', 0, 0, '', 176520, NULL, NULL, 1),
(58, 'Quả cầu tuyết hình chiếc thuyền', 89000, 99000, 22, './public/images/product/qct-thuyen.jfif', 0, 2, '', 776520, NULL, NULL, 1),
(59, 'Quả cầu tuyết bốn mùa', 92000, 109000, 36, './public/images/product/qct-4mua.jpg', 0, 2, '', 776520, NULL, NULL, 1),
(60, 'Thiệp chúc mừng sinh nhật', 25000, 30000, 10, './public/images/product/thiep-sinh-nhat.jpg', 0, 0, '', 576520, NULL, 4, 1),
(61, 'Thiệp mừng 20-11', 25000, 30000, 10, './public/images/product/thiepmung20-10.jpg', 0, 0, '', 576520, NULL, NULL, 1),
(62, 'Thiệp chúc mừng', 20000, 28000, 10, './public/images/product/thiepchucmung.jpg', 0, 0, '', 576520, NULL, NULL, 1),
(63, 'Sét 10 quả bí ngô đồ chơi', 36000, 42000, 20, './public/images/product/10 quabi.jpeg', 0, 1, '', 476520, NULL, 2, 1),
(64, 'Sét 2 hộp quà noel', 80000, 88000, 10, './public/images/product/set2hop.jpg', 0, 1, '', 476520, NULL, 3, 1),
(65, 'Giỏ đựng bút', 20000, 25000, 36, './public/images/product/147b1b3c229ed252037b022e9636e095.jfif', 0, 0, '', 676520, NULL, NULL, 1),
(66, 'Sét quà 20-10 gấu tím', 105000, 129000, 36, './public/images/product/set-qua-20-10-gau.jpg', 0, 1, '', 476520, NULL, 12, 1),
(67, 'Tủ đựng bút, giấy tờ', 150000, 175000, 20, './public/images/product/2a0ffcde5ad3b64ecc65d070ca8f20dc.jpg', 0, 0, '', 676520, NULL, NULL, 1),
(68, 'Sét quà giáng sinh', 20000, 229000, 25, './public/images/product/8f21a080c80e3e220914bae865b33460.jpg', 0, 1, '', 476520, NULL, 3, 1),
(69, 'Bút ký cao cấp', 56000, 79000, 20, './public/images/product/butkycaocap1.png', 0, 0, '', 676520, NULL, NULL, 1),
(70, 'Bộ quà tặng văn phòng - đỏ', 170000, 190000, 10, './public/images/product/bộ-quà-tặng-văn-phòng-2.jpg', 0, 0, '', 676520, NULL, NULL, 1),
(71, 'Dây chuyền bí ngô', 35000, 39000, 10, './public/images/product/đaychuyenbi.jpg', 0, 0, '', 876520, NULL, 2, 1),
(72, 'Bộ 3 ông già noel', 100000, 109000, 15, './public/images/product/noel2.png', 0, 0, '', 476520, NULL, 3, 1),
(73, 'Bộ quà tặng son', 200000, 250000, 25, './public/images/product/set-val2.jfif', 0, 0, '', 476520, NULL, 1, 1),
(74, 'Combo 2 vô diện', 50000, 55000, 20, './public/images/product/vodien.jpg', 0, 0, '', 476520, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongbao`
--

CREATE TABLE `thongbao` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `noidung` varchar(500) NOT NULL,
  `ngaytb` datetime NOT NULL,
  `trangthai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `thongke`
-- (See below for the actual view)
--
CREATE TABLE `thongke` (
`id` int(18)
,`day` date
,`soluongban` decimal(32,0)
,`tongtien` float
,`tinhtrang` varchar(50)
);

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `thongkeban`
-- (See below for the actual view)
--
CREATE TABLE `thongkeban` (
`ngay` date
,`donhang` bigint(21)
,`doanhthu` double
,`slg` decimal(54,0)
);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongtinsp`
--

CREATE TABLE `thongtinsp` (
  `id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `thuonghieu` varchar(200) DEFAULT NULL,
  `xuatxu` varchar(200) DEFAULT NULL,
  `chatlieu` varchar(300) DEFAULT NULL,
  `kieudang` varchar(300) DEFAULT NULL,
  `baohanh` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `thongtinsp`
--

INSERT INTO `thongtinsp` (`id`, `sanpham_id`, `thuonghieu`, `xuatxu`, `chatlieu`, `kieudang`, `baohanh`) VALUES
(6, 53, 'Hangnguyen', 'Việt Nam', 'Bông, vải', 'Hình quả bơ', ''),
(7, 54, 'Hangnguyen', 'Việt Nam', 'Bông, vải', 'Hình con khủng long', '');

-- --------------------------------------------------------

--
-- Cấu trúc cho view `thongke`
--
DROP TABLE IF EXISTS `thongke`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `thongke`  AS SELECT `dh`.`id` AS `id`, cast(`dh`.`ngay` as date) AS `day`, sum(`ct`.`soluong`) AS `soluongban`, `dh`.`tongtien` AS `tongtien`, `dh`.`tinhtrang` AS `tinhtrang` FROM (`donhang` `dh` join `donhangct` `ct`) WHERE `ct`.`donhang_id` = `dh`.`id` GROUP BY `ct`.`donhang_id` ;

-- --------------------------------------------------------

--
-- Cấu trúc cho view `thongkeban`
--
DROP TABLE IF EXISTS `thongkeban`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `thongkeban`  AS SELECT `thongke`.`day` AS `ngay`, count(`thongke`.`id`) AS `donhang`, sum(`thongke`.`tongtien`) AS `doanhthu`, sum(`thongke`.`soluongban`) AS `slg` FROM `thongke` WHERE `thongke`.`tinhtrang` not in ('Xử lý','Đã hủy') GROUP BY `thongke`.`day` ;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sanpham_id` (`sanpham_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `diachi`
--
ALTER TABLE `diachi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pk-dc-mem` (`member_id`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_id` (`member_id`);

--
-- Chỉ mục cho bảng `donhangct`
--
ALTER TABLE `donhangct`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donhang_id` (`donhang_id`),
  ADD KEY `sanpham_id` (`sanpham_id`);

--
-- Chỉ mục cho bảng `donnhap`
--
ALTER TABLE `donnhap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Chỉ mục cho bảng `donnhapchitiet`
--
ALTER TABLE `donnhapchitiet`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sanpham_id` (`sanpham_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Chỉ mục cho bảng `loai1`
--
ALTER TABLE `loai1`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loai3`
--
ALTER TABLE `loai3`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tensp` (`tensp`),
  ADD KEY `danhmuc_id` (`danhmuc_id`),
  ADD KEY `loai1_id` (`loai1_id`),
  ADD KEY `loai3_id` (`loai3_id`);

--
-- Chỉ mục cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_id` (`member_id`);

--
-- Chỉ mục cho bảng `thongtinsp`
--
ALTER TABLE `thongtinsp`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `sanpham_id_2` (`sanpham_id`),
  ADD KEY `sanpham_id` (`sanpham_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=876522;

--
-- AUTO_INCREMENT cho bảng `diachi`
--
ALTER TABLE `diachi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `donhangct`
--
ALTER TABLE `donhangct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT cho bảng `donnhapchitiet`
--
ALTER TABLE `donnhapchitiet`
  MODIFY `id` int(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT cho bảng `loai1`
--
ALTER TABLE `loai1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `loai3`
--
ALTER TABLE `loai3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT cho bảng `thongtinsp`
--
ALTER TABLE `thongtinsp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD CONSTRAINT `danhgia_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `diachi`
--
ALTER TABLE `diachi`
  ADD CONSTRAINT `pk-dc-mem` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `donhangct`
--
ALTER TABLE `donhangct`
  ADD CONSTRAINT `donhangct_ibfk_2` FOREIGN KEY (`sanpham_id`) REFERENCES `sanpham` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `donhangct_ibfk_3` FOREIGN KEY (`donhang_id`) REFERENCES `donhang` (`id`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `giohang_ibfk_2` FOREIGN KEY (`sanpham_id`) REFERENCES `sanpham` (`id`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`danhmuc_id`) REFERENCES `danhmuc` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sanpham_ibfk_3` FOREIGN KEY (`loai1_id`) REFERENCES `loai1` (`id`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  ADD CONSTRAINT `pk_tb-mem` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `thongtinsp`
--
ALTER TABLE `thongtinsp`
  ADD CONSTRAINT `pk_sp_tt` FOREIGN KEY (`sanpham_id`) REFERENCES `sanpham` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
