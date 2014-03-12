<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sketch_type_humorist_model extends CI_Model {

	protected $table = 'sketch_type_humorist';
	
	/**
	 * Insert a new sketch_type to the database
	 */
	public function add($sth){
		$this->db->insert('sketch_type_humorist', $sth);
	}
}