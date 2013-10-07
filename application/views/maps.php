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
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>

    <script src="<?php echo base_url() ?>styles/js/jquery-1.8.3.js"></script>
    <script src="<?php echo base_url() ?>styles/js/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>styles/js/jquery-ui.js"></script>
    <script src="<?php echo base_url() ?>styles/js/subFunctions.js"></script>
    <script src="<?php echo base_url() ?>styles/js/mainFunctions.js"></script>
    <script src="<?php echo base_url() ?>styles/js/gmaps.js"></script>



    <script>
        $(function(){   $( "#rwork_start" ).datepicker();    });
        $(function(){   $( "#rwork_end" ).datepicker();    });
        $(function(){   $( "#inc_start" ).datepicker();    });
        $(function(){   $( "#inc_end" ).datepicker();    });
    </script>

    <?php echo $map['js']; ?>
    
  </head>
  <body>
    <div id="loading-image"><img src="<?php echo base_url() ?>styles/img/floatingCircles.gif" alt="Loading..." /></div>

    <div id="header">
      <img src="<?php echo base_url() ?>styles/img/calamba_seal.png"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      Calamba City Roadworks and Traffic Incidents Monitoring System    
    </div>


    <div id="lowerbox">
        <div id="map" style="width: 75%;" ><?php echo $map['html']; ?></div>

        <div id="adminFunctions">

            <div id="admin_menu">
                <ul id="buttons">
                    <!--<li><a class="bopha" href="http://nigs.org">Bopha Updates</a></li>-->
                    <li style="display: list-item;"><a href='<?php echo base_url() ?>index.php/roadworksManager' class="menu_buttons" id="menu_rw_btn">Roadworks</a></li><br />
                    <li style="display: list-item;"><a href='<?php echo base_url() ?>index.php/incidentsManager' class="menu_buttons" id="menu_inc_btn">Traffic Incidents</a></li><br />
                    <li style="display: list-item;"><a href='<?php echo base_url() ?>index.php/mapsManager#' class="menu_buttons" id="menu_report_btn">Reports</a></li><br />
                    <li style="display: list-item;"><a href='<?php echo base_url() ?>' class="menu_buttons">Log Out</a></li>
                </ul>
            </div>


            <!--<div id="admin_roadwork">
                <img src='<?php echo base_url() ?>styles/img/bg/roadwork_add.png' href='<?php echo base_url() ?>index.php/mapsManager#' id="menu_add_rw_btn" /> <br /> <br /> <br />
                <img src='<?php echo base_url() ?>styles/img/bg/roadwork_edit.png' href='<?php echo base_url() ?>index.php/mapsManager#' id="menu_edit_rw_btn" /> <br /> <br /> <br />
                <img src='<?php echo base_url() ?>styles/img/bg/roadwork_delete.png' href='<?php echo base_url() ?>index.php/mapsManager#' id="menu_delete_rw_btn" /> <br /> <br /> <br />
                <img src='<?php echo base_url() ?>styles/img/bg/roadwork_view.png' href='<?php echo base_url() ?>index.php/mapsManager#' id="menu_view_rw_btn" /> <br /> <br />
                <a  href='<?php echo base_url() ?>index.php/mapsManager#' id="menu_back_rw_btn" /> BACK &rarr; </a><br />
            </div>


            <div id="admin_incident">
                <img src='<?php echo base_url() ?>styles/img/bg/incident_add.png' href='<?php echo base_url() ?>index.php/mapsManager#' id="menu_add_inc_btn" /> <br /> <br /> <br />
                <img src='<?php echo base_url() ?>styles/img/bg/incident_edit.png' href='<?php echo base_url() ?>index.php/mapsManager#' id="menu_edit_inc_btn" /> <br /> <br /> <br />
                <img src='<?php echo base_url() ?>styles/img/bg/incident_delete.png' href='<?php echo base_url() ?>index.php/mapsManager#' id="menu_delete_inc_btn" /> <br /> <br /> <br />
                <img src='<?php echo base_url() ?>styles/img/bg/incident_view.png' href='<?php echo base_url() ?>index.php/mapsManager#' id="menu_view_inc_btn" /> <br /> <br />
                <a  href='<?php echo base_url() ?>index.php/mapsManager#' id="menu_back_inc_btn" /> BACK &rarr; </a><br />
            </div>-->


            


            <!-- ---------- VIEW REPORTS ---------- -->

        </div>
    </div>
     


    
  </body>
</html>