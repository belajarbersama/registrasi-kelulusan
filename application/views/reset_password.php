        <div class="animationload">
            <div class="loader"></div>
        </div>

		<div class="account-pages"></div>
		<div class="clearfix"></div>
		<div class="wrapper-page">
			<div class=" card-box">
				<div class="panel-heading">
					<h3 class="text-center"> Reset Password </h3>
					<?php echo $this->session->flashdata('pesan');?>
				</div>
				
				<div class="panel-body">
					<?php
						$attribut = array(
							'class' => 'form-horizontal m-t-20'
						);
						echo form_open('Authentication_C/reset_password',$attribut);
					?>

						<div class="form-group ">
							<div class="col-xs-12">
								<?php 
									$attributes = array(
										'class' =>'form-control',
										'name'=> 'email',
										'id' => 'email',
										'placeholder'=>'Email',
										'autofocus'=>true,
										'value' => set_value('email')
									);
									echo form_input($attributes);

									echo form_error('email','<div class="alert alert-danger alert-dismissable">
                                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
								?>
							</div>


						</div>

						<div class="form-group">
							<div class="col-xs-12">
								<?php 
									$attributes = array(
										'class' =>'form-control',
										'name'=> 'no_hp',
										'placeholder'=>'No HP',
										'value' => set_value('no_hp')
									);
									echo form_input($attributes);
								?>

								<?php
									echo form_error('no_hp','<div class="alert alert-danger alert-dismissable">
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
										'placeholder'=>'Password Baru'
									);
									echo form_input($attributes);
								?>

								<?php
									echo form_error('password','<div class="alert alert-danger alert-dismissable">
                                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                            	?>
							</div>
						</div>

						<div class="form-group text-center m-t-40">
							<div class="col-xs-12">
								<button class="btn btn-default btn-block text-uppercase waves-effect waves-light" type="submit">Ubah</button>
							</div>
						</div>

					<?php echo form_close();?>
				</div>
			</div>
		</div>