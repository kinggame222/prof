<?php
  session_start();
  if(!isset($_SESSION['moderateur'])){
		include ("include/head.inc.php");
	}
  else{
    include ("include/headadmin.inc.html");
  }
?>
<body>
  <div>
    <div style="border:2px solid black; width:100%">
        <p>Bonjour,<br><br>Pour faire plaisir à mes enfants et aux amis de mes enfants, j'ai ouvert cette boutique de bonbon en 2010 et depuis, elle n'a cessé de prendre de l'expension. Aujourd'hui, avec la venue web, je suis heureux de vous présenter la nouvelle façon de magasiner des bonbon...</p>
        <p class="text-center">Bon magasinage !</p>
    </div>
  </div> 
</body>
<?php
if(!isset($_SESSION['moderateur'])){
  include ("include/foot.inc.php");
}
else{
  include ("include/footadmin.inc.php");

}
?>