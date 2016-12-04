<?php

$tasks = $app['query']->selectAll('tasks');

if (isset($_POST['title']) || !empty($_POST['title'])) {
    $pre_task = trim($_POST['title']);
    $new_task = $app['query']->insert('tasks', ['title' => $pre_task, 'complete' => 0]);

    header('Location:' . $_SERVER["REQUEST_URI"]);
    
}
if (isset($_GET['done']))
{
    $id = $_GET['done'];
    $upd_task = $app['query']->update('tasks',$id);
}

if (isset($_GET['del']))
{
    $id = $_GET['del'];
    $del_task = $app['query']->delete('tasks',$id);
}

require "Views/index.view.php";