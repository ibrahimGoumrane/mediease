<?php 
session_start();
require_once '../model/schedule.php';
if(isset($_POST['submitAvai'])){
    $schedule = new Schedule();
    
    $schedule->doctor_id = $_SESSION['user_id'];
    $schedule->start_time = $_POST['start_hour'];
    $schedule->end_time = $_POST['end_hour'];
    $schedule->startDay = $_POST['starting_day'];
    $schedule->endDay = $_POST['ending_day'];
    try{
        $schedule->create();
    }catch(Exception $e){
        echo $e->getMessage();
        
    }
    header('Location: ../view/manageReservation.php?availability=true');
}