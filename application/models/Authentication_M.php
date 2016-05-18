<?php defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Authentication_M extends CI_Model{

		function __construct(){
			parent::__construct();
		}

		public function pendaftaran($identitas,$nama,$alamat,$no_hp,$email,$asal){
			$query = $this->db->query("CALL proc_insert_pendaftaran('".$identitas."','".$nama."','".$alamat."','".$no_hp."','".$email."','".$asal."')");
			$result = $this->db->affected_rows();
			return $result;
		}

		public function cek_identitas($identitas){
			$this->db->select('id_buku_tamu');
			$this->db->from('buku_tamu');
			$where = array('id_buku_tamu' => $identitas);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->num_rows();
		}

		public function cek_no_hp_daftar($no_hp){
			$this->db->select('no_hp');
			$this->db->from('buku_tamu');
			$where = array('no_hp'=>$no_hp);
			$this->db->where($where);
			$query = $this->db->get();
			$row = $query->num_rows();
			return $row;
		}

		public function cek_email($email){
			$this->db->select('username');
			$this->db->from('akun');
			$where = array('email' => $email);
			$this->db->where($where);
			$query = $this->db->get();
			$row = $query->num_rows();
			return $row;
		}

		public function cek_no_hp($no_hp){
			$this->db->select('no_hp');
			$this->db->from('buku_tamu');
			$where = array('no_hp' => $no_hp);
			$this->db->where($where);
			$query = $this->db->get();
			$row = $query->num_rows();
			return $row;
		}

		public function cek_status($username){
			$this->db->select('status');
			$this->db->from('akun');
			$where = array('username' => $username);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}

		public function cek_password($username){
			$this->db->select('password');
			$this->db->from('akun');
			$where = array('username' => $username);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}

		public function masuk($username,$password){
			$this->db->select('*');
			$this->db->from('akun');
			$where = array(
				'username' => $username,
				'password' => $password
			);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}

		public function masuk_pendaftar($username,$password){
			$this->db->select('*');
			$this->db->from('akun');
			$this->db->join('formulir','akun.email=formulir.email');
			$this->db->join('buku_tamu','formulir.email=buku_tamu.email');
			$where = array(
				'username' => $username,
				'password' => $password
			);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}

		public function masuk_ortu($username,$password){
			$this->db->select('*');
			$this->db->from('akun');
			$this->db->join('formulir','akun.email=formulir.email');
			$where = array(
				'username' => $username,
				'password' => $password
			);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}

		public function FunctionName(){
			# code...
		}

		public function verifikasi($no_hp,$email,$pesan){
			$where = array(
				'password' => md5($no_hp),
				'email' => $email
			);
			$this->db->set('status','Aktif');
			$this->db->where($where);
			$this->db->update('akun');

			$data = array(
				'DestinationNumber' => $no_hp,
				'TextDecoded' => $pesan,
				'CreatorID' => 'Panitia PPDB\n SD Ar-Rafi'
			);
			$this->db->insert('outbox',$data);
			return $this->db->affected_rows();
		}

		public function reset_password($email,$password_lama,$password_baru){
			$where = array(
				'password' => $password_lama,
				'username' => $email
			);
			$this->db->set('password',$password_baru);
			$this->db->where($where);
			$this->db->update('akun');
			return $this->db->affected_rows();
		}
	}