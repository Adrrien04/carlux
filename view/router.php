<?php 

require_once('../displayTasks/controller.php');
 
function route_request($address){
 
    if ($address === "/tasks"){
    
        display_tasks();
        return;
    }
    else{
        echo "<h1>404 NOT FOUND</h1>";
    }    
}

