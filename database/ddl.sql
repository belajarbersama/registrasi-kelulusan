----------------------- PROSES Registrasi PPDB -----------------------
CREATE TABLE jadwal_ppdb(
	id_jadwal INT,
	nama_kegiatan VARCHAR(255),
	keterangan TEXT,
	tgl_mulai DATE,
	tgl_selesai DATE,
	ta VARCHAR(9),
	status ENUM('Terlaksana','Berlangsung','Belum')
);

ALTER TABLE jadwal_ppdb
ADD CONSTRAINT id_jadwal_jadwal_ppdb_pk PRIMARY KEY(id_jadwal);

ALTER TABLE jadwal_ppdb
CHANGE id_jadwal id_jadwal INT NOT NULL AUTO_INCREMENT;

CREATE TABLE berita(
	id_berita INT,
	judul_berita VARCHAR(255),
	ringkasan_berita VARCHAR(255),
	isi_berita TEXT,
	tgl_posting DATE,
	waktu_posting TIME,
	posted_by VARCHAR(50)
);

CREATE TABLE ruangan(
	id_ruangan INT,
	nama_ruangan VARCHAR(50),
	kapasitas INT
);

ALTER TABLE ruangan
ADD CONSTRAINT id_ruangan_ruangan_pk PRIMARY KEY(id_ruangan);

ALTER TABLE ruangan
CHANGE id_ruangan id_ruangan INT NOT NULL AUTO_INCREMENT;

ALTER TABLE ruangan
ADD status ENUM('Tersedia','Tidak') NOT NULL AFTER kapasitas;

CREATE TABLE jadwal_seleksi(
	id_seleksi INT,
	nama_seleksi VARCHAR(20),
	sesi CHAR(2),
	tgl DATE,
	waktu_mulai TIME,
	waktu_selesai TIME,
	id_ruangan VARCHAR(6)
);

ALTER TABLE jadwal_seleksi
ADD CONSTRAINT id_seleksi_jadwal_seleksi_pk PRIMARY KEY(id_seleksi);

ALTER TABLE jadwal_seleksi
CHANGE id_seleksi id_seleksi INT NOT NULL AUTO_INCREMENT;

ALTER TABLE jadwal_seleksi
CHANGE id_ruangan id_ruangan INT(11) NULL DEFAULT NULL;







CREATE TABLE pembayaran_psikotest(
	id_pembayaran INT,
	nama_pembayaran VARCHAR(100),
	bukti_bayar BLOB,
	no_pendaftaran VARCHAR(20),
	status ENUM('Sudah','Belum','Proses')
);

ALTER TABLE pembayaran_psikotest
ADD CONSTRAINT id_pembayaran_pembayaran_psikotest_pk PRIMARY KEY(id_pembayaran);

ALTER TABLE pembayaran_psikotest
CHANGE id_pembayaran id_pembayaran INT NOT NULL AUTO_INCREMENT;

ALTER TABLE pembayaran_psikotest
ADD CONSTRAINT no_pendaftaran_pembayaran_psikotest_fk
	FOREIGN KEY (no_pendaftaran)
	REFERENCES formulir(no_pendaftaran)
	ON DELETE RESTRICT
	ON UPDATE RESTRICT;
----------------------- PROSES Seleksi -----------------------
CREATE TABLE jadwal_seleksi_pendaftar(
	id_jadwal_seleksi_pendaftar INT,
	no_pendaftaran VARCHAR(20),
	id_ops INT,
	id_ok INT,
	id_psikotest INT,
	id_wawancara INT
);

CREATE TABLE penilaian_ok(
	koordinasi_keseimbangan INT,
	sosial INT,
	pengendalian_gerak INT,
	total INT,
	status VARCHAR(50),
	no_pendaftaran VARCHAR(20)
);

ALTER TABLE penilaian_ok
ADD CONSTRAINT no_pendaftaran_penilaian_ok_formulir_fk
	FOREIGN KEY(no_pendaftaran)
	REFERENCES formulir(no_pendaftaran)
	ON DELETE RESTRICT
	ON UPDATE RESTRICT;

CREATE TABLE penilaian_ops(
	self_identity INT,
	part_of_body INT,
	observation INT,
	math_counting INT,
	writing_reading INT,
	pengetahuan_agama INT,
	sikap INT,
	total INT,
	status ENUM('Diterima','Dipertimbangkan','Ditolak'),
	no_pendaftaran VARCHAR(20)
);

ALTER TABLE penilaian_ops
ADD CONSTRAINT no_pendaftaran_penilaian_ops_formulir_fk
	FOREIGN KEY(no_pendaftaran)
	REFERENCES formulir(no_pendaftaran)
	ON DELETE RESTRICT
	ON UPDATE RESTRICT;

