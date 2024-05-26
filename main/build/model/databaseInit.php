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
            last_name VARCHAR(50) NOT NULL,
            first_name VARCHAR(50) NOT NULL,
            date_of_birth DATE,
            gender VARCHAR(10),
            phone_number VARCHAR(20),
            email VARCHAR(50),
            password VARCHAR(50)
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
            date DATE,
            FOREIGN KEY (doctor_id) REFERENCES Doctor(id)
        )"
    ];
    function  createTables($queries, $pdo){
        foreach ($queries as $query) {
            $pdo->exec($query);
        }
    }


    echo "Database and tables created successfully.";

    function dropdb($dbname, $username, $password){
        $pdo = new PDO('mysql:host=localhost;dbname='.$dbname, $username, $password);
        $pdo->exec("DROP DATABASE ". $dbname );
        echo "Database dropped successfully.";
    }
    // createTables($queries, $pdo);
    // dropdb($dbname, $username, $password);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close connection
$pdo = null;
?>
