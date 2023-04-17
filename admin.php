<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../zebu/style/index.css">
    <style>
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
.modal-content {
  background-color: #ffffff;}
  .bt1{
  width: 200px;
  height: 50px;
  background-color: #a71111;
  color: white;
  font-family: Berlin Sans FB Demi;
  border-radius: 15px;
  font-size: 20px;
  cursor: pointer;
}
    </style>
    <title>Admin</title>
</head>
<body>
<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit(); 
  }
?>
<div class="bare">
<img src="../zebu/image/zebu_mada2.jpg" alt=""  width="100px" height="70px" class="img1">

<h2 class="zb">ZEBU Madagascar </h2>
<div class="loi">
  <div class="dropdown">
  <button onclick="myFunction()" class="dropbtn"><div class="bar1"></div><div class="bar2"></div><div class="bar3"></div></button>
  <div id="myDropdown" class="dropdown-content">
    <a href="../zebu/liste/listeprod.php">Produits</a>
    <a href="../zebu/listecategorie.php">Categorie</a>
  </div>
  </div>
  </div>
<div class="adm"><h3>Admin</h3></div>
</div>



<div class="tab">
  
<button class="tablinks" onclick="openCity(event, 'Accueil')" id="defaultOpen">. Acuueil</button>
<br>
  <button class="tablinks" onclick="openCity(event, 'Client')">. Client</button>
  <button class="tablinks" onclick="openCity(event, 'Vendeur')">. Vendeur </button>
  <button class="tablinks" onclick="openCity(event, 'Livreur')" >. Livreur</button>
  <button class="tablinks" onclick="openCity(event, 'Facture')">. Facture</button>
  <br> <br> 
 <a href="../zebu/logout.php"> <button class="tablinks" onclick="return conf()" > Deconnexion </button></a>
</div>
<!-- coté accueil -->
<div id="Accueil" class="tabcontent">

<?php
require"Connection.php";
        
$sql="select count(numcli) from client ";
$req=mysqli_query($conn,$sql);
$sqla="select sum(total_com) from commande_livrer ";
$req1=mysqli_query($conn,$sqla);
$sqlb="select count(numcom) from commande ";
$req2=mysqli_query($conn,$sqlb);
$sqlc="select count(numcompass) from commande_passer ";
$req3=mysqli_query($conn,$sqlc);
$sqld="select count(numcomlivr) from commande_livrer ";
$req4=mysqli_query($conn,$sqld);
$sqle="select count(refprod) from produits ";
$req5=mysqli_query($conn,$sqle);
?>


   <div class="rect">
  
    <p class="num"> <?php
                while($client=mysqli_fetch_assoc($req)){
                ?>
                <?= $client["count(numcli)"]?> 
                <?php
                }
                ?></p> <br>
    <p class=" nl ">Client </p>
   </div>

  
<div class="recta">
  
  <p class="num"><?php
                while($client=mysqli_fetch_assoc($req5)){
                ?>
                <?= $client["count(refprod)"]?> 
                <?php
                }
                ?></p> <br>
  <p class=" nl ">Produits </p></a>
 </div>


<div class="rectb">
  
  <p class="num"> <?php
                while($coml=mysqli_fetch_assoc($req1)){
                ?>
                <?= $coml["sum(total_com)"]?> 
                <?php
                }
                ?> Ar</p> <br>
  <p class=" nl "> Revenu</p>
 </div>

 <div class="rectc">
  
 <a href="../zebu/liste/listecom.php"> <p class="nv">Nouveaux  commande </p> <br>
  <p class="nvn"><?php
                while($client=mysqli_fetch_assoc($req2)){
                ?>
                <?= $client["count(numcom)"]?> 
                <?php
                }
                ?></p> </a>
 
 </div>

 <div class="rectd">
  
 <a href="../zebu/liste/listecommandepasser.php"><p class="nv">Commande Passer </p> <br>
  <p class="nvn"><?php
                while($client=mysqli_fetch_assoc($req3)){
                ?>
                <?= $client["count(numcompass)"]?> 
                <?php
                }
                ?></p></a> 
 
 </div>

 <div class="recte">
  
 <a href="../zebu/liste/listecommandelivrer.php"> <p class="nv">Commande Livrer </p> <br>
  <p class="nvn"><?php
                while($client=mysqli_fetch_assoc($req4)){
                ?>
                <?= $client["count(numcomlivr)"]?> 
                <?php
                }
                ?></p></a>
 
 </div>

 <div class="rectf">
  
 <a href="../zebu/liste/listebonus.php"> <p class="nv">Bonnus</p> </a> <br>
  
 
 </div>
