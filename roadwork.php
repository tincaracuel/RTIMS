<?php
mysql_connect("localhost","root","");
mysql_select_db("rtims");

$today = date('Y-m-d');
$no_end = '0000-00-00';

//ongoing roadwork
$sql=mysql_query("select * from roadwork join map_coordinates where roadwork.contract_no = map_coordinates.rw_id and (start_date < '$today' OR start_date = '$today') AND (end_date = '0000-00-00' OR end_date > '$today' OR end_date = '$today')");
while($row=mysql_fetch_assoc($sql))
$output['rw'][]=$row;
print(json_encode($output));// this will print the output in json
mysql_close();
?>