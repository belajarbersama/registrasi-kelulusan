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
										<a href="#">Formulir</a>
									</li>
									<li>
										<a href="#">Edit Data</a>
									</li>
									<li class="active">
										Data Siswa
									</li>
								</ol>
							</div>
						</div>

						<?php echo $this->session->flashdata('pesan');?>
						<div class="row">
							<div class="col-sm-12">
								<div class="card-box">
									<h4 class="m-t-0 header-title"><b>{toolbar}</b></h4>
									<?php
                                        foreach ($ds as $key => $value) {
                                            ?>
                                            <div class="row">
                                                <?php
                                                    $attributes = array(
                                                        'method' => 'post',
                                                        'role' => 'form'
                                                    );
                                                    echo form_open('Pendaftar_C/edit_ket_siswa',$attributes);
                                                ?>
                                                <div class="col-md-6">
                                                    <div class="p-20">
                                                        <div class="m-t-20">
                                                            <h5><label>NIK</label></h5>
                                                            <?php
                                                                $attributes = array(
                                                                    'class' => 'form-control',
                                                                    'maxlength' => 16,
                                                                    'name' => 'nik',
                                                                    'id' => 'length',
                                                                    'placeholder' => $value->nik
                                                                );
                                                                echo form_input($attributes);

                                                                echo form_error('nik','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                            ?>
                                                        </div>

                                                        <div class="m-t-20">
                                                            <h5><label>Nama Lengkap</label></h5>
                                                            <?php
                                                                $attributes = array(
                                                                    'class' => 'form-control',
                                                                    'maxlength' => 30,
                                                                    'name' => 'nama_lengkap',
                                                                    'id' => 'length',
                                                                    'placeholder' => $value->nama_lengkap
                                                                );
                                                                echo form_input($attributes);

                                                                echo form_error('nama_lengkap','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                            ?>
                                                        </div>

                                                        <div class="m-t-20">
                                                            <h5><label>Nama Panggilan</label></h5>
                                                            <?php
                                                                $attributes = array(
                                                                    'class' => 'form-control',
                                                                    'maxlength' => 10,
                                                                    'name' => 'nama_panggilan',
                                                                    'id' => 'length',
                                                                    'placeholder' => $value->nama_panggilan
                                                                );
                                                                echo form_input($attributes);

                                                                echo form_error('nama_panggilan','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                            ?>
                                                        </div>

                                                        <div class="m-t-20">
                                                            <h5><label>Jenis Kelamin</label></h5>
                                                            <input type="radio" name="jekel" value="L"> Laki- Laki</input>
                                                            <input type="radio" name="jekel" value="P"> Perempuan</input>
                                                        </div>

                                                        <div class="m-t-20">
                                                            <h5><label>Tanggal Lahir</label></h5>
                                                            <div class="input-group">
                                                                <?php
                                                                    $attributes = array(
                                                                        'type' => 'text',
                                                                        'class' => 'form-control',
                                                                        'placeholder' => 'mm/dd/yyyy',
                                                                        'id' => 'tgl_lahir',
                                                                        'name' => 'tgl_lahir',
                                                                        'placeholder' => $value->tgl_lahir
                                                                    );

                                                                    echo form_input($attributes);
                                                                ?>
                                                                <span class="input-group-addon bg-custom b-0 text-white">
                                                                    <i class="icon-calender"></i>
                                                                </span>
                                                            </div>
                                                            <?php
                                                                echo form_error('tgl_lahir','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                            ?>
                                                        </div>

                                                        <div class="m-t-20">
                                                            <h5><label>Tempat Lahir</label></h5>
                                                            <?php
                                                                $attributes = array(
                                                                    'class' => 'form-control',
                                                                    'maxlength' => 50,
                                                                    'name' => 'tempat_lahir',
                                                                    'id' => 'length',
                                                                    'placeholder' => $value->tempat_lahir
                                                                );
                                                                echo form_input($attributes);

                                                                echo form_error('tempat_lahir','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                            ?>
                                                        </div>

                                                        <div class="m-t-20">
                                                            <h5><label>Agama</label></h5>
                                                            <?php
                                                                $options = array(
                                                                    'Agama' => 'Agama',
                                                                    'Islam' => 'Islam',
                                                                    'Katolik' => 'Katolik',
                                                                    'Protestan' => 'Protestan',
                                                                    'Hindu' => 'Hindu',
                                                                    'Budha' => 'Budha',
                                                                    'Lainnya' => 'Lainnya'
                                                                );

                                                                $attributes = array(
                                                                    'class' => 'selectpicker',
                                                                    'data-style' => 'btn-white'
                                                                );

                                                                echo form_dropdown('agama',$options,'Agama',$attributes);

                                                                echo form_error('agama','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                            ?>
                                                        </div>

                                                        <div class="m-t-20">
                                                            <h5><label>Kewarganegaraan</label></h5>
                                                            <input type="radio" name="kewarganegaraan" value="WNI"> WNI </input>
                                                            <input type="radio" name="kewarganegaraan" value="WNA"> WNA </input>
                                                        </div>

                                                        <div class="m-t-20" style="display: inline-block;">
                                                            <h5><label>Anak Ke</label></h5>
                                                            <?php
                                                                $attributes = array(
                                                                    'class' => 'form-control',
                                                                    'maxlength' => 3,
                                                                    'name' => 'anak_ke',
                                                                    'id' => 'length',
                                                                    'type' => 'number',
                                                                    'placeholder' => $value->anak_ke
                                                                );
                                                                echo form_input($attributes);

                                                                echo form_error('anak_ke','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                            ?>
                                                        </div>

                                                        <div class="m-t-20" style="display: inline-block;">
                                                            <h5><label>Jumlah Saudara Kandung</label></h5>
                                                            <?php
                                                                $attributes = array(
                                                                    'class' => 'form-control',
                                                                    'maxlength' => 3,
                                                                    'name' => 'jumlah_saudara_kandung',
                                                                    'id' => 'length',
                                                                    'type' => 'number',
                                                                    'placeholder' => $value->jumlah_saudara_kandung
                                                                );
                                                                echo form_input($attributes);

                                                                echo form_error('jumlah_saudara_kandung','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                            ?>
                                                        </div>

                                                        <div class="m-t-20" style="display: inline-block;">
                                                            <h5><label>Jumlah Saudara Tiri</label></h5>
                                                            <?php
                                                                $attributes = array(
                                                                    'class' => 'form-control',
                                                                    'maxlength' => 3,
                                                                    'name' => 'jumlah_saudara_tiri',
                                                                    'id' => 'length',
                                                                    'type' => 'number',
                                                                    'placeholder' => $value->jumlah_saudara_tiri
                                                                );
                                                                echo form_input($attributes);

                                                                echo form_error('jumlah_saudara_tiri','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                            ?>
                                                        </div>

                                                        <div class="m-t-20" style="display: inline-block;">
                                                            <h5><label>Jumlah Saudara Angkat</label></h5>
                                                            <?php
                                                                $attributes = array(
                                                                    'class' => 'form-control',
                                                                    'maxlength' => 3,
                                                                    'name' => 'jumlah_saudara_angkat',
                                                                    'id' => 'length',
                                                                    'type' => 'number',
                                                                    'placeholder' => $value->jumlah_saudara_angkat
                                                                );
                                                                echo form_input($attributes);

                                                                echo form_error('jumlah_saudara_angkat','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                            ?>
                                                        </div>

                                                        <div class="m-t-20">
                                                            <h5><label>Bahasa Sehari-hari</label></h5>
                                                            <?php
                                                                $attributes = array(
                                                                    'class' => 'form-control',
                                                                    'maxlength' => 16,
                                                                    'name' => 'bahasa_sehari',
                                                                    'id' => 'length',
                                                                    'placeholder' => $value->bahasa_sehari
                                                                );
                                                                echo form_input($attributes);

                                                                echo form_error('bahasa_sehari','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                            ?>
                                                        </div>

                                                        <div class="m-t-20">
                                                            <div class="m-t-10">
                                                                <h5><label>Berat Badan</label></h5>
                                                                <div class="input-group m-t-10">
                                                                    <?php
                                                                        $attributes = array(
                                                                            'class' => 'form-control',
                                                                            'maxlength' => 3,
                                                                            'name' => 'berat_badan',
                                                                            'id' => 'length',
                                                                            'placeholder' => $value->berat_badan
                                                                        );
                                                                        echo form_input($attributes);

                                                                        echo form_error('berat_badan','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                                    ?>
                                                                    <span class="input-group-addon">kg</span>
                                                                </div>
                                                            </div>

                                                            <div class="m-t-10">
                                                                <h5><label>Tinggi Badan</label></h5>
                                                                <div class="m-t-10">
                                                                    <div class="input-group m-t-10">
                                                                        <?php
                                                                            $attributes = array(
                                                                                'class' => 'form-control',
                                                                                'maxlength' => 3,
                                                                                'name' => 'tinggi_badan',
                                                                                'id' => 'length',
                                                                                'placeholder' => $value->tinggi_badan
                                                                            );
                                                                            echo form_input($attributes);

                                                                            echo form_error('tinggi_badan','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                                        ?>
                                                                        <span class="input-group-addon">cm</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="p-20">


                                                        <div class="m-t-20">
                                                            <h5><label>Golongan Darah</label></h5>
                                                            <?php
                                                                $options = array(
                                                                    'Golongan Darah' => 'Golongan Darah',
                                                                    'A' => 'A',
                                                                    'B' => 'B',
                                                                    'O' => 'O',
                                                                    'AB' => 'AB'
                                                                );

                                                                $attributes = array(
                                                                    'class' => 'selectpicker',
                                                                    'data-style' => 'btn-white'
                                                                );

                                                                echo form_dropdown('goda',$options,'Golongan Darah',$attributes);

                                                                echo form_error('goda','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                            ?>
                                                        </div>

                                                        <div class="m-t-20">
                                                            <h5><label>Penyakit Pernah Diderita</label></h5>
                                                            <?php
                                                                $attributes = array(
                                                                    'class' => 'form-control',
                                                                    'maxlength' => 100,
                                                                    'name' => 'penyakit_derita',
                                                                    'id' => 'length',
                                                                    'placeholder' => $value->penyakit_derita
                                                                );
                                                                echo form_input($attributes);

                                                                echo form_error('penyakit_derita','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                            ?>
                                                        </div>

                                                        <div class="m-t-20">
                                                            <h5><b>Alamat Rumah</b></h5>
                                                            <?php 
                                                                $attributes = array(
                                                                    'class' => 'form-control',
                                                                    'maxlength' => 225,
                                                                    'name' => 'alamat_rumah',
                                                                    'id' => 'alamat',
                                                                    'rows' => 2,
                                                                    'placeholder' => $value->alamat_rumah
                                                                ); 
                                                                echo form_textarea($attributes);

                                                                echo form_error('alamat_rumah','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                            ?>
                                                        </div>

                                                        <div class="m-t-20">
                                                            <h5><label>Jalan</label></h5>
                                                            <?php
                                                                $attributes = array(
                                                                    'class' => 'form-control',
                                                                    'maxlength' => 50,
                                                                    'name' => 'jalan',
                                                                    'id' => 'length',
                                                                    'placeholder' => ucwords($value->jalan)
                                                                );
                                                                echo form_input($attributes);

                                                                echo form_error('jalan','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                            ?>
                                                        </div>

                                                         <div class="m-t-20">
                                                            <div class="m-t-10" style="display: inline-block;">
                                                                <h5><label>RT</label></h5>
                                                                <?php
                                                                    $attributes = array(
                                                                        'class' => 'form-control',
                                                                        'maxlength' => 2,
                                                                        'name' => 'rt',
                                                                        'id' => 'length',
                                                                        'placeholder' => substr($value->rt_rw,0,2)
                                                                    );
                                                                    echo form_input($attributes);

                                                                    echo form_error('rt','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                                ?>
                                                            </div>

                                                            <div class="m-t-10" style="display: inline-block;">
                                                                <h5><label>RW</label></h5>
                                                                <?php
                                                                    $attributes = array(
                                                                        'class' => 'form-control',
                                                                        'maxlength' => 2,
                                                                        'name' => 'rw',
                                                                        'id' => 'length',
                                                                        'placeholder' => substr($value->rt_rw,-2)
                                                                    );
                                                                    echo form_input($attributes);

                                                                    echo form_error('rw','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                                ?>
                                                            </div>
                                                        </div>

                                                         <div class="m-t-20">
                                                            <h5><label>Kelurahan</label></h5>
                                                            <?php
                                                                $attributes = array(
                                                                    'class' => 'form-control',
                                                                    'maxlength' => 20,
                                                                    'name' => 'kelurahan',
                                                                    'id' => 'length',
                                                                    'placeholder' => ucwords($value->kelurahan)
                                                                );
                                                                echo form_input($attributes);

                                                                echo form_error('kelurahan','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                            ?>
                                                        </div>

                                                        <div class="m-t-20">
                                                            <h5><label>Kecamatan</label></h5>
                                                            <?php
                                                                $attributes = array(
                                                                    'class' => 'form-control',
                                                                    'maxlength' => 20,
                                                                    'name' => 'kecamatan',
                                                                    'id' => 'length',
                                                                    'placeholder' => ucwords($value->kecamatan)
                                                                );
                                                                echo form_input($attributes);

                                                                echo form_error('kecamatan','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                            ?>
                                                        </div>

                                                        <div class="m-t-20">
                                                            <h5><label>Kabupaten/Kota</label></h5>
                                                            <?php
                                                                $attributes = array(
                                                                    'class' => 'form-control',
                                                                    'maxlength' => 20,
                                                                    'name' => 'kota_kabupaten',
                                                                    'id' => 'length',
                                                                    'placeholder' => ucwords($value->kota_kabupaten)
                                                                );
                                                                echo form_input($attributes);

                                                                echo form_error('kota_kabupaten','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                            ?>
                                                        </div>

                                                        <div class="m-t-20">
                                                            <div class="m-t-10" style="display: inline-block;">
                                                                <h5><label>Kode Area</label></h5>
                                                                <?php
                                                                    $attributes = array(
                                                                        'class' => 'form-control',
                                                                        'maxlength' => 6,
                                                                        'name' => 'kode_area',
                                                                        'id' => 'length',
                                                                        'placeholder' => substr($value->telp_rumah, 0,3)
                                                                    );
                                                                    echo form_input($attributes);

                                                                    echo form_error('kode_area','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                                ?>
                                                            </div>

                                                            <div class="m-t-10" style="display: inline-block;">
                                                                <h5><label>Telepon Rumah</label></h5>
                                                                <?php
                                                                    $attributes = array(
                                                                        'class' => 'form-control',
                                                                        'maxlength' => 10,
                                                                        'name' => 'telp_rumah',
                                                                        'id' => 'length',
                                                                        'placeholder' => substr($value->telp_rumah, 4)
                                                                    );
                                                                    echo form_input($attributes);

                                                                    echo form_error('telp_rumah','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                                ?>
                                                            </div>
                                                        </div>

                                                        <div class="m-t-20">
                                                            <h5><label>Kode Pos</label></h5>
                                                            <?php
                                                                $attributes = array(
                                                                    'class' => 'form-control',
                                                                    'maxlength' => 5,
                                                                    'name' => 'kode_pos',
                                                                    'id' => 'length',
                                                                    'placeholder' => $value->kode_pos
                                                                );
                                                                echo form_input($attributes);

                                                                echo form_error('kode_pos','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                            ?>
                                                        </div>

                                                        <div class="m-t-20">
                                                            <h5><label>Tempat Tinggal</label></h5>
                                                            <?php
                                                                $options = array(
                                                                    'Tempat Tinggal' => 'Tempat Tinggal',
                                                                    'Orang Tua' => 'Orang Tua',
                                                                    'Menumpang' => 'Menumpang',
                                                                    'Wali' => 'Wali',
                                                                    'Asrama' => 'Asrama',
                                                                    'Lainnya' => 'Lainnya'
                                                                );

                                                                $attributes = array(
                                                                    'class' => 'selectpicker',
                                                                    'data-style' => 'btn-white'
                                                                );

                                                                echo form_dropdown('tempat_tinggal',$options,'Tempat Tinggal',$attributes);

                                                                echo form_error('tempat_tinggal','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                            ?>
                                                        </div> 

                                                        <div class="m-t-20">
                                                            <h5><label>Jarak Rumah</label></h5>
                                                            <div class="m-t-10">
                                                                <div class="input-group m-t-10">
                                                                    <?php
                                                                        $attributes = array(
                                                                            'class' => 'form-control',
                                                                            'maxlength' => 3,
                                                                            'name' => 'jarak_rumah_sekolah',
                                                                            'id' => 'length',
                                                                            'placeholder' => $value->jarak_rumah_sekolah
                                                                        );
                                                                        echo form_input($attributes);

                                                                        echo form_error('jarak_rumah_sekolah','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                                    ?>
                                                                    <span class="input-group-addon">KM</span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="m-t-20" style="float: right;">
                                                            <button type="submit" class="btn btn-default waves-effect waves-light">Selanjutnya
                                                                <span class="btn-label btn-label-right">
                                                                    <i class="fa fa-arrow-right"></i>
                                                                </span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php echo form_close();?>
                                            <?php
                                        }
                                    ?>
								</div>
							</div>
						</div>
            		</div>     
                </div>