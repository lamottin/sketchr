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
		
		$this->form_validation->set_rules('id_sketch', '', 'trim|required|xss_clean');
		$this->form_validation->set_rules('id_member', '', 'trim|required|xss_clean');
		$this->form_validation->set_rules('comment', 'Comment', 'trim|required|xss_clean');
		
		if( $this->form_validation->run() == TRUE ) {
			
			//Process data
			$data[0] = $this->input->post("id_sketch");
			$data[1] = $this->input->post("id_member");
			$data[2] = $this->input->post("comment");
			
			//Ajout dans la DB
			$this->comment_model->addComment($data);
			
			// Get the sketch object from the model
			//$data["infos"] = $this->comment_model->getInfoMemberById($data[1]);
			//$data["infos"] = $this->comment_model->getInfoLastCommentBySketch($data[0]);
			$data["infos"] = $this->comment_model->getAllInfoLastComment($data[0]);
			//print_r($data["infos"]);
			foreach($data["infos"] as $data):
				
				// Converting the time to a UNIX timestamp:
				$data->post_date = strtotime($data->post_date);
				
				echo '<div class="comment">
						<div class="avatar">
						'.$data->avatar .'	<img src=" '. base_url('/assets/logo/logo.ico').'" />
						</div>
						<div class="name">'.$data->first_name .' '.$data->last_name.' a &eacutecrit :</div>
						<div class="date" title="Added at '.date('d M Y',$data->post_date).'">le '.date('d M Y',$data->post_date).'</div>
						<p>'.$data->message.'</p>
						</div>
				';
			endforeach;
			//$this->load->view('comment_sheet', $data);
		}
		elseif($this->input->post("submit_com")){
			
			//Show validation error
			$this->data["status"]->message = validation_errors();
			$this->data["status"]->success = FALSE;
			//echo validation_errors();
			//print_r($this->data["status"]);
			//$this->show_view_with_hf('humorist_add', $data);
		}
		else {
			//$this->show_view_with_hf('humorist_add', $data);
		}
		/*
		/ It return true/false depending on whether the data is valid, and populates
		/ the $arr array passed as a paremter (notice the ampersand above) with
		/ either the valid input data, or the error messages.
		

		$errors = array();

		// Using the filter_input function introduced in PHP 5.2.0

		if(!($data['email'] = filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL)))
		{
			$errors['email'] = '<span style="color:red;"> Adresse invalide</span>';
		}

		if(!($data['url'] = filter_input(INPUT_POST,'url',FILTER_VALIDATE_URL)))
		{
			// If the URL field was not populated with a valid URL,
			// act as if no URL was entered at all:
			$url = '';
		}

		// Utilisation d'un filtre personnalisé callback function
		if(!($data['body'] = filter_input(INPUT_POST,'body',FILTER_CALLBACK,array('options'=>'Comment::validate_text'))))
		{
			$errors['body'] = '<span style="color:red;"> Entrez un commentaire</span>';
		}

		if(!($data['name'] = filter_input(INPUT_POST,'name',FILTER_CALLBACK,array('options'=>'Comment::validate_text'))))
		{
			$errors['name'] = '<span style="color:red;"> Nom manquant</span>';
		}

		if(!empty($errors)){
			// s'il y des erreurs : on les copie dans $errors array à $arr
			$arr = $errors;
			return false;
		}

		// si les données sont valides, on nettoie le code HTML et on les copie dans $arr
		foreach($data as $k=>$v){
			$arr[$k] = mysql_real_escape_string($v);
		}

		// On s'assure que l'adresse email est bien en minuscule
		$arr['email'] = strtolower(trim($arr['email']));
		return true;
		*/
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