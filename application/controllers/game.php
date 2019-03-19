<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Game extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('general_model');
		$this->load->model('user_model');
	}

	function index()
	{
		if($this->session->userdata('user_logged_in'))
		{
			$id = $this->session->userdata('user_id');
			$a = $this->user_model->check_user($id);

			if($a['name'] != '' && $a['email'] != '' && $a['phone'] != ''){

				$interval = $this->user_model->get_interval_playing();

				$today = date('Y-m-d H:i:s');
				$interval_playing = $interval['hours'];
				$last_win = $a['last_win'];
				$next_play =  date('Y-m-d H:i:s', strtotime("$last_win + $interval_playing hours"));

				if($today >= $next_play){
					$this->data['content']='content/game'; 
					$this->load->view('common/body',$this->data);
				}
				else{
					$this->data['next_play']=$next_play;

					$this->data['content']='content/win_game'; 
					$this->load->view('common/body',$this->data);
				}
				
			}

			else{
					redirect('home');
			}
		}
		else{
			redirect('home');
		}
	}

	function share_fb()
	{
		if($this->session->userdata('user_logged_in')){

			$created_date= date("Y-m-d H:i:s");
			$user_id=$this->session->userdata('user_id');

			$table='user_voucher_tb';
			$data=array('created_date'=>$created_date,'user_unique_id'=>$user_id);
			$this->general_model->insert_data($table,$data);
		}
	}

	function user_play()
	{
		$created_date= date("Y-m-d H:i:s");
		$user_id=$this->session->userdata('user_id');

		$table='user_play_tb';
		$data=array('user_id'=>$user_id,'play_date'=>$created_date,'score'=>0);
		$this->general_model->insert_data($table,$data);

		//echo json_encode(array('status'=>1));
		//exit();
	}

	function user_win()
	{
		$voucher_unique_id = random_string('alnum', 16);
		$created_date= date("Y-m-d H:i:s");
		$user_unique_id=$this->session->userdata('user_unique_id');
		$user_id=$this->session->userdata('user_id');

		$table='user_voucher_tb';
		$data=array('created_date'=>$created_date,'user_unique_id'=>$user_unique_id,'voucher_unique_id'=>$voucher_unique_id,'is_used'=>0);
		$this->general_model->insert_data($table,$data);


		$table1='user_tb';
		$data1=array('last_win'=>$created_date);
		$where1=array('id' => $user_id);
		$this->general_model->update_data($table1,$data1,$where1);

		$this->data['voucher_id'] = $voucher_unique_id;

		$user_detail = $this->user_model->check_user($user_id);

		$content = $this->load->view('content/email_template',$this->data,TRUE);

		$ci = get_instance();
		$ci->load->library('email');
	
		$ci->email->from('Sjora');
		$list = $user_detail['email'];
		$ci->email->to($list);
		//$this->email->reply_to('my-email@gmail.com', 'Explendid Videos');
		$ci->email->subject('sjora voucher');
		$ci->email->message($content);
		$ci->email->send();
		//echo json_encode(array('status'=>1));
		//exit();
	}

	// function send_voucher()
	// {
	// 	$content = $this->load->view('content/email_template','',TRUE);

	// 	$ci = get_instance();
	// 	$ci->load->library('email');
	
	// 	$ci->email->from('Sjora');
	// 	$list = 'steven@isysedge.com';
	// 	$ci->email->to($list);
	// 	//$this->email->reply_to('my-email@gmail.com', 'Explendid Videos');
	// 	$ci->email->subject('sjora voucher');
	// 	$ci->email->message($content);
	// 	$ci->email->send();
	// 	//$this->email->clear();

	// 	//redirect('home');
	// 	//echo $this->email->print_debugger();
	// }

}