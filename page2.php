<!DOCTYPE html>
<html>
<head>
	<title>User Dashboard</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
			background-color: #f5f5f5;
		}

		.container {
			max-width: 800px;
			margin: 0 auto;
			padding: 20px;
			background-color: #fff;
			box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
			text-align: center;
		}

		h1 {
			font-size: 2em;
			margin-bottom: 20px;
		}

		button {
			background-color: #576CBC;
			color: #fff;
			border: none;
			padding: 10px 20px;
			margin-right: 10px;
			cursor: pointer;
		}

		button:hover {
			background-color: #3e8e41;
		}

		img {
			max-width: 100%;
			height: auto;
			margin-bottom: 20px;
		}

	</style>
</head>
<body>
	<div class="container">
    <?php
    session_start();
        $email = $_GET["email"];
        if (!isset($_SESSION['email'])) {
			header('Location: Config.php');
            session_destroy();
			exit();
		}
        

       
        $_SESSION['email'] = $email;
        

        ?>

		<h1>Welcome </h1>
		<img src="anime_image.jpg" alt="Anime Image">
		<p>Current Date and Time: <?php echo date("Y-m-d H:i:s"); ?></p>
        <button onclick="location.href='Userinfo.php?email=<?php echo urlencode($email); ?>'">User Info</button>
        <button onclick="location.href='UpdateUser.php?email=<?php echo urlencode($email); ?>'">Update User</button>
        <button onclick="location.href='Registration.php?&post=1&delete=0'">Logout</button>
		<button onclick="location.href='DeleteUser.php?email=<?php echo urlencode($email); ?>'">Delete User</button>
		
		
		

       
	</div>
</body>
</html>
