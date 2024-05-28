<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once '../model/establishConn.php';
include_once '../model/Person.php';

$host = 'localhost';
$dbname = 'medieaseDB';
$username = 'root';
$password = '';


try {
    if($_SERVER["REQUEST_METHOD"] == "GET") {
        if(isset($_GET['is_signed_in']) && $_GET['is_signed_in'] == true) {
            if (session_status() == PHP_SESSION_ACTIVE) {
                session_destroy();
            }
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $data = unserialize($_GET['data']) ;
            $_SESSION['user_id'] = $_GET['id'];
            $_SESSION['is_signed_in'] = true;
            $formData = unserialize($_GET['data']);
            $_SESSION['email'] = $data['email'];
            $_SESSION['full_name'] = $data['full_name'];
            $_SESSION['date_of_birth'] = $data['date_of_birth'];
            $_SESSION['gender'] = $data['gender'];
            $_SESSION['phone_number'] = $data['phone_number'];
            $_SESSION['password'] = $data['password'];
            $_SESSION['user_type'] = $data['user_type'];
            if(strcasecmp($_SESSION['user_type'], 'Patient') == 0){
                echo '1';
                $_SESSION['medical_history'] = isset($data["medical_history"]) ? $data["medical_history"] : null;
            }
            else{
                $_SESSION['years_of_experience'] = isset($data["years_of_experience"]) ? $data["years_of_experience"] : null;
                $_SESSION['specialization'] = isset($data["specialization"]) ? $data["specialization"] : null;
            }

            header("Location: ../view/homePage.php");
            exit();
        } 
        else {
            header("Location: ../view/login.php");
            exit();
        }
    }
    else{
    $conn = establishConn();

    
    // Get form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if user exists
    $user = Person::readByEmail($email);

    if ($user) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['is_signed_in']=true;
            foreach ($user as $key => $value) {
                if ($key == 'password') {
                    continue;
                }
                $_SESSION[$key] = $value;
            }
            $user= Person::getDatabasedId('Patient',$user['id']);
            if($user){
                $_SESSION['user_type'] = 'Patient';
                $_SESSION['medical_history'] = isset($user["medical_history"]) ? $user["medical_history"] : null;
            }
            else{
                $_SESSION['user_type'] = 'Doctor';
                $user= Person::getDatabasedId('Doctor',$user['id']);
                $_SESSION['years_of_experience'] = isset($user["years_of_experience"]) ? $user["years_of_experience"] : null;
                $_SESSION['specialization'] = isset($user["specialization"]) ? $user["specialization"] : null;
            }

            // Redirect to user dashboard
            header("Location: ../view/homepage_loggedIn.php");
            exit();
            }
        }
         else {
        echo "User not found!";
        }
           
}
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>
