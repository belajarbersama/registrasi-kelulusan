<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Ortu_C extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->model('Ortu_M');
		}

		public function dashboard(){
			$jumlah = $this->Ortu_M->jumlah_notifikasi();
			$notifikasi = $this->Ortu_M->notifikasi();

			$data = array(
				'jumlah' => $jumlah,
				'page' => 'Dashboard',
				'content' => 'dashboard/orangtua/dashboard',
				'notifikasi' => $notifikasi
			);

			$this->parser->parse('dashboard/index',$data);
		}

		public function unggah_dokumen_persyaratan(){
			$jumlah = $this->Ortu_M->jumlah_notifikasi();
			$notifikasi = $this->Ortu_M->notifikasi();

			$data = array(
				'jumlah' => $jumlah,
				'page' => 'Berkas Daftar Ulang',
				'content' => 'dashboard/orangtua/unggah_dokumen',
				'toolbar' => 'Unggah Berkas Daftar Ulang',
				'notifikasi' => $notifikasi
			);

			$this->parser->parse('dashboard/index',$data);
		}

		public function upload_berkas(){
			$nama_akta = $_FILES['akta']['name'];
			$akta_kelahiran = $_FILES['akta']['tmp_name'];
			$nama_ktp = $_FILES['ktp']['name'];
			$ktp = $_FILES['ktp']['tmp_name'];
			$nama_kk = $_FILES['kk']['name'];
			$kartu_keluarga = $_FILES['kk']['tmp_name'];
			$nama_sk = $_FILES['sk']['name'];
			$surat_keterangan = $_FILES['sk']['tmp_name'];
			$no_pendaftaran = $this->session->userdata('no_pendaftaran');

			$hasil = $this->Ortu_M->view_unggah_berkas_per_no_pendaftaran($no_pendaftaran);

			foreach ($hasil as $key => $value) {
				if ($nama_akta=="" || $akta_kelahiran=="") {
					$nama_akta = $value->nama_akta;
					$akta_kelahiran = $value->akta_kelahiran;
				}

				if ($nama_ktp=="" || $ktp=="") {
					$nama_ktp = $value->nama_ktp;
					$ktp = $value->ktp;
				}

				if ($nama_kk=="" || $kartu_keluarga=="") {
					$nama_kk = $value->nama_kk;
					$kartu_keluarga = $value->kartu_keluarga;
				}

				if ($nama_sk=="" || $surat_keterangan=="") {
					$nama_sk = $value->nama_sk;
					$surat_keterangan = $value->surat_keterangan;
				}
			}
			
			$result = $this->Ortu_M->unggah_berkas($no_pendaftaran,$nama_akta,$akta_kelahiran,$nama_ktp,$ktp,$nama_kk,$kartu_keluarga,$nama_sk,$surat_keterangan);

			if ($result>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil unggah berkas</div>');
				redirect('Ortu_C/unggah_dokumen_persyaratan');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal unggah berkas</div>');
				redirect('Ortu_C/unggah_dokumen_persyaratan');
			}
		}

		public function pembayaran_daftar_ulang(){
			$jumlah = $this->Ortu_M->jumlah_notifikasi();
			$notifikasi = $this->Ortu_M->notifikasi();

			$data = array(
				'jumlah' => $jumlah,
				'page' => 'Pembayaran Daftar Ulang',
				'content' => 'dashboard/orangtua/unggah_pembayaran',
				'toolbar' => 'Unggah Bukti Pembayaran Daftar Ulang',
				'notifikasi' => $notifikasi
			);

			$this->parser->parse('dashboard/index',$data);
		}

		public function upload_pembayaran(){
			$nama_bayar = $_FILES['bukti_bayar']['name'];
			$bukti_bayar = $_FILES['bukti_bayar']['tmp_name'];
			$jumlah_bayar = $this->input->post('jumlah_bayar');
			$no_pendaftaran = $this->session->userdata('no_pendaftaran');

			$hasil = $this->Ortu_M->view_unggah_pembayaran_per_no_pendaftaran($no_pendaftaran);

			foreach ($hasil as $key => $value) {
				if ($jumlah_bayar=="") {
					$jumlah_bayar = $value->jumlah_bayar;
				}

				if ($nama_bayar=="" || $bukti_bayar=="") {
					$nama_bayar = $value->nama_bayar;
					$bukti_bayar = $value->bukti_bayar;
				}
			}
			$sisa_bayar = 18000000 - intval($jumlah_bayar);
			$result = $this->Ortu_M->unggah_pembayaran($no_pendaftaran,$jumlah_bayar,$nama_bayar,$bukti_bayar,$sisa_bayar);

			if ($result>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil unggah bukti bayar</div>');
				redirect('Ortu_C/pembayaran_daftar_ulang');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal unggah bukti bayar</div>');
				redirect('Ortu_C/pembayaran_daftar_ulang');
			}
		}
	}