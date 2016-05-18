        <div class="animationload">
            <div class="loader"></div>
        </div>

		<div class="account-pages"></div>
		<div class="clearfix"></div>
		<div class="wrapper-page">
			<div class=" card-box">
				<div class="panel-heading">
					<h3 class="text-center"> Reset Password </h3>
				</div>

				<div class="panel-body">
					<?php
						$attributes = array(
								'method' => 'post',
								'role' => 'form',
								'class' => 'text-center'
						);

						echo form_open('Authentication_C/recover_password',$attributes);
					?>
						<?php echo $this->session->flashdata('pesan');?>
						<div class="form-group m-b-0">
							<div class="input-group">
								<?php
									$attributes = array(
										'type' => 'email',
										'name' => 'email',
										'id' => 'email',
										'class' => 'form-control',
										'placeholder' => 'Masukan Email Anda'
									);
									echo form_input($attributes);
								?>
								<span class="input-group-btn">
									<button type="submit" class="btn btn-default w-sm waves-effect waves-light">
										Reset
									</button> 
								</span>
							</div>
							<?php
								echo form_error('email','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
							?>
						</div>

					<?php
						echo form_close();
					?>
				</div>
			</div>
			

		</div>