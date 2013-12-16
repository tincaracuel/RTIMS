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


    
  </head>
  <body>
    <div id="loading-image"><img src="<?php echo base_url() ?>styles/img/floatingCircles.gif" alt="Loading..." /></div>

    <div id="header">

      <img src="<?php echo base_url() ?>styles/img/calamba_seal.png"/>&nbsp;&nbsp;&nbsp;
      Calamba City Roadworks and Traffic Incidents Monitoring System

      <div id="logout">
      <span><a href='<?php echo base_url() ?>' ><span class="icon"> X </span>&nbsp;Log Out</a></span>
      </div>    
    </div>


     <div id="queryMessage"></div>

        <div id="functions">
            Incidents Table Manager: 
            <a href="<?php echo base_url() ?>index.php/incidentsTableManager/all_incidents" >
                <span class="icon"> F </span> All Activities</a>
            <a href="<?php echo base_url() ?>index.php/incidentsTableManager/completed_incidents" >
                <span class="icon"> / </span> Completed</a>
            <a href="<?php echo base_url() ?>index.php/incidentsTableManager/ongoing_incidents" id="selected">
                <span class="icon"> J </span> Ongoing</a>
            <a href="<?php echo base_url() ?>index.php/incidentsTableManager/planned_incidents" >
                <span class="icon"> P </span> Not Yet Started</a>
            <a href='<?php echo base_url() ?>index.php/incidentsManager' id="menu_back_inc_btn" />
                <span class="icon"> h </span>Back to Incidents</a>
        </div>


    <div id="lowerbox">
    
        <div id="table_view" style="width: 100%;" >

        <?php

            if($query_ongoing == NULL){ ?>
                    <center><?php echo '<br /><br /><br /><br /><br />There are no ongoing activities saved in the database.<br /><br />'; ?>
                    </center>
                    <?php
            }else{ ?>

                <table>
                <th style="width: 100px;">Incident #</th>
                <th style="width: 90px;">Classification</th>
                <th style="width: 400px;">Description</th>
                <th style="width:     80px;">Start</th>
                <th style="width:     80px;">End</th>
                <th style="width: 120px;">Street</th>
                <th style="width: 150px;">Barangay</th>

                
                <?php foreach($query_ongoing as $row){
                    ?><tr>
                    <td> <?php echo $row->inc_id ?> </td>
                    <td> <?php echo $row->inc_type ?> </td>
                    <td> <?php echo $row->description ?> </td>
                    <td> <?php echo $row->start_date ?> </td>
                    <td> <?php if($row->end_date!='0000-00-00') echo $row->end_date ?> </td>
                    <td> <?php echo $row->street ?> </td>
                    <td> <?php echo $row->barangay ?> </td>
                    </tr>
                    <?php 
                }
            }
            ?></table> <p style="text-align: center;"><?php echo $links; ?></p><?php 
        ?>

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