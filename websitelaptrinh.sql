-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 13, 2023 lúc 04:35 PM
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
  `id_baiviet_tag` int(11) NOT NULL,
  `id_baiviet` int(11) NOT NULL,
  `id_tag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_baiviet_tags`
--

INSERT INTO `tb_baiviet_tags` (`id_baiviet_tag`, `id_baiviet`, `id_tag`) VALUES
(3, 7, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_bai_viet`
--

CREATE TABLE `tb_bai_viet` (
  `id_baiviet` int(11) NOT NULL,
  `id_taikhoan` int(11) DEFAULT NULL,
  `noidung_baivet` text DEFAULT NULL,
  `ten_baiviet` text DEFAULT NULL,
  `mota_baiviet` text DEFAULT NULL,
  `ngaydang_baiviet` date DEFAULT NULL,
  `anh_baiviet` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_bai_viet`
--

INSERT INTO `tb_bai_viet` (`id_baiviet`, `id_taikhoan`, `noidung_baivet`, `ten_baiviet`, `mota_baiviet`, `ngaydang_baiviet`, `anh_baiviet`) VALUES
(7, 1, 'huylohb123', 'huylohb123', 'huylohb123', '2023-10-06', 'huylohb123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_binh_luan`
--

CREATE TABLE `tb_binh_luan` (
  `id_binhluan` int(100) NOT NULL,
  `id_baiviet` int(100) NOT NULL,
  `id_taikhoan` int(100) NOT NULL,
  `noidung_binhluan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_binh_luan`
--

INSERT INTO `tb_binh_luan` (`id_binhluan`, `id_baiviet`, `id_taikhoan`, `noidung_binhluan`) VALUES
(1, 7, 2, 'eqweqwe');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_cms_tai_khoan`
--

CREATE TABLE `tb_cms_tai_khoan` (
  `id_cms_taikhoan` int(100) NOT NULL,
  `tai_khoan` varchar(50) NOT NULL,
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

INSERT INTO `tb_cms_tai_khoan` (`id_cms_taikhoan`, `tai_khoan`, `ten_hien_thi`, `mat_khau`, `ngay_sinh`, `doi_tuong`, `gioi_tinh`, `sdt`, `hinh_anh`) VALUES
(1, 'huylohb123', 'huylohb123', 'huylohb123', '2023-10-03', 0, 1, 378452231, 'eqweqweqw');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_dangky_khoahoc`
--

CREATE TABLE `tb_dangky_khoahoc` (
  `id_dangky` int(100) NOT NULL,
  `id_khoahoc` int(100) NOT NULL,
  `id_taikhoan` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `ngay_dang` date NOT NULL,
  `mota_hoclieu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_hoc_lieu`
--

INSERT INTO `tb_hoc_lieu` (`id_hoclieu`, `id_khoahoc`, `ten_hoclieu`, `anh_hoclieu`, `file_hoclieu`, `ngay_dang`, `mota_hoclieu`) VALUES
(4, 3, 'video1', '1697016106609.png', '1697016106609.mp4', '0000-00-00', 'đây là video 1\r\n        '),
(7, 3, 'eqweqw', 'qưeqwe', 'eqweqw', '2023-10-11', 'qưeqwewqeqw');

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
(3, 2, 'HTML Cơ bản', '1697009446588.png', 'HTML\r\n            ', 1234, '2023-10-11 14:30:46', 'Mở khóa');

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
(1, 'Frontend');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_tai_khoan`
--

CREATE TABLE `tb_tai_khoan` (
  `id_taikhoan` int(11) NOT NULL,
  `tai_khoan` varchar(255) NOT NULL,
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

INSERT INTO `tb_tai_khoan` (`id_taikhoan`, `tai_khoan`, `ten_hien_thi`, `mat_khau`, `doi_tuong`, `ngay_sinh`, `gioi_tinh`, `sdt`, `hinh_anh`) VALUES
(2, 'admin', 'admin', '12345678', 1, '0000-00-00', 0, '', ''),
(20, 'hbhb1234', 'Pham huu quan', 'huylohb123', 1, '2001-11-11', 0, '0378452231', '1BgfJUX6o2NgwiBxoYdo.png'),
(21, 'Hongngoc', 'Hồng Ngọc', '123456@', 1, '2023-10-10', 1, '0123454567', 'ZzkRwsZMUFjl1gHimWam.'),
(22, 'hanhit123', 'Nguyen Thi Hanh', 'hanhit123@', 1, '2023-10-18', 1, '1234567', 'xPYdqUJuJj73GkqRKMey.jpg');

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
  `id_taikhoan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_thichbaiviet`
--

INSERT INTO `tb_thichbaiviet` (`id_thichbaiviet`, `id_baiviet`, `id_taikhoan`) VALUES
(1, 7, 22);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_thichbinhluan`
--

CREATE TABLE `tb_thichbinhluan` (
  `id_thichbinhluan` int(11) NOT NULL,
  `id_binhluan` int(11) NOT NULL,
  `id_taikhoan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  ADD KEY `baiviet_taikhoan` (`id_taikhoan`);

--
-- Chỉ mục cho bảng `tb_binh_luan`
--
ALTER TABLE `tb_binh_luan`
  ADD PRIMARY KEY (`id_binhluan`),
  ADD KEY `binhluan_baiviet` (`id_baiviet`),
  ADD KEY `binhluan_taikhoan` (`id_taikhoan`);

--
-- Chỉ mục cho bảng `tb_cms_tai_khoan`
--
ALTER TABLE `tb_cms_tai_khoan`
  ADD PRIMARY KEY (`id_cms_taikhoan`);

--
-- Chỉ mục cho bảng `tb_dangky_khoahoc`
--
ALTER TABLE `tb_dangky_khoahoc`
  ADD PRIMARY KEY (`id_dangky`),
  ADD KEY `dangky_khoahoc` (`id_khoahoc`),
  ADD KEY `dangky_taikhoan` (`id_taikhoan`);

--
-- Chỉ mục cho bảng `tb_hoc_lieu`
--
ALTER TABLE `tb_hoc_lieu`
  ADD PRIMARY KEY (`id_hoclieu`),
  ADD KEY `hoclieu_khoahoc` (`id_khoahoc`);

--
-- Chỉ mục cho bảng `tb_khoa_hoc`
--
ALTER TABLE `tb_khoa_hoc`
  ADD PRIMARY KEY (`id_khoahoc`),
  ADD KEY `khoahoc_taikhoan` (`id_taikhoan`);

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
  ADD KEY `thichbinhluan_binhluan` (`id_binhluan`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tb_baiviet_tags`
--
ALTER TABLE `tb_baiviet_tags`
  MODIFY `id_baiviet_tag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tb_bai_viet`
--
ALTER TABLE `tb_bai_viet`
  MODIFY `id_baiviet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tb_binh_luan`
--
ALTER TABLE `tb_binh_luan`
  MODIFY `id_binhluan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tb_cms_tai_khoan`
--
ALTER TABLE `tb_cms_tai_khoan`
  MODIFY `id_cms_taikhoan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tb_dangky_khoahoc`
--
ALTER TABLE `tb_dangky_khoahoc`
  MODIFY `id_dangky` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tb_hoc_lieu`
--
ALTER TABLE `tb_hoc_lieu`
  MODIFY `id_hoclieu` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tb_khoa_hoc`
--
ALTER TABLE `tb_khoa_hoc`
  MODIFY `id_khoahoc` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tb_tag`
--
ALTER TABLE `tb_tag`
  MODIFY `id_tag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tb_tai_khoan`
--
ALTER TABLE `tb_tai_khoan`
  MODIFY `id_taikhoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `tb_thanhtoan`
--
ALTER TABLE `tb_thanhtoan`
  MODIFY `id_thanhtoan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tb_thichbaiviet`
--
ALTER TABLE `tb_thichbaiviet`
  MODIFY `id_thichbaiviet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tb_thichbinhluan`
--
ALTER TABLE `tb_thichbinhluan`
  MODIFY `id_thichbinhluan` int(11) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `baiviet_taikhoan` FOREIGN KEY (`id_taikhoan`) REFERENCES `tb_cms_tai_khoan` (`id_cms_taikhoan`);

--
-- Các ràng buộc cho bảng `tb_binh_luan`
--
ALTER TABLE `tb_binh_luan`
  ADD CONSTRAINT `binhluan_baiviet` FOREIGN KEY (`id_baiviet`) REFERENCES `tb_bai_viet` (`id_baiviet`),
  ADD CONSTRAINT `binhluan_taikhoan` FOREIGN KEY (`id_taikhoan`) REFERENCES `tb_tai_khoan` (`id_taikhoan`);

--
-- Các ràng buộc cho bảng `tb_dangky_khoahoc`
--
ALTER TABLE `tb_dangky_khoahoc`
  ADD CONSTRAINT `dangky_khoahoc` FOREIGN KEY (`id_khoahoc`) REFERENCES `tb_khoa_hoc` (`id_khoahoc`),
  ADD CONSTRAINT `dangky_taikhoan` FOREIGN KEY (`id_taikhoan`) REFERENCES `tb_tai_khoan` (`id_taikhoan`);

--
-- Các ràng buộc cho bảng `tb_hoc_lieu`
--
ALTER TABLE `tb_hoc_lieu`
  ADD CONSTRAINT `hoclieu_khoahoc` FOREIGN KEY (`id_khoahoc`) REFERENCES `tb_khoa_hoc` (`id_khoahoc`);

--
-- Các ràng buộc cho bảng `tb_khoa_hoc`
--
ALTER TABLE `tb_khoa_hoc`
  ADD CONSTRAINT `khoahoc_taikhoan` FOREIGN KEY (`id_taikhoan`) REFERENCES `tb_tai_khoan` (`id_taikhoan`);

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
  ADD CONSTRAINT `thichbaiviet_baiviet` FOREIGN KEY (`id_baiviet`) REFERENCES `tb_bai_viet` (`id_baiviet`),
  ADD CONSTRAINT `thichbaiviet_taikhoan` FOREIGN KEY (`id_taikhoan`) REFERENCES `tb_tai_khoan` (`id_taikhoan`);

--
-- Các ràng buộc cho bảng `tb_thichbinhluan`
--
ALTER TABLE `tb_thichbinhluan`
  ADD CONSTRAINT `thichbinhluan_binhluan` FOREIGN KEY (`id_binhluan`) REFERENCES `tb_binh_luan` (`id_binhluan`),
  ADD CONSTRAINT `thichbinhluan_taikhoan` FOREIGN KEY (`id_thichbinhluan`) REFERENCES `tb_tai_khoan` (`id_taikhoan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
