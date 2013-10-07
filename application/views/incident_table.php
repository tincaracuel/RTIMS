<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Roadworks and Traffic Incidents Monitoring System in Calamba City</title>
    <link rel="shortcut icon" href="styles/img/calamba_seal.png" />
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

        $(function(){   $( "#inc_start" ).datepicker();    });
        $(function(){   $( "#inc_end" ).datepicker();    });
        $(function(){   $( "#start2" ).datepicker();    });
        $(function(){   $( "#end2" ).datepicker();    });
        $(document).ready(function(){
            $("#editinc").colorbox({inline:true, width:"50%"});
        });

    </script>


    
  </head>
  <body>
    <div id="loading-image"><img src="<?php echo base_url() ?>styles/img/floatingCircles.gif" alt="Loading..." /></div>

    <div id="header">
      <img src="<?php echo base_url() ?>styles/img/calamba_seal.png"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      Calamba City Roadworks and Traffic Incidents Monitoring System    
    </div>


     <div id="queryMessage"></div>

    <div id="lowerbox">
        <div id="table_view" style="width: 75%;" ><br /><br />
            <?php
                if($query == NULL){
                    ?> <center><?php echo 'There are no incidents saved in the database.'; ?></center> <?php
                }else{ ?>
                    
                    <div class="edit_delete">
                    <a id='editinc' href="#edit_incident" onclick='javascript:listEditIncidents();'>Edit Incident</a> <a id='deleteinc' href="#delete_roadwork">Delete Incident</a>
                    </div>

                    <table>
                    <th style="min-width: 100px;">Incident #</th>
                    <th style="min-width: 110px;">Classification</th>
                    <th style="min-width: 400px;">Description</th>
                    <th style="min-width: 75px;">Start</th>
                    <th style="min-width: 75px;">End</th>
                    <th style="min-width: 150px;">Street</th>
                    <th style="width: 190px;">Barangay</th>

                    
                    <?php foreach($query as $row){

                        ?><tr>
                        <td> <?php echo $row['0']->inc_id ?> </td>
                        <td> <?php echo $row['0']->inc_type ?> </td>
                        <td> <?php echo $row['0']->description ?> </td>
                        <td> <?php echo $row['0']->start_date ?> </td>
                        <td> <?php echo $row['0']->end_date ?> </td>
                        <td> <?php echo $row['0']->street ?> </td>
                        <td> <?php echo $row['0']->barangay ?> </td>
                        </tr>
                        <?php
                        
                    }

                    
                }
                ?></table> <?php 
            ?>


        </div>


        <div id="adminFunctions">

            <div id="admin_incident">
                <a href='<?php echo base_url() ?>index.php/incidentsManager'><img src='<?php echo base_url() ?>styles/img/bg/menu_back.png' id="menu_back_inc_btn" /></a><br /><br /><br />
               
            </div>
            

        </div>


        <div style="display:none">
            <div id='edit_incident' style='background:#fff;'>
                <form class="editIncident"  method='post'>
                    <div name="left">
                        <div id="listOfIncidents">
                        </div>
                    <br /> 
                    <input type="button" name="selectIncident" class="edit_delete_input_btn" id="editIncBtn1" value="SELECT" onclick='javascript:viewIncidentDetails();'>
                    </div>
                    
                    <div name="right">
                        <div id="incidentDetails">
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

   
     


    
  </body>
</html>