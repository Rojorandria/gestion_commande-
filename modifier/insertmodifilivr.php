<?php
   
     $id_form=$_POST['Numlivr'];
    $nom_form=$_POST['Nomlivr'];
    $prenom_form=$_POST['Prenom'];
    $adresse_form=$_POST['Adresse'];
    $telephone_form=$_POST['Telephone'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "zebu_madagascar";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        // $conn ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
       // $sql = "DELETE FROM eleve WHERE id=$id_form";
	
    $sql = "update livreur set nomlivr='".$nom_form."',prenomlivr='".$prenom_form."',telephone='".$telephone_form."' where numlivr =".$id_form."";
        
        $conn->exec($sql);
      //  echo "tafiditra ny donner";
      header('location:../admin.php');
    } catch (PDOException $e) {
        echo $sql."<br>".$e->getMessage();
    }
    $conn=null;
?>
