<?php
header("Access-Control-Allow-Origin: *");

header('Access-Control-Allow-Origin: http://localhost:4200');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"));
    
    $query = $data->query;


    $host = 'localhost'; 
    $username = 'root'; 
    $password = ''; 
    $database = 'employeedb'; 

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if($query == 1){
        $recid = $data->id;

        $sql = "DELETE FROM employeefile WHERE employeefile.recid = '$recid'";
        
        if ($conn->query($sql) === TRUE) {
        echo "Emploee deleted successfully";
        } else {
        echo "Error";
        }

        $conn->close();
    }

}

?>
