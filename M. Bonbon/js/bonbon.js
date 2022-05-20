function afficherDateJS() 
{
	var ladate=new Date();
	var jour = new Array( "Dimanche", "Lundi", "Mardi","Mercredi", "Jeudi", "Vendredi", "Samedi");
	var mois=new Array("Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");

    document.write(jour[ladate.getDay()]+", le ");
    document.write(ladate.getDate()+" "+mois[ladate.getMonth()]+" "+ladate.getFullYear());

}

function VerifierSupprimer(){
	var valide = false;
	if (confirm('Voulez-vous supprimer ce ou ces enregistrement ?')){
		valide=true;
		return valide;
	}

}

function getinfo(){
	var email = document.getElementById("username").value;
	var password = document.getElementById("password").value;
	var tab = new String[2];
	tab[0]=email;
	tab[1]=password;
	return tab;
}