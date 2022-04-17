<?php

include("DB.php");

$DB = new DB();
$conn = $DB->connect();

if(! $conn) {
    die("DB connection failed");
}

$query = $conn->query("select count(*) as count from test1")->fetch_object();

$response = [
    'count'     =>  $query->count
];

echo json_encode($response);

?>