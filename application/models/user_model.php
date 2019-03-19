<?php if(!defined("BASEPATH")) exit("Hack Attempt");
class User_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function check_fb_id($fbid){
		$q="select * from user_tb where fb_id='".esc($fbid)."' ";
		$query = $this->db->query($q);
		return $query->row_array();
	}

	function check_user($id){
		$q="select * from user_tb where id='".esc($id)."' ";
		$query = $this->db->query($q);
		return $query->row_array();
	}

	function get_interval_playing(){
		$q="select * from setting_tb";
		$query = $this->db->query($q);
		return $query->row_array();
	}

	function login_admin($username, $password){
		$sql = "select * from admin_tb where username = '".$username."' and password = '".$password."'";
		$query = $this->db->query($sql);
		return $query->row_array();
	}

	function get_detail_user()
	{
		$sql = "select * from user_tb";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	function get_setting()
	{
		$sql = "select * from setting_tb";
		$query = $this->db->query($sql);
		return $query->row_array();
	}

	function save_setting($hours)
	{
		$sql = "update setting_tb set hours = '".esc($hours)."' ";
		$query = $this->db->query($sql);
	}

}