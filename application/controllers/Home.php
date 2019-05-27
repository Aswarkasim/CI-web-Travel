<?php 
/**
 * 
 */
class Home extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('master_model');
		$this->load->model('tours_model');
		$this->load->model('banner_model');
		$this->load->model('pesan_model');
	}

	public function index(){
		$slider 		= $this->banner_model->slider();
		$tours 			= $this->tours_model->paketTampilHome();
		$toursPromo		= $this->tours_model->paketTampilPromoHome();

		$data = array('title'   	=> 'Karossa Tour & Travel',
					  'slider'		=> $slider,
					  'tours'		=> $tours,
					  'toursPromo'	=> $toursPromo,
					  'isi'			=> 'frontend/home/list');
		$this->load->view('frontend/layout/wrapper', $data, FALSE);
	}

	public function ketentuan(){
		$ketentuan 		= $this->master_model->listingKetentuan();

		$data = array('title'   	=> 'Karossa Tour & Travel',
					  'ketentuan'	=> $ketentuan,
					  'isi'			=> 'frontend/master/ketentuan');
		$this->load->view('frontend/layout/wrapper', $data, FALSE);
	}

	public function tentang(){
		$tentang 		= $this->master_model->listingtentang();

		$data = array('title'   	=> 'Karossa Tour & Travel',
					  'tentang'		=> $tentang,
					  'isi'			=> 'frontend/master/tentang');
		$this->load->view('frontend/layout/wrapper', $data, FALSE);
	}

	public function hubungi(){

		$valid	= $this->form_validation;

		$valid->set_rules('nama', 'Nama', 'required',
					array('required' => '%s tidak boleh kosong'));
		$valid->set_rules('email', 'Email', 'required',
					array('required' => '%s tidak boleh kosong'));
		$valid->set_rules('nohp', 'No. Telp.', 'required',
					array('required' => '%s tidak boleh kosong'));
		$valid->set_rules('pesan', 'Pesan', 'required',
					array('required' => '%s tidak boleh kosong'));

		if($valid->run()===FALSE){
			$data = array('title'   	=> 'Karossa Tour & Travel',
						  'isi'			=> 'frontend/master/hubungi_kami');
			$this->load->view('frontend/layout/wrapper', $data, FALSE);
		}else{
			$i = $this->input;

			$data = array('nama_pesan' 		=> $i->post('nama'),
						  'email_pesan'		=> $i->post('email'), 
						  'kontak_pesan'	=> $i->post('nohp'), 
						  'isi_pesan'		=> $i->post('pesan'), 
						  'tgl_pesan'		=> date('Y-m-d H:i:s') 
						);
			$this->pesan_model->kirimPesan($data);
			$this->session->set_flashdata('msg', 'Pesan anda telah terkirim');
			redirect(base_url('home/hubungi'), 'refresh');
		}
	}
}