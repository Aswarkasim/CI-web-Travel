<?php 

/**
 * 
 */
class Master_model extends CI_Model
{
	
	public function listingKeterangan(){
		$this->db->select('*');
		$this->db->from('tbl_keterangan');
		return $this->db->get()->row('ket');
	}
	public function keteranganEdit($data){
		$this->db->update('tbl_keterangan', $data);
	}

	public function listingKetentuan(){
		$this->db->select('*');
		$this->db->from('tbl_ketentuan');
		return $this->db->get()->row('ketentuan');
	}

	public function ketentuanEdit($data){
		$this->db->update('tbl_ketentuan', $data);
	}

	public function listingTentang(){
		$this->db->select('*');
		$this->db->from('tbl_tentang');
		return $this->db->get()->row('tentang');
	}

	public function tentangEdit($data){
		$this->db->update('tbl_tentang', $data);
	}
}