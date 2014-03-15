<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
/**
 * Additional validations for URL format.
 *
 * @package      Module Creator
 * @subpackage  ThirdParty
 * @category    Libraries
 * @author  Anup Shakya 
 * @created 01/10/2013
 */
 
class MY_Form_validation extends CI_Form_validation{
     
   public function __construct()
   {
     parent::__construct();
    }  
                         
    /**
     * Validate URL format
     *
     * @access  public
     * @param   string
     * @return  string
     */
    function valid_url_format($str){
        $pattern = "|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i";
        if (!preg_match($pattern, $str)){
            $this->set_message('valid_url_format', 'The URL you entered is not correctly formatted.');
            return FALSE;
        }
 
        return TRUE;
    }

	/**
     * Validate Date format
     *
     * @access  public
     * @param   string
     * @return  string
     */
	function valid_date_format($str){
        $pattern = "/^(0[1-9]|[12][0-9]|3[01])-(0[1-9]|1[012])-(19|20)\d\d$/";
        if (!preg_match($pattern, $str)){
            $this->set_message('valid_date_format', 'The Date you entered is not correctly formatted.');
            return FALSE;
        }
 
        return TRUE;
    }
	
	//Fonction à implémenter pour valider la date
	function date_validator($str)
	{
		//Utiliser REGEX + DATE TIME + Voir le helper Date aussi
		$date = explode('-',$str);
		$day = $date[0];
		$month = $date[1];
		$year = $date[2];
		
		if ( $day == "31" && ($month == "4" || $month =="6" || $month=="9" || $month=="11" || $month=="04" || $month =="06" || $month=="09")) {
					
			$this->set_message('date_validator', 'The Date you entered is not correct.');
			return false; // only 1,3,5,7,8,10,12 has 31 $days
		}
		else if ($month=="2" || $month=="02") {
					
			//leap $year
			if($year % 4==0){
						
				if($day=="30" || $day=="31"){
					$this->set_message('date_validator', 'The Date you entered is not correct.');		
					return false;
				}
				else {
						
					return true;
				}
			}
			else {
			         
				if($day=="29"||$day=="30"||$day=="31"){
					$this->set_message('date_validator', 'The Date you entered is not correct.');	
					return false;
				}
						
				else {
							
					return true;
				}
			}
		}
		else {				 
					
			return true;				 
		}
	}
    // --------------------------------------------------------------------
     
 
    /**
     * Validates that a URL is accessible. Also takes ports into consideration. 
     * Note: If you see "php_network_getaddresses: getaddrinfo failed: nodename nor servname provided, or not known" 
     *          then you are having DNS resolution issues and need to fix Apache
     *
     * @access  public
     * @param   string
     * @return  string
     */
    function url_exists($url){                                   
        $url_data = parse_url($url); // scheme, host, port, path, query
        if(!fsockopen($url_data['host'], isset($url_data['port']) ? $url_data['port'] : 80)){
            $this->set_message('url_exists', 'The URL you entered is not accessible.');
            return FALSE;
        }               
         
        return TRUE;
    }  
}
// END Form Validation Class

/* End of file My_Form_validation.php */
/* Location: ./application/libraries/My_Form_validation.php */
?>