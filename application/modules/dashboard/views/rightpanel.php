<div class="box dashboard_suggestion">
	    		<h2 class="sidebar_title">Suggestion</h2>
	            <ul class="users-list clearfix">
					
					<?php
					$get_total_records=sizeof($suggestions);
					
					for($i=0;$i<$get_total_records;$i++)
					{						
						?>
						<li class="list-group-item" id="users_<?php echo $suggestions[$i]->id; ?>">
	            		<div class="user-icon">
							<a href="#">
								<img class="img-circle" src="<?php echo base_url();?>assets/images/default.jpg" >
							</a>	
						</div>
						<div class="user-name"> <a href="#"><?php echo $suggestions[$i]->first_name; ?>&nbsp;<?php  echo $suggestions[$i]->last_name; ?></a> </div>
					    <div id="areabfollow">
					       <ul class="actions">
								<li><button data-li-auto-click-utrki="" class="like" onclick="userfollow('<?php echo $userdata->id;?>','<?php echo $suggestions[$i]->id; ?>','users_<?php echo $suggestions[$i]->id; ?>')"> <i style="font-size:12px;" class="fa fa-plus"></i> Follow</button></li>
						   </ul>
						</div>
						</li>
						<?php
						
					}
					?>
				
	            	<?php 
	            	/*foreach($suggestions as $suggestion)
	            	{
	            		?>
	            		<li class="list-group-item" id="users_<?php echo $suggestion['id'];?>">
	            		<div class="user-icon">
							<a href="#">
								<img class="img-circle" src="<?php echo base_url();?>assets/images/default.jpg" >
							</a>	
						</div>
						<div class="user-name"> <a href="#"><?php echo $suggestion['first_name'];  ?>&nbsp;<?php  echo $suggestion['last_name'];?></a> </div>
					    <div id="areabfollow">
					       <ul class="actions">
								<li><button data-li-auto-click-utrki="" class="like" onclick="userfollow('<?php echo $userdata->id;?>','<?php echo $suggestion['id'];?>','users_<?php echo $suggestion['id'];?>')"> <i style="font-size:12px;" class="fa fa-plus"></i> Follow</button></li>
						   </ul>
						</div>
						</li>
	            		<?php 
	            		
	            	}*/	
	            	?>
                </ul>
</div>
            
			