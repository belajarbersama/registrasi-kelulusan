<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Welcome_M extends CI_Model{
		
		function __construct(){
			parent::__construct();
		}

		public function get_jadwal_ppdb(){
			$this->db->select('*');
			$this->db->from('jadwal_ppdb');
			$query = $this->db->get();
			return $query->result();
		}

		public function get_jadwal_seleksi(){
			$this->db->select('*');
			$this->db->from('jadwal_seleksi');
			$this->db->join('ruangan','jadwal_seleksi.id_ruangan=ruangan.id_ruangan','left');
			$query = $this->db->get();
			return $query->result();
		}

		public function update_profile($profile,$username){
			$data = array(
				'profile' => $profile
			);
			$this->db->where('username',$username);
			$this->db->update('akun',$data);
			return $this->db->affected_rows();
		}
	}
