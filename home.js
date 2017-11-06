$(function() {
	$("input").change(function() {updateOrderTotal();});
	
	$("#orderForm").submit(function( event ) {
		alert( "Handler for .submit() called." );
		event.preventDefault();
	});
});

function updateOrderTotal() {
		var SixRed = Number(document.getElementById("SixRed").value);
		
		var SixWhite = Number(document.getElementById("SixWhite").value);
		
		var SixPink = Number(document.getElementById("SixPink").value);
		
		var EightPointFiveRed = Number(document.getElementById("EightPointFiveRed").value);
		
		var EightPointFiveWhite = Number(document.getElementById("EightPointFiveWhite").value);
		
		var EightPointFivePink = Number(document.getElementById("EightPointFivePink").value);
		
		var TenRed = Number(document.getElementById("TenRed").value);
		
		var TenWhite = Number(document.getElementById("TenWhite").value);
		
		var TenPink = Number(document.getElementById("TenPink").value);
		
		var TenHangingRed = Number(document.getElementById("TenHangingRed").value);
		
		var TenHangingWhite = Number(document.getElementById("TenHangingWhite").value);
		
		var TenHangingPink = Number(document.getElementById("TenHangingPink").value);
		
		var TenCenterRed = Number(document.getElementById("TenCenterRed").value);
		
		var TenCenterWhite = Number(document.getElementById("TenCenterWhite").value);
		
		var TenCenterPink = Number(document.getElementById("TenCenterPink").value);
				
		$("#OrderTotal").text("Current Total: $" + (12*(SixPink+SixRed+SixWhite) + 24*(EightPointFivePink+EightPointFiveRed+EightPointFiveWhite) + 36*(TenPink+TenRed+TenWhite) + 36*(TenCenterPink+TenCenterRed+TenCenterWhite+TenHangingPink+TenHangingRed+TenHangingWhite)));
}

function doOrder() {
		document.getElementById("PlaceOrder").disabled = true;
		document.getElementById("result").innerHTML = "Submitting order...";
		
        var FirstName = document.getElementById("FirstName").value;

        var LastName = document.getElementById("LastName").value;

        var Address1 = document.getElementById("Address1").value;
		
		var Address2 = document.getElementById("Address2").value;
		
		var City = document.getElementById("City").value;
		
		var State = document.getElementById("State").value;
		
		var ZipCode = document.getElementById("ZipCode").value;
		
		
		var PhoneNumber = document.getElementById("PhoneNumber").value;
		
		var Email = document.getElementById("Email").value;
		
		var DeliveryInstructions = document.getElementById("DeliveryInstructions").value;
		
		var SalesPerson = document.getElementById("SalesPerson").value;
	
		var DeliveryDate = $("input[type=radio][name=DeliveryDate]:checked").val();
		
		var Payment = $("input[type=radio][name=Payment]:checked").val();
		
		var SixRed = Number(document.getElementById("SixRed").value);
		
		var SixWhite = Number(document.getElementById("SixWhite").value);
		
		var SixPink = Number(document.getElementById("SixPink").value);
		
		var EightPointFiveRed = Number(document.getElementById("EightPointFiveRed").value);
		
		var EightPointFiveWhite = Number(document.getElementById("EightPointFiveWhite").value);
		
		var EightPointFivePink = Number(document.getElementById("EightPointFivePink").value);
		
		var TenRed = Number(document.getElementById("TenRed").value);
		
		var TenWhite = Number(document.getElementById("TenWhite").value);
		
		var TenPink = Number(document.getElementById("TenPink").value);
		
		var TenHangingRed = Number(document.getElementById("TenHangingRed").value);
		
		var TenHangingWhite = Number(document.getElementById("TenHangingWhite").value);
		
		var TenHangingPink = Number(document.getElementById("TenHangingPink").value);
		
		var TenCenterRed = Number(document.getElementById("TenCenterRed").value);
		
		var TenCenterWhite = Number(document.getElementById("TenCenterWhite").value);
		
		var TenCenterPink = Number(document.getElementById("TenCenterPink").value);
		
		var SpecialOrderInstructions = document.getElementById("SpecialOrderInstructions").value

	var OrderTotal ="$" + (12*(SixPink+SixRed+SixWhite) + 24*(EightPointFivePink+EightPointFiveRed+EightPointFiveWhite) + 36*(TenPink+TenRed+TenWhite) + 36*(TenCenterPink+TenCenterRed+TenCenterWhite+TenHangingPink+TenHangingRed+TenHangingWhite));
	var PostBody = "<Order><Version>1</Version><FirstName>\"" + FirstName + "\"</FirstName><LastName>\"" + LastName + "\"</LastName><Address1>\"" + Address1 + "\"</Address1><Address2>\"" + Address2 + "\"</Address2><City>\"" + City +"\"</City><State>\"" + State + "\"</State><ZipCode>\"" + ZipCode + "\"</ZipCode><PhoneNumber>\"" + PhoneNumber + "\"</PhoneNumber><Email>" + Email + "</Email><DeliveryInstructions>\"" + DeliveryInstructions + "\"</DeliveryInstructions><SalesPerson>\"" + SalesPerson + "\"</SalesPerson><DeliveryDate>" + DeliveryDate + "</DeliveryDate><Payment>" + Payment + "</Payment><OrderTotal>" + OrderTotal + "</OrderTotal><SixRed>" + SixRed + "</SixRed><SixWhite>" + SixWhite + "</SixWhite><SixPink>" + SixPink + "</SixPink><EightPointFiveRed>" + EightPointFiveRed + "</EightPointFiveRed><EightPointFiveWhite>" + EightPointFiveWhite + "</EightPointFiveWhite><EightPointFivePink>" + EightPointFivePink + "</EightPointFivePink><TenRed>" + TenRed + "</TenRed><TenWhite>" + TenWhite + "</TenWhite><TenPink>" + TenPink + "</TenPink><TenHangingRed>" + TenHangingRed + "</TenHangingRed><TenHangingWhite>" + TenHangingWhite + "</TenHangingWhite><TenHangingPink>" + TenHangingPink + "</TenHangingPink><TenCenterRed>" + TenCenterRed + "</TenCenterRed><TenCenterWhite>" + TenCenterWhite + "</TenCenterWhite><TenCenterPink>" + TenCenterPink + "</TenCenterPink><SpecialOrderInstructions>\"" + SpecialOrderInstructions + "\"</SpecialOrderInstructions></Order>";
    console.log(PostBody);
	$.post("http://orfsales.dynns.com:8443/OrderService", PostBody,
    function(data,status){
		if (status == "success") {
			document.getElementById("result").innerHTML = "Thank you! Your order number is " + data + ". Your total is " + OrderTotal;
			document.getElementById("PlaceOrder").style.display = "none";
		} else {
			document.getElementById("result").innerHTML = "We are unable to submit your order. Please try again. Error: " + status;
			document.getElementById("PlaceOrder").disabled = false;
		}
		console.log("Data: " + data + "\nStatus: " + status);
	});
};