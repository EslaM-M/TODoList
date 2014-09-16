<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once './classes/class.managetodo.php';
include_once './libs/sessions.php';

if(isset($_POST['edit']))
{
    $title = $_POST['title'];
    $desciption = $_POST['desc'];
    $due_date=$_POST['due-date'];
    $label_under=$_POST['label-under'];
    $progress_value=$_POST['progress_value'];
    
    $todoobj = new ManageToDo();
    $updated = $todoobj->editToDo($session_name, $_GET['id'], $title, $desciption, $progress_value, $due_date, $label_under);
    if($updated==1)
    {
        $success ="the todo updated sucessfully";
    }
    else{
        $error ="the todo not updated";
    }
    
            
}
?>