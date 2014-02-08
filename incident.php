<?php
mysql_connect("localhost","root","");
mysql_select_db("rtims");

$today = date('Y-m-d');
$no_end = '0000-00-00';

//ongoing roadwork
$sql=mysql_query("select * from incident join map_coordinates where incident.inc_id = map_coordinates.inc_id AND ( DATE_FORMAT(incident.start_date, '%Y-%m-%d') <= '$today' AND ( DATE_FORMAT(incident.end_date, '%Y-%m-%d') > '$today' OR DATE_FORMAT(incident.end_date, '%Y-%m-%d') = DATE_FORMAT($no_end, '%Y-%m-%d')) )");
while($row=mysql_fetch_assoc($sql))
$output['inc'][]=$row;
print(json_encode($output));// this will print the output in json
mysql_close();
?>
