<?php
	foreach ($profile as $key => $value) {
		?>
			<!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                <div class="wraper container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="bg-picture text-center">
                                <div class="bg-picture-overlay"></div>
                                <div class="profile-info-name">
                                	<img src="<?php echo base_url('assets/dashboard/images/users/avatar-1.jpg');?>" class="thumb-lg img-circle img-thumbnail" alt="profile-image">
                                    <h4 class="m-b-5"><b><?php echo $value->nama;?></b></h4>
                                    <p class="text-muted"><i class="fa fa-map-marker"></i> <?php echo $value->asal;?></p>
                                </div>
                            </div>
                            <!--/ meta -->
                        </div>
                    </div>
                    
                    
                    <div class="row">
                    	<div class="col-md-4">
                    		
                    		<div class="card-box m-t-20">
								<h4 class="m-t-0 header-title"><b>Data Pribadi</b></h4>
								<div class="p-20">
									<div class="about-info-p">
                                        <strong>Nama Lengkap</strong>
                                        <br>
                                        <p class="text-muted"><?php echo $value->nama;?></p>
                                    </div>
                                    <div class="about-info-p">
                                        <strong>Nomor HP</strong>
                                        <br>
                                        <p class="text-muted"><?php echo $value->no_hp;?></p>
                                    </div>
                                    <div class="about-info-p">
                                        <strong>Email</strong>
                                        <br>
                                        <p class="text-muted"><?php echo $value->email;?></p>
                                    </div>
                                    <div class="about-info-p m-b-0">
                                        <strong>Kecamatan</strong>
                                        <br>
                                        <p class="text-muted"><?php echo $value->kecamatan;?></p>
                                    </div>
								</div>
							</div>
							
							<br>
							<!-- Personal-Information -->
							<div class="card-box">
								<h4 class="m-t-5 header-title"><b>Penghasilan</b></h4>
								<div class="p-20">
									<div class="m-b-15">
                                        <h5>&nbsp; <span class="pull-right">Rp. 80.000.000,-</span></h5>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success wow animated progress-animated" role="progressbar" aria-valuenow="80000000" aria-valuemin="0" aria-valuemax="100000000" style="width: 80%;">
                                                <span class="sr-only">Rp. 80.000.000,-</span>
                                            </div>
                                        </div>
                                    </div>
								</div>
							</div>
							<!-- Personal-Information -->
                        </div>
                        
                        
                        <div class="col-md-8">
                        	<div class="card-box m-t-20">
								<h4 class="m-t-0 m-b-20 header-title"><b>Alamat</b></h4>
								
								<div class="gmap">
									<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d360.9972715691901!2d107.63611212449305!3d-6.972123287158641!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e9afc0abe073%3A0x31f97039bda01a9f!2sJl.+Raya+Bojongsoang%2C+Jawa+Barat!5e0!3m2!1sen!2sid!4v1462435346687" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
					            </div>
					            <br/>
					            <div class="gmap-info">
					                <h4><b><?php echo $value->alamat_rumah.', RT.'.$value->rt.'/RW.'.$value->rw;?></a></h4>
					                <p><?php echo $value->kelurahan;?></p>
					                <p><?php echo $value->kecamatan;?></p>
					                <p><?php echo $value->kota_kabupaten;?></p>
					                <p><?php echo $value->provinsi;?></p>
					            </div>  
					            <div class="clearfix"></div>
							</div>
                        </div>
                    </div>
                    <div class="row">
                    </div>
                </div> <!-- container -->
            </div> <!-- content -->
		<?php
	}
?>