<?php 

require_once 'displayTasks/view.php';
require_once 'displayTasks/data.php';


function display_tasks(){

    $tasks = get_tasks();
    $html = display_tasks_view($tasks);
    echo $html;

}

