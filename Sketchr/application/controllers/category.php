<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends MY_Controller {


	public function __construct() {

		parent::__construct();	
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL :
	 * - base_url()/category/
	 */
	public function index() {

	}

	/**
	 * Maps to the following URL :
	 * - base_url()/category/access_category_by_id
	 *
	 * Since this function is set as the route for category/(:num) in
	 * config/routes.php, it maps to the following URL too :
	 * - base_url()/category/(:num)
	 */
	public function access_category_by_id(){
		$data = array();

		// Get the category object which we are trying to access from the model
		$data['category'] = $this->category_model->getById($this->uri->segment(2));
		// WHAT TO DO IF IT RETURNS NULL? HAVE TO IMPLEMENT THAT !!!!

		// Get the list of sketch_types for this category
		$data['sketch_types'] = $this->sketch_type_model->listByCategoryID($data['category']->id);

		$this->show_view_with_hf('category_sheet', $data);
	}

	/**
	 * Load the form to add a new category to the database
	 */
	public function add() {
		$data = array();
		$this->show_view_with_hf('category_add', $data);
	}
	
	/**
	 * Get the data sent by _POST from the form used to add a new category
	 * and passes it to category_model for insertion in the database
	 */
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