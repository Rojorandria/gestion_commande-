<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../zebu/style/ajoutcom.css">
    <title>Document</title>
    <style>
        body{
            background-color:#a71111;
        }
.tcat{
    margin-left: 60%;
    margin-top: 1cm;
    
}
.tcli{
 margin-left: 0%;
    margin-top: -8cm;
}
.aco{
    margin-top: 2cm;
    margin-left: 0cm;
    
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
  .zb{
    color: black;
  }
  .bare{
    background-color: #ffffff;
  }
  </style>
</head>
<body>
<div class="bare">
<img src="../zebu/image/zebu_mada2.jpg" alt=""  width="100px" height="70px" class="img1">

<h2 class="zb">ZEBU Madagascar </h2>


</div>


 
    <div class="tcat">
        <h2>Categorie</h2>
<table border="3px" width ="90%"   font-family= "Berlin Sans FB Demi";>
        <tr>
            <th>Photo</th>
            <th>Reference categorie</th>
            <th>reference produits</th>
            <th>Nom produits</th>
            <th>Nom categorie</th>
            <th>Taille</th>
            <th>Prix</th>
            
           
        </tr>
<?PHP 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "zebu_madagascar";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        // $conn ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $resultat = $conn->prepare("SELECT refcat, produits.refprod,produits.nomprod, nomcat, taille,prix,image FROM categorie inner join produits on produits.refprod=categorie.refproduit ");
        $resultat -> execute();
        $res=$resultat->fetchall();
        foreach ($res as $categorie){
            $id= $categorie['refcat'];
            
                echo "<tr>";
                echo "<td> <img src=".$categorie['image']." width='100px' > </td>  ";
                echo "<td>".$categorie['refcat']. "</td>" ;
                echo "<td>".$categorie['refprod']. "</td>" ;
                echo "<td>".$categorie['nomprod']. "</td>" ;
                echo "<td>".$categorie['nomcat']. "</td>" ;
                echo "<td>".$categorie['taille']. "</td>" ;
                echo "<td>".$categorie['prix']. "</td>" ;
            
                echo "<tr>";
        }
        
    } catch (PDOException $e) {
        echo $sql."<br>".$e->getMessage();
    }
    
    ?>
</table>
    </div>
 <div class="tcli">
    <h2>Clients</h2>
    <table  border="1px" width ="45%">
        <tr>
            <th>Numero</th>
            <th>Nom</th>
            <th>Prenom</th>
          
            
          
        </tr>
       
<?PHP 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "zebu_madagascar";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        // $conn ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $resultat = $conn->prepare("SELECT *  FROM client order by numcli desc limit 5 ");
        $resultat -> execute();
        $res=$resultat->fetchall();
        foreach ($res as $client){
            $numcli=$client['numcli'];
           
        
            echo "<tr>";
                echo "<td>".$client['numcli']. "</td>";
                echo "<td>".$client['nomcli']. "</td>";
                echo "<td>".$client['prenomcli']. "</td>";
          
                
           
                echo "<tr>";

        }
        
    } catch (PDOException $e) {
        echo $sql."<br>".$e->getMessage();
    }
    ?>
    </table>
    </div>
   <div class="aco">
    <H2 class="stc"> Commande</H2>
    
    <form action="../zebu/insert/insertcom.php" method="post">   
    <input type="text" name="numcli" id="" required class="lti" placeholder="Numero client">   
    <input type="text" name="refprod" id="" required class="lti" placeholder="Reference produits">   
    <input type="text" name="refcat" id="" required class="lti" placeholder="Refeference categorie"> 
    <input type="text" name="qte" id="" required class="lti" placeholder="Quantiter produits">   
    <input type="date" name="dte" id="" required class="lti">
    
    <input type="submit" value="Enregistrer"  class="bt">
    </form>
    </div>
    
</body>
</html>