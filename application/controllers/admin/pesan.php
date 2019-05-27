<?php 
/**
 * 
 */
class Pesan extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pesan_model');
	}

	public function index(){
		$pesan 		  = $this->pesan_model->listing();
		$status_pesan = $this->pesan_model->statusPesan();
		$data = array('title' 		=> 'List Paket () data' ,
					  'pesan'		=> $pesan,
					  'isi'			=> 'admin/pesan/list'
		);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
}