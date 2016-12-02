<?php
/* User Profile picture */
foreach($userProfilePicture as $userimage)
{
	$img_path		 = $userimage['img_path'];
	$profile_picture = $userimage['img_name'];
} 
?>
<?php
/* Posts Status
 * Postfound = 0 then welcome message of Hottersstop 
 * 
 **/
 
 
if($postfound == '0')
{
	?>
	<article class="jumbotron post welcome">
		<h2>Welcome to Hottersstop</h2>
		<div class="welcome_content">
			Welcome to hottersstop. This is new Framework with HMVC you can do certain thigns in this.
			The Featres are great for fun. Enjoy it.
		</div>
	</article>
	<?php 
	
}else {
	
	?>
	<!--  Posts Area Begin Here -->
<div class="jumbotron post" id="post_<?php echo $postid;?>">
	<header class="panel_header">
		<div class="title pull-left">
			<div class="avtar pull-left">
				<!--<a href="#"><img src="<?php echo base_url();?>assets/images/user.jpg"></a>-->
				<a href="#"><img src="<?php echo base_url().'media/profile/users/'.$profile_picture;?>" height="100" width="100" style=" width: 50px;  height: 50px;"></a>
			</div>
			<div class="username pull-left">
				<a href="#" class="name">
					<?php  
						/* echo "<pre>";
						print_r($get_username);
						echo "</pre>";  */ 
											
						echo $get_username[0]['username'];
						
						//echo $userdata->first_name; 
						//echo $username;
					?>
				</a>
				<a href="#">
					<?php
						$date = new DateTime($post_date);
						echo $date->format("l, F d, Y"); 							
					?>
					<!--<abbr title="2016-07-30T08:54:11+02:00" class="timeago"> Saturday, July 30, 2016 </abbr>--></a>
			</div>
		</div>
		    <div class="actions btn-group pull-right">
		      <button class="btn dropdown-toggle" data-toggle="dropdown">
		        <i class="box_toggle fa fa-chevron-down" ></i>
		      </button>
		      <ul class="dropdown-menu">
                  <li><a href="javascript:void(0);" onclick="postedit('<?php echo $postid;?>');">Edit</a></li>
                  <li><a href="javascript:void(0);" onclick="postdelete('<?php echo $postid;?>');">Delete this post</a></li>
                  <?php 
                  if($userid != $userdata->id)
                  {	
                  ?>
                  <li><a href="javascript:void(0);" onclick="postreport('<?php echo $postid;?>');">Report this post</a></li>
                  <li><a href="javascript:void(0);" onclick="postdonotshow('<?php echo $postid;?>');">I do not want to see this</a></li>
                  <?php 
                  	}
                  ?>	  	
                </ul>
		    </div>
	</header>
	<div class="content">
		<?php 
		if($post_type == 1)
		{
			?>
			
			<h2><?php echo $post_title;?></h2>
			
			<p><?php echo $post_content;?></p>
			<?php 
		}else if($post_type == 2)
		{
			?>
			<blockquote>
			<p><img src="<?php echo base_url();?>assets/images/quote_left.png" /><?php echo $post_title;?><img src="<?php echo base_url();?>assets/images/quote_right.jpg" /></p>
			<?php echo $post_content;?>
			<footer>
				<cite title="Source Title"><?php echo $userdata->first_name;?></cite>
			</footer>
			</blockquote>
			<?php
		}
		else if($post_type == 3)
		{
			?>
			<img src="<?php echo base_url()."/media/wall/".$attachment;?>" />
			<?php 	
		}
		else if($post_type == 4)
		{
				
		}
		else if($post_type == 5)
		{
				
		}
		?>
		
		
	</div>
	<div class="comment_section">
		<div class="likesection">
			<div class="col-md-6 total_like">
				<userlist> <a class="myuser_hHQMP4a9xdW"
					href="http://localhost/www.hottersstop.com/hottersstop"> <img
					src="http://localhost/www.hottersstop.com/data/avatars/min2/Cr13Z2zHaJj.jpg"
					class="rounded" style="display: none;"></a> <span class="userplus">+<span
					id="numlikes_hHQMP4a9xdW" class="com-likes">0</span></span> </userlist>
				<span>Loved this</span>
			</div>
			<div class="col-md-6 total_comments">
				<span id="numcomments_hHQMP4a9xdW" class="com-likes">2</span> <span>
					Comments</span>
			</div>

		</div>
		<div class="usersection">
			<div class="col-xs-4 col-md-4 like_box">
				<div id="arealike_hHQMP4a9xdW" class="like">
					<span style="display: none;" id="iloaderlike_hHQMP4a9xdW"></span>
					 <span class="onlyblue hand hvr-pulse-grow" id="llike_hHQMP4a9xdW">
						<img src="<?php echo base_url();?>assets/images/heart.png" />
						<i class="fa fa-heart"></i>
						<span class="p_active">Love</span>
					</span>	
				</div>
			</div>
			<div class="col-xs-4 col-md-4 comment_box">
				<div id="lcomment_hHQMP4a9xdW" class="comment mrg10L onlyblue hand">
					<img src="<?php echo base_url();?>assets/images/comment.png" /><span class="p_active">Comment</span>
					
				</div>
			</div>
			<div class="col-xs-4 col-md-4 share_box">
				<div id="lshare_hHQMP4a9xdW" class="share">
					<span class="mrg10L onlyblue hand">
					<img src="<?php echo base_url();?>assets/images/share.png" />
					</span><span
						class="p_active">Share</span>
				</div>
			</div>
		</div>
		<div class="areacomments">
			<div class="avatar">
				<img class="rounded"
					src="http://localhost/www.hottersstop.com/data/avatars/min2/Cr13Z2zHaJj.jpg">
			</div>
			<div class="areainput">
				<form action="" method="post" name="form1_bZyJ2qaqttg">
					<div>
						<textarea placeholder="Leave a comment..." class="boxinput"
							id="comment_bZyJ2qaqttg" name="comment_bZyJ2qaqttg"></textarea>
					</div>
					<div class="redbox" id="msgerror2_bZyJ2qaqttg"></div>
					<div>
						<span style="display: none;" id="iloader_bZyJ2qaqttg"><img
							src="http://localhost/www.hottersstop.com/themes/hottersstop/imgs/preload.gif"></span>
						<span style="display: none;" id="bcomment_bZyJ2qaqttg"><input
							type="submit" class="bblue hand" value="Save Comment"
							id="bsavecomm_bZyJ2qaqttg" name="bsavecomm_bZyJ2qaqttg"></span>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php /* ?>
<div class="jumbotron post">
	<header class="panel_header">
		<div class="title pull-left">
			<div class="avtar pull-left">
				<a href="#"><img
					src="<?php echo base_url();?>assets/images/user.jpg"></a>
			</div>
			<div class="username pull-left">
				<a href="#" class="name">John Duo</a> <a href="#"> <abbr
					title="2016-07-30T08:54:11+02:00" class="timeago"> Saturday, July
						30, 2016 </abbr>
				</a>
			</div>
		</div>
		<div class="actions panel_actions pull-right">
			<a class="box_toggle fa fa-chevron-down"></a> <a
				href="#section-settings" data-toggle="modal"
				class="box_setting fa fa-cog"></a> <a class="box_close fa fa-times"></a>
		</div>
	</header>
	<div class="content">
		<blockquote>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer
				posuere erat a ante.</p>
			<footer>
				Someone famous in <cite title="Source Title">Source Title</cite>
			</footer>
		</blockquote>
	</div>
	<div class="comment_section">
		<div class="likesection">
			<div class="col-md-6 total_like">
				<userlist> <a class="myuser_hHQMP4a9xdW"
					href="http://localhost/www.hottersstop.com/hottersstop"> <img
					src="http://localhost/www.hottersstop.com/data/avatars/min2/Cr13Z2zHaJj.jpg"
					class="rounded" style="display: none;"></a> <span class="userplus">+<span
					id="numlikes_hHQMP4a9xdW" class="com-likes">0</span></span> </userlist>
				<span>Loved this</span>
			</div>
			<div class="col-md-6 total_comments">
				<span id="numcomments_hHQMP4a9xdW" class="com-likes">2</span> <span>
					Comments</span>
			</div>

		</div>
		<div class="usersection">
			<div class="col-xs-4 col-md-4 like_box">
				<div id="arealike_hHQMP4a9xdW" class="like">
					<span style="display: none;" id="iloaderlike_hHQMP4a9xdW"></span> <span
						class="onlyblue hand hvr-pulse-grow" id="llike_hHQMP4a9xdW"><i
						class="fa fa-heart-o"></i></span> <span style="display: none;"
						class="onlyred hand hvr-pulse-grow" id="lulike_hHQMP4a9xdW"><i
						class="fa fa-heart"></i></span> <span class="p_active">Love</span>
				</div>
			</div>
			<div class="col-xs-4 col-md-4 comment_box">
				<div id="lcomment_hHQMP4a9xdW" class="comment mrg10L onlyblue hand">
					<i class="fa fa-comment hvr-buzz"></i><span class="p_active">Comment</span>
				</div>
			</div>
			<div class="col-xs-4 col-md-4 share_box">
				<div id="lshare_hHQMP4a9xdW" class="share">
					<span class="mrg10L onlyblue hand"><i class="fa fa-share hvr-bob"></i></span><span
						class="p_active">Share</span>
				</div>
			</div>
		</div>
		<div class="listcomments" id="thelistcomments_aXkcFv9NwfC">

			<div style="display: none;"
				class="msgactionpost pdn5 centered txtsize00" id="msgaction_69">
				<span style="display: none;" id="msgcr_69">This comment has been
					reported.</span> <span style="display: none;" id="msgch_69">This
					comment is now hidden for you.</span> <span style="display: none;"
					class="onlyblue bold hand" id="bundorc_69">Undo</span> <span
					style="display: none;" class="onlyblue bold hand" id="bundohc_69">Undo</span>
			</div>
			<div class="onecomment" id="comment_post_69">


				<div class="hand delete" id="bactioncomment_69">x</div>

				<div style="display: none;" class="tright" id="submcom_69">
					<span class="onlyblue hand" id="bopcdel_69">Delete</span> <span
						class="grey3">•</span> <span class="onlyblue hand"
						id="bopccancel_69">Cancel</span>
				</div>


				<div class="avatar">
					<a href="http://localhost/www.hottersstop.com/hottersstop"><img
						class="rounded"
						src="http://localhost/www.hottersstop.com/data/avatars/min2/Cr13Z2zHaJj.jpg"
						onmouseover="ItemCard(2, 'comment_post_69', 'Cr13Z2zHaJj', 0)"
						onmouseout="ignoreItemCard()"></a>
				</div>
				<div class="info">
					<div class="user">
						<span
							onmouseover="ItemCard(3, 'comment_post_69', 'Cr13Z2zHaJj', 0)"
							onmouseout="ignoreItemCard()" class="linkblue2"><a
							href="http://localhost/www.hottersstop.com/hottersstop">Jiten
								Patel</a></span>
						<div class="message">

							<span id="txtMaxCom_69Cr13Z2zHaJj">your are doing the great job
								jignesh</span>



						</div>
					</div>

					<div class="whend">
						<abbr title="2016-07-25T04:22:38+02:00" class="timeago">Monday,
							July 25, 2016</abbr>
					</div>
				</div>

			</div>
			<script>
									
										
									$("#bactioncomment_69").on("click",function(){
										$("#bactioncomment_69").fadeOut(200, function(){
											$("#submcom_69").fadeIn(200);
										});	
									});
								
									$("#bopccancel_69").on("click",function(){
										$("#submcom_69").fadeOut(200, function(){
											$("#bactioncomment_69").fadeIn(200);
										});	
									});
								
									$("#bopcdel_69").on("click",function(){
										deletecomment(69, 1122, 1, 'aXkcFv9NwfC');
										return false;
									});
									
									$("#bopcreport_69").on("click",function(){
										$('#submcom_69').hide();
										reportComment(69, 1);
										return false;
									});
									
									$("#bundorc_69").on("click",function(){
										undoReportComment('69');
										return false;
									});
									
									$("#bopchidden_69").on("click",function(){
										$('#submcom_69').hide();
										hiddenComment('69');
										return false;
									});
								
									$("#bundohc_69").on("click",function(){
										undoHiddenComment('69');
										return false;
									});
									
									
								</script>
			<div style="display: none;"
				class="msgactionpost pdn5 centered txtsize00" id="msgaction_70">
				<span style="display: none;" id="msgcr_70">This comment has been
					reported.</span> <span style="display: none;" id="msgch_70">This
					comment is now hidden for you.</span> <span style="display: none;"
					class="onlyblue bold hand" id="bundorc_70">Undo</span> <span
					style="display: none;" class="onlyblue bold hand" id="bundohc_70">Undo</span>
			</div>
			<div class="onecomment" id="comment_post_70">


				<div class="hand delete" id="bactioncomment_70">x</div>

				<div style="display: none;" class="tright" id="submcom_70">
					<span class="onlyblue hand" id="bopcreport_70">Report</span> <span
						class="grey3">•</span> <span class="onlyblue hand"
						id="bopchidden_70">Hide</span> <span class="grey3">•</span> <span
						class="onlyblue hand" id="bopccancel_70">Cancel</span>
				</div>


				<div class="avatar">
					<a href="http://localhost/www.hottersstop.com/84519012392031019221"><img
						class="rounded"
						src="http://localhost/www.hottersstop.com/data/avatars/min2/default.jpg"
						onmouseover="ItemCard(2, 'comment_post_70', 'kWKHxyPpW36', 0)"
						onmouseout="ignoreItemCard()"></a>
				</div>
				<div class="info">
					<div class="user">
						<span
							onmouseover="ItemCard(3, 'comment_post_70', 'kWKHxyPpW36', 0)"
							onmouseout="ignoreItemCard()" class="linkblue2"><a
							href="http://localhost/www.hottersstop.com/84519012392031019221">Info
								Mistry</a></span>
						<div class="message">

							<span id="txtMaxCom_70kWKHxyPpW36">Hey This is great line said by
								me</span>



						</div>
					</div>

					<div class="whend">
						<abbr title="2016-07-27T07:39:47+02:00" class="timeago">Wednesday,
							July 27, 2016</abbr>
					</div>
				</div>

			</div>
			<script>
									
										
									$("#bactioncomment_70").on("click",function(){
										$("#bactioncomment_70").fadeOut(200, function(){
											$("#submcom_70").fadeIn(200);
										});	
									});
								
									$("#bopccancel_70").on("click",function(){
										$("#submcom_70").fadeOut(200, function(){
											$("#bactioncomment_70").fadeIn(200);
										});	
									});
								
									$("#bopcdel_70").on("click",function(){
										deletecomment(70, 1122, 1, 'aXkcFv9NwfC');
										return false;
									});
									
									$("#bopcreport_70").on("click",function(){
										$('#submcom_70').hide();
										reportComment(70, 31);
										return false;
									});
									
									$("#bundorc_70").on("click",function(){
										undoReportComment('70');
										return false;
									});
									
									$("#bopchidden_70").on("click",function(){
										$('#submcom_70').hide();
										hiddenComment('70');
										return false;
									});
								
									$("#bundohc_70").on("click",function(){
										undoHiddenComment('70');
										return false;
									});
									
									
								</script>
		</div>
	</div>

	<div class="areacomments">
		<div class="avatar">
			<img class="rounded"
				src="http://localhost/www.hottersstop.com/data/avatars/min2/Cr13Z2zHaJj.jpg">
		</div>
		<div class="areainput">
			<form action="" method="post" name="form1_bZyJ2qaqttg">
				<div>
					<textarea placeholder="Leave a comment..." class="boxinput"
						id="comment_bZyJ2qaqttg" name="comment_bZyJ2qaqttg"></textarea>
				</div>
				<div class="redbox" id="msgerror2_bZyJ2qaqttg"></div>
				<div>
					<span style="display: none;" id="iloader_bZyJ2qaqttg"><img
						src="http://localhost/www.hottersstop.com/themes/hottersstop/imgs/preload.gif"></span>
					<span style="display: none;" id="bcomment_bZyJ2qaqttg"><input
						type="submit" class="bblue hand" value="Save Comment"
						id="bsavecomm_bZyJ2qaqttg" name="bsavecomm_bZyJ2qaqttg"></span>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="jumbotron post">
	<header class="panel_header">
		<div class="title pull-left">
			<div class="avtar pull-left">
				<a href="#"><img
					src="<?php echo base_url();?>assets/images/user.jpg"></a>
			</div>
			<div class="username pull-left">
				<a href="#" class="name">John Duo</a> <a href="#"> <abbr
					title="2016-07-30T08:54:11+02:00" class="timeago"> Saturday, July
						30, 2016 </abbr>
				</a>
			</div>
		</div>
		<div class="actions panel_actions pull-right">
			<a class="box_toggle fa fa-chevron-down"></a> <a
				href="#section-settings" data-toggle="modal"
				class="box_setting fa fa-cog"></a> <a class="box_close fa fa-times"></a>
		</div>
	</header>
	<div class="content">
		<img src="<?php echo base_url();?>assets/images/F1q8ZnJ1xpH-0.jpg"
			alt="" />
	</div>
	<div class="comment_section">
		<div class="likesection">
			<div class="col-md-6 total_like">
				<userlist> <a class="myuser_hHQMP4a9xdW"
					href="http://localhost/www.hottersstop.com/hottersstop"> <img
					src="http://localhost/www.hottersstop.com/data/avatars/min2/Cr13Z2zHaJj.jpg"
					class="rounded" style="display: none;"></a> <span class="userplus">+<span
					id="numlikes_hHQMP4a9xdW" class="com-likes">0</span></span> </userlist>
				<span>Loved this</span>
			</div>
			<div class="col-md-6 total_comments">
				<span id="numcomments_hHQMP4a9xdW" class="com-likes">2</span> <span>
					Comments</span>
			</div>

		</div>
		<div class="usersection">
			<div class="col-xs-4 col-md-4 like_box">
				<div id="arealike_hHQMP4a9xdW" class="like">
					<span style="display: none;" id="iloaderlike_hHQMP4a9xdW"></span> <span
						class="onlyblue hand hvr-pulse-grow" id="llike_hHQMP4a9xdW"><i
						class="fa fa-heart-o"></i></span> <span style="display: none;"
						class="onlyred hand hvr-pulse-grow" id="lulike_hHQMP4a9xdW"><i
						class="fa fa-heart"></i></span> <span class="p_active">Love</span>
				</div>
			</div>
			<div class="col-xs-4 col-md-4 comment_box">
				<div id="lcomment_hHQMP4a9xdW" class="comment mrg10L onlyblue hand">
					<i class="fa fa-comment hvr-buzz"></i><span class="p_active">Comment</span>
				</div>
			</div>
			<div class="col-xs-4 col-md-4 share_box">
				<div id="lshare_hHQMP4a9xdW" class="share">
					<span class="mrg10L onlyblue hand"><i class="fa fa-share hvr-bob"></i></span><span
						class="p_active">Share</span>
				</div>
			</div>
		</div>
		<div class="listcomments" id="thelistcomments_aXkcFv9NwfC">

			<div style="display: none;"
				class="msgactionpost pdn5 centered txtsize00" id="msgaction_69">
				<span style="display: none;" id="msgcr_69">This comment has been
					reported.</span> <span style="display: none;" id="msgch_69">This
					comment is now hidden for you.</span> <span style="display: none;"
					class="onlyblue bold hand" id="bundorc_69">Undo</span> <span
					style="display: none;" class="onlyblue bold hand" id="bundohc_69">Undo</span>
			</div>
			<div class="onecomment" id="comment_post_69">


				<div class="hand delete" id="bactioncomment_69">x</div>

				<div style="display: none;" class="tright" id="submcom_69">
					<span class="onlyblue hand" id="bopcdel_69">Delete</span> <span
						class="grey3">•</span> <span class="onlyblue hand"
						id="bopccancel_69">Cancel</span>
				</div>


				<div class="avatar">
					<a href="http://localhost/www.hottersstop.com/hottersstop"><img
						class="rounded"
						src="http://localhost/www.hottersstop.com/data/avatars/min2/Cr13Z2zHaJj.jpg"
						onmouseover="ItemCard(2, 'comment_post_69', 'Cr13Z2zHaJj', 0)"
						onmouseout="ignoreItemCard()"></a>
				</div>
				<div class="info">
					<div class="user">
						<span
							onmouseover="ItemCard(3, 'comment_post_69', 'Cr13Z2zHaJj', 0)"
							onmouseout="ignoreItemCard()" class="linkblue2"><a
							href="http://localhost/www.hottersstop.com/hottersstop">Jiten
								Patel</a></span>
						<div class="message">

							<span id="txtMaxCom_69Cr13Z2zHaJj">your are doing the great job
								jignesh</span>



						</div>
					</div>

					<div class="whend">
						<abbr title="2016-07-25T04:22:38+02:00" class="timeago">Monday,
							July 25, 2016</abbr>
					</div>
				</div>

			</div>
			<script>
									
										
									$("#bactioncomment_69").on("click",function(){
										$("#bactioncomment_69").fadeOut(200, function(){
											$("#submcom_69").fadeIn(200);
										});	
									});
								
									$("#bopccancel_69").on("click",function(){
										$("#submcom_69").fadeOut(200, function(){
											$("#bactioncomment_69").fadeIn(200);
										});	
									});
								
									$("#bopcdel_69").on("click",function(){
										deletecomment(69, 1122, 1, 'aXkcFv9NwfC');
										return false;
									});
									
									$("#bopcreport_69").on("click",function(){
										$('#submcom_69').hide();
										reportComment(69, 1);
										return false;
									});
									
									$("#bundorc_69").on("click",function(){
										undoReportComment('69');
										return false;
									});
									
									$("#bopchidden_69").on("click",function(){
										$('#submcom_69').hide();
										hiddenComment('69');
										return false;
									});
								
									$("#bundohc_69").on("click",function(){
										undoHiddenComment('69');
										return false;
									});
									
									
								</script>
			<div style="display: none;"
				class="msgactionpost pdn5 centered txtsize00" id="msgaction_70">
				<span style="display: none;" id="msgcr_70">This comment has been
					reported.</span> <span style="display: none;" id="msgch_70">This
					comment is now hidden for you.</span> <span style="display: none;"
					class="onlyblue bold hand" id="bundorc_70">Undo</span> <span
					style="display: none;" class="onlyblue bold hand" id="bundohc_70">Undo</span>
			</div>
			<div class="onecomment" id="comment_post_70">


				<div class="hand delete" id="bactioncomment_70">x</div>

				<div style="display: none;" class="tright" id="submcom_70">
					<span class="onlyblue hand" id="bopcreport_70">Report</span> <span
						class="grey3">•</span> <span class="onlyblue hand"
						id="bopchidden_70">Hide</span> <span class="grey3">•</span> <span
						class="onlyblue hand" id="bopccancel_70">Cancel</span>
				</div>


				<div class="avatar">
					<a href="http://localhost/www.hottersstop.com/84519012392031019221"><img
						class="rounded"
						src="http://localhost/www.hottersstop.com/data/avatars/min2/default.jpg"
						onmouseover="ItemCard(2, 'comment_post_70', 'kWKHxyPpW36', 0)"
						onmouseout="ignoreItemCard()"></a>
				</div>
				<div class="info">
					<div class="user">
						<span
							onmouseover="ItemCard(3, 'comment_post_70', 'kWKHxyPpW36', 0)"
							onmouseout="ignoreItemCard()" class="linkblue2"><a
							href="http://localhost/www.hottersstop.com/84519012392031019221">Info
								Mistry</a></span>
						<div class="message">

							<span id="txtMaxCom_70kWKHxyPpW36">Hey This is great line said by
								me</span>



						</div>
					</div>

					<div class="whend">
						<abbr title="2016-07-27T07:39:47+02:00" class="timeago">Wednesday,
							July 27, 2016</abbr>
					</div>
				</div>

			</div>
			<script>
									
										
									$("#bactioncomment_70").on("click",function(){
										$("#bactioncomment_70").fadeOut(200, function(){
											$("#submcom_70").fadeIn(200);
										});	
									});
								
									$("#bopccancel_70").on("click",function(){
										$("#submcom_70").fadeOut(200, function(){
											$("#bactioncomment_70").fadeIn(200);
										});	
									});
								
									$("#bopcdel_70").on("click",function(){
										deletecomment(70, 1122, 1, 'aXkcFv9NwfC');
										return false;
									});
									
									$("#bopcreport_70").on("click",function(){
										$('#submcom_70').hide();
										reportComment(70, 31);
										return false;
									});
									
									$("#bundorc_70").on("click",function(){
										undoReportComment('70');
										return false;
									});
									
									$("#bopchidden_70").on("click",function(){
										$('#submcom_70').hide();
										hiddenComment('70');
										return false;
									});
								
									$("#bundohc_70").on("click",function(){
										undoHiddenComment('70');
										return false;
									});
									
									
								</script>
		</div>
	</div>

	<div class="areacomments">
		<div class="avatar">
			<img class="rounded"
				src="http://localhost/www.hottersstop.com/data/avatars/min2/Cr13Z2zHaJj.jpg">
		</div>
		<div class="areainput">
			<form action="" method="post" name="form1_bZyJ2qaqttg">
				<div>
					<textarea placeholder="Leave a comment..." class="boxinput"
						id="comment_bZyJ2qaqttg" name="comment_bZyJ2qaqttg"></textarea>
				</div>
				<div class="redbox" id="msgerror2_bZyJ2qaqttg"></div>
				<div>
					<span style="display: none;" id="iloader_bZyJ2qaqttg"><img
						src="http://localhost/www.hottersstop.com/themes/hottersstop/imgs/preload.gif"></span>
					<span style="display: none;" id="bcomment_bZyJ2qaqttg"><input
						type="submit" class="bblue hand" value="Save Comment"
						id="bsavecomm_bZyJ2qaqttg" name="bsavecomm_bZyJ2qaqttg"></span>
				</div>
			</form>
		</div>
	</div>

</div>


<div class="jumbotron post">
	<header class="panel_header">
		<div class="title pull-left">
			<div class="avtar pull-left">
				<a href="#"><img
					src="<?php echo base_url();?>assets/images/user.jpg"></a>
			</div>
			<div class="username pull-left">
				<a href="#" class="name">John Duo</a> <a href="#"> <abbr
					title="2016-07-30T08:54:11+02:00" class="timeago"> Saturday, July
						30, 2016 </abbr>
				</a>
			</div>
		</div>
		<div class="actions panel_actions pull-right">
			<a class="box_toggle fa fa-chevron-down"></a> <a
				href="#section-settings" data-toggle="modal"
				class="box_setting fa fa-cog"></a> <a class="box_close fa fa-times"></a>
		</div>
	</header>
	<div class="content">
		<iframe width="100%" height="315" frameborder="0" allowfullscreen=""
			src="http://www.youtube.com/embed/-eOPXHEkH3Y"></iframe>

	</div>
	<div class="comment_section">
		<div class="likesection">
			<div class="col-md-6 total_like">
				<userlist> <a class="myuser_hHQMP4a9xdW"
					href="http://localhost/www.hottersstop.com/hottersstop"> <img
					src="http://localhost/www.hottersstop.com/data/avatars/min2/Cr13Z2zHaJj.jpg"
					class="rounded" style="display: none;"></a> <span class="userplus">+<span
					id="numlikes_hHQMP4a9xdW" class="com-likes">0</span></span> </userlist>
				<span>Loved this</span>
			</div>
			<div class="col-md-6 total_comments">
				<span id="numcomments_hHQMP4a9xdW" class="com-likes">2</span> <span>
					Comments</span>
			</div>

		</div>
		<div class="usersection">
			<div class="col-xs-4 col-md-4 like_box">
				<div id="arealike_hHQMP4a9xdW" class="like">
					<span style="display: none;" id="iloaderlike_hHQMP4a9xdW"></span> <span
						class="onlyblue hand hvr-pulse-grow" id="llike_hHQMP4a9xdW"><i
						class="fa fa-heart-o"></i></span> <span style="display: none;"
						class="onlyred hand hvr-pulse-grow" id="lulike_hHQMP4a9xdW"><i
						class="fa fa-heart"></i></span> <span class="p_active">Love</span>
						<img src="<?php echo base_url();?>assets/images/heart.png" />
				</div>
			</div>
			<div class="col-xs-4 col-md-4 comment_box">
				<div id="lcomment_hHQMP4a9xdW" class="comment mrg10L onlyblue hand">
					<i class="fa fa-comment hvr-buzz"></i><span class="p_active">Comment</span>
					<img src="<?php echo base_url();?>assets/images/comment.png" />
				</div>
			</div>
			<div class="col-xs-4 col-md-4 share_box">
				<div id="lshare_hHQMP4a9xdW" class="share">
					<span class="mrg10L onlyblue hand"><i class="fa fa-share hvr-bob"></i></span><span
						class="p_active">Share</span>
				</div>
			</div>
		</div>
		<div class="listcomments" id="thelistcomments_aXkcFv9NwfC">
			<div style="display: none;"
				class="msgactionpost pdn5 centered txtsize00" id="msgaction_69">
				<span style="display: none;" id="msgcr_69">This comment has been
					reported.</span> <span style="display: none;" id="msgch_69">This
					comment is now hidden for you.</span> <span style="display: none;"
					class="onlyblue bold hand" id="bundorc_69">Undo</span> <span
					style="display: none;" class="onlyblue bold hand" id="bundohc_69">Undo</span>
			</div>
		</div>

		<div class="areacomments">
			<div class="avatar">
				<img class="rounded"
					src="http://localhost/www.hottersstop.com/data/avatars/min2/Cr13Z2zHaJj.jpg">
			</div>
			<div class="areainput">
				<form action="" method="post" name="form1_bZyJ2qaqttg">
					<div>
						<textarea placeholder="Leave a comment..." class="boxinput"
							id="comment_bZyJ2qaqttg" name="comment_bZyJ2qaqttg"></textarea>
					</div>
					<div class="redbox" id="msgerror2_bZyJ2qaqttg"></div>
					<div>
						<span style="display: none;" id="iloader_bZyJ2qaqttg"><img
							src="http://localhost/www.hottersstop.com/themes/hottersstop/imgs/preload.gif"></span>
						<span style="display: none;" id="bcomment_bZyJ2qaqttg"><input
							type="submit" class="bblue hand" value="Save Comment"
							id="bsavecomm_bZyJ2qaqttg" name="bsavecomm_bZyJ2qaqttg"></span>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>*/

	
	  
}	
?>
