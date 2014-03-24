<?php
$today = new DateTime(date('Y-m-d'));
$start = new DateTime($row->start_date);
$end = new DateTime($row->end_date);

$today1 = date('Y-m-d');
$start1 = $row->start_date;
$end1 = $row->end_date;


if($start > $today){
	echo "0%";
}else if($today < $end){
$interval = $start->diff($end);

$interval2 = $start->diff($today);

echo round($interval2->format('%a') / $interval->format('%a') * 100.00).'%';
}else if($today > $end){
	echo "100%";
}

?>