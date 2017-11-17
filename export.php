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
    include "scripts/error.php";
    exit;
}

$query = "SELECT * FROM ".$db_database;

$getResults = sqlsrv_query($db_conn, $query);

if ($getResults == false) {
    include "scripts/error.php";
    exit;
}

//Setup download of this as a csv
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="Poinsettia Data.csv"');

while( $row = sqlsrv_fetch_array( $getResults, SQLSRV_FETCH_NUMERIC) ) {
    for ($i = 0; $i < (count($row)-1); $i++) {
        echo $row[i];
    }
    echo $row[count($row)-1].PHP_EOL;
}

?>