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
            $refcom= $commande['numcom'];
            $num_cli=$commande['numcli'];
            $nom_cli=$commande['nomcli'];
            $prenom_cli=$commande['prenomcli'];
            $adrrese=$commande['adresse'];
            $telephone=$commande['telephone'];
            $nomprod=$commande['nomprod'];
            $nomcat=$commande['nomcat'];
            $taille=$commande['taille'];
            $qte=$commande['qtecom'];
            $prix= $commande['prix'];
            $total=$commande['qtecom']*$commande['prix'];
            $date=$commande['datecom'];
        
          $sql = " INSERT INTO `commande_livrer`( `num_com`, `num_client`, `nom_cli`, `prenom_cli`, `adresse_cli`, `telephone_cli`, `nom_prod`, `nom_cat`, `taill_cat`, `qte_cat`, `prix_cat`, `total_com`, `date_cat`) VALUES ('$refcom','$num_cli','$nom_cli','$prenom_cli','$adrrese','$telephone','$nomprod','$nomcat','$taille','$qte','$prix','$total','$date')";
          $conn->exec($sql);
            
          $sql = "DELETE FROM commande WHERE numcom=$numcom_form";
          $conn->exec($sql);
           
          //echo "tafiditra";

          header('location:../liste/listecom.php');
        }
        
    } catch (PDOException $e) {
        echo $sql."<br>".$e->getMessage();
    }
    ?>