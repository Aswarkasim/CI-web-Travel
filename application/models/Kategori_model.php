<?php 
/**
 * 
 */
class Kategori_model extends CI_Model
{
	
	public function listing(){
		$this->db->select('*');
		$this->db->from('tbl_kategori');
		$this->db->order_by('id_kategori', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}
	public function detail($id_kategori){
		$this->db->select('*');
		$this->db->from('tbl_kategori');
		$this->db->where('id_kategori', $id_kategori);
		$this->db->order_by('id_kategori', 'DESC');
		$query = $this->db->get();
		return $query->row();
	}
	public function tambah($data){
		$this->db->insert('tbl_kategori', $data);
	}
	public function edit($data){
		$this->db->where('id_kategori', $data['id_kategori']);
		$this->db->update('tbl_kategori', $data);
	}
	public function hapus($id_kategori){
		$this->db->where('id_kategori', $id_kategori);
		$this->db->from('tbl_kategori');
	}
}