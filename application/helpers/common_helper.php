<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author justaddwater
 * @copyright 2014
 */

function get_yT_id($full_url)
{   $stringArr = explode('v=',$full_url);
    return $stringArr[1];
}
function get_vimeo_id($full_url)
{   $stringArr = explode('/',$full_url);
    $code = $stringArr[count($stringArr)-1];
    return $code;
}
function get_dM_id($full_url)
{   $stringArr = explode('/',$full_url);
    $code = $stringArr[count($stringArr)-1];
    return $code;
}
function URL_exists($url){
   $headers= @get_headers($url);
   return stripos($headers[0],"200 OK")?true:false;
}

?>