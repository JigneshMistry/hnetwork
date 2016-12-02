<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth','form_validation','upload','session'));
		$this->load->helper(array('url','language'));
		$this->load->model('comman_model');
	
		$this->load->model('profile_model','profile');
		
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
	
		$this->lang->load('auth');
	}
	
	public function index()
	{
		$data['pageclass'] = 'settings';
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}else 
		{	
			$userid= $this->session->userdata('user_id');
			$data['account_data']=$this->profile->getUserData($userid);
			$data['user_additional_data']=$this->profile->getUserAdditionalData($userid);
			$data['text1']="<h1 style='color:red;'>This is account part.</h1>";
			$data['main_content'] = 'settings';	
			$data['userdata'] = $this->ion_auth->user()->row();
			$this->load->view('page',$data);
		}	
	}	
		
	public function dashboard()
	{			
		$data['pageclass'] = 'settings';
		$data['main_content'] = 'settings';	
		$this->load->view('page',$data);
		
		/* $data['pageclass'] = 'settings';
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}else 
		{				
			$data['main_content'] = 'setting_dashboard';	
			$data['userdata'] = $this->ion_auth->user()->row();
			$this->load->view('page',$data);
		}  */
	}
	
	/*
	 * set user profile picture
	 */
	public function profile()
	{
		$username= $this->session->userdata('username');
		$userid= $this->session->userdata('user_id');
		$ack_update=0;
		$data['errors']=array();
		if(isset($_FILES['userfile']))
		{						
			$user_img_set=$this->profile->userImageExists($userid);
			if($user_img_set > 0)
			{
				$user_img_name=$this->profile->userImageName($userid);					
				foreach($user_img_name as $uin)
				{
					$user_img=$uin['img_name'];
				}
				
				if(file_exists('media/profile/users/' . $user_img))
				{
					if(unlink('media/profile/users/'.$user_img))
					{
						//$ack_del=$this->profile->deleteUserImage($userid);
						$ack_update=$this->profile->updateUserImageblank($userid);
					}				
				}					  
			}
			
			$errors_profile= array();
			$file_name = $_FILES['userfile']['name'];
			$file_size =$_FILES['userfile']['size'];
			$file_tmp =$_FILES['userfile']['tmp_name'];
			$file_type=$_FILES['userfile']['type'];			  
			$file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
			$expensions= array("jpeg","jpg","png");

			if(in_array($file_ext,$expensions)=== false){
				$errors_profile['extention']="extension not allowed, please choose a JPEG or PNG file.";
			} 

			if($file_size > 2097152){
			 	$errors_profile['file_size']='File size must be excately 2 MB';
			}

			if(file_exists('media/profile/users/' . $file_name))
			{
				$errors_profile['file_exists']='File Already Exists';
			}

			if(empty($errors_profile)==true)
			{
				
				$ack=move_uploaded_file($file_tmp,"media/profile/users/".$file_name);
				
				if($ack == 1)
				{
					/*$username= $this->session->userdata('username');
					$userid= $this->session->userdata('user_id');*/
					$path="media/profile/users";
					
					if($ack_update > 0)
					{
						$db_ack=$this->profile->updateUserImage($userid,$file_name);
					}
					else 
					{
						$db_ack=$this->profile->uploadUserImage($userid,$file_name,$path);
					
					}
					//$db_ack=$this->profile->uploadUserImage($userid,$file_name,$path);
					//$db_ack=$this->profile->updateUserImage($userid);
					if($db_ack == 1)
					{						
						$this->session->set_flashdata('success_profile', "Your Profile Picture Uploaded Successfully");
						//$data['success']="Your Profile Picture Uploaded Successfully"; 
						//$data['errors']=array();						
						//$this->index();
						redirect('settings/profile');
					}
					else 
					{
						$this->session->set_flashdata('errors_profile', 'Image detail not inserted');
						redirect('settings/profile');
					}
				}
				else 
				{
					$this->session->set_flashdata('errors_profile', 'Image not uploaded');
					redirect('settings/profile');
				}
			}
			else
			{
				//print_r($errors);
				//$data['errors']=$errors;
				$this->session->set_flashdata('errors_profile', $errors_profile);
				redirect('settings/profile');					
			}
			
	    }
		    
		$data['pageclass'] = 'settings';
		$data['main_content'] = 'settings';	
		$this->load->view('page',$data);
	}
		
	/*
	 * set user profile background picture
	 */
	public function background()
	{
		if(isset($_POST['upload_pb']))	
		{	
			$username= $this->session->userdata('username');
			$userid= $this->session->userdata('user_id');
			$ack_update=0;
			$data['errors']=array();
			if(isset($_FILES['profilebackground']))
			{						
				$user_img_set=$this->profile->backgroundImageExists($userid);
				if($user_img_set > 0)
				{
					$background_img_name=$this->profile->backgroundImageName($userid);					
					foreach($background_img_name as $uin)
					{
						$user_img=$uin['img_name'];
					}
					
					if(file_exists('media/profile/profile_background/' . $user_img))
					{
						if(unlink('media/profile/profile_background/'.$user_img))
						{
							//$ack_del=$this->profile->deleteBackgroundImage($userid);
							$ack_update=$this->profile->updateBackgroundImageblank($userid);
						}				
					}					  
				}
			
		
				$errors_background= array();
				$file_name = $_FILES['profilebackground']['name'];
				$file_size =$_FILES['profilebackground']['size'];
				$file_tmp =$_FILES['profilebackground']['tmp_name'];
				$file_type=$_FILES['profilebackground']['type'];			  
				$file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
				$expensions= array("jpeg","jpg","png");
	
				if(in_array($file_ext,$expensions)=== false){
					$errors_background['extention']="extension not allowed, please choose a JPEG or PNG file.";
				} 
	
				if($file_size > 2097152){
				 	$errors_background['file_size']='File size must be excately 2 MB';
				}
	
				if(file_exists('media/profile/profile_background/' . $file_name))
				{
					$errors_background['file_exists']='File Already Exists';
				}
	
				if(empty($errors_background)==true)
				{
					
					$ack=move_uploaded_file($file_tmp,"media/profile/profile_background/".$file_name);
										
					if($ack == 1)
					{
						/*$username= $this->session->userdata('username');
						$userid= $this->session->userdata('user_id');*/
						$path="media/profile/profile_background";
						
						if($ack_update > 0)
						{
							$db_ack=$this->profile->updateBackgroundImage($userid,$file_name);
						}
						else 
						{
							$db_ack=$this->profile->uploadBackgroundImage($userid,$file_name,$path);
						
						}
					
						//$db_ack=$this->profile->uploadBackgroundImage($userid,$file_name,$path);
						if($db_ack == 1)
						{						
							$this->session->set_flashdata('success_background', "Your Profile Picture Uploaded Successfully");
							//$data['success']="Your Profile Picture Uploaded Successfully"; 
							//$data['errors']=array();						
							//$this->index();
							redirect('settings/profile');
						}
						else 
						{
							$this->session->set_flashdata('errors_background', 'Image detail not inserted');
							redirect('settings/profile');
						}
					}
					else 
					{
						$this->session->set_flashdata('errors_background', 'Image not uploaded');
						redirect('settings/profile');
					}
				}
				else
				{
					//print_r($errors);
					//$data['errors']=$errors;
					$this->session->set_flashdata('errors_background', $errors_background);
					redirect('settings/profile');					
				}			
		    }
		}
		
		$data['pageclass'] = 'settings';
		$data['main_content'] = 'profile';	
		$this->load->view('page',$data);
	}
	
	//insert or edit slogan
	public function slogan()
	{
		if(isset($_POST['save']))
		{		
			$get_slogan=$this->input->post('slogan');	
			if(!empty($get_slogan))
			{
				$slogan=$get_slogan;
			}
			else 
			{
				$slogan="Hey! Friends";
			}
			
			$userid= $this->session->userdata('user_id');
			$sloganExists=$this->profile->sloganExists($userid);
			if($sloganExists > 0)
			{
				$slogan_ack=$this->profile->updateSlogan($userid,$slogan);
				//redirect('settings/profile');
			}
			else 
			{
				$slogan_ack=$this->profile->insertSlogan($userid,$slogan);
				//redirect('settings/profile');
			}	
			
			if($slogan_ack == 1)
			{
				$this->session->set_flashdata('success_slogan', "Your Slogan Set Successfully");
				redirect('settings/profile');
			}
		}
		
		$data['pageclass'] = 'settings';
		$data['main_content'] = 'settings';	
		$this->load->view('page',$data);
	}
	
	
	//insert or edit user account and user additional account details
	public function editAccountData()
	{
		$userid     =   $this->session->userdata('user_id');
		//echo $userid;
		$first_name	=	$this->input->post('first_name');
		$last_name	=	$this->input->post('last_name');
		$phone		=	$this->input->post('phone');
		$address	=	$this->input->post('address');
		$state		=	$this->input->post('state');
		$country	=	$this->input->post('country');
		$pincode	=	$this->input->post('pincode');
		/*$dob1		=	$this->input->post('dob');
		$date		=	new DateTime($dob1);
		$dob 		= 	$date->format('d-m-Y');*/
		//date("Y-m-d",strtotime($time));
		//$dob        =   date("d/m/Y", strtotime($dob1));
				
		$str		=	$this->input->post('dob');
		$cs			=	str_replace('/','-',$str);
		$timestamp  =	strtotime($cs);	
		$dob		=	date('Y-m-d',$timestamp);
		
		$data_users=array(
			'first_name'	=>	$first_name,
			'last_name'		=>	$last_name,
			'phone'			=>	$phone			
		);
		
		$data=array(
			'address'		=>	$address,
			'state'			=>	$state,
			'country'		=>	$country,
			'pincode'		=>	$pincode,
			'dob'			=>	$dob
		);
		
		$ack=0;
		$this->db->where('id',$userid);
		$ack_insert_users=$this->db->update('users',$data_users);
		
		$this->db->where('user_id',$userid);
		$ack_insert_data=$this->db->update('users_additional_data',$data);
		
		if($ack_insert_users == true)
		{
			$ack=1;
		}
		else if($ack_insert_data == true)
		{
			$ack=1;
		}
		//return $data;
		echo json_encode($ack);
		
	}
}
