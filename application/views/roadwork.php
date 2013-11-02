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
            $("#editrw").colorbox({inline:true, width:"70%"});
            $("#deleterw").colorbox({inline:true, width:"auto"});
        });

        $(function(){   $( "#rwork_start" ).datepicker();    });
        $(function(){   $( "#rwork_end" ).datepicker();    });

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
            Roadworks Manager:
            <a href="#add_roadwork" id="menu_add_rw_btn"><span class="icon"> + </span>Add Roadwork</a> 
            <a id='editrw' href="#edit_roadwork" onclick='javascript:listEditRoadworks();' ><span class="icon"> : </span>Edit Roadworks</a> 
            <a id='deleterw' href="#delete_roadwork" onclick='javascript:listDeleteRoadworks();' ><span class="icon"> - </span>Delete Roadworks</a> 
            <a href='<?php echo base_url() ?>index.php/roadworksTableManager/all_roadworks' id="menu_view_rw_btn" /><span class="icon"> p </span>View Roadworks Table</a>
            <a href='<?php echo base_url() ?>index.php/mapsManager' id="menu_back_rw_btn" /><span class="icon"> h </span>Back to Main Menu</a>
        </div>

        <div id="map" ><?php echo $map['html']; ?></div>
        

        <div id="adminFunctions">

            <div id="addroadworkDiv">
              <?php require("addRoadwork.php"); ?>
            </div>
        </div>

        <div style="display:none">
            <div id='edit_roadwork' class="colorbox_edit_delete" style='background:#fff;'>
                <form class="editRoadwork"  method='post'>
                    <div name="left">
                        <div id="listOfRoadworks">
                        </div>
                    <br /> 
                    <input type="button" name="selectRoadwork" class="lightboxSubmitBtn" id="editRwBtn1" value="SELECT" onclick='javascript:viewRoadworkDetails();'>
                    </div>
                    
                    <div name="right">
                        <div id="roadworkDetails">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div style="display:none">
            <div id='delete_roadwork' class="colorbox_edit_delete" style='background:#fff;'>
                <form class="deleteRoadwork"  method='post'>
                    <div name="delete_roadwork">
                        <div id="listOfRoadworks2">
                        </div>
                    <br /> 
                    <input type="button" name="selectRoadwork" class="lightboxSubmitBtn" id="deleteRwBtn1" value="DELETE" onclick='javascript:deleteSelectedRoadwork();'>
                    </div>
                </form>
            </div>
        </div>
    </div>


   
     


    
  </body>
</html>