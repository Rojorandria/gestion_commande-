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
    

<?PHP 

$refprod_form=$_GET['refprod'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "zebu_madagascar";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        // $conn ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $resultat = $conn->prepare("SELECT*FROM produits where refprod=$refprod_form");
        $resultat -> execute();
        $res=$resultat->fetchall();
        foreach ($res as $produits){
            
            echo "<div class='mba'>";
            echo "<div class='mb'>";
                echo "<form action='../modifier/insertmodifiprod.php' method='post'>";
                
                echo"<input type='hidden'  name='refprod' class='lti' value=".$produits['refprod'].">";
                echo "<p>Nom: </p>";
                echo"<input type='text' class='lti' name='Nomprod' value=".$produits['nomprod'].">";
                
                echo "<input type='submit' class='bt' value='Modifier'>";
               
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
