<?php 

function ouput_to_json($result)
{
	$CI =& get_instance();
	return $CI->output
    		  ->set_content_type('application/json') 
    		  ->set_output(json_encode($result));
}


function emptyArray($obj)
{
	if(!is_array($obj) || !is_object($obj)){
		return [];
	}

	return [];
}