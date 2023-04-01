<!DOCTYPE html>
<html>
<head>
	<title>Update User</title>
	<style type="text/css">
	<!DOCTYPE html>
<html>
<head>
	<title>Update User Information</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
		}
		form {
			background-color: white;
			padding: 20px;
			border-radius: 5px;
			box-shadow: 0px 0px 10px #ccc;
			margin: 50px auto;
			max-width: 500px;
			display: flex;
			flex-direction: column;
			align-items: center;
		}
		input[type=text], input[type=password], input[type=tel], input[type=email] {
			width: 100%;
			padding: 12px;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
			margin-bottom: 16px;
			font-size: 16px;
		}
		input[type=submit] {
			background-color: #576CBC;
			color: white;
			padding: 12px 20px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			font-size: 16px;
			align-self: flex-end;
		}
		input[type=submit]:hover {
			background-color: #576CBC;
		}
		input[type=submit]:focus {
			outline: none;
		}
		h1 {
			text-align: center;
			margin-top: 0px;
			margin-bottom: 30px;
			color: #576CBC;
		}
		.container {
			padding: 16px;
		}
		.error {
			color: #FF0000;
		}
	</style>
</head>
<body>
	<h1>Update User</h1>
	<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
		// Database connection
		
		$conn=new mysqli('127.0.0.1','root','','dblab');
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

        $first_name = $_POST['name'];                
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone'];
        $password = $_POST['password'];
		{
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
                         
       
        $conn=new mysqli('127.0.0.1','root','','dblab');
        $sql = "UPDATE userinfo SET first_name='$first_name' WHERE email='$email'";
     $conn->query($sql);
    if (mysqli_query($conn, $sql)) {
		echo "User updated successfully!";
	} else {
		echo "Error updating user: " . mysqli_error($conn);
	}
    
                        header("Location: Config.php");
                        exit(); // Ensure that no further output is sent
    
                    }
                    
                }
            }
                
        }
		
		
	

	// Close database connection

}
			 

	?>
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<label for="name">Name:</label>
		<input type="text" name="name" id="name" value="" required>

		<label for="last_name">Last Name:</label>
		<input type="text" name="last_name" id="last_name" value="" required>

		<label for="password">Password:</label>
		<input type="password" name="password" id="password" required>

		<label for="phone">Phone Number:</label>
		<input type="tel" name="phone" id="phone" value="" required>

		<label for="email">Email:</label>
		<input type="email" name="email" id="email" value="" required>

		<input type="hidden" name="user_id" value="">
		<input type="submit" value="Update">
	</form>
</body>
</html>
