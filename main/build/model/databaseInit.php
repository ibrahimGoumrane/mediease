<?php
$host = 'localhost';
$dbname = 'medieaseDB';
$username = 'root';
$password = '';

try {
    // Connect to MySQL
    $pdo = new PDO("mysql:host=$host", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create database
    $pdo->exec("CREATE DATABASE IF NOT EXISTS $dbname");
    $pdo->exec("USE $dbname");

    // Create tables
    $queries = [
        "CREATE TABLE IF NOT EXISTS Person (
            id INT AUTO_INCREMENT PRIMARY KEY,
            full_name VARCHAR(50) NOT NULL,
            date_of_birth DATE,
            gender VARCHAR(10),
            phone_number VARCHAR(20),
            email VARCHAR(50) ,
            password VARCHAR(200)
        )",

        "CREATE TABLE IF NOT EXISTS Patient (
            id INT PRIMARY KEY,
            medical_history TEXT,
            FOREIGN KEY (id) REFERENCES Person(id)
        )",

        "CREATE TABLE IF NOT EXISTS Doctor (
            id INT PRIMARY KEY,
            years_of_experience INT,
            specialization VARCHAR(100),
            FOREIGN KEY (id) REFERENCES Person(id)
        )",

        "CREATE TABLE IF NOT EXISTS Reservation (
            idReservation INT AUTO_INCREMENT PRIMARY KEY,
            patient_id INT,
            doctor_id INT,
            status VARCHAR(20),
            notes TEXT,
            visit_date DATETIME,
            FOREIGN KEY (patient_id) REFERENCES Patient(id),
            FOREIGN KEY (doctor_id) REFERENCES Doctor(id)
        )",

        "CREATE TABLE IF NOT EXISTS MedicalRecords (
            idMedicalRecord INT AUTO_INCREMENT PRIMARY KEY,
            patient_id INT,
            doctor_id INT,
            diagnosis TEXT,
            visit_date DATETIME,
            treatment TEXT,
            notes TEXT,
            FOREIGN KEY (patient_id) REFERENCES Patient(id),
            FOREIGN KEY (doctor_id) REFERENCES Doctor(id)
        )",

        "CREATE TABLE IF NOT EXISTS Payment (
            id INT AUTO_INCREMENT PRIMARY KEY,
            patient_id INT,
            amount DECIMAL(10, 2),
            payment_date DATETIME,
            payment_method VARCHAR(20),
            status VARCHAR(20),
            FOREIGN KEY (patient_id) REFERENCES Patient(id)
        )",

        "CREATE TABLE IF NOT EXISTS MedicalSupply (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(40),
            quantity INT,
            supplier VARCHAR(40),
            purchase_date DATE,
            expire_date DATE
        )",

        "CREATE TABLE IF NOT EXISTS Schedule (
            id_schedule INT AUTO_INCREMENT PRIMARY KEY,
            doctor_id INT,
            start_time TIME,
            end_time TIME,
            startDay VARCHAR(40),
            endDay VARCHAR(40),
            FOREIGN KEY (doctor_id) REFERENCES Doctor(id)
        )",

        "CREATE TABLE IF NOT EXISTS ContactUs (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50) NOT NULL,
        email VARCHAR(50) NOT NULL,
        phone_number VARCHAR(20),
        message TEXT,
        treated BOOLEAN DEFAULT FALSE,
        User_mail VARCHAR(50) NOT NULL DEFAULT 'adminadmin@gmail.com',
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )",

    ];


