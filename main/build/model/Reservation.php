<?php

require_once 'Person.php';

class Reservation {
    private static $conn ;

    public $id;
    public $status;
    public $patient_id;
    public $doctor_id;

    public $notes;
    public $visit_date;

    public function __construct( $status = null, $notes = null, $visit_date = null ,$patient_id = null, $doctor_id = null) {
        Reservation::$conn = establishConn();
        $this->status = $status;
        $this->notes = $notes;
        $this->visit_date = $visit_date;
        $this->patient_id = $patient_id;
        $this->doctor_id = $doctor_id;
    }

    public function create() {
        $query = "INSERT INTO Reservation (status, notes, visit_date ,doctor_id ,patient_id) VALUES (:status, :notes, :visit_date, :doctor_id , :patient_id)";
        $stmt = Reservation::$conn->prepare($query);

        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":notes", $this->notes);
        $stmt->bindParam(":visit_date", $this->visit_date);
        $stmt->bindParam(":doctor_id", $this->doctor_id);
        $stmt->bindParam(":patient_id", $this->patient_id);
        
        if ($stmt->execute()) {
            $this->id = Reservation::$conn->lastInsertId();
            return true;
        }
        return false;
    }

    public function read() {
        Reservation::$conn = establishConn();
        $query = "SELECT * FROM Reservation";
        $stmt = Reservation::$conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    
    public function update() {
        Reservation::$conn = establishConn();
        $query = "UPDATE Reservation SET status=:status, notes=:notes, visit_date=:visit_date WHERE idReservation=:id";
        $stmt = Reservation::$conn->prepare($query);

        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":notes", $this->notes);
        $stmt->bindParam(":visit_date", $this->visit_date);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    public function setStatus() {
        Reservation::$conn = establishConn();
        $query = "UPDATE Reservation SET status=:status WHERE idReservation=:id";
        $stmt = Reservation::$conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":status", $this->status);
        if ($stmt->execute()) {
            return true;
        }
        return false;

    }
    public static function getAllReservation($doctor_id){
        // Query to fetch reservation data
        Reservation::$conn = establishConn();
        $query = $query = "SELECT r.*, p.gender, p.phone_number, p.date_of_birth, p.full_name, pa.medical_history
          FROM Reservation r
          JOIN patient pa ON r.patient_id = pa.id
          JOIN Person p ON pa.id = p.id
          WHERE r.doctor_id = $doctor_id
          ORDER BY visit_date";
        $stmt = Reservation::$conn->prepare($query);
        $stmt->execute();
        $reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $reservations;
    }
    public static function getPatientReservation($user_id){
        // Query to fetch reservation data
        Reservation::$conn = establishConn();
        $query = $query = "SELECT r.*, d.specialization, p.full_name 
                                FROM Reservation r
                                JOIN Doctor d ON r.doctor_id = d.id
                                JOIN Person p ON d.id = p.id
                                WHERE r.patient_id = $user_id 
                                ORDER BY visit_date";
        $stmt = Reservation::$conn->prepare($query);
        $stmt->execute();
        $reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $reservations;
    }
    public function delete() {
        Reservation::$conn = establishConn();
        $query = "DELETE FROM Reservation WHERE idReservation=:id";
        $stmt = Reservation::$conn->prepare($query);
        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>