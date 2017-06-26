<html>
<head>
  <style>
  OL
  {
    margin-top:150px;
    overflow:scroll;
    overflow-x:hidden;
    list-style-type: none;
  }
  OL LI {
         background: #f2f2f2;
         text-align: center;
         padding : 20px;
         font-weight: 600;
         font-family: cursive;
         text-transform: uppercase;
         margin-bottom: 15px;
         }
OL LI:hover
{
  cursor:pointer;
  color: #fff;
  background: #939393;
}
  </style>
</head>
<body>
<form method="post" action="notes.php">
<p><textarea id ="text"  name="note" placeholder="click here to write note"rows="4" cols="190"></textarea></p>
<p><input type="submit" value="Submit"></p>
</form>
<form method="post" action="backend.php">
<p><input type="submit" value="Done"></p>
</form>
</body>
<?php
session_start();
if(empty($_SESSION['username']))
{
header("Location:signup.php");
}
else {
$name=$_SESSION['username'];
if($name!="admin")
  header("Location:backend.php");
}

$servername = "localhost";
$username = "";//enter mysql username
$password = "";//enter mysql password
$dbname = "spider";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_GET['hello'])) {
  $a=$_GET['hello'];
 $sql = "DELETE FROM NOTES WHERE id =$a";
 $result = $conn->query($sql);
}
$sql = "SELECT id,info FROM NOTES";
$notes=array();
$id=array();
$i=0;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $notes[$i]=$row["info"];
      $id[$i]=$row["id"];
      $i++;
}
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (!empty($_POST['note'])) {
      $note=$_POST['note'];
    $stmt = $conn->prepare("INSERT INTO NOTES (info) VALUES (?)");
    $stmt->bind_param("s", $info);
   // set parameters and execute

    $info=$note;
    $stmt->execute();
    $stmt->close();
    $conn->close();
    header("Location:notes.php");
  }
}
 ?>
 <script>
 var i=0,rem;
 var notes= <?php echo json_encode($notes); ?>;
 var id=<?php echo json_encode($id); ?>;
 if(notes!=null)
 while(i<notes.length)
 {
 if(i==0)
 {
 var x = document.createElement("OL");
     x.setAttribute("id", "myOL");
     document.body.appendChild(x);}
     var y = document.createElement("LI");
     y.setAttribute("id",id[i]);
     var t1 = document.createTextNode(notes[i]);
     y.appendChild(t1);
     document.getElementById("myOL").appendChild(y);
     var f1 = document.getElementById(id[i]);
   f1.addEventListener("click",modify);
      i++;
 }
 function modify(e)
 {
     rem=e.target.id;
    // console.log(rem);
   window.location.href = 'notes.php?hello='+rem;
 }
 </script>
