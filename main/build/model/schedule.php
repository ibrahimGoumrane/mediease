<?php
require_once 'Person.php';
class Schedule {
    public $conn;
    public $id_schedule;
    public $doctor_id;
    public $start_time;
    public $end_time;
    public $startDay;
    public $endDay;
    public function __construct($doctor_id = null, $id_schedule = null,  $start_time = null, $end_time = null, $startDay = null, $endDay = null) {
        $this->conn = establishConn();
        $this->id_schedule = $id_schedule;
        $this->doctor_id = $doctor_id;
        $this->start_time = $start_time;
        $this->end_time = $end_time;
        $this->startDay = $startDay;
        $this->endDay = $endDay;
    }

    public function create() {
        $query = "INSERT INTO Schedule (doctor_id, start_time, end_time , startDay ,endDay) VALUES (:doctor_id, :start_time, :end_time ,:startDay,:endDay)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":doctor_id", $this->doctor_id);
        $stmt->bindParam(":start_time", $this->start_time);
        $stmt->bindParam(":end_time", $this->end_time);
        $stmt->bindParam(":startDay",  $this->startDay);
        $stmt->bindParam(":endDay",  $this->endDay);

        if ($stmt->execute()) {
            $this->id_schedule = $this->conn->lastInsertId();
            return true;
        }
        return false;
    }
    public function getAvailability() {
        return date('H:i', strtotime($this->start_time)) . " - " . date('H:i', strtotime($this->end_time));
    }
    public function isDateWithinRange($date) {
        $date = new DateTime($date);
        $hours = strtotime($date->format('H'));
        $start_date = new DateTime($this->start_time);

        $end_date = new DateTime($this->end_time);

        return $hours >= $start_date && $hours <= $end_date;
    }
    public function readAll() {
        $query = "SELECT * FROM Schedule";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function read($id) {
        $query = "SELECT * FROM Schedule WHERE doctor_id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }
    public function update() {
        $query = "UPDATE Schedule SET doctor_id=:status, start_time=:notes, end_time=:visit_date , date=:date WHERE id_schedule=:id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id", $this->id_schedule);
        $stmt->bindParam(":doctor_id", $this->doctor_id);
        $stmt->bindParam(":start_time", $this->start_time);
        $stmt->bindParam(":end_time", $this->end_time);
        $stmt->bindParam(":startDay",  $this->startDay);
        $stmt->bindParam(":endDay",  $this->endDay);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function delete() {
        $query = "DELETE FROM Schedule WHERE id_schedule=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id_schedule);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>