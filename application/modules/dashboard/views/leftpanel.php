<?php
	//echo "<h1><p style='color:red;'>123</p></h1>";
	/*echo "<pre>";
	print_r($userProfilePicture);
	echo "<pre>";  */
	
	foreach($userProfilePicture as $userimage)
	{
		$img_path		 = $userimage['img_path'];
		$profile_picture = $userimage['img_name'];
	}
	
	foreach($userProfileBackground as $profilebackground)
	{
		$img_path		 = $profilebackground['img_path'];
		$profile_background = $profilebackground['img_name'];
	}
		
	foreach($userProfileSlogan as $profileSlogan)
	{		
		$profile_slogan = $profileSlogan['slogan'];
	}
	
	foreach($user_data as $data)
	{
		//$user_img="";	
		/* $user_img=$data['user_img'];
		$user_img_path=$data['user_img_path']; */
		
		$user_img	=$data['img_name'];		
		//$user_img_path=$data['img_path'];
		$username	=$data['username'];
		$ps			=$data['profile_slogan'];
		
	}
?>
<style>
	.username
	{
		margin-top: 5px;
		margin-left: 52px !important;
		position: absolute;
		color: #008cc9;
		padding-left: 10px;
		font-family: proximanovaregularwebfont;
	}
	.userpost
	{
	margin-top: 20px;
    margin-left: 55px !important;
    position: absolute;  
    padding-left: 10px;
	font-size: 14px;
	font-family: proximanovaregularwebfont;
	}
</style>
<div class="box left-profile">
	<div class="left-wrapper">
        <!--<div class="left-profle-bg" style="background-image: url(<?php echo base_url(); ?>media/bg/default.jpg);"></div>-->
		<div class="left-profle-bg" style="background-image: url(<?php echo base_url().'media/profile/users/'.$profile_background; ?>);"></div>
        <div class="col-md-12 text-center">
			<a href="profile/index.html">
				<?php
					//if(isset($user_img) && !empty($user_img))
					if(isset($profile_picture) && !empty($profile_picture))
					{ 
						//$get_user_img = $img_path.$profile_picture;
					?>						
					<!-- <img class="aoh" src="<?php //echo base_url().$user_img_path.$user_img;?>" />  -->
					<!--<img class="aoh" src="<?php echo base_url().'media/profile/users/'.$user_img;?>" />-->
					<img class="aoh" src="<?php echo base_url().'media/profile/users/'.$profile_picture ; ?>" />
					<?php 
					}
					else
					{
					?>
					<img class="aoh" src="<?php echo base_url();?>assets/user-upload/default_user.png" />
					<?php
					}
				?>
				
			</a>
			<h5 class="user-profil-label">
				<a href="profile/index.html"><?php echo $username; ?></a>
			</h5>
			<p class="alu"><?php echo $profile_slogan; //echo $ps; ?></p>
			<ul class="aoi">
				<li class="aoj text-center">
					<a href="#">
						<div class="col-md-12">
							<div class="col-md-6">Friends</div> 
							<div class="col-md-6">Followers</div>
						</div>
						
						<div class="col-md-12">
							<div class="col-md-6"><?php echo $total_followers.' M'; ?></div> 
							<div class="col-md-6"><?php echo $total_subscriber.' M'; ?></div>
						</div>
						
					</a>
					<!--<a href="#userModal" class="aku" data-toggle="modal">
						Friends
						<h5 class="ali"><?php //echo $total_followers; ?>M</h5>
					</a>-->
				</li>
			</ul>
		</div>
	</div>
</div>
<div class="box firends_activity">
	<h2 class="sidebar_title">Frinds Activity</h2>
	<ul>
		<li>
			<div class="front">
				<div class="header">
					<span class="count">15</span><span> ways to keep in touch</span>
				</div>
				
				<div style="width:100%;height:auto;">
					<div style="float:left;">										
						<a href="#">
						<!--  <img style="border-radius: 35px;
