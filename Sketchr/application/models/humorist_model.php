<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Humorist_model extends CI_Model {

	protected $table = 'humorist';

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
	
	public function addHumorist($data) {

		//	Ces données seront automatiquement échappées
		$this->db->set('first_name', $data[0]);
		$this->db->set('last_name', $data[1]);
		$this->db->set('birthday', $data[2]);
		$this->db->set('image', $data[3]);
		
		//	Une fois que tous les champs ont bien été définis, on "insert" le tout
		return $this->db->insert($this->table);
	}
	
	public function update($id, $data) {
	
	}
}
?>