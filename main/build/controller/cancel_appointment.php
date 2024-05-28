<?php
include_once '../model/establishConn.php';
$conn = establishConn();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['reservation_id'])) {
    $reservation_id = $_POST['reservation_id'];

    // Update the reservation status to canceled
    $stmt = $conn->prepare("UPDATE Reservation SET status = 'canceled' WHERE idReservation = ?");
    $stmt->execute([$reservation_id]);

    // Redirect to the reservations page
    header('Location: ../view/view_patient_reservations.php');
    exit();
}
?>
