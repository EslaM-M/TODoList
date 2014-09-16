<?php
include_once './classes/class.managetodo.php';
include_once './libs/sessions.php';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(isset($_GET['delete']))
{
    $id = $_GET['delete'];
    
    $todoobj =  new ManageToDo();
   $delete =  $todoobj->deleteToDo($session_name, $id);
   if($delete==1){
       
       $success = 'Item Delteted Sucessfully';
       header("location:index.php");
   }
   else{
       $error ='You Have An Error';
   }
}
?>
