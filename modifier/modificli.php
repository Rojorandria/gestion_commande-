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
            background-color: #ffffff; ;
        }
    </style>
</head>
<body>
    
<h2>Modification  Client</h2>
<?PHP 

$mcli_form=$_GET['numcli'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "zebu_madagascar";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        // $conn ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $resultat = $conn->prepare("SELECT*FROM client where numcli=$mcli_form");
        $resultat -> execute();
        $res=$resultat->fetchall();
        foreach ($res as $client){
            
            echo "<div class='mba'>";
            echo "<div class='mb'>";
                echo "<form action='../modifier/insertmodifi.php' method='post'>";
              
                echo"<input type='hidden' class='lti' name='Numcli' value=".$client['numcli'].">";
                echo "<p>Nom:</p>";
                echo"<input type='text' class='lti' name='Nomcli' value=".$client['nomcli'].">";
                echo "<p>Prenom:</p>";
                echo"<input type='text'class='lti' name='Prenom' value=".$client['prenomcli'].">";
                echo "<p>Adresse:</p>";
                echo"<input type='text' class='lti' name='Adresse' value=".$client['adresse'].">";
                echo "<p>Telephone:</p>";
                echo"<input type='text' class='lti' name='Telephone' value=".$client['telephone'].">";
                echo "<input type='submit' value='Modifier' class='bt'>";
               
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
