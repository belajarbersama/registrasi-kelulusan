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
                                    <li>
                                        <a href="#">Hasil</a>
                                    </li>
                                    <li class="active">
                                        Rekap
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
                                                        
                                    <table id="demo-foo-filtering" data-toggle="table" class="table table-striped toggle-circle m-b-0" data-page-size="7">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>No Pendaftaran</th>
                                                <th>OPS</th>
                                                <th>OK</th>
                                                <th>Psikotes</th>
                                                <th>Wawancara</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <div class="form-inline m-b-20">
                                            <div class="row">
                                                <div class="col-sm-6 text-xs-center">
                                                    <div class="form-group">
                                                        <label class="control-label m-r-5">Status</label>
                                                        <select id="demo-foo-filter-status" class="form-control input-sm">
                                                            <option value="">Lihat Semua</option>
                                                            <option value="diterima">Diterima</option>
                                                            <option value="dipertimbangkan">Dipertimbangkan</option>
                                                            <option value="ditolak">Ditolak</option>
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
                                                foreach ($data_nilai as $key => $value) {
                                                    ?>
                                                <tr>
                                                    <td><?php echo $no++;?></td>
                                                    <td><?php echo $value->no_pendaftaran;?></td>
                                                    <td><?php echo $value->ops;?></td>
                                                    <td><?php echo $value->ok;?></td>
                                                    <td>Belum</td>
                                                    <td>Belum</td>
                                                    <td>
                                                        <?php
                                                            $status = $value->status;
                                                            if ($status=='Diterima') {
                                                                ?><span class="label label-table label-success">Diterima</span><?php
                                                            } else if ($status=='Dipertimbangkan'){
                                                                ?><span class="label label-table label-purple">Dipertimbangkan</span><?php
                                                            } else {
                                                                ?><span class="label label-table label-danger">Ditolak</span><?php
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a href="#"
                                                            class="on-default edit-row"
                                                            title="Edit"
                                                            Style="color: #29b6f6;"
                                                            data-no="<?php echo $value->no_pendaftaran;?>"
                                                            data-ops="<?php echo $value->ops;?>"
                                                            data-ok="<?php echo $value->ok;?>"
                                                            data-status="<?php echo $value->status;?>"
                                                            data-toggle="modal"
                                                            data-target="#edit_nilai_rekap"
                                                            class="btn btn-default waves-effect waves-light">
                                                            <i class="fa fa-pencil"></i>
                                                            <span></span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                    <?php
                                                }
                                            ?>  
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="8">
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
                <!-- Modal Edit Nilai OPS-->
                <!-- ============================================================== -->
                <div id="edit_nilai_rekap" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog"> 
                        <div class="modal-content">
                            <?php
                                $attributes = array(
                                    'method' => 'post',
                                    'role' => 'form'
                                );

                                echo form_open('Panitia_C/edit_nilai_rekap',$attributes);
                            ?>
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title">Edit Nilai Rekap</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-sm-4">No Pendaftaran</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <?php

                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'name' => 'no_pendaftaran',
                                                            'id' => 'no_pendaftaran',
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
                                            <label class="control-label col-sm-4">OPS</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <?php

                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'name' => 'ops',
                                                            'id' => 'ops',
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
                                            <label class="control-label col-sm-4">OK</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <?php

                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'name' => 'ok',
                                                            'id' => 'ok',
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
                                            <label class="control-label col-sm-4">Status</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <div class="col-sm-8">
                                                        <div class="input-group">
                                                            <div class="bootstrap-timepicker">
                                                                <select name="status" class="selectpicker" data-style="btn-white">
                                                                    <option disabled="true" value="" selected="true">Status</option>
                                                                    <option value="Diterima">Diterima</option>
                                                                    <option value="Dipertimbangkan">Dipertimbangkan</option>
                                                                    <option value="Ditolak">Ditolak</option>
                                                                </select>
                                                            </div>
                                                        </div>         
                                                    </div>
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