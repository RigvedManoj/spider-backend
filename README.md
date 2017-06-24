# spider-backend
## server: XAMPP
## backend language used: PHP
## query language : MySQL
database:spider
tables used: signup and notes
signup table used to store details of clients
notes tables used to store class notes.

 ### [mysql](https://dev.mysql.com/downloads/workbench/).
 ### [XAMPP](https://www.apachefriends.org/download.html).

signup.php is the signup and login page to which you are rerouted if you are not logged in.
login.php checks if your email and password match the ones in database.
backend.php is the webpage which shows the list of class notes.
notes.php can only be accessed by the admin where new notes are wriiten.
2.php creates the database.
3.php creates the required tables.

 ### LOGIN PAGE:![Alt](/Screenshot%20(3).png "Title")
 
 ![Alt](/Screenshot%20(7).png "Title")
 
 ### student:![Alt](/Screenshot%20(4).png "Title")
 
 ### admin: ![Alt](/Screenshot%20(5).png "Title")

### add note:![Alt](/Screenshot%20(6).png "Title")

## Before running .php files , first start apache in XAMPP control panel.
## Also enter your username and password of MySQL in all the .php files[signup.php,login.php,backend.php,notes.php,2.php,3.php]
 
 ### A user with the username of admin is the teacher(the one who can add notes).
