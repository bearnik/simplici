<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Static Pages Controller
 */
class Statics extends CI_Controller {
	
	function __construct() {
		parent::__construct();
        $this->load->model('statics_model');
	}
    
    
    // Index page for statics
    function index() {
        show_error(404);
    }
    
    // show static page content
    function show($static_id = null ) {
        $data = array();
        $data['content_page'] = 'statics_contnet';
        $data['statics_content'] = array();
        // TODO Retreive data from model
        $this->load->view('layout',$data);
    }
}
