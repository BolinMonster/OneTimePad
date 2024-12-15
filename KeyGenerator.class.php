<?php

/**
 * Classe KeyGenerator
 * 
 * Cette classe génère une clé aléatoire de taille spécifiée pour être utilisée dans des algorithmes de chiffrement comme le One-Time Pad (OTP).
 * La clé générée est de type binaire (chaîne de bytes).
 * 
 */
class KeyGenerator
{
    /**
     * Génère une clé aléatoire de la taille souhaitée.
     *
     * Cette méthode utilise la fonction PHP `random_bytes` pour générer une clé cryptographiquement sécurisée.
     * La taille de la clé est spécifiée par l'utilisateur en paramètre. La clé générée est une chaîne binaire.
     *
     * @param int $size La taille de la clé à générer en octets (bytes).
     * 
     * @return string La clé générée sous forme binaire.
     * 
     * @throws InvalidArgumentException Si la taille de la clé est inférieure ou égale à zéro.
     * @throws Exception Si une erreur se produit lors de la génération des octets aléatoires.
     */
    public function generateKey(int $size): string
    {
        // Vérifie que la taille est valide
        if ($size <= 0) {
            throw new InvalidArgumentException('La taille de la clé doit être supérieure à zéro.');
        }

        try {
            // Génère une clé de la taille demandée
            return random_bytes($size);
        } catch (Exception $e) {
            // Si une erreur se produit pendant la génération, on la lance à nouveau
            throw new Exception('Une erreur est survenue lors de la génération de la clé aléatoire.', 0, $e);
        }
    }
}

?>
