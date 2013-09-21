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
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true"></script>

    <script src="<?php echo base_url() ?>styles/js/jquery-1.8.3.js"></script>
    <script src="<?php echo base_url() ?>styles/js/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>styles/js/jquery-ui.js"></script>
    <script src="<?php echo base_url() ?>styles/js/subFunctions.js"></script>
    <script src="<?php echo base_url() ?>styles/js/mainFunctions.js"></script>
    <script src="<?php echo base_url() ?>styles/js/gmaps.js"></script>



    <script>
        $(function(){   $( "#rwork_start" ).datepicker();    });
        $(function(){   $( "#rwork_end" ).datepicker();    });
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

     <div id="queryMessage"></div>

    <div id="map" style="width: 75%;" ><?php echo $map['html']; ?></div>

    <div id="adminFunctions">

        <div id="admin_incident">
            <img src='<?php echo base_url() ?>styles/img/bg/incident_add.png' href='<?php echo base_url() ?>index.php/mapsManager#' id="menu_add_inc_btn" /> <br /> <br /> <br />
            <img src='<?php echo base_url() ?>styles/img/bg/incident_edit.png' href='<?php echo base_url() ?>index.php/mapsManager#' id="menu_edit_inc_btn" /> <br /> <br /> <br />
            <img src='<?php echo base_url() ?>styles/img/bg/incident_delete.png' href='<?php echo base_url() ?>index.php/mapsManager#' id="menu_delete_inc_btn" /> <br /> <br /> <br />
            <img src='<?php echo base_url() ?>styles/img/bg/incident_view.png' href='<?php echo base_url() ?>index.php/mapsManager#' id="menu_view_inc_btn" /> <br /> <br />
            <a  href='<?php echo base_url() ?>index.php/mapsManager#' id="menu_back_inc_btn" /> BACK &rarr; </a><br />
        </div>


       <!-- ---------- ADD INCIDENT ---------- -->
        <div id="addincidentDiv">
            <form class="addIncident" action='<?php echo base_url() ?>index.php/mapsManager/addIncident' method='post'>

            <p style="font-size: 20px;">TRAFFIC INCIDENT</p> 
            Classification: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <select id="inc_classification" name="inc_classification" autofocus required ><br /><br />
                <option value="accident">Accident</option>
                <option value="obstruction">Obstruction</option>
                <option value="publicEvent">Public Event</option>
              </select><br /><br />

            Duration: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="text" id="inc_start" name="inc_start" style="width: 80px; font-size: 14px;" autofocus required /> to
            <input type="text" id="inc_end" name="inc_end" style="width: 80px; font-size: 14px;" /><br /><br />

            Description: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea name="inc_desc" id="inc_desc" autofocus required> </textarea><br /><br />

            Street: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="inc_street" autofocus required /><br /><br />
            
            Barangay: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <select name="inc_barangay" id="inc_barangay" autofocus required ><br /><br />
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

            Map Coordinates: &nbsp;&nbsp;( <input type="text" name="inc_lat" id="inc_lat" style="width: 80px; height: 20px; font-size: 10px;" autofocus required/> , 
            <input type="text" name="inc_long" id="inc_long" style="width: 80px; height: 20px; font-size: 10px;" autofocus required/> )
            <br /><br /><br />
             
            <input type="submit" value="Add Incident" id="addIncidentBtn" /><br /><br />
            <a  href='<?php echo base_url() ?>index.php/incidentsManager' id="menu_back2_btn" /> BACK &rarr; </a><br />
          </form>
        </div>
        

    </div>

   
     


    
  </body>
</html>