CREATE TABLE rekap_nilai_seleksi(
	ops INT,
	ok INT,
	status ENUM('Diterima','Dipertimbangkan','Ditolak'),
	no_pendaftaran VARCHAR(20)
);

ALTER TABLE rekap_nilai_seleksi
ADD CONSTRAINT no_pendaftaran_rekap_nilai_seleksi_formulir_fk
	FOREIGN KEY(no_pendaftaran)
	REFERENCES formulir(no_pendaftaran)
	ON DELETE RESTRICT
	ON UPDATE RESTRICT;
----------------------- PROSES Pendaftaran Ulang -----------------------
CREATE TABLE jadwal_daftar_ulang(
	id_jadwal INT,
	nama_kegiatan VARCHAR(255),
	keterangan TEXT,
	tgl_mulai DATE,
	tgl_selesai DATE,
	ta VARCHAR(9),
	status ENUM('Terlaksana','Berlangsung','Belum')
);

ALTER TABLE jadwal_daftar_ulang
ADD CONSTRAINT id_jadwal_jadwal_daftar_ulang_pk PRIMARY KEY(id_jadwal);

ALTER TABLE jadwal_daftar_ulang
CHANGE id_jadwal id_jadwal INT NOT NULL AUTO_INCREMENT;

CREATE TABLE pembayaran_daftar_ulang(
	no_pendaftaran VARCHAR(20),
	jumlah_bayar INT,
	nama_bayar VARCHAR(20),
	bukti_bayar BLOB,
	sisa_bayar INT,
	status ENUM('Lunas','Belum','Kredit')
);

ALTER TABLE pembayaran_daftar_ulang
ADD CONSTRAINT no_pendaftaran_pembayaran_daftar_ulang_pk PRIMARY KEY(no_pendaftaran);

CREATE TABLE dokumen_daftar_ulang(
	no_pendaftaran VARCHAR(20),
	nama_akta VARCHAR(100),
	akta_kelahiran BLOB,
	status_akta ENUM('Sudah','Belum'),
	nama_ktp VARCHAR(100),
	ktp BLOB,
	status_ktp ENUM('Sudah','Belum'),
	nama_kk VARCHAR(100),
	kk BLOB,
	status_kk ENUM('Sudah','Belum'),
	nama_sk VARCHAR(100),
	surat_keterangan BLOB,
	status_sk ENUM('Sudah','Belum'),
	nama_foto VARCHAR(100),
	foto BLOB,
	status_foto ENUM('Sudah','Belum'),
	status ENUM('Sudah','Belum')
);

ALTER TABLE dokumen_daftar_ulang
ADD CONSTRAINT no_pendaftaran_dokumen_daftar_ulang_pk PRIMARY KEY(no_pendaftaran);
----------------------- PROSES Pengajuan NISN -----------------------
CREATE TABLE registrasi_pd(
	jenis_pendaftaran ENUM('01','02'),
	tgl_masuk_sekolah DATE,
	NIS VARCHAR(10),
	no_peserta_ujian VARCHAR(20),
	pernah_paud ENUM('Ya','Tidak'),
	pernah_tk ENUM('Ya','Tidak'),
	no_skhun VARCHAR(16),
	no_ijazah VARCHAR(16),
	hoby ENUM('A','B','C','D','E','F'),
	cita_cita ENUM('A','B','C','D','E','F','G','H'),
	no_pendaftaran VARCHAR(20)
);

ALTER TABLE registrasi_pd
ADD CONSTRAINT no_peserta_ujian_registrasi_pd_pk PRIMARY KEY(no_peserta_ujian);

ALTER TABLE registrasi_pd
ADD CONSTRAINT no_pendaftaran_registrasi_pd_fk
	FOREIGN KEY (no_pendaftaran)
	REFERENCES formulir(no_pendaftaran)
	ON DELETE RESTRICT
	ON UPDATE RESTRICT;

CREATE TABLE data_pribadi(
	nama_lengkap VARCHAR(50),
	jekel ENUM('Laki - Laki','Perempuan'),
	nisn VARCHAR(10),
	nik VARCHAR(16),
	tempat_lahir VARCHAR(31),
	tgl_lahir DATE,
	agama ENUM('01','02','03','04','05','06','99'),
	berkebutuhan_khusus ENUM('01','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q'),
	alamat VARCHAR(31),
	rt CHAR(3),
	rw CHAR(3),
	dusun VARCHAR(31),
	kelurahaan_desa VARCHAR(31),
	kecamatan VARCHAR(31),
	kode_pos VARCHAR(5),
	tempat_tinggal ENUM('1','2','3','4','5','9'),
	moda_transportasi ENUM('01','02','03','04','05','06','07','08','99'),
	no_hp1 VARCHAR(14),
	no_hp2 VARCHAR(14),
	no_telp VARCHAR(31),
	kps_pkh_kip ENUM('Ya','Tidak'),
	no_kps_pkh_kip VARCHAR(14),
	kewarganegaraan ENUM('Indonesia (WNI)','Asing (WNA)'),
	nama_negara VARCHAR(15),
	no_pendaftaran VARCHAR(20)
);

