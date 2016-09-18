<?php

function getDB(){
    $servername = "";
    $username = "";
    $password = "";
    $database = "";

    $con = new mysqli($servername, $username, $password, $database);
    //check connection
    if ($con->connect_error){
        die("Connection failed");
    }
    return $con;
}


$con = getDB();
$sql = "INSERT INTO messages (message, category, times_sent) VALUES ('$_POST[data]', 'MOM', 0)";
if ($con->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();