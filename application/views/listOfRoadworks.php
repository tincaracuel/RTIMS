<?php if($roadwork == NULL){ ?>
    <center><?php echo '<br /><br /><br />There are no roadworks saved in the database.<br /><br />'; ?>
    </center>
    <?php
}else{?>


CHOOSE A ROADWORK:<br /><br />
<select name="contractNumber" id="contractNumber">
<?php
$count = 0;

foreach ($roadwork as $entry) {
	$count += 1;
	echo "<option value=".$entry['contract_no'].">".$entry['contract_no'].": ".$entry['rwork_type']."</option>";
}

if($count == 0){
	echo "<script type=\"text/javascript\">";
	echo "$('#editRwBtn1').attr('disabled',true);";
	echo "</script>";
}
else{
	echo "<script type=\"text/javascript\">";
	echo "</script>";
}

?>
</select>

<?php }?>
