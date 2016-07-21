<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body style="background-color: #00ae5a" >
     <div style="text-align:center"> 
        <?php
         session_start();
         session_unset(); 
         session_destroy(); 
        ?>
        <h1> you are logged out successfully </h1>
        <h3>click <a href="index.php">here</a> to go to homepage</h3>
     </div>
    </body>
</html>
