<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Gallery Controller Class
 */
class Gallery extends CI_Controller {
	
	function __construct() {
		parent::__construct();
        $this->load->model('gallery_model');
	}
    
    // Index Gallery Page
    function index() {
        $data['content_page'] = 'gallery_home';
        $data['gallery'] = array();
        // TODO Retrieve photos for index page
        $this->load->view('layouts',$data);
    }
    
    function category($category_id = null ) {
        $data['content_pageg'] = 'gallery_list';
        $data['gallery'] = array();
        // TODO Retrieve photos by Gallery ID
        $this->load->view('layouts',$data);
    }
}
