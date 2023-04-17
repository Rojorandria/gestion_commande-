<?php
$nvend_form=$_GET['numvend'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "zebu_madagascar";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        // $conn ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE  FROM vendeur WHERE numvend=$nvend_form";
        $conn->exec($sql);
        //echo "tafiditra ny donner";
        header('location:../admin.php ');
    } catch (PDOException $e) {
        echo $sql."<br>".$e->getMessage();
    }
    $conn=null;
?>
    
    