$(document).ready(function(){
//default
	$("#addroadworkDiv").hide();
	$("#addincidentDiv").hide();

	$("#menu_rw").click(function(){ // SHOW ROADWORK FORM
		$("#admin_menu").hide();
		$("#addincidentDiv").hide();
		$("#addroadworkDiv").fadeIn(900);
		});

	$("#menu_inc").click(function(){ // SHOW TRAFFIC INCIDENT FORM
		$("#admin_menu").hide();
		$("#addroadworkDiv").hide();
		$("#addincidentDiv").fadeIn(900);
		});

	$("#menu_back1").click(function(){ //BACK TO MAIN MENU
		$("#addroadworkDiv").hide();
		$('.addRoadwork').trigger("reset"); //reset the forms
		$('.addIncident').trigger("reset"); //reset the forms
		$("#admin_menu").fadeIn(900);
		});

	$("#menu_back2").click(function(){ //BACK TO MAIN MENU
		$("#addincidentDiv").hide();
		$('.addRoadwork').trigger("reset"); //reset the forms
		$('.addIncident').trigger("reset"); //reset the forms
		$("#admin_menu").fadeIn(900);
		});
});
