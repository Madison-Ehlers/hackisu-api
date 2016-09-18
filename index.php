<?php
require 'flight-master/flight/Flight.php';

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
Flight::route('/', function(){
    echo "Hello";

});

Flight::route('/messages', function(){
    $connection = getDB();
    if($connection){
        $all_rows = $connection->query("SELECT * FROM messages");
        if( $result = $all_rows){
            while($row = $result->fetch_array(MYSQL_ASSOC)){
                $myArray[] = $row;
            }
            echo json_encode($myArray);
        }
        $connection->close();
    }

});

Flight::route('POST /addMomMessage', function(){
    $post_data = json_decode(file_get_contents('php://input'));
    print_r($post_data);
    $vars = json_decode(Flight::request()->body, true);
    echo $vars;
});

Flight::start();