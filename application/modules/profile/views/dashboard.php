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
			<h2>Dashboard</h2>
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
				<p>Interface</p>
			</div>			
			<div class="col-md-9 blog-post">
				<p>					
					<span style="float:left;">						 
						<input type="checkbox" name="notification_display" style="margin:15px 10px 0px -8px !important;"/>
						<h5>Show Notifications</h5>												
					</span>
					<br>
					<h6>Find out have you new folllowers </h6>
					<span style="float:left;">						 
						<input type="checkbox" name="notification_display" style="margin:15px 10px 0px -8px !important;"/>
						<h5>Show Notifications</h5>
						<br>
						<h6></h6>
					</span>
				</p>
			</div>			
		</div>
		
		<div class="panel_header" style="border-bottom:0px;">
			<div class="col-md-3 sidebar-left"> 
				<p>Text Editor</p>
			</div>			
			<div class="col-md-9 blog-post">
				<p>
					.....
				</p>
			</div>
		
		</div>
	</div>
	<header class="panel_header">
		<div class="title pull-left">			
		</div>
		<div class="actions btn-group pull-right">
			<button data-li-auto-click-utrki="" class="message">Delete Account</button>		 	    
		</div>
	</header>
	
</div>