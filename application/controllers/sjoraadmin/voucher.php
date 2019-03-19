<?php if(!defined("BASEPATH")) exit("Hack Attempt");
class Voucher extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('voucher_model');

        if($this->session->userdata('admin_logged_in'))
        {

        }
        else
        {
            redirect(base_url('sjoraadmin/login'));
        }
    }

    function index(){

    	$this->data['detail'] = $this->voucher_model->get_detail_voucher();
        $this->data['content'] = 'admin/voucher_list';
        $this->load->view('common/admin/body', $this->data);
    }
}