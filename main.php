<?php

// Initialisation des composants
$keyGenerator = new KeyGenerator();
$otpStrategy = new OneTimePadStrategy();
$fileHandler = new FileHandler();
$fileEncryptor = new FileEncryptor($keyGenerator, $otpStrategy, $fileHandler);

// Exemple de chiffrement
$inputFilePath = 'example.txt';
$outputFilePath = 'encrypted_example.txt';
$fileEncryptor->encryptFile($inputFilePath, $outputFilePath);

// Pour déchiffrer, vous auriez besoin de la clé utilisée pour chiffrer le fichier
$key = 'clé_qui_a_été_utilisée';

$decryptedOutputPath = 'decrypted_example.txt';
$fileEncryptor->decryptFile($outputFilePath, $key, $decryptedOutputPath);

echo "Fichier chiffré et déchiffré avec succès!";


?>