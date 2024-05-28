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
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if user exists
    $stmt = $conn->prepare("SELECT * FROM Person WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        echo "Password verification result: " . (password_verify($password, $user['password']) ? 'true' : 'false');
        if (password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['full_name'] = $user['full_name'];
            $_SESSION['is_signed_in']=true;
            // Check if user is a patient
            $stmt = $conn->prepare("SELECT * FROM Patient WHERE id = ?");
            $stmt->execute([$user['id']]);
            $is_patient = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($is_patient) {
                $_SESSION['user_type'] = 'patient';
            } else {
                // Check if user is a doctor
                $stmt = $conn->prepare("SELECT * FROM Doctor WHERE id = ?");
                $stmt->execute([$user['id']]);
                $is_doctor = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($is_doctor) {
                    $_SESSION['user_type'] = 'doctor';
                } else {
                    $_SESSION['user_type'] = 'unknown';
                }
            }

            // Redirect to user dashboard
            header("Location: ../view/homePage.php");
            exit();

            
        } else {
            echo "Invalid email or password!";
        }
    } else {
        echo "User not found!";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>
