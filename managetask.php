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
        <h1>Manage your tasks</h1>
        <?php
        include 'dbconnect.php';
        session_start();
       $name = $_SESSION['Profile'];
        $sql="SELECT * FROM tasks WHERE username= '$name'";
            $result = mysqli_query($conn, $sql);
            if ($result->num_rows > 0) {
             while($row = $result->fetch_assoc()) 
                     { 
             echo "TaskID: " . $row["taskid"]. " Task: " . $row["task"]. " - info: " . $row["info"] ;
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
       
        $task = $info = $id ="";
        $del = $modi = $comp = 0;
        $taskerr = $infoerr =$iderr= "";
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if (empty($_POST["task"])) 
        {
            $taskerr = "";
        }
        else 
        {
            $task =test_input($_POST["task"]);
        }
        if (empty($_POST["id"])) 
        {
            $iderr = "Task id is not provided";
        }
        else 
        {
            $id =test_input($_POST["id"]);
        }
        if (empty($_POST["info"])) 
        {
            $infoerr = "";
        }
        else 
        {
            $info =test_input($_POST["info"]);
        } 
        
        if (!empty($_POST["delete"])) 
        {
            $del=  test_input($_POST["delete"]);
        }
        if (!empty($_POST["modi"])) 
        {
            $modi=  test_input($_POST["modi"]);
        }
        if (!empty($_POST["comp"])) 
        {
            $comp=  test_input($_POST["comp"]);
        }
          
           
        }
        
        function test_input($data) {
        $data = trim($data);
         $data = stripslashes($data);
         $data = htmlspecialchars($data);
         return $data;}
       //  echo $id;
         //echo $name;
         //echo $task;
         //echo $info;
         
         
        ?>
         <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            Task name  : <span style = color:red;> <input type="text" name="task"> (this is optional)
            <?php 
                echo $taskerr ;
                ?>
                </span>
            <br> <br>
            Description  : <span style = color:red;><input type="text" name="info">(this is optional)
               <?php 
                echo $infoerr ;
                ?>
                </span>
            <br></br>
            Task ID  : <span style = color:red;><input type="text" name="id">*
               <?php 
                echo $iderr ;
                ?>
                </span>
            <br></br>
            <input type="checkbox" name="delete"> Delete task </input> 
            <input type="checkbox" name="modi"> Modify task </input>
             <input type="checkbox" name="comp"> complete task </input>  <br></br>
             
            <input type="submit" name="submit" value="submit">
            <br><br>
        </form>
        <?php
            if ($id && $modi && $task && $info && $name)
         {
             $sql= "UPDATE tasks SETs task='$task',info='$info' WHERE taskid='$id' AND username='$name'";
           if (mysqli_query($conn, $sql))
                { 
                    echo "Data Updated please refresh !";
                    echo "<br></br>";
                    
                } 
         }
         if($id && $name && $comp)
         {
              $sql= "UPDATE tasks SET Done=1 WHERE taskid='$id' AND username='$name'";
           if (mysqli_query($conn, $sql))
                { 
                    echo "Data Updated please refresh !";
                    echo "<br></br>";
                    
                } 
         }
         if ($id && $del && $name)
         {
             $sql= "DELETE FROM tasks WHERE taskid='$id' AND username='$name'";
           if (mysqli_query($conn, $sql))
                { 
                    echo "Data Updated please refresh !";
                    echo "<br></br>";
                    
                } 
         }
            ?>
        <h2><a href="logout.php">LOGOUT</a><h2>
               </div>
    </body>
</html>
