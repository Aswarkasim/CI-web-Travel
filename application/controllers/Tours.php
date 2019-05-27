<?php 
/**
 * 
 */
class Tours extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('tours_model');
		$this->load->model('kategori_model');
	}

	public function index(){
		$tours 			= $this->tours_model->paketTampil();
		$kategori 		= $this->kategori_model->listing();
		$toursPromo 	= $this->tours_model->paketTampilPromoHome();
		$data = array('title'   	=> 'Karossa Tour & Travel',
					  'tours'		=> $tours,
					  'kategori'	=> $kategori,
					  'toursPromo'	=> $toursPromo,
					  'isi'			=> 'frontend/tours/list');
		$this->load->view('frontend/layout/wrapper', $data, FALSE);
	}

	public function promo(){
		$kategori 		= $this->kategori_model->listing();
		$toursPromo 	= $this->tours_model->paketTampilPromoHome();
		$promo 	= $this->tours_model->paketTampilPromo();
		$data = array('title'   	=> 'Karossa Tour & Travel',
					  'promo'		=> $promo,
					  'kategori'	=> $kategori,
					  'toursPromo'	=> $toursPromo,
					  'isi'			=> 'frontend/tours/list_promo');
		$this->load->view('frontend/layout/wrapper', $data, FALSE);
	}

	public function baca($slug){
		$kategori 		= $this->kategori_model->listing();
		$tours 			= $this->tours_model->baca($slug);
		$data 			= array('title'   	=> 'Karossa Tour & Travel',
					 		 'tours'		=> $tours,
					  		 'kategori'	=> $kategori,
					 		 'isi'			=> 'frontend/tours/detail');
		$this->load->view('frontend/layout/wrapper', $data, FALSE);
	}
}