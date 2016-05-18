DELIMITER $
CREATE TRIGGER trg_notifikasi_panitia_pembayaran_psikotest
AFTER INSERT
	ON pembayaran_psikotest
	FOR EACH ROW
BEGIN
	INSERT INTO notifikasi_panitia (no_pendaftaran,nama_notifikasi,keterangan,status,jenis) VALUES (NEW.no_pendaftaran,'Pembayaran Psikotest',CONCAT('Pendaftar dengan nomor pendaftaran ',NEW.no_pendaftaran,' telah menggungah bukti pembayaran psikotes pada tanggal ',CURDATE()),'Belum','Pembayaran');
END;
$

DELIMITER $
CREATE TRIGGER trg_insert_data_rekap_ops
AFTER UPDATE
	ON penilaian_ops
	FOR EACH ROW
BEGIN
	UPDATE rekap_nilai_seleksi SET ops = NEW.total WHERE no_pendaftaran = OLD.no_pendaftaran;
END;
$

DELIMITER $
CREATE TRIGGER trg_insert_data_rekap_ok
AFTER UPDATE
	ON penilaian_ok
	FOR EACH ROW
BEGIN
	UPDATE rekap_nilai_seleksi SET ok = NEW.total WHERE no_pendaftaran = OLD.no_pendaftaran;
END;
$