<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sketchtype extends MY_Controller {


	public function __construct() {
		
		parent::__construct();
		$this->load->library('form_validation');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL :
	 * - base_url()/sketchtype/
	 */
	public function index()
	{
	}

	/**
	 * Maps to the following URL :
	 * - base_url()/sketchtype/access_sketchtype_by_id
	 *
	 * Since this function is set as the route for serie/(:num) in
	 * config/routes.php, it maps to the following URL too :
	 * - base_url()/serie/(:num)
	 */
	public function access_sketchtype_by_id(){
		$data = array();

		// Get the category object which we are trying to access from the model
		$data['sketch_type'] = $this->sketch_type_model->getById($this->uri->segment(2));
		// WHAT TO DO IF IT RETURNS NULL? HAVE TO IMPLEMENT THAT !!!!

		// Get the list of sketch_types for this category
		$data['sketchs'] = $this->sketch_model->listBySketchTypeId($data['sketch_type']->id);

		$this->show_view_with_hf('sketch_type_sheet', $data);
	}
	
	/**
	 * Get the data sent by _POST from the form used to add a new sketch_type
	 * and passes it to sketch_type_model for insertion in the database
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
		$this->form_validation->set_rules('start_date', 'Start date', 'trim|required|xss_clean|valid_date_format|date_validator'); 
		$this->form_validation->set_rules('image', 'Image', 'trim|required|xss_clean|valid_url_format');
		$this->form_validation->set_rules('synopsis', 'Synopsis', 'trim|required|xss_clean');
		$this->form_validation->set_rules('category', 'Category', 'trim|required|xss_clean');
		$this->form_validation->set_rules('humorist', 'Humorist', 'trim|required|xss_clean');
		
		//If the form is correctly filled, then we process the data
		if( $this->form_validation->run() == TRUE ) {
			
			//Retrieve the data
			$data[0] = $this->input->post("title");
			$data[1] = $this->input->post("start_date");
			$data[2] = $this->input->post("image");
			$data[3] = $this->input->post("synopsis");
			$data[4] = $this->input->post("category");
			$data[5] = $this->input->post("humorist");
			
			//Add into database via the model
			$this->sketch_type_model->add($data);
			
			
			//Ajout des humoristes & liaison avec leur categorie
			$st = $this->sketch_type_model->lastAdded();
			$data['st'] = $st[0];
			$h['sketch_type'] = $st[0]->id;
			
			$this->load->model('sketch_type_humorist_model');
			if(is_array($_POST['humorist']))
			{
				foreach($_POST['humorist'] as $ahumorist)
				{
					$h['humorist'] = $ahumorist;
					$this->sketch_type_humorist_model->add($h);
				}
			}
			else
			{
				$h['humorist'] = $_POST['humorist'];
				$this->sketch_type_humorist_model->add($h);
			}
			
			$data['message'] = "This sketch has been added. In few seconds you will be redirect in its descriptive page";
			
			$this->show_view_with_hf('sketch_type_processed', $data);
		}
		elseif($this->input->post("create")){ //If there's some errors in the form, the wrong fields are highlighted with an alert. As for the correct ones, the values that the users typed remain there so that he hasn't to fill them again.
			
			//show validation error
			$this->data["status"]->message = validation_errors();
			$this->data["status"]->success = FALSE;
			//print_r($this->data["status"]);
			$data['humorists'] = $this->humorist_model->listAllByLastName();
			$this->show_view_with_hf('sketch_type_add', $data);
		}
		else { //Default
			$data['humorists'] = $this->humorist_model->listAllByLastName();
			$this->show_view_with_hf('sketch_type_add', $data);
		}
	}
}

/* End of file sketchtype.php */
/* Location: ./application/controllers/sketchtype.php */