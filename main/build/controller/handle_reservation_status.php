<?php

function IsBigger($array, $element1, $element2) {
    $index1 = array_search($element1, $array);
    $index2 = array_search($element2, $array);

    if ($index1 >= $index2) {
        return 1;
    } elseif ($index2 > $index1) {
        return 0;
    } 
  }
  function handle_reservation_status($reservation  , $i , $schedule, $startDay, $endDay) {
  $i++;

  $daysOfWeek = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');

  $visitDate = new DateTime($reservation['visit_date']);
  $visitDateUnix = $visitDate->format('U');


  $dayOfWeek = $visitDate->format('l'); // e.g., 'Monday'
  $day = $visitDate->format('d');
  $month = $visitDate->format('F'); // e.g., 'January'
  $year = $visitDate->format('Y');

  //starting time
  $startTime = $visitDate->format('H:i:s');
  //ending time
  $endTime =clone $visitDate;
  $endTime->modify('+1 hour');
  $endTime = $endTime->format('H:i:s');

  //schedule time
  // Convert end time to DateTime object
  $endTimeSchedule = new DateTime($schedule->end_time);
  // Subtract one hour from the end time

  $endTSchedule = clone $endTimeSchedule;
  $endTSchedule->modify('-1 hour');

  // Format the modified time as needed
  $endTSchedule = $endTSchedule->format('H:i');
  $statusUpdated = false;
  if ($reservation['status'] === 'canceled' || $reservation['status'] === 'approved') {
    $i--;
}
else if ($visitDateUnix <  time()) 
{
    $statusUpdated =true;
} else{
  if(IsBigger($daysOfWeek,$startDay , $dayOfWeek ) == 1 || IsBigger($daysOfWeek,$endDay ,$dayOfWeek ) ==0 ) 
  {

    $statusUpdated =true;
  } 
  else if($schedule->start_time > $startTime || $endTimeSchedule  < $startTime ) 
  {
    $statusUpdated =true;
  } 
}  
if($statusUpdated){
  $i--;
}

return array(
  'i' => $i,
  'dates' => array(
      'dayOfWeek' => $dayOfWeek,
      'day' => $day,
      'year' => $year,
      'month' => $month,
      'startTime' => $startTime,
      'endTime' => $endTime,
  ),
  'statusUpdated' => $statusUpdated,
);

}

