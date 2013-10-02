$(window).load(function() {
		$("#loading-image").fadeOut(300, function() {
		});
	});

$(document).ready(function(){
//default
	
	$("#addroadworkDiv").hide();
	$("#addincidentDiv").hide();
	$("#menu_back_rw_btn2").hide();
	$("#menu_back_inc_btn2").hide();
	$("#table_view").css("display", "none");
	$("#admin_menu").show();

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
		});*/

	$("#menu_view_rw_btn").click(function(){ // 
		$("#menu_rw").hide(1000);
		$("#menu_add_rw_btn").hide(300);
		$("#menu_edit_rw_btn").hide(300);
		$("#menu_delete_rw_btn").hide(300);
		$("#menu_back_rw_btn").hide();
		$("#menu_back_rw_btn2").fadeIn(1000);
		//SHOW TABLE IN RIGHT
		//HIDE MAP
		$("#table_view").show();
		$("#map").css("display", "none");


		});

	$("#menu_view_inc_btn").click(function(){ // 
		$("#menu_inc").hide(1000);
		$("#menu_add_inc_btn").hide(300);
		$("#menu_edit_inc_btn").hide(300);
		$("#menu_delete_inc_btn").hide(300);
		$("#menu_back_inc_btn").hide();
		$("#menu_back_inc_btn2").fadeIn(1000);
		//SHOW TABLE IN RIGHT
		//HIDE MAP
		$("#table_view").show();
		$("#map").css("display", "none");

		});

	$("#menu_back_rw_btn2").click(function(){ //
		$("#menu_rw").show(1000);
		$("#menu_add_rw_btn").show(300);
		$("#menu_edit_rw_btn").show(300);
		$("#menu_delete_rw_btn").show(300);
		$("#menu_back_rw_btn2").hide();
		$("#menu_back_rw_btn").show();
		//HIDE TABLE IN RIGHT
		//SHOW MAP
		$("#table_view").css("display", "none");
		$("#map").css("display", "inline");
		});

	$("#menu_back_inc_btn2").click(function(){ //
		$("#menu_inc").show(1000);
		$("#menu_add_inc_btn").show(300);
		$("#menu_edit_inc_btn").show(300);
		$("#menu_delete_inc_btn").show(300);
		$("#menu_back_inc_btn2").hide();
		$("#menu_back_inc_btn").show();
		//HIDE TABLE IN RIGHT
		//SHOW MAP
		$("#table_view").css("display", "none");
		$("#map").css("display", "inline");
		});


	/*$("#menu_back_inc_btn").click(function(){ //BACK TO MAIN MENU
		$("#admin_incident").hide();
		$("#admin_menu").fadeIn(900);
		$("#menu_inc").show();
		});*/

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

