<?php
class Patient extends Person {
    private $table_name = "Patient";
    public const IS_DOCTOR = false;

    public $medical_history ;

    public function __construct($db, $last_name = null, $first_name = null, $date_birth = null, $gender = null, $phone_number = null, $email = null, $password=null, $medical_history = null) {
        parent::__construct($db, $last_name, $first_name, $date_birth, $gender, $phone_number, $email ,  $password);
        $this->medical_history = $medical_history;
    }

    public function create() {
        // First, create the person record
        if (parent::create()) {
            // Then, create the patient record using the newly created person's ID
            $query = "INSERT INTO " . $this->table_name . " (id, medical_history) VALUES (:id, :medical_history)";
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(":id", $this->id);
            $stmt->bindParam(":medical_history", $this->medical_history);

            if ($stmt->execute()) {
                return true;
            }
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
        // First, update the person record
        if (parent::update()) {
            // Then, update the patient record
            $query = "UPDATE " . $this->table_name . " SET medical_history=:medical_history WHERE id=:id";
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(":id", $this->id);
            $stmt->bindParam(":medical_history", $this->medical_history);

            if ($stmt->execute()) {
                return true;
            }
        }
        return false;
    }

    public function delete() {
        // First, delete the patient record
        $query = "DELETE FROM " . $this->table_name . " WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            // Then, delete the person record
            return parent::delete();
        }
        return false;
    }
}
?>
