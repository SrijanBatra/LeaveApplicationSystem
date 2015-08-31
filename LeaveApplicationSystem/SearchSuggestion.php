
<?php
$con = mysqli_connect('localhost',"monty","some_pass",'mysql');			//mysqli_connect(host,username,password,dbname);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$result = mysqli_query($con,"SELECT * FROM employees");

//print_r($result);
while($row = mysqli_fetch_array($result)) {
	//print_r($row);
  $a[] = $row;
}


//echo "<br><br><br>";
//print_r($a[0][0]);

for($r = 0;$r < count($a);$r++){
  $b[] = $a[$r][0];
}

//echo "<br><br><br>";
//print_r($b);

// get the q parameter from URL
$q=$_REQUEST["q"]; $hint = array();

// lookup all hints from array if $q is different from "" 
if ($q !== "") {
  $q=strtolower($q); $len=strlen($q);
  for($r = 0;$r < count($b);$r++){
    $name = $a[$r];
    if (stristr($q, substr($b[$r],0,$len))) {
      
      if (empty($hint)) {
        $hint[0] = $name;
      } 
      else {
        array_push($hint,$name);
        console.log($hint);
      }
    }
  }
}

// Output "no suggestion" if no hint were found
// or output the correct values 
if(empty($hint))
  echo "no suggestion";
else{
  //print_r($hint);
  $js_array = json_encode($hint);
  echo  $js_array;
}
?>  