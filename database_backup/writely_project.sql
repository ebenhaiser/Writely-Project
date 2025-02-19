-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2025 at 04:35 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `writely_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Technology', 'technology', '2025-02-07 01:48:04', '2025-02-07 01:48:04'),
(2, 'Health & Wellness', 'health-wellness', '2025-02-07 01:48:04', '2025-02-07 01:48:04'),
(3, 'Lifestyle', 'lifestyle', '2025-02-07 01:48:04', '2025-02-07 01:48:04'),
(4, 'Travel', 'travel', '2025-02-07 01:48:04', '2025-02-07 01:48:04'),
(5, 'Food & Recipes', 'food-recipes', '2025-02-07 01:48:04', '2025-02-07 01:48:04'),
(6, 'Business & Finance', 'business-finance', '2025-02-07 01:48:04', '2025-02-07 01:48:04'),
(7, 'Education & Learning', 'education-learning', '2025-02-07 01:48:04', '2025-02-07 01:48:04'),
(8, 'Entertainment', 'entertainment', '2025-02-07 01:48:04', '2025-02-07 01:48:04'),
(9, 'Science & Nature', 'science-nature', '2025-02-07 01:48:04', '2025-02-07 01:48:04'),
(10, 'Sports & Fitness', 'sports-fitness', '2025-02-07 01:48:04', '2025-02-07 01:48:04'),
(11, 'Personal Development', 'personal-development', '2025-02-07 01:48:04', '2025-02-07 01:48:04'),
(12, 'Fashion & Beauty', 'fashion-beauty', '2025-02-07 01:48:04', '2025-02-07 01:48:04'),
(13, 'Parenting & Family', 'parenting-family', '2025-02-07 01:48:04', '2025-02-07 01:48:04'),
(14, 'Gaming', 'gaming', '2025-02-07 01:48:04', '2025-02-07 01:48:04'),
(15, 'History & Culture', 'history-culture', '2025-02-07 01:48:04', '2025-02-07 01:48:04'),
(16, 'News & Politics', 'news-politics', '2025-02-07 01:48:04', '2025-02-07 01:48:04'),
(17, 'DIY & Crafts', 'diy-crafts', '2025-02-07 01:48:04', '2025-02-07 01:48:04'),
(18, 'Automotive', 'automotive', '2025-02-07 01:48:04', '2025-02-07 01:48:04'),
(19, 'Photography', 'photography', '2025-02-07 01:48:04', '2025-02-07 01:48:04'),
(20, 'Relationships & Dating', 'relationships-dating', '2025-02-07 01:48:04', '2025-02-07 01:48:04');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `parent_id`, `content`, `created_at`, `updated_at`) VALUES
(1, 30, 1, NULL, 'bagus', '2025-02-11 10:00:22', '2025-02-11 10:00:22'),
(3, 30, 5, 1, 'makasih', '2025-02-11 10:05:44', '2025-02-11 10:05:44'),
(17, 21, 2, NULL, 'keren banget bang', '2025-02-11 10:59:21', '2025-02-11 10:59:21'),
(18, 21, 2, 17, 'yoi', '2025-02-11 11:01:03', '2025-02-11 11:01:03'),
(19, 5, 2, NULL, 'nakama lu yak', '2025-02-11 11:03:29', '2025-02-11 11:03:29'),
(21, 5, 2, 19, 'nakama juga nih', '2025-02-11 11:03:54', '2025-02-11 11:03:54'),
(22, 31, 4, NULL, 'kalo di ML kadita nih bos', '2025-02-11 20:49:07', '2025-02-11 20:49:07'),
(26, 30, 4, NULL, 'keren', '2025-02-11 22:04:45', '2025-02-11 22:04:45'),
(29, 16, 4, NULL, 'jadi pengen main gitar hehehe', '2025-02-11 22:28:40', '2025-02-11 22:28:40'),
(30, 16, 3, 29, 'gas lah', '2025-02-11 22:29:51', '2025-02-11 22:29:51'),
(32, 29, 7, NULL, 'Jadi pangen latian nyanyi', '2025-02-12 03:05:22', '2025-02-12 03:05:22'),
(33, 16, 7, 29, 'ayolah bang wkwkwk', '2025-02-12 03:05:52', '2025-02-12 03:05:52'),
(34, 14, 7, NULL, 'jadi laper nih wkwkw', '2025-02-12 03:06:55', '2025-02-12 03:06:55'),
(35, 15, 7, NULL, 'ngajak racing nih bang? hahaha', '2025-02-12 03:45:55', '2025-02-12 03:45:55'),
(36, 28, 8, NULL, 'ayok kita tanding lagi', '2025-02-12 03:50:14', '2025-02-12 03:50:14'),
(37, 32, 8, NULL, 'Cakep euy', '2025-02-12 03:51:29', '2025-02-12 03:51:29'),
(38, 29, 8, 32, 'nyanyi mulu hehehe', '2025-02-12 03:52:54', '2025-02-12 03:52:54'),
(42, 31, 5, 22, 'iye juga hahaha', '2025-02-12 22:35:07', '2025-02-12 22:35:07'),
(43, 31, 5, NULL, 'tes', '2025-02-12 22:41:13', '2025-02-12 22:41:13'),
(44, 31, 1, 43, 'tes diterima', '2025-02-13 08:01:08', '2025-02-13 08:01:08');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `follows`
--

CREATE TABLE `follows` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `follower_id` bigint(20) UNSIGNED NOT NULL,
  `following_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `follows`
--

INSERT INTO `follows` (`id`, `follower_id`, `following_id`, `created_at`, `updated_at`) VALUES
(4, 4, 3, '2025-02-08 09:32:11', '2025-02-08 09:32:11'),
(9, 3, 2, '2025-02-08 10:00:15', '2025-02-08 10:00:15'),
(11, 5, 3, '2025-02-08 10:45:43', '2025-02-08 10:45:43'),
(12, 5, 4, '2025-02-08 10:56:19', '2025-02-08 10:56:19'),
(13, 5, 2, '2025-02-08 10:56:37', '2025-02-08 10:56:37'),
(45, 1, 4, '2025-02-08 21:34:00', '2025-02-08 21:34:00'),
(48, 1, 3, '2025-02-08 21:36:46', '2025-02-08 21:36:46'),
(49, 1, 2, '2025-02-08 21:36:50', '2025-02-08 21:36:50'),
(51, 5, 1, '2025-02-08 22:56:59', '2025-02-08 22:56:59'),
(57, 2, 1, '2025-02-10 06:09:50', '2025-02-10 06:09:50'),
(58, 2, 3, '2025-02-10 06:10:47', '2025-02-10 06:10:47'),
(62, 7, 2, '2025-02-10 07:34:43', '2025-02-10 07:34:43'),
(65, 7, 3, '2025-02-10 10:25:15', '2025-02-10 10:25:15'),
(66, 2, 7, '2025-02-10 22:50:14', '2025-02-10 22:50:14'),
(67, 7, 1, '2025-02-12 03:39:50', '2025-02-12 03:39:50'),
(68, 8, 7, '2025-02-12 03:48:52', '2025-02-12 03:48:52'),
(69, 8, 2, '2025-02-12 03:52:34', '2025-02-12 03:52:34'),
(71, 1, 5, '2025-02-13 08:21:44', '2025-02-13 08:21:44');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `post_id`, `created_at`, `updated_at`) VALUES
(2, 1, 30, '2025-02-12 21:52:20', '2025-02-12 21:52:20'),
(3, 1, 31, '2025-02-13 08:00:54', '2025-02-13 08:00:54');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_02_01_060151_create_categories_table', 1),
(5, '2025_02_01_151259_create_posts_table', 1),
(8, '2025_02_01_152402_create_follows_table', 1),
(9, '2025_02_01_160618_create_notifications_table', 1),
(12, '2025_02_01_152342_create_comments_table', 2),
(13, '2025_02_01_151749_create_likes_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `source_users_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT 'title',
  `slug` varchar(255) NOT NULL DEFAULT 'slug',
  `content` text NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `category_id`, `title`, `slug`, `content`, `thumbnail`, `created_at`, `updated_at`) VALUES
