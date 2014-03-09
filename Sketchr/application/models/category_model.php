<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_model extends CI_Model {

	protected $table = 'category';

	public function listAll() {

		return $this->db->select('*')
			->from($this->table)
			->order_by('id', 'desc')
			->get()
			->result();
	}
	
	public function getById($id) {
		
		$query = $this->db->select('*')
			->from($this->table)
			->where('id', $id)
			->get();

		return $query->num_rows() > 0 ? $query->row() : false;
	}
	
	public function addCategory($data) {

		//	Ces données seront automatiquement échappées
		$this->db->set('title', $data[0]);
		$this->db->set('image', $data[1]);
		
		//	Une fois que tous les champs ont bien été définis, on "insert" le tout
		return $this->db->insert($this->table);
	}
}
?>