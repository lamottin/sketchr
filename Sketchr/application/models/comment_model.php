<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment_model extends CI_Model {

	protected $table = 'sketch_comment';
	
	public function listAllBySketch($id_sketch) {

		return $this->db->select(''.$this->table .'.id, '.$this->table .'.message, '.$this->table .'.post_date, membre.first_name, membre.last_name, membre.avatar')
			->from($this->table)
			->join('member membre', 'membre.id = '.$this->table.'.member', 'left')
			->where('sketch', $id_sketch)
			->order_by($this->table .'.id', 'desc')
			->get()
			->result();
	}
	
	public function getAllInfoLastComment($id_sketch) {
	
		/*
SELECT sketch_comment.message, sketch_comment.post_date, membre.first_name, membre.last_name, membre.avatar
FROM sketch_comment
LEFT JOIN member membre ON membre.id = sketch_comment.member
WHERE sketch_comment.sketch=2 and sketch_comment.id = (SELECT MAX(sketch_comment.id) FROM sketch_comment)
*/
		$query=$this->db->select('id')
			->from($this->table)
			->limit(1, 0)
			->order_by('id', 'desc')
			->get()
			->result();
		$id = -1;	
		foreach($query as $result):
			$id = $result->id;
		endforeach;
	
		return $this->db->select($this->table.'.id, '.$this->table.'.message,'.$this->table.'.post_date, membre.first_name, membre.last_name, membre.avatar')
			->from($this->table)
			->join('member membre','membre.id = '.$this->table.'.member','left')
			->where($this->table.'.sketch', $id_sketch)
			->where($this->table.'.id' , $id)
			->get()
			->result();
	}
	
	public function getInfoMemberById($id_member) {

		return $this->db->select('first_name, last_name, avatar')
			->from('member')
			->where('id', $id_member)
			->get()
			->result();
			

	}
	/**
	 * Get the last added comment
	 * @return [Object] The last added comment
	 */
	public function getInfoLastCommentBySketch($id_sketch) {
	
		
		return $this->db->select('message, post_date')
			->from($this->table)
			->limit(1, 0)
			->order_by('id', 'desc')
			->get()
			->result();
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
	
	public function reportAbuse($id_membre, $id_post, $comment_abus) {

		$this->db->set('member', $id_membre);
		$this->db->set('sketch_comment', $id_post);
		$this->db->set('notification', $comment_abus);
		$this->db->set('processed', 0);
		
		//	Une fois que tous les champs ont bien été définis, on "insert" le tout
		return $this->db->insert($this->table ."_report_abuse");
	}
	
}