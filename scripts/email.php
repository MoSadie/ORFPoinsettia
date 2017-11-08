<?php
function sendEmail($orderNumber, $email_event_code, $email_event_key) {
    include_once "config.php";
    $postData = http_build_query(
        array(
            'value1' => $_POST["Email"],
            'value2' => "Thank you ".$_POST["FirstName"]." for your order!
            Your order number is ".$orderNumber."
            Your poinsettias should be delivered by ".$_POST["DeliveryDate"]."
            
            
            Your Receipt:
            
            6\" Poinsettias: ($12 each)
                Red: ".$_POST["SixRed"]."
                White: ".$_POST["SixWhite"]."
                Pink: ".$_POST["SixPink"]."
                
            8 1/2\" Poinsettias: ($24 each)
                Red: ".$_POST["EightPointFiveRed"]."
                White: ".$_POST["EightPointFiveWhite"]."
                Pink: ".$_POST["EightPointFivePink"]."
            
            10\" Poinsettias: ($36 each)
                Red: ".$_POST["TenRed"]."
                White: ".$_POST["TenWhite"]."
                Pink: ".$_POST["TenPink"]."
                
            10\" Hanging Poinsettias: ($36 each)
                Red: ".$_POST["TenHangingRed"]."
                White: ".$_POST["TenHangingWhite"]."
                Pink: ".$_POST["TenHangingPink"]."
            
            10\" Centerpiece Poinsettias: ($36 each)
                Red: ".$_POST["TenCenterRed"]."
                White: ".$_POST["TenCenterWhite"]."
                Pink: ".$_POST["TenCenterPink"]."
                
            Total: $". (12*($_POST["SixPink"]+$_POST["SixRed"]+$_POST["SixWhite"]) + 24*($_POST["EightPointFivePink"]+$_POST["EightPointFiveRed"]+$_POST["EightPointFiveWhite"]) + 36*($_POST["TenPink"]+$_POST["TenRed"]+$_POST["TenWhite"]) + 36*($_POST["TenCenterPink"]+$_POST["TenCenterRed"]+$_POST["TenCenterWhite"]+$_POST["TenHangingPink"]+$_POST["TenHangingRed"]+$_POST["TenHangingWhite"]))."
            You elected to ".($_POST["Payment"] == "On Delivery" ? "on delivery" : "pay in advance").".
            
            Thank you for supporting robotics!
            ".$_POST["SalesPerson"]
        )
        );

        $options = array( 'http' =>
        array(
            'method'  => 'POST',
            'header'  => 'Content-type: application/x-www-form-urlencoded',
            'content' => $postdata
        )
        );

        $context = stream_context_create($opts);
        $result = file_get_contents('https://maker.ifttt.com/trigger/'.$email_event_code.'/with/key/'.$email_event_key, false, $context);
}
?>