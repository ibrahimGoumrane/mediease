<?php

require_once 'establishConn.php';
abstract class Person {
    private static $conn ;
    protected $table_name = "Person";

    protected $id;
    protected $full_name;
    protected $date_birth;
    protected $gender;
    protected $phone_number;
    protected $email;
    protected $password;


    public function __construct($full_name = null, $date_birth = null, $gender = null, $phone_number = null, $email = null, $password = null) {
        Person::$conn = establishConn();
        $this->full_name = $full_name;
        $this->date_birth = $date_birth;
        $this->gender = $gender;
        $this->phone_number = $phone_number;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_DEFAULT); // Hash the password
    }

    public function create() {
        try{
            $query = "INSERT INTO  Person (date_of_birth , full_name , gender  , phone_number , email , password ) VALUES (:date_birth, :full_name , :gender, :phone_number, :email ,:password)";
            $stmt = Person::$conn->prepare($query);
            $stmt->bindParam(":full_name", $this->full_name);
            $stmt->bindParam(":date_birth", $this->date_birth);
            $stmt->bindParam(":gender", $this->gender);
            $stmt->bindParam(":phone_number", $this->phone_number);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":password", $this->password);

            if ($stmt->execute()) {
                $this->id = Person::$conn->lastInsertId();
                return true;
            }          
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = Person::$conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " SET full_name=:full_name, date_birth=:date_birth, gender=:gender, phone_number=:phone_number, email=:email , password=:password WHERE id=:id";
        $stmt = Person::$conn->prepare($query);

        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":full_name", $this->full_name);
        $stmt->bindParam(":date_birth", $this->date_birth);
        $stmt->bindParam(":gender", $this->gender);
        $stmt->bindParam(":phone_number", $this->phone_number);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", $this->password);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    public function checkEmailExsistence() {
        $query = "SELECT email FROM " . $this->table_name ;
        $stmt = Person::$conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
        foreach ($result as $value) {
            if ($value == $this->email) {
                return true;
            }
        }
        return false;
    }
    public static function delete($id) {
        Person::$conn = establishConn();
        $query = "DELETE FROM Person WHERE id=:id";
        $stmt = Person::$conn->prepare($query);
        $stmt->bindParam(":id", $id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
