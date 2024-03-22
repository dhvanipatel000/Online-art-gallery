<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="ag3.png">
<title>Login</title>
<link rel="stylesheet" href="stylesheet.css">
</head>
<body>
<h1>User Login</h1>
   
   <form action="mainpage.php" method="POST">
   <label id="a">Username</label><br>
   <input type="text" name="username"></input><br><br>
   <label id="b">Password</label><br>
   <input type="password" name="password"></input><br><br>
   <button type="submit" name="submit">Submit</button>
   <button type="reset" name="reset">Reset</button><br><br>
   <font size="4"><a href="forgot_password.php">Forgot Password</a><br><br>
   <font size="4"><a href="signup.php">New Registration? Click here to sign-in</a></font><br><br>
   <font size="4"><a href="mainpage.php">Skip LOGIN</a></font>
   </form>
</body>
</html>