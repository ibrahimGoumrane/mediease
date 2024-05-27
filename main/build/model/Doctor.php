<?php
require_once 'Person.php';
class Doctor extends Person {
    protected $table_name = "Doctor";

    public const IS_DOCTOR = true;
    public $years_of_experience;
    public $specialization;

    public function __construct($full_name = null, $date_birth = null, $gender = null, $phone_number = null, $email = null, $password=null, $years_of_experience = null, $specialization = null) {
        parent::__construct($full_name, $date_birth, $gender, $phone_number, $email ,$password);
        $this->years_of_experience = $years_of_experience;
        $this->specialization = $specialization;
    }
    public function create() {
        // First, create the person record
        if (parent::create()) {
            // Then, create the doctor record using the newly created person's ID
            $query = "INSERT INTO " . $this->table_name . " (id, years_of_experience, specialization) VALUES (:id, :years_of_experience, :specialization)";
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(":id", $this->id);
            $stmt->bindParam(":years_of_experience", $this->years_of_experience);
            $stmt->bindParam(":specialization", $this->specialization);

            if ($stmt->execute()) {
                return true;
            }
        }
        return false;
    }

    public function read() {
        $query = "SELECT * FROM person, doctor WHERE person.id = doctor.id ;";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function update() {
        // First, update the person record
        if (parent::update()) {
            // Then, update the doctor record
            $query = "UPDATE " . $this->table_name . " SET years_of_experience=:years_of_experience, specialization=:specialization WHERE id=:id";
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(":id", $this->id);
            $stmt->bindParam(":years_of_experience", $this->years_of_experience);
            $stmt->bindParam(":specialization", $this->specialization);

            if ($stmt->execute()) {
                return true;
            }
        }
        return false;
    }

    public function delete() {
        // First, delete the doctor record
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
