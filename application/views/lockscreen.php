
		<div class="account-pages"></div>
		<div class="clearfix"></div>
		<div class="wrapper-page">
			<div class=" card-box">
				
				<div class="panel-body">
					<?php
						$attributes = array(
							'method' => 'post',
							'role' => 'form',
							'class' => 'text-center'
						);
						echo form_open('Authentication_C/masuk_screen',$attributes);
					?>
						<div class="user-thumb">
							<img src="<?php echo base_url('assets/dashboard/images/users/avatar-1.jpg');?>" class="img-responsive img-circle img-thumbnail" alt="thumbnail">
						</div>
						<div class="form-group">
							<h3><?php echo $this->session->userdata ('username');?></h3>
							<p class="text-muted">
								Masukan password Anda untuk mengakses halaman Admin.
							</p>
							<div class="input-group m-t-30">
								<?php 
									$attributes = array(
										'class' =>'form-control',
										'name'=> 'password',
										'placeholder'=>'Password'
									);
									echo form_password($attributes);
								?>
								<span class="input-group-btn">
									<button type="submit" class="btn btn-default w-sm waves-effect waves-light">
										Masuk
									</button> 
								</span>
							</div>
							<?php
								echo form_error('password','<div class="alert alert-danger alert-dismissable">
                                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                            ?>
						</div>
					<?php
						echo form_close();
					?>
				</div>
			</div>
			
			<div class="row">
				<div class="col-sm-12 text-center">
					<p>
						Bukan <?php echo $this->session->userdata('username');?>? <?php echo anchor('welcome/login', '<b> Masuk</b>',array('class'=>'text-primary m-l-5'));?>
					</p>
				</div>
			</div>

		</div>