<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../zebu/style/liste.css">
  
    <title>Document</title>
    <style>
        body{
            background-color: #a71111;
        }
        .lti{
    background-color: #a71111;
    border-radius: 15px;
    color: white;
    font-family: Berlin Sans FB Demi;
    font-size: 23px;
    width: 15%;
    height: 35px;
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
  h2,p{
    color: #ffffff;
  }
    </style>
    
</head>
<body >
    <h2> Ajout un livreur </h2>
    <table width ="100%">
        <tr>
            <th>Photo</th>
            <th>Numero</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Telephone</th>
            
        
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
              
                echo "<tr>";
        }
        
    } catch (PDOException $e) {
        echo $sql."<br>".$e->getMessage();
    }
    ?>
    </table>
<?PHP 

$numcom_form=$_GET['numcom'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "zebu_madagascar";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        // $conn ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $resultat = $conn->prepare(" SELECT numcom, client.numcli , client.nomcli, client.prenomcli , client.adresse, client.telephone, produits.nomprod, categorie.nomcat, categorie.taille, categorie.prix, qtecom, datecom FROM commande inner join client inner join produits inner join categorie on client.numcli=commande.numclient and produits.refprod=commande.refproduit and categorie.refcat=commande.refcategorie  where numcom=$numcom_form");
        $resultat -> execute();
        $res=$resultat->fetchall();
        foreach ($res as $commande){
            $total=$commande['qtecom']*$commande['prix'];
            echo "<div class='mba'>";
            echo "<div class='mb'>";
                echo "<form action='../zebu/ajout/commande_passer.php'.php' method='post'>";
            echo    "<input type='hidden' class='form-control' name='numcom' value=".$commande['numcom'].">";

            echo    "<input type='hidden' class='form-control' name='numcli' value=".$commande['numcli'].">";

            echo    "<input type='hidden' class='form-control' name='nomcli' value=".$commande['nomcli'].">";

            echo  "<input type='hidden'class='form-control' name='prenomcli' value=".$commande['prenomcli'].">";
                
            echo    "<input type='hidden' class='form-control' name='adresse' value=".$commande['adresse'].">";
                
            echo    "<input type='hidden' class='form-control' name='telephone' value=".$commande['telephone'].">";
                
            echo    "<input type='hidden' class='form-control' name='nomprod' value=".$commande['nomprod'].">";
                
            echo    "<input type='hidden' class='form-control' name='nomcat' value=".$commande['nomcat'].">";
                 
            echo   "<input type='hidden' class='form-control' name='taille' value=".$commande['taille'].">";
                 
            echo    "<input type='hidden'class='form-control' name='prix' value=".$commande['prix'].">";
                
            echo    "<input type='hidden' class='form-control' name='qte' value=".$commande['qtecom'].">";

            echo    "<input type='hidden' class='form-control' name='total' value=".$total.">";
               
            echo   "<input type='hidden' class='form-control' name='dte' value=".$commande['datecom'].">";

                echo "<p>Numero livreur:</p>";
                echo " <input type='text'  class='lti' name='numlivr'>";
                echo "<input type='submit' value='Envoyer' class='bt'onclick='alert()'> "; 
               
                echo "</form>";
                echo "</div>";
                echo "</div>";
        }
        
    } catch (PDOException $e) {
        echo $sql."<br>".$e->getMessage();
    }
    ?>

<script>
    function alert(){
        alert("Votre commande a ete passer a livreur");
    }
</script>

</body>
</html>