<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" >
	<style type="text/css">
		form {
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-top: 50px;
}

label {
  font-size: 16px;
  font-weight: bold;
  margin-bottom: 8px;
}

input[type="text"],
input[type="password"],
input[type="email"],
textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-bottom: 16px;
  font-size: 16px;
}

input[type="checkbox"] {
  margin-top: 16px;
}

input[type="submit"] {
  background-color: #576CBC;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 16px;
}

input[type="submit"]:hover {
  background-color: #576CBC;
}

input[type="submit"]:focus {
  outline: none;
}

.error {
  color: #FF0000;
}

	</style>
</head>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
session_start();


	$email = $_POST['email'];
	$password = $_POST['password'];
	$_SESSION['email'] = $email;
	

	$conn=new mysqli('127.0.0.1','root','','dblab'); 
	$sql="SELECT pass from userinfo where email='$email'";
    $result=$conn->query($sql);
	$row = $result->fetch_assoc();
	    if($row["pass"]!=$password)
		{
			echo "<script>alert('Password and Username do not match! Please Enter your credentials again!!');</script>";

		}
		else{
			header("Location: page2.php?email=" . urlencode($email) );
			exit(); 
		}
	}

?>
<body>
	
		<h2>Login</h2>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
			<label>Email:</label>
			<input type="text" name="email" placeholder="Enter Email" required>
			<label>Password:</label>
			<input type="password" name="password" placeholder="Enter Password" required>
			<input type="submit" name="submit" value="Login">
		</form>
	
</body>
</html>

