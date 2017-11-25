<?php
  function returntimeslot($slot){
    switch ($slot) {
      case '1':
        $time = "Monday 9.00 -> 11.20";
        return $time;
        break;
      case '2':
        $time = "Monday 11.40 -> 12.00";
        return $time;
        break;
      case '3':
        $time = "Monday 13.00 -> 14.20";
        return $time;
        break;
      case '4':
        $time = "Monday 14.40 -> 16.00";
        return $time;
        break;
      case '5':
        $time = "Tuesday 9.00 -> 11.20";
        return $time;
        break;
      case '6':
        $time = "Tuesday 11.40 -> 12.00";
        return $time;
        break;
      case '7':
        $time = "Tuesday 13.00 -> 14.20";
        return $time;
        break;
      case '8':
        $time = "Tuesday 14.40 -> 16.00";
        return $time;
        break;
      case '9':
        $time = "Wednesday 9.00 -> 11.20";
        return $time;
        break;
      case '10':
        $time = "Wednesday 11.40 -> 12.00";
        return $time;
        break;
      case '11':
        $time = "Wednesday 13.00 -> 14.20";
        return $time;
        break;
      case '12':
        $time = "Wednesday 14.40 -> 16.00";
        return $time;
        break;
      case '13':
        $time = "Thursday 9.00 -> 11.20";
        return $time;
        break;
      case '14':
        $time = "Thursday 11.40 -> 12.00";
        return $time;
        break;
      case '15':
        $time = "Thursday 13.00 -> 14.20";
        return $time;
        break;
      case '16':
        $time = "Thursday 14.40 -> 16.00";
        return $time;
        break;
      case '17':
        $time = "Friday 9.00 -> 11.20";
        return $time;
        break;
      case '18':
        $time = "Friday 11.40 -> 12.00";
        return $time;
        break;
      case '19':
        $time = "Friday 13.00 -> 14.20";
        return $time;
        break;
      case '20':
        $time = "Friday 14.40 -> 16.00";
        return $time;
        break;
      case '21':
        $time = "Saturday 9.00 -> 11.20";
        return $time;
        break;
      case '22':
        $time = "Saturday 11.40 -> 12.00";
        return $time;
        break;
      case '23':
        $time = "Saturday 13.00 -> 14.20";
        return $time;
        break;
      case '24':
        $time = "Saturday 14.40 -> 16.00";
        return $time;
        break;
      default:
        echo "NAN";
        break;
    }
  }
  function  checkdupslot($arr1, $arr2){
    foreach ($arr1 as $i => $value1) {
      foreach ($arr1 as $j => $value2) {
        if($value1 == $value2 AND $i !== $j){
          echo "Warning! Duplicating time slot";
          return ;
        }
      }
      foreach ($arr2 as $k => $value3) {
        if($value3 == $value1){
          echo "Warning! Duplicating time slot";
          return ;
        }
      }
    }
  }

  function searchreturn($array1, $array2, $value, $mysqli) {
    $pos = array_search($value,$array1);
    // echo "$pos";
    if($pos !== false){
      $q = "SELECT CONCAT(code,' sec.',numbersection) as c FROM teachsection WHERE idsection =".$array2[floor($pos/2)].";";
      $result = $mysqli->query($q);
      $row = $result->fetch_assoc();
      echo $row['c'];
    }else{
      echo "";
    }
  }
  function returntime($duedate){
    $now = new DateTime();
    $now = $now->setTimeZone(new DateTimeZone('Asia/Bangkok'));
    // echo 'Today : '. $now->format('Y-m-d H:i:s') . "\n";
    $due = new DateTime($duedate, new DateTimeZone('Asia/Bangkok'));
    // echo "<br>";
    // echo 'Due : '. $due->format('Y-m-d H:i:s') . "\n";
    // echo "<br>";
    $diff = $now->diff($due);
    // echo $diff->format('%F');
    if ($diff->format('%F')<0) {
      // echo "Ontime";
      return 1;
    }else {
      // echo "Overdue";
      return 0;
    }
  }
 ?>
