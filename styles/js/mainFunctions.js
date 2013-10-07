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
  desc2        = $("#desc2").val();
  status2     = $("#status2").val();

  perform = true;
  valid = true;
  spaces = 0;
  var i = 0;
  retain1 = true;
  retain2 = true;

  $.ajax({
        url: "roadworksTableManager/editRoadwork",
        type: "POST",
        data: {cn2:cn2,rwork_name2:rwork_name2,type2:type2,start2:start2,end2:end2,desc2:desc2,status2:status2},

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