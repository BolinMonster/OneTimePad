<?php

/**
 * Classe OneTimePadStrategy
 * 
 * Cette classe implémente l'algorithme de chiffrement et de déchiffrement One-Time Pad (OTP).
 * Le chiffrement et le déchiffrement se font à l'aide d'une clé unique de même longueur que les données,
 * et utilisant l'opération XOR entre chaque caractère des données et de la clé.
 * 
 */
class OneTimePadStrategy
{
    /**
     * Chiffre les données en utilisant l'algorithme One-Time Pad.
     *
     * Cette méthode applique un chiffrement de type XOR entre chaque caractère des données et de la clé.
     * Si la longueur des données et de la clé ne correspond pas, une exception `InvalidArgumentException`
     * est lancée.
     *
     * @param string $data Les données à chiffrer.
     * @param string $key La clé de chiffrement de même taille que les données.
     * 
     * @return string Les données chiffrées.
     * 
     * @throws InvalidArgumentException Si la longueur des données et de la clé ne correspond pas.
     */
    public function encrypt(string $data, string $key): string
    {
        // Vérifie que la taille de la clé correspond à celle des données
        if (strlen($data) !== strlen($key)) {
            throw new InvalidArgumentException('La clé doit avoir la même taille que les données.');
        }

        // Chiffrement : XOR entre les données et la clé
        $encrypted = '';
        for ($i = 0; $i < strlen($data); $i++) {
            $encrypted .= chr(ord($data[$i]) ^ ord($key[$i]));  // XOR entre les caractères
        }

        return $encrypted;
    }

    /**
     * Déchiffre les données chiffrées en utilisant la clé, en appliquant l'algorithme One-Time Pad.
     *
     * Le déchiffrement est identique au chiffrement avec OTP, car l'opération XOR est réversible.
     *
     * @param string $encryptedData Les données chiffrées à déchiffrer.
     * @param string $key La clé de déchiffrement (identique à la clé de chiffrement).
     * 
     * @return string Les données déchiffrées.
     */
    public function decrypt(string $encryptedData, string $key): string
    {
        // Le déchiffrement avec OTP est le même que l'encryption, car XOR est réversible
        return $this->encrypt($encryptedData, $key);  // Le déchiffrement est identique à l'encryption
    }
}

?>
