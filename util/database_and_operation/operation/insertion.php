<?php

  include("../../../util/database_and_operation/company_database.php");

  $insertionRecord = array(
    "registration" => 'gvjyhkl',
    "model" => '', 
    "region" => '', 
    "picture_reference_url" => '',
    "fuselage_type" => '',
    "max_pass_seating" => '',
    "sequenced_value" => '',
    "manufacturer" => '',
    "operating_Status" => '',
    "mainenance_Log" => ''
  );


  $sql_statement = " INSERT INTO `aircraft_fleet_collection` (`registration`, `model`, `region`, `picture_reference_url`, `fuselage_type`, `max_pass_seating`, `sequenced_value`, `manufacturer`, `operating_Status`, `mainenance_Log`, `date_connected`)
    VALUES (
    'ybuhir', 
    'f', 
    's', 
    'd', 
    'fg', 
    'v', 
    6, 
    'c', 
    'vq', 
    'wfe',
    'hbyjk'
    )
  ";

  $recordCreationStatus = "";

  if (mysqli_query($db_connection, $sql_statement)) {
    header("../../../pages/management-operation/aircraft-fleet-management.php");
    exit;
  } else {
    $recordCreationStatus = "Failed to generate a record.";
  }

  mysqli_close($db_connection); 
?>