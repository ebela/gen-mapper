<?php
	
	
	
// src: https://stackoverflow.com/questions/18944027/how-do-i-defer-or-async-this-wordpress-javascript-snippet-to-load-lastly-for-fas
// async, defer script load filter
// Async load
function add_asyncdefer_attribute($tag, $handle)
{
    $param = '';
    if ( strpos($handle, 'async') !== false ) $param = 'async ';
    if ( strpos($handle, 'defer') !== false ) $param .= 'defer ';
    if ( $param )
        return str_replace('<script ', '<script ' . $param, $tag);
    else
        return $tag;
}
add_filter('script_loader_tag', 'add_asyncdefer_attribute', 10, 2);