ALTER TABLE data_pribadi
ADD CONSTRAINT nik_data_pribadi_pk PRIMARY KEY(nik);

ALTER TABLE data_pribadi
ADD CONSTRAINT no_pendaftaran_data_pribadi_fk
	FOREIGN KEY (no_pendaftaran)
	REFERENCES formulir(no_pendaftaran)
	ON DELETE RESTRICT
	ON UPDATE RESTRICT;

CREATE TABLE data_ayah(
	nama_ayah VARCHAR(31),
	tahun_lahir VARCHAR(4),
	pendidikan ENUM('01','02','03','04','05','06','07','08','09','10','11'),
	pekerjaan ENUM('01','02','03','04','05','06','07','08','09','10','11','12','99'),
	penghasilan_bulanan ENUM('1','2','3','4','5','6'),
	berkebutuhan_khusus ENUM('01','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q'),
	no_pendaftaran VARCHAR(20)
);

ALTER TABLE data_ayah
ADD CONSTRAINT 

CREATE TABLE data_ibu(
	nama_ibu VARCHAR(31),
	tahun_lahir VARCHAR(4),
	pendidikan ENUM('01','02','03','04','05','06','07','08','09','10','11'),
	pekerjaan ENUM('01','02','03','04','05','06','07','08','09','10','11','12','99'),
	penghasilan_bulanan ENUM('1','2','3','4','5','6'),
	berkebutuhan_khusus ENUM('01','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q'),
	no_pendaftaran VARCHAR(20)
);

CREATE TABLE data_wali(
	nama_wali VARCHAR(31),
	tahun_lahir VARCHAR(4),
	pendidikan ENUM('01','02','03','04','05','06','07','08','09','10','11'),
	pekerjaan ENUM('01','02','03','04','05','06','07','08','09','10','11','12','99'),
	penghasilan_bulanan ENUM('1','2','3','4','5','6'),
	no_pendaftaran VARCHAR(20)
);

CREATE TABLE data_priodik(
	tinggi_badan INT,
	berat_badan INT,
	jarak_sekolah CHAR(2),
	waktu_tempuh_jam INT,
	waktu_tempuh_menit INT,
	jumlah_saudara_kandung INT,
	no_pendaftaran VARCHAR(2)
);

CREATE TABLE prestasi(
	jenis_1 ENUM('1','2','3','4'),
	tingkat_1 ENUM('1','2','3','4','3','5','6'),
	nama_prestasi_1 VARCHAR (8),
	tahun_1 VARCHAR(4),
	penyelenggara_1 TEXT,
	jenis_2 ENUM('1','2','3','4'),
	tingkat_2 ENUM('1','2','3','4','3','5','6'),
	nama_prestasi_2 VARCHAR (8),
	tahun_2 VARCHAR(4),
	penyelenggara_2 TEXT,
	jenis_3 ENUM('1','2','3','4'),
	tingkat_3 ENUM('1','2','3','4','3','5','6'),
	nama_prestasi_3 VARCHAR (8),
	tahun_3 VARCHAR(4),
	penyelenggara_3 TEXT,
	no_pendaftaran VARCHAR(2)
);

CREATE TABLE beasiswa(
	jenis_1 ENUM('01','02','03','04','99'),
	keterangan_1 VARCHAR(27),
	tahun_mulai_1 VARCHAR(4),
	tahun_selesai_1 VARCHAR(4),
	jenis_2 ENUM('01','02','03','04','99'),
	keterangan_2 VARCHAR(27),
	tahun_mulai_2 VARCHAR(4),
	tahun_selesai_2 VARCHAR(4),
	jenis_3 ENUM('01','02','03','04','99'),
	keterangan_3 VARCHAR(27),
	tahun_mulai_3 VARCHAR(4),
	tahun_selesai_3 VARCHAR(4),
	no_pendaftaran VARCHAR(2)
);

CREATE TABLE pendaftaran_keluar(
	keluar_karena ENUM('1','2','3','4','3','5','6','7','8'),
	tanggal_keluar DATE,
	alasan VARCHAR(40),
	no_pendaftaran VARCHAR(2) 
);
----------------------- PROSES Her-Registrasi -----------------------
CREATE TABLE jadwal_her_registrasi(
	id_jadwal INT,
	nama_kegiatan VARCHAR(255),
	keterangan TEXT,
	tgl_mulai DATE,
	tgl_selesai DATE,
	ta VARCHAR(9),
	status ENUM('Terlaksana','Berlangsung','Belum')
);

