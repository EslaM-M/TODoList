<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of class
 *
 * @author eslam
 */

include_once 'class.database.php';

class ManageToDo {
      public $link;
    function __construct() {
        
        $db_connection = new DbConnection();
        $this->link=$db_connection->connect();
        return $this->link;
        
    }
    function CreateToDo($username,$title,$description,$due_date,$create_date,$label)
    {
       // `id`, `username`, `title`, `desc`, `due_date`, `created_date`, `label`
        $query = $this->link->prepare("INSERT INTO todo(username,title,description,due_date,created_date,label) VALUES(?,?,?,?,?,?)");
    
        $values = array($username,$title,$description,$due_date,$create_date,$label);
      
        $query->execute($values);
     
        $count =$query->rowCount();
        return $count;
    }
    function ListToDo($username,$status=null)
    {
        if(isset($status)){
        $query = $this->link->query("SELECT *FROM todo WHERE username='$username' AND label='$status' ORDER BY id DESC");
        }
        else{
               $query = $this->link->query("SELECT *FROM todo WHERE username='$username' ORDER BY id DESC");
        }
        $count = $query->rowCount();
        if($count >=1)
        {
            $result = $query->fetchAll();
        }
        else{
            $result = $count;
        }
        return $result;
    }
    function  CountToDo($username,$status)
    {
        $query =  $this->query("SELECT count(*) AS TOTAL_TODO FROM todo WHERE username='$username' AND status='$status'");
    
         $query->setFetchMode(PDO::FETCH_OBJ);
         $count = $query->fetchAll();
         return $count;
    }  
    function editToDo($username,$id,$title,$desc,$progress,$due_date,$label)
    {  
       
            $query = $this->link->query("UPDATE todo SET title ='$title', description='$desc', due_date='$due_date',label='$label',progress='$progress' WHERE username='$username' AND id='$id'");
          
            $count =$query->rowCount();
            return $count;
    }
    function  deleteToDo($usernam,$id)
    {
        $query = $this->link->query("DELETE FROM todo WHERE username='$usernam' AND id='$id'");
        $count = $query->rowCount();
        return $count;
    }
    function  ListToDoItem($param,$username)
    {
        foreach ($param as $key=>$value)
        {     
        $query=  $this->link->query("SELECT * FROM todo WHERE $key='$value' AND username='$username' LIMIT 1");
        }
        $count = $query->rowCount();
        if($count==1)
        {
            $result = $query->fetchAll();
        }
        else{
            $result = $count;
        }
         
        return $result;       
        }
        /*

         * 
         *  function editToDo($username,$id,$values)
    {  
        $x=0;
        foreach ($values as $key =>$value)
        {
            $query = $this->link->query("UPDATE todo SET $key ='$value' WHERE username='$username' AND id='$id'");
            $x++;
        }
        return $x;
        
        
    }         */
}