/* Name			: Custom.Js
 * Description  : Site Custom Function js file
 * Developer    : JM
 * Verion 		: 01
 */ 
var siteurl = 'http://hnetwork.webchela.com/';
var posturl = siteurl+'dashboard/getpost';
var subposturl = siteurl+'dashboard/ajaxpost';

jQuery( document ).ready(function() {
	
	/* image upload */
	/*jQuery('#upload').click(function(){
		//console.log("ok");
		$.ajax({
			url: "profile/do_upload", // Url to which the request is send
			type: "POST",             // Type of request to be send, called as method
			data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
			contentType: false,       // The content type used when sending data to the server.
			cache: false,             // To unable request pages to be cached
			processData:false,        // To send DOMDocument or non processed data file it is set to false
			success: function(data)   // A function to be called if request succeeds
			{
				console.log(data);
				$('#loading').hide();
				$("#message").html(data);
			}
		});
	});*/
	
	/* update account */
	jQuery("#account-update").click(function(){
		var first_name=jQuery('#first_name').val();
		var last_name=jQuery('#last_name').val();
		var phone=jQuery('#phone').val();
		var address=jQuery('#address').val();
		var state=jQuery('#state').val();
		var country=jQuery('#country').val();
		var pincode=jQuery('#pincode').val();
		var dob=jQuery('#dob').val();
		console.log("hello");
		jQuery.ajax({
			type: "POST",
			url: siteurl+'settings/editaccountdata',
			data:{
				'first_name':first_name,
				'last_name':last_name,
				'phone':phone,
				'address':address,
				'state':state,
				'country':country,
				'pincode':pincode,
				'dob':dob
			},
			dataType:"json",
			success:function(ack){
				if(ack == 1)
				{
					jQuery("#ack").html("<p style='color:blue;'>Account Updated Successfully</p>");
				}
				else
				{
					jQuery("#ack").html("<p style='color:red;'>Account Not Updated.</p>");
				}
				console.log(ack);
			}
		}); 
		
		//console.log(first_name+"||"+last_name+"||"+phone+"||"+state+"||"+country+"||"+pincode+"||"+dob);		
	});
	/* update account */
	
	$("#uploadimage").on('submit',(function(e) {
		e.preventDefault();
		$("#message").empty();
		$('#loading').show();
		$.ajax({
			url: "profile/do_upload", // Url to which the request is send
			type: "POST",             // Type of request to be send, called as method
			data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
			contentType: false,       // The content type used when sending data to the server.
			cache: false,             // To unable request pages to be cached
			processData:false,        // To send DOMDocument or non processed data file it is set to false
			success: function(data)   // A function to be called if request succeeds
			{
				$('#loading').hide();
				$("#message").html(data);
			}
		});
	}));
	
	
	$('input[type=file]').change(function(){
 
        $(this).simpleUpload("/ajax/upload.php", {
 
            start: function(file){
                //upload started 
                $('#filename').html(file.name);
                $('#progress').html("");
                $('#progressBar').width(0);
            },
 
            progress: function(progress){
                //received progress 
                $('#progress').html("Progress: " + Math.round(progress) + "%");
                $('#progressBar').width(progress + "%");
            },
 
            success: function(data){
                //upload successful 
                $('#progress').html("Success!<br>Data: " + JSON.stringify(data));
            },
 
            error: function(error){
                //upload failed 
                $('#progress').html("Failure!<br>" + error.name + ": " + error.message);
            }
 
        });
 
    });
	/* //image upload */
	
	// Loading dashboard post
	jQuery('.loader').show();
	
	setTimeout(function () {
		$.ajax({
	        url: posturl,
	        type: "get",
	        success: function (response) {
	        	//jQuery('.loader').hide();
	        	jQuery(".se-pre-con").fadeOut("slow");
	        	jQuery('.blogposts').append(response);
	        },
	        error: function(jqXHR, textStatus, errorThrown) {
	           console.log(textStatus, errorThrown);
	        }
	    });
    }, 3000);
	
	
	jQuery('.nav li img.svg').each(function(){
	  var $img = jQuery(this);
	            var imgID = $img.attr('id');
	            var imgClass = $img.attr('class');
	            var imgURL = $img.attr('src');

	            jQuery.get(imgURL, function(data) {
	                // Get the SVG tag, ignore the rest
	                var $svg = jQuery(data).find('svg');

	                // Add replaced image's ID to the new SVG
	                if(typeof imgID !== 'undefined') {
	                    $svg = $svg.attr('id', imgID);
	                }
	                // Add replaced image's classes to the new SVG
	                if(typeof imgClass !== 'undefined') {
	                    $svg = $svg.attr('class', imgClass+' replaced-svg');
	                }

	                // Remove any invalid XML tags as per http://validator.w3.org
	                $svg = $svg.removeAttr('xmlns:a');

	                // Replace image with new SVG
	                $img.replaceWith($svg);

	            }, 'xml');
	});
	
	jQuery('.newpost a').click(function(){

		jQuery('.text_post').hide();
		jQuery('.quote_post').hide();
		jQuery('.photo_post').hide();
		jQuery('.video_post').hide();
		jQuery('.audio_post').hide();
		
		var clickid = jQuery(this).attr('id');
		jQuery('.postarea').find('.'+clickid).toggle();
		
	});
	
	
	//Close Event For Post Write Box
	jQuery('.closebtn').click(function(){
		jQuery('.text_post').hide();
		jQuery('.quote_post').hide();
		jQuery('.photo_post').hide();
		jQuery('.video_post').hide();
		jQuery('.audio_post').hide();
		
		clearall();
	});
	
	
	//Upload Photo Click
	jQuery('.photo_upload').click(function(){
		//jQuery('#photo_upload input').open();
		jQuery('#photo_up').trigger('click');
		jQuery('#photo_upload').show();
		jQuery("#first_up").hide();
		jQuery("input[type=file]").on("change", function() {
			 // $("[for=file]").html(this.files[0].name);
			  jQuery("#preview").attr("src", URL.createObjectURL(this.files[0]));
		});
		
	});
	
	//From Web Photo, Video, Audio
	jQuery('.fromweb').click(function(){
		
		jQuery('#photo_upload').show();
		jQuery("#first_up").hide();
		jQuery('.enter_url').show();
		
	});
	
	
	//Remove Picture Click Event
	jQuery('.del').click(function(){
		jQuery("#preview").attr("src",'');
		jQuery("input[type=file]").val('');
		jQuery('#photo_upload').hide();
		jQuery("#first_up").show();
	});
	// Post the ajax with all post data
	jQuery('#post_text').click(function(){

		var posttitle = jQuery("#newstatustitle").val();
		var postdesc  = jQuery("#newdesc").val();
		var posttype  = jQuery("#post_type").val();
		if(posttitle!='')
		{
			// Value found in text box Ajax begin
			$.ajax({
		        url: subposturl,
		        type: "post",
		        data: {posttitle:posttitle,postdesc:postdesc,posttype:posttype} ,
		        success: function (response) {
		        	jQuery('.postarea .text_post').hide();
		        	jQuery('.postarea .quote_post').hide();
		        	jQuery('.postarea .photo_post').hide();
		        	jQuery('.postarea .video_post').hide();
		        	jQuery('.postarea .audio_post').hide();
		        	jQuery('.post-forms-glass').hide();
		        	jQuery('.post-forms-glass').removeClass('active');
		        	jQuery('.post-forms-glass').css({'opacity':'0','display':'none'}); 
		        	jQuery('.blogposts').prepend(response).show('slow');
		        	jQuery("#newstatustitle").val('');
		        	             
		        },
		        error: function(jqXHR, textStatus, errorThrown) {
		           console.log(textStatus, errorThrown);
		        }
		    });
		}	
	});

	//Quote post Ajax

	jQuery('#post_quote').click(function(){

		
		var postdesc  = jQuery("#newdesc").val();
		var posttype  = 2;
		var postquote = jQuery("#quote").val();
	
		if(postquote!='')
		{

			// Value found in text box Ajax begin
			$.ajax({
		        url: subposturl,
		        type: "post",
		        data: {posttitle:postquote,postdesc:postdesc,posttype:posttype} ,
		        success: function (response) {
		        	jQuery('.postarea .text_post').hide();
		        	jQuery('.postarea .quote_post').hide();
		        	jQuery('.postarea .photo_post').hide();
		        	jQuery('.postarea .video_post').hide();
		        	jQuery('.postarea .audio_post').hide();
		        	jQuery('.post-forms-glass').hide();
		        	jQuery('.post-forms-glass').removeClass('active');
		        	jQuery('.post-forms-glass').css({'opacity':'0','display':'none'}); 
		        	jQuery('.blogposts').prepend(response).show('slow');
		        	jQuery("#quote").val('');             
		        },
		        error: function(jqXHR, textStatus, errorThrown) {
		           console.log(textStatus, errorThrown);
		        }
		    });
		}	
	});



	//Photo
	jQuery('#post_photo').click(function(){

		var selectedphoto = jQuery("#photo_up").val();

	   //alert("testing"+selectedphoto)
		var postdesc  = "";
		var posttype  = 3;
		var posttitle = "";
		
		if(selectedphoto!='')
		{

			$('#photo_up').simpleUpload({
			    url: subposturl,
			    trigger: '#post_photo',
			    fields: {
			    	posttitle:posttitle,postdesc:postdesc,posttype:posttype
			    },
			    success: function(data){
			    	jQuery('.postarea .text_post').hide();
		        	jQuery('.postarea .quote_post').hide();
		        	jQuery('.postarea .photo_post').hide();
		        	jQuery('.postarea .video_post').hide();
		        	jQuery('.postarea .audio_post').hide();
		        	jQuery('.post-forms-glass').hide();
		        	jQuery('.post-forms-glass').removeClass('active');
		        	jQuery('.post-forms-glass').css({'opacity':'0','display':'none'}); 
		        	jQuery('#blog-wall').prepend(data).show('slow');
		        	jQuery("#quote").val('');        
			    }
			});
		}	
	});


	//Video Post
	jQuery('#post_v').click(function(){

		
		var pin 	  	= jQuery("#pin").val();
		var wseep 	  	= jQuery("#wseep").val();
		var idw 	  	= jQuery("#idw").val();
		var typeattach2 = 2;
		var combowsee 	= 0;
		var posttitle 	= '';
		var videourl	= jQuery("#atach-value").val();
		var videotitle  = jQuery("#videotitle").val();
		
		
		if(videourl!='')
		{

			// Value found in text box Ajax begin
			 $.ajax({
		        url: subposturl,
		        type: "post",
		        data: {txttitle:videotitle,pin:pin,wseep:wseep,idw:idw,typeattach2:typeattach2,combowsee:combowsee,videourl:videourl} ,
		        success: function (response) {
		        	jQuery('.postarea .text_post').hide();
		        	jQuery('.postarea .quote_post').hide();
		        	jQuery('.postarea .photo_post').hide();
		        	jQuery('.postarea .video_post').hide();
		        	jQuery('.postarea .audio_post').hide();
		        	jQuery('.post-forms-glass').hide();
		        	jQuery('.post-forms-glass').removeClass('active');
		        	jQuery('.post-forms-glass').css({'opacity':'0','display':'none'}); 
		        	jQuery('#blog-wall').prepend(response).show('slow');
		        	jQuery("#atach-value").val(''); 
		        	jQuery("#videotitle").val('');             
		        },
		        error: function(jqXHR, textStatus, errorThrown) {
		           console.log(textStatus, errorThrown);
		        }
		    });
		}	
	});

	//Audio Post
	jQuery('#post_audio').click(function(){
		
		
		var pin 	  	= jQuery("#pin").val();
		var wseep 	  	= jQuery("#wseep").val();
		var idw 	  	= jQuery("#idw").val();
		var typeattach3 = 3;
		var combowsee 	= 0;
		var posttitle 	= '';
		var audiourl	= jQuery("#audiourl").val();
		var audiotitle  = jQuery("#audiotitle").val();
		
		
		if(audiourl!='')
		{
			
			// Value found in text box Ajax begin
			 $.ajax({
		        url: subposturl,
		        type: "post",
		        data: {txttitle:audiotitle,pin:pin,wseep:wseep,idw:idw,typeattach3:typeattach3,combowsee:combowsee,videourl:audiourl} ,
		        success: function (response) {
		        	jQuery('.postarea .text_post').hide();
		        	jQuery('.postarea .quote_post').hide();
		        	jQuery('.postarea .photo_post').hide();
		        	jQuery('.postarea .video_post').hide();
		        	jQuery('.postarea .audio_post').hide();
		        	jQuery('.post-forms-glass').hide();
		        	jQuery('.post-forms-glass').removeClass('active');
		        	jQuery('.post-forms-glass').css({'opacity':'0','display':'none'}); 
		        	jQuery('#blog-wall').prepend(response).show('slow');
		        	jQuery("#audiourl").val(''); 
		        	jQuery("#audiotitle").val('');             
		        },
		        error: function(jqXHR, textStatus, errorThrown) {
		           console.log(textStatus, errorThrown);
		        }
		    });
		}	
	});
	
	//Post Settings box
	
	$("#bsmenup_VmRcQkrhPKt").on("click",function(){
		$('.submenuitem').hide();
		positop = $("#bsmenup_VmRcQkrhPKt").position()
		$('#smnp_VmRcQkrhPKt').css('top',positop.top + 17);
		$('#smnp_VmRcQkrhPKt').show();
		return false;
	});
});

