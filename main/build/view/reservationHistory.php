<?php

session_start();
include_once '../model/establishConn.php';
include_once '../model/Reservation.php';

//Get all reservations of the current user
$reservations = Reservation::getAllReservation($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments History</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../media/css/build.css">
    <script src="../media/js/headerJs.js" defer></script>
    <script src="../media/js/ReservationHistory.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-t from-green-300 via-green-100 to-green-50">
    <?php include 'components/header.php'; ?>
    <main  class="flex flex-col items-center min-h-screen text-center">
        <div class="container mx-auto p-4">
        <h1 class="text-5xl font-extrabold mb-8">Appointments History</h1>
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
                    <div class="p-8 flex items-center justify-around ">
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
                            <p class="mt-2 text-gray-500">Patient: <?php echo htmlspecialchars($reservation['full_name']); ?></p>
                            <div class="details hidden"><p class="mt-2 text-gray-500">Birthdate: <?php echo htmlspecialchars($reservation['date_of_birth']); ?></p>
                            <p class="mt-2 text-gray-500">Gender: <?php echo htmlspecialchars($reservation['gender']); ?></p>
                            <p class="mt-2 text-gray-500">Phone number: <?php echo htmlspecialchars($reservation['phone_number']); ?></p>
                            <p class="mt-2 text-gray-500">Medical history: <?php echo htmlspecialchars($reservation['medical_history']); ?></p>
                            </div><button class="mt-5 px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-400 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-300 show-details">
                                    View Details
                                </button>
                                <button class="mt-5 ml-3 px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-400 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-300 hidden hide-details">
                                    Hide Details
                                </button>

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
                                </div>                       
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>You have no reservations.</p>
        <?php endif; ?>
        <a href="./manageReservation.php" class="text-blue-500">Back to Home</a>
    </div>
    </main>
<?php include './components/footer.php';?>
</body>
</html>