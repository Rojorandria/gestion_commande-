<?php 
    $dbrequest = new PDO('mysql:host=localhost;dbname=zebu_madagascar', 'root' );
    if(isset($_POST['addimage'])){
        $dataimage = [
            'img_link' => 'image/' . $_FILES['image']['name'],
            'img_file'=> $_FILES['image']['tmp_name']
        ];
        $data=[
            'nom' =>htmlspecialchars($_POST['nom']),
            'prenom' =>htmlspecialchars($_POST['prenom']),
            'telephone' =>htmlspecialchars($_POST['telephone']),
            'img_link'=>$dataimage['img_link']
        ];
        move_uploaded_file($dataimage['img_file'],$dataimage['img_link']);
        $addimage =$dbrequest->prepare("INSERT INTO livreur(nomlivr,prenomlivr,telephone,imagelivr) VALUES (:nom , :prenom, :telephone, :img_link)");
        $addimage -> execute($data);
       // echo "tafiditra ny donner";
        header('location:../zebu/admin.php');
    }
?>
