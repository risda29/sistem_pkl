-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2025 at 05:04 PM
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
-- Database: `bpstala`
--

-- --------------------------------------------------------

--
-- Table structure for table `interaktif`
--

CREATE TABLE `interaktif` (
  `id_interaktif` int(11) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `link_tree` varchar(255) NOT NULL,
  `gambar` mediumblob NOT NULL,
  `link_zoom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `interaktif`
--

INSERT INTO `interaktif` (`id_interaktif`, `deskripsi`, `link_tree`, `gambar`, `link_zoom`) VALUES
(4, 'Webinar', 'https://linktr.ee/stokastikk', 0x313734303039383137385f34376139666166633061343139643061383534372e6a7067, 'https://meet.google.com/pzi-qwmt-kev'),
(6, 'Webinar 2', 'https://linktr.ee/stokastikk', 0x313734303039393739355f62383130636533316466663238626630666365312e6a7067, 'https://meet.google.com/pzi-qwmt-kev');

-- --------------------------------------------------------

--
-- Table structure for table `karya`
--

CREATE TABLE `karya` (
  `id_karya` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `youtube_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karya`
--

INSERT INTO `karya` (`id_karya`, `judul`, `tanggal`, `youtube_link`) VALUES
(8, 'Indeks Pembangunan Manusia', '2025-01-08', 'https://youtu.be/TKYAbBij7o8?si=BdALTcuK2xZ85ocC'),
(9, 'Kemiskinan', '2025-01-22', 'https://youtu.be/QHhNEXeAjZQ?si=ljCmthHEan8lTwpi'),
(10, 'sdfghjkl', '2025-02-20', 'https://youtu.be/JRkdqdjQayA?si=8CcgA55-1sxyF4Nj'),
(11, 'oo', '2025-02-14', 'https://youtu.be/JRkdqdjQayA?si=8CcgA55-1sxyF4Nj');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `link_tree` varchar(255) NOT NULL,
  `artikel` text DEFAULT NULL,
  `gambar` mediumblob NOT NULL,
  `youtube_link` varchar(225) NOT NULL,
  `tugas_link` varchar(255) NOT NULL,
  `respon_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `judul`, `tanggal`, `link_tree`, `artikel`, `gambar`, `youtube_link`, `tugas_link`, `respon_link`) VALUES
(72, 'Public Speaking', '2025-03-11', 'https://linktr.ee/stokastikk', '<p>Public Speaking</p>\r\n', 0x313734313232353433315f38653165343632613366313538316365396165392e6a7067, 'https://youtu.be/TKYAbBij7o8?si=BdALTcuK2xZ85ocC', 'https://docs.google.com/forms/d/e/1FAIpQLSfadIc_-AGBycq4b2mwQ5ljxSjIBtlLe96mv77yLyaAHsCU2g/viewform?usp=sf_link', 'https://docs.google.com/spreadsheets/d/1u4uhCp33ScZUUOARX5gl0TzTk3vnekUqfjTZErzQ6Qw/edit?resourcekey=&gid=1547901134#gid=1547901134'),
(73, 'Dilema Lulusan Perguruan Tinggi dan Dunia kerja', '2025-03-18', 'https://linktr.ee/stokastikk', '<p>Dilema Lulusan Perguruan Tinggi dan Dunia kerja</p>\r\n', 0x313734313232353939315f61393233626664623565383062373865363064612e6a7067, 'https://youtu.be/TKYAbBij7o8?si=BdALTcuK2xZ85ocC', 'https://docs.google.com/forms/d/e/1FAIpQLSfadIc_-AGBycq4b2mwQ5ljxSjIBtlLe96mv77yLyaAHsCU2g/viewform?usp=sf_link', 'https://docs.google.com/spreadsheets/d/1u4uhCp33ScZUUOARX5gl0TzTk3vnekUqfjTZErzQ6Qw/edit?resourcekey=&gid=1547901134#gid=1547901134'),
(74, 'Public Speaking asdfghjkl', '2025-03-18', 'https://linktr.ee/stokastikk', '<p>b</p>\r\n', 0x313734313232383438355f61333637333636393436383136386436336333612e6a7067, 'https://youtu.be/TKYAbBij7o8?si=BdALTcuK2xZ85ocC', 'https://docs.google.com/forms/d/e/1FAIpQLSfadIc_-AGBycq4b2mwQ5ljxSjIBtlLe96mv77yLyaAHsCU2g/viewform?usp=sf_link', 'https://docs.google.com/spreadsheets/d/1u4uhCp33ScZUUOARX5gl0TzTk3vnekUqfjTZErzQ6Qw/edit?resourcekey=&gid=1547901134#gid=1547901134');

