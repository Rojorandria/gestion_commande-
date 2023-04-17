<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commande passer</title>
    <link rel="stylesheet" href="../style/liste.css">
    <style>
                .loi{
    margin-top: -1.5cm;
    margin-left: 83%;
}



.img1{
    margin-left: 2cm;
}
 

body{
            background-color: #a71111;
        }
 
.bare{
    background-color: #ffffff;
    height: 70px;
}
.adm{
    margin-top: -1.5cm;
    margin-left: 32%;
    color: black;
}


 
.zb{
    margin-top: -1.5cm;
    margin-left: 45%;
    color: black;
}
   
th {
  background-color: #ffffff;
  color: black;}
  td{
    color:#ffffff;
  }
  table{
    border: #a71111;
  }
.bt{
    background-color: #ffffff;
    color: black;
}
h2{
    color: #ffffff;
}
    </style>
</head>
<body>
<div class="bare">
<img src="../image/zebu_mada2.jpg" alt=""  width="100px" height="70px" class="img1">

<h2 class="zb">Zébu de Madagascar </h2>
<div class="loi">
  <a href="../admin.php">   <input type="button" value="Accueil" class="bt"> </a>
  </div>

</div>
    <h2>Commande passer</h2>
<table   width ="100%">
        <tr> 
            <th>Numero commande</th>
            <th>Numero livreur</th>
            <th>Numero client</th>
            <th>Nom client</th>
            <th>Prenom </th>
            <th>Adresse</th>
            <th>Telephone</th>
            <th>Nom Produits</th>
            <th>Categorie </th>
            <th>Taille</th>
            <th>Quantiter com </th>
            <th>Prix </th>
            <th>Totale </th>
            <th>Date </th>

            <th></th>
            <th></th>

        </tr>
       
<?PHP 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "zebu_madagascar";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        // $conn ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $resultat = $conn->prepare("SELECT * from commande_passer order by num_livr");
        $resultat -> execute();
        $res=$resultat->fetchall();
        foreach ($res as $commande){
            $numcom= $commande['numcompass'];
     
        
            echo "<tr>";
               
                echo "<td>". $commande['ref_comande']. "</td>";
                echo "<td>". $commande['num_livr']. "</td>";
                echo "<td>". $commande['num_client']. "</td>";
                echo "<td>". $commande['nom_client']. "</td>";
                echo "<td>". $commande['prenom_client']. "</td>";
                echo "<td>". $commande['adrresse_client']. "</td>";
                echo "<td>". $commande['phone_client']. "</td>";
                echo "<td>". $commande['nom_produit']. "</td>";
                echo "<td>". $commande['nom_categorie']. "</td>";
                echo "<td>". $commande['taille_categporie']. "</td>";
                echo "<td>". $commande['qte_commande']. "</td>";
                echo "<td>". $commande['prix_categorie']. "Ar </td>";
                echo "<td>". $commande['totale_commande']. " Ar </td>";
                echo "<td>". $commande['date_commande']. "</td>";
                echo "<td> <a href='../ajout/commnde_livrerpass.php?numcom=$numcom' > Livrer </a></td>";
                echo "<td> <a href='../suprimer/suprcomlivrer.php?numcom=$numcom'  > Supprimer </a>";
            //   echo "<td> <a href='../modifier/modifcom.php?numcom=$numcom' > Modifier </a></td>";
                
                echo "<tr>";

        }
        
    } catch (PDOException $e) {
        echo $sql."<br>".$e->getMessage();
    }
    ?>
    </table>


</body>
</html>