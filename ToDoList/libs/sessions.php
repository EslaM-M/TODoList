<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sessions
 *
 * @author eslam
* /
 * 
 */
session_start();
if(isset($_SESSION['todo_name']))
{
    $session_name=$_SESSION['todo_name'];
    echo $session_name;
}
else{
    header("loaction:login.php");
}
?>