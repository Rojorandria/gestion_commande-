<?php
$nlivr_form=$_GET['numlivr'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "zebu_madagascar";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        // $conn ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE  FROM livreur WHERE numlivr=$nlivr_form";
        $conn->exec($sql);
        //echo "tafiditra ny donner";
        header('location:../admin.php ');
    } catch (PDOException $e) {
        echo $sql."<br>".$e->getMessage();
    }
    $conn=null;
?>
    
    