<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if(!function_exists('theme_url')) {
    
    function theme_url($theme_name = '') {
        
            $CI =& get_instance();
            $CI->config->load('themes');
            if(!$theme_dir = $CI->config->item('theme_path')) {
                $theme_dir = '/themes/';
            }
            
            return (!$CI->config->item('theme_name') ) ? $theme_dir : $theme_dir.$CI->config->item('theme_name').'/';

    }
}

if(!function_exists('build_footer_static_links')) {
    
    function build_footer_static_links($title_block = null) {
            
        // getting instance of Coode Igniter Object    
        $CI =& get_instance();
        
        // loading Statics Model
        $CI->load->model('statics_model');
        
        $links = $CI->statics_model->get_static_pages();
        $html_links = ($title_block) ? '<h4>'.$title_block.'</h4>' : '';
        if(is_array($links) && sizeof($links) > 0 ) {
            $html_links .= '<ul class="footer-menu">';
            foreach($links as $linkID => $linkArr ) {
                $html_links .= '<li><a href="/'.$CI->lang->lang().'/'.$linkArr['pageUrl'].'"><i class="icon-chevron-right"></i> '.$linkArr['pageTitle'].'</a></li>';
            }     
            $html_links .= '</ul>';
        } 
        
        return $html_links;
    }
}
