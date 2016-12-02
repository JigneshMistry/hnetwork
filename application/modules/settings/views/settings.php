<div class="container">
	<!-- setting's left  -->
	<div class="col-md-3 sidebar-left"> 
		<?php 
			$this->load->view('setting_panel'); 
			//$this->load->view('leftpanel'); 
		?>
	</div>
	
	<!-- settings right -->
	<?php
	//echo "<div><h1 style='color:red;'>".$this->uri->segment(2)."<h1></div>";
	if($this->uri->segment(2)=="profile")
	{
	?>		
		<div class="col-md-9 blog-post">
			<?php $this->load->view('profile'); ?>					
		</div>
	<?php
	}
	else if($this->uri->segment(3)=="picture")
	{
	?>		
		<div class="col-md-9 blog-post">
			<?php $this->load->view('profile_picture'); ?>					
		</div>
	<?php
	}
	else if($this->uri->segment(2)=="dashboard")
	{
	?>		
		<div class="col-md-9 blog-post">
			<?php $this->load->view('dashboard'); ?>					
		</div>
	<?php
	}
	else 
	{		
	?>
		<div class="col-md-9 blog-post">
		
			<?php $this->load->view('account'); ?>					
		</div>
	<?php
	} 
	?>
</div>