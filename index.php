<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="recherche.php" method="GET">
        <input type="text" name="recherche" id="recherche">
        <input type="submit" value="Rechercher...">
    </form>
  <br> <br> <br>
    <form action="createtweet.php" method="POST">

        <label for="content">Posts: </label>
        <br><br>
        <textarea name="content" id="content" cols="30" rows="10"></textarea>
        <br>  <br>
        <input type="submit" value="Envoyer">
    </form>
    <br> <br> <br>


<?php
        require_once 'connexion.php';

        $requete = $database->prepare("SELECT * FROM tweet ORDER BY date DESC");
        // prepare = preparer la demande de donnée//
        $requete->execute();
   //excecute = excuter requete et recuperer//
        $requeteimage = $database->prepare("SELECT image FROM users WHERE id=1");
        $requeteimage->execute();
        
        $image = $requeteimage->fetchAll(PDO::FETCH_ASSOC)[0]["image"];        


        $tweet = $requete->fetchAll(PDO::FETCH_ASSOC);
        //fetchAll = transforme la réponse en qq chose de comprehensible pour le code(tableaux)//

        foreach($tweet as $article) { ?> 
        
            <div>
                <img src = <?php echo $image; ?>>
                <p><?php echo $article["content"]; ?></p>
                <span><?php echo $article["date"]; ?></span>
                <a href="supprimer.php?id=<?php echo $article['id']; ?>">Supprimer</a>
            <div></div>
        <?php
    }
    ?>

</body>
</html>