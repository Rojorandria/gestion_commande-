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

<h2 class="zb">ZEBU Madagascar </h2>
<div class="loi">
  <a href="../admin.php">   <input type="button" value="Accueil" class="bt"> </a>
  </div>

</div>
<h2>Nouveaux commande </h2>
<table  width ="100%">
        <tr>
            
            <th>Numero client</th>
            <th>Nom client</th>
            <th>Prenom </th>
            <th>Adresse</th>
            <th>Telephone</th>
            <th>Nom Produits</th>
            <th>Categorie </th>
            <th>Taille</th>
            <th>QTE com </th>
            <th>Prix </th>
            <th>Totale </th>
            <th>Date </th>

            <th></th>
            <th></th>
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
        $resultat = $conn->prepare("SELECT numcom, client.numcli , client.nomcli, client.prenomcli , client.adresse, client.telephone, produits.nomprod, categorie.nomcat, categorie.taille, categorie.prix, qtecom, datecom FROM commande inner join client inner join produits inner join categorie on client.numcli=commande.numclient and produits.refprod=commande.refproduit and categorie.refcat=commande.refcategorie order by datecom asc");
        $resultat -> execute();
        $res=$resultat->fetchall();
        foreach ($res as $commande){
            $numcom= $commande['numcom'];
            $total=$commande['qtecom']*$commande['prix'];
        
            echo "<tr>";
                
                echo "<td>". $commande['numcli']. "</td>";
                echo "<td>". $commande['nomcli']. "</td>";
                echo "<td>". $commande['prenomcli']. "</td>";
                echo "<td>". $commande['adresse']. "</td>";
                echo "<td>". $commande['telephone']. "</td>";
                echo "<td>". $commande['nomprod']. "</td>";
                echo "<td>". $commande['nomcat']. "</td>";
                echo "<td>". $commande['taille']. "</td>";
                echo "<td>". $commande['qtecom']. "</td>";
                echo "<td>". $commande['prix']. "Ar </td>";
                echo "<td>". $total. " Ar </td>";
                echo "<td>". $commande['datecom']. "</td>";
                echo "<td> <a href='../suprimer/suprcom.php?numcom=$numcom'  ><img src='../image/Trash Full.png' width='50px'> </a></td>";
                echo "<td><a href='../modifier/modifcom.php?numcom=$numcom' >  <img src='../image/update-manager.png' width='40px'>  </a></td>";
                echo "<td> <a href='../ajout/commande_livrer.php?numcom=$numcom' > Livrer </a></td>";
                echo "<td> <a href='../insertcomm_pass.php?numcom=$numcom' >passer </a></td>";
                echo "<tr>";

        }
        
    } catch (PDOException $e) {
        echo $sql."<br>".$e->getMessage();
    }
    ?>
    </table>

     <!-- Trigger/Open The Modal -->
<a href="../ajoutcom.php"><button  class="bt">Ajouter</button></a>



  
  </div>

</div>
  

</body>
</html>
<a href=""></a>