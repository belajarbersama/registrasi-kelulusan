<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Kesiswaan_M extends CI_Model{
		function __construct(){
			parent::__construct();
		}

		public function view_jadwal_pengambilan_ijazah(){
			$this->db->select('*');
			$this->db->from('jadwal_pengambilan_ijazah');
			$query = $this->db->get();
			return $query ->result();
		}

		public function insert_jadwal_pengambilan_ijazah($nama_kegiatan,$keterangan,$tgl_mulai,$tgl_selesai,$ta){
			$data = array(
				'nama_kegiatan' => $nama_kegiatan,
				'keterangan' => $keterangan,
				'tgl_mulai' => $tgl_mulai,
				'tgl_selesai' => $tgl_selesai,
				'ta' => $ta
			);

			$this->db->insert('jadwal_pengambilan_ijazah',$data);
			$result = $this->db->affected_rows();
			return $result;
		}

		public function data_jadwal_pengambilan_ijazah_per_id($id_jadwal){
			$tahun = date('Y');
			$tahun = intval($tahun);
			$ta = ($tahun).'/'.($tahun+1);

			$this->db->select('*');
			$this->db->from('jadwal_pengambilan_ijazah');
			$where = array(
				'id_jadwal' => $id_jadwal,
				'ta' => $ta
			);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}

		public function edit_jadwal_pengambilan_ijazah($id_jadwal,$nama_kegiatan,$keterangan,$tgl_mulai,$tgl_selesai,$ta){

			$data = array(
				'nama_kegiatan' => $nama_kegiatan,
				'keterangan' => $keterangan,
				'tgl_mulai' => $tgl_mulai,
				'tgl_selesai' => $tgl_selesai,
				'ta' => $ta
			);

			$this->db->where('id_jadwal', $id_jadwal);
			$this->db->update('jadwal_pengambilan_ijazah', $data);
			$query = $this->db->affected_rows();
			return $query;
		}

		public function delete_jadwal_pengambilan_ijazah($id_jadwal){
			$this->db->where('id_jadwal', $id_jadwal);
			$this->db->delete('jadwal_pengambilan_ijazah');
			return $this->db->affected_rows();
		}

		public function view_jadwal_her_registrasi(){
			$this->db->select('*');
			$this->db->from('jadwal_her_registrasi');
			$query = $this->db->get();
			return $query ->result();
		}

		public function insert_jadwal_her_registrasi($nama_kegiatan,$keterangan,$tgl_mulai,$tgl_selesai,$ta){
			$data = array(
				'nama_kegiatan' => $nama_kegiatan,
				'keterangan' => $keterangan,
				'tgl_mulai' => $tgl_mulai,
				'tgl_selesai' => $tgl_selesai,
				'ta' => $ta,
				'status' => 'Belum'
			);

			$this->db->insert('jadwal_her_registrasi',$data);
			$result = $this->db->affected_rows();
			return $result;
		}

		public function data_jadwal_her_registrasi_per_id($id_jadwal){
			$tahun = date('Y');
			$tahun = intval($tahun);
			$ta = ($tahun).'/'.($tahun+1);

			$this->db->select('*');
			$this->db->from('jadwal_her_registrasi');
			$where = array(
				'id_jadwal' => $id_jadwal,
				'ta' => $ta
			);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}

		public function edit_jadwal_her_registrasi($id_jadwal,$nama_kegiatan,$keterangan,$tgl_mulai,$tgl_selesai,$ta,$status){

			$data = array(
				'nama_kegiatan' => $nama_kegiatan,
				'keterangan' => $keterangan,
				'tgl_mulai' => $tgl_mulai,
				'tgl_selesai' => $tgl_selesai,
				'ta' => $ta,
				'status' => $status
			);

			$this->db->where('id_jadwal', $id_jadwal);
			$this->db->update('jadwal_her_registrasi', $data);
			$query = $this->db->affected_rows();
			return $query;
		}

		public function delete_jadwal_her_registrasi($id_jadwal){
			$this->db->where('id_jadwal', $id_jadwal);
			$this->db->delete('jadwal_her_registrasi');
			return $this->db->affected_rows();
		}

		public function view_jadwal_buku_seragam(){
			$this->db->select('*');
			$this->db->from('jadwal_buku_seragam');
			$query = $this->db->get();
			return $query ->result();
		}

		public function insert_jadwal_buku_seragam($nama_kegiatan,$keterangan,$tgl_mulai,$tgl_selesai,$ta){
			$data = array(
				'nama_kegiatan' => $nama_kegiatan,
				'keterangan' => $keterangan,
				'tgl_mulai' => $tgl_mulai,
				'tgl_selesai' => $tgl_selesai,
				'ta' => $ta
			);

			$this->db->insert('jadwal_buku_seragam',$data);
			$result = $this->db->affected_rows();
			return $result;
		}

		public function data_jadwal_buku_seragam_per_id($id_jadwal){
			$tahun = date('Y');
			$tahun = intval($tahun);
			$ta = ($tahun).'/'.($tahun+1);

			$this->db->select('*');
			$this->db->from('jadwal_buku_seragam');
			$where = array(
				'id_jadwal' => $id_jadwal,
				'ta' => $ta
			);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}

		public function edit_jadwal_buku_seragam($id_jadwal,$nama_kegiatan,$keterangan,$tgl_mulai,$tgl_selesai,$ta){

			$data = array(
				'nama_kegiatan' => $nama_kegiatan,
				'keterangan' => $keterangan,
				'tgl_mulai' => $tgl_mulai,
				'tgl_selesai' => $tgl_selesai,
				'ta' => $ta
			);

			$this->db->where('id_jadwal', $id_jadwal);
			$this->db->update('jadwal_buku_seragam', $data);
			$query = $this->db->affected_rows();
			return $query;
		}

		public function delete_jadwal_buku_seragam($id_jadwal){
			$this->db->where('id_jadwal', $id_jadwal);
			$this->db->delete('jadwal_buku_seragam');
			return $this->db->affected_rows();
		}
	}