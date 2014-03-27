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

		$pv_search = htmlspecialchars($_GET['v_search']);
		$data['io'] = $this->sketch_model->findByTitle($pv_search);
		

		

		$this->show_view_with_hf('search_view.php', $data);
		

		/*echo $_GET['v_search'];*/
		/*echo $_GET['v'];
		if(isset($_GET['v']))
			echo "j'existe";
		if($_GET['v'] == "")
			echo "je suis vide";*/
	}
}
/* End of file search.php */
/* Location: ./application/controllers/category.php */
?>