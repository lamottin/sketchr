<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member_model extends CI_Model {

	protected $table = 'member';

	public function listAll() {

		return $this->db->select('*')
			->from($this->table)
			->order_by('id', 'desc')
			->get()
			->result();
	}

	public function listAllByLastName() {

		return $this->db->select('*')
			->from($this->table)
			->order_by('last_name', 'asc')
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

	public function getByEmail($email) {

		$query = $this->db->select('*')
			->from($this->table)
			->where('email', $email)
			->get();

		return $query->num_rows() > 0 ? $query->row() : false;
	}
	
	public function create($data) {

		//Ces données seront automatiquement échappées
		$this->db->set('first_name', $data[0]);
		$this->db->set('last_name', $data[1]);
		$this->db->set('email', $data[2]);
		$this->db->set('password', $data[3]);
		$this->db->set('country', $data[5]);
		$this->db->set('postcode', $data[6]);
		$this->db->set('city', $data[7]);
		
		//Formatte la date pour le format sql
		$date = explode('-',$data[8]);
		$day = $date[0];
		$month = $date[1];
		$year = $date[2];
		$date_sql = $year ."-".$month."-".$day;
		
		$this->db->set('birthday', $date_sql);
		
		//	Une fois que tous les champs ont bien été définis, on "insert" le tout
		return $this->db->insert($this->table);
	}
	
	public function update($id, $data) {
	
	}

	public function verifyPassword($data) {

		$query = $this->db->select('*')
			->from($this->table)
			->where('email', $data[0])
			->get();

		if($query->num_rows() > 0) {
			$user = $query->row();
			return $user->password == $data[1] ? true : false;
		}
		else return false;
	}
}
?>