include 'establishConn.php';
$conn = establishConn();

    function initializeTables($conn) {
        // Insert random data into Person table
        for ($i = 1; $i <= 2; $i++) {
            $fullName = "Person $i";
            $dateOfBirth = date('Y-m-d', strtotime('-' . rand(20, 50) . ' years'));
            $gender = (rand(0, 1) == 1) ? 'male' : 'female';
            $phoneNumber = '123-456-' . str_pad($i, 4, '0', STR_PAD_LEFT);
            $email = "person$i@example.com";
            $password = password_hash("password$i", PASSWORD_DEFAULT);
            
            $query = "INSERT INTO Person (full_name, date_of_birth, gender, phone_number, email, password)
                    VALUES (:full_name, :date_of_birth, :gender, :phone_number, :email, :password)";
            $stmt = $conn->prepare($query);
            $stmt->execute([
                ':full_name' => $fullName,
                ':date_of_birth' => $dateOfBirth,
                ':gender' => $gender,
                ':phone_number' => $phoneNumber,
                ':email' => $email,
                ':password' => $password,
            ]);
        }

        // Insert random data into Patient table
        for ($i = 1; $i <= 2; $i++) {
            $medicalHistory = "Medical history for patient $i";
            
            $query = "INSERT INTO Patient (id, medical_history) VALUES (:id, :medical_history)";
            $stmt = $conn->prepare($query);
            $stmt->execute([
                ':id' => $i,
                ':medical_history' => $medicalHistory,
            ]);
        }

        // Insert random data into Doctor table
        for ($i = 1; $i <= 2; $i++) {
            $yearsOfExperience = rand(1, 40);
            $specialization = "dentistry";
            
            $query = "INSERT INTO Doctor (id, years_of_experience, specialization) VALUES (:id, :years_of_experience, :specialization)";
            $stmt = $conn->prepare($query);
            $stmt->execute([
                ':id' => $i,
                ':years_of_experience' => $yearsOfExperience,
                ':specialization' => $specialization,
            ]);
        }

        // Insert random data into Reservation table
        for ($i = 1; $i <= 2; $i++) {
            $patientId = $i;
            $doctorId = $i;
            $status = 'pending';
            $notes = "Reservation notes $i";
            $visitDate = date('Y-m-d H:i:s', strtotime('+' . rand(1, 7) . ' days'));
            
            $query = "INSERT INTO Reservation (patient_id, doctor_id, status, notes, visit_date) VALUES (:patient_id, :doctor_id, :status, :notes, :visit_date)";
            $stmt = $conn->prepare($query);
            $stmt->execute([
                ':patient_id' => $patientId,
                ':doctor_id' => $doctorId,
                ':status' => $status,
                ':notes' => $notes,
                ':visit_date' => $visitDate,
            ]);
        }

        // Insert random data into MedicalRecords table
        for ($i = 1; $i <= 2; $i++) {
            $patientId = $i;
            $doctorId = $i;
            $diagnosis = "Diagnosis $i";
            $visitDate = date('Y-m-d H:i:s', strtotime('+' . rand(1, 7) . ' days'));
            $treatment = "Treatment $i";
            $notes = "Notes $i";
            
            $query = "INSERT INTO MedicalRecords (patient_id, doctor_id, diagnosis, visit_date, treatment, notes) VALUES (:patient_id, :doctor_id, :diagnosis, :visit_date, :treatment, :notes)";
            $stmt = $conn->prepare($query);
            $stmt->execute([
                ':patient_id' => $patientId,
                ':doctor_id' => $doctorId,
                ':diagnosis' => $diagnosis,
                ':visit_date' => $visitDate,
                ':treatment' => $treatment,
                ':notes' => $notes,
            ]);
        }

        // Insert random data into Payment table
        for ($i = 1; $i <= 2; $i++) {
            $patientId = $i;
            $amount = rand(50, 500);
            $paymentDate = date('Y-m-d H:i:s', strtotime('+' . rand(1, 7) . ' days'));
            $paymentMethod = (rand(0, 1) == 1) ? 'credit_card' : 'cash';
            $status = (rand(0, 1) == 1) ? 'paid' : 'pending';
            
            $query = "INSERT INTO Payment (patient_id, amount, payment_date, payment_method, status) VALUES (:patient_id, :amount, :payment_date, :payment_method, :status)";
            $stmt = $conn->prepare($query);
            $stmt->execute([
                ':patient_id' => $patientId,
                ':amount' => $amount,
                ':payment_date' => $paymentDate,
                ':payment_method' => $paymentMethod,
                ':status' => $status,
            ]);
        }

        // Insert random data into MedicalSupply table
        for ($i = 1; $i <= 2; $i++) {
            $name = "Supply $i";
            $quantity = rand(10, 100);
            $supplier = "Supplier $i";
            $purchaseDate = date('Y-m-d', strtotime('-' . rand(1, 12) . ' months'));
            $expireDate = date('Y-m-d', strtotime('+' . rand(1, 24) . ' months'));
            
            $query = "INSERT INTO MedicalSupply (name, quantity, supplier, purchase_date, expire_date) VALUES (:name, :quantity, :supplier, :purchase_date, :expire_date)";
            $stmt = $conn->prepare($query);
            $stmt->execute([
                ':name' => $name,
                ':quantity' => $quantity,
                ':supplier' => $supplier,
                ':purchase_date' => $purchaseDate,
                ':expire_date' => $expireDate,
            ]);
        }

        // Insert random data into Schedule table
        for ($i = 1; $i <= 2; $i++) {
            $doctorId = $i;
            $startTime = date('H:i:s', strtotime(rand(8, 10) . ':00:00'));
            $endTime = date('H:i:s', strtotime(rand(16, 18) . ':00:00'));
            $startDay = 'Monday';
            $endDay = 'Friday';
            
            $query = "INSERT INTO Schedule (doctor_id, start_time, end_time, startDay, endDay) VALUES (:doctor_id, :start_time, :end_time, :startDay, :endDay)";
            $stmt = $conn->prepare($query);
            $stmt->execute([
                ':doctor_id' => $doctorId,
                ':start_time' => $startTime,
                ':end_time' => $endTime,
                ':startDay' => $startDay,
                ':endDay' => $endDay,
            ]);
        }

        // Insert random data into ContactUs table
        for ($i = 1; $i <= 2; $i++) {
            $name = "Contact $i";
            $email = "contact$i@example.com";
            $phoneNumber = '123-456-' . str_pad($i, 4, '0', STR_PAD_LEFT);
            $message = "Message $i";
            $treated = (rand(0, 1) == 1) ? true : false;
            $userMail = "user$i@example.com";
            
            $query = "INSERT INTO ContactUs (name, email, phone_number, message, treated, User_mail) VALUES (:name, :email, :phone_number, :message, :treated, :User_mail)";
            $stmt = $conn->prepare($query);
            $stmt->execute([
                ':name' => $name,
                ':email' => $email,
                ':phone_number' => $phoneNumber,
                ':message' => $message,
                ':treated' => $treated,
                ':User_mail' => $userMail,
            ]);
        }
    }


    function  createTables($queries, $pdo){
        foreach ($queries as $query) {
            $pdo->exec($query);
        }
        echo "Database and tables created successfully.";
    }




    function dropdb($dbname, $username, $password)
    {
        $pdo = new PDO('mysql:host=localhost;dbname=' . $dbname, $username, $password);
        $pdo->exec("DROP DATABASE " . $dbname);
        echo "Database dropped successfully.";
    }

    //createTables($queries, $pdo);
    
    try {
        initializeTables($conn);
        echo "Tables initialized successfully.";
    } catch (Exception $e) {
        echo "Error initializing tables: " . $e->getMessage();
    }
    //dropdb($dbname, $username, $password);


} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close connection
$pdo = null;
