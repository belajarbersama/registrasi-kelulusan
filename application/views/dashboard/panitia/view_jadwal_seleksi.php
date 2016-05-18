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
                                        <a href="#">Seleksi</a>
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
                                    <p class="text-muted m-b-30 font-13">
                                        &nbsp;
                                    </p>

                                    <?php
                                        $attributes = array(
                                            'id' => 'buat_jadwal_seleksi',
                                            'enabled' => TRUE,
                                            'class' => 'btn btn-default waves-effect waves-light'
                                        );

                                        echo anchor('Panitia_C/form_buat_jadwal_seleksi','Buat Jadwal',$attributes);
                                    ?>                                    
                                    <table id="demo-foo-filtering"
                                    data-toggle="table"
                                    data-toolbar="#buat_jadwal_seleksi" class="table table-striped toggle-circle m-b-0" data-page-size="7">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Seleksi</th>
                                                <th>Sesi</th>
                                                <th>Kelompok</th>
                                                <th>Tanggal</th>
                                                <th>Waktu Mulai</th>
                                                <th>Waktu Selesai</th>
                                                <th>Ruangan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <div class="form-inline m-b-20">
                                            <div class="row">
                                                <div class="col-sm-6 text-xs-center">
                                                    <div class="form-group">
                                                        <label class="control-label m-r-5">Seleksi</label>
                                                        <select id="demo-foo-filter-status" class="form-control input-sm">
                                                            <option value="">Lihat Semua</option>
                                                            <option value="ops">OPS</option>
                                                            <option value="ok">OK</option>
                                                            <option value="psikotes">Psikotes</option>
                                                            <option value="wawancara">Wawancara</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 text-xs-center text-right">
                                                    <div class="form-group">
                                                        <input id="demo-foo-search" type="text" placeholder="Search" class="form-control input-sm" autocomplete="on">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <tbody>
                                            <?php
                                                $no = 1;
                                                foreach ($data_jadwal as $key => $value) {
                                                    ?>
                                                <tr>
                                                    <td><?php echo $no++;?></td>
                                                    <td>
                                                        <?php
                                                            $seleksi = $value->nama_seleksi;
                                                            if ($seleksi=='OPS') {
                                                                ?><span class="label label-table label-purple">OPS</span><?php
                                                            } else if ($seleksi=='OK'){
                                                                ?><span class="label label-table label-info">OK</span><?php
                                                            } else if ($seleksi=='Psikotest') {
                                                                ?><span class="label label-table label-inverse">Psikotes</span><?php
                                                            } else{
                                                                ?><span class="label label-table label-danger">Wawancara</span><?php
                                                            }
                                                            
                                                        ?>
                                                    </td>
                                                    <td><?php echo $value->sesi;?></td>
                                                    <td><?php echo $value->kelompok;?></td>
                                                    <td><?php echo $value->tgl;?></td>
                                                    <td><?php echo $value->waktu_mulai;?></td>
                                                    <td><?php echo $value->waktu_selesai;?></td>
                                                    <td><?php echo $value->nama_ruangan;?></td>
                                                    <td>
                                                        <a
                                                            href="#"
                                                            class="on-default edit-row"
                                                            style="color: #29b6f6;"
                                                            title="Edit Seleksi"
                                                            data-id="<?php echo $value->id_seleksi;?>"
                                                            data-seleksi="<?php echo $value->nama_seleksi;?>"
                                                            data-sesi="<?php echo $value->sesi;?>"
                                                            data-kelompok="<?php echo $value->kelompok;?>"
                                                            data-tanggal="<?php echo $value->tgl;?>"
                                                            data-mulai="<?php echo $value->waktu_mulai;?>"
                                                            data-selesai="<?php echo $value->waktu_selesai;?>"
                                                            data-ruangan="<?php echo $value->nama_ruangan;?>"
                                                            data-target="#modal_edit_jadwal"
                                                            data-toggle="modal"> <i class="fa fa-pencil"></i> <span></span> </a>
                                                        


                                                        <?php
                                                            $attributes = array(
                                                                'class' => 'on-default remove-row',
                                                                'data-animation' => 'fadein',
                                                                'data-plugin' => 'custommodal',
                                                                'data-overlaySpeed' => 200,
                                                                'data-overlayColor' => '#36404a',
                                                                'data-confirm' => 'Apakah Anda ingin menghapus data ini?',
                                                                'title' => 'Hapus Jadwal'
                                                            );

                                                            echo anchor('Panitia_C/hapus_jadwal_seleksi/'.$value->id_seleksi,' <i style="color:#f05050" class="fa fa-trash-o"></i> <span></span> ', $attributes);
                                                        ?>
                                                    </td>
                                                </tr>
                                                    <?php
                                                }
                                            ?>  
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="9">
                                                    <div class="text-right">
                                                        <ul class="pagination pagination-split m-t-30 m-b-0"></ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Modal EDIT Jadwal PPDB-->
                <!-- ============================================================== -->
                <div id="edit_jadwal_ppdb" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog"> 
                        <div class="modal-content">
                            <?php
                                $attributes = array(
                                    'method' => 'post',
                                    'role' => 'form'
                                );

                                echo form_open('Panitia_C/edit_jadwal_ppdb',$attributes);
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
                                                            'id' => 'tanggal_mulai_edit_ppdb',
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
                                                            'id' => 'tanggal_selesai_edit_ppdb',
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
                                <button type="button" class="btn btn-primary waves-effect" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-default waves-effect waves-light">Simpan</button>
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