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
    <h2>Modification livreur</h2>

<?PHP 

$nlivr_form=$_GET['numlivr'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "zebu_madagascar";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        // $conn ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $resultat = $conn->prepare("SELECT*FROM livreur where numlivr=$nlivr_form");
        $resultat -> execute();
        $res=$resultat->fetchall();
        foreach ($res as $livreur){
            
            echo "<div class='mba'>";
            echo "<div class='mb'>";
                echo "<form action='../zebu/modifier/insertmodifilivr.php' method='post'>";
                echo "<input type='hidden' src=".$livreur['imagelivr']." width='120px' >  ";
                
                echo"<input type='hidden' class='lti' name='Numlivr' value=".$livreur['numlivr'].">";
                echo "<p>Nom:</p>";
                echo"<input type='text' class='lti' name='Nomlivr' value=".$livreur['nomlivr'].">";
                echo "<p>Prenom:</p>";
                echo"<input type='text'class='lti' name='Prenom' value=".$livreur['prenomlivr'].">";
                echo "<p>Telephone:</p>";
                echo"<input type='text' class='lti' name='Telephone' value=".$livreur['telephone'].">";
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

