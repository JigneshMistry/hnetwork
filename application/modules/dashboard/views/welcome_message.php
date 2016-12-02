<div class="container">
	<div class="row">
		<?php /* ?><div style="display: none;" class="loader">
			<div id="fountainTextG">
				<div class="fountainTextG" id="fountainTextG_1">L</div>
				<div class="fountainTextG" id="fountainTextG_2">o</div>
				<div class="fountainTextG" id="fountainTextG_3">a</div>
				<div class="fountainTextG" id="fountainTextG_4">d</div>
				<div class="fountainTextG" id="fountainTextG_5">i</div>
				<div class="fountainTextG" id="fountainTextG_6">n</div>
				<div class="fountainTextG" id="fountainTextG_7">g</div>
			</div>
		</div>*/ ?>
		<div class="se-pre-con"></div>
	</div>
</div>
					
<div class="container">
	<div class="row">
		<div class="col-md-3 sidebar-left"> 
			<?php $this->load->view('leftpanel'); ?>
		</div>
		<!-- Posts Section Start Here -->
		<div class="col-md-6 blog-post">
			<div class="newpost">
				<a class="button hvr-bob" id="text_post" href="javascript:void(0);"><img class="post-icon" src="<?php echo base_url();?>assets/svg/1.svg" /></a>
				<a class="button hvr-bob" id="quote_post" href="javascript:void(0);"><img class="post-icon" src="<?php echo base_url();?>assets/svg/5.svg" /></a>
				<a class="button hvr-bob" id="photo_post" href="javascript:void(0);"><img class="post-icon" src="<?php echo base_url();?>assets/svg/4.svg" /></a>
				<a class="button hvr-bob" id="video_post" href="javascript:void(0);"><img class="post-icon" src="<?php echo base_url();?>assets/svg/3.svg" /></a>
				<a class="button hvr-bob" id="audio_post" href="javascript:void(0);"><img class="post-icon" src="<?php echo base_url();?>assets/svg/2.svg" /></a>
			</div>
			<!-- Write Post Box Begin -->
				<div class="postarea slide-fade">
					<div class="text_post " style="display: none;">
						<div class="post_container">
							<div class="new_post_header">
								<h2>what's on your mind ?	</h2>
							</div>
							<div class="new_post_content">
								<div>
								       <textarea id="newstatustitle" placeholder="Title" name="newstatustitle"></textarea>
					                   <textarea id="newdesc" placeholder="Text Here" name="newdesc"></textarea>
				              	</div>
				              	<div class="support_data">
				              		 <input name="post_type" type="hidden" id="post_type" value="1">
									 <input name="idw" type="hidden" id="idw" value="">
									 <input name="wseep" type="hidden" id="wseep" value="0">
						      	</div>
							</div>	
							<div class="new_post_footer">
								<button id="close_text" class="closebtn tx-button cd-popup-trigger">Close</button>
								<button class="button-area create_post_button" id="post_text">Post</button>
							
								
							</div>
						</div>
					</div>
					<div class="quote_post" style="display: none;">
						
						<div class="post_container">
							<div class="new_post_header">
								<h2>what's your Quote ?	</h2>
							</div>
							<div class="new_post_content">
								<div>
								       <i class="fa fa-quote-left" style="font-size:20px;color:#529ecc;"></i>
								       <textarea id="quote" placeholder="Your Quote" name="quote"></textarea>
								       
					          	</div>
				              	<div class="support_data">
				              		<input name="post_type" type="hidden" id="post_type" value="2">
									 <input name="wseep" type="hidden" id="wseep" value="0">
									 <input name="typeattach10" type="hidden" id="typeattach10" value="10">
						      	</div>
						 	</div>	
							<div class="new_post_footer">
								<button id="close_text" class="closebtn tx-button cd-popup-trigger">Close</button>
								<button id="post_quote" class="button-area create_post_button">Post</button>			
							</div>
						</div>
					</div>
					<div class="photo_post" style="display: none;">
						
						<div class="post_container">
							<div class="new_post_header">
								<h2>Upload Photos</h2>
							</div>
							
							<div class="new_post_content">
								<div class="row text-center">
				              		
					                   	<div class="col-md-12" id="first_up">
					                       <div class="col-sm-6 col-xm-6 col-md-6 center photo_upload">
					                       		
					                       		<img class="" src="<?php echo base_url();?>assets/images/1-1.png" />
					                       		<span>Upload Photo</span>
					                       </div>
					  					   <div class="col-sm-6 col-xm-6 col-md-6 center fromweb">
					  							<img class="" src="<?php echo base_url();?>assets/images/add_web.png" />
					  							<span>Upload From Web</span>
					  							
					  						</div>	                     
					                    </div>
					                    <div id="photo_upload">
					                    	<input type="file" name="photo_up" id="photo_up" accepts="image/*" style="display:none;"/> 
					                    	<div class="del"><i class="fa fa-times" aria-hidden="true"></i>
					                    	</div>
					                    	<div class="enter_url" style="display: none;"><input type="text" name="from_url" id="from_url"  placeholder="Paste Url" onfocus="showimg()"/></div>
					                    	<img id="preview" />
					                    </div>
					               
					                
					            </div>
					     	</div>
							<div class="new_post_footer">
								<button id="close_text" class="closebtn tx-button cd-popup-trigger">Close</button>
								<button type="button" id="post_photo" class="button-area create_post_button">Post</button>		
							</div>
							
						</div>	
					</div>
					
					<div class="video_post" style="display: none;">
						
						<div class="post_container">
							<div class="new_post_header">
								<h2>Update your video</h2>
							</div>
							<div class="new_post_content">
								<div class="row text-center">
				                  
					                   	<div class="col-md-12" id="v_first">
					                       <div class="col-sm-6 col-xm-6 col-md-6 center photo_upload">
					                       		
					                       		<img class="" src="<?php echo base_url();?>assets/images/1-2.png" />
					                       		<span>Upload Video</span>
					                       </div>
					  					   <div class="col-sm-6 col-xm-6 col-md-6 center fromvideoweb">
					  							<img class="" src="<?php echo base_url();?>assets/images/add_web.png" />
					  							<span>Upload From Web</span>
					  							
					  						</div>	                     
					                    </div>
					                    <div id="video_upload" style="display: none;">
					                    	<div class="del"><i class="fa fa-times" aria-hidden="true"></i>
					                    	</div>
					                    	<div class="enter_url" style="display: none;">
					                    		<input type="text" name="video_url" id="video_url"  placeholder="Paste Video Url" onfocus="showvideo()"/>
					                    	</div>
					                    	<div class="video_pre">
					                    	</div>
					                    </div>
					            </div>
							</div>
							<div class="support_data">
				              		 <input name="pin" type="hidden" id="pin" value="">
									 <input name="idw" type="hidden" id="idw" value="">
									 <input name="wseep" type="hidden" id="wseep" value="0">
									 <input name="typeattach2" type="hidden" id="typeattach2" value="0">
						      	</div>	
							<div class="new_post_footer">
								<button id="close_text" class="closebtn tx-button cd-popup-trigger">Close</button>
								<button id="post_v" class="button-area create_post_button">Post</button>		
							</div>
						</div>
					</div>
					<div class="audio_post" style="display: none;">
						
						<div class="post_container">
							<div class="new_post_header">
								<h2>what's your favrite Audio ?	</h2>
							</div>
							<div class="new_post_content">
							     <!-- -added--------- -->
				                 <div class="row text-center" id="audio_wrap">
				            	
					                   	<div class="col-md-12">
					                       <div class="col-sm-6 col-xm-6 col-md-6 center photo_upload">
					                       		
					                       		<img class="" src="<?php echo base_url();?>assets/images/1-3.png" />
					                       		<span>Upload Music</span>
					                       </div>
					  					   <div class="col-sm-6 col-xm-6 col-md-6 center fromweb">
					  							<img class="" src="<?php echo base_url();?>assets/images/add_web.png" />
					  							<span>Upload From Web</span>
					  							
					  						</div>	                     
					                    </div>
					            
								</div><!-- row -->
						      	<div class="support_data">
				              		 <input name="pin" type="hidden" id="pin" value="">
									 <input name="idw" type="hidden" id="idw" value="">
									 <input name="wseep" type="hidden" id="wseep" value="0">
									 <input name="typeattach10" type="hidden" id="typeattach10" value="10">
						      	</div>
							</div>	
							<div class="new_post_footer">
								<button id="close_text" class="closebtn tx-button cd-popup-trigger">Close</button>
								<button id="post_audio" class="button-area create_post_button">Post</button>		
							</div>
						</div>
					</div>
				</div>
			<div class="cd-popup" role="alert">
				<div class="cd-popup-container">
					<p>Are you sure you want to descard the changes?</p>
					<ul class="cd-buttons">
						<li><a href="javascript:void(0);" id="confirm_yes">Yes</a></li>
						<li><a href="javascript:void(0);" id="confirm_no">No</a></li>
					</ul>
					<a href="javascript:void(0);" class="cd-popup-close img-replace">Close</a>
				</div> <!-- cd-popup-container -->
			</div> <!-- cd-popup -->
			<!-- End Here -->
			
			<div class="blogposts"></div>
		</div>
		<!-- Posts Section End Here -->
		<div class="col-md-3 sidebar-right">
			<?php $this->load->view('rightpanel'); ?>
			
			<div class="centered">
		        <div class="">
		        	<a style="color:#9197a3" class="undecorated" href="<?php echo base_url();?>admin">Administration Area</a>
		        </div>
		        
		        <div style="color:#9197a3">&copy; 2016 - HNetwork</div>
		    </div>
			<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds.</p>
		</div>
	</div>
	<?php $this->load->view('popupmodal'); ?>
</div>