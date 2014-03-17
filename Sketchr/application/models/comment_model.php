<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment_model extends CI_Model {

	protected $table = 'sketch_comment';
	
	public function listAllBySketch($id_sketch) {

		$req = $this->db->select(''.$this->table .'.message, '.$this->table .'.post_date, membre.first_name, membre.last_name, membre.avatar')
			->from($this->table)
			->join('member `membre`', 'membre.id = '.$this->table.'.member', 'left')
			->where('sketch', $id_sketch)
			->order_by($this->table .'.id', 'desc')
			->get()
			->result();
		echo $req;
		
		return $req;
	}
	
	public function addComment($data) {
	
		//Ces données seront automatiquement échappées
		$this->db->set('sketch', $data[0]);
		$this->db->set('member', $data[1]);
		$this->db->set('message', $data[2]);
		
		$date_sql = date("Y-m-d H:i:s");
				
		$this->db->set('post_date', $date_sql);
		
		//	Une fois que tous les champs ont bien été définis, on "insert" le tout
		return $this->db->insert($this->table);
		
	}
	
}