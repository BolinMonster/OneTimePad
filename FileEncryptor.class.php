<?php

/**
 * Classe FileEncryptor
 * 
 * Cette classe gère le chiffrement et le déchiffrement des fichiers en utilisant l'algorithme One-Time Pad (OTP).
 * Elle s'appuie sur les classes `KeyGenerator`, `OneTimePadStrategy`, et `FileHandler` pour gérer les clés,
 * appliquer la stratégie de chiffrement/déchiffrement, et gérer la lecture/écriture des fichiers.
 * 
 */
class FileEncryptor
{
    /** @var KeyGenerator $keyGenerator */
    private KeyGenerator $keyGenerator;

    /** @var OneTimePadStrategy $otpStrategy */
    private OneTimePadStrategy $otpStrategy;

    /** @var FileHandler $fileHandler */
    private FileHandler $fileHandler;

    /**
     * Constructeur de la classe FileEncryptor.
     *
     * Initialise les dépendances nécessaires à l'opération de chiffrement et de déchiffrement des fichiers.
     *
     * @param KeyGenerator $keyGenerator Le générateur de clés utilisé pour créer une clé OTP.
     * @param OneTimePadStrategy $otpStrategy La stratégie OTP utilisée pour chiffrer et déchiffrer les données.
     * @param FileHandler $fileHandler Le gestionnaire de fichiers utilisé pour lire et écrire les fichiers.
     */
    public function __construct(KeyGenerator $keyGenerator, OneTimePadStrategy $otpStrategy, FileHandler $fileHandler)
    {
        $this->keyGenerator = $keyGenerator;
        $this->otpStrategy = $otpStrategy;
        $this->fileHandler = $fileHandler;
    }

    /**
     * Chiffre un fichier en utilisant l'algorithme One-Time Pad.
     *
     * Cette méthode lit le contenu d'un fichier, génère une clé OTP de la même taille que le contenu du fichier,
     * applique l'algorithme de chiffrement One-Time Pad, puis écrit le fichier chiffré sur le disque.
     *
     * @param string $inputFilePath Le chemin du fichier à chiffrer.
     * @param string $outputFilePath Le chemin où le fichier chiffré sera sauvegardé.
     * 
     * @return void
     * 
     * @throws InvalidArgumentException Si le fichier d'entrée n'existe pas.
     * @throws Exception Si une erreur se produit lors de la lecture, du chiffrement ou de l'écriture du fichier.
     */
    public function encryptFile(string $inputFilePath, string $outputFilePath): void
    {
        // Lit le contenu du fichier
        $data = $this->fileHandler->readFile($inputFilePath);

        // Génére une clé OTP de la même taille que le fichier
        $key = $this->keyGenerator->generateKey(strlen($data));

        // Chiffre le fichier
        $encryptedData = $this->otpStrategy->encrypt($data, $key);

        // Écrit le fichier chiffré
        $this->fileHandler->writeFile($outputFilePath, $encryptedData);

        // Optionnel : Stocker la clé séparément, par exemple dans une base de données sécurisée
    }

    /**
     * Déchiffre un fichier en utilisant l'algorithme One-Time Pad.
     *
     * Cette méthode lit le contenu d'un fichier chiffré, utilise la clé fournie pour déchiffrer le fichier,
     * puis écrit le fichier déchiffré sur le disque.
     *
     * @param string $inputFilePath Le chemin du fichier chiffré à déchiffrer.
     * @param string $key La clé OTP utilisée pour déchiffrer le fichier.
     * @param string $outputFilePath Le chemin où le fichier déchiffré sera sauvegardé.
     * 
     * @return void
     * 
     * @throws InvalidArgumentException Si le fichier d'entrée n'existe pas.
     * @throws Exception Si une erreur se produit lors de la lecture, du déchiffrement ou de l'écriture du fichier.
     */
    public function decryptFile(string $inputFilePath, string $key, string $outputFilePath): void
    {
        // Lit le contenu du fichier chiffré
        $encryptedData = $this->fileHandler->readFile($inputFilePath);

        // Déchiffre le fichier
        $decryptedData = $this->otpStrategy->decrypt($encryptedData, $key);

        // Écrit le fichier déchiffré
        $this->fileHandler->writeFile($outputFilePath, $decryptedData);
    }
}

?>
