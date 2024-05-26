<?php
include '../model/establishConn.php';
session_start();
$_SESSION['name'] = 'John Doe';
$_SESSION['Email'] = 'john.doe@example.com';
$_SESSION['PhoneNumber'] = '1234567890';
$_SESSION['devEmail'] ='adminadmin@gmail.com';
function insertContactUs($name, $email, $phone, $message) {
    $conn = establishConn();
    $sql = "INSERT INTO ContactUs (name, email, phone_number, message ) VALUES (:name, :email, :phone, :message)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':message', $message);
    $stmt->execute();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submitMainContact'])) {
        $name = htmlspecialchars($_POST['Name']);
        $email = htmlspecialchars($_POST['Email']);
        $phone = htmlspecialchars($_POST['PhoneNumber']);
        $message = htmlspecialchars($_POST['Message']);
    }
    else{
        $name = htmlspecialchars($_SESSION['name']);
        $email = htmlspecialchars($_SESSION['Email']);
        $phone = htmlspecialchars($_SESSION['PhoneNumber']);
        $message = htmlspecialchars($_POST['Message']);
    }
        try {
            if (!defined('INCLUDED')) {
                insertContactUs($name, $email, $phone, $message);
            }
                header("Location: ../view/supportContact.php");
                exit; // Make sure to exit after the redirection 
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } 
?>