<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sketch extends MY_Controller {


	public function __construct() {

		parent::__construct();
		$this->load->helper('form');
		$this->load->model('sketch_model');
		$this->load->model('comment_model');
		$this->load->model('like_dislike_model');
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
		$this->form_validation->set_rules('URL', 'URL', 'trim|required|xss_clean|valid_url_format');
		$this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
		$this->form_validation->set_rules('type', 'Type', 'trim|required|xss_clean'); 
		$this->form_validation->set_rules('release', 'Release', 'trim|required|xss_clean|valid_date_format|date_validator');
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
			$data['types'] = $this->sketch_type_model->listAllTypes();
			$this->show_view_with_hf('sketch_add', $data);
		}
		else {
			$data['types'] = $this->sketch_type_model->listAllTypes();
			$this->show_view_with_hf('sketch_add', $data);
		}
	}

    //function to calculate the percent
    function percent($num_amount, $num_total) {
        $count1 = $num_amount / $num_total;
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

		// Get the humorist object from the model
		$data['sketch_type'] = $this->sketch_type_model->getById($data['sketch']->sketch_type );
		$data['comments'] = $this->comment_model->listAllBySketch($data['sketch']->id);
		
		$user_ip = $_SERVER['REMOTE_ADDR'];
		//Check if the user has already clicked on the unlike (rate = 2) or the like (rate = 1)
        $like_count = $this->like_dislike_model->getCountByActUserSketch($user_ip, $data['sketch']->id, 1);  //'SELECT COUNT(*) FROM  wcd_yt_rate WHERE ip = "'.$user_ip.'" and id_item = "'. $data['sketch']->id.'" and rate = 1 '
		$dislike_count = $this->like_dislike_model->getCountByActUserSketch($user_ip, $data['sketch']->id, 2);//'SELECT COUNT(*) FROM  wcd_yt_rate WHERE ip = "'.$user_ip.'" and id_item = "'. $data['sketch']->id.'" and rate = 2 '
        
        //Count all the rate 
        $rate_all_count = $this->like_dislike_model->getAllCountBySketch($data['sketch']->id); //'SELECT COUNT(*) FROM  wcd_yt_rate WHERE id_item = "'.$id_sketch.'"'
        
        $rate_like_count =  $this->like_dislike_model->getAllCountByActSketch($data['sketch']->id,1); //'SELECT COUNT(*) FROM  wcd_yt_rate WHERE id_item = "'.$pageID.'" and rate = 1'
		$rate_dislike_count = $this->like_dislike_model->getAllCountByActSketch($data['sketch']->id,2); //'SELECT COUNT(*) FROM  wcd_yt_rate WHERE id_item = "'.$pageID.'" and rate = 2'
		
        $rate_like_percent = $this->percent($rate_like_count, $rate_all_count);        
        $rate_dislike_percent = $this->percent($rate_dislike_count, $rate_all_count);
		
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
		$act = $this->input->post('act');
		$sketchID = $this->input->post('sketchID');
		
		//Check if the user has already clicked on the unlike (rate = 2) or the like (rate = 1)
        $like_count = $this->like_dislike_model->getCountByActUserSketch($user_ip, $sketchID, 1); //'SELECT COUNT(*) FROM  wcd_yt_rate WHERE ip = "'.$user_ip.'" and id_item = "'. $data['sketch']->id.'" and rate = 1 '
		$dislike_count = $this->like_dislike_model->getCountByActUserSketch($user_ip, $sketchID, 2); //'SELECT COUNT(*) FROM  wcd_yt_rate WHERE ip = "'.$user_ip.'" and id_item = "'. $data['sketch']->id.'" and rate = 2 '

		if($act == 'like'): //if the user click on "like"
			if(($like_count == 0) && ($dislike_count == 0)){
				$this->like_dislike_model->addAct($sketchID, $user_ip, 1); //'INSERT INTO wcd_yt_rate (id_item, ip, rate )VALUES("'.$sketchID.'", "'.$user_ip.'", 1)'
			}
			if($dislike_count == 1){
				$this->like_dislike_model->updateAct($sketchID, $user_ip, 1); //'UPDATE wcd_yt_rate SET rate = 1 WHERE id_item = '.$sketchID.' and ip ="'.$user_ip.'"'
			}

		endif;
		if($act == 'dislike'): //if the user click on "dislike"
			if(($like_count == 0) && ($dislike_count == 0)){
				$this->like_dislike_model->addAct($sketchID, $user_ip, 2); //'INSERT INTO wcd_yt_rate (id_item, ip, rate )VALUES("'.$sketchID.'", "'.$user_ip.'", 2)'
			}
			if($like_count == 1){
				$this->like_dislike_model->updateAct($sketchID, $user_ip, 2); //'UPDATE wcd_yt_rate SET rate = 2 WHERE id_item = '.$sketchID.' and ip ="'.$user_ip.'"'
			}

		endif;
	}


	public function dead_link() {

			
			$user = $_SERVER['REMOTE_ADDR'];
			$sketchID = $this->input->post('sketchID');

			$this->deadlink_model->addDeadLink($sketchID, $user_ip);

	}



}
/* End of file sketch.php */
/* Location: ./application/controllers/sketch.php */
?>