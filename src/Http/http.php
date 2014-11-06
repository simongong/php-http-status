<?php

function parse($file) {
    $result = array();
    $file = file_get_contents($file);
    $rows = explode("\n", $file);
    $code_array = array_slice($rows, 38, 69);
    foreach($code_array as $line) {
        $line = preg_replace('/\[.*\]/', ' ', $line); 
        $line = preg_replace('/\s\s+/', ' ', trim($line));
        $parts = explode(' ', $line);
        if(end($parts) !== "Unassigned") {
            $k = array_shift($parts);
            $v = implode(' ', $parts);
            if($v == "(Unused)")
                $v = "Unused";
            $result[$k] = $v;
        }
    }
    return $result;
}

$base_dir = __DIR__.'/../../';
$tmp_file = $base_dir."data/tmp";
$status_code_file = $base_dir."data/http-status-codes.txt";

if(!file_exists($tmp_file)) {
    $code_array = parse($status_code_file);
    file_put_contents($tmp_file, serialize($code_array));
}

//$status_code = require "http_status_code_list.php";
$status_code = unserialize(file_get_contents($tmp_file));
$namespace_str = "namespace HTTP { class Http{};";

foreach($status_code as $k => $v){
    // const "_Continue" = 100;
    $key = ucwords(strtolower($v));     
    $key = str_replace(' ', '_', $key);
    $key = str_replace('-', '_', $key);

    if($key !== "Continue") {
        $namespace_str .= "const $key = $k;";
    }
    $namespace_str .= "const _$key = $k;";    
}

$namespace_str .= "}";
eval($namespace_str);
