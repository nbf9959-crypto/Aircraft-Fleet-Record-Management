<?php 
  header('Content-Type: application/json');
  include("../../../util/database_and_operation/company_database.php");


  if(isset($_GET['registration'])) {
    $selected_registraton = $_GET['registration'];
  }

  if(isset($_GET['registration'])) {

    $sql_statement = "DELETE FROM aircraft_fleet_collection 
    WHERE registration='$selected_registraton'";

    if (mysqli_query($db_connection, $sql_statement)) {

        $result_message = "Record {$selected_registraton} deleted sucessfully";
    
        $successful_result = [
            'status' => 'success',
            'message' => $result_message,
        ];
    
        echo json_encode($successful_result);
    
      } else {
        $error_result = [
            'status' => 'error',
            'message' => 'Failed to delete the record'
        ];
    
        echo json_encode($error_result);
    }

  } else {
    $invalid_request_message = "The request was sent without a valid registration. The action was denied.";

    echo json_encode($invalid_request_message);
  }

  mysqli_close($db_connection);
?>