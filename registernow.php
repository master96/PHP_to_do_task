<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Register Now !!</title>
    </head>
    <body style="background-color: #00ae5a">
        
      <?php
        require 'dbconnect.php';
        $name = $pwd = $pwdc = "";
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
            $pwderr = "Password is not provided";
        }
        else 
        {
            $pwd =test_input($_POST["pwd"]);
        } 
         if (empty($_POST["pwdc"])) 
        {
            $pwderr = "Confirm Password is not provided";
        }
           if ($_POST["pwd"]!= $_POST["pwdc"]) 
        {
            $pwderr = "Password not matched";
        }
        else 
        {
            $pwdc =test_input($_POST["pwdc"]);
        } 
        
        }
        
        function test_input($data) {
         $data = trim($data);
         $data = stripslashes($data);
         $data = htmlspecialchars($data);
         return $data;}
    
         ?>
        <div style="text-align: center">
        <h2>Register Now </h2>
        <form method="POST" action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            Name : <span style = color:red;><input type="text" name="name"> *
            <?php 
                echo $nameerr ;
                ?>
                </span>
            <br> <br>
            Your Password  : <span style = color:red;><input type="text" name="pwd">*
            <?php 
                echo $pwderr ;
                ?>
                </span>
            <br></br>
            Confirm Password  : <span style = color:red;><input type="text" name="pwdc">*
            <?php 
                echo $pwderr ;
                ?>
                </span>
            <br>
            </br>
            <input type="submit" name="submit" value="submit">
            <br><br>
        </form>
       
       <?php
           if ($name && $pwd )
         {if ($pwd==$pwdc)
           
         {
             {
             $sql="SELECT username FROM master WHERE username= '$name'";
             $result = mysqli_query($conn, $sql);
             if(mysqli_num_rows($result) > 0)
                 {
                 echo "Sorry that username is already taken ";
                  }
             else {
             $sql= "INSERT INTO master (username, password) VALUES ('$name','$pwd')";
                if (mysqli_query($conn, $sql))
                { 
                    echo "Registered successfully";
                
                $link_address = "Index.php"  ;
               echo "Please proceed to <a href='".$link_address."'>Login Page</a>";
             } 
             
                } 
             }
         } 
         else {
             echo "Please retry";
         }
                 
        $conn->close();}
        ?>
         </div>
    </body>
</html>
