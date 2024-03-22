<?php
session_start();
include_once 'config.php';
if(isset($_POST['submit']))
{
    $user_name1 = $_POST['user_name'];
    $result = mysqli_query($link,"SELECT * FROM sign where username='" . $_POST['user_name'] . "'");
    $row = mysqli_fetch_assoc($result);
    if($row>0){
      $user_name2 = $row['username'];
    	$email_id = $row['EmailAddress'];
	    $id = $row['id'];
    } 
    else{
      $user_name2 = "";
    }
  if($user_name1==$user_name2) {
    $to = $email_id;
    $otp = rand(100000,999999);
    $txt = "Hi, $user_id1. Your OTP to reset the password is $otp.";
    $headers = "From: artgallery@gmail.com\r\n";
    $subject = "Reset Password";
     $msg=mail($to,$subject,$txt,$headers);
    if($msg){
      $_SESSION['msg'] = 'OTP sent';
      date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
      $time = time()+(60*1);
      $date = date('Y/d/m h:i:s', $time);

      $query = "UPDATE reset_password SET otp='$otp' , ExpiryTime ='$date' WHERE id = '$id'";
      $new_result = mysqli_query($link,$query);
      header("Location:http://localhost/dhvani/art%20gallery/confirm_otp.php?id=$id");
    }
    else{
    echo "Mail was not sent!!";			
    }
  } 
				else{
					echo 'Invalid Username';
          exit();
				}
}
//echo phpinfo();
?>
<!DOCTYPE HTML>
<html>
<head>
<link rel="icon" href="ag3.png">
<title>Forgot Password </title>
<link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap" rel="stylesheet">
</head>
<body>
<style>
body{
background-image: url("bkg3.jpg");
background-size: cover;
background-repeat : no-repeat ;
}
h1{
font-family: 'Amatic SC', cursive;
color : darkblue;
font-size : 60px;
font-weight : 1000;
}
tr{
font-size : 25px;
font-family: monospace ;
color : red;
}
a{
font-size:25px;
font-family: monospace ;
margin-left: 200px;

}
</style>
<center><h1>Forgot Password<h1></center>
<form action='' method='post'>
<table cellspacing='5' align='center'>
<tr><td>Username:</td><td><input type='text' name='user_name'/></td></tr>
<tr><td></td><td><input style="background-color: white; font-size:20px; font-family:monospace; color:darkblue;" type='submit' name='submit' value='Submit'/></td></tr>
</table>
</form>
<center><a href="login.php">Back to Login page</a></center>
</body> 