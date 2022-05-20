<?php
  session_start();
  if(!isset($_SESSION['moderateur'])){
		include ("include/head.inc.php");
	}
  else{
    include ("include/headadmin.inc.html");
  }
  require 'library/fonction.lib.php';

  $bd;
  connexion($bd);

  if(isset($_GET['action'])){
      if($_GET['action']="ajouter"){
          if(validerPanier()){
            ajouterPanier($bd);
          }
          else{
            echo "<div class='text-center'><span class='msgerreur'>Tout les champs doive être remplit!!!</span></div>";
          }
        }
  }
?>
<br><br>
<form action="ajouterPanier.php?action=ajouter" method="post">
    <?php
        listProduit($bd);
    ?>
    
    <div class="row" style="margin-top:20px;">
        
        <span class="input-group-text col-1">Quantité:</span>
        <input type="number" class="col" name="quantite">
    </div>
    <div class="row" style="margin-top:20px;" >
        <span class="input-group-text col-1">Date achat:</span>
        <input type="date" class="col" name="date">
    </div>
    <div class="row" style="margin-top:20px;" >
        <input type="submit" value="Sauvegarder" class="col-1">
        <input type="reset" value="Annuler" class="col-1">
    </div>

</div>
</div>
</form>

<?php 
  include ("include/footadmin.inc.php");
?>