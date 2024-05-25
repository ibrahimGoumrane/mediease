<?php
class Doctor {
    private $conn;
    private $table_name = "Doctor";

    public $id;
    public $years_of_experience;
    public $specialization;

    public function __construct($db, $years_of_experience = null, $specialization = null) {
        $this->conn = $db;
        $this->years_of_experience = $years_of_experience;
        $this->specialization = $specialization;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (years_of_experience, specialization) VALUES (:years_of_experience, :specialization)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":years_of_experience", $this->years_of_experience);
        $stmt->bindParam(":specialization", $this->specialization);

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
        $query = "UPDATE " . $this->table_name . " SET years_of_experience=:years_of_experience, specialization=:specialization WHERE id=:id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":years_of_experience", $this->years_of_experience);
        $stmt->bindParam(":specialization", $this->specialization);

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
