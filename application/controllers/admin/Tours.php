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
		$tours 		= $this->tours_model->listing();
		$kategori 	= $this->kategori_model->listing();
		$data = array('title' 		=> 'List Paket ('.count($tours).') data' ,
					  'tours'		=> $tours,
					  'kategori'	=> $kategori,
					  'isi'			=> 'admin/tours/list'
		);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	
	public function tambah(){
		$kategori 	= $this->kategori_model->listing();

		$valid = $this->form_validation;

		$valid->set_rules('nama_paket', 'Nama', 'required', array('required' => '%s harus diisi')); 
		$valid->set_rules('deskripsi', 'Deskripsi', 'required|min_length[500]',
					array('required' 	=> '%s harus diisi',
						  'min_length'	=> '%s Mininal 500 karakter'));
		$valid->set_rules('harga', 'Harga', 'required|min_length[500]',
					array('required' 	=> '%s harus diisi',
						  'min_length'	=> '%s Mininal 50 karakter'));
		$valid->set_rules('kategori', 'Kategori', 'required', array('required' => '%s harus diisi')); 

		if($valid->run()){
			if(!empty($_FILES['gambar']['name'])){
				$config['upload_path']   = './assets/uploads/images/';
				$config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
				$config['max_size']      = '12000'; // KB  
				$this->upload->initialize($config);
				if(!$this->upload->do_upload('gambar')){
					$data = array('title' 			=> 'Karossa Travel Dashboard',
									  'page_header'	=> 'Kategori',
									  'kategori'	=> $kategori,
									  'error'		=> $this->upload->display_errors(),
									  'isi'			=> 'admin/tours/tambah'
					 );
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

					$i 			= $this->input;
					$slug_paket	= url_title($this->input->post('nama_paket'),'dash', TRUE);
					$data = array('nama_paket'		=> $i->post('nama_paket'),
								  'slug'			=> $slug_paket,
								  'deskripsi'		=> $i->post('deskripsi'),
								  'hrg_dewasa'		=> $i->post('harga'),
								  'id_kategori'		=> $i->post('kategori'),
								  'gambar'			=> $upload_data['uploads']['file_name']
					);
					$this->tours_model->tambah($data);
					$this->session->set_flashdata('msg', ' Paket telah ditambahkan');
					redirect(base_url('admin/tours'),'refresh');
				}
			}else{
				$i 			= $this->input;
				$slug_paket	= url_title($this->input->post('nama_paket'),'dash', TRUE);
				$data = array('nama_paket'		=> $i->post('nama_paket'),
							  'slug'			=> $slug_paket,
							  'deskripsi'		=> $i->post('deskripsi'),
							  'hrg_dewasa'		=> $i->post('harga'),
							  'id_kategori'		=> $i->post('kategori')
				);
				$this->tours_model->tambah($data);
				$this->session->set_flashdata('msg', ' Paket telah ditambahkan');
				redirect(base_url('admin/tours'),'refresh');
			}

		}
		$data = array('title' 			=> 'Karossa Travel Dashboard',
						  'page_header'	=> 'Kategori',
						  'kategori'	=> $kategori,
						  'isi'			=> 'admin/tours/tambah'
		 );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function edit($id_paket){
		$kategori 		= $this->kategori_model->listing();
		$tours 			= $this->tours_model->detail($id_paket);

		$valid = $this->form_validation;

		$valid->set_rules('nama_paket', 'Nama', 'required', array('required' => '%s harus diisi')); 
		$valid->set_rules('deskripsi', 'Deskripsi', 'required|min_length[500]',
					array('required' 	=> '%s harus diisi',
						  'min_length'	=> '%s Mininal 500 karakter'));
		$valid->set_rules('harga', 'Harga', 'required|min_length[500]',
					array('required' 	=> '%s harus diisi',
						  'min_length'	=> '%s Mininal 50 karakter'));
		$valid->set_rules('kategori', 'Kategori', 'required', array('required' => '%s harus diisi')); 

		if($valid->run()){
			if(!empty($_FILES['gambar']['name'])){
				$config['upload_path']   = './assets/uploads/images/';
				$config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
				$config['max_size']      = '12000'; // KB 
				$this->upload->initialize($config);


				if(!$this->upload->do_upload('gambar')){
					$data = array('title' 			=> 'Karossa Travel Dashboard',
								  'page_header'	=> 'Kategori',
								  'tours'		=> $tours,
								  'kategori'	=> $kategori,
								  'error'		=> $this->upload->display_errors(),
								  'isi'			=> 'admin/tours/edit'
				 	);
				 	$this->load->view('admin/layout/wrapper', $data, FALSE);
				 }else{
				 	$upload_data        		= array('uploads' =>$this->upload->data());
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

					if($tours->gambar != ""){
						unlink('./assets/uploads/images/'.$tours->gambar);
						unlink('./assets/uploads/images/thumbs/'.$tours->gambar);
					}

					$i 	= $this->input;
					$slug_paket = url_title($this->input->post('nama_paket'),'dash', TRUE);
					$data = array('id_paket' 		=> $tours->id_paket,
								  'nama_paket'		=> $i->post('nama_paket'),
								  'slug'			=> $slug_paket,
								  'deskripsi'		=> $i->post('deskripsi'),
								  'hrg_dewasa'		=> $i->post('harga'),
								  'id_kategori'		=> $i->post('kategori'),
								  'gambar'			=> $upload_data['uploads']['file_name']
					);
					$this->tours_model->edit($data);
					$this->session->set_flashdata('msg', ' Data telah di edit');
					redirect(base_url('admin/tours'),'refresh');
				 }
			}else{
				$i 	= $this->input;
				$slug_paket = url_title($this->input->post('nama_paket'),'dash', TRUE);
				$data = array('id_paket' 		=> $tours->id_paket,
							  'nama_paket'		=> $i->post('nama_paket'),
							  'slug'			=> $slug_paket,
							  'deskripsi'		=> $i->post('deskripsi'),
							  'hrg_dewasa'		=> $i->post('harga'),
							  'id_kategori'		=> $i->post('kategori')
				);
				$this->tours_model->edit($data);
				$this->session->set_flashdata('msg', ' Data telah di edit');
				redirect(base_url('admin/tours'),'refresh');
			}
		}
		$data = array('title'	 	=> 'Edit paket : '.$tours->nama_paket,
					  'tours' 	 	=> $tours,
					  'kategori' 	=> $kategori,
					  'isi'		 	=> 'admin/tours/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function hapus($id_paket){
		if($this->session->userdata('id_admin')=="" && $this->session->userdata('username')==""){
			$this->session->set_flashdata('msg',' Anda harus login terlebih dahulu');
			redirect(base_url('login'),'refresh');
		}else{
			$data = array('id_paket' => $id_paket );
			$this->tours_model->hapus($data);
			$this->session->set_flashdata('msg', ' Data paket telah dihapus');
			redirect(base_url('admin/tours'),'refresh');
		}
	}
}