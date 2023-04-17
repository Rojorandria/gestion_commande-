<?php
$numcom_form=$_GET['numcom'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "zebu_madagascar";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        // $conn ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM commande  WHERE numcom=$numcom_form";
        $conn->exec($sql);
        //echo "tafiditra ny donner";
        header('location:../liste/listecom.php');
    } catch (PDOException $e) {
        echo $sql."<br>".$e->getMessage();
    }
    $conn=null;
?>
    
    <a href=""></a>