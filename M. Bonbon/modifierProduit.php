<?php
  include ("include/headadmin.inc.html");
  require "library/fonction.lib.php";
  session_start();
  if(!isset($_SESSION['moderateur'])){
		header("Location:tp5_index.php");
	}
  $valide = true;
	if (isset($_GET['id']))
	{
		if ($_GET['id'] != null)
		{
      $noId=$_GET['id'];
      header("Location:modifProduit.php?id=$noId");       
		}
	}
?>
<div class="container" style="border: 2px solid black">
    <?php 
    $bd;
    connexion($bd);
    affProduit($bd);?>
  </div>

<?php 
  include ("include/footadmin.inc.php");
?>