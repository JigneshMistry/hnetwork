<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comman_model extends CI_Model
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
	
	public function insertpost($userId,$post_title,$post_desc,$post_attach,$post_status,$post_date,$post_type,$comment_status,$share_status,$like_status)
	{
		
		// Post table.
		$postdata = array(
				'userid'   		=> $userId,
				'post_title'   	=> $post_title,
				'post_content'  => $post_desc,
				'post_attach' 	=> $post_attach,
				'post_type' 	=> $post_type,
				'post_date' 	=> date('Y-m-d H:i:s'),
				'post_status'	=> $post_status,
				'comment_status'=> $comment_status,
				'share_status'	=> $share_status,
				'like_status' 	=> $like_status
		);
		$this->db->insert('posts', $postdata);
		$insert_id = $this->db->insert_id();

   		return  $insert_id;
	}
	
	public function getpostsbyid($id)
	{
		
		$query = $this->db->select('*')
		->where('id', $id)
		->limit(1)
		->order_by('id', 'desc')
		->get('posts');
		
		return $query->row_array();
	}
	
	public function getposts($userid)
	{
		
		$query = $this->db->select('*')
		->where('userid', $userid)
		->limit(0,3)
		->order_by('id', 'desc')
		->get('posts');
		
		return $query->result_array();
	}
	
	public function getotalpostsbyuser($userid)
	{
		$query = $this->db->select('*')
		->where('userid', $userid)
		->limit(0,3)
		->order_by('id', 'desc')
		->get('posts');
		
		return $query->num_rows();
		
	}
	
	public function hidepost()
	{
		
	}
	public function reportpost()
	{
		
	}
	public function deletepost($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('posts');
		if ( $this->db->affected_rows() == '1' ) {return TRUE;}
		else {return FALSE;}
		
	}
	
	public function getCurrentUserFrist($userid)
	{
		$query = $this->db->select('leader')
		->where('subscriber',$userid)
		->get('relations');
		return $query->result_array();
	}
	
	/*public function getuserslist($userid)
	{
		$query = $this->db->select('*')
		->where('id !=',$userid)
		->limit(0,10)
		->order_by('id', 'desc')
		->get('users');
		return $query->result_array();
		
	}*/
	
	/* Add */
	public function getuserslist($userid)
	{
		/*$query = $this->db->select('*')
		->where('id !=',$userid)
		->limit(0,10)
		->order_by('id', 'desc')
		->get('users');
		return $query->result_array();*/ 
		
		//$query = $this->db->query("select r.*,u.* from relations r right join users u on r.leader = u.id where r.leader is NULL");
		
		$this->db->select('*');
		$this->db->from('relations');
		$this->db->join('users', 'relations.leader = users.id','right');
		$this->db->where('relations.leader is NULL');
		$this->db->limit(0,10);
		$query = $this->db->get();
		
		return $query->result();
		
	}
	
	public function getuserslist2($userid)
	{
		//$query = $this->db->query("select r.*,u.* from relations r right join users u on r.leader = u.id where r.leader is NULL");
		//$where="r.leader is NULL";
		
		$this->db->select('*');
		$this->db->from('relations');
		$this->db->join('users', 'relations.leader = users.id','right');
		$this->db->where('relations.leader is NULL');
		$this->db->limit(0,10);
		$query = $this->db->get();
		
		/*$query = $this->db->select('*')
		->where('id !=',$userid)
		->limit(0,10)
		->order_by('id', 'desc')
		->get('users');*/
		//return $query->result_array();		
		return $query->result();		
	}
	
	public function get_relation_ack($uid,$lid,$cid)
	{
		$data_array=array('subscriber'=>$uid,'leader'=>$lid);
		$q=$this->db->insert('relations',$data_array);
		return $q;
	}
	
	public function get_username($uid)
	{	
		$this->db->select('username');
		$this->db->from('users');		
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function get_followers($uid)
	{
		$this->db->select('leader');
		$this->db->from('relations');
		$this->db->where('subscriber',$uid);
		$lids=$this->db->get();
		
		return $lids->result_array();
		//return $uid;
	}
	
	public function get_userdata($uid)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('id',$uid);
		$userdata=$this->db->get();
		
		return $userdata->result_array();
	}
	
	public function get_userdata_leftpanel($uid)
	{
		$this->db->select('*');
		$this->db->from('users_img');
		$this->db->join('users','users_img.user_id = users.id','inner');
		$this->db->where('users.id',$uid);
		$userdata=$this->db->get();
		
		return $userdata->result_array();
	}
	
	public function get_total_followers($uid)
	{
		$this->db->select('leader');
		$this->db->from('relations');
		$this->db->where('subscriber',$uid);
		$lids=$this->db->get();
		$rowcount = $lids->num_rows();
		return $rowcount;
		
	}
	
	//left panel get follower name
	public function get_followers_name($uid)
	{
		//$query = $this->db->query("select r.*,u.* from relations r right join users u on r.leader = u.id where r.leader is not null");
		
		$this->db->select('*');
		$this->db->from('relations');
		$this->db->join('users', 'relations.leader = users.id','right');
		$this->db->where('relations.leader is NOT NULL');
		$this->db->limit(0,10);
		$query = $this->db->get();
		
		return $query->result_array();		
	}
	
	//post get by userid to display leftside followers collspane accordion
	public function getpostsbyuserid($userid)
	{
		$query = $this->db->select('*')
		->where('userid', $userid)
		->limit(1)
		->order_by('id', 'desc')
		->get('posts');
		
		return $query->row_array();
	}
	
	//post get by userid to display total post leftside followers collspane accordion
	public function getTotalPostsByUserid($userid)
	{		
		$query = $this->db->select('*')
		->where('userid', $userid)			
		->get('posts');
		
		return $query->num_rows();
	}
	
	/* get user profile details */
	public function getProfile($user_id)
	{
		//SELECT ui.*,us.* FROM `users_img` ui join users_slogan us on ui.user_id=us.user_id WHERE us.user_id=2 or ui.user_id=2
				
		$this->db->select('ui.*,us.*');
		$this->db->from('users_img ui');
		$this->db->join('users_slogan us','ui.user_id=us.user_id');
		$this->db->where("us.user_id=$user_id or ui.user_id=$user_id");
		$query=$this->db->get();
		
		return $query->result_array();		
	}
	
	/* get user profile slogan */
	public function getProfileSlogan($user_id)
	{
		$this->db->select('*');
		$this->db->from('users_slogan');
		$this->db->where('user_id=',$user_id);		
		$query=$this->db->get();
		
		return $query->result_array();
	}
	
	/* get user profile picture */
	public function getProfilePicture($user_id)
	{
		$condition="user_id=$user_id and img_location=1";
		$this->db->select('*');
		$this->db->from('users_img');
		$this->db->where($condition);
		$query=$this->db->get();
		 
		return $query->result_array();
	}
	
	/* get user profile background picture */
	public function getProfileBackground($user_id)
	{
		$condition="user_id=$user_id and img_location=2";
		$this->db->select('*');
		$this->db->from('users_img');
		$this->db->where($condition);
		$query=$this->db->get();
		 
		return $query->result_array();
	}
	
	
	public function get_total_subscriber($uid)
	{
		$this->db->select('leader');
		$this->db->from('relations');
		$this->db->where('leader',$uid);
		$lids=$this->db->get();
		$rowcount = $lids->num_rows();
		return $rowcount;		
	}
	
	public function search($keyword)
	{			
		$query=$this->db->query("SELECT *  FROM `users` WHERE `active` = 1 AND `first_name` LIKE '%".$keyword['term']."%'");
		return $query->result_array();
	} 
	/* //Add */
	
}
?>