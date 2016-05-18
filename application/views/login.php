        <div class="animationload">
            <div class="loader"></div>
        </div>

		<div class="account-pages"></div>
		<div class="clearfix"></div>
		<div class="wrapper-page">
			<div class=" card-box">
				<div class="panel-heading">
					<h3 class="text-center"> Masuk ke PPDB Online <br><strong class="text-custom">Ar-Rafi'</strong> </h3>
					<?php echo $this->session->flashdata('pesan');?>
				</div>
				
				<div class="panel-body">
					<?php
						$attribut = array(
							'class' => 'form-horizontal m-t-20'
						);
						echo form_open('Authentication_C/login',$attribut);
					?>

						<div class="form-group ">
							<div class="col-xs-12">
								<?php 
									$attributes = array(
										'class' =>'form-control',
										'name'=> 'username',
										'id' => 'username',
										'placeholder'=>'Username',
										'autofocus'=>true,
										'value' => set_value('username')
									);
									echo form_input($attributes);

									echo form_error('username','<div class="alert alert-danger alert-dismissable">
                                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
								?>
							</div>


						</div>

						<div class="form-group">
							<div class="col-xs-12">
								<?php 
									$attributes = array(
										'class' =>'form-control',
										'name'=> 'password',
										'placeholder'=>'Password'
									);
									echo form_password($attributes);
								?>

								<?php
									echo form_error('password','<div class="alert alert-danger alert-dismissable">
                                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                            	?>
							</div>
						</div>

						<div class="form-group text-center m-t-40">
							<div class="col-xs-12">
								<button class="btn btn-success btn-block text-uppercase waves-effect waves-light" type="submit">
									Masuk
								</button>
							</div>
						</div>

						<div class="form-group m-t-30 m-b-0">
							<div class="col-sm-12">
								<?php echo anchor('welcome/reset','<i class="fa fa-lock m-r-5"></i> Lupa password?',array('class'=>'text-dark'));?>
							</div>
						</div>

					<?php echo form_close();?>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-12 text-center">
					<p>
						Belum memiliki akun? <?php echo anchor('welcome/buku_tamu',' <b>Buku Tamu</b>')?>
					</p>
				</div>
			</div>
		</div>