<?php
include_once './libs/login_users.php';
?>
<!DOCTYPE html>
<html>

    <head>
        <title>TOdo Maker</title>
        <link rel="stylesheet"  href="bootstrap/bootstrap-3.2.0-dist/css/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
       
    </head>
    <body>
        <div class="container-fluid">
            
       <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand navbar" href="#">ToDO Maker</a>
    </div>
        </div>
       </nav>
            <div id="content">
            <?php
            if(isset($error)){
                                echo $error;}
            ?>
                <div id="form">
                <div class="login_form">
                
                 <h2>Login Here</h2>
                <form method="post" action="login.php" class="form-horizontal" role="form" >
                <div class="input-group">
                  
                    <input  type="text" class="form-control" placeholder="UserName" name="username" id="username"/>
                </div>
                       <div class="input-group">
                     <input type="password" placeholder="Password" class="form-control" name="password" id="password"/>
                </div>
                     <div>
                    <input type="submit" name="login" id="login" class="btn btn-success"/>
                </div>
                </form>
                </div><!--  end login form-->
           <div class="register_form">
           
                <h2>Register Here</h2>
                <form method="post" action="login.php" class="form-horizontal" role="form" >
                <div class="input-group">
                  
                    <input  type="text" class="form-control" placeholder="UserName" name="username" id="username"/>
                </div>
             
                 <div class="input-group">
                   
                     <input type="text" placeholder="Email" class="form-control" name="email" id="email"/>
                </div>
                 <div class="input-group">
                     <input type="password" placeholder="Password" class="form-control" name="password" id="password"/>
                </div>
                       <div class="input-group">
                           <input type="password" placeholder="Re-Password" class="form-control" name="repassword" id="repassword"/>
                </div>
                <div>
                    <input type="submit" name="register" id="register" class="btn btn-success"/>
                </div>
            
                </form>
            </div>
            </div>
        </div>
    </body>
</html>