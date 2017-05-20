<?php
ob_start("ob_gzhandler");
?>
<!DOCTYPE>
<html lang="fr">

<head>
<meta charset="UTF-8">
<title>sondage test.</title>
<meta name="Description" content="Phrases pertinentes" />
<meta name="Keywords" content="Mots pertinent" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" media="screen" type="text/css" href="sondage/style/global.css" />

</head>
<?php

    $titre = 'sondage'; // = nom du fichier dans lequel est stocké les votes
	$question = 'Votre avis sur Walking Dead'; //  La question ici
	$reponse[1] = 'Excellent'; // Premier choix de réponse
	$reponse[2] = 'Assez bien'; // Deuxième choix de réponse
    $reponse[3] = 'Moyen'; // Les autres choix de réponse sont facultative.
    $reponse[4] = 'Pas terrible';
	$reponse[5] = 'A éviter';

?>
    
<body>

	<h1>Sondage</h1>

<div id="sondage">

<?php
    
	 $nb_max_votes = 1;
     // MODIFICATION DU SONDAGE
     $choix = count($reponse);
     if (isset($_GET['vote']))
     {
     $resultats = fopen("$titre.txt", "r+");
     $vote = $_GET['vote'];
     for ($numero = 1; $numero <= $choix; $numero ++)
     {
     $ligne[$numero] = (int) fgets($resultats);
     if ($numero == $vote)
     {
     $ligne[$numero] ++;
     }
     if (isset($donnees_votes))
     {
     $donnees_votes = $donnees_votes . "\n" . $ligne[$numero];
     $nb_votes += $ligne[$numero]; // comptage du nombre de votes
     }
     else
     {
     $donnees_votes = $ligne[$numero];
     $nb_votes = (int) $ligne[$numero];
     }
     }
     fseek ($resultats, 0);
     if($nb_votes<=$nb_max_votes OR $nb_max_votes==1)
     fputs ($resultats, $donnees_votes); // écriture des données

     fclose($resultats);
         
     header('Location: http://localhost/sondage/sondage.php');
     }
     // Lecture du sondage
     $resultats = fopen("$titre.txt", "r");

     $numero = 1;
     while ($numero <= $choix) // attribution d'un nombre pour chaque vote à l'array $resultat[]
     {
     $resultat[$numero] = fgets($resultats);
     if ($resultat[$numero] == NULL) // on remplace les lignes vides du fichier txt par 0
     {
     $resultat[$numero] = 1;
     }
     $numero ++;
     }

     $total_votes = 0; // calcul du total des votes
     foreach($resultat as $nb_resultat) $total_votes += $nb_resultat;
     if ($total_votes == 0) // éviter la division par 0
     {
     $total_votes = 1;
     }
     $numero = 1;
     while ($numero <= $choix) // transformation du nombre de vote en pourcentages
     {
     $pourcentage[$numero] = $resultat[$numero] / $total_votes * 100;
     $numero ++;
     }

     $long_max_bloc = 120; // longueur maximale du curseur pour un vote en pixels

     // affichage des barres et du nombre de votes
     $numero = 1;
     echo ('<div class="titresondage" >'. $_GET["$question"] . '</div><form action="sondage.php">');
     while ($numero <= $choix)
     {
     echo ('<div class="choix"><label><input type="radio" name="vote" value="' . $numero . '" />'. $reponse[$numero] .'</label>
     <img src="sondage/images/bg-red.jpg" height="10" width="' . $pourcentage[$numero] / 100 * $long_max_bloc . '"
     alt="'.round($pourcentage[$numero]).'%" /> <span style="font-size:70%;"><strong>' . $resultat[$numero] . ' votes</strong></span></div>');

     echo (substr($pourcentage[$numero],0,4) . '%');
     $numero ++;
     }
     echo ('<div><input type="submit" class="submit" value="" />');
     echo ('</div></form>');
     fclose($resultats);
?>
</div>

	

</body>
</html>