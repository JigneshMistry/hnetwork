<style>
	.image-block
	{
		width:200px;
		height:200px;
	}
</style>

<div class="jumbotron post">
	<header class="panel_header">
		<div class="title pull-left">
			<h2>Profile Picture</h2>
		</div>
		<div class="actions btn-group pull-right">
		  <!--<button class="btn dropdown-toggle" data-toggle="dropdown">
			<i class="box_toggle fa fa-chevron-down" ></i>
		  </button>-->	    
		</div>
	</header>
	<div class="content">	
		<div class="panel_header"style="border-bottom:0px;">
			<div class="col-md-5 sidebar-left" > 
				<p>Profile Picture</p>
			</div>			
			<div class="col-md-5 blog-post">				
				  <form enctype="multipart/form-data" method="post" action="<?php echo base_url('profile'); ?>">
						<input type="file" name="userfile" size="20" />

						<br /><br />

						<input type="submit" name="upload" value="Upload" />
					
					</form>
					
					
				<div style="color:red; font-size: medium;">
				<?php
				$success=$this->session->flashdata('success');
				$errors=$this->session->flashdata('errors');
				if(isset($errors))
				{								
					if(sizeof($errors) > 0)
					{
						//print_r($errors);
						if(isset($errors['extention']))
						{
							echo $errors['extention']."<br>";
						}
						else if(isset($errors['file_size']))
						{
							echo $errors['file_size']."<br>";
						}
						else if(isset($errors['file_exists']))
						{
							echo $errors['file_exists']."<br>";
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
				if(!empty($success))
				{
					echo $success;
				}
				?>
				</div>
			</div>
			
		</div>
		
		<!--<div class="panel_header" style="border-bottom:0px;">
			<div class="col-md-3 sidebar-left"> 
				<p>Password</p>
			</div>			
			<div class="col-md-8 blog-post">
				<p>
					.....
				</p>
			</div>
			<div class="col-md-1 sidebar-left"> 
				<p><a href="#"><span class="glyphicon glyphicon-pencil"></span></a></p>
			</div>
		</div>-->
	</div>
	<!--<header class="panel_header">
		<div class="title pull-left">			
		</div>
		<div class="actions btn-group pull-right">
			<button data-li-auto-click-utrki="" class="message">Delete Account</button>		 	    
		</div>
	</header>-->
	
</div>