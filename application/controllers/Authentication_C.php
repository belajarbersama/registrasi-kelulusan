<?php defined('BASEPATH') OR exit('No direct script access allowed');
   class Authentication_C extends CI_Controller{

        function __construct(){
            parent::__construct();
            $this->load->model('Authentication_M');
            $this->load->model('Pendaftar_M');
            $this->load->model('Panitia_M');
            $this->load->model('Ortu_M');
		}

        public function buku_tamu(){
            $this->form_validation->set_rules('identitas','identitas','required|numeric|callback_identitas_check');
            $this->form_validation->set_rules('nama','Nama','required|alpha_numeric_spaces');
            $this->form_validation->set_rules('alamat','Alamat','required');
            $this->form_validation->set_rules('no_hp','No HP','required|numeric|min_length[5]|max_length[13]|callback_no_hp_daftar_check');
            $this->form_validation->set_rules('email','Email','required|valid_email|callback_email_check');
            $this->form_validation->set_rules('asal','Asal','required|callback_kabupaten_check');

            if ($this->form_validation->run()==false) {
                $data = array(
                    'body' => 'buku_tamu'
                );
                $this->parser->parse('assets',$data);
            } else {
                $check = $this->input->post('check');
                if ($check=='on') {
                    $email = $this->input->post('email');
                    $no_hp = $this->input->post('no_hp');
                    $nama = $this->input->post('nama');

                    $from_email = 'ppdbpa@gmail.com';
                    $subject = 'Verifikasi Aktivasi Akun';
                    $message = 'Yth. '.$nama.',<br /><br /> Untuk aktivasi akun silakan klik link berikut untuk verifikasi alamat email Anda.<br /><br /> http://localhost/pa/Authentication_C/aktivasi/'.$no_hp.'/'.$email.'<br /><br /><br />Terima Kasih<br />Panitia PPDB SD Ar-Rafi\'';

                    $config['protocol'] = 'smtp';
                    $config['smtp_host'] = 'ssl://smtp.googlemail.com';
                    $config['smtp_port'] = '465';
                    $config['smtp_user'] = $from_email;
                    $config['smtp_pass'] = 'hani260795';
                    $config['mailtype'] = 'html';
                    $config['charset'] = 'iso-8859-1';
                    $config['wordwrap'] = TRUE;
                    $config['newline'] = "\r\n";
                    $this->email->initialize($config);

                    $this->email->from($from_email, 'SD Ar Rafi\'');
                    $this->email->to($email);
                    $this->email->subject($subject);
                    $this->email->message($message);
                    
                    if ($this->email->send()) {
                        $identitas = $this->input->post('identitas');
                        $alamat = $this->input->post('alamat');
                        $asal = $this->input->post('asal');
                        $result = $this->Authentication_M->pendaftaran($identitas,$nama,$alamat,$no_hp,$email,$asal);

                        if ($result) {
                            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil, Terima kasih telah melakukan pendaftaran. Cek Email untuk aktivasi akun!.</div>');
                            redirect('welcome/buku_tamu');
                        } else {
                            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Maaf, Proses pengisian Buku Tamu gagal.</div>');
                            redirect('welcome/buku_tamu');
                        }
                    } else {
                        $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Periksa koneksi internet Anda. Pengisian Buku Tamu tidak dapat dilakukan</div>');
                        redirect('welcome/buku_tamu');
                    }
                } else {
                    $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Anda harus setuju dengan syarat dan ketentuan untuk mengikuti proses PPDB.</div>');
                    redirect('welcome/buku_tamu');
                }
            }
		}

        public function aktivasi($no_hp,$email){
            $pesan = 'Terima kasih telah mengisi Buku Tamu dan telah melakukan aktivasi akun.
                        Username: '.$email.'
                        Password: '.$no_hp;
            $result = $this->Authentication_M->verifikasi($no_hp,$email,$pesan);
            if ($result>0) {
                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Terima Kasih, akun Anda telah diaktivasi. Silakan login untuk mengikuti proses PPDB.</div>');
                redirect('welcome/login');
            } else {
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Maaf, Proses Aktivasi Gagal!.</div>');
                redirect('welcome/buku_tamu');
            }
        }

        public function login(){
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $masuk = $this->Authentication_M->masuk($username,md5($password));

            foreach ($masuk as $key => $value) {
                $session = array(
                    'username' => $value->username,
                    'password' => $value->password,
                    'privilege' => $value->privilege,
                    'status' => $value->status
                );
                $this->session->set_userdata($session);
            }

            $privilege = $this->session->userdata('privilege');

            if (isset($username) && isset($password)) {
                $this->form_validation->set_rules('username', 'Username', 'required|valid_email|callback_username_check|callback_status_check');
                $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[13]|alpha_numeric|callback_password_check');

                if ($this->form_validation->run()==false) {
                    $data = array(
                        'body' => 'login'
                    );
                    $this->parser->parse('assets',$data);
                } else {
                    $masuk = $this->Authentication_M->masuk($username,md5($password));

                    foreach ($masuk as $key => $value) {
                        $session = array(
                            'username' => $value->username,
                            'password' => $value->password,
                            'privilege' => $value->privilege,
                            'status' => $value->status,
                            'profile' => $value->profile
                        );
                        $this->session->set_userdata($session);
                    }

                    if ($privilege=='Panitia') {
                        $jumlah = $this->Panitia_M->jumlah_notifikasi();
                        $notifikasi = $this->Panitia_M->notifikasi();
                        $content = 'dashboard/panitia/dashboard';
                    } elseif ($privilege=='Tata Usaha Bagian Keuangan') {
                        $jumlah = $this->Panitia_M->jumlah_notifikasi();
                        $notifikasi = $this->Panitia_M->notifikasi();
                        $content = 'dashboard/keuangan/dashboard';
                    } elseif ($privilege=='Tata Usaha Bagian Kesiswaan') {
                        $jumlah = $this->Ortu_M->jumlah_notifikasi();
                        $notifikasi = $this->Ortu_M->notifikasi();
                        $content = 'dashboard/kesiswaan/dashboard';
                    } elseif ($privilege=='Orang Tua') {
                        $masuk_ortu = $this->Authentication_M->masuk_ortu($this->session->userdata('username'),$this->session->userdata('password'));

                        foreach ($masuk_ortu as $key => $value) {
                            $session = array(
                                'username' => $value->username,
                                'password' => $value->password,
                                'privilege' => $value->privilege,
                                'status' => $value->status,
                                'no_pendaftaran' => $value->no_pendaftaran
                            );
                            $this->session->set_userdata($session);
                        }

                        $jumlah = $this->Ortu_M->jumlah_notifikasi();
                        $notifikasi = $this->Ortu_M->notifikasi();
                        $content = 'dashboard/orangtua/dashboard';
                    } elseif ($privilege=='Operator') {
                        $jumlah = $this->Ortu_M->jumlah_notifikasi();
                        $notifikasi = $this->Ortu_M->notifikasi();
                        $content = 'dashboard/operator/dashboard';
                    } elseif ($privilege=='Kepala Sekolah') {
                        $jumlah = $this->Ortu_M->jumlah_notifikasi();
                        $notifikasi = $this->Ortu_M->notifikasi();
                        $content = 'dashboard/kepsek/dashboard';
                    } elseif ($privilege=='Pendaftar') {
                        $masuk_pendaftar = $this->Authentication_M->masuk_pendaftar($this->session->userdata('username'),$this->session->userdata('password'));
                        foreach ($masuk_pendaftar as $key => $value) {
                            $session = array(
                                'username' => $value->username,
                                'password' => $value->password,
                                'privilege' => $value->privilege,
                                'status' => $value->status,
                                'no_identitas' => $value->id_buku_tamu,
                                'no_pendaftaran' => $value->no_pendaftaran,
                                'no_hp' => $value->no_hp,
                                'profile' => $value->profile
                            );
                            $this->session->set_userdata($session);
                        }
                        $content = 'dashboard/pendaftar/dashboard';

                        $no_hp = $this->session->userdata('no_hp');
                        $jumlah = $this->Pendaftar_M->jumlah_notifikasi($no_hp);
                        $notifikasi = $this->Pendaftar_M->notifikasi($this->session->userdata('no_hp'));
                    }
                    
                    $data = array(
                        'page' => 'Dashboard',
                        'content' => $content,
                        'jumlah' => $jumlah,
                        'notifikasi' => $notifikasi
                    );

                    $this->parser->parse('dashboard/index',$data);
                }
            } else {
                if (!empty($this->session->userdata('username'))) {
                    if ($privilege=='Panitia') {
                        $content = 'dashboard/panitia/dashboard';
                    }

                    $data = array(
                        'page' => 'Dashboard',
                        'content' => $content
                    );

                    $this->parser->parse('dashboard/index',$data);
                } else {
                    $data = array(
                        'body' => 'login'
                    );
                    $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"> × </button> Silakan login terlebih dahulu! </div>');
                    $this->parser->parse('assets',$data);
                }
            }
        }

        public function lockscreen(){
            $this->session->unset_userdata('password','privilege');
            redirect('Welcome/lock_screen');
        }

        public function masuk_screen(){
            $username = $this->session->userdata('username');
            $password = $this->input->post('password');

            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[13]|alpha_numeric|callback_password_check');

            if ($this->form_validation->run()==false){
                $data = array(
                    'body' => 'lockscreen'
                );
                $this->parser->parse('assets',$data);
            } else {
                $masuk = $this->Authentication_M->masuk($username,md5($password));

                $session = array(
                    'username' => $masuk[0]->username,
                    'password' => $masuk[0]->password,
                    'privilege' => $masuk[0]->privilege
                );
                $this->session->set_userdata($session);

                $content = '';

                if ($this->session->userdata('privilege')=='Pendaftar') {
                    $content = 'dashboard/pendaftar/dashboard';
                } else if ($this->session->userdata('privilege')=='Orang Tua') {
                    $content = 'dashboard/orangtua/dashboard';
                } else if ($this->session->userdata('privilege')=='Panitia') {
                   $content = 'dashboard/panitia/dashboard';
                } else if ($this->session->userdata('privilege')=='Tata Usaha Bagian Keuangan'){
                    $content = 'dashboard/keuangan/dashboard';
                } else if ($this->session->userdata('privilege')=='Tata Usaha Bagian Kesiswaan'){
                    $content = 'dashboard/kesiswaan/dashboard';
                } else if ($this->session->userdata('privilege')=='Operator'){
                    $content = 'dashboard/operator/dashboard';
                } else if ($this->session->userdata('privilege')=='Kepala Sekolah') {
                    $content = 'dashboard/kepsek/dashboard';
                }

                $data = array(
                    'page' => 'Dashboard',
                    'content' => $content
                );

                $this->parser->parse('dashboard/index',$data);
            }
        }

        public function recover_password(){
            $email = $this->input->post('email');

            $this->form_validation->set_rules('email','Email','required|valid_email|callback_email_terdaftar_check');

            if ($this->form_validation->run()==false) {
                $data = array(
                    'body' => 'recover_password'
                );

                $this->session->set_flashdata('pesan','<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Masukan alamat <b>Email</b> Anda dan instruksi reset password akan dikirim!</div>');
                $this->parser->parse('assets',$data);
            } else {
                $from_email = 'ppdbpa@gmail.com';
                $subject = 'Reset Password';
                $message = 'Yth. '.$email.',<br /><br /> Klik link berikut untuk reset password.<br /><br /> http://localhost/pa/welcome/reset_password/'.md5($email).'<br /><br /><br />Terima Kasih<br />Panitia PPDB SD Ar-Rafi\'';
                $config['protocol'] = 'smtp';
                $config['smtp_host'] = 'ssl://smtp.googlemail.com';
                $config['smtp_port'] = '465';
                $config['smtp_user'] = $from_email;
                $config['smtp_pass'] = 'hani260795';
                $config['mailtype'] = 'html';
                $config['charset'] = 'iso-8859-1';
                $config['wordwrap'] = TRUE;
                $config['newline'] = "\r\n";
                $this->email->initialize($config);

                $this->email->from($from_email, 'SD Ar Rafi\'');
                $this->email->to($email);
                $this->email->subject($subject);
                $this->email->message($message);

                if ($this->email->send()) {
                    $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Cek Email untuk proses reset password.</div>');
                    $data = array(
                        'body' => 'recover_password'
                    );
                    $this->parser->parse('assets',$data);
                } else {
                    $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal Kirim Email.</div>');
                    $data = array(
                        'body' => 'recover_password'
                    );
                    $this->parser->parse('assets',$data);
                }
            }        
        }

        public function reset_password(){
            $this->form_validation->set_rules('email','Email','required|valid_email|callback_email_terdaftar_check');
            $this->form_validation->set_rules('no_hp','No HP','required|numeric|callback_no_hp_check');
            $this->form_validation->set_rules('password','Password','required|alpha_numeric_spaces');

            if ($this->form_validation->run()==false) {
                $data = array(
                    'body' => 'reset_password'
                );
                $this->parser->parse('assets',$data);
            } else {
                $username = $this->input->post('email');
                $password_lama = $this->input->post('no_hp');
                $password_baru = $this->input->post('password');
                $result = $this->Authentication_M->reset_password($username,md5($password_lama),md5($password_baru));

                if ($result>0) {
                    $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Password telah diganti. Silakan login!</div>');
                    $data = array(
                        'body' => 'login'
                    );
                    $this->parser->parse('assets',$data);
                } else {
                    $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Password Gagal diganti.</div>');
                    $data = array(
                        'body' => 'reset_password'
                    );
                    $this->parser->parse('assets',$data);
                }
            }
        }

        public function logout(){
            $session = array('username','password');
            $this->session->unset_userdata($session);
            redirect('http://localhost/pa/');
        }

        public function identitas_check(){
            $identitas = $this->input->post('identitas');
            $cek_identitas = $this->Authentication_M->cek_identitas($identitas);

            if ($cek_identitas>0) {
                $this->form_validation->set_message('identitas_check', 'Identitas yang Anda masukan telah terdaftar.');
                return FALSE;
            } else {
                return TRUE;
            }
        }

        public function username_check(){
            $username = $this->input->post('username');
            $cek_email = $this->Authentication_M->cek_email($username);

            if ($cek_email>0) {
                return TRUE;
            } else {
                $this->form_validation->set_message('username_check', 'Username yang Anda masukan tidak terdaftar.');
                return FALSE;
            }
        }

        public function status_check(){
            $username = $this->input->post('username');
            $status = $this->Authentication_M->cek_status($username);

            if ($status[0]->status == 'Aktif') {
                return TRUE;
            } else if ($status[0]->status == 'Proses'){
                $this->form_validation->set_message('status_check', 'Username yang Anda masukan belum diaktivasi. Cek email untuk aktivasi akun.');
                return FALSE;
            } else if ($status[0]->status == 'Tidak_Aktif'){
                $this->form_validation->set_message('status_check', 'Username yang Anda masukan telah dinonaktifkan.');
                return FALSE;
            }
        }

        public function password_check(){
            $username = $this->input->post('username');

            if (empty($username)) {
                $username = $this->session->userdata('username');
            }
            $password = $this->input->post('password');
            $cek_password = $this->Authentication_M->cek_password($username);

            if ($cek_password) {
                if ($cek_password[0]->password==md5($password)) {
                    return TRUE;
                } else {
                    $this->form_validation->set_message('password_check', 'Password yang Anda masukan salah!');
                    return FALSE;
                }
            } else {
            }
        }

        public function kabupaten_check(){
            $kabupaten = $this->input->post('kabupaten');

            if ($kabupaten=='Asal') {
                $this->form_validation->set_message('kabupaten_check','Silakan pilih Kabupaten atau Kota asal');
                return FALSE;
            } else {
                return TRUE;
            }
        }

        public function email_check(){
            $email = $this->input->post('email');
            $cek_email = $this->Authentication_M->cek_email($email);

            if ($cek_email>0) {
                $this->form_validation->set_message('email_check', 'Email yang Anda masukan telah terdaftar. Silakan login');
                return FALSE;
            } else {
                return TRUE;
            }
        }

        public function email_terdaftar_check(){
            $email = $this->input->post('email');
            $cek_email = $this->Authentication_M->cek_email($email);

            if ($cek_email>0) {
                return TRUE;
            } else {
                $this->form_validation->set_message('email_terdaftar_check', 'Email yang Anda masukan belum terdaftar. Silakan isi buku tamu');
                return FALSE;
            }
        }

        public function no_hp_check(){
            $nohp = $this->input->post('no_hp');
            $cek_no_hp = $this->Authentication_M->cek_no_hp($nohp);

            if ($cek_no_hp>0) {
                return TRUE;
            } else {
                $this->form_validation->set_message('no_hp_check', 'No HP yang Anda masukan belum terdaftar.');
                return FALSE;
            }
        }

        public function no_hp_daftar_check(){
            $nohp = $this->input->post('no_hp');
            $cek_no_hp = $this->Authentication_M->cek_no_hp_daftar($nohp);

            if ($cek_no_hp>0) {
                $this->form_validation->set_message('no_hp_daftar_check', 'No HP yang Anda masukan telah terdaftar.');
                return FALSE;
            } else {
                return TRUE;
            }
        }
	}