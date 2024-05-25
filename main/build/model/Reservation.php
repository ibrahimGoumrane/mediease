<?php
class Reservation {
    private $conn;
    private $table_name = "Reservation";

    public $id;
    public $status;
    public $notes;
    public $visit_date;

    public function __construct($db, $status = null, $notes = null, $visit_date = null) {
        $this->conn = $db;
        $this->status = $status;
        $this->notes = $notes;
        $this->visit_date = $visit_date;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (status, notes, visit_date) VALUES (:status, :notes, :visit_date)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":notes", $this->notes);
        $stmt->bindParam(":visit_date", $this->visit_date);

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
        $query = "UPDATE " . $this->table_name . " SET status=:status, notes=:notes, visit_date=:visit_date WHERE id=:id";
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
