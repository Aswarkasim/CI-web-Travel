<?php 
/**
 * 
 */
class Dashboard extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pesan_model');
		$this->load->model('tours_model');
	}

	public function index(){
		$pesan 			= $this->pesan_model->listing();
		$admin 			= $this->user_model->listing();
		$tours 			= $this->tours_model->listing();
		$hitung_pesan	= count($pesan);
		$hitung_tours	= count($tours);
		$hitung_admin	= count($admin);
		$data = array('title'		 		=> 'Karossa Travel Dashboard',
					  'page_header'			=> 'Dashboard',
					  'hitung_pesan'		=> $hitung_pesan,
					  'hitung_tours'		=> $hitung_tours,
					  'hitung_admin'		=> $hitung_admin,
					  'isi'					=> 'admin/dashboard/list'
		 );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}


}