<?php
// validaction of email and password
function requiredInput($input){
if(empty($input)){
   return false;
}
return true;
}

function checkEmail($input){
if( filter_var($input ,FILTER_VALIDATE_EMAIL)){
    return false;
}
return true;
}

function minLength($input ,$len){
if(strlen($input) <$len){
    return false;
}
return true;
}

function maxLength($input ,$len){
    if(strlen($input) > $len){
        return false;
    }
    return true;
}


?>