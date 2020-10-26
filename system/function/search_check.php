<?php 
function check_genres ($array, $check_value){
    foreach ($array as $key => $value){
        if ($value == $check_value){
            return true;
        }
    }
    return false;
}