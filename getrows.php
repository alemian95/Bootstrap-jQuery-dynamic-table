<?php

// DB connection
include("DB.php");

$DB = new DB();
$conn = $DB->connect();

if(! $conn)
{
    die("DB connection failed");
}


if(! isset($_GET['limit']) || ! isset($_GET['rows']))
{
    return FALSE;
}
else
{
    $limit = $_GET['limit'];
    $rows = $_GET['rows'];

    // set default order values
    $orderBy = "id"; // primary key by default
    $order = "asc"; // ascending order by default

    if(isset($_GET['orderby']))
    {
        $orderby = $_GET['orderby']; // order by a different attribute if specified
    }

    if(isset($_GET['order']))
    {
        $order = $_GET['order']; // set a different sorting if specified
    }

    $query = $conn->query("select * from test1 order by " . $orderby . " " . $order . " limit " . $limit . ", " . $rows);

    // build response
    $response = [];
    while($r = $query->fetch_object()) {
        array_push($response, $r);
    }

    echo json_encode($response);
}
?>