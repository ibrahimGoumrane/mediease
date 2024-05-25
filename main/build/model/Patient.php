<?php
class Patient {
    private $conn;
    private $table_name = "Patient";

    public $id;
    public $medical_history;

    public function __construct($db, $medical_history = null) {
        $this->conn = $db;
        $this->medical_history = $medical_history;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (medical_history) VALUES (:medical_history)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":medical_history", $this->medical_history);

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
        $query = "UPDATE " . $this->table_name . " SET medical_history=:medical_history WHERE id=:id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":medical_history", $this->medical_history);

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
