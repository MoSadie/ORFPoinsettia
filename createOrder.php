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

$db_conn = sqlsrv_connect($db_hostname, $connectionOptions);

if ($db_conn == false) {
	$success = false;
	exit;
}


$query = "INSERT INTO ".$db_table." (Red6, White6, Pink6, Red8Half, White8Half, Pink8Half, Red10Pot, White10Pot, Pink10Pot, Red10PotHanging, White10PotHanging, Pink10PotHanging, Red10Centerpiece, White10Centerpiece, Pink10Centerpiece, SpecialInstructions, DeliveryDate, PayOnDelivery, FirstName, LastName, AddressLine1, AddressLine2, City, State, ZipCode, PhoneNumber, Email, DeliveryInstructions, Salesperson)
VALUES ('".$_POST["SixRed"]."','".$_POST["SixWhite"]."','".$_POST["SixPink"]."','".$_POST["EightPointFiveRed"]."','".$_POST["EightPointFiveWhite"]."','".$_POST["EightPointFivePink"]."','".$_POST["TenRed"]."','".$_POST["TenWhite"]."','".$_POST["TenPink"]."','".$_POST["TenHangingRed"]."','".$_POST["TenHangingWhite"]."','".$_POST["TenHangingPink"]."','".$_POST["TenCenterRed"]."','".$_POST["TenCenterWhite"]."','".$_POST["TenCenterPink"]."','".filter_var($_POST["SpecialOrderInstructions"], FILTER_SANITIZE_STRING)."','".filter_var($_POST["DeliveryDate"], FILTER_SANITIZE_STRING)."','".($_POST["Payment"] == "On Delivery" ? "1" : "0")."','".filter_var($_POST["FirstName"], FILTER_SANITIZE_STRING)."','".filter_var($_POST["LastName"], FILTER_SANITIZE_STRING)."','".filter_var($_POST["Address1"], FILTER_SANITIZE_STRING)."','".filter_var($_POST["Address2"], FILTER_SANITIZE_STRING)."','".filter_var($_POST["City"], FILTER_SANITIZE_STRING)."','".filter_var($_POST["State"], FILTER_SANITIZE_STRING)."','".$_POST["ZipCode"]."','".$_POST["PhoneNumber"]."','".filter_var($_POST["Email"], FILTER_SANITIZE_EMAIL)."','".filter_var($_POST["DeliveryInstructions"], FILTER_SANITIZE_STRING)."','".filter_var($_POST["SalesPerson"], FILTER_SANITIZE_STRING)."');";

$getResults= sqlsrv_query($db_conn, $query);

$success = $getResults != false;


sqlsrv_free_stmt($getResults);
?>
<html>
    <head>
        <title>Olympia Robotics Poinsettia Sales</title>
        <link rel="stylesheet" href="Home.css"/>
        <link href="favicon.png" rel="icon">
    </head>
    <body>
        <div style="margin:auto">
            <h1>
                <?php if ($success) echo "Your order was successfully placed!";
                    else echo "Something went wrong, please go back and try again.";
                ?>
            </h1>
        </div>
    </body>
</html>