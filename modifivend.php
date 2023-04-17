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
            background-color: #ffffff ;
        }
    </style>
</head>
<body>
    <h2>Modification vendeur</h2>
<?PHP 

$nvend_form=$_GET['numvend'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "zebu_madagascar";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        // $conn ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $resultat = $conn->prepare("SELECT*FROM vendeur where numvend=$nvend_form");
        $resultat -> execute();
        $res=$resultat->fetchall();
        foreach ($res as $vendeur){
            
            echo "<div class='mba'>";
            echo "<div class='mb'>";
                echo "<form action='../zebu/modifier/insertmodifvend.php' method='post'>";
                echo "<input type='hidden' src=".$vendeur['image']." width='120px' >  ";
                
                echo"<input type='hidden' class='lti' name='Numvend' value=".$vendeur['numvend'].">";
                echo "<p>Nom:</p>";
                echo"<input type='text' class='lti' name='Nomvend' value=".$vendeur['nomvend'].">";
                echo "<p>Prenom:</p>";
                echo"<input type='text'class='lti' name='Prenom' value=".$vendeur['prenomvend'].">";
                echo "<p>Telephone:</p>";
                echo"<input type='text' class='lti' name='Telephone' value=".$vendeur['telephone'].">";
                echo "<input type='submit' value='modifier'class='bt'>";
               
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

