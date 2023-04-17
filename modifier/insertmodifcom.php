<?php
   
     $numcom_form=$_POST['numcom'];
    $numcli_form=$_POST['numcli'];
    $refprod_form=$_POST['refprod'];
    $refcat_form=$_POST['refcat'];
    $qte_form=$_POST['qte'];
    $dte_form=$_POST['dte'];
    

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "zebu_madagascar";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        // $conn ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
       // $sql = "DELETE FROM eleve WHERE id=$id_form";
	
    $sql = "update commande set numclient='".$numcli_form."',refproduit='".$refprod_form."',refcategorie='".$refcat_form."',qtecom='".$qte_form."',datecom='".$dte_form."' where numcom =".$numcom_form."";
        
        $conn->exec($sql);
      //  echo "tafiditra ny donner";
      header('location:../liste/listecom.php');
    } catch (PDOException $e) {
        echo $sql."<br>".$e->getMessage();
    }
    $conn=null;
?>
