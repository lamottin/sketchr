<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Like_Dislike_model extends CI_Model {

	protected $table = 'sketch_like_dislike';

		
	//'SELECT COUNT(*) FROM  sketch_like_dislike WHERE ip = "'.$user_ip.'" and sketch = "'.$id_sketch.'" and vote = ? '	
	public function getCountByActUserSketch($user_ip, $id_sketch, $vote) {
		
		$this->db->from($this->table)
			->where('ip', $user_ip)
			->where('sketch', $id_sketch)
			->where('vote',$vote);
		
		return $this->db->count_all_results();
	}
	
	//'SELECT COUNT(*) FROM  sketch_like_dislike WHERE sketch = "'.$id_sketch.'"'
	public function getAllCountBySketch($id_sketch) {
		
		$this->db->from($this->table)
			->where('sketch', $id_sketch);
		
		return $this->db->count_all_results();
	}	 

	//'SELECT COUNT(*) FROM  sketch_like_dislike WHERE sketch = "'.$id_sketch.'" and vote = $vote'
	public function getAllCountByActSketch($id_sketch, $vote) {
		
		$this->db->from($this->table)
			->where('sketch', $id_sketch)
			->where('vote',$vote);
		return $this->db->count_all_results();
	}
	
	//'INSERT INTO sketch_like_dislike (sketch, ip, vote )VALUES("'.$id_sketch.'", "'.$user_ip.'", $vote)'
	public function addAct($id_sketch, $user_ip, $vote) {

		$this->db->set('sketch', $id_sketch);
		$this->db->set('ip', $user_ip);
		$this->db->set('vote', $vote);
		
		//	Une fois que tous les champs ont bien été définis, on "insert" le tout
		return $this->db->insert($this->table);
	} 	
	
	//'UPDATE sketch_like_dislike SET vote = $vote WHERE sketch = '.$id_sketch.' and ip ="'.$user_ip.'"'
	public function updateAct($id_sketch, $user_ip, $vote) {
	
		$this->db->set('vote', $vote);

		$this->db->where('ip', $user_ip);
		$this->db->where('sketch', $id_sketch);
		$this->db->update($this->table);
		
	}

	public function list_best_ratio() {

		return $this->db->select('sketch')
			->select('vote')
			->select('Count(vote) AS vote_count')
			->from($this->table)
			->order_by('sketch', 'desc')
			->group_by(array('sketch','vote'))
			->get()
			->result();
	}
}
?>