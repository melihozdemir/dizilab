/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : test

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-04-28 16:41:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `abonelikler`
-- ----------------------------
DROP TABLE IF EXISTS `abonelikler`;
CREATE TABLE `abonelikler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `show_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of abonelikler
-- ----------------------------

-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------

-- ----------------------------
-- Table structure for `aktiviteler`
-- ----------------------------
DROP TABLE IF EXISTS `aktiviteler`;
CREATE TABLE `aktiviteler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_data` text NOT NULL,
  `target_data` text NOT NULL,
  `target_type` tinyint(4) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=104 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of aktiviteler
-- ----------------------------
INSERT INTO `aktiviteler` VALUES ('97', '1', '{\"username\":\"root\"}', '{\"season\":\"4\",\"episode\":\"20\",\"title\":\"Person of Interest\",\"perma\":\"person-of-interest\"}', '3', '2015-12-27 10:39:12');

-- ----------------------------
-- Table structure for `arkadaslar`
-- ----------------------------
DROP TABLE IF EXISTS `arkadaslar`;
CREATE TABLE `arkadaslar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user1` int(11) NOT NULL,
  `user2` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user1` (`user1`),
  KEY `user2` (`user2`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of arkadaslar
-- ----------------------------

-- ----------------------------
-- Table structure for `bildirimler`
-- ----------------------------
DROP TABLE IF EXISTS `bildirimler`;
CREATE TABLE `bildirimler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `target_data` varchar(222) NOT NULL,
  `target_type` int(1) NOT NULL,
  `read` int(1) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bildirimler
-- ----------------------------