//Delete function
function postdelete(postid)
{
	jQuery("#postdeletebox").modal('show');
	jQuery("#yesdelete").click(function(){
		jQuery.ajax({
	        url: siteurl+'dashboard/ajaxdelete',
	        type: "post",
	        data: {postid:postid} ,
	        success: function (response) {
	        	if(response == 1)
	        	{
	        		alert('Sorry due to some techinicle problem we can not delte this post');
	        	}else
	        	{
	        		jQuery("#post_"+postid).slideUp(2000);
	        		jQuery("#postdeletebox").modal('hide');
	        	}	
	        },
	        error: function(jqXHR, textStatus, errorThrown) {
	           console.log(textStatus, errorThrown);
	        }
		});
	});
}

//Edit function
function postedit(postid)
{
	jQuery("#posteditbox").modal('show');
}

//Report function
function postreport(postid)
{
	 jQuery.ajax({
	        url: siteurl+'dashboard/ajaxreport',
	        type: "post",
	        data: {postid:postid} ,
	        success: function (response) {
	        	jQuery("#post_"+postid).slideUp(2000);	
	        },
	        error: function(jqXHR, textStatus, errorThrown) {
	           console.log(textStatus, errorThrown);
	        }
	 });
}


//Frendsuggestion
function userfollow(userid,leaderid,clickid)
{
	/* Add */
	jQuery.ajax({
		type:"post",
		dataType:"json",
		url:siteurl+'dashboard/follower',
		data:{
			'userid':userid,
			'leaderid':leaderid,
			'clickid':clickid
			},		
		success:function(res){
			console.log(res);
			//console.log(res.uid);
			/*if(res == true)
			{
				//window.location.href=siteurl;
				//alert("follows "+res.cid+"");
			} */ 			
		}			
	});
	/*  //Add */
	//console.log("Hello "+ userid);
	jQuery("#"+clickid).slideUp(1000);
}

//Show img function on 

function showimg()
{
	setTimeout(function () {
	var imgurl = jQuery('#from_url').val();
	if(imgurl != '')
	{	
		jQuery('.enter_url').hide();
		jQuery("#preview").attr("src",imgurl);
		jQuery('.del').show();
	}
	}, 1000);
}

function clearall()
{
	jQuery("#newstatustitle").val('');
	jQuery("#newdesc").html('');
	jQuery("#quote").html('');
	jQuery("#photo_up").val('');
	jQuery("#from_url").val('');
	jQuery("#preview").val('');
	
}

