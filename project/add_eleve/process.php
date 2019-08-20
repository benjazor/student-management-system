<?php
	/*			ATTENTION CE CODE NE MARCHE PAS


		// Connection au serveur

			$server = "localhost";
			$user = "root";
			$password = "";
			// Information de connection à la base de donnée.


			$con=mysql_connect("$server","$user","$password"); // Connection au serveur.
				if(!con){ // Si la connection a échoué
					die("Erreur de connection" . mysql_error());// Envoie un message si la connection avec la BD a échouée et affiche l'erreur.
				} else {
					echo("Connection réussite"); // Envoie un message si la connection avec la BD est réussie.
				};

		// On va dans la base de donnée "TPE":

			mysql_select_db('tpe',$con); // On séléectionne la base de donnée TPE.

		// Récupération des informations:

			$nom = $_POST['nom']; // On récupère l'information contenue dans la case nom
			$prenom = $_POST['prenom']; // On récupère l'information contenue dans la case prenom
			$classe = $_POST['classe']; // On récupère l'information contenue dans la case classe

		// Stockage dans la base de donnée:

			$sql = "INSERT INTO eleve SET Eleve_Nom=$nom , Eleve_Prenom=$prenom , ID_Classe=$classe"; // Insert les informations dans la table "eleve"

				if(!mysql_query($sql,$con)){
					die("ERREUR" . mysql_error());
				} // Envoie un message en cas d'erreur de la requête

			echo("<center>Les informations ont été ajoutés!</center>"); // Envoie un message en cas de succès de la requête


	*/
	
	
	
	
	
	
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
		$classe = (int) $_POST['classe']; // On récupère l'information contenue dans la case classe
	
		
	// Insertion des données dans la table 'eleve':		

	$sql = "INSERT INTO eleve (Eleve_Nom, Eleve_Prenom, ID_Classe)
	VALUES ('$nom', '$prenom', '$classe');";

	if ($conn->query($sql) === TRUE) { // Execute la requête.
		echo "Nouvelles données ajoutées"; // Envoie un message en cas de succès.
	} else {
		echo "Erreur: " . $sql . "<br>" . $conn->error; // Envoie un message en cas d'erreur
	}

	$conn->close(); // Termine la connection à la base de donnée.
?>


<a href="/site_tpe/add_eleve/">Retour</a>