<?php
require_once 'Person.php';
class Doctor extends Person {
    private static $conn ;
    protected $table_name = "Doctor";

    public const IS_DOCTOR = true;
    public $years_of_experience;
    public $specialization;

    public function __construct($full_name = null, $date_birth = null, $gender = null, $phone_number = null, $email = null, $password=null, $years_of_experience = null, $specialization = null) {
        Doctor::$conn = establishConn();
        parent::__construct($full_name, $date_birth, $gender, $phone_number, $email ,$password);
        $this->years_of_experience = $years_of_experience;
        $this->specialization = $specialization;
    }
    public function create() {
        // First, create the person record
        if (parent::create()) {
            // Then, create the doctor record using the newly created person's ID
            $query = "INSERT INTO " . $this->table_name . " (id, years_of_experience, specialization) VALUES (:id, :years_of_experience, :specialization)";
            $stmt = Doctor::$conn->prepare($query);

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
        $query = "SELECT * FROM Person, Doctor WHERE Person.id = Doctor.id ;";
        $stmt = Doctor::$conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function updateDoctor() {
        // First, update the person record
        if (parent::update()) {
            // Then, update the doctor record
            $query = "UPDATE Doctor  SET years_of_experience=:years_of_experience, specialization=:specialization WHERE id=:id";
            $stmt = Doctor::$conn->prepare($query);

            $stmt->bindParam(":id", $this->id);
            $stmt->bindParam(":years_of_experience", $this->years_of_experience);
            $stmt->bindParam(":specialization", $this->specialization);

            $this->update();
            if ($stmt->execute()) {
                return true;
            }
        }
        return false;
    }
    public static function getDoctorBasedSpecialisation($specialization) {
        Doctor::$conn = establishConn();
        $query = "SELECT p.full_name, p.phone_number, d.years_of_experience, d.specialization, d.id 
                  FROM Person p
                  JOIN Doctor d ON p.id = d.id
                  WHERE d.specialization = :specialization";
        $stmt = Doctor::$conn->prepare($query);
        $stmt->bindParam(':specialization', $specialization, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public static function delete($id) {
        Doctor::$conn = establishConn();
        $query = "DELETE FROM Doctor WHERE id=:id";
        $stmt = Doctor::$conn->prepare($query);
        $stmt->bindParam(":id", $id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
