<?php 

require_once 'C:\wamp64\www\php\displayTasks\view.php';
require_once 'C:\wamp64\www\php\displayTasks\data.php';


function display_tasks(){

    $tasks = get_tasks();
    $html = display_tasks_view($tasks);
    echo $html;

}

