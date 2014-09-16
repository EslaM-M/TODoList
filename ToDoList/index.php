<?php
include_once './statics/header.php';
include_once './libs/list_todo.php';
include_once './libs/delete.php';
include_once './libs/sessions.php';

?>
                <div id="maincontent" class="clearfix">
                    <div id="head">
                        <h2>Manage To DO</h2>
                        <div id="addmore">
                            <a href="add_new.php" class="btn btn-success">+ Add New</a>
                        </div><!-- end add more-->
                    </div><!-- end head-->
                    <div id="mainbody">
        <?php if(isset($success)){
           echo ' <div class="alert alert-success" role="alert">'.$success.'</div>';  
        }
        ?>
        <?php if(isset($error)){
           echo ' <div class="alert alert-danger" role="alert">'.$error.'</div>';  
        }
        ?>
                        <table class=" table table-striped">
                            <thead>
                                <tr>
                                    <td>Title</td>
                                    <td>Snippet</td>
                                    <td>Due Date</td>
                                    <td>Time Left</td>
                                    <td>Progress</td>
                                    <td>Actions</td>
                                </tr>
                            </thead>
                            <tbody>
                                 <tr>
                                   <?php
                                   if($listtodo!=0)
                                   {
                                   foreach ($listtodo as $key=> $value)
                                   {
                                       $today= strtotime("now");
                                       $duedate =  strtotime($value['due_date']);
                                       if($duedate > $today){
                                       $hours = $duedate -  $today;
                                       $hours = $hours/3600;
                                       $timeleft = $hours/24;
                                       if ($timeleft < 1) {
                                                 $timeleft = 'Less thant 1 day';
                                             } else {
                                                 $timeleft = round($timeleft).'Days Reminding';
                                             }
                                       }
                                       else
                                       {
                                           $timeleft = 'Expired';
                                       }
                                             ?>
                                    <td><?php echo $value['title'];?></td>
                                     <td><?php echo $value['description'];?></td>
                                      <td><?php echo $value['due_date'];?></td>
                                       <td><?php echo $timeleft;?></td>
                                       <td><div class="progress">
                                               <div class="progress-bar progress-bar-striped active"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $value['progress'];?>%">
                                                           <span class="sr-only">45% Complete</span>
                                                       </div>
                                                   </div></td>
                                                   <td>
                                                       <a href="edit.php?id=<?php echo $value['id'];?>" title="<?php echo $value['title'];?>">edit</a>
                                                      <a href="index.php?delete=<?php echo $value['id'];?>" title="<?php echo $value['title'];?>">delete</a>
                                                   </td>
                                                     </tr>
                                       <?php
                                   }
                                   }
                                   else{
                                       echo '<td></td><td></td><td>No More Item in this list</td><td></td><td></td>';
                                   }
                                   
                                   ?>
                              
                            </tbody>
                        </table>
                    </div> <!-- end main body-->                   
                </div><!--- end main content-->
            </div><!--end container-->

        </div><!-- end mainWrapper--->
    </body>
</html>