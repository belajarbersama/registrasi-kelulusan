-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2016 at 09:04 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pa`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_insert_pendaftaran` (IN `v_id_buku_tamu` VARCHAR(16), IN `v_nama` VARCHAR(50), IN `v_alamat` TEXT, IN `v_no_hp` VARCHAR(13), IN `v_email` VARCHAR(100), IN `v_asal` VARCHAR(50))  BEGIN
	DECLARE v_no_pendaftaran VARCHAR(20);
	
	SET v_no_pendaftaran = no_pendaftaran();
    SET v_no_pendaftaran = v_no_pendaftaran;

	INSERT INTO buku_tamu VALUES (v_id_buku_tamu,v_nama,v_alamat,v_no_hp,v_email,v_asal);
	INSERT INTO akun VALUES (v_email,md5(v_no_hp),'Pendaftar','Proses',v_email);
	INSERT INTO formulir VALUES (v_no_pendaftaran,CURDATE(),YEAR(CURDATE()),'Proses',v_email);
	INSERT INTO ket_siswa (no_hp,no_pendaftaran) VALUES (v_no_hp,v_no_pendaftaran);
END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `no_pendaftaran` () RETURNS VARCHAR(20) CHARSET latin1 BEGIN
	DECLARE v_total INT;
	DECLARE v_no_pendaftaran VARCHAR(20);
	DECLARE v_temp INT;
	DECLARE v_tahun VARCHAR(4);

	SELECT COUNT(no_pendaftaran) INTO v_total FROM formulir;
	SELECT YEAR(CURDATE()) INTO v_tahun FROM dual;

	IF v_total >=0 AND v_total <10 THEN
		SET v_temp = v_total +1;
		SET v_no_pendaftaran = CONCAT(v_tahun,'000000',v_temp);
	ELSEIF v_total >9 AND v_total <100 THEN
		SET v_temp = v_total + 1;
		SET v_no_pendaftaran = CONCAT(v_tahun,'00000',v_temp);
	ELSEIF v_total >99 AND v_total <1000 THEN
		SET v_temp = v_total + 1;
		SET v_no_pendaftaran = CONCAT(v_tahun,'0000',v_temp);
	END IF;
	RETURN v_no_pendaftaran;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `privilege` enum('Pendaftar','Orang Tua','Panitia','Tata Usaha Bagian Keuangan','Tata Usaha Bagian Kesiswaan','Operator','Kepala Sekolah') DEFAULT NULL,
  `status` enum('Aktif','Tidak_Aktif','Proses') DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`username`, `password`, `privilege`, `status`, `email`) VALUES
