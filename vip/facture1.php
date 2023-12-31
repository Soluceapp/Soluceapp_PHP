<!DOCTYPE php>
<html>
<?php
if(!isset($_SESSION)){session_start();}

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
<div >
<div class="style23" style="font-size:1.3em;">
<h3 >Facture mystère</h3>
</div>

<p class="style23" style="font-size:1.3em;">Consigne : Trouvez le montant inexact entre ces trois documents qui crée une erreur. Puis trouvez le montant qu'il aurait fallu indiquer. Vous gagnez un point par erreur trouvée.</p>
<br>
<?php
// Génère des données aléatoires de matrice
$x1=rand(10,100);$x2=rand(10,100);$x3=rand(10,100);$x4=rand(10,100);$x5=rand(10,100);
$y1=rand(10,100);$y2=rand(10,100);$y3=rand(10,100);$y4=rand(10,100);$y5=rand(10,100);
$z1=rand(50000,60000);$z2=rand(50000,60000);$z3=rand(50000,60000);$z4=rand(50000,60000);$z5=rand(50000,60000);

// Crée une matrice identitaire à modifier selon un hasard
$p1=1;$p2=1;$p3=1;$p4=1;$p5=1;
$q1=1;$q2=1;$q3=1;$q4=1;$q5=1;
$r1=1;$r2=1;$r3=1;$r4=1;$r5=1;
$s1=1;$s2=1;$s3=1;$s4=1;$s5=1;

// Permet de tirer au hasard un chiffre des documents commerciaux dans A
$ligne=rand(0,4);
$colonne=rand(0,3);

$A= array();
$A[0] = array($p1,$q1,$r1,$s1);
$A[1] = array($p2,$q2,$r2,$s2);
$A[2] = array($p3,$q3,$r3,$s3);
$A[3] = array($p4,$q4,$r4,$s4);
$A[4] = array($p5,$q5,$r5,$s5);
$A[$ligne][$colonne]=2;


// Génère le bon de commande
$B= array();
$B[0] = array($z2,"L'économie générale",$x2,$y2,$x2*$y2);
$B[1] = array($z1,"La responsabilité sociale de l'entreprise",$x1,$y1,$x1*$y1);
$B[2] = array($z3,"La logistique",$x5,$y5,$x5*$y5);
$B[3] = array($z4,"Précis de statistiques financières",$x4,$y4,$x4*$y4);
$B[4] = array($z5,"Sociologie et psychologie du comportement",$x3,$y3,$x3*$y3);


// Génère le bon de livraison
$C= array();
$C[0] = array($z1,"La responsabilité sociale de l'entreprise",$x1*$A[0][0],$y1*$A[0][1],($x1*$A[0][0])*($y1*$A[0][1]));
$C[1] = array($z2,"L'économie générale",$x2*$A[3][0],$y2*$A[3][1],($x2*$A[3][0])*($y2*$A[3][1]));
$C[2] = array($z4,"Précis de statistiques financières",$x4*$A[1][0],$y4*$A[1][1],($x4*$A[1][0])*($y4*$A[1][1]));
$C[3] = array($z3,"La logistique",$x5*$A[2][0],$y5*$A[2][1],($x5*$A[2][0])*($y5*$A[2][1]));
$C[4] = array($z5,"Sociologie et psychologie du comportement",$x3*$A[4][0],$y3*$A[4][1],($x3*$A[4][0])*($y3*$A[4][1]));


// Génère la facture
$D= array();
$D[0] = array($z2,"L'économie générale",$x2*$A[1][2],$y2*$A[1][3],($x2*$A[1][2])*($y2*$A[1][3]));
$D[1] = array($z3,"La logistique",$x5*$A[0][2],$y5*$A[0][3],($x5*$A[0][2])*($y5*$A[0][3]));
$D[2] = array($z1,"La responsabilité sociale de l'entreprise",$x1*$A[4][2],$y1*$A[4][3],($x1*$A[4][2])*($y1*$A[4][3]));
$D[3] = array($z5,"Sociologie et psychologie du comportement",$x3*$A[3][2],$y3*$A[3][3],($x3*$A[3][2])*($y3*$A[3][3]));
$D[4] = array($z4,"Précis de statistiques financières",$x4*$A[2][2],$y4*$A[2][3],($x4*$A[2][2])*($y4*$A[2][3]));

// Génère les totaux
$E= array();
$E[0] = array($B[0][4]+$B[1][4]+$B[2][4]+$B[3][4]+$B[4][4],1,1);
$E[1] = array($C[0][4]+$C[1][4]+$C[2][4]+$C[3][4]+$C[4][4],1,1);
$E[2] = array($D[0][4]+$D[1][4]+$D[2][4]+$D[3][4]+$D[4][4],1,1);

