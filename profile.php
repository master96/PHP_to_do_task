<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>profile page</title>
    </head>
    <body style="background-color: #00ae5a" >
     
       
        
       <div style="text-align:center">    
        <h1> Profile Page </h1>
        <?php
        require 'dbconnect.php';
        session_start(); 
        $name = $_SESSION['Profile'];
       
         
  
        
             $sql="SELECT username FROM tasks WHERE username= '$name'";
             $result = mysqli_query($conn, $sql);
             if(mysqli_num_rows($result) == 0)
                 {
                 echo "Welcome , it seems you haven't created any tasks yet !!  ";
             
                  }
                   $link_address = "create.php"  ;
                   echo $name;
               echo  " Click to<a href='".$link_address."'>create your Task</a>";
               echo "<br>";
               $link_address2 = "managetask.php"  ;
               echo  " Click to <a href='".$link_address2."'>Modify your Task</a>";
               
             
        // print_r($_SESSION);
        ?>
        
        <h1>your tasks </h1>
        
        <?php 
        $sql="SELECT * FROM tasks WHERE username= '$name' and Done=1";
            $result = mysqli_query($conn, $sql);
            if ($result->num_rows > 0) {
             while($row = $result->fetch_assoc()) 
                     { 
             echo "Task: " . $row["task"]. " - info: " . $row["info"] ;
              if ($row["Done"])
            {
                echo "-  this task is completed";
            }
              else {
                  echo "-  this task is not completed";
              }
             echo "<br></br>";
            
              }
            }
             else {
                 echo "No tasks yet";
             }   
              
        ?>
        <h2><a href="logout.php">LOGOUT</a><h2>
        
       
             </div>
    </body>
</html>
