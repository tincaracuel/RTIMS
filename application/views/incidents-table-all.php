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
    <link href="<?php echo base_url() ?>styles/css/bootstrap.css"  rel="stylesheet"></link>
    <link href="<?php echo base_url() ?>styles/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>styles/css/colorbox.css" rel="stylesheet">
    
  </head>
  <body>
    <div class="navbar navbar-default navbar-inverse navbar-static-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#" style="color: white">Calamba City Roadworks and Traffic Incidents Monitoring System</a>
        </div>

        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href='<?php echo base_url() ?>' ><span class="icon"> X </span> Log Out</a>
            </li>
          </ul>
        </div><!--/.nav-collapse -->


        <div class="navbar-collapse" id="functions">
          <ul class="nav navbar-nav">
            
            <li>
              <a href="<?php echo base_url() ?>index.php/incidentsTableManager/all_incidents" id="selected">
                <span class="icon"> F </span> All Activities</a>    
            </li>

            <li>
              <a href="<?php echo base_url() ?>index.php/incidentsTableManager/completed_incidents" >
                <span class="icon"> / </span> Completed</a>
            </li>

            <li>
                <a href="<?php echo base_url() ?>index.php/incidentsTableManager/ongoing_incidents" >
                <span class="icon"> J </span> Ongoing</a>
            </li>

            <li>
                <a href="<?php echo base_url() ?>index.php/incidentsTableManager/planned_incidents" >
                <span class="icon"> P </span> Not Yet Started</a>
            </li>

            <li>
                <a href='<?php echo base_url() ?>index.php/incidentsManager' id="menu_back_inc_btn" />
                <span class="icon"> h </span> Back to Incidents</a>
            </li>

            
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div id="queryMessage"></div>
    
    <div id="lowerbox">
        <div id="table_view" style="width: 100%;" >
            

        <?php

            if($query_all == NULL){ ?>
                    <center><?php echo '<br /><br /><br /><br /><br />There are no incidents saved in the database.<br /><br />'; ?>
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

                
                <?php foreach($query_all as $row){
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

    <script src="<?php echo base_url() ?>styles/js/jquery-1.8.3.js"></script>
    <script src="<?php echo base_url() ?>styles/js/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>styles/js/jquery-ui.js"></script>
    <script src="<?php echo base_url() ?>styles/js/subFunctions.js"></script>
    <script src="<?php echo base_url() ?>styles/js/mainFunctions.js"></script>
    <script src="<?php echo base_url() ?>styles/js/gmaps.js"></script>
    <script src="<?php echo base_url() ?>styles/js/jquery.autosize.js"></script>
    <script src="<?php echo base_url() ?>styles/js/jquery.colorbox.js"></script>
    <script src="<?php echo base_url() ?>styles/js/bootstrap.min.js"></script>

   <script>
        $(document).ready(function(){
            $("#editinc").colorbox({inline:true, width:"70%"});
            $("#deleteinc").colorbox({inline:true, width:"auto"});

        });

    </script>
</html>