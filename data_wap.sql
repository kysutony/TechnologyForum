-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th6 01, 2021 lúc 10:27 AM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `data_wap`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `avatar`
--

CREATE TABLE `avatar` (
  `id` int(11) NOT NULL,
  `avatar_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(11) NOT NULL,
  `id_account` varchar(15) NOT NULL,
  `noidung` text NOT NULL,
  `idbv` varchar(30) NOT NULL,
  `tpost` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bot`
--

CREATE TABLE `bot` (
  `id` int(11) NOT NULL,
  `uage` varchar(600) COLLATE utf8_unicode_ci NOT NULL,
  `uaget` varchar(600) COLLATE utf8_unicode_ci NOT NULL,
  `uagen` varchar(600) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_subject` varchar(250) NOT NULL,
  `comment_text` text NOT NULL,
  `comment_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dt_chat`
--

CREATE TABLE `dt_chat` (
  `id` int(11) NOT NULL,
  `idaccount` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `content` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `subchat1` varchar(111) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dt_forum`
--

CREATE TABLE `dt_forum` (
  `id` int(11) NOT NULL,
  `idaccount` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `content` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `tpost` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `cm` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `rtype` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `viewr` varchar(600) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `lasthd` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `colp` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'noclose',
  `anbv` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dt_forum`
--

INSERT INTO `dt_forum` (`id`, `idaccount`, `title`, `content`, `tpost`, `cm`, `rtype`, `viewr`, `lasthd`, `colp`, `anbv`) VALUES
(9, '5', 'Thủ thuật Microsoft Edge: chụp screenshot toàn bộ trang web, chia sẻ link bằng QR Code, thay theme…', 'Chụp screenshot toàn bộ trang web\r\n\r\nĐể chụp thì anh em click chuột phải lên khoảng trống trên trang web chọn Web capture hoặc nhấn tổ hợp phím Ctrl + Shift + S. Lúc này sẽ hiện ra thanh công cụ với 2 tuỳ chọn là Free select (chọn vùng chụp tuỳ ý) và Full page (chụp toàn bộ trang web).\r\n\r\n\r\n\r\nAnh em chọn Full page tức thì trang web sẽ được chụp lại đầy đủ, và có thể thêm ghi chú bằng công cụ Draw có sẵn.\r\n\r\n\r\nChia sẻ trang web, ảnh bằng QR Code\r\n\r\nMột tính năng khá tiện để chia sẻ trang web hay hình ảnh cho người khác bằng QR Code. Để chia sẻ đường link trang web đang mở thì anh em nhấp vào link trên thanh Address sẽ hiện ra nút Create QR Code for this page ở cuối cùng, nhấp vào sẽ hiện ra QR code để quét. Hoặc cũng có thể click chuột phải vào khoảng trống ở trên trang web chọn Create QR code for this page.\r\n\r\n\r\nĐể chia sẻ ảnh trên trang thì nhấp chuột phải vào ảnh, chọn Create QR Code for this image là được.\r\n\r\n \r\nTìm kiếm nhanh với kết quả hiện ra ngay trong tab đang mở\r\n\r\nĐây gọi là tính năng Sidebar Search. Anh em bôi đen thông tin cần search, nhấp chuột phải chọn Search Bing in sidebar for “từ khoá” hoặc nhấn tổ hợp phím Ctrl + Shift + E tức thì kết quả sẽ hiện trong một panel bên cạnh phải thay vì phải qua tab mới như thông thường.\r\n\r\n \r\n\r\nThay theme cho Edge\r\n\r\nAnh em vào menu ba chấm &gt; Settings &gt; Appearance, ngay dòng Custom theme có thể chọn Microsoft Edge Add-On store để chọn từ kho theme của Microsoft hoặc vào other stores để chọn từ kho theme của Chrome.\r\n', '00:19:44 28/05/2021', 'thu-thuat, windows', 'Share', '6', '1622135984', 'noclose', 0),
(10, '5', 'MySQL là gì?', 'Đầu tiên, hãy phát âm đúng. Nhiều người đọc nó là “my sequel” hoặc khác, nhưng phát âm chính thức là là: MY-ES-KYOO-EL’ [maɪˌɛsˌkjuːˈɛl]. Công ty Thuy Điển MySQL AB phát triển MySQL vào năm 1994. Công ty công nghệ Mỹ Sun Microsystem sau đó giữ quyền sở hữu MySQL sau khi mua lại MySQL vào năm 2008. Năm 2010, gã khổng lồ Oracle mua Sun Microsystems và MySQL thuộc quyền sở hữu của Oracle từ đó.\r\n\r\nQuay lại với khái niệm chính, MySQL là một hệ thống quản trị cơ sở dữ liệu mã nguồn mở (Relational Database Management System, viết tắt là RDBMS) hoạt động theo mô hình client-server. RDBMS là một phần mềm hay dịch vụ dùng để tạo và quản lý các cơ sở dữ liệu (Database) theo hình thức quản lý các mối liên hệ giữa chúng.\r\n\r\nMySQL là một trong số các phần mềm RDBMS. RDBMS và MySQL thường được cho là một vì độ phổ biến quá lớn của MySQL. Các ứng dụng web lớn nhất như Facebook, Twitter, YouTube, Google, và Yahoo! đều dùng MySQL cho mục đích lưu trữ dữ liệu. Kể cả khi ban đầu nó chỉ được dùng rất hạn chế nhưng giờ nó đã tương thích với nhiều hạ tầng máy tính quan trọng như Linux, macOS, Microsoft Windows, và Ubuntu.', '12:06:07 28/05/2021', 'thao-luan-wap-web, mysql', 'Share', '3', '1622178367', 'noclose', 0),
(7, '1', 'Apple sẽ tổ chức sự kiện WWDC21 vào ngày 8/6: sẽ có iOS 15, watchOS 8, macOS 12,…', 'Apple đã chính thức công bố sự kiện WWDC 2021 với khẩu hiệu “Glow and Behold”, bắt đầu từ 0h rạng sáng ngày 8/6 (theo giờ Việt Nam) đến ngày 12 tháng 6. Tại WWDC 2021, Apple sẽ giới thiệu các phiên bản nâng cấp tiếp theo của loạt phần mềm, bao gồm iOS 15, macOS 12, watchOS 8,…\r\n\r\nVà bởi vì chúng ta vẫn đang sống chung với đại dịch Covid-19, nên sự kiện WWDC năm nay sẽ vẫn tiếp tục được tổ chức online và phát trực tiếp trên trang web của Apple.\r\n\r\nChi tiết về WWDC21\r\nNăm ngoái, Apple lần đầu tiên tổ chức sự kiện WWDC online và đã nhận được nhiều lời khen vì đã giúp làm cho sự kiện này dễ dàng tham gia hơn cho tất cả mọi người, đặc biệt là đối với những lập trình viên không sống tại San Jose, California. Tim Cook nói rằng WWDC20 đã thu hút 22 triệu người xem trên tất cả các nguồn phát trực tiếp của Apple.\r\n\r\nTrong thông cáo báo chí trên trang web, Apple nói rằng WWDC21 “sẽ cung cấp thông tin chi tiết về tương lai của iOS, iPadOS, macOS, watchOS và tvOS.”\r\n\r\nVì vậy, gần như chắc chắn là Apple sẽ tập trung nhiều vào các nền tảng phần mềm của mình tại WWDC năm nay. Điều này có thể sẽ bao gồm việc công bố iOS 15, iPadOS 15, watchOS 8, macOS 12 và tvOS 15. Phiên bản beta dành cho các nhà phát triển/lập trình viên cũng có thể được phát hành ngay sau đó.\r\n\r\nNăm nay, sự kiện WWDC cũng có thể là nơi để Apple giới thiệu phần cứng mới nhắm vào các nhà phát triển. Đáng chú ý nhất, họ cũng đang trong quá trình chuyển đổi dòng máy Mac sang bộ vi xử lý Apple Silicon và các tin đồn cho thấy rằng iMac mới, MacBook Pro và nhiều sản phẩm nữa cũng chuẩn bị ra mắt.\r\n\r\nBạn đang mong chờ điều gì nhất tại sự kiện WWDC21 vào tháng 6? Hãy cho mình biết trong phần bình luận bên dưới nhé!', '00:01:51 28/05/2021', 'su-kien, apple', 'Thông Báo', '15', '1622135353', 'noclose', 0),
(11, '6', ' HTML là gì?', ' HTML là gì?\r\n\r\nHTML là viết tắt của từ Hyper Text Markup Language, có nghĩa là ngôn ngữ đánh dấu siêu văn bản. HTML được sử dụng để định dạng và hiển thị văn bản trên trình duyệt tới người sử dụng. Nó là xương sống của một trang web.\r\n\r\nVậy thì Hyper Text và Markup Language là gì?\r\n\r\nHyper Text: siêu văn bản có nghĩa là &quot;văn bản trong văn bản&quot;. Một văn bản có chứa một liên kết (link) là một siêu văn bản. Mỗi lần bản click vào một từ từ đó đưa bạn tới một trang web mới, đó là siêu văn bản.\r\n\r\nMarkup Language: ngôn ngữ đánh dấu là một ngôn ngữ lập trình được sử dụng để giúp văn bản dễ tương tác và linh động hơn. Nó có thể đặt văn bản vào trong các ảnh, bảng, liên kết...\r\n\r\nMột tài liệu HTML chưa nhiều thẻ HTML và mỗi thẻ HTML chứa các nội dung khác nhau.\r\n\r\nVí dụ, một trang web chuẩn thì có chứa các thẻ HTML như sau:\r\n?\r\n1\r\n2\r\n3\r\n4\r\n5\r\n6\r\n7\r\n8\r\n9\r\n10\r\n11\r\n12\r\n	\r\n&lt;!DOCTYPE&gt;  \r\n&lt;html&gt; \r\n    &lt;head&gt;\r\n     &lt;!-- \r\n  Thông tin cơ bản của trang web \r\n  và các liên kết đến css, javascript\r\n  --&gt;\r\n    &lt;/head&gt; \r\n    &lt;body&gt; \r\n        &lt;!-- Nội dung trang web --&gt;\r\n    &lt;/body&gt;  \r\n&lt;/html&gt;\r\n\r\nTrong đó, thẻ &lt;head&gt; chứa thông tin được ẩn (không hiển thị lên trình duyệt) bao gồm thông tin cơ bản và các liên kết đến file css, javascript, ... Còn thẻ &lt;body&gt; chưa thông tin bạn muốn hiển thị lên trình duyệt. ', '12:09:43 28/05/2021', 'ma-nguon, html', 'Share', '1', '1622178583', 'noclose', 1),
(14, '1', 'Các dòng máy Mac chạy M1 “nhanh” hơn là do tối ưu tốt Mac OS mà thôi!', '<p style=\"margin-left:0; margin-right:0; text-align:start\">Khi con chip M1 bắt đầu được trang bị tr&ecirc;n c&aacute;c sản phẩm thương mại h&oacute;a, người ta đ&atilde; kh&ocirc;ng tiếc d&agrave;nh những lời khen, những lời th&aacute;n phục về hiệu suất của n&oacute; khi so s&aacute;nh với c&aacute;c thiết bị được trang bị CPU Intel v&agrave; AMD. Kh&ocirc;ng thể phủ nhận tốc độ của c&aacute;c thiết bị n&agrave;y nhanh hơn rất nhiều, tuy nhi&ecirc;n điều n&agrave;y c&oacute; ho&agrave;n to&agrave;n l&agrave; nhờ v&agrave;o &ldquo;c&ocirc;ng lao&rdquo; của chip M1 hay kh&ocirc;ng?</p>\r\n\r\n<p style=\"margin-left:0; margin-right:0; text-align:start\"><img class=\"fr-dib fr-fic\" src=\"https://api.thinkview.vn/uploads/editor/m1-nhanh-hon-la-do-toi-uu-mac-os-3.jpg\" style=\"--animation-duration:1s; --animation-iteration-count:infinite; border:0px solid #f7f9fb; box-sizing:border-box; cursor:pointer; display:block; float:none; height:auto; margin:5px auto; max-width:100%; position:relative; vertical-align:top\" /></p>\r\n\r\n<p style=\"margin-left:0; margin-right:0; text-align:start\">Mới đ&acirc;y một developer đằng sau c&aacute;c ứng dụng Mac c&oacute; t&ecirc;n l&agrave; Howard Oakley đ&atilde; thực hiện một số những nghi&ecirc;n cứu để t&igrave;m ra &ldquo;c&ocirc;ng thức&rdquo; đặc biệt khiến cho Mac M1 hoạt động nhanh. Kết luận một c&aacute;ch ngắn gọn rằng, Mac M1 c&oacute; hiệu suất tốt hơn ch&iacute;nh l&agrave; do n&oacute; được tối ưu&hellip;phần mềm.&nbsp;</p>\r\n\r\n<p style=\"margin-left:0; margin-right:0; text-align:start\">Trong ph&acirc;n t&iacute;ch của m&igrave;nh, Howard Oakley đ&atilde; so s&aacute;nh MacBook Pro chạy M1 với Mac mini v&agrave; Mac Pro chạy Intel Xeon. Tất cả đều chạy tr&ecirc;n hệ điều h&agrave;nh macOS Big Sur. Howard Oakley kiểm tra hoạt động của hệ thống bằng c&aacute;ch cho chạy đồng thời c&aacute;c nhiệm vụ c&oacute; mức độ ưu ti&ecirc;n (QoS) kh&aacute;c nhau. Theo mặc định, macOS được thiết lập giải quyết theo thứ tự tầm quan trọng của t&aacute;c vụ. Nhưng c&aacute;c nh&agrave; ph&aacute;t triển ho&agrave;n to&agrave;n c&oacute; thể can thiệp để điều khiển QoS.&nbsp;</p>\r\n\r\n<p style=\"margin-left:0; margin-right:0; text-align:start\">Howard Oakley đ&atilde; sử dụng ứng dụng Cormorant, đ&acirc;y l&agrave; một tiện &iacute;ch giải n&eacute;n cho ph&eacute;p tự đặt mức QoS. Anh ấy đ&atilde; n&eacute;n một tệp k&iacute;ch thước 10 gigabyte, tr&ecirc;n Mac Intel c&aacute;c t&aacute;c vụ n&eacute;n sẽ được l&ecirc;n lịch để chạy tr&ecirc;n tất cả c&aacute;c l&otilde;i, trong đ&oacute; một t&aacute;c vụ c&oacute; mức độ ưu ti&ecirc;n cao v&agrave; một t&aacute;c vụ ưu ti&ecirc;n thấp. T&aacute;c vụ đầu ti&ecirc;n được thực hiện trong một khoảng thời gian vừa phải, trong khi t&aacute;c vụ thứ 2 mất rất nhiều thời gian mới c&oacute; thể ho&agrave;n th&agrave;nh.&nbsp;</p>\r\n\r\n<p style=\"margin-left:0; margin-right:0; text-align:start\">Ngược lại với MacBook Pro M1, macOS sẽ l&ecirc;n lịch ưu ti&ecirc;n t&aacute;c vụ thấp l&ecirc;n c&aacute;c l&otilde;i Icestorm hiệu quả cao ngay cả khi kh&ocirc;ng c&oacute; t&aacute;c vụ cạnh tranh n&agrave;o, điều n&agrave;y gi&uacute;p cho c&aacute;c l&otilde;i Firestorm c&oacute; hiệu suất cao hơn xử l&yacute; c&aacute;c t&aacute;c vụ ưu ti&ecirc;n cao.&nbsp;</p>\r\n\r\n<p style=\"margin-left:0; margin-right:0; text-align:start\"><img class=\"fr-dib fr-fic\" src=\"https://api.thinkview.vn/uploads/editor/m1-nhanh-hon-la-do-toi-uu-mac-os-1.jpg\" style=\"--animation-duration:1s; --animation-iteration-count:infinite; border:0px solid #f7f9fb; box-sizing:border-box; cursor:pointer; display:block; float:none; height:auto; margin:5px auto; max-width:100%; position:relative; vertical-align:top\" /></p>\r\n\r\n<p style=\"margin-left:0; margin-right:0; text-align:start\">Điều n&agrave;y c&oacute; nghĩa l&agrave; tr&ecirc;n c&aacute;c m&aacute;y Mac M1, Apple ưu ti&ecirc;n khả năng phản hồi tương tự như iPhone v&agrave; iPad. C&aacute;c t&aacute;c vụ ưu ti&ecirc;n thấp sẽ lu&ocirc;n được chạy tr&ecirc;n c&aacute;c l&otilde;i hiệu suất cao để xử l&yacute; nhanh hơn v&agrave; tiết kiệm điện năng. Khi bạn k&iacute;ch hoạt ứng dụng, c&aacute;c l&otilde;i hiệu suất cao đ&oacute; sẵn s&agrave;ng thực thi với độ trễ gần như kh&ocirc;ng thể nhận thất, đ&oacute; l&agrave; l&yacute; do tại sao n&oacute; &ldquo;nhanh hơn&rdquo; so với m&aacute;y Mac chạy Intel.&nbsp;</p>\r\n\r\n<p style=\"margin-left:0; margin-right:0; text-align:start\"><img class=\"fr-dib fr-fic\" src=\"https://api.thinkview.vn/uploads/editor/m1-nhanh-hon-la-do-toi-uu-mac-os-2.jpg\" style=\"--animation-duration:1s; --animation-iteration-count:infinite; border:0px solid #f7f9fb; box-sizing:border-box; cursor:pointer; display:block; float:none; height:auto; margin:5px auto; max-width:100%; position:relative; vertical-align:top\" /></p>\r\n\r\n<p style=\"margin-left:0; margin-right:0; text-align:start\">Về mặt l&yacute; thuyết, r&otilde; r&agrave;ng Apple ho&agrave;n to&agrave;n c&oacute; thể thực hiện điều n&agrave;y tr&ecirc;n c&aacute;c m&aacute;y Mac chạy Intel nếu muốn, nhưng họ đ&atilde; kh&ocirc;ng l&agrave;m như vậy. Họ muốn n&acirc;ng tầm c&aacute;c thiết bị chạy M1 hơn. Trong kế hoạch của m&igrave;nh, Apple đang dần muốn c&oacute; được sự &quot;thống lĩnh&quot; tr&ecirc;n mọi mặt trận, để người d&ugrave;ng l&uacute;c n&agrave;o cũng phải tung h&ocirc; v&agrave; t&ocirc;n thờ m&igrave;nh như một vị thần. Mặc d&ugrave; Mac Intel cũng l&agrave; &quot;ruột r&agrave; m&aacute;u mủ&quot;, nhưng suy cho c&ugrave;ng n&oacute; cũng chỉ l&agrave; một đứa con lai m&agrave; th&ocirc;i. Sẽ kh&ocirc;ng c&oacute; g&igrave; đ&aacute;ng ngạc nhi&ecirc;n khi m&agrave; d&ograve;ng chip M đ&atilde; đạt đến một th&agrave;nh c&ocirc;ng nhất định, Mac Intel sẽ ho&agrave;n to&agrave;n bị x&oacute;a t&ecirc;n.&nbsp;</p>\r\n\r\n<p style=\"margin-left:0; margin-right:0; text-align:start\">Apple cũng đang ph&aacute;t triển d&ograve;ng chip M thế hệ tiếp theo, hứa hẹn sẽ c&oacute; nhiều n&acirc;ng cấp v&agrave; l&agrave;m người d&ugrave;ng bất ngờ hơn nữa.&nbsp;</p>\r\n', '13:03:30 28/05/2021', 'su-kien, apple', 'Share', '13', '1622181810', 'noclose', 0),
(24, '1', 'iMac M1 vẫn được thiết kế bởi Jony Ive!!?', '<p>N&oacute;i qua một ch&uacute;t về Jony Ive, &ocirc;ng l&agrave; một huyền thoại sống trong l&agrave;ng thiết kế c&ocirc;ng nghiệp tr&ecirc;n thế giới. &Ocirc;ng đ&atilde; gắn b&oacute; với Apple 30 năm trước khi nghỉ việc v&agrave;o năm 2019. Jony Ive l&agrave; người đ&atilde; thiết kế gần như tất cả c&aacute;c mẫu iPhone m&agrave; c&aacute;c bạn đang cầm tr&ecirc;n tay đ&oacute;! (từ thế hệ iPhone đầu ti&ecirc;n cho đến thế hệ thứ 11). Thời điểm Jonathan Ive rời khỏi Apple, th&igrave; ngay sau đ&oacute; gi&aacute; cổ phiếu Apple giảm hơn 1%, khiến gi&aacute; trị vốn h&oacute;a của c&ocirc;ng ty c&ocirc;ng nghệ Mỹ c&oacute; l&uacute;c bốc hơi &iacute;t nhất 9 tỉ USD, trước khi hồi phục lại v&agrave;o cuối ng&agrave;y 27 th&aacute;ng 6 năm 2019. N&oacute;i sơ qua đến đ&acirc;y th&igrave; chắc anh em cũng đủ hiểu Jonathan Ive l&agrave; người như thế n&agrave;o kh&ocirc;ng chỉ đối với Apple n&oacute;i chung m&agrave; c&ograve;n l&agrave; tượng đ&agrave;i trong lĩnh vực thiết kế c&ocirc;ng nghiệp!</p>\r\n\r\n<p><img src=\"https://api.thinkview.vn/uploads/editor/jony-ive-thiet-ke-imac-m1-4.jpg\" /></p>\r\n\r\n<p>Theo như nhiều bản b&aacute;o c&aacute;o m&agrave; c&aacute;c trang c&ocirc;ng nghệ uy t&iacute;n tổng hợp được trong thời gian vừa qua th&igrave; iMac M1 vẫn được thiết kể bởi Jony Ive. Tuy nhi&ecirc;n, Apple được cho l&agrave; sẽ kh&ocirc;ng x&aacute;c nhận ch&iacute;nh thức th&ocirc;ng tin n&agrave;y. Chuyện n&agrave;y nghe c&oacute; vẻ kh&aacute; lạ khi m&agrave; thực chất, huyền thoại thiết kế c&ocirc;ng nghiệp hiện đại đ&atilde; ch&iacute;nh thức chia tay T&aacute;o khuyết từ năm 2019.</p>\r\n\r\n<p><img src=\"https://api.thinkview.vn/uploads/editor/jony-ive-thiet-ke-imac-m1-2.jpg\" /></p>\r\n\r\n<p>Theo tờ The Wired: Jony Ive đ&atilde; tham gia v&agrave;o kh&acirc;u thiết kế chiếc iMac mới nhất. Thực chất, kh&acirc;u thiết kế phần cứng l&agrave; một trong những qu&aacute; tr&igrave;nh &ldquo;d&agrave;i hơi&rdquo; n&ecirc;n kh&ocirc;ng c&oacute; g&igrave; qu&aacute; ngạc nhi&ecirc;n khi m&agrave; ch&uacute;ng ta vẫn thấy được &ldquo;dấu vết&rdquo; của Jony Ive tr&ecirc;n phi&ecirc;n bản iMac mới. Tuy nhi&ecirc;n, điều th&uacute; vị l&agrave; Apple chắc chắn sẽ kh&ocirc;ng x&aacute;c nhận hay phủ nhận điều n&agrave;y!</p>\r\n\r\n<p>Cũng theo những th&ocirc;ng tin m&agrave; m&igrave;nh t&igrave;m hiểu được, đối với những sản phẩm quan trọng, định h&igrave;nh lại to&agrave;n bộ tinh thần của một dải th&igrave; kh&acirc;u thiết kế của n&oacute; cũng đ&atilde; phải diễn ra trong v&ograve;ng từ 3 đến 4 năm trước khi sản phẩm đ&oacute; được ch&iacute;nh thức c&ocirc;ng bố. N&ecirc;n l&agrave; khả năng cao, thiết kế của iMac M1 đ&atilde; c&oacute; mặt tr&ecirc;n b&agrave;n của những nh&agrave; điều h&agrave;nh Apple từ năm 2018 hoặc 2019 rồi. Đ&acirc;y l&agrave; cơ sở của việc khả năng kh&ocirc;ng nhỏ, Jony Ive cũng l&agrave; một trong những người &ldquo;nh&agrave;o nặn&rdquo; ra iMac M1.</p>\r\n\r\n<p><img src=\"https://api.thinkview.vn/uploads/editor/jony-ive-thiet-ke-imac-m1.jpg\" /></p>\r\n\r\n<p>Thực tế, điều n&agrave;y l&agrave; ho&agrave;n to&agrave;n c&oacute; cơ sở khi m&agrave; ch&iacute;nh Jony Ive cũng đ&atilde; x&aacute;c nhận rằng ch&iacute;nh &ocirc;ng cũng đ&atilde; chuẩn bị kh&acirc;u thiết kế của chiếc iPhone X từ năm 2012, tức l&agrave; 5 năm trước khi si&ecirc;u phẩm n&agrave;y được ra mắt. Anh em cũng c&oacute; thể dễ d&agrave;ng nhận ra kể cả sau khi rời Apple, hơi hướng tinh hoa của Jony Ive vẫn c&ograve;n đ&oacute; tr&ecirc;n những chiếc iMac M1 như thiết kế si&ecirc;u mỏng cũng như &ldquo;chiếc cằm dưới&rdquo; m&agrave;n h&igrave;nh mang t&iacute;nh biểu tượng vẫn c&ograve;n đ&oacute;.</p>\r\n\r\n<p><img src=\"https://api.thinkview.vn/uploads/editor/jony-ive-thiet-ke-imac-m1-3.jpg\" /></p>\r\n\r\n<p>Hiện tại, sau khi dời khỏi Apple, Jony Ive đ&atilde; th&agrave;nh lập c&ocirc;ng ty thiết kế mang t&ecirc;n LoveFrom. Kh&aacute; nhiều nguồn tin cho rằng Apple cũng l&agrave; một trong những kh&aacute;ch h&agrave;ng quan trọng của LoveFrom. Vậy th&igrave; liệu rằng, khả năng n&agrave;o về những chiếc iPhone thế hệ tiếp theo sẽ lại được nh&agrave;o nặn bởi tượng đ&agrave;i của ng&agrave;nh thiết kế c&ocirc;ng nghiệp?&nbsp;</p>\r\n', '01:21:34 01/06/2021', 'su-kien, apple', 'Tin Tức', '3', '1622485294', 'noclose', 0),
(25, '1', 'Trí Tuệ Nhân Tạo Vận Hành Như Thế Nào?', '<p><iframe frameborder=\"0\" height=\"315\" src=\"https://www.youtube.com/embed/XZuJcCGqL9I\" title=\"YouTube video player\" width=\"560\"></iframe></p>\r\n\r\n<p>Video giải thích cách vận hành của trí tuệ nhân tạo</p>\r\n\r\n\r\n', '01:30:54 01/06/2021', 'kien-thuc, ai', 'Chia sẻ', '11', '1622486158', 'noclose', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dt_forumcmc`
--

CREATE TABLE `dt_forumcmc` (
  `id` int(11) NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `nlink` varchar(60) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dt_forumcmc`
--

INSERT INTO `dt_forumcmc` (`id`, `name`, `nlink`) VALUES
(1, 'Ban Quản Trị', 'ban-quan-tri'),
(2, 'Thảo Luận Wap/Web', 'thao-luan-wap-web'),
(3, 'Mã Nguồn', 'ma-nguon'),
(12, 'Kiến thức', 'kien-thuc'),
(8, 'Sự kiện', 'su-kien'),
(10, 'Thủ thuật', 'thu-thuat');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dt_forumcmp`
--

CREATE TABLE `dt_forumcmp` (
  `id` int(11) NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `nlink` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `inid` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dt_forumcmp`
--

INSERT INTO `dt_forumcmp` (`id`, `name`, `nlink`, `inid`) VALUES
(1, 'Thông Báo', 'thong-bao', '1'),
(2, 'Kiến Thức Chung', 'kien-thuc-chung', '2'),
(3, 'HTML - CSS - JS', 'html-css-js', '2'),
(4, 'MySQL', 'mysql', '2'),
(5, 'Domain & Hosting', 'domain-hosting', '2'),
(6, 'PHP', 'php', '3'),
(7, 'HTML', 'html', '3'),
(8, 'CSS', 'css', '3'),
(9, 'JavaScript', 'javascript', '3'),
(10, 'jQuery - Ajax', 'jquery-ajax', '3'),
(11, 'Báo Lỗi', 'bao-loi', '1'),
(12, 'Xtgem', 'xtgem', '4'),
(25, 'AI', 'ai', '12'),
(14, 'XTScript', 'xtscript', '3'),
(15, 'TWIG', 'twig', '3'),
(19, 'Windows', 'windows', '10'),
(18, 'Apple', 'apple', '8'),
(20, 'Tin tức', 'tin-tuc', '8');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dt_forumcmt`
--

CREATE TABLE `dt_forumcmt` (
  `id` int(11) NOT NULL,
  `idaccount` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `content` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `idbv` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `tpost` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dt_forumcmt`
--

INSERT INTO `dt_forumcmt` (`id`, `idaccount`, `content`, `idbv`, `tpost`) VALUES
(14, '1', 'hello', '17', '15:12:36 28/05/2021'),
(10, '1', 'hay quá\r\n', '4', '13:13:33 24/05/2021'),
(11, '3', 'ngon r ', '4', '13:13:58 24/05/2021'),
(12, '4', 'ổn ghê', '4', '22:51:35 25/05/2021'),
(13, '5', 'mình mong sẽ có macOS mới :&gt;&gt;&gt;', '7', '00:09:13 28/05/2021'),
(15, '1', 'hay', '20', '14:42:17 30/05/2021'),
(16, '7', 'ngon ghê :)))', '20', '14:49:26 30/05/2021'),
(17, '7', 'đẹp', '20', '14:52:26 30/05/2021'),
(18, '1', 'hello', '13', '16:01:33 30/05/2021'),
(19, '1', 'dddđ', '13', '16:30:38 31/05/2021'),
(20, '1', 'ừ ấá ddádá dsajkf lkjakasf ákfd;lksad', '13', '16:31:54 31/05/2021'),
(21, '1', 'helo', '13', '16:33:26 31/05/2021'),
(22, '1', 'hello', '13', '17:22:40 31/05/2021'),
(23, '1', 'hello', '13', '17:23:07 31/05/2021'),
(24, '7', 'sadasd', '13', '19:38:15 31/05/2021'),
(25, '1', ' fdgffffg', '13', '19:40:33 31/05/2021'),
(26, '7', '1\r\n', '13', '19:45:10 31/05/2021'),
(27, '7', '2\r\n', '13', '19:45:47 31/05/2021'),
(28, '7', '345', '13', '19:46:12 31/05/2021'),
(30, '10', 'Hay quá anh ơi!', '25', '01:35:58 01/06/2021');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dt_forumfile`
--

CREATE TABLE `dt_forumfile` (
  `id` int(11) NOT NULL,
  `filename` varchar(900) COLLATE utf8_unicode_ci NOT NULL,
  `filesize` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `fileurl` varchar(700) COLLATE utf8_unicode_ci NOT NULL,
  `fileid` varchar(600) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dt_forumqt`
--

CREATE TABLE `dt_forumqt` (
  `id` int(11) NOT NULL,
  `idaccount` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `idfr` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dt_forumqt`
--

INSERT INTO `dt_forumqt` (`id`, `idaccount`, `idfr`) VALUES
(1, '1', ''),
(2, '1', ''),
(3, '1', ''),
(4, '1', ''),
(5, '1', '2'),
(6, '1', '3'),
(7, '1', '4'),
(8, '1', '5'),
(9, '3', '4'),
(10, '4', '4'),
(11, '1', '6'),
(12, '1', '7'),
(13, '5', '7'),
(14, '5', '8'),
(15, '5', '9'),
(16, '5', '9'),
(17, '5', '9'),
(18, '5', '10'),
(19, '6', '11'),
(20, '1', '12'),
(21, '7', '13'),
(22, '1', '14'),
(23, '1', '15'),
(24, '1', '16'),
(25, '1', '17'),
(26, '1', '18'),
(27, '1', '19'),
(28, '1', '20'),
(29, '7', '20'),
(30, '1', '13'),
(31, '1', '21'),
(32, '1', '22'),
(33, '1', '23'),
(34, '1', '24'),
(35, '1', '25'),
(36, '10', '25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dt_forumquote`
--

CREATE TABLE `dt_forumquote` (
  `id` int(11) NOT NULL,
  `idtopic` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `idcmt` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `cmtid` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dt_forumquote`
--

INSERT INTO `dt_forumquote` (`id`, `idtopic`, `idcmt`, `cmtid`) VALUES
(1, '', '7', '9'),
(2, '', '10', '11'),
(3, '', '23', '24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dt_message`
--

CREATE TABLE `dt_message` (
  `id` int(11) NOT NULL,
  `idaccount` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `idpl` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `content` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `submess` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `view` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dt_messageed`
--

CREATE TABLE `dt_messageed` (
  `id` int(11) NOT NULL,
  `idaccount` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `gidacc` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `last` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dt_notification`
--

CREATE TABLE `dt_notification` (
  `id` int(11) NOT NULL,
  `idaccount` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(3333) COLLATE utf8_unicode_ci NOT NULL,
  `cidacc` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `view` varchar(9) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'none',
  `goku` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `xem` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dt_notification`
--

INSERT INTO `dt_notification` (`id`, `idaccount`, `content`, `cidacc`, `view`, `goku`, `xem`) VALUES
(1, '1', 'đã bình luận về chủ đề,/forum/microsoft-edge-91-se-la-trinh-duyet-hoat-dong-tot-nhat-tren-windows-10-13', '7', 'view', 'forum', 0),
(2, '7', 'đã bình luận về chủ đề,/forum/microsoft-edge-91-se-la-trinh-duyet-hoat-dong-tot-nhat-tren-windows-10-13', '1', 'view', 'forum', 0),
(3, '10', 'đã bình luận về chủ đề,/forum/tri-tue-nhan-tao-van-hanh-nhu-the-nao-25', '1', 'none', 'forum', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dt_user`
--

CREATE TABLE `dt_user` (
  `id` int(11) NOT NULL,
  `account` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'image/default/avatar.png',
  `coin` varchar(500) COLLATE utf8_unicode_ci NOT NULL DEFAULT '5000',
  `position` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Member',
  `status` varchar(900) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'I Love TopTech',
  `ncolor` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'black',
  `lastonl` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `regtime` varchar(66) COLLATE utf8_unicode_ci NOT NULL,
  `onlin` varchar(600) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Trang Chủ,http://mbkvn.tk',
  `datee` varchar(66) COLLATE utf8_unicode_ci NOT NULL,
  `fastcode` varchar(99) COLLATE utf8_unicode_ci NOT NULL,
  `uagent` varchar(600) COLLATE utf8_unicode_ci NOT NULL,
  `theme` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'style'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dt_user`
--

INSERT INTO `dt_user` (`id`, `account`, `password`, `email`, `avatar`, `coin`, `position`, `status`, `ncolor`, `lastonl`, `regtime`, `onlin`, `datee`, `fastcode`, `uagent`, `theme`) VALUES
(1, 'huytrinh', '4f8c565afacf6a904d9a5145a70e0c1f', 'tqhuy@gmail.com', 'icon/15.png', '5000', 'Admin', 'Tony`', '#ff6f00', '1622535008', '', 'Trang Chủ,/', '.22:11:39 14/05/2021', 'Q3CIPJJJID', '', 'style'),
(6, 'mai', '68ea123a33608c6e44ea92c1401844a5', 'mai@gmail.com', 'icon/16.png', '5000', 'Member', 'Mei', 'black', '1622178941', '', 'Đăng Xuất,/logout', '.12:08:01 28/05/2021', 'caTipgtsL3', '', 'style'),
(4, 'huyhuy', 'f9c0c0e30288b0f1095cedeebf506772', 'tqhuy5566@gmail.com', 'icon/0.png', '5000', 'Member', 'I Love MBKVN', 'black', '1621961461', '', 'Trang chu', '.22:34:28 25/05/2021', 'OIwHl6U13a', '', 'style'),
(5, 'huy', '4f8c565afacf6a904d9a5145a70e0c1f', 'tqhuy55666@gmail.com', 'icon/7.png', '5000', 'Member', 'Thuận', 'black', '1622179471', '', 'Trang Chủ,/', '.00:07:15 28/05/2021', 'kFcvDumYe7', '', 'style'),
(7, 'vyy', '73b5373033d2164f743d3581ff19ccc1', 'vy@gmail.com', 'icon/12.png', '5000', 'Member', 'vicky', 'black', '1622467179', '', 'Đăng Xuất,/logout', '.12:16:50 28/05/2021', '6TwEyQv19b', '', 'style'),
(10, 'huy1', 'cc0d45bc2f499fc4666d09691485a0f9', 'huy1@gmail.com', 'icon/3.png', '5000', 'Member', 'Bảo', '#71BBCE', '1622486838', '', 'Đăng Xuất,/logout', '.22:54:59 31/05/2021', 'B9ACoRZ3Mf', '', 'style'),
(11, 'huy2', 'cc0d45bc2f499fc4666d09691485a0f9', 'huy2@gmail.com', 'icon/1.png', '5000', 'Member', 'I Love MBKVN', '#71BBCE', '1622479641', '', 'Đăng Xuất,/logout', '.22:56:58 31/05/2021', '4DuMdCfW4b', '', 'style'),
(12, 'huy3', 'cc0d45bc2f499fc4666d09691485a0f9', 'huy3@gmail.com', 'icon/1.png', '5000', 'Member', 'I Love TopTech', '#71BBCE', '1622481293', '', 'Đăng Xuất,/logout', '.23:47:59 31/05/2021', 'qUvLwojMKg', '', 'style'),
(13, 'huy4', 'cc0d45bc2f499fc4666d09691485a0f9', 'huy4@gmail.com', 'image/default/avatar.png', '5000', 'Member', 'I Love TopTech', '#71BBCE', '0', '', 'Trang Chủ,http://mbkvn.tk', '.01:06:26 01/06/2021', '7tVFHFq35t', '', 'style'),
(14, 'huy5', 'cc0d45bc2f499fc4666d09691485a0f9', 'huy5@gmail.com', 'image/default/avatar.png', '5000', 'Member', 'I Love TopTech', '#71BBCE', '0', '', 'Trang Chủ,http://mbkvn.tk', '.01:07:43 01/06/2021', 'mlnLorbrmk', '', 'style');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dt_wallhome`
--

CREATE TABLE `dt_wallhome` (
  `id` int(11) NOT NULL,
  `idaccount` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `content` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `fidacc` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `subwall1` varchar(66) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dt_wallhome`
--

INSERT INTO `dt_wallhome` (`id`, `idaccount`, `content`, `fidacc`, `subwall1`) VALUES
(4, '1', '', '', '19:57:25 18/05/2021');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `guest`
--

CREATE TABLE `guest` (
  `id` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `lastonl` varchar(60) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trangcanhan`
--

CREATE TABLE `trangcanhan` (
  `id` int(11) NOT NULL,
  `noi_dung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_account` int(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `trangcanhan`
--

INSERT INTO `trangcanhan` (`id`, `noi_dung`, `id_account`, `time`) VALUES
(5, 'helllo', 5, 1622178088);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ulike`
--

CREATE TABLE `ulike` (
  `id` int(11) NOT NULL,
  `idaccount` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `fomb` varchar(600) COLLATE utf8_unicode_ci NOT NULL,
  `blike` varchar(600) COLLATE utf8_unicode_ci NOT NULL,
  `clp` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Sao'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `avatar`
--
ALTER TABLE `avatar`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bot`
--
ALTER TABLE `bot`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Chỉ mục cho bảng `dt_chat`
--
ALTER TABLE `dt_chat`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dt_forum`
--
ALTER TABLE `dt_forum`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dt_forumcmc`
--
ALTER TABLE `dt_forumcmc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dt_forumcmp`
--
ALTER TABLE `dt_forumcmp`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dt_forumcmt`
--
ALTER TABLE `dt_forumcmt`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dt_forumfile`
--
ALTER TABLE `dt_forumfile`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dt_forumqt`
--
ALTER TABLE `dt_forumqt`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dt_forumquote`
--
ALTER TABLE `dt_forumquote`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dt_message`
--
ALTER TABLE `dt_message`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dt_messageed`
--
ALTER TABLE `dt_messageed`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dt_notification`
--
ALTER TABLE `dt_notification`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dt_user`
--
ALTER TABLE `dt_user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dt_wallhome`
--
ALTER TABLE `dt_wallhome`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `trangcanhan`
--
ALTER TABLE `trangcanhan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ulike`
--
ALTER TABLE `ulike`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `avatar`
--
ALTER TABLE `avatar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `bot`
--
ALTER TABLE `bot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=387;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `dt_chat`
--
ALTER TABLE `dt_chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `dt_forum`
--
ALTER TABLE `dt_forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `dt_forumcmc`
--
ALTER TABLE `dt_forumcmc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `dt_forumcmp`
--
ALTER TABLE `dt_forumcmp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `dt_forumcmt`
--
ALTER TABLE `dt_forumcmt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `dt_forumfile`
--
ALTER TABLE `dt_forumfile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `dt_forumqt`
--
ALTER TABLE `dt_forumqt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `dt_forumquote`
--
ALTER TABLE `dt_forumquote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `dt_message`
--
ALTER TABLE `dt_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `dt_messageed`
--
ALTER TABLE `dt_messageed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `dt_notification`
--
ALTER TABLE `dt_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `dt_user`
--
ALTER TABLE `dt_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `dt_wallhome`
--
ALTER TABLE `dt_wallhome`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `trangcanhan`
--
ALTER TABLE `trangcanhan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `ulike`
--
ALTER TABLE `ulike`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
