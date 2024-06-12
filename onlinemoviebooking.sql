-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 10, 2024 lúc 01:51 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `onlinemoviebooking`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `actors`
--

CREATE TABLE `actors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `nationality` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `actors`
--

INSERT INTO `actors` (`id`, `name`, `description`, `birthdate`, `nationality`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Ryan Reynolds\r\n', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Cailey Fleming', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'John Krasinski\r\n', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Satoh Takeru', NULL, NULL, NULL, 'default_image.jpg', '2024-05-19 23:32:46', '2024-05-19 23:32:46'),
(5, 'Mori Nana', NULL, NULL, NULL, NULL, '2024-05-19 23:32:55', '2024-05-19 23:33:33'),
(6, 'Nagasawa Masami', NULL, NULL, NULL, 'default_image.jpg', '2024-05-19 23:33:41', '2024-05-19 23:33:41'),
(7, 'Will Smith', NULL, NULL, NULL, 'default_image.jpg', '2024-06-09 16:16:40', '2024-06-09 16:16:40'),
(8, 'Martin Lawrence', NULL, NULL, NULL, 'default_image.jpg', '2024-06-09 16:16:54', '2024-06-09 16:16:54'),
(9, 'Vanessa Hudgens', NULL, NULL, NULL, 'default_image.jpg', '2024-06-09 16:17:18', '2024-06-09 16:17:18'),
(10, 'Chris Pratt', NULL, NULL, NULL, 'default_image.jpg', '2024-06-09 16:34:42', '2024-06-09 16:34:42'),
(11, 'Samuel L. Jackson', NULL, NULL, NULL, 'default_image.jpg', '2024-06-09 16:34:48', '2024-06-09 16:34:48'),
(12, 'Nicholas Hoult', NULL, NULL, NULL, 'default_image.jpg', '2024-06-09 16:34:52', '2024-06-09 16:34:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `seats` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_seats` int(11) NOT NULL,
  `booking_date` date NOT NULL,
  `showtime_id` bigint(20) UNSIGNED NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `payment_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `seats`, `total_seats`, `booking_date`, `showtime_id`, `total_price`, `created_at`, `updated_at`, `payment_id`) VALUES
(31, 11, 'C3,C4,D4', 3, '2024-05-17', 9, '30000.00', '2024-05-17 10:26:09', '2024-05-17 10:26:09', 2),
(33, 11, 'D5,D6', 2, '2024-05-17', 9, '20000.00', '2024-05-17 10:30:02', '2024-05-17 10:30:02', 6),
(37, 11, 'D5,D6', 2, '2024-05-17', 9, '20000.00', '2024-05-17 10:32:32', '2024-05-17 10:32:32', 14),
(38, 11, 'E3,E4', 2, '2024-05-17', 9, '20000.00', '2024-05-17 12:50:48', '2024-05-17 12:50:48', 16),
(39, 11, 'E5,E6', 2, '2024-05-17', 9, '20000.00', '2024-05-17 13:13:02', '2024-05-17 13:13:02', 18),
(40, 11, 'C3,C4', 2, '2024-05-18', 12, '160000.00', '2024-05-17 18:48:42', '2024-05-17 18:48:42', 19),
(41, 11, 'D5,D6', 2, '2024-05-18', 12, '160000.00', '2024-05-17 19:38:30', '2024-05-17 19:38:30', 21),
(42, 11, 'C3,C4', 2, '2024-05-18', 11, '150000.00', '2024-05-17 19:40:32', '2024-05-17 19:40:32', 22),
(43, 11, 'D5,D6', 2, '2024-05-18', 11, '150000.00', '2024-05-17 20:11:47', '2024-05-17 20:11:47', 23),
(44, 11, 'A3,A4', 2, '2024-05-20', 13, '140000.00', '2024-05-19 17:12:55', '2024-05-19 17:12:55', 24),
(45, 11, 'D5,D6', 2, '2024-05-20', 13, '140000.00', '2024-05-20 00:17:28', '2024-05-20 00:17:28', 25),
(46, 11, 'C4,C5', 2, '2024-05-20', 14, '160000.00', '2024-05-20 00:35:47', '2024-05-20 00:35:47', 26),
(47, 11, 'E5,E6', 2, '2024-05-20', 14, '160000.00', '2024-05-20 00:38:47', '2024-05-20 00:38:47', 27),
(48, 11, 'G3,G4', 2, '2024-05-20', 14, '160000.00', '2024-05-20 00:45:59', '2024-05-20 00:45:59', 28);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `directors`
--

CREATE TABLE `directors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `nationality` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `directors`
--

