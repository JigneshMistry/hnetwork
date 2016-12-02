<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));
		$this->load->model('comman_model');
		
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
	
		$this->lang->load('auth');
	}
	public function index()
	{
		$data['pageclass'] = 'dashboard';
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}else 
		{	
			
			$userId 	   = $this->ion_auth->get_user_id();
			//total followers 
			$data['total_followers']=$this->comman_model->get_total_followers($userId);
			//total subscribers 
			$data['total_subscriber']=$this->comman_model->get_total_subscriber($userId);
			
			//get followers details
			$data['get_followers'] = $this->comman_model->get_followers_name($userId);
			
			//get user profile picture
			$data['userProfilePicture']=$this->comman_model->getProfilePicture($userId);
			
			//get user profile background
			$data['userProfileBackground']=$this->comman_model->getProfileBackground($userId);
			
			//get user profile slogan
			$data['userProfileSlogan']=$this->comman_model->getProfileSlogan($userId);
			
			//get followers posts
			//$data['get_followers_posts'] = $this->comman_model->getposts($userId);
			$data['user_data'] = $this->comman_model->get_userdata_leftpanel($userId);	
			$data['total_followers']=$this->comman_model->get_total_followers($userId);
			$data['main_content'] = 'welcome_message';
			$data['suggestions'] = $this->loadfriendssuggestion();
			$data['userdata'] = $this->ion_auth->user()->row();
			$this->load->view('page',$data);
		}	
	}
	
	public function getpost()
	{
		$data['postfound'] = 0;
		$data['main_content'] = 'ajaxposts';
		$userId	= $this->ion_auth->get_user_id();
		$data['username']= $this->session->userdata('username');
		$data['userdata'] = $this->ion_auth->user()->row();
		
		//get user profile picture
		$pdata['userProfilePicture']=$this->comman_model->getProfilePicture($userId);
		
		$user_id=$userId.',';
		
		$users_id=$this->comman_model->get_followers($userId);		
			
		/* echo "<pre>";
		print_r($users_id);
		echo "</pre>";  */		
		
		foreach($users_id as $uid)
		{
			$user_id .= $uid['leader'].",";			
		} 
		
		$get_userid=explode(",",$user_id);
		
		/*echo "<pre>";
		print_r($get_userid);
		echo "</pre>";*/
		
		$t=sizeof($get_userid);
		
		//echo "<p style='color:red;'>".$t."</p>";
		
		$html = '';
		if($t > 0)
		{
			for($i=0;$i<$t;$i++)
			{
				$data['postdata'] = $this->comman_model->getposts($get_userid[$i]);
				//get username
				$get_username= $this->comman_model->get_userdata($get_userid[$i]);
				$pdata['get_username'] = $get_username;
				/* echo "<pre>";
				print_r($get_username);
				echo "</pre>"; */
				foreach($data['postdata'] as $post)
				{
					$pdata['postid'] = $post['id'];
					$pdata['post_title'] = $post['post_title'];
					$pdata['post_content'] = $post['post_content'];							
					$pdata['post_type'] = $post['post_type'];
					$pdata['postfound'] = 1;
					$pdata['userdata']	= $this->ion_auth->user()->row();
					$pdata['currentid'] = $userId;
					$pdata['userid']	= $post['userid'];
					$pdata['attachment']	= $post['post_attach'];
					
					/* Add */	
					//get username
					//$get_username= $this->comman_model->getposts($post['userid']);
					/* $get_username= $this->comman_model->get_userdata($get_userid[$i]);
					$pdata['get_username'] = $get_username;  */
					$pdata['post_date'] = $post['post_date'];	
					/* //Add */
					
					$html.=$this->load->view('ajaxposts',$pdata);
				}
			}
		}		
		else
		{
			$pdata['postfound'] = '0';
			$html.=$this->load->view('ajaxposts',$pdata);
		}	
		
		
		return $html;
		
	}
	
	/**
	 * Ajax Post Back For Posts Handle 
	 **/
	public function ajaxpost()
	{
		
		/*
		 * Post Type 1="Text",2="Quote",3="Photo",4="Video",5="Audio" 
		 **/
		$userId 		= $this->ion_auth->get_user_id();
		
		$post_type 		= $_POST['posttype'];
		$post_title 	= $_POST['posttitle'];
		$post_desc  	= $_POST['postdesc'];
		$post_status 	= 1;
		$post_date 		= now();
		$comment_status = 1;
		$share_status 	= 1;
		$like_status 	= 1;
		$post_attach    = "";
		$lastpostid		= '';
		$codep = rand();
		
		if($post_type == 1)
		{
			// Text Post
			$lastpostid = $this->comman_model->insertpost($userId,$post_title,$post_desc,$post_attach,$post_status,$post_date,$post_type,$comment_status,$share_status,$like_status);
				
		
		}else if ($post_type == 2)
		{
					
			// Quote Post
			$lastpostid = $this->comman_model->insertpost($userId,$post_title,$post_desc,$post_attach,$post_status,$post_date,$post_type,$comment_status,$share_status,$like_status);
			
		}else if ($post_type == 3)
		{
			// Photo Post
			if(!empty($_POST['fileurl']))
			{
				$url = $_POST['fileurl'];
				//$img    = 'miki.png';
			//	$file   = file($url);
			//	$result = file_put_contents($img, $file);
				
				$contents=file_get_contents($url);
				$urlarray=explode("/",$url);
				$filename=$urlarray[count($urlarray)-1];
				
				$save_path="./media/wall/".$filename;
				file_put_contents($save_path,$contents);
				if(file_exists($save_path))
				{
					$error = false;
					$post_attach = $filename;
				}else {
					$error = true;
				}	
				
				
				
			}else {
			
				$images_post = $_FILES['photo_up'];
				$post_attach = $_FILES['photo_up']['name'][0];
				$_FILES['userfile']['name']= $_FILES['photo_up']['name'][0];
				$_FILES['userfile']['type']= $_FILES['photo_up']['type'][0];
				$_FILES['userfile']['tmp_name']= $_FILES['photo_up']['tmp_name'][0];
				$_FILES['userfile']['error']= $_FILES['photo_up']['error'][0];
				$_FILES['userfile']['size']= $_FILES['photo_up']['size'][0];
				
				$config['upload_path']          = './media/wall/';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 1000;
				$config['max_width']            = 1024;
				$config['max_height']           = 768;
				
				$this->load->library('upload', $config);
				if ($this->upload->do_upload())
	            {
	            	$error = false;
	            	$data = $this->upload->data();
	            	// to re-size for thumbnail images un-comment and set path here and in json array
	            	$config = array(
	            			'source_image' => $data['full_path'],
	            			'new_image' => './media/thumbs/wall',
	            			'maintain_ration' => true,
	            			'width' => 80,
	            			'height' => 80
	            	);
	            	
	            	$this->load->library('image_lib', $config);
	            	$this->image_lib->resize();
	            	// 	echo "Here";   	
	            }else {
	         	 	//  	echo "done";
	            	$error = true;
	           	}
           	
			}	
           	if($error == false)
           	{
           		// Quote Post
           		$lastpostid = $this->comman_model->insertpost($userId,$post_title,$post_desc,$post_attach,$post_status,$post_date,$post_type,$comment_status,$share_status,$like_status);
           		
           		
           	}	
                	
           	
    	}else if ($post_type == 4)
		{
			// Video Post
			
		}else if ($post_type == 5)
		{
			//Audio Post
			
		}
		if($lastpostid !='')
		{
			$data['postfound'] 		= 1;
			$data['postdata'] 		= $this->comman_model->getpostsbyid($lastpostid);
			$data['username']		= $this->session->userdata('username');
			
			$pdata['post_title'] 	= $data['postdata']['post_title'];
			$pdata['post_content'] 	= $data['postdata']['post_content'];
			$pdata['post_type'] 	= $data['postdata']['post_type'];
			$pdata['postfound'] 	= 1;
			$pdata['username']		= $this->session->userdata('username');
			$pdata['userdata']		= $this->ion_auth->user()->row();
			$pdata['currentid'] 	= $userId;
			$pdata['userid']		= $data['postdata']['userid'];
			$pdata['postid']        = $data['postdata']['id'];
			$pdata['attachment']	= $data['postdata']['post_attach'];
			
			return $this->load->view('ajaxposts',$pdata);
		}	
		
	}
	
	public function ajaxreport()
	{
		$userId 		= $this->ion_auth->get_user_id();
		$post_status 	= 1;
		$post_date 		= now();
		$postid 		= $_POST['postid'];
		
		echo $userId;
		die;
		
		
	}
	
	public function ajaxdelete()
	{
		
		$userId 		= $this->ion_auth->get_user_id();
		$post_status 	= 1;
		$post_date 		= now();
		$postid 		= $_POST['postid'];
		$output = 1;
		if($this->comman_model->deletepost($postid) == false)
		{
			// not deleted
			$output = 1;
		}else
		{
			// deleted
			$output = 0;
		}
		return $output;
	}
	
	public function ajaxdonotshow()
	{
		$userId 		= $this->ion_auth->get_user_id();
		$post_status 	= 1;
		$post_date 		= now();
		$postid 		= $_POST['postid'];
		
		echo $userId;
		die;
		
	}
	
	public function loadfriendssuggestion()
	{
		
		$list = '';
		$userid = $this->ion_auth->get_user_id();
		//Get userlist of current user
		$friendsid = $this->comman_model->getCurrentUserFrist($userid);
		if(count($friendsid)>=1)
		{
			//Found	
			//echo "M here";
			$list = $this->comman_model->getuserslist2($userid);
		}else
		{
			//not Found
			$list = $this->comman_model->getuserslist($userid);
		}	
		return $list;
	}
	
	/* Add */
	public function follower()
	{
		$uid=$this->input->post('userid');
		$lid=$this->input->post('leaderid');
		$cid=$this->input->post('clickid');		
		$get_res = $this->comman_model->get_relation_ack($uid,$lid,$cid);			
		echo json_encode($get_res);		
	}
	
	/*user profile picture */
	/*public function userProfilePicture()
	{
		$userid = $this->ion_auth->get_user_id();
		$user_img['userProfilePicture']=$this->dashboard->getProfilePicture($user_id);
		$this->load->view('leftpanel',$user_img);
	} */
	
	/* search autocomplete */
	public function autocomplete()
	{  
		//$this->output->unset_template();
		$json = array();
			
			if ($this->input->post('filter_name')!==NULL) {
				$filter_name = $this->input->post('filter_name');
			} else {
				$filter_name = '';
			}		
			
			
			/*$filter_data = array(
				'first_name'  => $filter_name,				
				'start'        => 0,
				'limit'        => 5
			);*/
			
			$filter_data=$filter_name;

			$results = $this->comman_model->search($filter_data);
             
			foreach ($results as $result) {
				$json[] = array(
					'user_id'       	=> $result['id'],					
					'first_name'         => $result['first_name'],
					'last_name'          => $result['last_name'],
					'email'             => $result['email'],
					'phone'         => $result['phone']								
				);
			}
		//echo "<pre>";
		//print_r($json);
		//exit;
		
		$sort_order = array();

		foreach ($json as $key => $value) {
			$sort_order[$key] = $value['first_name'];
		}

		array_multisort($sort_order, SORT_ASC, $json);
                
        echo json_encode($json);		
  	}
	/* //search autocomplete */
	/* //Add */
	
}
