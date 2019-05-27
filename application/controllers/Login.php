<?php  

/**
 * 
 */
class Login extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index(){
		$valid	= $this->form_validation;
		$valid->set_rules('username', 'Username', 'required',
					array('required'	=> '%s harus diisi'));
		$valid->set_rules('password', 'Password', 'required|min_length[6]',
					array('required'	=> '%s harus diisi',
						  'min_length'	=> '%s minimal 6 karakter'));

		if($valid->run()===FALSE){
			$data = array('title' => 'Login Administrator', );
			$this->load->view('admin/login_view', $data, FALSE);
		}else{
		$i 				= $this->input;
		$username 		= $i->post('username');
		$password 		= $i->post('password');
		$check_login	= $this->user_model->login($username, $password);

			if(!empty($check_login)){
				$this->session->set_userdata('id_admin', $check_login->id_admin);
				$this->session->set_userdata('username', $check_login->username);
				$this->session->set_userdata('email', $check_login->email);
				$this->session->set_userdata('level', $check_login->level);
				$this->session->set_userdata('status', $check_login->status);
				redirect(base_url('admin/dashboard'),'refresh');
			}else{
				$this->session->set_flashdata('msg', 'Username atau password tidak cocok');
				redirect(base_url('login'), 'refresh');
			}
		}
	}

	public function logout(){
		$this->session->unset_userdata('id_admin');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		$this->session->unset_userdata('status');
		$this->session->set_flashdata('msg', 'Anda berhasil Logout');
		redirect(base_url('login'),'refresh');
	}
}