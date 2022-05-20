<?php
    
    function connexion(&$bd){
        $bd = mysqli_connect('localhost', 'root', '');
        if (!$bd) {
        echo 'Connexion impossible.  Information sur le serveur :<br>', mysqli_get_host_info($bd);
        
        exit();
    }
    }
//--------------------- Verification connexion ------------------
    function verification($bd){
        $courriel = $_POST['courriel'];
        $password = $_POST['password'];
        mysqli_select_db($bd,'bonbon');
        $sql = "SELECT * From usager";
        $resultat = mysqli_query($bd, $sql);
        while($ligne = mysqli_fetch_array($resultat)){
            if($courriel==$ligne['Email']){
                if($password==$ligne['Password']){

                    session_start();
                    $_SESSION['moderateur'] = $courriel;
                    return true;
                }
            }
        }
        return false;
    }

// -------------------- Afficher Produit ------------------------
    function afficherProduit($bd){
        mysqli_select_db($bd,'bonbon');
        $sql = "SELECT * FROM produit";
        $resultat = mysqli_query($bd, $sql);
        
        while($produit = mysqli_fetch_array($resultat)){
            
            echo "
            <div class=container>
                <div class='row' style='border-bottom: 1px solid black;'>
                    <div class='col-3'>
                        <h3>$produit[1]</h3><br><img src=image/$produit[0].jpg width=150px>                  
                    </div>
                    <div class='col'>
                    <p><b>Prix: CAD$</b> $produit[prix]</p>
                    <p><b>Disponibilité:</b>  $produit[quantite]</p>
                    <p><b>Format:</b> $produit[format]</p>
                    <p><b>Fournisseur:</b> $produit[fournisseur]</p>
                    <p><b>Remarque:</b> $produit[description]</p>
                    </div>
                </div>
            </div>";
        }
    };
//-------------- Ajouter Produit ----------------------------
function ajouter($bd,$no) 
{
    mysqli_select_db($bd,'bonbon');
	$sql = "INSERT INTO produit ( idProduit,nomProduit, fournisseur, prix, quantite, format, description)
			VALUES ('".$no."',
                    '".addslashes($_POST['nomProduit'])."',
					'".addslashes($_POST['fournisseur'])."',
					'".addslashes($_POST['prix'])."',
					'".addslashes($_POST['quantite'])."',
					'".addslashes($_POST['format'])."',
					'".addslashes($_POST['description'])."')";
	//echo $sql;

	$resultat = mysqli_query($bd, $sql);
}

function validerProduit() 
{
	if (empty($_POST['nomProduit']) || empty($_POST['prix']) || empty($_POST['fournisseur']) ||
    	empty($_POST['quantite']) || empty($_POST['format']) || empty($_POST['description']))
		return false;
	else
		return true;
}

//------------------ Supprimer Produit ----------------------------------------------------
function supprimerProduit($bd)
{
    mysqli_select_db($bd,'bonbon');
    $sql = "SELECT * FROM produit";
    $resultat = mysqli_query($bd, $sql);

    while($ligne = mysqli_fetch_array($resultat)){
        $cocher = 'chk'.$ligne['idProduit'];
        if(isset($_POST[$cocher])){
            if($_POST[$cocher]){
                $requete = "DELETE from produit where idProduit = $ligne[idProduit]";
                
                $resultat2 = mysqli_query($bd, $requete);
                //var_dump($requete);
                $pngPath = "image/";
                $pngName = "$ligne[idProduit].jpg";
                
                unlink($pngPath.$pngName);
                
            }
        }
    }
}

//----------------- Modifier Produit ---------------------------
function affProduit($bd){
    mysqli_select_db($bd,'bonbon');
    $sql = "SELECT * FROM produit";
    $resultat = mysqli_query($bd, $sql);
    while($produit = mysqli_fetch_array($resultat)){
        echo "
        <div class=container>
            <div class='row' style='border-bottom: 1px solid black;'>
                <div class='col-3'>
                    <h3>$produit[1]</h3><br><img src=image/$produit[0].jpg width=150px>
                
                </div>
                <div class='col'>
                <p><b>Prix: CAD$</b> $produit[prix]</p>
                <p><b>Disponibilité:</b>  $produit[quantite]</p>
                <p><b>Format:</b> $produit[format]</p>
                <p><b>Fournisseur:</b> $produit[fournisseur]</p>
                <p><b>Remarque:</b> $produit[description]</p>
                </div>
                <div class='col'>
                <br><br><br><br>
                <form action='modifierProduit.php?id=$produit[idProduit]' method='post'>
                <input type='submit' value='Modifier'/> 
                </form>
                </div>
            </div>
        </div>";
    }
}
function modifierProduit($bd,$no,$nom,$prix,$fournisseur,$quantite,$format,$description){
    mysqli_select_db($bd,'bonbon');
    $requete = "UPDATE produit SET 
    nomProduit='$nom',
    fournisseur='$fournisseur',
    quantite='$quantite',
    prix='$prix',
    format='$format',
    description='$description' WHERE idProduit=$no";
    $resultat = mysqli_query($bd, $requete);
    //var_dump($requete);
}

// ------------ Panier (Liste déroulante) ---------
function listProduit($bd){
    mysqli_select_db($bd,'bonbon');
    $sql = "SELECT idProduit,nomProduit from produit";
    $resultat = mysqli_query($bd, $sql);
    echo "<div class='container' style='border: 2px solid black;'><div class='row'>";
    echo "<label class='col-2 input-group-text'>Sélectionner le produit :</label>";
    echo "<select name='produit' class='col-2' style='width:100'>";
			while($arrayFetch = mysqli_fetch_array($resultat))
			{
				$id_produit = $arrayFetch['idProduit'];
				$nom_auteur = $arrayFetch['nomProduit'];
				echo "<option value=$id_produit>$nom_auteur";
			}
			echo '</select>';echo '</div>';
}

// --- Valider le panier ---
function validerPanier() 
{
	if (empty($_POST['produit']) || empty($_POST['quantite']) || empty($_POST['date']))
		return false;
	else
		return true;
}
function ajouterPanier($bd){
    mysqli_select_db($bd,'bonbon');
    $sql = "INSERT INTO panier ( noProduit, quantite, datePanier)
			VALUES ('".addslashes($_POST['produit'])."',
					'".addslashes($_POST['quantite'])."',
					'".addslashes($_POST['date'])."'
                    )";
    $resultat = mysqli_query($bd, $sql); 

}
?>

