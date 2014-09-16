<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of list_todo
 *
 * @author eslam
 */
include_once './classes/class.managetodo.php';
include_once './libs/sessions.php';
$init = new ManageToDo();
if(isset($_GET['id']))
{
 $id =$_GET['id'];
 $list_todo=$init->ListToDoItem(array('id'=>$id), $session_name);
}
else{
if(isset($_GET['label']))
{
    $label = $_GET['label'];
    $listtodo = $init->ListToDo($session_name,$label);
}
else{
    $listtodo = $init->ListToDo($session_name);
}
}
?>