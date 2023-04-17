<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
<table border="3px" width ="80%">
        <tr>
            <th>Photo</th>
            <th>Numero</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Telephone</th>
            
            <th>Action</th>
        </tr>
<?PHP 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "zebu_madagascar";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        // $conn ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $resultat = $conn->prepare("SELECT*FROM livreur");
        $resultat -> execute();
        $res=$resultat->fetchall();
        foreach ($res as $livreur){
            $id= $livreur['numlivr'];
            
                echo "<tr>";
                echo "<td> <img src=".$livreur['imagelivr']." width='120px' > </td>  ";
                echo "<td>".$livreur['numlivr']. "</td>" ;
                echo "<td>".$livreur['nomlivr']. "</td>" ;
                echo "<td>".$livreur['prenomlivr']. "</td>" ;
                echo "<td>".$livreur['telephone']. "</td>" ;
                echo "<td> <a href='../zebu/suprimer/suprlivr.php?numlivr=$id'  > Supprimer </a></td>";
                echo "<td> <a href='../zebu/modiflivr.php?numlivr=$id'  > modifier </a></td>";
                echo "<tr>";
        }
        
    } catch (PDOException $e) {
        echo $sql."<br>".$e->getMessage();
    }
    ?>
  <a href="../index.php"> <input type="button" value="Accueil"></a>
</body>
</html>
</body>
</html>