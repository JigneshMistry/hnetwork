<div class="container">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<h1 class="text-center page-title"><?php echo lang('login_heading');?></h1>
				<p class="note">Join Hotters Stop to show your skills to the world & be the popular.</p>
				<?php 
				if($message!='')
				{
					?>
					<div class="alert alert-danger" role="alert"><?php echo $message;?></div>
					<?php 
				}
				?>
				<div class="login_content well">
				<?php echo form_open("auth/login");?>
					<div class="form-group has-feedback">
      					<label>Username: <span class="mandatory">*</span></label>
      					<?php echo form_input($identity);?>
					</div>
			        <div class="form-group has-feedback">
						<label>Password: <span class="mandatory">*</span></label>
						<?php echo form_input($password);?>
				  	</div>
					<div class="row form-actions">
						<div class="col-xs-6">
							<div class="checkbox checkbox-success">
								<?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
								<?php echo lang('login_remember_label', 'remember');?>
							</div>
						</div>
						<div class="col-xs-6">
							<?php //echo form_submit('submit', lang('login_submit_btn'));?>
							<button value="true" id="button" class="btn btn-warning pull-right" type="Submit" name="button"><i class="icon-menu2"></i> Sign in</button>
						</div>
					</div>	
				<?php echo form_close();?>

				<p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
				</div>
				<div class="col-lg-12 center-box clearfix" id="oauth_container">
				    <p>Or Login with the following</p>
				    	<ul class="list-inline text-center" style="margin-top: 20px;">
				            <li><a href="#" class="ci_facebook"></a></li>
				            <li><a href="#" class="ci_twitter"></a></li>
				            <li><a href="#" class="ci_google"></a></li>
				            <li><a href="#" class="ci_linkedin"></a></li>
				        </ul>
				</div>
		</div>
		<div class="col-md-4"></div>
	</div>
</div>
