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
		
		return $this->db->select('*')
			->from($this->table)
			->where('id', $id)
			->get()
			->result();
	}
	
	public function addCategory($data) {
	
		//$data[0] = title
		//$data[1] = image
		
		$sql = "INSERT INTO ". $this->table ." (title, image) 
				VALUES (".$this->db->escape($data[0]).", ".$this->db->escape($data[1]).")";

		$this->db->query($sql);
		echo $this->db->affected_rows(); 
	}
}
?>