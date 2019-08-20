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

		$debut = date($_POST['debut']); // On récupère l'information contenue dans la case nom
		$fin =  date($_POST['fin']); // On récupère l'information contenue dans la case prof
		$classe = (INT) $_POST['classe']; // On récupère l'information contenue dans la case cpe
	
		
	// Insertion des données dans la table 'classe':		

	$sql = "INSERT INTO seance (Seance_Debut, Seance_Fin, ID_Classe) VALUES ('$debut', '$fin', '$classe');";

	if ($conn->query($sql) === TRUE) { // Execute la requête.
		echo "Nouvelles données ajoutées"; // Envoie un message en cas de succès.
	} else {
		echo "Erreur: " . $sql . "<br>" . $conn->error; // Envoie un message en cas d'erreur
	}

	$conn->close(); // Termine la connection à la base de donnée.
?>
<a href="/site_tpe/add_seance/">Retour</a>