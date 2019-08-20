<?php
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

		$nom = $_POST['nom']; // On récupère l'information contenue dans la case nom
		$prenom = $_POST['prenom']; // On récupère l'information contenue dans la case prenom
		$matiere = (INT) $_POST['matiere']; // On récupère l'information contenue dans la case matiere
		$salle = $_POST['salle']; // On récupère l'information contenue dans la case salle
	
		
	// Insertion des données dans la table 'prof':		

	$sql = "INSERT INTO prof (Prof_Nom, Prof_Prenom, ID_Matiere, ID_Salle)
	VALUES ('$nom', '$prenom', '$matiere', '$salle');";

	if ($conn->query($sql) === TRUE) { // Execute la requête.
		echo "Nouvelles données ajoutées"; // Envoie un message en cas de succès.
	} else {
		echo "Erreur: " . $sql . "<br>" . $conn->error; // Envoie un message en cas d'erreur
	}

	$conn->close(); // Termine la connection à la base de donnée.
?>
<a href="/site_tpe/add_prof/">Retour</a>