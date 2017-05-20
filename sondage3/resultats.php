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
print ' personnes ont particip&eacute;es au sondage';
?>
</br>
<?php
$Oui_changer=0;
$Non_changer=0;
$SFR=0;
$ORANGE=0;
$BOUYGUES_TELECOM=0;
$NUMERICABLE=0;
$OVH=0;
$AUTRE=0;
$sql="select * from sondage";
$req=mysql_query($sql)or die('Erreur de connexion au serveur SQL');

while($data=mysql_fetch_array($req))
{
if ( $data['fai'] == "SFR") $SFR++ ;
if ( $data['fai'] == "ORANGE") $ORANGE++ ;
if ( $data['fai'] == "BOUYGUES TELECOM") $BOUYGUES_TELECOM++ ;
if ( $data['fai'] == "NUMERICABLE") $NUMERICABLE++ ;
if ( $data['fai'] == "FREE") $FREE++ ;
if ( $data['fai'] == "OVH") $OVH++ ;
if ( $data['fai'] == "AUTRE") $AUTRE++ ;
if ( $data['changer'] == "Oui") $Oui_changer++ ;
if ( $data['changer'] == "Non") $Non_changer++ ;
}
echo "SFR : ".$SFR;
echo 'AUTRE : '.$AUTRE ;
echo 'BOUYGUES TELECOM : '.$BOUYGUES_TELECOM ;
echo 'FREE : '.$FREE ;
echo 'NUMERICABLE : '.$NUMERICABLE ;
echo 'ORANGE : '.$ORANGE ;
echo 'OVH : '.$OVH ;


?>

<table width="738" border="1" align="center">
    <tr>
      <td width="172" height="23"><strong>FAI </strong></td>
      <td width="150"><strong>Satisfait ? </strong></td>
      <td width="128"><strong>Pr&ecirc;t &agrave; changer ? </strong></td>
      <td width="260"><b>Date</b></td>
    </tr>

<?php
function reponse($texte) {
    switch ($texte) {
       case "Oui"  : return "Oui"; break;
       case "Non": return "Non"; break;
	   case "Oui_1": return "Oui_1"; break;
	   case "Non_1": return "Non_1"; break;

    } 
}

$serveur     = "db418074366.db.1and1.com";
$utilisateur = "dbo418074366";
$motDePasse  = "serveftp.net";
$base        = "db418074366";

mysql_pconnect($serveur, $utilisateur, $motDePasse);
mysql_select_db($base) or die("Connexion ratée");

$requete = mysql_query("SELECT * FROM sondage");
while ($ligne = mysql_fetch_array($requete)) {
   print "<tr>
   <td>".$ligne["fai"]."</td>
   <td>".reponse($ligne["resultat"])."</td>
   <td>".$ligne["changer"]."</td>
   <td>".$ligne["date"]."</td>
   </tr>";  
}
?>
</table>
