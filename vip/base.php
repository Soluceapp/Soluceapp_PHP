<!DOCTYPE php>
<html>
<?php
session_start();

if (!isset($_SESSION['eleve']))
    header("location:../html/connect.php");

?>

<head>

<meta charset="UTF8">
<title>Palissy.chez.com</title>
<script src="../script/script1.js"></script>
<script src="../script/script2.js"></script>
<link rel="stylesheet" media="" href="../styles/style1.css">

</head>

<body>

<div   class="container-grid-maitre" > 
<header class="style1">

<!-- Entête du site -->
<h2 class="style5">SoluceApp</h2>
<p class="style6">Solution applicative de Monsieur Vervisch</p>

<!-- Liste des onglets -->
<div data-affiche_menu3="menu3.html"></div>
<script>affichemenu3();</script>
</header>



<br><br><br>
<div style="border-style:solid;">
<div class="style23" style="font-size:1.3em;">
<h3 >Liste des exercices VIP</h3>
</div>


<div class="style23" style="font-size:1.1em">
<?php
include '../vip/db-lecture.php'; 

echo $_SESSION['eleve'];echo ", ta note VIP du semestre est de : ";donnepts();echo " /20.";

$cat=0; 

verifcat(); 
 
switch ($cat) 
{
    case 1 :
        $hidden="style='display:inline'";$hidden2="style='display:none'";$hidden3="style='display:none'";
        break;
    case 2 :
        $hidden="style='display:none'";$hidden2="style='display:inline'";$hidden3="style='display:none'";
        break;
    case 3 :
        $hidden="style='display:none'";$hidden2="style='display:none'";$hidden3="style='display:inline'";
        break;
    case 4 :
        $hidden="style='display:inline'";$hidden2="style='display:inline'";$hidden3="style='display:none'";
        break;
    case 5 :
        $hidden="style='display:inline'";$hidden2="style='display:inline'";$hidden3="style='display:inline'";
        break;
    case 6 :
        $hidden="style='display:none'";$hidden2="style='display:none'";$hidden3="style='display:none'";
        break;
    default:
        $hidden2="style='display:none'";$hidden2="style='display:none'";$hidden3="style='display:none'";
        break;
}        


?>
</div>
<br>
<div class="style23" >
<div    class="dropdown"  <?php  echo $hidden;?>><button onclick="sub_menu28()" class="dropbtn">Facture<br>mystère </button><div id="myDropdown1" class="dropdown-content"></div>
</div>

<div  class="style23" >
<div   class="dropdown" <?php  echo $hidden2;?>><button onclick="sub_menu17()" class="dropbtn">Compta<br>facile </button><div id="myDropdown2" class="dropdown-content"></div>
</div>

<div  class="style23" >
<div   class="dropdown"  <?php  echo $hidden3;?>><button onclick="sub_menu29()" class="dropbtn">Droit<br>facile </button><div id="myDropdown3" class="dropdown-content"></div>
</div>



</div>
<br>

</div>
</div>
<br>
</div>
</div>

</body>
</html>
