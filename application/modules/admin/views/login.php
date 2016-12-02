
<div class="login-box">
      <div class="login-logo">
        <b>Admin Panel</b>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        
				<?php 
				if($message!= '')
				{
					?>
						<div class="alert alert-danger alert-dismissable">
							<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
							<h4><i class="icon fa fa-ban"></i> Alert!</h4>
							<?php echo $message;?>
						</div>
					<?php 
				}	
				?>
				<?php echo form_open("admin/login");?>

				 <div class="form-group has-feedback">
					<?php echo form_input($identity);?>
				  </div>

				  <div class="form-group has-feedback">
					<?php echo form_input($password);?>
				  </div>
					 <div class="row">
						<div class="col-xs-8">
						  <div class="checkbox icheck">
							<label>
							  <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?> <?php echo lang('login_remember_label', 'remember');?>
							</label>
						  </div>
						</div><!-- /.col -->
						<div class="col-xs-4">
						  <?php //echo form_submit('submit', lang('login_submit_btn'));?>
						  <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
						</div><!-- /.col -->
					  </div>
				<?php echo form_close();?>
				<p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->