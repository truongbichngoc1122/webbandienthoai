-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2022 at 07:15 AM
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
-- Database: `web_sell_phone`
--

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_hoa_don`
--

CREATE TABLE `chi_tiet_hoa_don` (
  `MaHD` int(10) NOT NULL,
  `MaSP` varchar(10) NOT NULL,
  `SoLuong` int(255) NOT NULL,
  `DonGia` int(255) NOT NULL,
  `TyLeKM` varchar(255) NOT NULL,
  `TyLeThue` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chi_tiet_hoa_don`
--

INSERT INTO `chi_tiet_hoa_don` (`MaHD`, `MaSP`, `SoLuong`, `DonGia`, `TyLeKM`, `TyLeThue`) VALUES
(19, '2', 2, 15000000, '', ''),
(19, '10', 1, 1000000, '', ''),
(20, '1', 14, 11000000, '', ''),
(20, '3', 4, 22400000, '', ''),
(21, '16', 1, 4100000, '', ''),
(21, '2', 1, 15000000, '', ''),
(23, '16', 10, 4100000, '', ''),
(23, '18', 5, 3500000, '', ''),
(24, '1', 1, 11000000, '', ''),
(27, '10', 4, 1000000, '', ''),
(27, '16', 7, 4100000, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_khuyen_mai`
--

CREATE TABLE `chi_tiet_khuyen_mai` (
  `MaKM` varchar(10) NOT NULL,
  `MaSP` varchar(10) NOT NULL,
  `TyLeKM` varchar(10) NOT NULL,
  `SoLuongKM` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `danh_gia`
--

CREATE TABLE `danh_gia` (
  `MaDG` varchar(10) NOT NULL,
  `MaTK` int(10) NOT NULL,
  `SoSao` int(5) NOT NULL,
  `NoiDung` varchar(255) NOT NULL,
  `NgayDG` date NOT NULL,
  `MaSP` varchar(10) NOT NULL,
  `TrangThai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `danh_gia`
--

INSERT INTO `danh_gia` (`MaDG`, `MaTK`, `SoSao`, `NoiDung`, `NgayDG`, `MaSP`, `TrangThai`) VALUES
('1', 4, 5, 'Hàng Tốt', '2022-06-14', '1', 'Đã Duyệt');

-- --------------------------------------------------------

--
-- Table structure for table `danh_muc`
--

CREATE TABLE `danh_muc` (
  `MaDM` varchar(10) NOT NULL,
  `TenDM` varchar(30) NOT NULL,
  `TrangThai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `danh_muc`
--

INSERT INTO `danh_muc` (`MaDM`, `TenDM`, `TrangThai`) VALUES
('1', 'Điện Thoại Iphone', '1'),
('2', 'Điện Thoại SamSung', '1'),
('3', 'Điện Thoại NoKia', '1'),
('4', 'Điện Thoại Huawai', '1');

-- --------------------------------------------------------

--
-- Table structure for table `hoa_don`
--

CREATE TABLE `hoa_don` (
  `MaHD` int(11) NOT NULL,
  `NgayLapHD` date NOT NULL,
  `MaTK` int(11) NOT NULL,
  `TrangThai` varchar(50) NOT NULL,
  `HoTenNguoiNhan` varchar(255) NOT NULL,
  `DiaChiNguoiNhan` varchar(255) NOT NULL,
  `SoDienThoaiNguoiNhan` int(10) NOT NULL,
  `TongSoMatHang` int(255) NOT NULL,
  `GhiChu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hoa_don`
--

INSERT INTO `hoa_don` (`MaHD`, `NgayLapHD`, `MaTK`, `TrangThai`, `HoTenNguoiNhan`, `DiaChiNguoiNhan`, `SoDienThoaiNguoiNhan`, `TongSoMatHang`, `GhiChu`) VALUES
(19, '0000-00-00', 4, 'Đã Thanh Toán', 'client', 'Phú Ninh ', 384288343, 2, 'Hàng Dễ Vỡ '),
(20, '0000-00-00', 4, 'Đang giao hàng', 'client', 'Hà Nội', 384288343, 2, 'Hàng OK'),
(21, '0000-00-00', 4, 'Đã hủy', 'client', 'Phú Ninh ', 384288343, 2, 'BAC'),
(22, '0000-00-00', 4, 'chờ Duyệt', 'client', 'Phú Ninh ', 384288343, 2, 'BAC'),
(23, '0000-00-00', 4, 'chờ Duyệt', 'client', 'Phú Ninh ', 384288343, 2, 'Hàng Dễ Vỡ'),
(24, '0000-00-00', 4, 'Đang giao hàng', 'client', 'Phú Ninh ', 384288343, 0, 'ABC'),
(25, '0000-00-00', 4, 'Đang giao hàng', 'client', 'Phú Ninh ', 384288343, 0, 'ABC'),
(26, '0000-00-00', 4, 'chờ Duyệt', 'client', 'Phú Ninh ', 384288343, 2, 'ABC'),
(27, '0000-00-00', 4, 'Đang giao hàng', 'client', 'Hồ Chí Minh', 384288343, 2, 'Hàng Dễ Vỡ Vui Lòng vận chuyển nhẹ nhàng');

-- --------------------------------------------------------

--
-- Table structure for table `khuyen_mai`
--

CREATE TABLE `khuyen_mai` (
  `MaKM` varchar(10) NOT NULL,
  `TenKM` varchar(30) NOT NULL,
  `TuNgay` date NOT NULL,
  `DenNgay` date NOT NULL,
  `TrangThai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khuyen_mai`
--

INSERT INTO `khuyen_mai` (`MaKM`, `TenKM`, `TuNgay`, `DenNgay`, `TrangThai`) VALUES
('1', 'Khuyến Mãi 25/5', '2022-05-25', '2022-05-27', 'Chưa Hoạt Động');

-- --------------------------------------------------------

--
-- Table structure for table `loai_tai_khoan`
--

CREATE TABLE `loai_tai_khoan` (
  `MaLoaiTK` varchar(10) NOT NULL,
  `TenLoai` varchar(20) NOT NULL,
  `TrangThai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `san_pham`
--

CREATE TABLE `san_pham` (
  `MaSP` varchar(10) NOT NULL,
  `TenSP` varchar(50) NOT NULL,
  `DonGia` int(100) NOT NULL,
  `HinhAnh` varchar(50) NOT NULL,
  `TyLeKM` varchar(10) NOT NULL,
  `MaDM` varchar(10) NOT NULL,
  `MoTa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `san_pham`
--

INSERT INTO `san_pham` (`MaSP`, `TenSP`, `DonGia`, `HinhAnh`, `TyLeKM`, `MaDM`, `MoTa`) VALUES
('1', 'Iphone 11', 11000000, 'iphone1.jpg', '1', '1', 'Điện Thoại Của Mỹ'),
('10', 'nokia 820', 1000000, 'nokia4.jpg', '', '3', 'Hàng Hiếm'),
('11', 'SamSung A03s', 3230023, 'samsung1.jpg', '5%', '2', 'Điện Thoại Nhật'),
('12', 'SamSung A12', 3130000, 'samsung2.jpg', '2%', '2', 'Điện Thoại Nhật'),
('13', 'SamSung A', 2160000, 'samsung3.jpg', '10%', '2', 'Điện Thoại Nhật'),
('14', 'SamSung A51', 4300500, 'samsung4.jpg', '10%', '2', 'Điện Thoại Nhật'),
('15', 'SamSung A53', 9200000, 'samsung5.jpg', '10%', '2', 'Điện Thoại Nhật'),
('16', 'Huawei', 4100000, 'huawei1.jpg', '10%', '4', 'Điện Thoại Trung Quốc'),
('17', 'Huawei Nova 7', 6500000, 'huawei2.jpg', '10%', '4', 'Điện Thoại Trung Quốc'),
('18', 'Huawei P30', 3500000, 'huawei3.jpg', '6%', '4', 'Điện Thoại Trung Quốc'),
('19', 'Huawei Nova 3i', 2200000, 'huawei4.jpg', '2%', '4', 'Điện Thoại Trung Quốc'),
('2', 'Iphone 12', 15000000, 'iphone2.jpg', '1%', '1', 'Điện Thoại Của Mỹ'),
('20', 'Huawei 2l', 3000500, 'huawei5.jpg', '3%', '4', 'Điện Thoại Trung Quốc'),
('3', 'iphone13', 22400000, 'iphone3.jpg', '1%', '1', 'Điện Thoại Của Mỹ'),
('4', 'Iphone 11 Pro', 13600000, 'iphone4.jpg', '1%', '1', 'Điện Thoại Của Mỹ'),
('5', 'nokia', 200000, 'nokia.jpg', '2%', '3', 'Điện Thoại Của Mỹ'),
('6', 'Iphone X', 10000000, 'iphone5.jpg', '10%', '1', 'Điện Thoại Của Mỹ'),
('7', 'nokia 105', 495000, 'nokia1.jpg', '2%', '3', 'Điện Thoại Việt Nam'),
('8', 'nokia 216', 695000, 'nokia2.jpg', '4%', '3', 'Điện Thoại Việt Nam'),
('9', 'nokia 130', 4000000, 'nokia3.jpg', '2%', '3', 'Điện Thoại Việt Nam');

-- --------------------------------------------------------

--
-- Table structure for table `tai_khoan`
--

CREATE TABLE `tai_khoan` (
  `MaTK` int(11) NOT NULL,
  `TenDN` varchar(20) NOT NULL,
  `MatKhau` varchar(20) NOT NULL,
  `SoDienThoai` varchar(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `DiaChi` varchar(255) NOT NULL,
  `MaLoaiTK` varchar(10) NOT NULL,
  `TrangThai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tai_khoan`
--

INSERT INTO `tai_khoan` (`MaTK`, `TenDN`, `MatKhau`, `SoDienThoai`, `Email`, `DiaChi`, `MaLoaiTK`, `TrangThai`) VALUES
(4, 'client', '12345', '0384288343', 'client@gmail.com', 'ĐN', '1', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chi_tiet_hoa_don`
--
ALTER TABLE `chi_tiet_hoa_don`
  ADD KEY `MaHD` (`MaHD`),
  ADD KEY `MaSP` (`MaSP`);

--
-- Indexes for table `chi_tiet_khuyen_mai`
--
ALTER TABLE `chi_tiet_khuyen_mai`
  ADD KEY `MaKM` (`MaKM`),
  ADD KEY `MaSP` (`MaSP`);

--
-- Indexes for table `danh_gia`
--
ALTER TABLE `danh_gia`
  ADD PRIMARY KEY (`MaDG`),
  ADD KEY `MaTK` (`MaTK`),
  ADD KEY `MaSP` (`MaSP`);

--
-- Indexes for table `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`MaDM`);

--
-- Indexes for table `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`MaHD`),
  ADD KEY `MaTK` (`MaTK`);

--
-- Indexes for table `khuyen_mai`
--
ALTER TABLE `khuyen_mai`
  ADD PRIMARY KEY (`MaKM`);

--
-- Indexes for table `loai_tai_khoan`
--
ALTER TABLE `loai_tai_khoan`
  ADD PRIMARY KEY (`MaLoaiTK`);

--
-- Indexes for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`MaSP`),
  ADD KEY `MaDM` (`MaDM`);

--
-- Indexes for table `tai_khoan`
--
ALTER TABLE `tai_khoan`
  ADD PRIMARY KEY (`MaTK`),
  ADD KEY `MaLoaiTK` (`MaLoaiTK`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hoa_don`
--
ALTER TABLE `hoa_don`
  MODIFY `MaHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tai_khoan`
--
ALTER TABLE `tai_khoan`
  MODIFY `MaTK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chi_tiet_hoa_don`
--
ALTER TABLE `chi_tiet_hoa_don`
  ADD CONSTRAINT `chi_tiet_hoa_don_ibfk_1` FOREIGN KEY (`MaHD`) REFERENCES `hoa_don` (`MaHD`),
  ADD CONSTRAINT `chi_tiet_hoa_don_ibfk_2` FOREIGN KEY (`MaSP`) REFERENCES `san_pham` (`MaSP`);

--
-- Constraints for table `chi_tiet_khuyen_mai`
--
ALTER TABLE `chi_tiet_khuyen_mai`
  ADD CONSTRAINT `chi_tiet_khuyen_mai_ibfk_1` FOREIGN KEY (`MaKM`) REFERENCES `khuyen_mai` (`MaKM`),
  ADD CONSTRAINT `chi_tiet_khuyen_mai_ibfk_2` FOREIGN KEY (`MaSP`) REFERENCES `san_pham` (`MaSP`);

--
-- Constraints for table `danh_gia`
--
ALTER TABLE `danh_gia`
  ADD CONSTRAINT `danh_gia_ibfk_1` FOREIGN KEY (`MaTK`) REFERENCES `tai_khoan` (`MaTK`),
  ADD CONSTRAINT `danh_gia_ibfk_2` FOREIGN KEY (`MaSP`) REFERENCES `san_pham` (`MaSP`);

--
-- Constraints for table `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD CONSTRAINT `hoa_don_ibfk_1` FOREIGN KEY (`MaTK`) REFERENCES `tai_khoan` (`MaTK`);

--
-- Constraints for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `san_pham_ibfk_1` FOREIGN KEY (`MaDM`) REFERENCES `danh_muc` (`MaDM`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
