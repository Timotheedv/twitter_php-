<?php
   //La page connexion.php avec l'outil try sert à communiquer avec la base de donnée et de couper le site si jamais il y a 
   //un souci de connexion en y affichant un message du type "Site  non disponible"
   try{
   
   $database = new PDO("mysql:host=localhost;dbname=rendu_php", "root" , ""); /*PDO = créer lien entre mysql et php*/
    
    } catch (Exception $e){
      die("Erreur : " . $e-getMessage());
    
    }
    ?>