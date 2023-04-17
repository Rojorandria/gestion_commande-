<?php
$refprod_form=$_GET['refprod'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "zebu_madagascar";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        // $conn ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE  FROM produits WHERE refprod=$refprod_form";
        $conn->exec($sql);
        //echo "tafiditra ny donner";
        header('location:../liste/listeprod.php');
    } catch (PDOException $e) {
        echo $sql."<br>".$e->getMessage();
    }
    $conn=null;
?>
    
    <a href=""></a>