<script>
    $(function(){   $( "#rwork_start" ).datepicker();    });
    $(function(){   $( "#rwork_end" ).datepicker();    });
    $(function(){   $('textarea').autosize();            }); 
</script>

<form class="addRoadwork" action='<?php echo base_url() ?>index.php/roadworksManager/addRoadwork' method='post'>
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
<input type="text" name="rwork_start" id="rwork_start" style="width: 78px; font-size: 14px;"  required /> to
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

Map Coordinates: ( <input type="text" name="rwork_lat" id="rwork_lat" style="width: 80px; height: 20px; font-size: 10px;" autofocus required /> , 
<input type="text" name="rwork_long" id="rwork_long" style="width: 80px; height: 20px; font-size: 10px;" autofocus required /> )
<br /><br />

 Progress / Status: &nbsp;<input type="number" name="rwork_status" min="0" max="100" autofocus /><br /><br /><br />

<input type="submit" value="Add Roadwork" id="addRoadworkBtn" onclick='javascript:addRoadwork();'/><br /><br />
<a href='' id="menu_back1_btn" />Back to Main Menu &rarr;</a>
</form>