$(document).ready(function(){
//default
	$("#addroadworkDiv").hide();
	$("#addincidentDiv").hide();

	$("#road").click(function(){ //add food
		$("#addincidentDiv").hide();
		$("#addroadworkDiv").fadeIn(900);
		});

	$("#incident").click(function(){ //add food
		$("#addroadworkDiv").hide();
		$("#addincidentDiv").fadeIn(900);
		});

});
