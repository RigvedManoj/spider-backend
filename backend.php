<?php
$s=0;
session_start();
if(empty($_SESSION['username']))
{
header("Location:signup.php");
}
else {
$name=$_SESSION['username'];
if($name=="admin")
$s=1;
}
$servername = "localhost";
$username = "";// Enter mysql username
$password = "";// Enter mysql password
$dbname = "spider";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT info FROM NOTES";
$notes=array();
$i=0;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $notes[$i]=$row["info"];
      $i++;
}
}
  $conn->close();
 ?>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href=backend.css>
</head>
  <body>
   <ul>
      <li><a id="a1"></a></li>
      <li>
          <a><?php echo $name;?></a>
          <ul class="dropdown">
              <li><a href="signup.php">Log out</a></li>
          </ul>
      </li>
   </ul>
</body>
<script>
var a=0,i=0;
a= <?php echo $s;?>;
if(a==1)
{
document.getElementById("a1").innerHTML="update";
document.getElementById("a1").href="notes.php";
}
var notes= <?php echo json_encode($notes); ?>;
if(notes!=null)
while(i<notes.length)
{
if(i==0)
{
var x = document.createElement("OL");
    x.setAttribute("id", "myOL");
    document.body.appendChild(x);}
    var y = document.createElement("LI");
    y.setAttribute("id",i);
    var t1 = document.createTextNode(notes[i]);
    y.appendChild(t1);
    document.getElementById("myOL").appendChild(y);
    i++;
}
</script>
</html>
