<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Humorist extends MY_Controller {


	public function __construct() {

		parent::__construct();
		$this->load->helper('form');
		$this->load->model('humorist_model');	
		$this->load->library('form_validation');
	}

	public function index() {

	}

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
		$this->form_validation->set_rules('firstname', 'Firstname', 'trim|required|xss_clean|max_length[50]');
		$this->form_validation->set_rules('lastname', 'Lastname', 'trim|required|xss_clean|max_length[50]');
		$this->form_validation->set_rules('birthdate', 'Birthdate', 'trim|xss_clean|valid_date_format|date_validator');
		$this->form_validation->set_rules('image', 'Image', 'trim|required|xss_clean|valid_url_format');
		
		if( $this->form_validation->run() == TRUE ) {
			
			//process data
			$data = array();
			$data[0] = $this->input->post("firstname");
			$data[1] = $this->input->post("lastname");
			$data[2] = $this->input->post("birthdate");
			$data[3] = $this->input->post("image");
			
			$this->humorist_model->addHumorist($data);
		
			$this->show_view_with_hf('home', $data);
		}
		elseif($this->input->post("submit")){
			
			//show validation error
			$this->data["status"]->message = validation_errors();
			$this->data["status"]->success = FALSE;
			//print_r($this->data["status"]);
			$data=array();
			$this->show_view_with_hf('humorist_add', $data);
		}
		else {
			$data = array();
			$this->show_view_with_hf('humorist_add', $data);
		}
	}
}
/* End of file humorist.php */
/* Location: ./application/controllers/humorist.php */
?>