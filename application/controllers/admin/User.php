<?php 

/**
 * 
 */
class User extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index(){
		$user 		= $this->user_model->listing();
		$data = array('title' 				=> 'Karossa Tour & Travel',
					  'page_header' 		=> 'Admin',
					  'user'				=> $user,
					  'isi'					=> 'admin/user/list'
		);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function tambah(){
		$valid		= $this->form_validation;
		$valid->set_rules('nama', 'Nama', 'required',
					array('required'		=> '%s tidak boleh kosong'));
		$valid->set_rules('username', 'Username', 'required',
					array('required'		=> '%s tidak boleh kosong'));
		$valid->set_rules('email', 'Email', 'required|valid_email',
					array('required'		=> '%s tidak boleh kosong',
						  'valid_email'		=> '%s masukkan email yang'));
		$valid->set_rules('password', 'Password', 'required|min_length[6]',
					array('required'		=> '%s tidak boleh kosong',
						  'min_length'		=> '%s minimal 6 karakter'));
		$valid->set_rules('re_password', 'Retype Password', 'required|matches[password]',
					array('required'		=> '%s tidak boleh kosong',
						  'matches'			=> 'Password yang dimasukkan tidak sama'));

		if($valid->run()){

			//jika foto tidak kosong
			if(!empty($_FILES['foto']['name'])){
				$config['upload_path']		= './assets/uploads/imagses/';
				$config['allowed_types']	= 'gif|jpg|png|svg|jpeg';
				$config['max_size']			= '12000';
				$this->upload->initialize($config);
				if(! $this->upload->do_upload('foto')){
					$data = array('title' 				=> 'Tambah Admin',
								  'page_header' 		=> 'Admin',
								  'error'				=> $this->upload->display_errors(),
								  'isi'					=> 'admin/user/tambah');
					$this->load->view('admin/layout/wrapper', $data, FALSE);
				}else{
					$upload_data		= array('upload'	=> $this->upload->data());
					//image editor
					$config['image_library']	= 'gd2';
					$config['source_image']		= './assets/uploads/imagess/'.$upload_data['uploads']['file_name'];
					$config['new_image']		= './assets/uploads/imagses/thumbs';
					$config['create_thumb']		= TRUE;
					$config['quality']			= "100%";
					$config['maintain_ratio']	= TRUE;
					$config['width']			= 360;
					$config['height']			= 360;
					$config['x_axis']			= 0;
					$config['y_axis']			= 0;
					$config['thumb_marker']		= '';
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					$i 		= $this->input;
					$data 	= array('nama' 		=> $i->post('nama'),
									'username' 	=> $i->post('username'),
									'email' 	=> $i->post('email'),
									'password' 	=> $i->post('password'),
									'level' 	=> $i->post('level'),
									'status' 	=> $i->post('status'),
									'foto'	 	=> $upload_data['uploads']['file_name'],
					);
					$this->user_model->tambah($data);
					$this->session->set_flashdata('msg', ' Data telah ditambahkan');
					redirect(base_url('admin/user'), 'refresh');
					}
				}else{
					$i 		= $this->input;
					$data 	= array('nama' 		=> $i->post('nama'),
									'username' 	=> $i->post('username'),
									'email' 	=> $i->post('email'),
									'password' 	=> $i->post('password'),
									'level' 	=> $i->post('level'),
									'status' 	=> $i->post('status')
					);
					$this->user_model->tambah($data);
					$this->session->set_flashdata('msg', 'Data admin telah ditambahkan');
					redirect(base_url('admin/user'),'refresh');
			}
		}
		$data = array('title' 				=> 'Tambah Admin',
					  'page_header' 		=> 'Tambah',
					  'breadcrumb_aksi' 	=> 'Tambah',
					  'isi'					=> 'admin/user/tambah');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function  edit($id_admin){
		$user 	= $this->user_model->detail($id_admin);

		$valid		= $this->form_validation;
		$valid->set_rules('nama', 'Nama', 'required',
					array('required'		=> '%s tidak boleh kosong'));
		$valid->set_rules('username', 'Username', 'required',
					array('required'		=> '%s tidak boleh kosong'));
		$valid->set_rules('email', 'Email', 'required|valid_email',
					array('required'		=> '%s tidak boleh kosong',
						  'valid_email'		=> '%s masukkan email yang'));

		if($valid->run()){

			if(!empty($_FILES['foto']['name'])){

				$config['upload_path']			= './assets/uploads/images/';
				$config['allowed_types']		= 'gif|jpg|png|svg|jpeg';
				$config['max_size']				= '12000';
				$this->upload->initialize($config);
				if(!$this->upload->do_upload('foto')){
					$data = array('title' 			=> 'Edit data '.$user->nama,
								  'page_header' 	=> 'Edit'.$user->nama,
								  'user'			=> $user,
								  'error'			=> $this->load->display_errors(),
								  'isi'				=> 'admin/user/edit');
					$this->load->view('admin/layout/wrapper', $data, FALSE);
				}else{
					$upload_data		=	array('uploads' => $this->upload->data());
					//image editor
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

					//jika ada file lama
					if($user->foto != ""){
						unlink('.assets/uploads/images/'.$user->foto);
						unlink('.assets/uploads/images/thumbs/'.$user->foto);
					}

					$i 		= $this->input;
					$data 	= array('id_admin'	=> $user->id_admin,
									'nama' 		=> $i->post('nama'),
									'username' 	=> $i->post('username'),
									'email' 	=> $i->post('email'),
									'password' 	=> $i->post('password'),
									'level' 	=> $i->post('level'),
									'status' 	=> $i->post('status'),
									'foto'		=> $upload_data['uploads']['file_name']
					);
					$this->user_model->edit($data);
					$this->session->set_flashdata('msg', 'Data admin telah diedit');
					redirect(base_url('admin/user'),'refresh');
				}
			}else{
					$i 		= $this->input;
					$data 	= array('id_admin'	=> $user->id_admin,
									'nama' 		=> $i->post('nama'),
									'username' 	=> $i->post('username'),
									'email' 	=> $i->post('email'),
									'password' 	=> $i->post('password'),
									'level' 	=> $i->post('level'),
									'status' 	=> $i->post('status')
					);
					$this->user_model->edit($data);
					$this->session->set_flashdata('msg', 'Data admin telah diedit');
					redirect(base_url('admin/user'),'refresh');
			}
		}
		$data = array('title' 			=> 'Edit data '.$user->nama,
					  'page_header'		=> 'Edit'.$user->nama,
					  'user'			=> $user,
					  'isi'				=> 'admin/user/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);

	}

	public function hapus($id_admin){
		$data = array('id_admin' => $id_admin );
		$this->user_model->hapus($data);
		$this->session->set_flashdata('msg', ' Data telah dihapus');
		redirect(base_url('admin/user'),'refresh');
	}
}