<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sketch_model extends CI_Model {

	protected $table = 'sketch';

	/**
	 * List all the sketchs within the database ordered by their "id"
	 * @return [Array] of all sketch
	 */
	public function listAll() {

		return $this->db->select('*')
			->from($this->table)
			->order_by('id', 'desc')
			->get()
			->result();
	}
	
	/**
	 * Get a sketch identified by it's "id"
	 * @param  $id The id of the sketch
	 * @return [Object] The one sketch you're looking for
	 */
	public function getById($id) {
		
		$query = $this->db->select('*')
			->from($this->table)
			->where('id', $id)
			->get();

		return $query->num_rows() > 0 ? $query->row() : false;
	}
	
	/**
	 * List all the sketchs from one sketch_type ordered by their "id"
	 * @param 	$id The id of the sketch_type
	 * @return 	[Array] of objects representing each sketch of the list
	 */
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