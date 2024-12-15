<?php

/**
 * Classe FileHandler
 * 
 * Cette classe est responsable de la gestion des fichiers : lecture et écriture de fichiers sur le disque.
 * Elle prend en charge les fichiers sous forme de chaînes binaires.
 * 
 */
class FileHandler
{
    /**
     * Lit le contenu d'un fichier et le renvoie sous forme de chaîne.
     *
     * Cette méthode vérifie d'abord si le fichier existe avant de tenter de le lire. Si le fichier n'existe pas,
     * une exception `InvalidArgumentException` est levée. Le contenu du fichier est ensuite retourné sous forme
     * de chaîne binaire.
     *
     * @param string $filePath Le chemin du fichier à lire.
     * 
     * @return string Le contenu du fichier sous forme de chaîne.
     * 
     * @throws InvalidArgumentException Si le fichier spécifié n'existe pas.
     * @throws Exception Si une erreur se produit lors de la lecture du fichier.
     */
    public function readFile(string $filePath): string
    {
        // Vérifie si le fichier existe
        if (!file_exists($filePath)) {
            throw new InvalidArgumentException('Le fichier n\'existe pas.');
        }

        try {
            // Lit le contenu du fichier et le retourne
            return file_get_contents($filePath);  // Lit tout le contenu du fichier en tant que chaîne binaire
        } catch (Exception $e) {
            // Si une erreur se produit lors de la lecture, on la relance
            throw new Exception('Une erreur est survenue lors de la lecture du fichier.', 0, $e);
        }
    }

    /**
     * Écrit des données dans un fichier.
     *
     * Cette méthode prend en entrée un chemin de fichier et des données sous forme de chaîne. Elle écrit les données
     * dans le fichier spécifié. Si le fichier n'existe pas, il sera créé. Si le fichier existe déjà, il sera écrasé.
     *
     * @param string $filePath Le chemin du fichier dans lequel écrire les données.
     * @param string $data Les données à écrire dans le fichier.
     * 
     * @return void
     * 
     * @throws Exception Si une erreur se produit lors de l'écriture dans le fichier.
     */
    public function writeFile(string $filePath, string $data): void
    {
        try {
            // Écrit les données dans le fichier
            file_put_contents($filePath, $data);  // Écrit les données dans un fichier
        } catch (Exception $e) {
            // Si une erreur se produit lors de l'écriture, on la relance
            throw new Exception('Une erreur est survenue lors de l\'écriture dans le fichier.', 0, $e);
        }
    }
}

?>
