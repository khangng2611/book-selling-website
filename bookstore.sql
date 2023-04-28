-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2023 at 11:32 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` text NOT NULL,
  `theme` varchar(30) DEFAULT NULL,
  `publisher` text DEFAULT NULL,
  `publish_date` text NOT NULL,
  `price` int(11) UNSIGNED NOT NULL,
  `amount` int(10) UNSIGNED NOT NULL,
  `book_description` text DEFAULT NULL,
  `img` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `title`, `author`, `theme`, `publisher`, `publish_date`, `price`, `amount`, `book_description`, `img`) VALUES
(2, 'Truyện Cổ Andersen', 'Hans Christian Andersen', 'Truyện tranh', 'Tân Việt', '2018-08-01 00:00:00', 94000, 40, 'Hans Christian Andersen là một trong những tác giả người Đan Mạch nổi tiếng nhất chuyên viết truyện cổ tích cho thiếu nhi trên toàn thế giới. Sức mạnh thực sự của tác giả nằm trong những ngôn từ đơn giản nhưng đầy xúc cảm, mô tả những rung động tinh tế của tâm hồn. Ông dạy chúng ta biết cách cảm nhận ra tình yêu và vẻ đẹp thực sự ẩn sâu trong trái tim mỗi con người. Những cốt truyện phong phú, những nhân vật đa dạng, và những tình tiết lôi cuốn lòng người, đều là sản phẩm từ trí tưởng tượng phong phú và sống động của ông, sẽ lôi cuốn các độc giả vào một thế giới huyền ảo nhưng cũng vô cùng chân thực...', '../asset/img/book/truyen-co-andersen.jpg'),
(3, 'Doraemon Truyện Dài - Tập 11 - Nobita Ở Xứ Sở Nghìn Lẻ Một Đêm', 'Fujiko F Fujio', 'Truyện tranh', 'NXB Kim Đồng', '2021-03-14 13:54:59', 20000, 48, 'Câu chuyện lần này lấy bối cảnh là thế giới “Nghìn lẻ một đêm” mà tôi vô cùng yêu thích từ khi còn nhỏ. Suốt một thời gian dài, tôi đã ấp ủ dự định lồng ghép thế giới hư cấu đầy bí ẩn này vào trong thể loại truyện tranh. Và bây giờ, mời các em cùng tham gia chuyến phiêu lưu  tới xứ sở phép thuật của nhóm bạn Doraemon!', '../asset/img/book/doraemon-tap11.jpg'),
(4, 'Thám Tử Lừng Danh Conan Tập 99', 'Gosho Aoyama', 'Truyện tranh', 'NXB Kim Đồng', '2021-01-01 00:00:00', 25000, 47, 'Chuyện gì đã xảy ra trên cầu Vauxhall ở London…? Bí ẩn bao trùm hai mẹ con Mary và Masumi Sera sẽ được làm sáng tỏ trong chương phá giải vụ án đầu độc tại bữa tiệc của người mẫu! Tìm đến nơi Kazami đang lâm nạn, Toru Amuro tình cờ gặp Conan và nhóm thám tử nhí rồi bước vào vụ án giam cầm ở trang trại chăn nuôi! Tại đây, anh cũng chạm trán Rumi Wakasa - người đã dẫn bọn trẻ tới…!?', '../asset/img/book/conan-tap99.jpg'),
(5, 'Dragon Ball - Tập 1: Thời Niên Thiếu Của Son Goku', 'Akira Toriyama', 'Truyện tranh', 'NXB Kim Đồng', '2022-03-25 00:00:00', 77000, 40, 'Nếu bạn là fan của DRAGON BALL - 7 VIÊN NGỌC RỒNG và những cuộc phiêu lưu của Khỉ Con Son Goku thì DRAGON BALL FULL COLOR sẽ làm bạn thích thú hơn nữa khi 100% cuốn truyện mà chúng ta yêu thích đều CÓ MÀU! Các nhân vật sẽ xuất hiện trước mắt bạn với màu da, màu tóc, phục trang và những khung cảnh vô cùng sống động! Những màn chiến đấu đặc trưng của DRAGON BALL cũng vì thế mà trở nên hoành tráng hơn bao giờ hết!!', '../asset/img/book/dragon-ball-tap1.jpg'),
(7, 'Thám Tử Lừng Danh Conan - Tập 90', 'Gosho Aoyama', 'Truyện tranh', 'NXB Kim Đồng', '2019-02-01 18:28:05', 20000, 40, 'Sự thật nào sẽ được làm sáng tỏ đằng sau mối bất hòa giữa hai con người phục vụ công lí ở hai vị thế khác nhau - mật vụ FBI Akai và cảnh sát Amuro!? Cuộc phiêu lưu mới sẽ đưa độc giả đến gần hơn với Tổ chức Áo Đen, tiết lộ mối quan hệ giữa Sera và “em gái ngoài lãnh địa”!!', '../asset/img/book/conan-tap90.jpg'),
(8, 'Kỷ Luật Tự Giác', 'Tiểu Dã', 'Kĩ năng sống', 'Skybooks', '2020-11-15 00:00:00', 54000, 100, 'KÝ LUẬT TỰ GIÁC, cuốn sách đã thành công chỉnh đốn lối sống của hàng triệu người trẻ Trung Quốc, sẽ giúp bạn hiểu: “Tự do” thực sự không phải là tùy theo ý thích, mà là tự mình làm chủ. Càng tự giác thì càng có nhiều quyền lựa chọn. Một ngày, hai ngày, hay thậm chí vài tháng chưa thấy gì, nhưng một năm, hai năm, 10 năm, 20 năm sau những người tự giác và những người không tự giác sẽ bước trên những con đường hoàn toàn khác nhau. Bởi vì người càng tự giác càng hiểu mình thực sự muốn gì, nên mới không cần lãng phí thời gian và sức lực vào những chuyện vô nghĩa.', '../asset/img/book/ky-luat-tu-giac.jpg'),
(10, 'Thao Túng Tâm Lý', 'Shannon Thomas', 'Kĩ năng sống', '1980 Books', '2020-12-10 16:24:25', 101000, 25, '“Thao túng tâm lý” là một dạng của lạm dụng tâm lý. Cũng giống như lạm dụng tâm lý, thao túng tâm lý có thể xuất hiện ở bất kỳ môi trường nào, từ bất cứ đối tượng độc hại nào. Đó có thể là bố mẹ ruột, anh chị em ruột, người yêu, vợ hoặc chồng, sếp hay đồng nghiệp… của bạn. Với tính chất bí hiểm, âm thầm gây hại, thao túng, lạm dụng tâm lý làm tổn thương cảm xúc, lòng tự trọng, cuộc sống của mỗi nạn nhân. Những người từng bị lạm dụng tâm lý thường không thể miêu tả rõ ràng điều gì đã xảy ra với mình. Trong nhiều trường hợp, nạn nhân bị thao túng đến mức tự hỏi có phải họ là người có lỗi, thậm chí họ có phải là người độc hại trong mối quan hệ đó.', '../asset/img/book/thao-tung-tam-ly.png'),
(12, 'Trí Tuệ Do Thái', 'Eran Katz', 'Kĩ năng sống', 'Alphabooks', '2018-12-26 16:24:25', 121000, 60, 'Trí tuệ Do Thái là một cuốn sách tư duy đầy tham vọng trong việc nâng cao khả năng tự học tập, ghi nhớ và phân tích - những điều đã khiến người Do Thái vượt trội lên, chiếm lĩnh những vị trí quan trọng trong ngành truyền thông, ngân hàng và những giải thưởng sáng tạo trên thế giới. Tuy là một cuốn sách nhỏ nhưng Trí Tuệ Do Thái lại mang trong mình tri thức về một dân tộc có thể nhỏ về số lượng nhưng vĩ đại về trí tuệ và tài năng. Cuốn sách không chỉ lý giải lý do vì sao những người Do Thái trên thế giới lại thông minh và giàu có, mà còn đặc tả con đường thành công của một người Do Thái - Jerome cùng những triết lý được đúc kết đầy giá trị.', '../asset/img/book/tri-tue-do-thai.jpg'),
(13, 'Clean Code – Mã Sạch Và Con Đường Trở Thành Lập Trình Viên Giỏi', 'Robert Cecil Martin', 'Học thuật', 'Tri Thức Trẻ Books', '2022-04-09 00:00:00', 303000, 50, 'Mã sạch và con đường trở thành lập trình viên giỏi. Cuốn sách được chia thành ba phần lớn. Phần đầu tiên mô tả các nguyên tắc, mô hình và cách thực hành viết mã sạch. Phần thứ hai gồm nhiều tình huống điển hình với mức độ phức tạp gia tang không ngừng. Mỗi tình huống là một bài tập giúp làm sạch mã, chuyển đổi mã có nhiều vấn đề thành mã có ít vấn đề hơn. Và phần cuối là tuyển tập rất nhiều những dấu hiệu của mã có vấn đề, những tìm tòi, suy nghiệm từ thực tiễn được đúc rút qua cách tình huống điển hình.', '../asset/img/book/clean-code.jpg'),
(14, 'How Psychology Works - Hiểu Hết Về Tâm Lý Học', 'Jo Hemmings', 'Học thuật', 'NXB Thế Giới', '2020-11-01 00:00:00', 270000, 20, 'Tìm hiểu về các vấn đề tâm trí của con người luôn đầy sức hấp dẫn và lôi cuốn, vì vậy mà tâm lý học ra đời, hình thành và phát triển rất nhiều các học thuyết và trường phái. Cuốn sách này dẫn dắt bạn đọc qua hành trình tìm hiểu các học thuyết và trường phái đó, về cách các nhà tâm lý diễn giải hành xử và tâm trí con người. Tại sao chúng ta có những hành vi, suy nghĩ và cảm xúc như vậy, chúng diễn ra và kết thúc như thế nào, chúng ảnh hưởng lâu dài, gián đoạn hay ngắn ngủỉ đến đời sống của chúng ta ra sao, làm thế nào để chúng ta thoát khỏi những tác động tiêu cực của chúng?', '../asset/img/book/tam-ly-hoc.jpg'),
(15, 'Sách Tâm Lý Dành Cho Người Nhạy Cảm', 'Hiroko Mizushima', 'Kĩ năng sống', 'Nhà Xuất Bản Thế Giới', '2022-01-01 00:00:00', 62000, 50, 'Cuốn sách này là tổng hợp những phương pháp vô cùng hiệu quả được viết bởi một bác sỹ - chuyên gia tâm lý học hàng đầu Nhật Bản giúp bạn làm chủ vô vàn cảm xúc của chính mình, cũng như cách thức để bạn luôn có được trạng thái thân an tâm lạc thay vì rơi vào vòng xoáy bế tắc dù là trong bất cứ hoàn cảnh nào. Hy vọng qua cuốn sách này, bạn sẽ buông bỏ được mọi âu lo, sống đúng với con người mình và có một cuộc đời an yên, hạnh phúc.', '../asset/img/book/tamlynguoinhaycam.jpg'),
(18, 'Rich Habits - Thói Quen Thành Công Của Triệu Phú', 'Thomas C. Corley', 'Kĩ năng sống', 'BIZBOOKS', '2019-02-01 09:47:32', 112000, 10, 'Bạn là sản phẩm từ những thói quen của chính bạn, muốn thành công hãy tạo những thói quen tốt như những người thành công. Cuốn sách này sẽ tiết lộ:  Triệu phú hành xử khác người thường thế nào? 90% triệu phú đều thực hiện các thói quen nào hàng ngày? Cách kiếm tiền của các triệu phú tự thân có giống nhau?', '../asset/img/book/richhabit.jpg'),
(19, 'Big Book Of Sea Creatures – Cuốn Sách Về Động Vật Biển', 'Minna Lacey', 'Học thuật', 'NXB Thanh Niên', '2016-12-19 00:00:00', 126000, 30, 'Bộ sách có kích thước khổng lồ sẽ mở ra một thế giới đại dương rộng lớn trước mắt bé. Những loài động vật dưới biển to lón như cá voi, thân thiện như cá heo, nho nhỏ như ốc, cua, cá hề,… đều xuất hiện trong cùng 1 trang sách. Các bé có thể thỏa sức khám phá trọn vẹn một gia đình động vật dưới biển mà không bị giới hạn bởi kích thước của trang sách!', '../asset/img/book/dongvat.jpg'),
(20, 'Sách Nguồn Gốc Muôn Loài ', 'Charlie Darwin', 'Học thuật', 'Huy Hoàng book', '2020-01-01 00:00:00', 220000, 20, 'Năm 1859, khi Darwin xuất bản cuốn sách “Nguồn gốc muôn loài”, cuốn sách đã được bán hết sạch chỉ trong vòng vài ngày. Nó gây ra một cuộc tranh cãi kịch liệt cả trong và ngoài giới khoa học. Dần dần, cuốn sách đã thay đổi nhận thức của chúng ta về các sinh vật sống. Năm 2015, một hội đồng gồm các tác giả sách bán chạy nhất, các thủ thư, nhà xuất bản và học giả của Anh quốc đã liệt kê hai mươi cuốn sách học thuật quan trọng nhất từng được viết ra. Họ đề nghị công chúng chọn ra một cuốn có ảnh hưởng sâu rộng nhất thế giới. Và người ta đã chọn “Nguồn gốc muôn loài” của Darwin.', '../asset/img/book/nguongocmuonloai.jpg'),
(21, 'Sách học lập trình Python - BẢN QUYỀN', 'Điều Khiển Và Lập Trình Với Arduino Uno', 'Học thuật', 'NXB Giáo Dục Việt Nam', '2021-08-23 16:05:12', 62000, 50, 'Chương 1: Khái niệm, linh kiện điện tử cơ bản; Chương 2: Ngôn ngữ lập trình C; Chương 3: Lập trình Arduino Uno; Chương 4: Lập trình giao diện điều khiển và mô phỏng; Chương 5: Điều khiển PID động cơ một chiều', '../asset/img/book/arduino.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `order1`
--

CREATE TABLE `order1` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_user` int(11) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `user_address` text NOT NULL,
  `id_book` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `amount` int(10) UNSIGNED NOT NULL,
  `bill` int(10) UNSIGNED NOT NULL,
  `order_time` text NOT NULL,
  `order_state` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_role` tinyint(1) NOT NULL,
  `username` varchar(30) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `user_address` text NOT NULL,
  `img` varchar(100) DEFAULT NULL,
  `user_password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_role`, `username`, `firstname`, `lastname`, `email`, `phone`, `user_address`, `img`, `user_password`) VALUES
(1, 1, 'phuckhang2611', 'Khang', 'Nguyen', 'lerharvey999@gmail.com', '0971664122', 'LTHG', '../asset/img/user/phuckhang2611/phuckhang2611.png', '$2y$10$QL.xmp9X6e0nk4qUKeX7qedw1uYYqPw.VkWXyrxajkePe0/4NwesC'),
(18, 1, 'tringuyen123', 'Tri', 'Nguyen', 'tringuyen@gmail.com', '0974228422', 'HCM', '../asset/img/user/tringuyen123/ava1.jpg', '$2y$10$YQUU57/HpybvrP7oeDDyUOaesQU1Y08F2uhy2ow4mPZuiWuCDHhra');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order1`
--
ALTER TABLE `order1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `order1`
--
ALTER TABLE `order1`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
