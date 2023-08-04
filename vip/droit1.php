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
<h3 >Droit facile</h3>
</div>


<div class="style23" style="font-size:1.1em">





</div></div>

</div>
</body>
</html>
