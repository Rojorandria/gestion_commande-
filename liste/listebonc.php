<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/liste.css">
    <link rel="stylesheet" href="../style/index.css">
    <style>
                        .loi{
    margin-top: -1.5cm;
    margin-left: 83%;
}
.bare{
    background-color: #a71111;
    height: 70px;
}
.adm{
    margin-top: -1.5cm;
    margin-left: 32%;
    color: white;
}

.img1{
    margin-left: 2cm;
}
 
.zb{
    margin-top: -1.5cm;
    margin-left: 45%;
    color: white;
}

    </style>
</head>
<body>
<div class="bare">
<img src="../image/zebu_mada.jpg" alt=""  width="120px" class="img1">

<h2 class="zb">Zébu de Madagascar </h2>
<div class="loi">
  <a href="../admin.php">   <input type="button" value="Accueil" class="bt"> </a>
  </div>

</div>
<h2>Total prix vendeur</h2>
<table>
        <tr>
         
            <th>Numero</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Telephone</th>
            <th>Prix</th>
            <th>Total</th>
        </tr>
<?PHP 
    $numvend=$_POST['numvend'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "zebu_madagascar";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        // $conn ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $resultat = $conn->prepare("SELECT numbonus,vendeur.numvend,vendeur.nomvend,vendeur.prenomvend,categorie.nomcat,categorie.prix,prix_bon  FROM bonus inner join vendeur inner join categorie on vendeur.numvend=bonus.num_vend and categorie.refcat=bonus.ref_cat where numvend=$numvend");
        $resultat -> execute();
        $res=$resultat->fetchall();
        foreach ($res as $bonnus){
            $numbonnus=$bonnus['numbonus'];
           
        
            echo "<tr>";
              
                echo "<td>".$bonnus['numvend']. "</td>";
                echo "<td>".$bonnus['nomvend']. "</td>";
                echo "<td>".$bonnus['prenomvend']. "</td>";
                echo "<td>".$bonnus['nomcat']. "</td>";
                echo "<td>".$bonnus['prix']. " Ar</td>";
                echo "<td>".$bonnus['prix_bon']. " Ar</td>";
           
              
        }
        
    } catch (PDOException $e) {
        echo $sql."<br>".$e->getMessage();
    }
    ?>
    
</table>



<?PHP 
    $numvend=$_POST['numvend'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "zebu_madagascar";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        // $conn ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $resultat = $conn->prepare("SELECT numbonus,vendeur.numvend,vendeur.nomvend,vendeur.prenomvend,categorie.nomcat,categorie.prix,sum(prix_bon)  FROM bonus inner join vendeur inner join categorie on vendeur.numvend=bonus.num_vend and categorie.refcat=bonus.ref_cat where numvend=$numvend");
        $resultat -> execute();
        $res=$resultat->fetchall();
        foreach ($res as $bonnus){
            $numbonnus=$bonnus['numbonus'];
            
           
        
            echo "<tr>";
              
                echo "<p>Total =  ".$bonnus['sum(prix_bon)']. "Ar</p>";
               
           
              
        }
        
    } catch (PDOException $e) {
        echo $sql."<br>".$e->getMessage();
    }
    ?>
    

</body>
</html>
