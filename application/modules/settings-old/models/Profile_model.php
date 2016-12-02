<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile_model extends CI_Model
{	
	public $tables = array();
	public function __construct()
	{
		parent::__construct();
		$this->load->database();		
	}
	
	public function uploadUserImage($userid,$file_name,$path)
	{
		$data=array(
		'user_id' => $userid,
		'img_name' => $file_name,
		'img_path' => $path,
		'img_location' => 1
		);
		
		$ack=$this->db->insert('users_img',$data);
		return $ack;
	}
	
	public function uploadBackgroundImage($userid,$file_name,$path)
	{
		$data=array(
		'user_id' => $userid,
		'img_name' => $file_name,
		'img_path' => $path,
		'img_location' => 2
		);
		
		$ack=$this->db->insert('users_img',$data);
		return $ack;
	}
	
	public function insertSlogan($userid,$slogan)
	{
		$data=array(
			'user_id' => $userid,
			'slogan' => $slogan
		);
		
		$ack=$this->db->insert('users_slogan',$data);
		return  $ack;
	}
	
	public function userImageExists($userid)
	{
		$this->db->select('*');
		$this->db->from('users_img');
		$this->db->where("user_id=",$userid);
		$this->db->where("img_location=",1);
		$img_exists=$this->db->get();
		
		return sizeof($img_exists->result_array());
	}
	
	public function backgroundImageExists($userid)
	{
		$this->db->select('*');
		$this->db->from('users_img');
		$this->db->where("user_id=",$userid);
		$this->db->where("img_location=",2);
		$img_exists=$this->db->get();
		
		return sizeof($img_exists->result_array());
	}
	
	public function sloganExists($userid)
	{
		$this->db->select('*');
		$this->db->from('users_slogan');
		$this->db->where("user_id=",$userid);			
		$slogan_exists=$this->db->get();
		
		return sizeof($slogan_exists->result_array());
	}
	
	public function userImageName($userid)
	{
		$array = array('user_id' => $userid, 'img_location' => 1);
		$this->db->select('*');
		$this->db->from('users_img');
		$this->db->where($array);
		$img_exists=$this->db->get();
		
		return $img_exists->result_array();
	}
	
	public function backgroundImageName($userid)
	{
		$array = array('user_id' => $userid, 'img_location' => 2);
		$this->db->select('*');
		$this->db->from('users_img');
		$this->db->where($array);
		$img_exists=$this->db->get();
		
		return $img_exists->result_array();
	}
	
	public function deleteUserImage($userid)
	{
		/*$this->db->from('users_img');
		$this->db->where("user_id=",$userid);*/
		$ack_del=$this->db->query("delete from users_img where user_id=$userid and img_location=1");
		return $ack_del;		
	}	
	
	public function deleteBackgroundImage($userid)
	{
		/*$this->db->from('users_img');
		$this->db->where("user_id=",$userid);*/
		$ack_del=$this->db->query("delete from users_img where user_id=$userid and img_location=2");
		return $ack_del;		
	}	
	
	public function updateUserImage($userid,$file_name)
	{
		$ack_update=$this->db->query("update users_img set img_name='$file_name' where user_id=$userid and img_location=1");
		return $ack_update;		
	}	
	
	public function updateUserImageblank($userid)
	{
		$ack_update=$this->db->query("update users_img set img_name='' where user_id=$userid and img_location=1");
		return $ack_update;	
	}
	
	public function updateBackgroundImage($userid,$file_name)
	{
		$ack_update=$this->db->query("update users_img set img_name='$file_name' where user_id=$userid and img_location=2");
		return $ack_update;		
	}	
	
	public function updateBackgroundImageblank($userid)
	{
		$ack_update=$this->db->query("update users_img set img_name='' where user_id=$userid and img_location=2");
		return $ack_update;	
	}
	
	
	public function updateSlogan($userid,$slogan)
	{
		$this->db->set('slogan',$slogan);
		$this->db->where('user_id',$userid);
		$ack=$this->db->update('users_slogan');
		
		return $ack;
	}
}
?>