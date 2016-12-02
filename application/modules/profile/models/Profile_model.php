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
	
	public function userImageExists($userid)
	{
		$this->db->select('*');
		$this->db->from('users_img');
		$this->db->where("user_id=",$userid);
		$this->db->where("img_location=",1);
		$img_exists=$this->db->get();
		
		return sizeof($img_exists->result_array());
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
	
	public function deleteUserImage($userid)
	{
		/*$this->db->from('users_img');
		$this->db->where("user_id=",$userid);*/
		$ack_del=$this->db->query("delete from users_img where user_id=$userid and img_location=1");
		return $ack_del;		
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
}
?>