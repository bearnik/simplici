<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Calendar Controller Class
 */
class Calendar extends CI_Controller {
	
	function __construct() {
		parent::__construct();
        $this->load->model('calendar_model');
	}
    
    // Calendar Index page
    function index() {
        $data = array();
        $data['content_page'] = 'calendar_listing';
        $data['events'] = array();
        
        // loading layout view with page and content
        $this->load->view('layout',$data);
    }
    
    // show Event By ID
    function event($eventID = null ) {
        $data = array();
        $data['content_page'] = 'calendar_event';
        $data['event'] = array();
        
        $this->load->view('layout',$data);
    }
}
