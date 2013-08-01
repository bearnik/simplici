<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Blog Class Model
 */
class Blog_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
    
    /**
     * Listing Articles
     * ==================================
     * 
     * @param   int   $page - Number of the current page ( for pagination)
     * @param   int   $items_limit - home many items must be shown
     * @return  array 
     */
     function list_articles($page = null, $items_limit = null) {
             
         $articles_array = array();
         // TODO SQL Query retrieving list of articles
         //     TODO If $page & $items_limit ! null do limit
         
         return $articles_array;
     }
     
     
     /**
      * Get Article Content
      * ===============================================
      * 
      * @param int $article_id
      * @return array
      */
      function get_article_content($article_id = null) {
              
          if($article_id) {
                  
              $article_array = array();
              
              // TODO SQL Query retrieve Article Content from database
              // TODO Put sql object in $article_array
              return $article_array;
          }
          // no article no result
          return false;
      }
}
