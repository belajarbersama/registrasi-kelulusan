CREATE TABLE jadwal_tanggal(
	id_jadwal INT,
	nama_kegiatan VARCHAR(255),
	keterangan TEXT,
	tgl_mulai DATE,
	tgl_selesai DATE,
	ta VARCHAR(9),
	jenis ENUM('PPDB','Daftar Ulang','Her-Registrasi','Pengambilan Ijazah'),
	status ENUM('Terlaksana','Berlangsung','Belum')
);

ALTER TABLE jadwal_tanggal
ADD CONSTRAINT id_jadwal_jadwal_tanggal_pk PRIMARY KEY(id_jadwal);

ALTER TABLE jadwal_tanggal
CHANGE id_jadwal id_jadwal INT NOT NULL AUTO_INCREMENT;

CREATE TABLE berita(
	id_berita INT,
	judul VARCHAR(255),
	berita TEXT,
	tgl_buat DATE,
	waktu_buat TIME
);

ALTER TABLE berita
ADD CONSTRAINT id_berita_berita_pk PRIMARY KEY(id_berita);

ALTER TABLE berita
CHANGE id_berita id_berita INT NOT NULL AUTO_INCREMENT;

CREATE TABLE pembayaran(
	id_bayar INT,
	nama_bayar VARCHAR(255),
	bukti_bayar BLOB,
	tanggal_bayar DATE,
	total_bayar INT,
	jumlah_bayar INT,
	sisa_bayar INT,
	status ENUM('Lunas','Belum','Kredit'),
	jenis ENUM('Psikotes','Daftar Ulang','Her-Registrasi','SPP'),
	no_pendaftaran VARCHAR(20),
	nis VARCHAR(20)
);

ALTER TABLE pembayaran
ADD CONSTRAINT id_bayar_pembayaran_pk PRIMARY KEY(id_bayar);

ALTER TABLE pembayaran
CHANGE id_bayar id_bayar INT NOT NULL AUTO_INCREMENT;

----------------------------- Pendaftar -----------------------------
CREATE TABLE akun(
	username VARCHAR(100),
	password VARCHAR(100),
	privilege ENUM('Pendaftar','Orang Tua','Panitia','Tata Usaha Bagian Keuangan','Tata Usaha Bagian Kesiswaan','Operator','Kepala Sekolah') NOT NULL,
	status ENUM('Aktif','Tidak_Aktif','Proses') NOT NULL,
	email VARCHAR(100),
	nama_profile VARCHAR(100),
	profile BLOB
);

ALTER TABLE akun
ADD CONSTRAINT username_akun_pk PRIMARY KEY(username);

ALTER TABLE akun
ADD INDEX(email);

CREATE TABLE buku_tamu(
	id_buku_tamu VARCHAR(16),
	nama VARCHAR(50),
	alamat TEXT,
	no_hp VARCHAR(13),
	email VARCHAR(100),
	asal VARCHAR(50)
);

ALTER TABLE buku_tamu
ADD CONSTRAINT id_buku_tamu_buku_tamu_pk PRIMARY KEY(id_buku_tamu);

ALTER TABLE buku_tamu
ADD INDEX(no_hp);

ALTER TABLE buku_tamu
ADD CONSTRAINT email_buku_tamu_akun_fk
	FOREIGN KEY (email)
	REFERENCES akun(email)
	ON DELETE CASCADE
	ON UPDATE CASCADE;

CREATE TABLE formulir(
	no_pendaftaran VARCHAR(20),
	tgl DATE,
	status ENUM('Diterima','Dipertimbangkan','Ditolak','Proses'),
	email VARCHAR(100)
);

ALTER TABLE formulir
ADD CONSTRAINT no_pendaftaran_formulir_pk PRIMARY KEY(no_pendaftaran);

ALTER TABLE formulir
ADD CONSTRAINT email_formulir_akun_fk
	FOREIGN KEY (email)
	REFERENCES akun(email)
	ON DELETE CASCADE
	ON UPDATE CASCADE;

CREATE TABLE ket_siswa(
	nik VARCHAR(16),
	nama_lengkap VARCHAR(50),
	nama_panggilan VARCHAR(10),
	jekel ENUM('L','P'),
	tgl_lahir DATE,
	tempat_lahir VARCHAR(50),
	agama ENUM('Islam','Katolik','Protestan','Hindu','Budha','Lain - Lain'),
	kewarganegaraan ENUM('WNI','WNA'),
	anak_ke INT,
	jumlah_saudara_kandung INT,
	jumlah_saudara_tiri INT,
	jumlah_saudara_angkat INT,
	bahasa_sehari VARCHAR(20),
	berat_badan INT,
	tinggi_badan INT,
	goda ENUM('A','B','AB','O'),
	penyakit_derita TEXT,
	alamat_rumah TEXT,
	rt CHAR(3),
	rw CHAR(3),
	kelurahan VARCHAR(20),
	kecamatan VARCHAR(20),
	kota_kabupaten VARCHAR(20),
	kode_area VARCHAR(6),
	telp_rumah VARCHAR(13),
	no_hp CHAR(13),
	kode_pos CHAR(5),
	tempat_tinggal ENUM('Orang Tua','Wali','Menumpang','Asrama'),
	jarak_rumah_sekolah INT,
	no_pendaftaran VARCHAR(20)
);

