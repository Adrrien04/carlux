<?php 

require_once('C:\wamp64\www\php\displayTasks\controller.php');
 
function route_request($address){
 
    if ($address === "/tasks"){
    
        display_tasks();
        return;
    }
    else{
        echo "<h1>404 NOT FOUND</h1>";
    }    
}