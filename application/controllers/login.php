<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('general_model');
		$this->load->model('user_model');
	}

	function index()
	{
		$user_id = $this->session->userdata('user_id');
		$check=$this->user_model->check_user($user_id);
		if($this->session->userdata('user_logged_in'))
		{
			if($check['name']==''||$check['email']==''||$check['phone']=='')
			{

				$this->data['content']='content/login'; 
				$this->load->view('common/body',$this->data);

			}
			else{
				redirect('game');
			}
		}
		else{
			redirect('home');
		}
	}

	function do_login()
	{
		$user_id = $this->session->userdata('user_id');
		$name = $this->input->post('nama');
		$email = $this->input->post('email');
		$telp = $this->input->post('telp');

		$table='user_tb';
		$where=array('id'=>$user_id);
		$data=array('name'=>$name,'email'=>$email,'phone'=>$telp);
		$this->general_model->update_data($table,$data,$where);

		redirect('game');

	}

	function fb(){
		$this->load->model('user_model');
		$unique_id = random_string('alnum', 16);
		
		$fbid=$this->input->post('facebook_id');
		$name=$this->input->post('name');
		$token=$this->input->post('token');
		
		$newdate=date("Y-m-d H:i:s");
		$check=$this->user_model->check_fb_id($fbid);
		//$imageURL = "http://graph.facebook.com/".$fbid."/picture?type=large";
		if($check){
			//update data
			$user_id=$check['id'];
			$table='user_tb';
			$where=array('id'=>$user_id);
			$data=array('fb_token'=>$token);
			$this->general_model->update_data($table,$data,$where);
			
			$sess_user = array (
								   'user_logged_in' => true,
								   'user_id' => $check['id'],
								   'user_unique_id' => $check['unique_id'],
								   'name' => $check['name'],
								   'session_login'=>'facebook'
								);
			$this->session->set_userdata($sess_user);

			echo json_encode(array('status'=>1,'message'=>'update'));exit();
		}
		else{
			//insert new user
			$table='user_tb';
			
			$data=array('unique_id'=>$unique_id,'fb_id'=>$fbid,'fb_token'=>$token,'name'=>$name,'created_date'=>$newdate);
			$this->general_model->insert_data($table,$data);
			
			$user_id=mysql_insert_id();
				
			$sess_user = array (
								   'user_logged_in' => true,
								   'user_id' => $user_id,
								   'user_unique_id' => $unique_id,
								   'name' => $name,
								   'session_login'=>'facebook'
								);
			$this->session->set_userdata($sess_user);
		
			echo json_encode(array('status'=>1,'message'=>'insert'));
			exit();
		}
		
		
		echo json_encode(array('status'=>0,'message'=>'error'));exit();
	}

	function check_data(){
    
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $telp = $this->input->post('telp');


        $data=array(
          'email' => $email
        );
        
        $check = $this->general_model->get_detail('user_tb','email',$email);

        if(empty($check['email'])){
            echo 1;
        }else{
            echo 0;
        }
    
    }
}