-- --------------------------------------------------------

--
-- Table structure for table `kuesioner`
--

CREATE TABLE `kuesioner` (
  `id_kuesioner` int(11) NOT NULL,
  `pertanyaan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kuesioner`
--

INSERT INTO `kuesioner` (`id_kuesioner`, `pertanyaan`) VALUES
(2, 'bagaimana pendapat anda terkait metode pembelajaran yang telah di pelajari?'),
(4, 'f');

-- --------------------------------------------------------

--
-- Table structure for table `kuesioner_user`
--

CREATE TABLE `kuesioner_user` (
  `id_kuesioner_user` int(11) NOT NULL,
  `id_kuesioner` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kuesioner_user`
--

INSERT INTO `kuesioner_user` (`id_kuesioner_user`, `id_kuesioner`, `id_user`, `point`) VALUES
(14, 2, 59, 0),
(15, 4, 59, 0),
(16, 2, 59, 0),
(17, 4, 59, 0);

-- --------------------------------------------------------

--
-- Table structure for table `status_baca`
--

CREATE TABLE `status_baca` (
  `id_status` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `id_story` int(11) DEFAULT NULL,
  `status` enum('belum terbaca','sudah terbaca') NOT NULL DEFAULT 'belum terbaca',
  `status_kelas` varchar(20) DEFAULT NULL,
  `waktu_baca` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status_baca`
--

INSERT INTO `status_baca` (`id_status`, `id_user`, `id_kelas`, `id_story`, `status`, `status_kelas`, `waktu_baca`) VALUES
(22, 59, NULL, 2, 'sudah terbaca', NULL, '2025-03-05 19:46:46'),
(23, 59, NULL, 3, 'sudah terbaca', NULL, '2025-03-05 19:47:24'),
(24, 59, 72, NULL, 'sudah terbaca', NULL, '2025-03-05 23:43:35');

-- --------------------------------------------------------

--
-- Table structure for table `story`
--

CREATE TABLE `story` (
  `id_story` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `link_tree` varchar(255) NOT NULL,
  `artikel` text DEFAULT NULL,
  `gambar` mediumblob NOT NULL,
  `youtube_link` varchar(255) NOT NULL,
  `tugas_link` varchar(255) NOT NULL,
  `respon_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `story`
--

INSERT INTO `story` (`id_story`, `judul`, `tanggal`, `link_tree`, `artikel`, `gambar`, `youtube_link`, `tugas_link`, `respon_link`) VALUES
(2, 'A DAY WITH DATA PART 2 | SEKTOR USAHA MENJANJIKAN ', '2025-02-21', 'https://linktr.ee/stokastikk', '<p><strong>Lorem ipsum</strong>&nbsp;is a&nbsp;<strong>placeholder or dummy text used in typesetting and graphic design for previewing layouts</strong>. It features scrambled Latin text, which emphasizes the design over content of the layout. It is the standard placeholder text of the printing and publishing industries. It does not have any meaningful content and is often used to fill spaces in design mockups.</p>\r\n', 0x6865726f2d62672e6a7067, 'https://youtube.com/shorts/zn3NkcRCO-Q?si=LsgTuFFC41QFHxHp', 'https://docs.google.com/forms/d/e/1FAIpQLSfadIc_-AGBycq4b2mwQ5ljxSjIBtlLe96mv77yLyaAHsCU2g/viewform?usp=sf_link', 'https://docs.google.com/spreadsheets/d/1u4uhCp33ScZUUOARX5gl0TzTk3vnekUqfjTZErzQ6Qw/edit?resourcekey=&gid=1547901134#gid=1547901134'),
(3, 'TALA PEDIA PART 1 | KENAL INFLASI YUK ', '2025-01-30', 'https://linktr.ee/stokastikk', '<p><strong>Lorem ipsum</strong>&nbsp;is a&nbsp;<strong>placeholder or dummy text used in typesetting and graphic design for previewing layouts</strong>. It features scrambled Latin text, which emphasizes the design over content of the layout. It is the standard placeholder text of the printing and publishing industries. It does not have any meaningful content and is often used to fill spaces in design mockups.</p>\r\n', 0x6865726f2d62675f312e6a7067, 'https://youtube.com/shorts/oD7pR7SSBHM?si=fm8y_ngqW61iqKeU', 'https://docs.google.com/forms/d/e/1FAIpQLSfadIc_-AGBycq4b2mwQ5ljxSjIBtlLe96mv77yLyaAHsCU2g/viewform?usp=sf_link', 'https://docs.google.com/spreadsheets/d/1u4uhCp33ScZUUOARX5gl0TzTk3vnekUqfjTZErzQ6Qw/edit?resourcekey=&gid=1547901134#gid=1547901134'),
(4, 'BPS TALA LIVE DATA KEMISKINAN DAN IPM', '2025-02-12', 'https://linktr.ee/stokastikk', '<p><strong>Lorem ipsum</strong>&nbsp;is a&nbsp;<strong>placeholder or dummy text used in typesetting and graphic design for previewing layouts</strong>. It features scrambled Latin text, which emphasizes the design over content of the layout. It is the standard placeholder text of the printing and publishing industries. It does not have any meaningful content and is often used to fill spaces in design mockups.</p>\r\n', 0x6865726f2d62675f322e6a7067, 'https://youtube.com/shorts/-BG17IT0Bqg?si=4Q3c5Qcx3iIRQ89d', 'https://docs.google.com/forms/d/e/1FAIpQLSfadIc_-AGBycq4b2mwQ5ljxSjIBtlLe96mv77yLyaAHsCU2g/viewform?usp=sf_link', 'https://docs.google.com/spreadsheets/d/1u4uhCp33ScZUUOARX5gl0TzTk3vnekUqfjTZErzQ6Qw/edit?resourcekey=&gid=1547901134#gid=1547901134'),
(5, 'Inflasi Part 2 | Makin kenal inflasi, makin bijak belanja ', '2025-02-20', 'https://linktr.ee/stokastikk', '<p><strong>Lorem ipsum</strong>&nbsp;is a&nbsp;<strong>placeholder or dummy text used in typesetting and graphic design for previewing layouts</strong>. It features scrambled Latin text, which emphasizes the design over content of the layout. It is the standard placeholder text of the printing and publishing industries. It does not have any meaningful content and is often used to fill spaces in design mockups.</p>\r\n', 0x313734303031383232345f64373033313864316331653438386562663832362e6a7067, 'https://youtube.com/shorts/G4QbZqvjNz0?si=z3YN-wmaAoR9-dbn', 'https://docs.google.com/forms/d/e/1FAIpQLSfadIc_-AGBycq4b2mwQ5ljxSjIBtlLe96mv77yLyaAHsCU2g/viewform?usp=sf_link', 'https://docs.google.com/spreadsheets/d/1u4uhCp33ScZUUOARX5gl0TzTk3vnekUqfjTZErzQ6Qw/edit?resourcekey=&gid=1547901134#gid=1547901134');

-- --------------------------------------------------------

--
-- Table structure for table `tentangkami`
--

CREATE TABLE `tentangkami` (
  `id_tentang` int(11) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `ttl` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kabupaten` varchar(255) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `pekerjaan` enum('Pelajar','Mahasiswa','ASN/PNS','Pegawai/Karyawan Swasta','Ibu Rumah Tangga','Lainnya') NOT NULL,
  `instansi` varchar(255) NOT NULL,
  `bidang` varchar(255) NOT NULL,
  `ikutikelas` enum('ya','tidak') NOT NULL,
  `manfaat` varchar(255) NOT NULL,
  `reset_token` varchar(6) DEFAULT NULL,
  `token_expiry` int(11) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_at` timestamp NULL DEFAULT current_timestamp(),
  `leveluser` enum('Admin','Pengguna') NOT NULL,
  `status` enum('Setujui','Tolak','Menunggu') NOT NULL DEFAULT 'Menunggu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `nama`, `ttl`, `alamat`, `kabupaten`, `provinsi`, `telepon`, `pekerjaan`, `instansi`, `bidang`, `ikutikelas`, `manfaat`, `reset_token`, `token_expiry`, `create_at`, `update_at`, `leveluser`, `status`) VALUES
(23, 'anisa', '$2y$10$RE2sA2Yaoi5t/yyHMAwmGu4noazvl9wnhO8TQFe6Ua5G04Sz2wEh2', 'anisarrramaaa@gmail.com', 'Annisa Ramadhani', '0000-00-00', 'Jl.Katunun, Rt/Rw 003, Kec.Pelaihari', 'Tanah Laut', 'Kalimantan Selatan', '088804514167', 'Mahasiswa', 'Politeknik Negeri Tanah Laut', 'Teknologi Informasi', 'ya', 'Menambah Pengetahuan terkait data', NULL, NULL, '2025-02-08 06:33:27', '2025-01-08 00:27:21', 'Admin', 'Setujui'),
(56, 'syifa', '$2y$10$MXZFBtY1kCdBvbZDieMKNOQvcWNgeMRiZGAkMTKqmgvq9n7wNVrie', 'saghniarahma@gmail.com', 'Syifa', '0000-00-00', 'Angsau', 'Tanah laut', 'Kalimantan Selatan', '0888925261', 'ASN/PNS', 'BPS Tanah Laut', 'Divisi Distribusi', 'ya', 'Meningkatkan ilmu Pengetahuan', NULL, NULL, '2025-02-20 13:44:54', '2025-02-19 23:33:13', 'Pengguna', 'Setujui'),
(59, 'sekar', '$2y$10$Z8IB8cm8r5JaSa4cTMLRROj70j65UUWz7dvgdvd3NqXk5NZLHZxoG', 'slaras99@gmail.com', 'Sekar Mustikaning Laras', '0000-00-00', 'Pelaihari', 'Tanah Laut', 'Kalimanta Selatan', '081328173156', 'ASN/PNS', 'Badan Pusat Statistik', 'Neraca', 'ya', 'Menambah Keterampilan dan Pengetahuan', NULL, NULL, '2025-02-21 00:54:16', '2025-02-20 16:54:16', 'Pengguna', 'Setujui'),
(60, 'jali', '$2y$10$gvgYVUD/4yEPN7udEadjy.N.4tRq0W6rJQei3qRQE/nVm8lsowKje', 'jali@gmail.com', 'jali', '0000-00-00', 'Matah', 'tanah_bumbu', 'kalimantan-selatan', '090099', 'ASN/PNS', 'Politeknik Negeri Tanah laut', 'Komputer Jaringan', 'tidak', '', NULL, NULL, '2025-02-26 23:04:17', '2025-02-26 23:04:17', 'Pengguna', 'Menunggu'),
(61, 'ali', '$2y$10$va6RtmobWNlg/5kkAZxSdOIOnCKj7a/UCLvSogNrRY4.nBdPg31oi', 'ali@gmail.com', 'ali', '0000-00-00', 'matah', 'banjar', 'kalimantan-selatan', '0889911', 'Ibu Rumah Tangga', 'Politeknik Negeri Tanah laut', 'Teknologi Informasi', 'ya', 'Menambah Skill dan pengetahuan', NULL, NULL, '2025-02-26 23:09:07', '2025-02-26 23:09:07', 'Pengguna', 'Menunggu'),
(62, 'yuli', '$2y$10$pYmo3NTxheKZxEPF7xnV9eci4uFP.5QWj6HGa65GzCrXt5iN/jep2', 'yuli@gmail.com', 'yuli', '0000-00-00', 'pelaihari', 'tanah_laut', 'kalimantan-selatan', '089544097856', 'Ibu Rumah Tangga', 'politala', 'teknologi informasi', 'tidak', '', NULL, NULL, '2025-02-27 07:58:10', '2025-02-26 23:58:10', 'Pengguna', 'Tolak'),
(63, 'iukkkkk', '$2y$10$tT/lGGV0nkUMCV.ac.ZOeuYkt9LBhtY2ObG2PfJ3L6G.3AUwVQXtm', 'uiiii@gmail.com', 'iukkkkk', '2025-03-05', 'pelaihari', 'tanah_laut', 'kalimantan-selatan', '90998900099', '', 'politala', 'teknologi informasi', 'ya', 'l', NULL, NULL, '2025-03-04 18:00:36', '2025-03-04 18:00:36', 'Pengguna', 'Menunggu'),
(65, 'iyulll', '$2y$10$Q4Q6AcmdTs6KjiKGPN7jA..H9DgDmk/SfQcNtcK9NB2llaj2Of4Yu', 'iyulll@gmail.com', 'iyulll', '2025-03-05', 'pelaihari', 'tanah_laut', 'kalimantan-selatan', '0975899788', 'Lainnya', 'politala', 'teknologi informasi', 'ya', 'slebewwww', NULL, NULL, '2025-03-04 18:05:50', '2025-03-04 18:05:50', 'Pengguna', 'Menunggu');

-- --------------------------------------------------------

--
-- Table structure for table `visimisi`
--

CREATE TABLE `visimisi` (
  `idvisimisi` int(11) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `struktur` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visimisi`
--

INSERT INTO `visimisi` (`idvisimisi`, `visi`, `misi`, `struktur`) VALUES
(1, '<p><strong>Lorem ipsum</strong>&nbsp;is a&nbsp;<strong>placeholder or dummy text used in typesetting and graphic design for previewing layouts</strong>. It features scrambled Latin text, which emphasizes the design over content of the layout. It is the standard placeholder text of the printing and publishing industries. It does not have any meaningful content and is often used to fill spaces in design mockups.</p>\r\n', '<p><strong>Lorem ipsum</strong>&nbsp;is a&nbsp;<strong>placeholder or dummy text used in typesetting and graphic design for previewing layouts</strong>. It features scrambled Latin text, which emphasizes the design over content of the layout. It is the standard placeholder text of the printing and publishing industries. It does not have any meaningful content and is often used to fill spaces in design mockups.</p>\r\n', 0x313730333939383937335f65643438326162316432373835633830343131342e706e67);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `interaktif`
--
ALTER TABLE `interaktif`
  ADD PRIMARY KEY (`id_interaktif`);

--
-- Indexes for table `karya`
--
ALTER TABLE `karya`
  ADD PRIMARY KEY (`id_karya`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `kuesioner`
--
ALTER TABLE `kuesioner`
  ADD PRIMARY KEY (`id_kuesioner`);

--
-- Indexes for table `kuesioner_user`
--
ALTER TABLE `kuesioner_user`
  ADD PRIMARY KEY (`id_kuesioner_user`),
  ADD KEY `id_kuesioner` (`id_kuesioner`);

--
-- Indexes for table `status_baca`
--
ALTER TABLE `status_baca`
  ADD PRIMARY KEY (`id_status`),
  ADD KEY `id_user` (`id_user`,`id_kelas`,`id_story`),
  ADD KEY `id_story` (`id_story`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_user_2` (`id_user`);

--
-- Indexes for table `story`
--
ALTER TABLE `story`
  ADD PRIMARY KEY (`id_story`);

--
-- Indexes for table `tentangkami`
--
ALTER TABLE `tentangkami`
  ADD PRIMARY KEY (`id_tentang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `visimisi`
--
ALTER TABLE `visimisi`
  ADD PRIMARY KEY (`idvisimisi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `interaktif`
--
ALTER TABLE `interaktif`
  MODIFY `id_interaktif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `karya`
--
ALTER TABLE `karya`
  MODIFY `id_karya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `kuesioner`
--
ALTER TABLE `kuesioner`
  MODIFY `id_kuesioner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kuesioner_user`
--
ALTER TABLE `kuesioner_user`
  MODIFY `id_kuesioner_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `status_baca`
--
ALTER TABLE `status_baca`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `story`
--
ALTER TABLE `story`
  MODIFY `id_story` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tentangkami`
--
ALTER TABLE `tentangkami`
  MODIFY `id_tentang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `visimisi`
--
ALTER TABLE `visimisi`
  MODIFY `idvisimisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `status_baca`
--
ALTER TABLE `status_baca`
  ADD CONSTRAINT `status_baca_ibfk_1` FOREIGN KEY (`id_story`) REFERENCES `story` (`id_story`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `status_baca_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
