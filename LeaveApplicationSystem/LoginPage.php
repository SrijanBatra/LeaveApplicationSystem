<html>
<body>
<center><h1> Login Page</h1></center>


<!-- establishing connection to database. -->
<?php
require 'sqlfire.php';



//$result = mysqli_query($con,"SELECT * FROM mydbs");


// define variables and set to empty values
$passwordErr = $idErr = "";
$password =  $id = "";
//$redirect = "$_SERVER[PHP_SELF]";
$flag = 0;
$clearmsg = "";
$fetched_pass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){

	if (empty($_POST["id"])){
		$idErr = "login id not entered!";
		$flag = 1;
	}
	else{
		$id = $_POST["id"];
	}

	if (empty($_POST["password"])){
		$passwordErr = "password is reqd!";
		$flag = 1;
	}
	else{
		$password = $_POST["password"];
	}
	
	if (isset($_POST["submit"]) && ($flag == 0)){
		//echo "string";
		$result = mysqli_query($con,"SELECT * FROM employees WHERE Login_ID = '$id'");
		$val = mysqli_fetch_array($result);
		//echo "<pre>";print_r($val);		
		if(!$val){
			$clearmsg = "User not found.";
		}
		else{
			//$clearmsg = "User found.";
			if($val["Password"] == $password){
				$clearmsg = "password authenticated <br> Press submit again to proceed with leave application. ";
				//echo "Department == >".$val["Department"];
				if($val["Department"] == "H"){
					//$redirect = "LeaveApplicationForum.php";
					header('location:HRlogin.php');
					//echo "Department == >".$val["Department"]."redirection==>".$redirect;

				}
				else{
					header('location:LeaveApplication.php');
					//$redirect = "LeaveApplication.php";
				}
			}
			else{
				$clearmsg = "password did not match! ";	
			}
		}
	}
}


?>

<form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "post">
	
	LoginID: <input type = "text" name = "id">
	<span class="error">* <?php echo $idErr;?></span><br><br>

	Password: <input type = "password" name = "password">
	<span class="error">* <?php echo $passwordErr;?></span><br><br>

      <pre><input type = "submit" value = "submit" name = "submit"></pre>
</form>

<?php echo $clearmsg; ?>
</body>
</html>

