<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sketch extends MY_Controller {


	public function __construct() {

		parent::__construct();
		$this->load->helper('form');
		$this->load->model('sketch_model');
		$this->load->model('comment_model');
		$this->load->model('like_dislike_model');
		$this->load->model('deadlink_model');
		$this->load->model('sketch_comment_like_dislike_model');
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

		$this->form_validation->set_rules('URL', 'URL', 'trim|required|xss_clean|valid_url_format');
		$this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
		$this->form_validation->set_rules('type', 'Type', 'trim|required|xss_clean'); 
		$this->form_validation->set_rules('release', 'Release', 'trim|required|xss_clean|valid_date_format|date_validator');
		$this->form_validation->set_rules('synopsis', 'Synopsis', 'trim|required|xss_clean');
		$this->form_validation->set_rules('URLimage', 'URLimage', 'trim|required|xss_clean|valid_url_format');
		
		if( $this->form_validation->run() == TRUE ) {
			
			//process data
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
			$data['types'] = $this->sketch_type_model->listAllTypes();
			$this->show_view_with_hf('sketch_add', $data);
		}
		else {
			$data['types'] = $this->sketch_type_model->listAllTypes();
			$this->show_view_with_hf('sketch_add', $data);
		}
	}

    //Function to calculate the percent
    function percent($num_amount, $num_total) {
        $count1 = ($num_total !== 0) ? $num_amount / $num_total : 0; //Avoid division by Zero
        $count2 = $count1 * 100;
        $count = number_format($count2, 0);
        return $count;
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
		$data['sketch_embedded_link'] = $this->get_embedded_link($data['sketch']->video_link);

		// Get the humorist object from the model
		$data['sketch_type'] = $this->sketch_type_model->getById($data['sketch']->sketch_type );

		// Get all related Sketchs for easy navigation
		$data['related_sketchs'] = $this->sketch_model->findRelatedSketch($data['sketch']);
		
		/* Here I got all the infos of a comment in an array and his likes/dislikes, already liked/disliked
		* "comments" => StdObject; so in the view to get the field we type (in a foreach) $value["comments"]->field_name as in $value["comments"]->post_date
		* "likes" => number of likes; $value["likes"] in a view to get the data
		* "dislikes" => number of dislikes; $value["dislikes"] in a view to get the data
		* "already_liked" => boolean; $value["already_liked"] in a view to get the data
		* "already_disliked" => boolean; $value["already_disliked"] in a view to get the data
		*/
		$infos['comments'] = $this->comment_model->listAllBySketch($data['sketch']->id);
		foreach($infos['comments'] as $info ) {
			$data['comments'][] = array(
				"comments" => $info, //The object with all the fields
				"likes" => $this->sketch_comment_like_dislike_model->getAllCountByActComment($info->id,1), //Get the number of likes
				"dislikes" => $this->sketch_comment_like_dislike_model->getAllCountByActComment($info->id,2), //Get the number of dislikes
				"already_liked" => ($this->sketch_comment_like_dislike_model->getCountByActUserComment($_SERVER['REMOTE_ADDR'],$info->id,1) == 1) ? true: false, //Check if the user already liked
				"already_disliked" => ($this->sketch_comment_like_dislike_model->getCountByActUserComment($_SERVER['REMOTE_ADDR'],$info->id,2) == 1) ? true: false, //Check if the user already disliked
			);
		}
		
		$data['already_reported'] = $this->deadlink_model->getBySketch($data['sketch']->id);
		
		$user_ip = $_SERVER['REMOTE_ADDR'];
		//Check if the user has already clicked on the unlike (rate = 2) or the like (rate = 1)
        $like_count = $this->like_dislike_model->getCountByActUserSketch($user_ip, $data['sketch']->id, 1);  //'SELECT COUNT(*) FROM  wcd_yt_rate WHERE ip = "'.$user_ip.'" and id_item = "'. $data['sketch']->id.'" and rate = 1 '
		$dislike_count = $this->like_dislike_model->getCountByActUserSketch($user_ip, $data['sketch']->id, -1);//'SELECT COUNT(*) FROM  wcd_yt_rate WHERE ip = "'.$user_ip.'" and id_item = "'. $data['sketch']->id.'" and rate = 2 '
        
        //Count all the rate 
        $rate_all_count = $this->like_dislike_model->getAllCountBySketch($data['sketch']->id); //'SELECT COUNT(*) FROM wcd_yt_rate WHERE id_item = "'.$id_sketch.'"'
        
        $rate_like_count =  $this->like_dislike_model->getAllCountByActSketch($data['sketch']->id,1); //'SELECT COUNT(*) FROM wcd_yt_rate WHERE id_item = "'.$pageID.'" and rate = 1'
		$rate_dislike_count = $this->like_dislike_model->getAllCountByActSketch($data['sketch']->id,-1); //'SELECT COUNT(*) FROM wcd_yt_rate WHERE id_item = "'.$pageID.'" and rate = 2'
		
        $rate_like_percent = $this->percent($rate_like_count, $rate_all_count);        
        $rate_dislike_percent = $this->percent($rate_dislike_count, $rate_all_count);
		
		//The data for customizing the like/dislike panel
		$data['like_count'] = $like_count;
		$data['dislike_count'] = $dislike_count;
		$data['rate_all_count'] = $rate_all_count;
		$data['rate_like_count'] = $rate_like_count;
		$data['rate_dislike_count'] = $rate_dislike_count;
		$data['rate_like_percent'] = $rate_like_percent;
		$data['rate_dislike_percent'] = $rate_dislike_percent;
		
		$this->show_view_with_hf('sketch_sheet', $data);
	}
	
	/**
	 * Maps to the following URL :
	 * - base_url()/sketch/like_dislike
	 *
	 * Since this function is set as the route for like_dislike in
	 * config/routes.php, it maps to the following URL too :
	 * - base_url()/like_dislike
	 */
	public function like_dislike() {
	
		
		$user_ip = $_SERVER['REMOTE_ADDR'];
		
		//Retrieve the POST datas send via AJAX (views/sketch_sheet)
		$act = $this->input->post('act');
		$sketchID = $this->input->post('sketchID');
		
		//Check if the user has already clicked on the unlike (rate = 2) or the like (rate = 1)
        $like_count = $this->like_dislike_model->getCountByActUserSketch($user_ip, $sketchID, 1); //'SELECT COUNT(*) FROM  wcd_yt_rate WHERE ip = "'.$user_ip.'" and id_item = "'. $data['sketch']->id.'" and rate = 1 '
		$dislike_count = $this->like_dislike_model->getCountByActUserSketch($user_ip, $sketchID, -1); //'SELECT COUNT(*) FROM  wcd_yt_rate WHERE ip = "'.$user_ip.'" and id_item = "'. $data['sketch']->id.'" and rate = 2 '

		if($act == 'like'){ //if the user click on "like"
			
			//We insert a new entry with rate = 1 (like)
			if(($like_count == 0) && ($dislike_count == 0)){
				$this->like_dislike_model->addAct($sketchID, $user_ip, 1); //'INSERT INTO wcd_yt_rate (id_item, ip, rate )VALUES("'.$sketchID.'", "'.$user_ip.'", 1)'
			}
			//We update the previous one (a dislike)
			else if($dislike_count == 1){
				$this->like_dislike_model->updateAct($sketchID, $user_ip, 1); //'UPDATE wcd_yt_rate SET rate = 1 WHERE id_item = '.$sketchID.' and ip ="'.$user_ip.'"'
			}
		}
		
		else if($act == 'dislike') { //if the user click on "dislike"
			
			//We insert a new entry with rate = 2 (dislike)
			if(($like_count == 0) && ($dislike_count == 0)){
				$this->like_dislike_model->addAct($sketchID, $user_ip, -1); //'INSERT INTO wcd_yt_rate (id_item, ip, rate )VALUES("'.$sketchID.'", "'.$user_ip.'", 2)'
			}
			//We update the previous one (a like)
			else if($like_count == 1){
				$this->like_dislike_model->updateAct($sketchID, $user_ip, -1); //'UPDATE wcd_yt_rate SET rate = 2 WHERE id_item = '.$sketchID.' and ip ="'.$user_ip.'"'
			}
		}
		
		//For AJAX
		//Count all the rate 
        $rate_all_count = $this->like_dislike_model->getAllCountBySketch($sketchID); //'SELECT COUNT(*) FROM  wcd_yt_rate WHERE id_item = "'.$id_sketch.'"'
        
        $rate_like_count =  $this->like_dislike_model->getAllCountByActSketch($sketchID,1); //'SELECT COUNT(*) FROM  wcd_yt_rate WHERE id_item = "'.$pageID.'" and rate = 1'
		$rate_dislike_count = $this->like_dislike_model->getAllCountByActSketch($sketchID,-1); //'SELECT COUNT(*) FROM  wcd_yt_rate WHERE id_item = "'.$pageID.'" and rate = 2'
		
        $rate_like_percent = $this->percent($rate_like_count, $rate_all_count);        
        $rate_dislike_percent = $this->percent($rate_dislike_count, $rate_all_count);
		
		$return['rate_all_count'] = $rate_all_count;
		$return['rate_like_count'] = $rate_like_count;
		$return['rate_dislike_count'] = $rate_dislike_count;
		$return['rate_like_percent'] = $rate_like_percent;
		$return['rate_dislike_percent'] = $rate_dislike_percent;
		echo json_encode($return);
	}


	public function report_deadlink() {
			
			$id_member = $this->input->post('id_member');
			$sketchID = $this->input->post('id_sketch');

			$this->deadlink_model->addDeadLink($sketchID, $id_member);
			$result["id_member"] = $id_member ;
			$result["id_sketch"] = $id_sketch;
			
			echo json_encode($result);
	}

	private function get_embedded_link($video_link) {

		$parts = explode("=", $video_link);

		return '//www.youtube.com/embed/'.end($parts);
	}

}
/* End of file sketch.php */
/* Location: ./application/controllers/sketch.php */
?>