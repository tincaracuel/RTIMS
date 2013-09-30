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


     <div id="queryMessage"></div>

    <div id="lowerbox">
        <div id="map" style="width: 75%;" ><?php echo $map['html']; ?></div>
        <div id="table_view" style="width: 75%;" ><h1>SDASDASDASDSDASDSADA</h1></div>

        <div id="adminFunctions">

            <div id="admin_incident">
                <img src='<?php echo base_url() ?>styles/img/bg/incident_add.png' id="menu_add_inc_btn" /> <br /> <br />
                <img src='<?php echo base_url() ?>styles/img/bg/incident_edit.png' id="menu_edit_inc_btn" /> <br /> <br />
                <img src='<?php echo base_url() ?>styles/img/bg/incident_delete.png' id="menu_delete_inc_btn" /> <br /> <br />
                <img src='<?php echo base_url() ?>styles/img/bg/incident_view.png' id="menu_view_inc_btn" /> <br /><br />
                <img src='<?php echo base_url() ?>styles/img/bg/incident_back.png' id="menu_back_inc_btn2" /> <br />
                <a href='<?php echo base_url() ?>index.php/mapsManager'><img src='<?php echo base_url() ?>styles/img/bg/menu_back.png' id="menu_back_inc_btn" /></a><br /><br /><br />
            </div>


           <!-- ---------- ADD INCIDENT ---------- -->
            <div id="addincidentDiv">
                <form class="addIncident" action='<?php echo base_url() ?>index.php/incidentsManager/addIncident' method='post'>

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
                    <option value="Bagong Kalsada" >Bagong Kalsada </option>
                    <option value="Banadero" >Bańadero </option>
                    <option value="Banlic" >Banlic </option>
                    <option value="Barandal" >Barandal </option>
                    <option value="Brgy 1" >Barangay 1 </option>
                    <option value="Brgy 2">Barangay 2 </option>
                    <option value="Brgy 3" >Barangay 3 </option>
                    <option value="Brgy 4" >Barangay 4 </option>
                    <option value="Brgy 5" >Barangay 5 </option>
                    <option value="Brgy 6" >Barangay 6 </option>
                    <option value="Brgy 7" >Barangay 7 </option>
                    <option value="Batino" >Batino </option>
                    <option value="Bubuyan" >Bubuyan </option>
                    <option value="Bucal" >Bucal </option>
                    <option value="Bungo" >Bunggo </option>
                    <option value="Burol" >Burol </option>
                    <option value="Camaligan" >Camaligan </option>
                    <option value="Canlubang" >Canlubang </option>
                    <option value="Halang" >Halang </option>
                    <option value="Hornalan" >Hornalan </option>
                    <option value="Kay-Anlog" >Kay-Anlog </option>
                    <option value="La Mesa" >La Mesa </option>
                    <option value="Laguerta" >Laguerta </option>
                    <option value="Lawa" >Lawa </option>
                    <option value="Lecheria" >Lecheria </option>
                    <option value="Lingga" >Lingga </option>
                    <option value="Looc" >Looc </option>
                    <option value="Mabato" >Mabato </option>
                    <option value="Majada" >Majada Labas </option>
                    <option value="Makiling" >Makiling </option>
                    <option value="Mapagong" >Mapagong </option>
                    <option value="Masili" >Masili </option>
                    <option value="Maunong" >Maunong </option>
                    <option value="mayapa" >Mayapa </option>
                    <option value="Paciano" >Paciano Rizal </option>
                    <option value="Palingon" >Palingon </option>
                    <option value="Palo Alto" >Palo-Alto </option>
                    <option value="Pansol" >Pansol </option>
                    <option value="Parian" >Parian </option>
                    <option value="Prinza" >Prinza </option>
                    <option value="Punta" >Punta </option>
                    <option value="Puting Lupa" >Puting Lupa </option>
                    <option value="Real" >Real </option>
                    <option value="Saimsim" >Saimsim </option>
                    <option value="Sampiruhan" >Sampiruhan </option>
                    <option value="SanCristobal" >San Cristobal </option>
                    <option value="San Jose" >San Jose </option>
                    <option value="San Juan" >San Juan </option>
                    <option value="Sirang Lupa" >Sirang Lupa </option>
                    <option value="Sucol" >Sucol </option>
                    <option value="Milagrosa" >Milagrosa (former Tulo) </option>
                    <option value="Turbina" >Turbina </option>
                    <option value="Ulango" >Ulango </option>
                    <option value="Uwisan" >Uwisan </option>
                  </select><br /><br />

                Map Coordinates: &nbsp;&nbsp;( <input type="text" name="inc_lat" id="inc_lat" style="width: 80px; height: 20px; font-size: 10px;" autofocus required/> , 
                <input type="text" name="inc_long" id="inc_long" style="width: 80px; height: 20px; font-size: 10px;" autofocus required/> )
                <br /><br /><br />
                 
                <input type="submit" value="Add Incident" id="addIncidentBtn" /><br /><br />
                <a  href='<?php echo base_url() ?>index.php/incidentsManager' id="menu_back2_btn" /> BACK &rarr; </a><br />
              </form>
            </div>
            

        </div>
    </div>

   
     


    
  </body>
</html>