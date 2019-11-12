<?php
function getUnsetDate(){
    $exp = time();
    return $exp;
}
function getExpiry(){
    $exp = time()+86400;
    return $exp;
}

?>