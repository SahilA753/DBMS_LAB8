<!DOCTYPE html>
<html>
<head>
	<title>User Info</title>
	<style>
		body {
			background-color: #f2f2f2;
			font-family: Arial, sans-serif;
		}
		h1 {
			text-align: center;
			margin-top: 50px;
		}
		img {
			display: block;
			margin: auto;
			width: 450px;
			height: 300px;
			margin-top: 30px;
            margin-bottom: 30px;
		}
       button{
	display: block;
	width: 100%;
	padding: 10px;
	border: none;
	border-radius: 5px;
	background-color: #576CBC;
	color: #fff;
	text-align: center;
	font-size: 18px;
	cursor: pointer;
  }
        button:hover {
			background-color: #3e8e41;
		}
		.container {
			max-width: 600px;
			margin: auto;
			padding: 20px;
			background-color: #fff;
			box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.3);
			margin-top: 50px;
			border-radius: 10px;
		}
		label {
			display: inline-block;
			margin-bottom: 10px;
			font-weight: bold;
		}
		p {
			margin-bottom: 20px;
		}
	</style>
</head>
<body>
	<?php
		// Retrieve user info from database
	
		// Create connection
		$conn=new mysqli('127.0.0.1','root','','dblab'); 
        
        $email1 = $_GET["email"];
        
		$_SESSION['email'] = $email1;

		// Check if the user is logged in
		if (!isset($_SESSION['email'])) {
			header('Location: Config.php');
			exit();
		}
       
			

        
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}

		// Retrieve user info from database
		$sql = "SELECT first_name,last_name, email, phone_number, pass FROM userinfo WHERE email = '$email1'";
		$result = $conn->query($sql);

		// Display user info
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$name = $row["first_name"];
			$last_name = $row["last_name"];
			$email = $row["email"];
			$phone_no = $row["phone_number"];
			$password = $row["pass"];

			echo '<h1>User Info</h1>';
			echo '<div class="container">';
            
			echo '<img src="anime-image (2).jpg" alt="Anime Image">';
            
			echo '<label>Name:</label><p>' . $name . '</p>';
			echo '<label>Last Name:</label><p>' . $last_name . '</p>';
			echo '<label>Email:</label><p>' . $email . '</p>';
			echo '<label>Phone No:</label><p>' . $phone_no . '</p>';
			
			echo '<button onclick="goBack()">Return</button>';
			echo '</div>';
		} else {
			echo '<p>No user info found.</p>';
		}

		// Close connection
		$conn->close();
	?>

	<script>
		function goBack() {
			window.history.back();
		}
	</script>
</body>
</html>
