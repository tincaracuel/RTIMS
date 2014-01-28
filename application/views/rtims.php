<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Roadworks and Traffic Incidents Monitoring System in Calamba City</title>
    <link rel="shortcut icon" href="styles/img/calamba_seal.png" />
    <link href="/maps/documentation/javascript/examples/default.css" rel="stylesheet">
    
    <link href="styles/css/jquery-ui.css"  rel="stylesheet"></link>
    <link href="styles/css/bootstrap.css" rel="stylesheet">
    <link href="styles/css/style.css" rel="stylesheet">
    <link href="styles/css/colorbox.css" rel="stylesheet">
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true"></script>

    
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
          <a class="navbar-brand" href="#" style="color: white">Calamba City RTIMS</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Roadworks <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <form style="margin-left: 10px" id="toggleRoadworks">
                      <li><input type="checkbox" id="rwCat0" checked > Construction </li>
                      <li><input type="checkbox" id="rwCat1" checked > Rehabilitation </li>
                      <li><input type="checkbox" id="rwCat2" checked > Renovation </li>
                      <li><input type="checkbox" id="rwCat3" checked > Riprapping </li>
                      <li><input type="checkbox" id="rwCat4" checked > Application </li>
                      <li><input type="checkbox" id="rwCat5" checked > Installation </li>
                      <li><input type="checkbox" id="rwCat6" checked > Reconstruction </li>
                      <li><input type="checkbox" id="rwCat7" checked > Concreting</li>
                      <li><input type="checkbox" id="rwCat8" checked > Electrification </li>
                      <li><input type="checkbox" id="rwCat9" checked > Roadway Lighting </li>
                  </form>
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Traffic Incidents <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <form style="margin-left: 10px">
                  <li><input type="checkbox" id="incCat0" checked > Accident </li>
                  <li><input type="checkbox" id="incCat1" checked > Obstruction </li>
                  <li><input type="checkbox" id="incCat2" checked > Public Event </li>
                  <li><input type="checkbox" id="incCat3" checked > Funeral</li>
                  <li><input type="checkbox" id="incCat4" checked > Flashflood </li>
                  <li><input type="checkbox" id="incCat5" checked > Strike </li>
                </form>
              </ul>
            </li>

            <li><a href="#choose_report" id="chooseReport">Submit Report</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Log in <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <form class="loginasadmin" action='index.php/logManager/checkUser' method="post"> 
                  <li><input type="text" name="username" placeholder="Username" autofocus required></li>
                  <li><input type="password" name="password" class="showpassword" placeholder="Password" required></li>
                  <li> <input type="submit" value="Log in" id="login"> </li>
                </form>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

      <div id="lowerbox">



          <div style="display:none">
            <div id='choose_report' class="colorbox_submit" style='background:#fff;'>
              <div name="choose_report">
                Submit a report about:<br />
                  <a id='existing_rw' href="#existingRoadworkReport" onclick='javascript:listEditRoadworks2();' class="selectReportBtns"> <li> &rarr; Existing Roadwork </li></a>
                  <a id='existing_inc' href="#existingIncidentReport" onclick='javascript:listEditIncidents();' class="selectReportBtns" > <li> &rarr; Existing Incident </li></a>
                  <a id='new-report' href="#newReport" onclick='javascript:plannedRoadworks();' class="selectReportBtns"> <li> &rarr; Other / New activity </li></a>
              </div>
            </div>
          </div>

          <div style="display:none">
            <div id='existingRoadworkReport' class="colorbox_submit" style="margin-top: -10px">
                <?php require("reportExRw.php") ?>
            </div>
          </div>

          <div style="display:none">
            <div id='existingIncidentReport' class="colorbox_submit" style="margin-top: -10px">
                <?php require("reportExInc.php") ?>
            </div>
          </div>

          <div style="display:none">
            <div id='newReport' class="colorbox_submit" style="margin-top: -10px">
                <?php require("reportNew.php") ?>
            </div>
          </div>

      

          
            
            
        


      <div id="map"><?php echo $map['html']; ?></div>
      </div>

    
  </body>

    <script src="styles/js/jquery-1.8.3.js"></script>
    <script src="styles/js/jquery.min.js"></script>
    <script src="styles/js/jquery-ui.js"></script>
    <script src="styles/js/subFunctions.js"></script>
    <script src="styles/js/mainFunctions.js"></script>
    <script src="styles/js/gmaps.js"></script>
    <script src="styles/js/jquery.autosize.js"></script>
    <script src="styles/js/jquery.colorbox.js"></script>
    <script src="styles/js/bootstrap.min.js"></script>
    <script src="styles/js/toggleMarkers.js"></script>

    <script type="text/javascript">
               
      
        $(document).ready(function(){       
            $("#chooseReport").colorbox({inline:true, width:"auto"});
            $("#existing_rw").colorbox({inline:true, width:"auto", height: "auto"});
            $("#existing_inc").colorbox({inline:true, width:"auto", height: "auto"});
            $("#new-report").colorbox({inline:true, width:"auto", height: "auto"});         

        });


    </script>
</html>

    
