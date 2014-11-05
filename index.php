<?php

$status_code = require "http_status_code_list.php";

$namespace_str = "namespace HTTP {";

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
