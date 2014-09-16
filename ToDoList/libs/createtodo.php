<?php
include_once 'classes/class.managetodo.php';

$init = new ManageToDo();

if(isset($_POST['create']))
{
    $title =$_POST['title'];
    $desc =$_POST['desc'];
    $duedate =$_POST['due-date'];
    $label = $_POST['label-under'];
    if(empty($title) OR empty($desc) OR empty($duedate) OR empty($label))
    {
      $error= 'All fields are required';
    }
 else {
     //   $title = strip_tags($title);
       // $desc = strip_tags($desc);
      //  $title = mysql_real_escape_string($title);
     //   $desc = mysql_real_escape_string($desc);
        $username= $session_name;
        $created_date=  date("Y-m-d");
        
        $createtodo =  $init->CreateToDo($username, $title, $desc, $duedate, $created_date, $label);
        print_r($createtodo);
 
        if($createtodo ==1)
        {
            $success ='To Do Created Sucessfully';
        }
 else {
     $error  ='There was an Error';
 }
        
 }
}

?>