<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once '../model/establishConn.php';
include_once '../model/Person.php';



try {
    if($_SERVER["REQUEST_METHOD"] == "GET") {
        if(isset($_GET['is_signed_in']) && $_GET['is_signed_in'] == true) {
            if (session_status() == PHP_SESSION_ACTIVE) {
                session_destroy();
            }
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $data =unserialize($_GET['data']) ;
            $_SESSION['user_id'] = $_GET['id'];
            $_SESSION['is_signed_in'] = true;
            $_SESSION['email'] = $data['email'];
            $_SESSION['full_name'] = $data['full_name'];
            $_SESSION['date_of_birth'] = $data['date_of_birth'];
            $_SESSION['gender'] = $data['gender'];
            $_SESSION['phone_number'] = $data['phone_number'];
            $_SESSION['password'] = $data['password'];
            $_SESSION['user_type'] = $data['user_type'];
            if(strcasecmp($_SESSION['user_type'], 'Patient') == 0){
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
                if ($key == 'id') {
                    $_SESSION['user_id'] = $value;
                    continue;
                }
                $_SESSION[$key] = $value;
            }
            $id = $_SESSION['user_id'];
            $patient= Person::getDatabasedId('Patient',$id);
           
            if($patient){
                $_SESSION['user_type'] = 'Patient';
                $_SESSION['medical_history'] = isset($patient["medical_history"]) ? $patient["medical_history"] : null;
                header("Location: ../view/findDoctor.php");
                exit();
            }
            else{
                $_SESSION['user_type'] = 'Doctor';
                $doctor= Person::getDatabasedId('Doctor',$id);
                $_SESSION['years_of_experience'] = isset($doctor["years_of_experience"]) ? $doctor["years_of_experience"] : null;
                $_SESSION['specialization'] = isset($doctor["specialization"]) ? $doctor["specialization"] : null;
                header("Location: ../view/manageReservation.php");
                exit();
            }

            
            
            }
        }
         else {
            header("Location: ../view/login.php?error=Invalid email or password want to sign up");
            exit();
        }
           
}
} catch (PDOException $e) {
    header("Location: ../view/error.php");
}
$conn = null;
?>
