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
        $firstname = $data->first;
        $address = $data->addr;
        $birthday = $data->bday;
        $age = $data->ag;
        $gender = $data->gen;
        $status = $data->stat;
        $contact = $data->cont;
        $salary = $data->sal;
        $activate = $data->acti;

        $sql = "INSERT INTO employeefile (recid, fullname, address, birthdate, age, gender, civilstat, contactnum, salary, isactive) VALUES 
        (NULL, '$firstname', '$address', '$birthday', '$age', '$gender', '$status', '$contact', '$salary', '$activate')";

        if ($conn->query($sql) === TRUE) {
        echo "Emploee added successfully";
        } else {
        echo "Error";
        }

        $conn->close();
    }
}
?>
