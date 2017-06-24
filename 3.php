<?php
$servername = "localhost";
$username = "";//enter mysql username
$password = "";//enter mysql password
$dbname = "spider";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//sql to drop table
$sql="DROP TABLE SIGNUP";
mysqli_query($conn, $sql);
$sql="DROP TABLE NOTES";
mysqli_query($conn, $sql);
// sql to create table
$sql = "CREATE TABLE SIGNUP(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
pass VARCHAR(100) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
)";

if (mysqli_query($conn, $sql)) {
    echo  "Table SIGNUP created successfully  ";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
$sql = "CREATE TABLE NOTES(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
info TEXT NOT NULL,
reg_date TIMESTAMP
)";
if (mysqli_query($conn, $sql)) {
    echo "Table NOTES created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
