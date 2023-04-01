<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
	<style type="text/css">
		body{
			font-family: Arial, Helvetica, sans-serif;
			background-color: #f1f1f1;
		}
		form {
			border: 3px solid #f1f1f1;
			background-color: #fff;
			padding: 20px;
			width: 50%;
			margin: 0 auto;
		}
		input[type=text], input[type=email], input[type=password], input[type=tel] {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			box-sizing: border-box;
			border-radius: 4px;
		}
		button {
			
			background-color: #576CBC;
			color: white;
			padding: 14px 20px;
			margin: 20px 150px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			width: 50%;
			
		}
		button:hover {
			background-color: #576CBC;
		}
		.cancelbtn {
			width: auto;
			padding: 10px 18px;
			background-color: #f44336;
		}
		.container {
			padding: 16px;
		}
		span.psw {
			float: right;
			padding-top: 16px;
		}
		@media screen and (max-width: 600px) {
			form {
				width: 100%;
			}
		}
	</style>
</head>
<?php
$delete=$_GET['delete'];
if($delete==1)
{
	echo "<script>alert('Account deleted successfully!');</script>";
	
}
$post=$_GET['post'];
if($post==1)
{
	echo "<script>alert('Logged Out!');</script>";
    
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$first_nam = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
$password = $_POST['password'];
$confpass=$_POST['confirm_password'];

    if ($password != $confpass) {
        echo "<script>alert('Passwords do not match. Please try again.');</script>";
    } else {
		if (strpos($email, "@iitp.ac.in") === false) {
			echo "<script>alert('Please enter a IIT-P email id!');</script>";
		} else {
			if (strlen($password) < 8) {
				// Display a JavaScript prompt
				echo "<script>alert('Password must be at least 8 characters long.');</script>";
			} else if (!preg_match("#[0-9]+#", $password)) {
				// Display a JavaScript prompt
				echo "<script>alert('Password must contain at least one number.');</script>";
			} else if (!preg_match("#[A-Z]+#", $password)) {
				// Display a JavaScript prompt
				echo "<script>alert('Password must contain at least one uppercase letter.');</script>";
			} else if (!preg_match("#[a-z]+#", $password)) {
				// Display a JavaScript prompt
				echo "<script>alert('Password must contain at least one lowercase letter.');</script>";
			} else {
				if(strpos($first_name, ' ')!=false&&strpos($last_name, ' ')!=false)
				{
					echo "<script>alert('No spaces allowed in the name!');</script>";
				}
				else{
                     
					$first_nam = $_POST['first_name'];
					
	$last_name = $_POST['last_name'];
	$email = $_POST['email'];
	$phone_number = $_POST['phone_number'];
	$password = $_POST['password'];
	$conn=new mysqli('127.0.0.1','root','','dblab');
	$sql="INSERT into userinfo(first_name,last_name,email,phone_number,pass) values ('$first_nam','$last_name','$email','$phone_number','$password')";

$conn->query($sql);

					header("Location: After_Reg.php");
			        exit(); // Ensure that no further output is sent
}}}}}?>
<body>

	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>&delete=0&post=0">
		
			<h1>Registration Form</h1>
			<label for="first_name"><b>First Name</b></label>
			<input type="text" placeholder="Enter First Name" name="first_name" required>

			<label for="last_name"><b>Last Name</b></label>
			<input type="text" placeholder="Enter Last Name" name="last_name" required>

			<label for="email"><b>Email</b></label>
			<input type="email" placeholder="Enter Email" name="email" required>

			<label for="phone_number"><b>Phone Number</b></label>
			<input type="tel" placeholder="Enter Phone Number" name="phone_number" required>

			<label for="password"><b>Password</b></label>
			<input type="password" placeholder="Enter Password" name="password" required>

			<label for="confirm_password"><b>Confirm Password</b></label>
			<input type="password" placeholder="Confirm Password" name="confirm_password" required>
			
	        
			

			<button type="submit">Register</button>
			<label style="text-align: center;">
				 <br> <br> <br><br> 
			</label>
			<label style="text-align: center;">Already have an account?<br></label>
				
			
			<button onclick="window.location.href='config.php'">Login</button>
			
				
		
	</form>
	
	
	

	
	
			
	

</body>
</html>
