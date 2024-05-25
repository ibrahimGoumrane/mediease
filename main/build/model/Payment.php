<?php
class Payment {
    private $conn;
    private $table_name = "Payment";

    public $id;
    public $patient_id;
    public $amount;
    public $payment_date;
    public $payment_method;
    public $status;

    public function __construct($db, $patient_id = null, $amount = null, $payment_date = null, $payment_method = null, $status = null) {
        $this->conn = $db;
        $this->patient_id = $patient_id;
        $this->amount = $amount;
        $this->payment_date = $payment_date;
        $this->payment_method = $payment_method;
        $this->status = $status;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (patient_id, amount, payment_date, payment_method, status) VALUES (:patient_id, :amount, :payment_date, :payment_method, :status)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":patient_id", $this->patient_id);
        $stmt->bindParam(":amount", $this->amount);
        $stmt->bindParam(":payment_date", $this->payment_date);
        $stmt->bindParam(":payment_method", $this->payment_method);
        $stmt->bindParam(":status", $this->status);

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
        $query = "UPDATE " . $this->table_name . " SET patient_id=:patient_id, amount=:amount, payment_date=:payment_date, payment_method=:payment_method, status=:status WHERE id=:id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":patient_id", $this->patient_id);
        $stmt->bindParam(":amount", $this->amount);
        $stmt->bindParam(":payment_date", $this->payment_date);
        $stmt->bindParam(":payment_method", $this->payment_method);
        $stmt->bindParam(":status", $this->status);

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
