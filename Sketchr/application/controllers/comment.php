<?php 

class Comment extends MY_Controller {
 
	public function __construct() {

		/*
		/ Le constructeur
		*/
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('comment_model');	
		$this->load->library('form_validation');
		
	}
	
	public function index() {

	}
	

	/*
	 * This method is used to validate the data sent via AJAX.
	*/
	public function add()
	{

		$data = array();
		
		//The rules to validate the form
		$this->form_validation->set_rules('id_sketch', '', 'trim|required|xss_clean');
		$this->form_validation->set_rules('id_member', '', 'trim|required|xss_clean');
		$this->form_validation->set_rules('comment', 'Comment', 'trim|required|xss_clean');
		
		//If the form is correctly filled
		if( $this->form_validation->run() == TRUE ) {
			
			//Get the POST data
			$data[0] = $this->input->post("id_sketch");
			$data[1] = $this->input->post("id_member");
			$data[2] = $this->input->post("comment");
			
			//Add into DB
			$this->comment_model->addComment($data);
			
			// Get the sketch object from the model
			$data["infos"] = $this->comment_model->getAllInfoLastComment($data[0]);
			
			//Retrieve the information from the request
			foreach($data["infos"] as $data):
				
				$data->post_date = strtotime($data->post_date);
				$result["post_date"]= date('d-m-Y H:i',$data->post_date); //Produce "27-03-2014 20:53"
				$result["avatar"]= $data->avatar;
				$result["firstname"]= $data->first_name;
				$result["lastname"]= $data->last_name;
				$result["message"]= $data->message;
				
			endforeach;
			
			//We encode the data to send them to AJAX
			echo json_encode($result);
			
		}
		elseif($this->input->post("submit_com")){ //If there are errors in the form
			
			//Show validation error
			$this->data["status"]->message = validation_errors();
			$this->data["status"]->success = FALSE;
			
		}
	
	}

	private static function validate_text($str)
	{
		/*
		/ La méthode utilisée pour le filtre des champs FILTER_CALLBACK
		*

		if(mb_strlen($str,'utf8')<1)
		return false;

		// Encoder les caractères spéciaux tel que (<, >, ", & .. etc) et les convertir
		// Modifier les nouvelles lignes par la balise <br>
		$str = nl2br(htmlspecialchars($str));

		// Enlever les lignes inutiles
		$str = str_replace(array(chr(10),chr(13)),'',$str);
		return $str;*/
	}
}
?>