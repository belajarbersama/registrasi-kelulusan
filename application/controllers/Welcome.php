<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Welcome extends CI_Controller {

		function __construct(){
			parent::__construct();
			$this->load->model('Welcome_M');
			$this->load->model('Pendaftar_M');
		}

		public function index(){
			$data = array(
				'section' => 'public/welcome'
			);
			$this->parser->parse('welcome_message',$data);
		}

		public function berita(){
			$jadwal = $this->Welcome_M->get_jadwal_ppdb();
			$data = array(
				'section' => 'public/berita',
				'page' => 'BERITA',
				'sub' => 'BERITA DAN JADWAL PPDB',
				'data_jadwal' => $jadwal
			);
			$this->parser->parse('welcome_message',$data);
		}

		public function jadwal_seleksi(){
			$jadwal = $this->Welcome_M->get_jadwal_seleksi();
			$data = array(
				'section' => 'public/jadwal_seleksi',
				'page' => 'JADWAL SELEKSI',
				'sub' => '',
				'data_jadwal' => $jadwal
			);
			$this->parser->parse('welcome_message',$data);
		}

		public function buku_tamu(){
			$data = array(
				'body' => 'buku_tamu'
			);
			$this->parser->parse('assets',$data);
		}

		public function login(){
			$data = array(
				'body' => 'login'
			);
			$this->parser->parse('assets',$data);
		}

		public function reset(){
			$data = array(
				'body' => 'recover_password'
			);

			$this->session->set_flashdata('pesan','<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Masukan alamat <b>Email</b> Anda dan instruksi reset password akan dikirim!</div>');
			$this->parser->parse('assets',$data);
		}

		public function lock_screen(){
			$data = array(
				'body' => 'lockscreen'
			);
			$this->parser->parse('assets',$data);
		}

		public function reset_password(){
			$data = array(
				'body' => 'reset_password'
			);
			$this->parser->parse('assets',$data);
		}

		public function setting(){
			$no_hp = $this->session->userdata('no_hp');
			$jumlah = $this->Pendaftar_M->jumlah_notifikasi($no_hp);
			$notifikasi = $this->Pendaftar_M->notifikasi($no_hp);
			$profile = $this->Pendaftar_M->profile($no_hp);

			$data = array(
				'jumlah' => $jumlah,
				'content' => 'dashboard/settings',
				'notifikasi' => $notifikasi
			);

			$this->parser->parse('dashboard/index',$data);
		}

		public function update_profile_picture(){
			$email = ''.$this->session->userdata('email');
			$config['upload_path'] = 'uploads/avatar';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']     = 10000;
			$config['max_filename'] = 0;
			$config['file_name'] = '081322361256';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if (!$this->upload->do_upload('avatar')){
				$no_hp = $this->session->userdata('no_hp');
				$notifikasi = $this->Pendaftar_M->notifikasi($no_hp);
				$jumlah = $this->Pendaftar_M->jumlah_notifikasi($no_hp);

				$data = array(
					'content' => 'dashboard/settings',
					'jumlah' => $jumlah,
					'notifikasi' => $notifikasi,
					'error' => $this->upload->display_errors(),
					'username' => $this->session->userdata('username')
				);

				$this->parser->parse('dashboard/index',$data);
			} else {
				$upload_data = $this->upload->data();

		        //resize:

		        $config['image_library'] = 'gd2';
		        $config['source_image'] = $upload_data['full_path'];
		        $config['maintain_ratio'] = TRUE;
		        $config['width']     = 128;
		        $config['height']   = 128;

		        $this->load->library('image_lib', $config); 

		        $this->image_lib->resize();

		        var_dump($upload_data);
			}
		}
	}