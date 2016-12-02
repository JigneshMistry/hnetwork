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
			$data['total_followers']=$this->comman_model->get_total_followers($userId);
			$data['total_subscriber']=$this->comman_model->get_total_subscriber($userId);
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
		//$data['userdata'] = $this->ion_auth->user()->row();
					
			
		//$totalcount = $this->comman_model->getotalpostsbyuser($userId);
		
		$html = '';
		
		/* Add */
			$fd = $this->comman_model->get_followers($userId);
			
			foreach($fd as $fid)
			{
				$id=$fid['leader'];
				//echo $id."<br>";
				
				$totalcount = $this->comman_model->getotalpostsbyuser($id);
				
				$pdata['ud'] = $this->comman_model->get_userdata($id);
				
		/* //Add */
		
		if($totalcount > 0)
		{
			
			$data['postdata'] = $this->comman_model->getposts($userId);
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
				$pdata['post_date'] = $post['post_date'];
				//$html.=$this->load->view('ajaxposts',$pdata);
			}			
			
			
			$data['postdata'] = $this->comman_model->getposts($id);
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
				//$pdata['userid']	= $id;				
								
				$html.=$this->load->view('ajaxposts',$pdata);
			}			
			
		}else
		{
			$pdata['postfound'] = '0';
			$html.=$this->load->view('ajaxposts',$pdata);
		}	
		}//end of foreach
		/* write code for followers code */
		
		
		/* $fd['f_id'] = $this->comman_model->get_followers($userId);
		$html.=$this->load->view('ajaxposts',$fd); */
		/* //write code for followers code */
	
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
		echo "<pre>";
		print_r($_POST);
		echo "</pre>";
		die;
		$post_type 		= $_POST['posttype'];
		$post_title 	= $_POST['posttitle'];
		$post_desc  	= $_POST['postdesc'];
		$post_status 	= 1;
		$post_date 		= now();
		$comment_status = 1;
		$share_status 	= 1;
		$like_status 	= 1;
		$post_attach    = "";
		
		
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
			$images_post = $_FILES['images_post'];
			
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
		//echo $friendsid;
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
	
	public function follower()
	{
		$uid=$this->input->post('userid');
		$lid=$this->input->post('leaderid');
		$cid=$this->input->post('clickid');
		//$data_array=array('uid'=>$uid,'lid'=>$lid,'cid'=>$cid);
		$get_res = $this->comman_model->get_relation_ack($uid,$lid,$cid);
		//echo json_encode($data_array);		
		echo json_encode($get_res);		
	}
	
	/* search autocomplete */
/**
	* 
	* @function name : autocomplete()
	* @description   : get list of customer name according to input
	* @param   		 : void
	* @return        : void
	*
	*/
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
}
