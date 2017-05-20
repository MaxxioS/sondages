<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Untitled Document</title>
</head>

<body>
<form method="post" action="sondage.php" id="sondage">
<div align="center"><br>
</div>
<table width="100%" border="2" align="center" background="blue">
     <tr>
       <td><p>Merci de prendre quelques instants pour répondre à notre sondage. </p>
         <p>Quel est votre FAI (Fournisseur d'Accès à Internet) actuel ?<br>
  S&eacute;lectionnez le nom de votre FAI: <br>
             <select name="fai">
               <option>AUTRE</option>
               <option>BOUYGUES TELECOM</option>
               <option>FREE</option>
               <option>SFR</option>
               <option>NUMERICABLE</option>
               <option>ORANGE</option>
               <option>OVH</option>
             </select>
           <br />
           <br>
&Ecirc;tes-vous satisfait de votre FAI ? <br>
         <input type="radio" name="choix" value="Oui" />Oui<br />
         <input type="radio" name="choix" value="Non" />Non </p>
         <p>Êtes-vous prêt à changer de FAI ? <br />
         <input type="radio" name="changer" value="Oui" />Oui<br/>
         <input type="radio" name="changer" value="Non" />Non
       <br>
       <br>
       <input name="submit" type="submit" value="Envoyer le sondage" />
       </p></td>
     </tr>
   </table>
   <br />
 </form>
</body>
</html>
