<html>	
	<body>
				
		<center><form action="process.php" method="post">
		<table>
		<h2>Ajouter une séance</h1>
			<tr>
				<td>Début</td> 
				<td> <input type="datetime" name="debut" class="text"></td>
			</tr><tr>
				<td>Fin</td> 
				<td> <input type="datetime" name="fin" class="text"></td>
			</tr><tr>
				<td>Classe</td> 
				<td>
				
				<SELECT class="selecteur" name="classe" size="1">
				
					<?php
					
						$bdd = new PDO('mysql:host=localhost;dbname=tpe','root','');
						$reponse = $bdd->query('SELECT ID_Classe, Classe_Nom FROM classe');

						while ($donnees = $reponse->fetch())
						{
						echo '<option value=' .
							"$donnees[ID_Classe]" .
							'>' .
							$donnees['Classe_Nom'] .
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