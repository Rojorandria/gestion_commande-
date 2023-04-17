<!DOCTYPE html>
<html>
<head>
 
</head>
<style>
      /*@import url("https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@600&display=swap");*/
      /* vietnamese */
@font-face {
  font-family: 'Sansita Swashed';
  font-style: normal;
  font-weight: 600;
  src: url(https://fonts.gstatic.com/s/sansitaswashed/v15/BXR8vFfZifTZgFlDDLgNkBydPKTt3pVCeYWqJnZSW2puXTIfeymE.woff2) format('woff2');
  unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
}
/* latin-ext */
@font-face {
  font-family: 'Sansita Swashed';
  font-style: normal;
  font-weight: 600;
  src: url(https://fonts.gstatic.com/s/sansitaswashed/v15/BXR8vFfZifTZgFlDDLgNkBydPKTt3pVCeYWqJnZSW2puXTMfeymE.woff2) format('woff2');
  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Sansita Swashed';
  font-style: normal;
  font-weight: 600;
  src: url(https://fonts.gstatic.com/s/sansitaswashed/v15/BXR8vFfZifTZgFlDDLgNkBydPKTt3pVCeYWqJnZSW2puXT0few.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
body {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background: linear-gradient(45deg, greenyellow, dodgerblue);
  font-family: "Sansita Swashed", cursive;
}
.center {
  position: relative;
  padding: 50px 50px;
  background: #fff;
  border-radius: 10px;
}
.center h1 {
  font-size: 2em;
  border-left: 5px solid dodgerblue;
  padding: 10px;
  color: #000;
  letter-spacing: 5px;
  margin-bottom: 60px;
  font-weight: bold;
  padding-left: 10px;
}
.center .inputbox {
  position: relative;
  width: 300px;
  height: 50px;
  margin-bottom: 50px;
}
.center .inputbox input {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  border: 2px solid #000;
  outline: none;
  background: none;
  padding: 10px;
  border-radius: 10px;
  font-size: 1.2em;
}
.center .inputbox:last-child {
  margin-bottom: 0;
}
.center .inputbox span {
  position: absolute;
  top: 14px;
  left: 20px;
  font-size: 1em;
  transition: 0.6s;
  font-family: sans-serif;
}
.center .inputbox input:focus ~ span,
.center .inputbox input:valid ~ span {
  transform: translateX(-13px) translateY(-35px);
  font-size: 1em;
}
.center .inputbox [type="submit"] {
  width: 50%;
  background: dodgerblue;
  color: #fff;
  border: #fff;
}
.center .inputbox:hover [type="submit"] {
  background: linear-gradient(45deg, greenyellow, dodgerblue);
}
p.errorMessage {
    background-color: #e66262;
    border: #AA4502 1px solid;
    padding: 5px 10px;
    color: #FFFFFF;
    border-radius: 3px;
}
.imge{
  margin-left: 4cm;
}
      </style>
<body>
<?php
require('connection.php');
session_start();

if (isset($_POST['username'])){
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username);
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT * FROM `users` WHERE username='$username' and password='".hash('sha256', $password)."'";
  $result = mysqli_query($conn,$query) or die(mysql_error());
  $rows = mysqli_num_rows($result);
  if($rows==1){
      $_SESSION['username'] = $username;
      header("Location: admin.php");
  }else{
    $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
  }
}
?>

<div class="center">
  <img src="../zebu/image/zebu_mada2.jpg" alt="" srcset=""width="60px" class="imge">
<form class="box" action="" method="post" name="login">

<h1 class="box-title">ZEBU Madagascar</h1>
<div class="inputbox">
<input type="text"  name="username" placeholder="Nom d'utilisateur">

</div>
<div class="inputbox">
<input type="password"  name="password" placeholder="Mot de passe">

</div>
<div class="inputbox">
<input type="submit" value="Connexion " name="submit" >
</div>
<!-- coté livreur<p class="box-register">Vous êtes nouveau ici? <a href="register.php">S'inscrire</a></p> -->
<?php if (! empty($message)) { ?>
    <p class="errorMessage"><?php echo $message; ?></p>
<?php } ?>
</form>
</div>
</body>
</html>