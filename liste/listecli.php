<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table  border="1px" width ="80%">
        <tr>
            <th>Numero</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Adresse</th>
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
        $resultat = $conn->prepare("SELECT *  FROM client ");
        $resultat -> execute();
        $res=$resultat->fetchall();
        foreach ($res as $client){
            $numcli=$client['numcli'];
           
        
            echo "<tr>";
                echo "<td>".$client['numcli']. "</td>";
                echo "<td>".$client['nomcli']. "</td>";
                echo "<td>".$client['prenomcli']. "</td>";
                echo "<td>".$client['adresse']. "</td>";
                echo "<td>".$client['telephone']. "</td>";
                
                echo "<td> <a href='../suprimer/suprcli.php?numcli=$numcli'  > Supprimer </a></td>";
                echo "<td> <a href='../modifier/modificli.php?numcli=$numcli' > Modifier </a></td>";
                echo "<tr>";

        }
        
    } catch (PDOException $e) {
        echo $sql."<br>".$e->getMessage();
    }
    ?>
    </table>
    <a href="../index.php"> <input type="button" value="Accueil"></a>

</body>
</html>
<a href=""></a>