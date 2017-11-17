<?php
if (!isSet($_POST["Username"]) || !isSet($_POST["Password"])) {
    include "scripts/login.php";
    exit;
}

include_once "scripts/config.php";

$connectionOptions = array(
    "Database" => $db_database,
    "Uid" => $_POST["Username"],
    "PWD" => $_POST["Password"]
);

$db_conn = sqlsrv_connect($db_hostname, $connectionOptions);

if ($db_conn == false) {
    $error = "Connection Failed.";
    include "scripts/error.php";
    exit;
}

$query = "SELECT * FROM ".$db_table;

$getResults = sqlsrv_query($db_conn, $query);

if ($getResults == false) {
    $error = "Error getting results.";
    include "scripts/error.php";
    exit;
}

//Setup download of this as a csv
//header('Content-Type: text/csv');
//header('Content-Disposition: attachment; filename="Poinsettia Data.csv"');

while( $row = sqlsrv_fetch_array( $getResults, SQLSRV_FETCH_NUMERIC) ) {
    echo $row[0].",".$row[1].",".$row[2].",".$row[3].",".$row[4].",".$row[5].",".$row[6].",".$row[7].",".$row[8].",".$row[9].",".$row[10].",".$row[11]->format("y-m-d").",".$row[12].",".$row[13].",".$row[14].",".$row[15].",".$row[16].",".$row[17].",".$row[18].",".$row[19].",".$row[20].",".$row[21].",".$row[22].",".$row[23].PHP_EOL;
}

?>