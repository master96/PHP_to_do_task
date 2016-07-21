<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Vivek Test</title>
     
    </head>
    <body background-image="C:\xampp\htdocs\PhpProject1"  >
        
        <?php
        require 'dbconnect.php';
        session_start(); 
        $name = $pwd = "";
        $nameerr = $pwderr = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if (empty($_POST["name"])) 
        {
            $nameerr = "Name is not provided";
        }
        else 
        {
            $name =test_input($_POST["name"]);
        }
        if (empty($_POST["pwd"])) 
        {
            $pwderr = "STD is not provided";
        }
        else 
        {
            $pwd =test_input($_POST["pwd"]);
        } 
        }
        
        function test_input($data) {
         $data = trim($data);
         $data = stripslashes($data);
         $data = htmlspecialchars($data);
         return $data;}
        // put your code here
        ?>
        <div style="text-align: center" ; background-image='bkg.img'>
            
        <h2>LOGIN PAGE </h2>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            Name : <span style = color:red;><input type="text" name="name"> *
            <?php 
                echo $nameerr ;
                ?>
                </span>
            <br> <br>
            Password  : <span style = color:red;><input type="password" name="pwd">*
            <?php 
                echo $pwderr ;
                ?>
                </span>
            <br></br>
            <input type="submit" name="submit" value="submit">
            <br><br>
        </form>
      
        <?php 
        //echo $name;
        //echo "<br>";
        //echo $pwd;
        //echo "<br>";
        $sql = "SELECT username, password FROM master WHERE username= '$name' AND  password= '$pwd' ";
         
        $result = mysqli_query($conn, $sql);
          if(mysqli_num_rows($result) > 0)
          { 
           $_SESSION['Profile'] = $name;
         //  echo $_SESSION['Profile'];
           
           header('Location: profile.php');
           // $link_address = "profile.php"  ;
          //  echo "To access your profile page <a href='".$link_address."'>Click here </a>";
            exit();
              }
          
          else {
            $link_address = "registernow.php"  ;
            echo "<a href='".$link_address."'> Register Now !!</a>";
               }
    
               $conn->close();
        ?>
             </div> 
       
    </body>
</html>
