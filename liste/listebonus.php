<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/liste.css">
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

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #f8d700;
  margin: auto;
  padding: 20px;
  border: 1px solid #f8d700;
  width: 80%;
  margin-top: -2cm;
}

/* The Close Button */
.close {
  color: #a71111;
  float: right;
  font-size: 50px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
    </style>
</head>
<body>
<div class="bare">
<img src="../image/zebu_mada.jpg" alt=""  width="120px" class="img1">

<h2 class="zb">Zébu de Madagascar </h2>
<div class="loi">
  <a href="../admin.php">   <input type="button" value="Accueil" class="bt"> </a>
  </div>

</div>
    <h2>Liste bonus</h2>
<table  >
        <tr>
            <th>Numero de bonus</th>
            <th>Numero de vendeur</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>nom categorie </th>
            <th>Prix </th>
            <th>Bonus</th>
            
            <th>Action</th>
        </tr>
       
<?PHP    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "zebu_madagascar";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        // $conn ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $resultat = $conn->prepare("SELECT numbonus,vendeur.numvend,vendeur.nomvend,vendeur.prenomvend,categorie.nomcat,categorie.prix,prix_bon  FROM bonus inner join vendeur inner join categorie on vendeur.numvend=bonus.num_vend and categorie.refcat=bonus.ref_cat");
        $resultat -> execute();
        $res=$resultat->fetchall();
        foreach ($res as $bonnus){
            $numbonnus=$bonnus['numbonus'];
           
        
            echo "<tr>";
                echo "<td>".$bonnus['numbonus']. "</td>";
                echo "<td>".$bonnus['numvend']. "</td>";
                echo "<td>".$bonnus['nomvend']. "</td>";
                echo "<td>".$bonnus['prenomvend']. "</td>";
                echo "<td>".$bonnus['nomcat']. "</td>";
                echo "<td>".$bonnus['prix']. "</td>";
                echo "<td>".$bonnus['prix_bon']. "</td>";
                
             echo "<td> <a href='../suprimer/suprbon.php?numbon=$numbonnus'  > Supprimer </a></td>";
               // echo "<td> <a href='../modifier/modificli.php?numcli=$numcli' > Modifier </a></td>";
                echo "<tr>";

        }
        
    } catch (PDOException $e) {
        echo $sql."<br>".$e->getMessage();
    }
    ?>
    </table>
    <a href="../ajout/bonus.php"> <input type="button" value="Ajouter"class="bt"></a>
    <button id="myBtn" class="bt">Total bonus</button>
   <a href="../suprimer/toutsupr.php"> <button class="bt"onclick='return confirmation()'>suprimer tous</button></a>
<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <H2 class="stc"> Numero vendeur </H2>
    <form action="../liste/listebonc.php" method="post">
    <p class="ltc">Num vendeur:</p>    
    <input type="text" name="numvend" id=""  class="lti">
    
    <br> <br>
    <input type="submit" value="Chercher" class="bt" >
    </form>
    
  </div>

</div>

</div>
<script>
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
function confirmation(){
  return confirm("Vous avez sur a la supression tous?");
}
</script>
</body>
</html>