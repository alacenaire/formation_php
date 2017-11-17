<?php
function affiche_utilisateur($users) {
	foreach ($users as $key => $value) {
		echo "key : ".$key." - value : ".$value."\n";
	}
}

$utilisateurs = array(
	"utilisateur1" => "aurelien",
	"utilisateur2" => "frederic",
	"utilisateur3" => "gregory"
);

function ajoute_utilisateur($id, $nom, $users) {
	$users[$id] = $nom;
	affiche_utilisateur($users);
}

affiche_utilisateur($utilisateurs);
ajoute_utilisateur("utilisateur4", "felix", $utilisateurs);
print_r($utilisateurs);
/*
key : utilisateur1 - value : aurelien
key : utilisateur2 - value : frederic
key : utilisateur3 - value : gregory
key : utilisateur1 - value : aurelien
key : utilisateur2 - value : frederic
key : utilisateur3 - value : gregory
key : utilisateur4 - value : felix
Array
(
    [utilisateur1] => aurelien
    [utilisateur2] => frederic
    [utilisateur3] => gregory
)

=> dans ajoute_utilisateur $users est une recopie de $utilisateur donc l'utilisateur ajouté est "perdu"

Il faut mettre & dans la déclaration du paramètre pour que le tableau ne soit pas recopié mais que ce soit un pointeur qui soit utilisé :
function ajoute_utilisateur($id, $nom, &$users) {

Auquel cas on a bien :
key : utilisateur1 - value : aurelien
key : utilisateur2 - value : frederic
key : utilisateur3 - value : gregory
key : utilisateur1 - value : aurelien
key : utilisateur2 - value : frederic
key : utilisateur3 - value : gregory
key : utilisateur4 - value : felix
Array
(
    [utilisateur1] => aurelien
    [utilisateur2] => frederic
    [utilisateur3] => gregory
    [utilisateur4] => felix
)
*/

//valeur par défaut de paramètres
function somme($a = 2, $b = 3) {
	return $a+$b;
}
print_r(somme(5, 6)."\n");
print_r(somme(5)."\n");
print_r(somme()."\n");
/*
Console :
11
8
5
*/
$prenom = "michel";
switch ($prenom) {
	case "aurelien":
		echo "lacenaire\n";
		break;
	case "michel":
		echo "nialon\n";
		break;
	default:
		echo "inconnu";
		break;
}
/*
Console :
nialon
*/
?>