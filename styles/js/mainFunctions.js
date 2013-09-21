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