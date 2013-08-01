<?php

/**
 * Migrate Controller Class
 * =================================================
 *  Running only from cli
 * =================================================
 */
class Migrate extends CI_Controller {
	
    
	function __construct() {
		parent::__construct();
        
        if($this->input->is_cli_request() === FALSE ) {
            show_404();            
        }
        
        $this->load->library('migration');
        $this->load->dbforge();
	} 
    
    function index() {
        echo "\n\n\n".'Migrating T0.ol'.PHP_EOL;
    }
    
    
    public function latest() {
        if(!$this->migration->latest() ) {
            echo $this->migration->error_string().PHP_EOL; 
        }
    }
    
    public function reset() {
        if(!$this->migration->version(0)){
            echo $this->migration->error_string().PHP_EOL;
        }
    }
    
    public function version($version = 0 ) {
        $version  = (int) $version;
        if($version == 0 ) {
            $this->reset();
        }
        
        if(!$this->migration->version($version)) {
            echo $this->migration->error_string().PHP_EOL;
        }
    }
    
    
}