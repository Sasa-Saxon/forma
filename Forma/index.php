<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
   
    <title> Forma</title>
</head>
<body style="background-color: appworkspace">

<form  method="POST" style=" display: flex; justify-content: center;" action="#">
    <label for="username">Username:</label><br>
    <input type="text" name="username" onkeyup="checkUsername(this.value)" required >
 <br><br>
 <label for="password">Password:</label><br>
 <input type="password" name="password" onkeyup="checkPassword(this.value)" required="">
 <br><br>
 <input type="submit" value="Submit"><br>

</form>
    <p id="massage" style="text-align: center;" ></p>

<script>
    function checkPassword (password){

        var passwordPattern=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/;
        
        if(!password.match(passwordPattern)){
            document.getElementById("massage").innerHTML= "your password is weak! Password must contains atleast one upper case character, one number and one special character (/~`!@#$%^&*()_-+={}[]|;:< >,.?)')";


        } else {

            document.getElementById("massage").innerHTML= "Your password is good";
        }
    }
    function checkUsername (username) {

        var UsernamePattern= /^[a-z]*[^A-Z0-9\W]{8,20}$/;
        if(!username.match(UsernamePattern)){
            document.getElementById("massage").innerHTML= "Wrong username! (must contain at least eight characters: lowercase, uppercase, no numbers or special characters)";
        } else {

            document.getElementById("massage").innerHTML="Your username is correct!";
        }
    }
    
    </script>
</body>
</html>
<?php

$connection = new mysqli ('localhost','root',"",'forma');
if (isset($_POST['username']) && !empty($_POST['username'])){
    if(isset($_POST['password']) && !empty($_POST['password'])){
        
        $username=trim($_POST['username']);
        $usernameClean=htmlspecialchars($username);
        $usernameSQL=$connection->real_escape_string($usernameClean);
      
        $password= trim($_POST['password']);
        $passwordClean=htmlspecialchars($password);
        $passwordSQL = $connection->real_escape_string($passwordClean);
        $passwordPattern = "/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}/";

        if(preg_match($passwordPattern,$passwordSQL)){
            echo "<h3>PHP: Password is valid!</h3>";
        }else{
            echo "<h3>PHP: Password is invalid!</h3>";
        }
    }
    
    
    echo "This is your username: ".$usernameSQL;
    echo '<br>';
    echo "This is your Password: ".$passwordSQL;

$to = "gospicsasa142@gmail.com";
$headers = "bcc:mycompany@gmail.com";
$message= mt_rand(10000, 99999);
$subject="Two factor authentication";
echo "<br>";
echo "This is a one-time number for you: ".$message;
echo "<br>";
$send_mail = mail($to,$subject,$message,$headers);  

if($send_mail === false) {
        die('Unable to send mail, please try again !');
    }
    else {
        echo "email has been sent!";
    }
}  
    
?> 