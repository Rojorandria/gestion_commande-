<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../zebu/style/index.css">
    
    <style>
        body{
            background-color:#ffffff ;
        }
    </style>
</head>
<body>
    <h1>Modification de categorie</h1>

<?PHP 

$refcat_form=$_GET['refcat'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "zebu_madagascar";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        // $conn ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $resultat = $conn->prepare("SELECT refcat, produits.refprod,produits.nomprod, nomcat, taille,prix,image FROM categorie inner join produits on produits.refprod=categorie.refproduit  where refcat=$refcat_form");
        $resultat -> execute();
        $res=$resultat->fetchall();
        foreach ($res as $categorie){
            
            echo "<div class='mba'>";
            echo "<div class='mb'>";
                echo "<form action='../zebu/modifier/insertmodifcat.php' method='post'>";
                echo "<input type='hidden' src=".$categorie['image']." width='120px' >  ";
               
                echo"<input type='hidden' class='lti' name='refcat' value=".$categorie['refcat'].">";
                echo "<p>Reference produits:</p>";
                echo"<input type='text' class='lti' name='refprod' value=".$categorie['refprod'].">";
                echo "<p>Nom categorie:</p>";
                echo"<input type='text'class='lti' name='nomcat' value=".$categorie['nomcat'].">";
                echo "<p>Taille:</p>";
                echo"<input type='text' class='lti' name='taille' value=".$categorie['taille'].">";
                echo "<p>Prix:</p>";
                echo"<input type='text' class='lti' name='prix' value=".$categorie['prix'].">";
                echo "<input type='submit' value='modifier' class='bt'>";
               
                echo "</form>";
                echo "</div>";
                echo "</div>";
        }
        
    } catch (PDOException $e) {
        echo $sql."<br>".$e->getMessage();
    }
    ?>
</body>
</html>

