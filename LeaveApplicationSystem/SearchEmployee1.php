<html>
<head>

<h1><center> Employee Search Portal </center></h1>

<script>

function MyFunction(identity) {
    console.log(identity);
    //console.log(obj);
    console.log(obj[identity-1]);
    var array = obj[identity-1];
    document.getElementById("Actor_Name").innerHTML = array["0"];
    document.getElementById("DOB").innerHTML = array["1"];
    document.getElementById("Movie_Title").innerHTML = array["2"];
    document.getElementById("Movie_Year").innerHTML = array["3"];
    document.getElementById("Role").innerHTML = array["4"];
    

}

function showHint(str) {
  
  if (str.length==0) { 
    document.getElementById("txtHint").innerHTML="";
    return;
  }
  
  var xmlhttp=new XMLHttpRequest();
  var response;
  var auto = 0;

  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("txtHint").innerHTML = "";
      response = xmlhttp.responseText;
      //document.getElementById("txtHint").innerHTML = response;
      var obj = JSON.parse(response);
      window.obj = obj;
      obj.forEach(function(entry) {
        console.log(entry);        
        auto++;
        var space = document.getElementById("txtHint");
        space.innerHTML +=  
        //"<span class = 'test' id = " + auto + ">" + auto + ")" + entry["Name"] + "</span><br>";
        //space.getElementsByTagName("*")[auto-1].id;
        
        '<a id="' + auto + '" title= "Click to table entries" href = "#" onclick = "MyFunction(this.id); return false;">' + entry["Name"] + " " + '</a>';
        
      });

     //console.log(document.getElementById("txtHint").getElementsByTagName("span")[1].innerHTML);
 
    }
  }

  xmlhttp.open("GET","SearchSuggestion.php?q="+str,true);
  xmlhttp.send();
}

</script>
</head>
<body>

<p><b>Start typing a name in the input field below:</b></p>
<form> 
First name: <input type="text" onkeyup="showHint(this.value)">
</form>
<p>Suggestions: <span class = 'parent' id="txtHint"></span></p>

<table border='1'>
<tr>
<th>Name</th>
<th>Login_ID</th>
<th>EmpID</th>
<th>Email_ID</th>
<th>Department</th>
<th>Gender</th>
</tr>

<tr>
<td><span class = 'data' id = 'Actor_Name'></span></td>
<td><span class = 'data' id = 'DOB'></span></td>
<td><span class = 'data' id = 'Movie_Title'></span></td>
<td><span class = 'data' id = 'Movie_Year'></span></td>
<td><span class = 'data' id = 'Role'></span></td>

</tr>
</table>


</body>
</html>