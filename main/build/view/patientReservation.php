   <?php
        session_start();
        include_once '../model/establishConn.php';
        $conn = establishConn();

        // Assume a logged-in patient ID, replace with actual session user ID
        $patient_id = 1;

        $stmt = $conn->prepare("SELECT r.*, d.specialization, p.full_name 
                                FROM Reservation r
                                JOIN Doctor d ON r.doctor_id = d.id
                                JOIN Person p ON d.id = p.id
                                WHERE r.patient_id = ? 
                                ORDER BY visit_date");
        $stmt->execute([$patient_id]);
        $reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Reservations</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../media/css/build.css">
    <script src="../media/js/headerJs.js" defer></script>
</head>
<body class="bg-gradient-to-t from-green-300 via-green-100 to-green-50">
    <?php include 'components/header.php'; ?>
    <main  class="flex flex-col items-center min-h-screen text-center">
            <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">My Reservations</h1>
        <?php if ($reservations): ?>
            <?php  usort($reservations, function($a, $b) {
                    if ($a['status'] === 'approved' && $b['status'] !== 'approved') {
                        return -1; // Put approved reservations at the top
                    } elseif ($a['status'] !== 'approved' && $b['status'] === 'approved') {
                        return 1; // Put approved reservations at the top
                    } elseif ($a['status'] === 'canceled' && $b['status'] !== 'canceled') {
                        return 1; // Put canceled reservations at the bottom
                    } elseif ($a['status'] !== 'canceled' && $b['status'] === 'canceled') {
                        return -1; // Put canceled reservations at the bottom
                    } else {
                        // Sort by date if status is the same or both are canceled
                        return strtotime($a['visit_date']) - strtotime($b['visit_date']);
                    }
                });
                    foreach ($reservations as $reservation): ?>
                <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl m-5">
                    <div class="p-8 flex items-center justify-between">
                        <div class="pr-4">
                            <?php 
                            $visitDateTime = new DateTime($reservation['visit_date']);
                            $day = $visitDateTime->format('jS');
                            $monthYear = $visitDateTime->format('F, Y');
                            $time = $visitDateTime->format('h:i A');
                            ?>
                            <p class="text-4xl font-bold"><?php echo $day; ?></p>
                        </div>
                        <div class="flex flex-col items-center text-center">
                            <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold"><?php echo $monthYear; ?></div>
                            <p class="mt-2 text-gray-500 text-sm center"><?php echo $time; ?></p>
                            <p class="mt-2 text-gray-500">Doctor: <?php echo htmlspecialchars($reservation['full_name']); ?></p>
                            <p class="mt-2 text-gray-500">Specialization: <?php echo htmlspecialchars($reservation['specialization']); ?></p>
                            <?php
                                $status = htmlspecialchars($reservation['status']);
                                $statusColor = '';
                                switch ($status) {
                                    case 'canceled':
                                        $statusColor = 'text-red-500';
                                        break;
                                    case 'approved':
                                        $statusColor = 'text-green-500';
                                        break;
                                    default:
                                        $statusColor = 'text-gray-500';
                                        break;
                                }
                                ?>
                                <p class="<?php echo "mt-2 ". $statusColor; ?>"><?php echo "Status: ". $status; ?></p>
                                </div> <?php if ($reservation['status'] !== 'canceled') : ?>
                                <form method="post" action="../controller/cancel_appointment.php">
                                    <input type="hidden" name="reservation_id" value="<?php echo $reservation['idReservation']; ?>">
                                    <button type="submit" class="mt-2 px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">Cancel Appointment</button>
                                </form>
                            <?php endif; ?>                        
                        
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>You have no reservations.</p>
        <?php endif; ?>
        <a href="../view/findDoctor.php" class="text-blue-500">Back to Home</a>
    </div>
    </main>
<?php include './components/footer.php';?>
</body>
</html>