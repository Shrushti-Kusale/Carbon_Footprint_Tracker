<?php
$conn = new mysqli("localhost","root","","carbon_tracker");

if($conn->connect_error){
    die("Database connection failed");
}

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$city = $_POST['city'] ?? '';
$phone = $_POST['phone'] ?? '';
$message = $_POST['other'] ?? '';

$stmt = $conn->prepare("
    INSERT INTO contact_messages
    (name,email,city,phone,message)
    VALUES (?,?,?,?,?)
");

$stmt->bind_param("sssss",
    $name,
    $email,
    $city,
    $phone,
    $message
);

$stmt->execute();

$stmt->close();
$conn->close();

echo "success";
?>
