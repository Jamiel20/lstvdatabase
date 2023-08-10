<?php

header("Access-Control-Allow-Origin: *"); 

header('Access-Control-Allow-Origin: http://localhost:4200');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type');

$host = 'localhost'; 
$username = 'root'; 
$password = ''; 
$database = 'employeedb'; 

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT salesfile1.docnum AS recid, salesfile1.docnum, salesfile1.trndte, customerfile2.cuscde AS cuscde ,salesfile1.cuscde AS cusdsc 
FROM salesfile1 INNER JOIN customerfile2 ON salesfile1.cuscde = customerfile2.cusdsc LIMIT 10";

$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($data);
?>