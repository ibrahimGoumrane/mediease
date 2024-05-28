<?php
include_once '../model/establishConn.php';
$conn = establishConn();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $visit_date = $_POST['visit_date'];
    $time_slot = $_POST['time_slot'];
    $doctor_id = $_POST['id'];
    $patient_id = 1; // Assume a logged-in patient ID, replace with actual session user ID
    $status= 'pending';
    $notes='';

    $visit_datetime = new DateTime($visit_date . ' ' . $time_slot);
    $visit_datetime_str = $visit_datetime->format('Y-m-d H:i:s');
    // Insert the appointment into the database
    $stmt = $conn->prepare("INSERT INTO Reservation (patient_id,doctor_id, status, notes, visit_date) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$patient_id, $doctor_id, $status, $notes,$visit_datetime_str]);

    if ($stmt) {
        header("Location: ../view/homepage_loggedin.php");
        exit();
    } else {
        echo "Error creating appointment.";
    }
}
?>
