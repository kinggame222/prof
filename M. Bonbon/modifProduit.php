<?php
  include ("include/headadmin.inc.html");
  require 'library/fonction.lib.php';
  
?>
<?php
$bd;
connexion($bd);
if(isset($_GET['action'])){
    if($_GET['action']=='modifier'){
        modifierProduit($bd,$_GET['id'], $_POST['nomProduit'], $_POST['prix'], $_POST['fournisseur'], $_POST['quantite'], $_POST['format'], $_POST['description']);
        header("Location:modifierProduit.php");
    }
}   
    if(isset($_GET['id'])){
        $noId = $_GET['id'];
    }
    mysqli_select_db($bd,'bonbon');
    $sql = "SELECT * FROM produit where idProduit=$noId";
    $resultat = mysqli_query($bd, $sql);
    $noId=-1;
    $produit = mysqli_fetch_array($resultat);
   echo "<form action='modifProduit.php?action=modifier&id=$produit[idProduit]' method='post'>
   <table align='center'>
       <tr>
           <td> Nom du produit : </td>
           <td>  <input type='text' name='nomProduit' size=100% value='$produit[nomProduit]' /> </td>
       </tr>
       <tr>
           <td> Prix  : </td>
           <td> <input type='text' name='prix' size=100% value='$produit[prix]' /> </td>
       </tr>
       <tr>
           <td> Fournisseur  : </td>
           <td> <input type='text' name='fournisseur' size=100% value='$produit[fournisseur]' /> </td>
       </tr>
       <tr>
           <td> Quantité  : </td>
           <td> <input type='number' name='quantite' size=100% value='$produit[quantite]' /> </td>
       </tr>
       <tr>
           <td> Format  : </td>
           <td> <input type='text' name='format' size=100% value='$produit[format]' /> </td>
       </tr>
       <tr>
           <td> Remarque  : </td>
           <td> <input type='text' name='description' size=100% value='$produit[description]' /> </td>
       </tr>
       <tr>
           <th>
               <div colspan = '2'> 
                   <br><input type='submit' name='ajouter' value='Sauvegarder' />
                       <input type='reset' value='Annuler'  /> 
               </div>
           </th>
       </tr>	
   </table>
   
   </form>";
?>
<?php 
  include ("include/footadmin.inc.php");
?>