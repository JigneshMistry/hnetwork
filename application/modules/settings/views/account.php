<!--<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>-->

<!-- Bootsrap datepicker -->
<script src="http://localhost/hnetwork/assets/admin/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootsrap datepicker style sheet-->
<link href="<?php echo base_url(); ?>assets/admin/plugins/datepicker/datepicker3.css" rel="stylesheet">


<?php
	/* echo "<pre>";
	print_r($_SESSION);
	echo "</pre>"; */

	/*echo "<pre>";
	print_r($account_data);
	echo "</pre>";*/
	foreach($account_data as $user_data)
	{
		$first_name		= $user_data['first_name'];
		$last_name		= $user_data['last_name'];
		$phone			= $user_data['phone'];
		$username		= $user_data['username'];
	}
	
	foreach ($user_additional_data as $uad)
	{
		$address	= $uad['address'];
		$state		= $uad['state'];
		$country	= $uad['country'];
		$pincode	= $uad['pincode'];
		//$dob		= $uad['dob'];	
		$dob		= date("d/m/Y",strtotime($uad['dob']));		
	}
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
			<div class="col-md-9 blog-post">
				<p>
					<?php echo $_SESSION['email']; ?>					
				</p>
			</div>
			<!-- <div class="col-md-1 sidebar-left"> 
				<p><a href="#"><span class="glyphicon glyphicon-pencil"></span></a></p>
			</div> -->
		</div>
		
		<!-- <div class="panel_header" style="border-bottom:0px;"> -->
		<div class="panel_header">
			<div class="col-md-3 sidebar-left"> 
				<p>Username</p>
			</div>			
			<div class="col-md-9 blog-post">
				<p>
					<?php echo $username; ?>
				</p>
			</div>
			<!-- <div class="col-md-1 sidebar-left"> 
				<p><a href="#"><span class="glyphicon glyphicon-pencil"></span></a></p>
			</div> -->
		</div>
		
		<div class="panel_header">
			<div class="col-md-3 sidebar-left"> 
				<p>First Name</p>
			</div>			
			<div class="col-md-9 blog-post">
							
				<input type="text" name="first_name" id="first_name" value="<?php echo $first_name; ?>" />				
			
			</div>		
		</div>
		
		<div class="panel_header">
			<div class="col-md-3 sidebar-left"> 
				<p>Last Name</p>
			</div>			
			<div class="col-md-9 blog-post">
			
				<input type="text" name="last_name" id="last_name" value="<?php echo $last_name; ?>" />
				
			</div>		
		</div>
		
		<div class="panel_header">
			<div class="col-md-3 sidebar-left"> 
				<p>Contact No.</p>
			</div>			
			<div class="col-md-9 blog-post">
			
				<input type="text" name="phone" id="phone" value="<?php echo $phone; ?>" />
				
			</div>		
		</div>
		
		<div class="panel_header">
			<div class="col-md-3 sidebar-left"> 
				<p>Address</p>
			</div>			
			<div class="col-md-9 blog-post">
			
				<textarea name="address" id="address"><?php echo $address; ?></textarea>
				
			</div>		
		</div>
		
		<div class="panel_header">
			<div class="col-md-3 sidebar-left"> 
				<p>State</p>
			</div>			
			<div class="col-md-9 blog-post">
			
				<input type="text" name="state" id="state" value="<?php echo $state; ?>" />
				
			</div>		
		</div>
		
		<div class="panel_header">
			<div class="col-md-3 sidebar-left"> 
				<p>Country</p>
			</div>			
			<div class="col-md-9 blog-post">
			
				<input type="text" name="country" id="country" value="<?php echo $country; ?>" />
				
			</div>		
		</div>
		
		<div class="panel_header">
			<div class="col-md-3 sidebar-left"> 
				<p>Pincode</p>
			</div>			
			<div class="col-md-9 blog-post">
			
				<input type="text" name="pincode" id="pincode" value="<?php echo $pincode; ?>" />
				
			</div>		
		</div>
		
		<div class="panel_header" style="border-bottom:0px;">
			<div class="col-md-3 sidebar-left"> 
				<p>Date of Birth</p>
			</div>			
			<div class="col-md-9 blog-post" style="padding-left: 0px;">
			
			<!-- <input type="text" name="dob" id="dob" value="<?php //echo $dob; ?>" /> -->
				
			<div class="col-md-6 blog-post">
			   <div class="input-group date" data-provide="datepicker" data-date-format="dd/mm/yyyy">
				    <input type="text" class="form-control" name="dob"  id="dob" value="<?php echo $dob; ?>" style="font-size: inherit;
">
				    <div class="input-group-addon">
				        <span class="glyphicon glyphicon-th"></span>
				    </div>
				</div>
			</div>
		        <script type="text/javascript">
		        $('.datepicker').datepicker();
		        /*$('.datepicker').datepicker({
		            format: 'dd/mm/yyyy',
		            startDate: '-3d'
		        });*/
	        	</script>
				
			</div>		
		</div>
		
		
	</div>
	<header class="panel_header">
		<div class="title pull-left" id="ack">			
		</div>
		<div class="actions btn-group pull-right">
			<button data-li-auto-click-utrki="" class="message" id="account-update">Update Account</button>		 	    
		</div>
	</header>
	
</div>