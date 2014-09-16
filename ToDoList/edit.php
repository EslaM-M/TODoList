<?php

include_once './statics/header.php';
include_once './libs/list_todo.php';
include_once './libs/edit_todo.php';
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
  
   $(function() {
       var Currentvalue = $( "#progress_value" ).val();
    $( "#seekbar" ).slider({
      value:Currentvalue,
      min: 0,
      max: 100,
      step: 5,
      slide: function( event, ui ) {
        $( "#progress" ).html( ui.value +'%');
          $( "#progress_value" ).val(ui.value );
      }
    });
  //  $( "#progress_value" ).val( "$" + $( "#seekbar" ).slider( "value" ) );
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
     
        <form method="post" action="edit.php?id=<?php echo $_GET['id'];?>" class="form-horizontal" role="form" >
            <?php foreach ($list_todo as $td)
                $givenarray = array("Inbox","Read Later","Important");
                $selectedarray = array($td['label']);
                $arrayremining= array_diff($givenarray , $selectedarray);
           
          { ?>
        <div class="input-group">
            <label for="Title">Title</label>
            <input  type="text" name="title" class="form-control" id="title" value="<?php echo $td['title'];?>"/>
        </div>
           <div class="input-group">
            <label for="Title">Description</label>
            <textarea class="form-control" name="desc" id="desc"><?php echo $td['description'];?></textarea>
        </div>      
           <div class="input-group">
            <label for="Title">Due Date</label>
            <input class="form-control" type="text" name="due-date" id="datepicker" value="<?php echo $td['due_date'];?>"/>
        </div>
           <div class="input-group">
            <label for="Title">Label Under</label>
            <select  class="form-control"name="label-under" id="label-under">
                <?php
         echo '<option value="'.$td['label'].'">'.$td['label'].'</option>';
         foreach ($arrayremining as $ar)
         {
               echo '<option value="'.$ar.'">'.$ar.'</option>';
         }
                ?>
            </select>
        </div>
            <div class="input-group">
                <div style="width: 250px;" id="seekbar"></div>
                <div id="progress"><?php echo $td['progress'];?>%</div>
                <input type="hidden" name="progress_value" value="<?php echo $td['progress'];?>" id="progress_value"/>
            </div>
           <div class="input-group">
               <input type="submit" name="edit" id="edit" value="Edit" class="btn btn-info"/>
               </div>
                    <?php }?>
            </form>
      
    </div>   
</div>
