$(window).load(function() {
		$("#loading-image").fadeOut(300, function() {
		});
	});

$(document).ready(function(){
//default
	
	$("#menu_back_rw_btn2").hide();
	$("#menu_back_inc_btn2").hide();
	$("#admin_menu").show();
	$("#allRoadworks").show();
	$("#allIncidents").show();

	$("body").css("display", "none");
    $("body").fadeIn(1000); 
    // to fade out before redirect
    $('a').click(function(e){
        redirect = $(this).attr('href');
        e.preventDefault();
        $('body').show(1000, function(){
            document.location.href = redirect
        });
    });

    
	$("#menu_add_rw_btn").click(function(){ // SHOW ROADWORK FORM FIELDS
		$("#menu_rw").hide();
		$("#admin_roadwork").hide();
		$("#map").css("width", "70%");
		$("#adminFunctions").css("display", "true");
		$("#addroadworkDiv").fadeIn(900);
		});
	

	$("#menu_reset_btn").click(function(){
		$('.addRoadwork').trigger("reset"); //reset the forms
		$('.addIncident').trigger("reset");
		});

	/* DISPLAY ROADWORK TABLES */
	$("#rw_all").click(function(){ //
		$("#completedRoadworks").hide();
		$("#plannedRoadworks").hide();
		$("#ongoingRoadworks").hide();
		$("#allRoadworks").fadeIn();
	});

	$("#rw_ongoing").click(function(){ //
		$("#completedRoadworks").hide();
		$("#plannedRoadworks").hide();
		$("#allRoadworks").hide();
		$("#ongoingRoadworks").fadeIn();
	});

	$("#rw_completed").click(function(){ //
		$("#ongoingRoadworks").hide();
		$("#plannedRoadworks").hide();
		$("#allRoadworks").hide();
		$("#completedRoadworks").fadeIn();
	});

	$("#rw_planned").click(function(){ //
		$("#ongoingRoadworks").hide();
		$("#completedRoadworks").hide();
		$("#allRoadworks").hide();
		$("#plannedRoadworks").fadeIn();
	});


	$("#inc_all").click(function(){ //
		$("#completedIncidents").hide();
		$("#plannedIncidents").hide();
		$("#ongoingIncidents").hide();
		$("#allIncidents").fadeIn();
	});

	$("#inc_ongoing").click(function(){ //
		$("#completedIncidents").hide();
		$("#plannedIncidents").hide();
		$("#allIncidents").hide();
		$("#ongoingIncidents").fadeIn();
	});

	$("#inc_completed").click(function(){ //
		$("#ongoingIncidents").hide();
		$("#plannedIncidents").hide();
		$("#allIncidents").hide();
		$("#completedIncidents").fadeIn();
	});

	$("#inc_planned").click(function(){ //
		$("#ongoingIncidents").hide();
		$("#completedIncidents").hide();
		$("#allIncidents").hide();
		$("#plannedIncidents").fadeIn();
	});


	/* RESETS THE FORMS */
	$("#existing_rw").click(function(){
		$('#reportForm').trigger("reset");
		$('#rwReportForm').trigger("reset");
		$('#incReportForm').trigger("reset");
	});

	$("#existing_inc").click(function(){
		$('#reportForm').trigger("reset");
		$('#rwReportForm').trigger("reset");
		$('#incReportForm').trigger("reset");
	});

	$("#new-report").click(function(){
		$('#reportForm').trigger("reset");
		$('#rwReportForm').trigger("reset");
		$('#incReportForm').trigger("reset");
	});




	$("#menu_add_inc_btn").click(function(){ // SHOW INCIDENT FORM FIELDS
		$("#menu_inc").hide();
		$("#admin_incident").hide();
		$("#map").css("width", "70%");
		$("#adminFunctions").css("display", "true");
		$("#addincidentDiv").fadeIn(900);
		});


	$("#menu_back2_btn").click(function(){ //BACK TO INCIDENT MENU
		$("#addincidentDiv").hide();
		$('.addRoadwork').trigger("reset"); //reset the forms
		$('.addIncident').trigger("reset"); //reset the forms
		$("#admin_incident").fadeIn(900);
		});


  	/*$("#logout").hover(function(){
  		$("#logout").animate({'right':'-15px'});
  	});*/

	
	
});

