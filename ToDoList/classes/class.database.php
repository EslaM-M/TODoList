<?php



class DbConnection{
    
    protected $db_conn;
    protected $db_name='todo';
    protected $db_user='root';
    protected $db_pass='';
    protected $db_host='localhost';

/* 
 * 
 * $db = new PDO('mysql:host=localhost;dbname=testdb;charset=utf8', 'username', 'password');
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function connect(){
    try{
    $this->db_conn=new PDO("mysql:host=$this->db_host;dbname=$this->db_name",$this->db_user,$this->db_pass);

    return $this->db_conn;
    }
 catch (PDOException $ex){
        $ex->getMessage();
     
 }
    

}
}

?>