function checkRWcontractNumberDuplicate(contract_number){
  if(contract_number != ''){
      $.ajax({
        url: "roadworksManager/duplicateRWcontractNumberCheck",
        type: "POST",
        data: {contract_number:contract_number},

        success: function(data) {
          if(data == 0){
            $("#queryMessage").empty();
            $('#addRoadworkBtn').attr('disabled',false);
          }
          else{
             $('#queryMessage').html("Roadwork with the same contract number already exists.");
            $('#addRoadworkBtn').attr('disabled',true);
          }
        }
      });
    }
    else{
          $("#queryMessage").empty();
          $('#addRoadworkBtn').attr('disabled',false);
    }
}
/*--------------------------------------------------------------------------------------*/
function listEditRoadworks(){

    $("#listOfRoadworks").empty();
    $("#roadworkDetails").empty();


    $.ajax({
      url: "roadworksTableManager/obtainRoadworks",
      type: "POST",
      data: {},

      success: function(data) {
      $("#listOfRoadworks").html(data);
      }
    });
}

/*----------------------------------------------------------------------*/
function viewRoadworkDetails(){

    contractNumber = $("#contractNumber").val();
    $.ajax({
      url: "roadworksTableManager/obtainRoadworkDetails",
      type: "POST",
      data: {contractNumber:contractNumber},

      success: function(data) {
      $("#roadworkDetails").html(data);
      }
    });
}

/*----------------------------------------------------------------------*/
function editSelectedRoadwork(){

  $("#queryMessage").empty();
  cn2         = $("#cn2").val();
  rwork_name2 = $("#rwork_name2").val();
  type2       = $("#type2").val();
  start2      = $("#start2").val();
  end2        = $("#end2").val();
  desc2       = $("#desc2").val();
  status2     = $("#status2").val();
  street2     = $("#street2").val();
  brgy2       = $("#brgy2").val();
  long2       = $("#long2").val();
  lat2        = $("#lat2").val();

  perform = true;
  valid = true;
  spaces = 0;
  var i = 0;
  retain1 = true;
  retain2 = true;

  $.ajax({
        url: "roadworksTableManager/editRoadwork",
        type: "POST",
        data: {cn2:cn2,rwork_name2:rwork_name2,type2:type2,start2:start2,end2:end2,desc2:desc2,status2:status2,street2:street2,brgy2:brgy2,lat2:lat2,long2:long2},

        success: function(data) {
        $("#queryMessage").html("Successfully edited.");
        $("#roadworkDetails").empty();
        var newLocation = "/RTIMS/index.php/roadworksTableManager";
        window.location = newLocation;
        }
      });
}

/*----------------------------------------------------------------------*/
function listEditIncidents(){

    $("#listOfIncidents").empty();
    $("#incidentDetails").empty();


    $.ajax({
      url: "incidentsTableManager/obtainIncidents",
      type: "POST",
      data: {},

      success: function(data) {
      $("#listOfIncidents").html(data);
      }
    });
}

/*----------------------------------------------------------------------*/
function viewIncidentDetails(){

    incidentNumber = $("#incidentNumber").val();
    $.ajax({
      url: "incidentsTableManager/obtainIncidentDetails",
      type: "POST",
      data: {incidentNumber:incidentNumber},

      success: function(data) {
      $("#incidentDetails").html(data);
      }
    });
}
/*----------------------------------------------------------------------*/
function editSelectedIncident(){

  $("#queryMessage").empty();
  in2           = $("#in2").val();
  type2         = $("#type2").val();
  start2        = $("#start2").val();
  end2          = $("#end2").val();
  desc2         = $("#desc2").val();
  street2     = $("#street2").val();
  brgy2       = $("#brgy2").val();
  long2       = $("#long2").val();
  lat2        = $("#lat2").val();

  perform = true;
  valid = true;
  spaces = 0;
  var i = 0;
  retain1 = true;
  retain2 = true;

  $.ajax({
        url: "incidentsTableManager/editIncident",
        type: "POST",
        data: {in2:in2,type2:type2,start2:start2,end2:end2,desc2:desc2,street2:street2,brgy2:brgy2,lat2:lat2,long2:long2},

        success: function(data) {
        $("#queryMessage").html("Successfully edited.");
        $("#incidentDetails").empty();
        var newLocation = "/RTIMS/index.php/incidentsTableManager";
        window.location = newLocation;
        }
      });
}

/*--------------------------------------------------------------------------------------*/
function listDeleteRoadworks(){

    $.ajax({
      url: "roadworksTableManager/obtainRoadworks",
      type: "POST",
      data: {},

      success: function(data) {
      $("#listOfRoadworks2").html(data);
      }
    });
}

/*--------------------------------------------------------------------------------------*/
function deleteSelectedRoadwork(){

  contractNumber = $("#contractNumber").val();
  $val = confirm('Are you sure you want to delete roadwork #'+contractNumber+'?');

  if($val){//delete roadwork
    $.ajax({
      url: "roadworksTableManager/deleteRoadwork",
      type: "POST",
      data: {contractNumber:contractNumber},

      success: function(data) {
        $("#queryMessage").html("Successfully deleted.");
        var newLocation = "/RTIMS/index.php/roadworksTableManager";
        window.location = newLocation;
        }
      });

    listDeleteRoadworks();
  }
}

/*--------------------------------------------------------------------------------------*/
function listDeleteIncidents(){

    $.ajax({
      url: "incidentsTableManager/obtainIncidents",
      type: "POST",
      data: {},

      success: function(data) {
      $("#listOfIncidents2").html(data);
      }
    });
}

/*--------------------------------------------------------------------------------------*/

function deleteSelectedIncident(){

  incidentNumber = $("#incidentNumber").val();
  $val = confirm('Are you sure you want to delete incident #'+incidentNumber+'?');

  if($val){//delete roadwork
    $.ajax({
      url: "incidentsTableManager/deleteIncident",
      type: "POST",
      data: {incidentNumber:incidentNumber},

      success: function(data) {
        $("#queryMessage").html("Successfully deleted.");
        var newLocation = "/RTIMS/index.php/incidentsTableManager";
        window.location = newLocation;
        }
      });

    listDeleteIncidents();
  }

/*--------------------------------------------------------------------------------------*/

  function listSelectedReportCategory(){

  }
}