<?php if(!defined("BASEPATH")) exit("Hack Attempt");
class Voucher_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function check_voucher($voucher_id){
		$q="select * from user_voucher_tb where voucher_unique_id ='".esc($voucher_id)."' ";
		$query = $this->db->query($q);
		return $query->row_array();
	}

	function voucher_used($voucher_id){
		$q="update user_voucher_tb set is_used = 1 where voucher_unique_id ='".esc($voucher_id)."' ";
		$query = $this->db->query($q);
	}

	function get_detail_voucher()
	{
		$sql = "select a.*, b.name as user_name from user_voucher_tb a join user_tb b on a.user_unique_id = b.unique_id";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

}
?>