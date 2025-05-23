WebSiteMaker | websitemaker.fr 

# Framework PHP Version 1.0 (PepinPHP version 1.0)

Ce projet est un framework PHP simple pour la gestion de la structure MVC (Model-View-Controller). Il est conçu pour être léger, facile à personnaliser et à utiliser dans tous vos projets PHP.

## Structure du projet (ajouter le fichier config.php avec les constante mots de passe en dehors de la section public du serveur)

```plaintext
|   index.php                  # Point d'entrée de l'application (à la racine)
|
+---public                      # Contient les fichiers accessibles publiquement
|   +---css                     # Fichiers CSS
|   |       style.css           # Exemple de fichier CSS
|   |
|   +---font                    # Polices utilisées
|   +---js                      # Fichiers JavaScript
|   +---media                   # Médias (images, vidéos, GIF)
|   |   +---gif                 # GIFs
|   |   +---img                 # Images
|   |   \---video               # Vidéos
|   \---vues                    # Vues (HTML/PHP)
|       +---form                # Formulaires (Connexion, Inscription)
|       |       connexion.php   # Formulaire de connexion
|       |       inscription.php # Formulaire d'inscription
|       |
|       +---navigation          # Navigation (Header, Footer, Navbar)
|       |       accueil.php     # Page d'accueil
|       |       contact.php     # Page de contact
|       |
|       \---template            # Templates communs (Header, Footer, Navbar)
|               footer.php     # Footer de l'application
|               header.php     # Header de l'application
|               navbar.php     # Navbar de l'application
|
\---src                         # Contient la logique métier (MVC)
    +---control                 # Contrôleurs
    |       Autoload.php        # Auto-chargement des classes
    |       ControlForm.php     # Contrôleur des formulaires
    |       ControlMain.php     # Contrôleur principal
    |       ControlRooter.php   # Contrôleur de gestion des routes
    |
    \---model                   # Modèles pour interagir avec la base de données
            Base.php           # Base pour la connexion à la base de données
            ModelUser.php      # Modèle pour la gestion des utilisateurs
|
.gitignore                     # Fichiers à ignorer par Git
README.md                      # Documentation de ton projet                 # Ce fichier
```

# Framework Template

Le **Framework Template** est une base de projet PHP légère et flexible qui suit l'architecture **MVC** (Modèle-Vue-Contrôleur). 
Il permet de créer rapidement des applications web optimisées et sécurisées tout en maintenant une structure claire et modulaire.

## Fonctionnalités

- **Architecture MVC** pour une séparation claire des responsabilités entre la logique métier, la gestion des vues et la gestion des données.
- **Gestion sécurisée des sessions** avec options avancées de sécurité.
- **Routeur flexible** pour gérer les URLs et les redirections vers les contrôleurs.
- **Optimisation des performances** grâce à la mise en cache des vues et des requêtes.
- **Sécurisation avancée** contre les attaques XSS, CSRF, et injection SQL.
- **Support des tests unitaires** et automatisés pour garantir la stabilité et la robustesse du framework.

## Prérequis

Avant de commencer, assurez-vous d'avoir les éléments suivants installés sur votre machine :
- PHP 7.4 ou supérieur
- Serveur web compatible PHP (ex : Apache, Nginx)
- Serveur de base de données (MySQL, MariaDB, etc.)

## Installation

### 1. Télécharger le Framework

Clonez ce dépôt ou téléchargez-le sous forme de fichier ZIP et extrayez-le dans votre répertoire de projet.

```bash
git clone https://github.com/WebSiteMaker24/php_framework_v1.0.github.io.git

cd php_framework_v1.0
