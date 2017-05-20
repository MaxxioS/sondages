<?php
$serveur     = "db418074366.db.1and1.com";
$utilisateur = "dbo418074366";
$motDePasse  = "serveftp.net";
$base        = "db418074366";
$db_link = mysql_connect($serveur, $utilisateur, $motDePasse)  or exit('Could not connect: ' . mysql_error());
$db = mysql_select_db($base, $db_link)  or exit('Could not select database: ' . mysql_error());
$rows = mysql_query('SELECT COUNT(*) FROM sondage');
$dbrows = 0;
while ($row = mysql_fetch_array($rows))
$query = 'SELECT COUNT(*) FROM sondage';
$result = mysql_query($query);
$nombre = mysql_fetch_array($result);
echo $nombre[0];
?>