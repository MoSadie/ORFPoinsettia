$(function() {
	$("input").change(function() {updateOrderTotal();});

	$("#orderForm").submit(function( event ) {
		$("input[name='PlaceOrder']").attr("disabled",true);
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
		
		var TenHangingRed = Number($("input[name='TenHangingRed']").val());
		
		var TenHangingWhite = Number($("input[name='TenHangingWhite']").val());
		
		var TenHangingPink = Number($("input[name='TenHangingPink']").val());
		
		var TenCenterRed = Number($("input[name='TenCenterRed']").val());
		
		var TenCenterWhite = Number($("input[name='TenCenterWhite']").val());
		
		var TenCenterPink = Number($("input[name='TenCenterPink']").val());
				
		$("#OrderTotal").text("Current Total: $" + (12*(SixPink+SixRed+SixWhite) + 24*(EightPointFivePink+EightPointFiveRed+EightPointFiveWhite) + 36*(TenPink+TenRed+TenWhite) + 36*(TenCenterPink+TenCenterRed+TenCenterWhite+TenHangingPink+TenHangingRed+TenHangingWhite)));
}