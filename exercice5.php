<?php

function readCsvFile($fileName) {
	
	$csvContent = array();
	$fileContent = file_get_contents($fileName);
	$inputFile = fopen($fileName, "r");
	if($inputFile) {
		$cpt = 0;
		//lecture ligne par ligne
		$header = array();
		while(($line = fgets($inputFile)) != false) {
			$csvLine = explode(";", $line);
			if($cpt++ == 0) {
				foreach ($csvLine as $key => $value) {
					$header[rtrim($key)] = rtrim($value);
				}
			} else {
				$user = array();
				for ($i=0; $i < count($csvLine); $i++) { 
					$user[trim($header[$i])] = chop($csvLine[$i]);
				}
				array_push($csvContent, $user);
			}
		}
	} else {
		echo "Error opening file";
	}
	fclose($inputFile);

	return $csvContent;
}

$csvContent = readCsvFile("fichier.csv");

print_r($csvContent);

function writeXmlFileFromCsvArray($csvContent) {
	$xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><users></users>');
	for ($i=0; $i < count($csvContent); $i++) { 
		$user = $xml->addChild('user');
		$user->addAttribute('id', $csvContent[$i]['id']);
		$user->addChild('firstname', $csvContent[$i]['prenom']);
		$user->addChild('lastname', $csvContent[$i]['nom']);
		$user->addChild('sex', $csvContent[$i]['sexe']);
	}
	$xml->asXml("fichier.xml");
}

writeXmlFileFromCsvArray($csvContent);

function writeJsonFileFromCsvArray($csvContent) {
	$fileContent = json_encode($csvContent);
	file_put_contents("fichier.json", $fileContent);
}

writeJsonFileFromCsvArray($csvContent);


/*
Array
(
    [0] => Array
        (
            [id] => 1
            [prenom] => aurelien
            [nom] => lacenaire
            [sexe] => h

        )

    [1] => Array
        (
            [id] => 2
            [prenom] => frederic
            [nom] => provot
            [sexe] => h

        )

    [2] => Array
        (
            [id] => 3
            [prenom] => michel
            [nom] => nialon
            [sexe] => h

        )

    [3] => Array
        (
            [id] => 4
            [prenom] => gregory
            [nom] => lejeune
            [sexe] => h
        )

)
*/

//file_put_contents("fichier.xml", file_get_contents("fichier.csv"));

/*
Package.xml :

<?xml version="1.0" encoding="UTF-8"?>
<Package xmlns="http://soap.sforce.com/2006/04/metadata">
    <types>
        <members>SampleDeployClass</members>
        <members>SampleFailingTestClass</members>
        <name>ApexClass</name>
    </types>
    <types>
        <members>SampleAccountTrigger</members>
        <name>ApexTrigger</name>
    </types>
    <version>40.0</version>
</Package>
*/
$xml = simplexml_load_file("package.xml") or die("Erreur fichier XML introuvable");
echo ("Valeur : ".$xml->types[0]->name."\n"); //il ne faut pas inclure le noeud racine, ici package
/*
Valeur : ApexClass
*/
foreach ($xml->getNameSpaces() as $key => $value) { //pour lire la propriété Package xmlns
 	echo "Namespace : $value \n";
}
/*
Namespace : http://soap.sforce.com/2006/04/metadata 
*/
print_r($xml);



?>