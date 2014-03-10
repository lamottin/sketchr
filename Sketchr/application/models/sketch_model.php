<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sketch_model extends CI_Model {

	protected $table = 'sketch';

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
	
	public function listBySketchtypeId($id) {

		return $this->db->select('*')
			->from($this->table)
			->where('sketch_type', $id)
			->order_by('id','desc')
			->get()
			->result();
	}
}
?>