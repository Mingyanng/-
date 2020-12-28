-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2020-12-27 10:42:46
-- サーバのバージョン： 10.4.11-MariaDB
-- PHP のバージョン: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `order`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `alert`
--

CREATE TABLE `alert` (
  `id` int(100) NOT NULL,
  `alerttext` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `hide` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `alert`
--

INSERT INTO `alert` (`id`, `alerttext`, `hide`) VALUES
(1, '肉のサカタのホームページへよこそう', 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `icon`
--

CREATE TABLE `icon` (
  `id` varchar(100) NOT NULL,
  `location` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `icon`
--

INSERT INTO `icon` (`id`, `location`) VALUES
('1', '../../../dist/img/icon/1563104178touxiang_meitu_1.jpg');

-- --------------------------------------------------------

--
-- テーブルの構造 `icontext`
--

CREATE TABLE `icontext` (
  `id` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `ititle` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `ititle_en` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `ititle_zh_HK` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `ititle_zh_CH` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `ititle_ko_KR` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `itext` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `itext_en` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `itext_zh_HK` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `itext_zh_CH` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `itext_ko_KR` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `icontext`
--

INSERT INTO `icontext` (`id`, `ititle`, `ititle_en`, `ititle_zh_HK`, `ititle_zh_CH`, `ititle_ko_KR`, `itext`, `itext_en`, `itext_zh_HK`, `itext_zh_CH`, `itext_ko_KR`) VALUES
('1', '肉のサカタ', '', '', '', '', '店舗紹介', 'Store introduction', '店鋪介紹', '店铺介绍', '매장 소개');

-- --------------------------------------------------------

--
-- テーブルの構造 `menu`
--

CREATE TABLE `menu` (
  `commodityid` int(100) UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `name_en` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `name_zh_HK` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `name_zh_CH` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `name_ko_KR` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `menulocation` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `other` varchar(500) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `other_en` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `other_zh_HK` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `other_zh_CH` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `other_ko_KR` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `menu`
--

INSERT INTO `menu` (`commodityid`, `name`, `name_en`, `name_zh_HK`, `name_zh_CH`, `name_ko_KR`, `menulocation`, `other`, `other_en`, `other_zh_HK`, `other_zh_CH`, `other_ko_KR`) VALUES
(3, 'ラーメン', 'Ramen', '拉麵', '拉面', '라면', '../../../dist/img/menu/156310119412328.jpg', 'ラーメン', 'Ramen', '拉麵', '拉面', '라면'),
(4, 'チャーシュー丼', 'Barbecue pork with white rice', '叉燒飯', '叉烧饭', '차슈덮밥', '../../../dist/img/menu/156310132112333.jpg', 'チャーシュー丼', 'Barbecue pork with white rice', '叉燒飯', '叉烧饭', '차슈덮밥'),
(5, '冷麺', 'Cold noodles', '冷麵', '冷面', '냉면', '../../../dist/img/menu/156310143712337.jpg', '冷麺', 'Cold noodles', '冷麵', '冷面', '냉면'),
(14, '真っ赤な担担麺', 'Tantanmen', '擔擔麵', '担担面', '딴딴면', '../../../dist/img/menu/156310626312342.jpg', '真っ赤な担担麺', 'Tantanmen', '擔擔麵', '担担面', '딴딴면'),
(15, 'カレーラーメン', 'Curry ramen', '咖喱麵', '咖喱面', '카레라면', '../../../dist/img/menu/156412193512345_meitu_1_meitu_2.jpg', 'カレーラーメン', 'Curry ramen', '咖喱麵', '咖喱面', '카레라면');

-- --------------------------------------------------------

--
-- テーブルの構造 `menunature`
--

CREATE TABLE `menunature` (
  `natureid` int(255) UNSIGNED NOT NULL,
  `commodityid1` int(255) NOT NULL,
  `size` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `size_en` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `size_zh_HK` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `size_zh_CH` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `size_ko_KR` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `menunature`
--

INSERT INTO `menunature` (`natureid`, `commodityid1`, `size`, `size_en`, `size_zh_HK`, `size_zh_CH`, `size_ko_KR`, `price`) VALUES
(3, 3, 'ミニ', 'mini', '迷你', '迷你', '미니', 500),
(4, 3, '並', 'medium', '中碗', '中碗', '보통', 650),
(5, 3, '大', 'large', '大碗', '大碗', '대', 750),
(6, 3, '特大', 'extra large', '特大碗', '特大碗', '특대', 900),
(7, 4, '小', 'small', '小', '小', '소', 350),
(8, 4, '並', 'medium', '中碗', '中碗', '보통', 500),
(9, 4, '大', 'large', '大碗', '大碗', '대', 700),
(10, 5, '普通', 'ordinary', '普通', '普通', '보통', 750),
(24, 14, '普通', 'Ordinary ', '普通', '普通', '보통', 750),
(25, 15, '普通', 'Ordinary ', '普通', '普通', '보통', 650);

-- --------------------------------------------------------

--
-- テーブルの構造 `menuset`
--

CREATE TABLE `menuset` (
  `menusetid` int(255) UNSIGNED NOT NULL,
  `name` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `name_en` varchar(500) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `name_zh_HK` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `name_zh_CH` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `name_ko_KR` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `menucompose` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `menucompose_en` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `menucompose_zh_HK` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `menucompose_zh_CH` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `menucompose_ko_KR` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `menuset`
--

INSERT INTO `menuset` (`menusetid`, `name`, `name_en`, `name_zh_HK`, `name_zh_CH`, `name_ko_KR`, `menucompose`, `menucompose_en`, `menucompose_zh_HK`, `menucompose_zh_CH`, `menucompose_ko_KR`, `price`) VALUES
(42, 'Aセット', 'A set', 'A套餐', 'A套餐', 'A세트', 'ラーメン並＋やきめし', 'Remen M+fried rice', '拉麵中碗+炒飯', '拉面中碗+炒饭', 's', 950),
(43, 'Bセット', 'B set', 'B套餐', 'B套餐', 'B세트', 'ラーメン並＋やきめしミニ', 'Remen M+fried rice mini', '拉麵中碗+迷你炒飯', '拉面中碗+迷你炒饭', '222', 800),
(44, 'Cセット', 'C set', 'C套餐', 'C套餐', 'C세트', 'ラーメン小＋やきめしミニ', 'Remen S+fried rice mini', '拉麵小碗+迷你炒飯', '拉面小碗+迷你炒饭', '222', 650);

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userID` varchar(12) CHARACTER SET utf8 NOT NULL,
  `password` varchar(12) CHARACTER SET utf8 NOT NULL,
  `name` varchar(12) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `code` varchar(8) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `adminlogintimes` int(255) NOT NULL,
  `lastlogintime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `userlogintimes` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `userID`, `password`, `name`, `code`, `adminlogintimes`, `lastlogintime`, `userlogintimes`) VALUES
(1, 'root', '8102', 'admin', 'pkq9', 77, '2020-12-26 21:34:15', 172);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `alert`
--
ALTER TABLE `alert`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `icon`
--
ALTER TABLE `icon`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `icontext`
--
ALTER TABLE `icontext`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`commodityid`);

--
-- テーブルのインデックス `menunature`
--
ALTER TABLE `menunature`
  ADD UNIQUE KEY `natureid_2` (`natureid`),
  ADD KEY `commodityid` (`commodityid1`);

--
-- テーブルのインデックス `menuset`
--
ALTER TABLE `menuset`
  ADD PRIMARY KEY (`menusetid`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `menu`
--
ALTER TABLE `menu`
  MODIFY `commodityid` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- テーブルのAUTO_INCREMENT `menunature`
--
ALTER TABLE `menunature`
  MODIFY `natureid` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- テーブルのAUTO_INCREMENT `menuset`
--
ALTER TABLE `menuset`
  MODIFY `menusetid` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- テーブルのAUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
