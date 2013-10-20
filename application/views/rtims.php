<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Roadworks and Traffic Incidents Monitoring System in Calamba City</title>
    <link rel="shortcut icon" href="styles/img/calamba_seal.png" />
    <link href="/maps/documentation/javascript/examples/default.css" rel="stylesheet">
    
    <link href="styles/css/style.css" rel="stylesheet">
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script src="styles/js/jquery.min.js"></script>
    
    <script src="styles/js/subFunctions.js"></script>
    <script src="styles/js/mainFunctions.js"></script>
    <script src="styles/js/gmaps.js"></script>
    <?php echo $map['js']; ?>


    
  </head>
  <body>
    <div id="header">
      <img src="styles/img/calamba_seal.png"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
                    <ul>
                      <li><input type="checkbox" id="rw_cat_0"> Construction </li>
                      <li><input type="checkbox" id="rw_cat_1"> Rehabilitation </li>
                      <li><input type="checkbox" id="rw_cat_2"> Renovation </li>
                      <li><input type="checkbox" id="rw_cat_3"> Riprapping </li>
                      <li><input type="checkbox" id="rw_cat_4"> Application </li>
                      <li><input type="checkbox" id="rw_cat_5"> Installation </li>
                      <li><input type="checkbox" id="rw_cat_6"> Reconstruction </li>
                      <li><input type="checkbox" id="rw_cat_7"> Concreting</li>
                      <li><input type="checkbox" id="rw_cat_8"> Electrification </li>
                      <li><input type="checkbox" id="rw_cat_9"> Roadway Lighting </li>
                    </ul>
                </div>
            </li>
            <li>
                <a href="#">Traffic Incidents</a>
                <div class="sub-nav" >
                    <ul>
                      <li><input type="checkbox" id="inc_cat_0"> Accident </li>
                      <li><input type="checkbox" id="inc_cat_1"> Obstruction </li>
                      <li><input type="checkbox" id="inc_cat_2"> Public Event </li>
                      <li><input type="checkbox" id="inc_cat_3"> Funeral</li>
                      <li><input type="checkbox" id="inc_cat_4"> Flashflood </li>
                      <li><input type="checkbox" id="inc_cat_5"> Strike </li>
                    </ul>
                </div>
            </li>
            <a href="#">Submit Report</a>
           
          </div>

          
            
            
        


        <div id="map"><?php echo $map['html']; ?></div>
      </div>

    
  </body>
</html>