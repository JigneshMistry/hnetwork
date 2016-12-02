<div class="container">
	<!-- setting's left  -->
	<div class="col-md-3 sidebar-left"> 
		<?php 
			$this->load->view('setting_panel'); 
			//$this->load->view('leftpanel'); 
		?>
	</div>
	
	<!-- settings right -->
	<div class="col-md-9 blog-post">
		<?php $this->load->view('dashboard'); ?>					
	</div>
</div>