</div>


<!-- coté client -->
<div id="Client" class="tabcontent">
 
<h2 class="cl">Clients </h2>
<table  >
        <tr>
            <th>Numero</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Adresse</th>
            <th>Telephone</th>
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
        $resultat = $conn->prepare("SELECT *  FROM client ");
        $resultat -> execute();
        $res=$resultat->fetchall();
        foreach ($res as $client){
            $numcli=$client['numcli'];
           
        
            echo "<tr>";
                echo "<td>".$client['numcli']. "</td>";
                echo "<td>".$client['nomcli']. "</td>";
                echo "<td>".$client['prenomcli']. "</td>";
                echo "<td>".$client['adresse']. "</td>";
                echo "<td>".$client['telephone']. "</td>";
                echo "<td> <a href='../zebu/modifier/modificli.php?numcli=$numcli' >   <img src='../zebu/image/update-manager.png' width='40px'>  </a></td>";
                echo "<td> <a href='../zebu/suprimer/suprcli.php?numcli=$numcli'  >  <img src='../zebu/image/Trash Full.png'  width='50px'>  </a></td>";
                
                echo "<tr>";
                
    

        }
        
    } catch (PDOException $e) {
        echo $sql."<br>".$e->getMessage();
    }
    ?>
    

  
          
  
 
</table>
 <!-- Trigger/Open The Modal -->
<button id="myBtn" class="bt">Ajouter</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <H2 class="stc"> Client </H2>
    <form action="../zebu/insert/insert_cli.php" method="post">
    <p class="ltc">Nom:</p>    
    <input type="text" name="nomcli" id=""  class="lti">
    <p class="ltc">Prenom:</p>    
    <input type="text" name="prenomcli" id="" required  class="lti">
    <p class="ltc">Adresse:</p>    
    <input type="text" name="adresse" id=""   class="lti">
    <p class="ltc">Telephone:</p>    
    <input type="text" name="telephone" id=""  class="lti">
    <br> <br>
    <input type="submit" value="Enregistrer" class="bt1" >
    </form>

  </div>

</div>

</div>


<!-- coté Vendeur -->
<div id="Vendeur" class="tabcontent">

<h2 class="cl">Vendeur</h2>

<table >
        <tr>
            <th>Photo</th>
            <th>Numero</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Telephone</th>
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
        $resultat = $conn->prepare("SELECT*FROM vendeur ");
        $resultat -> execute();
        $res=$resultat->fetchall();
        foreach ($res as $vendeur){
            $id= $vendeur['numvend'];
            
                echo "<tr>";
                echo "<td> <img src=".$vendeur['image']." width='120px'> </td>  ";
                echo "<td>".$vendeur['numvend']. "</td>" ;
                echo "<td>".$vendeur['nomvend']. "</td>" ;
                echo "<td>".$vendeur['prenomvend']. "</td>" ;
                echo "<td>".$vendeur['telephone']. "</td>" ;
                echo "<td> <a href='../zebu/modifivend.php?numvend=$id'  > <img src='../zebu/image/update-manager.png' width='40px'>  </a></td>";
                echo "<td> <a href='../zebu/suprimer/suprvend.php?numvend=$id'  > <img src='../zebu/image/Trash Full.png'  width='50px'> </a></td>";
              
                echo "<tr>";
        }
        
    } catch (PDOException $e) {
        echo $sql."<br>".$e->getMessage();
    }
    ?>
 
</table>

<!-- Trigger/Open The Modal -->
<button id="myBtna" class="bt">Ajouter</button>

<!-- The Modal -->
<div id="myModala" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="closea">&times;</span>
    <H2 class="stc"> Vendeur </H2>
        
<form action="../zebu/insertvendeur.php" method="post" enctype="multipart/form-data">
    <p class="ltc">Nom :</p> <br>
   <input type="text" name="nom" id=""  class="lti">
   <p class="ltc">Prenom:</p> <br>
   <input type="text" name="prenom" id=""  class="lti">
   <p class="ltc">Telephone :</p> <br>
   <input type="text" name="telephone" id=""  class="lti">

    <p>Choisir l'image</p>
    <input type="file" name="image" id="" accept="image/png , image/jpeg"  class="lti">
    <br> <br>
    <button type="submit" name="addimage" class="bt1">Enregistrer</button >



