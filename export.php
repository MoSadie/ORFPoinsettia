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
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="Poinsettia Data.csv"');

while( $row = sqlsrv_fetch_array( $getResults, SQLSRV_FETCH_NUMERIC) ) {
    echo trim($row[0]).",".trim($row[1]).",".trim($row[2]).",".trim($row[3]).",".trim($row[4]).",".trim($row[5]).",".trim($row[6]).",".trim($row[7]).",".trim($row[8]).",".trim($row[9]).",".trim($row[10]).",".trim($row[11]->format("y-m-d")).",".trim($row[12]).",".trim($row[13]).",".trim($row[14]).",".trim($row[15]).",".trim($row[16]).",".trim($row[17]).",".trim($row[18]).",".trim($row[19]).",".trim($row[20]).",".trim($row[21]).",".trim($row[22]).",".trim($row[23]).PHP_EOL;
}

?>