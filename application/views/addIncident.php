<script>
    $(function(){   $( "#inc_start" ).datepicker();    });
    $(function(){   $( "#inc_end" ).datepicker();    });
    $(function(){   $('textarea').autosize();            }); 
</script>

<form class="addIncident" action='<?php echo base_url() ?>index.php/incidentsManager/addIncident' method='post'>
    Classification: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <select id="inc_classification" name="inc_classification" autofocus required ><br /><br />
        <option value="Accident">Accident</option>
        <option value="Obstruction">Obstruction</option>
        <option value="Public Event">Public Event</option>
        <option value="Funeral">Funeral</option>
        <option value="Flood">Flood</option>
        <option value="Strike">Strike</option>
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
        <option value="Barangay 1" >Barangay 1 </option>
        <option value="Barangay 2">Barangay 2 </option>
        <option value="Barangay 3" >Barangay 3 </option>
        <option value="Barangay 4" >Barangay 4 </option>
        <option value="Barangay 5" >Barangay 5 </option>
        <option value="Barangay 6" >Barangay 6 </option>
        <option value="Barangay 7" >Barangay 7 </option>
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

  Map Coordinates: ( <input type="text" name="inc_lat" id="inc_lat" style="width: 80px; height: 20px; font-size: 10px;" autofocus required /> ,
  <input type="text" name=inc_long" id="inc_long" style="width: 80px; height: 20px; font-size: 10px;" autofocus required /> )<br /><br />
     
    <input type="submit" value="Add Incident" id="addIncidentBtn" /><br /><br />
    <a href='' id="menu_back2_btn" />Back to Main Menu &rarr;</a>
</form>