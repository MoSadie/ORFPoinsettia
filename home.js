$(function() {
	$("input").change(function() {updateOrderTotal();});

	$("#orderForm").submit(function( event ) {
		$("input[name='PlaceOrder']").attr("disabled",true);
		if ($("input[name='SalesPerson']").val() == "") {
			$("input[name='SalesPerson']").val("Olympia Robotics Federation");
		}
		$("#result").text("Submitting order...");
	});
});

function updateOrderTotal() {
		var SixRed = Number($("input[name='SixRed']").val());
		
		var SixWhite = Number($("input[name='SixWhite']").val());
		
		var SixPink = Number($("input[name='SixPink']").val());
		
		var EightPointFiveRed = Number($("input[name='EightPointFiveRed']").val());
		
		var EightPointFiveWhite = Number($("input[name='EightPointFiveWhite']").val());
		
		var EightPointFivePink = Number($("input[name='EightPointFivePink']").val());
		
		var TenRed = Number($("input[name='TenRed']").val());
		
		var TenWhite = Number($("input[name='TenWhite']").val());
		
		var TenPink = Number($("input[name='TenPink']").val());
				
		$("#OrderTotal").text("Current Total: $" + (12*(SixPink+SixRed+SixWhite) + 24*(EightPointFivePink+EightPointFiveRed+EightPointFiveWhite) + 36*(TenPink+TenRed+TenWhite)));
}