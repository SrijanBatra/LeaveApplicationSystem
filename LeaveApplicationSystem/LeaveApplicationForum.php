<html>
<body>

<center><h1>Leave Application Forum</h1><br><br></center>

<!-- establishing connection to database. -->
<?php
require 'sqlfire.php';

echo "<br><br>";


$startdate = $enddate = $grant = "";
$no_of_rows = 0;





$result = mysqli_query($con,"SELECT * FROM mydbs");

echo "<pre>";
	
foreach ($_REQUEST['accepted'] as $key => $value) {
	echo "accepted:".$value."<br>";
	mysqli_query($con,"DELETE FROM mydbs WHERE EmpID='$value'");
	
}

foreach ($_REQUEST['declined'] as $key => $value) {
	echo "declined:".$value."<br>";
	mysqli_query($con,"DELETE FROM mydbs WHERE EmpID='$value'");
}

	//print_r($_REQUEST);
?>

<table border='1'>
<tr>
<th>EmpID</th>
<th>EmpName</th>
<th>StartDate</th>
<th>EndDate</th>
<th>Grant</th>
<th>Deny</th>
</tr>

<form action = "<?php echo $_SERVER["PHP_SELF"]; ?>" method = "post">

<?php
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['EmpID'] . "</td>";
  echo "<td>" . $row['Name'] . "</td>";
  echo "<td>" . date("Y-m-d",$row['Start_Date']) . "</td>"; // date('r', $epoch);
  echo "<td>" . date("Y-m-d",$row['End_Date']) . "</td>";
  echo "<td> <input type = 'checkbox' name = 'accepted[]' value=".$row['EmpID']."> </td>";
  echo "<td> <input type = 'checkbox' name = 'declined[]' value=".$row['EmpID']."> </td>";
  echo "</tr>";
  $no_of_rows;
}
?>

<input type = "submit" value = "submit" name = "submit">
</form>
</table>


<?php
mysqli_close($con);
?>