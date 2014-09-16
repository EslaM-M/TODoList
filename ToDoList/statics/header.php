<?php
include_once './libs/sessions.php';
?>
<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <title>ToDO Maker</title>
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
        <link rel="stylesheet" href="bootstrap/bootstrap-3.2.0-dist/css/bootstrap.css"/>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
        <style type="text/css">
.logo h3{
    font-family: sans-serif;
    color: #222;
    font-size: 50px;
     margin-left: 300px;
}
        </style>
    </head>
    <body>

        <div id="mainWrapper">
            <div id="td_container" class="clearfix">
                <a href="index.php" class="logo"><h3>ToDo Maker</h3></a>
                <div id="sidebar">
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a href="index.php?label=Inbox">Inbox</a></li>
                        <li class="active"><a href="index.php?label=Read Later">Read Later</a></li>
                        <li class="active"><a href="index.php?label=Important">Important</a></li>
                        <li class="active"><a href="logout.php">Log Out</a></li>
                    </ul>
                </div> <!--end sidebar-->