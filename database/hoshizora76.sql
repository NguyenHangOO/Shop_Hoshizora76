-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 04, 2021 lúc 02:43 PM
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
  `email` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `fullname`, `quyen`, `trangthai`, `img`, `email`) VALUES
(1, 'admin', '$2y$10$YM0V4MqCXEXyUOl1ogoFrObXVr5JoZMikLl6FX8/0y5vN33MKtyPe', 'Nguyễn Thị Lệ Hằng', 1, 1, '', ''),
(2, 'nhanvien1', '$2y$10$ZpSNvzWSOymkbDke4v5nU.y7vehwwn/VzFJXC/QriswmDTbgKyO4u', 'Nguyễn Văn A', 0, 1, '', '');

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
  `ngaybl` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `danhgia`
--

INSERT INTO `danhgia` (`id`, `sanpham_id`, `member_id`, `diem`, `binhluan`, `ngaybl`) VALUES
(1, 1, 2, 3.5, '', NULL),
(2, 3, 1, 5, 'Sản phẩm đẹp, tốt.', NULL),
(3, 2, 1, 5, 'Sản phẩm tốt. Hàng chất lượng', NULL),
(4, 1, 1, 4, 'Đẹp, tốt. Gia hàng hơi lâu', NULL),
(5, 5, 1, 5, 'Sản phẩm chất lượng', NULL),
(6, 4, 30, -1, NULL, NULL),
(9, 4, 1, 4.2, NULL, NULL),
(10, 6, 30, 0, NULL, NULL),
(11, 7, 30, 0, NULL, NULL),
(12, 8, 30, 0, NULL, NULL),
(13, 9, 30, 0, NULL, NULL);

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
  `tinh` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `diachi`
--

INSERT INTO `diachi` (`id`, `member_id`, `hoten`, `diachi`, `macdinh`, `sdt`, `xa`, `huyen`, `tinh`) VALUES
(1, 2, 'Nguyễn Văn A', 'Đông Xuyên, Long Xuyên', 1, '0914251234', '', '', ''),
(2, 1, 'Nguyễn Thị B', 'Mỹ Xuyên, Long Xuyên', 1, '0241524251', '', '', ''),
(3, 2, 'Trần Văn C', 'An giang', 0, '0321542152', '', '', ''),
(13, 30, 'Nguyễn Chi Chi', 'Tổ 9', 1, '0374631536', 'Nhơn Hưng', 'Tịnh Biên', 'An Giang'),
(14, 30, 'Nguyen Nguyen', 'Tổ 12', 0, '0210213112', 'Nhơn Hưng', 'Tịnh Biên', 'An Giang');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `diachi_id` int(11) DEFAULT NULL,
  `ngay` datetime NOT NULL DEFAULT current_timestamp(),
  `tongtien` float NOT NULL DEFAULT 0,
  `tinhtrang` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`id`, `member_id`, `diachi_id`, `ngay`, `tongtien`, `tinhtrang`, `ghichu`) VALUES
(1, 1, 1, '2020-11-23 13:38:40', 110000, 'Đã giao', NULL),
(2, 2, 2, '2020-10-24 15:13:10', 310000, 'Đã giao', NULL),
(3, 30, NULL, '2021-10-28 16:22:25', 350000, 'Đã xác nhận', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhangct`
--

CREATE TABLE `donhangct` (
  `id` int(11) NOT NULL,
  `donhang_id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `dongia` float NOT NULL DEFAULT 0,
  `soluong` int(11) NOT NULL DEFAULT 1,
  `thanhtien` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donhangct`
--

INSERT INTO `donhangct` (`id`, `donhang_id`, `sanpham_id`, `dongia`, `soluong`, `thanhtien`) VALUES
(1, 1, 1, 110000, 1, 110000),
(2, 2, 3, 20000, 10, 200000),
(3, 2, 1, 110000, 1, 110000);

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

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`id`, `sanpham_id`, `member_id`, `soluong`) VALUES
(1, 1, 30, -18),
(2, 1, 30, 2),
(5, 9, 30, 2),
(6, 5, 30, 1),
(39, 1, 30, 1),
(40, 8, 30, 1),
(41, 2, 30, -6),
(42, 1, 30, 2),
(43, 1, 30, 12),
(44, 1, 30, 1),
(45, 2, 30, 1),
(46, 2, 30, 6),
(47, 1, 30, 1),
(48, 6, 30, 1);

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
(5, '8/3,20/10', 'fab fa-fly');

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
  `trangthai` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `member`
--

INSERT INTO `member` (`id`, `fullname`, `username`, `password`, `email`, `gioitinh`, `ngaysinh`, `img`, `created`, `trangthai`) VALUES
(1, 'Nguyễn Hằng', 'hangnguyen', '$2y$10$bZynHen2JnIx4QAPMbNsvOemAlhY5b9UTc656urZx0OrcbyYJaDF.', 'nguyenhang@gmail.com', '', NULL, NULL, NULL, 0),
(2, 'AAAA', 'anguyena', '$2y$10$bZynHen2JnIx4QAPMbNsvOemAlhY5b9UTc656urZx0OrcbyYJaDF.', 'anguyena@gmail.com', 'nam', NULL, 'images/20%.png', '2021-10-05 23:05:37', 0),
(30, 'Nguyễn Chi Chi', 'chichi', '$2y$10$IhXMerWqs4k8.aUX/FYul.qal44Utc.x4xC6GG8V1kH.ev3wP.q7y', 'ngchichi2504@gmail.com', 'Nữ', '2000-02-16', './public/images/account/logo.png', '2021-10-25 04:43:37', 1),
(31, 'Ẩn danh', 'andanh', '$2y$10$bZynHen2JnIx4QAPMbNsvOemAlhY5b9UTc656urZx0OrcbyYJaDF.', 'andanh@gmail.com', NULL, NULL, NULL, NULL, 1);

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
  `mota` varchar(500) DEFAULT NULL,
  `danhmuc_id` int(11) NOT NULL,
  `loai1_id` int(11) DEFAULT NULL,
  `loai3_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `tensp`, `giagoc`, `giaban`, `soluong`, `hinhanh`, `luotmua`, `luotxem`, `mota`, `danhmuc_id`, `loai1_id`, `loai3_id`) VALUES
