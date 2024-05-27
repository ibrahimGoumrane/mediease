<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find a Doctor</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../media/css/build.css">
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-t from-green-300 via-green-100 to-green-50">
    <?php include 'components/header.php'; ?>
    <main class="flex flex-col items-center min-h-screen text-center">
        <h1 class="text-5xl font-extrabold mb-8">Find a Doctor</h1>
        <p class="text-xl font-light mb-12 max-w-md">Choose a specialty to find the right doctor for you.</p>
        <form action="" method="post" class="flex flex-col items-center gap-6 ">
            <select required name="specialization" class="w-72 p-4 rounded-fullbg-white border border-green-300 text-gray-900 sm:text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500">
                <option value="" disabled selected>Select a specialty</option>
                <option value="cardiology">Cardiology</option>
                        <option value="dermatology">Dermatology</option>
                        <option value="endocrinology">Endocrinology</option>
                        <option value="gastroenterology">Gastroenterology</option>
                        <option value="dentistry">Dentistry</option>
                        <option value="orthopedics">Orthopedics</option>
                        <option value="pediatrics">Pediatrics</option>
                        <option value="neurology">Neurology</option>
                        <option value="oncology">Oncology</option>
                        <option value="ophthalmology">Ophthalmology</option>
                        <option value="otolaryngology">Otolaryngology (ENT)</option>
                        <option value="psychiatry">Psychiatry</option>
                        <option value="radiology">Radiology</option>
                        <option value="surgery">Surgery</option>
                <!-- Add more specialties as needed -->
            </select>
            <button type="submit" class="px-6 py-3 bg-green-400 text-white rounded-full text-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">Search</button>
        </form>
        <?php
        include_once '../model/establishConn.php';
        include_once '../model/Doctor.php';
        $conn = establishConn();
            if (isset($_POST['specialization'])) {
                $specialization = $_POST['specialization'];
                $stmt = $conn->prepare("SELECT p.full_name, p.phone_number, d.years_of_experience, d.specialization
                            FROM Person p
                            JOIN Doctor d ON p.id = d.id
                            WHERE d.specialization = ?");
                $stmt->execute([$specialization]);
                $doctors = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if ($doctors) {
                    foreach ($doctors as $doctor) {
                        
                        echo '<br><div class="p-8 rounded-xl border-2 border-black shadow-xl bg-gradient-to-r from-green-50 to-green-100">
                                <p class="block mt-1 text-lg leading-tight font-medium text-black">Appointment Time: 13:00 - 14:00</p>
                                <p class="mt-2 text-gray-500">Doctor: '. $doctor["full_name"]. '</p>
                                <div class="details hidden">
                                    <p class="mt-2 text-gray-500">Phone Number: '. $doctor["phone_number"].'</p>
                                    <p class="mt-2 text-gray-500">Years of Experience: '. $doctor["years_of_experience"].'</p>
                                </div>
                                <button class="mt-5 px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-400 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-300 show-details">
                                    View Details
                                </button>
                                <button class="mt-5 ml-3 px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-400 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-300 hidden hide-details">
                                    Hide Details
                                </button>
                                <button class="mt-5 ml-3 px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-400 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-300">
                                Make Appointment
                            </button>
                            </div>';

                        echo '<script>
                                const showBtn = document.querySelector(".show-details");
                                const hideBtn = document.querySelector(".hide-details");
                                const details = document.querySelector(".details");

                                showBtn.addEventListener("click", () => {
                                    details.classList.remove("hidden");
                                    showBtn.classList.add("hidden");
                                    hideBtn.classList.remove("hidden");
                                });

                                hideBtn.addEventListener("click", () => {
                                    details.classList.add("hidden");
                                    showBtn.classList.remove("hidden");
                                    hideBtn.classList.add("hidden");
                                });
                            </script>';

                
                    }
                } else {
                    echo '<p class="text-red-500">No doctors found for the selected specialty.</p>';
                }
            }
            
            ?>
    </main>
    <?php include './components/footer.php';?>
    <script src="../media/js/index.js"></script>
</body>
</html>
