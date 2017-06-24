<html>
<head>
</head>
<body>
<form method="post" action="notes.php">
<p><textarea id ="text"  name="note" placeholder="click here to write note"rows="4" cols="190"></textarea></p>
<p><input type="submit" value="Submit"></p>
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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (!empty($_POST['note'])) {
      $note=$_POST['note'];
    $servername = "localhost";
    $username = "";// Enter mysql username
    $password = "";// Enter mysql password
    $dbname = "spider";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $stmt = $conn->prepare("INSERT INTO NOTES (info) VALUES (?)");
    $stmt->bind_param("s", $info);
   // set parameters and execute

    $info=$note;
    $stmt->execute();
    $stmt->close();
    $conn->close();
    header("Location:backend.php");
  }
}
 ?>
