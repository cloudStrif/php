<?php
	require_once('azerty.php');
	$url = 'mongodb://'.DBUSER.':'.DBPASSWD.'@'.DBSERVER.'/'.DBNAME;
	$m = new MongoClient($url);
?>