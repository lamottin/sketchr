<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment_model extends CI_Model {

	protected $table = 'sketch_comment';
	
	public function listAllBySketch($id_sketch) {

		return $this->db->select('*')
			->from($this->table)
			->where('sketch', $id_sketch)
			->order_by('post_date', 'desc')
			->get()
			->result();
	}
	
	public function addComment($data) {
	
		//Ces donn�es seront automatiquement �chapp�es
		$this->db->set('sketch', $data[0]);
		$this->db->set('member', $data[1]);
		$this->db->set('message', $data[2]);
		
		$date_sql = date("Y-m-d H:i:s");
				
		$this->db->set('post_date', $date_sql);
		
		//	Une fois que tous les champs ont bien �t� d�finis, on "insert" le tout
		return $this->db->insert($this->table);
		
	}
	
}