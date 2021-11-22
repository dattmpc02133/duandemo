-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 21, 2021 lúc 04:26 PM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ql_noi_that`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binh_luan`
--

CREATE TABLE `binh_luan` (
  `ma_bl` int(11) NOT NULL,
  `noi_dung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_sp` int(11) NOT NULL,
  `ma_kh` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_bl` date NOT NULL,
  `trang_thai` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `binh_luan`
--

INSERT INTO `binh_luan` (`ma_bl`, `noi_dung`, `ma_sp`, `ma_kh`, `ngay_bl`, `trang_thai`) VALUES
(1, 'Sản phẩm đẹp, bền !', 7878788, 'thulv91', '2021-11-16', 'Chờ kiểm duyệt'),
(2, 'Sản phẩm đẹp, nhưng mà hơi nhỏ !', 7878790, 'ngantt89', '2021-11-17', 'Chờ kiểm duyệt'),
(3, 'Mua về treo trong phòng bé cho có màu sắc =))', 7878793, 'hoangduynguyen02', '2021-11-16', 'Chờ kiểm duyệt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_phieu_nhap`
--

CREATE TABLE `chi_tiet_phieu_nhap` (
  `ma_ct_pn` int(11) NOT NULL,
  `ma_pn` int(11) NOT NULL,
  `ma_sp` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `gia` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_phieu_nhap`
--

INSERT INTO `chi_tiet_phieu_nhap` (`ma_ct_pn`, `ma_pn`, `ma_sp`, `so_luong`, `gia`) VALUES
(1, 3, 7878788, 50, 14500000.00),
(2, 1, 7878789, 30, 18400000.00),
(3, 1, 7878790, 100, 300000.00),
(4, 2, 7878791, 50, 5400000.00),
(5, 2, 7878792, 30, 22400000.00),
(6, 2, 7878793, 200, 349000.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_sp`
--

CREATE TABLE `chi_tiet_sp` (
  `ma_sp` int(11) NOT NULL,
  `kich_thuoc` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mau_sac` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chat_lieu` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bao_hanh` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `xuat_xu` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_sp`
--

INSERT INTO `chi_tiet_sp` (`ma_sp`, `kich_thuoc`, `mau_sac`, `chat_lieu`, `bao_hanh`, `xuat_xu`) VALUES
(7878788, '50x50x60 cm', 'Màu đỏ gỗ Xoan đào', 'Gỗ xoan đào', '5 năm', 'Việt Nam'),
(7878789, '2x1,8 m', 'Trắng', 'MDF chống ẩm', '5 năm', 'Đài Loan'),
(7878790, '22x35 cm', 'Xám nhạt', 'Chụp đèn: Vải cao cấp; Thân đèn: Gốm sứ', '1 năm', 'Việt Nam'),
(7878791, '1,8x0,6 m', 'Xám', 'Nệm mút D40 chống xẹp', '1 năm', 'Việt Nam'),
(7878792, '1,9x1,5 m', 'Màu gỗ', 'Gỗ CN Đài Loan', '5 năm', 'Đài Loan'),
(7878793, '40x40 cm', 'Nhiều màu', 'Vải bạt/ gỗ', '1 năm', 'Việt Nam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gio_hang_tam`
--

CREATE TABLE `gio_hang_tam` (
  `id` int(11) NOT NULL,
  `hinh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_sp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `don_gia` double(10,2) NOT NULL,
  `so_luong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinh`
--

CREATE TABLE `hinh` (
  `id` int(11) NOT NULL,
  `ma_sp` int(11) NOT NULL,
  `hinh` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_don`
--

CREATE TABLE `hoa_don` (
  `ma_hd` int(11) NOT NULL,
  `ma_kh` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tong_tien` double(10,2) NOT NULL,
  `dia_chi_giao_hang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_dat` date NOT NULL,
  `trang_thai` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoa_don`
--

INSERT INTO `hoa_don` (`ma_hd`, `ma_kh`, `tong_tien`, `dia_chi_giao_hang`, `ngay_dat`, `trang_thai`) VALUES
(1, 'thulv91', 20400000.00, 'Hẻm 112, đường 3 Tháng 2, P. Hưng Lợi, Q. Ninh Kiều, TP. Cần Thơ', '2021-11-16', 'Đang giao hàng'),
(2, 'ngantt89', 355000.00, 'KDC Đại Ngân, P. An Khánh, Q. Ninh Kiều, TP. Cần Thơ', '2021-11-17', 'Đang xử lý'),
(3, 'hoangduynguyen02', 399000.00, 'Khóm 2, Phường 2, Thị xã Ngã Năm, Sóc Trăng', '2021-11-16', 'Đang giao hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_don_chi_tiet`
--

CREATE TABLE `hoa_don_chi_tiet` (
  `id` int(11) NOT NULL,
  `ma_hd` int(11) NOT NULL,
  `ma_sp` int(11) NOT NULL,
  `gia_ban` double(10,2) NOT NULL,
  `so_luong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoa_don_chi_tiet`
--

INSERT INTO `hoa_don_chi_tiet` (`id`, `ma_hd`, `ma_sp`, `gia_ban`, `so_luong`) VALUES
(1, 1, 7878788, 1500000.00, 1),
(2, 1, 7878789, 18900000.00, 1),
(3, 2, 7878790, 710000.00, 2),
(4, 3, 7878793, 399000.00, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `ma_kh` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mat_khau` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ho_ten` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_chi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kich_hoat` tinyint(1) NOT NULL,
  `hinh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vai_tro` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`ma_kh`, `mat_khau`, `ho_ten`, `dia_chi`, `kich_hoat`, `hinh`, `email`, `vai_tro`) VALUES
('hoangduynguyen02', 'duynh2604', 'Nguyễn Hoàng Duy', 'Phường 2, Thị xã Ngã Năm, Sóc Trăng', 1, 'user.png', 'duynh2604@gmail.com', 0),
('ngantt89', 'tranthingan99', 'Trần Thị Ngân', 'KDC Đại Ngân, P. An Khánh, Q. Ninh Kiều, TP. Cần Thơ', 1, 'user.png', 'ngantt989@gmail.com', 0),
('thulv91', 'thulv123', 'Lê Văn Thư', 'Hẻm 112, đường 3 Tháng 2, P. Hưng Lợi, Q. Ninh Kiều, TP. Cần Thơ', 1, 'user.png', 'thulv991@gmail.com', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyen_mai`
--

CREATE TABLE `khuyen_mai` (
  `ma_km` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinh_thuc` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_bat_dau` date NOT NULL,
  `ngay_ket_thuc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khuyen_mai`
--

INSERT INTO `khuyen_mai` (`ma_km`, `hinh_thuc`, `ngay_bat_dau`, `ngay_ket_thuc`) VALUES
('GIAM10%', 'Giảm 10% (sản phẩm)', '2021-12-18', '2021-12-25'),
('KM5T5', 'Giảm 10% tổng hóa đơn', '2021-06-07', '2021-11-14'),
('KMTET20', 'Giảm 20% tổng hóa đơn', '2020-12-26', '2020-02-10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyen_mai_ct`
--

CREATE TABLE `khuyen_mai_ct` (
  `id` int(11) NOT NULL,
  `ma_km` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_sp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khuyen_mai_ct`
--

INSERT INTO `khuyen_mai_ct` (`id`, `ma_km`, `ma_sp`) VALUES
(4, 'KM5T5', 7878792),
(5, 'KMTET20', 7878789),
(6, 'KM5T5', 7878788),
(7, 'KM5T5', 7878789),
(8, 'KMTET20', 7878790);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

CREATE TABLE `loai` (
  `ma_loai` int(11) NOT NULL,
  `ten_loai` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinh` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loai`
--

INSERT INTO `loai` (`ma_loai`, `ten_loai`, `hinh`) VALUES
(1, 'Sản phẩm phòng khách', 'sp-phong-khach.jpg'),
(2, 'Sản phẩm phòng ngủ', 'sp-phong-ngu.jpg'),
(3, 'Phụ kiện trang trí', 'phu-kien-trang-tri.jpg'),
(5, 'Ghế sofa', 'sp7-1_83fd0de6ab8b437d9b28cf50ad5e69cb_master.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nha_cung_cap`
--

CREATE TABLE `nha_cung_cap` (
  `ma_ncc` int(11) NOT NULL,
  `ten_ncc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_chi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` int(15) NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nha_cung_cap`
--

INSERT INTO `nha_cung_cap` (`ma_ncc`, `ten_ncc`, `dia_chi`, `sdt`, `email`) VALUES
(1, 'Nội thất Hòa Phát - Sóc Trăng', '199 Nguyễn Trung Trực, Phường 2, TP. Sóc Trăng, Tỉnh Sóc Trăng', 943654983, 'hoaphatsoctrang@gmail.com'),
(2, 'Nội thất Tân Á - Cần Thơ', '189 3 Tháng 2, Phường Hưng Lợi, Quận Ninh Kiều, TP. Cần Thơ', 988661060, 'tanacantho@gmail.com'),
(3, 'Đồ gỗ Hà Phát', '250 QL1A, Khóm 1, Phường 7, TP. Sóc Trăng, Tỉnh Sóc Trăng', 398534424, 'dogohaphat@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieu_nhap`
--

CREATE TABLE `phieu_nhap` (
  `ma_pn` int(11) NOT NULL,
  `ngay_nhap` date NOT NULL,
  `ma_ncc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phieu_nhap`
--

INSERT INTO `phieu_nhap` (`ma_pn`, `ngay_nhap`, `ma_ncc`) VALUES
(1, '2021-07-15', 1),
(2, '2021-07-16', 2),
(3, '2021-07-15', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
--

CREATE TABLE `san_pham` (
  `ma_sp` int(11) NOT NULL,
  `ten_sp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `don_gia` double(10,2) NOT NULL,
  `giam_gia` double(10,2) DEFAULT NULL,
  `so_luong` int(11) NOT NULL,
  `trang_thai` tinyint(1) NOT NULL,
  `dac_biet` tinyint(1) NOT NULL,
  `so_luot_mua` int(11) NOT NULL DEFAULT 0,
  `ma_loai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`ma_sp`, `ten_sp`, `don_gia`, `giam_gia`, `so_luong`, `trang_thai`, `dac_biet`, `so_luot_mua`, `ma_loai`) VALUES
(7878788, 'Tủ đầu giường 3 hộc trơn', 1500000.00, NULL, 50, 1, 0, 0, 1),
(7878789, 'Giường ngủ tân cổ điển', 18900000.00, NULL, 30, 1, 0, 0, 2),
(7878790, 'Đèn ngủ để bàn chân sứ tròn', 355000.00, NULL, 100, 1, 0, 0, 3),
(7878791, 'Sofa băng Tân Á', 5900000.00, NULL, 50, 1, 0, 0, 1),
(7878792, 'Giường hiện đại cho trẻ em', 22900000.00, NULL, 30, 1, 0, 0, 2),
(7878793, 'Tranh canvas - Kool (Bộ 3 tranh)', 399000.00, NULL, 200, 1, 0, 0, 3);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`ma_bl`),
  ADD KEY `ma_sp` (`ma_sp`,`ma_kh`),
  ADD KEY `ma_kh` (`ma_kh`);

--
-- Chỉ mục cho bảng `chi_tiet_phieu_nhap`
--
ALTER TABLE `chi_tiet_phieu_nhap`
  ADD PRIMARY KEY (`ma_ct_pn`),
  ADD KEY `ma_pn` (`ma_pn`,`ma_sp`),
  ADD KEY `ma_sp` (`ma_sp`);

--
-- Chỉ mục cho bảng `chi_tiet_sp`
--
ALTER TABLE `chi_tiet_sp`
  ADD PRIMARY KEY (`ma_sp`);

--
-- Chỉ mục cho bảng `gio_hang_tam`
--
ALTER TABLE `gio_hang_tam`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hinh`
--
ALTER TABLE `hinh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ma_sp` (`ma_sp`);

--
-- Chỉ mục cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`ma_hd`),
  ADD KEY `ma_kh` (`ma_kh`);

--
-- Chỉ mục cho bảng `hoa_don_chi_tiet`
--
ALTER TABLE `hoa_don_chi_tiet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ma_hd` (`ma_hd`,`ma_sp`),
  ADD KEY `ma_sp` (`ma_sp`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`ma_kh`);

--
-- Chỉ mục cho bảng `khuyen_mai`
--
ALTER TABLE `khuyen_mai`
  ADD PRIMARY KEY (`ma_km`);

--
-- Chỉ mục cho bảng `khuyen_mai_ct`
--
ALTER TABLE `khuyen_mai_ct`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ma_km` (`ma_km`),
  ADD KEY `ma_sp` (`ma_sp`);

--
-- Chỉ mục cho bảng `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`ma_loai`);

--
-- Chỉ mục cho bảng `nha_cung_cap`
--
ALTER TABLE `nha_cung_cap`
  ADD PRIMARY KEY (`ma_ncc`);

--
-- Chỉ mục cho bảng `phieu_nhap`
--
ALTER TABLE `phieu_nhap`
  ADD PRIMARY KEY (`ma_pn`),
  ADD KEY `ma_ncc` (`ma_ncc`);

--
-- Chỉ mục cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`ma_sp`),
  ADD KEY `ma_loai` (`ma_loai`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `ma_bl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `chi_tiet_phieu_nhap`
--
ALTER TABLE `chi_tiet_phieu_nhap`
  MODIFY `ma_ct_pn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `gio_hang_tam`
--
ALTER TABLE `gio_hang_tam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hinh`
--
ALTER TABLE `hinh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  MODIFY `ma_hd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `hoa_don_chi_tiet`
--
ALTER TABLE `hoa_don_chi_tiet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `khuyen_mai_ct`
--
ALTER TABLE `khuyen_mai_ct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `loai`
--
ALTER TABLE `loai`
  MODIFY `ma_loai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `nha_cung_cap`
--
ALTER TABLE `nha_cung_cap`
  MODIFY `ma_ncc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `phieu_nhap`
--
ALTER TABLE `phieu_nhap`
  MODIFY `ma_pn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `ma_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7878827;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD CONSTRAINT `binh_luan_ibfk_1` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`ma_kh`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `binh_luan_ibfk_2` FOREIGN KEY (`ma_sp`) REFERENCES `san_pham` (`ma_sp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `chi_tiet_phieu_nhap`
--
ALTER TABLE `chi_tiet_phieu_nhap`
  ADD CONSTRAINT `chi_tiet_phieu_nhap_ibfk_1` FOREIGN KEY (`ma_pn`) REFERENCES `phieu_nhap` (`ma_pn`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chi_tiet_phieu_nhap_ibfk_2` FOREIGN KEY (`ma_sp`) REFERENCES `san_pham` (`ma_sp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `chi_tiet_sp`
--
ALTER TABLE `chi_tiet_sp`
  ADD CONSTRAINT `chi_tiet_sp_ibfk_1` FOREIGN KEY (`ma_sp`) REFERENCES `san_pham` (`ma_sp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hinh`
--
ALTER TABLE `hinh`
  ADD CONSTRAINT `hinh_ibfk_1` FOREIGN KEY (`ma_sp`) REFERENCES `san_pham` (`ma_sp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD CONSTRAINT `hoa_don_ibfk_1` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`ma_kh`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hoa_don_chi_tiet`
--
ALTER TABLE `hoa_don_chi_tiet`
  ADD CONSTRAINT `hoa_don_chi_tiet_ibfk_1` FOREIGN KEY (`ma_hd`) REFERENCES `hoa_don` (`ma_hd`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hoa_don_chi_tiet_ibfk_2` FOREIGN KEY (`ma_sp`) REFERENCES `san_pham` (`ma_sp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `khuyen_mai_ct`
--
ALTER TABLE `khuyen_mai_ct`
  ADD CONSTRAINT `khuyen_mai_ct_ibfk_1` FOREIGN KEY (`ma_km`) REFERENCES `khuyen_mai` (`ma_km`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `khuyen_mai_ct_ibfk_2` FOREIGN KEY (`ma_sp`) REFERENCES `san_pham` (`ma_sp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `phieu_nhap`
--
ALTER TABLE `phieu_nhap`
  ADD CONSTRAINT `phieu_nhap_ibfk_1` FOREIGN KEY (`ma_ncc`) REFERENCES `nha_cung_cap` (`ma_ncc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `san_pham_ibfk_1` FOREIGN KEY (`ma_loai`) REFERENCES `loai` (`ma_loai`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
