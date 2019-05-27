<?php  

/**
 * 
 */
class Banner_model extends CI_Model
{
	
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('tbl_banner');
		$this->db->order_by('id_banner', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function detail($id_banner)
	{
		$this->db->select('*');
		$this->db->from('tbl_banner');
		$this->db->where('id_banner', $id_banner);
		$this->db->order_by('id_banner', 'DESC');
		$query = $this->db->get();
		return $query->row();
	}

	public function slider(){
		$this->db->select('*');
		$this->db->from('tbl_banner');
		$this->db->where('status', 'Aktif');
		$this->db->order_by('id_banner', 'DESC');
		$this->db->limit(5);
		$query = $this->db->get();
		return $query->result();
	}

	public function tambah($data){
		$this->db->insert('tbl_banner', $data);
	}

	public function edit($data){
		$this->db->where('id_banner', $data['id_banner']);
		$this->db->update('tbl_banner', $data);
	}

	public function hapus($data){
		$this->db->where('id_banner', $data['id_banner']);
		$this->db->delete('tbl_banner', $data);
	}
}