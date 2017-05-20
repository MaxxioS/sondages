<?php
 $serveur     = "localhost";
 $utilisateur = "root";
 $motDePasse  = "";
 $base        = "mabase";

 mysqli_pconnect($serveur, $utilisateur , $motDePasse)
    or die("Impossible de se connecter au serveur de bases de données.");
 mysqli_select_db($base) 
    or die("Base de données non trouvée.");

 // Récupération des données POST (depuis PHP 4.1)
 // en considérant register_global=off (par défaut depuis 4.2)
 $pseudo = $_POST["pseudo"];
 $choix  = $_POST["choix"];

 mysqli_query("INSERT INTO sondage (nom, resultat)".
                    " VALUES ('$pseudo', '$choix') ")
    or die("Impossible d'insérer le résultat du sondage");
 echo "Merci";
?>