ALTER TABLE jadwal_her_registrasi
ADD CONSTRAINT id_jadwal_her_registrasi_pk PRIMARY KEY(id_jadwal);

ALTER TABLE jadwal_her_registrasi
CHANGE id_jadwal id_jadwal INT NOT NULL AUTO_INCREMENT;

CREATE TABLE jadwal_buku_seragam(
	id_jadwal INT,
	nama_kegiatan VARCHAR(255),
	keterangan TEXT,
	tgl_mulai DATE,
	tgl_selesai DATE,
	ta VARCHAR(9),
	status ENUM('Terlaksana','Berlangsung','Belum')
);

ALTER TABLE jadwal_buku_seragam
ADD CONSTRAINT id_jadwal_jadwal_buku_seragam_pk PRIMARY KEY(id_jadwal);

ALTER TABLE jadwal_buku_seragam
CHANGE id_jadwal id_jadwal INT NOT NULL AUTO_INCREMENT;



CREATE TABLE pembayaran_her_registrasi(
	id_her_registrasi INT,
	nama_bayar VARCHAR(100),
	bukti_bayar BLOB,
	total_bayar INT,
	jumlah_bayar INT,
	sisa_bayar INT,
	status ENUM('Lunas','Belum','Kredit'),
	nis VARCHAR(10)
);

ALTER TABLE pembayaran_her_registrasi
ADD CONSTRAINT id_her_registrasi_pembayaran_her_registrasi_pk PRIMARY KEY(id_her_registrasi);

ALTER TABLE pembayaran_her_registrasi
CHANGE id_her_registrasi id_her_registrasi INT NOT NULL AUTO_INCREMENT;

----------------------- PROSES Pembayaran SPP Bulanan -----------------------






----------------------- PROSES Pendataan Alumni -----------------------
CREATE TABLE jadwal_pengambilan_ijazah(
	id_jadwal INT,
	nama_kegiatan VARCHAR(255),
	keterangan TEXT,
	tgl_mulai DATE,
	tgl_selesai DATE,
	ta VARCHAR(9)
);

ALTER TABLE jadwal_pengambilan_ijazah
ADD CONSTRAINT id_jadwal_jadwal_pengambilan_ijazah_pk PRIMARY KEY(id_jadwal);

ALTER TABLE jadwal_pengambilan_ijazah
CHANGE id_jadwal id_jadwal INT NOT NULL AUTO_INCREMENT;




----------------------- NOTIFIKASI -----------------------
CREATE TABLE notifikasi_pendaftar(
	id_notifikasi INT,
	no_pendaftaran VARCHAR(20),
	no_hp VARCHAR(13),
	keterangan TEXT,
	jenis ENUM('Pembayaran','Seleksi','Daftar Ulang','Her-Registrasi','SPP','Alumni'),
	status ENUM('Belum','Sudah')
);

ALTER TABLE notifikasi_pendaftar
ADD CONSTRAINT id_notifikasi_notifikasi_pendaftar_pk PRIMARY KEY(id_notifikasi);

ALTER TABLE notifikasi_pendaftar
CHANGE id_notifikasi id_notifikasi INT NOT NULL AUTO_INCREMENT;

CREATE TABLE notifikasi_panitia(
	id_notifikasi INT,
	no_pendaftaran VARCHAR(20),
	no_hp VARCHAR(13),
	keterangan TEXT,
	jenis ENUM('Pembayaran','Seleksi','Daftar Ulang','Her-Registrasi','SPP','Alumni'),
	status ENUM('Belum','Sudah')
);

ALTER TABLE notifikasi_panitia
ADD CONSTRAINT id_notifikasi_notifikasi_panitia_pk PRIMARY KEY(id_notifikasi);

ALTER TABLE notifikasi_panitia
CHANGE id_notifikasi id_notifikasi INT NOT NULL AUTO_INCREMENT;

CREATE TABLE notifikasi_ortu(
	id_notifikasi INT,
	no_pendaftaran VARCHAR(20),
	no_hp VARCHAR(13),
	nama_notifikasi VARCHAR(35),
	keterangan TEXT,
	tanggal DATE,
	waktu TIME,
	jenis ENUM('Pembayaran','Seleksi','Daftar Ulang','Her-Registrasi','SPP','Alumni'),
	status ENUM('Belum','Sudah')
);

ALTER TABLE notifikasi_ortu
ADD CONSTRAINT id_notifikasi_notifikasi_ortu_pk PRIMARY KEY(id_notifikasi);

ALTER TABLE notifikasi_ortu
CHANGE id_notifikasi id_notifikasi INT NOT NULL AUTO_INCREMENT;