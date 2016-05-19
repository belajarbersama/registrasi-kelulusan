<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Panitia_M extends CI_Model{
		function __construct(){
			parent::__construct();
		}

		public function data_jadwal_ppdb(){
			$tahun = date('Y');
			$tahun = intval($tahun);
			$ta = ($tahun).'/'.($tahun+1);

			$this->db->select('*');
			$this->db->from('jadwal_tanggal');
			$where = array(
				'jenis' => 'PPDB',
				'ta' => $ta
			);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}

		public function data_jadwal_ppdb_per_id($id_jadwal){
			$tahun = date('Y');
			$tahun = intval($tahun);
			$ta = ($tahun).'/'.($tahun+1);

			$this->db->select('*');
			$this->db->from('jadwal_tanggal');
			$where = array(
				'id_jadwal' => $id_jadwal,
				'ta' => $ta
			);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}

		public function insert_jadwal_ppdb($nama_kegiatan,$keterangan,$tgl_mulai,$tgl_selesai,$ta){
			$data = array(
				'nama_kegiatan' => $nama_kegiatan,
				'keterangan' => $keterangan,
				'tgl_mulai' => $tgl_mulai,
				'tgl_selesai' => $tgl_selesai,
				'ta' => $ta,
				'status' => 'Belum',
				'jenis' => 'PPDB'
			);

			$this->db->insert('jadwal_tanggal',$data);
			$result = $this->db->affected_rows();
			return $result;
		}

		public function edit_jadwal_ppdb($id_jadwal,$nama_kegiatan,$keterangan,$tgl_mulai,$tgl_selesai,$ta,$status){
			$data = array(
				'nama_kegiatan' => $nama_kegiatan,
				'keterangan' => $keterangan,
				'tgl_mulai' => $tgl_mulai,
				'tgl_selesai' => $tgl_selesai,
				'ta' => $ta,
				'status' => $status,
				'jenis' => 'PPDB'
			);

			$this->db->where('id_jadwal', $id_jadwal);
			$this->db->update('jadwal_tanggal', $data);
			$query = $this->db->affected_rows();
			return $query;
		}

		public function delete_jadwal_ppdb($id_jadwal){
			$this->db->where('id_jadwal', $id_jadwal);
			$this->db->delete('jadwal_tanggal');
			return $this->db->affected_rows();
		}

		public function view_data_berita(){
			$this->db->select('*');
			$this->db->from('berita');
			$query = $this->db->get();
			return $query->result();
		}

		public function insert_jadwal_seleksi($nama_seleksi,$sesi,$kelompok,$tgl,$waktu_mulai,$waktu_selesai,$id_ruangan){
			$data = array(
				'nama_seleksi' => $nama_seleksi,
				'sesi' => $sesi,
				'kelompok' => $kelompok,
				'tgl' => $tgl,
				'waktu_mulai' => $waktu_mulai,
				'waktu_selesai' => $waktu_selesai,
				'id_ruangan' => $id_ruangan
			);

			$this->db->insert('jadwal_seleksi',$data);
			$result = $this->db->affected_rows();
			return $result;
		}

		public function delete_jadwal_seleksi($id_seleksi){
			$this->db->where('id_seleksi', $id_seleksi);
			$this->db->delete('jadwal_seleksi');
			return $this->db->affected_rows();
		}

		public function edit_jadwal_seleksi($seleksi,$sesi,$kelompok,$tgl,$waktu_mulai,$waktu_selesai,$id_ruangan,$id_seleksi){
			$data = array(
				'nama_seleksi' => $seleksi, 
				'sesi' => $sesi,
				'kelompok' => $kelompok,
				'tgl' =>  $tgl,
				'waktu_mulai' => $waktu_mulai,
				'waktu_selesai' => $waktu_selesai,
				'id_ruangan' => $id_ruangan
			);
			$this->db->where('id_seleksi',$id_seleksi);
			$this->db->update('jadwal_seleksi', $data);
			$result = $this->db->affected_rows();
			return $result;
		}

		public function data_jadwal_seleksi(){
			$this->db->select('*');
			$this->db->from('jadwal_seleksi');
			$this->db->join('ruangan','ruangan.id_ruangan=jadwal_seleksi.id_ruangan','left');
			$query = $this->db->get();
			return $query->result();
		}

		public function data_jadwal_seleksi_per_id($id_seleksi){
			$this->db->select('*');
			$this->db->from('jadwal_seleksi');
			$where = array(
				'id_seleksi' => $id_seleksi
			);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}

		public function data_jadwal_daftar_ulang(){
			$this->db->select('*');
			$this->db->from('jadwal_tanggal');
			$this->db->where('jenis','Daftar Ulang');
			$query = $this->db->get();
			return $query->result();
		}

		public function insert_jadwal_daftar_ulang($nama_kegiatan,$keterangan,$tgl_mulai,$tgl_selesai,$ta){
			$data = array(
				'nama_kegiatan' => $nama_kegiatan,
				'keterangan' => $keterangan,
				'tgl_mulai' => $tgl_mulai,
				'tgl_selesai' => $tgl_selesai,
				'ta' => $ta,
				'status' => 'Belum',
				'jenis' => 'Daftar Ulang'
			);

			$this->db->insert('jadwal_tanggal',$data);
			$result = $this->db->affected_rows();
			return $result;
		}

		public function data_jadwal_daftar_ulang_per_id($id_jadwal){
			$tahun = date('Y');
			$tahun = intval($tahun);
			$ta = ($tahun).'/'.($tahun+1);

			$this->db->select('*');
			$this->db->from('jadwal_tanggal');
			$where = array(
				'id_jadwal' => $id_jadwal,
				'ta' => $ta
			);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}

		public function edit_jadwal_daftar_ulang($id_jadwal,$nama_kegiatan,$keterangan,$tgl_mulai,$tgl_selesai,$ta,$status){
			$data = array(
				'nama_kegiatan' => $nama_kegiatan,
				'keterangan' => $keterangan,
				'tgl_mulai' => $tgl_mulai,
				'tgl_selesai' => $tgl_selesai,
				'ta' => $ta,
				'status' => $status,
				'jenis' => 'Daftar Ulang'
			);

			$this->db->where('id_jadwal', $id_jadwal);
			$this->db->update('jadwal_tanggal', $data);
			$query = $this->db->affected_rows();
			return $query;
		}

		public function delete_jadwal_daftar_ulang($id_jadwal){
			$this->db->where('id_jadwal', $id_jadwal);
			$this->db->delete('jadwal_tanggal');
			return $this->db->affected_rows();
		}

		public function view_data_pendaftar(){
			$this->db->select('*');
			$this->db->from('formulir');
			$this->db->join('ket_siswa','ket_siswa.no_pendaftaran=formulir.no_pendaftaran','left');
			$this->db->join('ket_ortu','ket_ortu.no_pendaftaran=formulir.no_pendaftaran','left');
			$this->db->join('ket_wali','ket_wali.no_pendaftaran=formulir.no_pendaftaran','left');
			$this->db->join('asal_mula','asal_mula.no_pendaftaran=formulir.no_pendaftaran','left');
			$query = $this->db->get();
			return $query->result();
		}

		public function view_nilai_ops(){
			$this->db->select('*');
			$this->db->from('penilaian_ops');
			$this->db->order_by('total','ASC');
			$query = $this->db->get();
			return $query->result();
		}

		public function view_nilai_ops_per_no_pendaftaran($no_pendaftaran){
			$this->db->select('*');
			$this->db->from('penilaian_ops');
			$where = array(
				'no_pendaftaran' => $no_pendaftaran
			);
			$this->db->where($where);
			$this->db->order_by('total','ASC');
			$query = $this->db->get();
			return $query->result();
		}

		public function insert_nilai_ops($self_identity,$part_of_body,$observation,$math_counting,$writing_reading,$pengetahuan_agama,$sikap,$keterangan,$total,$status,$no_pendaftaran){
			$data = array(
				'self_identity' => $self_identity,
				'part_of_body' => $part_of_body,
				'observation' => $observation,
				'math_counting' => $math_counting,
				'writing_reading' => $writing_reading,
				'pengetahuan_agama' => $pengetahuan_agama,
				'sikap' => $sikap,
				'keterangan' => $keterangan,
				'total' => $total,
				'status' => $status
			);

			$this->db->where('no_pendaftaran',$no_pendaftaran);
			$this->db->update('penilaian_ops',$data);
			return $this->db->affected_rows();
		}

		public function edit_nilai_ops($self_identity,$part_of_body,$observation,$math_counting,$writing_reading,$pengetahuan_agama,$sikap,$keterangan,$total,$status,$no_pendaftaran){
			$data = array(
				'self_identity' => $self_identity,
				'part_of_body' => $part_of_body,
				'observation' => $observation,
				'math_counting' => $math_counting,
				'writing_reading' => $writing_reading,
				'pengetahuan_agama' => $pengetahuan_agama,
				'sikap' => $sikap,
				'keterangan' => $keterangan,
				'total' => $total,
				'status' => $status
			);

			$this->db->where('no_pendaftaran',$no_pendaftaran);
			$this->db->update('penilaian_ops',$data);
			return $this->db->affected_rows();
		}

		public function view_nilai_ok(){
			$this->db->select('*');
			$this->db->from('penilaian_ok');
			$this->db->order_by('total','ASC');
			$query = $this->db->get();
			return $query->result();
		}

		public function view_nilai_ok_per_no_pendaftaran($no_pendaftaran){
			$this->db->select('*');
			$this->db->from('penilaian_ok');
			$this->db->where('no_pendaftaran',$no_pendaftaran);
			$query = $this->db->get();
			return $query->result();
		}

		public function input_nilai_ok($no_pendaftaran,$koordinasi_keseimbangan,$sosial,$pengendalian_gerak,$total,$status){
			$data = array(
				'koordinasi_keseimbangan' => $koordinasi_keseimbangan,
				'sosial' => $sosial,
				'pengendalian_gerak' => $pengendalian_gerak,
				'total' => $total,
				'status' => $status
			);
			$this->db->where('no_pendaftaran',$no_pendaftaran);
			$this->db->update('penilaian_ok',$data);
			return $this->db->affected_rows();
		}

		public function edit_nilai_ok($no_pendaftaran,$koordinasi_keseimbangan,$sosial,$pengendalian_gerak,$total,$status){
			$data = array(
				'koordinasi_keseimbangan' => $koordinasi_keseimbangan,
				'sosial' => $sosial,
				'pengendalian_gerak' => $pengendalian_gerak,
				'total' => $total,
				'status' => $status
			);
			$this->db->where('no_pendaftaran',$no_pendaftaran);
			$this->db->update('penilaian_ok',$data);
			return $this->db->affected_rows();
		}

		public function view_nilai_rekap(){
			$this->db->select('*');
			$this->db->from('rekap_nilai_seleksi');
			$query = $this->db->get();
			return $query->result();
		}

		public function view_nilai_rekap_per_no_pendaftaran($no_pendaftaran){
			$this->db->select('*');
			$this->db->from('rekap_nilai_seleksi');
			$this->db->where('no_pendaftaran',$no_pendaftaran);
			$query = $this->db->get();
			return $query->result();
		}

		public function edit_nilai_rekap($status,$no_pendaftaran){
			$data = array(
				'status' => $status
			);

			$this->db->where('no_pendaftaran',$no_pendaftaran);
			$this->db->update('rekap_nilai_seleksi',$data);
			return $this->db->affected_rows();
		}

















		public function jumlah_notifikasi(){
			$this->db->select('COUNT(*) as jumlah');
			$this->db->from('notifikasi_panitia');
			$where = array(
				'status' => 'Belum'
			);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}

		public function notifikasi(){
			$this->db->select('*');
			$this->db->from('notifikasi_panitia');
			$where = array(
				'status' => 'Belum'
			);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}

		public function buku_tamu(){
			$this->db->select('*');
			$this->db->from('buku_tamu');
			$query = $this->db->get();
			return $query->result();
		}

		public function status_formulir(){
			$this->db->select('*');
			$this->db->from('pendaftar');
			$this->db->join('ket_siswa','ket_siswa.no_hp=pendaftar.no_hp','left');
			$this->db->join('asal_mula','asal_mula.id_formulir=ket_siswa.id_formulir','left');
			$query = $this->db->get();
			return $query->result();
		}

		public function status_bayar(){
			$this->db->select('*');
			$this->db->from('pendaftar');
			$query = $this->db->get();
			return $query->result();
		}

		public function cek_formulir($no_hp){
			$this->db->select('*');
			$this->db->from('ket_siswa');
			$where=array('no_hp'=>$no_hp);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->num_rows();
		}

		

		public function data_ruangan(){
			$this->db->select('*');
			$this->db->from('ruangan');
			$where = array(
				'kapasitas>' => 0
			);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}
	}