<?php
mysql_connect("localhost","root","");
mysql_select_db("rtims");

$today = date('Y-m-d');
$no_end = '0000-00-00';

//ongoing roadwork
$sql=mysql_query("select * from roadwork join map_coordinates where roadwork.contract_no = map_coordinates.rw_id and roadwork.status != 100  AND roadwork.status !=0 AND ( DATE_FORMAT(roadwork.start_date, '%Y-%m-%d') <= '$today' AND ( DATE_FORMAT(roadwork.end_date, '%Y-%m-%d') > '$today' OR DATE_FORMAT(roadwork.end_date, '%Y-%m-%d') = DATE_FORMAT($no_end, '%Y-%m-%d')) )");
while($row=mysql_fetch_assoc($sql))
$output[]=$row;
print(json_encode($output));// this will print the output in json
mysql_close();
?>
