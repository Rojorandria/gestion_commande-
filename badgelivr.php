<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .bad{
            margin-left: 20%;
            margin-top: 5cm;
            border:solid 3px;
            width: 500px;
            height: 300px;
        }
        .pha{
            margin-left: 6cm;
        }
        .bad1{
            border: solid 3px;
            width: 250px;
            height: 180px;
            margin-left: 5.5cm;
            margin-top: -5cm;
        }
        .ph{
            margin-left: 1cm;
        }
        .telac{
            margin-left: 1.5cm;
            margin-top: 0cm;
        }
        .nom{margin-left: 0.5cm;}
        .pren{margin-left: 0.5cm;}
        .tel{margin-left: 0.5cm;}
        .ref{margin-left: 0.5cm;}
    </style>
</head>
<body>

       
<?PHP 
    $numlivr=$_POST['numlivr'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "zebu_madagascar";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        // $conn ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $resultat = $conn->prepare("SELECT*FROM livreur where numlivr=$numlivr");
        $resultat -> execute();
        $res=$resultat->fetchall();
        foreach ($res as $livreur){
            $id= $livreur['numlivr'];
            
                echo "<div class='bad'>";
                echo "<p class='pha'> <img src='../zebu/image/zebu_mada2.jpg' width='90px' height='70px' > </td>  ";
                echo "<p class='ph'> <img src=".$livreur['imagelivr']." width='120px' > </td>  ";
                echo "<p class='telac'>Signature</p>" ;
                echo "<div class='bad1'>";
                echo "<p class='nom'>A.".$livreur['nomlivr']. "</p>" ;
                echo "<p class='pren'>B. ".$livreur['prenomlivr']. "</p>" ;
                echo "<p class='tel'>C.".$livreur['telephone']. "</p>" ;
                echo "<p class='tel'>E.Livreur</p>" ;
                echo "<p class='ref'>D.".$livreur['numlivr']. "</p>" ;
                echo "</div>";
                echo "</div>";
        }
        
    } catch (PDOException $e) {
        echo $sql."<br>".$e->getMessage();
    }
    ?>

</body>
</html>
</body>
</html>