<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once './classes/class.manageuser.php';
if(isset($_POST['register']))
{
    

    session_start();
    $users =  new ManageUsers();
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email =$_POST['email'];
        $repassword=$_POST['repassword'];
        $ip_address =$_SERVER['REMOTE_ADDR'];
        $date =  date("Y-m-d");
        $time = date("H:i:s");
                
        if(empty($username)||empty($email)|| empty($password)||empty($repassword))
            
        {
            $error = 'Please Enter All required';
            
        }
        else if($password!==$repassword)
        {
            $error = "Password does not match";
        }
        elseif(!filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            $error ='Email is not valid';
        }
        else{
            $check_avilablity = $users->GetUserInfo($username);
            if($check_avilablity==0){
             
                $registeruser=$users->registerUsers($username, $email,$password, $ip_address, $time, $date);
                if($registeruser==1)
                {
                    $makesession = $users->GetUserInfo($username);
                    
                    foreach ($makesession as $usersession)
                    {
                        $_SESSION['todo_name']=$usersession['username'];
                        if(isset($_SESSION['todo_name']))
                        {
                            header("Location: index.php");
                        }
                    }
                }
                
            }
            else{
                $error = 'Username already exisit';
            }
        }
}
if(isset($_POST['login'])){
    session_start();
    $username = $_POST['username'];
    $password =$_POST['password'];
    
    if(empty($username)|| empty($password))
    {
        $error = "All field Are Required";
    }
    else{
        
        $loginuser = new ManageUsers();
        $auth_user = $loginuser->LoginUsers($username, $password);
        
        if($auth_user==1)
        {
           // $loginuser->GetUserInfo($username)
           $makesession =$loginuser->GetUserInfo($username);
           foreach ($makesession as $usersession)
           {
               $_SESSION['todo_name']=$usersession['username'];
               if(isset($_SESSION['todo_name']))
               {
                   header("Location:index.php");
               }
           }
        }
        else{
            $error ='Invalid login Please Try Again';
        }
    }
}
?>