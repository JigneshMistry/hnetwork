<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>HNetwork | Social</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fontawesome -->
    
    <link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet">
    <!-- HoverEffect -->
    <link href="<?php echo base_url();?>assets/css/hover-min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/skin.css" rel="stylesheet">
    
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url();?>assets/js/jQuery-2.1.4.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Loading Image Upload Js -->
    <script src="<?php echo base_url();?>assets/js/simpleUpload.js"></script>
    <!-- Loading Customjs -->
    <script src="<?php echo base_url();?>assets/js/custom.js"></script>
    
    <!--  autocomplete -->
    <script src="<?php echo base_url();?>assets/admin/plugins/jqueryui/jquery-ui.js"></script>
     <link href="<?php echo base_url();?>assets/admin/plugins/jqueryui/jquery-ui.css" rel="stylesheet">
  </head>
<body class="<?php echo $pageclass;?>">
<?php 
if($pageclass != 'login')
{	
?>
<header class="main-header">
 	<div class="container">
 		<a href="#" id="logo" class="logo">
 			<img src="<?php echo base_url();?>assets/images/logo.png" alt="logo" title="logo" />
 		</a>
 		<form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search HNetwork" name="search"  id="search">
          <input type="hidden" class="form-control" placeholder="Search HNetwork" name="user_id" id="user_id" value="">
          <div class="search-button"><i class="fa fa-search"></i></div>	
        </div>
       </form>
       <!-- search autocomplete -->
       <!-- <input type="text" class="form-control" placeholder="Search HNetwork" name="search"  id="search" value=""> -->       
       <script>    		
       $('#search').autocomplete({		
       	'source': function(request, response) {			
       		console.log(request);
       		$.ajax({
       			type:'POST',
       			url: "<?php echo base_url('dashboard/autocomplete'); ?>",				
       			data : {'filter_name':request},
       			dataType: 'json',			
       			success: function(json) {
       				response($.map(json, function(item) {
       					//console.log(item);
       					return {
       						label: item['first_name'],       						
       						//value: item['user_id'],        						      						   						
       						/*firstname: item['first_name'],
       						lastname: item['last_name'],
       						email: item['email'],	
       						telephone: item['phone']*/				
       					}						
       				}));
					       				
       				//console.log(json);
       			}				
       		});
       	},
       	'select': function(item) {		
       		$('input[name=\'search\']').val(item['label']);       		
       		/*$('input[name=\'user_id\']').val(item['value']);      		    					
       		$('input[name=\'firstname\']').val(item['first_name']);
       		$('input[name=\'lastname\']').val(item['last_name']);
       		$('input[name=\'email\']').val(item['email']);
       		$('input[name=\'telephone\']').val(item['phone']);*/					
       	}
       });	
       </script>
       <!-- search autocomplete -->
       <nav class="navbar navbar-static-top">
    	  <ul class="nav navbar-nav navbar-right">
        		<li><a href="<?php echo base_url();?>" <?php if($this->router->class == 'dashboard') {?>class="<?php echo $this->router->class; ?> active" <?php }?>><img id="facebook-logo" class="svg social-link" src="<?php echo base_url();?>assets/svg/home.svg"></a></li>
        		<li><a href="<?php echo base_url();?>explore" <?php if($this->router->class == 'explore') {?>class="<?php echo $this->router->class; ?> active" <?php }?>><img class="svg social-link" src="<?php echo base_url();?>assets/svg/explore.svg"></a></li>
        		<li><a href="#"><img class="svg social-link" src="<?php echo base_url();?>assets/svg/email.svg"></a></li>
        		<li><a href="#"><img class="svg social-link" src="<?php echo base_url();?>assets/svg/bell.svg"></a></li>
        		<li class="dropdown profile">
			       <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			       <i class="fa fa-user"></i> <span class="caret"></span></a>
			          <ul class="dropdown-menu  profile animated fadeIn">
			             <li>
			                  <!--<a href="#settings">-->
							  <a href="<?php echo base_url(); ?>settings">
			                      <i class="fa fa-wrench"></i>
			                       Settings
			                  </a>
			              </li>
			              <li>
			                  <a href="<?php echo base_url(); ?>profile">
			                       <i class="fa fa-user"></i>
			                       Profile
			                  </a>
			              </li>
			              <li>
			                  <a href="#help">
			                     <i class="fa fa-info"></i>
			                        &nbsp;Help
			                  </a>
			              </li>
			              <li class="last">
			                   <a href="<?php echo base_url();?>auth/logout">
			                      <i class="fa fa-lock"></i>
			                      Logout
			                   </a>
			              </li>
			          </ul>
			      </li>
			 </ul>
  		</nav>
	</div>
</header>
<?php } ?>