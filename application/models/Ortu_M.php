<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Ortu_M extends CI_Model{
		function __construct(){
			parent::__construct();
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

		public function unggah_berkas($no_pendaftaran,$nama_akta,$akta_kelahiran,$nama_ktp,$ktp,$nama_kk,$kartu_keluarga,$nama_sk,$surat_keterangan){
			$data = array(
				'nama_akta' => $nama_akta,
				'akta_kelahiran' => $akta_kelahiran,
				'nama_ktp' => $nama_ktp,
				'ktp' => $ktp,
				'nama_kk' => $nama_kk,
				'kartu_keluarga' => $kartu_keluarga,
				'nama_sk' => $nama_sk,
				'surat_keterangan' => $surat_keterangan,
				'status' => 'Belum'
			);

			$this->db->where('no_pendaftaran',$no_pendaftaran);
			$this->db->update('dokumen_daftar_ulang',$data);
			return $this->db->affected_rows();
		}

		public function view_unggah_berkas_per_no_pendaftaran($no_pendaftaran){
			$this->db->select('*');
			$this->db->from('dokumen_daftar_ulang');
			$this->db->where('no_pendaftaran',$no_pendaftaran);
			$query = $this->db->get();
			return $query->result();
		}

		public function view_unggah_pembayaran_per_no_pendaftaran($no_pendaftaran){
			$this->db->select('*');
			$this->db->from('pembayaran_daftar_ulang');
			$this->db->where('no_pendaftaran',$no_pendaftaran);
			$query = $this->db->get();
			return $query->result();
		}

		public function unggah_pembayaran($no_pendaftaran,$jumlah_bayar,$nama_bayar,$bukti_bayar,$sisa_bayar){
			$data = array(
				'jumlah_bayar' => $jumlah_bayar,
				'nama_bayar' => $nama_bayar,
				'bukti_bayar' => $bukti_bayar,
				'sisa_bayar' => $sisa_bayar,
				'status' => 'Belum'
 			);

			$this->db->where('no_pendaftaran',$no_pendaftaran);
			$this->db->update('pembayaran_daftar_ulang',$data);
			return $this->db->affected_rows();
		}
	}