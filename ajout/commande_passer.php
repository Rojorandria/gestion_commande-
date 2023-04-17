<?php
   
    $numcom_form=$_POST['numcom'];
    $numcli_form_form=$_POST['numcli'];
    $nomcli=$_POST['nomcli'];
    $prenomcli_form=$_POST['prenomcli'];
    $adreese_form=$_POST['adresse'];
    $telephone_form=$_POST['telephone'];
    $nomprod_form=$_POST['nomprod'];
    $nomcat_form=$_POST['nomcat'];
    $taille_form=$_POST['taille'];
    $prix_form=$_POST['prix'];
    $qte_form=$_POST['qte'];
    $date_form=$_POST['dte'];
    $total_form=$_POST['total'];
    $numlivr_form=$_POST['numlivr'];
   

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "zebu_madagascar";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        $resultat = $conn->prepare(" SELECT * FROM livreur where  numlivr=$numlivr_form ");
        $resultat -> execute();
        $res=$resultat->fetchall();
        foreach ($res as $livreur){
            $numlivr= $livreur['numlivr'];
            $nom_livr=$livreur['nomlivr'];
            $prenomlivr=$livreur['prenomlivr'];
            $telephone=$livreur['telephone'];
         
           $sql = "INSERT INTO commande_passer( num_livr, nom_livr, prenom_livr, telephone_livr, ref_comande, num_client, nom_client, prenom_client, adrresse_client, phone_client, nom_produit, nom_categorie, taille_categporie, prix_categorie, qte_commande, totale_commande, date_commande) VALUES ('$numlivr_form','$nom_livr','$prenomlivr','$telephone','$numcom_form','$numcli_form_form','$nomcli','$prenomcli_form','$adreese_form','$telephone_form','$nomprod_form','$nomcat_form','$taille_form','$prix_form','$qte_form','$total_form','$date_form')";
            $conn->exec($sql);
     
           $sql = "DELETE FROM commande WHERE numcom=$numcom_form";
            $conn->exec($sql);
             
            //echo"Donner enregistrer";
            header('location:../liste/listecom.php');
        }
    } catch (PDOException $e) {
        echo $sql."<br>".$e->getMessage();
    }
    $conn=null;
?>