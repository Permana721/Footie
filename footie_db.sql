-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jun 2024 pada 09.37
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `footie_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_foto` varchar(255) NOT NULL,
  `komentar` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `comments`
--

INSERT INTO `comments` (`id`, `product_id`, `user_id`, `user_name`, `user_foto`, `komentar`, `created_at`, `updated_at`) VALUES
(24, 16, 10, 'Permana', '20240311_kopi-turki.jpg', 'enak ini sih', '2024-03-11 08:21:58', '2024-03-11 23:12:22'),
(25, 16, 11, 'Permana', '20240314_piko.jpg', 'P', '2024-03-14 00:40:34', '2024-03-14 00:40:34'),
(26, 18, 10, 'Permana', '20240311_kopi-turki.jpg', 'Enak sih ini', '2024-03-14 23:09:29', '2024-03-14 23:09:46'),
(27, 19, 10, 'Permana', '20240616_20240408_4.png', 'haloo', '2024-06-16 06:17:53', '2024-06-16 06:17:53');

-- --------------------------------------------------------
model_has_permissionsusers
--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `likes`
--

INSERT INTO `likes` (`id`, `product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(66, 16, 11, '2024-03-14 00:48:15', '2024-03-14 00:48:15'),
(68, 16, 9, '2024-03-14 00:50:23', '2024-03-14 00:50:23'),
(69, 18, 9, '2024-03-14 02:15:31', '2024-03-14 02:15:31'),
(80, 21, 10, '2024-06-16 03:02:34', '2024-06-16 03:02:34'),
(81, 30, 10, '2024-06-16 04:55:49', '2024-06-16 04:55:49'),
(82, 18, 10, '2024-06-16 07:19:29', '2024-06-16 07:19:29'),
(83, 16, 10, '2024-06-16 07:39:02', '2024-06-16 07:39:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(17, '2014_10_12_000000_create_users_table', 1),
(18, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(19, '2014_10_12_100000_create_password_resets_table', 1),
(20, '2019_08_19_000000_create_failed_jobs_table', 1),
(21, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(22, '2024_02_03_055100_products', 1),
(23, '2024_03_08_081715_comments', 1),
(24, '2024_03_08_081733_likes', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sku` varchar(255) NOT NULL,
  `nama_product` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `deskripsi` varchar(2550) NOT NULL,
  `category` varchar(255) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `alamat_penjual` varchar(255) NOT NULL,
  `halal` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `discount` double NOT NULL,
  `foto` varchar(255) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `sku`, `nama_product`, `link`, `deskripsi`, `category`, `tipe`, `alamat_penjual`, `halal`, `harga`, `discount`, `foto`, `is_active`, `created_at`, `updated_at`) VALUES
