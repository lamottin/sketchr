<?php 

class Comment extends MY_Controller {
 
	public function __construct() {

		/*
		/ Le constructeur
		*/
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('comment_model');
		$this->load->model('sketch_comment_like_dislike_model');		
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
				$result["id"]= $data->id;
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
	
	/**
	 * Maps to the following URL :
	 * - base_url()/comment/like_dislike_comment
	 *
	 * Since this function is set as the route for like_dislike in
	 * config/routes.php, it maps to the following URL too :
	 * - base_url()/like_dislike_comment
	 */
	public function like_dislike_comment() {
	
		
		$user_ip = $_SERVER['REMOTE_ADDR'];
		
		//Retrieve the POST datas send via AJAX (views/sketch_sheet)
		$act = $this->input->post('act');
		$commentID = $this->input->post('commentID');
		
		//Check if the user has already clicked on the unlike (rate = 2) or the like (rate = 1)
        $like_count = $this->sketch_comment_like_dislike_model->getCountByActUserComment($user_ip, $commentID, 1); //'SELECT COUNT(*) FROM  wcd_yt_rate WHERE ip = "'.$user_ip.'" and id_item = "'. $data['sketch']->id.'" and rate = 1 '
		$dislike_count = $this->sketch_comment_like_dislike_model->getCountByActUserComment($user_ip, $commentID, 2); //'SELECT COUNT(*) FROM  wcd_yt_rate WHERE ip = "'.$user_ip.'" and id_item = "'. $data['sketch']->id.'" and rate = 2 '

		if($act == 'like'){ //if the user click on "like"
			
			//We insert a new entry with rate = 1 (like)
			if(($like_count == 0) && ($dislike_count == 0)){
				$this->sketch_comment_like_dislike_model->addAct($commentID, $user_ip, 1); //'INSERT INTO wcd_yt_rate (id_item, ip, rate )VALUES("'.$commentID.'", "'.$user_ip.'", 1)'
			}
			//We update the previous one (a dislike)
			else if($dislike_count == 1){
				$this->sketch_comment_like_dislike_model->updateAct($commentID, $user_ip, 1); //'UPDATE wcd_yt_rate SET rate = 1 WHERE id_item = '.$commentID.' and ip ="'.$user_ip.'"'
			}
		}
		
		else if($act == 'dislike') { //if the user click on "dislike"
			
			//We insert a new entry with rate = 2 (dislike)
			if(($like_count == 0) && ($dislike_count == 0)){
				$this->sketch_comment_like_dislike_model->addAct($commentID, $user_ip, 2); //'INSERT INTO wcd_yt_rate (id_item, ip, rate )VALUES("'.$commentID.'", "'.$user_ip.'", 2)'
			}
			//We update the previous one (a like)
			else if($like_count == 1){
				$this->sketch_comment_like_dislike_model->updateAct($commentID, $user_ip, 2); //'UPDATE wcd_yt_rate SET rate = 2 WHERE id_item = '.$commentID.' and ip ="'.$user_ip.'"'
			}
		}
		
		//For AJAX
		//Count all the rate 
        
        $rate_like_count =  $this->sketch_comment_like_dislike_model->getAllCountByActComment($commentID,1); //'SELECT COUNT(*) FROM  wcd_yt_rate WHERE id_item = "'.$pageID.'" and rate = 1'
		$rate_dislike_count = $this->sketch_comment_like_dislike_model->getAllCountByActComment($commentID,2); //'SELECT COUNT(*) FROM  wcd_yt_rate WHERE id_item = "'.$pageID.'" and rate = 2'
		
        
		$return['rate_like_count_comment'] = $rate_like_count;
		$return['rate_dislike_count_comment'] = $rate_dislike_count;
		echo json_encode($return);
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