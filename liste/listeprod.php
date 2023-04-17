<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/liste.css">
    <link rel="stylesheet" href="../style/index.css">
    <title>Document</title>
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
  .modal-content {
  background-color: #ffffff;}
    </style>
</head>
<body>
<div class="bare">
<img src="../image/zebu_mada2.jpg" alt=""  width="100px" height="70px" class="img1">

<h2 class="zb">ZEBU Madagascar </h2>
<div class="loi">
  <a href="../admin.php">   <input type="button" value="Accueil" class="bt"> </a>
  </div>

</div>
    <h1>Produits</h1>
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Chercher " title="Type in a name" class="che">
<table   id="myTable">
        <tr>
            <th>Numero</th>
            <th>Nom produits</th>
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
        $resultat = $conn->prepare("SELECT *  FROM produits ");
        $resultat -> execute();
        $res=$resultat->fetchall();
        foreach ($res as $produits){
            $refprod=$produits['refprod'];
           
        
            echo "<tr>";
                echo "<td>".$produits['refprod']. "</td>";
                echo "<td>".$produits['nomprod']. "</td>";
                
                
               echo "<td> <a href='../suprimer/suprprod.php?refprod=$refprod'  > Supprimer </a></td>";
               echo "<td> <a href='../modifier/modifprod.php?refprod=$refprod' > Modifier </a></td>";
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
    <H2 class="stc">Produits </H2>
    <form action="../insert/insertprod.php" method="post">
    <p>Nom produits:</p>    
    <input type="text" name="nomprod" id="" class="lti" required>
    
    <br> <br>
    <input type="submit" value="Enregistrer" class="bt" >
    </form>

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

function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
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
<a href=""></a>