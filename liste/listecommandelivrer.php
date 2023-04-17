<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/liste.css">
    <style>
         body{
            background-color: #a71111;
        }
                       .loi{
    margin-top: -1.5cm;
    margin-left: 83%;
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

.img1{
    margin-left: 2cm;
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
    color: black;}
    h2{
        color: #ffffff;
    }
    </style>
</head>
<body>
<div class="bare">
<img src="../image/zebu_mada2.jpg" alt=""  width="100px" height="70px" class="img1">

<h2 class="zb">ZEBU Madagascar </h2>
<div class="loi">
  <a href="../admin.php">   <input type="button" value="Accueil" class="bt"> </a>
  </div>

</div>
    
    <h2>Commande livrer </h2>
<table   width ="100%">
        <tr> 
            <th>Numero commande</th>
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
        $resultat = $conn->prepare("SELECT * from commande_livrer ");
        $resultat -> execute();
        $res=$resultat->fetchall();
        foreach ($res as $commande){
            $numcom= $commande['numcomlivr'];
            $total=$commande['qte_cat']*$commande['prix_cat'];
        
            echo "<tr>";
               
                echo "<td>". $commande['num_com']. "</td>";
                echo "<td>". $commande['num_client']. "</td>";
                echo "<td>". $commande['nom_cli']. "</td>";
                echo "<td>". $commande['prenom_cli']. "</td>";
                echo "<td>". $commande['adresse_cli']. "</td>";
                echo "<td>". $commande['telephone_cli']. "</td>";
                echo "<td>". $commande['nom_prod']. "</td>";
                echo "<td>". $commande['nom_cat']. "</td>";
                echo "<td>". $commande['taill_cat']. "</td>";
                echo "<td>". $commande['qte_cat']. "</td>";
                echo "<td>". $commande['prix_cat']. "Ar </td>";
                echo "<td>". $commande['total_com']. " Ar </td>";
                echo "<td>". $commande['date_cat']. "</td>";
                echo "<td> <a href='../suprimer/suprcomlivrer.php?numcom=$numcom'  > Supprimer </a>";
            //   echo "<td> <a href='../modifier/modifcom.php?numcom=$numcom' > Modifier </a></td>";
             //  echo "<td> <a href='../ajout/commande_livrer.php?numcom=$numcom' > Livrer </a></td>";
                echo "<tr>";

        }
        
    } catch (PDOException $e) {
        echo $sql."<br>".$e->getMessage();
    }
    ?>
    </table>


</body>
</html>