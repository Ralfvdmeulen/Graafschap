<?php
require_once "databaseFunctions.php";

function registerUser($firstname, $lastname, $email, $password){
    $result = db_insertData("INSERT INTO users (email, firstname, lastname, password) VALUES ('$email', '$firstname', '$lastname', '$password' )");
    return $result;
}
function getUser($email, $password){
    $result = db_getData("SELECT * FROM users WHERE email = '" . $email . "' AND password = '" . $password . "'");
    if ($result->num_rows > 0){
        //user found, return user data
        return $result;
    }else {
        return "No user found";
    }
}
?>