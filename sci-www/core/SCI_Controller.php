<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 
/**
 *  Extending Core Controller class 
 * ===================================
 *  - Hook Admin Verification here
 *  - enable profiler
 *  - Modular functionality
 */
class SCI_Controller extends CI_Controller {
    
    function __construct() {
        
        parent::__construct();
        // profiling and benchmarks        
        $this->output->enable_profiler($this->config->item('profiler') && ENVIRONMENT == 'development');
        //////////////////////////////////////   
        
        // Simple Authentification Simple
        /////////////////////////////////////
        

        // Auth for the admin Part :D       
        $admin_arr = $this->config->item('admin');
        // checking if admin config is loaded and should we check!!!
        if(is_array($admin_arr)) {            
            $admin_url = $admin_arr['admin_url'];
            $admin_uri = $admin_arr['admin_uri'];
            $admin_exclude = $admin_arr['exclude'];
            $admin_redirect = $admin_arr['redirect_page'];                
        
            if($this->uri->segment($admin_uri) == $admin_url && !in_array(uri_string(),$admin_exclude)) {
               if(!isset($this->session->userdata['admin']['adminID']) || !$this->session->userdata['admin']['adminID']) {
                    redirect($admin_redirect,'location');                   
               }
               
            }
        }
    }
}