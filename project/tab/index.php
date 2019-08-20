<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="style.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Bitter" rel="stylesheet">
<title>Site de suivi d'élèves en TPE</title>

<script>
	function filterClasse(){
		
	}
</script>





</head>

<body>


<table id="selection">
	<tr><th>Filtre</th><th></th><th>Appliquer</th></tr>
	<tr>
	
	
	
	<td>Classe:</td>
	<FORM>
		<td><SELECT class="selecteur" name="nom" size="1">
			<OPTION value="">Toutes</OPTION>
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
		</SELECT></td>
		<td><button id="button_selection" onClick="filerClasse()">🔍</button></td>
	</FORM>
	
	
	
	</tr><tr>
	
	
	
	<td>Salle:</td>
	<FORM>
		<td><SELECT class="selecteur" name="nom" size="1">
			<OPTION>1
			<OPTION>2
			<OPTION>3
			<OPTION>4
		</SELECT></td>
		<td><button id="button_selection">🔍</button></td>
	</FORM>
	</tr><tr>
	<td>Séance:</td>
	<FORM>
		<td><SELECT class="selecteur" name="nom" size="1">
			<OPTION>Mercredi 10h/12h
			<OPTION>Jeudi 8h/10h
			<OPTION>Vendredi 13h/15h
		</SELECT></td>
		<td><button id="button_selection">🔍</button></td>
	</FORM>
	
	
	
	</tr>
</table>

<br><br><br><br><br>

<table id="affichage">
	<tr>
	<th>ID</th>
	<th>Nom</th>
	<th>Prenom</th>
	<th>Classe</th>
	<th>Salle</th>
	<th>Entrée</th>
	<th>Sortie</th>
	<th>Etat</th>
	<th>ACTION</th>
	</tr>
	<?php
	
		$bdd = new PDO('mysql:host=localhost;dbname=tpe','root','');
		$reponse = $bdd->query('SELECT * FROM eleve ORDER BY Eleve_Nom');

		while ($donnees = $reponse->fetch())
		{
		echo '<tr><td>' .
			$donnees['ID_Eleve'] .
			'</td><td>' .
			$donnees['Eleve_Nom'] .
			'</td><td>' .
			$donnees['Eleve_Prenom'] .
			'</td><td>' .
			$donnees['ID_Classe'] .
			'</td><td>' .
			"" .
			'</td><td>' .
			"" .
			'</td><td>' .
			"" .
			'</td><td>' .
			"" .
			'</td><td>' .
			"" .
			'</td></tr>';
		}
	
	?>
</table>

</body>
</html>