<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Kesiswaan_C extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->model('Kesiswaan_M');
		}

		public function lihat_jadwal_pengambilan_ijazah(){
			$result = $this->Kesiswaan_M->view_jadwal_pengambilan_ijazah();

			$data = array(
				'data_jadwal' => $result,
				'content' => 'dashboard/kesiswaan/view_jadwal_pengambilan_ijazah',
				'page' => 'Jadwal Pengambilan Ijazah',
				'toolbar' => 'Jadwal Pengambilan Ijazah'
			);

			$this->parser->parse('dashboard/index',$data);
		}

		public function form_buat_jadwal_pengambilan_ijazah(){
			$data = array(
				'page' => 'Buat Jadwal Pengambilan Ijazah',
				'content' => 'dashboard/kesiswaan/form_jadwal_pengambilan_ijazah',
				'toolbar' => 'Jadwal Pengambilan Ijazah'
			);

			$this->parser->parse('dashboard/index',$data);
		}

		public function buat_jadwal_pengambilan_ijazah(){
			$this->form_validation->set_rules('nama_kegiatan','Nama Kegiatan','required');
			$this->form_validation->set_rules('keterangan','Keterangan','required');
			$this->form_validation->set_rules('tgl_mulai','Tanggal Mulai','required|callback_tanggal_mulai_check');
			$this->form_validation->set_rules('tgl_selesai','Tanggal Selesai','required|callback_tanggal_selesai_check');

			if ($this->form_validation->run()==false) {
				$data = array(
					'page' => 'Buat Jadwal Pengambilan Ijazah',
					'content' => 'dashboard/kesiswaan/form_jadwal_pengambilan_ijazah',
					'toolbar' => 'Jadwal Pengambilan Ijazah'
				);

				$this->parser->parse('dashboard/index',$data);
			} else {
				$nama_kegiatan = $this->input->post('nama_kegiatan');
				$keterangan = $this->input->post('keterangan');
				$tgl_mulai = $this->input->post('tgl_mulai');
				$tgl_selesai = $this->input->post('tgl_selesai');

				$tahun = date('Y');
				$tahun = intval($tahun);

				$ta = ($tahun).'/'.($tahun+1);

				$result = $this->Kesiswaan_M->insert_jadwal_pengambilan_ijazah($nama_kegiatan,$keterangan,$tgl_mulai,$tgl_selesai,$ta);

				if ($result>0) {
					$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Buat Jadwal Pengambilan Ijazah </div>');
					redirect('Kesiswaan_C/lihat_jadwal_pengambilan_ijazah');
				} else {
					$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal Buat Jadwal Pengambilan Ijazah </div>');
					redirect('Kesiswaan_C/lihat_jadwal_pengambilan_ijazah');
				}
			}
		}

		public function edit_jadwal_pengambilan_ijazah(){
			$nama_kegiatan = $this->input->post('nama_kegiatan');
			$keterangan = $this->input->post('keterangan');
			$tgl_mulai = $this->input->post('tgl_mulai');
			$tgl_selesai = $this->input->post('tgl_selesai');
			$ta = $this->input->post('ta');
			$id_jadwal = $this->input->post('id_jadwal');

			$result = $this->Kesiswaan_M->data_jadwal_pengambilan_ijazah_per_id($id_jadwal);

			foreach ($result as $key => $value) {
				if ($keterangan=="") {
					$keterangan = $value->keterangan;
				}

				if ($tgl_mulai=="") {
					$tgl_mulai = $value->tgl_mulai;
				}

				if ($tgl_selesai=="") {
					$tgl_selesai = $value->tgl_selesai;
				}

				if ($ta=="") {
					$ta = $value->ta;
				}

				if ($nama_kegiatan=="") {
					$nama_kegiatan = $value->nama_kegiatan;
				}
			}

			$edit = $this->Kesiswaan_M->edit_jadwal_pengambilan_ijazah($id_jadwal,$nama_kegiatan,$keterangan,$tgl_mulai,$tgl_selesai,$ta);

			if ($edit>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Edit Jadwal Pengambilan Ijazah </div>');
					redirect('Kesiswaan_C/lihat_jadwal_pengambilan_ijazah');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal Edit Jadwal Pengambilan Ijazah </div>');
					redirect('Kesiswaan_C/lihat_jadwal_pengambilan_ijazah');
			}
		}

		public function hapus_jadwal_pengambilan_ijazah(){
			$id_jadwal = $this->uri->segment(3);

			$result = $this->Kesiswaan_M->delete_jadwal_pengambilan_ijazah($id_jadwal);

			if ($result>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Hapus Jadwal </div>');
				redirect('Kesiswaan_C/lihat_jadwal_pengambilan_ijazah');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal Hapus Jadwal </div>');
				redirect('Kesiswaan_C/lihat_jadwal_pengambilan_ijazah');
			}
		}

		public function lihat_jadwal_her_registrasi(){
			$result = $this->Kesiswaan_M->view_jadwal_her_registrasi();

			$data = array(
				'data_jadwal' => $result,
				'content' => 'dashboard/kesiswaan/view_jadwal_her_registrasi',
				'page' => 'Jadwal Her-Registrasi',
				'toolbar' => 'Jadwal Her-Registrasi'
			);

			$this->parser->parse('dashboard/index',$data);
		}

		public function form_buat_jadwal_her_registrasi(){
			$data = array(
				'page' => 'Buat Jadwal Her-Registrasi',
				'content' => 'dashboard/kesiswaan/form_jadwal_her_registrasi',
				'toolbar' => 'Jadwal Her-Registrasi'
			);

			$this->parser->parse('dashboard/index',$data);
		}

		public function buat_jadwal_her_registrasi(){
			$this->form_validation->set_rules('nama_kegiatan','Nama Kegiatan','required');
			$this->form_validation->set_rules('keterangan','Keterangan','required');
			$this->form_validation->set_rules('tgl_mulai','Tanggal Mulai','required|callback_tanggal_mulai_check');
			$this->form_validation->set_rules('tgl_selesai','Tanggal Selesai','required|callback_tanggal_selesai_check');

			if ($this->form_validation->run()==false) {
				$data = array(
					'page' => 'Buat Jadwal Her-Registrasi',
					'content' => 'dashboard/kesiswaan/form_jadwal_pengambilan_ijazah',
					'toolbar' => 'Jadwal Her-Registrasi'
				);

				$this->parser->parse('dashboard/index',$data);
			} else {
				$nama_kegiatan = $this->input->post('nama_kegiatan');
				$keterangan = $this->input->post('keterangan');
				$tgl_mulai = $this->input->post('tgl_mulai');
				$tgl_selesai = $this->input->post('tgl_selesai');

				$tahun = date('Y');
				$tahun = intval($tahun);

				$ta = ($tahun).'/'.($tahun+1);

				$result = $this->Kesiswaan_M->insert_jadwal_her_registrasi($nama_kegiatan,$keterangan,$tgl_mulai,$tgl_selesai,$ta);

				if ($result>0) {
					$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Buat Jadwal </div>');
					redirect('Kesiswaan_C/lihat_jadwal_her_registrasi');
				} else {
					$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal Buat Jadwal </div>');
					redirect('Kesiswaan_C/lihat_jadwal_her_registrasi');
				}
			}
		}

		public function edit_jadwal_her_registrasi(){
			$nama_kegiatan = $this->input->post('nama_kegiatan');
			$keterangan = $this->input->post('keterangan');
			$tgl_mulai = $this->input->post('tgl_mulai');
			$tgl_selesai = $this->input->post('tgl_selesai');
			$ta = $this->input->post('ta');
			$status = $this->input->post('status');
			$id_jadwal = $this->input->post('id_jadwal');

			$result = $this->Kesiswaan_M->data_jadwal_her_registrasi_per_id($id_jadwal);

			foreach ($result as $key => $value) {
				if ($keterangan=="") {
					$keterangan = $value->keterangan;
				}

				if ($tgl_mulai=="") {
					$tgl_mulai = $value->tgl_mulai;
				}

				if ($tgl_selesai=="") {
					$tgl_selesai = $value->tgl_selesai;
				}

				if ($ta=="") {
					$ta = $value->ta;
				}

				if ($nama_kegiatan=="") {
					$nama_kegiatan = $value->nama_kegiatan;
				}

				if ($status=="") {
					$status = $value->status;
				}
			}

			$edit = $this->Kesiswaan_M->edit_jadwal_her_registrasi($id_jadwal,$nama_kegiatan,$keterangan,$tgl_mulai,$tgl_selesai,$ta,$status);

			if ($edit>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Edit Jadwal </div>');
					redirect('Kesiswaan_C/lihat_jadwal_her_registrasi');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal Edit Jadwal </div>');
					redirect('Kesiswaan_C/lihat_jadwal_her_registrasi');
			}
		}

		public function hapus_jadwal_her_registrasi(){
			$id_jadwal = $this->uri->segment(3);

			$result = $this->Kesiswaan_M->delete_jadwal_her_registrasi($id_jadwal);

			if ($result>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Hapus Jadwal </div>');
				redirect('Kesiswaan_C/lihat_jadwal_her_registrasi');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> Gagal Hapus Jadwal </div>');
				redirect('Kesiswaan_C/lihat_jadwal_her_registrasi');
			}
		}




		public function tanggal_mulai_check(){
			$tanggal_mulai = $this->input->post('tanggal_mulai');

			$date1 = new DateTime($tanggal_mulai);
			$date2 = new DateTime(date('Y-m-d'));

			if ($date1 <= $date2) {
				$this->form_validation->set_message('tanggal_mulai_check','Maaf, Pilihan tanggal tidak vallid');
                return FALSE;
			} else {
				return TRUE;
			}
		}

		public function tanggal_selesai_check(){
			$tanggal_selesai = $this->input->post('tanggal_selesai');

			$date1 = new DateTime($tanggal_selesai);
			$date2 = new DateTime(date('Y-m-d'));

			if ($date1 <= $date2) {
				$this->form_validation->set_message('tanggal_selesai_check','Maaf, Pilihan tanggal tidak vallid');
                return FALSE;
			} else {
				return TRUE;
			}
		}

		public function lihat_jadwal_buku_seragam(){
			$result = $this->Kesiswaan_M->view_jadwal_buku_seragam();

			$data = array(
				'data_jadwal' => $result,
				'content' => 'dashboard/kesiswaan/view_jadwal_buku_seragam',
				'page' => 'Buku & Seragam',
				'toolbar' => 'Jadwal Pengambilan Buku & Seragam'
			);

			$this->parser->parse('dashboard/index',$data);
		}

		public function form_buat_jadwal_buku_seragam(){
			$data = array(
				'page' => 'Buat Jadwal Buku & Seragam',
				'content' => 'dashboard/kesiswaan/form_jadwal_buku_seragam',
				'toolbar' => 'Jadwal Pengambilan Buku & Seragam'
			);

			$this->parser->parse('dashboard/index',$data);
		}

		public function buat_jadwal_buku_seragam(){
			$this->form_validation->set_rules('nama_kegiatan','Nama Kegiatan','required');
			$this->form_validation->set_rules('keterangan','Keterangan','required');
			$this->form_validation->set_rules('tgl_mulai','Tanggal Mulai','required|callback_tanggal_mulai_check');
			$this->form_validation->set_rules('tgl_selesai','Tanggal Selesai','required|callback_tanggal_selesai_check');

			if ($this->form_validation->run()==false) {
				$data = array(
					'page' => 'Buat Jadwal Buku & Seragam',
					'content' => 'dashboard/kesiswaan/form_jadwal_buku_seragam',
					'toolbar' => 'Jadwal Pengambilan Buku & Seragam'
				);

				$this->parser->parse('dashboard/index',$data);
			} else {
				$nama_kegiatan = $this->input->post('nama_kegiatan');
				$keterangan = $this->input->post('keterangan');
				$tgl_mulai = $this->input->post('tgl_mulai');
				$tgl_selesai = $this->input->post('tgl_selesai');

				$tahun = date('Y');
				$tahun = intval($tahun);

				$ta = ($tahun).'/'.($tahun+1);

				$result = $this->Kesiswaan_M->insert_jadwal_buku_seragam($nama_kegiatan,$keterangan,$tgl_mulai,$tgl_selesai,$ta);

				if ($result>0) {
					$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Buat Jadwal </div>');
					redirect('Kesiswaan_C/lihat_jadwal_buku_seragam');
				} else {
					$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal Buat Jadwal </div>');
					redirect('Kesiswaan_C/lihat_jadwal_buku_seragam');
				}
			}
		}

		public function edit_jadwal_buku_seragam(){
			$nama_kegiatan = $this->input->post('nama_kegiatan');
			$keterangan = $this->input->post('keterangan');
			$tgl_mulai = $this->input->post('tgl_mulai');
			$tgl_selesai = $this->input->post('tgl_selesai');
			$ta = $this->input->post('ta');
			$id_jadwal = $this->input->post('id_jadwal');

			$result = $this->Kesiswaan_M->data_jadwal_buku_seragam_per_id($id_jadwal);

			foreach ($result as $key => $value) {
				if ($keterangan=="") {
					$keterangan = $value->keterangan;
				}

				if ($tgl_mulai=="") {
					$tgl_mulai = $value->tgl_mulai;
				}

				if ($tgl_selesai=="") {
					$tgl_selesai = $value->tgl_selesai;
				}

				if ($ta=="") {
					$ta = $value->ta;
				}

				if ($nama_kegiatan=="") {
					$nama_kegiatan = $value->nama_kegiatan;
				}
			}

			$edit = $this->Kesiswaan_M->edit_jadwal_buku_seragam($id_jadwal,$nama_kegiatan,$keterangan,$tgl_mulai,$tgl_selesai,$ta);

			if ($edit>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Edit Jadwal </div>');
					redirect('Kesiswaan_C/lihat_jadwal_buku_seragam');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal Edit Jadwal </div>');
					redirect('Kesiswaan_C/lihat_jadwal_buku_seragam');
			}
		}

		public function hapus_jadwal_buku_seragam(){
			$id_jadwal = $this->uri->segment(3);

			$result = $this->Kesiswaan_M->delete_jadwal_buku_seragam($id_jadwal);

			if ($result>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Hapus Jadwal </div>');
				redirect('Kesiswaan_C/lihat_jadwal_buku_seragam');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal Hapus Jadwal </div>');
				redirect('Kesiswaan_C/lihat_jadwal_buku_seragam');
			}
		}
	}