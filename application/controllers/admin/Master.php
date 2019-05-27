<?php 

/**
 * 
 */
class Master extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('master_model');
	}

	public function keterangan(){
		$keterangan 	= $this->master_model->listingKeterangan();
		$data = array('title' 		=> 'Keterangan',
					  'keterangan'	=> $keterangan,
					  'isi'			=> 'admin/keterangan/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function keteranganEdit(){
		$keterangan 	= $this->master_model->listingKeterangan();

		$valid = $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|min_length[100]', 
									 array('required'	 => '%s tidak boleh kosong',
											'min_length' => '%s minimal 100 karakter'));

		if($valid->run()===FALSE){
			$data = array('title' 		=> 'Keterangan',
						  'keterangan'	=> $keterangan,
						  'isi'			=> 'admin/keterangan/edit');
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		}else{
			$data = array('ket' => $this->input->post('keterangan'));
			$this->master_model->keteranganEdit($data);
			$this->session->set_flashdata('msg', ' Keterangan Telah diedit');
			redirect(base_url('admin/master/keterangan'),'refresh');
		}
	}

	public function ketentuan(){
		$ketentuan 	= $this->master_model->listingKetentuan();
		$data = array('title' 		=> 'Ketentuan',
					  'ketentuan'	=> $ketentuan,
					  'isi'			=> 'admin/ketentuan/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function ketentuanEdit(){
		$ketentuan 	= $this->master_model->listingKetentuan();

		$valid = $this->form_validation->set_rules('ketentuan', 'Ketentuan', 'required|min_length[100]', 
									 array('required'	 => '%s tidak boleh kosong',
											'min_length' => '%s minimal 100 karakter'));

		if($valid->run()===FALSE){
			$data = array('title' 		=> 'Ketentuan',
						  'ketentuan'	=> $ketentuan,
						  'isi'			=> 'admin/ketentuan/edit');
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		}else{
			$data = array('ketentuan' => $this->input->post('ketentuan'));
			$this->master_model->ketentuanEdit($data);
			$this->session->set_flashdata('msg', ' Ketentuan Telah diedit');
			redirect(base_url('admin/master/ketentuan'),'refresh');
		}
	}


	public function tentang(){
		$tentang 	= $this->master_model->listingTentang();
		$data = array('title' 		=> 'Tentang',
					  'tentang'	=> $tentang,
					  'isi'			=> 'admin/tentang/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function tentangEdit(){
		$tentang 	= $this->master_model->listingTentang();

		$valid = $this->form_validation->set_rules('tentang', 'Tentang', 'required|min_length[100]', 
									 array('required'	 => '%s tidak boleh kosong',
											'min_length' => '%s minimal 100 karakter'));

		if($valid->run()===FALSE){
			$data = array('title' 		=> 'Tentang',
						  'tentang'	=> $tentang,
						  'isi'			=> 'admin/tentang/edit');
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		}else{
			$data = array('tentang' => $this->input->post('tentang'));
			$this->master_model->tentangEdit($data);
			$this->session->set_flashdata('msg', ' Tentang Telah diedit');
			redirect(base_url('admin/master/tentang'),'refresh');
		}
	}

}