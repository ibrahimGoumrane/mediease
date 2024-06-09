<?php
include '../model/establishConn.php';
session_start();


function insertContactUs($name, $email, $phone, $message) {
    $conn = establishConn();
    $sql = "INSERT INTO ContactUs (name, email, phone_number, message , User_mail ) VALUES (:name, :email, :phone, :message , :devEmail)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':message', $message);
    $devEmail = 'mizoxrizox@gmail.com';
    $stmt->bindParam(':devEmail',$devEmail);
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
        $name = htmlspecialchars($_SESSION['full_name']);
        $email = htmlspecialchars($_SESSION['email']);
        $phone = htmlspecialchars($_SESSION['phone_number']);
        $message = htmlspecialchars($_POST['Message']);
    }
        try {
            if (!defined('INCLUDED')) {
                insertContactUs($name, $email, $phone, $message);
            }
                header("Location: ../view/supportContact.php");
                exit; 
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } 
?>