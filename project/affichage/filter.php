<table class="selection" id="selection">
	<tr><th>Filtre</th><th></th><th>Appliquer</th></tr>
	<tr>
	
	<?php #R�cup�ration des valeurs pr�c�dament entr�es dans le filtre pour Clase, Prof et S�ance
		
		#POUR LA CLASSE
		if (isset($_GET["classeID"])) {
		$classeact = $_GET["classeID"];
			} else { 
		$classeact = 0;
		} echo "Classe: " . $classeact;
	
		
		#POUR LE PROF
		if (isset($_GET["profID"])) {
		$profact = $_GET["profID"];
			} else { 
		$profact = 0;
		} echo "Prof: " . $profact;
		
		
		#POUR LA SEANCE
		if (isset($_GET["seanceID"])) {
		$seanceact = $_GET["seanceID"];
			} else { 
		$seanceact = 0;
		} echo "Seance: " . $seanceact;
		
	?>
	
	<td>Classe:</td>
	<FORM>
		<td><SELECT class="selecteur" name="classeID" size="1">
			<OPTION value="0">Toutes</OPTION>
			<?php
					
					$bdd = new PDO('mysql:host=localhost;dbname=tpe','root','');
					$reponse = $bdd->query('SELECT ID_Classe, Classe_Nom FROM classe ORDER BY Classe_Nom');
			
					while ($donnees = $reponse->fetch())
					{
						echo '<option value=' . "$donnees[ID_Classe]";
						if ($donnees['ID_Classe']==$classeact) {							
							echo ' selected ';
						}	
						echo '>' .
						utf8_encode ($donnees['Classe_Nom']) .
						'</option>';
					}
			?>		
		</SELECT></td>
		<td></td>	
	
	</tr><tr>	
	
	<td>Professeur:</td>
		<td><SELECT class="selecteur" name="profID" size="1">		
		<OPTION value="0">Toutes</OPTION>
		<?php
				$bdd = new PDO('mysql:host=localhost;dbname=tpe','root','');
			
				$select = 'SELECT ID_Prof, Prof_Nom, Prof_Prenom, Nom_Matiere FROM prof LEFT JOIN matiere ON prof.ID_Matiere = matiere.ID_Matiere';
				#$select = $select . ' WHERE ID_Prof IN(SELECT ID_Prof FROM classe WHERE ID_Classe = 1)';			
				$select = $select . ' ORDER BY Prof_Nom';
			
				$reponse = $bdd->query($select);
		
				while ($donnees = $reponse->fetch())
				{
				echo '<option value=' .	"$donnees[ID_Prof]";
					if ($donnees['ID_Prof']==$profact) {							
							echo ' selected ';
						}	
					echo '>' .
					utf8_encode ($donnees['Prof_Nom']) . " " . utf8_encode ($donnees['Prof_Prenom']) . "(" . utf8_encode ($donnees['Nom_Matiere']) . ")" .
					'</option>';
				}
		?>	
		</SELECT></td>
		<td></td>
		
	</tr><tr>
	
	<td>S�ance:</td>
		<td><SELECT class="selecteur" name="seanceID" size="1">			
			<?php
				$bdd = new PDO('mysql:host=localhost;dbname=tpe','root','');
			
				$select = 'SELECT ID_Seance, Seance_Debut, Seance_Fin FROM seance';
			
				$select = $select . ' WHERE Seance_Debut <= NOW() '; # + INTERVAL 1 DAY (Pour ajouter une journ�e)
			
			
			if (isset($_GET["classeID"]) && ($_GET["classeID"])!=0){
				$select = $select . ' AND ID_Classe=' . $_GET["classeID"]; // On selectione les s�ance que pour cette classe
				}
	
				$select = $select . ' ORDER BY Seance_Debut DESC';			
			
				$reponse = $bdd->query($select);
		
				while ($donnees = $reponse->fetch())
				{
				echo '<option value=' .	"$donnees[ID_Seance]"; 
					if ($donnees['ID_Seance']==$seanceact) {							
							echo ' selected ';
						}	
				echo '>' .
					utf8_encode ($donnees['Seance_Debut']) . " / " . utf8_encode ($donnees['Seance_Fin']).
					'</option>';
				}?>
			
			
			
		</SELECT></td>
		<td><button id="button_selection">🔍</button></td>
	</FORM>
	
	
	
	</tr>
</table>