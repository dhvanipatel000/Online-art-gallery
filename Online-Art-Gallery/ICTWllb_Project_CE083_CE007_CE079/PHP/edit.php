<?php
// Include config file
session_start();
require_once "config.php";
// Define variables and initialize with empty values
$uname = $address = $Email = $Contact = "";
$uname_err = $address_err = $email_err = $contact_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate name
    $input_uname = trim($_POST["uname"]);
    if(empty($input_uname)){
        $uname_err = "Please enter a name.";
    } 
    elseif(strlen($input_uname) < 6 || strlen($input_uname) > 12){
        $uname_err = "Username must contain 6 to 15 character!";
    } else{
        $uname = $input_uname;
    }
    
    // Validate address address
    $input_address = trim($_POST["address"]);
    if(empty($input_address)){
        $address_err = "Please enter an address.";     
    } else{
        $address = $input_address;
    }


    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter an email address!.";     
    }
    elseif(!filter_var($input_email, FILTER_VALIDATE_EMAIL)){
        $email_err = "Please enter valid email address!";
    }
     else{
        $Email = $input_email;
    }
    
   
    $input_contact = trim($_POST["contact"]);
    if(empty($input_contact)){
        $contact_err = "Please enter Contact number.";     
    } elseif(!ctype_digit($input_contact) || strlen($input_contact) > 10){
        $contact_err = "Please enter valid Contact number.";
    } else{
        $Contact = $input_contact;
    }
    
 
    if(empty($uname_err) && empty($email_err) && empty($contact_err) && empty($address_err)){
        // Prepare an update statement
        $sql = "UPDATE sign SET username=?, EmailAddress=?, ContactNumber=?, ResidenceAddress=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssisi", $param_uname, $param_email, $param_contact, $param_address, $param_id);
            
            // Set parameters
            $param_uname = $uname;
            $param_email = $Email;
            $param_contact = $Contact;
            $param_address = $address;
            $param_id = $id;
            
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: mainpage.php");
                exit();
            } 
            else{
                echo "Something went wrong. Please try again later.";
            }
        }  
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
} 
else{
  
    if(isset($_SESSION["id"]) && !empty(trim($_SESSION["id"]))){
        $id =  trim($_SESSION["id"]);
        
      
        $sql = "SELECT * FROM sign WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
           
            $param_id = $id;
           
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    $uname = $row["username"];
                    $Contact = $row["ContactNumber"];
                    $Email = $row["EmailAddress"];
                    $address = $row["ResidenceAddress"];
                } else{
                    header("location: error.php");
                    exit();
                }
                
            } 
            else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  
    else{
        // URL doesn't contain id parameter. Redirect to error page
        echo "<script>alert('Please login to continue.')</script>";
        echo "<script>window.location = 'login.php'</script>";
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Profile</title>
<link rel="icon" href="ag3.png">

<link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap" rel="stylesheet">
</head>
<body>
<style>
body{
background-image: url("bkg3.jpg");
background-size: cover;
background-repeat : no-repeat ;
}
h2{
font-family: 'Amatic SC', cursive;
color : darkblue;
font-size : 60px;
font-weight : 1000;
}
p{
font-family : monospace;
font-size: 20px;
}
div{
font-size : 23px;
font-family : monospace;
}
a{
font-family : monospace;
font-size: 20px;
}
</style>
   
	<div>
		<center><h2><u>Edit My Profile</u></h2></center>
	</div>
	<center><p>Please edit the input values and submit the updated record.</p></center>
	<center><form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
		<div <?php echo (!empty($uname_err)); ?>">
			<label>User Name</label>&nbsp;
			<input style="background-color: white; font-size:17px; font-family:monospace; color:darkblue;" type="text" name="uname" value="<?php echo $uname; ?>">
			<br><br><span><?php echo $uname_err;?></span>
		</div>
        <div <?php echo (!empty($address_err)); ?>">
			<label>Address</label>&nbsp;
			<textarea style="background-color: white; font-size:17px; font-family:monospace; color:darkblue;" name="address" ><?php echo $address; ?></textarea>
			<br><br><span><?php echo $address_err;?></span>
		</div>
		<div <?php echo (!empty($email_err)); ?>">
			<label>Email</label>&nbsp;
			<input style="background-color: white; font-size:17px; font-family:monospace; color:darkblue;" type="mail" name="email" value="<?php echo $Email; ?>">
			<br><br><span><?php echo $email_err;?></span>
		</div>
		<div <?php echo (!empty($Contact_err)); ?>">
			<label>Contact</label>&nbsp;
			<input style="background-color: white; font-size:17px; font-family:monospace; color:darkblue;" type="tel" name="contact" value="<?php echo $Contact; ?>">
			<br><br><span><?php echo $contact_err;?></span>
		</div>
		<input type="hidden" name="id" value="<?php echo $id; ?>"/>
		<br><input style="background-color: white; font-size:23px; font-family:monospace; color:darkblue;" type="submit" value="Submit"><br><br>
		<a href="mainpage.php">Back to home page</a>
	</form></center>
    <br><br><center><a href= "uploaded_art.php">Edit your uploaded arts</a></center>
</body>
</html>