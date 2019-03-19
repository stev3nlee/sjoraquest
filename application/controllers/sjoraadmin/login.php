<?php if(!defined("BASEPATH")) exit("Hack Attempt");
class Login extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('admin_logged_in')==true) redirect('sjoraadmin/home');
        $this->load->model('user_model');
    }

    function index(){
        $this->data['content'] = 'admin/login';
        $this->load->view('common/admin/body', $this->data);
    }

    function do_login(){
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        if(!$username || !$password){
            $this->session->set_flashdata('notif','Invalid Username or Password');
            redirect('sjoraadmin/login');
        }
        else{
            $login = $this->user_model->login_admin($username, $password);
            if ($login != NULL) {
                $sess_admin = array (
                    'admin_logged_in' => true,
                    'admin_id' => $login['id'],
                    'admin_username' => $login['username']
                );
                $this->session->set_userdata($sess_admin);
                redirect ('sjoraadmin/home');
            }
            else {
                $this->session->set_flashdata('notif','Invalid Username or Password');
                redirect('sjoraadmin/login');
            }
        }
    }

}?>