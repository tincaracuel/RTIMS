<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Roadworks and Traffic Incidents Monitoring System in Calamba City</title>
    <link rel="shortcut icon" href="styles/img/calamba_seal.png" />
    <link href="/maps/documentation/javascript/examples/default.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>

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
        $(function(){   $( "#rw_start" ).datepicker();    });
        $(function(){   $( "#rw_end" ).datepicker();    });
    </script>

    <?php echo $map['js']; ?>
    
  </head>
  <body>
    <div id="header">
      <img src="<?php echo base_url() ?>styles/img/calamba_seal.png"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      Calamba City Roadworks and Traffic Incidents Monitoring System    
    </div>

    <div id="loginDiv">
        <a href='<?php echo base_url() ?>'> Log out </a>
    </div>



    <div id="map" style="width: 75%;" ><?php echo $map['html']; ?></div>

    <div id="adminFunctions">

    <a href='<?php echo base_url() ?>index.php/mapsManager/#' id="road"> Roadwork </a> <br />
    <a href='<?php echo base_url() ?>index.php/mapsManager/#' id="incident"> Incident </a> <br />

    <div id="addroadworkDiv">
      <form class="addroadwork">

        <p style="font-size: 20px;">ROADWORK</p> 
        Contract number: &nbsp;<input type="text" id="contract_number" autofocus required /><br /><br />

        Roadwork name: &nbsp;&nbsp;&nbsp;<input type="text" id="rwork_name" autofocus required  /><br /><br />

        Classification: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <select id="classification" autofocus required ><br /><br />
            <option value="construction">Construction</option>
            <option value="rehabilitation">Rehabilitation</option>
            <option value="renovation">Renovation</option>
            <option value="riprapping">Riprapping</option>
            <option value="application">Application</option>
            <option value="installation">Installation</option>
            <option value="reconstruction">Reconstruction</option>
            <option value="concreting">Concreting/Asphalting</option>
            <option value="electrification">Electrification</option>
            <option value="lighting">Roadway Lighting</option>
          </select><br /><br />

        Duration: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" id="rw_start" style="width: 80px; font-size: 14px;" autofocus required/> to
        <input type="text" id="rw_end" style="width: 80px; font-size: 14px;" /><br /><br />

        Description: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea> </textarea><br /><br />

        Street: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="text" id="street" /><br /><br />
        
        Barangay: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <select id="barangay" autofocus required ><br /><br />
            <option value="brgy1">Barangay 1</option>
            <option value="brgy2">Barangay 2</option>
            <option value="brgy3">Barangay 3</option>
            <option value="brgy4">Barangay 4</option>
            <option value="brgy5">Barangay 5</option>
            <option value="brgy6">Barangay 6</option>
            <option value="brgy7">Barangay 7</option>
            <option value="brgy8">Barangay 8</option>
            <option value="lawa">Lawa</option>
            <option value="">Parian</option>
          </select><br /><br />

        <a href="<?php echo base_url() ?>index.php/mapsManager" id="addMarkerBtn"><small>Add Marker</small></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        ( <input type="text" id="longitude" value="latitude" style="width: 80px; height: 20px; font-size: 14px;" disabled="true" /> , 
        <input type="text" id="latitude" value="longitude" style="width: 80px; height: 20px; font-size: 14px;" disabled="true" /> )
        <br /><br />

         Progress / Status: &nbsp;<input type="number" id="status" min="0" max="100"/><br /><br /><br />

        <input type="submit" value="Add Roadwork" id="addRoadworkBtn" />
      </form>
      </div>

      <div id="addincidentDiv">
      <form class="addincident">

        <p style="font-size: 20px;">TRAFFIC INCIDENT</p> 
        Classification: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <select id="classification" autofocus required ><br /><br />
            <option value="accident">Accident</option>
            <option value="obstruction">Obstruction</option>
            <option value="publicEvent">Public Event</option>
          </select><br /><br />

        Duration: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" id="rw_start" style="width: 80px; font-size: 14px;" autofocus required /> to
        <input type="text" id="rw_end" style="width: 80px; font-size: 14px;" /><br /><br />

        Description: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea> </textarea><br /><br />

        Street: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="text" id="street" /><br /><br />
        
        Barangay: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <select id="barangay" autofocus required ><br /><br />
            <option value="brgy1">Barangay 1</option>
            <option value="brgy2">Barangay 2</option>
            <option value="brgy3">Barangay 3</option>
            <option value="brgy4">Barangay 4</option>
            <option value="brgy5">Barangay 5</option>
            <option value="brgy6">Barangay 6</option>
            <option value="brgy7">Barangay 7</option>
            <option value="brgy8">Barangay 8</option>
            <option value="lawa">Lawa</option>
            <option value="">Parian</option>
          </select><br /><br />

        <a href="<?php echo base_url() ?>index.php/mapsManager" id="addMarkerBtn"><small>Add Marker</small></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        ( <input type="text" id="longitude" value="latitude" style="width: 80px; height: 20px; font-size: 14px;" disabled="true" /> , 
        <input type="text" id="latitude" value="longitude" style="width: 80px; height: 20px; font-size: 14px;" disabled="true" /> )
        <br /><br /><br />
         
        <input type="submit" value="Add Incident" id="addIncidentBtn" />
      </form>
    </div>
     


    
  </body>
</html>