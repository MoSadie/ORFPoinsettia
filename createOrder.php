<?php
if (!isSet($_POST)) {
    http_response_code(400);
    exit;
}

include "scripts/config.php";

$connectionOptions = array(
    "Database" => $db_database,
    "Uid" => $db_username,
    "PWD" => $db_password
);


$db_conn = sqlsrv_connect($serverName, $connectionOptions);

$query = "INSERT INTO Orders (Red6, White6, Pink6, Red8Half, White8Half, Pink8Half, Red10Pot, White10Pot, Pink10Pot, Red10PotHanging, White10PotHanging, Pink10PotHanging, Red10Centerpiece, White10Centerpiece, Pink10Centerpiece, SpecialInstructions, DeliveryDate, PayOnDelivery, FirstName, LastName, AddressLine1, AddressLine2, City, State, ZipCode, PhoneNumber, Email, DeliveryInstructions, Salesperson)
VALUES ('".$_POST["SixRed"]."','".$_POST["SixWhite"]."','".$_POST["SixPink"]."','".$_POST["EightPointFiveRed"]."','".$_POST["EightPointFiveWhite"]."','".$_POST["EightPointFivePink"]."','".$_POST["TenRed"]."','".$_POST["TenWhite"]."','".$_POST["TenPink"]."','".$_POST["TenHangingRed"]."','".$_POST["TenHangingWhite"]."','".$_POST["TenHangingPink"]."','".$_POST["TenCenterRed"]."','".$_POST["TenCenterWhite"]."','".$_POST["TenCenterPink"]."','".$_POST["SpecialOrderInstructions"]."','".$_POST["DeliveryDate"]."','".($_POST["Payment"] == "On Delivery" ? "1" : "0")."','".$_POST["FirstName"]."','".$_POST["LastName"]."','".$_POST["Address1"]."','".$_POST["Address2"]."','".$_POST["City"]."','".$_POST["State"]."','".$_POST["ZipCode"]."','".$_POST["PhoneNumber"]."','".$_POST["Email"]."','".$_POST["DeliveryInstructions"]."','".$_POST["SalesPerson"]."');";

$getResults= sqlsrv_query($db_conn, $query);

if ($getResults != false) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . sqlsrv_errors();
}

sqlsrv_free_stmt($getResults);
?>