</form>
    

  </div>

</div>
<a href="../zebu/insert/insertbadgevend.php"><input type="button" value="Imprimer badge" class="bdg"></a>
</div>
 
<!-- coté livreur -->
<div id="Livreur" class="tabcontent">
  
<h2 class="cl">Livreur </h2>

<table>
        <tr>
            <th>Photo</th>
            <th>Numero</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Telephone</th>
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
        $resultat = $conn->prepare("SELECT*FROM livreur");
        $resultat -> execute();
        $res=$resultat->fetchall();
        foreach ($res as $livreur){
            $id= $livreur['numlivr'];
            
                echo "<tr>";
                echo "<td> <img src=".$livreur['imagelivr']." width='120px' > </td>  ";
                echo "<td>".$livreur['numlivr']. "</td>" ;
                echo "<td>".$livreur['nomlivr']. "</td>" ;
                echo "<td>".$livreur['prenomlivr']. "</td>" ;
                echo "<td>".$livreur['telephone']. "</td>" ;
                echo "<td> <a href='../zebu/modiflivr.php?numlivr=$id'  > <img src='../zebu/image/update-manager.png' width='40px'>  </a></td>";
                echo "<td> <a href='../zebu/suprimer/suprlivr.php?numlivr=$id'  ><img src='../zebu/image/Trash Full.png'  width='50px'> </a></td>";
                echo "<tr>";
        }
        
    } catch (PDOException $e) {
        echo $sql."<br>".$e->getMessage();
    }
    ?>
 
</table>
<!-- Trigger/Open The Modal -->
<button id="myBtnb" class="bt">Ajouter</button>

<div id="myModalb" class="modal">

<!-- Modal content -->
<div class="modal-content">
  <span class="closeb">&times;</span>
  <H2 class="stc"> Livreur </H2>
      
<form action="../zebu/insertlivreur.php" method="post" enctype="multipart/form-data">
  <p class="ltc">Nom :</p> <br>
 <input type="text" name="nom" id=""  class="lti">
 <p class="ltc">Prenom:</p> <br>
 <input type="text" name="prenom" id=""  class="lti">
 <p class="ltc">Telephone :</p> <br>
 <input type="text" name="telephone" id=""  class="lti">

  <p>Choisir l'image</p>
  <input type="file" name="image" id="" accept="image/png , image/jpeg"  class="lti">
  <br> <br>
  <button type="submit" name="addimage" class="bt1">Enregistrer</button >



</form>
  

</div>
</div>
 <a href="../zebu/insert/insertbadgelivr.php"><input type="button" value="Imprimer badge" class="bdg"></a>
</div>

<!-- coté facture -->
<div id="Facture" class="tabcontent">
  <H2>Facture</H2>

  <form action="../zebu/insert/insert_fact.php" method="post">
    <p>numero client:</p>    
    <input type="text" name="numcli" id="" required class="lti" >
  
    
    <input type="submit" value="Enregistrer" class="bt" >
    </form>
</div>





  <script>
    function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();


//Menu 

function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
 
}

//modal form
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

//modala form
// Get the modal
var modala = document.getElementById("myModala");

// Get the button that opens the modal
var btna = document.getElementById("myBtna");

// Get the <span> element that closes the modal
var spana = document.getElementsByClassName("closea")[0];

// When the user clicks the button, open the modal 
btna.onclick = function() {
  modala.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
spana.onclick = function() {
  modala.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modala) {
    modala.style.display = "none";
  }
}


//modalb form
// Get the modal
var modalb = document.getElementById("myModalb");

// Get the button that opens the modal
var btnb = document.getElementById("myBtnb");

// Get the <span> element that closes the modal
var spanb = document.getElementsByClassName("closeb")[0];

// When the user clicks the button, open the modal 
btnb.onclick = function() {
  modalb.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
spanb.onclick = function() {
  modalb.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modalb) {
    modalb.style.display = "none";
  }
}
function conf(){
  return confirm("Souhaitez-vous vraiment vous déconnecter??");
}
  </script>
</body>
</html>