-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 27, 2023 lúc 07:17 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `websitelaptrinh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_baiviet_tags`
--

CREATE TABLE `tb_baiviet_tags` (
  `id_baiviet` int(30) NOT NULL,
  `id_tag` int(30) NOT NULL,
  `id_baiviet_tag` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_baiviet_tags`
--

INSERT INTO `tb_baiviet_tags` (`id_baiviet`, `id_tag`, `id_baiviet_tag`) VALUES
(13, 11, 1),
(14, 4, 2),
(12, 3, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_bai_viet`
--

CREATE TABLE `tb_bai_viet` (
  `id_baiviet` int(11) NOT NULL,
  `id_taikhoan` int(11) DEFAULT NULL,
  `id_tag` int(11) NOT NULL,
  `noidung_baivet` text DEFAULT NULL,
  `ten_baiviet` text DEFAULT NULL,
  `mota_baiviet` text DEFAULT NULL,
  `ngaydang_baiviet` datetime DEFAULT NULL,
  `anh_baiviet` text DEFAULT NULL,
  `xoa_baiviet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_bai_viet`
--

INSERT INTO `tb_bai_viet` (`id_baiviet`, `id_taikhoan`, `id_tag`, `noidung_baivet`, `ten_baiviet`, `mota_baiviet`, `ngaydang_baiviet`, `anh_baiviet`, `xoa_baiviet`) VALUES
(12, 1, 1, '<p><span style=\"font-size:22px\"><strong>Kh&oacute;a học lập tr&igrave;nh cơ bản</strong></span></p>\r\n\r\n<ol>\r\n	<li><span style=\"font-size:14px\">CSS cơ bản</span></li>\r\n</ol>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost:3000/354c8dd2-c008-4689-8b92-9edb2c209966\" width=\"900\" />\r\n<figcaption>H&igrave;nh 1</figcaption>\r\n</figure>\r\n\r\n<ol>\r\n	<li><span style=\"font-size:14px\">JS cở bản</span></li>\r\n</ol>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost:3000/6d958f8e-4099-4cf4-892b-f54bc0e10c31\" width=\"900\" />\r\n<figcaption>H&igrave;nh 2</figcaption>\r\n</figure>\r\n\r\n<p><span style=\"color:#3498db\">eqweqw</span> <span style=\"background-color:#9b59b6\">qư eqw eqw</span> <span style=\"color:#e74c3c\">eqw eqw</span> <span style=\"color:#e67e22\">eqwe </span><span style=\"background-color:#9b59b6\">qwe qư</span> <span style=\"color:#27ae60\">eqwe qư</span></p>\r\n', 'Lập trình frontend cơ bản', 'Khóa học lập trình này giúp các bạn hiểu thêm về lập trình frontend ', '2023-10-18 13:22:53', 'PxVbAixnXdvS5W5dCrDO.png', 0),
(13, 1, 5, '<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost:3000/abda1ce9-9588-4449-9fde-a0b8df8c5f6c\" width=\"753\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>&nbsp;</p>\r\n', 'Design trong công nghệ thông tin', ' bài viết này giúp các bạn hiểu thêm về desing trong công nghệ thông tin hiểu thêm về các thành phần cơ bản của design', '2023-10-26 13:32:43', 'thumb-5.png', 0),
(14, 1, 1, '<p>33</p>\r\n', '123', ' 22', '2023-11-22 13:47:58', 'wEqLAPju81ZD1np0inke.jpg', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_binh_luan`
--

CREATE TABLE `tb_binh_luan` (
  `id_binhluan` int(100) NOT NULL,
  `id_baiviet` int(100) DEFAULT NULL,
  `id_hoclieu` int(11) DEFAULT NULL,
  `id_taikhoan` int(100) NOT NULL,
  `noidung_binhluan` text NOT NULL,
  `ngay_binhluan` datetime NOT NULL,
  `xoa_binhluan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_cms_tai_khoan`
--

CREATE TABLE `tb_cms_tai_khoan` (
  `id_cms_taikhoan` int(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `ten_hien_thi` varchar(50) NOT NULL,
  `mat_khau` varchar(50) NOT NULL,
  `ngay_sinh` date NOT NULL,
  `doi_tuong` int(11) NOT NULL,
  `gioi_tinh` int(11) NOT NULL,
  `sdt` int(11) NOT NULL,
  `hinh_anh` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_cms_tai_khoan`
--

INSERT INTO `tb_cms_tai_khoan` (`id_cms_taikhoan`, `email`, `ten_hien_thi`, `mat_khau`, `ngay_sinh`, `doi_tuong`, `gioi_tinh`, `sdt`, `hinh_anh`) VALUES
(1, 'huylohb123@gmail.com', 'huylohb123', 'huylohb123', '2023-10-03', 0, 1, 378452231, '77Ufi98pdK6TBvESPr0f.jpg'),
(6, 'huylohb1234@gmail.com', 'pham huu quan', 'huylohb123', '2001-11-11', 1, 1, 21321321, 'enwRZWMlgAU1gBvTAF9g.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_hoc_lieu`
--

CREATE TABLE `tb_hoc_lieu` (
  `id_hoclieu` int(100) NOT NULL,
  `id_khoahoc` int(100) NOT NULL,
  `ten_hoclieu` varchar(50) NOT NULL,
  `anh_hoclieu` text DEFAULT NULL,
  `file_hoclieu` text CHARACTER SET utf32 COLLATE utf32_unicode_520_ci DEFAULT NULL,
  `ngaydang_hoclieu` datetime NOT NULL,
  `mota_hoclieu` text DEFAULT NULL,
  `trangthai_hoclieu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_hoc_lieu`
--

INSERT INTO `tb_hoc_lieu` (`id_hoclieu`, `id_khoahoc`, `ten_hoclieu`, `anh_hoclieu`, `file_hoclieu`, `ngaydang_hoclieu`, `mota_hoclieu`, `trangthai_hoclieu`) VALUES
(8, 5, 'ưqeqweqw', 'eqweqwe', 'eqweqw', '2023-10-24 01:00:00', 'qưeqwe', 'Mở khóa'),
(14, 8, 'đã sửa', '1697618028618.jpg', NULL, '0000-00-00 00:00:00', 'học liệu sửa', 'Mở khóa');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_khoahoc_damua`
--

CREATE TABLE `tb_khoahoc_damua` (
  `id_khoahoc_damua` int(11) NOT NULL,
  `id_khoahoc` int(11) NOT NULL,
  `id_taikhoan` int(11) NOT NULL,
  `ngay_mua` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_khoa_hoc`
--

CREATE TABLE `tb_khoa_hoc` (
  `id_khoahoc` int(100) NOT NULL,
  `id_taikhoan` int(100) NOT NULL,
  `ten_khoahoc` varchar(50) NOT NULL,
  `anh_khoahoc` text CHARACTER SET utf32 COLLATE utf32_unicode_520_ci DEFAULT NULL,
  `mota_khoahoc` text DEFAULT NULL,
  `gia_khoahoc` decimal(10,0) DEFAULT NULL,
  `ngaydang_khoahoc` datetime NOT NULL,
  `trangthai_khoahoc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_khoa_hoc`
--

INSERT INTO `tb_khoa_hoc` (`id_khoahoc`, `id_taikhoan`, `ten_khoahoc`, `anh_khoahoc`, `mota_khoahoc`, `gia_khoahoc`, `ngaydang_khoahoc`, `trangthai_khoahoc`) VALUES
(5, 6, 'CSS cở bản', '1697009446588.png', 'Sau series HTML cơ bản dành cho người mới thì bây giờ mình lại tiếp tục tới một series cơ bản khác đó chính là CSS cơ bản.', NULL, '2023-10-19 18:37:23', 'Mở khóa'),
(8, 1, 'new', '1697017882898.png', 'new', NULL, '2023-10-18 14:27:13', 'Mở khóa'),
(9, 1, 'new', '1697017970251.png', 'new ', NULL, '2023-10-18 15:31:54', 'Mở khóa');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_lienhe`
--

CREATE TABLE `tb_lienhe` (
  `id_lienhe` int(11) NOT NULL,
  `Ho_ten` varchar(50) NOT NULL,
  `E_mail` varchar(50) NOT NULL,
  `So_dien_thoai` varchar(15) NOT NULL,
  `Noi_dung` varchar(200) NOT NULL,
  `Ngay_lienhe` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_lienhe`
--

INSERT INTO `tb_lienhe` (`id_lienhe`, `Ho_ten`, `E_mail`, `So_dien_thoai`, `Noi_dung`, `Ngay_lienhe`) VALUES
(1, 'trt', 'bbb@gmail.com', '53563', 'gsdgd', '0000-00-00 00:00:00'),
(2, 'vvvv', 'sds@gmail.com', '34141', 'đffađc', '0000-00-00 00:00:00'),
(3, 'pppp', 'sds@gmail.com', '57575', 'ddđ', '2023-10-17 22:30:22'),
(4, 'phamhong', 'uuuu@gmail.com', '4243', 'ddaaaa', '2023-10-17 22:30:48'),
(5, 'phamhong', 'uuuu@gmail.com', '4243', 'ddaaaa', '2023-10-17 22:34:58'),
(6, 'vvvv', 'bbb@gmail.com', '5454', 'gg', '2023-10-17 22:35:36'),
(7, 'vvvv', 'bbb@gmail.com', '565', 'mmmm', '2023-10-17 22:35:55'),
(8, 'vvvv', 'bbb@gmail.com', '565', 'mmmm', '2023-10-17 22:37:04'),
(9, 'vvvv', 'bbb@gmail.com', '43424', 'dfđgd', '2023-10-17 22:37:12'),
(10, 'EQWE', 'huuquan18@gmail.com', '3123213', '312123', '2023-10-17 22:54:57'),
(11, 'EQWE', 'huuquan18@gmail.com', '3123213', '312123', '2023-10-17 22:55:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_tag`
--

CREATE TABLE `tb_tag` (
  `id_tag` int(11) NOT NULL,
  `ten_tag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_tag`
--

INSERT INTO `tb_tag` (`id_tag`, `ten_tag`) VALUES
(1, 'Frontend'),
(2, 'Backend'),
(3, 'Development'),
(4, 'Business'),
(5, 'Design'),
(6, 'Software'),
(7, 'HTML'),
(8, 'CSS'),
(9, 'Javascript'),
(10, 'React'),
(11, 'Bootstrap');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_tai_khoan`
--

CREATE TABLE `tb_tai_khoan` (
  `id_taikhoan` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ten_hien_thi` varchar(255) NOT NULL,
  `mat_khau` varchar(50) NOT NULL,
  `doi_tuong` int(1) NOT NULL DEFAULT 0,
  `ngay_sinh` date DEFAULT NULL,
  `gioi_tinh` int(4) NOT NULL DEFAULT -1,
  `sdt` varchar(12) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL,
  `hinh_anh` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_tai_khoan`
--

INSERT INTO `tb_tai_khoan` (`id_taikhoan`, `email`, `ten_hien_thi`, `mat_khau`, `doi_tuong`, `ngay_sinh`, `gioi_tinh`, `sdt`, `hinh_anh`) VALUES
(2, 'hb@gmail.com', 'admin', '12345678', 1, '0000-00-00', 0, '', 'pic-3.jpg'),
(20, 'hbhb1234@gmail.com', 'Pham huu quan', 'huylohb123', 1, '2001-11-11', 0, '0378452231', '1BgfJUX6o2NgwiBxoYdo.png'),
(21, 'Hongngoc@gmail.com', 'Hồng Ngọc', '123456@', 1, '2023-10-10', 1, '0123454567', 'ZzkRwsZMUFjl1gHimWam.'),
(22, 'hanhit123@gmail.com', 'Nguyen Thi Hanh', 'hanhit123@', 1, '2023-10-18', 1, '1234567', 'xPYdqUJuJj73GkqRKMey.jpg'),
(23, 'hb@gmail.com', 'admin', '12345678', 1, '0000-00-00', 0, '04154687687', 'pic-2.jpg'),
(24, 'huuquan432@gmail.com', 'huylohb123', 'huylohb123', 1, '2023-10-13', 1, '0378452231', 'kp1tMM3njZbN2Rv9P5Ue.jpg'),
(25, 'huuquan18@gmail.com', 'pham huu quan', 'huylohb123', 1, '2001-11-11', 0, '0378452231', 'oJORy3mmZSSgYWEEKYdk.docx');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_thanhtoan`
--

CREATE TABLE `tb_thanhtoan` (
  `id_thanhtoan` int(11) NOT NULL,
  `id_khoahoc` int(11) NOT NULL,
  `id_taikhoan` int(11) NOT NULL,
  `so_tien` decimal(10,0) NOT NULL,
  `trangthai_thanhtoan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_thichbaiviet`
--

CREATE TABLE `tb_thichbaiviet` (
  `id_thichbaiviet` int(11) NOT NULL,
  `id_baiviet` int(11) NOT NULL,
  `id_taikhoan` int(11) NOT NULL,
  `ngay_thich_baiviet` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_thichbaiviet`
--

INSERT INTO `tb_thichbaiviet` (`id_thichbaiviet`, `id_baiviet`, `id_taikhoan`, `ngay_thich_baiviet`) VALUES
(33, 12, 22, '2023-10-26 13:46:37'),
(34, 13, 22, '2023-10-26 14:42:10'),
(35, 12, 20, '2023-11-08 13:34:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_thichbinhluan`
--

CREATE TABLE `tb_thichbinhluan` (
  `id_thichbinhluan` int(11) NOT NULL,
  `id_binhluan` int(11) NOT NULL,
  `id_taikhoan` int(11) NOT NULL,
  `ngay_thich_binhluan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_thichhoclieu`
--

CREATE TABLE `tb_thichhoclieu` (
  `id_thichhoclieu` int(11) NOT NULL,
  `id_hoclieu` int(11) NOT NULL,
  `id_taikhoan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_thichhoclieu`
--

INSERT INTO `tb_thichhoclieu` (`id_thichhoclieu`, `id_hoclieu`, `id_taikhoan`) VALUES
(1, 8, 2),
(2, 8, 22),
(3, 8, 21);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tb_baiviet_tags`
--
ALTER TABLE `tb_baiviet_tags`
  ADD PRIMARY KEY (`id_baiviet_tag`),
  ADD KEY `baiviettag_baiviet` (`id_baiviet`),
  ADD KEY `baiviettag_tag` (`id_tag`);

--
-- Chỉ mục cho bảng `tb_bai_viet`
--
ALTER TABLE `tb_bai_viet`
  ADD PRIMARY KEY (`id_baiviet`),
  ADD KEY `baiviet_taikhoan` (`id_taikhoan`),
  ADD KEY `baiviet_tag` (`id_tag`);

--
-- Chỉ mục cho bảng `tb_binh_luan`
--
ALTER TABLE `tb_binh_luan`
  ADD PRIMARY KEY (`id_binhluan`),
  ADD KEY `binhluan_baiviet` (`id_baiviet`),
  ADD KEY `binhluan_taikhoan` (`id_taikhoan`),
  ADD KEY `binhluan_hoclieu` (`id_hoclieu`);

--
-- Chỉ mục cho bảng `tb_cms_tai_khoan`
--
ALTER TABLE `tb_cms_tai_khoan`
  ADD PRIMARY KEY (`id_cms_taikhoan`);

--
-- Chỉ mục cho bảng `tb_hoc_lieu`
--
ALTER TABLE `tb_hoc_lieu`
  ADD PRIMARY KEY (`id_hoclieu`),
  ADD KEY `hoclieu_khoahoc` (`id_khoahoc`);

--
-- Chỉ mục cho bảng `tb_khoahoc_damua`
--
ALTER TABLE `tb_khoahoc_damua`
  ADD PRIMARY KEY (`id_khoahoc_damua`),
  ADD KEY `khoahocdamua_khoahoc` (`id_khoahoc`),
  ADD KEY `khoahocdamua_taikhoan` (`id_taikhoan`);

--
-- Chỉ mục cho bảng `tb_khoa_hoc`
--
ALTER TABLE `tb_khoa_hoc`
  ADD PRIMARY KEY (`id_khoahoc`),
  ADD KEY `khoahoc_taikhoan` (`id_taikhoan`);

--
-- Chỉ mục cho bảng `tb_lienhe`
--
ALTER TABLE `tb_lienhe`
  ADD PRIMARY KEY (`id_lienhe`);

--
-- Chỉ mục cho bảng `tb_tag`
--
ALTER TABLE `tb_tag`
  ADD PRIMARY KEY (`id_tag`);

--
-- Chỉ mục cho bảng `tb_tai_khoan`
--
ALTER TABLE `tb_tai_khoan`
  ADD PRIMARY KEY (`id_taikhoan`);

--
-- Chỉ mục cho bảng `tb_thanhtoan`
--
ALTER TABLE `tb_thanhtoan`
  ADD PRIMARY KEY (`id_thanhtoan`),
  ADD KEY `thanhtoan_khoahoc` (`id_khoahoc`),
  ADD KEY `thanhtoan_taikhoan` (`id_taikhoan`);

--
-- Chỉ mục cho bảng `tb_thichbaiviet`
--
ALTER TABLE `tb_thichbaiviet`
  ADD PRIMARY KEY (`id_thichbaiviet`),
  ADD KEY `thichbaiviet_baiviet` (`id_baiviet`),
  ADD KEY `thichbaiviet_taikhoan` (`id_taikhoan`);

--
-- Chỉ mục cho bảng `tb_thichbinhluan`
--
ALTER TABLE `tb_thichbinhluan`
  ADD PRIMARY KEY (`id_thichbinhluan`),
  ADD KEY `thichbinhluan_binhluan` (`id_binhluan`),
  ADD KEY `thichbinhluan_taikhoan` (`id_taikhoan`);

--
-- Chỉ mục cho bảng `tb_thichhoclieu`
--
ALTER TABLE `tb_thichhoclieu`
  ADD PRIMARY KEY (`id_thichhoclieu`),
  ADD KEY `thichhoclieu_hoclieu` (`id_hoclieu`),
  ADD KEY `thichhoclieu_taikhoan` (`id_taikhoan`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tb_baiviet_tags`
--
ALTER TABLE `tb_baiviet_tags`
  MODIFY `id_baiviet_tag` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tb_bai_viet`
--
ALTER TABLE `tb_bai_viet`
  MODIFY `id_baiviet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `tb_binh_luan`
--
ALTER TABLE `tb_binh_luan`
  MODIFY `id_binhluan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tb_cms_tai_khoan`
--
ALTER TABLE `tb_cms_tai_khoan`
  MODIFY `id_cms_taikhoan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tb_hoc_lieu`
--
ALTER TABLE `tb_hoc_lieu`
  MODIFY `id_hoclieu` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `tb_khoahoc_damua`
--
ALTER TABLE `tb_khoahoc_damua`
  MODIFY `id_khoahoc_damua` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tb_khoa_hoc`
--
ALTER TABLE `tb_khoa_hoc`
  MODIFY `id_khoahoc` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tb_lienhe`
--
ALTER TABLE `tb_lienhe`
  MODIFY `id_lienhe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `tb_tag`
--
ALTER TABLE `tb_tag`
  MODIFY `id_tag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `tb_tai_khoan`
--
ALTER TABLE `tb_tai_khoan`
  MODIFY `id_taikhoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `tb_thanhtoan`
--
ALTER TABLE `tb_thanhtoan`
  MODIFY `id_thanhtoan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tb_thichbaiviet`
--
ALTER TABLE `tb_thichbaiviet`
  MODIFY `id_thichbaiviet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `tb_thichbinhluan`
--
ALTER TABLE `tb_thichbinhluan`
  MODIFY `id_thichbinhluan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tb_thichhoclieu`
--
ALTER TABLE `tb_thichhoclieu`
  MODIFY `id_thichhoclieu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tb_baiviet_tags`
--
ALTER TABLE `tb_baiviet_tags`
  ADD CONSTRAINT `baiviettag_baiviet` FOREIGN KEY (`id_baiviet`) REFERENCES `tb_bai_viet` (`id_baiviet`),
  ADD CONSTRAINT `baiviettag_tag` FOREIGN KEY (`id_tag`) REFERENCES `tb_tag` (`id_tag`);

--
-- Các ràng buộc cho bảng `tb_bai_viet`
--
ALTER TABLE `tb_bai_viet`
  ADD CONSTRAINT `baiviet_tag` FOREIGN KEY (`id_tag`) REFERENCES `tb_tag` (`id_tag`) ON DELETE CASCADE,
  ADD CONSTRAINT `baiviet_taikhoan` FOREIGN KEY (`id_taikhoan`) REFERENCES `tb_cms_tai_khoan` (`id_cms_taikhoan`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `tb_binh_luan`
--
ALTER TABLE `tb_binh_luan`
  ADD CONSTRAINT `binhluan_baiviet` FOREIGN KEY (`id_baiviet`) REFERENCES `tb_bai_viet` (`id_baiviet`) ON DELETE SET NULL,
  ADD CONSTRAINT `binhluan_hoclieu` FOREIGN KEY (`id_hoclieu`) REFERENCES `tb_hoc_lieu` (`id_hoclieu`) ON DELETE SET NULL,
  ADD CONSTRAINT `binhluan_taikhoan` FOREIGN KEY (`id_taikhoan`) REFERENCES `tb_tai_khoan` (`id_taikhoan`);

--
-- Các ràng buộc cho bảng `tb_hoc_lieu`
--
ALTER TABLE `tb_hoc_lieu`
  ADD CONSTRAINT `hoclieu_khoahoc` FOREIGN KEY (`id_khoahoc`) REFERENCES `tb_khoa_hoc` (`id_khoahoc`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tb_khoahoc_damua`
--
ALTER TABLE `tb_khoahoc_damua`
  ADD CONSTRAINT `khoahocdamua_khoahoc` FOREIGN KEY (`id_khoahoc`) REFERENCES `tb_khoa_hoc` (`id_khoahoc`) ON DELETE CASCADE,
  ADD CONSTRAINT `khoahocdamua_taikhoan` FOREIGN KEY (`id_taikhoan`) REFERENCES `tb_tai_khoan` (`id_taikhoan`);

--
-- Các ràng buộc cho bảng `tb_khoa_hoc`
--
ALTER TABLE `tb_khoa_hoc`
  ADD CONSTRAINT `khoahoc_cms` FOREIGN KEY (`id_taikhoan`) REFERENCES `tb_cms_tai_khoan` (`id_cms_taikhoan`);

--
-- Các ràng buộc cho bảng `tb_thanhtoan`
--
ALTER TABLE `tb_thanhtoan`
  ADD CONSTRAINT `thanhtoan_khoahoc` FOREIGN KEY (`id_khoahoc`) REFERENCES `tb_khoa_hoc` (`id_khoahoc`),
  ADD CONSTRAINT `thanhtoan_taikhoan` FOREIGN KEY (`id_taikhoan`) REFERENCES `tb_tai_khoan` (`id_taikhoan`);

--
-- Các ràng buộc cho bảng `tb_thichbaiviet`
--
ALTER TABLE `tb_thichbaiviet`
  ADD CONSTRAINT `thichbaiviet_baiviet` FOREIGN KEY (`id_baiviet`) REFERENCES `tb_bai_viet` (`id_baiviet`) ON DELETE CASCADE,
  ADD CONSTRAINT `thichbaiviet_taikhoan` FOREIGN KEY (`id_taikhoan`) REFERENCES `tb_tai_khoan` (`id_taikhoan`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tb_thichbinhluan`
--
ALTER TABLE `tb_thichbinhluan`
  ADD CONSTRAINT `thichbinhluan_binhluan` FOREIGN KEY (`id_binhluan`) REFERENCES `tb_binh_luan` (`id_binhluan`),
  ADD CONSTRAINT `thichbinhluan_taikhoan` FOREIGN KEY (`id_taikhoan`) REFERENCES `tb_tai_khoan` (`id_taikhoan`);

--
-- Các ràng buộc cho bảng `tb_thichhoclieu`
--
ALTER TABLE `tb_thichhoclieu`
  ADD CONSTRAINT `thichhoclieu_hoclieu` FOREIGN KEY (`id_hoclieu`) REFERENCES `tb_hoc_lieu` (`id_hoclieu`),
  ADD CONSTRAINT `thichhoclieu_taikhoan` FOREIGN KEY (`id_taikhoan`) REFERENCES `tb_tai_khoan` (`id_taikhoan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
