<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: #f8d700;
        }
    </style>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/index.css">
    <style>
        body{
            background-color: #ffffff;
        }
    </style>
</head>
<body>
    <h1>Nouveaux Categorie</h1>
<form action="../insertcategorie.php" method="post" enctype="multipart/form-data">
    <p>Nom :</p> <br>
   <input type="text" name="nomcat" id="" class="lti"required>
   <p>reference produits :</p> <br>
   <input type="text" name="refprod" id="" class="lti"required>
   <p>Taille:</p> <br>
   <input type="text" name="taille" id=""class="lti"required>
   <p>Prix :</p> <br>
   <input type="text" name="prix" id=""       class="lti"  required  >
    <p>Choisir l'image</p>
    <input type="file" name="image" id="" accept="image/png , image/jpeg"><br>
    <button type="submit" name="addimage" class="bt">Enregistrer</button >



</form>

    
    
</body>
</html>
</body>
</html>