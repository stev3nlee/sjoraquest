<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Voucher extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('general_model');
		$this->load->model('voucher_model');
	}

	function index($voucher_id)
	{
		if($voucher_id != ''){

			$this->data['voucher_id'] = $voucher_id;
			$this->data['content']='content/voucher_use'; 
			$this->load->view('common/body',$this->data);

		}
		else{
			redirect('home');
		}
	}

	function voucher_use($voucher_id)
	{
		$user_unique_id = $this->session->userdata('user_unique_id');
		$check = $this->voucher_model->check_voucher($voucher_id);
		if($voucher_id != ''){

			if($check['is_used'] == 0){

				$this->voucher_model->voucher_used($voucher_id);

				$this->data['content']='content/voucher_success'; 
				$this->load->view('common/body',$this->data);
			}
			else{
				$this->data['content']='content/voucher_expired'; 
				$this->load->view('common/body',$this->data);
			}
			
		}
		else{
			redirect('home');
		}
	}

}
?>