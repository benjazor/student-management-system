<meta charset="utf-8">
<table id="affichage">
	<tr>
	<th>ID</th>
	<th>Nom</th>
	<th>Prenom</th>
	<th>Classe</th>
	<th>Professeur</th>
	<th>Entrée</th>
	<th>Sortie</th>
	<th>Etat</th>
	<th>ACTION</th>
	</tr>
	<?php
		$bdd = new PDO('mysql:host=localhost;dbname=tpe','root','');
		
	
		if (!isset($filtre)) {$filtre='';};	// S'il n'y a pas de filtre remplacer $filtre par une chaine vide ( '' ).
		$query =
			
			'SELECT * FROM ((classe INNER JOIN eleve ON classe.ID_Classe = eleve.ID_Classe) LEFT JOIN presence ON eleve.ID_Eleve = presence.ID_eleve) LEFT JOIN prof ON presence.ID_Prof = prof.ID_Prof ' . $filtre . ' ORDER BY classe.Classe_Nom,eleve.Eleve_Nom,presence.Entree_date_heure DESC'; // Query pour récuperer les données.
	

	
	
	
	
	
		$reponse = $bdd->query($query); // Accès à la base de donnée.
		
		
		while ($donnees = $reponse->fetch()) // Afficher les valeurs de chaque ligne sélectionnée.
		{		
			
		
			
			
		$pse = "?PRO=" . (isset($_GET['profID'])?$_GET['profID']:0);
		$pse = $pse . "&PAC=" . (isset($donnees['ID_Presence'])?$donnees['ID_Presence']:0);
		#$pse = $pse . "&PAC=" . ($donnees['ID_Presence']);
		$pse = $pse . "&SFU=" . (isset($_GET['seanceID'])?$_GET['seanceID']:0);		
		$pse = $pse . "&ELV=" . $donnees['ID_Eleve'];
		$pse = $pse . "&CLA=" . (isset($_GET['classeID'])?$_GET['classeID']:0);
			
			
			
			$sortie_actif = is_null($donnees['Sortie_date_heure'])&&!(is_null($donnees['Entree_date_heure']));
			
			if ($sortie_actif) {
				$styletr = "present";
			} else { # L'élève est-il rentré à nouveau ?
				#if (!is_null($donnees['Sortie_date_heure'])) {
					
					$query= 'SELECT Seance_Fin FROM seance WHERE ID_Seance = ' . ($donnees['ID_Seance']);
					
					$Seance_Fin = $bdd->query($query)->fetchColumn();
					
					$select = 'SELECT count(*) FROM presence WHERE ID_Prof=' . ($donnees['ID_Prof']) . ' AND ID_Seance=' . ($donnees['ID_Seance']) . ' AND ID_Eleve=' . ($donnees['ID_Eleve']) . ' AND Entree_date_heure>=\'' . ($donnees['Sortie_date_heure']) . '\' AND Entree_date_heure<=\'' . $Seance_Fin . '\'';
					
					
					$nbEntreeApres = $bdd->query($select)->fetchColumn();
					
					if ($nbEntreeApres>0) {
						$styletr = "ancien";
					} else {
						
						$dureeAbsence = time() + (2*60*60) - strtotime($donnees['Sortie_date_heure']);
						
						
						if ($dureeAbsence/60<10) {
							$styletr = "deplacement";
						} else {
							$styletr = "absent";
						}
					}
					
				#}
			}
			
			
			
		echo '<tr class="'. $styletr . '"><td>' .
			$donnees['ID_Eleve'] .
			'</td><td>' .
			utf8_encode ($donnees['Eleve_Nom']) .
			'</td><td>' .
			utf8_encode ($donnees['Eleve_Prenom']) .
			'</td><td>' .
			utf8_encode ($donnees['Classe_Nom']) .
			'</td><td>' .
			utf8_encode ($donnees['Prof_Nom']) . " " . utf8_encode ($donnees['Prof_Prenom']) .
			'</td><td>' .
			utf8_encode ($donnees['Entree_date_heure']) .
			'</td><td>' .
			utf8_encode ($donnees['Sortie_date_heure']) .
			'</td><td>' .
			"" .
			'</td><td>
			<p>
				<a href="entree.php' . $pse . '">Entrée<a>
			
			|
				';
			if ($sortie_actif) {
				echo '<a href="sortie.php' . $pse . '">';
			}
			echo 'Sortie';
			if ($sortie_actif) {
				echo '</a>';
			}
			echo '</p>
			</td>
			
			</tr>';
		}
	
	?>
</table>