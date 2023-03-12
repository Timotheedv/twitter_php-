<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="createuser.php" method="POST">
        
        <label for="name">Nom</label>
        <input type="varchar" name="name" id="name">
    
        <label for="pseudo">Pseudo:</label>
        <input type="varchar" name="pseudo" id="pseudo">

        <label for="mail">mail</label>
        <input type="text" name="mail" id="mail">
        
        <label for="password">Password :</label>
        <input type="password" name ="password">

        <label for="image">Image</label>
        <input type="text" id="image" name="image">

        <input type="submit" value="Envoyer">
    </form>
</body>
</html>