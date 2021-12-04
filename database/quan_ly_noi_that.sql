-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 03, 2021 lúc 04:10 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.3.31

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
  `ma_sp` int(11) DEFAULT NULL,
  `ma_tin_tuc` int(11) DEFAULT NULL,
  `ma_kh` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_bl` date NOT NULL,
  `trang_thai` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `binh_luan`
--

INSERT INTO `binh_luan` (`ma_bl`, `noi_dung`, `ma_sp`, `ma_tin_tuc`, `ma_kh`, `ngay_bl`, `trang_thai`) VALUES
(5, 'abc', 7878867, NULL, 'duynh2', '2021-12-02', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_phieu_nhap`
--

CREATE TABLE `chi_tiet_phieu_nhap` (
  `ma_ct_pn` int(11) NOT NULL,
  `ma_pn` int(11) NOT NULL,
  `ma_sp` int(11) NOT NULL,
  `so_luong_nhap` int(11) NOT NULL,
  `gia` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gio_hang_tam`
--

CREATE TABLE `gio_hang_tam` (
  `id` int(11) NOT NULL,
  `ma_kh` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_sp_tam` int(11) NOT NULL,
  `hinh_tam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_sp_tam` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `don_gia_tam` double(10,2) NOT NULL,
  `so_luong_tam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinh`
--

CREATE TABLE `hinh` (
  `id` int(11) NOT NULL,
  `ma_sp` int(11) NOT NULL,
  `hinh_phu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hinh`
--

INSERT INTO `hinh` (`id`, `ma_sp`, `hinh_phu`) VALUES
(16, 7878857, 'sp6-1_fa3959f8d78047608cc52380bf7a5069_master (1).jpg'),
(17, 7878858, 'sp10-2_a745f85b63f5497793be87949deb1a7b_master.jpg'),
(18, 7878859, 'sp9-2_5cbcdc59238643d4a639ccc4278a6492_master.jpg'),
(19, 7878860, 'sp7-2_811c15bd83e24680ae35695c8e939f69_master.jpg'),
(20, 7878861, 'sp10-2_a745f85b63f5497793be87949deb1a7b_master.jpg'),
(21, 7878862, 'sp5-1_655fbdd6a3ba415485ec214fd2a5c4a9_master.jpg'),
(22, 7878863, 'sp4-2_97670563a9c9462e91b405158f85b77a_master (1).jpg'),
(23, 7878864, 'sp8-3_d41cb4efb6174aeda4b57cf6d8a76885_master.jpg'),
(24, 7878864, 'sp8-2_6a27ed54ad9849a3ae439de360094566_master.jpg'),
(25, 7878865, 'sp11-2_d58d2329380c41f1885a093a5cf2f27c_master.jpg'),
(26, 7878866, ''),
(27, 7878867, ''),
(28, 7878868, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_don`
--

CREATE TABLE `hoa_don` (
  `ma_hd` int(11) NOT NULL,
  `ma_kh` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tong_tien` double NOT NULL,
  `dia_chi_giao_hang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_dat` date NOT NULL,
  `trang_thai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoa_don`
--

INSERT INTO `hoa_don` (`ma_hd`, `ma_kh`, `tong_tien`, `dia_chi_giao_hang`, `ngay_dat`, `trang_thai`) VALUES
(55, 'nhanb', 8000000, 'Lương Tâm - Long Mỹ - Hậu Giang', '2021-12-01', 3),
(56, 'nhanb', 510000, 'Lương Tâm - Long Mỹ - Hậu Giang', '2021-12-01', 4),
(57, 'nhanb', 525000, 'Lương Tâm - Long Mỹ - Hậu Giang', '2021-12-01', 4),
(58, 'nhanb', 3200000, 'Lương Tâm - Long Mỹ - Hậu Giang', '2021-12-01', 3),
(59, 'nhanb', 2550000, 'Lương Tâm - Long Mỹ - Hậu Giang', '2021-12-01', 3),
(60, 'nhanb', 850000, 'Lương Tâm - Long Mỹ - Hậu Giang', '2021-12-01', 3),
(61, 'nhanb', 225000, 'Lương Tâm - Long Mỹ - Hậu Giang', '2021-12-01', 3),
(62, 'nhanb', 4000000, 'Lương Tâm - Long Mỹ - Hậu Giang', '2021-12-01', 3),
(63, 'nhanb', 425000, 'Lương Tâm - Long Mỹ - Hậu Giang', '2021-12-01', 3),
(64, 'nhanb', 225000, 'Lương Tâm - Long Mỹ - Hậu Giang', '2021-12-01', 3),
(65, 'test2', 4000000, 'Lương Tâm - Long Mỹ - Hậu Giang', '2021-12-01', 4),
(66, 'test2', 3200000, 'Lương Tâm - Long Mỹ - Hậu Giang', '2021-12-01', 3),
(67, 'test2', 2550000, 'Lương Tâm - Long Mỹ - Hậu Giang', '2021-12-01', 3),
(68, 'nhanb2', 2550000, 'Lương Tâm - Long Mỹ - Hậu Giang', '2021-12-01', 1),
(69, 'test2', 425000, 'Lương Tâm - Long Mỹ - Hậu Giang', '2021-12-01', 4),
(78, 'duynh2', 382500, 'soc trang', '2021-12-03', 1),
(79, 'duynh2', 382500, 'soc trang', '2021-12-03', 1),
(80, 'duynh2', 382500, 'soc trang', '2021-12-03', 1);

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
(87, 55, 7878867, 4000000.00, 2),
(88, 56, 7878861, 510000.00, 1),
(89, 57, 7878864, 525000.00, 1),
(90, 58, 7878860, 3200000.00, 1),
(91, 59, 7878859, 2550000.00, 1),
(92, 60, 7878863, 850000.00, 1),
(93, 61, 7878862, 225000.00, 1),
(94, 62, 7878867, 4000000.00, 1),
(95, 63, 7878865, 425000.00, 1),
(96, 64, 7878862, 225000.00, 1),
(97, 65, 7878867, 4000000.00, 1),
(98, 66, 7878860, 3200000.00, 1),
(99, 67, 7878859, 2550000.00, 1),
(100, 68, 7878859, 2550000.00, 1),
(101, 69, 7878865, 425000.00, 1),
(114, 78, 7878865, 425000.00, 1),
(115, 79, 7878865, 425000.00, 1),
(116, 80, 7878865, 425000.00, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `ma_kh` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mat_khau` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ho_ten` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_chi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kich_hoat` tinyint(1) NOT NULL,
  `hinh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt_kh` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vai_tro` tinyint(1) NOT NULL,
  `danh_gia` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`ma_kh`, `mat_khau`, `ho_ten`, `dia_chi`, `kich_hoat`, `hinh`, `email`, `sdt_kh`, `vai_tro`, `danh_gia`) VALUES
('duynh2', '202cb962ac59075b964b07152d234b70', 'duynh', 'soc trang', 1, 'draconic.png', 'duynh2@gmail.com', '0987654322', 1, 1),
('hoangduytp1', '70c094c71c6dde0131657ea04ff32fe0', 'Nguyễn Hoàng Duy', 'Sóc Trăng', 1, '', 'duynh456@gmail.com', '0946636842', 0, 1),
('hoangduytp3', '70c094c71c6dde0131657ea04ff32fe0', 'Nguyễn Hoàng Duy', 'Sóc Trăng', 1, '', 'duynh567@gmail.com', '0987456323', 0, 1),
('MinhDat', 'admin', 'DatG', 'Cần Thơ', 1, '2.jpg', 'dattmpc02133@fpt.edu.vn', '0987654555', 1, 1),
('nhanb', '1bbd886460827015e5d605ed44252251', 'Nguyễn Bá Nha', 'Lương Tâm - Long Mỹ - Hậu Giang', 0, 'tintuc2 (1).png', 'nhanbpc0136@fpt.edu.vn', '0987654333', 0, 0),
('nhanb2', '1bbd886460827015e5d605ed44252251', 'Nguyễn Bá Nha', 'Lương Tâm - Long Mỹ - Hậu Giang', 1, 'tintuc2.png', 'nhanbpc01368@fpt.edu.vn', '0987654321', 1, 1),
('test2', '1bbd886460827015e5d605ed44252251', 'Nguyễn Bá Nha', 'Lương Tâm - Long Mỹ - Hậu Giang', 0, 'tintuc2 (1).png', 'nhanbpc0@fpt.edu.vn', '0987654324', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyen_mai`
--

CREATE TABLE `khuyen_mai` (
  `ma_km` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_kh_ap_dung` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_phan_tram_giam` int(11) NOT NULL,
  `ngay_bat_dau` date NOT NULL,
  `ngay_ket_thuc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khuyen_mai`
--

INSERT INTO `khuyen_mai` (`ma_km`, `ma_kh_ap_dung`, `so_phan_tram_giam`, `ngay_bat_dau`, `ngay_ket_thuc`) VALUES
('GIAM10%', 'duynh2', 10, '2021-12-03', '2021-12-10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

CREATE TABLE `loai` (
  `ma_loai` int(11) NOT NULL,
  `ten_loai` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinh_loai_sp` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loai`
--

INSERT INTO `loai` (`ma_loai`, `ten_loai`, `hinh_loai_sp`) VALUES
(1, 'Phòng khách', 'img_collection_info_2.jpg'),
(3, 'Trang trí', 'img_collection_info_1.jpg'),
(8, 'Khuyến mãi', 'img_banner_center_2.jpg'),
(9, 'Sản phẩm mới', 'img_banner_center_1.jpg'),
(10, 'Nhà bếp', 'img_banner_center_3.jpg'),
(11, 'Ghế phụ', 'img_collection_info_3.jpg'),
(12, 'Phòng làm việc', 'img_collection_info_4.jpg'),
(15, 'Phòng ngủ', 'thiet-ke-phong-ngu-cho-co-nang-16-tuoi-1-3.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nha_cung_cap`
--

CREATE TABLE `nha_cung_cap` (
  `ma_ncc` int(11) NOT NULL,
  `ten_ncc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_chi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nha_cung_cap`
--

INSERT INTO `nha_cung_cap` (`ma_ncc`, `ten_ncc`, `dia_chi`, `sdt`, `email`) VALUES
(1, 'Nội thất Hòa Phát - Sóc Trăng', '199 Nguyễn Trung Trực, Phường 2, TP. Sóc Trăng, Tỉnh Sóc Trăng', '943654983', 'hoaphatsoctrang@gmail.com'),
(2, 'Nội thất Tân Á - Cần Thơ', '189 3 Tháng 2, Phường Hưng Lợi, Quận Ninh Kiều, TP. Cần Thơ', '988661060', 'tanacantho@gmail.com'),
(3, 'Đồ gỗ Hà Phát', '250 QL1A, Khóm 1, Phường 7, TP. Sóc Trăng, Tỉnh Sóc Trăng', '398534424', 'dogohaphat@gmail.com');

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
(4, '2021-11-24', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
--

CREATE TABLE `san_pham` (
  `ma_sp` int(11) NOT NULL,
  `ten_sp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `don_gia` double(10,2) NOT NULL,
  `giam_gia` int(11) DEFAULT NULL,
  `hinh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_luong` int(11) NOT NULL,
  `trang_thai` tinyint(1) NOT NULL,
  `dac_biet` tinyint(1) NOT NULL,
  `so_luot_mua` int(11) NOT NULL DEFAULT 0,
  `ma_loai` int(11) NOT NULL,
  `mo_ta` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`ma_sp`, `ten_sp`, `don_gia`, `giam_gia`, `hinh`, `so_luong`, `trang_thai`, `dac_biet`, `so_luot_mua`, `ma_loai`, `mo_ta`) VALUES
(7878857, 'Thang gỗ nhỏ', 150000.00, 0, 'sp6-2_d93f18674a124e48879a4955599e68eb_master.jpg', 18, 1, 0, 2, 12, '<p>D&ograve;ng sản phẩm&nbsp;xuất khẩu&nbsp;được sản xuất tại Nh&agrave; M&aacute;y Việt Nam&nbsp;theo ti&ecirc;u chuẩn Ch&acirc;u &Acirc;u. Nguồn gốc nguy&ecirc;n vật liệu cũng như chất lượng,&nbsp;độ bền sản phẩm đ&atilde; được kiểm chứng bởi c&aacute;c nh&agrave; nhập khẩu &Acirc;u Mỹ</p>\r\n\r\n<p>CHẤT LIỆU</p>\r\n\r\n<p>Khung sườn: gỗ dầu&nbsp;(Việt Nam) đ&atilde; xử l&yacute; mối mọt theo ti&ecirc;u chuẩn xuất khẩu Ch&acirc;u &Acirc;u<br />\r\nNệm m&uacute;t: nhập khẩu từ Malaysia<br />\r\nChỉ may: nhập khẩu từ Anh Quốc<br />\r\nDa/ PVC/ Vải:&nbsp;Da B&ograve; nhập khẩu từ &Yacute;/ PVC nhập khẩu từ Th&aacute;i Lan/ Vải nhập khẩu từ H&agrave;n Quốc</p>\r\n'),
(7878858, 'Ghế tựa lưng phòng khách', 2400000.00, 25, 'sp10-1_bee2a9c0558d4324bf174ec4dca83071_master (1).jpg', 30, 1, 0, 0, 8, '<p>D&ograve;ng sản phẩm&nbsp;xuất khẩu&nbsp;được sản xuất tại Nh&agrave; M&aacute;y Việt Nam&nbsp;theo ti&ecirc;u chuẩn Ch&acirc;u &Acirc;u. Nguồn gốc nguy&ecirc;n vật liệu cũng như chất lượng,&nbsp;độ bền sản phẩm đ&atilde; được kiểm chứng bởi c&aacute;c nh&agrave; nhập khẩu &Acirc;u Mỹ</p>\r\n\r\n<p>CHẤT LIỆU</p>\r\n\r\n<p>Khung sườn: gỗ dầu&nbsp;(Việt Nam) đ&atilde; xử l&yacute; mối mọt theo ti&ecirc;u chuẩn xuất khẩu Ch&acirc;u &Acirc;u<br />\r\nNệm m&uacute;t: nhập khẩu từ Malaysia<br />\r\nChỉ may: nhập khẩu từ Anh Quốc<br />\r\nDa/ PVC/ Vải:&nbsp;Da B&ograve; nhập khẩu từ &Yacute;/ PVC nhập khẩu từ Th&aacute;i Lan/ Vải nhập khẩu từ H&agrave;n Quốc</p>\r\n'),
(7878859, 'Ghế Sofa phòng khách S003', 3000000.00, 15, 'sp9-1_a13a66828d904b0388e03b4b12fdbea0_master.jpg', 27, 1, 0, 3, 8, '<p>D&ograve;ng sản phẩm&nbsp;xuất khẩu&nbsp;được sản xuất tại Nh&agrave; M&aacute;y Việt Nam&nbsp;theo ti&ecirc;u chuẩn Ch&acirc;u &Acirc;u. Nguồn gốc nguy&ecirc;n vật liệu cũng như chất lượng,&nbsp;độ bền sản phẩm đ&atilde; được kiểm chứng bởi c&aacute;c nh&agrave; nhập khẩu &Acirc;u Mỹ</p>\r\n\r\n<p>CHẤT LIỆU</p>\r\n\r\n<p>Khung sườn: gỗ dầu&nbsp;(Việt Nam) đ&atilde; xử l&yacute; mối mọt theo ti&ecirc;u chuẩn xuất khẩu Ch&acirc;u &Acirc;u<br />\r\nNệm m&uacute;t: nhập khẩu từ Malaysia<br />\r\nChỉ may: nhập khẩu từ Anh Quốc<br />\r\nDa/ PVC/ Vải:&nbsp;Da B&ograve; nhập khẩu từ &Yacute;/ PVC nhập khẩu từ Th&aacute;i Lan/ Vải nhập khẩu từ H&agrave;n Quốc</p>\r\n'),
(7878860, 'Ghế sofa giường kéo Roots', 4000000.00, 20, 'sp7-1_83fd0de6ab8b437d9b28cf50ad5e69cb_master (1).jpg', 23, 1, 0, 2, 8, '<p>D&ograve;ng sản phẩm&nbsp;xuất khẩu&nbsp;được sản xuất tại Nh&agrave; M&aacute;y Việt Nam&nbsp;theo ti&ecirc;u chuẩn Ch&acirc;u &Acirc;u. Nguồn gốc nguy&ecirc;n vật liệu cũng như chất lượng,&nbsp;độ bền sản phẩm đ&atilde; được kiểm chứng bởi c&aacute;c nh&agrave; nhập khẩu &Acirc;u Mỹ.</p>\r\n\r\n<p>CHẤT LIỆU</p>\r\n\r\n<p>Khung sườn: gỗ dầu&nbsp;(Việt Nam) đ&atilde; xử l&yacute; mối mọt theo ti&ecirc;u chuẩn xuất khẩu Ch&acirc;u &Acirc;u<br />\r\nNệm m&uacute;t: nhập khẩu từ Malaysia<br />\r\nChỉ may: nhập khẩu từ Anh Quốc<br />\r\nDa/ PVC/ Vải:&nbsp;Da B&ograve; nhập khẩu từ &Yacute;/ PVC nhập khẩu từ Th&aacute;i Lan/ Vải nhập khẩu từ H&agrave;n Quốc</p>\r\n'),
(7878861, 'Ghế phòng khách Arctander', 600000.00, 15, 'sp10-1_bee2a9c0558d4324bf174ec4dca83071_master (1).jpg', 24, 1, 0, 6, 8, '<p>D&ograve;ng sản phẩm&nbsp;xuất khẩu&nbsp;được sản xuất tại Nh&agrave; M&aacute;y Việt Nam&nbsp;theo ti&ecirc;u chuẩn Ch&acirc;u &Acirc;u. Nguồn gốc nguy&ecirc;n vật liệu cũng như chất lượng,&nbsp;độ bền sản phẩm đ&atilde; được kiểm chứng bởi c&aacute;c nh&agrave; nhập khẩu &Acirc;u Mỹ</p>\r\n\r\n<p>CHẤT LIỆU</p>\r\n\r\n<p>Khung sườn: gỗ dầu&nbsp;(Việt Nam) đ&atilde; xử l&yacute; mối mọt theo ti&ecirc;u chuẩn xuất khẩu Ch&acirc;u &Acirc;u<br />\r\nNệm m&uacute;t: nhập khẩu từ Malaysia<br />\r\nChỉ may: nhập khẩu từ Anh Quốc<br />\r\nDa/ PVC/ Vải:&nbsp;Da B&ograve; nhập khẩu từ &Yacute;/ PVC nhập khẩu từ Th&aacute;i Lan/ Vải nhập khẩu từ H&agrave;n Quốc</p>\r\n'),
(7878862, 'Ghế gỗ bập bênh Iconic', 300000.00, 25, 'sp5-2_fde6cf697c5343489c0715a2a77c9161_master.jpg', 10, 1, 0, 10, 3, ''),
(7878863, 'Đèn treo sang trọng Hubert', 1000000.00, 15, 'sp4-1_9ccb76a9510a4e1b9e2e4a2ab0280193_master.jpg', 0, 0, 0, 15, 3, '<p>D&ograve;ng sản phẩm&nbsp;xuất khẩu&nbsp;được sản xuất tại Nh&agrave; M&aacute;y Việt Nam&nbsp;theo ti&ecirc;u chuẩn Ch&acirc;u &Acirc;u. Nguồn gốc nguy&ecirc;n vật liệu cũng như chất lượng,&nbsp;độ bền sản phẩm đ&atilde; được kiểm chứng bởi c&aacute;c nh&agrave; nhập khẩu &Acirc;u Mỹ</p>\r\n\r\n<p>CHẤT LIỆU</p>\r\n\r\n<p>Khung sườn: gỗ dầu&nbsp;(Việt Nam) đ&atilde; xử l&yacute; mối mọt theo ti&ecirc;u chuẩn xuất khẩu Ch&acirc;u &Acirc;u<br />\r\nNệm m&uacute;t: nhập khẩu từ Malaysia<br />\r\nChỉ may: nhập khẩu từ Anh Quốc<br />\r\nDa/ PVC/ Vải:&nbsp;Da B&ograve; nhập khẩu từ &Yacute;/ PVC nhập khẩu từ Th&aacute;i Lan/ Vải nhập khẩu từ H&agrave;n Quốc</p>\r\n'),
(7878864, 'Đèn để bàn gọn nhẹ Petite', 700000.00, 25, 'sp8-1_5d1c7dc8e938478290333f2625515d68_master.jpg', 16, 1, 0, 59, 3, '<p>D&ograve;ng sản phẩm&nbsp;xuất khẩu&nbsp;được sản xuất tại Nh&agrave; M&aacute;y Việt Nam&nbsp;theo ti&ecirc;u chuẩn Ch&acirc;u &Acirc;u. Nguồn gốc nguy&ecirc;n vật liệu cũng như chất lượng,&nbsp;độ bền sản phẩm đ&atilde; được kiểm chứng bởi c&aacute;c nh&agrave; nhập khẩu &Acirc;u Mỹ</p>\r\n\r\n<p>CHẤT LIỆU</p>\r\n\r\n<p>Khung sườn: gỗ dầu&nbsp;(Việt Nam) đ&atilde; xử l&yacute; mối mọt theo ti&ecirc;u chuẩn xuất khẩu Ch&acirc;u &Acirc;u<br />\r\nNệm m&uacute;t: nhập khẩu từ Malaysia<br />\r\nChỉ may: nhập khẩu từ Anh Quốc<br />\r\nDa/ PVC/ Vải:&nbsp;Da B&ograve; nhập khẩu từ &Yacute;/ PVC nhập khẩu từ Th&aacute;i Lan/ Vải nhập khẩu từ H&agrave;n Quốc</p>\r\n'),
(7878865, 'Bàn xếp gỗ ', 500000.00, 15, 'sp11-1_f33d1b5977c84d01ac0037fdcb6c7317_master.jpg', 42, 1, 0, 8, 1, '<p>D&ograve;ng sản phẩm&nbsp;xuất khẩu&nbsp;được sản xuất tại Nh&agrave; M&aacute;y Việt Nam&nbsp;theo ti&ecirc;u chuẩn Ch&acirc;u &Acirc;u. Nguồn gốc nguy&ecirc;n vật liệu cũng như chất lượng,&nbsp;độ bền sản phẩm đ&atilde; được kiểm chứng bởi c&aacute;c nh&agrave; nhập khẩu &Acirc;u Mỹ.</p>\r\n\r\n<p>CHẤT LIỆU</p>\r\n\r\n<p>Khung sườn: gỗ dầu&nbsp;(Việt Nam) đ&atilde; xử l&yacute; mối mọt theo ti&ecirc;u chuẩn xuất khẩu Ch&acirc;u &Acirc;u<br />\r\nNệm m&uacute;t: nhập khẩu từ Malaysia<br />\r\nChỉ may: nhập khẩu từ Anh Quốc<br />\r\nDa/ PVC/ Vải:&nbsp;Da B&ograve; nhập khẩu từ &Yacute;/ PVC nhập khẩu từ Th&aacute;i Lan/ Vải nhập khẩu từ H&agrave;n Quốc</p>\r\n'),
(7878866, 'Ấm trà inox', 150000.00, 15, 'sp12-1_5316e032a8b0403b8fe26c4cd6bef167_master.jpg', 46, 1, 0, 7, 9, '<p>D&ograve;ng sản phẩm&nbsp;xuất khẩu&nbsp;được sản xuất tại Nh&agrave; M&aacute;y Việt Nam&nbsp;theo ti&ecirc;u chuẩn Ch&acirc;u &Acirc;u. Nguồn gốc nguy&ecirc;n vật liệu cũng như chất lượng,&nbsp;độ bền sản phẩm đ&atilde; được kiểm chứng bởi c&aacute;c nh&agrave; nhập khẩu &Acirc;u Mỹ</p>\r\n\r\n<p>CHẤT LIỆU</p>\r\n\r\n<p>Khung sườn: gỗ dầu&nbsp;(Việt Nam) đ&atilde; xử l&yacute; mối mọt theo ti&ecirc;u chuẩn xuất khẩu Ch&acirc;u &Acirc;u<br />\r\nNệm m&uacute;t: nhập khẩu từ Malaysia<br />\r\nChỉ may: nhập khẩu từ Anh Quốc<br />\r\nDa/ PVC/ Vải:&nbsp;Da B&ograve; nhập khẩu từ &Yacute;/ PVC nhập khẩu từ Th&aacute;i Lan/ Vải nhập khẩu từ H&agrave;n Quốc</p>\r\n'),
(7878867, 'Bàn phòng khách thông minh', 4000000.00, 0, 'ban-phong-khach-thong-minh-.jpg', 11, 1, 0, 19, 1, '<p>D&ograve;ng sản phẩm&nbsp;xuất khẩu&nbsp;được sản xuất tại Nh&agrave; M&aacute;y Việt Nam&nbsp;theo ti&ecirc;u chuẩn Ch&acirc;u &Acirc;u. Nguồn gốc nguy&ecirc;n vật liệu cũng như chất lượng,&nbsp;độ bền sản phẩm đ&atilde; được kiểm chứng bởi c&aacute;c nh&agrave; nhập khẩu &Acirc;u Mỹ.</p>\r\n'),
(7878868, 'Sofa FS 2021', 12000000.00, 0, 'phongkhach4.jpg', 0, 0, 0, 0, 1, '<p>D&ograve;ng sản phẩm&nbsp;xuất khẩu&nbsp;được sản xuất tại Nh&agrave; M&aacute;y Việt Nam&nbsp;theo ti&ecirc;u chuẩn Ch&acirc;u &Acirc;u. Nguồn gốc nguy&ecirc;n vật liệu cũng như chất lượng,&nbsp;độ bền sản phẩm đ&atilde; được kiểm chứng bởi c&aacute;c nh&agrave; nhập khẩu &Acirc;u Mỹ</p>\r\n\r\n<p>Khung sườn: gỗ dầu&nbsp;(Việt Nam) đ&atilde; xử l&yacute; mối mọt theo ti&ecirc;u chuẩn xuất khẩu Ch&acirc;u &Acirc;u<br />\r\nNệm m&uacute;t: nhập khẩu từ Malaysia<br />\r\nChỉ may: nhập khẩu từ Anh Quốc<br />\r\nDa/ PVC/ Vải:&nbsp;Da B&ograve; nhập khẩu từ &Yacute;/ PVC nhập khẩu từ Th&aacute;i Lan/ Vải nhập khẩu từ H&agrave;n Quốc</p>\r\n');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tin_tuc`
--

CREATE TABLE `tin_tuc` (
  `ma_tin_tuc` int(11) NOT NULL,
  `tieu_de` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_ta_tin_tuc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinh_tin_tuc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noi_dung_tin_tuc` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tin_tuc`
--

INSERT INTO `tin_tuc` (`ma_tin_tuc`, `tieu_de`, `mo_ta_tin_tuc`, `hinh_tin_tuc`, `noi_dung_tin_tuc`) VALUES
(5, 'MUA SOFA GIƯỜNG MANG CẢ THIÊN ĐƯỜNG ĐẾN NHỮNG CĂN HỘ NHỎ', '<p><strong>1- Sử dụng nội thất th&ocirc;ng minh v&agrave; tận dụng kh&ocirc;ng gian để lưu trữ đồ đạc</strong></p>\r\n\r\n<p>Với một kh&ocirc;ng gian chật hẹp th&igrave; điều đầu ti&ecirc;n bạn nghĩ đến l&agrave; g&igrave;? Chắc hẳn đ&oacute; ch&iacute;nh l&agrave; nơi n&agrave;o sẽ d&ugrave;ng để lưu trữ đồ đạc c&aacute; nh&acirc;n trong nh&agrave; của bạn. Thấu hiểu nỗi lo n&agrave;y, Baya cung cấp giải ph&aacute;p cho bạn ch&iacute;nh l&agrave; thiết kế một giường ngủ th&ocirc;ng minh kết hợp tủ lưu trữ ngay ph&iacute;a dưới gầm giường để lưu trữ đồ đạc c&aacute; nh&acirc;n.</p>\r\n', 'tintuc1.jpg', '<p><strong>1- Sử dụng nội thất th&ocirc;ng minh v&agrave; tận dụng kh&ocirc;ng gian để lưu trữ đồ đạc</strong></p>\r\n\r\n<p>Với một kh&ocirc;ng gian chật hẹp th&igrave; điều đầu ti&ecirc;n bạn nghĩ đến l&agrave; g&igrave;? Chắc hẳn đ&oacute; ch&iacute;nh l&agrave; nơi n&agrave;o sẽ d&ugrave;ng để lưu trữ đồ đạc c&aacute; nh&acirc;n trong nh&agrave; của bạn. Thấu hiểu nỗi lo n&agrave;y, Baya cung cấp giải ph&aacute;p cho bạn ch&iacute;nh l&agrave; thiết kế một giường ngủ th&ocirc;ng minh kết hợp tủ lưu trữ ngay ph&iacute;a dưới gầm giường để lưu trữ đồ đạc c&aacute; nh&acirc;n.</p>\r\n\r\n<p>C&aacute;nh cửa k&eacute;o ở một b&ecirc;n h&ocirc;ng giường gi&uacute;p đảm bảo t&iacute;nh ri&ecirc;ng tư cho kh&ocirc;ng gian ph&ograve;ng ngủ, v&agrave; kệ tủ cũng ở c&ugrave;ng ph&iacute;a b&ecirc;n h&ocirc;ng ph&ograve;ng ngủ gi&uacute;p bản thiết kế chung cư trở n&ecirc;n ho&agrave;n thiện, th&ocirc;ng minh v&agrave; hiện đại hơn bao giờ hết. Một điểm đ&aacute;ng ch&uacute; &yacute; nữa ở đ&acirc;y l&agrave; lớp sơn trắng cho ph&ograve;ng ngủ kết hợp với nội thất gỗ n&acirc;u v&agrave;ng đ&atilde; gi&uacute;p kh&ocirc;ng gian chung cư chật hẹp trở n&ecirc;n thật sự trang nh&atilde; v&agrave; hợp mắt.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://file.hstatic.net/1000409762/file/home03_1c392e3be6b543779d79a551a46aa2af.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>2- Sự tương phản về m&agrave;u sắc giữa hai kh&ocirc;ng gian ph&ograve;ng</strong></p>\r\n\r\n<p>Ph&ograve;ng kh&aacute;ch ở b&ecirc;n cạnh được phủ một lớp m&agrave;u sơn xanh l&aacute; mạ kh&aacute;c ho&agrave;n to&agrave;n với bức tường ph&ograve;ng ăn ở b&ecirc;n cạnh. C&oacute; thể cảm tưởng kh&ocirc;ng gian ph&ograve;ng kh&aacute;ch ở b&ecirc;n cạnh như một thế giới kh&aacute;c ho&agrave;n to&agrave;n, c&oacute; vẻ đẹp h&uacute;t mắt v&agrave; kh&aacute;c lạ, sang trọng. Thiết kế n&agrave;y l&agrave; ở một căn chung cư 3 ph&ograve;ng ngủ.</p>\r\n\r\n<p><img alt=\"\" src=\"https://file.hstatic.net/1000409762/file/s4_58617e773c3a4421a02bb3b7cdb12dd9.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>3- Sử dụng c&aacute;c bức tường bằng k&iacute;nh, cửa k&iacute;nh trong suốt</strong></p>\r\n\r\n<p>Điểm nhấn của bản thiết kế n&agrave;y ch&iacute;nh l&agrave; bức tường k&iacute;nh trong suốt tương phản với bảng vật liệu nội thất phong ph&uacute;, hoa văn v&agrave; m&agrave;u sắc hết sức đa dạng xung quanh. C&aacute;c yếu tố gỗ với m&agrave;u v&agrave;ng n&acirc;u nổi bật kết hợp với tường k&iacute;nh trắng khiến kh&ocirc;ng gian chung cư nhỏ hẹp cũng trở n&ecirc;n trang nh&atilde; v&agrave; tho&aacute;ng đ&atilde;ng, khơi gợi tr&iacute; tưởng tượng của người xem vượt qua những giới hạn về kh&ocirc;ng gian.</p>\r\n\r\n<p>Giải ph&aacute;p đặc biệt cho căn ph&ograve;ng c&oacute; diện t&iacute;ch khi&ecirc;m tốn l&agrave; sử dụng k&iacute;nh ph&iacute;a sau bộ sofa để tạo cảm gi&aacute;c kh&ocirc;ng gian được mở rộng.</p>\r\n\r\n<p>Khung cửa k&iacute;nh ban c&ocirc;ng đ&oacute;n nắng gi&uacute;p bạn h&ograve;a m&igrave;nh v&agrave;o thi&ecirc;n nhi&ecirc;n tho&aacute;ng đ&atilde;ng dễ chịu, th&ecirc;m bức r&egrave;m mang lại n&eacute;t trang nh&atilde; cho kh&ocirc;ng gian tiếp đ&oacute;n kh&aacute;ch trong ph&ograve;ng kh&aacute;ch v&agrave; kh&ocirc;ng gian ban c&ocirc;ng thư gi&atilde;n của ri&ecirc;ng bạn</p>\r\n'),
(6, 'NHỮNG ĐIỀU CẦN BIẾT ĐỂ LỰA CHỌN BỘ BÀN ĂN PHÙ HỢP VỚI NGÔI NHÀ BẠN', '<p><strong>1- Sử dụng nội thất th&ocirc;ng minh v&agrave; tận dụng kh&ocirc;ng gian để lưu trữ đồ đạc</strong></p>\r\n\r\n<p>Với một kh&ocirc;ng gian chật hẹp th&igrave; điều đầu ti&ecirc;n bạn nghĩ đến l&agrave; g&igrave;? Chắc hẳn đ&oacute; ch&iacute;nh l&agrave; nơi n&agrave;o sẽ d&ugrave;ng để lưu trữ đồ đạc c&aacute; nh&acirc;n trong nh&agrave; của bạn. Thấu hiểu nỗi lo n&agrave;y, Baya cung cấp giải ph&aacute;p cho bạn ch&iacute;nh l&agrave; thiết kế một giường ngủ th&ocirc;ng minh kết hợp tủ lưu trữ ngay ph&iacute;a dưới gầm giường để lưu trữ đồ đạc c&aacute; nh&acirc;n.</p>\r\n\r\n<p>C&aacute;nh cửa k&eacute;o ở một b&ecirc;n h&ocirc;ng giường gi&uacute;p đảm bảo t&iacute;nh ri&ecirc;ng tư cho kh&ocirc;ng gian ph&ograve;ng ngủ, v&agrave; kệ tủ cũng ở c&ugrave;ng ph&iacute;a b&ecirc;n h&ocirc;ng ph&ograve;ng ngủ gi&uacute;p bản thiết kế chung cư trở n&ecirc;n ho&agrave;n thiện, th&ocirc;ng minh v&agrave; hiện đại hơn bao giờ hết. Một điểm đ&aacute;ng ch&uacute; &yacute; nữa ở đ&acirc;y l&agrave; lớp sơn trắng cho ph&ograve;ng ngủ kết hợp với nội thất gỗ n&acirc;u v&agrave;ng đ&atilde; gi&uacute;p kh&ocirc;ng gian chung cư chật hẹp trở n&ecirc;n thật sự trang nh&atilde; v&agrave; hợp mắt.</p>\r\n', 'tintuc2 (1).png', '<p><strong>1- Sử dụng nội thất th&ocirc;ng minh v&agrave; tận dụng kh&ocirc;ng gian để lưu trữ đồ đạc</strong></p>\r\n\r\n<p>Với một kh&ocirc;ng gian chật hẹp th&igrave; điều đầu ti&ecirc;n bạn nghĩ đến l&agrave; g&igrave;? Chắc hẳn đ&oacute; ch&iacute;nh l&agrave; nơi n&agrave;o sẽ d&ugrave;ng để lưu trữ đồ đạc c&aacute; nh&acirc;n trong nh&agrave; của bạn. Thấu hiểu nỗi lo n&agrave;y, Baya cung cấp giải ph&aacute;p cho bạn ch&iacute;nh l&agrave; thiết kế một giường ngủ th&ocirc;ng minh kết hợp tủ lưu trữ ngay ph&iacute;a dưới gầm giường để lưu trữ đồ đạc c&aacute; nh&acirc;n.</p>\r\n\r\n<p>C&aacute;nh cửa k&eacute;o ở một b&ecirc;n h&ocirc;ng giường gi&uacute;p đảm bảo t&iacute;nh ri&ecirc;ng tư cho kh&ocirc;ng gian ph&ograve;ng ngủ, v&agrave; kệ tủ cũng ở c&ugrave;ng ph&iacute;a b&ecirc;n h&ocirc;ng ph&ograve;ng ngủ gi&uacute;p bản thiết kế chung cư trở n&ecirc;n ho&agrave;n thiện, th&ocirc;ng minh v&agrave; hiện đại hơn bao giờ hết. Một điểm đ&aacute;ng ch&uacute; &yacute; nữa ở đ&acirc;y l&agrave; lớp sơn trắng cho ph&ograve;ng ngủ kết hợp với nội thất gỗ n&acirc;u v&agrave;ng đ&atilde; gi&uacute;p kh&ocirc;ng gian chung cư chật hẹp trở n&ecirc;n thật sự trang nh&atilde; v&agrave; hợp mắt.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"https://file.hstatic.net/1000409762/file/home03_1c392e3be6b543779d79a551a46aa2af.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>2- Sự tương phản về m&agrave;u sắc giữa hai kh&ocirc;ng gian ph&ograve;ng</strong></p>\r\n\r\n<p>Ph&ograve;ng kh&aacute;ch ở b&ecirc;n cạnh được phủ một lớp m&agrave;u sơn xanh l&aacute; mạ kh&aacute;c ho&agrave;n to&agrave;n với bức tường ph&ograve;ng ăn ở b&ecirc;n cạnh. C&oacute; thể cảm tưởng kh&ocirc;ng gian ph&ograve;ng kh&aacute;ch ở b&ecirc;n cạnh như một thế giới kh&aacute;c ho&agrave;n to&agrave;n, c&oacute; vẻ đẹp h&uacute;t mắt v&agrave; kh&aacute;c lạ, sang trọng. Thiết kế n&agrave;y l&agrave; ở một căn chung cư 3 ph&ograve;ng ngủ.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"https://file.hstatic.net/1000409762/file/s4_58617e773c3a4421a02bb3b7cdb12dd9.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>3- Sử dụng c&aacute;c bức tường bằng k&iacute;nh, cửa k&iacute;nh trong suốt</strong></p>\r\n\r\n<p>Điểm nhấn của bản thiết kế n&agrave;y ch&iacute;nh l&agrave; bức tường k&iacute;nh trong suốt tương phản với bảng vật liệu nội thất phong ph&uacute;, hoa văn v&agrave; m&agrave;u sắc hết sức đa dạng xung quanh. C&aacute;c yếu tố gỗ với m&agrave;u v&agrave;ng n&acirc;u nổi bật kết hợp với tường k&iacute;nh trắng khiến kh&ocirc;ng gian chung cư nhỏ hẹp cũng trở n&ecirc;n trang nh&atilde; v&agrave; tho&aacute;ng đ&atilde;ng, khơi gợi tr&iacute; tưởng tượng của người xem vượt qua những giới hạn về kh&ocirc;ng gian.</p>\r\n\r\n<p>Giải ph&aacute;p đặc biệt cho căn ph&ograve;ng c&oacute; diện t&iacute;ch khi&ecirc;m tốn l&agrave; sử dụng k&iacute;nh ph&iacute;a sau bộ sofa để tạo cảm gi&aacute;c kh&ocirc;ng gian được mở rộng.</p>\r\n\r\n<p>Khung cửa k&iacute;nh ban c&ocirc;ng đ&oacute;n nắng gi&uacute;p bạn h&ograve;a m&igrave;nh v&agrave;o thi&ecirc;n nhi&ecirc;n tho&aacute;ng đ&atilde;ng dễ chịu, th&ecirc;m bức r&egrave;m mang lại n&eacute;t trang nh&atilde; cho kh&ocirc;ng gian tiếp đ&oacute;n kh&aacute;ch trong ph&ograve;ng kh&aacute;ch v&agrave; kh&ocirc;ng gian ban c&ocirc;ng thư gi&atilde;n của ri&ecirc;ng bạn.</p>\r\n'),
(7, 'THIẾT KẾ NỘI THẤT CHUNG CƯ ĐẸP CHO ĐÔI VỢ CHỒNG TRẺ', '<p style=\"text-align:justify\"><strong>1- Sử dụng nội thất th&ocirc;ng minh v&agrave; tận dụng kh&ocirc;ng gian để lưu trữ đồ đạc</strong></p>\r\n\r\n<p style=\"text-align:justify\">Với một kh&ocirc;ng gian chật hẹp th&igrave; điều đầu ti&ecirc;n bạn nghĩ đến l&agrave; g&igrave;? Chắc hẳn đ&oacute; ch&iacute;nh l&agrave; nơi n&agrave;o sẽ d&ugrave;ng để lưu trữ đồ đạc c&aacute; nh&acirc;n trong nh&agrave; của bạn. Thấu hiểu nỗi lo n&agrave;y, Baya cung cấp giải ph&aacute;p cho bạn ch&iacute;nh l&agrave; thiết kế một giường ngủ th&ocirc;ng minh kết hợp tủ lưu trữ ngay ph&iacute;a dưới gầm giường để lưu trữ đồ đạc c&aacute; nh&acirc;n.</p>\r\n\r\n<p style=\"text-align:justify\">C&aacute;nh cửa k&eacute;o ở một b&ecirc;n h&ocirc;ng giường gi&uacute;p đảm bảo t&iacute;nh ri&ecirc;ng tư cho kh&ocirc;ng gian ph&ograve;ng ngủ, v&agrave; kệ tủ cũng ở c&ugrave;ng ph&iacute;a b&ecirc;n h&ocirc;ng ph&ograve;ng ngủ gi&uacute;p bản thiết kế chung cư trở n&ecirc;n ho&agrave;n thiện, th&ocirc;ng minh v&agrave; hiện đại hơn bao giờ hết. Một điểm đ&aacute;ng ch&uacute; &yacute; nữa ở đ&acirc;y l&agrave; lớp sơn trắng cho ph&ograve;ng ngủ kết hợp với nội thất gỗ n&acirc;u v&agrave;ng đ&atilde; gi&uacute;p kh&ocirc;ng gian chung cư chật hẹp trở n&ecirc;n thật sự trang nh&atilde; v&agrave; hợp mắt.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'tintuc3.jpg', '<p style=\"text-align:justify\"><strong>1- Sử dụng nội thất th&ocirc;ng minh v&agrave; tận dụng kh&ocirc;ng gian để lưu trữ đồ đạc</strong></p>\r\n\r\n<p style=\"text-align:justify\">Với một kh&ocirc;ng gian chật hẹp th&igrave; điều đầu ti&ecirc;n bạn nghĩ đến l&agrave; g&igrave;? Chắc hẳn đ&oacute; ch&iacute;nh l&agrave; nơi n&agrave;o sẽ d&ugrave;ng để lưu trữ đồ đạc c&aacute; nh&acirc;n trong nh&agrave; của bạn. Thấu hiểu nỗi lo n&agrave;y, Baya cung cấp giải ph&aacute;p cho bạn ch&iacute;nh l&agrave; thiết kế một giường ngủ th&ocirc;ng minh kết hợp tủ lưu trữ ngay ph&iacute;a dưới gầm giường để lưu trữ đồ đạc c&aacute; nh&acirc;n.</p>\r\n\r\n<p style=\"text-align:justify\">C&aacute;nh cửa k&eacute;o ở một b&ecirc;n h&ocirc;ng giường gi&uacute;p đảm bảo t&iacute;nh ri&ecirc;ng tư cho kh&ocirc;ng gian ph&ograve;ng ngủ, v&agrave; kệ tủ cũng ở c&ugrave;ng ph&iacute;a b&ecirc;n h&ocirc;ng ph&ograve;ng ngủ gi&uacute;p bản thiết kế chung cư trở n&ecirc;n ho&agrave;n thiện, th&ocirc;ng minh v&agrave; hiện đại hơn bao giờ hết. Một điểm đ&aacute;ng ch&uacute; &yacute; nữa ở đ&acirc;y l&agrave; lớp sơn trắng cho ph&ograve;ng ngủ kết hợp với nội thất gỗ n&acirc;u v&agrave;ng đ&atilde; gi&uacute;p kh&ocirc;ng gian chung cư chật hẹp trở n&ecirc;n thật sự trang nh&atilde; v&agrave; hợp mắt.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"https://file.hstatic.net/1000409762/file/home03_1c392e3be6b543779d79a551a46aa2af.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>2- Sự tương phản về m&agrave;u sắc giữa hai kh&ocirc;ng gian ph&ograve;ng</strong></p>\r\n\r\n<p>Ph&ograve;ng kh&aacute;ch ở b&ecirc;n cạnh được phủ một lớp m&agrave;u sơn xanh l&aacute; mạ kh&aacute;c ho&agrave;n to&agrave;n với bức tường ph&ograve;ng ăn ở b&ecirc;n cạnh. C&oacute; thể cảm tưởng kh&ocirc;ng gian ph&ograve;ng kh&aacute;ch ở b&ecirc;n cạnh như một thế giới kh&aacute;c ho&agrave;n to&agrave;n, c&oacute; vẻ đẹp h&uacute;t mắt v&agrave; kh&aacute;c lạ, sang trọng. Thiết kế n&agrave;y l&agrave; ở một căn chung cư 3 ph&ograve;ng ngủ.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"https://file.hstatic.net/1000409762/file/s4_58617e773c3a4421a02bb3b7cdb12dd9.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>3- Sử dụng c&aacute;c bức tường bằng k&iacute;nh, cửa k&iacute;nh trong suốt</strong></p>\r\n\r\n<p>Điểm nhấn của bản thiết kế n&agrave;y ch&iacute;nh l&agrave; bức tường k&iacute;nh trong suốt tương phản với bảng vật liệu nội thất phong ph&uacute;, hoa văn v&agrave; m&agrave;u sắc hết sức đa dạng xung quanh. C&aacute;c yếu tố gỗ với m&agrave;u v&agrave;ng n&acirc;u nổi bật kết hợp với tường k&iacute;nh trắng khiến kh&ocirc;ng gian chung cư nhỏ hẹp cũng trở n&ecirc;n trang nh&atilde; v&agrave; tho&aacute;ng đ&atilde;ng, khơi gợi tr&iacute; tưởng tượng của người xem vượt qua những giới hạn về kh&ocirc;ng gian.</p>\r\n\r\n<p>Giải ph&aacute;p đặc biệt cho căn ph&ograve;ng c&oacute; diện t&iacute;ch khi&ecirc;m tốn l&agrave; sử dụng k&iacute;nh ph&iacute;a sau bộ sofa để tạo cảm gi&aacute;c kh&ocirc;ng gian được mở rộng.</p>\r\n\r\n<p>Khung cửa k&iacute;nh ban c&ocirc;ng đ&oacute;n nắng gi&uacute;p bạn h&ograve;a m&igrave;nh v&agrave;o thi&ecirc;n nhi&ecirc;n tho&aacute;ng đ&atilde;ng dễ chịu, th&ecirc;m bức r&egrave;m mang lại n&eacute;t trang nh&atilde; cho kh&ocirc;ng gian tiếp đ&oacute;n kh&aacute;ch trong ph&ograve;ng kh&aacute;ch v&agrave; kh&ocirc;ng gian ban c&ocirc;ng thư gi&atilde;n của ri&ecirc;ng bạn.</p>\r\n');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trang_thai_hoa_don`
--

CREATE TABLE `trang_thai_hoa_don` (
  `ma_trang_thai` tinyint(1) NOT NULL,
  `ten_trang_thai` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `trang_thai_hoa_don`
--

INSERT INTO `trang_thai_hoa_don` (`ma_trang_thai`, `ten_trang_thai`) VALUES
(1, 'Chờ xác nhận'),
(2, 'Đang giao hàng'),
(3, 'Đã thanh toán'),
(4, 'Đã hủy');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`ma_bl`),
  ADD KEY `ma_sp` (`ma_sp`,`ma_kh`),
  ADD KEY `ma_kh` (`ma_kh`),
  ADD KEY `ma_tin_tuc` (`ma_tin_tuc`);

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
  ADD KEY `ma_kh` (`ma_kh`),
  ADD KEY `trang_thai` (`trang_thai`);

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
  ADD PRIMARY KEY (`ma_kh`),
  ADD UNIQUE KEY `email` (`email`,`sdt_kh`),
  ADD UNIQUE KEY `email_2` (`email`,`sdt_kh`);

--
-- Chỉ mục cho bảng `khuyen_mai`
--
ALTER TABLE `khuyen_mai`
  ADD PRIMARY KEY (`ma_km`),
  ADD KEY `ma_kh_ap_dung` (`ma_kh_ap_dung`);

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
-- Chỉ mục cho bảng `tin_tuc`
--
ALTER TABLE `tin_tuc`
  ADD PRIMARY KEY (`ma_tin_tuc`);

--
-- Chỉ mục cho bảng `trang_thai_hoa_don`
--
ALTER TABLE `trang_thai_hoa_don`
  ADD PRIMARY KEY (`ma_trang_thai`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `ma_bl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `chi_tiet_phieu_nhap`
--
ALTER TABLE `chi_tiet_phieu_nhap`
  MODIFY `ma_ct_pn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `gio_hang_tam`
--
ALTER TABLE `gio_hang_tam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT cho bảng `hinh`
--
ALTER TABLE `hinh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  MODIFY `ma_hd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT cho bảng `hoa_don_chi_tiet`
--
ALTER TABLE `hoa_don_chi_tiet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT cho bảng `loai`
--
ALTER TABLE `loai`
  MODIFY `ma_loai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `nha_cung_cap`
--
ALTER TABLE `nha_cung_cap`
  MODIFY `ma_ncc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `phieu_nhap`
--
ALTER TABLE `phieu_nhap`
  MODIFY `ma_pn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `ma_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7878872;

--
-- AUTO_INCREMENT cho bảng `tin_tuc`
--
ALTER TABLE `tin_tuc`
  MODIFY `ma_tin_tuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD CONSTRAINT `binh_luan_ibfk_1` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`ma_kh`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `binh_luan_ibfk_2` FOREIGN KEY (`ma_sp`) REFERENCES `san_pham` (`ma_sp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `binh_luan_ibfk_3` FOREIGN KEY (`ma_tin_tuc`) REFERENCES `tin_tuc` (`ma_tin_tuc`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `hoa_don_ibfk_1` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`ma_kh`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hoa_don_ibfk_2` FOREIGN KEY (`trang_thai`) REFERENCES `trang_thai_hoa_don` (`ma_trang_thai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hoa_don_chi_tiet`
--
ALTER TABLE `hoa_don_chi_tiet`
  ADD CONSTRAINT `hoa_don_chi_tiet_ibfk_1` FOREIGN KEY (`ma_hd`) REFERENCES `hoa_don` (`ma_hd`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hoa_don_chi_tiet_ibfk_2` FOREIGN KEY (`ma_sp`) REFERENCES `san_pham` (`ma_sp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `khuyen_mai`
--
ALTER TABLE `khuyen_mai`
  ADD CONSTRAINT `khuyen_mai_ibfk_1` FOREIGN KEY (`ma_kh_ap_dung`) REFERENCES `khach_hang` (`ma_kh`) ON DELETE CASCADE ON UPDATE CASCADE;

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
