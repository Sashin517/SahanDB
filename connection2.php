<?php
$servername = "sql6.freemysqlhosting.net";
$username = "sql6639180";
$password = "39mWrBLjxU";
$dbname = "sql6639180";

$firstname = $_GET["first_name"];
$lastname = $_GET["last_name"];
$DOB=$_GET["dob"];
$email = $_GET["email"];
$phone_no = $_GET["phone_no"];
$user_name = $_GET["user_name"];
$pwd = $_GET["pwd"];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$count_query = "SELECT COUNT(email) AS email_count FROM member";
$result = $conn->query($count_query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $count = (int)$row["email_count"] + 1;
} else {
    $count = 1; // Set to 1 if no rows are returned
}

$sql = "INSERT INTO member (member_id, firstname, lastname, DOB, email, phone_no, user_name, password)
VALUES ('$count', '$firstname', '$lastname', '$DOB', '$email', '$phone_no', '$user_name', '$pwd')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