$E[0][1] = (0.2*$E[0][0]);
$E[1][1] = (0.2*$E[1][0]);
$E[2][1] = (0.2*$E[2][0]);
$E[0][2] = ($E[0][0]+$E[0][2]);
$E[1][2] = ($E[1][0]+$E[1][2]);
$E[2][2] = ($E[2][0]+$E[2][2]);

// Détermine le montant qui devrait se trouver à la place de l'erreur $solution

$M = array();
$M[0] = array($x1,$y1,$x5,$y5);
$M[1] = array($x4,$y4,$x2,$y2);
$M[2] = array($x5,$y5,$x4,$y4);
$M[3] = array($x2,$y2,$x3,$y3);
$M[4] = array($x3,$y3,$x1,$y1);

$sol=$M[$ligne][$colonne]; 

//mini chiffrement
$cipher ="AES-256-CBC";
$iv=str_repeat("0", openssl_cipher_iv_length($cipher));
$sol=openssl_encrypt($sol,$cipher,"@^Solution^@",'0',$iv);

//Envoie dans la base de donnée
$DB_DSN = 'mysql:host=localhost;dbname=u549774271_registration';
$DB_USER = 'u549774271_root';
$DB_PASS = 'Geisha@987^qs';

try
{
    $options =
    [
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => FALSE
    ];
    
    $PDO = new PDO($DB_DSN,$DB_USER,$DB_PASS,$options);
    
    $request = $PDO->prepare("UPDATE registre SET sol1 = :sol WHERE dutil =:putil3");
    $request->execute(array(":putil3"=>$_SESSION['eleve'],":sol"=>$sol));      
}
catch (PDOException $pe){ echo 'erreur : '.$pe->getMessage();}

?>



<!-- Bon de commande ------------------------------------------ -->

<font size="4" style="font-size: 14pt"><b>Bon de commande</b></font>
<br><br>

<table class="style16" style="border:none">
	<colgroup >
		<col width="82"/>

		<col width="220"/>

		<col width="94"/>

	</colgroup>
	<colgroup >
		<col width="104"/>

	</colgroup>
	<colgroup>
		<col width="124"/>

	</colgroup>
	<tbody >
		<tr>
			<td class="style21">
				Références
			</td>
			<td class="style21">
				Catégories de produits
			</td>
			<td class="style21">
				Quantité
			</td>
			<td class="style21">
				Prix Unitaire
			</td>
			<td class="style21">
				Total
			</td>
		</tr>
	</tbody>
	<tbody>
		<tr>
			<td class="style17">
				<?php echo $B[0][0] ?>
			</td>
			<td class="style17">
				<?php echo $B[0][1] ?>
			</td>
			<td class="style17">
				<?php echo $B[0][2] ?>
			</td>
			<td class="style17">
				<?php echo $B[0][3] ?>
			</td>
			<td class="style17">
				<?php echo $B[0][4] ?>
			</td>
		</tr>
	</tbody>
	<tbody>
		<tr>
			<td class="style17">
				<?php echo $B[1][0] ?>
			</td>
			<td class="style17">
				<?php echo $B[1][1] ?>
			</td>
			<td class="style17">
				<?php echo $B[1][2] ?>
			</td>
			<td class="style17">
				<?php echo $B[1][3] ?>
			</td>
			<td class="style17">
				<?php echo $B[1][4] ?>
			</td>
		</tr>
	</tbody>
	<tbody>
		<tr>
			<td class="style17">
				<?php echo $B[2][0] ?>
			</td>
			<td class="style17">
				<?php echo $B[2][1] ?>
			</td>
			<td class="style17">
				<?php echo $B[2][2] ?>
			</td>
			<td class="style17">
				<?php echo $B[2][3] ?>
			</td>
			<td class="style17">
				<?php echo $B[2][4] ?>
			</td>
		</tr>
	</tbody>
	<tbody>
		<tr>
			<td class="style17">
				<?php echo $B[3][0] ?>
			</td>
			<td class="style17">
				<?php echo $B[3][1] ?>
			</td>
			<td class="style17">
				<?php echo $B[3][2] ?>
			</td>
			<td class="style17">
				<?php echo $B[3][3] ?>
			</td>
			<td class="style17">
				<?php echo $B[3][4] ?>
			</td>
		</tr>
	</tbody>
	<tbody>
		<tr>
			<td class="style17">
				<?php echo $B[4][0] ?>
			</td>
			<td class="style17">
				<?php echo $B[4][1] ?>
			</td>
			<td class="style17">
				<?php echo $B[4][2] ?>
			</td>
			<td class="style17">
				<?php echo $B[4][3] ?>
			</td>
			<td class="style17">
				<?php echo $B[4][4] ?>
			</td>
		</tr>
	</tbody>
	<tbody>
		<tr>
			<td ><p >
				<br/>

				</p>
			</td>
			<td ><p >
				<br/>

				</p>
			</td>
			<td colspan="2" width="206" ><p align="right" >
				Montant	Brut HT
			</td>
			<td class="style21">
				<?php echo $E[0][0] ?>
			</td>
		</tr>
		<tr>
			<td ><p >
				<br/>

				</p>
			</td>
			<td ><p >
				<br/>

				</p>
			</td>
			<td colspan="2" width="206" ><p align="right" >
				Montant	TVA
			</td>
			<td class="style21">
				<?php echo $E[0][1] ?>
			</td>
		</tr>
		<tr>
			<td ><p >
				<br/>

				</p>
			</td>
			<td ><p >
				<br/>

				</p>
			</td>
			<td colspan="2" width="206" ><p align="right" >
				Total TTC
			</td>
			<td class="style21">
				<?php echo $E[0][2] ?>
			</td>
		</tr>
	</tbody>
