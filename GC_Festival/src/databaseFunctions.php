<?php include_once '../config/database.php';?>
<?php
function db_connect(){
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if($mysqli->connect_error) {
        die("connection failed:" .$mysqli->connect_error);
      }
      return $mysqli;
}

function db_getData($query){
    $mysqli = db_connect();
    $result = $mysqli ->query($query);
    $mysqli ->close();
    return $result;
}

function db_insertData($query){
    $mysqli = db_connect();
    $result = $mysqli ->query($query);
    if ($mysqli->query($query) === TRUE) {
        //return row id for succes
        // $result = $mysqli->insert_id;
        // echo"new reccord created successfully. Last inserted ID is: " . $row_id;
    } else {
        $result = "Error: " . $query . "<br>" . $mysqli->errow;
    }
    $mysqli->close();
    return $result;
}

?>