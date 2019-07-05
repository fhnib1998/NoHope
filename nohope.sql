-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 03, 2019 lúc 10:24 AM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nohope`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diemdanh`
--

CREATE TABLE `diemdanh` (
  `tk` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `lop` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `buoi` int(2) NOT NULL,
  `dd` int(2) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `diemdanh`
--

INSERT INTO `diemdanh` (`tk`, `lop`, `buoi`, `dd`) VALUES
('CT1', 'Test', 1, 0),
('CT3', 'Test', 1, 1),
('CT4', 'Test', 1, 1),
('CT6', 'Test', 1, 0),
('CT1', 'Test', 2, 1),
('CT3', 'Test', 2, 0),
('CT4', 'Test', 2, 0),
('CT6', 'Test', 2, 1),
('CT4', 'Test', 3, 1),
('CT6', 'Test', 3, 1),
('CT1', 'Test', 3, 1),
('CT3', 'Test', 3, 1),
('CT3', 'Test', 4, 1),
('CT1', 'Test', 4, 1),
('CT4', 'Test', 4, 1),
('CT6', 'Test', 4, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `doanhthu`
--

CREATE TABLE `doanhthu` (
  `thang` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `thu` double NOT NULL DEFAULT '0',
  `chi` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `doanhthu`
--

INSERT INTO `doanhthu` (`thang`, `thu`, `chi`) VALUES
('06/2019', 1200000, 200000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giaovien`
--

CREATE TABLE `giaovien` (
  `tk` char(25) COLLATE utf8_unicode_ci NOT NULL,
  `mk` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `hoten` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ngaysinh` char(12) COLLATE utf8_unicode_ci NOT NULL,
  `gioitinh` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `trinhdo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lop` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `chuatra` double NOT NULL DEFAULT '0',
  `sotk` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sobuoiday` int(4) NOT NULL,
  `datra` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giaovien`
--

INSERT INTO `giaovien` (`tk`, `mk`, `hoten`, `ngaysinh`, `gioitinh`, `sdt`, `trinhdo`, `avatar`, `lop`, `chuatra`, `sotk`, `sobuoiday`, `datra`) VALUES
('giaovien1', '1', 'Hoàng Thanh Bình', '12/03/1998', 'Nam', '01683173311', 'ILETS:8.5', '../uploads/ramR.jpg', '  HHH, CT1C2, Test,  CT1B.1,', 0, '123456789', 1, 100000),
('giaovien2', '1', 'Hoàng Tiến Bình', '24/10/1998', 'Nam', '0971545577', 'ILETS:8.0', '../uploads/ramG.jpg', 'GG, CT1C.2,', 0, '987654321', 0, 0),
('giaovien3', '1', 'Nguyễn Hữu Khải', '23/07/1998', 'Nam', '0967019040', 'ILETS:9.0', '../uploads/anime3.jpg', 'GG, CT1A.1, ', 0, '159357852', 0, 0),
('giaovien4', '1', 'Nguyễn Quốc Hiếu', '09/02/1995', 'Nam', '123456789', '1 Tỷ Toeic', '../uploads/logo.png', 'GG, ', 0, '987654321', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocvien`
--

CREATE TABLE `hocvien` (
  `tk` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `mk` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `hoten` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ngaysinh` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `gioitinh` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `gmail` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `lop` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nghi` int(11) NOT NULL DEFAULT '0',
  `avatar` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `hoc` int(3) NOT NULL DEFAULT '0',
  `nop` double NOT NULL DEFAULT '0',
  `chuanop` double NOT NULL,
  `giamgia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hocvien`
--

INSERT INTO `hocvien` (`tk`, `mk`, `hoten`, `ngaysinh`, `gioitinh`, `sdt`, `gmail`, `lop`, `nghi`, `avatar`, `hoc`, `nop`, `chuanop`, `giamgia`) VALUES
('CT1', '1', 'Phạm Khánh An', '12/03/1998', 'Nam', '0383173311', 'fhnibkma@gmail.com', 'Test', 1, '', 3, 50000, 70000, 20),
('CT2', '1', 'Đào Văn Công', '02/02/1998', 'Nữ', '083658554', 'rearchforme@gmail.com', ' Test', 2, '', 0, 0, 0, 0),
('CT3', '1', 'Hoàng Thanh Bình', '12/03/1998', 'Nam', '01683173311', 'fhnibkma@gmail.com', 'Test   CT1B.1', 1, '', 3, 200000, -125000, 50),
('CT4', '1', 'Nguyễn Hữu Khải', '23/07/1998', 'Nam', '01683173311', 'fhnibkma@gmail.com', 'Test', 1, '', 3, 0, 105000, 30),
('CT5', '1', 'Test', 'test', 'Nam', 'test', 'fhnibkma@gmail.com', '  CT1A.1', 0, '', 0, 0, 0, 68),
('CT6', '1', 'Bình Hoàng', '06/12/2019', 'Nam', '01683173311', 'fhnibkma@gmail.com', ' ', 1, '', 3, 1000000, -925000, 50);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoahoc`
--

CREATE TABLE `khoahoc` (
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khoahoc`
--

INSERT INTO `khoahoc` (`image`) VALUES
('../uploads/30904.jpg'),
('../uploads/30932.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichhoc`
--

CREATE TABLE `lichhoc` (
  `lop` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `buoi` int(5) NOT NULL,
  `ngay` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lichhoc`
--

INSERT INTO `lichhoc` (`lop`, `buoi`, `ngay`) VALUES
('Test', 1, '06/03/2019'),
('Test', 2, '06/05/2019'),
('Test', 3, '06/07/2019'),
('Test', 4, '06/10/2019'),
('Test', 5, '06/12/2019'),
('Test', 6, '06/14/2019'),
('Test', 7, '06/17/2019'),
('CT1C.2', 1, '06/12/2019'),
('CT1C.2', 2, '06/14/2019'),
('CT1C.2', 3, '06/16/2019'),
('CT1C.2', 4, '06/19/2019'),
('CT1C.2', 5, '06/21/2019'),
('CT1C.2', 6, '06/23/2019'),
('CT1C.2', 7, '06/26/2019'),
('CT1A.1', 1, '06/03/2019'),
('CT1A.1', 2, '06/05/2019'),
('CT1A.1', 3, '06/07/2019'),
('CT1A.1', 4, '06/10/2019'),
('CT1A.1', 5, '06/12/2019'),
('CT1A.1', 6, '06/14/2019'),
('CT1A.1', 7, '06/17/2019'),
('CT1A.1', 8, '06/19/2019'),
('CT1A.1', 9, '06/21/2019'),
('CT1A.1', 10, '06/24/2019'),
('CT1A.1', 11, '06/26/2019'),
('CT1A.1', 12, '06/28/2019'),
('CT1A.1', 13, '07/07/2019'),
('CT1A.1', 14, '07/14/2019'),
('CT1A.1', 15, '07/21/2019'),
('CT1A.1', 16, '07/28/2019');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop`
--

CREATE TABLE `lop` (
  `tenlop` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `giaovien` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `phonghoc` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `khaigiang` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `doituong` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `siso` int(11) NOT NULL,
  `cahoc` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `hocphi` double NOT NULL DEFAULT '0',
  `luong` double NOT NULL,
  `dong` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lop`
--

INSERT INTO `lop` (`tenlop`, `giaovien`, `phonghoc`, `khaigiang`, `doituong`, `siso`, `cahoc`, `hocphi`, `luong`, `dong`) VALUES
('CT1A.1', 'Nguyễn Hữu Khải', '103 TA2', '06/19/2019', 'Đứa nào cũng được', 2, '7h-9h', 0, 0, 0),
('CT1B.1', 'Hoàng Thanh BÌnh', '102 TA2', '06/18/2019', '6-10 tuổi', 1, '15h-17h', 0, 0, 1),
('CT1C.2', 'Hoàng Tiến Bình', '103 TA2', '06/16/2019', 'Lớp 3', 0, '14h-16h', 0, 0, 0),
('GG', 'Nguyễn Quốc Hiếu', '202 TA2', '06/21/2019', 'Lớp 3', 0, '2', 50000, 400000, 0),
('Test', 'Hoàng Thanh Bình', '202-TA2', '06/20/2019', '6-10 tuổi', -2, '18h-20h', 50000, 100000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhvien`
--

CREATE TABLE `thanhvien` (
  `tk` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `mk` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `quyen` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thanhvien`
--

INSERT INTO `thanhvien` (`tk`, `mk`, `quyen`) VALUES
('admin', 'admin', 'admin'),
('CT1', '1', 'hv'),
('CT1C01', '1', 'hv'),
('CT1C02', '1', 'hv'),
('CT1C03', '1', 'hv'),
('CT1C04', '1', 'hv'),
('CT1C05', '1', 'hv'),
('CT1C06', '1', 'hv'),
('CT1C07', '1', 'hv'),
('CT1C08', '1', 'hv'),
('CT1C10', '1', 'hv'),
('CT1D01', '1', 'hv'),
('CT1D02', '1', 'hv'),
('CT2', '1', 'hv'),
('CT3', '1', 'hv'),
('CT4', '1', 'hv'),
('CT5', '1', 'hv'),
('CT6', '1', 'hv'),
('gg', 'gg', 'hv'),
('giaovien1', '1', 'gv'),
('giaovien2', '1', 'gv'),
('giaovien3', '1', 'gv'),
('giaovien4', '1', 'gv'),
('hocvien', 'hocvirn', 'hv'),
('hocvien2', 'hocvien', 'hv'),
('test', '1', 'hv');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongke`
--

CREATE TABLE `thongke` (
  `thang` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ngay` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `noidung` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lop` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tien` double NOT NULL,
  `trangthai` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thongke`
--

INSERT INTO `thongke` (`thang`, `ngay`, `noidung`, `lop`, `tien`, `trangthai`) VALUES
('06/2019', '06/25/2019', 'Trả lương giáo viên Hoàng Thanh Bình', '', 100000, 'Chi'),
('06/2019', '06/25/2019', 'Học viên Bình Hoàng nộp', 'Test  Test', 500000, 'Thu'),
('06/2019', '06/25/2019', 'Học viên Hoàng Thanh Bình nộp', 'Test   CT1B.1', 200000, 'Thu'),
('06/2019', '06/25/2019', 'Học viên Bình Hoàng nộp', 'Test  Test', 500000, 'Thu'),
('06/2019', '06/25/2019', 'Trả lương giáo viên Hoàng Thanh Bình', '', 100000, 'Chi');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `diemdanh`
--
ALTER TABLE `diemdanh`
  ADD KEY `k1` (`tk`),
  ADD KEY `k2` (`lop`);

--
-- Chỉ mục cho bảng `giaovien`
--
ALTER TABLE `giaovien`
  ADD PRIMARY KEY (`tk`);

--
-- Chỉ mục cho bảng `hocvien`
--
ALTER TABLE `hocvien`
  ADD PRIMARY KEY (`tk`);

--
-- Chỉ mục cho bảng `khoahoc`
--
ALTER TABLE `khoahoc`
  ADD PRIMARY KEY (`image`);

--
-- Chỉ mục cho bảng `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`tenlop`);

--
-- Chỉ mục cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD PRIMARY KEY (`tk`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `diemdanh`
--
ALTER TABLE `diemdanh`
  ADD CONSTRAINT `k1` FOREIGN KEY (`tk`) REFERENCES `hocvien` (`tk`),
  ADD CONSTRAINT `k2` FOREIGN KEY (`lop`) REFERENCES `lop` (`tenlop`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
