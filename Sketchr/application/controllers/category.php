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
		
		/*Rules :
			-trim : 			supprimer les blancs
			- required : 		champ requis
			- xss_clean : 		Runs the data through the XSS filtering function
			- max_length[X] : 	définit la taille max à x
			- min_length[X] : 	définit la taille min à x
			- valid_email : 	Returns FALSE if the form element does not contain a valid email address.
			- alpha : 			Returns FALSE if the form element contains anything other than alphabetical characters. 	 
			- alpha_numeric		Returns FALSE if the form element contains anything other than alpha-numeric characters. 	 
			- alpha_dash		Returns FALSE if the form element contains anything other than alpha-numeric characters, underscores or dashes. 	 
			- numeric			Returns FALSE if the form element contains anything other than numeric characters. 	 
			- integer			Returns FALSE if the form element contains anything other than an integer. 	 
			- is_natural		Returns FALSE if the form element contains anything other than a natural number: 0, 1, 2, 3, etc.
			- matches[str]		Returns FALSE if the form element does not match the one in the parameter. Useful for passwords.
			
			Le '|' sert pour définir des règles en cascade et non pas un 'OU'
		*/
	
		$data = array();

		$this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
		$this->form_validation->set_rules('image', 'Image', 'trim|required|xss_clean|valid_url_format');
		
		//When the form is correctly filled
		if( $this->form_validation->run() == TRUE ) {

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
			
			$this->show_view_with_hf('category_add', $data);
		}
		else { //Default page loaded
			$this->show_view_with_hf('category_add', $data);
		}
	}
}
/* End of file category.php */
/* Location: ./application/controllers/category.php */
?>