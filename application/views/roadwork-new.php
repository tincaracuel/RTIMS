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
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>


    <?php echo $map['js']; ?>
    
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
          <a class="navbar-brand" href="#" style="color: white"><img src="<?php echo base_url() ?>styles/img/calamba_seal.png" style="margin-top: -6px; margin-right: 5px; height: 22px" />Calamba City Roadworks and Traffic Incidents Monitoring System</a>
        </div>

        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="icon"> U </span><?php echo $username?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                  <li>
                    <a href='<?php echo base_url() ?>index.php/logManager/editAccount' ><span class="icon"> S </span> My Account </a>
                  </li>
                  <li>
                    <a href='<?php echo base_url() ?>index.php/logManager/logout' ><span class="icon"> X </span> Log Out </a>
                  </li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->


        <div class="navbar-collapse collapse" id="functions">
          <ul class="nav navbar-nav">
          
            <li>
              <a href='#' id="selected"><span class="icon"> + </span>Add Roadwork</a>       
            </li>

            <!-- <li>
              <a id='editrw' href="#edit_roadwork" onclick='javascript:listEditRoadworks();' ><span class="icon"> : </span>Edit Roadworks</a> 
            </li>

            <li>
                <a id='deleterw' href="#delete_roadwork" onclick='javascript:listDeleteRoadworks();' ><span class="icon"> - </span>Delete Roadworks</a> 
            </li>

            <li>
                <a href='<?php echo base_url() ?>index.php/roadworksTableManager/all_roadworks' id="menu_view_rw_btn" /><span class="icon"> p </span>View Roadworks Table</a>
            </li> -->

            <li>
                <a href='<?php echo base_url() ?>index.php/roadworksManager' id="menu_back_rw_btn" /><span class="icon"> h </span>Back</a>
            </li>

            
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
<div id="queryMessage"></div>   
    <div id="lowerbox">
        <div id="map" style="width:70%"><?php echo $map['html']; ?></div>
        <div id="adminFunctions">

            <div id="addroadworkDiv">
              <?php require("roadwork-add.php"); ?>
            </div>
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
    <script src="<?php echo base_url() ?>styles/js/bootstrap.min.js"></script>

    <script>
        $(function(){   $( "#rwork_start" ).datepicker();    });
        $(function(){   $( "#rwork_end" ).datepicker();    });
        $(function(){   $('textarea').autosize();            }); 
    </script>

</html>