INSERT INTO `directors` (`id`, `name`, `description`, `birthdate`, `nationality`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Test', 'test', NULL, NULL, NULL, '2024-05-19 14:11:59', '2024-05-19 14:12:01'),
(2, '\r\nJohn Krasinski', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Mark Dindal', NULL, NULL, NULL, 'default_image.jpg', '2024-05-19 23:17:14', '2024-05-19 23:17:14'),
(4, 'Shinnosuke Yakuwa', NULL, NULL, NULL, 'default_image.jpg', '2024-05-19 23:17:32', '2024-05-19 23:17:32'),
(5, 'Yamada Tomokazu', NULL, NULL, NULL, NULL, '2024-05-19 23:17:44', '2024-05-19 23:19:54'),
(6, 'Adil El Arbi', NULL, NULL, NULL, 'default_image.jpg', '2024-06-09 16:12:45', '2024-06-09 16:12:45'),
(7, 'Mark Dindal', NULL, NULL, NULL, 'default_image.jpg', '2024-06-09 16:34:28', '2024-06-09 16:34:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Clinton Hyatt DVM', 'mosciski.estrella@example.net', 'Quam pariatur aut vitae consequatur qui est distinctio fugit.', '2024-04-24 10:09:12', '2024-04-24 10:09:12'),
(2, 'Prof. Grady Beer I', 'tito25@example.com', 'Incidunt omnis laborum rem ipsum ut excepturi.', '2024-04-24 10:09:12', '2024-04-24 10:09:12'),
(3, 'Domingo Pfannerstill', 'swindler@example.org', 'Ut voluptas error consequatur ipsa eveniet sunt.', '2024-04-24 10:09:12', '2024-04-24 10:09:12'),
(4, 'Matteo Bruen', 'eldred.fisher@example.com', 'Corporis eaque possimus eaque delectus et similique.', '2024-04-24 10:09:12', '2024-04-24 10:09:12'),
(5, 'Prof. Jaleel O\'Keefe', 'hwisozk@example.net', 'Eos quo labore corporis vero.', '2024-04-24 10:09:12', '2024-04-24 10:09:12'),
(6, 'Mauricio Mertz', 'arvid58@example.com', 'Et ut ex voluptatem laudantium dolores.', '2024-04-24 10:09:12', '2024-04-24 10:09:12'),
(7, 'Lorenza Feil', 'weissnat.karson@example.net', 'Et voluptatem nihil ea sequi cum tempore.', '2024-04-24 10:09:12', '2024-04-24 10:09:12'),
(8, 'Lon O\'Conner', 'ari10@example.org', 'Reprehenderit et ad exercitationem.', '2024-04-24 10:09:12', '2024-04-24 10:09:12'),
(9, 'Abbigail Boehm III', 'hegmann.hilma@example.net', 'Omnis odit odit temporibus quidem voluptates qui rerum.', '2024-04-24 10:09:12', '2024-04-24 10:09:12'),
(10, 'Joyce Bednar', 'jones.eulalia@example.com', 'Accusantium aliquam animi et ipsum fuga fugiat excepturi.', '2024-04-24 10:09:12', '2024-04-24 10:09:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `genres`
--

CREATE TABLE `genres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `genre_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `genres`
--

INSERT INTO `genres` (`id`, `genre_name`, `created_at`, `updated_at`) VALUES
(1, 'Action', '2024-04-24 10:09:12', '2024-04-24 10:09:12'),
(2, 'Adventure', '2024-04-24 10:09:12', '2024-04-24 10:09:12'),
(3, 'Comedy', '2024-04-24 10:09:12', '2024-05-15 07:13:19'),
(6, 'Cartoon', '2024-05-17 16:19:14', '2024-05-17 16:19:14'),
(7, 'Family', NULL, NULL),
(8, 'Fiction', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_04_04_152456_create_admin_table', 1),
(6, '2024_04_04_152634_create_feedbacks_table', 1),
(7, '2024_04_04_152654_create_genres_table', 1),
(8, '2024_04_04_152708_create_movies_table', 1),
(9, '2024_04_04_155302_create_threaters_table', 1),
(10, '2024_04_04_155403_create_screens_table', 1),
(11, '2024_04_04_155418_create_showtimes_table', 1),
(12, '2024_04_04_162012_create_bookings_table', 1),
(13, '2024_04_24_141155_create_feedback_table', 1),
(14, '2024_05_14_145208_drop_username_column', 2),
(18, '2024_05_14_150654_add_default_value_to_image_column', 3),
(19, '2024_05_14_155647_update_admin_table', 3),
(20, '2024_05_15_041038_add_role_column_to_users', 4),
(29, '2024_05_15_114204_create_rooms_table', 5),
(30, '2024_05_15_165110_add_room_id_column_to_showtimes_table', 5),
(31, '2024_05_17_124628_drop_screen_id_column_showtime_table', 6),
(32, '2024_05_17_151855_create_payments_table', 7),
(33, '2024_05_17_170945_add_payment_id_column_to_booking_table', 8),
(62, '2024_05_18_011833_update_movie_table', 9),
(63, '2024_05_18_015156_add_p_method_payments_table', 9),
(64, '2024_05_19_093636_create_directors_table', 9),
(68, '2024_05_19_095140_create_actors_table', 10),
(69, '2024_05_19_095340_update_movies_table', 11),
(70, '2024_05_19_095727_create_movie_actor_table', 11),
(71, '2024_05_19_135136_create_movie_genre_table', 11),
(72, '2024_05_19_135344_update_movie_table', 11),
(73, '2024_05_19_143325_update_showtime_table', 12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `movies`
--

CREATE TABLE `movies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `release_date` date NOT NULL,
  `trailer_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `running` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cens` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `director_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `movies`
--

INSERT INTO `movies` (`id`, `title`, `release_date`, `trailer_link`, `description`, `image`, `status`, `running`, `created_at`, `updated_at`, `cens`, `director_id`) VALUES
(11, 'Test', '2024-05-15', 'http://test.com', '1123123', '1715783975.jpg', 0, 1, '2024-05-15 07:39:35', '2024-05-15 07:39:35', 'P', 1),
(12, 'Những Người Bạn Tưởng Tượng', '2024-05-17', 'https://www.youtube.com/embed/Ilnr--QqwxY?si=v8dbUEgnrftbiN8T', 'Bộ phim xoay quanh một cô bé bất ngờ phát hiện ra mình có thể nhìn thấy những người bạn tưởng tượng của mọi người. Và cuộc hành trình bắt đầu khi cô bé sử dụng siêu năng lực của mình để giúp đỡ những người bạn tưởng tượng này tránh khỏi việc bị bỏ rơi và lãng quên bằng cách tìm kiếm, kết nối chúng với những đứa trẻ.', '1715986412.jpg', 1, 1, '2024-05-17 15:53:32', '2024-05-17 16:11:34', 'P', 1),
(13, 'Doraemon: Nobita Và Bản Giao Hưởng Địa Cầu', '2024-05-18', 'https://www.youtube.com/embed/6SuyvoJ4tyk?si=J4AFxuqlOIBQ4Cp-', 'Hè này, hãy cùng Doraemon, Nobita, Shizuka, Suneo và Jaian bước vào thế giới của những giai điệu diệu kì. \r\n\r\nĐể chuẩn bị cho buổi hòa nhạc ở trường, Nobita tập thổi sáo – loại nhạc cụ mà cậu dở tệ.\r\n\r\nThích thú trước nốt \"No\" lạc quẻ của Nobita, Micca - cô bé bí ẩn đã mời Doraemon, Nobita cùng nhóm bạn đến \"Farre\". Đó là cung điện âm nhạc tọa lạc trên một hành tinh nơi âm nhạc sẽ hóa thành năng lượng. Nhằm cứu cung điện này, Micca đang tìm kiếm \"virtuoso\" - bậc thầy âm nhạc sẽ cùng mình biểu diễn!', '1715988132.jpg', 1, 0, '2024-05-17 16:22:12', '2024-05-17 16:26:32', 'P', 1),
(14, 'Haikyu!!: Trận Chiến Bãi Phế Liệu', '2024-05-15', 'https://www.youtube.com/embed/DKwuwNQaP5w?si=JaKcz48wwvMak31N', 'Một trong những series manga và anime thể thao về bóng chuyền nổi tiếng nhất mọi thời đại. Cuộc đối đầu bóng chuyền giữa hai đối thủ đầy \"duyên nợ\" Cao trung Karasuno và THPT Nekoma hứa hẹn sẽ vô cùng kịch tính và không kém phần thú vị. Bạn sẽ theo team Quạ hay team Mèo?\r\n\r\nPhim mới Haikyuu!! The Dumpster Battle / Haikyu!!: Trận Chiến Bãi Phế Liệu suất chiếu sớm 15-16.05.2024 (Không áp dụng Movie Voucher), ra mắt tại các rạp chiếu phim từ 17.05.2024.', '1715988327.jpg', 1, 1, '2024-05-17 16:25:27', '2024-05-17 16:25:27', 'P', 1),
(15, 'Những Mảnh Ghép Cảm Xúc 2', '2024-06-14', 'https://www.youtube.com/embed/qlwZy9PL0LA?si=ke2xdG0w3BfMWOtL', 'Những Mảnh Ghép Cảm Xúc 2 sẽ quay trở lại phần tâm trí mới của cô bé thiếu niên Riley. Một ngày, trụ sở chính đột ngột bị phá hủy để nhường chỗ cho một thứ hoàn toàn mới: Một cảm xúc mới! Vui Vẻ, Buồn Bã, Giận Dữ, Sợ Hãi và Chán Ghét phải \'chào đón\' sự xuất hiện của một loại cảm xúc mới là Lo Âu. Và có vẻ như cô ấy không chỉ xuất hiện một mình.', '1715988570.jpg', 1, 0, '2024-05-17 16:29:30', '2024-05-17 16:29:30', 'P', 1),
(16, 'Mèo Mập Mang 10 Mạng', '2024-04-26', 'https://www.youtube.com/embed/X7_LgpsL9TY?si=v-Pfd_y4eFJDoY5i', 'Nhân vật chính của 10 LIVES là Beckett – một chú mèo được nuông chiều tới mức sinh ra ích kỷ, không trân trọng những may mắn mà mình đang được tận hưởng. Nhưng tất cả sắp sửa thay đổi khi cậu ta bất cẩn làm mất đi 9 cái mạng của mình.\r\n\r\nKhông còn mạng nào để phòng thân và phải đối mặt với những điều không thể tránh khỏi, Beckett đã cầu xin để mọi thứ trở lại như xưa. Thoạt đầu, thỉnh cầu này bị bác bỏ, nhưng trong một khoảnh khắc đặc biệt đồng cảm, trái tim của “Người gác cổng” đã lay động và cho phép Beckett có thể quay trở lại Trái đất với một loạt mạng mới.\r\n\r\nNhưng điều mà Beckett không nhận ra ngay lập tức chính là cứ với mỗi một mạng mới, cậu ta sẽ chuyển sinh thành một hình dạng khác… Mỗi hình dạng sẽ lại dạy cho Beckett một bài học kịp thời và giá trị.', '1715988730.jpg', 1, 1, '2024-05-17 16:32:10', '2024-05-17 16:32:10', 'P', 1),
(17, 'Vây Hãm: Kẻ Trừng Phạt', '2024-04-24', 'https://www.youtube.com/embed/h4okylxDB1Y?si=N8IRQRCiDvx2F9v5', 'Siêu cớm Ma Seok-do tái xuất để đối đầu với những tội phạm tinh vi trong giới công nghệ. Nắm đấm trứ danh liệu có phát huy được sức mạnh trước liên minh tội phạm của thiên tài công nghệ và ông trùm nhà cái lớn nhất châu Á?', '1715988883.jpg', 1, 1, '2024-05-17 16:34:43', '2024-05-17 16:34:43', 'T16', 1),
(18, 'Lật Mặt 7: Một Điều Ước', '2024-04-24', 'https://www.youtube.com/embed/nzLavaLXU_U?si=MFe48Dd9nnKFJKw0', 'Qua những lát cắt đan xen, ẩn chứa nhiều nụ cười và cả nước mắt, \"Lật Mặt 7: Một Điều Ước\" là câu chuyện cảm động về đại gia đình bà Hai 73 tuổi - người mẹ đơn thân tự mình nuôi 5 người con khôn lớn. Khi trưởng thành, mỗi người đều có cuộc sống và gia đình riêng. Bất chợt, biến cố ập đến, những góc khuất dần được hé lộ, những nỗi niềm, lo lắng, trĩu nặng ẩn sâu trong trái tim người mẹ. Trách nhiệm thuộc về ai?', '1715988964.jpg', 1, 1, '2024-05-17 16:36:04', '2024-05-17 16:36:04', 'T13', 1),
(19, 'Hành Tinh Khỉ: Vương Quốc Mới', '2024-05-10', 'https://www.youtube.com/embed/8rmCpaOQiLQ?si=tHxkrSVG0ujDr58u', 'Kingdom Of The Planet Of The Apes lấy bối cảnh nhiều đời sau Caesar đại đế, hành tinh này là nơi loài khỉ thống trị, còn loài người dần lui về trong bóng tối. Khi một thủ lĩnh khỉ bạo chúa bắt đầu xây dựng đế chế của riêng mình, buộc thủ lĩnh một tộc khỉ khác phải bước vào hành trình tăm tối để tìm kiếm tự do, quyết định tương lai của loài người và khỉ.', '1715991880.jpg', 1, 1, '2024-05-17 17:24:40', '2024-05-17 17:24:40', 'P', 1),
(20, 'Test', '2024-05-20', 'https://youtube.com', 'Test', '1716167065.jpg', 0, 1, '2024-05-19 18:04:25', '2024-06-09 16:10:41', 'P', 2),
(21, 'Những Gã Trai Hư: Chơi Hay Bị Xơi', '2024-06-06', 'https://www.youtube.com/embed/jFCmy8BgT9o?si=6CYFvaZb9UXhZSBl', 'Chuyện phim mới kể về những diễn biến đầy hành động của thám tử Miami-Dade Mike Lowrey (Will Smith) và Marcus Burnett (Martin Lawrence). Giờ đây, Lowrey và Burnett phải hợp tác để tiêu diệt tên Đại úy Conrad Howard, người đang bị buộc tội hoạt động cùng băng đảng ma túy.\r\n\r\nPhim mới Bad Boys: Ride Or Die / Những Gã Trai Hư: Chơi Hay Bị Xơi suất chiếu sớm 06.06 (Không áp dụng Movie Voucher), ra mắt tại các rạp chiếu phim từ 07.06.2024.', '1717975704.jpg', 1, 1, '2024-06-09 16:20:17', '2024-06-09 16:33:40', 'P', 6),
(22, 'Garfield: Mèo Béo Siêu Quậy', '2024-05-31', 'https://www.youtube.com/embed/hMrTVMZS0TA?si=G2mQmYZT38PhKJYf', 'Trong bộ phim hoạt hình này, chú mèo mê đồ ăn Garfield bị cuốn vào một vụ trộm để giúp cha mình - một tên trộm đường phố, khỏi một chú mèo biểu diễn khác đang muốn trả thù ông. Bắt đầu như một mối quan hệ hợp tác miễn cưỡng và kết thúc bằng việc Garfield và Vic nhận ra rằng cha con họ không hề  khác biệt như vẻ ngoài của mình.\r\nPhim mới The Garfield Movie / Garfield: Mèo Béo Siêu Quậy dự kiến ra mắt tại các rạp chiếu phim toàn quốc từ 31.05.2024.', '1717976320.jpg', 1, 1, '2024-06-09 16:38:40', '2024-06-09 16:38:40', 'P', 7),
(23, 'Totto-chan: Cô Bé Bên Cửa Sổ', '2024-05-31', 'https://www.youtube.com/embed/zZy0h3fPJYs?si=sg_KSh6N0FO0dV9m', 'Do không phù hợp với trường tiểu học ban đầu, Totto-chan chuyển sang đi học tại trường Tomoe. Tại đây, cô bé gặp những học sinh đặc biệt và học được những điều mới mẻ, ngay cả khi Nhật Bản rơi vào chiến tranh.\r\nPhim mới Totto-Chan: The Little Girl At The Window /Totto-chan: Cô Bé Bên Cửa Sổ ra mắt tại các rạp chiếu phim từ 31.05.2024.', '1717976492.jpg', 1, 0, '2024-06-09 16:41:32', '2024-06-09 16:41:32', 'K', 4),
(24, 'Kẻ Trộm Mặt Trăng 4', '2024-07-05', 'https://www.youtube.com/embed/l3oHhZCuTA4?si=58Rx5UoUZ1C-vgrS', 'Kẻ Trộm Mặt Trăng 4 đánh dấu sự quay lại của Chris Renaud, người đã từng chỉ đạo Despicable Me 1, Despicable Me 2 và The Lorax. Kịch bản được thực hiện bởi Mike White (The White Lotus), và giống như tất cả các phim của Illumination, Chris Meledandri tiếp tục phụ trách sản xuất. Lồng tiếng cho bộ phim là dàn diễn viên quen thuộc qua các phần trước như diễn viên Steve Carell (The Office) sẽ trở lại lồng tiếng cho Gru và Kristen Wiig (Bridesmaids) lồng tiếng cho cô vợ Lucy Wilde, Miranda Cosgrove (iCarly) vẫn đảm nhiệm lồng tiếng cho vai Margo, con gái lớn của Gru và Steve Coogan (Philomena) lồng tiếng cho Silas Ramsbottom cùng nhiều diễn viên tên tuổi khác.\r\n\r\n Phim mới Despicable Me 4 / Kẻ Trộm Mặt Trăng 4 dự kiến ra mắt tại các rạp chiếu phim toàn quốc từ 05.07.2024.', '1717976709.jpg', 1, 0, '2024-06-09 16:45:09', '2024-06-09 16:45:09', 'P', 2),
(25, 'Vụ Bê Bối Ánh Trăng', '2024-07-12', 'https://www.youtube.com/embed/KY0hE2kWOck?si=ag-YqUreXC2IK4Tb', 'Được mời đến để sửa chữa hình ảnh của NASA trước công chúng, Kelly Jones vô tình phá hoại nhiệm vụ vốn đã khó khăn của giám đốc Cole Davis là đưa con người lên mặt trăng. Nhà Trắng không cho phép nhiệm vụ thất bại, buộc Jones phải chỉ đạo thực hiện một cuộc đổ bộ lên mặt trăng giả để dự phòng.\r\n\r\nPhim mới Fly Me To The Moon / Vụ Bê Bối Ánh Trăng ra mắt tại các rạp chiếu phim từ 12.07.2024.', '1717976946.jpg', 0, 0, '2024-06-09 16:49:06', '2024-06-09 16:49:44', 'P', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `movie_actor`
--

CREATE TABLE `movie_actor` (
  `movie_id` bigint(20) UNSIGNED NOT NULL,
  `actor_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `movie_actor`
--

INSERT INTO `movie_actor` (`movie_id`, `actor_id`, `created_at`, `updated_at`) VALUES
(12, 1, NULL, NULL),
(12, 2, NULL, NULL),
(12, 3, NULL, NULL),
(20, 1, NULL, NULL),
(20, 3, NULL, NULL),
(21, 7, NULL, NULL),
(21, 8, NULL, NULL),
(21, 9, NULL, NULL),
(22, 10, NULL, NULL),
(22, 11, NULL, NULL),
(22, 12, NULL, NULL),
(24, 1, NULL, NULL),
(24, 2, NULL, NULL),
(24, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `movie_genre`
--

CREATE TABLE `movie_genre` (
  `movie_id` bigint(20) UNSIGNED NOT NULL,
  `genre_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `movie_genre`
--

INSERT INTO `movie_genre` (`movie_id`, `genre_id`, `created_at`, `updated_at`) VALUES
(12, 3, NULL, NULL),
(12, 7, NULL, NULL),
(12, 8, NULL, NULL),
(20, 1, NULL, NULL),
(20, 2, NULL, NULL),
(21, 1, NULL, NULL),
(21, 3, NULL, NULL),
(22, 1, NULL, NULL),
(22, 2, NULL, NULL),
(22, 3, NULL, NULL),
(23, 6, NULL, NULL),
(24, 1, NULL, NULL),
(24, 2, NULL, NULL),
(24, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_transaction_id` int(11) DEFAULT NULL,
  `p_user_id` int(11) DEFAULT NULL,
  `p_money` double(8,2) DEFAULT NULL COMMENT 'Số tiền thanh toán',
  `p_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Nội dung thanh toán',
  `p_vnp_response_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Mã phản hồi',
  `p_code_vnpay` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Mã giao dịch vnpay',
  `p_code_bank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Mã ngân hàng',
  `p_time` datetime DEFAULT NULL COMMENT 'Thời gian chuyển khoản',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `p_method` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `payments`
--

INSERT INTO `payments` (`id`, `p_transaction_id`, `p_user_id`, `p_money`, `p_note`, `p_vnp_response_code`, `p_code_vnpay`, `p_code_bank`, `p_time`, `created_at`, `updated_at`, `p_method`) VALUES
(1, 6206, 11, 30000.00, 'Thanh toan GD:6206', '00', '14419201', 'NCB', '2024-05-18 00:21:00', NULL, NULL, NULL),
(2, 6206, 11, 30000.00, 'Thanh toan GD:6206', '00', '14419201', 'NCB', '2024-05-18 00:21:00', '2024-05-17 10:26:09', '2024-05-17 10:26:09', NULL),
(3, 6206, 11, 30000.00, 'Thanh toan GD:6206', '00', '14419201', 'NCB', '2024-05-18 00:21:00', NULL, NULL, NULL),
(4, 6206, 11, 30000.00, 'Thanh toan GD:6206', '00', '14419201', 'NCB', '2024-05-18 00:21:00', '2024-05-17 10:26:30', '2024-05-17 10:26:30', NULL),
(5, 6206, 11, 30000.00, 'Thanh toan GD:6206', '00', '14419201', 'NCB', '2024-05-18 00:21:00', NULL, NULL, NULL),
(6, 6567, 11, 20000.00, 'Thanh toan GD:6567', '00', '14419207', 'NCB', '2024-05-18 00:30:00', '2024-05-17 10:30:02', '2024-05-17 10:30:02', NULL),
(7, 6567, 11, 20000.00, 'Thanh toan GD:6567', '00', '14419207', 'NCB', '2024-05-18 00:30:00', NULL, NULL, NULL),
(8, 6567, 11, 20000.00, 'Thanh toan GD:6567', '00', '14419207', 'NCB', '2024-05-18 00:30:00', '2024-05-17 10:31:13', '2024-05-17 10:31:13', NULL),
(9, 6567, 11, 20000.00, 'Thanh toan GD:6567', '00', '14419207', 'NCB', '2024-05-18 00:30:00', NULL, NULL, NULL),
(10, 6567, 11, 20000.00, 'Thanh toan GD:6567', '00', '14419207', 'NCB', '2024-05-18 00:30:00', '2024-05-17 10:31:25', '2024-05-17 10:31:25', NULL),
(11, 6567, 11, 20000.00, 'Thanh toan GD:6567', '00', '14419207', 'NCB', '2024-05-18 00:30:00', NULL, NULL, NULL),
(12, 6567, 11, 20000.00, 'Thanh toan GD:6567', '00', '14419207', 'NCB', '2024-05-18 00:30:00', '2024-05-17 10:31:38', '2024-05-17 10:31:38', NULL),
(13, 6567, 11, 20000.00, 'Thanh toan GD:6567', '00', '14419207', 'NCB', '2024-05-18 00:30:00', NULL, NULL, NULL),
(14, 6567, 11, 20000.00, 'Thanh toan GD:6567', '00', '14419207', 'NCB', '2024-05-18 00:30:00', '2024-05-17 10:32:32', '2024-05-17 10:32:32', NULL),
(15, 6567, 11, 20000.00, 'Thanh toan GD:6567', '00', '14419207', 'NCB', '2024-05-18 00:30:00', NULL, NULL, NULL),
(16, 1715974867, 11, 20000.00, 'Thanh toán qua MoMo', '0', '1715974867', 'napas', '1970-01-01 00:00:00', '2024-05-17 12:50:48', '2024-05-17 12:50:48', NULL),
(17, 1715976219, 11, 20000.00, 'Thanh toán qua MoMo:1715976219', '0', '1715976219', 'napas', '1970-01-01 00:00:00', '2024-05-17 13:04:24', '2024-05-17 13:04:24', NULL),
(18, 1715976735, 11, 20000.00, 'Thanh toán qua MoMo:1715976735', '0', '1715976735', 'napas', '1970-01-01 00:00:00', '2024-05-17 13:13:02', '2024-05-17 13:13:02', NULL),
(19, 876, 11, 160000.00, 'Thanh toan GD:876', '00', '14419336', 'NCB', '2024-05-18 08:49:00', '2024-05-17 18:48:42', '2024-05-17 18:48:42', NULL),
(21, 1715999868, 11, 160000.00, 'Thanh toán qua MoMo:1715999868', '0', '1715999868', 'napas', '1970-01-01 00:00:00', '2024-05-17 19:38:30', '2024-05-17 19:38:30', NULL),
(22, 5303, 11, 150000.00, 'Thanh toan GD:5303', '00', '14419371', 'NCB', '2024-05-18 09:40:00', '2024-05-17 19:40:32', '2024-05-17 19:40:32', NULL),
(23, 7761, 11, 150000.00, 'Thanh toan GD:7761', '00', '14419394', 'NCB', '2024-05-18 10:11:00', '2024-05-17 20:11:47', '2024-05-17 20:11:47', NULL),
(24, 409, 11, 140000.00, 'Thanh toan GD:409', '00', '14421095', 'NCB', '2024-05-20 07:13:00', '2024-05-19 17:12:55', '2024-05-19 17:12:55', NULL),
(25, 7692, 11, 140000.00, 'Thanh toan GD:7692', '00', '14421546', 'NCB', '2024-05-20 14:17:00', '2024-05-20 00:17:28', '2024-05-20 00:17:28', NULL),
(26, 1716190389, 11, 160000.00, 'Thanh toán qua MoMo:1716190389', '0', '1716190389', 'napas', '1970-01-01 00:00:00', '2024-05-20 00:35:47', '2024-05-20 00:35:47', NULL),
(27, 1716190654, 11, 160000.00, 'Thanh toán qua MoMo:1716190654', '0', '1716190654', 'napas', '1970-01-01 00:00:00', '2024-05-20 00:38:47', '2024-05-20 00:38:47', NULL),
(28, 1716190798, 11, 160000.00, 'Thanh toán qua MoMo:1716190798', '0', '1716190798', 'napas', '1970-01-01 00:00:00', '2024-05-20 00:45:59', '2024-05-20 00:45:59', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `screen_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `theater_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rooms`
--

INSERT INTO `rooms` (`id`, `room_name`, `quantity`, `screen_name`, `theater_id`, `created_at`, `updated_at`) VALUES
(1, 'Cinema 1', 56, '2D Phụ Đề', 4, '2024-05-17 05:39:26', '2024-05-17 05:39:26'),
(2, 'Cinema 2', 22, '2D Phụ đề', 5, '2024-05-19 11:40:58', '2024-05-19 11:40:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `showtimes`
--

CREATE TABLE `showtimes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `movie_id` bigint(20) UNSIGNED NOT NULL,
  `showtime` datetime NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `showtimes`
--

INSERT INTO `showtimes` (`id`, `movie_id`, `showtime`, `price`, `created_at`, `updated_at`, `room_id`) VALUES
(9, 11, '2024-05-17 19:45:00', '10000.00', '2024-05-17 05:48:13', '2024-05-17 06:04:51', 1),
(10, 11, '2024-05-17 20:16:00', '10000.00', '2024-05-17 06:17:01', '2024-05-17 06:17:01', 1),
(11, 12, '2024-06-11 20:00:00', '75000.00', '2024-05-17 18:46:37', '2024-06-09 13:49:15', 1),
(12, 12, '2024-06-11 12:00:00', '80000.00', '2024-05-17 18:47:05', '2024-06-09 13:49:29', 1),
(13, 12, '2024-06-11 20:30:00', '70000.00', '2024-05-19 11:38:26', '2024-06-09 13:50:01', 1),
(14, 12, '2024-06-11 21:50:00', '80000.00', '2024-05-19 11:41:18', '2024-06-09 13:50:09', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theaters`
--

CREATE TABLE `theaters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `theater_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theater_address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theater_phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `theaters`
--

INSERT INTO `theaters` (`id`, `theater_name`, `theater_address`, `theater_phone`, `created_at`, `updated_at`) VALUES
(4, 'Azir Nha Trang', 'Nha Trang', '0123456789', '2024-05-15 07:57:19', '2024-05-15 07:57:19'),
(5, 'Azir Da Nang', 'Da Nang', '0465727888', '2024-05-17 05:38:33', '2024-05-17 05:38:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'default_image.jpg',
  `gender` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `birthday`, `image`, `gender`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Gilda Halvorson IV', 'stehr.delmer@example.com', '2024-04-24 10:09:12', '$2y$12$XlIk8t1jgI53JGP9CVkf1upNwAkkO6WmMnmnh6WoLZUaa7LFX4asW', '1-628-756-5804', '1973-01-06', 'default.jpg', 0, 'HD4w5HPafX', '2024-04-24 10:09:14', '2024-04-24 10:09:14', 0),
(2, 'Kayla Baumbach', 'rudy.mosciski@example.net', '2024-04-24 10:09:12', '$2y$12$GUWbC9mVcYFmSM7ZOveen.rrYTUuBPy/RQh627ND03uRasMMcOkcy', '580-500-9573', '2003-01-19', 'default.jpg', 0, 'PfVUigGXwX', '2024-04-24 10:09:14', '2024-04-24 10:09:14', 0),
(3, 'Yadira Boyer I', 'effertz.forrest@example.org', '2024-04-24 10:09:13', '$2y$12$m4fSU1RF3B7xvs2dH0oFzeqT2pfHWe0O1bWMymfaWYI8XHjXFgODa', '+1 (580) 995-56', '2012-10-09', 'default.jpg', 1, 'Ww8SUgfBLW', '2024-04-24 10:09:14', '2024-04-24 10:09:14', 0),
(4, 'Grady Purdy', 'bahringer.beryl@example.org', '2024-04-24 10:09:13', '$2y$12$y0WfEBEE1fyqR09.PlQnhuGFJ.FVPFq00Tu06NMfIrp9JFDp72eCa', '314-272-2643', '1974-04-24', 'default.jpg', 1, 'NuSQGSPTpg', '2024-04-24 10:09:14', '2024-04-24 10:09:14', 0),
(5, 'Ms. Adaline Corwin', 'alycia15@example.org', '2024-04-24 10:09:13', '$2y$12$589/XhAsRoXSW6yvUQVH4eCSEnPFoTCmn8nXE4zv3LB.RGFvd6Wzq', '+1 (364) 289-31', '2013-09-13', 'default.jpg', 1, 'G6bAsfMoFu', '2024-04-24 10:09:14', '2024-04-24 10:09:14', 0),
(6, 'Oswald Hayes', 'derrick74@example.com', '2024-04-24 10:09:13', '$2y$12$/PJbkD.5MjPljVi3v3AIo.SLE3WhB5hiCzoseuNQYb7uzaXO190YK', '769.266.6866', '1977-12-14', 'default.jpg', 0, 'm0IPJyxWAB', '2024-04-24 10:09:14', '2024-04-24 10:09:14', 0),
(7, 'Palma O\'Reilly', 'lockman.bianka@example.net', '2024-04-24 10:09:13', '$2y$12$tTxDA4hnfid8aZo6ZsXqXu.BFqnw7k.krMZGPp32B/x2WWbVv3jWi', '+1.445.474.4256', '1973-09-15', 'default.jpg', 0, 'XvOwAHjhIB', '2024-04-24 10:09:14', '2024-04-24 10:09:14', 0),
(8, 'Rosalind Halvorson Jr.', 'wpouros@example.org', '2024-04-24 10:09:14', '$2y$12$m3Ev0puqlHRe3rlCfG558.XQ/n2AyvrF92laj5JiINgp.UXIZc1xy', '+1-432-458-8149', '1994-12-26', 'default.jpg', 1, 'TlTkXwzm9S', '2024-04-24 10:09:14', '2024-04-24 10:09:14', 0),
(9, 'Ms. Samara Pouros IV', 'connelly.roel@example.com', '2024-04-24 10:09:14', '$2y$12$Le06RXkX3vW/Vg.WIa0f2OITFjCnWEqBp8aJoKnS0VwMV6ueV6D.G', '+1.212.843.4841', '1992-09-25', 'default.jpg', 0, '7pnSbhdnE9', '2024-04-24 10:09:14', '2024-04-24 10:09:14', 0),
(10, 'Miss Dariana Runte', 'olaf.wuckert@example.org', '2024-04-24 10:09:14', '$2y$12$ApL5JK3vtlZRoC2ED9vJeePqSL.hvQ.9h7mgzbTiSvN/E71vM8PuC', '1-458-832-4325', '1978-03-20', 'default.jpg', 0, 'lIJX1wBRqh', '2024-04-24 10:09:14', '2024-04-24 10:09:14', 0),
(11, 'TEST USER', 'testuser@gmail.com', '2024-04-24 10:09:14', '$2y$12$KhvxLubigggaiBRdWlbxxOrjjTqQY48e.zTULBUnDlRG2ODRyz1/m', '1-458-832-4325', '1978-03-22', 'avatar-uid-16.jpg', 1, NULL, '2024-05-11 09:53:22', '2024-05-17 05:01:34', 0),
(12, 'Zalaph Nguyen', 'testuser1@gmail.com', NULL, '$2y$12$c3kztIbTc/bxHi8uhMT8heA7Kh5A/4d.qkdCZ9azyR8B9.zByqxne', '1293132232', '2024-05-14', 'default_image.jpg', 0, NULL, '2024-05-14 08:34:08', '2024-05-14 08:34:08', 0),
(13, 'Admin', 'admin@gmail.com', NULL, '$2y$10$9CwCR4in1a5MmQabC5YkGeOgXyKTWEK6UwSzckQMEjmHUBPb.ALSi', '1293132232', '2024-05-15', 'default_image.jpg', 0, NULL, '2024-05-14 21:13:50', '2024-05-14 21:13:50', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_user_id_foreign` (`user_id`),
  ADD KEY `bookings_showtime_id_foreign` (`showtime_id`),
  ADD KEY `bookings_payment_id_foreign` (`payment_id`);

--
-- Chỉ mục cho bảng `directors`
--
ALTER TABLE `directors`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movies_director_id_foreign` (`director_id`);

--
-- Chỉ mục cho bảng `movie_actor`
--
ALTER TABLE `movie_actor`
  ADD PRIMARY KEY (`movie_id`,`actor_id`),
  ADD KEY `movie_actor_actor_id_foreign` (`actor_id`);

--
-- Chỉ mục cho bảng `movie_genre`
--
ALTER TABLE `movie_genre`
  ADD PRIMARY KEY (`movie_id`,`genre_id`),
  ADD KEY `movie_genre_genre_id_foreign` (`genre_id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_theater_id_foreign` (`theater_id`);

--
-- Chỉ mục cho bảng `showtimes`
--
ALTER TABLE `showtimes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `showtimes_movie_id_foreign` (`movie_id`),
  ADD KEY `showtimes_room_id_foreign` (`room_id`);

--
-- Chỉ mục cho bảng `theaters`
--
ALTER TABLE `theaters`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `actors`
--
ALTER TABLE `actors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `directors`
--
ALTER TABLE `directors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `genres`
--
ALTER TABLE `genres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT cho bảng `movies`
--
ALTER TABLE `movies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `showtimes`
--
ALTER TABLE `showtimes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `theaters`
--
ALTER TABLE `theaters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`),
  ADD CONSTRAINT `bookings_showtime_id_foreign` FOREIGN KEY (`showtime_id`) REFERENCES `showtimes` (`id`),
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_director_id_foreign` FOREIGN KEY (`director_id`) REFERENCES `directors` (`id`);

--
-- Các ràng buộc cho bảng `movie_actor`
--
ALTER TABLE `movie_actor`
  ADD CONSTRAINT `movie_actor_actor_id_foreign` FOREIGN KEY (`actor_id`) REFERENCES `actors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `movie_actor_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `movie_genre`
--
ALTER TABLE `movie_genre`
  ADD CONSTRAINT `movie_genre_genre_id_foreign` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `movie_genre_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_theater_id_foreign` FOREIGN KEY (`theater_id`) REFERENCES `theaters` (`id`);

--
-- Các ràng buộc cho bảng `showtimes`
--
ALTER TABLE `showtimes`
  ADD CONSTRAINT `showtimes_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`),
  ADD CONSTRAINT `showtimes_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
