<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_model extends CI_Model {

	protected $table = 'category';

	/**
	 * List all the categories within the database ordered by their "id"
	 * @return [Array] of all categories
	 */
	public function listAll() {

		return $this->db->select('*')
			->from($this->table)
			->order_by('id', 'desc')
			->get()
			->result();
	}
	
	/**
	 * Get a category identified by it's "id"
	 * @param  $id The id of the category
	 * @return [Object] The one category you're looking for
	 */
	public function getById($id) {
		
		$query = $this->db->select('*')
			->from($this->table)
			->where('id', $id)
			->get();

		return $query->num_rows() > 0 ? $query->row() : false;
	}
	
	/**
	 * Insert a new category to the database
	 */
	public function addCategory($data) {

		//	Ces données seront automatiquement échappées
		$this->db->set('title', $data[0]);
		$this->db->set('image', $data[1]);
		
		//	Une fois que tous les champs ont bien été définis, on "insert" le tout
		return $this->db->insert($this->table);
	}
}
?>