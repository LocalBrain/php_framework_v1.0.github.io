<?php

class Autoload
{
    // Enregistre l'autoload
    public static function register()
    {
        spl_autoload_register([__CLASS__, 'load']);
    }

    // Charge une classe automatiquement
    public static function load($class_name)
    {
        // Remplace les antislashs pour les namespaces (s'il y en a)
        $class_name = str_replace('\\', '/', $class_name);

        // Répertoire racine du projet
        $baseDir = __DIR__ . '/../'; // Ce chemin permet de remonter à la racine du projet

        // Dossiers où chercher les classes
        $directories = ['control', 'model'];  // Ajout de 'src/control' ici

        // Vérifie dans chaque dossier
        foreach ($directories as $directory) {
            $file = $baseDir . $directory . '/' . $class_name . '.php';

            // Si le fichier existe, on l'inclut
            if (file_exists($file)) {
                require_once $file;
                return;
            }
        }

        // Erreur si la classe n'est pas trouvée
        throw new Exception("Autoload Error: La classe '$class_name' n'a pas été trouvée dans : " . implode(", ", $directories));
    }
}
