<!--FORM FOR ADDING NEW ROADWORK-->

<script type="text/javascript">

    function disablefield(){
        if (document.getElementById('type_line').checked == false ){
            document.getElementById('rwork_line').value = '';
            document.getElementById('rwork_line').disabled = true;
        }
        else{
            alert("Please click twice on the map to specify the start and end points of the roadwork. The map coordinate obtained earlier must be between the two following points.");
            document.getElementById('rwork_line').value = '';
            docum<!--FORM FOR SUBMIT REPORT ON EXISTING INCIDENT-->

            ent.getElementById('rwork_line').disabled = false;
            }
    }

    function validateRoadworkForm(){
        var contractno=document.forms["addRoadwork"]["contract_number"].value;
        var name=document.forms["addRoadwork"]["rwork_name"].value;
        var classification=document.forms["addRoadwork"]["rwork_classification"].value;
        var description = document.getElementById('rwork_desc').value;
        var start=document.getElementById('rwork_start').value;
        var end=document.getElementById('rwork_end').value;
        var barangay=document.getElementById('rwork_barangay').value;
        var latitude=document.getElementById('rwork_lat').value;
        var longitude=document.getElementById('rwork_long').value;

        var has_line =document.getElementById('type_line');
        var line=document.getElementById('rwork_line').value;
        var latPattern = /^-?([0-8]?[0-9]|90)\.[0-9]{1,16}$/;
        var longPattern = /^-?((1?[0-7]?|[0-9]?)[0-9]|180)\.[0-9]{1,16}$/;    
        
        /*Contract number*/
        if(contractno==null || contractno==""){
          alert("Contract number must be filled out.");
          return false;
        }else if(contractno.length<5 || contractno.length>20){
          alert("Contract number must have 5 - 20 characters.");
          return false;
        }
        /*Roadwork name*/
        else if(name==null || name==""){
          alert("Roadwork name must be filled out.");
          return false;
        }else if(name.length<5 || name.length>100){
          alert("Roadwork name must have 5 - 100 characters.");
          return false;
        }
        /*Classification*/
        else if(classification==null || classification==""){
          alert("Please select a classification of the roadwork.");
          return false;
        }
        /*Start date*/
        else if(start==null || start==""){
          alert("Enter the start date of the roadwork.");
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
            alert('Enter the description of the roadwork.');
            return false;
        }else if (description.length<10) {
            alert('Description must have at least 10 characters.');
            return false;
        }else if (description.length>250) {
            alert('Description can have at most 250 characters.');
            return false;
        }
        /*Barangay*/
        else if(barangay==null || barangay==""){
          alert("Please select a barangay.");
          return false;
        }
        /*Coordinates*/
        if(latitude==null || latitude=="" || longitude==null || longitude==""){
          alert("Coordinates are required. Please click on the roadwork location on the map.");
          return false;
        }else if(!latitude.match(latPattern)){
            alert("Invalid latitude.")
            return false;
        }else if(!longitude.match(longPattern)){
            alert("Invalid longitude.")
            return false;
        }
        /*Has Line*/
        if(has_line.checked == true){
            if(/^\s*$/g.test(line) || line.indexOf('\n') != -1) {
                alert('Click on the map to add coordinates.');
                return false;
            }
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
            alert("Day must be from 1 to 31.");
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

<form class="addRoadwork" name="addRoadwork" id="addRoadwork"  action='<?php echo base_url() ?>index.php/roadworksManager2/addRoadwork' method='post'>

    <table style="width:100%;">
    <tr><td width="30%">Contract no.:</td>
        <td><input type="text" id="contract_number" name="contract_number" maxlength="20" onkeyup='javascript:checkRWcontractNumberDuplicate(this.value);' autofocus /></td></tr>

    <tr><td width="30%">Roadwork name:</td>
        <td><input type="text" id="rwork_name" name="rwork_name" maxlength="100" /></td></tr>

    <tr><td width="30%">&nbsp;</td>
        <td>&nbsp;</td></tr>

    <tr><td width="30%">Classification:</td>
        <td><select name="rwork_classification" id="rwork_classification"><br /><br />
            <option></option>
            <option value="Construction">       Construction            </option>
            <option value="Rehabilitation">     Rehabilitation          </option>
            <option value="Renovation">         Renovation              </option>
            <option value="Riprapping">         Riprapping              </option>
            <option value="Application">        Application             </option>
            <option value="Installation">       Installation            </option>
            <option value="Reconstruction">     Reconstruction          </option>
            <option value="Concreting">         Concreting/Asphalting   </option>
            <option value="Electrification">    Electrification         </option>
            <option value="Roadway Lighting">   Roadway Lighting        </option>
        </select></td></tr>

    <tr><td width="30%">Duration:</td>
        <td><input type="text" name="rwork_start" id="rwork_start" placeholder="start date" />&nbsp;&nbsp;to&nbsp;
        <input type="text" name="rwork_end" id="rwork_end" placeholder="end date" /></td></tr>

    <tr><td width="30%">Description:</td>
        <td><textarea name="rwork_desc" id="rwork_desc" maxlength="250" > </textarea></td></tr>

    <tr><td width="30%">&nbsp;</td>
        <td>&nbsp;</td></tr>

    <tr><td width="30%">Street:</td>
        <td><input type="text" id="rwork_street" name="rwork_street" maxlength="50" /></td></tr>

    <tr><td width="30%">Barangay:</td>

        <td><select name="rwork_barangay" id="rwork_barangay" >
            <option></option>
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
            <option value="Mayapa" >Mayapa </option>
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
        <td style="text-align: center;"><input type="text" name="rwork_lat" id="rwork_lat" maxlength="20" placeholder="latitude" /> , 
    <input type="text" name="rwork_long" id="rwork_long" maxlength="20" placeholder="longitude" /></td></tr>

    <tr><td width="30%">&nbsp;</td>
        <td>&nbsp;</td></tr>

    <tr>
       <td colspan="2">
        Add line for the endpoints &nbsp;<input type="checkbox" name="type_line" id="type_line" value="line">&nbsp;&nbsp;&nbsp;
        </td>
        
    </tr>

    <tr><td width="30%">Coordinates: </td>
        <td><textarea name="rwork_line" id="rwork_line" > </textarea></td></tr>
    
    </table>
    <br />
    <input type="submit" value="Add Roadwork" id="addRoadworkBtn" onclick="return validateRoadworkForm()" /><br /><br />
    <a href='#' id="menu_reset_btn" />Reset form</a>
</form>
