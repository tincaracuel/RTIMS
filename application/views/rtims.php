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
    <link href="styles/css/style.css" rel="stylesheet">
    <link href="styles/css/colorbox.css" rel="stylesheet">
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true"></script>

    <script src="styles/js/jquery-1.8.3.js"></script>
    <script src="styles/js/jquery.min.js"></script>
    <script src="styles/js/jquery-ui.js"></script>
    <script src="styles/js/subFunctions.js"></script>
    <script src="styles/js/mainFunctions.js"></script>
    <script src="styles/js/gmaps.js"></script>
    <script src="styles/js/jquery.autosize.js"></script>
    <script src="styles/js/jquery.colorbox.js"></script>
    <?php echo $map['js']; ?>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#chooseReport").colorbox({inline:true, width:"auto"});
            $("#existing_rw").colorbox({inline:true, width:"auto", height: "auto"});
            $("#existing_inc").colorbox({inline:true, width:"auto", height: "auto"});
            $("#new-report").colorbox({inline:true, width:"auto", height: "auto"});
            
        });
    </script>

    
  </head>
  <body>
    <div id="header">
      <img src="styles/img/calamba_seal.png"/>&nbsp;&nbsp;&nbsp;
      Calamba City Roadworks and Traffic Incidents Monitoring System

      <div id="loginDiv">
        <form class="loginasadmin" action='index.php/logManager/checkUser' method="post">
            Username:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Password:<br />
            <input type="text" name="username" autofocus required>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="password" name="password" class="showpassword" required>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Log in" id="login">
        </form>
      </div>
    

        </div>

   
      <div id="lowerbox">

          <div id="panel">
            <li>
                <a href="#">Roadworks</a>
                <div class="sub-nav" >
                    <ul><form>
                      <li><input type="checkbox" id="rwCat0"> Construction </li>
                      <li><input type="checkbox" id="rwCat1"> Rehabilitation </li>
                      <li><input type="checkbox" id="rwCat2"> Renovation </li>
                      <li><input type="checkbox" id="rwCat3"> Riprapping </li>
                      <li><input type="checkbox" id="rwCat4"> Application </li>
                      <li><input type="checkbox" id="rwCat5"> Installation </li>
                      <li><input type="checkbox" id="rwCat6"> Reconstruction </li>
                      <li><input type="checkbox" id="rwCat7"> Concreting</li>
                      <li><input type="checkbox" id="rwCat8"> Electrification </li>
                      <li><input type="checkbox" id="rwCat9"> Roadway Lighting </li>
                    </ul></form>
                </div>
            </li>
            <li>
                <a href="#">Traffic Incidents</a>
                <div class="sub-nav" >
                    <ul><form>
                      <li><input type="checkbox" id="incCat0"> Accident </li>
                      <li><input type="checkbox" id="incCat1"> Obstruction </li>
                      <li><input type="checkbox" id="incCat2"> Public Event </li>
                      <li><input type="checkbox" id="incCat3"> Funeral</li>
                      <li><input type="checkbox" id="incCat4"> Flashflood </li>
                      <li><input type="checkbox" id="incCat5"> Strike </li>
                    </ul></form>
                </div>
            </li>
            <a href="#choose_report" id="chooseReport">Submit Report</a>
           
          </div>

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
</html>