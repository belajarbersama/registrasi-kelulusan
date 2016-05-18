<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php
    $username = $this->session->userdata('username');
    $password = $this->session->userdata('password');
    $privilege = $this->session->userdata('privilege');
    var_dump($privilege);

    if (empty($username) && empty($password)) {
        echo "Silakan login untuk mengakses halaman ini";
    } else if ($privilege!='Panitia') {
        echo "Maaf, Halaman ini untuk Panitia";
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
										Jadwal
									</li>
								</ol>
							</div>
						</div>

                        	
						<!--Custom Toolbar-->
						<!--===================================================-->
						<?php echo $this->session->flashdata('pesan');?>
						<div class="row">
							<div class="col-sm-12">
								<div class="card-box">
									<h4 class="m-t-0 header-title"><b>{toolbar}</b></h4>
									<p class="text-muted font-13">
										&nbsp;
									</p>
									
                                    <?php
                                        $attributes = array(
                                            'id' => 'buat_jadwal_daftar_ulang',
                                            'enabled' => TRUE,
                                            'class' => 'btn btn-primary waves-effect waves-light'
                                        );

                                        echo anchor('Panitia_C/form_buat_jadwal_daftar_ulang','Buat Jadwal',$attributes);
                                    ?>

									<table id="demo-custom-toolbar"  data-toggle="table"
										   data-toolbar="#buat_jadwal_daftar_ulang"
										   data-search="true"
										   data-show-refresh="true"
										   data-show-toggle="true"
										   data-show-columns="true"
										   data-sort-name="id"
										   data-page-list="[5, 10, 20]"
										   data-page-size="5"
										   data-pagination="true" data-show-pagination-switch="true" class="table-bordered ">
										<thead>
											<tr>
												<th data-field="id" data-sortable="true">No</th>
                                                <th data-field="nama" data-sortable="true">Nama Kegiatan</th>
												<th data-field="keterangan" data-sortable="true">Keterangan</th>
												<th data-field="tanggal_mulai" data-sortable="true">Tanggal Mulai</th>
                                                <th data-field="tanggal_selesai" data-sortable="true">Tanggal Selesai</th>
												<th data-field="status" data-align="center" data-sortable="true" data-formatter="statusterlaksana">Status</th>
												<th data-field="action" data-sortable="true" data-align="center">Aksi</th>
											</tr>
										</thead>
										
										<tbody>
											<?php
												$no = 1;
												foreach ($data_jadwal as $key => $value) {
													?>
												<tr>
													<td><?php echo $no++;?></td>
                                                    <td><?php echo $value->nama_kegiatan;?></td>
													<td><?php echo $value->keterangan;?></td>
													<td><?php echo date('d-m-Y',strtotime($value->tgl_mulai));?></td>
                                                    <td><?php echo date('d-m-Y',strtotime($value->tgl_selesai));?></td>
													<td><?php echo $value->status;?></td>
													<td>

                                                        <a href="#"
                                                            class="on-default edit-row"
                                                            title="Edit Jadwal Daftar Ulang"
                                                            Style="color: #29b6f6;"
                                                            data-id="<?php echo $value->id_jadwal;?>"
                                                            data-nama-kegiatan="<?php echo $value->nama_kegiatan;?>"
                                                            data-keterangan="<?php echo $value->keterangan;?>"
                                                            data-mulai="<?php echo $value->tgl_mulai;?>"
                                                            data-selesai="<?php echo $value->tgl_selesai;?>"
                                                            data-status="<?php echo $value->status;?>"
                                                            data-toggle="modal"
                                                            data-target="#edit_jadwal_daftar_ulang"
                                                            class="btn btn-default waves-effect waves-light"
                                                        ><i class="fa fa-pencil "></i>
                                                     <span></span></a>
														
														<?php
															$attributes = array(
                                                                'class' => 'on-default remove-row',
                                                                'title' => 'Hapus Jadwal',
                                                                'data-animation' => 'fadein',
                                                                'data-plugin' => 'custommodal',
                                                                'data-overlaySpeed' => 200,
                                                                'data-overlayColor' => '#36404a',
                                                                'data-confirm' => 'Apakah Anda ingin menghapus data ini?'
															);

                                                            echo anchor('Panitia_C/hapus_jadwal_daftar_ulang/'.$value->id_jadwal,' <i style="color:#f05050" class="fa fa-trash-o" ></i> <span></span> ', $attributes);
														?>
													</td>
												</tr>
													<?php
												}
											?>	
										</tbody>
									</table>

								</div>
							</div>
						</div>
                    </div>     
                </div>



                <!-- ============================================================== -->
                <!-- Modal EDIT Jadwal Daftar Ulang-->
                <!-- ============================================================== -->
                <div id="edit_jadwal_daftar_ulang" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog"> 
                        <div class="modal-content">
                            <?php
                                $attributes = array(
                                    'method' => 'post',
                                    'role' => 'form'
                                );

                                echo form_open('Panitia_C/edit_jadwal_daftar_ulang',$attributes);
                            ?>
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title">Edit Jadwal</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-sm-4">ID Jadwal</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <?php

                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'name' => 'id_jadwal',
                                                            'id' => 'id_jadwal',
                                                            'readonly' => TRUE
                                                        );

                                                        echo form_input($attributes);
                                                    ?>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-sm-4">Nama Kegiatan</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <?php

                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'name' => 'nama_kegiatan',
                                                            'id' => 'nama_kegiatan'
                                                        );

                                                        echo form_input($attributes);
                                                    ?>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-sm-4">Keterangan</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <?php

                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'rows' => '5',
                                                            'name' => 'keterangan',
                                                            'id' => 'keterangan'
                                                        );

                                                        echo form_textarea($attributes);
                                                    ?>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-sm-4">Tanggal Mulai</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <?php 
                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'placeholder' => 'yyyy/mm/dd',
                                                            'id' => 'mulai',
                                                            'name' => 'mulai',
                                                            'readonly' => TRUE
                                                        );

                                                        echo form_input($attributes);
                                                    ?>
                                                </div>
                                            </div>
                                         </div> 
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-sm-4"></label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <?php 
                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'placeholder' => 'yyyy/mm/dd',
                                                            'id' => 'tanggal_mulai_edit_daftar_ulang',
                                                            'name' => 'tanggal_mulai'
                                                        );

                                                        echo form_input($attributes);
                                                    ?>
                                                    <span class="input-group-addon bg-custom b-0 text-white">
                                                        <i class="icon-calender"></i>
                                                    </span>
                                                </div>
                                            </div>
                                         </div> 
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-sm-4">Tanggal Selesai</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <?php 
                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'placeholder' => 'yyyy/mm/dd',
                                                            'id' => 'selesai',
                                                            'name' => 'selesai',
                                                            'readonly' =>TRUE
                                                        );

                                                        echo form_input($attributes);
                                                    ?>
                                                </div>
                                            </div>
                                         </div> 
                                     </div> 
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-sm-4"></label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <?php 
                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'placeholder' => 'yyyy/mm/dd',
                                                            'id' => 'tanggal_selesai_edit_daftar_ulang',
                                                            'name' => 'tanggal_selesai'
                                                        );

                                                        echo form_input($attributes);
                                                    ?>
                                                    <span class="input-group-addon bg-custom b-0 text-white">
                                                        <i class="icon-calender"></i>
                                                    </span>
                                                </div>
                                            </div>
                                         </div> 
                                     </div> 
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-sm-4">Status</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <div class="bootstrap-timepicker">
                                                        <?php
                                                            $attributes = array(
                                                                'id' => 'status',
                                                                'name' => 'status',
                                                                'class' => 'form-control',
                                                                'readonly' => TRUE
                                                            );

                                                            echo form_input($attributes);
                                                        ?>
                                                    </div>
                                                </div>         
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-sm-4"></label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <div class="bootstrap-timepicker">
                                                    <select name="status" class="selectpicker" data-style="btn-white">
                                                        <option disabled="true" selected="true">Status</option>
                                                        <option value="Belum">Belum</option>
                                                        <option value="Berlangsung">Berlangsung</option>
                                                        <option value="Terlaksana">Terlaksana</option>
                                                    </select>
                                                </div>
                                            </div>         
                                        </div>
                                    </div>
                                </div> 
                            </div>
                            <br>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-default waves-effect waves-light">Save changes</button>
                            </div>
                            <?php
                                echo form_close();
                            ?>
                        </div>
                    </div>
                </div>
        <?php
    }
?>