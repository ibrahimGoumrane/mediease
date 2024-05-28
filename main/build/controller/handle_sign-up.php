<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

require '../../../PHPMailer-master/src/PHPMailer.php';
require '../../../PHPMailer-master/src/SMTP.php';
require '../../../PHPMailer-master/src/Exception.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendEmail($email=null, $name='new User', $subject=null, $message=null) {
    try{
        $mail = new PHPMailer(true); // true enables exceptions

        // $mail->SMTPDebug = 2; // 1 = errors and messages, 2 = messages only
        // $mail->Debugoutput = 'html'; // Options: 'html', 'echo', 'error_log'
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'goumrane.ibrahim@ensam-casa.ma';
        $mail->Password = 'ibrahim@s200GouGou';
        $mail->SMTPSecure = 'tls'; // or 'ssl' for secure connections
        $mail->Port = 587; // or 465 for SSL
    
        $mail->setFrom('goumrane.ibrahim@gmail.com', 'mediease');
        $mail->addAddress($email, $name);
        $mail->Subject = $subject;
        $mail->Body = $message;


        if ($mail->send()) {
            echo 'Email sent successfully!';
        } else {
            echo 'Error: ' . $mail->ErrorInfo;
        }
    }catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    return false;
}
}


require_once '../model/establishConn.php';
require_once '../model/Person.php';
require_once '../model/Patient.php';
require_once '../model/Doctor.php';


try {
    $conn = establishConn();
    if($_SERVER["REQUEST_METHOD"] != "POST") {
        header("Location: ../view/sign-up.php");
        exit();
    } else{


    if(isset($_POST['submitVerify'])) {
        $code = trim($_POST['code']);
        if($_SESSION['verification_code'] == $code   && $_SESSION['verification_code_expiration'] > time()) {
                $formData = unserialize($_SESSION['data']);
                // Insert into Patient or Doctor table
                if ($formData['user_type'] == 'patient') {
                    $person = new Patient($formData['full_name'], $formData['date_of_birth'], $formData['gender'], $formData['phone_number'], $formData['email'], $formData['password'], $formData['medical_history']);
                } else if ($formData['user_type'] == 'doctor') {
                    $person = new Doctor($formData['full_name'], $formData['date_of_birth'], $formData['gender'], $formData['phone_number'], $formData['email'], $formData['password'], $formData['years_of_experience'], $formData['specialization']);
                }
                $person->create();
                header("Location: ../view/login.php?email=".$formData['email'] ."&pass=" .$formData['password']);
                exit();
        } 
        else {
            echo "Invalid verification code or code has expired";
            unset($_SESSION['verification_code']);
            unset($_SESSION['verification_code_expiration']);
        }
    }
    else{
        // Get form data 
        $formData = array(
            'email' => $_POST['email'],
            'full_name' => $_POST['full_name'],
            'date_of_birth' => $_POST['date_of_birth'],
            'gender' => $_POST['gender'],
            'phone_number' => $_POST['phone_number'],
            'password' => $_POST['password'],
            'user_type' => $_POST['user_type'],
            'years_of_experience' => isset($_POST["years_of_experience"]) ? $_POST["years_of_experience"] : null,
            'specialization' => isset($_POST["specialization"]) ? $_POST["specialization"] : null,
            'medical_history' => isset($_POST["medical_history"]) ? $_POST["medical_history"] : null,
        );
        //sending an email verification to the user
        $verificationCode = random_int(100000, 999999);
        $_SESSION['verification_code'] = $verificationCode;
        $_SESSION['data'] = serialize($formData);
        $expirationTime = time() + 300; // 5 minutes
        $_SESSION['verification_code_expiration'] = $expirationTime;


        $subject = "Email Verification";
        $message = "Your verification code:
            ".$verificationCode."
            
            Thanks for your interest in MEDIEASE. To continue setting up your account, please confirm your email address using this verification code. Your code will expire in 3 minutes.
            
            The MEDIEASE Team ";  
        sendEmail($formData['email'], $formData['full_name'], $subject, $message);
    }   
}
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>


<form action="" method="post">
    <label for="code">Enter Verification Code:</label>
    <input type="text" name="code" id="code" class = "bg-white border border-green-300 text-gray-900 sm:text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" required>
    <button type="submit" name="submitVerify" value="submit">Verify</button>
</form>

