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
    <body style="background-color: #00ae5a"  >
        
        <div style="text-align: center">
            
            <h1> Create your task </h1>
        <?php
        require 'dbconnect.php';
        session_start(); 
        $name = $_SESSION['Profile'];
        echo $name;
        if(empty($name))
        {
            $link_address = "index.php"  ;
               echo "Please <a href='".$link_address."'>Login/Relogin</a>to access.";
          die();
        }
        $task = $info = "";
        $taskerr = $infoerr = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if (empty($_POST["task"])) 
        {
            $taskerr = "Task Name is not provided";
        }
        else 
        {
            $task =test_input($_POST["task"]);
        }
        if (empty($_POST["info"])) 
        {
            $infoerr = " Description is not provided";
        }
        else 
        {
            $info =test_input($_POST["info"]);
        } 
        }
        
        function test_input($data) {
         $data = trim($data);
         $data = stripslashes($data);
         $data = htmlspecialchars($data);
         return $data;}
        // put your code here
         
             
        ?>
         
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            Task name  : <span style = color:red;> <input type="text" name="task"> *
            <?php 
                echo $taskerr ;
                ?>
                </span>
            <br> <br>
            Description  : <span style = color:red;><input type="text" name="info">*
               <?php 
                echo $infoerr ;
                ?>
                </span>
            <br></br>
            <input type="submit" name="submit" value="submit">
            <br><br>
        </form>
        <?php
        if ($name && $task && $info )
         { $sql= "INSERT INTO tasks (username, task , info) VALUES ('$name','$task','$info')";
           if (mysqli_query($conn, $sql))
                { 
                    echo "Your task is added";
                    echo "<br></br>";
                    
                } 
                
         }
         $link_address = "profile.php"  ;
               echo "click here to go to <a href='".$link_address."'>profile Page</a>";
        ?>
   <h2><a href="logout.php">LOGOUT</a><h2>
        </div>    
    </body>
</html>
