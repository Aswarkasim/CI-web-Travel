<?php 
/**
 * 
 */
class Banner extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('banner_model');
	}

	public function index(){
		$banner = $this->banner_model->listing();

		$data = array('title' 	=> 'Karossa Tour & Travel | Banner',
					  'banner'	=> $banner,
					  'isi'		=> 'admin/banner/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function tambah(){
		$valid 	= $this->form_validation;
		$valid->set_rules('judul', 'Judul', 'required',
					array('required'	=> '%s tidak  boleh kosong'));
		$valid->set_rules('keterangan', 'Keterangan', 'required|max_length[100]',
					array('required'	=> '%s tidak  boleh kosong',
						  'max_length'	=> '%s maksimal 100 Karakter'));

		if($valid->run()){
			if(!empty($_FILES['gambar']['name'])){
				$config['upload_path']   = './assets/uploads/images/';
				$config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
				$config['max_size']      = '12000'; // KB  
				$this->upload->initialize($config);

				if(!$this->upload->do_upload('gambar')){
					$data = array('title' 	=> 'Karossa Tour & Travel | Banner',
								  'error'	=> $this->upload->display_errors(),
								  'isi'		=> 'admin/banner/tambah');
					$this->load->view('admin/layout/wrapper', $data, FALSE);
				}else{
					$upload_data		= array('uploads'	=> $this->upload->data());
					// Image Editor
					$config['image_library']  	= 'gd2';
					$config['source_image']   	= './assets/uploads/images/'.$upload_data['uploads']['file_name']; 
					$config['new_image']     	= './assets/uploads/images/thumbs/';
					$config['create_thumb']   	= TRUE;
					$config['quality']       	= "100%";
					$config['maintain_ratio']   = TRUE;
					$config['width']       		= 360; // Pixel
					$config['height']       	= 360; // Pixel
					$config['x_axis']       	= 0;
					$config['y_axis']       	= 0;
					$config['thumb_marker']   	= '';
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					$i 		= $this->input;
					$data = array('judul' 		=> $i->post('judul'),
								  'keterangan'	=> $i->post('keterangan'),
								  'status'		=> $i->post('status'),
								  'gambar' 		=> $upload_data['uploads']['file_name']);
					$this->banner_model->tambah($data);
					$this->session->set_flashdata('msg', ' Banner telah ditambahkan');
					redirect(base_url('admin/banner'),'refresh');
				}
			}else{
				$i 		= $this->input;
				$data = array('judul' 		=> $i->post('judul'),
							  'keterangan'	=> $i->post('keterangan'),
							  'status'		=> $i->post('status'));
				$this->banner_model->tambah($data);
				$this->session->set_flashdata('msg', ' Banner telah ditambahkan');
				redirect(base_url('admin/banner'),'refresh');
			}
		}
		$data = array('title' 	=> 'Karossa Tour & Travel Dashboard',
					  'isi' 	=> 'admin/banner/tambah');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function edit($id_banner){
		$banner 	= $this->banner_model->detail($id_banner);

		$valid 	= $this->form_validation;
		$valid->set_rules('judul', 'Judul', 'required',
					array('required'	=> '%s tidak  boleh kosong'));
		$valid->set_rules('keterangan', 'Keterangan', 'required|max_length[100]',
					array('required'	=> '%s tidak  boleh kosong',
						  'max_length'	=> '%s maksimal 100 Karakter'));

		if($valid->run()){
			if(!empty($_FILES['gambar']['name'])){
				$config['upload_path']   = './assets/uploads/images/';
				$config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
				$config['max_size']      = '12000'; // KB  
				$this->upload->initialize($config);

				if(!$this->upload->do_upload('gambar')){
					$data = array('title' 	=> 'Karossa Tour & Travel | Banner',
								  'banner'	=> $banner,
								  'error'	=> $this->upload->display_errors(),
								  'isi'		=> 'admin/banner/edit');
					$this->load->view('admin/layout/wrapper', $data, FALSE);
				}else{
					$upload_data		= array('uploads'	=> $this->upload->data());
					// Image Editor
					$config['image_library']  	= 'gd2';
					$config['source_image']   	= './assets/uploads/images/'.$upload_data['uploads']['file_name']; 
					$config['new_image']     	= './assets/uploads/images/thumbs/';
					$config['create_thumb']   	= TRUE;
					$config['quality']       	= "100%";
					$config['maintain_ratio']   = TRUE;
					$config['width']       		= 360; // Pixel
					$config['height']       	= 360; // Pixel
					$config['x_axis']       	= 0;
					$config['y_axis']       	= 0;
					$config['thumb_marker']   	= '';
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					if($banner->gambar!=""){
						unlink('./assets/uploads/images/'.$banner->gambar);
						unlink('./assets/uploads/images/thumbs/'.$banner->gambar);
					}

					$i 		= $this->input;
					$data = array('id_banner'	=> $banner->id_banner,
								  'judul' 		=> $i->post('judul'),
								  'keterangan'	=> $i->post('keterangan'),
								  'status'		=> $i->post('status'),
								  'gambar' 		=> $upload_data['uploads']['file_name']);
					$this->banner_model->edit($data);
					$this->session->set_flashdata('msg', ' Banner telah diedit');
					redirect(base_url('admin/banner'),'refresh');
				}
			}else{
				$i 		= $this->input;
				$data = array('id_banner'	=> $banner->id_banner,
							  'judul' 		=> $i->post('judul'),
							  'keterangan'	=> $i->post('keterangan'),
							  'status'		=> $i->post('status'));
				$this->banner_model->edit($data);
				$this->session->set_flashdata('msg', ' Banner telah diedit');
				redirect(base_url('admin/banner'),'refresh');
			}
		}
		$data = array('title' 	=> 'Karossa Tour & Travel Dashboard',
					  'banner'	=> $banner,
					  'isi' 	=> 'admin/banner/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function hapus($id_banner){
		if($this->session->userdata('id_admin')=="" && $this->session->userdata('username')==""){
			$this->session->set_flashdata('msg', ' Anda harus login terlebih dahulu');
			redirect(base_url('login'),'refresh');
		}else{

			$data = array('id_banner' => $id_banner);
			$this->banner_model->hapus($data);
			$this->session->set_flashdata('msg', ' Banner telah dihapus');
			redirect(base_url('admin/banner'),'refresh');
		}
	}
}