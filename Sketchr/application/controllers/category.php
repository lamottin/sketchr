<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends MY_Controller {


	public function __construct() {

		parent::__construct();	
	}

	public function index() {

	}

	public function access_category_by_name(){
		$data = array();
		$data['category'] = $this->category_model->getById($this->uri->segment(2));

		$this->show_view_with_hf('category_sheet', $data);
	}

	public function add() {
		$data = array();
		$this->show_view_with_hf('category_add', $data);
	}
	
	public function addCategory() {
		$data = array();
		$data[0] = $_POST['title'];
		$data[1] = $_POST['image'];
		
		//À l'avenir faudra faire le script pour l'upload d'image. Pour l'instant considéré comme juste du texte.
		//Vérifier les données..
		$this->category_model->addCategory($data);
		
		$this->show_view_with_hf('home', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
?>