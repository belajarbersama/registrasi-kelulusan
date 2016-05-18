<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Pendaftar_C extends CI_Controller{

		function __construct(){
			parent::__construct();
			$this->load->model('Pendaftar_M');
		}

		public function dashboard(){
			$no_hp = $this->session->userdata('no_hp');
			$jumlah = $this->Pendaftar_M->jumlah_notifikasi($no_hp);
			$notifikasi = $this->Pendaftar_M->notifikasi($no_hp);
			$data = array(
				'page' => 'Dashboard',
				'content' => 'dashboard/pendaftar/dashboard',
				'jumlah' => $jumlah,
				'notifikasi' => $notifikasi
			);

			$this->parser->parse('dashboard/index',$data);
		}

		public function profile(){
			$no_hp = $this->session->userdata('no_hp');
			$jumlah = $this->Pendaftar_M->jumlah_notifikasi($no_hp);
			$notifikasi = $this->Pendaftar_M->notifikasi($no_hp);
			$profile = $this->Pendaftar_M->profile($no_hp);

			$data = array(
				'page' => 'Dashboard',
				'content' => 'dashboard/pendaftar/profile',
				'jumlah' => $jumlah,
				'notifikasi' => $notifikasi,
				'profile' => $profile
			);

			$this->parser->parse('dashboard/index',$data);
		}

		public function form_ket_siswa(){
			$no_pendaftaran = $this->session->userdata('no_pendaftaran');
			$result = $this->Pendaftar_M->cek_data_siswa($no_pendaftaran);
			$no_hp = $this->session->userdata('no_hp');
			$jumlah = $this->Pendaftar_M->jumlah_notifikasi($no_hp);
            $notifikasi = $this->Pendaftar_M->notifikasi($no_hp);
			
			$data = array(
				'page' => 'Data Siswa',
				'content' => 'dashboard/pendaftar/form_data_siswa',
				'toolbar' => 'Data Siswa',
				'no_pendaftaran' => $result,
				'jumlah' => $jumlah,
				'notifikasi' => $notifikasi
			);
			$this->parser->parse('dashboard/index',$data);
		}

		public function insert_ket_siswa(){
			$this->form_validation->set_rules('nik','NIK','required|numeric');
			$this->form_validation->set_rules('nama_lengkap','Nama Lengkap','required|alpha_numeric_spaces');
			$this->form_validation->set_rules('nama_panggilan', 'Nama Panggilan','required|alpha_numeric_spaces');
			$this->form_validation->set_rules('tempat_lahir','Tempat Lahir','required|alpha_numeric_spaces');
			$this->form_validation->set_rules('agama','Agama','required|callback_agama_check');
			$this->form_validation->set_rules('kewarganegaraan','Kewarganegaraan','required|alpha_numeric_spaces');
			$this->form_validation->set_rules('anak_ke','Anak Ke','required|numeric');
			$this->form_validation->set_rules('jumlah_saudara_kandung','Jumlah Saudara Kandung','required|numeric');
			$this->form_validation->set_rules('jumlah_saudara_tiri','Jumlah Saudara Tiri','numeric');
			$this->form_validation->set_rules('jumlah_saudara_angkat','Jumlah Saudara angkat','numeric');
			$this->form_validation->set_rules('bahasa_sehari','Bahasa Sehari-hari','required|alpha_numeric_spaces');
			$this->form_validation->set_rules('berat_badan','Berat Badan','required|numeric');
			$this->form_validation->set_rules('tinggi_badan','Tinggi Badan','required|numeric');
			$this->form_validation->set_rules('goda','Golongan Darah','required|callback_goda_check');
			$this->form_validation->set_rules('penyakit_derita','Penyakit Pernah Diderita','required|alpha_numeric_spaces');
			$this->form_validation->set_rules('alamat_rumah','Alamat Rumah','required');
			$this->form_validation->set_rules('rt','RT','required|numeric');
			$this->form_validation->set_rules('rw','RW','required|numeric');
			$this->form_validation->set_rules('kelurahan','Kelurahan','required|alpha_numeric_spaces');
			$this->form_validation->set_rules('kecamatan','Kecamatan','required|alpha_numeric_spaces');
			$this->form_validation->set_rules('kota_kabupaten','Kabupaten/Kota','required|alpha_numeric_spaces');
			$this->form_validation->set_rules('provinsi','Provinsi','required');
			$this->form_validation->set_rules('kode_area','Kode Area','required|numeric');
			$this->form_validation->set_rules('telp_rumah','Telepon Rumah','required|numeric');
			$this->form_validation->set_rules('kode_pos','Kode Pos','required|numeric');
			$this->form_validation->set_rules('tempat_tinggal','Tempat Tinggal','required|callback_tempat_tinggal_check');
			$this->form_validation->set_rules('jarak_rumah_sekolah','Jarak Rumah','required|numeric');
			$this->form_validation->set_rules('tgl_lahir','Tanggal Lahir','required|callback_tgl_lahir_check');

			if ($this->form_validation->run()==false) {
                $no_pendaftaran = $this->session->userdata('no_pendaftaran');
				$result = $this->Pendaftar_M->cek_data_siswa($no_pendaftaran);
				
				$data = array(
					'page' => 'Data Siswa',
					'content' => 'dashboard/pendaftar/form_data_siswa',
					'toolbar' => 'Data Siswa',
					'no_pendaftaran' => $result
				);
				$this->parser->parse('dashboard/index',$data);
            } else {
            	$nik = $this->input->post('nik');
				$nama_lengkap = $this->input->post('nama_lengkap');
				$nama_panggilan = $this->input->post('nama_panggilan');
				$jekel  = $this->input->post('jekel');
				$tgl_lahir = $this->input->post('tgl_lahir');
				$tempat_lahir = $this->input->post('tempat_lahir');
				$agama = $this->input->post('agama');
				$kewarganegaraan = $this->input->post('kewarganegaraan');
				$anak_ke = $this->input->post('anak_ke');
				$jumlah_saudara_kandung = $this->input->post('jumlah_saudara_kandung');
				$jumlah_saudara_tiri = $this->input->post('jumlah_saudara_tiri');
				$jumlah_saudara_angkat = $this->input->post('jumlah_saudara_angkat');
				$bahasa_sehari = $this->input->post('bahasa_sehari');
				$berat_badan = $this->input->post('berat_badan');
				$tinggi_badan = $this->input->post('tinggi_badan');
				$goda = $this->input->post('goda');
				$penyakit_derita = $this->input->post('penyakit_derita');
				$alamat_rumah = $this->input->post('alamat_rumah');
				$rt = $this->input->post('rt');
				$rw = $this->input->post('rw');
				$kelurahan = $this->input->post('kelurahan');
				$kecamatan = $this->input->post('kecamatan');
				$kota_kabupaten = $this->input->post('kota_kabupaten');
				$provinsi = $this->input->post('provinsi');
				$kode_area = $this->input->post('kode_area');
				$telp_rumah = $this->input->post('telp_rumah');
				$kode_pos = $this->input->post('kode_pos');
				$tempat_tinggal = $this->input->post('tempat_tinggal');
				$jarak_rumah_sekolah = $this->input->post('jarak_rumah_sekolah');
				$no_hp = $this->session->userdata('no_hp');
				$no_pendaftaran = $this->session->userdata('no_pendaftaran');

				$result = $this->Pendaftar_M->insert_data_siswa($nik,$nama_lengkap,$nama_panggilan,$jekel,$tgl_lahir,$tempat_lahir,$agama,$kewarganegaraan,$anak_ke,$jumlah_saudara_kandung,$jumlah_saudara_tiri,$jumlah_saudara_angkat,$bahasa_sehari,$berat_badan,$tinggi_badan,$goda,$penyakit_derita,$alamat_rumah,$rt,$rw,$kelurahan,$kecamatan,$kota_kabupaten,$provinsi,$kode_area,$telp_rumah,$no_hp,$kode_pos,$tempat_tinggal,$jarak_rumah_sekolah,$no_pendaftaran);

				if ($result) {
					$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil input data siswa</div>');
					redirect('Pendaftar_C/form_ket_ortu');
				} else {
					$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal input data siswa</div>');
					redirect('Pendaftar_C/form_ket_siswa');
				}
            }
		}


		public function form_ket_ortu(){
			$no_pendaftaran = $this->session->userdata('no_pendaftaran');
			$result = $this->Pendaftar_M->cek_data_siswa($no_pendaftaran);

			if ($result[0]->nik=="") {
				$this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Isi Data Siswa Terlebih Dahulu!</div>');
				redirect('Pendaftar_C/form_ket_siswa');
			} else {
				$no_pendaftaran = $this->session->userdata('no_pendaftaran');
				$nama_ayah = $this->Pendaftar_M->cek_data_ortu($no_pendaftaran);
				$no_hp = $this->session->userdata('no_hp');
				$jumlah = $this->Pendaftar_M->jumlah_notifikasi($no_hp);
                $notifikasi = $this->Pendaftar_M->notifikasi($no_hp);
				$data = array(
					'page' => 'Data Orang Tua',
					'content' => 'dashboard/pendaftar/form_data_ortu',
					'toolbar' => 'Data Orang Tua',
					'nama_ayah' => $nama_ayah,
					'jumlah' => $jumlah,
					'notifikasi' => $notifikasi
				);
				$this->parser->parse('dashboard/index',$data);
			}
		}

		public function insert_ket_ortu(){
			$this->form_validation->set_rules('nama_ayah','Nama Ayah','required|alpha_numeric_spaces');
			$this->form_validation->set_rules('pdd_ayah','Pendidikan Ayah','required|callback_pdd_ayah_check');
			$this->form_validation->set_rules('pekerjaan_ayah','Pekerjaan Ayah','required|alpha_numeric_spaces');
			$this->form_validation->set_rules('nama_perusahaan_ayah','Nama Perusahaan Ayah','required');
			$this->form_validation->set_rules('alamat_perusahaan_ayah','Alamat Perusahan Ayah','required');
			$this->form_validation->set_rules('email_kantor_ayah','Email Kantor Ayah','required|valid_email');
			$this->form_validation->set_rules('nama_ibu','Nama Ibu','required|alpha_numeric_spaces');
			$this->form_validation->set_rules('pdd_ibu','Pendidikan ibu','callback_pdd_ibu_check');
			$this->form_validation->set_rules('email_kantor_ibu','Email Kantor ibu','valid_email');

			if ($this->form_validation->run()==false) {
                $no_pendaftaran = $this->session->userdata('no_pendaftaran');
				$nama_ayah = $this->Pendaftar_M->cek_data_ortu($no_pendaftaran);
				$data = array(
					'page' => 'Data Orang Tua',
					'content' => 'dashboard/pendaftar/form_data_ortu',
					'toolbar' => 'Data Orang Tua',
					'nama_ayah' => $nama_ayah
				);
				$this->parser->parse('dashboard/index',$data);
            } else {
            	$nama_ayah = $this->input->post('nama_ayah');
            	$pdd_ayah = $this->input->post('pdd_ayah');
            	$pekerjaan_ayah =$this->input->post('pekerjaan_ayah');
            	$nama_perusahaan_ayah = $this->input->post('nama_perusahaan_ayah');
            	$alamat_perusahaan_ayah = $this->input->post('alamat_perusahaan_ayah');
            	$email_kantor_ayah = $this->input->post('email_kantor_ayah');
            	$nama_ibu = $this->input->post('nama_ibu');
            	$pdd_ibu = $this->input->post('pdd_ibu');
            	$pekerjaan_ibu =$this->input->post('pekerjaan_ibu');
            	$nama_perusahaan_ibu = $this->input->post('nama_perusahaan_ibu');
            	$alamat_perusahaan_ibu = $this->input->post('alamat_perusahaan_ibu');
            	$email_kantor_ibu = $this->input->post('email_kantor_ibu');
            	$no_pendaftaran = $this->session->userdata('no_pendaftaran');
            	$id_ortu = $this->session->userdata('no_identitas');
            	$no_hp = $this->session->userdata('no_hp');

            	$result = $this->Pendaftar_M->insert_data_ortu($id_ortu,$nama_ayah,$nama_ibu,$pdd_ayah,$pdd_ibu,$pekerjaan_ayah,$nama_perusahaan_ayah,$alamat_perusahaan_ayah,$email_kantor_ayah,$pekerjaan_ibu,$nama_perusahaan_ibu,$alamat_perusahaan_ibu,$email_kantor_ibu,$no_pendaftaran,$no_hp);


            	if ($result>0) {
            		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil input data orang tua</div>');
            		redirect('Pendaftar_C/form_ket_wali');
            	} else {
            		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal input data orang tua</div>');
            		redirect('Pendaftar_C/form_ket_ortu');
            	}
            }
			
		}

		public function form_ket_wali(){
			$no_pendaftaran = $this->session->userdata('no_pendaftaran');
			$result = $this->Pendaftar_M->cek_data_siswa($no_pendaftaran);

			if ($result[0]->nik=="") {
				$this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Isi Data Siswa Terlebih Dahulu!</div>');
				redirect('Pendaftar_C/form_ket_siswa');
			} else {
				$data_wali = $this->Pendaftar_M->cek_data_wali($no_pendaftaran);
				$no_hp = $this->session->userdata('no_hp');
				$jumlah = $this->Pendaftar_M->jumlah_notifikasi($no_hp);
                $notifikasi = $this->Pendaftar_M->notifikasi($no_hp);
				$data = array(
					'page' => 'Data Wali',
					'content' => 'dashboard/pendaftar/form_data_wali',
					'toolbar' => 'Data Wali',
					'data_wali' => $data_wali,
					'jumlah' => $jumlah,
					'notifikasi' => $notifikasi
				);
				$this->parser->parse('dashboard/index',$data);
			}
		}

		public function insert_ket_wali(){
			$this->form_validation->set_rules('id_wali','ID Wali','required|numeric');
			$this->form_validation->set_rules('nama_wali','Nama Wali','required|alpha_numeric_spaces');
			$this->form_validation->set_rules('pdd_wali','Pendidikan','required|callback_pdd_wali_check');
			$this->form_validation->set_rules('hubungan_keluarga','Hubungan Keluarga','required');
			$this->form_validation->set_rules('pekerjaan_wali','Pekerjaan Wali','required|alpha_numeric_spaces');
			$this->form_validation->set_rules('nama_perusahaan_wali','Nama Perusahaan Wali','required');
			$this->form_validation->set_rules('alamat_perusahaan_wali','Alamat Perusahaan Wali','required');
			$this->form_validation->set_rules('email_kantor_wali','Email Kantor Wali','required|valid_email');
			$this->form_validation->set_rules('no_hp','No HP','required|numeric');
			$this->form_validation->set_rules('alamat','Alamat','required');
			$this->form_validation->set_rules('provinsi','Provinsi','required');
			$this->form_validation->set_rules('rt','RT','required|numeric');
			$this->form_validation->set_rules('rw','RW','required|numeric');
			$this->form_validation->set_rules('kelurahan','Kelurahan','required');
			$this->form_validation->set_rules('kecamatan','Kecamatan','required');
			$this->form_validation->set_rules('kota','Kabupaten/Kota','required|alpha_numeric_spaces');
			$this->form_validation->set_rules('kode_area','Kode Area','required|numeric');
			$this->form_validation->set_rules('telp_rumah','Telepon Rumah','required|numeric');
			$this->form_validation->set_rules('kode_pos','Kode Pos','required|numeric');

			if ($this->form_validation->run()==false) {
                $data = array(
					'page' => 'Data Wali',
					'content' => 'dashboard/pendaftar/form_data_wali',
					'toolbar' => 'Data wali'
				);
				$this->parser->parse('dashboard/index',$data);
            } else {
            	$id_wali = $this->input->post('id_wali');
            	$nama_wali = $this->input->post('nama_wali');
            	$hubungan_keluarga = $this->input->post('hubungan_keluarga');
            	$pekerjaan_wali = $this->input->post('pekerjaan_wali');
            	$nama_perusahaan = $this->input->post('nama_perusahaan_wali');
            	$alamat_perusahaan = $this->input->post('alamat_perusahaan_wali');
            	$email_wali = $this->input->post('email_kantor_wali');
            	$pdd_wali = $this->input->post('pdd_wali');
            	$alamat_rumah = $this->input->post('alamat');
            	$provinsi = $this->input->post('provinsi');
            	$rt = $this->input->post('rt');
            	$rw = $this->input->post('rw');
            	$kelurahan = $this->input->post('kelurahan');
            	$kecamatan = $this->input->post('kecamatan');
            	$kota_kabupaten = $this->input->post('kota');
            	$kode_area = $this->input->post('kode_area');
            	$telp_rumah = $this->input->post('telp_rumah');
            	$no_hp = $this->input->post('no_hp');
            	$kode_pos = $this->input->post('kode_pos');
            	$no_pendaftaran = $this->session->userdata('no_pendaftaran');

            	$result = $this->Pendaftar_M->insert_data_wali($id_wali,$nama_wali,$pdd_wali,$hubungan_keluarga,$alamat_rumah,$rt,$rw,$kelurahan,$kecamatan,$kota_kabupaten,$provinsi,$kode_area,$telp_rumah,$no_hp,$kode_pos,$pekerjaan_wali,$nama_perusahaan,$alamat_perusahaan,$email_wali,$no_pendaftaran);

            	if ($result>0) {
            		$this->session->set_flashdata('pesan','<div class="alert alert-info alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil input data wali</div>');
            		redirect('Pendaftar_C/form_ket_asal');
            	} else {
            		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal input data wali</div>');
            		redirect('Pendaftar_C/form_ket_wali');
            	}
            }

		}

		public function form_ket_asal(){
			$no_pendaftaran = $this->session->userdata('no_pendaftaran');
			$result = $this->Pendaftar_M->cek_data_ortu($no_pendaftaran);

			if ($result[0]->nama_ayah!="") {
				$no_pendaftaran = $this->Pendaftar_M->cek_data_asal_mula($no_pendaftaran);
				$no_hp = $this->session->userdata('no_hp');
				$jumlah = $this->Pendaftar_M->jumlah_notifikasi($no_hp);
                $notifikasi = $this->Pendaftar_M->notifikasi($no_hp);
				$data = array(
					'page' => 'Asal Mula',
					'content' => 'dashboard/pendaftar/form_data_asal',
					'toolbar' => 'Data Asal Mula',
					'no_pendaftaran' => $no_pendaftaran,
					'jumlah' => $jumlah,
					'notifikasi' => $notifikasi
				);
				$this->parser->parse('dashboard/index',$data);
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Isi Data Orang Tua Terlebih Dahulu!</div>');
				redirect('Pendaftar_C/form_ket_ortu');
			}
		}

		public function insert_ket_asal(){
			$this->form_validation->set_rules('asal_anak','Asal Anak','required|callback_asal_anak_check');
			$this->form_validation->set_rules('nama_asal','Nama Asal','required|alpha_numeric_spaces');
			$this->form_validation->set_rules('no_tahun_sk','No/Tahun SK','required|alpha_numeric_spaces');
			$this->form_validation->set_rules('lama_belajar','Lama Belajar','required|numeric');
			$this->form_validation->set_rules('tanggal_terima','Tanggal Terima','required');

			if ($this->form_validation->run()==false) {
                $data = array(
					'page' => 'Data Asal',
					'content' => 'dashboard/pendaftar/form_data_asal',
					'toolbar' => 'Data asal'
				);
				$this->parser->parse('dashboard/index',$data);
            } else {
            	$asal_anak = $this->input->post('asal_anak');
            	$nama_asal = $this->input->post('nama_asal');
            	$no_tahun_sk = $this->input->post('no_tahun_sk');
            	$lama_belajar = $this->input->post('lama_belajar');
            	$tanggal_terima = $this->input->post('tanggal_terima');
            	$no_pendaftaran = $this->session->userdata('no_pendaftaran');
            	$no_hp = $this->session->userdata('no_hp');

            	$result = $this->Pendaftar_M->insert_data_asal($asal_anak,$nama_asal,$no_tahun_sk,$lama_belajar,$tanggal_terima,$no_pendaftaran,$no_hp);

            	if ($result>0) {
            		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Terima Kasih telah mengisi formulir! Silakan melakukan pembayaran Psikotes untuk mendapat kartu seleksi.</div>');
            		redirect('Pendaftar_C/form_ket_asal');
            	} else {
            		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Harap periksa data Anda!</div>');
            		redirect('Pendaftar_C/form_ket_asal');
            	}
            }
		}

		public function view_data(){
			$no_hp = $this->session->userdata('no_hp');
			$no_pendaftaran = $this->session->userdata('no_pendaftaran');
			
			$data_siswa = $this->Pendaftar_M->view_data_siswa($no_pendaftaran,$no_hp);
			$data_ortu = $this->Pendaftar_M->view_data_ortu($no_pendaftaran);
			$data_wali = $this->Pendaftar_M->view_data_wali($no_pendaftaran);
			$data_asal = $this->Pendaftar_M->view_data_asal($no_pendaftaran);
			$jumlah = $this->Pendaftar_M->jumlah_notifikasi($no_hp);
            $notifikasi = $this->Pendaftar_M->notifikasi($no_hp);

			$data = array(
				'page' =>'View Data' ,
				'content' =>'dashboard/pendaftar/view_data',
				'toolbar' =>'View Data',
				'data_siswa' => $data_siswa,
				'data_ortu' => $data_ortu,
				'data_wali'=> $data_wali,
				'data_asal' => $data_asal,
				'jumlah' => $jumlah,
				'notifikasi' => $notifikasi
			);

			$this->parser->parse('dashboard/index',$data);
		}

		public function form_edit_ds(){
			$id_formulir = $this->session->userdata('id_formulir');
			$no_hp = $this->session->userdata('no_hp');
			$data_siswa = $this->Pendaftar_M->get_ds_id($id_formulir,$no_hp);

			$data = array(
				'page' => 'Formulir',
				'toolbar' => 'Edit Data Siswa',
				'content' => 'dashboard/pendaftar/form_edit_ds',
				'ds' => $data_siswa
			);

			$this->parser->parse('dashboard/index',$data);
		}

		public function edit_ket_siswa(){
			$nik = "";
			$nama_lengkap = "";
			$nama_panggilan = "";
			$jekel  = "";
			$tgl_lahir = "";
			$tempat_lahir ="";
			$agama = "" ;
			$kewarganegaraan = "";
			$anak_ke = "";
			$jumlah_saudara_kandung = "";
			$jumlah_saudara_tiri = "";
			$jumlah_saudara_angkat = "";
			$bahasa_sehari ="";
			$berat_badan = "";
			$tinggi_badan = "";
			$goda = "";
			$penyakit_derita = "";
			$alamat_rumah = "";
			$jalan = "";
			$rt = "";
			$rw = "";
			$kelurahan = "";
			$kecamatan = "";
			$kota_kabupaten = "";
			$kode_area = "";
			$telp_rumah = "";
			$kode_pos = "";
			$tempat_tinggal = "";
			$jarak_rumah_sekolah = $this->input->post('jarak_rumah_sekolah');
			$rt_rw = $rt.'/'.$rw;
			$telp_rumah = $kode_area.''.$telp_rumah;
			$no_hp = $this->session->userdata('no_hp');
			$id_formulir = $this->session->userdata('id_formulir');

			$data_siswa = $this->Pendaftar_M->get_ds_id($id_formulir,$no_hp);

			foreach ($data_siswa as $key => $value) {
				if ($nik=="") {
					$nik = $value->nik;
				} else {
					$nik = $this->input->post('nik');
				}

				if ($nama_lengkap=="") {
					$nama_lengkap = $value->nama_lengkap;
				} else {
					$nama_lengkap = $this->input->post('nama_lengkap');
				}

				if ($nama_panggilan=="") {
					$nama_panggilan = $value->nama_panggilan;
				} else {
					$nama_panggilan = $this->input->post('nama_panggilan');
				}

				if ($jekel=="") {
					$jekel = $value->jekel;
				} else {
					$jekel = $this->input->post('jekel');
				}

				if ($tgl_lahir=="") {
					$tgl_lahir = $value->tgl_lahir;
				} else {
					$tgl_lahir = $this->input->post('tgl_lahir');
				}

				if ($tempat_lahir=="") {
					$tempat_lahir = $value->tempat_lahir;
				} else {
					$tempat_lahir =  $this->input->post('tempat_lahir');
				}

				if ($agama=="Agama") {
					$agama = $value->agama;
				} else {
					$agama = $this->input->post('agama');
				}

				if ($kewarganegaraan=="") {
					$kewarganegaraan = $value->kewarganegaraan;
				} else {
					$kewarganegaraan = $this->input->post('kewarganegaraan');
				}

				if ($anak_ke=="") {
					$anak_ke = $value->anak_ke;
				} else {
					$anak_ke = $this->input->post('anak_ke');
				}

				if ($jumlah_saudara_kandung=="") {
					$jumlah_saudara_kandung = $value->jumlah_saudara_kandung;
				} else {
					$jumlah_saudara_kandung = $this->input->post('jumlah_saudara_kandung');
				}

				if ($jumlah_saudara_tiri=="") {
					$jumlah_saudara_tiri = $value->jumlah_saudara_tiri;
				} else {
					$jumlah_saudara_tiri = $this->input->post('jumlah_saudara_tiri');
				}

				if ($jumlah_saudara_angkat=="") {
					$jumlah_saudara_angkat = $value->jumlah_saudara_angkat;
				} else {
					$jumlah_saudara_angkat = $this->input->post('jumlah_saudara_angkat');
				}

				if ($bahasa_sehari=="") {
					$bahasa_sehari = $value->bahasa_sehari;
				} else {
					$bahasa_sehari = $this->input->post('bahasa_sehari');
				}

				if ($berat_badan=="") {
					$berat_badan = $value->berat_badan;
				} else {
					$berat_badan = $this->input->post('berat_badan');
				}

				if ($tinggi_badan=="") {
					$tinggi_badan = $value->tinggi_badan;
				} else {
					$tinggi_badan = $this->input->post('tinggi_badan');
				}

				if ($goda=="Golongan Darah") {
					$goda = $value->goda;
				} else {
					$goda= $this->input->post('goda');
				}

				if ($penyakit_derita=="") {
					$penyakit_derita = $value->penyakit_derita;
				} else {
					$penyakit_derita = $this->input->post('penyakit_derita');
				}

				if ($alamat_rumah=="") {
					$alamat_rumah = $value->alamat_rumah;
				} else {
					$alamat_rumah = $this->input->post('alamat_rumah');
				}

				if ($jalan=="") {
					$jalan = $value->jalan;
				} else {
					$jalan = $this->input->post('jalan');
				}

				if ($rt=="") {
					$rt = $value->rt_rw;
					$rt = substr($rt, 0,2);
				} else {
					$rt = $this->input->post('rt');
				}

				if ($rw=="") {
					$rw = $value->rt_rw;
					$rw = substr($rt, 0,3);
				} else {
					$rw = $this->input->post('rw');
				}

				if ($kelurahan=="") {
					$kelurahan = $value->kelurahan;
				} else {
					$kelurahan = $this->input->post('kelurahan');
				}

				if ($kecamatan=="") {
					$kecamatan = $value->kecamatan;
				} else {
					$kecamatan = $this->input->post('kecamatan');
				}

				if ($kabupaten=="") {
					$kabupaten = $value->kabupaten;
				} else {
					$kabupaten = $this->input->post('kota_kabupaten');
				}

				if ($kode_area=="") {
					$kode_area = substr($value->telp_rumah, 0,3);
				} else {
					$kode_area = $this->input->post('kode_area');
				}

				if ($telp_rumah=="") {
					$telp_rumah = substr($value->telp_rumah, 4);
				} else {
					$telp_rumah = $this->input->post('telp_rumah');
				}

				if ($kode_pos=="") {
					$kode_pos = $value->kode_pos;
				} else {
					$kode_pos = $this->input->post('kode_pos');
				}

				if ($tempat_tinggal=="Tempat Tinggal") {
					$tempat_tinggal = $value->tempat_tinggal;
				} else {
					$tempat_tinggal = $this->input->post('tempat_tinggal');
				}
			}
		}

		public function bayar_psikotest(){
			$no_hp = $this->session->userdata('no_hp');
			$notifikasi = $this->Pendaftar_M->notifikasi($no_hp);
			$jumlah = $this->Pendaftar_M->jumlah_notifikasi($no_hp);

			$data = array(
				'page' => 'Pembayaran Psikotest',
				'content' => 'dashboard/pendaftar/upload_psikotest',
				'jumlah' => $jumlah,
				'notifikasi' => $notifikasi,
				'toolbar' => 'Pembayaran Administrasi Psikotest'
			);

			$this->parser->parse('dashboard/index',$data);
		}

		public function upload_bukti_bayar(){
			$config['upload_path'] = 'uploads/psikotes';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']     = 10000;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if (!$this->upload->do_upload('bukti_bayar')){
				$no_hp = $this->session->userdata('no_hp');
				$notifikasi = $this->Pendaftar_M->notifikasi($no_hp);
				$jumlah = $this->Pendaftar_M->jumlah_notifikasi($no_hp);

				$data = array(
					'page' => 'Pembayaran Psikotest',
					'content' => 'dashboard/pendaftar/upload_psikotest',
					'jumlah' => $jumlah,
					'notifikasi' => $notifikasi,
					'toolbar' => 'Pembayaran Administrasi Psikotest',
					'error' => $this->upload->display_errors()
				);

				$this->parser->parse('dashboard/index',$data);
			} else {
				echo $this->upload->data('file_name');
			}
			/*$nama_pembayaran = $_FILES['bukti_bayar']['name'];
			$bukti_bayar = $_FILES['bukti_bayar']['tmp_name'];
			$no_pendaftaran = $this->session->userdata('no_pendaftaran');
			$no_hp = $this->session->userdata('no_hp');
			$result = $this->Pendaftar_M->upload_bukti_bayar($no_pendaftaran,$nama_pembayaran,$bukti_bayar,$no_hp);
			if ($result>=0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-default alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Bukti bayar berhasil diupload.</div>');
				redirect('Pendaftar_C/bayar_psikotest');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Bukti bayar gagal diupload.</div>');
				redirect('Pendaftar_C/bayar_psikotest');
			}*/
		}

		public function agama_check(){
			$agama = $this->input->post('agama');

            if ($agama=='Agama') {
                $this->form_validation->set_message('agama_check','Silakan pilih Agama');
                return FALSE;
            } else {
                return TRUE;
            }
		}

		public function tgl_lahir_check(){
			$tgl_lahir = $this->input->post('tgl_lahir');

			$date1 = new DateTime($tgl_lahir);
			$date2 = new DateTime(date('2016-10-31'));
			$interval = $date1->diff($date2);

			$tahun = $interval->y;
			$bulan = $interval->m;

			if ($tahun<=5 && $bulan <10) {
				$this->form_validation->set_message('tgl_lahir_check','Usia pendaftar minimal 5 tahun 10 bulan Pada Oktober 2016');
				return FALSE;
            } else {
                return TRUE;
            }
		}

		public function goda_check(){
			$goda = $this->input->post('goda');

            if ($goda=='Golongan Darah') {
                $this->form_validation->set_message('goda_check','Silakan pilih Golongan Darah');
                return FALSE;
            } else {
                return TRUE;
            }
		}

		public function tempat_tinggal_check(){
			$tempat_tinggal = $this->input->post('tempat_tinggal');

            if ($tempat_tinggal=='Tempat Tinggal') {
                $this->form_validation->set_message('tempat_tinggal_check','Silakan pilih Tempat Tinggal');
                return FALSE;
            } else {
                return TRUE;
            }
		}

		public function pdd_ayah_check(){
			$pdd_ayah = $this->input->post('pdd_ayah');

			if ($pdd_ayah=='Pendidikan') {
                $this->form_validation->set_message('pdd_ayah_check','Silakan pilih Pendidikan');
                return FALSE;
            } else {
                return TRUE;
            }
		}

		public function pdd_ibu_check(){
			$pdd_ibu = $this->input->post('pdd_ibu');

			if ($pdd_ibu=='Pendidikan') {
                $this->form_validation->set_message('pdd_ibu_check','Silakan pilih Pendidikan');
                return FALSE;
            } else {
                return TRUE;
            }
		}

		public function pdd_wali_check(){
			$pdd_wali = $this->input->post('pdd_wali');

			if ($pdd_wali=='Pendidikan') {
                $this->form_validation->set_message('pdd_wali_check','Silakan pilih Pendidikan');
                return FALSE;
            } else {
                return TRUE;
            }
		}

		public function asal_anak_check(){
			$asal_anak = $this->input->post('asal_anak');

			if ($asal_anak == 'Asal') {
                $this->form_validation->set_message('asal_anak_check','Silakan pilih Asal Anak');
                return FALSE;
            } else {
                return TRUE;
            }
		}
	}