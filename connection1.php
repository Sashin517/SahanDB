<?php
$servername = "sql6.freemysqlhosting.net";
$username = "sql6639180";
$password = "39mWrBLjxU";
$dbname = "sql6639180"; 

$name = $_GET["name"];
$pwd = $_GET["pwd"];


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT user_name, password FROM member WHERE user_name='$name' AND password='$pwd'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    echo "<script type='text/javascript'>alert('Login successful!');
     window.location.href = 's1.html'; 
     </script>";
} else {
   
    echo "<script type='text/javascript'>alert('Login failed. Please check your username and password');</script>";
    echo "ERROR";
}

$conn->close();
?>