border: 1px solid #dadada;" src="http://localhost/hnetwork/assets/images/user.jpg">-->
							<img src="http://localhost/hnetwork/assets/images/user.jpg">
						</a>								

					</div>
					<div style="float:right;">Jignesh Mistry</div>
					<!-- <div style="float:right;">Jignesh Mistry</div> -->
					
				</div>
				
				<!--<div class="content">
					<a href="#" data-miniprofile-element-key="" data-miniprofile-module-key="" data-li-url="" data-entity-type="Member" class="photo miniprofile new-miniprofile-container" data-li-miniprofile-id="LI-595836">
					
					<img width="100" height="100" alt="Harita Bhavsar" class="photo" lazyload="true" src="https://media.licdn.com/mpr/mpr/shrink_100_100/AAEAAQAAAAAAAAk5AAAAJGFlMjBhMzQ2LWI2OTYtNGZiZC04ZWQ0LTM2ZGI5Y2Y1MjM5Zg.jpg">
					</a>
					<div class="four-lines" style="height: 28px; max-height: none; white-space: normal;">
					<span class="headline">
					<a data-entity-type="Member" data-miniprofile-element-key="" data-miniprofile-module-key="" data-li-auto-click-utrki="" data-li-url="" class="miniprofile new-miniprofile-container name" href="#" data-li-miniprofile-id="LI-7355395">
					Harita Bhavsar
					</a> has a new job.</span>
					<span class="details">HR Executive at The Logic Factory</span>
					</div>
				</div>-->
				
				<ul class="actions">
					<li><button style="font-size: 10px !important;
padding: 0 9px !important;" data-li-auto-click-utrki="" class="like">Like</button></li>
					<li><button style="font-size: 10px !important;
padding: 0 9px !important;" data-prop-type="jobChange" data-message-overlay-trks="" data-params="" data-li-auto-click-utrki="" data-url="" class="message">Message</button></li>
					<li><button style="font-size: 10px !important;
padding: 0 9px !important;" data-li-auto-click-utrki="" data-skip-url="" class="like" >Skip</button></li>
				</ul>
			</div>
		</li>
		
	</ul>
</div>
<div class="panel-group" id="accordion">
	<?php	
		$count=0;
		if(isset($get_followers) || !empty($get_followers))
		{
			foreach($get_followers as $gfs)
			{
				if($count==0)
				{
				?>			
				<div class="panel panel-default">
					<div class="panel-heading">						
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $count; ?>">
								<?php
									/* echo "<pre>";
										print_r($get_followers);
									echo "</pre>"; */ 						
									echo $gfs['username'];
								?>
							</a>
						</h4>	
					</div>
					<div id="collapse<?php echo $count; ?>" class="panel-collapse collapse ">
						<div class="panel-body">
							<?php
								//echo $gfs['id']."<br>";
								$get_followers_posts = $this->comman_model->getpostsbyuserid($gfs['id']);
								/* echo "<br>";
									echo "<pre>";
									print_r($get_followers_posts);
								echo "</pre>";  */
								echo $get_followers_posts['post_content'];
							?>
						</div>				
				</div>
			</div>
			<?php
				$count++; 
			}
			else
			{
			?>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $count; ?>">
							<?php						
								echo $gfs['username'];						
							?>  
						</a>
					</h4><?php //echo $this->comman_model->getTotalPostsByUserid($gfs['id']);?>
				</div>
				<div id="collapse<?php echo $count; ?>" class="panel-collapse collapse">
					<div class="panel-body">
						<?php
							//echo $gfs['id']."<br>";
							$get_followers_posts = $this->comman_model->getpostsbyuserid($gfs['id']);					
							echo $get_followers_posts['post_title'];
						?>
					</div>
				</div>
			</div>
			<?php
			}
			$count++;
		}
	}
?>

</div>
<!--<ul class="box list-group">
	<li class="list-group-item">
	<span class="badge">14</span>
	Cras justo odio
	</li>
	<li class="list-group-item">
	<span class="badge">14</span>
	Cras justo odio
	</li>
	<li class="list-group-item">
	<span class="badge">14</span>
	Cras justo odio
	</li>
	<li class="list-group-item">
	<span class="badge">14</span>
	Cras justo odio
	</li>
	<li class="list-group-item">
	<span class="badge">14</span>
	Cras justo odio
	</li>
	<li class="list-group-item">
	<span class="badge">14</span>
	Cras justo odio
	</li>
	</ul>-->	