<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Blog Controller Class
 */
class Blog extends CI_Controller {
	
    var $limit_per_page;
    
	function __construct() {
		parent::__construct();
        
        // limit to 15 items per page
        $this->limit_per_page = 15;
        
        // load blog model
        $this->load->model('blog_model');
        
	}
    
    
    // article listing
    function index($page = null) {
        $data = array();
        $article_list = $this->blog_model->list_articles($page,$this->limit_per_page);
        $data['content_page'] = 'blog_list';
        $data['article_list'] = $article_list;
        
        $this->load->view('layout',$data);
        
    }
    
    // show article by Article ID
    function article($article_id = null ) {
        $data = array();
        $article_content = $this->blog->model->get_article_content($article_id);
        $data['content_page'] = 'article_content';
        $data['article_content'] = $article_content;
        $this->load->view('layout',$data);
    }
}
