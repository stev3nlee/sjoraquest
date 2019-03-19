<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('user_model');
	
	}
	
	function index(){
		$this->data['content']='content/home'; 
		$this->load->view('common/body',$this->data);
	}

	function share()
	{
		if($this->session->userdata('user_logged_in')){
			
			$id = $this->session->userdata('user_id');
			$a = $this->user_model->check_user($id);
			$interval = $this->user_model->get_interval_playing();

			$today = date('Y-m-d H:i:s');
			$interval_playing = $interval['hours'];
			$last_win = $a['last_win'];
			$next_play =  date('Y-m-d H:i:s', strtotime("$last_win + $interval_playing hours"));

			$this->data['next_play'] = $next_play;

			$this->data['content']='content/share_success'; 
			$this->load->view('common/body',$this->data);
		}

		else{
			redirect('home');
		}
	}

}