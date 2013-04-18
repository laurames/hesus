jQuery(function($) {
    $(document).ready(function() {
        $('#open').click(function() {
            $('#sidePanel').animate({
                'left': '0px'
            }, 900, function(){ draw() } );
        });
		
		$('#close').click(function() {
            $('#sidePanel').animate({
                'left': '-657px'
            }, 800, function() { draw() });
        });
		
		// Switch buttons from "Log In | Register" to "Close Panel" on click
		$("#toggle p").click(function () {
			$("#toggle p").toggle();
		});
    });
});