<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sketch_model extends CI_Model {

	protected $table = 'sketch';

	
	public function findByTitle($pv_search){

		
		return $this->db->select('*')
			->from($this->table)
			->like('title', $pv_search)
			->order_by('id', 'desc')
			->get()
			->result();
	}

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


	public function addSketch($data) {

		//	Ces données seront automatiquement échappées
		$this->db->set('video_link', $data[0]);
		$this->db->set('title', $data[1]);
		$this->db->set('sketch_type', $data[2]);
		
		//Formatte la date pour le format sql
		$release = explode('-',$data[3]);
		$day = $release[0];
		$month = $release[1];
		$year = $release[2];
		$date_sql = $year ."-".$month."-".$day;
		
		$this->db->set('release_date', $date_sql);
		$this->db->set('synopsis', $data[4]);
		$this->db->set('image', $data[5]);

		
		//	Une fois que tous les champs ont bien été définis, on "insert" le tout
		return $this->db->insert($this->table);
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