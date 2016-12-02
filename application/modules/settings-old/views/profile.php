<!--<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>-->
<link href="<?php echo base_url(); ?>assets/bootstrap-toggle/bootstrap-toggle.min.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>assets/bootstrap-toggle/bootstrap-toggle.min.js"></script>
<style>
  .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20px; }
  .toggle.ios .toggle-handle { border-radius: 20px; }
</style>
<?php
	/* echo "<pre>";
	print_r($_SESSION);
	echo "</pre>"; */
?>
<div class="jumbotron post">
	<header class="panel_header">
		<div class="title pull-left">
			<h2>Profile</h2>
		</div>
		<div class="actions btn-group pull-right">
		  <!--<button class="btn dropdown-toggle" data-toggle="dropdown">
			<i class="box_toggle fa fa-chevron-down" ></i>
		  </button>-->	    
		</div>
	</header>
	<div class="content">	
		<div class="panel_header">
			<div class="col-md-3 sidebar-left"> 
				<p>Picture</p>
			</div>			
			<div class="col-md-8 blog-post">
				<form enctype="multipart/form-data" method="post" action="<?php echo base_url('settings/profile'); ?>">
						<input type="file" name="userfile" size="20" />

						<br /><br />

						<input type="submit" name="upload" value="Upload" />
				</form>
				<div style="color:red; font-size: medium;">
				<?php
				$success_profile=$this->session->flashdata('success_profile');
				$errors_profile=$this->session->flashdata('errors_profile');
				if(isset($errors_profile))
				{								
					if(sizeof($errors_profile) > 0)
					{
						//print_r($errors);
						if(isset($errors_profile['extention']))
						{
							echo $errors_profile['extention']."<br>";
						}
						else if(isset($errors_profile['file_size']))
						{
							echo $errors_profile['file_size']."<br>";
						}
						else if(isset($errors_profile['file_exists']))
						{
							echo $errors_profile['file_exists']."<br>";
						}
						else
						{
							echo "Other Problems";
						}
					}
				}
				?>
				</div>
				<div style="color:blue; font-size: medium;">
				<?php
				if(!empty($success_profile))
				{
					echo $success_profile;
				}
				?>
				</div>
			</div>			
		</div>
		
		<div class="panel_header">
			<div class="col-md-3 sidebar-left"> 
				<p>Background</p>
			</div>			
			<div class="col-md-8 blog-post">
				 <form enctype="multipart/form-data" method="post" action="<?php echo base_url('settings/background'); ?>">
						<input type="file" name="profilebackground" size="20" />

						<br /><br />

						<input type="submit" name="upload_pb" value="Upload" />
					
				</form>
				<div style="color:red; font-size: medium;">
				<?php
				$success_background=$this->session->flashdata('success_background');
				$errors_background=$this->session->flashdata('errors_background');
				if(isset($errors_background))
				{								
					if(sizeof($errors_background) > 0)
					{
						//print_r($errors);
						if(isset($errors_background['extention']))
						{
							echo $errors_background['extention']."<br>";
						}
						else if(isset($errors_background['file_size']))
						{
							echo $errors_background['file_size']."<br>";
						}
						else if(isset($errors_background['file_exists']))
						{
							echo $errors_background['file_exists']."<br>";
						}
						else
						{
							echo "Other Problems";
						}
					}
				}
				?>
				</div>
				<div style="color:blue; font-size: medium;">
				<?php
				if(!empty($success_background))
				{
					echo $success_background;
				}
				?>
				</div>
			</div>			
		</div>
		
		<div class="panel_header" style="border-bottom:0px;">
			<div class="col-md-3 sidebar-left"> 
				<p>Slogan</p>
			</div>			
			<div class="col-md-8 blog-post">
				 <form  method="post" action="<?php echo base_url('settings/slogan'); ?>">
						<input type="text" name="slogan" placeholder="Slogan"/>

						<br /><br />

						<input type="submit" name="save" value="Save" />
					
				</form>				
				<div style="color:blue; font-size: medium;">
				<?php
				if(!empty($success_slogan))
				{
					echo $success_slogan;
				}
				?>
				</div>
			</div>		
		</div>
	</div>
	<header class="panel_header">
		<div class="title pull-left">			
		</div>
		<div class="actions btn-group pull-right">
			Manage your profile details
			<!-- <button data-li-auto-click-utrki="" class="message"></button> -->		 	    
		</div>
	</header>
	
</div>