-- ----------------------------
-- Table structure for `bolumler`
-- ----------------------------
DROP TABLE IF EXISTS `bolumler`;
CREATE TABLE `bolumler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `show_id` int(11) NOT NULL,
  `season` int(11) NOT NULL,
  `episode` int(11) NOT NULL,
  `description` text NOT NULL,
  `embed` text NOT NULL,
  `subtitle` varchar(20) NOT NULL,
  `date_added` datetime NOT NULL,
  `liked` bigint(11) NOT NULL,
  `unliked` bigint(11) NOT NULL,
  `views` bigint(20) NOT NULL,
  `checked` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`show_id`),
  KEY `season` (`season`),
  KEY `episode` (`episode`)
) ENGINE=MyISAM AUTO_INCREMENT=1113 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bolumler
-- ----------------------------
INSERT INTO `bolumler` VALUES ('1', '1', '1', '1', 'lm', '', '1', '2016-01-19 23:14:39', '0', '0', '1', '1');
INSERT INTO `bolumler` VALUES ('2', '1', '2', '1', 'lm2', '', '1', '2016-01-19 23:14:39', '0', '0', '0', '1');
INSERT INTO `bolumler` VALUES ('3', '2', '1', '1', 'got', '', '1', '2016-01-19 23:14:39', '0', '0', '4', '1');
INSERT INTO `bolumler` VALUES ('4', '2', '2', '1', 'got2', '', '1', '2016-01-19 23:14:14', '0', '0', '0', '1');
INSERT INTO `bolumler` VALUES ('5', '3', '1', '1', 'twd', '', '1', '2016-01-19 23:14:14', '0', '0', '0', '1');
INSERT INTO `bolumler` VALUES ('6', '3', '2', '1', 'twd2', '', '1', '2016-01-19 23:14:14', '0', '0', '0', '1');
INSERT INTO `bolumler` VALUES ('7', '4', '1', '1', 'boi', '', '1', '2016-01-19 23:14:14', '0', '0', '2', '1');
INSERT INTO `bolumler` VALUES ('8', '4', '2', '1', 'boi2', '', '1', '2016-01-19 23:14:14', '0', '0', '1', '1');
INSERT INTO `bolumler` VALUES ('11', '4', '3', '1', 'boi3', '', '', '0000-00-00 00:00:00', '0', '0', '0', '0');
INSERT INTO `bolumler` VALUES ('12', '4', '1', '2', 'boi12', '', '', '0000-00-00 00:00:00', '0', '0', '0', '0');
INSERT INTO `bolumler` VALUES ('9', '6', '1', '1', 'stra', '', '1', '2016-01-19 23:14:14', '0', '0', '0', '1');
INSERT INTO `bolumler` VALUES ('10', '6', '2', '1', 'stra2', '', '1', '2016-01-19 23:14:14', '0', '0', '0', '1');
INSERT INTO `bolumler` VALUES ('13', '4', '1', '3', 'boi13', '', '', '0000-00-00 00:00:00', '0', '0', '0', '0');
INSERT INTO `bolumler` VALUES ('14', '4', '4', '1', 'boi41', '', '', '0000-00-00 00:00:00', '0', '0', '0', '0');
INSERT INTO `bolumler` VALUES ('15', '4', '4', '2', 'boi42', '', '', '0000-00-00 00:00:00', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for `diziler`
-- ----------------------------
DROP TABLE IF EXISTS `diziler`;
CREATE TABLE `diziler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `permalink` varchar(255) NOT NULL,
  `imdb_id` varchar(20) NOT NULL,
  `min` int(11) DEFAULT NULL,
  `country` varchar(22) NOT NULL,
  `year_started` int(11) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `imdb_rating` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `permalink` (`permalink`),
  KEY `title` (`title`),
  KEY `imdb_id` (`imdb_id`),
  KEY `imdb_rating` (`imdb_rating`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of diziler
-- ----------------------------
INSERT INTO `diziler` VALUES ('1', 'Leyla ile Mecnun', 'Leyla ile Mecnun, Eflatun Film tarafından yapılıp TRT 1\'de 3 sezon yayınlanan ve final yapamadan yayından kaldırılan absürt komedi türündeki Türk televizyon dizisi. Dizi temel olarak efsanevî karakterler Leylâ ile Mecnun\'un hikayesi üzerine kurgulanmış ve üzerine absürt komedi, bilim kurgu, durum komedisi öğeleri eklenmiştir.<br/>\r\n<br/>\r\nAynı gün, aynı hastanede dünyaya gelen iki bebek, yatak sayısının azlığından dolayı yan yana yatırılırlar. Ailelerinin &quot;doğar doğmaz birbirlerini buldular&quot; sözü üzerine beşik kertmesi yapılan bebekler, isimlerini de efsane aşıklar Leylâ ve Mecnun\'dan alırlar.<br/>\r\n<br/>\r\nAradan 25 yıl geçer. Bir sabah ailesi Mecnun\'a durumu anlatır ve Leyla\'yı istemeye giderler. Mecnun başta bu durumdan rahatsızlık duysa da Leyla\'yı görür görmez aşık olur. Onu etkilemek için ne yapacağını bilemeyen Mecnun, bir gece rüyasında aksakallı dedeyi görür. Aksakallı dedenin rüyalarından çıkıp Mecnun\'la beraber yaşamaya başlamasıyla da işler karışır.[6] Mecnun Leylayı bir trafik kazasında kaybeder. Bu durumu kabullenemeyen Mecnun 1 yıl kimseyle konuşmaz. Daha sonra Leyla\'nın organlarının bağışlandığını öğrenir. Bunun peşine düşen Mecnun Leyla\'nın kalbini alan Şirin ve ciğerini alan Sedef ile tanışır. Bir yanda kültürlü ve bilgili Şirin diğer yanda kuryelik yapan ve kendi gibi olan Sedef vardır. Mecnun ikisi arasında gidip gelir ancak ikisiyle de mutlu olamaz. Sedef ve Şirin mahalleyi terk eder. Leyla\'sının peşinde çöllere düşen Mecnun daha sonra babasının eski bir arkadaşı olan Ömer\'in kızı Leyla\'ya aşık olur.', 'leyla-ile-mecnun', 'tt1831164', '80', 'Türkiye', '2011', 'Dram|Komedi|Macera', '4', '9.2');
INSERT INTO `diziler` VALUES ('2', 'Game of Thrones', 'Dizi Westeros kıtasındaki birleşik Yedi Krallık\'ın uzun yazdan çıkmasının ve kışın yaklaşması ile başlar. Lord Eddard Stark\'ın eski ve yakın arkadaşı Kral Robert Baratheon, eski Kral Eli ve Eddard\'ın akıl hocasıJon Arryn\'nin ölmesi üzerine kendisinden yeni Kral Eli olmasını ister. Eddard, Jon\'un öldürüldüğü ile aldığı bir mesajdan sonra isteksiz de olsa bu görevi kabul eder.\r\n\r\nBu arada, Robert\'ın tahta hak iddia edenleri yok etmesinin ardından batı kıta olan Essos\'a sürülen Targaryen Hanesi\'nin çocukları, Westeros\'a dönmenin ve \'gaspçı\'yı tahttan indirmenin yollarını aramaktadırlar. Bu amaçla Viserys Targaryen, kız kardeşi Daenerys Targaryen ve 40.000 Dothraki\'nin lideri olan Khal Drogo arasında bir evlilik düzenler. Amacı ise Dothraki ordusunu Westeros\'u işgalinde kullanmaktır. Daenerys ise sadece Kral Robert\'ın suikastçılarından ve abisinin entrikalarından sığınacak güvenli bir yer arar.\r\n\r\nSon olarak da Yedi Krallık\'ın kuzeyini çevreleyen Sur\'un yeminli kardeşleri olan Gece Nöbetçileri, binlerce yıldır buzdan yapılmış devasa surda bekçilik yapmaya devam etmektedir. Nöbet Sur\'u, Sur\'un Ötesi\'nde yaşayan yabanıllar\'ın yağmalarından korumakla görevlidir. Fakat bazı söylentilere göre Daimi Kış Toprakları\'n da yeni bir tehdit söz konusudur.', 'game-of-thrones', 'tt0944947', '55', 'USA, UK', '2011', 'Fantastik|Dram|Macera', '1', '9.5');
INSERT INTO `diziler` VALUES ('3', 'The Walking Dead', 'Sheriff\'s Deputy Rick Grimes leads a group of survivors in a world overrun by zombies.', 'the-walking-dead', 'tt1520211', '44', 'USA', '2010', 'Gerilim|Korku|Dram', '2', '8.7');
INSERT INTO `diziler` VALUES ('4', 'Person of Interest', 'An ex-assassin and a wealthy programmer save lives via a surveillance AI that sends them the identities of civilians involved in impending crimes. However, the details of the crimes--including the civilians\' roles--are left a mystery.', 'person-of-interest', 'tt1839578', '43', 'USA', '2011', 'Bilim Kurgu|Gizem|Dram|Aksiyon', '1', '8.5');
INSERT INTO `diziler` VALUES ('5', 'Dexter', 'A Miami police forensics expert moonlights as a serial killer of criminals whom he believes have escaped justice.', 'dexter', 'tt0773262', '55', 'USA', '2006', 'Gizem|Dram|Suç', '3', '8.9');
INSERT INTO `diziler` VALUES ('6', 'The Strain', 'A thriller that tells the story of Dr. Ephraim Goodweather, the head of the Center for Disease Control Canary Team in New York City. He and his team are called upon to investigate a ...', 'the-strain', 'tt2654620', '43', 'ABD', '2014', 'Gerilim|Korku|Dram', '2', '7.7');

-- ----------------------------
-- Table structure for `fanlar`
-- ----------------------------
DROP TABLE IF EXISTS `fanlar`;
CREATE TABLE `fanlar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `cast_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of fanlar
-- ----------------------------

-- ----------------------------
-- Table structure for `forumlar`
-- ----------------------------
DROP TABLE IF EXISTS `forumlar`;
CREATE TABLE `forumlar` (
  `id` int(33) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `series` int(11) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `member` int(33) DEFAULT NULL,
  `date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of forumlar
-- ----------------------------

-- ----------------------------
-- Table structure for `haberler`
-- ----------------------------
DROP TABLE IF EXISTS `haberler`;
CREATE TABLE `haberler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(33) NOT NULL,
  `content` varchar(255) NOT NULL,
  `pic` varchar(33) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of haberler
-- ----------------------------
INSERT INTO `haberler` VALUES ('2', 'dizi arşivi ve beta süreci', 'beta sürecinde arşivimizi 350-400 diziye ulaştırmayı hedefliyoruz. arşivimizi bir anda birkaç yıllık dizi sitesi arşivine ulaştırmayacağımızı kabullenelim. öncelikli dizi istekleriniz için geri bildirimlerinizi takip ediyor olacağız.', '6_news', '2015-04-30 15:49:00');
INSERT INTO `haberler` VALUES ('3', 'alternatif video kaynakları.', 'dizileri barındırdığımız video kaynaklarını henüz stabilleştirebilmiş değiliz. yakın zamanda tüm bölümler için alternatif video kaynaklarını sunacağız. şimdilik karşılaştığınız hataları \"hata bildir\" ile bildirebilirsiniz.', '8_news', '2015-05-13 18:25:43');
INSERT INTO `haberler` VALUES ('1', 'dizilab. yayın hayatına başladı!', 'uzun süredir üzerinde uğraştığımız dizilab. yayın hayatına nihayet başladı. birbirinin klonu onlarca dizi sitesi varken bize şans vermenizi ümit ediyoruz.', '5_news', '2015-04-27 22:06:03');

-- ----------------------------
-- Table structure for `istekler`
-- ----------------------------
DROP TABLE IF EXISTS `istekler`;
CREATE TABLE `istekler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `who` varchar(255) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '1',
  `message` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of istekler
-- ----------------------------

-- ----------------------------
-- Table structure for `izlediklerim`
-- ----------------------------
DROP TABLE IF EXISTS `izlediklerim`;
CREATE TABLE `izlediklerim` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `target_id` int(11) NOT NULL,
  `min` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=231 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of izlediklerim
-- ----------------------------
INSERT INTO `izlediklerim` VALUES ('223', '1', '7', '0', '2016-01-20 18:46:17');
INSERT INTO `izlediklerim` VALUES ('224', '1', '12', '0', '2016-01-20 18:46:20');
INSERT INTO `izlediklerim` VALUES ('225', '1', '13', '0', '2016-01-20 18:46:21');
INSERT INTO `izlediklerim` VALUES ('229', '1', '0', '0', '2016-01-20 19:47:02');
INSERT INTO `izlediklerim` VALUES ('230', '1', '0', '0', '2016-01-20 19:52:31');

-- ----------------------------
-- Table structure for `izleyeceklerim`
-- ----------------------------
DROP TABLE IF EXISTS `izleyeceklerim`;
CREATE TABLE `izleyeceklerim` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `ep_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of izleyeceklerim
-- ----------------------------
INSERT INTO `izleyeceklerim` VALUES ('1', '1', '128', '2016-01-18 15:11:14');

-- ----------------------------
-- Table structure for `oylar`
-- ----------------------------
DROP TABLE IF EXISTS `oylar`;
CREATE TABLE `oylar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `series_id` int(11) NOT NULL,
  `vote` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of oylar
-- ----------------------------
INSERT INTO `oylar` VALUES ('8', '1', '1', '10', '2016-01-18 13:07:04');

-- ----------------------------
-- Table structure for `oyuncular`
-- ----------------------------
DROP TABLE IF EXISTS `oyuncular`;
CREATE TABLE `oyuncular` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `nick` varchar(33) NOT NULL,
  `bermalink` varchar(255) NOT NULL,
  `birthplace` varchar(255) NOT NULL,
  `series` int(11) NOT NULL,
  `datebirth` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of oyuncular
-- ----------------------------
INSERT INTO `oyuncular` VALUES ('1', 'Ezgi Asaroglu', 'Leyla', 'ezgi-asaroglu', 'Izmir, Türkiye', '1', '1987-06-18');

-- ----------------------------
-- Table structure for `uyeler`
-- ----------------------------
DROP TABLE IF EXISTS `uyeler`;
CREATE TABLE `uyeler` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` enum('m','f') NOT NULL,
  `birthday` varchar(10) NOT NULL DEFAULT '',
  `twitter` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `photo` int(11) NOT NULL,
  `type` enum('n','f','t','w','g') NOT NULL DEFAULT 'n',
  `info` varchar(255) DEFAULT '',
  `permission` int(1) NOT NULL DEFAULT '0',
  `last_activity` datetime NOT NULL,
  `create_date` datetime NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `konum` varchar(255) NOT NULL,
  `adsoyad` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of uyeler
-- ----------------------------
INSERT INTO `uyeler` VALUES ('1', 'root', 'test', '', 'm', '', '', '', '0', 'n', '', '2', '2015-12-26 12:29:42', '2015-05-15 22:32:34', '1', '', '');
INSERT INTO `uyeler` VALUES ('2', 'atmin', 'test', '', 'm', '', '', '', '0', 'f', '', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '');
INSERT INTO `uyeler` VALUES ('8', 'knk', 'test', '', 'f', '', '', '', '0', 'n', '', '0', '2015-06-16 00:14:56', '0000-00-00 00:00:00', '1', '', '');

-- ----------------------------
-- Table structure for `yaptiklarim`
-- ----------------------------
DROP TABLE IF EXISTS `yaptiklarim`;
CREATE TABLE `yaptiklarim` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL DEFAULT '0',
  `target_id` int(11) NOT NULL,
  `type` int(1) NOT NULL DEFAULT '1',
  `wall` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=150 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yaptiklarim
-- ----------------------------
INSERT INTO `yaptiklarim` VALUES ('141', '1', '60', '6', '1', '2016-01-18 13:06:55');
INSERT INTO `yaptiklarim` VALUES ('142', '1', '369823', '6', '1', '2016-01-18 13:07:22');
INSERT INTO `yaptiklarim` VALUES ('143', '1', '62', '6', '1', '2016-01-18 13:08:30');
INSERT INTO `yaptiklarim` VALUES ('144', '1', '63', '7', '1', '2016-01-18 13:09:01');
INSERT INTO `yaptiklarim` VALUES ('145', '1', '128', '3', '1', '2016-01-18 14:46:44');
INSERT INTO `yaptiklarim` VALUES ('146', '1', '66', '6', '1', '2016-01-18 14:49:45');
INSERT INTO `yaptiklarim` VALUES ('147', '1', '128', '4', '1', '2016-01-18 15:08:55');
INSERT INTO `yaptiklarim` VALUES ('148', '1', '68', '7', '1', '2016-01-20 19:23:30');
INSERT INTO `yaptiklarim` VALUES ('149', '1', '69', '6', '1', '2016-01-22 10:19:47');

-- ----------------------------
-- Table structure for `yorumlar`
-- ----------------------------
DROP TABLE IF EXISTS `yorumlar`;
CREATE TABLE `yorumlar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `target_id` int(11) DEFAULT NULL,
  `content` varchar(377) NOT NULL,
  `type` int(1) NOT NULL,
  `liked` int(11) NOT NULL,
  `unliked` int(11) NOT NULL,
  `spoiler` int(11) NOT NULL,
  `tarih` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yorumlar
-- ----------------------------
