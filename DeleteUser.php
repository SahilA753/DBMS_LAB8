<!DOCTYPE html>
<html>
<head>
	<title>Delete Account</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f5f5f5;
			margin: 0;
			padding: 0;
		}

		.container {
			max-width: 800px;
			margin: 0 auto;
			padding: 50px;
			background-color: #fff;
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
			text-align: center;
		}

		h1 {
			font-size: 36px;
			margin-bottom: 20px;
		}

		p {
			font-size: 18px;
			margin-bottom: 50px;
		}

		form {
			display: inline-block;
		}

		input[type="submit"], a {
			display: inline-block;
			padding: 10px 20px;
			border-radius: 5px;
			text-decoration: none;
			color: #fff;
			background-color: #007bff;
			border: none;
			cursor: pointer;
			transition: background-color 0.2s ease-in-out;
		}

		a {
			margin-left: 20px;
			background-color: #576CBC;
		}

		input[type="submit"]:hover, a:hover {
			background-color: #576CBC;
		}
	</style>
</head>

<body>
	<?php
		if(isset($_GET['email'])==1&&isset($_GET['delete'])==1) {
			session_start();
            $email1 = $_GET["email"];
        
            
    
    $emailx= $_GET["email"];
    $_SESSION['email'] = $emailx;

	
	 {

		$email = $_SESSION['email'];

		// Delete the user's account from the database
		$conn=new mysqli('127.0.0.1','root','','dblab'); 
		$sql = "DELETE FROM userinfo WHERE email = '$emailx'";
		$result = $conn->query($sql);

		// If the deletion was successful
		if ($result) {
			echo "<script>alert('Account deleted successfully!');</script>";
			session_destroy();
			header('Location: Registration.php?delete=1?post=0');
			exit();
		} else {
			echo '<div class="error">Failed to delete account. Please try again later.</div>';
		}
	}
		}
	?>
    <?php
    $emailx= $_GET["email"];
    $email1 = $_GET["email"];
        
    $_SESSION['email'] = $email1;

    // Check if the user is logged in
    if (!isset($_SESSION['email'])) {
        header('Location: Config.php');
        exit();
    }
    ?>

	<div style="max-width: 800px; margin: 0 auto; padding: 50px; background-color: #fff; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); text-align: center;">
		<h1>Delete Account</h1>
		<p>Are you sure you want to delete your account?</p>
		<a href="?email=<?php echo urlencode($emailx); ?>&delete=true" style="display: inline-block; padding: 10px 20px; border-radius: 5px; text-decoration: none; color: #fff; background-color: #576CBC border: none; cursor: pointer; transition: background-color 0.2s ease-in-out;">Delete</a>
		<a href="page2.php?email=<?php echo urlencode($emailx); ?>" style="margin-left: 20px; display: inline-block; padding: 10px 20px; border-radius: 5px; text-decoration: none; color: #fff; background-color: #6c757d; border: none; cursor: pointer; transition: background-color 0.2s ease-in-out;">Cancel</a>
	</div>
</body>
</html>
