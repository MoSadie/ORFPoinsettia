<?php
function sendEmail($orderNumber, $email_event_code, $email_event_key) {
    include_once "config.php";
    $postData = http_build_query(array(
            'value1' => $_POST["Email"],
            'value2' => "Thank you ".$_POST["FirstName"]." for your order!<br/>
            Your order number is ".$orderNumber."<br/>
            Your poinsettias should be delivered by ".$_POST["DeliveryDate"]."<br/>
            <br/>
            <br/>
            Your Receipt:<br/>
            <br/>
            6\" Poinsettias: ($12 each)<br/>
                Red: ".$_POST["SixRed"]."<br/>
                White: ".$_POST["SixWhite"]."<br/>
                Pink: ".$_POST["SixPink"]."<br/>
                <br/>
            8 1/2\" Poinsettias: ($24 each)<br/>
                Red: ".$_POST["EightPointFiveRed"]."<br/>
                White: ".$_POST["EightPointFiveWhite"]."<br/>
                Pink: ".$_POST["EightPointFivePink"]."<br/>
                <br/>
            10\" Poinsettias: ($36 each)<br/>
                Red: ".$_POST["TenRed"]."<br/>
                White: ".$_POST["TenWhite"]."<br/>
                Pink: ".$_POST["TenPink"]."<br/>
                <br/>
            10\" Hanging Poinsettias: ($36 each)<br/>
                Red: ".$_POST["TenHangingRed"]."<br/>
                White: ".$_POST["TenHangingWhite"]."<br/>
                Pink: ".$_POST["TenHangingPink"]."<br/>
                <br/>
            10\" Centerpiece Poinsettias: ($36 each)<br/>
                Red: ".$_POST["TenCenterRed"]."<br/>
                White: ".$_POST["TenCenterWhite"]."<br/>
                Pink: ".$_POST["TenCenterPink"]."<br/>
                <br/>
            Total: $". (12*($_POST["SixPink"]+$_POST["SixRed"]+$_POST["SixWhite"]) + 24*($_POST["EightPointFivePink"]+$_POST["EightPointFiveRed"]+$_POST["EightPointFiveWhite"]) + 36*($_POST["TenPink"]+$_POST["TenRed"]+$_POST["TenWhite"]) + 36*($_POST["TenCenterPink"]+$_POST["TenCenterRed"]+$_POST["TenCenterWhite"]+$_POST["TenHangingPink"]+$_POST["TenHangingRed"]+$_POST["TenHangingWhite"]))."<br/>
            You elected to ".($_POST["Payment"] == "On Delivery" ? "on delivery" : "pay in advance").".<br/>
            <br/>
            Thank you for supporting robotics!<br/>
            ".$_POST["SalesPerson"]
        ));

        $options = array( 'http' =>
        array(
            'method'  => 'POST',
            'header'  => 'Content-type: application/x-www-form-urlencoded',
            'content' => $postData
        )
        );

        $context = stream_context_create($options);
        $result = file_get_contents('https://maker.ifttt.com/trigger/'.$email_event_code.'/with/key/'.$email_event_key, false, $context);
}
?>