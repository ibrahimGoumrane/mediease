<?php
require_once 'Person.php';
class Patient extends Person {
    private static $conn ;
    protected $table_name = "Patient";
    public const IS_DOCTOR = false;

    public $medical_history ;

    public function __construct($full_name = null, $date_birth = null, $gender = null, $phone_number = null, $email = null, $password=null, $medical_history = null) {
        Patient::$conn = establishConn();
        parent::__construct($full_name, $date_birth, $gender, $phone_number, $email ,  $password);
        $this->medical_history = $medical_history;
    }

    public function create() {

        // First, create the person record
        if (parent::create()) {
            // Then, create the patient record using the newly created person's ID
            $query = "INSERT INTO " . $this->table_name . " (id, medical_history) VALUES (:id, :medical_history)";
            $stmt = Patient::$conn->prepare($query);

            $stmt->bindParam(":id", $this->id);
            $stmt->bindParam(":medical_history", $this->medical_history);

            if ($stmt->execute()) {
                return true;
            }
        }
        return false;
    }

    public function read() {
        $query = "SELECT * FROM Person, Patient WHERE Person.id = Patient.id ;";
        $stmt = Patient::$conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function updatePatient() {
        // First, update the person record
        if (parent::update()) {
            // Then, update the patient record
            $query = "UPDATE " . $this->table_name . " SET medical_history=:medical_history WHERE id=:id";
            $stmt = Patient::$conn->prepare($query);

            $stmt->bindParam(":id", $this->id);
            $stmt->bindParam(":medical_history", $this->medical_history);
            $this->update();
            if ($stmt->execute()) {
                return true;
            }
        }
        return false;
    }

    public static function delete($id) {
        Patient::$conn = establishConn();
        $query = "DELETE FROM Patient WHERE id=:id";
        $stmt = Patient::$conn->prepare($query);
        $stmt->bindParam(":id", $id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
