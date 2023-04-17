<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    
</head>
<body>
    

<?PHP 

$numcom_form=$_GET['numcom'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "zebu_madagascar";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        // $conn ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $resultat = $conn->prepare("SELECT*FROM commande where numcom=$numcom_form");
        $resultat -> execute();
        $res=$resultat->fetchall();
        foreach ($res as $commande){
            
            echo "<div class='mba'>";
            echo "<div class='mb'>";
                echo "<form action='../modifier/insertmodifcom.php' method='post'>";
                echo "Numero:";
                echo"<input type='text' class='form-control' name='numcom' value=".$commande['numcom'].">";
                echo "Numero client:";
                echo"<input type='text' class='form-control' name='numcli' value=".$commande['numclient'].">";
                echo "Reference produits:";
                echo"<input type='text' class='form-control' name='refprod' value=".$commande['refproduit'].">";
                echo "Reference categorie:";
                echo"<input type='text'class='form-control' name='refcat' value=".$commande['refcategorie'].">";
                echo "Quantiter commande:";
                echo"<input type='text' class='form-control' name='qte' value=".$commande['qtecom'].">";
                echo "Date de commande :";
                echo"<input type='date' class='form-control' name='dte' value=".$commande['datecom'].">";
                echo "<input type='submit' value='Modifier'>";
               
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
