<html>
<head>
<meta charset="UTF-8">
<title>Index de notre sondage :)</title>
</head>

<body>
Question : "L'arc cosinus, c'est une herbe aromatique ?"
<form name="formulaire" method="post" action="<?$PHP_SELF;?>">
<input type="radio" name="choix" value="oui"> oui...
<input type="radio" name="choix" value="non"> non...
<input type="radio" name="choix" value="pas"> ne sait pas...
<input type="submit" value="Validez votre réponse">
</form>
<?
switch($choix)
{
case "oui":
$fichier = fopen("oui.txt","r+");
$sond = fgets($fichier,255);
$sond++;fclose($fichier);
$fichier = fopen("oui.txt","w");
fwrite($fichier,$sond);
fclose($fichier);break;

case "non":
$fichier = fopen("non.txt","r+");
$sond = fgets($fichier,255);
$sond++;fclose($fichier);
$fichier = fopen("non.txt","w");
fwrite($fichier,$sond);
fclose($fichier);break;

case "pas":
$fichier = fopen("pas.txt","r+");
$sond = fgets($fichier,255);
$sond++;fclose($fichier);
$fichier = fopen("pas.txt","w");
fwrite($fichier,$sond);
fclose($fichier);break;
}
?>
<?
$fichier = fopen("oui.txt","r");
$sonda = fgets($fichier,255);
fclose($fichier);

$fichier = fopen("non.txt","r");
$sondb = fgets($fichier,255);
fclose($fichier);

$fichier = fopen("pas.txt","r");
$sondc = fgets($fichier,255);
fclose($fichier);

$tot_sond=($sonda+$sondb+$sondc);
echo "Nombre de \"oui\" : ",$sonda;
echo "Nombre de \"non\" : ",$sondb;
echo "Nombre de \"ne sait pas\" : ",$sondc;
echo "Nombre total de votes : ",$tot_sond;
?>

</body>
</html>