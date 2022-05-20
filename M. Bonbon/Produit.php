<?php
  include ("include/head.inc.php");
  require "library/fonction.lib.php";
?>
<body>
  

  <div class="container" style="border: 2px solid black">
    <?php 
    $bd;
    connexion($bd);
    afficherProduit($bd);?>
  </div>
</body>
<?php 
  include ("include/foot.inc.php");
?>