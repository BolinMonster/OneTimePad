# One-Time Pad Encryption

## Description

Ce projet implémente une solution de chiffrement sécurisée basée sur la méthode **One-Time Pad (OTP)** en PHP. Le One-Time Pad est un algorithme de chiffrement parfaitement sécurisé si certaines conditions sont respectées, notamment l'utilisation d'une clé aussi longue que le message, générée de manière aléatoire, et utilisée une seule fois.

Ce projet inclut un chiffrement et un déchiffrement des fichiers (texte, audio, vidéo, etc.) en utilisant OTP. Il est conçu en utilisant des **design patterns** pour faciliter l'extensibilité et la gestion des fichiers.

## Fonctionnalités

- **Chiffrement et déchiffrement des fichiers** (texte, audio, vidéo, etc.) via l'algorithme One-Time Pad.
- Utilisation du **Design Pattern Strategy** pour appliquer facilement différents algorithmes de chiffrement.
- Gestion flexible des fichiers avec la possibilité de les lire, écrire et traiter indépendamment de leur type.

## Prérequis

Avant de pouvoir utiliser cette application, vous devez disposer de PHP version 7.4 ou supérieure.

## Utilisation



### Classes principales

1. **KeyGenerator** : Gère la génération des clés de chiffrement de manière aléatoire.
2. **OneTimePadStrategy** : Applique l'algorithme OTP pour chiffrer et déchiffrer les données.
3. **FileHandler** : Lit et écrit des fichiers en PHP.
4. **FileEncryptor** : Utilise les autres classes pour effectuer le chiffrement et déchiffrement des fichiers.

### Structure du code

Voici un résumé de la structure des fichiers du projet :

```
|-- KeyGenerator.php        // Générateur de clés OTP
|-- OneTimePadStrategy.php  // Implémentation de l'algorithme OTP
|-- FileHandler.php         // Gestion des fichiers (lecture et écriture)
|-- FileEncryptor.php       // Classe de chiffrement et déchiffrement des fichiers
|-- example.txt             // Exemple de fichier à chiffrer (texte)
|-- FileEncryptorTest.class // Tests unitaires
|-- README.md               // Ce fichier
```

## Tests

Les tests unitaires peuvent être ajoutés pour vérifier le bon fonctionnement des classes, par exemple avec PHPUnit. Vous pouvez créer des tests pour vous assurer que :

- Le chiffrement et le déchiffrement donnent le même résultat.
- Les clés sont générées correctement.
- Les fichiers sont lus et écrits sans erreur.

## Sécurité

- **Gestion des clés** : La clé OTP doit être conservée en sécurité. Utilisez des pratiques appropriées de gestion des clés (par exemple, stockage sécurisé dans une base de données, ou utilisation d'un coffre-fort de secrets).
- **Clé unique** : Ne jamais réutiliser une clé OTP. Chaque clé doit être générée de manière unique pour chaque message ou fichier.
- **Longueur de la clé** : La clé doit être aussi longue que le fichier ou message que vous souhaitez chiffrer. Le fait de ne pas respecter cette règle compromettrait la sécurité du chiffrement.

## Contribuer

Les contributions sont les bienvenues. Pour contribuer, suivez les étapes suivantes :

1. Fork ce projet.
2. Créez une branche (`git checkout -b feature/feature-name`).
3. Effectuez vos modifications.
4. Committez vos changements (`git commit -am 'Ajout de nouvelles fonctionnalités'`).
5. Poussez vos modifications (`git push origin feature/feature-name`).
6. Ouvrez une pull request.

## License

Ce projet est sous **MIT License**.
