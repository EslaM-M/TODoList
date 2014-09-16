<?php

include_once './statics/header.php';
include_once './libs/createtodo.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="maincontent">
   <script>
  $(function() {
    $( "#datepicker" ).datepicker({ dateFormat: "yy-mm-dd" });
  });
  </script>
    <div id="head">
        <h2>Create To Do</h2>
        
    </div>
  
    <div id="mainbody">
        <?php if(isset($success)){
           echo ' <div class="alert alert-success" role="alert">'.$success.'</div>';  
        }
        ?>
        <?php if(isset($error)){
           echo ' <div class="alert alert-danger" role="alert">'.$error.'</div>';  
        }
        ?>
         
       
        <form method="post" action="add_new.php" class="form-horizontal" role="form" >
        <div class="input-group">
            <label for="Title">Title</label>
            <input  type="text" name="title" class="form-control" id="title"/>
        </div>
           <div class="input-group">
            <label for="Title">Description</label>
            <textarea class="form-control" name="desc" id="desc"></textarea>
        </div>      
           <div class="input-group">
            <label for="Title">Due Date</label>
            <input class="form-control" type="text" name="due-date" id="datepicker"/>
        </div>
           <div class="input-group">
            <label for="Title">Label Under</label>
            <select  class="form-control"name="label-under" id="label-under">
                <option value="">Select</option>
                <option value="Inbox">Inbox</option>
                <option value="Read Later">Read Later</option>
                <option value="Important">Important</option>
            </select>
        </div>
           <div class="input-group">
               <input type="submit" name="create" id="create" value="create" class="btn btn-info"/>
        </div>
            </form>
    </div>   
</div>