</table>

<!-- Bon de livraison ------------------------------------------ -->

<font size="4" style="font-size: 14pt"><b>Bon de livraison</b></font>
<br><br>

<table class="style16" style="border:none">
	<colgroup >
		<col width="82"/>

		<col width="220"/>

		<col width="94"/>

	</colgroup>
	<colgroup >
		<col width="104"/>

	</colgroup>
	<colgroup>
		<col width="124"/>

	</colgroup>
	<tbody >
		<tr>
			<td class="style21">
				Références
			</td>
			<td class="style21">
				Catégories de produits
			</td>
			<td class="style21">
				Quantité
			</td>
			<td class="style21">
				Prix Unitaire
			</td>
			<td class="style21">
				Total
			</td>
		</tr>
	</tbody>
	<tbody>
		<tr>
			<td class="style17">
				<?php echo $C[0][0] ?>
			</td>
			<td class="style17">
				<?php echo $C[0][1] ?>
			</td>
			<td class="style17">
				<?php echo $C[0][2] ?>
			</td>
			<td class="style17">
				<?php echo $C[0][3] ?>
			</td>
			<td class="style17">
				<?php echo $C[0][4] ?>
			</td>
		</tr>
	</tbody>
	<tbody>
		<tr>
			<td class="style17">
				<?php echo $C[1][0] ?>
			</td>
			<td class="style17">
				<?php echo $C[1][1] ?>
			</td>
			<td class="style17">
				<?php echo $C[1][2] ?>
			</td>
			<td class="style17">
				<?php echo $C[1][3] ?>
			</td>
			<td class="style17">
				<?php echo $C[1][4] ?>
			</td>
		</tr>
	</tbody>
	<tbody>
		<tr>
			<td class="style17">
				<?php echo $C[2][0] ?>
			</td>
			<td class="style17">
				<?php echo $C[2][1] ?>
			</td>
			<td class="style17">
				<?php echo $C[2][2] ?>
			</td>
			<td class="style17">
				<?php echo $C[2][3] ?>
			</td>
			<td class="style17">
				<?php echo $C[2][4] ?>
			</td>
		</tr>
	</tbody>
	<tbody>
		<tr>
			<td class="style17">
				<?php echo $C[3][0] ?>
			</td>
			<td class="style17">
				<?php echo $C[3][1] ?>
			</td>
			<td class="style17">
				<?php echo $C[3][2] ?>
			</td>
			<td class="style17">
				<?php echo $C[3][3] ?>
			</td>
			<td class="style17">
				<?php echo $C[3][4] ?>
			</td>
		</tr>
	</tbody>
	<tbody>
		<tr>
			<td class="style17">
				<?php echo $C[4][0] ?>
			</td>
			<td class="style17">
				<?php echo $C[4][1] ?>
			</td>
			<td class="style17">
				<?php echo $C[4][2] ?>
			</td>
			<td class="style17">
				<?php echo $C[4][3] ?>
			</td>
			<td class="style17">
				<?php echo $C[4][4] ?>
			</td>
		</tr>
	</tbody>
	<tbody>
		<tr>
			<td ><p >
				<br/>

				</p>
			</td>
			<td ><p >
				<br/>

				</p>
			</td>
			<td colspan="2" width="206" ><p align="right" >
				Montant	Brut HT
			</td>
			<td class="style21">
				<?php echo $E[1][0] ?>
			</td>
		</tr>
		<tr>
			<td ><p >
				<br/>

				</p>
			</td>
			<td ><p >
				<br/>

				</p>
			</td>
			<td colspan="2" width="206" ><p align="right" >
				Montant	TVA
			</td>
			<td class="style21">
				<?php echo $E[1][1] ?>
			</td>
		</tr>
		<tr>
			<td ><p >
				<br/>

				</p>
			</td>
			<td ><p >
				<br/>

				</p>
			</td>
			<td colspan="2" width="206" ><p align="right" >
				Total TTC
			</td>
			<td class="style21">
				<?php echo $E[1][2] ?>
			</td>
		</tr>
	</tbody>
