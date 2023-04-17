<?php 
    $dbrequest = new PDO('mysql:host=localhost;dbname=zebu_madagascar', 'root' );
    if(isset($_POST['addimage'])){
        $dataimage = [
            'img_link' => 'image/' . $_FILES['image']['name'],
            'img_file'=> $_FILES['image']['tmp_name']
        ];
        $data=[
            'nom' =>htmlspecialchars($_POST['nomcat']),
            'refprod' =>htmlspecialchars($_POST['refprod']),
            'Taille' =>htmlspecialchars($_POST['taille']),
            'Prix' =>htmlspecialchars($_POST['prix']),
            'img_link'=>$dataimage['img_link']
        ];
        move_uploaded_file($dataimage['img_file'],$dataimage['img_link']);
        $addimage =$dbrequest->prepare("INSERT INTO categorie(nomcat,taille,prix,image,refproduit) VALUE (:nom , :Taille, :Prix, :img_link, :refprod)");
        $addimage -> execute($data);
        //echo "tafiditra ny donner";
        header('location:../zebu/listecategorie.php');
    }
?>
