<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'class.database.php';

class ManageUsers {
      public $link;
    function __construct() {
        
        $db_connection = new DbConnection();
        $this->link=$db_connection->connect();
        return $this->link;
        
    }
    function registerUsers($username,$email,$password,$ip_address,$time,$date)
    {
        $query=$this->link->prepare("INSERT INTO users(username,email,password,ip_address,time,date) VALUES(?,?,?,?,?,?)");
        $values = array($username,$email,$password,$ip_address,$time,$date);
        $query->execute($values);
        $count = $query->rowCount();
        return $count;
    }
    
    function LoginUsers($username,$password)
    {
        $query=$this->link->query("SELECT *FROM users WHERE username='$username' AND password='$password'");
         $rowcount =$query->rowCount();
         return $rowcount;
    }
    
    function  GetUserInfo($username)
    {
        $query =$this->link->query("SELECT *FROM users WHERE username='$username'");
 
        $rowcount = $query->rowCount();
        if($rowcount==1)
        {
            $result = $query->fetchAll();
            return $result;
        }
        else{
        return $rowcount;
        }
        }

}


?>