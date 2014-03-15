<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sketch_type_model extends CI_Model {

	protected $table = 'sketch_type';
	
	/**
	 * Insert a new sketch_type to the database
	 */
	public function add($data){
				
		$this->db->set('title',$data[0]);
		$this->db->set('image',$data[2]);
		$this->db->set('synopsis',$data[3]);
		$this->db->set('category',$data[4]);
		
		//Cas particulier pour la date : format sql
		$release = explode('-', $data[1]);
		$day = $release[0];
		$month = $release[1];
		$year = $release[2];
		$start_date = $year ."-".$month."-".$day;
		$this->db->set('start_date',$start_date);
		
		//Insert into DB
		$this->db->insert($this->table);
	}

	/**
	 * List all the sketch_types within the database ordered by their "id"
	 * @return [Array] of all sketch_types
	 */
	public function listAll() {

		return $this->db->select('*')
			->from($this->table)
			->order_by('id', 'desc')
			->get()
			->result();
	}
	
	/**
	 * Get the last added sketch_type
	 * @return [Object] The last added sketch_type
	 */
	public function lastAdded() {

		return $this->db->select('*')
			->from($this->table)
			->limit(1, 0)
			->order_by('id', 'desc')
			->get()
			->result();
	}

	/**
	 * List all the sketch_types from one category ordered by their "id"
	 * @param 	$id The id of the category
	 * @return 	[Array] of objects representing each sketch_type of the list
	 */
	public function listByCategoryID($id) {

		return $this->db->select('*')
			->from($this->table)
			->where('category', $id)
			->order_by('id','desc')
			->get()
			->result();
	}

	/**
	 * Get a sketch_type identified by it's "id"
	 * @param  $id The id of the sketch_type
	 * @return [Object] The one sketch_type you're looking for
	 */
	public function getById($id) {

		$query = $this->db->select('*')
			->from($this->table)
			->where('id', $id)
			->get();

		return $query->num_rows() > 0 ? $query->row() : false;
	}
}