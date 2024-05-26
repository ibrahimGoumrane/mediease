<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['Name']);
    $email = htmlspecialchars($_POST['Email']);
    $phone = htmlspecialchars($_POST['PhoneNumber']);
    $message = htmlspecialchars($_POST['Message']);

    // Process the form data, e.g., save it to a database or send an email
    if (isset($_POST['agree'])) {
        echo "<h1>Form Data Submitted</h1>";
        echo "<p>Name: $name</p>";
        echo "<p>Email: $email</p>";
        echo "<p>Phone: $phone</p>";
        echo "<p>Message: $message</p>";

        include '../model/establishConn.php';
        try {

            $conn = establishConn();
            $sql = "INSERT INTO ContactUs (name, email, phone, message) VALUES (:name, :email, :phone, :message)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':message', $message);
            $stmt->execute();

            // Redirect to the homepage
            // header("Location: homePage.php");

            // exit; // Make sure to exit after the redirection
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } 

        // Redirect to the homepage
        header("Location: homePage.php");
        exit; // Make sure to exit after the redirection
    } else {
        echo "<h1>Form Data Not Submitted</h1>";
    }
?>