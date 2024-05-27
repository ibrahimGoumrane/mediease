<?php

require_once 'Person.php';

class Reservation {
    private $conn;

    public $id;
    public $status;
    public $patient_id;
    public $doctor_id;

    public $notes;
    public $visit_date;

    public function __construct( $status = null, $notes = null, $visit_date = null ,$patient_id = null, $doctor_id = null) {
        $this->conn = establishConn();
        $this->status = $status;
        $this->notes = $notes;
        $this->visit_date = $visit_date;
        $this->patient_id = $patient_id;
        $this->doctor_id = $doctor_id;
    }

    public function create() {
        $query = "INSERT INTO Reservation (status, notes, visit_date ,doctor_id ,patient_id) VALUES (:status, :notes, :visit_date, :doctor_id , :patient_id)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":notes", $this->notes);
        $stmt->bindParam(":visit_date", $this->visit_date);
        $stmt->bindParam(":doctor_id", $this->doctor_id);
        $stmt->bindParam(":patient_id", $this->patient_id);
        
        if ($stmt->execute()) {
            $this->id = $this->conn->lastInsertId();
            return true;
        }
        return false;
    }

    public function read() {
        $query = "SELECT * FROM Reservation";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function update() {
        $query = "UPDATE Reservation SET status=:status, notes=:notes, visit_date=:visit_date WHERE id=:id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":notes", $this->notes);
        $stmt->bindParam(":visit_date", $this->visit_date);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    public function getAllReservation($doctor_id){
        // Query to fetch reservation data
        $query = "SELECT r.idReservation, r.status, r.notes, r.visit_date, 
        p_patient.full_name AS patient_name, 
        p_doctor.full_name AS doctor_name
        FROM Reservation r
        JOIN Patient pa ON r.patient_id = pa.id
        JOIN Doctor d ON r.doctor_id = d.id
        JOIN Person p_patient ON pa.id = p_patient.id
        JOIN Person p_doctor ON d.id = p_doctor.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $reservations;
    }
    public function delete() {
        $query = "DELETE FROM Reservation WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>