<html>	
	<body>
				
		<center><form action="process.php" method="post">
		<table>
		<h2>Ajouter une classe</h1>
			<tr>
				<td>Nom</td> 
				<td><input name="nom" type="text" class="text"></td>
			</tr><tr>
				<td>Prof Principal</td> 
				<td>
				
				<SELECT class="selecteur" name="prof" size="1">
				
					<?php
					
						$bdd = new PDO('mysql:host=localhost;dbname=tpe','root','');
						$reponse = $bdd->query('SELECT ID_Prof, Prof_Nom, Prof_Prenom FROM prof');

						while ($donnees = $reponse->fetch())
						{
						echo '<option value=' .
							"$donnees[ID_Prof]" .
							'>' .
							utf8_encode ($donnees['Prof_Nom']) . " " . utf8_encode ($donnees['Prof_Prenom']) .
							'</option>';
						}
					?>
				
				</SELECT>
				
				</td>
			</tr><tr>
				<td>CPE</td> 
				<td>
				
				<SELECT class="selecteur" name="cpe" size="1">
				
					<?php
					
						$bdd = new PDO('mysql:host=localhost;dbname=tpe','root','');
						$reponse = $bdd->query('SELECT ID_CPE, CPE_Nom, CPE_Prenom FROM cpe');

						while ($donnees = $reponse->fetch())
						{
						echo '<option value=' .
							"$donnees[ID_CPE]" .
							'>' .
							utf8_encode ($donnees['CPE_Nom']) . " " . utf8_encode ($donnees['CPE_Prenom']) .
							'</option>';
						}
					?>
				
				</SELECT>
				
				</td>
			</tr>
		</table>
		<input type="submit" class="submit">
		</form></center>
		
	</body>
</html>