<!doctype html>
<html>


<head>
<meta charset="utf-8">
<link href="style.css" rel="stylesheet"> <!-- On charge le fichier de style style.css -->
<link href="https://fonts.googleapis.com/css?family=Bitter" rel="stylesheet"><!-- Font de text issue font.google.com -->
<title>Site de suivi d'élèves en TPE</title><!-- Titre du site -->
<script src="filter.js"></script> <!-- On charge le fichier de script filter.js -->
</head>



<body>

<?php include 'filter.php';?> <!-- On charge le fichier php filter.php -->

<br><br><br><br><br>

<?php	
	unset($filtre); // Par défaut il n'y a aucun filtre.
	
	
	if (isset($_GET["classeID"])){ // Si on arrive a récupérer classeID
		$classeID = $_GET["classeID"]; // $classeID prends la valeur de classeID
	} else { // Si on arrive pas récupérer classeID
		$classeID = "0"; // $classeID prends la veuleur 0
	}
		
	if ($classeID !== "0") { // Si $classeID est différent de 0
		$filtre = 'WHERE eleve.ID_Classe="'. $classeID .'"'; // Le filtre s'applique
	};
?>

<?php/*

	if (isset($_GET["profID"])){ // Si on arrive a récupérer profID
		$profID = $_GET["profID"]; // $profID prends la valeur de profID
	} else { // Si on arrive pas récupérer profID
		$profID = "0"; // $salleID prends la veuleur 0
	}
	
	if (isset($filter)) { // S'il y a déjà un filtre.
		$ftag = " AND "; // ftag deviens "AND".
	} else {  // S'il n'y pas encore de filtre.
		$ftag = "WHERE "; // ftag deviens "WHERE"
	}	
		
	if ($profID !== "0") { // Si $profID est différent de 0
		$filtre = $ftag . 'presence.ID_Prof="'. $profID .'"'; // Le filtre s'applique
	};	
	

*/?>

<?php include 'donnees.php';?> <!-- On charge le fichier php donnees.php -->

</body>
</html>