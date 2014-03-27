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

<<<<<<< HEAD
		$data = array();

		$pv_search = htmlspecialchars($_GET['v_search']);
		$data['io'] = $this->sketch_model->findByTitle($pv_search);
=======
		$pv_search = htmlspecialchars($_GET['pv_search']);
>>>>>>> 7289ecb4dd137ebcef624ce21ac788bf4c384ea0
		
		$data['io'] = $this->sketch_model->findByTitle($pv_search);
		

		$this->show_view_with_hf('search_view.php', $data);
		

		/*echo $_GET['v_search'];*/
		/*echo $_GET['v'];
		if(isset($_GET['v']))
			echo "j'existe";
		if($_GET['v'] == "")
			echo "je suis vide";*/
	}
	
	public function ajaxTitle() {
	
	$pv_search = htmlspecialchars($_GET['pv_search']);
	if (!$pv_search) return;
	/*$items = array(
		"Great Bittern"=>"Botaurus stellaris",
		"Little Grebe"=>"Tachybaptus ruficollis",
		"Black-necked Grebe"=>"Podiceps nigricollis",
		"Little Bittern"=>"Ixobrychus minutus",
		"Black-crowned Night Heron"=>"Nycticorax nycticorax",
		"Purple Heron"=>"Ardea purpurea"
		);*/
	
		$data['titles'] = $this->sketch_model->findByTitle($pv_search);
		foreach ($data['titles'] as $key) {
			if (strpos(strtolower($key->title), $pv_search) !== false) {
				echo $key->title ."\n";
			}
		}
		
		
	}
}
/* End of file search.php */
/* Location: ./application/controllers/category.php */
?>