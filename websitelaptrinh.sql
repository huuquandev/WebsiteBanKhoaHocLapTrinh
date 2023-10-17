-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2023 at 12:19 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `websitelaptrinh`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_baiviet_tags`
--

CREATE TABLE `tb_baiviet_tags` (
  `id_baiviet_tag` int(11) NOT NULL,
  `id_baiviet` int(11) NOT NULL,
  `id_tag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_baiviet_tags`
--

INSERT INTO `tb_baiviet_tags` (`id_baiviet_tag`, `id_baiviet`, `id_tag`) VALUES
(3, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_bai_viet`
--

CREATE TABLE `tb_bai_viet` (
  `id_baiviet` int(11) NOT NULL,
  `id_taikhoan` int(11) DEFAULT NULL,
  `noidung_baivet` text DEFAULT NULL,
  `ten_baiviet` text DEFAULT NULL,
  `mota_baiviet` text DEFAULT NULL,
  `ngaydang_baiviet` datetime DEFAULT NULL,
  `anh_baiviet` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_bai_viet`
--

INSERT INTO `tb_bai_viet` (`id_baiviet`, `id_taikhoan`, `noidung_baivet`, `ten_baiviet`, `mota_baiviet`, `ngaydang_baiviet`, `anh_baiviet`) VALUES
(7, 1, '<h2><strong>I. Giới thiệu Dev Mode</strong></h2>\r\n\r\n<h3><strong>1.1 Dev Mode hữu &iacute;ch khi học kiến thức mới</strong></h3>\r\n\r\n<p><em>Dev Mode</em>&nbsp;cực kỳ hữu &iacute;ch khi bạn học c&aacute;c kiến thức mới, n&oacute; gi&uacute;p bạn trải nghiệm thực tế lu&ocirc;n, thay v&igrave; chỉ xem video đơn thuần như hầu hết c&aacute;c kh&oacute;a học kh&aacute;c.</p>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost:3000/781591d7-433d-4a16-a893-260e2381fa1e\" width=\"900\" />\r\n<figcaption><br />\r\n<em>B&ecirc;n tr&aacute;i l&agrave; b&agrave;i học video, b&ecirc;n phải l&agrave; tr&igrave;nh viết code v&agrave; browser hỗ trợ live reload.</em></figcaption>\r\n</figure>\r\n\r\n<p>Ở h&igrave;nh ảnh tr&ecirc;n, m&igrave;nh vừa c&oacute; thể học kiến thức mới về&nbsp;<em>Grid CSS</em>, vừa c&oacute; thể tự tay trải nghiệm c&aacute;ch hoạt động của n&oacute;.</p>\r\n\r\n<h3><strong>1.2 Dev mode hỗ trợ đa ng&ocirc;n ngữ</strong></h3>\r\n\r\n<p>Dev Mode hỗ trợ đầy đủ c&aacute;c ng&ocirc;n ngữ kh&aacute;c nhau, t&ugrave;y thuộc v&agrave;o nội dung b&agrave;i học đang sử dụng ng&ocirc;n ngữ n&agrave;o.</p>\r\n\r\n<p>Hỗ trợ Sass - Ng&ocirc;n ngữ tiền xử l&yacute; CSS, hỗ trợ &quot;Auto compile&quot;:</p>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost:3000/d13e8adb-f751-408c-8a40-4af2765387ff\" width=\"900\" />\r\n<figcaption><em>Bạn c&oacute; thể viết Sass trực tiếp trong tr&igrave;nh duyệt, qu&aacute; tr&igrave;nh bi&ecirc;n dịch diễn ra tự động.</em></figcaption>\r\n</figure>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost:3000/796a7583-a653-4edf-ae1b-ffabc7b9d709\" width=\"900\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>Hỗ trợ Javascript:</p>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost:3000/343901c8-eabd-4caa-8a6d-b32d6008c168\" width=\"900\" />\r\n<figcaption><br />\r\n<em>T&ugrave;y v&agrave;o nội dung b&agrave;i học, Dev Mode sẽ linh hoạt thay đổi ng&ocirc;n ngữ để đ&aacute;p ứng nhu cầu trải nghiệm một c&aacute;ch tốt nhất.</em></figcaption>\r\n</figure>\r\n\r\n<h2><strong>II. C&aacute;ch sử dụng Dev Mode hiệu quả</strong></h2>\r\n\r\n<h3><strong>2.1 C&aacute;ch bật Dev Mode</strong></h3>\r\n\r\n<p>Dev Mode chỉ hỗ trợ b&agrave;i học video. Tr&ecirc;n Header, bạn nhấn v&agrave;o biểu tượng sau để bật Dev Mode:</p>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost:3000/0b334d8f-1fb8-4568-864d-0b18bba96e04\" width=\"1141\" />\r\n<figcaption><br />\r\n<em>Trong Dev Mode, bạn vừa c&oacute; thể học qua video, vừa thực h&agrave;nh code.</em></figcaption>\r\n</figure>\r\n\r\n<p>&nbsp;</p>\r\n', 'Hướng dẫn chi tiết cách sử dụng Dev Mode trong khóa Pro', 'Chào bạn! Nếu bạn đã là học viên khóa Pro của F8, chắc hẳn bạn đã biết tới \"Dev Mode\" - giúp thực hành code song song khi xem video (bạn không cần phải dùng tới VS code nữa).', '2023-10-06 00:00:00', 'https://files.fullstack.edu.vn/f8-prod/blog_posts/8334/64f01064b0724.png'),
(8, 6, '<h2><span style=\"font-family:Times New Roman,Times,serif\"><strong>I.Giới thiệu:</strong></span></h2>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">Hello ae mọi người nh&eacute;, mọi người (đặc biệt l&agrave; lập tr&igrave;nh vi&ecirc;n Software) chắc hẳn đ&atilde; nghe tới Powershell, nhưng b&ugrave; lại c&aacute;i m&agrave;n h&igrave;nh l&agrave;m việc với powershell qu&aacute; ng&aacute;n, nhiều người muốn đồi nhưng kh&ocirc;ng được n&ecirc;n đ&uacute;ng như ti&ecirc;u đề, h&ocirc;m nay m&igrave;nh sẽ chỉ cho ae c&aacute;ch chỉnh nền tr&ecirc;n Powershell</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><strong>Lưu &yacute;: Blog n&agrave;y chỉ cho Window chứ kh&ocirc;ng cho Mac hay Ubuntu nh&eacute;!(v&igrave; m&igrave;nh cũng chưa x&agrave;i chưa biết n&ecirc;n kh&ocirc;ng biết code c&oacute; đ&uacute;ng kh&ocirc;ng)</strong></span></p>\r\n\r\n<h2><span style=\"font-family:Times New Roman,Times,serif\"><strong>I.C&aacute;ch l&agrave;m:</strong></span></h2>\r\n\r\n<h3><span style=\"font-family:Times New Roman,Times,serif\">2. Tải Oh-my-posh v&agrave; &aacute;p dụng v&agrave;o powershell</span></h3>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">Rất đơn giản , c&aacute;c bạn chỉ cần copy những g&igrave; m&igrave;nh n&oacute;i v&agrave;o Powershell l&agrave; được rồi!</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">Đầu ti&ecirc;n, c&aacute;c bạn tất nhi&ecirc;n phải c&agrave;i Oh-my-posh rồi 🙂</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><strong>Code cho window:</strong></span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><code><span style=\"background-color:#dddddd\">winget install JanDeDobbeleer.OhMyPosh -s winget</span></code></span></p>\r\n\r\n<h3><strong><span style=\"font-family:Times New Roman,Times,serif\">3.Mọi điều cần thiết sau khi tải Oh-my-posh:</span></strong></h3>\r\n\r\n<p><strong><span style=\"font-family:Times New Roman,Times,serif\">Đầu ti&ecirc;n c&aacute;c bạn muốn n&oacute; tương th&iacute;ch hầu hết icon th&igrave; h&atilde;y tải 1 trong bộ&nbsp;</span><a href=\"https://github.com/ryanoasis/nerd-fonts/tree/master/patched-fonts\" rel=\"noreferrer\" target=\"_blank\">Nerd Font</a></strong>&nbsp;<strong><span style=\"font-family:Times New Roman,Times,serif\">n&agrave;y rồi d&aacute;n v&agrave;o file setting.json(ở g&oacute;c b&ecirc;n tr&aacute;i cuối phần setting của terminal), t&igrave;m ra đoạn c&oacute; chữ &quot;profile&quot; v&agrave; ở dưới c&oacute; &quot;default&quot; rồi c&aacute;c bạn ch&egrave;n th&ecirc;m cho m&igrave;nh:</span></strong></p>\r\n\r\n<pre>\r\n<span style=\"font-family:Times New Roman,Times,serif\"><code><span style=\"background-color:#dddddd\">        &quot;font&quot;:\r\n        {\r\n            &quot;face&quot;: &quot;FONT&quot;\r\n        }\r\n</span></code></span></pre>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">hoặc c&aacute;c bạn c&oacute; thể d&ugrave;ng code n&agrave;y v&agrave;o Powershell để tải Nerd Font:(Nhớ h&atilde;y d&ugrave;ng Powershell dưới quyền admin nh&eacute;)</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><code><span style=\"background-color:#dddddd\">oh-my-posh font install</span></code></span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">rồi l&agrave;m như b&ecirc;n tr&ecirc;n th&ocirc;i.</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><strong>Thứ 2 l&agrave; th&ecirc;m theme cho Powershell(nếu muốn)</strong></span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><strong>V&agrave; cuối c&ugrave;ng l&agrave; phải c&agrave;i bộ themes Oh-my-posh th&igrave; c&aacute;c bạn d&ugrave;ng code sau:</strong></span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><code><span style=\"background-color:#dddddd\">Get-PoshThemes</span></code></span></p>\r\n\r\n<h3><strong><span style=\"font-family:Times New Roman,Times,serif\">4. K&iacute;ch hoạt theme Oh-my-posh</span></strong></h3>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">Sau khi chọn 1 theme ưng &yacute;, c&aacute;c bạn copy t&ecirc;n n&oacute; rồi nhập c&aacute;c code sau:</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><code><span style=\"background-color:#dddddd\">echo $profile</span></code></span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">sau đ&oacute; nhập</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><code><span style=\"background-color:#dddddd\">notepad $profile</span></code></span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">Sau khi ra 1 file Notepad rồi c&aacute;c bạn nhập code sau v&agrave;o n&oacute;:</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><code><span style=\"background-color:#dddddd\">oh-my-posh init pwsh --config </span></code></span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><code><span style=\"background-color:#dddddd\">&quot;$env:POSH_THEMES_PATH\\THEMENAME.omp.json&quot; | Invoke-Expression</span></code></span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><strong>Lưu &yacute;: THEMENAME ở đ&acirc;y chỉ t&ecirc;n theme m&agrave; bạn muốn chọn</strong></span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">Cuối c&ugrave;ng c&aacute;c bạn save file notepad đ&oacute;, v&agrave;o tab terminal powershell mới v&agrave; thưởng thức th&ocirc;i!!!🤩</span></p>\r\n\r\n<h3><span style=\"font-family:Times New Roman,Times,serif\">III. Tạm kết</span></h3>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">M&igrave;nh đ&atilde; chỉ cho c&aacute;c bạn c&aacute;ch chỉnh Terminal theme theo Oh-my-posh, m&igrave;nh mong c&aacute;c bạn ủng hộ m&igrave;nh, v&agrave; ch&uacute;c c&aacute;c bạn l&agrave;m code th&ecirc;m đẹp mắt nh&eacute;!</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><strong>Lưu &yacute;: Đ&acirc;y l&agrave; Blog đầu ti&ecirc;n của m&igrave;nh n&ecirc;n c&oacute; sai s&oacute;t g&igrave; mong c&aacute;c bạn bỏ qua ạ</strong></span></p>\r\n', 'Cách chỉnh theme Oh-my-posh cho Powershell', 'Hello ae mọi người nhé, mọi người (đặc biệt là lập trình viên Software) chắc hẳn đã nghe tới Powershell, nhưng bù lại cái màn hình làm việc với powershell quá ngán, nhiều người muốn đồi nhưng không được nên đúng như tiêu đề, hôm nay mình sẽ chỉ cho ae cách chỉnh nền trên Powershell', '2023-10-25 23:39:20', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_binh_luan`
--

CREATE TABLE `tb_binh_luan` (
  `id_binhluan` int(100) NOT NULL,
  `id_baiviet` int(100) DEFAULT NULL,
  `id_hoclieu` int(11) DEFAULT NULL,
  `id_taikhoan` int(100) NOT NULL,
  `noidung_binhluan` text NOT NULL,
  `ngay_binhluan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_binh_luan`
--

INSERT INTO `tb_binh_luan` (`id_binhluan`, `id_baiviet`, `id_hoclieu`, `id_taikhoan`, `noidung_binhluan`, `ngay_binhluan`) VALUES
(5, NULL, 8, 2, 'eqweqwe', '2023-10-14 21:40:20'),
(6, 7, NULL, 22, 'eqwe321321', '2023-10-14 21:40:32'),
(7, 8, NULL, 22, 'eqweqweqweqw312', '2023-10-14 21:40:41'),
(8, 7, NULL, 20, 'eqweqweqw', '2023-10-14 21:40:54'),
(9, NULL, 8, 20, 'eqweqweqw321', '2023-10-14 21:41:05'),
(10, 7, NULL, 22, 'eqweqweqw213123', '2023-10-14 21:41:19');

-- --------------------------------------------------------

--
-- Table structure for table `tb_cms_tai_khoan`
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
-- Dumping data for table `tb_cms_tai_khoan`
--

INSERT INTO `tb_cms_tai_khoan` (`id_cms_taikhoan`, `email`, `ten_hien_thi`, `mat_khau`, `ngay_sinh`, `doi_tuong`, `gioi_tinh`, `sdt`, `hinh_anh`) VALUES
(1, 'huylohb123@gmail.com', 'huylohb123', 'huylohb123', '2023-10-03', 0, 1, 378452231, 'eqweqweqw'),
(6, 'huylohb1234@gmail.com', 'pham huu quan', 'huylohb123', '2001-11-11', 1, 1, 21321321, 'enwRZWMlgAU1gBvTAF9g.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_hoc_lieu`
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
-- Dumping data for table `tb_hoc_lieu`
--

INSERT INTO `tb_hoc_lieu` (`id_hoclieu`, `id_khoahoc`, `ten_hoclieu`, `anh_hoclieu`, `file_hoclieu`, `ngaydang_hoclieu`, `mota_hoclieu`, `trangthai_hoclieu`) VALUES
(8, 5, 'ưqeqweqw', 'eqweqwe', 'eqweqw', '2023-10-24 01:00:00', 'qưeqwe', 'Mở khóa');

-- --------------------------------------------------------

--
-- Table structure for table `tb_khoahoc_damua`
--

CREATE TABLE `tb_khoahoc_damua` (
  `id_khoahoc_damua` int(11) NOT NULL,
  `id_khoahoc` int(11) NOT NULL,
  `id_taikhoan` int(11) NOT NULL,
  `ngay_mua` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_khoahoc_damua`
--

INSERT INTO `tb_khoahoc_damua` (`id_khoahoc_damua`, `id_khoahoc`, `id_taikhoan`, `ngay_mua`) VALUES
(1, 6, 2, '2023-10-04 00:14:07');

-- --------------------------------------------------------

--
-- Table structure for table `tb_khoa_hoc`
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
-- Dumping data for table `tb_khoa_hoc`
--

INSERT INTO `tb_khoa_hoc` (`id_khoahoc`, `id_taikhoan`, `ten_khoahoc`, `anh_khoahoc`, `mota_khoahoc`, `gia_khoahoc`, `ngaydang_khoahoc`, `trangthai_khoahoc`) VALUES
(5, 6, 'CSS cở bản', '1697009446588.png', 'Sau series HTML cơ bản dành cho người mới thì bây giờ mình lại tiếp tục tới một series cơ bản khác đó chính là CSS cơ bản.', NULL, '2023-10-19 18:37:23', 'Mở khóa'),
(6, 1, 'HTML cơ bản', 'ưqeqwe', '2321qwe12312', 100000, '2023-10-25 23:26:34', 'Mở khóa');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tag`
--

CREATE TABLE `tb_tag` (
  `id_tag` int(11) NOT NULL,
  `ten_tag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_tag`
--

INSERT INTO `tb_tag` (`id_tag`, `ten_tag`) VALUES
(1, 'Frontend');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tai_khoan`
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
-- Dumping data for table `tb_tai_khoan`
--

INSERT INTO `tb_tai_khoan` (`id_taikhoan`, `email`, `ten_hien_thi`, `mat_khau`, `doi_tuong`, `ngay_sinh`, `gioi_tinh`, `sdt`, `hinh_anh`) VALUES
(2, 'hb@gmail.com', 'admin', '12345678', 1, '0000-00-00', 0, '', ''),
(20, 'hbhb1234@gmail.com', 'Pham huu quan', 'huylohb123', 1, '2001-11-11', 0, '0378452231', '1BgfJUX6o2NgwiBxoYdo.png'),
(21, 'Hongngoc@gmail.com', 'Hồng Ngọc', '123456@', 1, '2023-10-10', 1, '0123454567', 'ZzkRwsZMUFjl1gHimWam.'),
(22, 'hanhit123@gmail.com', 'Nguyen Thi Hanh', 'hanhit123@', 1, '2023-10-18', 1, '1234567', 'xPYdqUJuJj73GkqRKMey.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_thanhtoan`
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
-- Table structure for table `tb_thichbaiviet`
--

CREATE TABLE `tb_thichbaiviet` (
  `id_thichbaiviet` int(11) NOT NULL,
  `id_baiviet` int(11) NOT NULL,
  `id_taikhoan` int(11) NOT NULL,
  `ngay_thich_baiviet` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_thichbaiviet`
--

INSERT INTO `tb_thichbaiviet` (`id_thichbaiviet`, `id_baiviet`, `id_taikhoan`, `ngay_thich_baiviet`) VALUES
(5, 7, 2, '2023-10-04 16:55:38'),
(6, 8, 2, '2023-10-03 16:55:44'),
(7, 7, 20, '2023-10-11 16:55:44'),
(8, 7, 21, '2023-10-12 16:56:03');

-- --------------------------------------------------------

--
-- Table structure for table `tb_thichbinhluan`
--

CREATE TABLE `tb_thichbinhluan` (
  `id_thichbinhluan` int(11) NOT NULL,
  `id_binhluan` int(11) NOT NULL,
  `id_taikhoan` int(11) NOT NULL,
  `ngay_thich_binhluan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_thichhoclieu`
--

CREATE TABLE `tb_thichhoclieu` (
  `id_thichhoclieu` int(11) NOT NULL,
  `id_hoclieu` int(11) NOT NULL,
  `id_taikhoan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_thichhoclieu`
--

INSERT INTO `tb_thichhoclieu` (`id_thichhoclieu`, `id_hoclieu`, `id_taikhoan`) VALUES
(1, 8, 2),
(2, 8, 22),
(3, 8, 21);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_baiviet_tags`
--
ALTER TABLE `tb_baiviet_tags`
  ADD PRIMARY KEY (`id_baiviet_tag`),
  ADD KEY `baiviettag_baiviet` (`id_baiviet`),
  ADD KEY `baiviettag_tag` (`id_tag`);

--
-- Indexes for table `tb_bai_viet`
--
ALTER TABLE `tb_bai_viet`
  ADD PRIMARY KEY (`id_baiviet`),
  ADD KEY `baiviet_taikhoan` (`id_taikhoan`);

--
-- Indexes for table `tb_binh_luan`
--
ALTER TABLE `tb_binh_luan`
  ADD PRIMARY KEY (`id_binhluan`),
  ADD KEY `binhluan_baiviet` (`id_baiviet`),
  ADD KEY `binhluan_taikhoan` (`id_taikhoan`),
  ADD KEY `binhluan_hoclieu` (`id_hoclieu`);

--
-- Indexes for table `tb_cms_tai_khoan`
--
ALTER TABLE `tb_cms_tai_khoan`
  ADD PRIMARY KEY (`id_cms_taikhoan`);

--
-- Indexes for table `tb_hoc_lieu`
--
ALTER TABLE `tb_hoc_lieu`
  ADD PRIMARY KEY (`id_hoclieu`),
  ADD KEY `hoclieu_khoahoc` (`id_khoahoc`);

--
-- Indexes for table `tb_khoahoc_damua`
--
ALTER TABLE `tb_khoahoc_damua`
  ADD PRIMARY KEY (`id_khoahoc_damua`),
  ADD KEY `khoahocdamua_khoahoc` (`id_khoahoc`),
  ADD KEY `khoahocdamua_taikhoan` (`id_taikhoan`);

--
-- Indexes for table `tb_khoa_hoc`
--
ALTER TABLE `tb_khoa_hoc`
  ADD PRIMARY KEY (`id_khoahoc`),
  ADD KEY `khoahoc_taikhoan` (`id_taikhoan`);

--
-- Indexes for table `tb_tag`
--
ALTER TABLE `tb_tag`
  ADD PRIMARY KEY (`id_tag`);

--
-- Indexes for table `tb_tai_khoan`
--
ALTER TABLE `tb_tai_khoan`
  ADD PRIMARY KEY (`id_taikhoan`);

--
-- Indexes for table `tb_thanhtoan`
--
ALTER TABLE `tb_thanhtoan`
  ADD PRIMARY KEY (`id_thanhtoan`),
  ADD KEY `thanhtoan_khoahoc` (`id_khoahoc`),
  ADD KEY `thanhtoan_taikhoan` (`id_taikhoan`);

--
-- Indexes for table `tb_thichbaiviet`
--
ALTER TABLE `tb_thichbaiviet`
  ADD PRIMARY KEY (`id_thichbaiviet`),
  ADD KEY `thichbaiviet_baiviet` (`id_baiviet`),
  ADD KEY `thichbaiviet_taikhoan` (`id_taikhoan`);

--
-- Indexes for table `tb_thichbinhluan`
--
ALTER TABLE `tb_thichbinhluan`
  ADD PRIMARY KEY (`id_thichbinhluan`),
  ADD KEY `thichbinhluan_binhluan` (`id_binhluan`),
  ADD KEY `thichbinhluan_taikhoan` (`id_taikhoan`);

--
-- Indexes for table `tb_thichhoclieu`
--
ALTER TABLE `tb_thichhoclieu`
  ADD PRIMARY KEY (`id_thichhoclieu`),
  ADD KEY `thichhoclieu_hoclieu` (`id_hoclieu`),
  ADD KEY `thichhoclieu_taikhoan` (`id_taikhoan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_baiviet_tags`
--
ALTER TABLE `tb_baiviet_tags`
  MODIFY `id_baiviet_tag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_bai_viet`
--
ALTER TABLE `tb_bai_viet`
  MODIFY `id_baiviet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_binh_luan`
--
ALTER TABLE `tb_binh_luan`
  MODIFY `id_binhluan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_cms_tai_khoan`
--
ALTER TABLE `tb_cms_tai_khoan`
  MODIFY `id_cms_taikhoan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_hoc_lieu`
--
ALTER TABLE `tb_hoc_lieu`
  MODIFY `id_hoclieu` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_khoahoc_damua`
--
ALTER TABLE `tb_khoahoc_damua`
  MODIFY `id_khoahoc_damua` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_khoa_hoc`
--
ALTER TABLE `tb_khoa_hoc`
  MODIFY `id_khoahoc` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_tag`
--
ALTER TABLE `tb_tag`
  MODIFY `id_tag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_tai_khoan`
--
ALTER TABLE `tb_tai_khoan`
  MODIFY `id_taikhoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_thanhtoan`
--
ALTER TABLE `tb_thanhtoan`
  MODIFY `id_thanhtoan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_thichbaiviet`
--
ALTER TABLE `tb_thichbaiviet`
  MODIFY `id_thichbaiviet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_thichbinhluan`
--
ALTER TABLE `tb_thichbinhluan`
  MODIFY `id_thichbinhluan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_thichhoclieu`
--
ALTER TABLE `tb_thichhoclieu`
  MODIFY `id_thichhoclieu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_baiviet_tags`
--
ALTER TABLE `tb_baiviet_tags`
  ADD CONSTRAINT `baiviettag_baiviet` FOREIGN KEY (`id_baiviet`) REFERENCES `tb_bai_viet` (`id_baiviet`),
  ADD CONSTRAINT `baiviettag_tag` FOREIGN KEY (`id_tag`) REFERENCES `tb_tag` (`id_tag`);

--
-- Constraints for table `tb_bai_viet`
--
ALTER TABLE `tb_bai_viet`
  ADD CONSTRAINT `baiviet_taikhoan` FOREIGN KEY (`id_taikhoan`) REFERENCES `tb_cms_tai_khoan` (`id_cms_taikhoan`);

--
-- Constraints for table `tb_binh_luan`
--
ALTER TABLE `tb_binh_luan`
  ADD CONSTRAINT `binhluan_baiviet` FOREIGN KEY (`id_baiviet`) REFERENCES `tb_bai_viet` (`id_baiviet`),
  ADD CONSTRAINT `binhluan_hoclieu` FOREIGN KEY (`id_hoclieu`) REFERENCES `tb_hoc_lieu` (`id_hoclieu`),
  ADD CONSTRAINT `binhluan_taikhoan` FOREIGN KEY (`id_taikhoan`) REFERENCES `tb_tai_khoan` (`id_taikhoan`);

--
-- Constraints for table `tb_hoc_lieu`
--
ALTER TABLE `tb_hoc_lieu`
  ADD CONSTRAINT `hoclieu_khoahoc` FOREIGN KEY (`id_khoahoc`) REFERENCES `tb_khoa_hoc` (`id_khoahoc`);

--
-- Constraints for table `tb_khoahoc_damua`
--
ALTER TABLE `tb_khoahoc_damua`
  ADD CONSTRAINT `khoahocdamua_khoahoc` FOREIGN KEY (`id_khoahoc`) REFERENCES `tb_khoa_hoc` (`id_khoahoc`),
  ADD CONSTRAINT `khoahocdamua_taikhoan` FOREIGN KEY (`id_taikhoan`) REFERENCES `tb_tai_khoan` (`id_taikhoan`);

--
-- Constraints for table `tb_khoa_hoc`
--
ALTER TABLE `tb_khoa_hoc`
  ADD CONSTRAINT `khoahoc_cms` FOREIGN KEY (`id_taikhoan`) REFERENCES `tb_cms_tai_khoan` (`id_cms_taikhoan`);

--
-- Constraints for table `tb_thanhtoan`
--
ALTER TABLE `tb_thanhtoan`
  ADD CONSTRAINT `thanhtoan_khoahoc` FOREIGN KEY (`id_khoahoc`) REFERENCES `tb_khoa_hoc` (`id_khoahoc`),
  ADD CONSTRAINT `thanhtoan_taikhoan` FOREIGN KEY (`id_taikhoan`) REFERENCES `tb_tai_khoan` (`id_taikhoan`);

--
-- Constraints for table `tb_thichbaiviet`
--
ALTER TABLE `tb_thichbaiviet`
  ADD CONSTRAINT `thichbaiviet_baiviet` FOREIGN KEY (`id_baiviet`) REFERENCES `tb_bai_viet` (`id_baiviet`),
  ADD CONSTRAINT `thichbaiviet_taikhoan` FOREIGN KEY (`id_taikhoan`) REFERENCES `tb_tai_khoan` (`id_taikhoan`);

--
-- Constraints for table `tb_thichbinhluan`
--
ALTER TABLE `tb_thichbinhluan`
  ADD CONSTRAINT `thichbinhluan_binhluan` FOREIGN KEY (`id_binhluan`) REFERENCES `tb_binh_luan` (`id_binhluan`),
  ADD CONSTRAINT `thichbinhluan_taikhoan` FOREIGN KEY (`id_taikhoan`) REFERENCES `tb_tai_khoan` (`id_taikhoan`);

--
-- Constraints for table `tb_thichhoclieu`
--
ALTER TABLE `tb_thichhoclieu`
  ADD CONSTRAINT `thichhoclieu_hoclieu` FOREIGN KEY (`id_hoclieu`) REFERENCES `tb_hoc_lieu` (`id_hoclieu`),
  ADD CONSTRAINT `thichhoclieu_taikhoan` FOREIGN KEY (`id_taikhoan`) REFERENCES `tb_tai_khoan` (`id_taikhoan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
