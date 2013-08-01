<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');




/**
*  Password Hash
* 
* @param string $password to be hashed
* @return string $hashed_password
*/

function hash_password($password_str='') {
    $CI =& get_instance();
    if(!empty($password_str)) {
        return hash('sha512',$password_str.$CI->config->item('encryption_key'));
    }else {
        return false;
    }
}


/**
 * Generator random hash
 */
 
function hash_generator($pin=false) {
    if($pin) {
         return mt_rand(100000, 999999);
    } else {
        return sha1(microtime(true).mt_rand(10000,900));
    }    
}


/*
 * Encrypt Password
 */
function encrypt_string($string=null) {
    if(!empty($string)) {
        $CI =& get_instance();
        return hash('sha512',$string.$CI->config->item('encryption_key'));
    }else {
        return false;
    }
}

/**
 * Checking Strong Password
 * 
 * @param   string  $password
 * @param   string    $user_name    - if not null password is checked against username
 * 
 * @return array
 */
 
function check_password_strength($password=null,$user_name=null) {
    
    // return result
    $return = array(
                    'strength_points'   =>  0,
                    'error'             =>  0,
                    'msg'               =>  ''
                   );   
                   
    if($password) {
        
        // check length of the password
        if(strlen($password) < 8 ) {
            $return['error'] = 1;
            $return['msg'] = 'Your password has to be min 8 chars long';   
        }else {
            
            if($user_name && strtolower($password) == strtolower($user_name)) {
                $return['error'] = 1;
                $return['msg'] = 'Password and User Name cannot be the same';
            } else {
                
                // Adding some rules
                preg_match_all("/(.)\1{2}/", $password, $matches);
                $consecutive_chars = count($matches[0]);
                
                // count numbers in string
                preg_match_all("/\d/i", $password, $matches);
                $numbers = count($matches[0]);
                
                // Upper Case chars
                preg_match_all("/[A-Z]/", $password, $matches);
                $uppers_chars = count($matches[0]);
                
                // Others chars
                preg_match_all("/[^A-z0-9]/", $password, $matches);
                $others_chars = count($matches[0]);
                
                $strength = 5;
                $msg = 'Very Strong Password';
                $msg_error = '';
                
                if($consecutive_chars > 0) {
                    $strength -= 1;
                    $msg_error .= 'More than one concecutive chars';
                }
                if($uppers_chars == 0 && $numbers == 0) {
                    $strength -= 1;
                    $msg_error .= "Must be at least one Upper Case or number";
                }
                if($other_chars == 0) {
                    $strength -= 1;
                    $msg_error .= 'No other chars defined';
                }
                
                // returns the strength of the password with the status messages                
                $return['strength'] = $strength;
                $return['msg'] = ($msg_error) ? $msg_error : $msg;
            }           
        }       
    }else {
        $return['error'] = 1;
        $return['msg'] = 'No password submited';
    }
    
    return $return;
}


/**
 * DropDown menu helper with all the countries
 * =======================================
 * 
 * @param   string  $select_name     - name of the select list :: default country_codes
 * @param   array   $first_countries - first of the countries optional
 * @param   boolean $show_flags      - Show flags 
 * @param   boolean $phone_code      - if true phone_number will be as value / if false short country code
 * @return  string  select option menu
 */
/*function show_country_dropdown($select_name = 'country_codes',$first_countries = array(), $show_flags = true,$phone_code = true) {
    
    $CI =& get_instance();
    $CI->db->select('countryCode,phoneCode,countryName');
    $q = $CI->db->get('pd_countries');
    if($q->num_rows() > 0 ) {
        $country_codes = array();
        
        // getting the values & and put them in array
        foreach($q->result() as $row) {
            $country_codes[$row->countryCode] = array("phoneCode"   =>  $row->phoneCode,
                                                      "countryName" =>  $row->countryName
                                                     );
        }    
            
        // sorting the array
        $select_options = array();
        
        // if set top countries we sort them first
        if(is_array($top_countries) && sizeof($top_countries) > 0 ){
            foreach($top_countries as $cCode) {
                $select_options[$cCode] = $country_codes[$cCode];
                unset($country_codes[$cCode]);                      // removing element from the array
            }    
        }
        
        // adding country list to select 
        foreach($country_codes as $countryCoude => $countryArr ) {
            $select_options[$countryCode] = $countryArr;
        }   
            
        $html = '<select name="'.$select_name.'">';
        foreach($select_options as $countryCode => $countryValue) {
            $select_value = ($phone_code) ? $countryValue['phoneCode']: $countryCode ;
            $country_flag_url = theme_url().'images/flags/'.$countryCode.'.gif';
            $select_flag = ($show_flags) ? 'style="background-image:url(\''.$country_flag_url.'\');"': '' ;
            $html = '<option value="'.$select_value.'"'.$select_flag.'>'.$countryValue['countryName'].'</option>';
        }
        $html .= '</select>';
        return $html;
    }
    return false;
}
*/
/**
* Format phone strings, output only numbers.
* ===========================================
* Supports empty strings and removes 0 @ the beginning of the string
* @param    string  $phone_string
* @return   number only
*/

function format_phone_string($phone_string="")
{
    return ltrim(preg_replace('/[^0-9]/','',$phone_string),'0');
}

/**
 * Function generate random 8 char password at least
 * ==========================================
 * @param   int     $char_limit - length of the password
 * @return  string
 */
function random_password($char_limit = 8) {
    return substr(md5(uniqid(mt_rand(), true)), 0, $char_limit);
}