<?php if($incident == NULL){ ?>
    <center><?php echo '<br /><br /><br />There are no incidents saved in the database.<br /><br />'; ?>
    </center>
    <?php
}else{?>

CHOOSE AN INCIDENT:<br /><br />
<select name="incidentNumber" id="incidentNumber">
<?php
$count = 0;

foreach ($incident as $entry) {
	$count += 1;
	echo "<option value=".$entry['inc_id'].">".$entry['inc_id'].": ".$entry['description']."</option>";
}

if($count == 0){
	echo "<script type=\"text/javascript\">";
	echo "$('#editIncBtn1').attr('disabled',true);";
	echo "</script>";
}
else{
	echo "<script type=\"text/javascript\">";
	echo "</script>";
}

?>
</select>

<?php }?>
