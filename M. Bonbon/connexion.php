<?php
  include ("include/head.inc.php");
  include ("library/fonction.lib.php");
  $bd;
  connexion($bd);
  if (isset($_GET['action']))
	{
		if ($_GET['action'] == 'connexion')
		{
            if(verification($bd)){
                header("Location:ajouterProduit.php");
            }
            else{
                echo "<div class='text-center'><span style='color:red;' class='text-center'>Le courriel ou le mot de passe est invalide!!!</span></div>";
            }
		}
	}
?>
<body><br>
    <form style="border: 3px solid red;" action="connexion.php?action=connexion" method="post">
        <div class="container mx auto" style="width: 700px;"><br>
            <div class="row">
                <label for="couriel" class="col-3">Couriel : </label>
                <input type="text" name="courriel" class="col-5" required>
            </div><br> 
            <div class="row">
                <label for="password" class="col-3">password : </label>
                <input type="password" name="password" class="col-5" required >
            </div><br>
            <div class="row">
                <input type="submit" value="Connexion" class="col">&nbsp&nbsp&nbsp
                <input type="reset" value="Anuler" class="col">
            </div> 
            <br>   
        </div>
    </form>
</body>
<?php 
  include ("include/foot.inc.php");
?>