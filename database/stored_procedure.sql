DELIMITER $
CREATE FUNCTION no_pendaftaran()
RETURNS VARCHAR(20)
BEGIN
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
END
$

DELIMITER $
CREATE PROCEDURE proc_insert_pendaftaran(
	IN v_id_buku_tamu VARCHAR(16),
	IN v_nama VARCHAR(50),
	IN v_alamat TEXT,
	IN v_no_hp VARCHAR(13),
	IN v_email VARCHAR(100),
	IN v_asal VARCHAR(50)
)
BEGIN
	DECLARE v_no_pendaftaran VARCHAR(20);

	SET v_no_pendaftaran = no_pendaftaran();
	SET v_no_pendaftaran = v_no_pendaftaran;

	INSERT INTO buku_tamu VALUES (v_id_buku_tamu,v_nama,v_alamat,v_no_hp,v_email,v_asal);
	INSERT INTO akun (username, password, privilege, status, email) VALUES (v_email,md5(v_no_hp),'Pendaftar','Proses',v_email);
	INSERT INTO formulir VALUES (v_no_pendaftaran,CURDATE(),YEAR(CURDATE()),'Proses',v_email);
	INSERT INTO ket_siswa (no_hp,no_pendaftaran) VALUES (v_no_hp,v_no_pendaftaran);
END;
$

DELIMITER $
CREATE PROCEDURE proc_pembayaran_psikotest(
	IN v_no_pendaftaran VARCHAR(20),
	IN v_nama_bayar VARCHAR(100),
	IN v_gambar BLOB,
	IN v_no_hp VARCHAR(13)
)
BEGIN
	INSERT INTO pembayaran_psikotest (nama_pembayaran,bukti_bayar,no_pendaftaran,status) VALUES (v_nama_bayar,v_gambar,v_no_pendaftaran,'Proses');
	UPDATE notifikasi_pendaftar SET status='Sudah' WHERE no_pendaftaran = v_no_pendaftaran;
	INSERT INTO outbox (DestinationNumber,TextDecoded,CreatorID) VALUES (v_no_hp,'Terima kasih telah melakukan pembayaran. Pembayaran Anda sedang kami proses. Panitia PPDB SD Ar-Rafi.','Panitia PPDB SD Ar-Rafi');
END;
$

DELIMITER $
CREATE PROCEDURE proc_konfirmasi_pembayaran_psikotest(
	IN v_no_pendaftaran VARCHAR(20)
)
BEGIN
	UPDATE pembayaran_psikotest SET status = 'Sudah' WHERE no_pendaftaran = v_no_pendaftaran;
	INSERT INTO penilaian_ops (no_pendaftaran) VALUES(v_no_pendaftaran);
	INSERT INTO penilaian_ok (no_pendaftaran) VALUES(v_no_pendaftaran);
	INSERT INTO rekap_nilai_seleksi (no_pendaftaran) VALUES(v_no_pendaftaran);
END;
$