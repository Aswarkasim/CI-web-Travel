<?php 

/**
 * 
 */
class User_model extends CI_Model
{
	public function login($username, $password){
		$this->db->select('*');
		$this->db->from('tbl_admin');
		$this->db->where(array('username'	=> $username,
								'password'	=> $password));
		$this->db->order_by('id_admin','DESC');
		$query = $this->db->get();
		return $query->row();
	}
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('tbl_admin');
		$query = $this->db->get();
		return $query->result();
	}

	public function detail($id_admin){
		$this->db->select('*');
		$this->db->from('tbl_admin');
		$this->db->where('id_admin', $id_admin);
		$this->db->order_by('id_admin', 'DESC');
		$query = $this->db->get();
		return $query->row();
	}

	public function tambah($data){
		$this->db->insert('tbl_admin', $data);
	}
	public function edit($data){
		$this->db->where('id_admin', $data['id_admin']);
		$this->db->update('tbl_admin', $data);
	}
	public function hapus($data){
		$this->db->where('id_admin', $data['id_admin']);
		$this->db->delete('tbl_admin', $data);
	}
}