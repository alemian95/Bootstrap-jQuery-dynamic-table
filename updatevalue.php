<?php

include("DB.php");

$DB = new DB();
$conn = $DB->connect();

if(! $conn)
{
    die("DB connection failed");
}

if(! isset($_POST['id']) || ! isset($_POST['newvalue']))
{
    return FALSE;
}

$query = $conn->query("update test1 set value = '" . $_POST['newvalue'] . "' where id = '" . $_POST['id'] . "'");


$response = [
    'value'     =>  TRUE,
    'newvalue'  =>  $_POST['newvalue']
];

echo json_encode($response);

?>