<?php

use PHPUnit\Framework\TestCase;

/**
 * Classe de test pour FileEncryptor
 * 
 * Cette classe contient un test unitaire pour la classe `FileEncryptor`. Le test vérifie le processus de chiffrement
 * et de déchiffrement d'un fichier en utilisant la stratégie One-Time Pad (OTP). Le test s'assure que le fichier déchiffré
 * est identique au fichier d'origine après application des opérations de chiffrement et déchiffrement.
 * 
 */
class FileEncryptorTest extends TestCase
{
    /**
     * Teste le chiffrement et le déchiffrement d'un fichier.
     *
     * Ce test vérifie que, après avoir chiffré un fichier puis l'avoir déchiffré en utilisant la même clé,
     * le fichier déchiffré est identique au fichier d'origine.
     * 
     * @return void
     * 
     * @throws Exception Si une erreur se produit lors de la lecture, du chiffrement, du déchiffrement ou de l'écriture du fichier.
     */
    public function testEncryptionDecryption()
    {
        // Initialisation des objets nécessaires pour l'encryptage et le décryptage
        $keyGenerator = new KeyGenerator();
        $otpStrategy = new OneTimePadStrategy();
        $fileHandler = new FileHandler();
        $fileEncryptor = new FileEncryptor($keyGenerator, $otpStrategy, $fileHandler);

        // Définir les chemins des fichiers d'entrée, de sortie et déchiffré
        $inputFilePath = 'example.txt';
        $outputFilePath = 'encrypted_example.txt';
        $decryptedOutputPath = 'decrypted_example.txt';

        // Chiffrement du fichier
        $fileEncryptor->encryptFile($inputFilePath, $outputFilePath);

        // Supposons que vous avez une méthode pour récupérer la clé (par exemple, depuis un stockage sécurisé)
        $key = 'clé_qui_a_été_utilisée';  // Remarque : Dans un cas réel, la clé serait stockée de manière sécurisée

        // Déchiffrement du fichier
        $fileEncryptor->decryptFile($outputFilePath, $key, $decryptedOutputPath);

        // Vérification que le fichier déchiffré est identique au fichier d'origine
        $originalData = file_get_contents($inputFilePath);
        $decryptedData = file_get_contents($decryptedOutputPath);

        // Assertion pour vérifier que les données d'origine et déchiffrées sont identiques
        $this->assertEquals($originalData, $decryptedData);
    }
}

?>
