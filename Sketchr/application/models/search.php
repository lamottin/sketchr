<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sketch_type_model extends CI_Model {

	protected $table = 'sketch_type';

	public function FindAll($pv_search){

		
	}
	

	public function getById($id) {

		$query = $this->db->select('*')
			->from($this->table)
			->where('id', $id)
			->get();

		return $query->num_rows() > 0 ? $query->row() : false;
	}
}