ALTER TABLE ket_siswa
ADD CONSTRAINT nik_ket_siswa_pk PRIMARY KEY(nik);

ALTER TABLE ket_siswa
ADD CONSTRAINT no_pendaftaran_ket_siswa_formulir_fk
	FOREIGN KEY (no_pendaftaran)
	REFERENCES formulir(no_pendaftaran)
	ON DELETE CASCADE
	ON UPDATE CASCADE;

ALTER TABLE ket_siswa
ADD CONSTRAINT no_hp_formulir_buku_tamu_fk
	FOREIGN KEY (no_hp)
	REFERENCES buku_tamu(no_hp)
	ON DELETE NO ACTION
	ON UPDATE CASCADE;

ALTER TABLE ket_siswa
ADD provinsi VARCHAR(30) NOT NULL AFTER kota_kabupaten;

CREATE TABLE ket_ortu(
	id_ortu VARCHAR(16),
	nama_ayah VARCHAR(50),
	nama_ibu VARCHAR(50),
	pdd_ayah ENUM('SD','SMP','SMA','D1','D2','D3','S1','S2','S3'),
	pdd_ibu ENUM('SD','SMP','SMA','D1','D2','D3','S1','S2','S3'),
	pekerjaan_ayah VARCHAR(50),
	nama_perusahaan_ayah VARCHAR(50),
	alamat_perusahaan_ayah TEXT,
	email_kantor_ayah VARCHAR(100),
	pekerjaan_ibu VARCHAR(50),
	nama_perusahaan_ibu VARCHAR(50),
	alamat_perusahaan_ibu TEXT,
	email_kantor_ibu VARCHAR(100),
	penghasilan INT,
	no_pendaftaran VARCHAR(20)
);

ALTER TABLE ket_ortu
ADD CONSTRAINT id_ortu_ket_ortu_pk PRIMARY KEY(id_ortu);

ALTER TABLE ket_ortu
ADD CONSTRAINT no_pendaftaran_ket_ortu_formulir_fk
	FOREIGN KEY (no_pendaftaran)
	REFERENCES formulir(no_pendaftaran)
	ON DELETE CASCADE
	ON UPDATE CASCADE;

CREATE TABLE ket_wali(
	id_wali VARCHAR(16),
	nama_wali VARCHAR(50),
	pdd_wali ENUM('SD','SMP','SMA','D1','D2','D3','S1','S2','S3'),
	hubungan_keluarga VARCHAR(20),
	alamat_rumah TEXT,
	rt VARCHAR(3),
	rw VARCHAR(3),
	kelurahan VARCHAR(20),
	kecamatan VARCHAR(20),
	kota_kabupaten VARCHAR(20),
	telp_rumah VARCHAR(13),
	no_hp VARCHAR(13),
	kode_pos VARCHAR(5),
	pekerjaan_wali VARCHAR(50),
	nama_perusahaan VARCHAR(50),
	alamat_perusahaan TEXT,
	email_wali VARCHAR(100),
	no_pendaftaran VARCHAR(20)
);

ALTER TABLE ket_wali
ADD CONSTRAINT id_wali_ket_wali_pk PRIMARY KEY(id_wali);

ALTER TABLE ket_wali
ADD CONSTRAINT no_pendaftaran_ket_wali_formulir_fk
	FOREIGN KEY (no_pendaftaran)
	REFERENCES formulir(no_pendaftaran)
	ON DELETE CASCADE
	ON UPDATE CASCADE;

ALTER TABLE ket_wali
ADD provinsi VARCHAR(30) NOT NULL AFTER kota_kabupaten,
ADD kode_area VARCHAR(5) NOT NULL AFTER provinsi;

CREATE TABLE asal_mula(
	asal_anak ENUM('PG','TK','RA','PAUD','Lainnya'),
	nama_asal VARCHAR(50),
	no_tahun_sk VARCHAR(50),
	lama_belajar INT,
	tgl_terima DATE,
	no_pendaftaran VARCHAR(20)
);

ALTER TABLE asal_mula
ADD PRIMARY KEY(no_pendaftaran);

ALTER TABLE asal_mula
ADD CONSTRAINT no_pendaftaran_asal_mula_formulir_fk
	FOREIGN KEY (no_pendaftaran)
	REFERENCES formulir(no_pendaftaran)
	ON DELETE CASCADE
	ON UPDATE CASCADE;

CREATE TABLE notifikasi(
	id_notifikasi INT,
	jenis ENUM('Pembayaran'),
	ringkasan VARCHAR(25),
	keterangan TEXT,
	tanggal DATE,
	jam TIME,
	status ENUM('Baca','Belum'),
	privilege ENUM('Pendaftar','Orang Tua','Panitia','Tata Usaha Bagian Keuangan','Tata Usaha Bagian Kesiswaan','Operator','Kepala Sekolah') NOT NULL
);

ALTER TABLE notifikasi
ADD CONSTRAINT id_notifikasi_notifikasi_pk PRIMARY KEY(id_notifikasi);

ALTER TABLE notifikasi
CHANGE id_notifikasi id_notifikasi INT NOT NULL AUTO_INCREMENT;