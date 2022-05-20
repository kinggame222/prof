<?php
  include ("include/headadmin.inc.html");
  require "library/fonction.lib.php";
  session_start();
  $valide = true;
	if (isset($_GET['action']))
	{
		if ($_GET['action'] == 'ajouter')
		{			
			if (validerProduit())
			{
				$bd;
				connexion($bd);
				$image = $_FILES['fichier'] ['tmp_name'];
				$no = 0;
				$chemin = "image/{$no}.jpg";
				while(file_exists($chemin)){
					$no++;
					$chemin = "image/{$no}.jpg";
				}
				move_uploaded_file($image,$chemin);				  
				ajouter($bd,$no);
			}
			else{
				echo "<div class='text-center' style='background-color: red;'><span style='color: black;  font-size: 20px;'>Un ou plusieur champs sont vide!!!<br>veuillez remplir tous les champs.</span></div>";			
			}
		}
	}
	if(!isset($_SESSION['moderateur'])){
		header("Location:tp5_index.php");
	}
?>
<br>
<form action="ajouterProduit.php?action=ajouter" enctype="multipart/form-data" method="post">
<table align="center">
	<tr>
		<td> Nom du produit : </td>
		<td>  <input type="text" name="nomProduit" size=100% /> </td>
	</tr>
	<tr>
		<td> Prix  : </td>
		<td> <input type="text" name="prix" size=100% /> </td>
	</tr>
	<tr>
		<td> Fournisseur  : </td>
		<td> <input type="text" name="fournisseur" size=100%/> </td>
	</tr>
	<tr>
		<td> Quantité  : </td>
		<td> <input type="number" name="quantite" size=100%/> </td>
	</tr>
	<tr>
		<td> Format  : </td>
		<td> <input type="text" name="format" size=100%/> </td>
	</tr>
	<tr>
		<td> Remarque  : </td>
		<td> <input type="text" name="description" size=100%/> </td>
	</tr>
    <tr>
        <td> Choisir un fichier : </td>
        <td><input type="hidden" size=60 name="MAX_FILE_SIZE" value="1000000"><input type="file" name="fichier" size=100% id="file" require> </td>
    </tr>
	<tr>
		<th>
			<div colspan = "2"> 
				<br><input type="submit" name="ajouter" value="Sauvegarder" />
					<input type="reset" value="Annuler" /> 
			</div>
		</th>
	</tr>	
</table>

</form>
<?php 
  include ("include/footadmin.inc.php");
?>