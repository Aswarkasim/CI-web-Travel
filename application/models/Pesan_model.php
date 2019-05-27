<?php 
/**
 * 
 */
class Pesan_model extends CI_Model
{
	public function listing(){
		$this->db->select('*');
		$this->db->from('tbl_pesan');
		$this->db->order_by('id_pesan', 'ASC');
		$query = $this->db->get();
		return $query->result();
	} 
	
	public function kirimPesan($data){
		$this->db->insert('tbl_pesan', $data);
	}

	public function statusPesan(){
		$query = $this->db->query("UPDATE tbl_pesan SET status_pesan='0'");
		return $query;
	} 
}