<?php
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$password = $_POST['password'];
$email = $_POST['email'];
$phoneNumber = $_POST['phoneNumber'];
$postalCode = $_POST['postalCode'];

//Database connection
$conn = new mysqli('localhost', 'root', '', 'kennchan');
if ($conn->connect_error) {
    die('connection failed :' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("insert into registration (firstName,lastName,password,email,phoneNumber,postalCode)
values(?,?,?,?,?,?)");
    $stmt->bind_param("ssssii", $firstName, $lastName, $password, $email, $phoneNumber, $postalCode);
    $stmt->execute();
    echo "registration successful........";
    $stmt->close();
    $conn->close();
}
