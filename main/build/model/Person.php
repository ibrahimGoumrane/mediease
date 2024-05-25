<?php
abstract class Person {
    protected $conn;
    protected $table_name = "Person";

    public $id;
    public $last_name;
    public $first_name;
    public $date_birth;
    public $gender;
    public $phone_number;
    public $email;
    public $password;

<<<<<<< HEAD
    public function __construct($db, $last_name = null, $first_name = null, $date_birth = null, $gender = null, $phone_number = null, $email = null , $password = null) {
=======
    public function __construct($db, $last_name = null, $first_name = null, $date_birth = null, $gender = null, $phone_number = null, $email = null,$password = null) {
>>>>>>> b6da4b68bfbff8832b272f9c26fe4276eec18837
        $this->conn = $db;
        $this->last_name = $last_name;
        $this->first_name = $first_name;
        $this->date_birth = $date_birth;
        $this->gender = $gender;
        $this->phone_number = $phone_number;
        $this->email = $email;
<<<<<<< HEAD
        $this->password = $password;
=======
        $this->password = password_hash($password, PASSWORD_DEFAULT); // Hash the password

>>>>>>> b6da4b68bfbff8832b272f9c26fe4276eec18837
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (last_name, first_name, date_birth, gender, phone_number, email ,password ) VALUES (:last_name, :first_name, :date_birth, :gender, :phone_number, :email ,:password)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":last_name", $this->last_name);
        $stmt->bindParam(":first_name", $this->first_name);
        $stmt->bindParam(":date_birth", $this->date_birth);
        $stmt->bindParam(":gender", $this->gender);
        $stmt->bindParam(":phone_number", $this->phone_number);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", $this->password);
<<<<<<< HEAD
=======

>>>>>>> b6da4b68bfbff8832b272f9c26fe4276eec18837

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
        $query = "UPDATE " . $this->table_name . " SET last_name=:last_name, first_name=:first_name, date_birth=:date_birth, gender=:gender, phone_number=:phone_number, email=:email , password=:password WHERE id=:id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":last_name", $this->last_name);
        $stmt->bindParam(":first_name", $this->first_name);
        $stmt->bindParam(":date_birth", $this->date_birth);
        $stmt->bindParam(":gender", $this->gender);
        $stmt->bindParam(":phone_number", $this->phone_number);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", $this->password);
<<<<<<< HEAD
=======

>>>>>>> b6da4b68bfbff8832b272f9c26fe4276eec18837

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
