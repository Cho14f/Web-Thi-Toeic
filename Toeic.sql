-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2023 at 05:46 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toeic`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_bai_nop`
--

CREATE TABLE `bainop` (
  `id` int(11) NOT NULL,
  `id_bai_tap` int(11) NOT NULL,
  `ten_tai_khoan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_file_nop` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thoi_gian_nop` datetime NOT NULL DEFAULT current_timestamp(),
  `trang_thai` smallint(6) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_bai_nop`
--

INSERT INTO `tb_bai_nop` (`id`, `id_bai_tap`, `ten_tai_khoan`, `ten_file_nop`, `thoi_gian_nop`, `trang_thai`) VALUES
(28, 48, 'hocvien1', 'BN_16723377135523.zip', '2022-12-30 01:15:13', 0),
(29, 50, 'hocvien1', 'BN_16723377565867.pdf', '2022-12-30 01:15:56', 0),
(30, 49, 'hocvien2', 'BN_16723379436702.rar', '2022-12-30 01:19:03', 0),
(31, 48, 'hocvien2', 'BN_16723379563923.zip', '2022-12-30 01:19:16', 1),
(32, 48, 'hocvien3', 'BN_16723379896572.zip', '2022-12-30 01:19:49', -1),
(33, 50, 'hocvien3', 'BN_16723380042512.zip', '2022-12-30 01:20:04', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_bai_tap`
--

CREATE TABLE `tb_bai_tap` (
  `id` int(11) NOT NULL,
  `id_chu_de` int(11) NOT NULL,
  `ten_bai_tap` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_bai_thu` int(11) NOT NULL DEFAULT 1,
  `ngay_mo` datetime NOT NULL DEFAULT current_timestamp(),
  `han_nop` datetime NOT NULL,
  `ten_file_bai_tap` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_file_tai_lieu` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_bai_tap`
--

INSERT INTO `tb_bai_tap` (`id`, `id_chu_de`, `ten_bai_tap`, `so_bai_thu`, `ngay_mo`, `han_nop`, `ten_file_bai_tap`, `ten_file_tai_lieu`) VALUES
(48, 27, 'UploadFile sử dụng Session', 5, '2022-12-30 01:12:10', '2023-01-06 01:11:00', 'BT_1672337530650.pdf', 'TL_167233753065.zip'),
(49, 27, 'UploadFile sử dụng Cookie', 6, '2022-12-30 01:12:57', '2023-01-03 01:12:00', 'BT_1672337577784.pdf', ''),
(50, 28, 'Bài Tập Về Nhà', 8, '2022-12-30 01:13:56', '2023-01-07 20:00:00', '1672926621561.pdf', '167292662156.pdf'),
(51, 29, 'test', 11, '2023-01-05 20:47:48', '2023-01-06 20:47:00', 'BT_1672926468427.pdf', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_cau_hoi`
--

CREATE TABLE `tb_cau_hoi` (
  `id` int(11) NOT NULL,
  `id_bai_luyen_tap` int(11) NOT NULL,
  `ten_cau_hoi` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `da_A` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `da_B` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `da_C` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `da_D` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dap_an` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_cau_hoi`
--

INSERT INTO `tb_cau_hoi` (`id`, `id_bai_luyen_tap`, `ten_cau_hoi`, `da_A`, `da_B`, `da_C`, `da_D`, `dap_an`) VALUES
(1, 1, 'Câu hỏi 1', 'A', 'B', 'C', 'D', 'B'),
(2, 1, 'Câu hỏi 2', '111', '111', '111', '111', 'D'),
(3, 1, 'Câu hỏi 3', '333qqq', '333qqq', '333qqq', '3333sss', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `tb_chu_de`
--

CREATE TABLE `tb_chu_de` (
  `id` int(11) NOT NULL,
  `id_khoa_hoc` int(11) NOT NULL,
  `ten_chu_de` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_chu_de`
--

INSERT INTO `tb_chu_de` (`id`, `id_khoa_hoc`, `ten_chu_de`) VALUES
(27, 23, 'UploadFile'),
(28, 23, 'DateTime'),
(29, 23, 'Session');

-- --------------------------------------------------------

--
-- Table structure for table `tb_hoc_lieu`
--

CREATE TABLE `tb_hoc_lieu` (
  `id` int(11) NOT NULL,
  `ten_hoc_lieu` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL,
  `ten_file_hoc_lieu` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL,
  `id_khoa_hoc` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_khoa_hoc`
--

CREATE TABLE `tb_khoa_hoc` (
  `id_khoa_hoc` int(11) NOT NULL,
  `ten_khoa_hoc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'img_default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_khoa_hoc`
--

INSERT INTO `tb_khoa_hoc` (`id_khoa_hoc`, `ten_khoa_hoc`, `path_img`) VALUES
(23, 'Công nghệ web', '1672337344876.gif'),
(24, 'nền tảng phát triển web', '1672337377309.gif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_luyen_tap`
--

CREATE TABLE `tb_luyen_tap` (
  `id` int(11) NOT NULL,
  `id_khoa_hoc` int(11) NOT NULL,
  `ten` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_mo` datetime NOT NULL DEFAULT current_timestamp(),
  `ngay_dong` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_luyen_tap`
--

INSERT INTO `tb_luyen_tap` (`id`, `id_khoa_hoc`, `ten`, `ngay_mo`, `ngay_dong`) VALUES
(1, 23, '1', '2023-01-06 09:55:11', '2023-01-07 09:55:00'),
(2, 23, 'Test', '2023-01-06 09:56:18', '2023-01-13 09:56:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tai_khoan`
--

CREATE TABLE `tb_tai_khoan` (
  `ten_dang_nhap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_hien_thi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mat_khau` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doi_tuong` tinyint(1) NOT NULL DEFAULT 0,
  `ngay_sinh` date DEFAULT NULL,
  `gioi_tinh` tinyint(4) NOT NULL DEFAULT -1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_tai_khoan`
--

INSERT INTO `tb_tai_khoan` (`ten_dang_nhap`, `ten_hien_thi`, `mat_khau`, `doi_tuong`, `ngay_sinh`, `gioi_tinh`) VALUES
('admin1', 'Nguyễn Xuân Quý', '123456', 2, '2002-01-13', 1),
('admin2', 'admin2', '123456', 2, NULL, -1),
('giaovien1', 'giaovien1', '123456', 1, NULL, -1),
('giaovien2', 'giaovien2', '123456', 1, NULL, -1),
('hocvien1', 'hocvien1', '123456', 0, NULL, -1),
('hocvien10', 'hocvien10', '123456', 0, NULL, -1),
('hocvien11', 'hocvien11', '123456', 0, NULL, -1),
('hocvien2', 'hocvien2', '123456', 0, NULL, -1),
('hocvien3', 'hocvien3', '123456', 0, NULL, -1),
('hocvien4', 'hocvien4', '123456', 0, NULL, -1),
('hocvien5', 'hocvien5', '123456', 0, NULL, -1),
('hocvien6', 'hocvien6', '123456', 0, NULL, -1),
('hocvien7', 'hocvien7', '123456', 0, NULL, -1),
('hocvien8', 'hocvien8', '123456', 0, NULL, -1),
('hocvien9', 'hocvien9', '123456', 0, NULL, -1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_bai_nop`
--
ALTER TABLE `tb_bai_nop`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pk_bai_nop1` (`id_bai_tap`),
  ADD KEY `pk_bai_nop2` (`ten_tai_khoan`);

--
-- Indexes for table `tb_bai_tap`
--
ALTER TABLE `tb_bai_tap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pk_bai_tap` (`id_chu_de`);

--
-- Indexes for table `tb_cau_hoi`
--
ALTER TABLE `tb_cau_hoi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pk_lt` (`id_bai_luyen_tap`);

--
-- Indexes for table `tb_chu_de`
--
ALTER TABLE `tb_chu_de`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pk_chu_de` (`id_khoa_hoc`);

--
-- Indexes for table `tb_hoc_lieu`
--
ALTER TABLE `tb_hoc_lieu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_khoa_hoc`
--
ALTER TABLE `tb_khoa_hoc`
  ADD PRIMARY KEY (`id_khoa_hoc`);

--
-- Indexes for table `tb_luyen_tap`
--
ALTER TABLE `tb_luyen_tap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pk_kh` (`id_khoa_hoc`);

--
-- Indexes for table `tb_tai_khoan`
--
ALTER TABLE `tb_tai_khoan`
  ADD PRIMARY KEY (`ten_dang_nhap`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_bai_nop`
--
ALTER TABLE `tb_bai_nop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tb_bai_tap`
--
ALTER TABLE `tb_bai_tap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tb_cau_hoi`
--
ALTER TABLE `tb_cau_hoi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_chu_de`
--
ALTER TABLE `tb_chu_de`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tb_hoc_lieu`
--
ALTER TABLE `tb_hoc_lieu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_khoa_hoc`
--
ALTER TABLE `tb_khoa_hoc`
  MODIFY `id_khoa_hoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_luyen_tap`
--
ALTER TABLE `tb_luyen_tap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_bai_nop`
--
ALTER TABLE `tb_bai_nop`
  ADD CONSTRAINT `pk_bai_nop1` FOREIGN KEY (`id_bai_tap`) REFERENCES `tb_bai_tap` (`id`),
  ADD CONSTRAINT `pk_bai_nop2` FOREIGN KEY (`ten_tai_khoan`) REFERENCES `tb_tai_khoan` (`ten_dang_nhap`);

--
-- Constraints for table `tb_bai_tap`
--
ALTER TABLE `tb_bai_tap`
  ADD CONSTRAINT `pk_bai_tap` FOREIGN KEY (`id_chu_de`) REFERENCES `tb_chu_de` (`id`);

--
-- Constraints for table `tb_cau_hoi`
--
ALTER TABLE `tb_cau_hoi`
  ADD CONSTRAINT `pk_lt` FOREIGN KEY (`id_bai_luyen_tap`) REFERENCES `tb_luyen_tap` (`id`);

--
-- Constraints for table `tb_chu_de`
--
ALTER TABLE `tb_chu_de`
  ADD CONSTRAINT `pk_chu_de` FOREIGN KEY (`id_khoa_hoc`) REFERENCES `tb_khoa_hoc` (`id_khoa_hoc`);

--
-- Constraints for table `tb_luyen_tap`
--
ALTER TABLE `tb_luyen_tap`
  ADD CONSTRAINT `pk_kh` FOREIGN KEY (`id_khoa_hoc`) REFERENCES `tb_khoa_hoc` (`id_khoa_hoc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
