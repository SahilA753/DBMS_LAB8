<!DOCTYPE html>
<html>
<head>
	<title>Registration Success</title>
	<style type="text/css">
		body{
			font-family: Arial, Helvetica, sans-serif;
			background-color: #f1f1f1;
		}
		.container {
			border: 3px solid #f1f1f1;
			background-color: #fff;
			padding: 20px;
			width: 50%;
			margin: 0 auto;
			text-align: center;
		}
		h1{
			color: #576CBC;
		}
		button {
			background-color: #576CBC;
			color: white;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			width: 100%;
		}
		button:hover {
			background-color: #45a049;
		}
		@media screen and (max-width: 600px) {
			.container {
				width: 100%;
			}
		}
	</style>
</head>
<body>
<?php

	
?>
	<div class="container">
		<h1>Registration Success</h1>
		<p>Successfully Registered! Now login to your account.</p>
		<button onclick="window.location.href='config.php'">Login</button>
	</div>
</body>
</html>
