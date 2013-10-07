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
        $(document).ready(function(){
            $(".inline").colorbox({inline:true, width:"50%"});
        });
        $(function(){   $( "#rwork_start" ).datepicker();    });
        $(function(){   $( "#rwork_end" ).datepicker();    });
        $(function(){   $('textarea').autosize();            }); 

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
        

        <div id="adminFunctions">

            <div id="admin_roadwork">
                <img src='<?php echo base_url() ?>styles/img/bg/roadwork_add.png' class="menu_buttons" id="menu_add_rw_btn" /> <br /> <br />
                <img src='<?php echo base_url() ?>styles/img/bg/roadwork_edit.png' class="menu_buttons" id="menu_edit_rw_btn" /> <br /> <br />
                <img src='<?php echo base_url() ?>styles/img/bg/roadwork_delete.png' class="menu_buttons" id="menu_delete_rw_btn" /> <br /> <br />
                <a href='<?php echo base_url() ?>index.php/roadworksTableManager'><img src='<?php echo base_url() ?>styles/img/bg/roadwork_view.png' class="menu_buttons" id="menu_view_rw_btn" /></a><br /><br />
                <img src='<?php echo base_url() ?>styles/img/bg/roadwork_back.png' class="menu_buttons" id="menu_back_rw_btn2" /> <br />
                <a href='<?php echo base_url() ?>index.php/mapsManager'><img src='<?php echo base_url() ?>styles/img/bg/menu_back.png' class="menu_buttons" id="menu_back_rw_btn" /></a><br /><br /><br />
               
            </div>


           <!-- ---------- ADD ROADWORK ---------- -->
            <div id="addroadworkDiv">
              <form class="addRoadwork" action='<?php echo base_url() ?>index.php/roadworksManager/addRoadwork' method='post'>

                <p style="font-size: 20px;">ROADWORK</p> 
                Contract number: &nbsp;<input type="text" name="contract_number" onkeyup='javascript:checkRWcontractNumberDuplicate(this.value);' autofocus required /><br /><br />

                Roadwork name: &nbsp;&nbsp;&nbsp;<input type="text" name="rwork_name" /><br /><br />

                Classification: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <select name="rwork_classification" id="rwork_classification" autofocus required ><br /><br />
                    <option value="Construction">Construction</option>
                    <option value="Rehabilitation">Rehabilitation</option>
                    <option value="Renovation">Renovation</option>
                    <option value="Riprapping">Riprapping</option>
                    <option value="Application">Application</option>
                    <option value="Installation">Installation</option>
                    <option value="Reconstruction">Reconstruction</option>
                    <option value="Concreting">Concreting/Asphalting</option>
                    <option value="Electrification">Electrification</option>
                    <option value="Roadway Lighting">Roadway Lighting</option>
                  </select><br /><br />

                Duration: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="rwork_start" id="rwork_start" style="width: 78px; font-size: 14px;" autofocus required /> to
                <input type="text" name="rwork_end" id="rwork_end" style="width:78px; font-size: 14px;" /><br /><br />

                Description: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea name="rwork_desc" id="rwork_desc" required > </textarea><br /><br />

                Street: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" name="rwork_street" /><br /><br />
                
                Barangay: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <select name="rwork_barangay" id="rwork_barangay" autofocus required ><br /><br />
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

                Map Coordinates: ( <input type="text" name="rwork_lat" id="rwork_lat" style="width: 80px; height: 20px; font-size: 10px;" autofocus required /> , 
                <input type="text" name="rwork_long" id="rwork_long" style="width: 80px; height: 20px; font-size: 10px;" autofocus required /> )
                <br /><br />

                 Progress / Status: &nbsp;<input type="number" name="rwork_status" min="0" max="100" autofocus required /><br /><br /><br />

                <input type="submit" value="Add Roadwork" id="addRoadworkBtn" onclick='javascript:addRoadwork();'/><br /><br />
                <a  href='<?php echo base_url() ?>index.php/roadworksManager' /><img src='<?php echo base_url() ?>styles/img/bg/roadwork_back.png' id="menu_back1_btn" /></a><br />
                </form>
            </div>
            

        </div>
    </div>


   
     


    
  </body>
</html>