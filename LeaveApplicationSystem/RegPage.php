<html>
<body>
<center><h1> Registeration Page</h1></center>


<!-- establishing connection to database. -->
<?php
require 'sqlfire.php';
?>


<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $passwordErr = $confirmationpasswordErr = $logidErr = "";
$name = $email = $password = $confirmationpassword = $logid = $empid = "";
$dept = "E";
$gender = "M";
$clearmsg = "";
$flag = 0;


if ($_SERVER["REQUEST_METHOD"] == "POST"){
	if (empty($_POST["name"])) {
	    $nameErr = "Name is required";
	   	$flag = 1;
	   }
	else {
	     $name = $_POST["name"];
	   }

	//login id.
	if (empty($_POST["logid"])){
		$logidErr = "login id not entered!";
		$flag = 1;
	}
	else{
		$logid = $_POST["logid"]; 
	}

	if (empty($_POST["empid"])){           //optional parameter handler.
		$empid = 0;
	}
	else{
		$empid = $_POST["empid"];
	}


	if (empty($_POST["password"])){
		$passwordErr = "password is reqd.";
		$flag = 1;
	}
	else{
		$password = $_POST["password"];
	}

	if($_POST["dept"] == "HR"){
		$dept = "H"; //H--> HR, by default the table has value employee.
		echo "dept selected is HR <br>";
	}
 
	if($_POST["gender"] == "female"){
		$gender = "F";
	}

	if (strcmp($_POST["password"],$_POST["confirmationpassword"])){
		$confirmationpasswordErr = "passwords do not match.";
		$flag = 1;
	}
	
	if(isset($_POST["submit"]) && $flag == 0){
		//echo $flag;
		$email = $_POST["email"];
		$gender = $_POST["gender"];
		//echo "the block was entered.";
		mysqli_query($con,"INSERT INTO employees (Name,Login_ID,EmpID,Email_ID,Department,Password,Gender) VALUES('$name','$logid','$empid','$email','$dept','$password','$gender')");
		$clearmsg = "Registeration complete! <br> ThankYou!";
	}

}


?>

<form action = "<?php echo $_SERVER["PHP_SELF"]; ?>" method = "post">
	
	Name: <input type = "text" name = "name">
	<span class="error">* <?php echo $nameErr;?></span><br><br>
	
	LoginID: <input type = "text" name = "logid">
	<span class="error">* <?php echo $logidErr;?></span><br><br>

	
	EmpID: <input type = "text" name = "empid">
	<?php echo " <i>optional field.</i>" ?><br><br>


	Password: <input type = "password" name = "password">
	<span class="error">* <?php echo $passwordErr;?></span><br><br>

	Re-type password: <input type = "password" name = "confirmationpassword">
	<span class="error">* <?php echo $confirmationpasswordErr;?></span><br><br>

	E-Mail: <input type = "text" name = "email"> <br><br>
	
	Gender:
	<label for="female">Female</label>
    <input type="radio" name="gender" value="female">
    <label for="male">Male</label>
    <input type="radio" name="gender" value="male"><br><br>

    Department:
    <label for="HR">HR</label>
    <input type = "radio" name = "dept" value = "HR">
    <label for="HR">employee</label>
    <input type = "radio" name = "dept" value = "emp">

    <pre><input type = "submit" value="submit" name="submit"></pre>
</form>

<?php echo $clearmsg; ?>

</body>
</html>

