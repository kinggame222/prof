<?php 
if(isset($_GET['action'])){
      if($_GET['action']=='deconexion'){
            session_start();
            unset($_SESSION['moderateur']);
            header("Location:../tp5_index.php");
      }
}

?>


<body>
    <div class="footer">
          <div id="white" style="width: auto; background-color: rgb(255,17,170);">
           ©2022 - Tous droits réservés<div class="float-end"><a href="include/footadmin.inc.php?action=deconexion">Déconnexion</a></div>
          </div>
    </div>  
  </body>