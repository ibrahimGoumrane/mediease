<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "your_database_name";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if user exists
    $stmt = $conn->prepare("SELECT * FROM Person WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['full_name'] = $user['full_name'];

        // Check if user is a patient or doctor
        $stmt = $conn->prepare("SELECT * FROM Patient WHERE id = ?");
        $stmt->execute([$user['id']]);
        $is_patient = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($is_patient) {
            $_SESSION['user_type'] = 'patient';
        } else {
            $_SESSION['user_type'] = 'doctor';
        }

        echo "Login successful!";
        // Redirect to user dashboard
        // header("Location: dashboard.php");
    } else {
        echo "Invalid email or password!";
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>
