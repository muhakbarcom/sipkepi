-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Agu 2022 pada 00.35
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipkepi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'Pegawai', 'Pegawai'),
(6, 'Human Resource', 'HR');

-- --------------------------------------------------------

--
-- Struktur dari tabel `groups_menu`
--

CREATE TABLE `groups_menu` (
  `id_groups` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `groups_menu`
--

INSERT INTO `groups_menu` (`id_groups`, `id_menu`) VALUES
(1, 8),
(1, 89),
(1, 42),
(1, 43),
(1, 44),
(1, 40),
(1, 95),
(5, 95),
(1, 96),
(5, 96),
(1, 100),
(5, 100),
(1, 101),
(5, 101),
(1, 102),
(5, 102),
(1, 104),
(5, 104),
(1, 105),
(5, 105),
(1, 106),
(5, 106),
(1, 107),
(5, 107),
(1, 4),
(2, 4),
(3, 4),
(5, 4),
(1, 109),
(0, 112),
(2, 111),
(6, 111),
(2, 110),
(6, 110),
(2, 92),
(6, 92),
(1, 1),
(2, 1),
(6, 1),
(1, 3),
(2, 3),
(6, 3),
(2, 113),
(6, 108);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobdesk`
--

CREATE TABLE `jobdesk` (
  `id_jobdesk` int(11) NOT NULL,
  `nama_jobdesk` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `tanggal_dibuat` date NOT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `masa_tenggat` date NOT NULL,
  `file` text NOT NULL,
  `komentar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jobdesk`
--

INSERT INTO `jobdesk` (`id_jobdesk`, `nama_jobdesk`, `status`, `tanggal_dibuat`, `tanggal_selesai`, `masa_tenggat`, `file`, `komentar`) VALUES
(23, 'mengatur sistem informasi', 0, '2022-07-30', NULL, '2022-07-30', '', NULL),
(24, 'mengatur sistem informasi', 1, '2022-08-15', '2022-08-15', '2022-08-30', 'PENGUMUMAN_UTS_Ganjil3.pdf', NULL),
(25, 'Memeriksa pengeluaran barang di Gedung ITDRI', 1, '2022-09-15', '2022-08-15', '2022-09-30', 'boardingpass.pdf', NULL),
(26, 'mengatur sistem informasi', 1, '2022-09-15', '2022-08-15', '2022-09-30', 'JADWAL_UAS_GANJIL_2021_2022.pdf', 'di bagian Bab 3 pada sistem Excel ada yang bermasalah tolong di cek lagi'),
(27, 'asdsadsad', 1, '2022-10-15', '2022-08-15', '2022-06-21', '', NULL),
(28, 'Mendata untuk Pemasukan perbulan', 1, '2022-06-15', '2022-08-15', '2022-06-01', '', NULL),
(29, 'Mendata untuk Pemasukan perbulan', 1, '2022-05-15', '2022-08-15', '2022-09-09', '', NULL),
(30, 'Memeriksa pengeluaran barang di Gedung ITDRI', 1, '2022-04-15', '2022-08-15', '2022-06-23', '', NULL),
(31, 'mengerjain uno', 1, '2022-03-15', '2022-08-15', '2022-09-01', 'Tugas_ke_04_PW2_21930111.pdf', 'mantap'),
(32, 'SPRINT 40 Mengindentifikasi E-commerce', 0, '2022-09-24', NULL, '2022-09-30', '', NULL),
(33, 'SPRINT 41 Mengidentifikasi Laporan', 1, '2022-09-24', '2022-08-24', '2022-10-31', 'BAB_VI.docx', 'Ada kesalahan di bagian Pengecekan anggotaan'),
(34, 'SPRINT 42 Mengidentifikasi Laporan Autientifikasi', 1, '2022-08-24', '2022-08-24', '2022-09-30', 'BAB_VI1.docx', 'asdasasasasdas'),
(35, 'SPRINT 40 Mengindentifikasi E-commerce', 1, '2022-08-24', '2022-08-24', '2022-10-30', 'BAB_VI2.docx', 'di bagian IV adayang kurang. tolong di perbaikin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobdesk_pegawai`
--

CREATE TABLE `jobdesk_pegawai` (
  `id` int(11) NOT NULL,
  `id_jobdesk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jobdesk_pegawai`
--

INSERT INTO `jobdesk_pegawai` (`id`, `id_jobdesk`, `id_user`) VALUES
(49, 23, 18),
(50, 24, 18),
(51, 24, 15),
(52, 24, 13),
(53, 25, 19),
(54, 25, 18),
(55, 25, 16),
(56, 26, 18),
(57, 26, 17),
(58, 26, 15),
(59, 27, 18),
(60, 27, 17),
(61, 27, 13),
(62, 28, 19),
(63, 28, 18),
(64, 28, 16),
(65, 29, 17),
(66, 29, 16),
(67, 30, 18),
(68, 31, 18),
(69, 31, 17),
(70, 31, 13),
(71, 32, 18),
(72, 32, 16),
(73, 32, 15),
(74, 33, 18),
(75, 33, 17),
(76, 33, 15),
(77, 34, 18),
(78, 34, 17),
(79, 34, 15),
(80, 35, 18),
(81, 35, 16),
(82, 35, 15);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `laporan_jobdesk`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `laporan_jobdesk` (
`tanggal` varchar(7)
,`js` bigint(21)
,`jbs` bigint(21)
,`jml` bigint(22)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT 99,
  `level` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `icon` varchar(125) NOT NULL,
  `label` varchar(25) NOT NULL,
  `link` varchar(125) NOT NULL,
  `id` varchar(25) NOT NULL DEFAULT '#',
  `id_menu_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `sort`, `level`, `parent_id`, `icon`, `label`, `link`, `id`, `id_menu_type`) VALUES
(1, 0, 1, 0, 'empty', 'MAIN NAVIGATION', '#', '#', 1),
(3, 1, 2, 1, 'fas fa-tachometer-alt', 'Dashboard', 'dashboard', '#', 1),
(4, 15, 3, 40, 'fas fa-table', 'CRUD Generator', 'crudbuilder', '1', 1),
(8, 13, 3, 40, 'fas fa-bars', 'Menu', 'cms/menu/side-menu', 'navMenu', 1),
(40, 10, 2, 112, 'empty', 'DEV', '#', '#', 1),
(42, 6, 1, 0, 'fas fa-users-cog', 'User', '#', '1', 1),
(43, 7, 2, 42, 'fas fa-angle-double-right', 'Users', 'users', '1', 1),
(44, 8, 2, 42, 'fas fa-angle-double-right', 'Groups', 'groups', '2', 1),
(89, 14, 3, 40, 'fas fa-th-list', 'Menu Type', 'menu_type', 'menu_type', 1),
(92, 3, 1, 0, 'empty', 'MASTER DATA', '#', 'masterdata', 1),
(107, 11, 3, 40, 'fas fa-cog', 'Setting', 'setting', 'setting', 1),
(108, 4, 2, 92, 'fab fa-phoenix-framework', 'Kelola jobdesk', 'jobdesk', '#', 1),
(109, 12, 3, 40, 'fas fa-align-justify', 'Frontend Menu', 'frontend_menu', 'Frontend Menu', 1),
(110, 5, 2, 92, 'fas fa-book', 'Kelola penilaian', 'Penilaian', '#', 1),
(111, 2, 2, 1, 'fas fa-file-code', 'Kelola laporan', 'Laporan', '#', 1),
(112, 9, 1, 0, 'fas fa-allergies', 'hidden', '#', '#', 1),
(113, 1, 2, 1, 'fab fa-replyd', 'Jobdesk', 'jobdesk/pegawai', '#', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_type`
--

CREATE TABLE `menu_type` (
  `id_menu_type` int(11) NOT NULL,
  `type` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `menu_type`
--

INSERT INTO `menu_type` (`id_menu_type`, `type`) VALUES
(1, 'Side menu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `id_jobdesk` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `tanggal_penilaian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_jobdesk`, `nilai`, `tanggal_penilaian`) VALUES
(6, 24, 80, '2022-08-16'),
(7, 30, 80, '2022-08-16'),
(8, 28, 90, '2022-08-16'),
(9, 33, 88, '2022-08-24'),
(10, 34, 80, '2022-08-24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nilai` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`id`, `kode`, `nama`, `nilai`) VALUES
(1, 'default1.png', 'Sipkepi', 'www.sipkepi.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `image` varchar(128) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `password`, `email`, `active`, `first_name`, `last_name`, `phone`, `image`) VALUES
(1, '$2y$08$B5Vmtuynwx0s6EqHO5/.WOt/LBq/RDZt3XbOhi1/7.cSbdRc.WKpe', 'admin@muhakbar.com', 1, 'Akbar', 'Admin', '2132132', 'akbr_pp_2.jpg'),
(2, '$2y$08$ipVAkJ.rjy35wARE9Px47eS2k.gz2FPYy14M019VFwLtBcUax2YJS', 'member@member.com', 1, 'Member', 'Apps', '0909090', 'default.jpg'),
(10, '$2y$08$VOexYeVPbaUJxo8LQV9J8euGsLys3nV1n9J5WIzUmFy7mLtlMVyRG', 'coba@gmail.com', 1, 'coba', '1', '123', 'default.jpg'),
(11, '$2y$08$dOmjAzvDIdZqqrQ8cywKMeDXAR.5SecJZc.Bp4NwpJzFURP.mr9PG', 'xx@xx.com', 1, 'x', 'AKBAR', '077788778', 'Web_capture_9-6-2022_163744_web_whatsapp_com.jpg'),
(12, '$2y$08$G81gOQLOmtzGf6Wymo1L8OnKg4yg2JhZhqblEEpwQpw0KtMpGGNzG', 'admin@gmail.com', 1, 'admin', 'sipkepi', '082283433641', 'default.jpg'),
(13, '$2y$08$5W6HoE/9qocvSph2ACYVSumXFqU8lh4iBSRnbMJDanHB5Vq0gRDzS', 'pegawai@gmail.com', 1, 'pegawai', 'sipkepi', '6282283433641', 'default.jpg'),
(14, '$2y$08$Mr5BMBfvmIVq9S7s6HitSOxYTyAAB57Lgv9B1TUoyPODF7qIVRzVe', 'hr@gmail.com', 1, 'hr', 'sipkepi', '082283433641', 'default.jpg'),
(15, '$2y$08$pgJaU.5FjmLBh.WPEOmFVugLZjRHlgDQ5SjSUhOxo7PtmhLwVhLuO', 'genta@gmail.com', 1, 'genta', 'somantri', '0821312312321', 'default.jpg'),
(16, '$2y$08$OK7J6vkSfFYrzrJ0wUvJg.EsSAJGtoWF0cWJ88WL431k7qStoX2ti', 'fajar@gmail.com', 1, 'fajar', 'pengabdian', '0865221231664', 'default.jpg'),
(17, '$2y$08$0D93g4Nr8Q3B4mpA.Ub6wuDBYJZuPyKpZ7mVqRoKWloCZK6NABHVO', 'akbar@gmail.com', 1, 'akbar', 'wicaksono', '098765432112', 'default.jpg'),
(18, '$2y$08$hYHAwZtjVgMubHEf.UpJheUVcb53KdwTf2dyP9o54slPs2miHrRvi', 'arya@gmail.com', 1, 'arya', 'prayoga', '0879564312342', 'default.jpg'),
(19, '$2y$08$wXqjnFto51Oeev9y0EksTuZuH770E3PqdsOV2b3Lkya4N4Gr/BLK.', 'mubassiran@gmail.com', 1, 'basir', 'siran', '082124268742', 'default.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(3, 1, 1),
(31, 2, 2),
(32, 10, 1),
(35, 11, 2),
(36, 12, 1),
(37, 13, 2),
(38, 14, 6),
(39, 15, 2),
(40, 16, 2),
(41, 17, 2),
(42, 18, 2),
(43, 19, 2);

-- --------------------------------------------------------

--
-- Struktur untuk view `laporan_jobdesk`
--
DROP TABLE IF EXISTS `laporan_jobdesk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `laporan_jobdesk`  AS SELECT date_format(`jobdesk`.`tanggal_dibuat`,'%Y-%m') AS `tanggal`, (select count(0) from `jobdesk` where `jobdesk`.`status` = 1 and date_format(`jobdesk`.`tanggal_dibuat`,'%Y-%m') = `tanggal`) AS `js`, (select count(0) from `jobdesk` where `jobdesk`.`status` = 0 and date_format(`jobdesk`.`tanggal_dibuat`,'%Y-%m') = `tanggal`) AS `jbs`, (select `js` + `jbs`) AS `jml` FROM `jobdesk` ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jobdesk`
--
ALTER TABLE `jobdesk`
  ADD PRIMARY KEY (`id_jobdesk`);

--
-- Indeks untuk tabel `jobdesk_pegawai`
--
ALTER TABLE `jobdesk_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `menu_type`
--
ALTER TABLE `menu_type`
  ADD PRIMARY KEY (`id_menu_type`);

--
-- Indeks untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`);

--
-- Indeks untuk tabel `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `jobdesk`
--
ALTER TABLE `jobdesk`
  MODIFY `id_jobdesk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `jobdesk_pegawai`
--
ALTER TABLE `jobdesk_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT untuk tabel `menu_type`
--
ALTER TABLE `menu_type`
  MODIFY `id_menu_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
