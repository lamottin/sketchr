	<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class deadlink_model extends CI_Model {

	protected $table = 'sketch_dead_link';

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

	public function getBySketch($id_sketch) {
		
		$query = $this->db->select('*')
			->from($this->table)
			->where('sketch', $id_sketch)
			->get();

		return $query->num_rows() > 0 ? $query->row() : false;
	}


	public function getByProcessed($Processed) {
		
		$query = $this->db->select('*')
			->from($this->table)
			->where('Processed', $Processed)
			->get();

		return $query->num_rows() > 0 ? $query->row() : false;
	}



	public function addDeadLink($id_sketch, $user) {

		$this->db->set('sketch', $id_sketch);
		$this->db->set('member', $user);
		$this->db->set('processed', 0);
		
		
		return $this->db->insert($this->table);	

	}

	public function DeadLinkFix($id_sketch, $user) {

		$this->db->set('processed', 1);
		
		$this->db->where('sketch', $id_sketch);
		$this->db->where('member', $user);
		return $this->db->update($this->table, $data);	

	}


}
?>