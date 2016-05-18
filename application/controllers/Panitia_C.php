<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Panitia_C extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('Panitia_M');
		}

		public function dashboard(){
			$jumlah = $this->Panitia_M->jumlah_notifikasi();
			$notifikasi = $this->Panitia_M->notifikasi();

			$data = array(
				'page' => 'Dashboard',
				'content' => 'dashboard/panitia/dashboard',
				'jumlah' => $jumlah,
				'notifikasi' => $notifikasi
			);
			$this->parser->parse('dashboard/index',$data);
		}

		public function lihat_jadwal_ppdb(){
			$result = $this->Panitia_M->data_jadwal_ppdb();

			$data = array(
				'page' => 'PPDB',
				'content' => 'dashboard/panitia/view_jadwal_ppdb',
				'toolbar' => 'Jadwal PPDB',
				'data_jadwal' => $result
			);

			$this->parser->parse('dashboard/index',$data);
		}

		public function form_buat_jadwal_ppdb(){
			$data = array(
				'page' => 'Buat Jadwal PPDB',
				'content' => 'dashboard/panitia/form_jadwal_ppdb',
				'toolbar' => 'Jadwal PPDB'
			);
			$this->parser->parse('dashboard/index',$data);
		}

		public function buat_jadwal_ppdb(){
			$this->form_validation->set_rules('nama_kegiatan','Nama Kegiatan','required');
			$this->form_validation->set_rules('keterangan','Keterangan','required');
			$this->form_validation->set_rules('tgl_mulai','Tanggal Mulai','required|callback_tanggal_mulai_check');
			$this->form_validation->set_rules('tgl_selesai','Tanggal Selesai','required|callback_tanggal_selesai_check');

			if ($this->form_validation->run()==false) {
				$data = array(
					'page' => 'Buat Jadwal PPDB',
					'content' => 'dashboard/panitia/form_jadwal_ppdb',
					'toolbar' => 'Jadwal PPDB'
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

				$result = $this->Panitia_M->insert_jadwal_ppdb($nama_kegiatan,$keterangan,$tgl_mulai,$tgl_selesai,$ta);

				if ($result>0) {
					$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Buat Jadwal PPDB </div>');
					redirect('Panitia_C/lihat_jadwal_ppdb');
				} else {
					$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal Buat Jadwal PPDB </div>');
					redirect('Panitia_C/lihat_jadwal_ppdb');
				}
			}
		}

		public function edit_jadwal_ppdb(){
			$nama_kegiatan = $this->input->post('nama_kegiatan');
			$keterangan = $this->input->post('keterangan');
			$tgl_mulai = $this->input->post('tgl_mulai');
			$tgl_selesai = $this->input->post('tgl_selesai');
			$ta = $this->input->post('ta');
			$id_jadwal = $this->input->post('id_jadwal');
			$status = $this->input->post('status');

			$result = $this->Panitia_M->data_jadwal_ppdb_per_id($id_jadwal);

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

			$edit = $this->Panitia_M->edit_jadwal_ppdb($id_jadwal,$nama_kegiatan,$keterangan,$tgl_mulai,$tgl_selesai,$ta,$status);

			if ($edit>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Edit Jadwal PPDB </div>');
					redirect('Panitia_C/lihat_jadwal_ppdb');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal Edit Jadwal PPDB </div>');
					redirect('Panitia_C/lihat_jadwal_ppdb');
			}
		}

		

		public function hapus_jadwal_ppdb(){
			$id_jadwal = $this->uri->segment(3);

			$result = $this->Panitia_M->delete_jadwal_ppdb($id_jadwal);

			if ($result>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Hapus Jadwal </div>');
				redirect('Panitia_C/lihat_jadwal_ppdb');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal Hapus Jadwal </div>');
				redirect('Panitia_C/lihat_jadwal_ppdb');
			}
		}

		public function lihat_berita(){
			//$result = $this->Panitia_M->data_berita();

			$data = array(
				'page' => 'Berita',
				'content' => 'dashboard/panitia/view_berita',
				'toolbar' => 'Berita'
			);

			$this->parser->parse('dashboard/index',$data);
		}

		public function form_buat_jadwal_seleksi(){
			$data_ruangan = $this->Panitia_M->data_ruangan();

			$data = array(
				'page' => 'Buat Jadwal Seleksi',
				'content' => 'dashboard/panitia/form_jadwal_seleksi',
				'toolbar' => 'Jadwal Seleksi',
				'data_ruangan' => $data_ruangan
			);
			$this->parser->parse('dashboard/index',$data);
		}

		public function buat_jadwal_seleksi(){
			$this->form_validation->set_rules('seleksi','Seleksi','required');
			$this->form_validation->set_rules('sesi','Sesi','required');
			$this->form_validation->set_rules('kelompok','kelompok','required');
			$this->form_validation->set_rules('tanggal','Tanggal','required|callback_tanggal_check');
			$this->form_validation->set_rules('mulai','Mulai','required');
			$this->form_validation->set_rules('selesai','Selesai','required');
			$this->form_validation->set_rules('ruangan','Ruangan','required');

			if ($this->form_validation->run()==false) {
				$data_ruangan = $this->Panitia_M->data_ruangan();

				$data = array(
					'page' => 'Buat Jadwal Seleksi',
					'content' => 'dashboard/panitia/form_jadwal_seleksi',
					'toolbar' => 'Jadwal Seleksi',
					'data_ruangan' => $data_ruangan
				);
				$this->parser->parse('dashboard/index',$data);
			} else {
				$nama = $this->input->post('seleksi');
				$sesi = $this->input->post('sesi');
				$kelompok = $this->input->post('kelompok');
				$tanggal = $this->input->post('tanggal');
				$waktu_mulai = $this->input->post('mulai');
				$waktu_selesai = $this->input->post('selesai');
				$id_ruangan = $this->input->post('ruangan');

				$result = $this->Panitia_M->insert_jadwal_seleksi($nama,$sesi,$kelompok,$tanggal,$waktu_mulai,$waktu_selesai,$id_ruangan);

				if ($result>0) {
					$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Buat Jadwal </div>');
					redirect('Panitia_C/lihat_jadwal_seleksi');
				} else {
					$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal Buat Jadwal </div>');
					redirect('Panitia_C/lihat_jadwal_seleksi');
				}
			}		
		}

		public function lihat_jadwal_seleksi(){
			$result = $this->Panitia_M->data_jadwal_seleksi();
			$data_ruangan = $this->Panitia_M->data_ruangan();

			$data = array(
				'page' => 'Seleksi',
				'content' => 'dashboard/panitia/view_jadwal_seleksi',
				'toolbar' => 'Jadwal Seleksi',
				'data_jadwal' => $result,
				'data_ruangan' => $data_ruangan
			);

			$this->parser->parse('dashboard/index',$data);
		}

		public function edit_jadwal_seleksi(){
			$id_seleksi = $this->input->post('id_seleksi');
			$seleksi = $this->input->post('seleksi');
			$sesi = $this->input->post('sesi');
			$kelompok = $this->input->post('kelompok');
			$tanggal = $this->input->post('tanggal');
			$waktu_mulai = $this->input->post('mulai');
			$waktu_selesai = $this->input->post('selesai');
			$id_ruangan = $this->input->post('ruangan');

			$result = $this->Panitia_M->data_jadwal_seleksi_per_id($id_seleksi);

			foreach ($result as $key => $value) {
				if ($seleksi=="") {
					$seleksi = $value->nama_seleksi;
				}

				if ($sesi=="") {
					$sesi = $value->sesi;
				}

				if ($kelompok=="") {
					$kelompok = $value->kelompok;
				}

				if ($tanggal=="") {
					$tanggal = $value->tgl;
				}

				if ($waktu_mulai=="") {
					$waktu_mulai = $value->waktu_mulai;
				}

				if ($waktu_selesai) {
					$waktu_selesai = $value->waktu_selesai;
				}

				if ($id_ruangan=="") {
					$id_ruangan = $value->id_ruangan;
				}
			}

			$edit = $this->Panitia_M->edit_jadwal_seleksi($seleksi,$sesi,$kelompok,$tanggal,$waktu_mulai,$waktu_selesai,$id_ruangan,$id_seleksi);

			if ($edit>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Edit Jadwal </div>');
				redirect('Panitia_C/lihat_jadwal_seleksi');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal Edit Jadwal </div>');
				redirect('Panitia_C/lihat_jadwal_seleksi');
			}
		}

		public function hapus_jadwal_seleksi(){
			$id_seleksi = $this->uri->segment(3);

			$result = $this->Panitia_M->delete_jadwal_seleksi($id_seleksi);

			if ($result>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Hapus Jadwal </div>');
				redirect('Panitia_C/lihat_jadwal_seleksi');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal Hapus Jadwal </div>');
				redirect('Panitia_C/lihat_jadwal_seleksi');
			}
		}

		public function lihat_nilai_ops(){
			$result = $this->Panitia_M->view_nilai_ops();
			
			$data = array(
				'page' => 'Observasi Pengenalan Sekolah',
				'content' => 'dashboard/panitia/view_hasil_ops',
				'toolbar' => 'Hasil OPS',
				'data_nilai' => $result
			);

			$this->parser->parse('dashboard/index',$data);
		}

		public function input_nilai_ops(){
			$no_pendaftaran = $this->input->post('no_pendaftaran');
			$self_identity = $this->input->post('self_identity');
			$part_of_body = $this->input->post('part_of_body');
			$observation = $this->input->post('observation');
			$math_counting = $this->input->post('math_counting');
			$writing_reading = $this->input->post('writing_reading');
			$pengetahuan_agama = $this->input->post('pengetahuan_agama');
			$sikap = $this->input->post('sikap');
			$keterangan = $this->input->post('keterangan');

			$result = $this->Panitia_M->view_nilai_ops();

			foreach ($result as $key => $value) {
				if ($self_identity=="") {
					$self_identity = $value->self_identity;
				}

				if ($part_of_body=="") {
					$part_of_body = $value->part_of_body;
				}

				if ($observation=="") {
					$observation = $value->observation;
				}

				if ($math_counting=="") {
					$math_counting = $value->math_counting;
				}

				if ($writing_reading=="") {
					$writing_reading = $value->writing_reading;
				}

				if ($pengetahuan_agama=="") {
					$pengetahuan_agama = $value->pengetahuan_agama;
				}

				if ($sikap=="") {
					$sikap = $value->sikap;
				}

				if ($keterangan=="") {
					$keterangan = $value->keterangan;
				}
			}

			$total = $self_identity + $part_of_body + $observation + $math_counting + $writing_reading + $pengetahuan_agama + $sikap;

			if ($total >= 234 && $total<=300) {
				$status = 'Diterima';
			} elseif ($total >= 230 && $total<=233)  {
				$status = 'Dipertimbangkan';
			} elseif ($total < 230) {
				$status = 'Ditolak';
			}

			$result = $this->Panitia_M->insert_nilai_ops($self_identity,$part_of_body,$observation,$math_counting,$writing_reading,$pengetahuan_agama,$sikap,$keterangan,$total,$status,$no_pendaftaran);

			if ($result>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Input Nilai OPS </div>');
				redirect('Panitia_C/lihat_nilai_ops');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal Input Nilai OPS </div>');
				redirect('Panitia_C/lihat_nilai_ops');
			}
		}

		public function edit_nilai_ops(){
			$no_pendaftaran = $this->input->post('no_pendaftaran');
			$self_identity = $this->input->post('self_identity');
			$part_of_body = $this->input->post('part_of_body');
			$observation = $this->input->post('observation');
			$math_counting = $this->input->post('math_counting');
			$writing_reading = $this->input->post('writing_reading');
			$pengetahuan_agama = $this->input->post('pengetahuan_agama');
			$sikap = $this->input->post('sikap');
			$keterangan = $this->input->post('keterangan');

			$result = $this->Panitia_M->view_nilai_ops();

			foreach ($result as $key => $value) {
				if ($self_identity=="") {
					$self_identity = $value->self_identity;
				}

				if ($part_of_body=="") {
					$part_of_body = $value->part_of_body;
				}

				if ($observation=="") {
					$observation = $value->observation;
				}

				if ($math_counting=="") {
					$math_counting = $value->math_counting;
				}

				if ($writing_reading=="") {
					$writing_reading = $value->writing_reading;
				}

				if ($pengetahuan_agama=="") {
					$pengetahuan_agama = $value->pengetahuan_agama;
				}

				if ($sikap=="") {
					$sikap = $value->sikap;
				}

				if ($keterangan=="") {
					$keterangan = $value->keterangan;
				}
			}

			$total = $self_identity + $part_of_body + $observation + $math_counting + $writing_reading + $pengetahuan_agama + $sikap;

			if ($total >= 234 && $total<=300) {
				$status = 'Diterima';
			} elseif ($total >= 230 && $total<=233)  {
				$status = 'Dipertimbangkan';
			} elseif ($total < 230) {
				$status = 'Ditolak';
			}

			$result = $this->Panitia_M->edit_nilai_ops($self_identity,$part_of_body,$observation,$math_counting,$writing_reading,$pengetahuan_agama,$sikap,$keterangan,$total,$status,$no_pendaftaran);

			if ($result>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Edit Nilai OPS </div>');
				redirect('Panitia_C/lihat_nilai_ops');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal Edit Nilai OPS </div>');
				redirect('Panitia_C/lihat_nilai_ops');
			}
		}

		public function lihat_nilai_ok(){
			$result = $this->Panitia_M->view_nilai_ok();
			
			$data = array(
				'page' => 'Observasi Kelas',
				'content' => 'dashboard/panitia/view_hasil_ok',
				'toolbar' => 'Hasil OK',
				'data_nilai' => $result
			);

			$this->parser->parse('dashboard/index',$data);
		}

		public function input_nilai_ok(){
			$no_pendaftaran = $this->input->post('no_pendaftaran');
			$koordinasi_keseimbangan = $this->input->post('koordinasi_keseimbangan');
			$sosial = $this->input->post('sosial');
			$pengendalian_gerak = $this->input->post('pengendalian_gerak');

			$nilai_ok = $this->Panitia_M->view_nilai_ok_per_no_pendaftaran($no_pendaftaran);

			foreach ($nilai_ok as $key => $value) {
				if ($koordinasi_keseimbangan=="") {
					$koordinasi_keseimbangan = $value->koordinasi_keseimbangan;
				}

				if ($sosial=="") {
					$sosial = $value->sosial;
				}

				if ($pengendalian_gerak=="") {
					$pengendalian_gerak = $value->pengendalian_gerak;
				}
			}

			$total = $koordinasi_keseimbangan+$sosial+$pengendalian_gerak;

			if ($total>=27 && $total<=39) {
				$status = 'Diterima';
			} else if ($total<27){
				$status = 'Ditolak';
			}

			$result = $this->Panitia_M->input_nilai_ok($no_pendaftaran,$koordinasi_keseimbangan,$sosial,$pengendalian_gerak,$total,$status);

			if ($result>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Input Nilai OK </div>');
				redirect('Panitia_C/lihat_nilai_ok');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal Input Nilai OK </div>');
				redirect('Panitia_C/lihat_nilai_ok');
			}
		}

		public function edit_nilai_ok(){
			$no_pendaftaran = $this->input->post('no_pendaftaran');
			$koordinasi_keseimbangan = $this->input->post('koordinasi_keseimbangan');
			$sosial = $this->input->post('sosial');
			$pengendalian_gerak = $this->input->post('pengendalian_gerak');

			$nilai_ok = $this->Panitia_M->view_nilai_ok_per_no_pendaftaran($no_pendaftaran);

			foreach ($nilai_ok as $key => $value) {
				if ($koordinasi_keseimbangan=="") {
					$koordinasi_keseimbangan = $value->koordinasi_keseimbangan;
				}

				if ($sosial=="") {
					$sosial = $value->sosial;
				}

				if ($pengendalian_gerak=="") {
					$pengendalian_gerak = $value->pengendalian_gerak;
				}
			}

			$total = $koordinasi_keseimbangan+$sosial+$pengendalian_gerak;

			if ($total>=27 && $total<=39) {
				$status = 'Diterima';
			} else if ($total<27){
				$status = 'Ditolak';
			}

			$result = $this->Panitia_M->edit_nilai_ok($no_pendaftaran,$koordinasi_keseimbangan,$sosial,$pengendalian_gerak,$total,$status);

			if ($result>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Edit Nilai OK </div>');
				redirect('Panitia_C/lihat_nilai_ok');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal Edit Nilai OK </div>');
				redirect('Panitia_C/lihat_nilai_ok');
			}
		}

		public function lihat_nilai_psikotest(){
			# code...
		}

		public function lihat_nilai_wawancara(){
			# code...
		}

		public function lihat_nilai_rekap(){
			$result = $this->Panitia_M->view_nilai_rekap();

			$data = array(
				'page' => 'Rekap Nilai',
				'content' => 'dashboard/panitia/view_hasil_rekap',
				'toolbar' => 'Rekap Nilai Seleksi',
				'data_nilai' => $result
			);

			$this->parser->parse('dashboard/index',$data);
		}

		public function edit_nilai_rekap(){
			$no_pendaftaran = $this->input->post('no_pendaftaran');
			$status = $this->input->post('status');
			$cek_status = $this->Panitia_M->view_nilai_rekap_per_no_pendaftaran($no_pendaftaran);

			foreach ($cek_status as $key => $value) {
				if ($status=="") {
					$status = $value->status;
				}
			}

			$result = $this->Panitia_M->edit_nilai_rekap($status,$no_pendaftaran);

			if ($result>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Edit Status </div>');
				redirect('Panitia_C/lihat_nilai_rekap');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal Edit Status </div>');
				redirect('Panitia_C/lihat_nilai_rekap');
			}
		}

		public function lihat_jadwal_daftar_ulang(){
			$result = $this->Panitia_M->data_jadwal_daftar_ulang();

			$data = array(
				'page' => 'Daftar Ulang',
				'content' => 'dashboard/panitia/view_jadwal_daftar_ulang',
				'toolbar' => 'Jadwal Daftar Ulang',
				'data_jadwal' => $result
			);

			$this->parser->parse('dashboard/index',$data);
		}

		public function form_buat_jadwal_daftar_ulang(){
			$data = array(
				'page' => 'Buat Jadwal Daftar Ulang',
				'content' => 'dashboard/panitia/form_jadwal_daftar_ulang',
				'toolbar' => 'Jadwal Daftar Ulang'
			);
			$this->parser->parse('dashboard/index',$data);
		}

		public function buat_jadwal_daftar_ulang(){
			$this->form_validation->set_rules('nama_kegiatan','Nama Kegiatan','required');
			$this->form_validation->set_rules('keterangan','Keterangan','required');
			$this->form_validation->set_rules('tgl_mulai','Tanggal Mulai','required|callback_tanggal_mulai_check');
			$this->form_validation->set_rules('tgl_selesai','Tanggal Selesai','required|callback_tanggal_selesai_check');

			if ($this->form_validation->run()==false) {
				$data = array(
					'page' => 'Buat Jadwal Daftar Ulang',
					'content' => 'dashboard/panitia/form_jadwal_daftar_ulang',
					'toolbar' => 'Jadwal Daftar Ulang'
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

				$result = $this->Panitia_M->insert_jadwal_daftar_ulang($nama_kegiatan,$keterangan,$tgl_mulai,$tgl_selesai,$ta);

				if ($result>0) {
					$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Buat Jadwal Daftar Ulang </div>');
					redirect('Panitia_C/lihat_jadwal_daftar_ulang');
				} else {
					$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal Buat Jadwal Daftar Ulang </div>');
					redirect('Panitia_C/lihat_jadwal_daftar_ulang');
				}
			}
		}

		public function edit_jadwal_daftar_ulang(){
			$nama_kegiatan = $this->input->post('nama_kegiatan');
			$keterangan = $this->input->post('keterangan');
			$tgl_mulai = $this->input->post('tgl_mulai');
			$tgl_selesai = $this->input->post('tgl_selesai');
			$ta = $this->input->post('ta');
			$id_jadwal = $this->input->post('id_jadwal');
			$status = $this->input->post('status');

			$result = $this->Panitia_M->data_jadwal_daftar_ulang_per_id($id_jadwal);

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

			$edit = $this->Panitia_M->edit_jadwal_daftar_ulang($id_jadwal,$nama_kegiatan,$keterangan,$tgl_mulai,$tgl_selesai,$ta,$status);

			if ($edit>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Edit Jadwal Daftar Ulang </div>');
					redirect('Panitia_C/lihat_jadwal_daftar_ulang');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal Edit Jadwal Daftar Ulang </div>');
					redirect('Panitia_C/lihat_jadwal_daftar_ulang');
			}
		}

		public function hapus_jadwal_daftar_ulang(){
			$id_jadwal = $this->uri->segment(3);

			$result = $this->Panitia_M->delete_jadwal_daftar_ulang($id_jadwal);

			if ($result>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Hapus Jadwal </div>');
				redirect('Panitia_C/lihat_jadwal_daftar_ulang');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal Hapus Jadwal </div>');
				redirect('Panitia_C/lihat_jadwal_daftar_ulang');
			}
		}

		public function lihat_data_pendaftar(){
			$result = $this->Panitia_M->view_data_pendaftar();

			print_r($result);
		}






















		public function buku_tamu(){
			$result = $this->Panitia_M->buku_tamu();

			$data = array(
				'page' => 'Buku Tamu',
				'content' => 'dashboard/panitia/buku_tamu',
				'toolbar' => 'Data Buku Tamu',
				'buku_tamu' => $result
			);
			$this->parser->parse('dashboard/index',$data);
		}

		public function status_formulir(){
			$status;
			$result = $this->Panitia_M->status_formulir();

			foreach ($result as $key => $value) {
				if ($value->asal_anak!="") {
					$status = 'Sudah';
				} else { 
					$status = 'Belum';
				}
			}

			$data = array(
				'page' => 'Formulir',
				'content' => 'dashboard/panitia/status_formulir',
				'toolbar' => 'Data Formulir',
				'data_formulir' => $result,
				'status' => $status
			);
			$this->parser->parse('dashboard/index',$data);
		}

		public function status_bayar(){
			$result = $this->Panitia_M->status_bayar();

			$data = array(
				'page' => 'Pembayaran',
				'content' => 'dashboard/panitia/status_pembayaran',
				'toolbar' => 'Data Pembayaran',
				'data_pembayaran' => $result
			);
			$this->parser->parse('dashboard/index',$data);
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

		public function tanggal_check(){
			$tanggal = $this->input->post('tanggal');

			$date1 = new DateTime($tanggal);
			$date2 = new DateTime(date('Y-m-d'));

			if ($date1 <= $date2) {
				$this->form_validation->set_message('tanggal_check','Maaf, Pilihan tanggal tidak vallid');
                return FALSE;
			} else {
				return TRUE;
			}
		}
	}