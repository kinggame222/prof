<?php
  include ("include/headadmin.inc.html");
  require "library/fonction.lib.php";
  $bd;
  connexion($bd);
  session_start();
  if(!isset($_SESSION['moderateur'])){
		header("Location:tp5_index.php");
	}
  $valide = true;
	if (isset($_GET['action']))
	{
		if ($_GET['action'] == 'supprimer')
		{
      supprimerProduit($bd);
		}
	}
?>
<style>
     table {
      border-collapse: collapse;
    }

    table,
    th,
    td {
      border: 1px solid black;
    }
</style>
<div>
    <div class="text-center">
        <h1>Supprimer un Produit</h1>
    </div>
    <form action="supprimerProduit.php?action=supprimer" method="post">
        <table>
            <tr class="tabsupp">
                <th></th>
                <th>Nom</th>
                <th>Fournisseur</th>
                <th>Quantité</th>
                <th>Prix</th>
                <th>Format</th>
                <th>Description</th>
            </tr>
            <?php
            
            mysqli_select_db($bd,'bonbon');
            $sql = "SELECT * FROM produit";
            $resultat = mysqli_query($bd, $sql);           
            while($ligne = mysqli_fetch_array($resultat)){
                echo "<div>";
                echo "<tr>";
                echo "<td><input type='checkbox' name='chk$ligne[idProduit]'></td>";
                echo "<td>$ligne[nomProduit]</td>";
                echo "<td>$ligne[fournisseur]</td>";
                echo "<td>$ligne[quantite]</td>";
                echo "<td>$ligne[format]</td>";
                echo "<td>$ligne[prix]</td>";
                echo "<td>$ligne[description]</td>";
                echo "</tr>";
                echo "</div>";
            }  
            ?>
        </table>
        <br><br>
        <div>
            <input type="submit" value="SUPPRIMER" onclick="return VerifierSupprimer()">
            <input type="reset" value="ANNULER">
        </div>
    </form>
</div>

<?php 
  include ("include/footadmin.inc.php");
?>