<?php 

	echo "Prof Future:" . $_GET["PRO"] ."</br>Presence Actu:" . $_GET["PAC"] ."</br>Seance Future:" . $_GET["SFU"] ."</br>Eleve:" . $_GET["ELV"]; 


	// Information de connection à la base de donnée:
	
	$servername = "localhost"; // Nom du serveur
	$username = "root"; // Nom d'utilisateur
	$password = ""; // Mot de passse (Vide à cause de WAMP)
	$dbname = "tpe"; // Nom de la base de donnée	
	

	// Creation de la connection:
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Crée une nouvelle requete sql depuis les informations de connection.
	
	
	// Verification de la connection:
	if ($conn->connect_error) { // On regarde si la connection a été réussie.
		die("Erreur: " . $conn->connect_error); // Si la connection a échouée envoyer un message d'erreur.
	} 
	

	// Récupération des informations depuis les champs:

		$prof = (int) $_GET["PRO"]; // On récupère l'information contenue dans la case nom
		$presenceActu = (int) $_GET["PAC"]; // On récupère l'information contenue dans la case prenom
		$seanceFuture = (int) $_GET["SFU"]; // On récupère l'information contenue dans la case classe
		$eleve = (int) $_GET["ELV"];
		$classe = (int) $_GET["CLA"];

		//Si l'élève est actuellement présent chez un autre professeur, l'entrée chez le nouveau professeur va forcer la sortie de l'élève dans la sesion actuelle

	$sql = "UPDATE presence SET Sortie_date_heure = NOW() WHERE ID_Presence=" . $presenceActu . " AND ID_eleve=" . $eleve;

	if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
		} else {
    echo "Error updating record: " . $conn->error;
	}

	$conn->close(); // Termine la connection à la base de donnée.

	$parm = "?classeID=" . $classe . "&profID=" . $prof . "&seanceID=" . $seanceFuture;
	echo $parm;
	header('Location: index.php' . $parm);
?>