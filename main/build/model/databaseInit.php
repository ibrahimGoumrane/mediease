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
            full_name VARCHAR(50) NOT NULL UNIQUE,
            date_of_birth DATE,
            gender VARCHAR(10),
            phone_number VARCHAR(20) UNIQUE NOT NULL,
            email VARCHAR(50) UNIQUE NOT NULL,
            password VARCHAR(200)
        )",
    
        "CREATE INDEX idx_person_full_name ON Person (full_name)",
        "CREATE INDEX idx_person_email ON Person (email)",
        "CREATE INDEX idx_person_password ON Person (password)",
    
        "CREATE TABLE IF NOT EXISTS Patient (
            id INT PRIMARY KEY,
            medical_history TEXT,
            FOREIGN KEY (id) REFERENCES Person(id) ON DELETE CASCADE
        )",
    
        "CREATE TABLE IF NOT EXISTS Doctor (
            id INT PRIMARY KEY,
            years_of_experience INT,
            specialization VARCHAR(100),
            FOREIGN KEY (id) REFERENCES Person(id) ON DELETE CASCADE
        )",
    
        "CREATE INDEX idx_doctor_id ON Doctor (id)",
        "CREATE INDEX idx_patient_id ON Patient (id)",
    
        "CREATE TABLE IF NOT EXISTS Reservation (
            idReservation INT AUTO_INCREMENT PRIMARY KEY,
            patient_id INT,
            doctor_id INT,
            status VARCHAR(20),
            notes TEXT,
            visit_date DATETIME,
            FOREIGN KEY (patient_id) REFERENCES Patient(id) ON DELETE CASCADE,
            FOREIGN KEY (doctor_id) REFERENCES Doctor(id) ON DELETE CASCADE
        )",
    
        "CREATE INDEX idx_reservation_patient_id ON Reservation (patient_id)",
        "CREATE INDEX idx_reservation_doctor_id ON Reservation (doctor_id)",
        "CREATE INDEX idx_reservation_visit_date ON Reservation (visit_date)",
    
        "CREATE TABLE IF NOT EXISTS MedicalRecords (
            idMedicalRecord INT AUTO_INCREMENT PRIMARY KEY,
            patient_id INT,
            doctor_id INT,
            diagnosis TEXT,
            visit_date DATETIME,
            treatment TEXT,
            notes TEXT,
            FOREIGN KEY (patient_id) REFERENCES Patient(id) ON DELETE CASCADE,
            FOREIGN KEY (doctor_id) REFERENCES Doctor(id) ON DELETE CASCADE
        )",
    
        "CREATE INDEX idx_medicalrecords_patient_id ON MedicalRecords (patient_id)",
        "CREATE INDEX idx_medicalrecords_doctor_id ON MedicalRecords (doctor_id)",
        "CREATE INDEX idx_medicalrecords_visit_date ON MedicalRecords (visit_date)",
    
        "CREATE TABLE IF NOT EXISTS Payment (
            id INT AUTO_INCREMENT PRIMARY KEY,
            patient_id INT,
            amount DECIMAL(10, 2),
            payment_date DATETIME,
            payment_method VARCHAR(20),
            status VARCHAR(20),
            FOREIGN KEY (patient_id) REFERENCES Patient(id) ON DELETE CASCADE
        )",
    
        "CREATE INDEX idx_payment_patient_id ON Payment (patient_id)",
        "CREATE INDEX idx_payment_payment_date ON Payment (payment_date)",
    
        "CREATE TABLE IF NOT EXISTS MedicalSupply (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(40),
            quantity INT,
            supplier VARCHAR(40),
            purchase_date DATE,
            expire_date DATE
        )",
    
        "CREATE INDEX idx_medicalsupply_name ON MedicalSupply (name)",
        "CREATE INDEX idx_medicalsupply_supplier ON MedicalSupply (supplier)",
        "CREATE INDEX idx_medicalsupply_purchase_date ON MedicalSupply (purchase_date)",
        "CREATE INDEX idx_medicalsupply_expire_date ON MedicalSupply (expire_date)",
    
        "CREATE TABLE IF NOT EXISTS Schedule (
            id_schedule INT AUTO_INCREMENT PRIMARY KEY,
            doctor_id INT,
            start_time TIME,
            end_time TIME,
            startDay VARCHAR(40),
            endDay VARCHAR(40),
            FOREIGN KEY (doctor_id) REFERENCES Doctor(id) ON DELETE CASCADE
        )",
    
        "CREATE INDEX idx_schedule_doctor_id ON Schedule (doctor_id)",
    
        "CREATE TABLE IF NOT EXISTS ContactUs (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(50) NOT NULL,
            email VARCHAR(50) NOT NULL,
            phone_number VARCHAR(20),
            message TEXT,
            treated BOOLEAN DEFAULT FALSE,
            User_mail VARCHAR(50) NOT NULL DEFAULT 'goumrane.ibrahim@gmail.com',
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )",
    
        "CREATE INDEX idx_contactus_email ON ContactUs (email)",
        "CREATE INDEX idx_contactus_treated ON ContactUs (treated)",
        "CREATE INDEX idx_contactus_created_at ON ContactUs (created_at)",
        "CREATE INDEX idx_contactus_user_mail ON ContactUs (User_mail)",
    ];
    
    
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

    createTables($queries, $pdo);
    
    // try {
    //     initializeTables($conn);
    //     echo "Tables initialized successfully.";
    // } catch (Exception $e) {
    //     echo "Error initializing tables: " . $e->getMessage();
    // }
    //dropdb($dbname, $username, $password);


} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close connection
$pdo = null;
