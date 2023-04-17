<?PHP 

$numcom_form=$_GET['numcom'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "zebu_madagascar";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        // $conn ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $resultat = $conn->prepare(" SELECT * from commande_passer where numcompass=$numcom_form");
        $resultat -> execute();
        $res=$resultat->fetchall();
        foreach ($res as $commande){
            $refcom= $commande['ref_comande'];
            $num_cli=$commande['num_client'];
            $nom_cli=$commande['nom_client'];
            $prenom_cli=$commande['prenom_client'];
            $adrrese=$commande['adrresse_client'];
            $telephone=$commande['phone_client'];
            $nomprod=$commande['nom_produit'];
            $nomcat=$commande['nom_categorie'];
            $taille=$commande['taille_categporie'];
            $qte=$commande['qte_commande'];
            $prix= $commande['prix_categorie'];
            $total=$commande['totale_commande'];
            $date=$commande['date_commande'];
        

        
          $sql = " INSERT INTO `commande_livrer`( `num_com`, `num_client`, `nom_cli`, `prenom_cli`, `adresse_cli`, `telephone_cli`, `nom_prod`, `nom_cat`, `taill_cat`, `qte_cat`, `prix_cat`, `total_com`, `date_cat`) VALUES ('$refcom','$num_cli','$nom_cli','$prenom_cli','$adrrese','$telephone','$nomprod','$nomcat','$taille','$qte','$prix','$total','$date')";
          $conn->exec($sql);
            
          $sql = "DELETE FROM commande_passer WHERE numcompass=$numcom_form";
          $conn->exec($sql);
           
          //echo "tafiditra";

          header('location:../liste/listecommandepasser.php');
        }
        
    } catch (PDOException $e) {
        echo $sql."<br>".$e->getMessage();
    }
    ?>
    