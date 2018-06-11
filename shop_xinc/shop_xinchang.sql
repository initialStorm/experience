-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2018-04-29 21:34:46
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shop_xinchang`
--

-- --------------------------------------------------------

--
-- 表的结构 `cate`
--

CREATE TABLE IF NOT EXISTS `cate` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `cateName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cateName` (`cateName`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='分类表' AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `cate`
--

INSERT INTO `cate` (`id`, `cateName`) VALUES
(3, '新昌特产'),
(4, '特色小吃'),
(6, '鲜果菜蔬');

-- --------------------------------------------------------

--
-- 表的结构 `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pId` int(10) unsigned NOT NULL COMMENT '商品ID',
  `Path` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='照片表' AUTO_INCREMENT=48 ;

--
-- 转存表中的数据 `photo`
--

INSERT INTO `photo` (`id`, `pId`, `Path`) VALUES
(25, 20, '62d7fffde0b98513bfa120f417ae0665.jpg'),
(26, 20, 'c91c3dc9731931485cf116f275b98ff1.jpg'),
(27, 21, '82d16ac2fd795f1248647dbcf6de6635.jpg'),
(28, 21, '8950c71448becb4b23648cd4a9b93e3e.jpg'),
(30, 23, 'cbc65cf7ce310ac8dbce7d919b8a2394.jpg'),
(31, 23, 'ce3dfd7777d48aa3d86edfeb63091cde.jpg'),
(32, 24, 'ad7b608e6625b85788f8e1f25248b902.jpg'),
(33, 24, 'fe45207c138265d1403c9ddb58e2fa66.jpg'),
(40, 44, '01398a86cc92545f08146c9c326cbfae.jpeg'),
(41, 45, 'ed615b1845af0900382b3b323a0b7926.jpg'),
(42, 46, '2989e0ea5237b3b3661f14eaa93266c8.jpg'),
(43, 47, '85ae53ee5a7cac5874a91cefc2d52554.jpg'),
(44, 48, 'a16cdf3464d2bfac5c6037adebcaaa00.jpg'),
(45, 49, 'bcfaecea1bd0360b0a3125b356810c4b.jpg'),
(46, 50, 'e33b33eca72e72a0b42a8e060e6281ae.jpg'),
(47, 52, '7e79b623f7b1ed488c801d638f2fc0b3.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Pname` varchar(50) NOT NULL COMMENT '商品名称',
  `Pn` varchar(50) NOT NULL COMMENT '商品编号',
  `Pnumber` int(10) unsigned DEFAULT '1' COMMENT '商品数量',
  `price` decimal(10,2) NOT NULL,
  `Pdes` text COMMENT '商品简介',
  `pubTime` int(10) unsigned NOT NULL,
  `isShow` tinyint(1) DEFAULT '1' COMMENT '是否有货',
  `cId` smallint(5) unsigned NOT NULL COMMENT '类别ID',
  PRIMARY KEY (`id`),
  UNIQUE KEY `Pname` (`Pname`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='商品表' AUTO_INCREMENT=54 ;

--
-- 转存表中的数据 `products`
--

INSERT INTO `products` (`id`, `Pname`, `Pn`, `Pnumber`, `price`, `Pdes`, `pubTime`, `isShow`, `cId`) VALUES
(20, '大佛龙井', '007123', 1000, '55.00', '<p>\r\n	<span style="font-family:SimHei;"><span style="color:#E53333;line-height:2.5;font-size:16px;font-family:&quot;">大佛龙井</span><span style="line-height:2.5;font-size:14px;font-family:&quot;">是新昌县主要名茶品种，为中国名茶三珍，</span></span><span style="color:#E53333;font-family:&quot;line-height:2.5;font-size:14px;">1</span><span style="color:#E53333;font-family:&quot;line-height:2.5;font-size:14px;">995年</span><strong><span style="color:#E53333;font-family:&quot;line-height:2.5;font-size:14px;">荣获中国科技精品博览会</span></strong><span style="font-family:&quot;line-height:2.5;font-size:14px;">唯一的</span><strong><span style="color:#E53333;font-family:&quot;line-height:2.5;font-size:16px;">金奖</span></strong><span style="font-family:&quot;line-height:2.5;font-size:14px;">。该茶选择县境高山无公害良种幼嫩芽叶精细加工而成。农业部茶叶质量监督检验测试中心在“茶叶感官审评报告”中称“新昌大佛龙井茶”，经检</span><span style="font-family:&quot;line-height:2.5;font-size:14px;"></span><span style="font-family:&quot;line-height:2.5;font-size:14px;">验外形扁平光滑，挺直尖削，形似碗钉，</span><span style="color:#E53333;font-family:SimHei;line-height:2.5;font-size:14px;"><strong><span style="font-family:Microsoft YaHei;">色泽嫩绿鲜润，滋味鲜醇甘爽，汤色杏绿明亮，叶底细嫩成朵匀齐</span></strong><span style="font-family:Microsoft YaHei;">，品质优良，属浙江龙井茶中的极品</span></span><span style="font-family:SimHei;"><span style="line-height:2.5;font-size:14px;font-family:&quot;">。</span><span style="line-height:2.5;font-family:&quot;"></span></span>\r\n</p>\r\n<p>\r\n	<span style="font-family:SimHei;"><span style="line-height:2.5;font-family:&quot;"><img src="/shop_xinc/plugins/kindeditor/attached/image/20180429/20180429113219_92916.jpg" alt="" /><br />\r\n</span></span>\r\n</p>', 1524994374, 1, 3),
(21, '新昌小京生', '007125', 1000, '98.00', '<p>\r\n	<span style="color:#E53333;font-size:18px;font-family:;">新昌小京生</span>，<span style="font-family:Microsoft YaHei;">俗称</span><span style="font-family:Microsoft YaHei;">小红毛花生</span><span style="font-family:Microsoft YaHei;">.落花生，以新昌县大市聚、红旗、孟家塘、西郊等一带黄土低台地生产的为最佳。新昌小京生花生，于</span><span style="font-family:Microsoft YaHei;">清朝</span><span style="font-family:Microsoft YaHei;">末年从</span><span style="font-family:Microsoft YaHei;">北京</span><span style="font-family:Microsoft YaHei;">引进，民国初期，就驰名于国内外。其特点是<span style="color:#E53333;"><strong>壳薄光泽，香而带甜，油而不腻，松脆爽口，色香味俱佳</strong></span>。经测定，小京生果仁，含蛋白质27%，脂肪48%，营养价值比鸡蛋、牛奶还高，农村有顺口溜云：“常吃小京生，胜过滋补品；吃了小京生，天天不想荤。”1984年，全国花生食味评比中，小京生名列首位。1990年，新昌县暨近邻嵊县，种植小京生花生约1000</span><span style="font-family:Microsoft YaHei;">亩</span><span style="font-family:Microsoft YaHei;">，年产量达1000</span><span style="font-family:Microsoft YaHei;">吨</span><span style="font-family:Microsoft YaHei;">。</span> \r\n</p>\r\n<p>\r\n	<span style="font-family:Microsoft YaHei;"><img src="/shop_xinc/plugins/kindeditor/attached/image/20180429/20180429113731_29780.jpg" alt="" /><br />\r\n</span> \r\n</p>', 1524994753, 1, 4),
(23, '新昌板栗', '007133', 999, '35.00', '<span style="font-family:宋体;background-color:#FFFFFF;">新昌板栗果大味美，甜糯香脆，含有淀粉、脂肪、蛋白质及多种维生素和无机盐类等营养物质，栗的药用价值在古药籍《崐名医别录》中列为上品，有“益气”、“补肾气”、“治腰、脚不遂”以及疗“筋骨断碎”、“肿痛阏血”等效用。“新昌糖炒栗子”历史悠久，在周边县市有较高的声誉。新昌板栗在短短的几年大发展后，一举成为浙江省板栗大县，面积已达十万亩，1998年总产量已达300万公斤。</span>', 1524996192, 1, 4),
(24, '新昌长毛兔', '007101', 999, '388.00', '<span style="font-family:宋体;background-color:#FFFFFF;">长毛兔饲养品种，多为本地长毛兔，系德、英、法、安哥拉长毛兔杂交繁殖而成，俗称西杂兔。其兔产毛量高，毛质长、细、白、松、净、耐用，有特种纤维之称。兔毛制品色白如雪，光泽柔和。特织毛衣，面有浮毛，蓬松如雾，十分美观。</span><span style="font-family:宋体;background-color:#FFFFFF;">兔产毛量高，毛质长、细、白、松、净、耐用，有特种纤维之称</span>', 1524996454, 1, 3),
(44, '新昌春饼', '007199', 999, '10.00', '<span style="font-family:宋体;background-color:#FFFFFF;">新昌春饼，主产于新昌县城和区乡集镇。可用作点心外，亦可做菜，带鲜肉馅或葱馅之小卷春油锅一汆，即成色泽金黄、香脆可口之春卷，为宴席名菜。用以下酒，堪称佳肴。1990年，新昌县从事春饼业个体户达140家。&nbsp;</span>', 1525016922, 1, 4),
(45, '牛心柿', '007151', 999, '25.00', '<span style="font-family:宋体;background-color:#FFFFFF;">新昌牛心柿味甘汁多，是鲜食佳品，可食率在96％以上，并且有较高的营养价值。</span>', 1525017177, 1, 6),
(46, '新昌水蜜桃', '007141', 999, '33.00', '', 1525018449, 1, 6),
(47, '新昌蓝莓', '007168', 999, '33.00', '', 1525018500, 1, 6),
(48, '新昌桑葚', '007191', 99, '20.00', '', 1525018582, 1, 6),
(49, '米海茶', '007198', 999, '3.50', '', 1525018785, 1, 3),
(50, '新昌白术', '007185', 100, '222.00', '<span style="font-size:16px;font-family:&quot;line-height:2.5;">白术（zhú）。别名桴蓟，</span><span style="font-size:16px;font-family:&quot;line-height:2.5;">于术</span><span style="font-size:16px;font-family:&quot;line-height:2.5;">，冬白术，淅术，杨桴，</span><span style="font-size:16px;font-family:&quot;line-height:2.5;">吴术</span><span style="font-size:16px;font-family:&quot;line-height:2.5;">，片术、</span><span style="font-size:16px;font-family:&quot;line-height:2.5;">苍术</span><span style="font-size:16px;font-family:&quot;line-height:2.5;">等，属于菊科、</span><span style="font-size:16px;font-family:&quot;line-height:2.5;">苍术属</span><span style="font-size:16px;font-family:&quot;line-height:2.5;">多年生草本植物。喜凉爽气候，以根茎入药，具有多项药用功能。</span><span style="font-size:16px;line-height:2.5;">新昌白术</span><span style="font-size:16px;line-height:2.5;">，又名浙术，是中药中著名的“浙八味”之一。主产于新昌、嵊县。明李时珍著《本草纲目》载：“白术，枪蓟也，吴越有之。”明万历《新昌县志》载：“白术出彩烟山，即本草所谓越州术也。今山背遁山亦出。”</span><span style="font-size:16px;line-height:2.5;">新昌白术</span><span style="font-size:16px;line-height:2.5;">，皮微褐，肉纯白，以“田鸡形”为佳。气清香，味甘苦。具有健脾益气、利水化湿、止汗、安胎等作用。主治脾虚、泄泻、水肿、痰饮等症。享有“道地药材”、“南术北参”之美称。新昌、嵊县白术常年产量1200吨左右，居全省首位。</span><span style="font-size:16px;"></span>', 1525019146, 1, 3),
(52, '新昌芋饺', '007127', 999, '10.00', '', 1525019501, 1, 4);

-- --------------------------------------------------------

--
-- 表的结构 `shop_admin`
--

CREATE TABLE IF NOT EXISTS `shop_admin` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `userName` varchar(20) NOT NULL,
  `passWord` char(32) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userName` (`userName`),
  UNIQUE KEY `userName_2` (`userName`),
  UNIQUE KEY `userName_3` (`userName`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='管理员表' AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `shop_admin`
--

INSERT INTO `shop_admin` (`id`, `userName`, `passWord`, `email`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', ''),
(3, 'xinchang', '1b5f23ab759fc806cc570fd751882968', 'xinchang@161.com'),
(4, '111', '698d51a19d8a121ce581499d7b701668', ''),
(5, '1111', 'e10adc3949ba59abbe56e057f20f883e', ''),
(6, 'aabb', '5e394281dfac81c1e7dddcaf4d35d1f6', ''),
(7, 'aaa', 'e10adc3949ba59abbe56e057f20f883e', '');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) NOT NULL,
  `pass_word` char(32) NOT NULL,
  `sex` enum('f','m') DEFAULT NULL,
  `face` varchar(50) NOT NULL,
  `regTime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户表' AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
