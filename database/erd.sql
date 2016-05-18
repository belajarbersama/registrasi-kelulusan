CREATE TABLE berita(
	id_berita INT,
	judul VARCHAR(255),
	berita TEXT,
	tgl_buat DATE,
	waktu_buat TIME
);

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

CREATE TABLE jadwal_waktu(
	id_jadwal INT,

);