<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


  

<form action="../insertvendeur.php" method="post" enctype="multipart/form-data">
    <p>Nom :</p> <br>
   <input type="text" name="nom" id="">
   <p>Prenom:</p> <br>
   <input type="text" name="prenom" id="">
   <p>Telephone :</p> <br>
   <input type="text" name="telephone" id="">

    <p>Choisir l'image</p>
    <input type="file" name="image" id="" accept="image/png , image/jpeg">
    <button type="submit" name="addimage">Enregistrer</button >



</form>


</body>
</html>