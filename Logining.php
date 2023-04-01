<html>
	 <body>
		 Welcome 
		 <?php echo $_POST["username"]; ?>
		 <br> Your email address is:
		 <?php echo $_POST["password"]; ?> 

		 /* POSTdata.php */

<?php
$eid = $_POST['username'];

$pwd = $_POST['password'];

$conn=new mysqli('127.0.0.1','root','','dblab');
$sql = "SELECT Name, Salary, SSN

FROM information

WHERE eid= '$eid' and password=' $pwd' ";

=

$result = $conn->query($sql);

if ($result) {

}

// Print out the result

while ($row = $result->fetch_assoc()) {

printf ("Name: %s -- Salary: %s -- SSN: %s\n",$row ["Name"], $row ["Salary"], $row ['SSN']);

}



$result->free ();


$conn->close();
?>


	 </body>
</html>