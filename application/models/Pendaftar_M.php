<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Pendaftar_M extends CI_Model{
		
		function __construct(){
			parent::__construct();
		}

		public function insert_data_siswa($nik,$nama_lengkap,$nama_panggilan,$jekel,$tgl_lahir,$tempat_lahir,$agama,$kewarganegaraan,$anak_ke,$jumlah_saudara_kandung,$jumlah_saudara_tiri,$jumlah_saudara_angkat,$bahasa_sehari,$berat_badan,$tinggi_badan,$goda,$penyakit_derita,$alamat_rumah,$rt,$rw,$kelurahan,$kecamatan,$kota_kabupaten,$provinsi,$kode_area,$telp_rumah,$no_hp,$kode_pos,$tempat_tinggal,$jarak_rumah_sekolah,$no_pendaftaran){

			$data = array(
				'nik'=>$nik, 'nama_lengkap'=>$nama_lengkap, 'nama_panggilan'=>$nama_panggilan, 'jekel'=>$jekel,
				'tgl_lahir'=>$tgl_lahir, 'tempat_lahir'=>$tempat_lahir, 'agama'=>$agama,
				'kewarganegaraan'=>$kewarganegaraan, 'anak_ke'=>$anak_ke,
				'jumlah_saudara_kandung'=>$jumlah_saudara_kandung, 'jumlah_saudara_tiri'=>$jumlah_saudara_tiri,
				'jumlah_saudara_angkat'=>$jumlah_saudara_angkat, 'bahasa_sehari'=>$bahasa_sehari,
				'berat_badan'=>$berat_badan, 'tinggi_badan'=>$tinggi_badan, 'goda'=>$goda,
				'penyakit_derita'=>$penyakit_derita, 'alamat_rumah'=>$alamat_rumah, 'rt'=>$rt, 'rw'=>$rw,
				'kelurahan'=>$kelurahan, 'kecamatan'=>$kecamatan, 'kota_kabupaten'=>$kota_kabupaten,
				'provinsi'=>$provinsi, 'kode_area'=>$kode_area, 'telp_rumah'=>$telp_rumah, 'kode_pos'=>$kode_pos,
				'tempat_tinggal'=>$tempat_tinggal, 'jarak_rumah_sekolah' => $jarak_rumah_sekolah
			);

			$where = array(
				'no_hp' => $no_hp,
				'no_pendaftaran' => $no_pendaftaran
			);

			$this->db->where($where);
			$this->db->update('ket_siswa',$data);
			$result = $this->db->affected_rows();
			return $result;
		}

		public function insert_data_ortu($id_ortu,$nama_ayah,$nama_ibu,$pdd_ayah,$pdd_ibu,$pekerjaan_ayah,$nama_perusahaan_ayah,$alamat_perusahaan_ayah,$email_kantor_ayah,$pekerjaan_ibu,$nama_perusahaan_ibu,$alamat_perusahaan_ibu,$email_kantor_ibu,$no_pendaftaran,$no_hp){

			$data = array(
				'id_ortu'=>$id_ortu, 'nama_ayah'=>$nama_ayah, 'nama_ibu'=>$nama_ibu, 'pdd_ayah'=>$pdd_ayah,
				'pdd_ibu'=>$pdd_ibu, 'pekerjaan_ayah'=>$pekerjaan_ayah,
				'nama_perusahaan_ayah'=>$nama_perusahaan_ayah, 'alamat_perusahaan_ayah'=>$alamat_perusahaan_ayah,
				'email_kantor_ayah'=>$email_kantor_ayah, 'pekerjaan_ibu'=>$pekerjaan_ibu,
				'nama_perusahaan_ibu'=>$nama_perusahaan_ibu, 'alamat_perusahaan_ibu'=>$alamat_perusahaan_ibu,
				'email_kantor_ibu'=>$email_kantor_ibu, 'no_pendaftaran'=>$no_pendaftaran, 'no_hp'=>$no_hp
			);

			$this->db->insert('ket_ortu',$data);
			$result = $this->db->affected_rows();
			return $result;
		}

		public function insert_data_wali($id_wali,$nama_wali,$pdd_wali,$hubungan_keluarga,$alamat_rumah,$rt,$rw,$kelurahan,$kecamatan,$kota_kabupaten,$provinsi,$kode_area,$telp_rumah,$no_hp,$kode_pos,$pekerjaan_wali,$nama_perusahaan,$alamat_perusahaan,$email_wali,$no_pendaftaran){
			
			$data = array(
				'id_wali'=>$id_wali, 'nama_wali'=>$nama_wali, 'pdd_wali'=>$pdd_wali,
				'hubungan_keluarga'=>$hubungan_keluarga, 'alamat_rumah'=>$alamat_rumah, 'rt'=>$rt, 'rw'=>$rw,
				'kelurahan'=>$kelurahan, 'kecamatan'=>$kecamatan, 'kota_kabupaten'=>$kota_kabupaten,
				'provinsi'=>$provinsi, 'kode_area'=>$kode_area, 'telp_rumah'=>$telp_rumah, 'no_hp'=>$no_hp,
				'kode_pos'=>$kode_pos, 'pekerjaan_wali'=>$pekerjaan_wali, 'nama_perusahaan'=>$nama_perusahaan,
				'alamat_perusahaan'=>$alamat_perusahaan, 'email_wali'=>$email_wali,
				'no_pendaftaran'=>$no_pendaftaran 
			);

			$this->db->insert('ket_wali',$data);
			$query = $this->db->affected_rows();
			return $query;
		}

		public function insert_data_asal($asal_anak,$nama_asal,$no_tahun_sk,$lama_belajar,$tanggal_terima,$no_pendaftaran,$no_hp){
			$data = array(
				'asal_anak' => $asal_anak,
				'nama_asal' => $nama_asal,
				'no_tahun_sk' => $no_tahun_sk,
				'lama_belajar' => $lama_belajar,
				'tgl_terima' => $tanggal_terima,
				'no_pendaftaran' => $no_pendaftaran
			);

			$notifikasi = array(
				'no_pendaftaran' => $no_pendaftaran,
				'no_hp' => $no_hp,
				'keterangan' => 'Silakan melakukan pembayaran administrasi psikotest',
				'jenis' => 'pembayaran',
				'status' => 'Belum'
			);

			$this->db->insert('asal_mula', $data);
			$this->db->insert('notifikasi_pendaftar',$notifikasi);
			$query = $this->db->affected_rows();
			return $query;
		}

		public function cek_data_siswa($no_pendaftaran){
			$this->db->select('nik');
			$this->db->from('ket_siswa');
			$where = array(
				'no_pendaftaran' => $no_pendaftaran
			);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}

		public function cek_data_ortu($no_pendaftaran){
			$this->db->select('nama_ayah');
			$this->db->from('ket_ortu');
			$where = array(
				'no_pendaftaran' => $no_pendaftaran
			);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}

		public function cek_data_wali($no_pendaftaran){
			$this->db->select('nama_wali');
			$this->db->from('ket_wali');
			$where = array(
				'no_pendaftaran' => $no_pendaftaran
			);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}

		public function cek_data_asal_mula($no_pendaftaran){
			$this->db->select('asal_anak');
			$this->db->from('asal_mula');
			$where = array(
				'no_pendaftaran' => $no_pendaftaran
			);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}

		public function view_data_siswa($no_pendaftaran,$no_hp){
			$this->db->select('*');
			$this->db->from('ket_siswa');
			$where = array(
				'no_pendaftaran' => $no_pendaftaran,
				'no_hp' => $no_hp
			);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}

		public function view_data_ortu($no_pendaftaran){
			$this->db->select('*');
			$this->db->from('ket_ortu');
			$where = array(
				'no_pendaftaran' => $no_pendaftaran
			);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}

		public function view_data_wali($no_pendaftaran){
			$this->db->select('*');
			$this->db->from('ket_wali');
			$where = array('no_pendaftaran' => $no_pendaftaran
			);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}
		
		public function view_data_asal($no_pendaftaran){
			$this->db->select('*');
			$this->db->from('asal_mula');
			$where = array(
				'no_pendaftaran' => $no_pendaftaran
			);

			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}

		public function get_ds_id($id_formulir,$no_hp){
			$this->db->select('*');
			$this->db->from('ket_siswa');
			$where = array(
				'id_formulir' =>$id_formulir,
				'no_hp' => $no_hp
			);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}

		public function jumlah_notifikasi($no_hp){
			$this->db->select('COUNT(*) as jumlah');
			$this->db->from('notifikasi_pendaftar');
			$where = array(
				'no_hp' => $no_hp,
				'status' => 'Belum'
			);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}

		public function notifikasi($no_hp){
			$this->db->select('*');
			$this->db->from('notifikasi_pendaftar');
			$where = array(
				'no_hp' => $no_hp,
				'status' => 'Belum'
			);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}

		public function upload_bukti_bayar($no_pendaftaran,$nama_pembayaran,$bukti_bayar,$no_hp){
			$this->db->query("CALL proc_pembayaran_psikotest('".$no_pendaftaran."','".$nama_pembayaran."','".$bukti_bayar."','".$no_hp."')");
			return $this->db->affected_rows();
		}

		public function profile($no_hp){
			$this->db->select('*');
			$this->db->from('buku_tamu');
			$this->db->join('ket_siswa','buku_tamu.no_hp=ket_siswa.no_hp');
			$this->db->where('buku_tamu.no_hp',$no_hp);
			$query = $this->db->get();
			return $query->result();
		}
	}