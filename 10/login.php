<!DOCTYPE html>
<html>
<title>Login</title>
</head>
<body>
<?php
require('db.php');
// If form submitted, insert values into the database.
if (isset($_POST['username'])){
        // removes backslashes
	$username =$_REQUEST['username'];
        //escapes special characters in a string
	$password = $_REQUEST['password'];
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE username='$username'
and password='$password'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
        if($rows==1){
	    echo "Logged in successfully" ;
         }else{
	echo "Incorrect Login Credentials";
	}
    }else{
?>
<div class="form">
<h1>Log In</h1>
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="Username" required /><br>
<input type="password" name="password" placeholder="Password" required />
<br>
<input name="submit" type="submit" value="Login" />
</form>
<p>Not registered yet? <a href='registration.php'>Register Here</a></p>
</div>
<?php } ?>
</body>
</html>
