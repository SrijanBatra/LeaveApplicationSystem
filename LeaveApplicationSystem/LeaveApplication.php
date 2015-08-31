
<html>
<body>

<center><h1>Leave Application</h1><br><br></center>


<!-- establishing connection to database. -->
<?php
require 'sqlfire.php';
?>


<h3>Enter details:</h3>

<?php

ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);

$flag = 0;
$startdate = $enddate = $name = $empid = $emailid = "";
$startdateErr = $enddateErr = $invaliddates = $nameErr = $empidErr = $emailErr = "";
$clearmsg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	
	//empID
	if(empty($_POST["empid"])){
		$empidErr = "employ ID not entered.";
		$flag = 1;
	}
	else{
		$empid = $_POST["empid"];
	}

	//name.
	if (empty($_POST["name"])){
		$nameErr = "name not entered.";
		$flag = 1;
	}
	else{
		$name = $_POST["name"];
	}

	//start date.
	if (empty($_POST["startdate"])) {
	     $startdateErr = "start date required";
		$flag = 1;	   
	   }
	else{
		$_POST["startdate"] = substr($_POST["startdate"], 0, 4)."-".substr($_POST["startdate"], 5, 2)."-".substr($_POST["startdate"], 8, 2);
		$startdate = strtotime($_POST["startdate"]);
		//$startdateErr = $_POST["startdate"]."-".$startdate;
	}

	//end date
	if (empty($_POST["enddate"])){
		$enddateErr = "end date not entered!";
		$flag = 1;
	}
	else{
		$_POST["enddate"] = substr($_POST["enddate"], 0, 4)."-".substr($_POST["enddate"], 5, 2)."-".substr($_POST["enddate"], 8, 2);
		$enddate = strtotime($_POST["enddate"]);;
		//$enddateErr = $_POST["enddate"]."-".$enddate;
	}
	
	//start date end date validation.
	if(($enddate - $startdate) < 0){
		$invaliddates = "end date before start date!";
		$flag = 1;
	}

	if(empty($_POST['email'])){
		$emailErr = "email id required for notification!!";
		$flag = 1;
	}
	else{
		$emailid = $_POST['email'];
	}

	//all entries valid.
	if(isset($_POST["submit"]) && ($flag == 0)){
		mysqli_query($con,"INSERT INTO mydbs (EmpID,Name,Start_Date,End_Date,Email_ID) VALUES('$empid','$name','$startdate','$enddate','$emailid')");
		
		//$suc = mail("srijan.94@gmail.com","Leave Application","New leave application recieved from:" );
		$clearmsg = "All entries have been recorded!";
		//die;
	}


	
}


//echo "INSERT INTO mydbs (Name) VALUES('$name')";

?>

<form action = "<?php echo $_SERVER["PHP_SELF"]; ?>" method = "post" >

<?php echo "*All fields are required.";?><br><br>

Name:<input type = "text" name = "name">
	<span class="error">* <?php echo $nameErr;?></span><br><br>

EmpID:<input type = "text" name = "empid">
	<span class="error">* <?php echo $empidErr;?></span><br><br>	

Start Date (YYYY-MM-DD): <input type = "text" name = "startdate">	
	
	<span class="error">* <?php echo $startdateErr;?></span><br><br>

End Date (YYYY-MM-DD): <input type = "text" name = "enddate">
	
	<span class="error">* <?php echo $enddateErr;?></span><br><br>

Email ID: <input type = "text" name = "email">
	<span class="error">* <?php echo $emailErr;?></span><br><br>
	
<input type = "submit" value = "submit request for leave" name = "submit">
</form><br><br>

<?php echo $invaliddates;?>
<?php echo $clearmsg;?>


<!-- mysqli_query($con,"INSERT INTO Persons (FirstName, LastName, Age)
VALUES ('Peter', 'Griffin',35)"); -->

</body>
</html>