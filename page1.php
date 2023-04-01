<!DOCTYPE html>
<html>
<head>
	<title>User Management System</title>
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
			background-color: #4CAF50;
			color: #fff;
			border: none;
			padding: 10px 20px;
			margin-right: 10px;
			cursor: pointer;
		}

		button:hover {
			background-color: #3e8e41;
		}

		table {
			border-collapse: collapse;
			margin-top: 20px;
			margin-bottom: 20px;
			width: 100%;
		}

		table th, table td {
			border: 1px solid #ddd;
			padding: 8px;
			text-align: left;
		}

		table th {
			background-color: #f2f2f2;
			color: #555;
		}

	</style>
</head>
<body>
	<div class="container">
		<h1>User Management System</h1>
		<button onclick="location.href='add_user.php'">Add User</button>
		<table>
			<tr>
				<th>ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>Phone Number</th>
				<th>Actions</th>
			</tr>
			<?php
				// Connect to database
				$conn = mysqli_connect("localhost", "username", "password", "database_name");

				// Check connection
				if (!$conn) {
					die("Connection failed: " . mysqli_connect_error());
				}

				// Retrieve users from database
				$sql = "SELECT * FROM users";
				$result = mysqli_query($conn, $sql);

				// Display users in table
				if (mysqli_num_rows($result) > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
						echo "<tr>";
						echo "<td>" . $row['id'] . "</td>";
						echo "<td>" . $row['first_name'] . "</td>";
						echo "<td>" . $row['last_name'] . "</td>";
						echo "<td>" . $row['email'] . "</td>";
						echo "<td>" . $row['phone_number'] . "</td>";
						echo "<td>";
						echo "<button onclick=\"location.href='edit_user.php?id=" . $row['id'] . "'\">Edit</button>";
						echo "<button onclick=\"if(confirm('Are you sure you want to delete this user?')){location.href='delete_user.php?id=" . $row['id'] . "'}\">Delete</button>";
						echo "</td>";
						echo "</tr>";
					}
				} else {
					echo "<tr><td colspan='6'>No users found.</td></tr>";
				}

