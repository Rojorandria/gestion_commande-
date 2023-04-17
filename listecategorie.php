<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorie</title>
    <link rel="stylesheet" href="../zebu/style/liste.css">
    <link rel="stylesheet" href="../zebu/style/index.css">
    <style>
                .loi{
    margin-top: -1.5cm;
    margin-left: 83%;
}
.bare{
    background-color: #a71111;
    height: 70px;
}
.adm{
    margin-top: -1.5cm;
    margin-left: 32%;
    color: white;
}

.img1{
    margin-left: 2cm;
}
 
.zb{
    margin-top: -1.5cm;
    margin-left: 45%;
    color: white;
}
.che{
  background-color: #ffffff;
    border-radius: 15px;
    color: black;
    font-family: Berlin Sans FB Demi;
    font-size: 23px;
    width: 30%;
    height: 35px;

    margin-left: 70%;
}
body{
        background-color: #a71111; 
      }
      .tab{
        border: 1px solid black;
        background-color:#ffffff;
      }
      /* Change background color of buttons on hover */
.tab button:hover {
  background-color: #a71111;
  color:white;
}
.tab button.active {
  background-color: #a71111;
  color: white;
}
.tab button {
  color: black;
}
.rect{
    background-color: #ffffff;
  color : black ; }
  .recta{
    background-color: #ffffff;
  color : black ; }
  .rectb{
    background-color: #ffffff;
  color : black ; }
  .rectc{
    background-color: #ffffff;
  color : black ; }
  .rectd{
    background-color: #ffffff;
  color : black ; }
  .recte{
    background-color: #ffffff;
  color : black ; }
  .rectf{
    background-color: #ffffff;
  color : black ; }
  .nv{
    color:black;
  }
  .nvn{
    color:black;
  }
  .tabcontent{
    background-color: #a71111;
    border: #a71111;
  }
  .bare{
    background-color: #ffffff;
    
    
  }
  .zb{
    color: black;
  }
  .dropbtn{
    background-color: #ffffff;
    color: black;
  }
  .bar1{
    background-color: black;
  }
  .bar2{
    background-color: black;
  }
  .bar3{
    background-color: black;
  }
  .adm{
    color: black;
  }
  th {
  background-color: #ffffff;
  color: black;}
  td{
    color:#ffffff;
  }
  table{
    border: #a71111;
  }
  .cl{
    color: #ffffff;
  }
  .dropdown a:hover {background-color: #ffffff;
                     color: black;
}
.bt{
  background-color: #ffffff;
  color: black;
}
.bdg{
  background-color: #ffffff;
  color: black;
}
h1{
  color: #ffffff;
}
    </style>
</head>
<body>
<div class="bare">
<img src="../zebu/image/zebu_mada2.jpg" alt=""  width="100px" height="70px" class="img1">

<h2 class="zb">ZEBU Madagascar </h2>
<div class="loi">
  <a href="../zebu/admin.php">   <input type="button" value="Accueil" class="bt"> </a>
  </div>

</div>
<h1>Categorie</h1>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Chercher " title="Type in a name" class="che">
<table  id="myTable">
        <tr>
            <th>Photo</th>
            <th>Reference categorie</th>
            <th>reference produits</th>
            <th>Nom produits</th>
            <th>Nom categorie</th>
            <th>Taille</th>
            <th>Prix</th>
            <th></th>
            <th></th>
        </tr>
<?PHP 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "zebu_madagascar";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        // $conn ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $resultat = $conn->prepare("SELECT refcat, produits.refprod,produits.nomprod, nomcat, taille,prix,image FROM categorie inner join produits on produits.refprod=categorie.refproduit ");
        $resultat -> execute();
        $res=$resultat->fetchall();
        foreach ($res as $categorie){
            $id= $categorie['refcat'];
            
                echo "<tr>";
                echo "<td> <img src=".$categorie['image']." width='120px' > </td>  ";
                echo "<td>".$categorie['refcat']. "</td>" ;
                echo "<td>".$categorie['refprod']. "</td>" ;
                echo "<td>".$categorie['nomprod']. "</td>" ;
                echo "<td>".$categorie['nomcat']. "</td>" ;
                echo "<td>".$categorie['taille']. "</td>" ;
                echo "<td>".$categorie['prix']. "Ar</td>" ;
                echo "<td> <a href='../zebu/suprimer/suprcat.php?refcat=$id'  > Supprimer </a></td>";
                echo "<td> <a href='../zebu/modifcat.php?refcat=$id'  > modifier </a></td>";
                echo "<tr>";
        }
        
    } catch (PDOException $e) {
        echo $sql."<br>".$e->getMessage();
    }
    ?>

</table >
<a href="../zebu/ajout/categorie.php"><input type="button" value="Ajouter" class="bt"></a>

<script>
    
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[4];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
</body>
</html>



