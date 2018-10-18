-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2018 年 10 月 18 日 20:24
-- サーバのバージョン： 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gs_f01_db32_kadai`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_reviews_table`
--

CREATE TABLE IF NOT EXISTS `gs_reviews_table` (
`id` int(12) NOT NULL,
  `shop` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `comment` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `indate` datetime NOT NULL,
  `icon` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_reviews_table`
--

INSERT INTO `gs_reviews_table` (`id`, `shop`, `url`, `comment`, `indate`, `icon`, `name`) VALUES
(2, 'プリンセスピピ', 'https://tabelog.com/fukuoka/A4004/A400501/40003136/', '門司港のエスニック料理屋さん。卵とカニのカレーが美味しすぎてどうかしてる。', '2018-10-18 19:50:31', 'upload_icon/20181006150536d41d8cd98f00b204e9800998ecf8427e.png', 'maki'),
(4, 'tunapaha', 'http://www.lepetitprince.co.jp/top.html', 'うまー！！辛い', '2018-10-14 21:46:22', 'upload_icon/20181006150536d41d8cd98f00b204e9800998ecf8427e.png', 'maki'),
(6, 'キッチンポレポレ', 'http://polepole2012.jp/', 'お昼の定食750円。美味しい。', '2018-10-17 20:43:01', 'upload_icon/20181006150536d41d8cd98f00b204e9800998ecf8427e.png', 'maki'),
(7, '焼き鳥　鸞', 'https://ran.owst.jp/', '雰囲気が良くて焼き鳥も美味しい。ちょっと味付け濃い。', '2018-10-17 21:59:07', 'upload_icon/20181007143149d41d8cd98f00b204e9800998ecf8427e.png', 'zozo'),
(11, 'GMOペパボ', 'https://pepabo.com/', '週に一度は出没する。', '2018-10-18 19:48:01', 'upload_icon/20181018194657d41d8cd98f00b204e9800998ecf8427e.png', 'たろう'),
(12, '魚助食堂', 'https://fukuoka.parco.jp/shop/detail/?cd=010668', '魚マシマシー。', '2018-10-18 19:52:04', 'upload_icon/20181010003601d41d8cd98f00b204e9800998ecf8427e.png', 'administrator'),
(13, ' うみの食堂', 'https://fukuoka.parco.jp/shop/detail/?cd=010548', '今時のようで昔懐かしい心も身体もホッとする食堂。博多の真ん中で天然魚を使ったぷりぷりのお刺身と海鮮丼、旨み	がしみた魚の煮つけ、脂ジュワ～の焼魚、旨い魚と食べたい物を好きなように組み合わせてお召し上がり下さい。 ', '2018-10-18 19:53:32', 'upload_icon/20181006152731d41d8cd98f00b204e9800998ecf8427e.png', 'えのき'),
(14, ' エルボラーチョ', 'https://fukuoka.parco.jp/shop/detail/?cd=009567', '本場のメキシコ料理を中心として、タコスやフローズンカクテルなどで陽気に楽しめるお店。現地で学んだシェフが作り出す本格メキシコ料理と日本初のオリジナルテキーラ、チョコラテを中心としたフローズンカクテル、チョコラテスイーツも充実。店内はメキシコで買い付けた雑貨', '2018-10-18 19:54:33', 'upload_icon/20181006145844d41d8cd98f00b204e9800998ecf8427e.png', 'しいたけ'),
(15, 'オムズ', 'https://fukuoka.parco.jp/shop/detail/?cd=008918', '九州産の卵・鶏肉を使用したおいしい卵料理やパンケーキを中心に、本格的な珈琲やフルーツジュースも充実。パリのお洒落なカフェをイメージした店内で、ゆったりとした時間をお過ごしください。', '2018-10-18 19:55:39', 'upload_icon/20181006160037d41d8cd98f00b204e9800998ecf8427e.png', 'エリンギ'),
(16, '極味や', 'https://fukuoka.parco.jp/shop/detail/?cd=006080', 'いっつも並んでる、あと肉の匂いがすごい', '2018-10-18 20:00:42', 'upload_icon/20181006155518d41d8cd98f00b204e9800998ecf8427e.png', '望月　眞喜'),
(17, 'スープ ストック トーキョー', 'https://fukuoka.parco.jp/shop/detail/?cd=009571', 'オマール海老のビスク', '2018-10-18 20:01:55', 'upload_icon/20181010003151d41d8cd98f00b204e9800998ecf8427e.png', 'myApp'),
(18, '鉄なべ餃子', 'https://fukuoka.parco.jp/shop/detail/?cd=006081', '鉄なべって北九発祥やなかったんか・・・。', '2018-10-18 20:20:48', 'upload_icon/20181014162834d41d8cd98f00b204e9800998ecf8427e.png', 'ninja');

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_user_table`
--

CREATE TABLE IF NOT EXISTS `gs_user_table` (
`id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `lid` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `lpw` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `kanri_flg` int(1) NOT NULL DEFAULT '0',
  `life_flg` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_user_table`
--

INSERT INTO `gs_user_table` (`id`, `name`, `icon`, `lid`, `lpw`, `kanri_flg`, `life_flg`) VALUES
(1, 'administrator', 'upload_icon/20181010003601d41d8cd98f00b204e9800998ecf8427e.png', 'admin', 'admin', 1, 0),
(2, 'ほげ', 'upload_icon/20181006150047d41d8cd98f00b204e9800998ecf8427e.png', 'hoge1', 'hoge1', 0, 1),
(3, 'えのき', 'upload_icon/20181006152731d41d8cd98f00b204e9800998ecf8427e.png', 'hoge2', 'hoge2', 0, 0),
(4, 'しいたけ', 'upload_icon/20181006145844d41d8cd98f00b204e9800998ecf8427e.png', 'hoge', 'hoge', 0, 0),
(6, 'エリンギ', 'upload_icon/20181006160037d41d8cd98f00b204e9800998ecf8427e.png', 'ho-ge4', 'ho-ge4', 0, 0),
(8, 'maki', 'upload_icon/20181006150536d41d8cd98f00b204e9800998ecf8427e.png', 'mk', 'mk', 0, 0),
(9, '望月　眞喜', 'upload_icon/20181006155518d41d8cd98f00b204e9800998ecf8427e.png', 'mkmk', 'mkmk', 0, 0),
(11, 'zozo', 'upload_icon/20181007143149d41d8cd98f00b204e9800998ecf8427e.png', 'zozo', 'zozo', 0, 0),
(12, 'osugi', 'upload_icon/20181009235532d41d8cd98f00b204e9800998ecf8427e.png', 'osg', 'osg', 0, 0),
(14, 'myApp', 'upload_icon/20181010003151d41d8cd98f00b204e9800998ecf8427e.png', 'mic', 'mic', 0, 0),
(19, 'ninja', 'upload_icon/20181014162834d41d8cd98f00b204e9800998ecf8427e.png', 'ninja', 'ninja', 0, 0),
(20, 'makim', 'upload_icon/20181014174216d41d8cd98f00b204e9800998ecf8427e.png', 'makim', 'makim', 0, 0),
(21, 'pig', 'upload_icon/20181014203653d41d8cd98f00b204e9800998ecf8427e.png', 'pig', 'pig', 0, 0),
(24, 'たろう', 'upload_icon/20181018194657d41d8cd98f00b204e9800998ecf8427e.png', 'taro', 'taro', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_reviews_table`
--
ALTER TABLE `gs_reviews_table`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gs_user_table`
--
ALTER TABLE `gs_user_table`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_reviews_table`
--
ALTER TABLE `gs_reviews_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `gs_user_table`
--
ALTER TABLE `gs_user_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
