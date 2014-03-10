<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sketch_type_model extends CI_Model {

	protected $table = 'sketch_type';
	
	public function add(){
		$this->db->insert('sketch_type', $_POST);
	}

	public function listAll() {

		return $this->db->select('*')
			->from($this->table)
			->order_by('id', 'desc')
			->get()
			->result();
	}
	
	public function lastAdded() {

		return $this->db->select('*')
			->from($this->table)
			->limit(1, 0)
			->order_by('id', 'desc')
			->get()
			->result();
	}

	public function listByCategoryID($id) {

		return $this->db->select('*')
			->from($this->table)
			->where('category', $id)
			->order_by('id','desc')
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
}