(5, 1, 8, 'Review Anime One Piece', 'review-anime-one-piece-by-admin', 'One Piece adalah salah satu anime terpopuler sepanjang masa yang diadaptasi dari manga karya Eiichiro Oda. Anime ini mengisahkan petualangan Monkey D. Luffy dan kru bajak lautnya dalam mencari One Piece, harta karun legendaris yang akan menjadikannya Raja Bajak Laut. Dengan alur cerita yang panjang dan penuh kejutan, One Piece berhasil mempertahankan daya tariknya selama lebih dari dua dekade.\r\n\r\nSalah satu keunggulan utama One Piece adalah world-building yang sangat kaya dan detail. Dunia Grand Line yang penuh dengan pulau-pulau unik, ras yang beragam, serta sistem kekuatan seperti Buah Iblis dan Haki menjadikan setiap arc terasa segar dan menarik. Eiichiro Oda juga dikenal piawai dalam merancang cerita dengan foreshadowing yang kuat, sehingga banyak misteri yang terungkap secara bertahap di sepanjang perjalanan cerita.\r\n\r\nKarakterisasi dalam One Piece juga menjadi daya tarik tersendiri. Setiap anggota kru Topi Jerami memiliki latar belakang yang emosional dan perkembangan karakter yang mendalam. Luffy sebagai protagonis memiliki sifat ceria dan pantang menyerah, sementara karakter lain seperti Zoro, Nami, Sanji, dan lainnya memiliki keunikan masing-masing yang membuat mereka semakin disukai oleh para penggemar. Selain itu, karakter antagonis dalam anime ini juga memiliki motivasi yang kuat, menjadikan konflik semakin menarik.\r\n\r\nDari segi animasi, One Piece sempat mendapat kritik karena pacing yang lambat dan kualitas animasi yang naik turun, terutama pada episode-episode lama. Namun, sejak memasuki arc Wano, studio Toei Animation berhasil meningkatkan kualitas visual dengan animasi yang lebih dinamis dan penuh warna. Adegan pertarungan pun semakin epik dengan koreografi yang intens dan efek visual yang memukau.\r\n\r\nSecara keseluruhan, One Piece adalah anime yang layak ditonton bagi para penggemar petualangan, aksi, dan cerita yang penuh makna. Dengan humor yang khas, momen emosional yang mendalam, serta pesan persahabatan dan impian yang kuat, anime ini tetap menjadi salah satu karya terbaik dalam industri anime. Bagi mereka yang belum menonton, meskipun jumlah episodenya sudah mencapai ribuan, One Piece tetap menawarkan pengalaman menonton yang tidak akan terlupakan.', '8dd8569609ca532c7dbfb8b6bb175c2212e5b84ef95971b8731b9cd215e6b2b6.jpg', '2025-02-07 02:37:26', '2025-02-07 05:07:07'),
(6, 1, 5, 'Review Restoran Krusty Krab', 'review-restoran-krusty-krab-by-admin', 'Krusty Krab adalah restoran fiksi dalam serial animasi SpongeBob SquarePants yang menjadi ikon di dunia bawah laut Bikini Bottom. Didirikan dan dikelola oleh Mr. Krabs, restoran ini terkenal dengan menu andalannya, Krabby Patty, burger lezat yang resepnya dirahasiakan. Meskipun hanya ada dalam dunia animasi, Krusty Krab memiliki daya tarik tersendiri yang membuatnya terasa nyata bagi para penggemar.\r\n\r\nDaya tarik utama Krusty Krab adalah konsepnya yang sederhana namun unik. Desain bangunan berbentuk perangkap lobster memberikan kesan otentik sebagai restoran bawah laut. Interiornya pun sederhana dengan meja kayu dan suasana yang sering kali ramai oleh pelanggan setia, seperti Squidward yang selalu bekerja dengan enggan dan SpongeBob yang penuh semangat dalam memasak. Kombinasi karakter ini menciptakan interaksi yang menghibur serta menambah daya tarik restoran.\r\n\r\nDari segi pelayanan, Krusty Krab memiliki kelebihan dan kekurangan. SpongeBob sebagai koki utama selalu memberikan pelayanan terbaik dengan antusiasme tinggi. Namun, Squidward yang bertugas sebagai kasir sering kali malas dan kurang ramah terhadap pelanggan. Sementara itu, Mr. Krabs lebih fokus pada keuntungan, seringkali menerapkan strategi bisnis yang berlebihan, seperti menaikkan harga tanpa alasan yang jelas. Hal ini membuat Krusty Krab terkenal tidak hanya karena makanannya tetapi juga karena pemiliknya yang oportunis.\r\n\r\nDibandingkan dengan pesaingnya, Chum Bucket, Krusty Krab jelas lebih unggul dalam hal kualitas makanan. Krabby Patty selalu menjadi favorit warga Bikini Bottom, sementara restoran Chum Bucket yang dikelola Plankton justru terkenal karena makanannya yang tidak enak. Hal ini menjadi salah satu alasan mengapa pelanggan tetap setia datang ke Krusty Krab, meskipun harga yang ditetapkan Mr. Krabs sering kali tidak masuk akal.\r\n\r\nSecara keseluruhan, Krusty Krab adalah restoran fiksi yang berhasil menciptakan pengalaman ikonik dalam dunia animasi. Dengan makanan legendaris, karakter unik, dan suasana yang khas, restoran ini menjadi salah satu elemen paling berkesan dalam SpongeBob SquarePants. Meskipun tidak benar-benar ada di dunia nyata, Krusty Krab tetap hidup dalam imajinasi para penggemar dan menjadi simbol dari kesuksesan dunia kuliner di Bikini Bottom.', '5ac96fee8f860f49b4da14215036d4b1e9ba479a9afef066b828f3e0e04fd830.png', '2025-02-07 05:18:22', '2025-02-07 05:18:22'),
(13, 2, 8, 'Review Film Harry Potter: Sebuah Perjalanan Sihir yang Tak Terlupakan', 'review-film-harry-potter:-sebuah-perjalanan-sihir-yang-tak-terlupakan-by-bang.ganteng', 'Film Harry Potter adalah adaptasi dari seri novel fenomenal karya J.K. Rowling yang telah memikat jutaan penggemar di seluruh dunia. Dimulai dengan Harry Potter and the Sorcerer’s Stone (2001) hingga Harry Potter and the Deathly Hallows – Part 2 (2011), franchise ini membawa penonton dalam petualangan epik seorang anak yatim piatu bernama Harry Potter yang menemukan bahwa dirinya adalah seorang penyihir dan ditakdirkan untuk menghadapi musuh besar, Lord Voldemort.\r\n\r\nSalah satu keunggulan utama film Harry Potter adalah cerita yang kuat dan penuh makna. Selain menghadirkan petualangan dan pertarungan sihir yang seru, film ini juga menyentuh tema-tema mendalam seperti persahabatan, keberanian, pengorbanan, dan pertempuran antara kebaikan dan kejahatan. Perkembangan karakter utama—Harry Potter (Daniel Radcliffe), Hermione Granger (Emma Watson), dan Ron Weasley (Rupert Grint)—terasa alami dan relatable, membuat penonton tumbuh bersama mereka sepanjang delapan film.\r\n\r\nDari segi visual, dunia sihir yang diciptakan sangat memukau. Hogwarts, sekolah sihir tempat Harry belajar, digambarkan dengan detail yang menakjubkan, mulai dari aula besar yang megah, ruang kelas yang penuh misteri, hingga hutan terlarang yang berbahaya. Efek khusus dalam pertarungan sihir dan makhluk magis seperti naga, Dementor, serta berbagai mantra, dibuat dengan sangat apik, menjadikan pengalaman menonton semakin imersif.\r\n\r\nMusik dalam film Harry Potter juga menjadi elemen penting yang memperkuat atmosfer magisnya. Soundtrack ikonik yang diciptakan oleh John Williams, terutama Hedwig’s Theme, memberikan kesan misterius dan ajaib yang melekat di benak penonton.\r\n\r\nMeskipun film ini mendapat banyak pujian, ada beberapa kritik, terutama dari penggemar novel yang merasa bahwa beberapa detail penting dihilangkan atau diubah dalam adaptasi layar lebarnya. Namun, secara keseluruhan, film Harry Potter tetap setia pada inti ceritanya dan berhasil menyampaikan emosi serta pesan yang mendalam kepada penontonnya.\r\n\r\nSecara keseluruhan, Harry Potter bukan sekadar film fantasi biasa. Ini adalah kisah perjalanan seorang anak laki-laki yang menemukan keberaniannya, persahabatan yang abadi, dan perjuangan melawan kejahatan. Dengan alur cerita yang solid, karakter yang kuat, efek visual yang luar biasa, dan musik yang memukau, Harry Potter menjadi salah satu film terbaik sepanjang masa yang akan selalu dikenang oleh berbagai generasi.', '0afa4d4d630387360542579827f494ad00e0c20214b9ffce0b23e45c50c65f86.jpg', '2025-02-08 00:54:11', '2025-02-08 00:54:11'),
(14, 3, 5, 'Cara Memasak Indomie yang Paling Enak', 'cara-memasak-indomie-yang-paling-enak-by-mr.bean', 'Indomie merupakan salah satu mi instan favorit banyak orang karena rasanya yang lezat dan cara memasaknya yang praktis. Namun, untuk mendapatkan rasa yang lebih nikmat dan berbeda dari biasanya, ada beberapa trik yang bisa dilakukan saat memasak Indomie. Salah satu cara terbaik adalah dengan merebus mi secara sempurna, menambahkan bumbu dengan teknik yang tepat, serta menambahkan beberapa bahan tambahan untuk meningkatkan cita rasa.\r\n\r\nPertama, rebus air secukupnya hingga mendidih, lalu masukkan mi instan dan masak selama sekitar 2–3 menit. Jangan terlalu lama agar tekstur mi tetap kenyal dan tidak lembek. Setelah matang, tiriskan mi jika ingin membuat versi goreng atau langsung campurkan dengan kuah jika memilih versi rebus. Untuk Indomie goreng, campurkan bumbu terlebih dahulu di mangkuk sebelum mencampurkannya dengan mi, agar bumbu merata dengan sempurna.\r\n\r\nAgar lebih lezat, tambahkan bahan-bahan tambahan seperti telur setengah matang yang memberikan rasa creamy, potongan cabai untuk sensasi pedas, serta daun bawang atau bawang goreng untuk menambah aroma yang harum. Beberapa orang juga menyukai tambahan keju parut untuk menciptakan kombinasi rasa gurih yang unik. Jika ingin versi lebih spesial, bisa menambahkan daging ayam suwir, sosis goreng, atau bahkan topping seperti kornet dan telur mata sapi.\r\n\r\nSelain itu, salah satu trik rahasia adalah menggunakan sedikit margarin atau mentega saat mencampur mi dengan bumbu. Ini akan memberikan rasa yang lebih gurih dan tekstur yang lebih lembut. Untuk Indomie kuah, coba tambahkan sedikit susu atau kaldu ayam agar rasanya lebih kaya dan creamy. Dengan sedikit kreativitas dalam cara memasak dan menambahkan bahan pelengkap, seporsi Indomie bisa menjadi hidangan yang lebih lezat dan menggugah selera.', 'f221f04b420bb131af5c379728ea297925fe8400cc58631e344bd17d8c03749c.webp', '2025-02-08 02:16:08', '2025-02-08 02:16:25'),
(15, 3, 18, 'Panduan Berkendara di Negara Left Driving bagi Pengemudi dari Indonesia', 'panduan-berkendara-di-negara-left-driving-bagi-pengemudi-dari-indonesia-by-mr.bean', 'Bagi pengemudi asal Indonesia yang terbiasa dengan sistem right driving (kemudi di kanan, berkendara di sisi kiri jalan), berkendara di negara yang menerapkan sistem left driving (kemudi di kiri, berkendara di sisi kanan jalan) bisa menjadi tantangan tersendiri. Beberapa negara seperti Jepang, Inggris, Australia, dan Thailand menggunakan sistem left driving, sehingga pengemudi dari Indonesia perlu beradaptasi agar tetap aman dan nyaman saat berkendara. Berikut adalah beberapa panduan untuk menyesuaikan diri saat mengemudi di negara dengan sistem left driving.\r\n\r\n1. Beradaptasi dengan Posisi Kemudi dan Jalur Jalan\r\nPerbedaan paling mendasar adalah posisi kemudi yang berada di sisi kiri kendaraan. Ini berarti tangan kiri akan digunakan untuk mengganti gigi (pada mobil manual), sementara tangan kanan tetap bertugas mengendalikan setir. Selain itu, jalur berkendara juga berubah, di mana mobil harus tetap berada di sisi kanan jalan, bukan di kiri seperti di Indonesia. Awalnya mungkin terasa membingungkan, terutama saat berbelok atau memasuki persimpangan, tetapi dengan latihan dan fokus yang lebih, pengemudi akan mulai terbiasa.\r\n\r\n2. Perhatikan Posisi di Jalur dan Aturan Lalu Lintas\r\nSaat berkendara di sistem left driving, penting untuk selalu berada di lajur yang benar dan tidak terbawa kebiasaan dari Indonesia. Biasanya, lajur kiri digunakan untuk kendaraan yang melaju lebih lambat, sedangkan lajur kanan digunakan untuk mendahului. Selain itu, perhatikan rambu lalu lintas, batas kecepatan, serta aturan khusus di negara tersebut. Misalnya, beberapa negara melarang belok kanan saat lampu merah menyala, berbeda dengan kebiasaan di Indonesia yang memperbolehkannya di beberapa lokasi.\r\n\r\n3. Waspada Saat di Persimpangan dan Bundaran\r\nPersimpangan dan bundaran (roundabout) bisa menjadi tantangan bagi pengemudi yang baru pertama kali menggunakan sistem left driving. Biasanya, kendaraan akan masuk bundaran dari arah kanan dan berputar searah jarum jam, berbeda dengan sistem right driving yang berlawanan arah jarum jam. Pastikan untuk memberikan prioritas kepada kendaraan yang sudah berada di dalam bundaran dan gunakan lampu sein dengan benar saat keluar dari bundaran.\r\n\r\n4. Berhati-hati Saat Berbelok dan Menyalip\r\nBerbelok ke kanan di sistem left driving berarti harus menyeberangi jalur lalu lintas yang datang dari arah berlawanan, sehingga harus lebih berhati-hati. Sementara itu, saat menyalip, ingat bahwa kendaraan harus berpindah ke jalur kiri, bukan kanan seperti di Indonesia. Menggunakan kaca spion dengan baik akan sangat membantu dalam menyesuaikan diri dengan perubahan perspektif ini.\r\n\r\n5. Biasakan Menggunakan Kaca Spion dan Navigasi\r\nKarena posisi pengemudi berpindah ke kiri, sudut pandang juga akan berubah. Oleh karena itu, penting untuk lebih sering mengecek kaca spion, terutama saat berpindah jalur atau menyalip kendaraan lain. Menggunakan aplikasi navigasi seperti Google Maps atau Waze juga dapat membantu, terutama untuk memahami arah jalan, batas kecepatan, dan persimpangan yang kompleks.\r\n\r\n6. Berlatih di Area yang Sepi Sebelum Berkendara di Kota Besar\r\nJika memungkinkan, cobalah untuk berlatih di area yang lebih sepi atau di jalanan yang tidak terlalu ramai sebelum masuk ke jalan utama atau jalan tol. Ini akan membantu membangun kepercayaan diri dan mengurangi risiko melakukan kesalahan akibat kebiasaan lama saat berkendara di Indonesia.\r\n\r\nKesimpulan\r\nBerkendara di negara dengan sistem left driving memang memerlukan adaptasi, terutama bagi mereka yang sudah terbiasa dengan sistem right driving seperti di Indonesia. Dengan memahami perbedaan posisi kemudi, jalur lalu lintas, aturan berbelok, dan cara menyalip, pengemudi dapat mengurangi risiko kebingungan di jalan. Latihan dan kehati-hatian adalah kunci utama agar perjalanan tetap aman dan nyaman. 🚗💨', '3a1790ff2124be9536c8f736c881521cd82301a22d1ae65d24c5769ff59fb1b9.jpg', '2025-02-08 08:49:36', '2025-02-08 08:49:36'),
(16, 3, 8, 'Cara Bermain Gitar untuk Orang yang Buta Nada', 'cara-bermain-gitar-untuk-orang-yang-buta-nada-by-mr.bean', 'Bermain gitar bisa menjadi tantangan tersendiri bagi seseorang yang merasa dirinya buta nada, yaitu sulit membedakan tinggi rendahnya suatu nada atau kesulitan menyesuaikan suara dengan melodi yang benar. Namun, dengan metode yang tepat, siapapun bisa belajar bermain gitar, termasuk mereka yang tidak memiliki kepekaan tinggi terhadap nada. Berikut adalah beberapa cara efektif untuk belajar gitar bagi orang yang buta nada.\r\n\r\n1. Fokus pada Pola Chord, Bukan Pendengaran\r\nBagi yang kesulitan membedakan nada, bermain gitar bisa dimulai dengan menghafal bentuk chord tanpa perlu terlalu bergantung pada telinga. Chord gitar memiliki pola yang tetap pada fretboard, sehingga cukup dengan memahami posisi jari, seseorang bisa memainkan lagu tanpa harus memastikan nadanya terdengar benar. Gunakan diagram chord untuk mengetahui posisi jari pada senar dan fret yang tepat.\r\n\r\n2. Gunakan Tuning Otomatis atau Aplikasi Tuner\r\nOrang yang buta nada sering kesulitan menyetel gitar dengan telinga. Oleh karena itu, gunakan tuner digital atau aplikasi tuning di smartphone untuk memastikan senar gitar berada dalam nada yang benar. Dengan tuning yang tepat, meskipun tidak bisa membedakan nada secara langsung, seseorang tetap bisa bermain dengan suara yang benar.\r\n\r\n3. Belajar Strumming dan Ritme Terlebih Dahulu\r\nJika kesulitan membedakan nada, fokuslah pada ritme dan pola strumming terlebih dahulu. Banyak lagu yang bisa dimainkan hanya dengan beberapa chord dasar dan ritme yang sederhana. Gunakan metronom untuk melatih ketepatan tempo agar permainan tetap enak didengar meskipun belum terlalu fokus pada nada.\r\n\r\n4. Gunakan Metode Menghafal Angka atau Tabulasi\r\nOrang yang buta nada bisa lebih mudah belajar dengan metode tablature (tab gitar) yang menggunakan angka untuk menunjukkan fret dan senar yang harus dimainkan. Sistem ini lebih visual dan tidak memerlukan kemampuan mendengar nada dengan baik. Dengan metode ini, pemain gitar cukup mengikuti angka yang ditulis tanpa harus memahami notasi musik yang kompleks.\r\n\r\n5. Berlatih dengan Lagu yang Menggunakan Chord Mudah\r\nMulailah bermain dengan lagu-lagu yang memiliki chord dasar sederhana seperti C, G, D, dan Em. Beberapa lagu yang cocok untuk pemula adalah:\r\n\r\nKemesraan – Iwan Fals\r\nStand by Me – Ben E. King\r\nSomeone Like You – Adele (versi chord dasar)\r\nDengan latihan yang cukup, tangan akan terbiasa membentuk chord tanpa perlu memikirkan apakah nadanya sudah benar atau belum.\r\n\r\n6. Bermain dengan Panduan atau Bersama Orang Lain\r\nBelajar gitar akan lebih mudah jika ada teman atau guru yang bisa memberikan umpan balik. Jika kesulitan mengenali kesalahan nada, mintalah bantuan orang lain untuk memastikan bahwa permainan gitar sudah sesuai dengan lagu yang dimainkan. Selain itu, bermain bersama teman yang sudah bisa gitar bisa membantu dalam memahami pola lagu dengan lebih cepat.\r\n\r\n7. Latihan dengan Perasaan, Bukan Sekadar Mendengar\r\nMeskipun seseorang merasa dirinya buta nada, musik sebenarnya bisa dirasakan dengan perasaan. Saat bermain gitar, coba rasakan getaran senar, tekanan jari pada fret, dan ritme permainan. Dengan latihan yang cukup, otak akan mulai mengenali pola suara meskipun awalnya terasa sulit.\r\n\r\nKesimpulan\r\nBagi orang yang buta nada, bermain gitar tetap bisa dilakukan dengan cara yang lebih visual dan berbasis pola, seperti menghafal chord, menggunakan tabulasi, serta mengandalkan ritme dan latihan rutin. Dengan pendekatan yang tepat dan latihan yang cukup, siapapun bisa belajar gitar dan menikmati musik tanpa harus memiliki pendengaran nada yang sempurna. Yang terpenting adalah kesabaran, konsistensi, dan menikmati proses belajar! 🎸🎶', '21f94deabb190548d611c60002c41b8b3c4bd61214c7892f362f36ea3350cd44.webp', '2025-02-08 08:51:43', '2025-02-08 08:51:43'),
(17, 4, 17, 'Cara Membuat Gerobak Warmindo yang Fungsional dan Menarik', 'cara-membuat-gerobak-warmindo-yang-fungsional-dan-menarik-by-puncak_rantai_makanan', 'Warmindo atau Warung Makan Indomie adalah usaha kuliner yang cukup populer di Indonesia, terutama di kalangan mahasiswa dan pekerja yang mencari makanan cepat saji dengan harga terjangkau. Salah satu elemen penting dalam menjalankan usaha Warmindo adalah gerobak yang fungsional, nyaman, dan menarik bagi pelanggan. Berikut adalah langkah-langkah membuat gerobak Warmindo yang ideal.\r\n\r\n1. Menentukan Desain dan Ukuran Gerobak\r\nSebelum mulai membuat gerobak, tentukan desain dan ukurannya sesuai dengan kebutuhan dan lokasi usaha. Pastikan gerobak memiliki:\r\n\r\nPanjang sekitar 1,5 - 2 meter untuk menampung peralatan memasak dan bahan makanan.\r\nTinggi sekitar 1,2 - 1,5 meter agar nyaman saat memasak dan melayani pelanggan.\r\nLebar sekitar 0,6 - 1 meter untuk memudahkan mobilitas dan pengoperasian.\r\nJika memungkinkan, tambahkan atap atau kanopi untuk melindungi area memasak dari hujan dan panas.\r\n\r\n2. Memilih Bahan yang Kuat dan Tahan Lama\r\nMaterial gerobak harus kuat dan tahan terhadap panas serta kelembapan. Beberapa pilihan material yang bisa digunakan adalah:\r\n\r\nRangka besi hollow (kokoh dan tahan lama).\r\nKayu multiplek atau MDF (lebih ringan dan mudah dibentuk, tapi perlu pelapis anti-air).\r\nAluminium atau stainless steel (lebih tahan karat dan mudah dibersihkan).\r\nPastikan gerobak memiliki roda yang kuat untuk memudahkan pemindahan tempat jika diperlukan.\r\n\r\n3. Membuat Kompartemen yang Efisien\r\nAgar gerobak lebih fungsional, atur tata letak dengan baik:\r\n\r\nBagian depan: Area untuk meletakkan kompor dan peralatan memasak.\r\nBagian tengah: Rak atau laci untuk menyimpan mi instan, telur, bumbu, dan peralatan lainnya.\r\nBagian bawah: Tempat penyimpanan gas LPG dan bahan tambahan lainnya.\r\nBagian samping: Meja kecil atau tempat penyajian makanan.\r\nTambahkan laci tertutup agar bahan makanan tetap bersih dan terlindungi dari debu atau serangga.\r\n\r\n4. Memasang Pencahayaan dan Kelistrikan\r\nJika berjualan malam hari, pastikan gerobak dilengkapi dengan lampu LED yang hemat energi. Jika memungkinkan, sediakan colokan listrik untuk peralatan tambahan seperti rice cooker atau dispenser air panas.\r\n\r\n5. Menambahkan Branding dan Dekorasi\r\nAgar menarik perhatian pelanggan, beri sentuhan desain yang unik pada gerobak:\r\n\r\nGunakan cat warna cerah atau kombinasi warna khas Warmindo (kuning, merah, atau hijau).\r\nTambahkan stiker atau papan nama dengan tulisan yang jelas, seperti \"Warmindo Maknyus\" atau \"Indomie 24 Jam\".\r\nPasang menu sederhana yang mudah dibaca, dengan harga yang jelas.\r\n6. Uji Coba dan Perbaikan\r\nSetelah gerobak selesai dibuat, lakukan uji coba untuk memastikan semua peralatan bisa berfungsi dengan baik. Cek kestabilan gerobak, keamanan penyimpanan gas LPG, serta kenyamanan saat digunakan. Jika ada bagian yang kurang optimal, lakukan perbaikan sebelum mulai berjualan.\r\n\r\nKesimpulan\r\nMembuat gerobak Warmindo yang baik memerlukan perencanaan matang agar fungsional, nyaman digunakan, dan menarik bagi pelanggan. Dengan desain yang efisien, bahan berkualitas, pencahayaan yang cukup, serta branding yang menarik, gerobak Warmindo bisa menjadi aset penting dalam menjalankan usaha kuliner yang sukses. 🚀🔥🍜', 'ba42a67fc0464645e85cf1d13ad1d00c2754ea7ec2d85638aa35b64e9e391503.jpg', '2025-02-08 08:59:00', '2025-02-08 08:59:00'),
(18, 5, 12, 'Cara Memilih Fashion yang Trendi di Era Modern', 'cara-memilih-fashion-yang-trendi-di-era-modern-by-miak.', 'Fashion selalu berkembang mengikuti zaman, dan di era modern ini, gaya berpakaian tidak hanya tentang mengikuti tren, tetapi juga mencerminkan kepribadian dan kenyamanan. Memilih fashion yang sesuai bisa meningkatkan rasa percaya diri dan membuat tampilan lebih stylish tanpa harus berlebihan. Berikut adalah beberapa tips dalam memilih fashion yang cocok untuk zaman sekarang.\r\n\r\n1. Pilih Pakaian Sesuai dengan Bentuk Tubuh\r\nSetiap orang memiliki bentuk tubuh yang berbeda, sehingga penting untuk memilih pakaian yang bisa menonjolkan kelebihan dan menyamarkan kekurangan. Misalnya:\r\n\r\nBentuk tubuh pear (pinggul lebih lebar) cocok dengan atasan yang lebih mencolok dan celana high-waist.\r\nBentuk tubuh apple (bagian atas lebih besar) sebaiknya memilih pakaian yang lebih longgar di bagian atas dan celana yang pas di kaki.\r\nBentuk tubuh rectangle bisa bermain dengan layering atau pakaian yang memberi kesan lekuk tubuh.\r\n2. Gunakan Warna yang Sesuai dengan Tone Kulit\r\nMemilih warna pakaian yang cocok dengan warna kulit bisa membuat penampilan lebih fresh.\r\n\r\nKulit terang cocok dengan warna pastel, biru navy, atau merah marun.\r\nKulit sawo matang terlihat bagus dengan warna earthy seperti cokelat, hijau olive, dan mustard.\r\nKulit gelap akan terlihat stunning dengan warna-warna cerah seperti kuning, putih, dan oranye.\r\n3. Sesuaikan dengan Tren, tapi Jangan Berlebihan\r\nMengikuti tren memang seru, tetapi tidak semua tren cocok untuk setiap orang. Pilihlah tren yang tetap sesuai dengan gaya pribadi. Misalnya, jika tren oversized sedang populer, pastikan untuk tetap menyeimbangkan dengan item yang pas di tubuh agar tidak terlihat tenggelam dalam pakaian.\r\n\r\n4. Utamakan Kenyamanan\r\nFashion modern tidak hanya tentang tampilan, tetapi juga kenyamanan. Pilih bahan yang breathable seperti katun atau linen untuk cuaca panas, dan bahan yang lebih tebal seperti wool atau fleece untuk cuaca dingin. Jangan paksakan pakaian yang membuat tidak nyaman hanya karena sedang tren.\r\n\r\n5. Investasi pada Item Basic yang Timeless\r\nBeberapa item fashion tidak pernah ketinggalan zaman dan bisa dipadukan dengan berbagai gaya, seperti:\r\n\r\nKaos putih polos yang cocok untuk berbagai kombinasi.\r\nCelana jeans berkualitas baik yang bisa dipakai dalam berbagai suasana.\r\nSneakers putih yang selalu terlihat stylish dan nyaman.\r\nJaket denim atau blazer yang bisa membuat tampilan lebih fashionable dalam sekejap.\r\n6. Aksesori sebagai Pelengkap Gaya\r\nAksesori bisa memberikan sentuhan lebih pada penampilan tanpa perlu mengganti pakaian sepenuhnya. Misalnya, jam tangan klasik, kacamata hitam, anting kecil, atau tas unik bisa membuat outfit yang sederhana terlihat lebih menarik.\r\n\r\n7. Kenali dan Kembangkan Gaya Pribadi\r\nTren boleh berubah, tapi gaya pribadi adalah yang membuat seseorang terlihat unik. Cobalah eksplorasi berbagai gaya hingga menemukan yang paling nyaman dan sesuai dengan kepribadian. Apakah lebih suka gaya casual, streetwear, minimalis, atau elegan? Setelah menemukan gaya yang cocok, mix and match pakaian jadi lebih mudah.\r\n\r\nKesimpulan\r\nFashion di zaman sekarang bukan hanya tentang mengikuti tren, tetapi juga bagaimana cara berpakaian yang nyaman dan sesuai dengan karakter masing-masing. Dengan memperhatikan bentuk tubuh, pemilihan warna, kenyamanan, dan gaya pribadi, setiap orang bisa tampil stylish tanpa harus mengorbankan identitasnya sendiri. Yang terpenting, percaya diri adalah kunci utama untuk tampil modis dan menarik! 💃✨', '6ba36266cb71594a302b60fc0c38429bb578c47954dd714bac069288810bc191.jpg', '2025-02-08 21:42:52', '2025-02-08 21:42:52'),
(19, 2, 3, 'Cara Belajar yang Baik untuk Mendapatkan Nilai Sempurna', 'cara-belajar-yang-baik-untuk-mendapatkan-nilai-sempurna-by-bang.ganteng', 'Mendapatkan nilai sempurna bukan hanya tentang belajar lebih lama, tetapi juga belajar dengan cara yang efektif. Dengan strategi yang tepat, siapa pun bisa meningkatkan pemahaman dan performa akademik mereka. Berikut adalah beberapa cara belajar yang baik agar bisa meraih nilai sempurna di sekolah atau perguruan tinggi.\r\n\r\n1. Buat Jadwal Belajar yang Teratur\r\nBelajar secara konsisten lebih efektif dibandingkan belajar dalam waktu singkat menjelang ujian (sistem kebut semalam). Buat jadwal belajar harian dengan membagi waktu untuk setiap mata pelajaran agar semua materi dapat dipelajari secara bertahap.\r\n\r\n2. Gunakan Teknik Belajar yang Efektif\r\nBeberapa teknik belajar yang terbukti efektif antara lain:\r\n\r\nPomodoro Technique: Belajar selama 25–30 menit, lalu istirahat 5 menit, dan ulangi siklus ini beberapa kali.\r\nMetode Feynman: Ajarkan kembali materi yang dipelajari dengan bahasa sederhana seolah-olah sedang menjelaskan kepada orang lain.\r\nActive Recall: Mengingat kembali materi tanpa melihat catatan untuk menguji pemahaman.\r\nMind Mapping: Membuat peta konsep untuk menghubungkan ide-ide dalam materi pelajaran.\r\n3. Fokus pada Pemahaman, Bukan Sekadar Menghafal\r\nAlih-alih hanya menghafal, cobalah untuk memahami konsep yang ada di balik materi. Gunakan contoh nyata atau analogi yang lebih mudah dipahami agar materi terasa lebih masuk akal.\r\n\r\n4. Catat Poin-Poin Penting\r\nMembuat catatan ringkas atau highlight bagian penting dari buku dapat membantu dalam mengulang materi dengan lebih mudah. Gunakan warna berbeda untuk menandai konsep penting agar lebih menarik dan mudah diingat.\r\n\r\n5. Gunakan Sumber Belajar yang Beragam\r\nJangan hanya mengandalkan satu buku atau catatan. Gunakan berbagai sumber seperti video edukasi, artikel, e-book, atau diskusi dengan teman dan guru untuk mendapatkan sudut pandang yang lebih luas.\r\n\r\n6. Lakukan Latihan Soal Secara Rutin\r\nMengerjakan latihan soal dapat membantu memahami pola pertanyaan dan meningkatkan kemampuan dalam menjawab soal ujian dengan lebih cepat dan akurat. Cobalah soal-soal tahun sebelumnya atau latihan dari buku referensi.\r\n\r\n7. Hindari Gangguan Saat Belajar\r\nBelajar di lingkungan yang tenang dan bebas dari gangguan seperti notifikasi media sosial atau televisi akan membantu meningkatkan konsentrasi. Jika sulit fokus, gunakan aplikasi pemblokir gangguan seperti \"Forest\" atau \"StayFocusd\" saat belajar.\r\n\r\n8. Jaga Kesehatan dan Pola Tidur\r\nOtak bekerja lebih baik saat tubuh dalam kondisi sehat. Pastikan untuk:\r\n\r\nTidur cukup (minimal 7–8 jam per malam).\r\nMakan makanan bergizi yang mendukung konsentrasi, seperti ikan, telur, dan sayuran hijau.\r\nBerolahraga ringan untuk menjaga stamina dan mengurangi stres.\r\n9. Berdiskusi dan Belajar Bersama\r\nBerdiskusi dengan teman atau bergabung dalam kelompok belajar dapat membantu memahami materi dengan lebih baik. Jika ada bagian yang sulit, tanyakan kepada guru atau teman yang lebih paham.\r\n\r\n10. Tetapkan Target dan Motivasi Diri\r\nTentukan tujuan yang jelas, seperti target nilai tertentu atau cita-cita yang ingin dicapai. Dengan memiliki motivasi yang kuat, belajar akan terasa lebih menyenangkan dan tidak menjadi beban.\r\n\r\nKesimpulan\r\nBelajar yang baik bukan hanya tentang durasi, tetapi juga strategi yang digunakan. Dengan membuat jadwal, menerapkan teknik belajar yang efektif, menjaga kesehatan, dan tetap termotivasi, siapa pun bisa mendapatkan nilai sempurna. Yang terpenting, nikmati proses belajar dan terus berusaha secara konsisten! 📚💡✨', 'e70272ea672555dd944159f66c486c301d17a8d9a5f9999a5e949122c2029209.webp', '2025-02-10 06:18:41', '2025-02-10 06:18:41'),
(20, 5, 12, 'Tips Busana untuk First Date: Tampil Menarik dan Percaya Diri', 'tips-busana-untuk-first-date:-tampil-menarik-dan-percaya-diri-by-miak.', 'First date atau kencan pertama adalah momen spesial yang bisa meninggalkan kesan mendalam bagi kedua belah pihak. Selain sikap dan komunikasi yang baik, penampilan juga menjadi faktor penting dalam menciptakan kesan pertama yang positif. Oleh karena itu, memilih busana yang tepat sangat diperlukan agar terlihat menarik dan tetap nyaman. Berikut adalah beberapa tips berpakaian untuk first date bagi pria dan wanita.\r\n\r\nBagi pria, kesan pertama bisa diperkuat dengan tampilan yang rapi dan maskulin. Pilihlah pakaian yang sesuai dengan tempat dan suasana kencan. Jika kencan berlangsung di tempat kasual seperti kafe atau taman, kombinasi kaos berkualitas baik dengan celana jeans atau chino bisa menjadi pilihan yang nyaman namun tetap stylish. Jika kencan lebih formal, seperti makan malam di restoran mewah, kemeja lengan panjang yang dipadukan dengan celana bahan akan memberikan tampilan yang lebih elegan. Sepatu juga perlu diperhatikan, hindari sandal atau sneakers yang terlalu lusuh. Sebagai tambahan, pastikan pakaian bersih, wangi, dan tidak kusut agar terlihat lebih menarik dan profesional.\r\n\r\nSementara itu, bagi wanita, busana first date sebaiknya mencerminkan kepribadian namun tetap memperhatikan kesan elegan dan feminin. Dress simpel dengan potongan yang tidak terlalu terbuka bisa menjadi pilihan aman untuk memberikan tampilan yang anggun dan sopan. Jika ingin tampil lebih santai, kombinasi blouse dan celana jeans bisa tetap terlihat menarik asalkan dipadukan dengan aksesori yang sesuai, seperti anting kecil atau jam tangan elegan. Warna pakaian juga berperan penting dalam menciptakan suasana; warna-warna soft seperti pastel atau warna netral seperti putih dan beige dapat memberikan kesan hangat dan nyaman.\r\n\r\nSelain pakaian, hal lain yang perlu diperhatikan adalah kebersihan dan kerapihan diri. Pria maupun wanita sebaiknya memastikan rambut tertata rapi, kuku bersih, dan aroma tubuh segar agar pasangan merasa nyaman saat berinteraksi. Gunakan parfum atau body mist dengan aroma yang ringan agar tidak terlalu menyengat.\r\n\r\nPada akhirnya, kunci utama dalam berpakaian untuk first date adalah keseimbangan antara kenyamanan dan tampilan yang menarik. Tidak perlu memaksakan diri mengikuti tren yang tidak sesuai dengan kepribadian. Yang terpenting adalah percaya diri dan menunjukkan versi terbaik dari diri sendiri, karena rasa nyaman dan sikap yang baik akan lebih berkesan daripada sekadar pakaian yang mahal atau berlebihan. Dengan persiapan yang tepat, first date bisa menjadi pengalaman yang menyenangkan dan meninggalkan kesan yang positif bagi kedua belah pihak. 💕', '10fbb5e418d194769fbafcd7eba7f399c67db0cd385ebf3c84cb8f5a179df807.jpeg', '2025-02-10 06:27:51', '2025-02-10 06:28:54'),
(21, 1, 4, 'Tips Touring Bersama Kawan-Kawan agar Aman dan Menyenangkan', 'tips-touring-bersama-kawan-kawan-agar-aman-dan-menyenangkan-by-master.pantun', 'Touring bersama teman-teman adalah salah satu cara terbaik untuk menikmati perjalanan, mengeksplorasi tempat baru, dan mempererat kebersamaan. Namun, perjalanan jarak jauh dengan kendaraan, terutama sepeda motor, memerlukan persiapan yang matang agar tetap aman, nyaman, dan menyenangkan. Berikut adalah beberapa tips penting untuk touring bersama kawan-kawan.\r\n\r\nPertama, pastikan kendaraan dalam kondisi prima sebelum berangkat. Lakukan pengecekan menyeluruh terhadap mesin, rem, lampu, tekanan ban, dan bahan bakar. Jika menggunakan sepeda motor, pastikan rantai, oli, dan sistem pengereman berfungsi dengan baik. Lebih baik melakukan servis ringan sebelum perjalanan agar menghindari masalah teknis di jalan.\r\n\r\nKedua, tentukan rute dan tujuan dengan jelas. Diskusikan bersama rombongan mengenai jalur yang akan dilalui, titik istirahat, dan estimasi waktu tempuh. Sebaiknya pilih rute yang aman dan memiliki akses ke SPBU, tempat makan, serta fasilitas kesehatan. Gunakan aplikasi navigasi seperti Google Maps untuk memudahkan perjalanan dan menghindari tersesat.\r\n\r\nKetiga, siapkan perlengkapan yang memadai. Untuk perjalanan jauh, gunakan pakaian yang nyaman dan sesuai dengan kondisi cuaca. Jika naik motor, kenakan jaket tebal, celana panjang, sarung tangan, serta sepatu yang kokoh. Jangan lupa membawa jas hujan, obat-obatan pribadi, serta perlengkapan darurat seperti alat tambal ban atau toolkit sederhana.\r\n\r\nKeempat, tetap disiplin dan menjaga keselamatan selama perjalanan. Atur formasi berkendara yang rapi dan saling menjaga jarak aman. Jangan menyalip sembarangan atau memacu kendaraan dengan kecepatan berlebihan. Pastikan semua anggota rombongan memahami kode atau isyarat komunikasi saat di jalan agar perjalanan lebih tertib dan terkoordinasi.\r\n\r\nKelima, istirahat secara berkala untuk menghindari kelelahan. Touring jarak jauh bisa sangat menguras stamina, terutama bagi pengendara motor. Oleh karena itu, lakukan istirahat setiap 1-2 jam untuk meregangkan otot, mengisi bahan bakar, dan mengisi ulang energi dengan makanan ringan atau minuman.\r\n\r\nTerakhir, tetap jaga kebersamaan dan nikmati perjalanan. Touring bukan hanya tentang mencapai tujuan, tetapi juga tentang pengalaman yang menyenangkan bersama teman-teman. Hindari perdebatan yang tidak perlu, saling bantu jika ada kendala di jalan, dan abadikan momen-momen seru selama perjalanan.\r\n\r\nDengan persiapan yang matang dan sikap yang bertanggung jawab, touring bersama kawan-kawan bisa menjadi pengalaman yang berkesan dan penuh petualangan. Selamat touring, tetap aman, dan nikmati perjalanan! 🏍️✨', 'fa0f967bfeb619b403ed4908c39dbb3c7f95b8a2be0278e196e249cb739cb7fd.jpg', '2025-02-10 06:30:53', '2025-02-10 06:30:53'),
(22, 4, 5, 'Resep Praktis dan Lezat: Olahan Telur untuk Hidangan Keluarga', 'resep-praktis-dan-lezat:-olahan-telur-untuk-hidangan-keluarga-by-puncak_rantai_makanan', 'Memasak telur yang enak untuk keluarga bisa menjadi kegiatan yang menyenangkan dan memuaskan. Telur adalah bahan makanan serbaguna yang mudah diolah menjadi berbagai hidangan lezat. Salah satu cara sederhana untuk memasak telur adalah dengan membuat telur dadar. Pertama, kocok 2-3 butir telur dalam mangkuk, tambahkan sedikit garam, merica, dan irisan daun bawang untuk menambah rasa. Panaskan sedikit minyak atau mentega di atas wajan anti lengket, lalu tuangkan adonan telur ke dalamnya. Masak dengan api sedang sambil sesekali diaduk perlahan hingga telur matang dan bertekstur lembut. Telur dadar ini bisa disajikan hangat bersama nasi atau roti untuk sarapan atau makan siang yang praktis.\r\n\r\nSelain telur dadar, telur rebus juga bisa menjadi pilihan sehat dan mudah. Rebus telur dalam air mendidih selama 7-10 menit, tergantung tingkat kematangan yang diinginkan. Setelah matang, rendam telur dalam air dingin untuk memudahkan pengupasan. Telur rebus bisa disajikan begitu saja atau diolah menjadi tambahan untuk salad, sandwich, atau hidangan lainnya. Untuk variasi yang lebih menarik, coba membuat telur orak-arik dengan tambahan sayuran seperti wortel, buncis, atau tomat. Tumis sayuran terlebih dahulu, lalu masukkan telur yang sudah dikocok dan aduk hingga matang. Hidangan ini tidak hanya lezat tetapi juga bergizi untuk seluruh keluarga.\r\n\r\nDengan sedikit kreativitas, telur bisa diubah menjadi hidangan istimewa yang disukai oleh semua anggota keluarga. Jangan ragu untuk mencoba resep-resep baru dan menyesuaikan bumbu sesuai selera. Selamat memasak!', '811442fbd10ba936c30ea7dd0a666feb878ebb17ff91e89bda8f3920776f2a88.jpg', '2025-02-10 07:31:56', '2025-02-10 07:32:41'),
(28, 7, 10, 'Teknik dan Risiko Meninju Tembok Hingga Hancur: Mungkinkah?', 'teknik-dan-risiko-meninju-tembok-hingga-hancur-mungkinkah-by-chuck_norris', 'Meninju tembok hingga hancur mungkin terdengar seperti adegan dalam film aksi atau anime, tetapi dalam kenyataannya, hal ini hampir mustahil dilakukan dengan tangan kosong tanpa mengalami cedera serius. Tembok biasanya terbuat dari bahan seperti beton, bata, atau kayu, yang memiliki ketahanan tinggi terhadap benturan. Namun, jika seseorang ingin mencoba meninju tembok dengan kekuatan maksimal, ada beberapa faktor yang perlu diperhatikan, mulai dari teknik, kekuatan fisik, hingga perlindungan tangan agar tidak mengalami cedera fatal.\r\n\r\nPertama-tama, kekuatan tangan dan tubuh secara keseluruhan harus dilatih dengan baik. Latihan kekuatan otot, terutama pada bagian lengan, bahu, dan pergelangan tangan, sangat penting untuk menghasilkan pukulan yang kuat. Latihan seperti push-up, pull-up, dan latihan beban bisa membantu memperkuat otot-otot yang digunakan untuk meninju. Selain itu, penting juga untuk melatih kepadatan tulang tangan dengan teknik conditioning, misalnya dengan memukul samsak berat atau benda keras secara bertahap agar tulang dan kulit menyesuaikan diri terhadap tekanan. Para petarung bela diri biasanya menggunakan metode seperti memukul karung pasir atau papan kayu tipis sebelum naik ke level yang lebih keras.\r\n\r\nSelain kekuatan, teknik pukulan juga memainkan peran penting dalam efektivitas serangan terhadap tembok. Pukulan yang sembarangan hanya akan menyebabkan cedera pada tangan tanpa memberikan dampak berarti pada tembok. Oleh karena itu, teknik tinju yang benar harus dipelajari, seperti pukulan lurus (jab dan cross), pukulan ayun (hook), atau pukulan dari bawah (uppercut). Pukulan yang paling efektif untuk menghancurkan sesuatu yang keras biasanya adalah pukulan lurus dengan kepalan tangan yang benar-benar terkunci dan tenaga yang terfokus.\r\n\r\nUntuk menghindari cedera parah, tangan juga harus dilindungi dengan baik. Menggunakan sarung tangan tinju, perban tangan, atau pelindung lain bisa mengurangi risiko patah tulang atau luka serius. Tanpa perlindungan yang memadai, kepalan tangan bisa mengalami cedera parah, seperti retak atau patah pada jari dan pergelangan tangan.\r\n\r\nSelain itu, jenis tembok yang akan dihancurkan juga sangat menentukan apakah hal ini memungkinkan atau tidak. Tembok dari beton padat hampir tidak mungkin dihancurkan dengan satu pukulan tangan kosong, kecuali seseorang memiliki kekuatan di luar batas manusia normal. Namun, tembok dari drywall atau kayu tipis lebih mungkin untuk ditembus dengan pukulan keras, seperti yang sering terlihat dalam film atau acara TV.\r\n\r\nPada akhirnya, meninju tembok hingga hancur bukanlah hal yang disarankan karena risikonya lebih besar daripada manfaatnya. Sebagai gantinya, lebih baik menyalurkan energi dan kekuatan ke dalam latihan bela diri atau olahraga lain yang lebih aman dan bermanfaat bagi tubuh. Jika tujuan utamanya adalah untuk membangun kekuatan pukulan, maka latihan teratur dengan samsak, teknik yang benar, dan kondisi fisik yang optimal adalah cara terbaik untuk mencapai hasil yang maksimal tanpa menimbulkan cedera yang tidak diinginkan.', '1aa7d5d8114b2f3d4f22914dae782452e515d2c90536c3b059cb4e9ef676ec72.jpg', '2025-02-10 07:42:22', '2025-02-10 07:47:07'),
(29, 2, 8, 'Cara Menjadi Bintang Vokalis Band yang Karismatik dan Profesional', 'cara-menjadi-bintang-vokalis-band-yang-karismatik-dan-profesional-by-bang.ganteng', 'Menjadi vokalis band yang sukses tidak hanya soal memiliki suara bagus, tetapi juga tentang karisma, teknik vokal yang kuat, dan kemampuan menghibur penonton. Seorang vokalis adalah wajah dari sebuah band, dan perannya sangat penting dalam membangun identitas serta daya tarik band tersebut. Jika kamu ingin menjadi vokalis yang bersinar di atas panggung dan diakui dalam industri musik, berikut adalah beberapa langkah penting yang bisa kamu lakukan.\r\n\r\n1. Kuasai Teknik Vokal dengan Latihan Rutin\r\nVokal yang kuat dan stabil adalah modal utama seorang vokalis. Latihan vokal secara rutin akan membantu meningkatkan jangkauan nada, kekuatan suara, serta kestabilan saat bernyanyi. Beberapa teknik dasar yang perlu dikuasai meliputi:\r\n\r\nPernapasan diafragma: Menggunakan pernapasan perut untuk mengontrol suara dengan lebih baik.\r\nResonansi suara: Melatih suara agar terdengar lebih bulat dan jelas.\r\nPitch control: Menjaga nada tetap stabil agar tidak fals.\r\nVibrato dan falsetto: Mempelajari teknik untuk menambah warna pada suara.\r\nKamu bisa mengikuti kursus vokal atau belajar dari tutorial online untuk memperdalam teknik ini.\r\n2. Temukan Karakter Suara yang Unik\r\nSetiap vokalis hebat memiliki ciri khas yang membuatnya mudah dikenali. Coba eksplorasi berbagai gaya bernyanyi hingga menemukan suara yang paling nyaman dan autentik untukmu. Apakah suaramu lebih cocok untuk genre rock, pop, jazz, metal, atau punk? Menemukan karakter suara yang unik akan membuat bandmu lebih mudah dikenali oleh pendengar.\r\n\r\n3. Perbanyak Pengalaman Bernyanyi di Depan Publik\r\nKepercayaan diri di atas panggung adalah kunci utama untuk menjadi vokalis yang karismatik. Mulailah dengan bernyanyi di acara kecil seperti acara sekolah, panggung komunitas, atau kompetisi menyanyi. Jika sudah terbiasa, coba tampil di acara yang lebih besar atau festival musik. Semakin sering kamu tampil, semakin baik kamu dalam mengatasi rasa gugup dan berinteraksi dengan audiens.\r\n\r\n4. Tingkatkan Kemampuan Berkomunikasi dan Interaksi dengan Penonton\r\nSeorang vokalis tidak hanya bernyanyi tetapi juga harus bisa membangun koneksi dengan penonton. Gunakan bahasa tubuh yang ekspresif, ajak penonton bernyanyi bersama, dan buat suasana panggung lebih hidup. Vokalis yang bisa menghidupkan energi penonton akan selalu diingat dan dihargai.\r\n\r\n5. Latihan Fisik untuk Stamina yang Kuat\r\nBernyanyi sambil bergerak di atas panggung membutuhkan stamina yang baik. Olahraga rutin seperti jogging, yoga, atau latihan pernapasan bisa membantu meningkatkan daya tahan tubuh. Hindari merokok dan konsumsi makanan yang bisa merusak kualitas suara, seperti makanan berminyak atau minuman bersoda sebelum tampil.\r\n\r\n6. Bangun Chemistry dengan Anggota Band\r\nSeorang vokalis harus bisa bekerja sama dengan anggota band lainnya. Komunikasi dan koordinasi yang baik antara vokalis, gitaris, bassist, drummer, dan keyboardist akan membuat penampilan lebih solid. Lakukan latihan rutin bersama band agar bisa saling memahami gaya musik masing-masing.\r\n\r\n7. Buat dan Rekam Lagu Sendiri\r\nJika ingin lebih dikenal, mulailah membuat lagu sendiri. Lagu orisinal bisa membangun identitas band dan menarik lebih banyak pendengar. Rekam demo atau single, lalu unggah ke platform musik seperti YouTube, Spotify, atau SoundCloud. Dengan strategi promosi yang baik, lagu yang kamu buat bisa mendapatkan banyak pendengar dan membuka peluang lebih besar dalam industri musik.\r\n\r\n8. Manfaatkan Media Sosial untuk Membangun Branding\r\nDi era digital, media sosial adalah alat yang sangat penting untuk membangun popularitas. Buat akun band di Instagram, TikTok, YouTube, dan Facebook untuk berbagi video latihan, cuplikan konser, atau interaksi dengan penggemar. Semakin aktif kamu di media sosial, semakin banyak orang yang akan mengenal bandmu.\r\n\r\n9. Ikut Kompetisi dan Cari Kesempatan Kolaborasi\r\nMengikuti ajang pencarian bakat atau festival musik bisa menjadi jalan pintas untuk mendapatkan eksposur lebih luas. Selain itu, coba jalin kolaborasi dengan musisi lain, baik dalam bentuk cover lagu bersama atau proyek musik baru. Kolaborasi bisa memperluas jaringan dan menarik pendengar dari berbagai kalangan.\r\n\r\n10. Jangan Mudah Menyerah dan Terus Berkembang\r\nMenjadi vokalis band yang sukses membutuhkan kerja keras dan kesabaran. Mungkin kamu akan menghadapi kegagalan atau kritik, tetapi jadikan itu sebagai motivasi untuk terus belajar dan berkembang. Tetap konsisten dalam berlatih, perbaiki kekurangan, dan terus eksplorasi gaya bernyanyi agar semakin baik dari waktu ke waktu.\r\n\r\nKesimpulan\r\nMenjadi bintang vokalis band bukan hanya soal suara bagus, tetapi juga tentang karakter, energi panggung, kerja sama tim, dan kemampuan membangun koneksi dengan penonton. Dengan latihan yang tekun, pengalaman tampil yang banyak, dan strategi promosi yang baik, kamu bisa menjadi vokalis yang diingat dan dicintai oleh banyak orang. Yang terpenting, nikmati setiap prosesnya dan tetap bersemangat dalam bermusik! 🎤🎶🔥', '448b48bd05137a76711a0a341bf034ceff2251e02942fa8e4c269ec13c357138.webp', '2025-02-10 22:42:32', '2025-02-10 22:45:18');
INSERT INTO `posts` (`id`, `user_id`, `category_id`, `title`, `slug`, `content`, `thumbnail`, `created_at`, `updated_at`) VALUES
(30, 5, 7, 'Cara Membuat Video yang Bagus dan Profesional', 'cara-membuat-video-yang-bagus-dan-profesional-by-miak.', 'Di era digital saat ini, video menjadi salah satu media paling populer untuk berbagi informasi, hiburan, dan promosi. Baik untuk keperluan konten YouTube, Instagram, TikTok, atau proyek profesional, kualitas video sangat menentukan apakah penonton akan tertarik atau tidak. Membuat video yang bagus tidak selalu memerlukan peralatan mahal, tetapi lebih kepada pemahaman teknik yang tepat. Berikut adalah panduan langkah demi langkah untuk membuat video yang menarik dan berkualitas.\r\n\r\n1. Tentukan Konsep dan Tujuan Video\r\nSebelum mulai merekam, tentukan terlebih dahulu tujuan video yang ingin dibuat. Apakah untuk hiburan, edukasi, vlog, promosi produk, atau film pendek? Dengan mengetahui konsepnya, kamu bisa menyusun skrip atau storyboard agar alur video lebih terstruktur dan tidak membingungkan penonton.\r\n\r\n2. Siapkan Peralatan yang Dibutuhkan\r\nKualitas video sangat dipengaruhi oleh peralatan yang digunakan. Berikut adalah beberapa peralatan dasar yang bisa meningkatkan hasil video:\r\n\r\nKamera: Bisa menggunakan kamera profesional, DSLR, mirrorless, atau bahkan kamera smartphone dengan resolusi tinggi.\r\nTripod atau Gimbal: Untuk menjaga kestabilan gambar dan menghindari video yang goyang.\r\nMikrofon Eksternal: Jika video memiliki dialog atau narasi, gunakan mikrofon eksternal agar suara lebih jernih dan bebas dari noise.\r\nLighting: Cahaya yang baik sangat berpengaruh pada kualitas video. Gunakan lampu tambahan atau manfaatkan pencahayaan alami.\r\n3. Perhatikan Komposisi dan Sudut Pengambilan Gambar\r\nUntuk menghasilkan video yang sinematik dan enak ditonton, gunakan teknik framing yang baik. Beberapa aturan komposisi yang bisa diterapkan antara lain:\r\n\r\nRule of Thirds: Bagi layar menjadi tiga bagian secara horizontal dan vertikal, lalu tempatkan objek utama di salah satu titik perpotongan garis.\r\nLeading Lines: Gunakan garis dalam komposisi untuk mengarahkan mata penonton ke subjek utama.\r\nDepth of Field: Gunakan efek blur di latar belakang (bokeh) untuk membuat subjek lebih menonjol.\r\n4. Gunakan Pencahayaan yang Tepat\r\nPencahayaan yang baik dapat meningkatkan kualitas visual video. Jika merekam di luar ruangan, manfaatkan cahaya matahari pada pagi atau sore hari untuk hasil yang lebih lembut. Jika merekam di dalam ruangan, gunakan ring light atau softbox agar pencahayaan lebih merata dan tidak overexposed.\r\n\r\n5. Perhatikan Kualitas Audio\r\nKualitas suara sering kali menjadi faktor yang membuat video terlihat profesional atau amatiran. Pastikan merekam di tempat yang minim kebisingan, gunakan mikrofon eksternal jika memungkinkan, dan pertimbangkan untuk menambahkan musik latar yang sesuai untuk menciptakan atmosfer yang lebih menarik.\r\n\r\n6. Gunakan Teknik Editing yang Menarik\r\nEditing adalah tahap yang sangat penting dalam proses pembuatan video. Gunakan software editing seperti Adobe Premiere Pro, Final Cut Pro, DaVinci Resolve, atau CapCut dan VN jika menggunakan smartphone. Beberapa hal yang perlu diperhatikan dalam editing:\r\n\r\nPotong bagian yang tidak perlu untuk menjaga durasi tetap efisien.\r\nTambahkan transisi yang halus agar pergerakan antar adegan lebih nyaman dilihat.\r\nGunakan color grading untuk memperbaiki warna agar tampilan lebih profesional.\r\nSisipkan musik dan efek suara yang sesuai untuk meningkatkan suasana video.\r\n7. Perhatikan Durasi Video\r\nDurasi video harus disesuaikan dengan platform yang digunakan dan minat audiens. Untuk konten di TikTok atau Instagram Reels, buat video yang singkat, padat, dan langsung ke inti. Jika untuk YouTube, video bisa lebih panjang dengan penyampaian yang detail, tetapi tetap menarik agar penonton tidak bosan.\r\n\r\n8. Gunakan Teks dan Grafik Jika Diperlukan\r\nTambahkan teks atau subtitle untuk memperjelas informasi, terutama jika audiens berasal dari berbagai negara atau jika video berisi dialog yang kurang jelas. Gunakan juga grafik atau animasi untuk memperjelas konsep yang sedang dijelaskan.\r\n\r\n9. Pastikan Video Berkualitas Tinggi Sebelum Dipublikasikan\r\nSebelum mengunggah video, pastikan resolusi dan formatnya sesuai dengan platform tujuan. Sebaiknya gunakan resolusi minimal 1080p (Full HD) atau 4K untuk hasil yang lebih tajam. Periksa kembali apakah ada kesalahan dalam editing, suara, atau pencahayaan sebelum diunggah.\r\n\r\n10. Promosikan dan Dapatkan Feedback\r\nSetelah video selesai dan diunggah, promosikan di berbagai platform agar bisa menjangkau lebih banyak orang. Mintalah feedback dari penonton untuk mengetahui apa yang bisa ditingkatkan dalam video berikutnya.\r\n\r\nKesimpulan\r\nMembuat video yang bagus membutuhkan kombinasi kreativitas, teknik yang tepat, dan sedikit latihan. Dengan perencanaan yang matang, peralatan yang memadai, pencahayaan yang baik, serta editing yang menarik, kamu bisa menghasilkan video berkualitas yang dapat dinikmati oleh banyak orang. Yang terpenting, terus eksplorasi dan berinovasi agar video yang kamu buat semakin menarik dan profesional. Selamat berkarya! 🎬🎥✨', 'b052d201dde98dce1ac09226d9ee24561b2cafb70e96075d5c1374cd4ddfd2f9.jpg', '2025-02-11 05:48:18', '2025-02-11 05:48:18'),
(31, 4, 15, 'Sejarah dan Legenda Roro Kidul: Penguasa Laut Selatan', 'sejarah-dan-legenda-roro-kidul-penguasa-laut-selatan-by-puncak_rantai_makanan', 'Roro Kidul, atau yang lebih dikenal sebagai Nyi Roro Kidul, adalah salah satu tokoh legenda paling terkenal di Indonesia, terutama di kalangan masyarakat Jawa dan Sunda. Ia dipercaya sebagai penguasa Laut Selatan (Samudra Hindia) yang memiliki kekuatan gaib dan sering dikaitkan dengan kerajaan-kerajaan di Jawa. Kisahnya berkembang dalam berbagai versi dari generasi ke generasi, menciptakan mitos yang kaya akan unsur mistis dan budaya.\r\n\r\nAsal Usul dan Legenda\r\nKisah asal-usul Nyi Roro Kidul memiliki berbagai versi, tergantung pada daerah dan sumber yang menceritakannya. Salah satu versi yang paling terkenal berasal dari Kerajaan Pajajaran. Dalam cerita ini, Nyi Roro Kidul dikisahkan sebagai seorang putri raja bernama Dewi Kadita, yang memiliki kecantikan luar biasa. Namun, akibat intrik dan kecemburuan di istana, ia dikutuk sehingga tubuhnya menjadi buruk rupa. Ia kemudian mengembara ke Laut Selatan, di mana ia membersihkan dirinya dan mendapatkan kembali kecantikannya, sekaligus memperoleh kekuatan gaib. Sejak saat itu, ia menjadi penguasa Laut Selatan.\r\n\r\nDalam versi lain, Nyi Roro Kidul dikaitkan dengan Kesultanan Mataram, terutama dengan Raja Panembahan Senopati, pendiri Mataram Islam. Konon, sang raja bertapa di pantai Laut Selatan dan mendapatkan restu dari Nyi Roro Kidul untuk memerintah tanah Jawa. Sejak saat itu, legenda menyebutkan bahwa raja-raja Mataram memiliki hubungan spiritual dengan Ratu Laut Selatan, yang konon akan selalu melindungi kerajaan mereka.\r\n\r\nPeran Mistis dan Kepercayaan Masyarakat\r\nNyi Roro Kidul dipercaya memiliki kekuatan supranatural yang sangat besar. Masyarakat pesisir Selatan Jawa sering mengaitkannya dengan fenomena alam di Samudra Hindia, seperti ombak besar dan badai yang dianggap sebagai bentuk kemarahannya. Oleh karena itu, banyak nelayan yang melakukan ritual atau sesajen sebelum melaut agar mendapatkan perlindungan dari sang Ratu Laut Selatan.\r\n\r\nSelain itu, ada kepercayaan bahwa Nyi Roro Kidul memiliki pasukan makhluk gaib dan istana megah di dasar laut. Banyak mitos yang mengatakan bahwa ia sering mencari manusia, terutama pria tampan, untuk dijadikan pengikutnya di kerajaan lautnya. Karena itulah, muncul larangan mengenakan pakaian berwarna hijau di sekitar Pantai Selatan, karena warna tersebut dipercaya sebagai warna favorit Nyi Roro Kidul, dan siapa pun yang mengenakannya bisa terseret ombak dan dibawa ke kerajaannya.\r\n\r\nTempat-Tempat yang Dikaitkan dengan Nyi Roro Kidul\r\nBeberapa tempat di Indonesia diyakini sebagai lokasi yang memiliki hubungan erat dengan legenda Nyi Roro Kidul, di antaranya:\r\n\r\nPantai Parangtritis (Yogyakarta) – Salah satu tempat paling terkenal yang dikaitkan dengan Nyi Roro Kidul. Banyak orang percaya bahwa pantai ini adalah gerbang menuju istana bawah lautnya.\r\nPelabuhan Ratu (Sukabumi, Jawa Barat) – Terdapat sebuah kamar khusus di Hotel Inna Samudra yang konon disediakan untuk Nyi Roro Kidul. Kamar ini dihiasi dengan warna hijau dan kerap dijadikan tempat meditasi oleh mereka yang percaya pada kekuatannya.\r\nPantai Karang Hawu (Sukabumi) – Konon, pantai ini adalah salah satu tempat favorit Nyi Roro Kidul untuk menampakkan diri.\r\nPengaruh Budaya dan Populer dalam Masyarakat\r\nLegenda Nyi Roro Kidul telah menginspirasi banyak karya seni, mulai dari lukisan, tari, film, hingga cerita rakyat yang masih diceritakan hingga kini. Di dunia seni lukis, sosoknya sering digambarkan sebagai wanita cantik berbusana hijau dengan mahkota emas. Dalam dunia perfilman, banyak film horor yang mengangkat kisahnya, memperkuat kesan mistis tentang sosoknya.\r\n\r\nKesimpulan\r\nNyi Roro Kidul bukan sekadar legenda, tetapi juga bagian dari kepercayaan dan budaya masyarakat Jawa serta Sunda. Kisahnya terus berkembang dan diwariskan dari generasi ke generasi, menjadikannya salah satu mitos yang paling hidup di Indonesia. Apakah ia benar-benar ada atau hanya sekadar cerita rakyat, hal ini tetap menjadi misteri yang menarik untuk terus ditelusuri. Yang pasti, legenda ini memperkaya warisan budaya Nusantara dan menjadi bagian dari identitas spiritual masyarakat pesisir Laut Selatan.', 'd0274c2e17fe5645d3628dc6c5118471075f80f4e5289bb880b863a4bcd6f8cd.jpg', '2025-02-11 20:48:37', '2025-02-11 20:48:37'),
(32, 7, 2, 'Olahraga yang Baik untuk Mengencangkan Otot', 'olahraga-yang-baik-untuk-mengencangkan-otot-by-chuck_norris', 'Memiliki otot yang kencang dan kuat bukan hanya soal penampilan, tetapi juga berpengaruh besar pada kesehatan tubuh secara keseluruhan. Otot yang terlatih dengan baik dapat meningkatkan metabolisme, memperbaiki postur tubuh, serta mengurangi risiko cedera dan penyakit seperti osteoporosis. Untuk mendapatkan otot yang lebih kencang, diperlukan kombinasi antara latihan kekuatan, latihan kardio, serta pola makan yang sehat. Berikut adalah beberapa jenis olahraga yang efektif untuk mengencangkan otot.\r\n\r\n1. Latihan Beban (Strength Training)\r\nLatihan beban adalah cara paling efektif untuk mengencangkan otot karena dapat merangsang pertumbuhan dan kekuatan otot. Beberapa latihan beban yang bisa dilakukan antara lain:\r\n\r\nSquat: Melatih otot paha, betis, dan bokong. Bisa dilakukan dengan atau tanpa beban.\r\nDeadlift: Fokus pada otot punggung bawah, paha belakang, dan gluteus (bokong).\r\nBench Press: Efektif untuk mengencangkan otot dada, bahu, dan trisep.\r\nShoulder Press: Membantu menguatkan bahu dan lengan atas.\r\nLatihan beban bisa dilakukan menggunakan dumbbell, barbell, kettlebell, atau mesin gym sesuai dengan kemampuan dan kebutuhan masing-masing.\r\n\r\n2. Latihan Tubuh Sendiri (Bodyweight Training)\r\nJika tidak memiliki akses ke alat gym, latihan tubuh sendiri juga bisa menjadi solusi yang efektif. Beberapa contoh latihan bodyweight yang dapat mengencangkan otot adalah:\r\n\r\nPush-up: Memperkuat otot dada, bahu, dan trisep.\r\nPlank: Latihan yang sangat baik untuk otot inti (core), terutama perut dan punggung bawah.\r\nLunges: Membantu mengencangkan otot paha dan bokong.\r\nDips: Melatih otot trisep dan bahu dengan menggunakan bangku atau alat lain yang tersedia.\r\nLatihan ini bisa dilakukan di rumah tanpa perlu peralatan tambahan, sehingga sangat praktis dan efisien.\r\n\r\n3. Latihan Kardio yang Mengencangkan Otot\r\nLatihan kardio tidak hanya membakar lemak, tetapi juga membantu mengencangkan otot jika dilakukan dengan cara yang tepat. Beberapa latihan kardio yang efektif antara lain:\r\n\r\nLari atau Sprint: Melatih otot kaki, terutama paha dan betis. Sprint lebih efektif dalam membentuk otot dibandingkan jogging biasa.\r\nBersepeda: Sangat baik untuk menguatkan otot kaki dan bokong.\r\nSkipping (Lompat Tali): Melatih otot kaki, betis, dan meningkatkan koordinasi tubuh.\r\nRowing (Mendayung): Melatih otot punggung, lengan, dan inti tubuh.\r\nLatihan kardio yang dikombinasikan dengan latihan kekuatan akan memberikan hasil optimal dalam mengencangkan otot.\r\n\r\n4. Yoga dan Pilates\r\nYoga dan Pilates sering kali dianggap hanya sebagai olahraga untuk fleksibilitas, tetapi sebenarnya juga sangat baik untuk mengencangkan otot. Beberapa gerakan yoga yang bisa membantu mengencangkan otot adalah:\r\n\r\nDownward Dog: Menguatkan otot lengan, bahu, dan kaki.\r\nWarrior Pose: Melatih kekuatan otot paha, bokong, dan inti tubuh.\r\nPlank Variations: Berbagai variasi plank dalam yoga sangat efektif untuk mengencangkan otot perut dan punggung.\r\nPilates juga memiliki berbagai latihan yang berfokus pada inti tubuh (core) dan membantu memperkuat serta mengencangkan otot tanpa memberikan tekanan berlebih pada sendi.\r\n\r\n5. High-Intensity Interval Training (HIIT)\r\nHIIT adalah latihan yang menggabungkan gerakan intens dalam waktu singkat dengan jeda istirahat singkat. Olahraga ini tidak hanya membakar lemak, tetapi juga mengencangkan otot karena banyak melibatkan latihan kekuatan. Contoh latihan HIIT yang bisa dilakukan adalah:\r\n\r\nBurpees: Menguatkan otot seluruh tubuh, terutama kaki, inti tubuh, dan lengan.\r\nMountain Climbers: Efektif untuk melatih otot perut dan kaki.\r\nJump Squats: Mengencangkan otot paha dan bokong dengan tambahan gerakan eksplosif.\r\nKettlebell Swings: Melatih kekuatan otot pinggul, paha, dan punggung.\r\nLatihan HIIT biasanya berlangsung selama 20-30 menit, tetapi memberikan efek pembakaran kalori yang berlangsung lebih lama setelah latihan.\r\n\r\nTips Tambahan untuk Mengencangkan Otot\r\nKonsumsi Protein yang Cukup – Protein adalah nutrisi utama untuk pembentukan otot. Pastikan asupan dari sumber seperti daging, ikan, telur, kacang-kacangan, atau susu.\r\nJaga Hidrasi – Air membantu dalam proses pemulihan otot dan menjaga elastisitasnya.\r\nIstirahat yang Cukup – Otot perlu waktu untuk pulih dan tumbuh. Jangan terlalu sering berlatih tanpa memberi waktu pemulihan.\r\nKombinasikan Latihan – Menggabungkan berbagai jenis latihan akan memberikan hasil yang lebih seimbang dan optimal.\r\nKonsistensi adalah Kunci – Latihan harus dilakukan secara rutin untuk mendapatkan hasil yang maksimal.\r\nKesimpulan\r\nMengencangkan otot tidak hanya sekadar soal penampilan, tetapi juga penting untuk kesehatan dan kebugaran tubuh. Kombinasi latihan kekuatan, kardio, serta yoga atau Pilates dapat membantu mencapai otot yang lebih kuat dan kencang. Yang terpenting adalah melakukannya dengan konsisten, menjaga pola makan yang sehat, serta memberi tubuh waktu untuk beristirahat dan pulih. Dengan latihan yang tepat, kamu bisa mendapatkan tubuh yang lebih bugar dan proporsional! 💪🔥', '792bfab2903f190791b0ce0b0cc7e2de3090c14426f2ad42df7e9ef69d70b0c4.webp', '2025-02-12 03:42:51', '2025-02-12 03:42:51');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('lQTMcpq50DzyjGPGZyKyC8gmWkbnllS0uPbJCGmX', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36 Edg/133.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoibkNvTFY3dUVWVDJ0TVNUdEdSakhPM1B5NU1mMUZuaUdXMW5XU25tZCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0MzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2lkL3BlbmphZ2EucGludHUvZWRpdCI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjEwOToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3Bvc3Qvc2hvdy9zZWphcmFoLWRhbi1sZWdlbmRhLXJvcm8ta2lkdWwtcGVuZ3Vhc2EtbGF1dC1zZWxhdGFuLWJ5LXB1bmNha19yYW50YWlfbWFrYW5hbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjU7fQ==', 1739425328),
('tDrckj1M89I9kOWEVdpuQpFJyzpXzrpR9ol8ROkZ', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36 Edg/133.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidzg4Sk5qRmF0d0pjUTQ1ZHRUb1hiTjdxQ1hRZXhnYllJYUYyV3RVciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wb3N0L3Nob3cvY2FyYS1tZW1idWF0LXZpZGVvLXlhbmctYmFndXMtZGFuLXByb2Zlc2lvbmFsLWJ5LW1pYWsuIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1739460860);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `bio` varchar(100) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `bio`, `profile_picture`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Master Pantun', 'master.pantun', 'admin@gmail.com', '$2y$12$PsWcZH4PbxMwrbE8EmcP6eqtMLdo.TkdRPMqCsjmwe/ZsrvxJUHB2', 'Saya si paling jago pantun', '2586877854adc45394272e36c3c6649bef708a0c23723936cd5160d129c9598b.png', NULL, NULL, NULL, '2025-02-08 00:45:05'),
(2, 'Bang Ganteng', 'bang.ganteng', 'bang.ganteng@gmail.com', '$2y$12$HZ4maBIanQ4.JXZHAj8eU.84SiJO0R7ABnicQHUMrbmvcxMWMAbTO', NULL, '97a29ce8ba5125be98a8185838a017921e52c83cfb2374a2b4a42223113febd6.jpeg', NULL, NULL, '2025-02-07 02:52:07', '2025-02-12 11:06:08'),
(3, 'Mr. Bean', 'mr.bean', 'mr.bean@gmail.com', '$2y$12$s.x3q7rsd6lyDUzEwjxjOO6rwvweSJ7zHzNDFEAccFQVJDs1ksemy', 'i am a professor', '8582b286da885a8345063fa921060b92de0d4ae397e843093cdb5dbd42a7dada.jpg', NULL, NULL, '2025-02-08 02:10:38', '2025-02-08 02:11:33'),
(4, 'Puncak Rantai Makanan', 'puncak_rantai_makanan', 'prmakanan@gmail.com', '$2y$12$yhzCF.3cKlPZ5rheZ6VuW.MOpye1a96mXEJbzYJDJP3QQvFm9PoTO', NULL, '3d05e37ad235a9344a58cff6675d3b6e77d115fbd93a5c1bcc29eae432535ed3.jpg', NULL, NULL, '2025-02-08 08:56:33', '2025-02-08 08:56:55'),
(5, 'Miya Khalifa', 'miak.', 'mia.k@gmail.com', '$2y$12$pJ2FK6Hx78y6prH2WlIxdeZ.9XBuN3R4NM/xKFNtkZncsCyA5tl8C', NULL, '1dedcec4b0e91e84af2d71f8b04b2bd83784936a9e8b3937f43189cb5561b27c.jpeg', NULL, NULL, '2025-02-08 10:44:50', '2025-02-08 10:45:16'),
(7, 'Chuck Norris', 'chuck_norris', 'chuck.norris@gmail.com', '$2y$12$fRqHHsu9zRC.b8QGYSiDN.RUZANxE1mxuQQepTIZ7uDFEc873DeI2', 'Saya anti kalah', '19c782f99a52bed41f6307402e5175c22fcb579921840ce129fb300a901f9fa9.jpg', NULL, NULL, '2025-02-10 07:33:54', '2025-02-10 07:34:28'),
(8, 'Maddog', 'maddog', 'maddog@gmail.com', '$2y$12$/sQFdB53W5XnpLG/aGZeCeilwsNNTY1hF9KfeLlQL04ATqXfSd/a.', 'Anti mati club', '22b686950863071e366bd23a99c157402f2998e8a1b2b588439f24cc6ca6e52e.jpg', NULL, NULL, '2025-02-12 03:47:54', '2025-02-12 03:50:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`post_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `follows`
--
ALTER TABLE `follows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `follows_follower_id_foreign` (`follower_id`),
  ADD KEY `follows_following_id_foreign` (`following_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_user_id_foreign` (`user_id`),
  ADD KEY `likes_post_id_foreign` (`post_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_user_id_foreign` (`user_id`),
  ADD KEY `notifications_source_users_id_foreign` (`source_users_id`),
  ADD KEY `notifications_post_id_foreign` (`post_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_user_id_foreign` (`user_id`),
  ADD KEY `posts_category_id_foreign` (`category_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `follows`
--
ALTER TABLE `follows`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `follows`
--
ALTER TABLE `follows`
  ADD CONSTRAINT `follows_follower_id_foreign` FOREIGN KEY (`follower_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `follows_following_id_foreign` FOREIGN KEY (`following_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `notifications_source_users_id_foreign` FOREIGN KEY (`source_users_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
