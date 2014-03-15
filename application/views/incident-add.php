<script type="text/javascript">
    function validateIncidentForm(){
        var description = document.getElementById('inc_desc').value;
        var street=document.forms["addIncident"]["inc_street"].value;
        var start=document.getElementById('inc_start').value;
        var end=document.getElementById('inc_end').value;
        var latitude=document.getElementById('inc_lat').value;
        var longitude=document.getElementById('inc_long').value;
        var latPattern = /^-?([0-8]?[0-9]|90)\.[0-9]{1,16}$/;
        var longPattern = /^-?((1?[0-7]?|[0-9]?)[0-9]|180)\.[0-9]{1,16}$/;
        
        /*Start date*/
        if(start==null || start==""){
          alert("Enter the start date of the incident.");
          return false;
        }else if(!checkDate(start)){
          return false;
        }
        /*End date*/
        else if(end==null || end==""){

        }else if(!checkDate(end)){
          return false;
        }else if(start>end){
            alert("End date is earlier than the start date.")
            return false;
        }
        /*Message*/
        if(/^\s*$/g.test(description) || description.indexOf('\n') != -1) {
            alert('Enter the description of the incident.');
            return false;
        }else if (description.length<10) {
            alert('Description must have at least 10 characters.');
            return false;
        }else if (description.length>100) {
            alert('Description can have at most 100 characters.');
            return false;
        }
        /*Street*/
        if(street==null || street==""){
          alert("Street address must be filled out.");
          return false;
        }else if(street.length<5 || street.length>50){
          alert("Street address must have 5 - 50 characters.");
          return false;
        }
        /*Coordinates*/
        if(latitude==null || latitude=="" || longitude==null || longitude==""){
          alert("Coordinates are required. Please click on the incident location on the map.");
          return false;
        }else if(!latitude.match(latPattern)){
            alert("Invalid latitude.")
            return false;
        }else if(!longitude.match(longPattern)){
            alert("Invalid longitude.")
            return false;
        }

    }



    function checkDate(txtDate){
        var currVal = txtDate;
        
        var rxDatePattern = /^(\d{4})(-)(\d{1,2})(-)(\d{1,2})$/;
        var dtArray = currVal.match(rxDatePattern);
        
        if (dtArray == null){
            alert("Invalid date format. Please use YYYY-MM-DD.");
            return false;
        }
       
        dtMonth = dtArray[3];
        dtDay= dtArray[5];
        dtYear = dtArray[1];        
        
        if (dtMonth < 1 || dtMonth > 12){
            alert("Month must be from 1 to 12.");
            return false;
        }
        else if (dtDay < 1 || dtDay> 31){
            alert("Month must be from 1 to 31.");
            return false;
        }
        else if ((dtMonth==4 || dtMonth==6 || dtMonth==9 || dtMonth==11) && dtDay ==31){
            alert("Month does not have 31 days.");
            return false;
        }
        else if (dtMonth == 2){
            var isleap = (dtYear % 4 == 0 && (dtYear % 100 != 0 || dtYear % 400 == 0));
            if (dtDay> 29 || (dtDay ==29 && !isleap)){
                alert("Month has only 28 days.");
                return false;
            }
        }
        return true;
    }
</script>

<form class="addIncident" name="addIncident" id="addIncident" action='<?php echo base_url() ?>index.php/incidentsManager/addIncident' method='post'>
    <table style="width:100%;">

    <tr><td width="30%">Classification:</td>
    <td><select id="inc_classification" name="inc_classification" autofocus><br /><br />
        <option value="Accident">Accident</option>
        <option value="Obstruction">Obstruction</option>
        <option value="Public Event">Public Event</option>
        <option value="Funeral">Funeral</option>
        <option value="Flood">Flood</option>
        <option value="Strike">Strike</option>
    </select></td></tr>

    <tr><td width="30%">Duration:</td>
        <td><input type="text" name="inc_start" id="inc_start" />&nbsp;to&nbsp;
        <input type="text" name="inc_end" id="inc_end" /></td></tr>

    <tr><td width="30%">Description:</td>
        <td><textarea name="inc_desc" id="inc_desc" maxlength="100" > </textarea></td></tr>

    <tr><td width="30%">Street:</td>   
        <td><input type="text" name="inc_street" id="inc_street" maxlength="50" /></td></tr>
    
    <tr><td width="30%">Barangay:</td> 

    <td><select name="inc_barangay" id="inc_barangay" autofocus>
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

      </select></td></tr>

      <tr><td width="30%">Map Coordinates:</td>
        <td style="text-align: center;">( <input type="text" name="inc_lat" id="inc_lat" maxlength="20" autofocus /> , 
    <input type="text" name="inc_long" id="inc_long" maxlength="20" autofocus /> )</td></tr>
    </table>
    <br />   
    <input type="submit" value="Add Incident" id="addIncidentBtn" onclick="return validateIncidentForm()"/><br /><br />
    <a href='' id="menu_reset_btn" />Reset form</a>
</form>