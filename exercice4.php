<?php

$fileName = "fichier.txt";

echo "file_get_contents : \n";
$fileContent = file_get_contents($fileName);
echo $fileContent;
echo "\n\nfopen : \n";
$inputFile = fopen($fileName, "r");
if($inputFile) {
	//lecture ligne par ligne
	while(($line = fgets($inputFile)) != false)
			echo $line;
} else {
	echo "Error opening file";
}
fclose($inputFile);

/*
file_get_contents : 
Bonjour
je
m'appelle
Aurelien

fopen : 
Bonjour
je
m'appelle
Aurelien
*/
?>