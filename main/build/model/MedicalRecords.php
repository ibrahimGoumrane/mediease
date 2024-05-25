<?php
class MedicalRecords {
    private $conn;
    private $table_name = "medicalRecords";

    public $id;
    public $diagnosis;
    public $visit_date;
    public $treatment;
    public $notes;

    public function __construct($db, $diagnosis = null, $visit_date = null, $treatment = null, $notes = null) {
        $this->conn = $db;
        $this->diagnosis = $diagnosis;
        $this->visit_date = $visit_date;
        $this->treatment = $treatment;
        $this->notes = $notes;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (diagnosis, visit_date, treatment, notes) VALUES (:diagnosis, :visit_date, :treatment, :notes)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":diagnosis", $this->diagnosis);
        $stmt->bindParam(":visit_date", $this->visit_date);
        $stmt->bindParam(":treatment", $this->treatment);
        $stmt->bindParam(":notes", $this->notes);

        if ($stmt->execute()) {
            $this->id = $this->conn->lastInsertId();
            return true;
        }
        return false;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " SET diagnosis=:diagnosis, visit_date=:visit_date, treatment=:treatment, notes=:notes WHERE id=:id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":diagnosis", $this->diagnosis);
        $stmt->bindParam(":visit_date", $this->visit_date);
        $stmt->bindParam(":treatment", $this->treatment);
        $stmt->bindParam(":notes", $this->notes);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
