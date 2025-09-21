<?php 
  if(isset($_GET['status'] )) {
    $status = $_GET['status'];
  }

  $db_server = "localhost";
  $db_user = "root";
  $db_pass = "";
  $db_name = "company_aircraft_fleet";
  $db_connection = "";

  try{
    $db_connection = mysqli_connect($db_server,
                                  $db_user,
                                  $db_pass,
                                  $db_name
    );
  }
  catch(mysqli_sql_exception) {
    echo "Connection to the company database had failed.";
  }


  if($db_connection) {

    $server_detail = $db_connection -> server_version;

    $message = "The management is now connected to the company database {$server_detail}.<br/>";

    if(isset($status)) {
      if($status == true) {
        echo $message;
      }
    }
  } 
?>