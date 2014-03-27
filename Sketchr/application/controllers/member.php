<?php 

class Member extends MY_Controller {
 
	public function __construct() {

		/*
		/ Le constructeur
		*/
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('member_model');	
		$this->load->library('form_validation');
		
	}
	
	public function index() {
		echo "hello";
	}


	public function addMemberPage() {
		$data = array();
		$this->show_view_with_hf('member_add', $data);
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
		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email|max_length[100]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[5]|max_length[100]|alpha_dash');
		$this->form_validation->set_rules('confirm', 'Confirm', 'trim|required|xss_clean|matches[password]');
		$this->form_validation->set_rules('country', 'Country', 'trim|required|xss_clean|max_length[50]');
		$this->form_validation->set_rules('postcode', 'Postcode', 'trim|required|xss_clean|max_length[50]|numeric');
		$this->form_validation->set_rules('city', 'City', 'trim|required|xss_clean|max_length[50]');
		$this->form_validation->set_rules('birthdate', 'Birthdate', 'trim|xss_clean|valid_date_format|date_validator');
		
		if( $this->form_validation->run() == TRUE ) {
			
			//process data
			$data = array();
			$data[0] = $this->input->post("firstname");
			$data[1] = $this->input->post("lastname");
			$data[2] = $this->input->post("email");
			$data[3] = $this->input->post("password");
			$data[4] = $this->input->post("confirm");
			$data[5] = $this->input->post("country");
			$data[6] = $this->input->post("postcode");
			$data[7] = $this->input->post("city");
			$data[8] = $this->input->post("birthdate");
			
			$this->member_model->create($data);
		
			$this->show_view_with_hf('home', $data);
		}
		elseif($this->input->post("submit")){
			
			//show validation error
			$this->data["status"]->message = validation_errors();
			$this->data["status"]->success = FALSE;
			//print_r($this->data["status"]);
			$data=array();
			$this->show_view_with_hf('member_add', $data);
		}
		else {
			$data = array();
			$this->show_view_with_hf('member_add', $data);
		}
	}


	/* This function is used to login the user when 
	 * the user POSTs the login form in the header 
	 */
	public function login() {

				
		// retrieve the content from the form
		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|max_length[100]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|max_length[100]');
		
		// if the form is valid
		if( $this->form_validation->run() == TRUE ) {
			
			//process data
			$data = array();
			$data[0] = $this->input->post("email");
			$data[1] = $this->input->post("password");

			// retrieve the user from the database using the email from the form
			$data['user'] = $this->member_model->getByEmail($data[0]);
			// if the user is found
			if($data['user'] != null) {
				// verify that the password matches the password from database
				if($this->member_model->verifyPassword($data)) {
					//if it does
					$result['status'] = "good";
					$result['message'] = "Correct password";
					$this->session->set_userdata($data['user']);
					$result['user'] = $this->session->all_userdata();
				}
				else {
					//if it doesn't
					$result['status'] = "notgood";
					$result['message'] = "Wrong password";
				}
			}
			// Email not found in database
			else {
				$result['status'] = "notgood";
				$result['message'] = "User doesn't exist";
			}
		}
		elseif($this->input->post("submit")) {
			
			//show validation error
			$result['status'] = "notgood";
			$result['message'] = "Unknown error";
		}
		else {
			return $data;
		}		
		echo json_encode($result);
	}


}
?>