<?php 

/**
 * 
 */
class Tours_model extends CI_Model
{
	
	public function listing(){
		$this->db->select('tbl_paket.*,
						   tbl_kategori.kategori');
		$this->db->from('tbl_paket');
		$this->db->join('tbl_kategori','tbl_kategori.id_kategori = tbl_paket.id_kategori');
		$this->db->order_by('id_paket', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function detail($id_paket){
		$this->db->select('tbl_paket.*,
						   tbl_kategori.kategori');
		$this->db->from('tbl_paket');
		$this->db->join('tbl_kategori','tbl_kategori.id_kategori = tbl_paket.id_kategori');
		$this->db->where('id_paket', $id_paket);
		$query = $this->db->get();
		return $query->row();
	}

	public function baca($slug){
		$this->db->select('tbl_paket.*,
						   tbl_kategori.kategori');
		$this->db->from('tbl_paket');
		$this->db->join('tbl_kategori','tbl_kategori.id_kategori = tbl_paket.id_kategori');
		$this->db->where('slug', $slug);
		$query = $this->db->get();
		return $query->row();
	}

	public function paketTampilHome(){
		$this->db->select('tbl_paket.*,
						   tbl_kategori.kategori');
		$this->db->from('tbl_paket');
		$this->db->join('tbl_kategori','tbl_kategori.id_kategori = tbl_paket.id_kategori');
		$this->db->limit(6);
		$this->db->order_by('id_paket', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function paketTampil(){
		$this->db->select('tbl_paket.*,
						   tbl_kategori.kategori');
		$this->db->from('tbl_paket');
		$this->db->join('tbl_kategori','tbl_kategori.id_kategori = tbl_paket.id_kategori');
		$this->db->limit(6);
		$this->db->order_by('id_paket', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function paketTampilPromoHome(){
		$this->db->select('tbl_paket.*,
						   tbl_kategori.kategori');
		$this->db->from('tbl_paket');
		$this->db->join('tbl_kategori','tbl_kategori.id_kategori = tbl_paket.id_kategori');
		$this->db->where('kategori', 'Promo');
		$this->db->limit(3);
		$this->db->order_by('id_paket', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function paketTampilPromo(){
		$this->db->select('tbl_paket.*,
						   tbl_kategori.kategori');
		$this->db->from('tbl_paket');
		$this->db->join('tbl_kategori','tbl_kategori.id_kategori = tbl_paket.id_kategori');
		$this->db->where('kategori', 'Promo');
		$this->db->limit(6);
		$this->db->order_by('id_paket', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function tambah($data){
		$this->db->insert('tbl_paket', $data);
	}

	public function edit($data){
		$this->db->where('id_paket', $data['id_paket']);
		$this->db->update('tbl_paket', $data);
	}

	public function hapus($data){
		$this->db->where('id_paket', $data['id_paket']);
		$this->db->delete('tbl_paket', $data);
	}
}