(16, 'BRG32873', 'Bigul Pak Malen Babi Guling Frozen', 'https://tokopedia.link/woCkCvjhtKb', 'Paket Pak MALEN 175 Gram\r\n- Babi putih/ babi rica\r\n- Babi goreng\r\n- Kulit\r\n- Sate babi\r\n- Lawar\r\n- Sambal kuning\r\n- Sambal embe\r\n- Krupuk rambak', 'indonesia', 'makanan', 'Jakarta Utara', 'haram', '120,000', 0.1, '20240311_bigul.jpg', 1, '2024-03-11 07:36:16', '2024-06-16 01:47:51'),
(18, 'BRG95861', 'Anggur Merah Premium', 'https://tokopedia.link/GpDQBXEhtKb', 'Orang Tua Anggur Premium 620 ml\r\nCountry : Indonesia\r\nType : Anggur\r\nAbs : 35%\r\nBarang dijamin 100% ORIGINAL dan RESMI (BUKAN BM)', 'indonesia', 'minuman', 'Jakarta Utara', 'haram', '287,000', 0.1, '20240314_amer.jpg', 1, '2024-03-14 02:15:16', '2024-06-16 01:53:07'),
(19, 'BRG84996', 'Teh Hijau Japan Ocha Jepang', 'https://tokopedia.link/BJ7UKMUhtKb', 'Harada Green Tea 100gr 2gr x 50bags 100% Premium Green Tea Made in Japan Dijamin kenikmatan ocha/teh hijau yg original dengan Harada Green Tea ini', 'japan', 'minuman', 'Jakarta Utara', 'halal', '87,500', 0.1, '20240314_ocha.jpg', 1, '2024-03-14 10:00:47', '2024-06-16 01:56:36'),
(20, 'BRG90080', 'Dimsum Hemat Mini isi 100pcs', 'https://tokopedia.link/SHJXsA4htKb', 'Dimsum Small Mini isi 100 pcs per pack, sudah termasuk saus merah (dapat 2 pack ukuran 300gram)\r\n\r\nberat per dimsum antara 17-18 gram/pcs sudah termasuk saos merah', 'chinese', 'makanan', 'Kota Depok', 'halal', '100,000', 0.1, '20240314_dimsum.jpg', 1, '2024-03-14 10:01:16', '2024-06-16 02:00:04'),
(21, 'BRG29679', 'KIMCHI SAWI FRESH (1 KG)', 'https://tokopedia.link/HRk3SOtmtKb', 'Ready Stock..!!!\r\n\r\nKIMCHI SAWI FRESH PLAZA KOREA\r\nNetto. 1kg\r\n\r\nPIRT : 2043174018007-24', 'korean', 'makanan', 'Jakarta Barat', 'halal', '59,000', 0.1, '20240616_kimchi.jpg', 1, '2024-06-16 03:02:07', '2024-06-16 03:02:07'),
(22, 'BRG41342', '1 Liter Kombucha Tea Original', 'https://tokopedia.link/eNCKqANmtKb', 'Buat kamu yang butuh IMUN BOOSTER di masa pandemi ini, kombucha cocok loh buat bantu membentuk imun tubuh kamu karena kombucha mengandung probiotik / bakteri baik. Juga senyawa baik yang terkandung dalam teh alami yang berfungsi sebagai ANTIOKSIDAN tinggi.', 'korean', 'minuman', 'Kota Bandung', 'halal', '45,000', 0.1, '20240616_kombucha.jpg', 1, '2024-06-16 03:05:35', '2024-06-16 03:05:35'),
(23, 'BRG88396', 'Toppoki Rice Cake / 1 Kg', 'https://tokopedia.link/4T5rV2dntKb', 'Korean Street Food yang berbahan dasar Beras tahan di suhu ruang / pengiriman 5-6 hari di wadah kedap udara, selalu fresh karena produksi setiap hari, dijamin 💯 Halalan Thayyiban.\r\nUkuran berat 1000 gr (1 Kg)', 'korean', 'makanan', 'Kota Depok', 'halal', '26,000', 0.1, '20240616_toppoki.jpg', 1, '2024-06-16 03:11:17', '2024-06-16 03:11:17'),
(24, 'BRG39709', 'Bajigur hanjuang kantong isi 40 pcs', 'https://tokopedia.link/IFtMortntKb', 'minuman tradisional Priangan di olah dari bahan alami dan pilihan .tidak mengandung bahan pengawet sangat berkhasiat bagi tubuh.exp masih lama dan barang paling baru', 'indonesia', 'minuman', 'Kab. Bandung Barat', 'halal', '67,000', 0.1, '20240616_bajigur.jpg', 1, '2024-06-16 03:14:25', '2024-06-16 03:14:25'),
(25, 'BRG63757', 'Kang Kebab Mini Frozen 10 pcs', 'https://tokopedia.link/cm6CsZCntKb', 'Daging yang kami pakai merupakan Daging dengan bumbu Kebab Authentic Turki, tidak seperti kebanyakan Kebab Frozen yang menggunakan Sosis ataupun Ham\r\n\r\nGARANSI KIRIM 3 HARI\r\nKami memastikan produk tetap fresh dan aman dikonsumsi 3 hari setelah paket dikirim, kerusakan selama 3 hari tersebut kami tanggung 100% uang kembali. Mohon PASTIKAN pengiriman ke kota mu umumnya memakan waktu maksimal 3 hari.\r\n\r\nPengiriman Sameday dan Nextday dapat disimpan kembali hingga 1 bulan di dalam freezer.', 'middle', 'makanan', 'Kab. Bekasi', 'halal', '15,990', 0.1, '20240616_kang-kebab.jpg', 1, '2024-06-16 03:17:19', '2024-06-16 03:17:19'),
(26, 'BRG47318', 'Samyang Hot Chicken Ramen Original Buldak Carbonara Cheese Xtra hot - Hot Chicken', 'https://tokopedia.link/pBJZePQntKb', 'HALAL\r\nTersedia 6 rasa\r\nhot chicken 4/24\r\nbuldak jajang 6/24\r\ncarbonara 6/24\r\ncheese 4/24', 'korean', 'makanan', 'Kota Tanggerang', 'halal', '28,500', 0.1, '20240616_ramen.jpg', 1, '2024-06-16 03:20:16', '2024-06-16 03:20:16'),
(27, 'BRG32235', 'RISOLES FROZEN Risol Rogut Ayam RISOLES CAP PANDA isi 6 PCS', 'https://tokopedia.link/2jeujg3ntKb', 'DESKRIPSI PRODUK RISOLES CAP PANDA\r\nVarian : RISOLES ROGUT AYAM (potongan ayam melimpah, creamy dari susu asli, lengkap dengan potongan sayuran dan rempah)\r\nJumlah : 1 pack isi 6 pcs besar\r\nCita rasa : Creamy didalam renyah diluar. Menggunakan tepung panir klasik, tipis tetapi tetap renyah. Kulit risoles produksi sendiri menggunakan susu dan telur sehingga lembut dan wangi. Isian dijamin kualitasnya menggunakan ayam, susu dan sayuran. Wangi dan lezat.', 'indonesia', 'makanan', 'Jakarta Selatan', 'halal', '38,000', 0.1, '20240616_Risol.jpg', 1, '2024-06-16 03:23:00', '2024-06-16 03:23:00'),
(28, 'BRG66672', 'Geli Food Seblak Ceker Tanpa Tulang Super Pedas 180gr', 'https://tokopedia.link/9rflxofotKb', 'Ceker ayam pilihan yang disajikan tanpa tulang ini bikin pengalaman makan ceker kamu se-effortless itu! Gurihnya ceker yang dipadukan dengan sensasi pedas nikmat dari sambel ijonya bakal siap memanjakan lidah kamu deh!', 'indonesia', 'makanan', 'Kab. Garut', 'halal', '25,000', 0.1, '20240616_Seblak.jpg', 1, '2024-06-16 03:24:57', '2024-06-16 03:24:57'),
(29, 'BRG19777', 'LEKKER PREMIUM MANIS & ASIN CRISPY', 'https://tokopedia.link/8FHwl98otKb', '1. Kami produksi fresh setiap orderan yang masuk. Pesanan akan diproses secepatnya.\r\n2. Untuk pengiriman SameDay, sangat disarankan memesan minimal 4 pax agar mendapatkan FREE KARDUS.\r\n3. Harga yang tertera di atas adalah harga per bungkus/pax (1pax = 5 pcs leker).\r\n4. Kue Leker kami tahan 5-10 hari dari hari produksi, di packaging sudah ada tanggal best before.\r\n5. Setelah membuka harap disimpan di toples yang tertutup rapat.\r\n6. Setiap pengiriman sudah mendapatkan free bubble wrap.', 'indonesia', 'makanan', 'Jakarta Barat', 'halal', '41,600', 0.1, '20240616_Leker.jpg', 1, '2024-06-16 03:40:04', '2024-06-16 03:40:04'),
(30, 'BRG12122', 'Gehel Mie Lidi 200gr', 'https://tokopedia.link/r5zk449rtKb', 'Mie Lidi merupakan cemilan yang banyak disukai semua usia terutama remaja😍,bisa dijadiin teman gabut,temen nonton,dan sangat reccomended untuk cemilan sambil nongkrong bareng temen🥳\r\nMie Lidi Gehel dengan bumbu super gurih dan nempel dijamin bikin ketagihan 🤤\r\nPilihan Rasa :\r\n- Pedas\r\n- Asin\r\n- Extra Pedas\r\n- Jagung Bakar\r\n- Balado\r\n-Pedas Jeruk', 'indonesia', 'makanan', 'Kab. Tasikmalaya', 'halal', '13,680', 0.1, '20240616_Mie-lidi.jpg', 1, '2024-06-16 04:20:08', '2024-06-16 04:20:08'),
(31, 'BRG86248', 'PEMPEK PALEMBANG', 'https://tokopedia.link/i9SZniostKb', 'Pempek Mily Pempek Autentik Khas Palembang terbuat dari ikan tenggiri dan menggunakan bahan-bahan yang berkualitas. Dilengkapi dengan cuko kental yg rasanyaa pedas asam manis, rasa asli palembaaang bangeeeet!!', 'indonesia', 'makanan', 'Kota Bandung', 'halal', '37,000', 0.1, '20240616_pempekk2.jpg', 1, '2024-06-16 04:26:55', '2024-06-16 04:33:11'),
(32, 'BRG63736', 'Gehel Basreng 200gr', 'https://tokopedia.link/AyevWFhttKb', 'Basreng super enak sangat cocok untuk kamu yang suka makanan pedas.Gak suka pedas?tenang,kamu bisa pilih varian lainnya,disini ada dua varian rasa:\r\n-Pedas Jeruk\r\n-Ori Jeruk\r\nSemua produk ready stok yaa,jadi gaperlu nunggu lama😍', 'indonesia', 'makanan', 'Kab. Tasikmalaya', 'halal', '14,220', 0.1, '20240616_Basreng.jpg', 1, '2024-06-16 04:35:38', '2024-06-16 04:54:00'),
(33, 'BRG22530', 'Bakso Warisan Ibu Daging Sapi Urat isi 10 buah', 'https://tokopedia.link/NDJ6MazttKb', 'Homemade Bakso Sapi Urat\r\n1 PACK : 10 PCS\r\nProduksi setiap hari\r\n100% Halal - NO MSG & Pengawet\r\n✅ Sudah dapat bumbu kaldu kuah. 1 sachet bisa untuk air 700ml.\r\n✅ Kandungan daging 80% lebih banyak dibandingkan toko lain\r\n✅ Sangat aman dikonsumsi bahkan untuk anak-anak sekalipun karena NO Pengawet, NO Pewarna, NO MSG.\r\n✅ Cocok sebagai bekal sekolah / sarapan anak. Bisa diolah sesuai selera : sop bakso, campuran sayur-sayuran, topping mie, nasi goreng, capcay, dll.\r\n✅ Bakso dalam kemasan vakum. Aman dan higenis. (tanpa kemasan vakum, bakteri mikroba cepat bertumbuh. jangan salah beli!)\r\n✅ Masa konsumsi 5 bulan dengan penyimpanan di freezer sejak barang diterima (EXP date tertera di kemasan vakum)\r\n✅ Bakso dalam keadaan beku\r\n✅ Garansi produk fresh sampai tujuan!\r\n✅ 100.000 Review dan Testimonial Puas dari pelanggan', 'indonesia', 'makanan', 'Jakarta Barat', 'halal', '62,000', 0.1, '20240616_Bakso.jpg', 1, '2024-06-16 04:39:51', '2024-06-16 04:39:51'),
(34, 'BRG25920', 'Martabak telor frozen siap goreng 10pcs - bakso pedas', 'https://tokopedia.link/LgrOF0PttKb', 'Martabak telur isi telur ayam cincang dan bakso pedaa dijual frozen siap goreng isi 10pcs+bonus 1pcs\r\nenak gurih dan bikin kenyang', 'indonesia', 'makanan', 'Jakarta Timur', 'halal', '15,000', 0.1, '20240616_Martel.jpg', 1, '2024-06-16 04:42:31', '2024-06-16 04:42:31'),
(35, 'BRG35259', 'Lumpia Basah Semarang *BESAR*', 'https://tokopedia.link/0rxsMHWttKb', '*LUMPIA ASLI SEMARANG YANG HADIR DI JAKARTA DENGAN BUMBU BUMBU YANG ASLI LANGSUNG DARI SEMARANG\r\nIsi :\r\n-Kulit Lumpia (Diambil langsung dari Semarang)\r\n-Rebung (Diambil langsung dari Semarang)\r\n-Ayam\r\n-Udang\r\n-Telur\r\n\r\nTermasuk :\r\n-Saos/Bubur\r\n-Cabai Rawit\r\n-Daun Bawang\r\n-acar', 'indonesia', 'makanan', 'Jakarta Selatan', 'halal', '14,500', 0.1, '20240616_Lumpia.jpg', 1, '2024-06-16 04:44:52', '2024-06-16 04:44:52'),
(36, 'BRG76916', 'Latiao Family Snack', 'https://tokopedia.link/rJ4vWwautKb', 'Wulama Gluten Spicy Tofu Latiao adalah adalah Cemilan yang berasal dari China.\r\nTerbuat dari Tepung Beras sangat populer di China dan juga telah menyebar ke negara-negara lain.\r\nRasanya sedikit mirip dendeng, Enak dan Asik dimakan sebagai cemilan saat senggang atau penundaan lapar.', 'chinese', 'makanan', 'Kab. Tanggerang', 'halal', '12,500', 0.1, '20240616_Latiao.jpg', 1, '2024-06-16 04:48:39', '2024-06-16 04:48:39'),
(37, 'BRG47994', 'Nanao French Papiro', 'https://tokopedia.link/dGX5kVSxtKb', 'French Papillo : adalah salah satu biskuit klasik era Showa, dengan adonan renyah yang diisi krim lembut dan manis\r\n\r\nSejak dirilis pada tahun 1962, produk ini merupakan produk laris yang terus digandrungi.\r\nGulungan adonan yang harum diisi dengan krim lembut dan manis. Ini adalah camilan standar dengan rasa yang sederhana dan tekstur yang renyah. Teksturnya yang renyah dan krim yang cukup manis menyebar di mulut, menambah warna waktu santai Anda.\r\nItu dibungkus secara individual satu per satu.', 'japan', 'makanan', 'Jakarta Selatan', 'haram', '41,000', 0.1, '20240616_Nanao.jpg', 1, '2024-06-16 05:40:24', '2024-06-16 05:40:50'),
(38, 'BRG91699', 'Permen Planet Gummy', 'https://tokopedia.link/mATntU6xtKb', 'Permen lunak jeli bentuk bola isi selai rasa buah di dalamnya. Permen bisa di telan', 'korean', 'makanan', 'Kota Tanggerang Selatan', 'halal', '1,600', 0.1, '20240616_Permen.jpg', 1, '2024-06-16 05:43:36', '2024-06-16 05:43:36'),
(39, 'BRG42107', 'Kue Lapis Spikoe', 'https://tokopedia.link/LTSk4brytKb', 'Spikoe Legit Batik Pandan adalah 2in1 Cake, Perpaduan antara Kue lapis surabaya/spikoe batik pandan dengan lapis legit original yang unik. 2 kue sekali gigit. Lembutnya lapis surabaya dapat, moistnya lapis legit juga dapat. Huenak. 👍', 'indonesia', 'makanan', 'Kota Surabaya', 'halal', '88,500', 0.1, '20240616_Kue-lapis.jpg', 1, '2024-06-16 05:48:09', '2024-06-16 05:48:09'),
(40, 'BRG19741', 'Brownies Amanda Original', 'https://tokopedia.link/ZCUt0gGytKb', 'Brownies Amanda Original / Brownies Kukus Original Khas Bandung\r\n\r\nOleh oleh khas bandung diolah dengan bahan bahan pilihan dengan rasa bolu yang menakjubkan dehingga tidak mudah dilupakan rasanya', 'indonesia', 'makanan', 'Kota Bandung', 'halal', '48,900', 0.1, '20240616_Brownies.jpg', 1, '2024-06-16 05:50:56', '2024-06-16 05:50:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` int(11) NOT NULL DEFAULT 1,
  `is_mamber` tinyint(4) NOT NULL DEFAULT 1,
  `foto` varchar(255) NOT NULL DEFAULT 'default.png',
  `tlp` varchar(255) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `jenis_kelamin` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_admin`, `is_mamber`, `foto`, `tlp`, `is_active`, `jenis_kelamin`, `role`, `created_at`, `updated_at`) VALUES
(9, 'A Azka', 'azka@gdriveme.id', NULL, '$2y$12$wLG7szM.7HJHbwjMWY1/HeQ1kbg6xJ1/6.byqgPQi/7y2HmLUGlFK', 0, 1, '20240616_1.png', '082317204718', 1, 'laki-laki', 1, '2024-03-11 07:57:49', '2024-06-16 06:03:43'),
(10, 'Permana', 'sdharma721@gmail.com', NULL, '$2y$12$CRnGV6/NHff7NHD1upbxT.kPTcMFM3OtcIlJfxN.MiO0tQrtyU8Ye', 1, 0, '20240616_20240408_4.png', '082317204718', 1, 'laki-laki', 1, '2024-03-11 08:09:18', '2024-06-16 06:03:55'),
(11, 'Alvino', 'alvino@gmail.com', NULL, '$2y$12$uQm87NIUqDum6N.V7brz4uGLkl2q/JSk2/xFYmTI5SIvl8W2.Ep56', 0, 1, '20240616_3.png', '082317204718', 1, 'laki-laki', 1, '2024-03-14 00:36:42', '2024-06-16 01:42:27'),
(12, 'Ijul', 'ijul@gmail.com', NULL, '$2y$12$uv23THE6tPdiyYM3duLs7eofJnCo92RfoAadueq3kjrOFHS7omOSO', 0, 1, '20240616_2.png', '082317204718', 1, 'laki-laki', 1, '2024-03-14 23:10:44', '2024-06-16 01:42:16'),
(13, 'Admin', 'admin@gmail.com', NULL, '$2y$12$yimzrLeYZ/pHFxcqk8PV8OazdFwUXe.XFG0/HXMjLTG3xL8Ung61K', 1, 0, '20240616_user (1).png', '082317204718', 1, 'Non Binary', 1, '2024-06-16 01:43:34', '2024-06-16 03:33:37'),
(14, 'User', 'user@gmail.com', NULL, '$2y$12$cxQYB4vh9Y0DqMTTMdrI6uyIpN55ye1703HRAOTEatI7BT5.EJOUm', 1, 0, '20240616_user.png', '082317204718', 1, 'Non Binary', 2, '2024-06-16 03:27:02', '2024-06-16 03:27:02');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_product_id_foreign` (`product_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_product_id_foreign` (`product_id`),
  ADD KEY `likes_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
usersusersusersusersfailed_jobs