<?php

/**
 * 
 */
class Kategori extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('kategori_model');
	}

	public function index(){
		$kategori = $this->kategori_model->listing();

		$valid = $this->form_validation->set_rules('kategori', 'Kategori', 'required', array('required' => '%s nama ktegori harus diisii'));

		if($valid->run()===FALSE){
			$data = array('title' 		=> 'Karossa Travel Dashboard',
						  'page_header'	=> 'Kategori',
						  'kategori'	=> $kategori,
						  'isi'			=> 'admin/kategori/list'
			 );
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		}else{
			$data = array('kategori' => $this->input->post('kategori'));
			$this->kategori_model->tambah($data);
			$this->session->set_flashdata('msg', ' Kategori telah ditambahkan');
			redirect(base_url('admin/kategori'),'refresh');
		}
	}
	public function edit($id_kategori){
		$kategori = $this->kategori_model->detail($id_kategori);

		$valid = $this->form_validation->set_rules('kategori', 'Kategori', 'required', array('required' => '%s nama ktegori harus diisii'));

		if($valid->run()===FALSE){
			$data = array('title'	 		=> 'Edit kategori '.$kategori->kategori,
							'page_header' 	=> 'Edit Kategori '.$kategori->kategori,
							'kategori'		=> $kategori,
							'isi'			=> 'admin/kategori/edit');
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		}else{
			$i 		= $this->input;
			$data = array('id_kategori' 	=> $kategori->id_kategori,
						  'kategori'		=> $i->post('kategori'));
			$this->kategori_model->edit($data);
			$this->session->set_flashdata('msg', ' Kategori telah diedit');
			redirect(base_url('admin/kategori'),'referesh');
		}

	}
	public function hapus($id_kategori){
		if($this->session->userdata('username')=="" && $this->session->userdata('id_admin')==""){
			$this->session->set_flashdata('msg', ' Anda harus login terlebih dahulu');
			redirect(base_url('admin/login'),'referesh');
		}else{
			$data = array('id_kategori' => $id_kategori);
			$this->kategori_model->hapus($data);
			$this->session->set_flashdata('msg', ' Kategori telah dihapus');
			redirect(base_url('admin/kategori'),'referesh');
		}
	}


}