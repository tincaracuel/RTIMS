<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Roadworks and Traffic Incidents Monitoring System in Calamba City</title>
    <link rel="shortcut icon" href="<?php echo base_url() ?>styles/img/calamba_seal.png" />
    <link href="/maps/documentation/javascript/examples/default.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>styles/css/jquery-ui.css"  rel="stylesheet"></link>
    <link href="<?php echo base_url() ?>styles/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>styles/css/colorbox.css" rel="stylesheet">
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true"></script>

    <script src="<?php echo base_url() ?>styles/js/jquery-1.8.3.js"></script>
    <script src="<?php echo base_url() ?>styles/js/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>styles/js/jquery-ui.js"></script>
    <script src="<?php echo base_url() ?>styles/js/subFunctions.js"></script>
    <script src="<?php echo base_url() ?>styles/js/mainFunctions.js"></script>
    <script src="<?php echo base_url() ?>styles/js/gmaps.js"></script>
    <script src="<?php echo base_url() ?>styles/js/jquery.autosize.js"></script>
    <script src="<?php echo base_url() ?>styles/js/jquery.colorbox.js"></script>


    <script>
        $(document).ready(function(){
            $("#editinc").colorbox({inline:true, width:"70%"});
            $("#deleteinc").colorbox({inline:true, width:"auto"});
        });

    </script>


    <?php echo $map['js']; ?>
    
  </head>
  <body>
    <div id="loading-image"><img src="<?php echo base_url() ?>styles/img/floatingCircles.gif" alt="Loading..." /></div>

    <div id="header">
      <img src="<?php echo base_url() ?>styles/img/calamba_seal.png"/>&nbsp;&nbsp;&nbsp;
      Calamba City Roadworks and Traffic Incidents Monitoring System    

      <div id="loginDiv">
      <span><a href='<?php echo base_url() ?>' ><span class="icon"> X </span>Log Out</a></span>
      </div> 
    </div>


     <div id="queryMessage"></div>

    <div id="lowerbox">

        <div id="functions">
            Incidents Manager:
            <a href="#add_incident" id="menu_add_inc_btn"><span class="icon"> + </span>Add Incident</a> 
            <a id='editinc' href="#edit_incident" onclick='javascript:listEditIncidents();' ><span class="icon"> : </span>Edit Incidents</a>
            <a id='deleteinc' href="#delete_incident" onclick='javascript:listDeleteIncidents();' ><span class="icon"> - </span>Delete Incidents</a>
            <a href='<?php echo base_url() ?>index.php/incidentsTableManager/all_incidents' id="menu_view_inc_btn" /><span class="icon"> p </span>View Incidents Table</a>
            <a href='<?php echo base_url() ?>index.php/mapsManager' id="menu_back_inc_btn" /><span class="icon"> h </span>Back to Main Menu</a>
        </div>


        <div id="map" ><?php echo $map['html']; ?></div>
       

        <div id="adminFunctions">

            <div id="addincidentDiv">
                <?php require("addIncident.php"); ?>
            </div>
            
        </div>

        <div style="display:none">
            <div id='edit_incident' class="colorbox_edit_delete" style='background:#fff;'>
                <form class="editIncident"  method='post'>
                    <div name="left">
                        <div id="listOfIncidents">
                        </div>
                    <br /> 
                    <input type="button" name="selectIncident" class="lightboxSubmitBtn" id="editIncBtn1" value="SELECT" onclick='javascript:viewIncidentDetails();'>
                    </div>
                    
                    <div name="right">
                        <div id="incidentDetails">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div style="display:none">
            <div id='delete_incident' class="colorbox_edit_delete" style='background:#fff;'>
                <form class="deleteIncident"  method='post'>
                    <div name="delete_incident">
                        <div id="listOfIncidents2">
                        </div>
                    <br /> 
                    <input type="button" name="selectIncident" class="lightboxSubmitBtn" id="deleteIncBtn1" value="DELETE" onclick='javascript:deleteSelectedIncident();'>
                    </div>
                </form>
            </div>
        </div>

        
    </div>

   
     


    
  </body>
</html>