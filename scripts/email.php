<?php
function sendEmail($orderNumber, $email_event_code, $email_event_key) {
    include_once "config.php";
    $postData = http_build_query(array(
            'value1' => $_POST["Email"],
            'value2' => "Dear ".$_POST["FirstName"].",<br/>
            <br/>
            Thank you for supporting the Olympia Robotics Federation! Your poinsettia order number is ".$orderNumber." and should be available by ".$_POST["DeliveryDate"]."<br/>
            <br/>
            <br/>
            Your receipt:<br/>
            <br/>".
            (($_POST["SixRed"]+$_POST["SixPink"]+$_POST["SixPink"] > 0) ?
            "6\" Poinsettias: ($12 each)<br/>"
                .(($_POST["SixRed"] > 0) ? "Red: ".$_POST["SixRed"]."<br/>" : "").
                (($_POST["SixWhite"] > 0) ? "White: ".$_POST["SixWhite"]."<br/>" : "").
                (($_POST["SixPink"] > 0) ? "Pink: ".$_POST["SixPink"]."<br/>" : "").
                "<br/>"
                :
                ""
            ).
            (($_POST["EightPointFiveRed"]+$_POST["EightPointFivePink"]+$_POST["EightPointFivePink"] > 0) ?
                "8 1/2\" Poinsettias: ($24 each)<br/>"
                    .(($_POST["EightPointFiveRed"] > 0) ? "Red: ".$_POST["EightPointFiveRed"]."<br/>" : "").
                    (($_POST["EightPointFiveWhite"] > 0) ? "White: ".$_POST["EightPointFiveWhite"]."<br/>" : "").
                    (($_POST["EightPointFivePink"] > 0) ? "Pink: ".$_POST["EightPointFivePink"]."<br/>" : "").
                    "<br/>"
                :
                ""
                ).
            (($_POST["TenRed"]+$_POST["TenPink"]+$_POST["TenPink"] > 0) ?
                   "10\" Poinsettias: ($36 each)<br/>"
                    .(($_POST["TenRed"] > 0) ? "Red: ".$_POST["TenRed"]."<br/>" : "").
                    (($_POST["TenWhite"] > 0) ? "White: ".$_POST["TenWhite"]."<br/>" : "").
                    (($_POST["TenPink"] > 0) ? "Pink: ".$_POST["TenPink"]."<br/>" : "").
                    "<br/>"
                : ""
                ).
            (($_POST["TenHangingRed"]+$_POST["TenHangingPink"]+$_POST["TenHangingPink"] > 0) ?
                "10\" Hanging Poinsettias: ($36 each)<br/>"
                    .(($_POST["TenHangingRed"] > 0) ? "Red: ".$_POST["TenHangingRed"]."<br/>" : "").
                    (($_POST["TenHangingWhite"] > 0) ? "White: ".$_POST["TenHangingWhite"]."<br/>" : "").
                    (($_POST["TenHangingPink"] > 0) ? "Pink: ".$_POST["TenHangingPink"]."<br/>" : "").
                    "<br/>"
                : 
                ""
                ).
            (($_POST["TenCenterRed"]+$_POST["TenCenterPink"]+$_POST["TenCenterPink"] > 0) ?
                "10\" Centerpiece Poinsettias: ($36 each)<br/>"
                    .(($_POST["TenCenterRed"] > 0) ? "Red: ".$_POST["TenCenterRed"]."<br/>" : "").
                    (($_POST["TenCenterWhite"] > 0) ? "White: ".$_POST["TenCenterWhite"]."<br/>" : "").
                    (($_POST["TenCenterPink"] > 0) ? "Pink: ".$_POST["TenCenterPink"]."<br/>" : "").
                    "<br/>"
                : 
                "").
            "Total: $". (12*($_POST["SixPink"]+$_POST["SixRed"]+$_POST["SixWhite"]) + 24*($_POST["EightPointFivePink"]+$_POST["EightPointFiveRed"]+$_POST["EightPointFiveWhite"]) + 36*($_POST["TenPink"]+$_POST["TenRed"]+$_POST["TenWhite"]) + 36*($_POST["TenCenterPink"]+$_POST["TenCenterRed"]+$_POST["TenCenterWhite"]+$_POST["TenHangingPink"]+$_POST["TenHangingRed"]+$_POST["TenHangingWhite"]))."<br/>
            <br/>
            You elected to ".($_POST["Payment"] == "On Delivery" ? "on delivery" : "pay in advance").".<br/>
            <br/>".
            (($_POST["SpecialOrderInstructions"] != "") ?
                "Special order instructions given:<br/>".
                $_POST["SpecialOrderInstructions"]."<br/><br/>"
                :
                ""
            ).
            (($_POST["DeliveryInstructions"] != "") ?
            "Delivery instructions given:<br/>".
            $_POST["DeliveryInstructions"]."<br/><br/>"
            :
            ""
            ).
            "<br/>Happy Holidays!<br/>
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