('andry@gmail.com', 'a53d7130310331a6e897425e0306d387', 'Kepala Sekolah', 'Aktif', 'andry@gmail.com'),
('ani@gmail.com', 'a53d7130310331a6e897425e0306d387', 'Operator', 'Aktif', 'ani@gmail.com'),
('budiono@detik.com', 'a53d7130310331a6e897425e0306d387', 'Orang Tua', 'Aktif', 'budiono@detik.com'),
('devi@gmail.com', 'a53d7130310331a6e897425e0306d387', 'Tata Usaha Bagian Kesiswaan', 'Aktif', 'devi@gmail.com'),
('hanifildzah.g@gmail.com', 'a53d7130310331a6e897425e0306d387', 'Pendaftar', 'Proses', 'hanifildzah.g@gmail.com'),
('hanifildzah.ghassani@gmail.com', 'a53d7130310331a6e897425e0306d387', 'Panitia', 'Aktif', 'hanifildzah.ghassani@gmail.com'),
('octaviani@gmail.com', 'a53d7130310331a6e897425e0306d387', 'Tata Usaha Bagian Keuangan', 'Aktif', 'octaviani@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `asal_mula`
--

CREATE TABLE `asal_mula` (
  `asal_anak` enum('PG','TK','RA','PAUD','Lainnya') DEFAULT NULL,
  `nama_asal` varchar(50) DEFAULT NULL,
  `no_tahun_sk` varchar(50) DEFAULT NULL,
  `lama_belajar` int(11) DEFAULT NULL,
  `tgl_terima` date DEFAULT NULL,
  `no_pendaftaran` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asal_mula`
--

INSERT INTO `asal_mula` (`asal_anak`, `nama_asal`, `no_tahun_sk`, `lama_belajar`, `tgl_terima`, `no_pendaftaran`) VALUES
('RA', 'RA Telkom', '2011', 2, '2016-04-04', '20160000001');

-- --------------------------------------------------------

--
-- Table structure for table `buku_tamu`
--

CREATE TABLE `buku_tamu` (
  `id_buku_tamu` varchar(16) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` text,
  `no_hp` varchar(13) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `asal` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku_tamu`
--

INSERT INTO `buku_tamu` (`id_buku_tamu`, `nama`, `alamat`, `no_hp`, `email`, `asal`) VALUES
('7301072505930001', 'Budiono Darsono', 'Jalan Ganesha', '081322361256', 'idgmaleo@gmail.com', 'Kota Bandung');

-- --------------------------------------------------------

--
-- Table structure for table `dokumen_daftar_ulang`
--

CREATE TABLE `dokumen_daftar_ulang` (
  `no_pendaftaran` varchar(20) NOT NULL,
  `nama_akta` varchar(100) DEFAULT NULL,
  `akta_kelahiran` blob,
  `nama_ktp` varchar(100) DEFAULT NULL,
  `ktp` blob,
  `nama_kk` varchar(100) DEFAULT NULL,
  `kk` blob,
  `nama_sk` varchar(100) DEFAULT NULL,
  `surat_keterangan` blob,
  `nama_foto` varchar(100) DEFAULT NULL,
  `foto` blob,
  `status` enum('Sudah','Belum') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `formulir`
--

CREATE TABLE `formulir` (
  `no_pendaftaran` varchar(20) NOT NULL,
  `tgl` date DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `status` enum('Terima','Tidak','Waiting List','Proses') DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `formulir`
--

INSERT INTO `formulir` (`no_pendaftaran`, `tgl`, `tahun`, `status`, `email`) VALUES
('20160000001', '2016-04-25', '2016', 'Proses', 'hanifildzah.g@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_daftar_ulang`
--

CREATE TABLE `jadwal_daftar_ulang` (
  `id_jadwal` int(11) NOT NULL,
  `nama_kegiatan` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `ta` varchar(9) DEFAULT NULL,
  `status` enum('Terlaksana','Berlangsung','Belum') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_daftar_ulang`
--

INSERT INTO `jadwal_daftar_ulang` (`id_jadwal`, `nama_kegiatan`, `keterangan`, `tgl_mulai`, `tgl_selesai`, `ta`, `status`) VALUES
(1, 'Pembayaran', 'Semua calon peserta didik wajib melakukan pembayaran pada Tata Usaha bagian Keuangan atau mengunggah bukti pembayaran', '2016-04-28', '2016-04-30', '2016/2017', 'Belum');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_ppdb`
--

CREATE TABLE `jadwal_ppdb` (
  `id_jadwal` int(11) NOT NULL,
  `nama_kegiatan` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `ta` varchar(9) DEFAULT NULL,
  `status` enum('Terlaksana','Berlangsung','Belum') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_ppdb`
--

INSERT INTO `jadwal_ppdb` (`id_jadwal`, `nama_kegiatan`, `keterangan`, `tgl_mulai`, `tgl_selesai`, `ta`, `status`) VALUES
(3, 'Pengisian Formulir', 'Pengisian formulir oleh orang tua dapat dilakukan secara online.', '2016-04-26', '2016-04-27', '2016/2017', 'Berlangsung');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_seleksi`
--

CREATE TABLE `jadwal_seleksi` (
  `id_seleksi` int(11) NOT NULL,
  `nama_seleksi` varchar(20) DEFAULT NULL,
  `sesi` char(2) DEFAULT NULL,
  `kelompok` char(1) NOT NULL,
  `tgl` date DEFAULT NULL,
  `waktu_mulai` time DEFAULT NULL,
  `waktu_selesai` time DEFAULT NULL,
  `id_ruangan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_seleksi`
--

INSERT INTO `jadwal_seleksi` (`id_seleksi`, `nama_seleksi`, `sesi`, `kelompok`, `tgl`, `waktu_mulai`, `waktu_selesai`, `id_ruangan`) VALUES
(4, 'OPS', '3', '3', '2016-04-28', '00:00:00', '13:45:00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `ket_ortu`
--

CREATE TABLE `ket_ortu` (
  `id_ortu` varchar(16) NOT NULL,
  `nama_ayah` varchar(50) DEFAULT NULL,
  `nama_ibu` varchar(50) DEFAULT NULL,
  `pdd_ayah` enum('SD','SMP','SMA','D1','D2','D3','S1','S2','S3') DEFAULT NULL,
  `pdd_ibu` enum('SD','SMP','SMA','D1','D2','D3','S1','S2','S3') DEFAULT NULL,
  `pekerjaan_ayah` varchar(50) DEFAULT NULL,
  `nama_perusahaan_ayah` varchar(50) DEFAULT NULL,
  `alamat_perusahaan_ayah` text,
  `email_kantor_ayah` varchar(100) DEFAULT NULL,
  `pekerjaan_ibu` varchar(50) DEFAULT NULL,
  `nama_perusahaan_ibu` varchar(50) DEFAULT NULL,
  `alamat_perusahaan_ibu` text,
  `email_kantor_ibu` varchar(100) DEFAULT NULL,
  `penghasilan` int(11) DEFAULT NULL,
  `no_pendaftaran` varchar(20) DEFAULT NULL,
  `no_hp` char(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ket_ortu`
--

INSERT INTO `ket_ortu` (`id_ortu`, `nama_ayah`, `nama_ibu`, `pdd_ayah`, `pdd_ibu`, `pekerjaan_ayah`, `nama_perusahaan_ayah`, `alamat_perusahaan_ayah`, `email_kantor_ayah`, `pekerjaan_ibu`, `nama_perusahaan_ibu`, `alamat_perusahaan_ibu`, `email_kantor_ibu`, `penghasilan`, `no_pendaftaran`, `no_hp`) VALUES
('7301072505930001', 'Budiono Darsono', 'Hana Darsono', 'S2', 'S1', 'CEO', 'PT. Detik Media corp', 'Jalan Daan Mogot No. 5', 'budiono@detik.com', 'Ibu Rumah Tangga', '', '', '', NULL, '20160000001', '081322361256');

-- --------------------------------------------------------

--
-- Table structure for table `ket_siswa`
--

CREATE TABLE `ket_siswa` (
  `nik` varchar(16) NOT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `nama_panggilan` varchar(10) DEFAULT NULL,
  `jekel` enum('L','P') DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `agama` enum('Islam','Katolik','Protestan','Hindu','Budha','Lain - Lain') DEFAULT NULL,
  `kewarganegaraan` enum('WNI','WNA') DEFAULT NULL,
  `anak_ke` int(11) DEFAULT NULL,
  `jumlah_saudara_kandung` int(11) DEFAULT NULL,
  `jumlah_saudara_tiri` int(11) DEFAULT NULL,
  `jumlah_saudara_angkat` int(11) DEFAULT NULL,
  `bahasa_sehari` varchar(20) DEFAULT NULL,
  `berat_badan` int(11) DEFAULT NULL,
  `tinggi_badan` int(11) DEFAULT NULL,
  `goda` enum('A','B','AB','O') DEFAULT NULL,
  `penyakit_derita` text,
  `alamat_rumah` text,
  `rt` char(3) DEFAULT NULL,
  `rw` char(3) DEFAULT NULL,
  `kelurahan` varchar(20) DEFAULT NULL,
  `kecamatan` varchar(20) DEFAULT NULL,
  `kota_kabupaten` varchar(20) DEFAULT NULL,
  `provinsi` varchar(30) NOT NULL,
  `kode_area` varchar(6) DEFAULT NULL,
  `telp_rumah` varchar(13) DEFAULT NULL,
  `no_hp` char(13) DEFAULT NULL,
  `kode_pos` char(5) DEFAULT NULL,
  `tempat_tinggal` enum('Orang Tua','Wali','Menumpang','Asrama') DEFAULT NULL,
  `jarak_rumah_sekolah` int(11) DEFAULT NULL,
  `no_pendaftaran` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ket_siswa`
--

INSERT INTO `ket_siswa` (`nik`, `nama_lengkap`, `nama_panggilan`, `jekel`, `tgl_lahir`, `tempat_lahir`, `agama`, `kewarganegaraan`, `anak_ke`, `jumlah_saudara_kandung`, `jumlah_saudara_tiri`, `jumlah_saudara_angkat`, `bahasa_sehari`, `berat_badan`, `tinggi_badan`, `goda`, `penyakit_derita`, `alamat_rumah`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kota_kabupaten`, `provinsi`, `kode_area`, `telp_rumah`, `no_hp`, `kode_pos`, `tempat_tinggal`, `jarak_rumah_sekolah`, `no_pendaftaran`) VALUES
('7301072505930001', 'Adeeva Afsyen', 'Deeva', 'P', '2000-03-04', 'Bandung', 'Islam', 'WNI', 1, 0, 0, 0, 'Sunda', 45, 150, 'O', 'Tidak ada', 'Jalan Ganesha', '01', '02', 'Dago', 'Dago', 'Kota Bandung', 'Jawa Barat', '022', '3456666', '081322361256', '40123', 'Orang Tua', 100, '20160000001');

-- --------------------------------------------------------

--
-- Table structure for table `ket_wali`
--

CREATE TABLE `ket_wali` (
  `id_wali` varchar(16) NOT NULL,
  `nama_wali` varchar(50) DEFAULT NULL,
  `pdd_wali` enum('SD','SMP','SMA','D1','D2','D3','S1','S2','S3') DEFAULT NULL,
  `hubungan_keluarga` varchar(20) DEFAULT NULL,
  `alamat_rumah` text,
  `rt` varchar(3) DEFAULT NULL,
  `rw` varchar(3) DEFAULT NULL,
  `kelurahan` varchar(20) DEFAULT NULL,
  `kecamatan` varchar(20) DEFAULT NULL,
  `kota_kabupaten` varchar(20) DEFAULT NULL,
  `provinsi` varchar(30) NOT NULL,
  `kode_area` varchar(5) NOT NULL,
  `telp_rumah` varchar(13) DEFAULT NULL,
  `no_hp` varchar(13) DEFAULT NULL,
  `kode_pos` varchar(5) DEFAULT NULL,
  `pekerjaan_wali` varchar(50) DEFAULT NULL,
  `nama_perusahaan` varchar(50) DEFAULT NULL,
  `alamat_perusahaan` text,
  `email_wali` varchar(100) DEFAULT NULL,
  `no_pendaftaran` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi_pendaftar`
--

CREATE TABLE `notifikasi_pendaftar` (
  `id_notifikasi` int(11) NOT NULL,
  `no_pendaftaran` varchar(20) DEFAULT NULL,
  `no_hp` varchar(13) DEFAULT NULL,
  `keterangan` text,
  `jenis` enum('Pembayaran','Seleksi','Daftar Ulang','Her-Registrasi','SPP','Alumni') DEFAULT NULL,
  `status` enum('Belum','Sudah') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_daftar_ulang`
--

CREATE TABLE `pembayaran_daftar_ulang` (
  `no_pendaftaran` varchar(20) NOT NULL,
  `sdp` int(11) DEFAULT NULL,
  `sdp_bukti` blob,
  `dpp` int(11) DEFAULT NULL,
  `dpp_bukti` blob,
  `seragam` int(11) DEFAULT NULL,
  `seragam_bukti` blob,
  `spp` int(11) DEFAULT NULL,
  `spp_bukti` blob,
  `status` enum('Lunas','Belum','Kredit') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_psikotest`
--

CREATE TABLE `pembayaran_psikotest` (
  `id_pembayaran` int(11) NOT NULL,
  `nama_pembayaran` varchar(100) DEFAULT NULL,
  `bukti_bayar` blob,
  `no_pendaftaran` varchar(20) DEFAULT NULL,
  `status` enum('Sudah','Belum','Proses') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` int(11) NOT NULL,
  `nama_ruangan` varchar(50) DEFAULT NULL,
  `kapasitas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `nama_ruangan`, `kapasitas`) VALUES
(1, 'Peace', 6),
(2, 'Love', 6),
(3, 'Aula', 36);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `asal_mula`
--
ALTER TABLE `asal_mula`
  ADD PRIMARY KEY (`no_pendaftaran`);

--
-- Indexes for table `buku_tamu`
--
ALTER TABLE `buku_tamu`
  ADD PRIMARY KEY (`id_buku_tamu`),
  ADD KEY `no_hp` (`no_hp`);

--
-- Indexes for table `dokumen_daftar_ulang`
--
ALTER TABLE `dokumen_daftar_ulang`
  ADD PRIMARY KEY (`no_pendaftaran`);

--
-- Indexes for table `formulir`
--
ALTER TABLE `formulir`
  ADD PRIMARY KEY (`no_pendaftaran`),
  ADD KEY `username` (`email`);

--
-- Indexes for table `jadwal_daftar_ulang`
--
ALTER TABLE `jadwal_daftar_ulang`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `jadwal_ppdb`
--
ALTER TABLE `jadwal_ppdb`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `jadwal_seleksi`
--
ALTER TABLE `jadwal_seleksi`
  ADD PRIMARY KEY (`id_seleksi`),
  ADD KEY `id_ruangan` (`id_ruangan`);

--
-- Indexes for table `ket_ortu`
--
ALTER TABLE `ket_ortu`
  ADD PRIMARY KEY (`id_ortu`),
  ADD KEY `no_pendaftaran` (`no_pendaftaran`),
  ADD KEY `no_hp` (`no_hp`);

--
-- Indexes for table `ket_siswa`
--
ALTER TABLE `ket_siswa`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `no_pendaftaran` (`no_pendaftaran`);

--
-- Indexes for table `ket_wali`
--
ALTER TABLE `ket_wali`
  ADD PRIMARY KEY (`id_wali`),
  ADD KEY `no_pendaftaran` (`no_pendaftaran`);

--
-- Indexes for table `notifikasi_pendaftar`
--
ALTER TABLE `notifikasi_pendaftar`
  ADD PRIMARY KEY (`id_notifikasi`);

--
-- Indexes for table `pembayaran_daftar_ulang`
--
ALTER TABLE `pembayaran_daftar_ulang`
  ADD PRIMARY KEY (`no_pendaftaran`);

--
-- Indexes for table `pembayaran_psikotest`
--
ALTER TABLE `pembayaran_psikotest`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `no_pendaftaran_pembayaran_psikotest_fk` (`no_pendaftaran`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal_daftar_ulang`
--
ALTER TABLE `jadwal_daftar_ulang`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `jadwal_ppdb`
--
ALTER TABLE `jadwal_ppdb`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `jadwal_seleksi`
--
ALTER TABLE `jadwal_seleksi`
  MODIFY `id_seleksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `notifikasi_pendaftar`
--
ALTER TABLE `notifikasi_pendaftar`
  MODIFY `id_notifikasi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pembayaran_psikotest`
--
ALTER TABLE `pembayaran_psikotest`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `asal_mula`
--
ALTER TABLE `asal_mula`
  ADD CONSTRAINT `no_pendaftaran_asal_mula_formulir_fk` FOREIGN KEY (`no_pendaftaran`) REFERENCES `formulir` (`no_pendaftaran`);

--
-- Constraints for table `formulir`
--
ALTER TABLE `formulir`
  ADD CONSTRAINT `username_formulir_akun_fk` FOREIGN KEY (`email`) REFERENCES `akun` (`username`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `jadwal_seleksi`
--
ALTER TABLE `jadwal_seleksi`
  ADD CONSTRAINT `id_ruangan_jadwal_seleksi_ruangan_fk` FOREIGN KEY (`id_ruangan`) REFERENCES `ruangan` (`id_ruangan`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `ket_ortu`
--
ALTER TABLE `ket_ortu`
  ADD CONSTRAINT `no_hp_ket_ortu_buku_tamu_fk` FOREIGN KEY (`no_hp`) REFERENCES `buku_tamu` (`no_hp`) ON UPDATE CASCADE,
  ADD CONSTRAINT `no_pendaftaran_ket_ortu_formulir_fk` FOREIGN KEY (`no_pendaftaran`) REFERENCES `formulir` (`no_pendaftaran`) ON UPDATE CASCADE;

--
-- Constraints for table `ket_siswa`
--
ALTER TABLE `ket_siswa`
  ADD CONSTRAINT `no_pendaftaran_ket_siswa_formulir_fk` FOREIGN KEY (`no_pendaftaran`) REFERENCES `formulir` (`no_pendaftaran`);

--
-- Constraints for table `ket_wali`
--
ALTER TABLE `ket_wali`
  ADD CONSTRAINT `no_pendaftaran_ket_wali_formulir_fk` FOREIGN KEY (`no_pendaftaran`) REFERENCES `formulir` (`no_pendaftaran`) ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran_psikotest`
--
ALTER TABLE `pembayaran_psikotest`
  ADD CONSTRAINT `no_pendaftaran_pembayaran_psikotest_fk` FOREIGN KEY (`no_pendaftaran`) REFERENCES `formulir` (`no_pendaftaran`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
