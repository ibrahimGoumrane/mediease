<?php
class MedicalSupply {
    private $conn;
    private $table_name = "medical_supply";

    public $id;
    public $name;
    public $quantity;
    public $supplier;
    public $purchase_date;
    public $expire_date;

    public function __construct($db, $name = null, $quantity = null, $supplier = null, $purchase_date = null, $expire_date = null) {
        $this->conn = $db;
        $this->name = $name;
        $this->quantity = $quantity;
        $this->supplier = $supplier;
        $this->purchase_date = $purchase_date;
        $this->expire_date = $expire_date;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (name, quantity, supplier, purchase_date, expire_date) VALUES (:name, :quantity, :supplier, :purchase_date, :expire_date)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":quantity", $this->quantity);
        $stmt->bindParam(":supplier", $this->supplier);
        $stmt->bindParam(":purchase_date", $this->purchase_date);
        $stmt->bindParam(":expire_date", $this->expire_date);

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
        $query = "UPDATE " . $this->table_name . " SET name=:name, quantity=:quantity, supplier=:supplier, purchase_date=:purchase_date, expire_date=:expire_date WHERE id=:id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":quantity", $this->quantity);
        $stmt->bindParam(":supplier", $this->supplier);
        $stmt->bindParam(":purchase_date", $this->purchase_date);
        $stmt->bindParam(":expire_date", $this->expire_date);

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
