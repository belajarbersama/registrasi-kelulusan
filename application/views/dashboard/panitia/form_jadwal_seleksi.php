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

                        						echo form_open('Panitia_C/buat_jadwal_seleksi',$attributes);
                        					?>

                        					<div class="form-group">
                        						<label class="col-md-2 control-label">Seleksi</label>
                        						<div class="col-md-10">
                                                    <select id="seleksi" name="seleksi" class="selectpicker" data-style="btn-white">
                                                        <option value="Seleksi" selected="true" disabled="true">Seleksi</option>
                                                        <option value="OPS">OPS</option>
                                                        <option value="OK">OK</option>
                                                        <option value="Psikotest">Psikotest</option>
                                                        <option value="Wawancara">Wawancara</option>
                                                    </select>
                        							<?php
                                                        echo form_error('seleksi','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                    ?>
                        						</div>
                        					</div>
                                            <br>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Sesi</label>
                                                <div class="col-md-10">
                                                    <select id="sesi" name="sesi" class="selectpicker" data-style="btn-white">
                                                        <option value="Sesi" disabled="true" selected="true">Sesi</option>
                                                        <option value="I">I</option>
                                                        <option value="II">II</option>
                                                    </select>
                                                    <?php
                                                        echo form_error('sesi','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                    ?>
                                                </div>
                                            </div>
                        					<br>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Kelompok</label>
                                                <div class="col-md-10">
                                                    <select id="sesi" name="kelompok" class="selectpicker" data-style="btn-white">
                                                        <option value="" disabled="true" selected="true">Kelompok</option>
                                                        <?php
                                                            for ($i=1; $i <=5 ; $i++) { 
                                                                ?>
                                                        <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                                                <?php
                                                            }
                                                        ?>
                                                    </select>
                                                    <?php
                                                        echo form_error('sesi','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                    ?>
                                                </div>
                                            </div>
                                            <br>
                        					<div class="form-group">
                        						<label class="col-md-2 control-label">Tanggal</label>
                        						<div class="col-md-10">
                        							<div class="input-group">
                        								<?php
	                        								$attributes = array(
	                                                            'class' => 'form-control',
	                                                            'placeholder' => 'yyyy/mm/dd',
                                                            	'id' => 'tanggal',
                                                            	'name' => 'tanggal'
	                                                        );

	                                                        echo form_input($attributes);
	                                                    ?>
	                                                    <span class="input-group-addon bg-custom b-0 text-white">
	                                                        <i class="icon-calender"></i>
	                                                    </span>
                        							</div>
                        							<?php
                        								echo form_error('tanggal','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                        							?>
                                                </div>
	                                        </div>
	                                        <br>
	                                        <div class="form-group">
                        						<label class="col-md-2 control-label">Waktu Mulai</label>
                        						<div class="col-md-10">
	                        						<div class="input-group">
                                                        <div class="bootstrap-timepicker">
                                                            <?php
                                                                $attributes = array(
                                                                    'id' => 'timepicker2',
                                                                    'name' => 'mulai',
                                                                    'class' => 'form-control'
                                                                );

                                                                echo form_input($attributes);
                                                            ?>
                                                        </div>
                                                        <span class="input-group-addon bg-custom b-0 text-white">
                                                            <i class="glyphicon glyphicon-time"></i>
                                                        </span>
	                        						</div>
                                                </div>
                                                <?php
                                                    echo form_error('mulai','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                ?>
	                                        </div>
	                                        <br>
	                                        <div class="form-group">
                        						<label class="col-md-2 control-label">Waktu Selesai</label>
                        						<div class="col-md-10">
	                        					    <div class="input-group">
                                                        <div class="bootstrap-timepicker">
                                                            <?php
                                                                $attributes = array(
                                                                    'id' => 'timepicker4',
                                                                    'name' => 'selesai',
                                                                    'class' => 'form-control'
                                                                );

                                                                echo form_input($attributes);
                                                            ?>
                                                        </div>
                                                        <span class="input-group-addon bg-custom b-0 text-white">
                                                            <i class="glyphicon glyphicon-time"></i>
                                                        </span>                  
                                                    </div>
	                        					</div>
                                                <?php
                                                        echo form_error('selesai','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                ?>
	                                        </div>
	                                        <br>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Ruangan</label>
                                                <div class="col-md-10">
                                                    <div class="input-group">
                                                        <select class="selectpicker" data-style="btn-white" name="ruangan">
                                                            <option value="Ruangan" selected="true" disabled="true">Ruangan</option>
                                                            <?php
                                                                foreach ($data_ruangan as $key => $value) {
                                                                    ?>
                                                                    <option value="<?php echo $value->id_ruangan;?>"><?php echo $value->nama_ruangan;?></option>
                                                                    <?php
                                                                }
                                                            ?>
                                                        </select>                  
                                                    </div>
                                                </div>
                                                <?php
                                                        echo form_error('selesai','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                ?>
                                            </div>
                                            <br>
	                                        <button type="submit" class="btn btn-default waves-effect waves-light" style="float: right;">Simpan</button>
                                            <?php
                                                $attributes = array(
                                                    'class' => 'btn btn-primary waves-effect waves-light',
                                                    'style' => 'float: right;margin-right:2%;'
                                                );
                                                echo anchor('Panitia_C/lihat_jadwal_seleksi','Batal',$attributes);?>
                                            
                                            <?php echo form_close();?>
	                                        <?php echo form_close();?>
                        				</div>

                        				
                        			</div>

                        		</div>
                        	</div>
                        </div>
                    </div>     
                </div>