(1, 'Gấu bông quả bơ', 95000, 110000, 10, 'public/images/product/quabo.jpg', 1, 96, 'Quả bơ siêu xing. Bông mềm mượt. Kích thước lớn.', 176520, NULL, NULL),
(2, 'Thiệp chúc mừng 20/10', 12000, 20000, 30, 'public/images/product/thiepmung20-10.jpg', 1, 48, 'Một chiếc thiệp sinh xắn.', 576520, NULL, NULL),
(3, 'Thiệp chúc mừng sinh nhật', 0, 20000, 0, 'public/images/product/thiep-sinh-nhat.jpg', 1, 44, 'Một chiếc thiệp sinh xắn.', 576520, NULL, NULL),
(4, 'Gấu bông cây mầm', 65000, 78000, 20, './public/images/product/caaymam.jpg', 1, 26, 'Chất lượng tốt. Mềm mại, xinh xắn.', 176520, NULL, NULL),
(5, 'Quả cầu tuyết bốn mùa', 70000, 89000, 20, './public/images/product/qct-4mua.jpg', 1, 30, '', 776520, NULL, NULL),
(6, 'Thiệp gửi lời chúc mừng', 20000, 30000, 10, './public/images/product/thiepchucmung.jpg', 1, 3, 'Làm cho lời chúc thêm đẹp. Chất liệu đẹp. Kiểu dáng bắt mắt xinh.\r\nPhù hợp gửi tặng ai đó.', 576520, NULL, NULL),
(7, 'Gấu bông khủng long hồng', 70000, 89000, 20, './public/images/product/khunglonghong.jpg', 1, 21, 'Gấu bông mềm mại, xinh xắn.\r\nMẫu mã đẹp, chất lượng.', 176520, NULL, NULL),
(8, 'Gấu bông con sóc dễ thương', 60000, 70000, 20, './public/images/product/socbong.jpg', 1, 13, 'Hàng chất lượng cao.', 176520, NULL, NULL),
(9, 'Phong cách không khí giáng sinh', NULL, 80000, 0, './public/images/product/noel.jpg', 1, 17, 'Thiết kế đẹp. \r\nQuà tặng giáng sinh.\r\nHàng tự làm. Có thể đặt trước.', 376520, 4, 3);

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

--
-- Đang đổ dữ liệu cho bảng `thongbao`
--

INSERT INTO `thongbao` (`id`, `member_id`, `noidung`, `ngaytb`, `trangthai`) VALUES
(2, 30, 'Đơn hàng của bạn đang giao', '2021-10-24 14:37:16', 'Đã xem'),
(4, 30, 'Đơn hàng của bạn đã hủy', '2021-10-24 13:52:23', 'Đã xem'),
(5, 30, 'Đơn hàng của bạn đã giao thành công', '2021-10-24 13:52:55', 'Đã xem');

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
(1, 1, 'KaKa', 'Việt Nam', 'Vải, bông', 'Hình quả bơ', '1 ngày');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

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
  ADD UNIQUE KEY `username` (`username`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
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
  ADD KEY `sanpham_id` (`sanpham_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=876522;

--
-- AUTO_INCREMENT cho bảng `diachi`
--
ALTER TABLE `diachi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `donhangct`
--
ALTER TABLE `donhangct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `loai1`
--
ALTER TABLE `loai1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `loai3`
--
ALTER TABLE `loai3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `thongtinsp`
--
ALTER TABLE `thongtinsp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD CONSTRAINT `danhgia_ibfk_1` FOREIGN KEY (`sanpham_id`) REFERENCES `sanpham` (`id`) ON UPDATE CASCADE,
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
  ADD CONSTRAINT `sanpham_ibfk_3` FOREIGN KEY (`loai1_id`) REFERENCES `loai1` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sanpham_ibfk_4` FOREIGN KEY (`loai3_id`) REFERENCES `loai3` (`id`) ON UPDATE CASCADE;

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
