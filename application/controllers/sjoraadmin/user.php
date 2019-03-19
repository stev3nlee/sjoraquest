<?php if(!defined("BASEPATH")) exit("Hack Attempt");
class User extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('user_model');

        if($this->session->userdata('admin_logged_in'))
        {

        }
        else
        {
            redirect(base_url('sjoraadmin/login'));
        }
    }

    function index(){

    	$this->data['detail'] = $this->user_model->get_detail_user();
        $this->data['content'] = 'admin/user_list';
        $this->load->view('common/admin/body', $this->data);
    }
}