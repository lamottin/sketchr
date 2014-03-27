<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends MY_Controller {


	public function __construct() {

		parent::__construct();
	}


	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL :
	 * - base_url()/category/
	 */
	public function index() {

		$data = array();
	
		$pv_search = htmlspecialchars($_GET['pv_search']);
		$data['io'] = $this->sketch_model->findByTitle($pv_search);
		$this->show_view_with_hf('search_view.php', $data);
		
		/*echo $_GET['v_search'];*/
		/*echo $_GET['v'];
		if(isset($_GET['v']))
			echo "j'existe";
		if($_GET['v'] == "")
			echo "je suis vide";*/
	}
	
	//Executed as an AJAX script when the user type 3 chars on the search bar, then we display all the results
	public function ajaxTitle() {
	
		$pv_search = $this->input->get('pv_search');
		if (!$pv_search) return;
		
		//Get all the titles based on the search
		$data['titles'] = $this->sketch_model->findByTitle($pv_search);
		
		//Will be sent to the autocomplete widget to display the results as a select
		foreach ($data['titles'] as $key) {
			if (strpos(strtolower($key->title), $pv_search) !== false) {
				echo $key->title ."\n";
			}
		}
		
		
	}
}
/* End of file search.php */
/* Location: ./application/controllers/search.php */
?>