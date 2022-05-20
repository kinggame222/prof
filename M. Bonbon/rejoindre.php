<?php
  include ("include/head.inc.php");
  include ("library/fonction.lib.php");

  if(isset($_GET['action'])){
      if($_GET['action']='mail'){
          $dest = "potato123@gmail.com";
          $sujet= $_GET['Sujet'];
          $corp= $_GET['Commentaire'];
          $headers= $_GET['Courriel'];

          if (mail($dest, $sujet, $corp, $headers)) {
            echo "Email envoyé avec succès à $dest ...";
          } 
          else {
            echo "Échec de l'envoi de l'email...";
          }
        }
    }

?>
<body>
    <form name="frm1" action="rejoindre.php?action=mail"  method="post">
        <div class="container text-center" style="width: 700px;">
            <div class="row">
                <label for="nom" class="col-3">Votre nom : </label>
                <input type="text" id="nom" name="Nom" class="col-3" required>
            </div>    
            <div class="row">
                <label for="sujet" class="col-3">Sujet : </label>
                <input type="sujet" id="sujet" name="Sujet" class="col-3" required >
            </div>
            <div class="row">
                <label for="couriel" class="col-3">Courriel : </label>
                <input type="couriel" id="couriel" name="Courriel" class="col-3" required >
            </div>
            
            <div class="row">

                <textarea id="commentaire" style="height: 200px;" name="Commentaire"></textarea>
            </div> 
            <div class="row mx-auto">
                <input type="submit" value="Envoyer" class="col-3">
                <input type="reset" value="Annuler" class="col-3" >
            </div>    
        </div>
    </form>
</body>
<?php 
  include ("include/foot.inc.php");
?>