</table>

<!-- Facture ------------------------------------------ -->

<font size="4" style="font-size: 14pt"><b>Facture 'Mystère'</b></font>
<br><br>

<table class="style16" style="border:none">
	<colgroup >
		<col width="82"/>

		<col width="220"/>

		<col width="94"/>

	</colgroup>
	<colgroup >
		<col width="104"/>

	</colgroup>
	<colgroup>
		<col width="124"/>

	</colgroup>
	<tbody >
		<tr>
			<td class="style21">
				Références
			</td>
			<td class="style21">
				Catégories de produits
			</td>
			<td class="style21">
				Quantité
			</td>
			<td class="style21">
				Prix Unitaire
			</td>
			<td class="style21">
				Total
			</td>
		</tr>
	</tbody>
	<tbody>
		<tr>
			<td class="style17">
				<?php echo $D[0][0] ?>
			</td>
			<td class="style17">
				<?php echo $D[0][1] ?>
			</td>
			<td class="style17">
				<?php echo $D[0][2] ?>
			</td>
			<td class="style17">
				<?php echo $D[0][3] ?>
			</td>
			<td class="style17">
				<?php echo $D[0][4] ?>
			</td>
		</tr>
	</tbody>
	<tbody>
		<tr>
			<td class="style17">
				<?php echo $D[1][0] ?>
			</td>
			<td class="style17">
				<?php echo $D[1][1] ?>
			</td>
			<td class="style17">
				<?php echo $D[1][2] ?>
			</td>
			<td class="style17">
				<?php echo $D[1][3] ?>
			</td>
			<td class="style17">
				<?php echo $D[1][4] ?>
			</td>
		</tr>
	</tbody>
	<tbody>
		<tr>
			<td class="style17">
				<?php echo $D[2][0] ?>
			</td>
			<td class="style17">
				<?php echo $D[2][1] ?>
			</td>
			<td class="style17">
				<?php echo $D[2][2] ?>
			</td>
			<td class="style17">
				<?php echo $D[2][3] ?>
			</td>
			<td class="style17">
				<?php echo $D[2][4] ?>
			</td>
		</tr>
	</tbody>
	<tbody>
		<tr>
			<td class="style17">
				<?php echo $D[3][0] ?>
			</td>
			<td class="style17">
				<?php echo $D[3][1] ?>
			</td>
			<td class="style17">
				<?php echo $D[3][2] ?>
			</td>
			<td class="style17">
				<?php echo $D[3][3] ?>
			</td>
			<td class="style17">
				<?php echo $D[3][4] ?>
			</td>
		</tr>
	</tbody>
	<tbody>
		<tr>
			<td class="style17">
				<?php echo $D[4][0] ?>
			</td>
			<td class="style17">
				<?php echo $D[4][1] ?>
			</td>
			<td class="style17">
				<?php echo $D[4][2] ?>
			</td>
			<td class="style17">
				<?php echo $D[4][3] ?>
			</td>
			<td class="style17">
				<?php echo $D[4][4] ?>
			</td>
		</tr>
	</tbody>
	<tbody>
		<tr>
			<td ><p >
				<br/>

				</p>
			</td>
			<td ><p >
				<br/>

				</p>
			</td>
			<td colspan="2" width="206" ><p align="right" >
				Montant	Brut HT
			</td>
			<td class="style21">
				<?php echo $E[2][0] ?>
			</td>
		</tr>
		<tr>
			<td ><p >
				<br/>

				</p>
			</td>
			<td ><p >
				<br/>

				</p>
			</td>
			<td colspan="2" width="206" ><p align="right" >
				Montant	TVA
			</td>
			<td class="style21">
				<?php echo $E[2][1] ?>
			</td>
		</tr>
		<tr>
			<td ><p >
				<br/>

				</p>
			</td>
			<td ><p >
				<br/>

				</p>
			</td>
			<td colspan="2" width="206" ><p align="right" >
				Total TTC
			</td>
			<td class="style21">
				<?php echo $E[2][2] ?>
			</td>
		</tr>
	</tbody>
</table>
<br><br><br>

<form method="post" action="facture3.php" class="style16"> 

<p><label for="idmontant">Quel chiffre est à écrire à la place de l'erreur : </label>
<input type="text"  name="montant"></p>
Pour corriger et recalculer ensuite entièrement les documents.
<p><input type="submit" name="valid_form" value="Vérifier"></p>
</form>

</div>
</div>
</body>
</html>
