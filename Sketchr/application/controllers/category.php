<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends MY_Controller {


	public function __construct() {

		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
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
	 * Get the data sent by _POST from the form used to add a new category
	 * and passes it to category_model for insertion in the database
	 */
	public function add() {
		
		//When the form is correctly filled
		if( $this->form_validation->run() == TRUE ) {
			
			//process data
			$data = array();
			
			//We retrieve the data within the POST method.
			$data[0] = $this->input->post("title");
			$data[1] = $this->input->post("image");
			
			//À l'avenir faudra faire le script pour l'upload d'image. Pour l'instant considéré comme juste du texte.
			//Vérifier les données..
			
			//New entry in the database
			$this->category_model->addCategory($data);
		
			//Load a new view
			$this->show_view_with_hf('home', $data);
		}
		
		elseif($this->input->post("submit")){ //In case there's something wrong with he form
			
			//show validation error
			$this->data["status"]->message = validation_errors();
			$this->data["status"]->success = FALSE;
			//print_r($this->data["status"]);
			$data=array();
			$this->show_view_with_hf('category_add', $data);
		}
		else { //Default page loaded
			$data = array();
			$this->show_view_with_hf('category_add', $data);
		}
	}
}
/* End of file category.php */
/* Location: ./application/controllers/category.php */
?>