$(document).ready(function(){
//default
	$("#addroadworkDiv").hide();
	$("#addincidentDiv").hide();
	//$("#admin_roadwork").hide();
	//$("#admin_incident").hide();
	$("#admin_menu").show();


	$("body").css("display", "none");
    $("body").fadeIn(800); 
    // to fade out before redirect
    $('a').click(function(e){
        redirect = $(this).attr('href');
        e.preventDefault();
        $('body').fadeOut(800, function(){
            document.location.href = redirect
        });
    });


	$("#menu_back_rw_btn").click(function(){ //BACK TO MAIN MENU
		$("#admin_roadwork").hide();
		$("#admin_menu").fadeIn(900);
		$("#menu_rw").show();
		});


	$("#menu_add_rw_btn").click(function(){ // SHOW ROADWORK FORM FIELDS
		$("#menu_rw").hide();
		$("#admin_roadwork").hide();
		$("#addroadworkDiv").fadeIn(900);
		});

	$("#menu_back1_btn").click(function(){ //BACK TO ROADWORKS MENU
		$("#addroadworkDiv").hide();
		$('.addRoadwork').trigger("reset"); //reset the forms
		$('.addIncident').trigger("reset"); //reset the forms
		$("#admin_roadwork").fadeIn(900);
		});

	/*$("#menu_edit_rw").click(function(){ // 
		$("#menu_rw").hide();
		$("#admin_roadwork").hide();
		$("#addroadworkDiv").fadeIn(900);
		});

	$("#menu_delete_rw").click(function(){ // 
		$("#menu_rw").hide();
		$("#admin_roadwork").hide();
		$("#addroadworkDiv").fadeIn(900);
		});

	$("#menu_view_rw").click(function(){ // 
		$("#menu_rw").hide();
		$("#admin_roadwork").hide();
		$("#addroadworkDiv").fadeIn(900);
		});*/



	$("#menu_back_inc_btn").click(function(){ //BACK TO MAIN MENU
		$("#admin_incident").hide();
		$("#admin_menu").fadeIn(900);
		$("#menu_inc").show();
		});

	$("#menu_add_inc_btn").click(function(){ // SHOW INCIDENT FORM FIELDS
		$("#menu_inc").hide();
		$("#admin_incident").hide();
		$("#addincidentDiv").fadeIn(900);
		});

	$("#menu_back2_btn").click(function(){ //BACK TO INCIDENT MENU
		$("#addincidentDiv").hide();
		$('.addRoadwork').trigger("reset"); //reset the forms
		$('.addIncident').trigger("reset"); //reset the forms
		$("#admin_incident").fadeIn(900);
		});

	/*$("#menu_edit_inc").click(function(){ // 
		$("#menu_inc").hide();
		$("#admin_incident").hide();
		$("#addincidentDiv").fadeIn(900);
		});

	$("#menu_delete_inc").click(function(){ // 
		$("#menu_inc").hide();
		$("#admin_incident").hide();
		$("#addincidentDiv").fadeIn(900);
		});

	$("#menu_view_inc").click(function(){ // 
		$("#menu_inc").hide();
		$("#admin_incident").hide();
		$("#addincidentDiv").fadeIn(900);
		});*/

	

	

	

	
	
});
