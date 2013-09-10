$(document).ready(function(){
//default
	$("#addroadworkDiv").hide();
	$("#addincidentDiv").hide();

	$("#road").click(function(){ //add food
		$("#addroadworkDiv").show();
		$("#addincidentDiv").hide();
		});

	$("#incident").click(function(){ //add food
		$("#addroadworkDiv").hide();
		$("#addincidentDiv").show();
		});

});
