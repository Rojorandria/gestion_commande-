<?php
   
     $refcat_form=$_POST['refcat'];
    $refprod_form=$_POST['refprod'];
    $nomcat_form=$_POST['nomcat'];
    $taille_form=$_POST['taille'];
    $prix_form=$_POST['prix'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "zebu_madagascar";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        // $conn ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
       // $sql = "DELETE FROM eleve WHERE id=$id_form";
	
    $sql = "update categorie set refproduit='".$refprod_form."',nomcat='".$nomcat_form."',taille='".$taille_form."' where refcat =".$refcat_form."";
        
        $conn->exec($sql);
      //  echo "tafiditra ny donner";
      header('location:../listecategorie.php');
    } catch (PDOException $e) {
        echo $sql."<br>".$e->getMessage();
    }
    $conn=null;
?>
