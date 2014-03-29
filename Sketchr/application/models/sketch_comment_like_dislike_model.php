<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sketch_comment_like_dislike_model extends CI_Model {

	protected $table = 'sketch_comment_like_dislike';

		
	//'SELECT COUNT(*) FROM  sketch_comment_like_dislike WHERE ip = "'.$user_ip.'" and sketch = "'.$id_sketch.'" and vote = ? '	
	public function getCountByActUserComment($member, $id_comment, $vote) {
		
		$this->db->from($this->table)
			->where('ip', $member)
			->where('comment', $id_comment)
			->where('vote',$vote);
		
		return $this->db->count_all_results();
	}
	
	//'SELECT COUNT(*) FROM  sketch_comment_like_dislike WHERE sketch = "'.$id_sketch.'" and vote = $vote'
	public function getAllCountByActComment($id_comment, $vote) {
		
		$this->db->from($this->table)
			->where('comment', $id_comment)
			->where('vote',$vote);
		return $this->db->count_all_results();
	}
	
	//'INSERT INTO sketch_comment_like_dislike (sketch, ip, vote )VALUES("'.$id_sketch.'", "'.$user_ip.'", $vote)'
	public function addAct($id_comment, $member, $vote) {

		$this->db->set('comment', $id_comment);
		$this->db->set('ip', $member);
		$this->db->set('vote', $vote);
		
		//	Une fois que tous les champs ont bien été définis, on "insert" le tout
		return $this->db->insert($this->table);
	} 	
	
	//'UPDATE sketch_comment_like_dislike SET vote = $vote WHERE sketch = '.$id_sketch.' and ip ="'.$user_ip.'"'
	public function updateAct($id_comment, $member, $vote) {
	
		$this->db->set('vote', $vote);

		$this->db->where('ip', $member);
		$this->db->where('comment', $id_comment);
		$this->db->update($this->table);
		
	}
}
?>