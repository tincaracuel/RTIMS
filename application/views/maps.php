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

    <a href='<?php echo base_url() ?>index.php/mapsManager#' id="road"> Roadwork </a> <br />
    <a href='<?php echo base_url() ?>index.php/mapsManager#' id="incident"> Incident </a> <br />

    <div id="addroadworkDiv">
      <form class="addRoadwork" action='<?php echo base_url() ?>index.php/mapsManager/addRoadwork' method='post'>

        <p style="font-size: 20px;">ROADWORK</p> 
        Contract number: &nbsp;<input type="text" name="contract_number" autofocus required /><br /><br />

        Roadwork name: &nbsp;&nbsp;&nbsp;<input type="text" name="rwork_name" /><br /><br />

        Classification: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <select name="classification" autofocus required ><br /><br />
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
        <input type="text" name="rw_start" id="rw_start" style="width: 80px; font-size: 14px;"/> to
        <input type="text" name="rw_end" id="rw_end" style="width: 80px; font-size: 14px;" /><br /><br />

        Description: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea> </textarea><br /><br />

        Street: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="text" name="street" /><br /><br />
        
        Barangay: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <select name="barangay" autofocus required ><br /><br />
            <option value="bagongkalsada" >Bagong Kalsada </option>
            <option value="banadero" >Bańadero </option>
            <option value="banlic" >Banlic </option>
            <option value="barandal" >Barandal </option>
            <option value="brgy1" >Barangay 1 </option>
            <option value="brgy2">Barangay 2 </option>
            <option value="brgy3" >Barangay 3 </option>
            <option value="brgy4" >Barangay 4 </option>
            <option value="brgy5" >Barangay 5 </option>
            <option value="brgy6" >Barangay 6 </option>
            <option value="brgy7" >Barangay 7 </option>
            <option value="batino" >Batino </option>
            <option value="bubuyan" >Bubuyan </option>
            <option value="bucal" >Bucal </option>
            <option value="bungo" >Bunggo </option>
            <option value="burol" >Burol </option>
            <option value="camaligan" >Camaligan </option>
            <option value="canlubang" >Canlubang </option>
            <option value="halang" >Halang </option>
            <option value="hornalan" >Hornalan </option>
            <option value="kayanlog" >Kay-Anlog </option>
            <option value="lamesa" >La Mesa </option>
            <option value="laguerta" >Laguerta </option>
            <option value="lawa" >Lawa </option>
            <option value="lecheria" >Lecheria </option>
            <option value="lingga" >Lingga </option>
            <option value="looc" >Looc </option>
            <option value="mabato" >Mabato </option>
            <option value="majada" >Majada Labas </option>
            <option value="makiling" >Makiling </option>
            <option value="mapagong" >Mapagong </option>
            <option value="masili" >Masili </option>
            <option value="maunong" >Maunong </option>
            <option value="mayapa" >Mayapa </option>
            <option value="paciano" >Paciano Rizal </option>
            <option value="palingon" >Palingon </option>
            <option value="paloalto" >Palo-Alto </option>
            <option value="pansol" >Pansol </option>
            <option value="parian" >Parian </option>
            <option value="prinza" >Prinza </option>
            <option value="punta" >Punta </option>
            <option value="putinglupa" >Puting Lupa </option>
            <option value="real" >Real </option>
            <option value="saimsim" >Saimsim </option>
            <option value="sampiruhan" >Sampiruhan </option>
            <option value="sancristobal" >San Cristobal </option>
            <option value="sanjose" >San Jose </option>
            <option value="sanjuan" >San Juan </option>
            <option value="siranglupa" >Sirang Lupa </option>
            <option value="sucol" >Sucol </option>
            <option value="milagrosa" >Milagrosa (former Tulo) </option>
            <option value="turbina" >Turbina </option>
            <option value="ulango" >Ulango </option>
            <option value="uwisan" >Uwisan </option>

          </select><br /><br />

        <a href="<?php echo base_url() ?>index.php/mapsManager#" id="addMarkerBtn" onclick='addMarker();' ><small>Add Marker</small></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        ( <input type="text" name="latitude" id="rw_lat" style="width: 80px; height: 20px; font-size: 10px;" disabled="true" /> , 
        <input type="text" name="longitude" id="rw_long" style="width: 80px; height: 20px; font-size: 10px;" disabled="true" /> )
        <br /><br />

         Progress / Status: &nbsp;<input type="number" name="status" min="0" max="100"/><br /><br /><br />

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
        <input type="text" id="rw_start" name="rw_start" style="width: 80px; font-size: 14px;" autofocus required /> to
        <input type="text" id="rw_end" name="rw_start" style="width: 80px; font-size: 14px;" /><br /><br />

        Description: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea> </textarea><br /><br />

        Street: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="text" name="street" /><br /><br />
        
        Barangay: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <select name="barangay" autofocus required ><br /><br />
            <option value="bagongkalsada" >Bagong Kalsada </option>
            <option value="banadero" >Bańadero </option>
            <option value="banlic" >Banlic </option>
            <option value="barandal" >Barandal </option>
            <option value="brgy1" >Barangay 1 </option>
            <option value="brgy2">Barangay 2 </option>
            <option value="brgy3" >Barangay 3 </option>
            <option value="brgy4" >Barangay 4 </option>
            <option value="brgy5" >Barangay 5 </option>
            <option value="brgy6" >Barangay 6 </option>
            <option value="brgy7" >Barangay 7 </option>
            <option value="batino" >Batino </option>
            <option value="bubuyan" >Bubuyan </option>
            <option value="bucal" >Bucal </option>
            <option value="bungo" >Bunggo </option>
            <option value="burol" >Burol </option>
            <option value="camaligan" >Camaligan </option>
            <option value="canlubang" >Canlubang </option>
            <option value="halang" >Halang </option>
            <option value="hornalan" >Hornalan </option>
            <option value="kayanlog" >Kay-Anlog </option>
            <option value="lamesa" >La Mesa </option>
            <option value="laguerta" >Laguerta </option>
            <option value="lawa" >Lawa </option>
            <option value="lecheria" >Lecheria </option>
            <option value="lingga" >Lingga </option>
            <option value="looc" >Looc </option>
            <option value="mabato" >Mabato </option>
            <option value="majada" >Majada Labas </option>
            <option value="makiling" >Makiling </option>
            <option value="mapagong" >Mapagong </option>
            <option value="masili" >Masili </option>
            <option value="maunong" >Maunong </option>
            <option value="mayapa" >Mayapa </option>
            <option value="paciano" >Paciano Rizal </option>
            <option value="palingon" >Palingon </option>
            <option value="paloalto" >Palo-Alto </option>
            <option value="pansol" >Pansol </option>
            <option value="parian" >Parian </option>
            <option value="prinza" >Prinza </option>
            <option value="punta" >Punta </option>
            <option value="putinglupa" >Puting Lupa </option>
            <option value="real" >Real </option>
            <option value="saimsim" >Saimsim </option>
            <option value="sampiruhan" >Sampiruhan </option>
            <option value="sancristobal" >San Cristobal </option>
            <option value="sanjose" >San Jose </option>
            <option value="sanjuan" >San Juan </option>
            <option value="siranglupa" >Sirang Lupa </option>
            <option value="sucol" >Sucol </option>
            <option value="milagrosa" >Milagrosa (former Tulo) </option>
            <option value="turbina" >Turbina </option>
            <option value="ulango" >Ulango </option>
            <option value="uwisan" >Uwisan </option>

          </select><br /><br />

        <a href="<?php echo base_url() ?>index.php/mapsManager#" id="addMarkerBtn"><small>Add Marker</small></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        ( <input type="text" name="latitude" id="inc_lat" style="width: 80px; height: 20px; font-size: 10px;" disabled="true" /> , 
        <input type="text" name="longitude" id="inc_long" style="width: 80px; height: 20px; font-size: 10px;" disabled="true" /> )
        <br /><br /><br />
         
        <input type="submit" value="Add Incident" id="addIncidentBtn" />
      </form>
    </div>
     


    
  </body>
</html>