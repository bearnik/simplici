<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Controller Class Login
 * =========================
 * Index just print login page 
 *      and redirect on success
 */
class Login extends SCI_Controller {
	
	function __construct() {
		parent::__construct();
        
        // loading adminuser_model
        $this->load->model('adminuser_model');
	}
    
    function idnex() {
        $data['contArr'] = 'profile/login_page';
        
        // TODO Checking if form is submitted
        //  TODO checking for admin credentials
        //      TODO if error setting flash message
        //      TODO if success redirecting to dashboard        
        $this->load->view('layout',$data);
    }
}
