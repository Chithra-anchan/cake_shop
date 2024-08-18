<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database123";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$name = $_POST['name'];
$address = $_POST['address'];//retrieve value of name and address from the http post rqst and store
 

$sql = "INSERT INTO details (name,  address) VALUES ('$name',  '$address')";
if ($conn->query($sql) === TRUE) {//execute sql query using query()
    $lastOrderId = $conn->insert_id;//it fetch last inserted id
    echo "Order submitted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
