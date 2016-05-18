<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php
    $username = $this->session->userdata('username');
    $password = $this->session->userdata('password');
    $privilege = $this->session->userdata('privilege');

    if (empty($username) && empty($password)) {
        echo "Silakan login untuk mengakses halaman ini";
    } else if ($privilege!='Tata Usaha Bagian Kesiswaan') {
        echo "Maaf, Halaman ini untuk Tata Usaha Bagian Kesiswaan";
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
										<a href="#">Her-Registrasi</a>
									</li>
									<li>
										<a href="#">Jadwal</a>
									</li>
									<li class="active">
										Buat Jadwal
									</li>
								</ol>
							</div>
						</div>

                        
                        <div class="row">
                        	<div class="col-sm-12">
                        		<div class="card-box">
                        		<h4 class="m-t-0 header-title"><b>{toolbar}</b></h4>
                        			<p class="text-muted m-b-30 font-13">&nbsp;
									</p>
                        			
                        			<div class="row">
                        				<div class="col-md-12">
                        					<?php
                        						$attributes = array(
                        							'method' => 'post',
                        							'role' => 'form',
                        							'class' => 'form-horizontal'
                        						);

                        						echo form_open('Kesiswaan_C/buat_jadwal_buku_seragam',$attributes);
                        					?>

                        					<div class="form-group">
                                                <label class="col-md-2 control-label">Nama Kegiatan</label>
                                                <div class="col-md-10">
                                                    <?php

                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'name' => 'nama_kegiatan',
                                                            'id' => 'nama_kegiatan'
                                                        );

                                                        echo form_input($attributes);


                                                        echo form_error('nama_kegiatan','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                    ?>
                                                </div>
                                            </div>

                                            <div class="form-group">
                        						<label class="col-md-2 control-label">Keterangan</label>
                        						<div class="col-md-10">
                        							<?php

                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'rows' => '5',
                                                            'name' => 'keterangan',
                                                            'id' => 'keterangan'
                                                        );

                                                        echo form_textarea($attributes);


                                                        echo form_error('keterangan','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                    ?>
                        						</div>
                        					</div>
                        					
                        					<br>
                        					<div class="form-group">
                        						<label class="col-md-2 control-label">Tanggal Mulai</label>
                        						<div class="col-md-10">
                        							<div class="input-group">
                        								<?php
	                        								$attributes = array(
	                                                            'class' => 'form-control',
	                                                            'placeholder' => 'yyyy/mm/dd',
                                                            	'id' => 'tanggal_mulai_buat_her_registrasi',
                                                            	'name' => 'tgl_mulai'
	                                                        );

	                                                        echo form_input($attributes);
	                                                    ?>
	                                                    <span class="input-group-addon bg-custom b-0 text-white">
	                                                        <i class="icon-calender"></i>
	                                                    </span>
                        							</div>
                        							<?php
                        								echo form_error('tgl_mulai','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                        							?>
                                                </div>
	                                        </div>
	                                        <br>
	                                        <div class="form-group">
                        						<label class="col-md-2 control-label">Tanggal Selesai</label>
                        						<div class="col-md-10">
	                        						<div class="input-group">
	                        							<?php
	                        								$attributes = array(
	                                                            'class' => 'form-control',
	                                                            'placeholder' => 'yyyy/mm/dd',
                                                            	'id' => 'tanggal_selesai_buat_her_registrasi',
                                                            	'name' => 'tgl_selesai'
	                                                        );

	                                                        echo form_input($attributes);
	                                                    ?>
	                                                    <span class="input-group-addon bg-custom b-0 text-white">
	                                                        <i class="icon-calender"></i>
	                                                    </span>
	                        						</div>
	                        						<?php
	                        							echo form_error('tgl_selesai','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
	                        						?>
                                                </div>
	                                        </div>
	                                        <br>
                                            <button type="submit" class="btn btn-default waves-effect waves-light" style="float: right;">Simpan</button>
                                            <?php
                                                $attributes = array(
                                                    'class' => 'btn btn-primary waves-effect waves-light',
                                                    'style' => 'float: right;margin-right:2%;'
                                                );
                                                echo anchor('Kesiswaan_C/lihat_jadwal_buku_seragam','Batal',$attributes);?>
	                                        
	                                        <?php echo form_close();?>
                        				</div>
                        			</div>
                        		</div>
                        	</div>
                        </div>
                    </div>     
                </div>
        <?php
    }
?>