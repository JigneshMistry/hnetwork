<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Model
{
	
	public $tables = array();
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('cookie');
		$this->load->helper('date');
		
		// initialize db tables data
		$this->tables  = $this->config->item('tables', 'posts');
		
	}
	//
	
	public function insertpost($userId,$post_title,$post_desc,$post_attach,$post_status,$post_date,$post_date, $post_type,$comment_status,$share_status,$like_status)
	{
		
		echo "M here";
		die;
		// Users table.
		$postdata = array(
				'userid'   		=> $identity,
				'post_title'   	=> $password,
				'post_content'  => $email,
				'post_attach' 	=> $ip_address,
				'post_type' 	=> '',
				'post_date' 	=> time(),
				'post_status'	=> '',
				'comment_status'=> '',
				'share_status'	=>'',
				'like_status' 	=> ''
		);
		$this->db->insert($this->tables['posts'], $postdata);
		
	}
	
	public function insert_relations()
	{
		
	}

}
?>