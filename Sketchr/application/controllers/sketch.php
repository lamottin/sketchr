<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sketch extends MY_Controller {


	public function __construct() {

		parent::__construct();
		$this->load->helper('form');
		$this->load->model('sketch_model');
		$this->load->library('form_validation');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL :
	 * - base_url()/sketch/
	 */
	public function index() {

	}


	/*public function url_cheking($str){

		 $pattern = "/^(http|https|ftp):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i";
         if (!preg_match($pattern, $str))
         {
               return FALSE;
          }
         
         return TRUE;
	}


	 public function valid_url_format($str){
        $pattern = "|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i";
        if (!preg_match($pattern, $str)){
            $this->set_message('valid_url_format', 'The URL you entered is not correctly formatted.');
            return FALSE;
        }
 
        return TRUE;
    } 
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
		$this->form_validation->set_rules('URL', 'URL', 'trim|required|xss_clean|valid_url_format');
		$this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
		$this->form_validation->set_rules('type', 'Type', 'trim|required|xss_clean'); 
		$this->form_validation->set_rules('release', 'Release', 'trim|required|xss_clean');
		$this->form_validation->set_rules('synopsis', 'Synopsis', 'trim|required|xss_clean');
		$this->form_validation->set_rules('URLimage', 'URLimage', 'trim|required|xss_clean|valid_url_format');
		
		if( $this->form_validation->run() == TRUE ) {
			
			//process data
			$data = array();
			$data[0] = $this->input->post("URL");
			$data[1] = $this->input->post("title");
			$data[2] = $this->input->post("type");
			$data[3] = $this->input->post("release");
			$data[4] = $this->input->post("synopsis");
			$data[5] = $this->input->post("URLimage");

			
			$this->sketch_model->addSketch($data);
		
			$this->show_view_with_hf('home', $data);
		}
		elseif($this->input->post("submit")){
			
			//show validation error
			$this->data["status"]->message = validation_errors();
			$this->data["status"]->success = FALSE;
			//print_r($this->data["status"]);
			$data=array();
			$this->show_view_with_hf('sketch_add', $data);
		}
		else {
			$data = array();
			$this->show_view_with_hf('sketch_add', $data);
		}
	}

	/**
	 * Maps to the following URL :
	 * - base_url()/sketch/access_sketch_by_id
	 *
	 * Since this function is set as the route for category/(:num) in
	 * config/routes.php, it maps to the following URL too :
	 * - base_url()/watch/(:num)
	 */
	public function access_sketch_by_id(){
		$data = array();

		// Get the sketch object from the model
		$data['sketch'] = $this->sketch_model->getById($this->uri->segment(2));
		// WHAT TO DO IF IT RETURNS NULL? HAVE TO IMPLEMENT THAT !!!!

		// Get the humorist object from the model
		$data['sketch_type'] = $this->sketch_type_model->getById($data['sketch']->sketch_type );
		print_r($data['sketch_type']);

		$this->show_view_with_hf('sketch_sheet', $data);
	}
}
/* End of file sketch.php */
/* Location: ./application/controllers/sketch.php */
?>