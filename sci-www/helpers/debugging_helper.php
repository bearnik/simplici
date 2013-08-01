<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Some functions useful for debugging
 */
 
if(!function_exists('dump')) {
    
    function dump ($var = null, $label = 'Debug Object', $visible=TRUE ) {
        
        ob_start();
        var_dump($var);
        $output = ob_get_clean();
        
        // Add formatting
        $output = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $output);
        $output = '<pre style="border:1px solid red;background:yellow;color:#000;margin:10px auto;padding:10px;text-align:left;">'.$label.' => '.$output.'</pre>';
        
        if($visible) {
            echo $output;
        }else{
            return $output;
        }
    }
}


// dump with exit

if(!function_exists('dump_eixt')) {
    function dump_exit($var=null, $label= 'Dump with Exit',$visible=TRUE){
        dump($var,$label,$visible);
        exit;
    }
}