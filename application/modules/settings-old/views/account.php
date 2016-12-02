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
			<h2>Account</h2>
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
				<p>Email</p>
			</div>			
			<div class="col-md-8 blog-post">
				<p>
					<?php echo $_SESSION['email']; ?>
					<br>
					<span style="float:left;">
						<!--<input type="checkbox"  data-toggle="toggle" data-size="mini" data-style="ios">--> &nbsp;
						<input type="checkbox" name="blog_display" style="margin:15px 10px 0px -8px !important;"/>
						<h6>Let's People find your blogs through this address</h6>
					</span>
				</p>
			</div>
			<div class="col-md-1 sidebar-left"> 
				<p><a href="#"><span class="glyphicon glyphicon-pencil"></span></a></p>
			</div>
		</div>
		
		<div class="panel_header" style="border-bottom:0px;">
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