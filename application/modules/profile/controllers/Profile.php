<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

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
		$data['pageclass'] = 'profile';
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}else 
		{	
			$username= $this->session->userdata('username');
			$userid= $this->session->userdata('user_id');
			
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
							$ack_del=$this->profile->deleteUserImage($userid);
							
						}				
					}					  
				}
			
		
				$errors= array();
				$file_name = $_FILES['userfile']['name'];
				$file_size =$_FILES['userfile']['size'];
				$file_tmp =$_FILES['userfile']['tmp_name'];
				$file_type=$_FILES['userfile']['type'];			  
				$file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
				$expensions= array("jpeg","jpg","png");

				if(in_array($file_ext,$expensions)=== false){
					$errors['extention']="extension not allowed, please choose a JPEG or PNG file.";
				} 

				if($file_size > 2097152){
				 	$errors['file_size']='File size must be excately 2 MB';
				}

				if(file_exists('media/profile/users/' . $file_name))
				{
					$errors['file_exists']='File Already Exists';
				}

				if(empty($errors)==true)
				{
					
					$ack=move_uploaded_file($file_tmp,"media/profile/users/".$file_name);
					
					if($ack == 1)
					{
						/*$username= $this->session->userdata('username');
						$userid= $this->session->userdata('user_id');*/
						$path="media/profile/users";
						
						$db_ack=$this->profile->uploadUserImage($userid,$file_name,$path);
						if($db_ack == 1)
						{						
							$this->session->set_flashdata('success', "Your Profile Picture Uploaded Successfully");
							//$data['success']="Your Profile Picture Uploaded Successfully"; 
							//$data['errors']=array();						
							//$this->index();
							redirect('profile');
						}
						else 
						{
							$this->session->set_flashdata('errors', 'Image detail not inserted');
							redirect('profile');
						}
					}
					else 
					{
						$this->session->set_flashdata('errors', 'Image not uploaded');
						redirect('profile');
					}
				}
				else
				{
					//print_r($errors);
					//$data['errors']=$errors;
					$this->session->set_flashdata('errors', $errors);
					redirect('profile');					
				}
				
		    }
			
			/* $data['errors']=array();
			if(isset($_FILES['userfile'])){
				$this->do_upload();
			}*/
			
			$data['main_content'] = 'profile';	
			$data['userdata'] = $this->ion_auth->user()->row();
			$this->load->view('page',$data);
		}	
	}	
	
	public function do_upload()
	{		
		$data['errors']=array();
		if(isset($_FILES['userfile']))
		{
			$errors= array();
			$file_name = $_FILES['userfile']['name'];
			$file_size =$_FILES['userfile']['size'];
			$file_tmp =$_FILES['userfile']['tmp_name'];
			$file_type=$_FILES['userfile']['type'];			  
			$file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
			$expensions= array("jpeg","jpg","png");

			if(in_array($file_ext,$expensions)=== false){
			 $errors['extention']="extension not allowed, please choose a JPEG or PNG file.";
			} 

			if($file_size > 2097152){
			 $errors['file_size']='File size must be excately 2 MB';
			}

			if(file_exists('media/profile/users/' . $file_name))
			{
			$errors['file_exists']='File Already Exists';
			}

			if(empty($errors)==true){
				$ack=move_uploaded_file($file_tmp,"media/profile/users/".$file_name);
				
				if($ack == 1)
				{
					$username= $this->session->userdata('username');
					$userid= $this->session->userdata('user_id');
					$path="media/profile/users";
					
					$db_ack=$this->profile->uploadUserImage($userid,$file_name,$path);
					if($db_ack == 1)
					{						
						$this->session->set_flashdata('success', "Your Profile Picture Uploaded Successfully");
						//$data['success']="Your Profile Picture Uploaded Successfully"; 
						//$data['errors']=array();						
						//$this->index();
						redirect('profile');
					}
					else 
					{
						$this->session->set_flashdata('errors', 'Image detail not inserted');
						redirect('profile');
					}
				}
				else 
				{
					//$data['errors']=array();
					
				}
			}
			else
			{
				//print_r($errors);
				//$data['errors']=$errors;
				$this->session->set_flashdata('errors', $errors);
				redirect('profile');					
			}
	    }
	}
		
	public function profileBackgroundPicture()
	{			
		$data['pageclass'] = 'profile';
		$data['main_content'] = 'setting_dashboard';	
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
}
