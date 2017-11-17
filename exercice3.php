<?php
$str = "Bonjour, c'est Aurelien. Tout va bien ? Bien merci, et toi, ca va ?\n";

echo strtoupper($str);
echo strtolower($str);

echo addslashes($str);

/*
BONJOUR, C'EST AURELIEN. TOUT VA BIEN ? BIEN MERCI, ET TOI, CA VA ?
bonjour, c'est aurelien. tout va bien ? bien merci, et toi, ca va ?
Bonjour, c\'est Aurelien. Tout va bien ? Bien merci, et toi, ca va ?
*/

echo strpos($str, ",")."\n";

echo substr($str, 7);
/*
7
, c'est Aurelien. Tout va bien ? Bien merci, et toi, ca va ?
*/
print_r(explode(",", $str));
$users = array("michel", "aurelien", "gregory");
echo implode(",", $users)."\n";
echo implode("\t", $users)."\n";

/*
Array
(
    [0] => Bonjour
    [1] =>  c'est Aurelien. Tout va bien ? Bien merci
    [2] =>  et toi
    [3] =>  ca va ?

)
michel,aurelien,gregory
michel	aurelien	gregory
*/

$msg = "Bonjour #nom# et bienvenue #nom#\n";
echo substr_replace($msg, "aurelien", 8, 5);
echo str_replace("#nom#", "aurelien", $msg);
echo str_replace("#nom#", "aurelien", $msg, $nb);

echo "Nb de remplacements : $nb\n";
echo "Taille : ".strlen($msg)."\n";

/*
Bonjour aurelien et bienvenue #nom#
Bonjour aurelien et bienvenue aurelien
Bonjour aurelien et bienvenue aurelien
Nb de remplacements : 2
Taille : 33
*/

$msg1 = "a";
$msg2 = "a";
$msg3 = "A";
$msg4 = "b";
$msg5 = 0;
$msg6 = 0.0;

echo ($msg1 == $msg2)."\n";
// === compare le contenu ET le type
echo ($msg1 === $msg2)."\n";
echo ($msg5 == $msg6)."\n";
// === compare le contenu ET le type
echo ($msg5 === $msg6)."\n";
print_r ($msg5 === $msg6)."\n";
echo (strcmp($msg1, $msg2))."\n";
echo (strcmp($msg1, $msg4))."\n"; //retourne -1 car dans la table ASCII a < b
/*
1
1
1

0
-1
*/
$str = (2 === "2") ? "ok" : "nok";
echo $str."\n";
/*
nok
*/

//PHP7 : spaceship opérator
//The spaceship operator is used for comparing two expressions. It returns -1, 0 or 1 when $a is respectively less than, equal to, or greater than $b
print_r(3<=>2);
echo "\n";
print_r(2<=>3);
echo "\n";
print_r(2<=>2);
echo "\n";
/*
1
-1
0
*/

function recupNom($nom = null) {
	//PHP5
	if($nom == null) 
		$r = "test";
	else
		$r = $nom;
	return $r;

	//PHP7
	//The null coalescing operator (??) has been added as syntactic sugar for the common case of needing to use a ternary in conjunction with isset(). It returns its first operand if it exists and is not NULL; otherwise it returns its second operand.
	$r = $nom ?? "test";
}
?>