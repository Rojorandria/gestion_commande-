<?php
   
     $id_form=$_POST['refprod'];
    $nom_form=$_POST['Nomprod'];
    

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "zebu_madagascar";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        // $conn ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
       // $sql = "DELETE FROM eleve WHERE id=$id_form";
	
    $sql = "update produits set nomprod='".$nom_form."' where refprod =".$id_form."";
        
        $conn->exec($sql);
      //  echo "tafiditra ny donner";
      header('location:../liste/listeprod.php');
    } catch (PDOException $e) {
        echo $sql."<br>".$e->getMessage();
    }
    $conn=null;
?>

