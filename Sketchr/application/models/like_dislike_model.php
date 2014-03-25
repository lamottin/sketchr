<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Like_Dislike_model extends CI_Model {

	protected $table = 'wcd_yt_rate';

		
	//'SELECT COUNT(*) FROM  wcd_yt_rate WHERE ip = "'.$user_ip.'" and id_item = "'.$id_sketch.'" and rate = ? '	
	public function getCountByActUserSketch($user_ip, $id_sketch, $act) {
		
		$this->db->from($this->table)
			->where('ip', $user_ip)
			->where('id_item', $id_sketch)
			->where('rate',$act);
		
		return $this->db->count_all_results();
	}
	
	//'SELECT COUNT(*) FROM  wcd_yt_rate WHERE id_item = "'.$id_sketch.'"'
	public function getAllCountBySketch($id_sketch) {
		
		$this->db->from($this->table)
			->where('id_item', $id_sketch);
		
		return $this->db->count_all_results();
	}	 

	//'SELECT COUNT(*) FROM  wcd_yt_rate WHERE id_item = "'.$pageID.'" and rate = $act'
	public function getAllCountByActSketch($id_sketch, $act) {
		
		$this->db->from($this->table)
			->where('id_item', $id_sketch)
			->where('rate',$act);
		return $this->db->count_all_results();
	}
	
	//'INSERT INTO wcd_yt_rate (id_item, ip, rate )VALUES("'.$id_sketch.'", "'.$user_ip.'", $rate)'
	public function addAct($id_sketch, $user_ip, $rate) {

		$this->db->set('id_item', $id_sketch);
		$this->db->set('ip', $user_ip);
		$this->db->set('rate', $rate);
		
		//	Une fois que tous les champs ont bien été définis, on "insert" le tout
		return $this->db->insert($this->table);
	} 	
	
	//'UPDATE wcd_yt_rate SET rate = $rate WHERE id_item = '.$id_sketch.' and ip ="'.$user_ip.'"'
	public function updateAct($id_sketch, $user_ip, $rate) {
	
		$this->db->set('rate', $rate);

		$this->db->where('ip', $user_ip);
		$this->db->where('id_item', $id_sketch);
		$this->db->update($this->table, $data);
		
	}
}
?>