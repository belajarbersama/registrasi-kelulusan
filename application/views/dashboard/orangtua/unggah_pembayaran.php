<?php
    $username = $this->session->userdata('username');
    $password = $this->session->userdata('password');
    $privilege = $this->session->userdata('privilege');

    if (empty($username) && empty($password)) {
        echo "Silakan Login Untuk Mengakses Halaman Ini";
    } else if ($privilege!='Orang Tua') {
        echo 'Halaman ini untuk orang tua';
    } else {
        ?>
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="page-title">{page}</h4>
                                <ol class="breadcrumb">
                                    <li>
                                        <a href="#">Daftar Ulang</a>
                                    </li>
                                    <li class="active">
                                        Berkas
                                    </li>
                                </ol>
                            </div>
                        </div>
                        
                        
                        <?php echo $this->session->flashdata('pesan');?>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>{toolbar}</b></h4>
                                    <p class="text-muted m-b-15 font-13">
                                        Pembayaran minimal adalah Pendaftaran, SDP 50%, seragam dan SPP.
                                    </p>
                                    <div class="row">
                                        <?php
                                            echo form_open_multipart('Ortu_C/upload_pembayaran');
                                        ?>
                                            <div class="col-md-8">
                                                <div class="p-20">
                                                    <div class="form-group">
                                                        <label class="control-label">Jumlah Bayar</label>
                                                        <div class="input-group m-t-10">
                                                            <span class="input-group-addon">
                                                                Rp.
                                                            </span>
                                                            <input type="text" id="jumlah_bayar" name="jumlah_bayar" class="form-control">
                                                            <span class="input-group-addon">.00</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Bukti Bayar</label>
                                                        <input type="file" name="bukti_bayar" id="bukti_bayar" class="filestyle" data-buttonname="btn-default">
                                                    </div>
                                                    <div class="form-group m-b-0">
                                                        <button class="btn btn-default waves-effect waves-light">Upload</button>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                            echo form_close();
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- container --> 
                </div> <!-- content -->
        <?php
    }
?>