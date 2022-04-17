<?php

include("DB.php");

$DB = new DB();
$conn = $DB->connect();

if(! $conn) {
    die("DB connection failed");
}

if(! isset($_GET['id'])) {
    return FALSE;
}

$query = $conn->query("select * from test1 where id = '" . $_GET['id'] . "'");

if($query->num_rows > 0) {

    $row = $query->fetch_object();

    $response = [
        'id'            =>  $row->id,
        'city'          =>  $row->city,
        'btc_address'   =>  $row->btc_address,
        'domain'        =>  $row->domain,
        'value'         =>  $row->value
    ];

    echo json_encode($response);
}
else {
    echo json_encode([]);
}

?>