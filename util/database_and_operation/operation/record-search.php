<?php
  header('Content-Type: application/json');
  include("../../../util/database_and_operation/company_database.php");

  $result;

  if(isset($_GET['registration'])) {
    $selected_registraton = $_GET['registration'];

    $sql_statement = "SELECT * FROM aircraft_fleet_collection 
    WHERE registration = '$selected_registraton'
    "; 

    $result = mysqli_query($db_connection, $sql_statement); 

    if($result) {
      $result_message = "Querying for a selected record is successful.";

        $result_collection = []; 

        if(mysqli_num_rows($result) > 0) {
         while($row = mysqli_fetch_assoc($result)) {
          array_push($result_collection, $row);
        }}
    
        $successful_result = [
            'status' => 'success',
            'message' => $result_message,
            'result' => $result_collection
        ];
    
        echo json_encode($successful_result);

    } else {
      $result_message = "Querying for a selected record had failed.";
    
        $error_result = [
            'status' => 'error',
            'message' => $result_message,
        ];
    
        echo json_encode($error_result);
    }
  } else {

    $sql_statement = "SELECT * FROM aircraft_fleet_collection
    ORDER BY `aircraft_fleet_collection`.`date_connected` DESC
    "; 

    $result = mysqli_query($db_connection, $sql_statement);

    if($result) {
      $result_message = "Querying for a collection of records is successful.";

        $result_collection = []; 

        if(mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
            array_push($result_collection, $row);
        }}
    
        $successful_result = [
            'status' => 'success',
            'message' => $result_message,
            'result' => $result_collection
        ];
    
        echo json_encode($successful_result);

    } else {

      $result_message = "Querying for a selected record had failed.";
    
        $error_result = [
            'status' => 'error',
            'message' => $result_message,
        ];
    
        echo json_encode($error_result);
    }
  }

  mysqli_close($db_connection); 
?> 
