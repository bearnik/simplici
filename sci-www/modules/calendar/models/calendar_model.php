<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Calendar Model Class
 */
class Calendar_model extends CI_Model {
	
	function __construct() {
		parent::__construct();        
	}
    
    
    /**
     * Getting All events for current date time periods
     * ======================================
     * 
     * @param   datetime    $start_date
     * @param   datetime    $end_date
     * @return  array
     */
     function get_event_list ($start_date = null, $end_date = null ) {
         
         $events = array();
         // TODO Get All events 
         //     TODO if $start_date != null && $end_date != null get with period 
         // TODO push to array
         
         return $events;
     }
     
     /**
      * Getting Event by Event ID
      * =====================================
      * 
      * @param int  $event_id
      * @return array
      */
     function get_event($event_id = null) {
         $event = array();
         
         // TODO SQL retreive data for Event by EventID
         // TODO Push to $event array
         
         return $event;
     }
}
