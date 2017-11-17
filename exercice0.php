<xml>
	<message>
		<?php
		//3 manières d'afficher le contenu de variables de + en + détaillées
		//print_r permet d'afficher plus de détails que echo notamment pour les tableaux
		echo "bonjour\n";
		?>
	</message>
	<message>
		<?php
		print_r("bonjour 2\n");
		?>
	</message>
	<message>
		<?php
		var_dump("bonjour 3\n");
		?>
	</message>
</xml>

<?php
/*
Résultat dans la console :
<xml>
        <message>
                bonjour
        </message>
        <message>
                bonjour 2
        </message>
        <message>
                string(10) "bonjour 3
"
        </message>
</xml>
*/
?>

<?php
$i = "bonjour";
$j = 2;
$k = 3.4;
$l = true;

echo "\$i + \$j = ".($i + $j)."\n";
echo "\$i . \$j = ".($i . $j)."\n";
echo "\$j + \$k = ".($j + $k)."\n";
echo "\$j . \$k = ".($j . $k)."\n";

/*
Résultat dans la console :
$i + $j = 2
$i . $j = bonjour2
$j + $k = 5.4
$j . $k = 23.4
*/
?>

<?php
$str1 = "aurelien";
echo "bonjour $str1\n";

$i = 36;

$str2 = "bonjour $str1 age $i ans\n";
echo $str2;

/*
Résultat dans la console :
bonjour aurelien
bonjour aurelien age 36 ans
*/
?>

<?php
$tabEntier = array (1, 2, 3);
//echo "$tabEntier"; //impossible : PHP Notice:  Array to string conversion in C:\Aurelien\Logiciels\wamp64\www\formation_php\exercice0.php on line 77
echo "Valeur 0 : ".$tabEntier[0]."\n";
echo "Taille : ".count($tabEntier)."\n";
echo "\n";
print_r($tabEntier);
var_dump($tabEntier);
for($i = 0; $i < count($tabEntier); $i ++) {
	echo "\$tabEntier[$i] = $tabEntier[$i]\n";
}

/*
Résultat dans la console :
Valeur 0 : 1
Taille : 3

Array
(
    [0] => 1
    [1] => 2
    [2] => 3
)
array(3) {
  [0]=>
  int(1)
  [1]=>
  int(2)
  [2]=>
  int(3)
}
$tabEntier[0] = 1
$tabEntier[1] = 2
$tabEntier[2] = 3
*/

$tabString = array ("a", "b", "c");
echo "Valeur 0 : ".$tabString[0]."\n";
echo "Taille : ".count($tabString)."\n";
echo "\n";
print_r($tabString);
var_dump($tabString);
for($i = 0; $i < count($tabString); $i ++) {
	echo "\$tabString[$i] = $tabString[$i]\n";
}

/*
Résultat dans la console :
Valeur 0 : a
Taille : 3

Array
(
    [0] => a
    [1] => b
    [2] => c
)
array(3) {
  [0]=>
  string(1) "a"
  [1]=>
  string(1) "b"
  [2]=>
  string(1) "c"
}
$tabString[0] = a
$tabString[1] = b
$tabString[2] = c
*/

$utilisateur = array("nom" => "lacenaire", "prenom" => "aurelien");
echo $utilisateur["nom"]." ".$utilisateur["prenom"]."\n";

/*
Résultat dans la console :
lacenaire aurelien
*/

$utilisateurs = array(
	array("nom" => "lacenaire", "prenom" => "aurelien"),
	array("nom" => "provot", "prenom" => "frederic")
);
echo $utilisateurs[1]["nom"]." ".$utilisateurs[1]["prenom"]."\n";

/*
Résultat dans la console :
echo $utilisateur["nom"]." ".$utilisateur["prenom"]."\n";
*/

for ($i=0; $i < count($utilisateurs); $i++) { 
	//boucle sur les clés du user
	foreach ($utilisateurs[$i] as $key => $value) {
		echo "cle : ".$key." - valeur : ".$value."\n";
	}
}

/*
Résultat dans la console :
cle : nom - valeur : lacenaire
cle : prenom - valeur : aurelien
cle : nom - valeur : provot
cle : prenom - valeur : frederic
*/

$dictionnaireUtilisateurs = array(
	"aurelien" => array("nom" => "lacenaire", "prenom" => "aurelien", "age" => "36"),
	"frederic" => array("nom" => "provot", "prenom" => "frederic", "sexe" => "H"),
	"total" => "2"
);
echo $dictionnaireUtilisateurs["frederic"]["sexe"]."\n";
//attention si itération pour 2 premiers éléments tableau c'est un array pour le 3ème c'est une string
/*
Résultat dans la console :
H
*/

$utilisateurs = array();

echo "Nb utilisateurs : ".count($utilisateurs)."\n";

$user1 = array("nom" => "lacenaire", "prenom" => "aurelien");
$user2 = array("nom" => "provot", "prenom" => "frederic");

array_push($utilisateurs, $user1);
array_push($utilisateurs, $user2);

echo "Nb utilisateurs : ".count($utilisateurs)."\n";
/*
Résultat dans la console :
Nb utilisateurs : 0
Nb utilisateurs : 2
*/

echo "differentes methodes d'iteration : \n";
echo "for : \n";
$tab = array("val1", "val2", "val3");
$tabMap = array(1 => "val1", 2 => "val2", 3 => "val3");
for ($i=0; $i < count($tab); $i++) { 
	echo $tab[$i]."\n";
}
echo "foreach : \n";
foreach ($tab as $value) {
	echo $value."\n";
}
echo "foreach map sur \$tab : \n";
foreach ($tab as $key => $value) {
	echo $key." => ".$value."\n";
}
echo "foreach map sur \$tabMap : \n";
foreach ($tabMap as $key => $value) {
	echo $key." => ".$value."\n";
}
echo "while sur \$tab : \n";
$i = 0;
while($i < count($tab))
{
	echo $tab[$i++]."\n";
}
echo "do while sur \$tab : \n";
$i = 0;
do
{
	echo $tab[$i++]."\n";
} while($i < count($tab));
/*
Résultat dans la console :
differentes methodes d'iteration :
for :
val1
val2
val3
foreach :
val1
val2
val3
foreach map sur $tab :
0 => val1
1 => val2
2 => val3
foreach map sur $tabMap :
1 => val1
2 => val2
3 => val3
while sur $tab :
val1
val2
val3
do while sur $tab :
val1
val2
val3
*/
?>