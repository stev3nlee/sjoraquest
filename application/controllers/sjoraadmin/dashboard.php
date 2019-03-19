<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dashboard extends CI_Controller {

    public function __construct()
    {
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
    public function index()
    {
        $this->data['content'] = 'admin/home';
        $this->load->view('common/admin/body', $this->data);
    }
    public function logout()
    {
        $this->session->unset_userdata('admin_logged_in');
        redirect(base_url('sjoraadmin/login'));
    }

    function setting()
    {
        $this->data['setting'] = $this->user_model->get_setting();
        $this->data['content'] = 'admin/setting';
        $this->load->view('common/admin/body', $this->data);
    }

    function save_setting()
    {
        $hours = $this->input->post('hours');

        $this->user_model->save_setting($hours);
        redirect('sjoraadmin/dashboard/setting');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */