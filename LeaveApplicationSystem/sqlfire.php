<!-- establishing connection to database. -->
<?php
// Create connection
$con = mysqli_connect('localhost',"monty","some_pass",'mysql');			//mysqli_connect(host,username,password,dbname);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

else{
	echo "connection established.<br>";
}
?>