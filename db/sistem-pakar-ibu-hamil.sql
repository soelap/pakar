-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Apr 2020 pada 11.24
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem-pakar-ibu-hamil`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE `gejala` (
  `Kode_Gejala` varchar(50) NOT NULL,
  `Nama_Gejala` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gejala`
--

INSERT INTO `gejala` (`Kode_Gejala`, `Nama_Gejala`) VALUES
('G001', 'Memiliki usia kandungan < 20 minggu'),
('G002', 'Muntah'),
('G003', 'Memiliki usia kandungan > 20 minggu'),
('G004', 'Mual'),
('G005', 'Perdarahan'),
('G006', 'Perut tidak bertambah besar bahkan mengecil'),
('G007', 'Dehidrasi'),
('G008', 'Pertambahan berat badan yang berlebih'),
('G009', 'Sakit kepala bagian frontal'),
('G010', 'Penglihatan kabur'),
('G011', 'Berat badan turun'),
('G012', 'Mata cekung'),
('G013', 'Suhu badan meningkat'),
('G014', 'Tekanan darah menurun'),
('G015', 'Mules'),
('G016', 'Adanya kontraksi uterus'),
('G017', 'Kenaikan tekanan darah 149/90'),
('G018', 'Edema (bengkak) kaki, jari tangan dan muka'),
('G019', 'Tekanan darah 160/110'),
('G020', 'jumlah urin kurang dari 500 cc per 24 jam'),
('G021', 'Kejang-kejang'),
('G022', 'Mengalami pre-eklamsia berat'),
('G023', 'Mengalami ketidaksadaran (koma)'),
('G024', 'Mata terpaku dan terbuka tapi tidak melihat'),
('G025', 'Tangan bergetar'),
('G026', 'Keluar ludah berbusa dan lidah tergigit'),
('G027', 'Tangan menggenggam dan membengkok ke dalam'),
('G028', 'Ibu tidak merasakan gerakan janin'),
('G029', 'Gerakan janin berkurang'),
('G030', 'Perut keras dan sakit seperti ingin melahirkan'),
('G031', 'Tinggi fundus lebih rendah dari seharusnya'),
('G032', 'Nafsu makan berkurang'),
('G033', 'Lidah kotor'),
('G034', 'Nadi meningkat, frekuensi sekitar 100 kali/menit'),
('G035', 'Tampak lemah dan lemas'),
('G036', 'Lidah kering dan kotor'),
('G037', 'Muntah bercampur darah'),
('G038', 'Muntah berhenti'),
('G039', 'Kesadaran menurun'),
('G040', 'Keadaan umum lebih parah'),
('G041', 'Nadi melemah'),
('G042', 'Rahim tidak sesuai dengan usia kehamilan'),
('G043', 'Tangan bergetar dan berkeringat'),
('G044', 'Kulit lembab'),
('G045', 'Pembengkakan pada kaki dan tungkai'),
('G046', 'Muka dan badan terlihat pucat kekuning-kuningan'),
('G047', 'Keluar jaringan mola, seperti anggur / mata ikan'),
('G048', 'Rasa sakit dan nyeri pada perut bagian bawah'),
('G049', 'Sakit pada bahu'),
('G050', 'Nyeri payudara'),
('G051', 'Kram pada satu sisi pinggul'),
('G052', 'Mules sedikit atau tidak sama sekali'),
('G053', 'Uterus membesar, sebesar usia kehamilan'),
('G054', 'Serviks membuka'),
('G055', 'Tes kehamilan positif'),
('G056', 'Buah kehamilan masih didalam uterus'),
('G057', 'Ketuban masih utuh dan dapat menonjol'),
('G058', 'Perdarahan banyak dan menyebabkan syok'),
('G059', 'Perdarahan tidak berhenti'),
('G060', 'Perdarahan sedikit'),
('G061', 'Gejala kehamilan menghilang'),
('G062', 'Payudara agak mengecil'),
('G063', 'Tes kehamilian menjadi negative'),
('G064', 'Denyut jantung janin menghilang'),
('G065', 'Mengeluarkan banyak lendir dari vagina'),
('G066', 'Pernah mengalami keguguran sebelumnya'),
('G067', 'Ketuban menonjol dan pecah'),
('G068', 'Panas'),
('G069', 'Perdarahan berbau'),
('G070', 'Uterus membesar, lembek dan nyeri tekan'),
('G071', 'Demam tinggi'),
('G072', 'Tekanan darah meninggi'),
('G073', 'Menggigil'),
('G074', 'Serviks membesar'),
('G075', 'Diatas ostium uteri ekstrenum teraba');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `Kode_Pasien` varchar(50) NOT NULL,
  `Nama_Pasien` varchar(50) NOT NULL,
  `Alamat_Pasien` varchar(50) NOT NULL,
  `No_Telepon` varchar(50) NOT NULL,
  `Kehamilan_Ke` int(5) NOT NULL,
  `Nama_Suami` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyakit`
--

CREATE TABLE `penyakit` (
  `Kode_Penyakit` varchar(50) NOT NULL,
  `Nama_Penyakit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyakit`
--

INSERT INTO `penyakit` (`Kode_Penyakit`, `Nama_Penyakit`) VALUES
('P001', 'Hiperemesis Gravidarium Tingkat I'),
('P002', 'Hiperemesis Gravidarium Tingkat II'),
('P003', 'Hiperemesis Gravidarium Tingkat III'),
('P004', 'Pre-eklamsia ringan'),
('P005 ', 'Pre-eklamsia berat'),
('P006', 'Eklamsia'),
('P007 ', 'Kematian janin dalam kandungan'),
('P008', 'Mola Hidatidosa'),
('P009', 'Kehamilan Ektopik'),
('P010', 'Abortus Imminens'),
('P011', 'Abortus Insipiens'),
('P012', 'Abortus inkomplit'),
('P013', 'Abortus komplit'),
('P014', 'Abortus tertunda'),
('P015', 'Abortus habitualis'),
('P016 ', 'Abortus Infeksiosa'),
('P017', 'Abortus Servikalis');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`Kode_Gejala`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`Kode_Pasien`);

--
-- Indeks untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`Kode_Penyakit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
