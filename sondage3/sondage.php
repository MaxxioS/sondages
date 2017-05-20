<?php 
$connection = mysql_connect("db418074366.db.1and1.com", "dbo418074366", "serveftp.net");
$fai = $_POST["fai"];
$choix  = $_POST["choix"];
$changer  = $_POST["changer"];
?>
<?php

 if (isset($_COOKIE['Sondage']))   
 {  
  
 }  
 else  
   mysql_query("USE db418074366", $connection)
   or die("");



 mysql_query("INSERT INTO sondage (fai, resultat, changer)"." VALUES ('$fai', '$choix', '$changer') ")
    or die("Votre vote a déja été pris en compte.</br>Vous ne pouvez pas voter plusieurs fois de suite.</br>
	  Vous serez automatiquement redirigé vers la page d\'accueil dans 30 secondes.</br>
      Si rien ne se passe, merci de  <A HREF='/index.php'>cliquez ici</A></br>
      Vous pouvez &eacute;galement consulter les r&eacute;sultats de ce sondage, en <A HREF='sondage_reponse.php'>cliquant ici</A><meta http-equiv='refresh' content='30;/index.php' /></br>");
 {  
      /*pas encore voter*/  
      setcookie('Sondage','Sondage' , time() + 31*24*3600); /*valide pour un mois*/  
      /* Peu comptabiliser le vote*/  
     echo 'Merci pour votre vote. Celui-ci a bien été pris en compte</br>';
	 echo 'Vous serez automatiquement redirigé vers la page d\'accueil dans 30 secondes.</br>';
     echo 'Si rien ne se passe, merci de  <A HREF="/index.php">cliquez ici</A></br>';
     echo 'Vous pouvez &eacute;galement consulter les r&eacute;sultats de ce sondage, en <A HREF="sondage_reponse.php">cliquant ici</A><meta http-equiv="refresh" content="30;/index.php" /></br>';
 } 
?>
