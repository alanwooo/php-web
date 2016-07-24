<?php
$link = mysql_connect('localhost', 'root', 'l1admin') or die('Could not connect: ' . mysql_error());
mysql_select_db('mylicai') or die('Could not select database');
mysql_query("SET NAMES 'utf8'");	
?> 
