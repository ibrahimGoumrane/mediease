<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = 'localhost';
$dbname = 'medieaseDB';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get form data
    $full_name = $_POST['full_name'];
    $date_of_birth = $_POST['date_of_birth'];
    $gender = $_POST['gender'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $hashed_password  = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $user_type = $_POST['user_type'];
    $years_of_experience = isset($_POST["years_of_experience"]) ? $_POST["years_of_experience"] : null;
    $specialization = isset($_POST["specialization"]) ? $_POST["specialization"] : null;
    $medical_history = isset($_POST["medical_history"]) ? $_POST["medical_history"] : null;

    // Insert into Person table
    $stmt = $conn->prepare("INSERT INTO Person (full_name, date_of_birth, gender, phone_number, email, password) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$full_name, $date_of_birth, $gender, $phone_number, $email, $hashed_password]);

    // Get the last inserted id
    $person_id = $conn->lastInsertId();

    // Insert into Patient or Doctor table
    if ($user_type == 'patient') {
        $stmt = $conn->prepare("INSERT INTO Patient (id,medical_history) VALUES (?,?)");
        $stmt->execute([$person_id, $medical_history]);
    } else if ($user_type == 'doctor') {
        $stmt = $conn->prepare("INSERT INTO Doctor (id,years_of_experience,specialization) VALUES (?,?,?)");
        $stmt->execute([$person_id,$years_of_experience,$specialization]);
    }

    echo "Sign up successful!";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>
