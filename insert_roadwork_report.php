<?php

	$con = mysql_connect("localhost","root","") or die("connection failed");
	mysql_select_db("rtims",$con) or die("db selection failed");
	 
	$name=$_REQUEST['name'];
	$email=$_REQUEST['email'];
	$rw_id=$_REQUEST['roadworkID'];
	$desc=$_REQUEST['desc'];
	$contact=$_REQUEST['contactno'];

	echo $desc;

	$flag['code']=0;

	if($r=mysql_query("INSERT into report (sender_name, sender_email, sender_contact_no, rw_id, description) values ('$name', '$email', '$contact', '$rw_id', '$desc')",$con))
	{
		$flag['code']=1;
		echo"hi";
	}

	print(json_encode($flag));
	mysql_close($con);
?>
